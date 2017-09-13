$(document).ready(function ($) {

    setFromSession();

    $('#cotizar_modal').bmodal({
        effect: 'fade',
        delay: 500
    });

    var cartWrapper = $('.cd-cart-container');
    //product id - you don't need a counter in your real project but you can use your real product id
    var productId = 0;

    if (cartWrapper.length > 0) {
        //store jQuery objects
        var cartBody = cartWrapper.find('.body')
        var cartList = cartBody.find('ul').eq(0);
        var cartTotal = cartWrapper.find('.checkout').find('span');
        var cartTrigger = cartWrapper.children('.cd-cart-trigger');
        var cartCount = cartTrigger.children('.count');
        var addToCartBtn = $('.cd-add-to-cart');
        var cotizarBtn = $('.checkout');
        var undo = cartWrapper.find('.undo');
        var undoTimeoutId;

        //add product to cart
        $('#load_content').on('click', '.cd-add-to-cart',function (event) {

            event.preventDefault();
            addToCart($(this));
        });

        $(document).on('click', '.checkout', function (event) {
            event.preventDefault();
            toggleCart();
            $('#cliente_nombre').val('');
            $('#cliente_correo').val('');
            $('#cliente_telefono').val('');
            $('#cliente_empresa').val('');
            $('#cliente_mensaje').val('');
            $('#cliente_productos').html('');

            $('#nombre_error').html('');
            $('#correo_error').html('');
            $('#telefono_error').html('');
            $('#empresa_error').html('');
            $('#mensaje_error').html('');

            $('#loading_modal').bmodal('show');
            var url = $('#site_url').val() + 'cart';
            $.ajax({
                url: url,
                type: 'POST',
                headers: {
                    Accept: 'application/json'
                },
                success: function (data) {
                    var body = $('#cliente_productos');

                    for (var item in data.items) {
                        var p = data.items[item];

                        body.append('<tr>');
                        body.append('<td>' + p.name + '</td>');
                        body.append('<td>' + p.qty + '</td>');
                        body.append('<td>S/ ' + p.price + '</td>');
                        body.append('<td>' + parseFloat(p.price * p.qty).toFixed(2) + '</td>');
                        body.append('</tr>');
                    }


                },
                complete: function (data) {
                    $('#loading_modal').bmodal('hide');
                },
                error: function (data) {
                    alert('Ha ocurrido un error 2.');
                }
            });


            $('#cotizar_modal').bmodal('show');
        });

        //open/close cart
        cartTrigger.on('click', function (event) {
            event.preventDefault();
            toggleCart();
        });

        //close cart when clicking on the .cd-cart-container::before (bg layer)
        cartWrapper.on('click', function (event) {
            if ($(event.target).is($(this))) toggleCart(true);
        });

        //delete an item from the cart
        cartList.on('click', '.delete-item', function (event) {
            event.preventDefault();
            removeProduct($(event.target).parents('.product'));
        });

        //update item quantity
        cartList.on('keyup click mouseleave', 'input', function (event) {
            quickUpdateCart();
            updateSession($(this).attr('data-rowid'), $(this).val(), 'update');
        });

        //reinsert item deleted from the cart
        // undo.on('click', 'a', function (event) {
        //     clearInterval(undoTimeoutId);
        //     event.preventDefault();
        //     cartList.find('.deleted').addClass('undo-deleted').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function () {
        //         $(this).off('webkitAnimationEnd oanimationend msAnimationEnd animationend').removeClass('deleted undo-deleted').removeAttr('style');
        //         quickUpdateCart();
        //     });
        //     undo.removeClass('visible');
        // });
    }

    function toggleCart(bool) {
        var cartIsOpen = ( typeof bool === 'undefined' ) ? cartWrapper.hasClass('cart-open') : bool;

        if (cartIsOpen) {
            cartWrapper.removeClass('cart-open');
            //reset undo
            clearInterval(undoTimeoutId);
            undo.removeClass('visible');
            cartList.find('.deleted').remove();

            setTimeout(function () {
                cartBody.scrollTop(0);
                //check if cart empty to hide it
                if (Number(cartCount.find('li').eq(0).text()) == 0) cartWrapper.addClass('empty');
            }, 500);
        } else {
            cartWrapper.addClass('cart-open');
        }
    }

    function addToCart(trigger) {
        var cartIsEmpty = cartWrapper.hasClass('empty');
        //update cart product list
        addProduct(trigger);
        //update number of items
        updateCartCount(cartIsEmpty);
        //update total price
        updateCartTotal(trigger.attr('data-price'), true);
        //show cart
        cartWrapper.removeClass('empty');
    }

    function addProduct(trigger) {
        //this is just a product placeholder
        //you should insert an item with the selected product info
        //replace productId, productName, price and url with your real product info
        var product = {
            id: trigger.attr('data-id'),
            row_id: '',
            name: trigger.attr('data-name'),
            quantity: 1,
            currency: trigger.attr('data-moneda'),
            price: trigger.attr('data-price'),
            image: trigger.attr('data-image')
        };

        var id = 'cd-product-' + product.id;

        if ($('#' + id).val() == undefined) {
            cartList.prepend($(getTemplate(product)));
            updateSession(product.id, $('#' + id).val(), 'add');
        }
        else {

            var current = Number($('#' + id).val()) + 1;
            var rowid = '#rowid-' + product.id;

            $('#' + id).val(current);
            updateSession($(rowid).val(), $('#' + id).val(), 'update');
        }

    }

    function removeProduct(product) {
        clearInterval(undoTimeoutId);
        cartList.find('.deleted').remove();

        var topPosition = product.offset().top - cartBody.children('ul').offset().top,
            productQuantity = Number(product.find('.quantity').find('input').val()),
            productTotPrice = Number(product.find('.price').text().replace('S/ ', '')) * productQuantity;

        product.css('top', topPosition + 'px').addClass('deleted');

        //update items count + total price
        updateCartTotal(productTotPrice, false);
        updateCartCount(true, -productQuantity);
        // undo.addClass('visible');
        //
        // //wait 8sec before completely remove the item
        // undoTimeoutId = setTimeout(function () {
        //     undo.removeClass('visible');
        //     cartList.find('.deleted').remove();
        // }, 8000);

        updateSession(product.find('input[type="hidden"]').val(), 0, 'update');
    }

    function quickUpdateCart() {
        var quantity = 0;
        var price = 0;

        cartList.children('li:not(.deleted)').each(function () {
            var singleQuantity = Number($(this).find('input[type="number"]').val());
            quantity = quantity + singleQuantity;
            price = price + singleQuantity * Number($(this).find('.price').text().replace('S/ ', ''));
        });

        cartTotal.text(price.toFixed(2));
        cartCount.find('li').eq(0).text(quantity);
        cartCount.find('li').eq(1).text(quantity + 1);


    }

    function updateCartCount(emptyCart, quantity) {
        if (typeof quantity === 'undefined') {
            var actual = Number(cartCount.find('li').eq(0).text()) + 1;
            var next = actual + 1;

            if (emptyCart) {
                cartCount.find('li').eq(0).text(actual);
                cartCount.find('li').eq(1).text(next);
            } else {
                cartCount.addClass('update-count');

                setTimeout(function () {
                    cartCount.find('li').eq(0).text(actual);
                }, 150);

                setTimeout(function () {
                    cartCount.removeClass('update-count');
                }, 200);

                setTimeout(function () {
                    cartCount.find('li').eq(1).text(next);
                }, 230);
            }
        } else {
            var actual = Number(cartCount.find('li').eq(0).text()) + quantity;
            var next = actual + 1;

            cartCount.find('li').eq(0).text(actual);
            cartCount.find('li').eq(1).text(next);
        }
    }

    function updateCartTotal(price, bool) {
        bool ? cartTotal.text((Number(cartTotal.text()) + Number(price)).toFixed(2)) : cartTotal.text((Number(cartTotal.text()) - Number(price)).toFixed(2));
    }

    function getTemplate(product) {

        var template = '<li class="product"><input type="hidden" id="rowid-' + product.id + '" value="' + product.row_id + '"><div class="product-image">';
        template += '<a href="' + $('#site_url').val() + 'producto/' + product.id + '/detalles"><img src="' + product.image + '" alt="placeholder"></a></div>';
        template += '<div class="product-details">';
        template += '<h3><a href="' + $('#site_url').val() + 'producto/' + product.id + '/detalles">' + product.name + '</a></h3>';
        template += '<span class="price">' + product.currency + ' ' + product.price + '</span>';
        template += '<div class="actions"><a href="#0" class="delete-item"><span class="icon"><i class="fa fa-remove"></i></span> Eliminar</a>';
        template += '<div class="quantity" style="float: right;"><label for="cd-product-' + product.id + '">Cantidad</label>';
        template += '<input data-rowid="' + product.row_id + '" type="number" style="width: 50px;" min="1" id="cd-product-' + product.id + '" name="quantity" value="' + product.quantity + '">';
        template += '</div></div></div></li>';

        return template;
    }


    function updateSession(id, cantidad, action) {

        var url = $('#site_url').val();
        if (action == 'add')
            url += 'cart/add';
        else if (action == 'update')
            url += 'cart/update';

        $.ajax({
            url: url,
            type: 'POST',
            headers: {
                Accept: 'application/json'
            },
            data: {'id': id, 'cantidad': cantidad},
            success: function (data) {
                $('#rowid-'+data['id']).val(data['rowid']);
                if (action=='add'){
                    $("input#cd-product-"+data['id']).attr('data-rowid',data['rowid']);
                }
            },
            complete: function (data) {

            },
            error: function (data) {
                alert('Ha ocurrido un error 1.');
            }
        });
    }

    function setFromSession() {

        var url = $('#site_url').val() + 'cart';
        $.ajax({
            url: url,
            type: 'POST',
            headers: {
                Accept: 'application/json'
            },
            success: function (data) {

                for (var item in data.items) {
                    var p = data.items[item];
                    var cartIsEmpty = cartWrapper.hasClass('empty');
                    console.log(p)
                    var product = {
                        id: p.id,
                        row_id: p.rowid,
                        name: p.name,
                        quantity: p.qty,
                        currency: p.options.currency,
                        price: p.price,
                        image: $('#base_url').val() + 'web/uploads/productos/' + p.options.image
                    };
                    cartList.prepend($(getTemplate(product)));

                    updateCartCount(cartIsEmpty, p.qty);
                    updateCartTotal(p.price * p.qty, true);
                    cartWrapper.removeClass('empty');
                }
            },
            complete: function (data) {

            },
            error: function (data) {
                alert('Ha ocurrido un error 2.');
            }
        });
    }


});
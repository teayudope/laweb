<script>
    $(function () {

        updateData();
        $('.del_body').off('click');
        $('.del_body').on('click', function () {
            $(this).closest('tr').remove();
            updateData();
        });

        updateData2();
        $('.del_body_i').off('click');
        $('.del_body_i').on('click', function () {
            $(this).closest('tr').remove();
            updateData();
        });

        $('#add_body').on('click', function () {
            var titulo = $('#add_titulo').val();
            var valor = $('#add_valor').val();
            var table = $('#table_body');

            if (titulo == '') {

                alert('El titulo no puede estar vacio');
                return;
            }

            if (valor == '') {
                alert('El valor no puede estar vacio');
                return;
            }

            var template = '<tr>';
            template += '<td>' + titulo + '</td>';
            template += '<td>' + valor + '</td>';
            template += '<td><button type="button" class="del_body button is-danger is-small"><span><i class="fa fa-remove is-small"></i></span></button></td>';

            table.append(template);
            $('#add_titulo').val('');
            $('#add_valor').val('');

            $('.del_body').off('click');
            $('.del_body').on('click', function () {
                $(this).closest('tr').remove();
                updateData();
            });

            updateData();
        });


        $('#add_body_i').on('click', function () {
            var titulo = $('#add_titulo_i').val();
            var table = $('#table_body_i');
            if (titulo == '') {
                alert('El titulo no puede estar vacio');
                return;
            }

            var template = '<tr>';
            template += '<td>' + titulo + '</td>';
            template += '<td><button type="button" class="del_body_i button is-danger is-small"><span><i class="fa fa-remove is-small"></i></span></button></td>';

            table.append(template);
            $('#add_titulo_i').val('');

            $('.del_body_i').off('click');
            $('.del_body_i').on('click', function () {
                $(this).closest('tr').remove();
                updateData2();
            });

            updateData2();
        });

    });

    function updateData() {
        var data = [];
        $('#table_body tr').each(function () {
            data.push({
                titulo: $(this).find('td:nth-child(1)').html(),
                valor: $(this).find('td:nth-child(2)').html(),
            });

        });

        $('#producto_datos').val(JSON.stringify(data));
    }

    function updateData2() {
        var data = [];
        $('#table_body_i tr').each(function () {
            data.push({
                titulo: $(this).find('td:nth-child(1)').html(),
            });

        });

        //$('#producto_datos').val(JSON.stringify(data));
    }
    $('#buscar').click(function(eve){
        $('#span-search').hide();
        $('#inputsearch').toggle();
    });
</script>
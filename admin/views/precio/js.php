<script>
    $(function () {

        $(".chosen-select").chosen({
            search_contains: true
        });

        if ($('#precio_producto_id').val() != "") {
            $('#precio_base').html($('#precio_producto_id option:selected').attr('data-precio'));
            calcPrecio();
        }

        $('#precio_producto_id').on('change', function () {

            if ($(this).val() != "") {
                $('#precio_base').html($('#precio_producto_id option:selected').attr('data-precio'));
                calcPrecio();
            }
            else
                $('#precio_base').html('Seleccione un producto');
        });

        $('#porciento_descuento').on('keyup', function () {
            calcPrecio();
        });

    });

    function calcPrecio() {
        var precio_base = parseFloat($('#precio_base').html());
        var porciento_descuento = parseFloat($('#porciento_descuento').val());
        var descuento = precio_base * porciento_descuento / 100;

        $('#descuento').html(descuento);
        $('#nuevo_precio').html(precio_base - descuento);
    }
</script>
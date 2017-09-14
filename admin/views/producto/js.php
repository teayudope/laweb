<script>
    $(function () {

        updateData();
        $('.del_body').off('click');
        $('.del_body').on('click', function () {
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
    $('#buscar').click(function(eve){
        $('#span-search').hide();
        $('#inputsearch').toggle();
    });
</script>
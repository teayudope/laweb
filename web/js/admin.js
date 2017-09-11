$(function () {

    $('.delete_confirm').on('click', function () {
        if (!confirm('¿Estas seguro de este registro?'))
            return false;
    });
});
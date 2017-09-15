<script src="<?= base_url('web') ?>/bower_components/jquery.easing/js/jquery.easing.min.js"></script>
<script src="<?= base_url('web') ?>/bower_components/jquery.plusslider/dist/jquery.plusanchor.min.js"></script>
<script src="<?= base_url('web') ?>/bower_components/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="<?= base_url('web') ?>/js/bmodal.js"></script>

<script>
    $(function () {

        $('body').plusAnchor({
            easing: 'easeInOutExpo',
            speed: 700
        });


        $('#imagen_modal').bmodal({
            effect: 'fade',
            delay: 1000
        });

        $('.galeria a').on('click', function (e) {
            e.preventDefault();

            $('#img_id').attr('src', $(this).find('img').first().attr('src'));
        });

        var slider = tns({
            container: document.querySelector('.slider_producto_cliente'),
            items: 3,
            controls: false,
            slideBy: 'page',
            autoplay: true
        });
    });
</script>
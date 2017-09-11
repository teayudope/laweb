<script src="<?= base_url('web') ?>/bower_components/tiny-slider/dist/min/tiny-slider.js"></script>

<script>

    $(function () {


        var slider = tns({
            container: document.querySelector('.slider_producto'),
            items: <?= $cantidad_pr >= 4 ? '4' : $cantidad_pr;?>,
            controls: true,
            arrowKeys: true,
            slideBy: 'page',
            autoplay: true
        });
    });


</script>
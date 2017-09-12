<script src="<?= base_url('web') ?>/bower_components/simple-slider/dist/simpleslider.min.js"></script>
<script src="<?= base_url('web') ?>/bower_components/jquery.easing/js/jquery.easing.min.js"></script>
<script src="<?= base_url('web') ?>/bower_components/jquery.plusslider/dist/jquery.plusanchor.min.js"></script>

<script>
base_url = '<?=base_url()?>';
    $(function () {

        $('body').plusAnchor({
            easing: 'easeInOutExpo',
            speed:  700
        });

        var imgSlider = simpleslider.getSlider({
            container: document.getElementById('slider'),
            prop: 'opacity',
            unit: '',
            init: 0,
            show: 1,
            end: 0,
            delay: 4,
            duration: 2,
        });


        $('#menu_dinamico a').on('click', function (e) {
            e.preventDefault();
            $('#menu_dinamico a').removeClass('is-active');
            $(this).addClass('is-active');
            $('.submenu').hide();
            $($(this).attr('data-menu')).fadeIn();
        });

    $('.id_submenu').click(function(eve){
        href = $(this).attr('href');
        $('.id_submenu').removeClass('is-active');
        $(this).addClass( "is-active" );
        $.ajax({
          type: "GET",
          url: base_url+"productod/"+href.replace('#',''),
            beforeSend: function() {
                $('#load_content').html('<div style="text-align: -webkit-center; padding-top: 20%;"><img src="<?= base_url("web/img/loading.gif"); ?>" height="120" width="120"/></div>');
            },
            success: function(data){
                $('#load_content').html(data);
            },
        error: function(){alert('error');}
        });
    });


    });


</script>
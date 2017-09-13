<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Innovaled</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <!--<link rel="stylesheet" href="css/normalize.css">-->


    <link rel="stylesheet" href="<?= base_url('web') ?>/cart/css/style.css">
    <link rel="stylesheet" href="<?= base_url('web') ?>/bower_components/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?= base_url('web') ?>/bower_components/bulma/css/bulma.css">
    <link rel="stylesheet" href="<?= base_url('web') ?>/bower_components/tiny-slider/dist/tiny-slider.css">
    <link rel="stylesheet" href="<?= base_url('web') ?>/css/main.css">
    <style>

    </style>
    <?= isset($view_header) ? $view_header : '' ?>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>

<![endif]-->
<input type="hidden" id="site_url" value="<?= site_url() ?>">
<input type="hidden" id="base_url" value="<?= base_url() ?>">
<div id="fixed_header">
    <div id="top_anchor" class="container is-fluid section">
        <div class="columns">
            <div class="column has-text-right head-top">
                <a href="mailto:ventas@innovaled.pe" style="margin-right: 0.7rem;">
                    <span class="icon is-small has-text-primary">
                        <i class="fa fa-envelope"></i>
                    </span>
                    ventas@innovaled.pe
                </a>
                <a>
            <span class="icon is-small has-text-primary">
                        <i class="fa fa-phone"></i>
                    </span>
                    01 393 4964
                </a>
            </div>
        </div>
    </div>

    <div id="top_menu" class="container is-fluid" style="margin-bottom: 15px;">
        <nav class="navbar">

            <div class="navbar-brand">
                <a href="<?= site_url() ?>" class="nav-item" style="font-size: 1.8rem;">
                    <img src="<?= site_url() ?>/web/img/LIP-min.png">
                </a>

                <div class="navbar-burger burger" data-target="navMenu" style="float: right;">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <?php if (isset($view_menu)): echo $view_menu;
            else: ?>

                <div class="nav-right navbar-menu" id="navMenu">
                    <a href="#productos" class="nav-item">
                        Productos
                    </a>
                    <a href="<?= site_url('info') ?>#nosotros" class="nav-item">
                        Nosotros
                    </a>
                    <a href="<?= site_url('info') ?>#clientes" class="nav-item">
                        Nuestros Clientes
                    </a>
                    <a href="<?= site_url('info') ?>#servicios" class="nav-item">
                        Servicios
                    </a>
                    <a href="<?= site_url('info') ?>#proyectos" class="nav-item">
                        Proyectos
                    </a>
                    <a href="<?= site_url('info') ?>#contacto" class="nav-item">
                        Contacto
                    </a>
                </div>

            <?php endif; ?>

        </nav>
    </div>
</div>


<?= isset($view_wrapper) ? $view_wrapper : '' ?>


<?= isset($view_content) ? $view_content : '' ?>


<?= isset($view_footer) ? $view_footer : '' ?>


<div class="cd-cart-container empty">
    <a href="#0" class="cd-cart-trigger">
        <ul class="count"> <!-- cart items count -->
            <li>0</li>
            <li>0</li>
        </ul> <!-- .count -->
    </a>

    <div class="cd-cart">
        <div class="wrapper">
            <header>
                <h2>Productos para cotizar</h2>
                <!--                <span class="undo">Productos Eliminados. <a href="#0">Deshacer</a></span>-->
            </header>

            <div class="body">
                <ul>
                    <!-- other products added to the cart -->
                </ul>
            </div>

            <footer>
                <a href="#0" class="checkout btn"><em>Enviar Cotizaci&oacute;n</em></a>
            </footer>
        </div>
    </div> <!-- .cd-cart -->
</div> <!-- cd-cart-container -->


<div id="cotizar_modal" class="modal">
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Cotizar Productos</p>
            <button class="delete close-bmodal" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label" for="cliente_nombre">Nombre y Apelidos *</label>
                        <p class="control">
                            <input id="cliente_nombre" name="cliente_nombre" type="text" class="input">
                        </p>
                        <p id="nombre_error" class="errors help is-danger"></p>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="cliente_correo">Correo *</label>
                        <p class="control">
                            <input id="cliente_correo" name="cliente_correo" type="email" class="input">
                        </p>
                        <p id="correo_error" class="errors help is-danger"></p>
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label" for="cliente_telefono">Tel&eacute;fono *</label>
                        <p class="control">
                            <input id="cliente_telefono" name="cliente_telefono" type="text" class="input">
                        </p>
                        <p id="telefono_error" class="errors help is-danger"></p>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="cliente_empresa">Nombre de la Empresa</label>
                        <p class="control">
                            <input id="cliente_empresa" name="cliente_empresa" type="text" class="input">
                        </p>
                        <p id="empresa_error" class="errors help is-danger"></p>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Importe</th>
                </tr>
                </thead>
                <tbody id="cliente_productos">

                </tbody>
            </table>

            <div class="field">
                <label class="label" for="cliente_mensaje">Observaciones</label>
                <p class="control">
                    <textarea id="cliente_mensaje" name="cliente_mensaje" class="textarea"></textarea>
                </p>
                <p id="mensaje_error" class="errors help is-danger"></p>
            </div>
        </section>
        <footer class="modal-card-foot">
            <button id="send_cotizacion_btn" class="button is-success">Enviarme Cotizaci&oacute;n</button>
            <button class="button close-bmodal">Cancelar</button>
        </footer>
    </div>
</div>


<div id="enviado_modal" class="modal">
    <div class="content notification is-success" style="width: 45%;">
        <button class="delete enviado_close"></button>
        <h5 class="title is-5"><span id="nombre_enviado"></span> en un momento le enviaremos la cotizacion a su correo.
            Si tiene alguna duda puede contactarnos a traves de nuestro numero de tel&eacute;fono 01 393 4964 o
            escribiendonos al correo <a href="mailto:ventas@innovaled.pe">ventas@innovaled.pe</a>.
            Muchas gracias</h5>
        <br>
        <div class="has-text-centered">
            <button class="button enviado_close is-info">Seguir en el Sitio</button>
        </div>

    </div>
</div>

<div id="loading_modal" class="modal">
    <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw has-text-primary"></i>
    <span class="sr-only">Loading...</span>
</div>

<script src="<?= base_url('web') ?>/js/vendor/modernizr-2.8.3.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= base_url('web') ?>/js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
<script src="<?= base_url('web') ?>/js/plugins.js"></script>
<script src="<?= base_url('web') ?>/js/bmodal.js"></script>
<script src="<?= base_url('web') ?>/cart/js/main.js"></script>
<script src="<?= base_url('web') ?>/js/main.js"></script>

<script>
    $(function () {

        $('#enviado_modal').bmodal({
            keyboard: false,
            click_dismiss: false,
        });

        $('#loading_modal').bmodal({
            keyboard: false,
            click_dismiss: false,
        });

        $('.enviado_close').on('click', function () {
            location.reload(true);
        });

        $('#send_cotizacion_btn').on('click', function () {
            var cliente_nombre = $('#cliente_nombre').val();
            var cliente_correo = $('#cliente_correo').val();
            var cliente_telefono = $('#cliente_telefono').val();
            var cliente_empresa = $('#cliente_empresa').val();
            var cliente_mensaje = $('#cliente_mensaje').val();

            $('.errors').hide();
            var has_error = false;
            var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (cliente_nombre == "") {
                $('#nombre_error').html('El campo Nombre y Apelidos es requerido');
                $('#nombre_error').show();
                has_error = true;
            }

            if (cliente_correo == "") {
                $('#correo_error').html('El campo Correo es requerido');
                $('#correo_error').show();
                has_error = true;
            }
            else if (!regex.test(cliente_correo)) {
                $('#correo_error').html('El campo Correo no es valido');
                $('#correo_error').show();
                has_error = true;
            }

            if (cliente_telefono == "") {
                $('#telefono_error').html('El campo Tel&eacute;fono es requerido');
                $('#telefono_error').show();
                has_error = true;
            }
            else if (isNaN(cliente_telefono)) {
                $('#telefono_error').html('El campo Tel&eacute;fono no es valido');
                $('#telefono_error').show();
                has_error = true;
            }


            if (has_error)
                return false;

            $('#send_cotizacion_btn').addClass('is-loading');
            var params = {
                'cliente_nombre': cliente_nombre,
                'cliente_correo': cliente_correo,
                'cliente_telefono': cliente_telefono,
                'cliente_empresa': cliente_empresa,
                'cliente_mensaje': cliente_mensaje
            };

            var url = $('#site_url').val() + 'cart/cotizar';

            $('#cotizar_modal').bmodal('hide');
            $('#loading_modal').bmodal('show');

            $.ajax({
                url: url,
                type: 'POST',
                headers: {
                    Accept: 'application/json'
                },
                data: params,
                success: function (data) {
                    $('#nombre_enviado').html(cliente_nombre);
                    $('#enviado_modal').bmodal('show');

                },
                complete: function (data) {
                    $('#loading_modal').bmodal('hide');
                    $('#send_cotizacion_btn').removeClass('is-loading');
                },
                error: function (data) {
                    $('#cotizar_modal').bmodal('show');
                    alert('Ha ocurrido un error 1.');
                }
            });
        });

    });
</script>

<?= isset($view_js) ? $view_js : '' ?>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = 'https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>

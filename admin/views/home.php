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

    <link rel="stylesheet" href="<?= base_url('web') ?>/bower_components/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?= base_url('web') ?>/js/chosen/chosen.min.css">
    <link rel="stylesheet" href="<?= base_url('web') ?>/bower_components/bulma/css/bulma.css">
    <link rel="stylesheet" href="<?= base_url('web') ?>/css/admin.css">

    <?= isset($view_header) ? $view_header : '' ?>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<div id="top_menu" class="container is-fluid" style="margin-bottom: 15px;">
    <nav class="navbar">

        <div class="navbar-brand">
            <a class="nav-item" style="font-size: 1.8rem;">
                ADMINISTRACI&Oacute;N
            </a>

            <div class="navbar-burger burger" data-target="navMenu" style="float: right;">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="nav-right navbar-menu" id="navMenu">
            <a href="<?= site_url('producto') ?>" class="nav-item">
                Productos
            </a>
            <a href="<?= site_url('precio') ?>" class="nav-item">
                Precios
            </a>
            <a href="<?= site_url('cotizador') ?>" class="nav-item">
                Cotizador
            </a>
            <a href="<?= site_url('user') ?>" class="nav-item">
                Usuarios
            </a>
            <a href="<?= site_url('login/out') ?>" class="nav-item">
                Salir
            </a>
        </div>

    </nav>
</div>

<section class="section">
    <div class="container is-fluid">
        <?= isset($view_content) ? $view_content : '' ?>
    </div>
</section>


<script src="<?= base_url('web') ?>/js/vendor/modernizr-2.8.3.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= base_url('web') ?>/js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
<script src="<?= base_url('web') ?>/js/plugins.js"></script>
<script src="<?= base_url('web') ?>/js/chosen/chosen.jquery.min.js"></script>
<script src="<?= base_url('web') ?>/js/main.js"></script>
<script src="<?= base_url('web') ?>/js/admin.js"></script>

<?= isset($view_js) ? $view_js : '' ?>

</body>
</html>

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
    <link rel="stylesheet" href="<?= base_url('web') ?>/css/comments.css">
    <link rel="stylesheet" href="<?= base_url('web') ?>/css/materials.css">
    <link rel="stylesheet" href="<?= base_url('web') ?>/css/cotiza.css">

    <style>

    </style>
    <?= isset($view_header) ? $view_header : '' ?>
</head>
<body>
<?= isset($view_menu) ? $view_menu : '' ?>


<?= isset($view_wrapper) ? $view_wrapper : '' ?>


<?= isset($view_content) ? $view_content : '' ?>


<?= isset($view_footer) ? $view_footer : '' ?>

<script src="<?= base_url('web') ?>/js/vendor/modernizr-2.8.3.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= base_url('web') ?>/js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
<script src="<?= base_url('web') ?>/js/plugins.js"></script>
<script src="<?= base_url('web') ?>/js/bmodal.js"></script>
</body>
</html>

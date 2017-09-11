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
    <link rel="stylesheet" href="<?= base_url('web') ?>/bower_components/bulma/css/bulma.css">
    <link rel="stylesheet" href="<?= base_url('web') ?>/css/main.css">

    <style>
        .container.is-fluid {
            margin: 0;
        }

        section {
            width: 255px;
            padding-right: 0;
            padding-left: 0;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

    <?= isset($view_header) ? $view_header : '' ?>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<div id="top_menu" class="container is-fluid" style="margin-bottom: 15px;">
    <nav class="navbar">

        <div class="navbar-brand nav-center">
            <a class="nav-item" style="font-size: 1.8rem;">
                INNOVALED ADMINISTRACI&Oacute;N
            </a>
        </div>
    </nav>
</div>

<section class="section">
    <div class="container is-fluid">
        <form action="<?= site_url('login/in') ?>" method="POST">
            <div class="field">
                <label class="label">Nombre de usuario</label>
                <div class="control has-icons-left has-icons-right">
                    <input id="username" class="input" name="username" type="text" placeholder="Usuario"
                           value="<?= set_value('username') ?>">
                    <span class="icon is-small is-left">
                        <i class="fa fa-user"></i>
                    </span>
                    <?= form_error('username', '<p class="help is-danger">', '</p>') ?>
                </div>
            </div>

            <div class="field">
                <label class="label">Contrase&ntilde;a</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" name="password" type="password" placeholder="Contrase&ntilde;a">
                    <span class="icon is-small is-left">
                        <i class="fa fa-asterisk"></i>
                        </span>
                </div>
                <?= form_error('password', '<p class="help is-danger">', '</p>') ?>
            </div>


            <div class="field">
                <p class="help is-danger"><?= $this->session->flashdata('errors') != NULL ? $this->session->flashdata('errors') : '' ?></p>
                <input type="submit" class="button is-info" value="Entrar" style="width: 100%;">
            </div>
        </form>
    </div>
</section>


<script src="<?= base_url('web') ?>/js/vendor/modernizr-2.8.3.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= base_url('web') ?>/js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
<script>
    $(function(){
        $('#username').focus();
    })
</script>
<?= isset($view_js) ? $view_js : '' ?>

</body>
</html>

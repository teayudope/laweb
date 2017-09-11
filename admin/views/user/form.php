<h4 class="title is-4"><?= $form_title ?></h4>
<hr>
<?php $action = isset($id) ? 'user/save/' . $id : 'user/save'; ?>
<form action="<?= site_url($action) ?>" method="POST" accept-charset="utf-8">

    <input type="hidden" name="user[id]" value="<?= isset($id) ? $id : '' ?>">

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Nombre de Usuario</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <input class="input" type="text" name="user[username]" <?= isset($user) ? 'readonly' : '' ?>
                           value="<?= set_value('user[username]', isset($user) ? $user->username : '') ?>">
                </div>
                <?= form_error('user[username]', '<p class="help is-danger">', '</p>') ?>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Nueva Contrase&ntilde;a</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <input class="input" type="password" name="user[password]"
                           value="<?= set_value('user[password]', '') ?>">
                </div>
                <?= form_error('user[password]', '<p class="help is-danger">', '</p>') ?>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Confirmar Contrase&ntilde;a</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <input class="input" type="password" name="confirm_password"
                           value="<?= set_value('confirm_password', '') ?>">
                </div>
                <?= form_error('confirm_password', '<p class="help is-danger">', '</p>') ?>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Estado</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <div class="select" style="width: 100%;">
                        <select name="user[status]" style="width: 100%;">
                            <option
                                    value="1"
                                <?= set_select('user[status]', '1', isset($user) && $user->status == 1 ? TRUE : FALSE) ?>>
                                Activo
                            </option>
                            <option
                                    value="0"
                                <?= set_select('user[status]', '0', isset($user) && $user->status == 0 ? TRUE : FALSE) ?>>
                                Inactivo
                            </option>
                        </select>
                        <?= form_error('user[status]', '<p class="help is-danger">', '</p>') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="columns">
        <div class="column has-text-centered"><a href="<?= site_url('user') ?>" class="button is-danger">Cancelar</a>
        </div>
        <div class="column has-text-centered"><input type="submit" class="button is-primary" value="Guardar"></div>
    </div>
</form>
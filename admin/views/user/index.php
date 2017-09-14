<h4 class="title is-4" style="margin-bottom: 6%;">
    Listado de Usuarios

    <span class="new-item">
        <a href="<?= site_url('user/form') ?>" class="button is-primary">Nuevo Usuario</a>
    </span>
</h4>

<table class="table is-striped">
    <thead>
    <tr style="border: 1px solid #dbdbdb;">
        <th>ID</th>
        <th>Usuario</th>
        <th>Estado</th>
        <th class=" has-text-right">Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr style="border-left: 1px solid #dbdbdb;border-right: 1px solid #dbdbdb;">
            <td><?= $user->id ?></td>
            <td><?= $user->username ?></td>
            <td><?= $user->status == 1 ? 'Activo' : 'Inactivo' ?></td>
            <td class="td-actions has-text-right" style="padding: 0.5em 0em;">
                <a href="<?= site_url('user/form/' . $user->id) ?>" style="margin-left: 0px;">
                <span class="icon">
                    <i class="fa fa-pencil" style="font-size: 16px;"></i>
                </span>
                </a>

                <?php if ($user->is_super != 1): ?>
                    <a href="<?= site_url('user/delete/' . $user->id) ?>" style="margin-left: 0px;" class="delete_confirm  has-text-danger">
                <span class="icon">
                    <i class="fa fa-trash" style="font-size: 16px;"></i>
                </span>
                    </a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
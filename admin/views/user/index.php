<h4 class="title is-4">
    Listado de Usuarios

    <span class="new-item">
        <a href="<?= site_url('user/form') ?>" class="button is-primary">Nuevo Usuario</a>
    </span>
</h4>

<table class="table is-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Estado</th>
        <th class=" has-text-right">Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= $user->username ?></td>
            <td><?= $user->status == 1 ? 'Activo' : 'Inactivo' ?></td>
            <td class="td-actions has-text-right">
                <a href="<?= site_url('user/form/' . $user->id) ?>">
                <span class="icon">
                    <i class="fa fa-pencil"></i>
                </span>
                </a>

                <?php if ($user->is_super != 1): ?>
                    <a href="<?= site_url('user/delete/' . $user->id) ?>" class="delete_confirm  has-text-danger">
                <span class="icon">
                    <i class="fa fa-trash"></i>
                </span>
                    </a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
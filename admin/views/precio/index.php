<h4 class="title is-4">
    Listado de Escalas de Precios

    <span class="new-item" style="margin-bottom: 6%;">
        <a href="<?= site_url('precio/form') ?>" class="button is-primary">Nueva Escala de Precio</a>
    </span>
</h4>

<table class="table is-striped">
    <thead>
    <tr style="border: 1px solid #dbdbdb;">
        <th>ID</th>
        <th>Producto</th>
        <th>Precio Base</th>
        <th>Mayor que</th>
        <th>% Descuento</th>
        <th>Descuento</th>
        <th>Nuevo Precio</th>
        <th class=" has-text-right">Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($precios as $precio): ?>
        <tr style="border-left: 1px solid #dbdbdb;border-right: 1px solid #dbdbdb;">
            <td><?= $precio->id ?></td>
            <td><?= $precio->producto->nombre ?></td>
            <td><?= $precio->producto->moneda == '1' ? 'S/' : '$' ?> <?= $precio->producto->precio ?></td>
            <td><?= $precio->desde ?></td>
            <td><?= $precio->porciento_descuento ?></td>
            <td><?= $precio->producto->moneda == '1' ? 'S/' : '$' ?> <?= $precio->producto->precio * $precio->porciento_descuento / 100 ?></td>
            <td><?= $precio->producto->moneda == '1' ? 'S/' : '$' ?> <?= $precio->producto->precio - ($precio->producto->precio * $precio->porciento_descuento / 100) ?></td>
            <td class="td-actions has-text-right" style="padding: 0.5em 0em;">
                <a href="<?= site_url('precio/form/' . $precio->id) ?>" style="margin-left: 0px;">
                <span class="icon">
                    <i class="fa fa-pencil" style="font-size: 16px;"></i>
                </span>
                </a>

                <a href="<?= site_url('precio/delete/' . $precio->id) ?>" style="margin-left: 0px;" class="delete_confirm  has-text-danger">
                <span class="icon">
                    <i class="fa fa-trash" style="font-size: 16px;"></i>
                </span>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<nav class="pagination" role="navigation" aria-label="pagination">
    <?= $pagination ?>
</nav>
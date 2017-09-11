<h4 class="title is-4">
    Listado de Escalas de Precios

    <span class="new-item">
        <a href="<?= site_url('precio/form') ?>" class="button is-primary">Nueva Escala de Precio</a>
    </span>
</h4>

<table class="table is-striped">
    <thead>
    <tr>
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
        <tr>
            <td><?= $precio->id ?></td>
            <td><?= $precio->producto->nombre ?></td>
            <td><?= $precio->producto->moneda == '1' ? 'S/' : '$' ?> <?= $precio->producto->precio ?></td>
            <td><?= $precio->desde ?></td>
            <td><?= $precio->porciento_descuento ?></td>
            <td><?= $precio->producto->moneda == '1' ? 'S/' : '$' ?> <?= $precio->producto->precio * $precio->porciento_descuento / 100 ?></td>
            <td><?= $precio->producto->moneda == '1' ? 'S/' : '$' ?> <?= $precio->producto->precio - ($precio->producto->precio * $precio->porciento_descuento / 100) ?></td>
            <td class="td-actions has-text-right">
                <a href="<?= site_url('precio/form/' . $precio->id) ?>">
                <span class="icon">
                    <i class="fa fa-pencil"></i>
                </span>
                </a>

                <a href="<?= site_url('precio/delete/' . $precio->id) ?>" class="delete_confirm  has-text-danger">
                <span class="icon">
                    <i class="fa fa-trash"></i>
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
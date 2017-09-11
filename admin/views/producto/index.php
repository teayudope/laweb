<h4 class="title is-4">
    Listado de Productos

    <span class="new-item">
        <a href="<?= site_url('producto/form') ?>" class="button is-primary">Nuevo Producto</a>
    </span>
</h4>

<table class="table is-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Producto</th>
        <th>Linea</th>
        <th>Sublinea</th>
        <th>Mostrar</th>
        <th>Orden</th>
        <th class=" has-text-right">Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?= $producto->id ?></td>
            <td><?= $producto->nombre ?></td>
            <td><?= $producto->linea_nombre ?></td>
            <td><?= $producto->sublinea_nombre ?></td>
            <td><?= $producto->estado == 1 ? 'SI' : 'NO' ?></td>
            <td><?= $producto->orden ?></td>
            <td class="td-actions has-text-right">
                <a href="<?= site_url('producto/show/' . $producto->id) ?>">
                <span class="icon">
                    <i class="fa fa-window-maximize"></i>
                </span>
                </a>

                <a href="<?= site_url('producto/form/' . $producto->id) ?>">
                <span class="icon">
                    <i class="fa fa-pencil"></i>
                </span>
                </a>

                <a href="<?= site_url('producto/delete/' . $producto->id) ?>" class="delete_confirm  has-text-danger">
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
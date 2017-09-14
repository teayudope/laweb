<h4 class="title is-4">
    Listado de Productos

    <span class="new-item">
        <a href="<?= site_url('producto/form') ?>" class="button is-primary">Nuevo Producto</a>
    </span>
</h4>

<form action="" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
<h4 class="title is-4" style="margin-top: 5%;">
    <span id="span-search" class="new-item" style="margin-bottom: 2%;">
        <a id="buscar" class="button is-primary">
            <span class="icon is-small">
                <i class="fa fa-search"></i>
            </span>
        </a>
    </span>
    <span id="inputsearch" class="new-item" style="float: right; display: none;margin-bottom: 1%;">
        <input id="search" name="search" class="input" type="text" placeholder="Nombre Producto" style="width: 84%; float: left;">
        <button type="submit" class="button is-primary" style="margin-top: 0%;float: left;margin-bottom: 6%;border-radius: 0px;">            <span class="icon is-small">
                <i class="fa fa-search"></i>
            </span></button>
    </span>
</h4>
</form>
<table class="table is-striped">
    <thead>
    <tr style="border: 1px solid #dbdbdb;">
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
        <tr style="border-left: 1px solid #dbdbdb;border-right: 1px solid #dbdbdb;">
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
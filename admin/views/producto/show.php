<h4 class="title is-4">
    Detalles del Producto


    <span class="new-item" style="margin-left: 15px;">
        <a href="<?= site_url('producto/form/' . $producto->id) ?>" class="button is-primary">Editar</a>
    </span>

    <span class="new-item">
        <a href="<?= site_url('producto') ?>" class="button is-danger">Atras</a>
    </span>
</h4>

<table class="table">
    <tbody>
    <tr>
        <th>ID</th>
        <td><?= $producto->id ?></td>
    </tr>
    <tr>
        <th>Nombre</th>
        <td><?= $producto->nombre ?></td>
    </tr>
    <tr>
        <th>Imagen Peque&ntilde;a</th>
        <td><img width="200" height="200" src="<?= base_url('web/uploads/productos/' . $producto->imagen_1) ?>"></td>
    </tr>
    <tr>
        <th>Imagen Grande</th>
        <td><img width="200" height="200" src="<?= base_url('web/uploads/productos/' . $producto->imagen_2) ?>"></td>
    </tr>
    <tr>
        <th>Linea</th>
        <td><?= $producto->linea_nombre ?></td>
    </tr>
    <tr>
        <th>Sublinea</th>
        <td><?= $producto->sublinea_nombre ?></td>
    </tr>
    <tr>
        <th>Marca</th>
        <td><?= $producto->marca ?></td>
    </tr>
    <tr>
        <th>Mostrar Precio</th>
        <td><?= $producto->mostrar_precio == 1 ? 'SI' : 'NO' ?></td>
    </tr>
    <tr>
        <th>Precio</th>
        <td><?= $producto->moneda == 1 ? 'S/ ' . $producto->precio : '$ ' . $producto->precio ?></td>
    </tr>
    <tr>
        <th>Ficha</th>
        <td><a target="_blank" href="<?= base_url('web/uploads/productos/' . $producto->ficha) ?>">Ver</a></td>
    </tr>
    <tr>
        <th>Descripci&oacute;n Corta</th>
        <td><?= $producto->descripcion_corta ?></td>
    </tr>
    <tr>
        <th>Descripci&oacute;n Larga</th>
        <td><?= $producto->descripcion_larga ?></td>
    </tr>
    <tr>
        <th>Mostrar</th>
        <td><?= $producto->estado == 1 ? 'SI' : 'NO' ?></td>
    </tr>
    <tr>
        <th>Orden</th>
        <td><?= $producto->orden ?></td>
    </tr>
    <tr>
        <th>Caract&eacute;risticas</th>
        <td>
            <?php foreach ($producto_datos as $dato): ?>

                <?= $dato->dato ?>: <?= $dato->valor ?>
                <br>
            <?php endforeach; ?>
        </td>
    </tr>

    </tbody>
</table>
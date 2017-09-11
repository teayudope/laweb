<h4 class="title is-4">
    Detalles de la Cotizaci&oacute;n

    <span class="new-item">
        <a href="<?= site_url('cotizador') ?>" class="button is-danger">Atras</a>
    </span>
</h4>

<table class="table">
    <tbody>
    <tr>
        <th>ID</th>
        <td><?= $cotizador->id ?></td>
        <th>Fecha</th>
        <td><?= date('d/m/Y H:i:s', strtotime($cotizador->fecha)) ?></td>
    </tr>
    <tr>
        <th>Nombre del Cliente</th>
        <td><?= $cotizador->nombre_cliente ?></td>
        <th>Correo</th>
        <td><?= $cotizador->correo ?></td>
    </tr>
    <tr>
        <th>Telefono</th>
        <td><?= $cotizador->telefono ?></td>
        <th>Empresa</th>
        <td><?= $cotizador->empresa != '' ? $cotizador->empresa : '-' ?></td>
    </tr>
    <tr>
        <th>Estado</th>
        <td><?= $cotizador->estado == 1 ? 'Pendiente' : 'Enviado' ?></td>
    </tr>
    <tr>
        <th>Observaciones</th>
        <td colspan="3"><?= $cotizador->mensaje != '' ? $cotizador->mensaje : '-' ?></td>
    </tr>
    </tbody>
</table>

<h3 class="title is-3">Productos</h3>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Importe</th>
        <th>Nuevo Precio</th>
        <th>Nuevo Importe</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($cotizador->productos as $producto): ?>
        <tr>
            <td><?= $producto->id ?></td>
            <td><?= $producto->nombre ?></td>
            <td><?= $producto->moneda == '1' ? 'S/' : '$' ?> <?= $producto->precio ?></td>
            <td><?= $producto->cantidad ?></td>
            <td><?= $producto->moneda == '1' ? 'S/' : '$' ?> <?= $producto->cantidad * $producto->precio ?></td>
            <td><?= $producto->moneda == '1' ? 'S/' : '$' ?> <?= $producto->nuevo_precio ?></td>
            <td><?= $producto->moneda == '1' ? 'S/' : '$' ?> <?= $producto->cantidad * $producto->nuevo_precio ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
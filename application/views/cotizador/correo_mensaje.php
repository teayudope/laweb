<h4 class="title is-4">
    Innovaled Cotizacion
</h4>

<table class="table">
    <tbody>
    <tr>
        <th>Fecha</th>
        <td><?= date('d/m/Y H:i:s', strtotime($cotizador->fecha)) ?></td>
    </tr>
    <tr>
        <th>Correo</th>
        <td><?= $cotizador->correo ?></td>
    </tr>
    <tr>
        <th>Nombre del Cliente</th>
        <td><?= $cotizador->nombre_cliente ?></td>
    </tr>
    </tbody>
</table>

<h3 class="title is-3">Productos</h3>
<table class="table">
    <thead>
    <tr>
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
            <td><?= $producto->nombre ?></td>
            <td><?= $producto->precio ?></td>
            <td><?= $producto->cantidad ?></td>
            <td><?= $producto->cantidad * $producto->precio ?></td>
            <td><?= $producto->nuevo_precio ?></td>
            <td><?= $producto->cantidad * $producto->nuevo_precio ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
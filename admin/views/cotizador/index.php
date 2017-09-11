<h4 class="title is-4">
    Listado de Cotizaciones
</h4>

<table class="table is-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Correo</th>
        <th>Nombre del Cliente</th>
        <th>Tel&eacute;fono</th>
        <th>Estado</th>
        <th class=" has-text-right">Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($cotizadores as $cotizador): ?>
        <tr>
            <td><?= $cotizador->id ?></td>
            <td><?= date('d/m/Y H:i:s', strtotime($cotizador->fecha)) ?></td>
            <td><?= $cotizador->correo ?></td>
            <td><?= $cotizador->nombre_cliente ?></td>
            <td><?= $cotizador->telefono ?></td>
            <td><?= $cotizador->estado == 1 ? 'Pendiente' : 'Enviado' ?></td>
            <td class="td-actions has-text-right">
                <a href="<?= site_url('cotizador/show/' . $cotizador->id) ?>">
                    <span class="icon">
                        <i class="fa fa-window-maximize"></i>
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
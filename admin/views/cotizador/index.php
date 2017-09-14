<h4 class="title is-4" style="margin-bottom: 6%;">
    Listado de Cotizaciones
</h4>

<table class="table is-striped">
    <thead>
    <tr style="border: 1px solid #dbdbdb;">
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
        <tr style="border-left: 1px solid #dbdbdb;border-right: 1px solid #dbdbdb;">
            <td><?= $cotizador->id ?></td>
            <td><?= date('d/m/Y H:i:s', strtotime($cotizador->fecha)) ?></td>
            <td><?= $cotizador->correo ?></td>
            <td><?= $cotizador->nombre_cliente ?></td>
            <td><?= $cotizador->telefono ?></td>
            <td><?= $cotizador->estado == 1 ? 'Pendiente' : 'Enviado' ?></td>
            <td class="td-actions has-text-right" style="padding: 0.5em 0em;">
                <a href="<?= site_url('cotizador/show/' . $cotizador->id) ?>" style="margin-left: 0px;">
                    <span class="icon">
                        <i class="fa fa-window-maximize" style="font-size: 16px;"></i>
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
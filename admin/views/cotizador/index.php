<h4 class="title is-4" style="margin-bottom: 6%;">
    Listado de Cotizaciones
</h4>
<form action="" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
<h4 class="title is-4" style="margin-top: 5%;">
    <span id="inputsearch" class="new-item" style="float: right; margin-bottom: 1%;">
        <input id="datedepart" name="datedepart" type="date" class="input" style="width: 83%; float: left;" value="<?php echo date('Y-m-d') ?>"/>
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
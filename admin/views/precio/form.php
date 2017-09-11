<h4 class="title is-4"><?= $form_title ?></h4>
<hr>
<?php $action = isset($id) ? 'precio/save/' . $id : 'precio/save'; ?>
<form action="<?= site_url($action) ?>" method="POST" accept-charset="utf-8">

    <input type="hidden" name="precio[id]" value="<?= isset($id) ? $id : '' ?>">

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Producto</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <select id="precio_producto_id" class="chosen-select" name="precio[producto_id]"
                            style="width: 100%;">
                        <option value=""></option>
                        <?php foreach ($productos as $p): ?>
                            <option
                                    value="<?= $p->id ?>"
                                    data-precio="<?= $p->precio ?>"
                                <?= set_select('precio[producto_id]', $p->id, isset($precio) && $precio->producto_id == $p->id ? TRUE : FALSE) ?>>
                                <?= $p->nombre ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('precio[producto_id]', '<p class="help is-danger">', '</p>') ?>
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Precio Base</label>
            </div>
            <div class="column is-8">
                <strong id="precio_base">Seleccione un producto</strong>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Mayor que</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <input class="input" type="text" name="precio[desde]"
                           value="<?= set_value('precio[desde]', isset($precio) ? $precio->desde : '') ?>">
                </div>
                <?= form_error('precio[desde]', '<p class="help is-danger">', '</p>') ?>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">% de Descuento</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <input id="porciento_descuento" class="input" type="text"
                           name="precio[porciento_descuento]"
                           value="<?= set_value('precio[porciento_descuento]', isset($precio) ? $precio->porciento_descuento : '') ?>">
                </div>
                <?= form_error('precio[porciento_descuento]', '<p class="help is-danger">', '</p>') ?>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Descuento</label>
            </div>
            <div class="column is-8">
                <strong id="descuento"></strong>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Nuevo Precio</label>
            </div>
            <div class="column is-8">
                <strong id="nuevo_precio"></strong>
            </div>
        </div>
    </div>

    <hr>

    <div class="columns">
        <div class="column has-text-centered"><a href="<?= site_url('precio') ?>" class="button is-danger">Cancelar</a>
        </div>
        <div class="column has-text-centered"><input type="submit" class="button is-primary" value="Guardar"></div>
    </div>
</form>
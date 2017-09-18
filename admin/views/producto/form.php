<h4 class="title is-4"><?= $form_title ?></h4>
<hr>
<?php $action = isset($id) ? 'producto/save/' . $id : 'producto/save'; ?>
<form action="<?= site_url($action) ?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
    <input type="hidden" name="producto[id]" value="<?= isset($id) ? $id : '' ?>">

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Nombre del Producto</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <input class="input" type="text" name="producto[nombre]"
                           value="<?= set_value('producto[nombre]', isset($producto) ? $producto->nombre : '') ?>">
                </div>
                <?= form_error('producto[nombre]', '<p class="help is-danger">', '</p>') ?>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Imagen Peque&ntilde;a</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <input class="input" type="file" name="imagen_1">
                    <?php if (isset($producto)): ?>
                        <img src="<?= base_url('web/uploads/productos/' . $producto->imagen_1) ?>" width="128"
                             height="128">
                    <?php endif; ?>
                </div>
                <?= isset($imagen_1_error) ? $imagen_1_error : '' ?>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Imagen Grande</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <input class="input" type="file" name="imagen_2">
                    <?php if (isset($producto)): ?>
                        <img src="<?= base_url('web/uploads/productos/' . $producto->imagen_2) ?>" width="128"
                             height="128">
                    <?php endif; ?>
                </div>
                <?= isset($imagen_2_error) ? $imagen_2_error : '' ?>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Galería</label>
                <input type="hidden" id="producto_datos" name="producto_datos" value="[]">
            </div>
            <div class="column is-8">
                <div class="columns">
                    <div class="column is-3">
                        <label class="label">Imagen</label>
                    </div>
                    <div class="column is-7">
                        <input class="input" type="file" name="imagen_n" id="add_titulo_i">
                    </div>
                    <div class="column is-2">
                        <button type="button" id="add_body_i"
                                class="button is-success">
                            <span><i class="fa fa-plus"></i></span>
                        </button>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Imagen</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="table_body_i">
                            <?php if (isset($producto_datos)): ?>
                                <?php foreach ($producto_datos as $dato): ?>
                                    <tr>
                                        <td><img src="<?= $dato->dato;?>"></td>
                                        <td>
                                            <button type="button" class="del_body_i button is-danger is-small"><span><i
                                                            class="fa fa-remove is-small"></i></span></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Linea</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <div class="select" style="width: 100%;">
                        <select name="producto[linea]" style="width: 100%;">
                            <?php foreach ($lineas as $linea): ?>
                                <option
                                        value="<?= $linea->id ?>"
                                    <?= set_select('producto[linea]', $linea->id, isset($producto) && $producto->linea == $linea->id ? TRUE : FALSE) ?>>
                                    <?= $linea->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('producto[linea]', '<p class="help is-danger">', '</p>') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Sublinea</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <div class="select" style="width: 100%;">
                        <select name="producto[sublinea]" style="width: 100%;">
                            <?php foreach ($sublineas as $sublinea): ?>
                                <option
                                        value="<?= $sublinea->id ?>"
                                    <?= set_select('producto[sublinea]', $sublinea->id, isset($producto) && $producto->sublinea == $sublinea->id ? TRUE : FALSE) ?>>
                                    <?= $sublinea->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('producto[sublinea]', '<p class="help is-danger">', '</p>') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Marca</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <input class="input" type="text" name="producto[marca]"
                           value="<?= set_value('producto[marca]', isset($producto) ? $producto->marca : '') ?>">
                </div>
                <?= form_error('producto[marca]', '<p class="help is-danger">', '</p>') ?>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Mostrar Precio</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <div class="select" style="width: 100%;">
                        <select name="producto[mostrar_precio]" style="width: 100%;">
                            <option
                                    value="1"
                                <?= set_select('producto[mostrar_precio]', '1', isset($producto) && $producto->mostrar_precio == 1 ? TRUE : FALSE) ?>>
                                Si
                            </option>
                            <option
                                    value="0"
                                <?= set_select('producto[mostrar_precio]', '0', isset($producto) && $producto->mostrar_precio == 0 ? TRUE : FALSE) ?>>
                                No
                            </option>
                        </select>
                        <?= form_error('producto[mostrar_precio]', '<p class="help is-danger">', '</p>') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Moneda</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <div class="select" style="width: 100%;">
                        <select name="producto[moneda]" style="width: 100%;">
                            <option
                                    value="1"
                                <?= set_select('producto[moneda]', '1', isset($producto) && $producto->moneda == 1 ? TRUE : FALSE) ?>>
                                Sol (S/)
                            </option>
                        </select>
                        <?= form_error('producto[moneda]', '<p class="help is-danger">', '</p>') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Precio</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <input class="input" type="text" name="producto[precio]"
                           value="<?= set_value('producto[precio]', isset($producto) ? $producto->precio : '') ?>">
                </div>
                <?= form_error('producto[precio]', '<p class="help is-danger">', '</p>') ?>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Ficha (PDF)</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <input class="input" type="file" name="ficha">

                </div>
                <?= isset($ficha_error) ? $ficha_error : '' ?>
            </div>
        </div>
    </div>


    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Descripci&oacute;n Corta</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <textarea class="textarea"
                              name="producto[descripcion_corta]"><?= set_value('producto[descripcion_corta]', isset($producto) ? $producto->descripcion_corta : '') ?></textarea>
                </div>
                <?= form_error('producto[descripcion_corta]', '<p class="help is-danger">', '</p>') ?>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Descripci&oacute;n Larga</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <textarea class="textarea"
                              name="producto[descripcion_larga]"><?= set_value('producto[descripcion_larga]', isset($producto) ? $producto->descripcion_larga : '') ?></textarea>
                </div>
                <?= form_error('producto[descripcion_larga]', '<p class="help is-danger">', '</p>') ?>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Mostrar Producto</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <div class="select" style="width: 100%;">
                        <select name="producto[estado]" style="width: 100%;">
                            <option
                                    value="1"
                                <?= set_select('producto[estado]', '1', isset($producto) && $producto->estado == 1 ? TRUE : FALSE) ?>>
                                Si
                            </option>
                            <option
                                    value="0"
                                <?= set_select('producto[estado]', '0', isset($producto) && $producto->estado == 0 ? TRUE : FALSE) ?>>
                                No
                            </option>
                        </select>
                        <?= form_error('producto[estado]', '<p class="help is-danger">', '</p>') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Orden</label>
            </div>
            <div class="column is-8">
                <div class="control">
                    <input class="input" type="text" name="producto[orden]"
                           value="<?= set_value('producto[orden]', isset($producto) ? $producto->orden : '') ?>">
                </div>
                <?= form_error('producto[orden]', '<p class="help is-danger">', '</p>') ?>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-4">
                <label class="label">Caracteristicas</label>
                <input type="hidden" id="producto_datos" name="producto_datos" value="[]">
            </div>
            <div class="column is-8">
                <div class="columns">
                    <div class="column is-4">
                        <label class="label">Titulo</label>
                    </div>
                    <div class="column is-6">
                        <input class="input" type="text" id="add_titulo" value="">
                    </div>
                    <div class="column is-2">
                        <button type="button" id="add_body"
                                class="button is-success">
                            <span><i class="fa fa-plus"></i></span>
                        </button>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-4"><label class="label">Valor</label></div>
                    <div class="column is-6">
                        <input class="input" type="text" id="add_valor" value="">
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Valor</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="table_body">
                            <?php if (isset($producto_datos)): ?>
                                <?php foreach ($producto_datos as $dato): ?>
                                    <tr>
                                        <td><?= $dato->dato ?></td>
                                        <td><?= $dato->valor ?></td>
                                        <td>
                                            <button type="button" class="del_body button is-danger is-small"><span><i
                                                            class="fa fa-remove is-small"></i></span></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="columns">
        <div class="column has-text-centered"><a href="<?= site_url('producto') ?>"
                                                 class="button is-danger">Cancelar</a>
        </div>
        <div class="column has-text-centered"><input type="submit" class="button is-primary" value="Guardar"></div>
    </div>
</form>


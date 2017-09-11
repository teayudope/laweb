<section class="section" id="productos_detalle">
    <div class="container is-fluid">
        <div class="columns">
            <div class="column has-text-centered is-5">
                <img src="<?= base_url('web/uploads/productos/' . $producto->imagen_2) ?>" height="256" width="256"/>
            </div>
            <div class="column is-1"></div>
            <div class="column is-6">
                <h2 class="title is-2"><span class="has-text-primary"><?= $producto->nombre ?></span></h2>

                <div class="columns">
                    <div class="column">
                        <small>Marca:</small>
                        <strong><?= $producto->marca ?></strong><br><br>
                    </div>
                    <div class="column has-text-right">
                        <?php if ($producto->ficha != ''): ?>
                            <a target="_blank" class="button is-info"
                               href="<?= base_url('web/uploads/productos/' . $producto->ficha) ?>">Ficha
                                T&eacute;cnica</a>
                        <?php endif; ?>
                    </div>
                </div>


                <h6 class="subtitle is-6"><?= $producto->descripcion_corta ?></h6>

                <strong>Aplicaciones: </strong>
                <small><?= $producto->descripcion_larga ?></small>
                <br>
                <br>
                <strong>Caract&eacute;risticas: </strong>
                <?php foreach ($producto_datos as $dato): ?>
                    <br>
                    <small><?= $dato->dato ?>: <?= $dato->valor ?></small>
                <?php endforeach; ?>
                <br><br>
                <div class="columns">
                    <div class="column">
                        <?php if ($producto->mostrar_precio == 1): ?>
                            <small>Precio:</small>
                            <strong><span style="font-size: 2rem;" class="has-text-primary">
                        <?= $producto->moneda == 1 ? 'S/ ' . $producto->precio : '$ ' . $producto->precio ?>
                    </span></strong>
                        <?php endif; ?>
                    </div>
                    <div class="column has-text-right">
                        <a
                                href="#0"
                                class="button cd-add-to-cart is-primary"
                                data-id="<?= $producto->id ?>"
                                data-name="<?= $producto->nombre ?>"
                                data-image="<?= base_url('web/uploads/productos/' . $producto->imagen_1) ?>"
                                data-moneda="<?= $producto->moneda == 1 ? 'S/' : '$' ?>"
                                data-price="<?= $producto->precio ?>">cotizar</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<section class="section" id="productos_relacionados">
    <h3 class="title is-3">PRODUCTOS RELACIONADOS
    </h3>
    <div class="container is-fluid">
        <div class="slider_producto">
            <?php foreach ($productos_relacionados as $pr): ?>
                <div class="slider_item">
                    <div class="box-image">
                        <img src="<?= base_url('web/uploads/productos/' . $pr->imagen_1) ?>" height="120" width="120"/>
                    </div>

                    <strong><?= $pr->nombre ?></strong>

                    <div class="desc"><?= $pr->descripcion_corta ?></div>

                    <span class="empresa"><?= $pr->marca ?></span>
                    <?php if ($pr->mostrar_precio == 1): ?>
                        <span class="precio has-text-primary"><?= $pr->moneda == 1 ? 'S/ ' . $pr->precio : '$ ' . $pr->precio ?></span>
                    <?php endif; ?>
                    <div style="clear: both;"></div>
                    <div class="ver_mas">
                        <a href="<?= site_url('producto/' . $pr->id . '/' . url_title($pr->nombre)) ?>"
                           class="button is-small is-info">Ver mas</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
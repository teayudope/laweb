<div style="width: 100%; background-color: #fafafa;">
    <section class="section back-gray" id="productos" style="max-width: 1100px;">
        <span class="title-line"></span>
        <h3 class="title is-3"><span class="h3-title back-gray">PRODUCTOS</span>
            <a class="back_button" href="#top_anchor">
            <span class="icon is-large">
                <i class="fa fa-arrow-circle-up"></i>
            </span>
            </a>
        </h3>
        <div class="container is-fluid">
            <div class="columns">
                <div class="column is-2">
                    <aside id="menu_dinamico" class="menu">
                        <ul class="menu-list">
                            <?php foreach ($lineas as $linea): ?>
                                <li><a href="#" data-menu="#submenu<?= $linea->id ?>"
                                       class="<?= $linea->id == $linea_activa ? 'is-active' : '' ?>">
                                        <?= $linea->name ?>
                                    </a></li>
                            <?php endforeach; ?>
                        </ul>
                    </aside>
                </div>
                <div class="column is-2 back-white">
                    <?php foreach ($lineas as $linea): ?>

                        <aside id="submenu<?= $linea->id ?>"
                               class="menu submenu <?= $linea->id == $linea_activa ? 'submenu-active' : '' ?>">
                            <h5 class="title is-5"><?= $linea->name ?></h5>

                            <ul class="menu-list menu-sub" style="overflow: scroll; overflow-x: hidden; height: 600px;">
                                <?php foreach ($sublineas as $sublinea): ?>
                                    <?php if ($linea->id == $sublinea->linea_id): ?>
                                        <li>
                                            <a href="#<?=$sublinea->id ?>" class="id_submenu <?= $sublinea->id == $sublinea_activa ? 'is-active' : '' ?>">
                                                <img src="<?= base_url('web/img/sublineas/' . $sublinea->image) ?>"
                                                     height="99" width="97"/><br>
                                                <?= $sublinea->name ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </aside>
                    <?php endforeach; ?>
                </div>


                <div id="load_content" class="column is-8 back-white">
                    <div class="columns">
                        <div class="column is-8"></div>
                        <div class="column">
                            <div class="has-text-right">
                                <div class="field">
                                    <div class="control has-icons-right">
                                        <input class="input is-small" type="text" value="">
                                        <span class="icon is-small is-right">
                                <i class="fa fa-search"></i>
                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns is-multiline">
                        <?php foreach ($productos as $producto): ?>
                            <div class="column is-4">
                                <div class="box">
                                    <div class="box-image">
                                        <img src="<?= base_url('web/uploads/productos/' . $producto->imagen_1) ?>"
                                             height="120" width="120"/>
                                    </div>

                                    <strong><?= $producto->nombre ?></strong>

                                    <div class="desc"><?= $producto->descripcion_corta ?></div>
                                    <div class="columns">
                                        <div class="column">
                                            <span class="empresa"><?= $producto->marca ?></span>
                                        </div>
                                        <div class="column has-text-right">
                                            <a href="<?= site_url('producto/' . $producto->id . '/' . url_title($producto->nombre)) ?>"
                                               class="button is-small is-info">Ver mas</a>
                                        </div>
                                    </div>

                                    <div class="has-text-centered" style="padding-bottom: 3px;">
                                        <?php if ($producto->mostrar_precio == 1): ?>
                                            <span class="has-text-primary" style="font-weight: bold; font-size: 1.4em;"><?= $producto->moneda == 1 ? 'S/ ' . $producto->precio : '$ ' . $producto->precio ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="cotizar-btn">
                                        <a
                                                href="#0"
                                                style="width: 100%;"
                                                class="button cd-add-to-cart is-primary"
                                                data-id="<?= $producto->id ?>"
                                                data-name="<?= $producto->nombre ?>"
                                                data-image="<?= base_url('web/uploads/productos/' . $producto->imagen_1) ?>"
                                                data-moneda="<?= $producto->moneda == 1 ? 'S/' : '$' ?>"
                                                data-price="<?= $producto->precio ?>">cotizar</a>
                                    </div>
                                    <div style="clear: both;"></div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
    </section>
</div>
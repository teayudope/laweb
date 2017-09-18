<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('producto_model');
        $this->load->model('linea_model');
        $this->load->model('sublinea_model');
    }

    public function hello($id = FALSE)
    {
        $productos = $this->producto_model->getProductosBySublinea($id);
                        $conten='                    <div class="columns">
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
                    </div><div class="columns is-multiline">';
                        foreach ($productos as $producto): ?>
                            <?php
                            $conten.='<div class="column is-4">
                                <div class="box">
                                    <div class="box-image">
                                        <img src="'.base_url('web/uploads/productos/' . $producto->imagen_1).'"
                                             height="120" width="120"/>
                                    </div>

                                    <strong>'.$producto->nombre.'</strong>

                                    <div class="desc">'.$producto->descripcion_corta.'</div>
                                    <div class="columns">
                                        <div class="column">
                                            <span class="empresa">'.$producto->marca.'</span>
                                        </div>
                                        <div class="column has-text-right">
                                            <a href="'.site_url('producto/' . $producto->id . '/' . url_title($producto->nombre)).'"
                                               class="button is-small is-info">Ver mas</a>
                                        </div>
                                    </div>

                                    <div class="has-text-centered" style="padding-bottom: 3px;">';
                                        if ($producto->mostrar_precio == 1):
                                            $conten.='<span class="has-text-primary" style="font-weight: bold; font-size: 1.4em;">'.($producto->moneda == 1 ? 'S/ ' . $producto->precio : '$ ' . $producto->precio).'</span>';
                                        endif;
                                        $conten.='
                                    </div>

                                    <div class="cotizar-btn">
                                        <a
                                                href="#0"
                                                style="width: 100%;"
                                                class="button cd-add-to-cart is-primary"
                                                data-id="'.$producto->id.'"
                                                data-name="'.$producto->nombre.'"
                                                data-image="'.base_url('web/uploads/productos/' . $producto->imagen_1).'"
                                                data-moneda="'.($producto->moneda == 1 ? 'S/' : '$' ).'"
                                                data-price="'.$producto->precio.'">cotizar</a>
                                    </div>
                                    <div style="clear: both;"></div>

                                </div>
                            </div>';
                        endforeach;
                        $conten.="</div>";
                        echo $conten;exit;
    }

    public function contacto(){
        $this->load->library('email');

        $content = "Cliente: ".$this->input->post('contacto_nombre')."<br>Telefono: ".$this->input->post('contacto_telefono')."<br>Mensaje:".$this->input->post('contacto_mensaje');

        $this->config->load('email', TRUE);
        $email_config = $this->config->item('email');

        $this->email->initialize($email_config);
        $this->email->from($email_config['from']);
        $this->email->to($this->input->post('contacto_correo'));
        $this->email->reply_to($email_config['reply_to']);
        $this->email->subject('Mensaje de Contacto');
        $this->email->message($content);
        $this->email->send();

        echo "Mensaje enviado con exito";exit;
    }

    public function index($id = FALSE)
    {
        if ($id == FALSE)
            $id = 1;

        $data['lineas'] = $this->linea_model->all();
        $data['sublineas'] = $this->sublinea_model->all();
        $data['productos'] = $this->producto_model->getProductosBySublinea($id);

        $data['linea_activa'] = $this->sublinea_model->getLinea($id);
        $data['sublinea_activa'] = $id;

        $this->load->setView('view_content', 'productos/index', $data);
        $this->load->setView('view_menu', 'productos/menu');
        $this->load->setView('view_js', 'productos/js');
        $this->load->setView('view_wrapper', 'sections/wrapper');
        $this->load->setView('view_footer', 'sections/footer');
        $this->load->renderView('home');
    }

    public function detail($id)
    {

        $data['producto'] = $this->producto_model->getProducto($id);
        $data['producto_datos'] = $this->db->get_where('producto_dato', array('producto_id' => $id))->result();
        $data['productos_relacionados'] = $this->producto_model->getProductosRelacionados($id);

        $js_data['cantidad_pr'] = count($data['productos_relacionados']);

        $this->load->setView('view_content', 'productos/detalles', $data);
        $this->load->setView('view_menu', 'productos/menu_detalle');
        $this->load->setView('view_js', 'productos/js_detalle', $js_data);
        $this->load->setView('view_footer', 'sections/footer');
        $this->load->renderView('home');
    }
}

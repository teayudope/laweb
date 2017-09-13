<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('cart');
        $this->load->model('producto_model');
        $this->load->model('cotizador_model');

        header('Content-Type: application/json');
    }

    public function enviar($id)
    {
        $this->cotizador_model->enviarCotizacion($id);
    }

    public function cotizar()
    {
        $params = array(
            'nombre_cliente' => $this->input->post('cliente_nombre'),
            'correo' => $this->input->post('cliente_correo'),
            'telefono' => $this->input->post('cliente_telefono'),
            'empresa' => $this->input->post('cliente_empresa'),
            'mensaje' => $this->input->post('cliente_mensaje'),
        );

        $productos = array();
        foreach ($this->cart->contents() as $items) {
            $productos[] = array(
                'producto_id' => $items['id'],
                'cantidad' => $items['qty'],
                'precio' => $items['price'],
            );
        }

        $id = $this->cotizador_model->cotizar($params, $productos);
        $this->cotizador_model->enviarCotizacion($id);

        $this->cart->destroy();
        echo json_encode(array(
            'success' => 'OK'
        ));
    }

    public function index()
    {
        foreach ($this->cart->contents() as $items) {
            $this->cart->update(array(
                'rowid' => $items['rowid']
            ));
        }

        echo json_encode(array('items' => $this->cart->contents()));
    }


    public function add()
    {
        $id = $this->input->post('id');
        $producto = $this->producto_model->getProducto($id);

        $data1 = array(
            'id' => $id,
            'options' => array('image' => $producto->imagen_1, 'currency' => 'S/')
        );

        $data = array(
            'id' => $id,
            'qty' => $this->input->post('cantidad'),
            'price' => $producto->precio,
            'rowid' => md5($data1['id'].serialize($data1['options'])),
            'name' => $producto->nombre,
            'options' => array('image' => $producto->imagen_1, 'currency' => 'S/')
        );
        $this->cart->product_name_rules = '[:print:]';
        $this->cart->insert($data);


        echo json_encode($data);

        //$rowid = md5($data['id'].serialize($data['options']));

        //echo json_encode(array('success' => 'OK'));
    }


    public function update()
    {
        $id = $this->input->post('id');

        $data = array(
            'rowid' => $id,
            'qty' => $this->input->post('cantidad')
        );
        $this->cart->product_name_rules = '[:print:]';
        $this->cart->update($data);

        echo json_encode($data);
    }

}

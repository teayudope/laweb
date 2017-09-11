<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizador_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function cotizar($params, $productos)
    {
        $params['fecha'] = date('Y-m-d H:i:s');
        $params['estado'] = 1;

        for ($i = 0; $i < count($productos); $i++) {
            $escala = $this->db->order_by('desde', 'ASC')->get_where('precio_escala', array(
                'producto_id' => $productos[$i]['producto_id'],
                'desde <=' => $productos[$i]['cantidad']
            ))->row();

            if ($escala != NULL)
                if ($escala->porciento_descuento > 0){
                    $productos[$i]['precio'] -= $productos[$i]['precio'] * $escala->porciento_descuento / 100;
                }
        }

        $this->db->insert('cotizador', $params);
        $cotizar_id = $this->db->insert_id();

        foreach ($productos as $producto) {

            $this->db->insert('cotizador_producto', array(
                'cotizador_id' => $cotizar_id,
                'producto_id' => $producto['producto_id'],
                'precio' => $producto['precio'],
                'cantidad' => $producto['cantidad']
            ));
        }

        return $cotizar_id;
    }

    public function enviarCotizacion($id)
    {
        $this->load->library('email');

        $cotizador = $this->db->get_where('cotizador', array('id' => $id))->row();
        $cotizador->productos = $this->db->select()->from('cotizador_producto as cp')
            ->join('producto as p', 'p.id = cp.producto_id')
            ->where('cp.cotizador_id', $id)
            ->get()->result();

        foreach ($cotizador->productos as $producto) {
            $producto->nuevo_precio = $producto->precio;
        }

        $data['cotizador'] = $cotizador;

        $this->config->load('email', TRUE);
        $email_config = $this->config->item('email');

        $this->email->initialize($email_config);
        $this->email->from($email_config['from']);
        $this->email->to($cotizador->correo);
        $this->email->reply_to($email_config['reply_to']);
        $this->email->subject('Innovaled Cotizacion');
        $this->email->message($this->load->view('cotizador/correo_mensaje', $data, TRUE));
        $this->email->send();

        $this->db->where('id', $id);
        $this->db->update('cotizador', array('estado' => 2));

    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getProductosBySublinea($id)
    {

        $productos = $this->db->get_where('producto', array(
            'sublinea' => $id,
            'estado' => 1
        ))->result();

        return $productos;
    }

    public function getProducto($id)
    {
        return $this->db->get_where('producto', array(
            'id' => $id
        ))->row();
    }

    public function getProductosRelacionados($id)
    {
        $producto = $this->getProducto($id);

        return $this->db->get_where('producto', array(
            'linea' => $producto->linea,
            'id !=' => $id
        ))->result();
    }

}

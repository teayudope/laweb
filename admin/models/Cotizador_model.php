<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizador_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->setup('cotizador', array('id', 'fecha', 'nombre_cliente', 'correo', 'telefono', 'empresa', 'mensaje', 'estado'));
    }

    public function getCotizacionDetalle($id)
    {
        $cotizador = $this->findByPk($id);
        $cotizador->productos = $this->db->select('
            p.id as id,
            p.nombre as nombre,
            p.moneda,
            p.precio as precio,
            cp.cantidad as cantidad,
            cp.precio as nuevo_precio
        ')->from('cotizador_producto as cp')
            ->join('producto as p', 'p.id = cp.producto_id')
            ->where('cp.cotizador_id', $id)
            ->get()->result();

        return $cotizador;
    }

}

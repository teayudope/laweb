<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Precio_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->setup('precio_escala', array('id', 'producto_id', 'desde', 'porciento_descuento'));
    }


    public function find($params = array())
    {
        $temp = parent::find($params);
        $this->load->model('producto_model');

        foreach ($temp as $t) {
            $t->producto = $this->producto_model->findByPk($t->producto_id);
        }

        return $temp;
    }
}

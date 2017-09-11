<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_dato_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->setup('producto_dato', array('id', 'producto_id', 'dato', 'valor', 'orden'));
    }
}

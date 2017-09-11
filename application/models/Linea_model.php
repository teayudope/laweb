<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linea_model extends CI_Model
{

    private $_linea = array();

    public function __construct()
    {
        parent::__construct();
        $this->setup();
    }

    public function all()
    {
        return $this->_linea;
    }

    public function findByPk($id)
    {
        foreach ($this->_linea as $linea) {
            if ($linea->id == $id)
                return $linea;
        }
    }

    public function setup()
    {
        require 'data.php';
        $this->_linea = $_lineas;
    }


}

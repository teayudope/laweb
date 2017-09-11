<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sublinea_model extends CI_Model
{

    private $_sublinea = array();

    public function __construct()
    {
        parent::__construct();
        $this->setup();
    }

    public function all()
    {
        return $this->_sublinea;
    }

    public function findByPk($id)
    {
        foreach ($this->_sublinea as $sublinea) {
            if ($sublinea->id == $id)
                return $sublinea;
        }
    }

    public function findByLinea($linea_id)
    {
        $temp = array();
        foreach ($this->_sublinea as $sublinea) {
            if ($sublinea->linea_id == $linea_id)
                $temp[] = $sublinea;
        }

        return $temp;
    }


    public function setup()
    {

        require 'data.php';
        $this->_sublinea = $_sublineas;
    }

}

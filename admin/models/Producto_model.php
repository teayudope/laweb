<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->setup('producto', array('id', 'nombre', 'slug', 'imagen_1', 'imagen_2', 'linea', 'sublinea',
            'marca', 'precio', 'mostrar_precio', 'moneda', 'ficha', 'descripcion_corta', 'descripcion_larga',
            'estado', 'orden'));
    }

    public function find($params = array())
    {
        $temp = parent::find($params);
        $this->load->model('linea_model');
        $this->load->model('sublinea_model');

        foreach ($temp as $t) {
            $linea = $this->linea_model->findByPk($t->linea);
            $t->linea_nombre = $linea->name;

            $sublinea = $this->sublinea_model->findByPk($t->sublinea);
            $t->sublinea_nombre = $sublinea->name;
        }

        return $temp;
    }

    public function findByPk($id)
    {
        $temp = parent::findByPk($id);
        $this->load->model('linea_model');
        $this->load->model('sublinea_model');

        $linea = $this->linea_model->findByPk($temp->linea);
        $temp->linea_nombre = $linea->name;

        $sublinea = $this->sublinea_model->findByPk($temp->sublinea);
        $temp->sublinea_nombre = $sublinea->name;

        return $temp;
    }

}

<?php

/**
 * Created by PhpStorm.
 * User: toshiba
 * Date: 8/5/17
 * Time: 1:04 PM
 */
class MY_Loader extends CI_Loader
{
    private $_partials = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function setView($name, $view, $vars = array())
    {
        $this->_partials[$name] = $this->view($view, $vars, TRUE);
    }

    public function renderView($view)
    {
        return $this->view($view, $this->_partials);
    }
}
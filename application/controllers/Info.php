<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class info extends CI_Controller
{


    public function index()
    {

        $this->load->setView('view_content', 'info/index');
        $this->load->setView('view_menu', 'info/menu');
        $this->load->setView('view_js', 'info/js');
		$this->load->setView('view_footer', 'sections/footer');
        $this->load->renderView('home');
    }
}

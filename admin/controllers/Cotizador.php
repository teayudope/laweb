<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizador extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->user_model->isLogging())
            redirect('login');

        $this->load->model('cotizador_model');
    }

    public function index($page = 0)
    {
        $fecha =  date('Y-m-d');
        if ($this->input->post('datedepart')!=""){
            $fecha = $this->input->post('datedepart');
            $this->db->where('DATE(fecha)',$fecha);
        }
        $this->load->library('pagination');
        $config['base_url'] = site_url('cotizador/index');
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->db->count_all_results('cotizador');
        $config['per_page'] = 10;
        $config['full_tag_open'] = '<ul class="pagination-list">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li><a class="pagination-link is-current" aria-label="" aria-current="page">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li><span class="pagination-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['first_link'] = '';
        $config['last_link'] = '';
        $config['next_link'] = '<span class="pagination-next">Siguiente</span>';
        $config['prev_link'] = '<span class="pagination-previous">Anterior</span>';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['cotizadores'] = $this->cotizador_model->find(array(
            'where' => array('DATE(fecha)'=> $fecha),
            'order' => 'id',
            'order_type' => 'DESC',
            'limit' => $config['per_page'],
            'offset' => $page
        ));

        $this->load->setView('view_content', 'cotizador/index', $data);
        $this->load->renderView('home');
    }

    public function show($id)
    {
        $data['cotizador'] = $this->cotizador_model->getCotizacionDetalle($id);

        $this->load->setView('view_content', 'cotizador/show', $data);
        $this->load->renderView('home');
    }
}

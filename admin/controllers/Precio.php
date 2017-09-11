<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Precio extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->user_model->isLogging())
            redirect('login');

        $this->load->model('precio_model');
        $this->load->model('producto_model');
    }

    public function index($page = 0)
    {

        $this->load->library('pagination');
        $config['base_url'] = site_url('precio/index');
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->db->count_all_results('precio_escala');
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

        $data['precios'] = $this->precio_model->find(array(
            'order'=>'producto_id, desde',
            'order_type'=>'ASC',
            'limit' => $config['per_page'],
            'offset' => $page
            ));
        $this->load->setView('view_content', 'precio/index', $data);
        $this->load->renderView('home');
    }

    public function form($id = FALSE)
    {
        if ($id == FALSE) {
            $data['form_title'] = 'Nueva Escala de Precio';
            $data['id'] = '';
        } else {
            $data['form_title'] = 'Editar Escala de Precio';
            $data['id'] = $id;
            $data['precio'] = $this->precio_model->findByPk($id);
        }

        $data['productos'] = $this->producto_model->find();

        $this->load->setView('view_js', 'precio/js');
        $this->load->setView('view_content', 'precio/form', $data);
        $this->load->renderView('home');
    }

    public function save($id = FALSE)
    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('precio[producto_id]', 'Producto', 'required');
        $this->form_validation->set_rules('precio[desde]', 'Desde', 'required|integer|is_natural_no_zero');
        $this->form_validation->set_rules('precio[porciento_descuento]', '% de Descuento', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->form($id);
        } else {
            $this->precio_model->setByArray($this->input->post('precio'));

            if ($id == FALSE) {
                $this->precio_model->insert();
            } else {
                $this->precio_model->update();
            }

            redirect('precio');
        }
    }

    public function delete($id)
    {
        $this->precio_model->set('id', $id);
        $this->precio_model->delete();
        redirect('precio');
    }
}

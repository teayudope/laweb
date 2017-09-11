<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->user_model->isLogging())
            redirect('login');
    }

    public function index()
    {
        $data['users'] = $this->user_model->find();
        $this->load->setView('view_content', 'user/index', $data);
        $this->load->renderView('home');
    }

    public function form($id = FALSE)
    {

        if ($id == FALSE) {
            $data['form_title'] = 'Nuevo Usuario';
            $data['id'] = '';
        } else {
            $data['form_title'] = 'Editar Usuario';
            $data['id'] = $id;
            $data['user'] = $this->user_model->findByPk($id);
        }

        $this->load->setView('view_content', 'user/form', $data);
        $this->load->renderView('home');
    }

    public function save($id = FALSE)
    {

        $this->load->library('form_validation');

        if ($id == FALSE)
            $this->form_validation->set_rules('user[username]', 'Nombre de usuario', 'required|max_length[45]|is_unique[user.username]');
        $this->form_validation->set_rules('user[password]', 'Nueva Contrase&ntilde;a', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirmar Contrase&ntilde;a', 'required|matches[user[password]]');
        $this->form_validation->set_rules('user[status]', 'Estado', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->form($id);
        } else {
            $this->user_model->setByArray($this->input->post('user'));
            $this->user_model->set('password', md5($this->user_model->get('password')));

            if ($id == FALSE) {
                $this->user_model->set('is_super', '0');
                $this->user_model->insert();
            } else {
                $is_super = $this->user_model->getSuper($id);
                if ($is_super == 1)
                    $this->user_model->set('status', 1);
                $this->user_model->set('is_super', $is_super);
                $this->user_model->update();
            }

            redirect('user');
        }
    }

    public function delete($id)
    {
        $this->user_model->set('id', $id);
        $this->user_model->delete();
        redirect('user');
    }
}

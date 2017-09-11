<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->load->renderView('login');
    }

    public function in()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Nombre de usuario', 'required');
        $this->form_validation->set_rules('password', 'Contrase&ntilde;a', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $user = $this->user_model->findOne(array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password'))
            ));

            if ($user != NULL) {
                $this->session->set_userdata('user_id', $user->id);
                redirect('');
            } else {
                $this->session->set_flashdata('errors', 'El usuario y/o contrase&ntilde;a no coinciden.');
                redirect('login');
            }
        }

    }

    public function out()
    {
        $this->session->unset_userdata('user_id');
        header('Location: http://localhost/innovaled');
    }
}

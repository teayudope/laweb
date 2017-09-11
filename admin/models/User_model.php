<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->setup('user', array('id', 'username', 'password', 'is_super', 'status'));
    }

    public function isLogging()
    {
        if ($this->session->has_userdata('user_id'))
            return TRUE;
        else
            return FALSE;
    }

    public function getSuper($id)
    {
        $user = $this->findByPk($id);
        return $user->is_super;
    }

}

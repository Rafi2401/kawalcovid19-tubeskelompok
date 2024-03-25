<?php

class Dashboard extends CI_Controller {
 
	public function __construct() {
        parent::__construct();
        $this->load->model('m_login');
    }

    public function index() {
        if($this->m_login->logged_id()) {
            $this->load->view("dashboard");         
        }else {
            redirect("login");
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}

?>
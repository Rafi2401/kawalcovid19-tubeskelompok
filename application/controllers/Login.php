<?php

class Login extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_login');
    }

    public function index(){

        if($this->m_login->logged_id()){
            redirect("dashboard");
        }else{
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

            if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post("username", TRUE);
                $password = $this->input->post('password', TRUE);

				$checking = $this->m_login->check_login('admin', array('username' => $username), array('password' => $password));
				
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {
                        $session_data = array(
                            'admin_id'   => $apps->id,
                            'admin_nama' => $apps->nama,
                            'admin_username' => $apps->username,
                            'admin_pass' => $apps->password,
						);
						
                        $this->session->set_userdata($session_data);
                        redirect('dashboard/');
                    }
                }else{
                    $this->load->view('login');
                }
            }else{

                $this->load->view('login');
            }
        }
    }
}

?>
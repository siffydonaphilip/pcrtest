<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class Login extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Login_Model');
        $this->load->library('session');
    }

    /*************************************
    * Detail : Login Page View           *
    * Date   : 24-06-2021                *
    *************************************/
	public function index()
	{
		$this->load->view('login/login');
	}

	/*************************************
	* Detail : Login Submit              *
	* Date   : 24-06-2021                *
	*************************************/
	public function loginaction()
	{
		$username      = $this->input->post('username');
		$password      = md5($this->input->post('password'));

		$admin_details = $this->Login_Model->login_admin($username, $password);

		if (empty($admin_details)) {
            // $this->session->set_flashdata('log_err_msg', "Invalid Credentials.");
            redirect(base_url());
        } else {
        	foreach ($admin_details as $key => $value) {
        		$this->session->set_userdata("admin_id", $value->id);
            	$this->session->set_userdata("username", $value->username);
            	$this->session->set_userdata("f_name", $value->f_name);
            	$this->session->set_userdata("l_name", $value->l_name);
            	$this->session->set_userdata("language", $value->language);
            	$this->session->set_userdata("dash", $value->dash);
            	$this->session->set_userdata("pcr_test", $value->pcr_test);
            	$this->session->set_userdata("ipc", $value->ipc);
            	$this->session->set_userdata("lab", $value->lab);
            	$this->session->set_userdata("test_result", $value->test_result);
            	$this->session->set_userdata("user", $value->user);
        	}

        	redirect(base_url('dashboard'));
        }
	}

    /************************************
    * Detail : Logout                   *
    * Date   : 24-06-2021               *
    ************************************/
    public function logout()
    {   
        foreach (array_keys($this->session->userdata) as $key)
        {
            $this->session->unset_userdata($key);
        }
        redirect(base_url('login'));
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Dashboard_Model');
        $this->load->model('Lab_Model');
        
    }
	
	/***********************************
	* Detail : Dashboard View          *
	* Date   : 24-06-2021              *
	***********************************/
	public function index()
	{
		if ($this->session->userdata('admin_id') != "") {
			$data['title'] = "Dashboard";
			$data['menu']  = "dash_board";

			$data['today_positive']     = 0;
            $data['today_negative']     = 0;
            $data['today_samplereject'] = 0;

            // Todays Result Details
            $today_result = $this->Dashboard_Model->get_todayrsltdetail();
			foreach ($today_result as $key => $value) {
                if ($value->result_status == 1) {
                    $data['today_positive']     = $value->num_patients;
                }
                elseif ($value->result_status == 2) {
                    $data['today_negative']     = $value->num_patients;
                }
                elseif ($value->result_status == 3) {
                    $data['today_samplereject'] = $value->num_patients;
                }
            }

            $data['totl_pendng']       = 0;
            $data['totl_positive']     = 0;
            $data['totl_negative']     = 0;
            $data['totl_samplereject'] = 0;
            $data['totl_samples']      = 0;
            // Total Result Details
            $total_result = $this->Dashboard_Model->get_totalrsltdetail();
            foreach ($total_result as $key => $value2) {
            	if ($value2->result_status == 0) {
            		$data['totl_pendng']       = $value2->num_patients;
            	}
                elseif ($value2->result_status == 1) {
                    $data['totl_positive']     = $value2->num_patients;
                }
                elseif ($value2->result_status == 2) {
                    $data['totl_negative']     = $value2->num_patients;
                }
                elseif ($value2->result_status == 3) {
                    $data['totl_samplereject'] = $value2->num_patients;
                }
            }

            $data['totl_samples'] = $data['totl_pendng'] + $data['totl_positive'] + $data['totl_negative'] + $data['totl_samplereject'];

			$this->load->view('dashboard/dashboard', $data);
		}
		else {
			redirect(base_url('login'));
		}
	}
	
// ------------------nahas------------------------------------	
	public function user()
	{
		if ($this->session->userdata('admin_id') != "") {
            $data = array(
                'title' => "User",
                'menu'  => "user"
            );

            // $data['todaylab_pending']  = $this->Lab_Model->get_todaylabpending();
            // $data['todaylab_complete'] = $this->Lab_Model->get_todaylabcomplete();
            // $data['today_totalentry']  = $data['todaylab_pending'] + $data['todaylab_complete'];
            $data['comp'] = $this->Dashboard_Model->commonedit_modalvalue_new();

            $this->load->view('user/index', $data);
        }
        else {
            redirect(base_url('login'));
        }
	}
	
	
}

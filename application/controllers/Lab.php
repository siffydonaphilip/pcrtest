<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class Lab extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Lab_Model');
    }

    /*************************************
    * Detail : Lab                       *
    * Date   : 25-06-2021                *
    *************************************/
	public function index()
	{
		if ($this->session->userdata('admin_id') != "") {
            $data = array(
                'title' => "Lab",
                'menu'  => "lab"
            );

            $data['todaylab_pending']  = $this->Lab_Model->get_todaylabpending();
            $data['todaylab_complete'] = $this->Lab_Model->get_todaylabcomplete();
            $data['today_totalentry']  = $data['todaylab_pending'] + $data['todaylab_complete'];

            $this->load->view('lab/index', $data);
        }
        else {
            redirect(base_url('login'));
        }
	}

    /*************************************
    * Detail : Lab List                  *
    * Date   : 25-06-2021                *
    *************************************/
    public function lab_list()
    {
        $data   = array();
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $tbl    = 'qhospital_pcrtest';
        $wt     = 'id';
        $how    = 'DESC';
        $sl     = 0;
        $fields = array('system_id', 'id_no', 'patient_name', 'gender', 'phone_no', 'sample_id', 'hesn_id', 'remarks');
        $lab = $this->Lab_Model->labListz($tbl,$wt,$how,$fields);
        foreach ($lab->result() as $key => $r) {

            if ($_POST['a_tab'] == "lab_pendg") {
               $data[] = array(
                    $key + 1,
                    isset($r->system_id) ? $r->system_id : '',
                    isset($r->id_no) ? $r->id_no : '',
                    isset($r->patient_name) ? $r->patient_name : '',
                    isset($r->gender) ? $r->gender : '',
                    isset($r->phone_no) ? $r->phone_no : '',
                    isset($r->sample_id) ? $r->sample_id : '',
                    isset($r->hesn_id) ? $r->hesn_id : '',
                    isset($r->remarks) ? $r->remarks : '',
                    '<button class="btn btn-outline-success btn-sm mr-1" id="lab_acknowldg" data-id="'.$r->id.'">Acknowledgement</a>'
                );
            }
            elseif ($_POST['a_tab'] == "lab_complt") {
                $data[] = array(
                    $key + 1,
                    isset($r->system_id) ? $r->system_id : '',
                    isset($r->id_no) ? $r->id_no : '',
                    isset($r->patient_name) ? $r->patient_name : '',
                    isset($r->gender) ? $r->gender : '',
                    isset($r->phone_no) ? $r->phone_no : '',
                    isset($r->sample_id) ? $r->sample_id : '',
                    isset($r->hesn_id) ? $r->hesn_id : '',
                    isset($r->remarks) ? $r->remarks : ''
                );
            }
            
        }
        $output = array(
            "draw"            => $draw,
            "recordsTotal"    => $this->Lab_Model->countall($tbl),
            "recordsFiltered" => $this->Lab_Model->countfilter($tbl,$wt,$how,$fields),
            "data"            => $data
        );
        echo json_encode($output);
    }

    /*************************************
    * Detail : If Lab has Acknowledged   *
    * Date   : 25-06-2021                *
    *************************************/
    public function acknowledgement()
    {
        $ack_status = $this->Lab_Model->lab_acknowledge($_REQUEST);
        echo $ack_status;
    }

}

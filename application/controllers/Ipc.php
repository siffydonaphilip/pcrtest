<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class Ipc extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Ipc_Model');
    }

    /*************************************
    * Detail : IPC                       *
    * Date   : 25-06-2021                *
    *************************************/
	public function index()
	{
		if ($this->session->userdata('admin_id') != "") {
            $data = array(
                'title' => "IPC",
                'menu'  => "ipc"
            );

            $data['today_pending']  = $this->Ipc_Model->get_todayipc_pending();
            $data['today_complete'] = $this->Ipc_Model->get_todayipc_complete();
            $data['today_totalpcr'] = $data['today_pending'] + $data['today_complete'];

            $this->load->view('ipc/index', $data);
        }
        else {
            redirect(base_url('login'));
        }
	}

    /*************************************
    * Detail : IPC List                  *
    * Date   : 25-06-2021                *
    *************************************/
    public function ipc_list()
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
        $ipc = $this->Ipc_Model->ipcListz($tbl,$wt,$how,$fields);
        foreach ($ipc->result() as $key => $r) {

            if ($_POST['a_tab'] == "ipc_pendg") {
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
                    '<a href="javascript:ipc_editFun('. $r->id .')" class="btn btn-outline-warning btn-sm mr-1">Update</a>'
                );
            }
            elseif ($_POST['a_tab'] == "ipc_complt") {
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
            "recordsTotal"    => $this->Ipc_Model->countall($tbl),
            "recordsFiltered" => $this->Ipc_Model->countfilter($tbl,$wt,$how,$fields),
            "data"            => $data
        );
        echo json_encode($output);
    }

    /*************************************
    * Detail : IPC Update                *
    * Date   : 25-06-2021                *
    *************************************/
    public function ipcupdate()
    {
        $id = $this->Ipc_Model->ipc_update($_REQUEST);
        redirect(base_url('ipc'));
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class Pcrtest extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Pcrtest_Model'); 
    }
	
	/***********************************
	* Detail : PCR Test                *
	* Date   : 24-06-2021              *
	***********************************/
	public function index()
	{
		if ($this->session->userdata('admin_id') != "") {
			$data = array(
				'title' => "PCR Test",
				'menu'  => "pcr_test"
			);

            $data['nationlty'] = $this->Pcrtest_Model->get_nationlty();

			$this->load->view('pcr_test/index', $data);
		}
		else {
			redirect(base_url('login'));
		}
	}

	/************************************
	* Detail : PCR Test List            *
	* Date   : 24-06-2021               *
	************************************/
	public function pcrtest_list()
    {
        $data   = array();
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $tbl    = 'qhospital_pcrtest';
        $wt     = 'id';
        $how    = 'DESC';
        $sl     = 0;
        $fields = array('id_no', 'patient_name', 'gender', 'phone_no', 'collection_time','passport_number');
        $pcrtests = $this->Pcrtest_Model->pcrtestListz($tbl,$wt,$how,$fields);
        foreach ($pcrtests->result() as $key => $r) {

            $data[] = array(
                $key + 1,
                isset($r->id_no) ? $r->id_no : '',
                isset($r->patient_name) ? $r->patient_name : '',
                isset($r->gender) ? $r->gender : '',
                isset($r->phone_no) ? $r->phone_no : '',
                isset($r->passport_number) ? $r->passport_number : '', // Added on 01-07-2021
                isset($r->collection_time) ? date('d-m-Y H:i:s', strtotime($r->collection_time)) : '',
                '<a href="javascript:pcrtest_editFun('. $r->id .')" class="btn btn-outline-warning btn-sm mr-1">Update</a>'
            );
        }
        $output = array(
            "draw"            => $draw,
            "recordsTotal"    => $this->Pcrtest_Model->countall($tbl),
            "recordsFiltered" => $this->Pcrtest_Model->countfilter($tbl,$wt,$how,$fields),
            "data"            => $data
        );
        echo json_encode($output);
    }

    /*************************************
    * Detail : New PCR Test Submit       *
    * Date   : 24-06-2021                *
    *************************************/
    public function newpcrtest_submit()
    {   
        $id = $this->Pcrtest_Model->newpcr_submit($_REQUEST);
        redirect(base_url('pcrtest'));
    }

    /*************************************
    * Detail : PCR Test Update           *
    * Date   : 24-06-2021                *
    *************************************/
    public function pcrtest_update()
    {
        $id = $this->Pcrtest_Model->pcr_update($_REQUEST);
        redirect(base_url('pcrtest'));
    }

    /***********************************
	* Detail : Get data for PCR Test   *
	              Edit Modal           *
	* Date   : 24-06-2021              *
	***********************************/
	public function PcrUpdate_Modal()
	{
		$data = array();
		if (isset($_REQUEST['id'])) {
            $data['view'] = $this->Pcrtest_Model->getpcrdetails($_REQUEST['id']);
        }
        echo json_encode($data);
	}

}

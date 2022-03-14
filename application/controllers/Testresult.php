<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class Testresult extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('html');
        $this->load->model('Testresult_Model');
    }
	
	/***********************************
	* Detail : Test Result             *
	* Date   : 24-06-2021              *
	***********************************/
	
	public function tt()
    {
 /*  $name ='Robin';
   $m='Negative';
   $base_url='www.google.com';
   $pdfdata='www.google.com';
   $mobileno='0560698756';

  $message='Hi '.$name.' your PCR Test result is '.$m.' .You can view your result at '.$base_url.'hm/ar/'.$pdfdata; 

   $message = urlencode($message);
   $url = 'http://www.strust.com/httpSmsProvider.aspx?username=ahhsw&password=AHHam2323&mobile='.$mobileno.'&unicode=E&message='.$message.'&sender=ALHAMMADI';


    $ch = curl_init();                       // initialize CURL
        curl_setopt($ch, CURLOPT_POST, false);    // Set CURL Post Data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        print_r($output);
        curl_close($ch);                         // Close CURL

        // Use file get contents when CURL is not installed on server.
        if(!$output){
           $output =  file_get_contents($smsgatewaydata);  
        }*/
    
    
   


  
}
	public function index()
	{
		if ($this->session->userdata('admin_id') != "") {
            $data = array(
                'title' => "Test Result",
                'menu'  => "test_result"
            );
            
            $data['today_positive']     = 0;
            $data['today_negative']     = 0;
            $data['today_samplereject'] = 0;

            $today_result = $this->Testresult_Model->get_todayrsltdetail();
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

			$this->load->view('test_result/index', $data);
		}
		else {
			redirect(base_url('login'));
		}
	}

	/************************************
	* Detail : Test Result List         *
	* Date   : 24-06-2021               *
	************************************/
	public function testresult_list()
    {
        $data   = array();
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $tbl    = 'qhospital_pcrtest';
        $wt     = 'id';
        $how    = 'DESC';
        
        $fields = array('id_no', 'patient_name', 'gender', 'phone_no', 'sample_id', 'hesn_id', 'collection_time', 'remarks');
        $resultentry = $this->Testresult_Model->testrsltListz($tbl,$wt,$how,$fields);

        foreach ($resultentry->result() as $key => $r) {
            
            // For Result Entry Tab
            if ($_POST['a_tab'] == "rsltentry") {
                $data[] = array(
                    $key + 1,
                    isset($r->id_no) ? $r->id_no : '',
                    isset($r->patient_name) ? $r->patient_name : '',
                    isset($r->gender) ? $r->gender : '',
                    isset($r->phone_no) ? $r->phone_no : '',
                    isset($r->sample_id) ? $r->sample_id : '',
                    isset($r->hesn_id) ? $r->hesn_id : '',
                    isset($r->collection_time) ? date('d-m-Y H:i:s', strtotime($r->collection_time)) : '',
                    isset($r->remarks) ? $r->remarks : '',
                    '<a href="javascript:pcrreslt_editFun('. $r->id .')" class="btn btn-info btn-sm mr-1">Result</button></a>
                     <!-- <a href="'.base_url().'assets/uploads/'.$r->content.'" class="btn btn-secondary btn-sm mr-1" target="_blank">View PDF</a> -->'
                );
            }

            // For Positive Results Tab
            elseif ($_POST['a_tab'] == "positvrslt") {
                $data[] = array(
                    $key + 1,
                    isset($r->id_no) ? $r->id_no : '',
                    isset($r->patient_name) ? $r->patient_name : '',
                    isset($r->gender) ? $r->gender : '',
                    isset($r->phone_no) ? $r->phone_no : '',
                    isset($r->sample_id) ? $r->sample_id : '',
                    isset($r->hesn_id) ? $r->hesn_id : '',
                    isset($r->collection_time) ? date('d-m-Y H:i:s', strtotime($r->collection_time)) : '',
                    isset($r->reporting_time) ? date('d-m-Y H:i:s', strtotime($r->reporting_time)) : '',
                    '<span class="badge badge-danger">+ ve</span>',
                       isset($r->remarks) ? $r->remarks : '',
                    '<a href="'.$r->content.'" class="btn btn-secondary btn-sm mr-1" target="_blank">View PDF</button></a>'
                );
            }

            // For Negative Results Tab
            elseif ($_POST['a_tab'] == "negatvrslt") {
                $data[] = array(
                    $key + 1,
                    isset($r->id_no) ? $r->id_no : '',
                    isset($r->patient_name) ? $r->patient_name : '',
                    isset($r->gender) ? $r->gender : '',
                    isset($r->phone_no) ? $r->phone_no : '',
                    isset($r->sample_id) ? $r->sample_id : '',
                    isset($r->hesn_id) ? $r->hesn_id : '',
                    isset($r->collection_time) ? date('d-m-Y H:i:s', strtotime($r->collection_time)) : '',
                    isset($r->reporting_time) ? date('d-m-Y H:i:s', strtotime($r->reporting_time)) : '',
                    '<span class="badge badge-success">-ve</span>',
                    isset($r->remarks) ? $r->remarks : '',
                    '<a href="'.$r->content.'" class="btn btn-secondary btn-sm mr-1" target="_blank">View PDF</button></a>'
                );
            }

            // For Samples Rejected Tab
            elseif ($_POST['a_tab'] == "samplerejct") {
                $data[] = array(
                    $key + 1,
                    isset($r->id_no) ? $r->id_no : '',
                    isset($r->patient_name) ? $r->patient_name : '',
                    isset($r->gender) ? $r->gender : '',
                    isset($r->phone_no) ? $r->phone_no : '',
                    isset($r->sample_id) ? $r->sample_id : '',
                    isset($r->hesn_id) ? $r->hesn_id : '',
                    isset($r->collection_time) ? date('d-m-Y H:i:s', strtotime($r->collection_time)) : '',
                    isset($r->reporting_time) ? date('d-m-Y H:i:s', strtotime($r->reporting_time)) : '',
                    '<span class="badge badge-warning">Sample Rejected</span>',
                    isset($r->remarks) ? $r->remarks : '',
                    '<a href="'.$r->content.'" class="btn btn-secondary btn-sm mr-1" target="_blank">View PDF</button></a>'
                );
            }

            // For All Results Tab
            elseif ($_POST['a_tab'] == "allreslts") {
                if ($r->result_status == 1) {
                    $rslt = '<span class="badge badge-danger">+ ve</span>';
                }
                elseif ($r->result_status == 2) {
                    $rslt = '<span class="badge badge-success">-ve</span>';
                }
                elseif ($r->result_status == 3) {
                    $rslt = '<span class="badge badge-warning">Sample Rejected</span>';
                }
                else {
                    $rslt = '';
                }

                $data[] = array(
                    $key + 1,
                    isset($r->id_no) ? $r->id_no : '',
                    isset($r->patient_name) ? $r->patient_name : '',
                    isset($r->gender) ? $r->gender : '',
                    isset($r->phone_no) ? $r->phone_no : '',
                    isset($r->sample_id) ? $r->sample_id : '',
                    isset($r->hesn_id) ? $r->hesn_id : '',
                    isset($r->collection_time) ? date('d-m-Y H:i:s', strtotime($r->collection_time)) : '',
                    isset($r->reporting_time) ? date('d-m-Y H:i:s', strtotime($r->reporting_time)) : '',
                    isset($r->remarks) ? $r->remarks : '',
                    $rslt
                );
            }
        }
        $output = array(
            "draw"            => $draw,
            "recordsTotal"    => $this->Testresult_Model->countall($tbl),
            "recordsFiltered" => $this->Testresult_Model->countfilter($tbl,$wt,$how,$fields),
            "data"            => $data
        );
        echo json_encode($output);
    }

    /*******************************************
    * Detail : Test Result Detailed Report List*
    * Date   : 28-06-2021                      *
    *******************************************/
    public function detailreport_List()
    {
        $data   = array();
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $tbl    = 'qhospital_pcrtest';
        $wt     = 'id';
        $how    = 'DESC';
        
        $fields = array('id_no', 'patient_name', 'gender', 'phone_no', 'sample_id', 'hesn_id', 'collection_time', 'remarks');
        $resultentry = $this->Testresult_Model->detailreportListz($tbl,$wt,$how,$fields);

        foreach ($resultentry->result() as $key => $r) {
            
            if ($r->result_status == 1) {
                $rslt = '<span class="badge badge-danger">+ ve</span>';
            }
            elseif ($r->result_status == 2) {
                $rslt = '<span class="badge badge-success">-ve</span>';
            }
            elseif ($r->result_status == 3) {
                $rslt = '<span class="badge badge-warning">Sample Rejected</span>';
            }
            else {
                $rslt = '';
            }

            if (isset($r->collection_time)) {
                $collect_time = date('d-m-Y H:i:s', strtotime($r->collection_time));
            }
            else{
                $collect_time = '';
            }

            if (isset($r->ipcupdate_time)) {
                $ipc_time = date('d-m-Y H:i:s', strtotime($r->ipcupdate_time));
            }
            else{
                $ipc_time = '';
            }

            if (isset($r->labackwldg_time)) {
                $lab_time = date('d-m-Y H:i:s', strtotime($r->labackwldg_time));
            }
            else{
                $lab_time = '';
            }

            if (isset($r->reporting_time)) {
                $report_time = date('d-m-Y H:i:s', strtotime($r->reporting_time));
            }
            else{
                $report_time = '';
            }


            $data[] = array(
                $key + 1,
                isset($r->id_no) ? $r->id_no : '',
                isset($r->patient_name) ? $r->patient_name : '',
                isset($r->gender) ? $r->gender : '',
                isset($r->phone_no) ? $r->phone_no : '',
                isset($r->sample_id) ? $r->sample_id : '',
                isset($r->hesn_id) ? $r->hesn_id : '',
                $r->pcr_user.'<br>'.$collect_time,
                $r->ipc_user.'<br>'.$ipc_time,
                $r->lab_user.'<br>'.$lab_time,
                $r->rslt_user.'<br>'.$report_time,
                isset($r->remarks) ? $r->remarks : '',
                $rslt
            );

        }
        $output = array(
            "draw"            => $draw,
            "recordsTotal"    => $this->Testresult_Model->dr_countall($tbl),
            "recordsFiltered" => $this->Testresult_Model->dr_countfilter($tbl,$wt,$how,$fields),
            "data"            => $data
        );
        echo json_encode($output);
    }

    /*************************************
    * Detail : PCR Result Entry Update   *
    * Date   : 25-06-2021                *
    *************************************/
    public function pcrresult_update()
    {
        //
        $mobileno='';
        $name='';
        $lang_flag='';
        $ddate='';
        $id = $_REQUEST['id'];
        $this->db->select('*');
        $this->db->from('qhospital_pcrtest');
        $this->db->where('id', $id);
        $query = $this->db->get();
        foreach ($query->result() as $key => $value) {
            $data=$value->encr_id;
            $pdfdata=$value->encr_id;
            $mobileno=$value->phone_no;
            $name=$value->patient_name;
            $lang_flag=$value->lang_flag;
            $ddate = date("d-m-y", strtotime($value->collection_time));
        }

          /* Load QR Code Library */
        $this->load->library('ciqrcode');
        
        /* Data */
       
        $save_name  = $data.'.png';

        /* QR Code File Directory Initialize */
        $dir = 'assets/media/qrcode/';
        if (!file_exists($dir)) {
            mkdir($dir, 0775, true);
        }

        /* QR Configuration  */
        $config['cacheable']    = true;
        $config['imagedir']     = $dir;
        $config['quality']      = true;
        $config['size']         = '1024';
        $config['black']        = array(255,255,255);
        $config['white']        = array(255,255,255);
        $this->ciqrcode->initialize($config);
  
        /* QR Data  */
        $params['data']     =base_url.'assets/uploads/'.$data.'.pdf';
        $params['level']    = 'L';
        $params['size']     = 10;
        $params['savename'] = FCPATH.$config['imagedir']. $save_name;
       
        $this->ciqrcode->generate($params);


            $data = array(
            'content' => base_url.'assets/uploads/'.$data.'.pdf',
            'file'     => base_url.$config['imagedir']. $save_name
        );

        $this->db->where('id', $id);
        $this->db->update('qhospital_pcrtest', $data);
        

        $ids = $this->Testresult_Model->pcrrslt_update($_REQUEST);


        $pdfname=$pdfdata.'.pdf';

        $rsltentry_result =$_REQUEST['rsltentry_result'];
        if ($rsltentry_result==1) {
             $m='Positive';
             $data['view'] = $this->Testresult_Model->resultentry_det($id);
             $html         = $this->load->view('pdf/result_entrypdf', $data, TRUE, NULL, NULL, NULL, NULL, 'L');
            $this->generate_pdfpositive($html,$pdfname); 
        } elseif ($rsltentry_result==2) {
            $m='Negative';
            $data['view'] = $this->Testresult_Model->resultentry_det($id);
            $html = $this->load->view('pdf/result_entrypdf', $data, TRUE, NULL, NULL, NULL, NULL, 'L');
            $this->generate_pdfnegative($html,$pdfname); 
          
        } elseif ($rsltentry_result==3) {
             $m='Sample Rejected';
             $data['view'] = $this->Testresult_Model->resultentry_det($id);
             $html = $this->load->view('pdf/result_entrypdf', $data, TRUE, NULL, NULL, NULL, NULL, 'L');
             $this->generate_pdfsamplereject($html,$pdfname); 

        } else{

        }



        //
        // $message='Hi '.$name.' your PCR Test result is'.$m.' you can view your result at '.base_url.'assets/uploads/'.$pdfname; 
        if($lang_flag==0){
             if ($rsltentry_result==1) {
             $message='Dear/ '.$name.' Please be informed COVID-19 test conducted for you at Al Hammadi Hospital on '.$ddate.' is '.$m.' .You can view your result by accessing this  '.base_url.'hm/ar/'.$pdfdata; 
       
        } elseif ($rsltentry_result==2) {
           
           $message='Dear/ '.$name.' Please be informed COVID-19 test conducted for you at Al Hammadi Hospital on '.$ddate.' is '.$m.' .You can view your result by accessing this  '.base_url.'hm/ar/'.$pdfdata; 
       
        } elseif ($rsltentry_result==3) {
        
           $message='Dear/ '.$name.' Please be informed COVID-19 test conducted for you at Al Hammadi Hospital on '.$ddate.' is '.$m.' .Please visit the hospital for recollection.'; 
       
        } else{
            $message='Hi '.$name.' your PCR Test result is '.$m.' .You can view your result at '.base_url.'hm/ar/'.$pdfdata; 
        }
      
        } else {
  if ($rsltentry_result==1) {
             $message=
'	عزيزي/عزيزتي  '.$name.'  يرجى أخذ العلم بأن نتيجة فحص فيروس كورونا المستجد ( كوفيد-19 ) الذي تم إجراؤه لكم في مستشفى الحمادي بتاريخ '.$ddate.'    إيجابي ( مصاب ) ، يمكنك عرض النتيجة من خلال الوصول إلى هذا  الرابط  '.base_url.'hm/ar/'.$pdfdata; ; 
       
        } elseif ($rsltentry_result==2) {
           
           $message='
عزيزي/عزيزتي  '.$name.'  يرجى أخذ العلم بأن نتيجة فحص فيروس كورونا المستجد ( كوفيد-19 ) الذي تم إجراؤه لكم في مستشفى الحمادي بتاريخ '.$ddate.'    سلبي ( غير مصاب ) ، يمكنك عرض النتيجة من خلال الوصول إلى هذا  الرابط  '.base_url.'hm/ar/'.$pdfdata; ; 
       
        } elseif ($rsltentry_result==3) {
        
           $message='	عزيزي/عزيزتي  '.$name.'  يرجى أخذ العلم بأن مسحة فحص فيروس كورونا المستجد ( كوفيد-19 ) الذي تم إجراؤه لكم في مستشفى الحمادي في '.$ddate.'    مرفوضة  ( غير مقبولة ) ، لذلك  الرجاء زيارة المستشفى لإجراء مسحة (عينة)  أخرى  جديدة  .'; 
       
        } else{
            $message='Hi '.$name.' your PCR Test result is '.$m.' .You can view your result at '.base_url.'hm/ar/'.$pdfdata; 
        } } 
     //  echo $message;exit();
    $message = urlencode($message);
    $url = 'http://www.strust.com/httpSmsProvider.aspx?username=ahhsw&password=AHHam2323&mobile='.$mobileno.'&unicode=E&message='.$message.'&sender=ALHAMMADI';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);


        echo $url;
    }


 /*public function generate_pdf($content, $name = 'result.pdf', $output_type = 'S',$footer = null, $margin_bottom = null, $header = null, $margin_top = null, $orientation = 'P') {
                
        $this->load->library('Pdf', '', 'pdf');
        return $this->pdf->generate($content, $name, $output_type, $footer, $margin_bottom, $header, $margin_top, $orientation);
    }*/
    
    public function generate_pdfpositive($content, $name = 'result.pdf', $output_type = 'S',$footer = null, $margin_bottom = null, $header = null, $margin_top = null, $orientation = 'P') {
                
        $this->load->library('Pdf', '', 'pdf');
        return $this->pdf->generate_positive($content, $name, $output_type, $footer, $margin_bottom, $header, $margin_top, $orientation);
    }
    
    public function generate_pdfnegative($content, $name = 'result.pdf', $output_type = 'S',$footer = null, $margin_bottom = null, $header = null, $margin_top = null, $orientation = 'P') {
                
        $this->load->library('Pdf', '', 'pdf');
        return $this->pdf->generate_negative($content, $name, $output_type, $footer, $margin_bottom, $header, $margin_top, $orientation);
    }
    
    public function generate_pdfsamplereject($content, $name = 'result.pdf', $output_type = 'S',$footer = null, $margin_bottom = null, $header = null, $margin_top = null, $orientation = 'P') {
                
        $this->load->library('Pdf', '', 'pdf');
        return $this->pdf->generate_samplereject($content, $name, $output_type, $footer, $margin_bottom, $header, $margin_top, $orientation);
    }
public function new_user(){
 
   $data = array(
                'username' => $_REQUEST['user_name'],
                'password' => md5($_REQUEST['password']),
                'language' => 1,
                'role' => 1,
                'f_name' => $_REQUEST['name'],
                'l_name' => $_REQUEST['roll'],
                'admin_pic' =>'',
                'dash' => $_REQUEST['dash'],
                'pcr_test' => $_REQUEST['pcr_test'],
                'ipc' => $_REQUEST['ipc'],
                'lab' => $_REQUEST['lab'],
                'test_result' => $_REQUEST['test_result'],
                'user' => $_REQUEST['user']
            );

             $id_m = $this->Testresult_Model->common_insert('qhospital_admins', $data);
             redirect(base_url('dashboard/user'));
    
}
public function delet_user(){
 
   $data = array(
                'del_flag' => 0
            );

             $id_m = $this->Testresult_Model->common_update('qhospital_admins', $data, $_REQUEST['id']);
             redirect(base_url('dashboard/user'));
    
}
  public function user_disp()
    {
        $data   = array();
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $tbl    = 'qhospital_admins';
        $wt     = 'id';
        $how    = 'DESC';
        
        $fields = array('username', 'l_name');
        $resultentry = $this->Testresult_Model->user_listing($tbl,$wt,$how,$fields);

        foreach ($resultentry->result() as $key => $r) {
            
            // For Result Entry Tab
                $data[] = array(
                    $key + 1,
                    isset($r->username) ? $r->username : '',
                    isset($r->l_name) ? $r->l_name : ''
                );

         
        }
        $output = array(
            "draw"            => $draw,
            "recordsTotal"    => 1,
            "recordsFiltered" => 1,
            "data"            => $data
        );
        echo json_encode($output);
    }  
  
}

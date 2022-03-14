<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testresult_Model extends CI_Model
{

    /*************************************
    * Detail : Test Result List          *
    * Date   : 25-06-2021                *
    *************************************/
    public function testrsltListz($tbl,$wt,$how,$fields)
    {
        $this->db->select('*');

        $this->_get_datatables_testrslt($tbl,$wt,$how,$fields);

        $this->db->where('del_flag', 1);
        $this->db->where('ipc_flag', 1); // IPC Update Completed
        $this->db->where('acknowledge_status', 1); // Aknowledgement = Yes

        // For Result Entry Tab
        if ($_POST['a_tab'] == "rsltentry") {
            $this->db->where('resultentry_flag', 0);
        }

        // For Positive Results Tab
        elseif ($_POST['a_tab'] == "positvrslt") {
            $this->db->where('resultentry_flag', 1); // PCR Result Entry Updated
            $this->db->where('result_status', 1);
        }

        // For Negative Results Tab
        elseif ($_POST['a_tab'] == "negatvrslt") {
            $this->db->where('resultentry_flag', 1); // PCR Result Entry Updated
            $this->db->where('result_status', 2);
        }

        // For Samples Rejected Tab
        elseif ($_POST['a_tab'] == "samplerejct") {
            $this->db->where('resultentry_flag', 1); // PCR Result Entry Updated
            $this->db->where('result_status', 3);
        }

        // For All Results
        elseif ($_POST['a_tab'] == "allreslts") {
            $this->db->where('resultentry_flag', 1);
        }

        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            
        $query = $this->db->get();
        return $query;
    }
public function user_listing($tbl,$wt,$how,$fields)
    {
        $this->db->select('*');

        $this->_get_datatables_testrslt($tbl,$wt,$how,$fields);

        $this->db->where('del_flag', 1);
       

       

        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            
        $query = $this->db->get();
        return $query;
    }

     /*************************************
    * Detail : Test Result List          *
    * Date   : 25-06-2021                *
    *************************************/
     public function _get_datatables_testrslt($tbl,$wt,$how,$fields)
     {
        // For Result Entry Tab
        if ($_POST['a_tab'] == "rsltentry") {
            $column_arr = array(null, 'id_no', 'patient_name', 'gender', 'phone_no', 'sample_id', 'hesn_id', 'collection_time', null);
        }
        // For All Results Tab
        elseif ($_POST['a_tab'] == "allreslts") {
            $column_arr = array(null, 'id_no', 'patient_name', 'gender', 'phone_no', 'sample_id', 'hesn_id', 'collection_time','reporting_time', null);
        }
        // For Remaining Tabs
        else {
            $column_arr = array(null, 'id_no', 'patient_name', 'gender', 'phone_no', 'sample_id', 'hesn_id', 'collection_time','reporting_time', null, null);
        }

        $this->db->from($tbl);

        $i = 0;

            foreach ($fields as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($fields) - 1 == $i){ //last loop
                        $this->db->group_end(); //close bracket
                    }
                    $i++;
                }
            }

            foreach ($_POST['columns'] as $key => $value) {
                
                if(isset($fields[$value['data']-1])){
                // $this->db->like($fields[$value['data']-1], $value['search']['value']);
                }
            }

        if(isset($_POST['order']))
        {
            $this->db->order_by($column_arr[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else
        {
            $this->db->order_by($wt, $how);
        }
     }

    /****************************************
    * Detail : Test Result List total Count *
    * Date   : 24-06-2021                   *
    ****************************************/
    public function countall($tbl)
    {
        $this->db->where('del_flag', 1);
        $this->db->where('ipc_flag', 1); // IPC Update Completed
        $this->db->where('acknowledge_status', 1); // Aknowledgement = Yes

        // For Result Entry Tab
        if ($_POST['a_tab'] == "rsltentry") {
            $this->db->where('resultentry_flag', 0);
        }

        // For Positive Results Tab
        elseif ($_POST['a_tab'] == "positvrslt") {
            $this->db->where('resultentry_flag', 1); // PCR Result Entry Updated
            $this->db->where('result_status', 1);
        }

        // For Negative Results Tab
        elseif ($_POST['a_tab'] == "negatvrslt") {
            $this->db->where('resultentry_flag', 1); // PCR Result Entry Updated
            $this->db->where('result_status', 2);
        }

        // For Samples Rejected Tab
        elseif ($_POST['a_tab'] == "samplerejct") {
            $this->db->where('resultentry_flag', 1); // PCR Result Entry Updated
            $this->db->where('result_status', 3);
        }

        // For All Results
        elseif ($_POST['a_tab'] == "allreslts") {
            $this->db->where('resultentry_flag', 1);
        }

        return $this->db->count_all_results($tbl);
    }

    /*******************************************
    * Detail : Test Result List Count Filtered *
    * Date   : 27-06-2021                      *
    *******************************************/
    public function countfilter($tbl,$wt,$how,$fields)
    {
        $this->_get_datatables_testrslt($tbl,$wt,$how,$fields);
        
        $this->db->where('del_flag', 1);
        $this->db->where('ipc_flag', 1); // IPC Update Completed
        $this->db->where('acknowledge_status', 1); // Aknowledgement = Yes

        // For Result Entry Tab
        if ($_POST['a_tab'] == "rsltentry") {
            $this->db->where('resultentry_flag', 0);
        }

        // For Positive Results Tab
        elseif ($_POST['a_tab'] == "positvrslt") {
            $this->db->where('resultentry_flag', 1); // PCR Result Entry Updated
            $this->db->where('result_status', 1);
        }

        // For Negative Results Tab
        elseif ($_POST['a_tab'] == "negatvrslt") {
            $this->db->where('resultentry_flag', 1); // PCR Result Entry Updated
            $this->db->where('result_status', 2);
        }

        // For Samples Rejected Tab
        elseif ($_POST['a_tab'] == "samplerejct") {
            $this->db->where('resultentry_flag', 1); // PCR Result Entry Updated
            $this->db->where('result_status', 3);
        }

        // For All Results
        elseif ($_POST['a_tab'] == "allreslts") {
            $this->db->where('resultentry_flag', 1);
        }

        $query = $this->db->get();
        return $query->num_rows();
    }

    /*******************************************
    * Detail : Test Result Detailed Report List*
    * Date   : 28-06-2021                      *
    *******************************************/
    public function detailreportListz($tbl,$wt,$how,$fields)
    {
        $this->db->select($tbl.'.*');

        $this->db->select('pcruser.username AS pcr_user');
        $this->db->select('ipcuser.username AS ipc_user');
        $this->db->select('labuser.username AS lab_user');
        $this->db->select('rsltuser.username AS rslt_user');

        $this->_get_datatables_detailreport($tbl,$wt,$how,$fields);

        $this->db->where($tbl.'.del_flag', 1);
        $this->db->where($tbl.'.ipc_flag', 1); // IPC Update Completed
        $this->db->where($tbl.'.acknowledge_status', 1); // Aknowledgement = Yes
        
        $this->db->where($tbl.'.resultentry_flag', 1);

        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            
        $query = $this->db->get();
        return $query;
    }

     /******************************************
    * Detail : Test Result Detailed Report List*
    * Date   : 28-06-2021                      *
    *******************************************/
    public function _get_datatables_detailreport($tbl,$wt,$how,$fields)
    {
        $column_arr = array(null, 'id_no', 'patient_name', 'gender', 'phone_no', 'sample_id', 'hesn_id', 'collection_time','reporting_time', null);
        
        $this->db->from($tbl);

        $this->db->join('qhospital_admins AS pcruser', 'pcruser.id='.$tbl.'.user_id', 'left');

        $this->db->join('qhospital_admins AS ipcuser', 'ipcuser.id='.$tbl.'.ipcupdate_userid', 'left');

        $this->db->join('qhospital_admins AS labuser', 'labuser.id='.$tbl.'.labackwldg_userid', 'left');

        $this->db->join('qhospital_admins AS rsltuser', 'rsltuser.id='.$tbl.'.resultentry_userid', 'left');

        $i = 0;

            foreach ($fields as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($fields) - 1 == $i){ //last loop
                        $this->db->group_end(); //close bracket
                    }
                    $i++;
                }
            }

            foreach ($_POST['columns'] as $key => $value) {
                
                if(isset($fields[$value['data']-1])){
                // $this->db->like($fields[$value['data']-1], $value['search']['value']);
                }
            }

        if(isset($_POST['order']))
        {
            $this->db->order_by($column_arr[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else
        {
            $this->db->order_by($tbl.'.'.$wt, $how);
        }
    }

    /****************************************
    * Detail : Test Result Detailed Report  *
                   List total Count         *
    * Date   : 28-06-2021                   *
    ****************************************/
    public function dr_countall($tbl)
    {
        $this->db->where($tbl.'.del_flag', 1);
        $this->db->where($tbl.'.ipc_flag', 1); // IPC Update Completed
        $this->db->where($tbl.'.acknowledge_status', 1); // Aknowledgement = Yes

        $this->db->where($tbl.'.resultentry_flag', 1);

        return $this->db->count_all_results($tbl);
    }

    /*****************************************
    * Detail : Test Result Detailed Report   * 
                   List Count Filtered       *
    * Date   : 28-06-2021                    *
    *****************************************/
    public function dr_countfilter($tbl,$wt,$how,$fields)
    {
        $this->_get_datatables_detailreport($tbl,$wt,$how,$fields);
        
        $this->db->where($tbl.'.del_flag', 1);
        $this->db->where($tbl.'.ipc_flag', 1); // IPC Update Completed
        $this->db->where($tbl.'.acknowledge_status', 1); // Aknowledgement = Yes

        $this->db->where($tbl.'.resultentry_flag', 1);

        $query = $this->db->get();
        return $query->num_rows();
    }

    /*************************************
    * Detail : PCR Result Update         *
    * Date   : 25-06-2021                *
    *************************************/
    public function pcrrslt_update($request)
    {
        $id = $request['id'];
        $data = array(
            'resultentry_userid' => $this->session->userdata('admin_id'),
            'resultentry_ip'     => $this->input->ip_address(),
            'reporting_time'     => date("Y-m-d H:i:s"), 
            'resultentry_flag'   => 1,
            'result_status'      => $request['rsltentry_result']
        );

        $this->db->where('id', $id);
        $this->db->update('qhospital_pcrtest', $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Updation Successful :)');
        }
        else {
            $this->session->set_flashdata('error', 'Updation Failed :(');
        }

        return $id;
    }

    /***************************************
    * Detail : Get Patient Details for Test*
                    Result PDF             * 
    * Date   : 26-06-2021                  *
    ***************************************/
    public function resultentry_det($id)
    {
        $this->db->select('*');
        $this->db->from('qhospital_pcrtest');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    /*****************************************
    * Detail : Get Today's Count of Positive,*
            Negative and Samples Rejected    *
    * Date   : 26-06-2021                    *
    *****************************************/
    public function get_todayrsltdetail()
    {
        $today   = date('Y-m-d');
        $tomorow = date('Y-m-d', strtotime("1 day", strtotime($today)));
        
        $this->db->select('count("id") AS num_patients,result_status');
        $this->db->from('qhospital_pcrtest');
        $this->db->where('reporting_time >= "'.$today.'" AND reporting_time < "'.$tomorow.'"');
        $this->db->group_by('result_status');
        $query = $this->db->get();
        return $query->result();
    }
     public function common_insert($table, $datas) {
        $this->db->insert($table, $datas);
        $id = $this->db->insert_id();
        return $id;
    } 
    
     public function common_update($table, $datas, $id) {
        $this->db->where('id', $id);
        $this->db->update($table, $datas);
        return $id;
    }
   
}
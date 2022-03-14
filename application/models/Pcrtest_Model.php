<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pcrtest_Model extends CI_Model
{
    
    /*************************************
    * Detail : PCR Test List             *
    * Date   : 24-06-2021                *
    *************************************/
    public function pcrtestListz($tbl,$wt,$how,$fields)
    {
        $this->db->select('*');

        $this->_get_datatables_pcrtests($tbl,$wt,$how,$fields);

        $this->db->where('del_flag', 1);

        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);

        $query = $this->db->get();
        return $query;
    }

    /*************************************
    * Detail : PCR Test List             *
    * Date   : 24-06-2021                *
    *************************************/
    public function _get_datatables_pcrtests($tbl,$wt,$how,$fields)
    {
        $column_arr = array(null, 'id_no', 'patient_name', 'gender', 'phone_no', 'collection_time','passport_number', null);

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

    /*************************************
    * Detail : PCR Test List total Count *
    * Date   : 24-06-2021                *
    *************************************/
    public function countall($tbl)
    {
        $this->db->where('del_flag', 1);
        return $this->db->count_all_results($tbl);
    }

    /****************************************
    * Detail : PCR Test List Count Filtered *
    * Date   : 27-06-2021                   *
    ****************************************/
    public function countfilter($tbl,$wt,$how,$fields)
    {
        $this->_get_datatables_pcrtests($tbl,$wt,$how,$fields);
        
        $this->db->where('del_flag', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    /*************************************
    * Detail : New PCR Test Submit       *
    * Date   : 24-06-2021                *
    *************************************/
    public function newpcr_submit($request)
    {
        // Creating System ID
        $this->db->select('*');
        $this->db->from('qhospital_systemid_autoincr');
        $query3 = $this->db->get();
        $res3   = $query3->result();
        foreach ($res3 as $key => $value3) 
        {
            $sys_id   = $value3->id;
            $sys_code = $value3->code;
            $sys_sf   = $value3->starting_from;
        }
        $sysId = $sys_sf + 1;
        // $sysm_code = $sys_code."/".$sysId;
        
        // Get Language Flag from Nationality table (Added on 01-07-2021)
        $this->db->select('ar_eng_flag');
        $this->db->from('qhospital_nationality');
        $this->db->where('id', $request['pcr_nationality']);
        $query4 = $this->db->get();
        $rslt4  = $query4->result();

        foreach ($rslt4 as $key => $v4) {
            $language_flag = $v4->ar_eng_flag;
        }

        $data = array(
            'patient_name'    => $request['pcr_ptname'],
            'id_no'           => $request['pcr_idno'],
            'encr_id'           => $sysId,
            'dob'             => ($request['pcr_dob'] != '') ? date('Y-m-d', strtotime($request['pcr_dob'])) : '',
            'gender'          => $request['pcr_gender'],
            'phone_no'        => $request['pcr_phoneno'],
            'passport_number' => $request['pcr_passportno'],
            'nationality_id'  => $request['pcr_nationality'],
            'lang_flag'       => $language_flag, // Added on 01-07-2021
            'remarks'         => $request['pcr_remarks'], 
            'system_id'       => $sysId,
            'user_id'         => $this->session->userdata('admin_id'),
            'ip'              => $this->input->ip_address(),
            'collection_time' => $request['collection_time']
        );

        $this->db->insert('qhospital_pcrtest', $data);
        $id = $this->db->insert_id();

        if ($id > 0) {
            // Updating System ID Auto-increment
            $data1 = array('starting_from' => $sysId);
            $this->db->where('id', $sys_id);
            $this->db->update('qhospital_systemid_autoincr', $data1);
            $this->session->set_flashdata('success', 'Submission Successful :)');
        }
        else {
            $this->session->set_flashdata('error', 'Submission Failed :(');
        }

        return $id;
    }

    /*************************************
    * Detail : PCR Test Update           *
    * Date   : 24-06-2021                *
    *************************************/
    public function pcr_update($request)
    {
        $id = $request['id'];
        
        // Get Language Flag from Nationality table (Added on 01-07-2021)
        $this->db->select('ar_eng_flag');
        $this->db->from('qhospital_nationality');
        $this->db->where('id', $request['epcr_nationality']);
        $query4 = $this->db->get();
        $rslt4  = $query4->result();

        foreach ($rslt4 as $key => $v4) {
            $language_flag = $v4->ar_eng_flag;
        }
        
        $data = array(
            'patient_name'    => $request['epcr_ptname'],
            'id_no'           => $request['epcr_idno'],
            'dob'             => ($request['epcr_dob'] != '') ? date('Y-m-d', strtotime($request['epcr_dob'])) : '',
            'gender'          => $request['epcr_gender'],
            'phone_no'        => $request['epcr_phoneno'], 
            'passport_number' => $request['epcr_passportno'],
            'nationality_id'  => $request['epcr_nationality'],
            'lang_flag'       => $language_flag, // Added on 01-07-2021
            'remarks'         => $request['epcr_remarks']
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

    /*************************************
    * Detail : Get data for PCR Test     *
                    Edit Modal           *
    * Date   : 24-06-2021                *
    *************************************/
    public function getpcrdetails($id)
    {
        $this->db->select('*');
        $this->db->from('qhospital_pcrtest');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    /********************************************************
    * Detail : Getting Data for Nationality Dropdown        *
    * Date   : 12-02-2020                                   *
    ********************************************************/
    public function get_nationlty()
    {
        $this->db->select('*');
        $this->db->from('qhospital_nationality');
        $this->db->where('edit_flag', 1);
        $this->db->where('del_flag', 1);
        $query = $this->db->get();
        return $query->result();
    }
   
}
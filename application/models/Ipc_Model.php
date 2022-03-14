<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ipc_Model extends CI_Model
{
    
    /*************************************
    * Detail : IPC List                  *
    * Date   : 25-06-2021                *
    *************************************/
    public function ipcListz($tbl,$wt,$how,$fields)
    {
        $this->db->select('*');

        $this->_get_datatables_ipc($tbl,$wt,$how,$fields);

        $this->db->where('del_flag', 1);

        if ($_POST['a_tab'] == "ipc_pendg") {
            $this->db->where('ipc_flag', 0);
        }
        elseif ($_POST['a_tab'] == "ipc_complt") {
            $this->db->where('ipc_flag', 1);
        }

        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            
        $query = $this->db->get();
        return $query;
    }

    /*************************************
    * Detail : IPC List                  *
    * Date   : 25-06-2021                *
    *************************************/
    public function _get_datatables_ipc($tbl,$wt,$how,$fields)
    {
        if ($_POST['a_tab'] == "ipc_pendg") {
            $column_arr = array(null, 'system_id', 'id_no', 'patient_name', 'gender', 'phone_no', 'sample_id', 'hesn_id', null);
        }
        else {
            $column_arr = array(null, 'system_id', 'id_no', 'patient_name', 'gender', 'phone_no', 'sample_id', 'hesn_id');
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

    /*************************************
    * Detail : IPC List total Count      *
    * Date   : 25-06-2021                *
    *************************************/
    public function countall($tbl)
    {
        $this->db->where('del_flag', 1);

        if ($_POST['a_tab'] == "ipc_pendg") {
            $this->db->where('ipc_flag', 0);
        }
        elseif ($_POST['a_tab'] == "ipc_complt") {
            $this->db->where('ipc_flag', 1);
        }

        return $this->db->count_all_results($tbl);
    }

    /****************************************
    * Detail : IPC List Count Filtered      *
    * Date   : 27-06-2021                   *
    ****************************************/
    public function countfilter($tbl,$wt,$how,$fields)
    {
        $this->_get_datatables_ipc($tbl,$wt,$how,$fields);

        $this->db->where('del_flag', 1);

        if ($_POST['a_tab'] == "ipc_pendg") {
            $this->db->where('ipc_flag', 0);
        }
        elseif ($_POST['a_tab'] == "ipc_complt") {
            $this->db->where('ipc_flag', 1);
        }

        $query = $this->db->get();
        return $query->num_rows();
    }

    /*************************************
    * Detail : IPC Update                *
    * Date   : 25-06-2021                *
    *************************************/
    public function ipc_update($request)
    {
        $id = $request['id'];
        $data = array(
            'hesn_id'            => $request['ipc_hesnid'],
            'sample_id'          => $request['ipc_sampleid'],
            'ipcupdate_userid'   => $this->session->userdata('admin_id'),
            'ipcupdate_ip'       => $this->input->ip_address(),
            'ipcupdate_time'     => date("Y-m-d H:i:s"), 
            'ipc_flag'           => 1,
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

    /****************************************
    * Detail : Get Count of Today's PCR     *
                    Updation Pending        *
    * Date   : 26-06-2021                   *
    ****************************************/
    public function get_todayipc_pending()
    {
        $today   = date('Y-m-d');
        $tomorow = date('Y-m-d', strtotime("1 day", strtotime($today)));

        $this->db->select('id');
        $this->db->from('qhospital_pcrtest');
        $this->db->where('ipc_flag', 0);
        $this->db->where('collection_time >= "'.$today.'" AND collection_time < "'.$tomorow.'"');
        $query = $this->db->get();
        return $query->num_rows();
    }

    /****************************************
    * Detail : Get Count of Today's PCR     *
                 Updation Completed         *
    * Date   : 26-06-2021                   *
    ****************************************/
    public function get_todayipc_complete()
    {
        $today   = date('Y-m-d');
        $tomorow = date('Y-m-d', strtotime("1 day", strtotime($today)));
        
        $this->db->select('id');
        $this->db->from('qhospital_pcrtest');
        $this->db->where('ipc_flag', 1);
        $this->db->where('ipcupdate_time >= "'.$today.'" AND ipcupdate_time < "'.$tomorow.'"');
        $query = $this->db->get();
        return $query->num_rows();
    }
   
}
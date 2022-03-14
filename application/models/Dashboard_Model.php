<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Model extends CI_Model
{

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
public function commonedit_modalvalue_new()
    {
        
        
        $this->db->select('*');
        $this->db->from('qhospital_admins');
        $this->db->where('del_flag', 1);
        $query = $this->db->get();
        return $query->result();
    }

    /******************************************
    * Detail : Get Count of Total Positive,   *
         Negative and Samples Rejected        *
    * Date   : 26-06-2021                     *
    ******************************************/
    public function get_totalrsltdetail()
    {
        $this->db->select('count("id") AS num_patients,result_status');
        $this->db->from('qhospital_pcrtest');
        $this->db->group_by('result_status');
        $query = $this->db->get();
        return $query->result();
    }
   
}
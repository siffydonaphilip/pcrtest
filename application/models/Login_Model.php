<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model
{
    
    /*********************************
    * Detail : Check Login           * 
    * Date   : 24-06-2021            *
    *********************************/
    function login_admin($username, $password)
    {
        $this->db->select('*');
        $this->db->from('qhospital_admins');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('del_flag', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    
   
}
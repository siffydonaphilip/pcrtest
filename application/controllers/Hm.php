<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Hm extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
	
	public function ar()
	{
   $alias = $this->uri->segment(3);
   $content='';
   
         $this->db->select('*');
        $this->db->from('qhospital_pcrtest');
        $this->db->where('encr_id', $alias);
        $query = $this->db->get();
        foreach ($query->result() as $key => $value) {
            $content=$value->content;
        }
        
        
 
 redirect($content);
 
 
	}
}

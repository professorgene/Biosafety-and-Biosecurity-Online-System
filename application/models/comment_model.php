<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class comment_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
    
    function get_all_comments() 
    {
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->join('project', 'comments.account_id = project.project_id');
        $this->db->where('comments.application_approved IS NULL', null, false);
        $query = $this->db->get();
		return $query->result();
    }
    
    /*function get_all_form2() 
    {
        $this->db->select('*');
        $this->db->from('pc1');
        $this->db->join('accounts', 'pc1.account_id = accounts.account_id');
        $this->db->where('pc1.application_approved', 1);
        $this->db->or_where('pc1.application_approved', 3);
        $query = $this->db->get();
		return $query->result();
    }*/
    
    function get_all_form3() 
    {
        $this->db->select('*');
        $this->db->from('pc1');
        $this->db->join('accounts', 'pc1.account_id = accounts.account_id');
        $this->db->where('pc1.application_approved', 2);
        $query = $this->db->get();
		return $query->result();
    }
    
	function get_form_by_id($id)
	{
		$this->db->where('application_id', $id);
        $query = $this->db->get('pc1');
		return $query->result();
	}
	
    /*function get_form_by_account_id($id)
	{
		$this->db->where('account_id', $id);
        $query = $this->db->get('pc1');
		return $query->result();
	}*/
    
    function get_comment_by_project_id($id)
    {
        $this->db->where('comment_id', $id);
        $query = $this->db->get('comments');
        return $query->result();
    }
	
	function save_comment($data)
    {
		return $this->db->insert('comments', $data);
	}
    
    function update_applicant_data($id, $data)
    {
        $this->db->set('application_approved', 'NULL', FALSE);
        $this->db->where('application_id', $id);
		$this->db->update('comments', $data);
        return true;
	}
    
    function update_comments($id, $data)
    {
        
        $this->db->where('comment_id', $id);
		$this->db->update('comments', $data);
        return true;
	}
    
    
    
    
    

    
    
}
?>
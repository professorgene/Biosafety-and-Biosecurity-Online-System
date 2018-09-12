<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class annex3_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
    
    function get_all_edit_request() 
    {
        $this->db->select('*');
        $this->db->from('annex3');
        $this->db->join('accounts', 'annex3.account_id = accounts.account_id');
        $this->db->where('annex3.editable', 1);
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_annex3_form() 
    {
        $this->db->select('*');
        $this->db->from('annex3');
        $this->db->join('accounts', 'annex3.account_id = accounts.account_id');
        $this->db->where('annex3.application_approved IS NULL', null, false);
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_annex3_form2() 
    {
        $this->db->select('*');
        $this->db->from('annex3');
        $this->db->join('accounts', 'annex3.account_id = accounts.account_id');
        $this->db->where('annex3.application_approved', 1);
        $query = $this->db->get();
		return $query->result();
    }
    
    /*function get_all_annex3_form3() 
    {
        $this->db->select('*');
        $this->db->from('annex3');
        $this->db->join('accounts', 'annex3.account_id = accounts.account_id');
        $this->db->where('annex3.application_approved', 2);
        $query = $this->db->get();
		return $query->result();
    }*/

    function get_form_by_id($id)
	{
		$this->db->where('application_id', $id);
        $query = $this->db->get('annex3');
		return $query->result();
	}
	
    function get_form_by_account_id($id)
	{
		$this->db->where('account_id', $id);
        $query = $this->db->get('annex3');
		return $query->result();
	}
    
    
	function insert_new_applicant_data($data)
    {
		return $this->db->insert('annex3', $data);
	}
    
    function update_applicant_data($id, $data)
    {
        $this->db->set('application_approved', 'NULL', FALSE);
        $this->db->where('application_id', $id);
		$this->db->update('annex3', $data);
        return true;
	}
    
    function update_approval($id, $type, $approver_id, $appid)
    {
        if ($type == 0) {
            
            $data = array('application_approved' => 3);
            $this->db->where('account_id', $id);
            $this->db->where('application_id', $appid);
            $this->db->update('annex3', $data);
        } elseif ($type == 1) {
            $data = array('application_approved' => 1, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->where('application_id', $appid);
            $this->db->update('annex3', $data);
        }
        return true;
    }
    
    function update_approval_SSBC($id, $type, $approver_id, $appid)
    {
        if ($type == 0) {
            
            $data = array('application_approved' => 3);
            $this->db->where('account_id', $id);
            $this->db->where('application_id', $appid);
            $this->db->update('annex3', $data);
        } elseif ($type == 1) {
            $data = array('application_approved' => 2, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->where('application_id', $appid);
            $this->db->update('annex3', $data);
        }
        return true;
    }
    
    //For Major Incidents & Occupational Exposure ONLY
    /*function update_approval_HSO($id, $type, $approver_id)
    {
        if ($type == 0) {
            
            $data = array('application_approved' => 4, 'approver_id' => $approver_id );
            $this->db->where('account_id', $id);
            $this->db->where('application_id', $appid);
            $this->db->update('annex3', $data);
        } elseif ($type == 1) {
            $data = array('application_approved' => 3, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->update('annex3', $data);
        }
        return true;
    }*/
    
    function edit_request($id){
        
        $data = array('editable' => 1);
        $this->db->where('application_id', $id);
        $this->db->update('annex3', $data);
        
        return true;
            
    }
    
    function update_editable($id, $type, $approver_id, $appid)
    {
        if ($type == 0) {
            
            $data = array('editable' => 3);
            $this->db->where('account_id', $id);
            $this->db->where('application_id', $appid);
            $this->db->update('annex3', $data);
        } elseif ($type == 1) {
            $data = array('editable' => 2, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->where('application_id', $appid);
            $this->db->update('annex3', $data);
        }
        return true;
        
    }
    
    
}
?>
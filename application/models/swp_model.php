<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class swp_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
    
    function get_all_edit_request() 
    {
        $this->db->select('*');
        $this->db->from('swp');
        $this->db->join('accounts', 'swp.account_id = accounts.account_id');
        $this->db->where('swp.editable', 1);
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_swp1_form() 
    {
        $this->db->select('*');
        $this->db->from('swp');
        $this->db->join('accounts', 'swp.account_id = accounts.account_id');
        $this->db->where('swp.application_approved IS NULL', null, false);
        $this->db->where('swp.application_type', 1);
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_swp1_form2() 
    {
        $this->db->select('*');
        $this->db->from('swp');
        $this->db->join('accounts', 'swp.account_id = accounts.account_id');
        $this->db->where('swp.application_approved', 1);
        $this->db->or_where('swp.application_approved', 3);
        $this->db->where('swp.application_type', 1);
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_swp1_form3() 
    {
        $this->db->select('*');
        $this->db->from('swp');
        $this->db->join('accounts', 'swp.account_id = accounts.account_id');
        $this->db->where('swp.application_approved', 2);
        $this->db->where('swp.application_type', 1);
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_swp2_form() 
    {
        $this->db->select('*');
        $this->db->from('swp');
        $this->db->join('accounts', 'swp.account_id = accounts.account_id');
        $this->db->where('swp.application_approved IS NULL', null, false);
        $this->db->where('swp.application_type', 2);
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_swp2_form2() 
    {
        $this->db->select('*');
        $this->db->from('swp');
        $this->db->join('accounts', 'swp.account_id = accounts.account_id');
        $this->db->where('swp.application_approved', 1);
        $this->db->or_where('swp.application_approved', 3);
        $this->db->where('swp.application_type', 2);
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_swp2_form3() 
    {
        $this->db->select('*');
        $this->db->from('swp');
        $this->db->join('accounts', 'swp.account_id = accounts.account_id');
        $this->db->where('swp.application_approved', 2);
        $this->db->where('swp.application_type', 2);
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_swp3_form() 
    {
        $this->db->select('*');
        $this->db->from('swp');
        $this->db->join('accounts', 'swp.account_id = accounts.account_id');
        $this->db->where('swp.application_approved IS NULL', null, false);
        $this->db->where('swp.application_type', 3);
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_swp3_form2() 
    {
        $this->db->select('*');
        $this->db->from('swp');
        $this->db->join('accounts', 'swp.account_id = accounts.account_id');
        $this->db->where('swp.application_approved', 1);
        $this->db->or_where('swp.application_approved', 3);
        $this->db->where('swp.application_type', 3);
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_swp3_form3() 
    {
        $this->db->select('*');
        $this->db->from('swp');
        $this->db->join('accounts', 'swp.account_id = accounts.account_id');
        $this->db->where('swp.application_approved', 2);
        $this->db->where('swp.application_type', 3);
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_swp4_form() 
    {
        $this->db->select('*');
        $this->db->from('swp');
        $this->db->join('accounts', 'swp.account_id = accounts.account_id');
        $this->db->where('swp.application_approved IS NULL', null, false);
        $this->db->where('swp.application_type', 4);
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_swp4_form2() 
    {
        $this->db->select('*');
        $this->db->from('swp');
        $this->db->join('accounts', 'swp.account_id = accounts.account_id');
        $this->db->where('swp.application_approved', 1);
        $this->db->where('swp.application_type', 4);
        $query = $this->db->get();
		return $query->result();
    }
	
    function get_all_swp4_form3() 
    {
        $this->db->select('*');
        $this->db->from('swp');
        $this->db->join('accounts', 'swp.account_id = accounts.account_id');
        $this->db->where('swp.application_approved', 2);
        $this->db->where('swp.application_type', 4);
        $query = $this->db->get();
		return $query->result();
    }
    
	function get_form_by_id($id)
	{
		$this->db->where('application_id', $id);
        $query = $this->db->get('swp');
		return $query->result();
	}
	
    function get_form_by_account_id($id)
	{
		$this->db->where('account_id', $id);
        $query = $this->db->get('swp');
		return $query->result();
	}
    
    function get_form_by_project_id($id)
    {
        $this->db->where('project_id', $id);
        $query = $this->db->get('swp');
        return $query->result();
    }
    
	# Insert New Account
	function insert_new_applicant_data($data)
    {
		return $this->db->insert('swp', $data);
	}
    
    function update_applicant_data($id, $data)
    {
        $this->db->set('application_approved', 'NULL', FALSE);
        $this->db->where('project_id', $id);
		$this->db->update('swp', $data);
        return true;
	}
    
    function update_saved_data($id, $data)
    {
        
        $this->db->where('project_id', $id);
		$this->db->update('swp', $data);
        return true;
	}
    
    function proceed_ammend($id, $type, $approver_id)
    {
        if ($type == 0) {
            
            $data = array('application_approved' => 5);
            $this->db->where('account_id', $id);
            $this->db->update('swp', $data);
        } elseif ($type == 1) {
            $data = array('application_approved' => 0, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->update('swp', $data);
        }
        return true;
    }
    
    function update_approval($id, $type, $approver_id, $appID)
    {
        if ($type == 0) {
            
            $data = array('application_approved' => 5);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('swp', $data);
        } elseif ($type == 1) {
            $data = array('application_approved' => 1, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('swp', $data);
        }
        return true;
    }
    
    function update_yes_issue($id, $type, $approver_id, $appID)
    {
        if ($type == 0) {
            
            $data = array('application_approved' => 5);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('swp', $data);
        } elseif ($type == 1) {
            $data = array('application_approved' => 2, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('swp', $data);
        }
        return true;
    }
    
    function update_approval_SSBC($id, $type, $approver_id, $appID)
    {
        if ($type == 0) {
            
            $data = array('application_approved' => 5);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('swp', $data);
        } elseif ($type == 1) {
            $data = array('application_approved' => 3, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('swp', $data);
        }
        return true;
    }
    
    function final_approval($id, $type, $approver_id, $appID)
    {
        if ($type == 0) {
            
            $data = array('application_approved' => 5);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('swp', $data);
        } elseif ($type == 1) {
            $data = array('application_approved' => 4, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('swp', $data);
        }
        return true;
    }
    
    
    function edit_request($id){
        
        $data = array('editable' => 1);
        $this->db->where('project_id', $id);
        $this->db->update('swp', $data);
        
        return true;
            
    }
    
    function update_editable($id, $type, $approver_id, $appid)
    {
        if ($type == 0) {
            
            $data = array('editable' => 3);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appid);
            $this->db->update('swp', $data);
        } elseif ($type == 1) {
            $data = array('editable' => 2, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appid);
            $this->db->update('swp', $data);
        }
        return true;
        
    }
    
}
?>
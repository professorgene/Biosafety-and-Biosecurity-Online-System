<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class project_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
    
    # New Project
    function insert_new_proj($data)
    {
		return $this->db->insert('project', $data);
	}
    
    function get_all_lmo_edit_request() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_editable', 1);
        $this->db->where('project.project_type', 'app_lmo');
        $query = $this->db->get();
		return $query->result();
    }
    
    
    
    function get_all_bio_edit_request() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_editable', 1);
        $this->db->where('project.project_type', 'app_bio');
        $query = $this->db->get();
		return $query->result();
    }
    
    # Search by ID
    function get_proj_id($id)
    {
        $this->db->where('project_id', $id);
        $query = $this->db->get('project');
		return $query->result();
    }
    
    # Search by name
    function get_proj_name($name)
    {
        $this->db->where('project_name', $name);
        //$this->db->where('account_id', $id);
        $query = $this->db->get('project');
		return $query->result();
    }
    
    # Search by User ID
    function get_proj_by_user_id($id)
    {
        $this->db->where('account_id', $id);
        $query = $this->db->get('project');
		return $query->result();
    }
    
    # Search submitted project by user id
    function get_sub_proj_by_user_id($id)
    {   
        $this->db->where('account_id', $id);
        $this->db->where('project_status', 'submitted');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    # Search saved project by user id
    function get_save_proj_by_user_id($id)
    {   
        $this->db->where('account_id', $id);
        $this->db->where('project_status', 'saved');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    # All non approved projects
    function get_NA_proj() 
    {
        $this->db->where('project_approval', 0);
        $query = $this->db->select('*')->from('project')->get();
		return $query->result();
    }
    
    # All approved projects
    function get_A_proj() 
    {
        $this->db->where('project_approval', 1);
        $query = $this->db->select('*')->from('project')->get();
		return $query->result();
    }
    
    # All projects
    function get_all_proj() 
    {
        $this->db->where('project_approval', 0);
        $this->db->or_where('project_approval', 1);
        $query = $this->db->select('*')->from('project')->get();
		return $query->result();
    }
    
    function update_proj($id, $data)
    {
        extract($data);
        if ($account_password != ''){
            $this->db->where('project_id', $id);
            $this->db->update('project', array('project_name' => $project_name, 'project_desc' => $project_desc));
        }
        return true;
    }
    
    function update_applicant_data($id, $editable)
    {
        $this->db->set('project_approval', 'NULL', FALSE);
        $this->db->set('project_editable', $editable);
        $this->db->where('project_id', $id);
		$this->db->update('project', $data);
        return true;
	}
    
    function update_proj_status($id, $status)
    {
        $data = array('project_status' => $status);
        $this->db->where('project_id', $id);
        $this->db->update('project', $data);
        
        return true;
    }
    
    function update_proj_approval($id, $type)
    {
        if ($type == 0) {
            #$data = array('account_approved' => 0);
            $data = array('project_approval' => 2);
            $this->db->where('project_id', $id);
            $this->db->update('project', $data);
        } elseif ($type == 1) {
            $data = array('project_approval' => 1);
            $this->db->where('project_id', $id);
            $this->db->update('project', $data);
        }
        return true;
    }
    
    
    
    //Retrieve all projects of type new application: LMO
    function get_all_sub_lmo() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 0);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'app_lmo');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_sub_lmo2() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 1);
        $this->db->or_where('project.project_approval', 3);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'app_lmo');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_sub_lmo3() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 2);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'app_lmo');
        $query = $this->db->get();
		return $query->result();
    }
    
    //Retrieve all projects of type new application: Biohazardous Materials
    function get_all_sub_bio() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 0);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'app_bio');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_sub_bio2() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 1);
        $this->db->or_where('project.project_approval', 3);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'app_bio');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_sub_bio3() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 2);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'app_bio');
        $query = $this->db->get();
		return $query->result();
    }
    
    
    function update_approval($id, $type, $approver_id, $appID)
    {
        if ($type == 0) {
            
            $data = array('project_approval' => 5);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        } elseif ($type == 1) {
            $data = array('project_approval' => 1, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        }
        return true;
    }
    
    function update_yes_issue($id, $type, $approver_id, $appID)
    {
        if ($type == 0) {
            
            $data = array('project_approval' => 5);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        } elseif ($type == 1) {
            $data = array('project_approval' => 2, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        }
        return true;
    }
    
    
    function update_approval_SSBC($id, $type, $approver_id, $appID)
    {
        if ($type == 0) {
            
            $data = array('project_approval' => 5);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        } elseif ($type == 1) {
            $data = array('project_approval' => 3, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        }
        return true;
    }
    
    function final_approval($id, $type, $approver_id, $appID)
    {
        if ($type == 0) {
            
            $data = array('project_approval' => 5);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        } elseif ($type == 1) {
            $data = array('project_approval' => 4, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        }
        return true;
    }
    
    
    function edit_request($id){
        
        $data = array('project_editable' => 1);
        $this->db->where('project_id', $id);
        $this->db->update('project', $data);
        
        return true;
            
    }
    
    function update_editable($id, $type, $approver_id, $appid)
    {
        if ($type == 0) {
            
            $data = array('project_editable' => 3);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appid);
            $this->db->update('project', $data);
        } elseif ($type == 1) {
            $data = array('project_editable' => 2, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appid);
            $this->db->update('project', $data);
        }
        return true;
        
    }
    
    
    
    
    
    
    
}
?>
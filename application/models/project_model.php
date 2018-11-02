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
    
    #get from db form e
    #get form e based on id
    #return the row result
    
    
    
    
    function get_all_exempt_edit_request() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_editable', 1);
        $this->db->where('project.project_type', 'app_exempt');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_procurement_edit_request() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_editable', 1);
        $this->db->where('project.project_type', 'procurement');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_notif_LMO_edit_request() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_editable', 1);
        $this->db->where('project.project_type', 'notifLMOBM');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_annual_edit_request() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_editable', 1);
        $this->db->where('project.project_type', 'anuualfinalreport');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_export_LMO_edit_request() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_editable', 1);
        $this->db->where('project.project_type', 'exportLMO');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_export_exempt_edit_request() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_editable', 1);
        $this->db->where('project.project_type', 'exportExempt');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_incident_exempt_edit_request() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_editable', 1);
        $this->db->where('project.project_type', 'incidentExempt');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_minor_edit_request() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_editable', 1);
        $this->db->where('project.project_type', 'minorbio');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_major_edit_request() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_editable', 1);
        $this->db->where('project.project_type', 'majorbio');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_occupational_edit_request() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_editable', 1);
        $this->db->where('project.project_type', 'occupational');
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
    
    # Search all approved project by User ID
    function get_approved_proj_by_user_id($id)
    {
        $this->db->where('account_id', $id);
        $this->db->where('project_approval', 1);
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
        $this->db->set('project_approval', 0);
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
    
    //Retrieve all projects of type new application: LMO
    function get_all_sub_exempt() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 0);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'app_exempt');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_sub_exempt2() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 1);
        $this->db->or_where('project.project_approval', 3);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'app_exempt');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_sub_exempt3() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 2);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'app_exempt');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_sub_procurement() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 0);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'procurement');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_sub_notification_of_LMO_and_BM() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 0);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'notifLMOBM');
        $query = $this->db->get();
		return $query->result();
    }
    
    #annual1
    function get_all_sub_annual() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 0);
        //$this->db->or_where('annualfinalreport.application_approved', 0);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'anuualfinalreport');
        $query = $this->db->get();
		return $query->result();
    }
    
    #annual2
    function get_all_sub_annual2() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 1);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'anuualfinalreport');
        $query = $this->db->get();
		return $query->result();
    }
    
    #annual3
    function get_all_sub_annual3() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 2);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'anuualfinalreport');
        $query = $this->db->get();
		return $query->result();
    }
    
    #export LMO
    function get_all_sub_export_LMO() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 0);
        //$this->db->or_where('annualfinalreport.application_approved', 0);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'exportLMO');
        $query = $this->db->get();
		return $query->result();
    }
    
    #export LMO2
    function get_all_sub_export_LMO2() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 1);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'exportLMO');
        $query = $this->db->get();
		return $query->result();
    }
    
    #export LMO3
    function get_all_sub_export_LMO3() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 2);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'exportLMO');
        $query = $this->db->get();
		return $query->result();
    }
    
    #export Exempt
    function get_all_sub_export_Exempt() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 0);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'exportExempt');
        $query = $this->db->get();
		return $query->result();
    }
    
    //incident accident exempt
    function get_all_sub_incident_exempt() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 0);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'incidentExempt');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_sub_incident_exempt2() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 1);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'incidentExempt');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_sub_incident1_form() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 0);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'minorbio');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_sub_incident1_form2() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 1);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'minorbio');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_sub_incident2_form() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 0);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'majorbio');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_sub_incident2_form2() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 1);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'majorbio');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_sub_incident3_form() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 0);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'occupational');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_sub_incident3_form2() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 1);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'occupational');
        $query = $this->db->get();
		return $query->result();
    }
    
    function get_all_sub_incident3_form3() 
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('accounts', 'project.account_id = accounts.account_id');
        $this->db->where('project.project_approval', 2);
        $this->db->where('project.project_status', 'submitted');
        $this->db->where('project.project_type', 'occupational');
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
    
    function procurement_update_approval($id, $type, $approver_id, $appID)
    {
        if ($type == 0) {
            
            $data = array('project_approval' => 3);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        } elseif ($type == 1) {
            $data = array('project_approval' => 1, 'approver_id' => $approver_id);
            $this->db->set('approval_date', 'NOW()', FALSE);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        }
        return true;
    }
    
    function proceed_ammend($id, $type, $approver_id, $appID)
    {
        if ($type == 0) {
            
            $data = array('project_approval' => 5);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        } elseif ($type == 1) {
            $data = array('project_approval' => 0, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        }
        return true;
    }
    
    function update_approval_BSO($id, $type, $approver_id, $appID)
    {
        if ($type == 0) {
            
            $data = array('project_approval' => 5);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        } elseif ($type == 1) {
            $data = array('project_approval' => 2, 'approver_id' => $approver_id);
            $this->db->set('approval_date', 'NOW()', FALSE);
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
    
    //for annual final report project
    function annual_update_approval_SSBC($id, $type, $approver_id, $appID)
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
    
    //for annual final report project
    function update_approval_Chair($id, $type, $approver_id, $appID)
    {
        if ($type == 0) {
            
            $data = array('project_approval' => 5);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        } elseif ($type == 1) {
            $data = array('project_approval' => 3, 'approver_id' => $approver_id);
            $this->db->set('approval_date', 'NOW()', FALSE);
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
            $this->db->set('approval_date', 'NOW()', FALSE);
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
    
    //Export LMO 
    function formf_update_approval($id, $type, $approver_id, $appID)
    {
        if ($type == 0) {
            
            $data = array('project_approval' => 4);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        } elseif ($type == 1) {
            $data = array('project_approval' => 1, 'approver_id' => $approver_id);
            $this->db->set('approval_date', 'NOW()', FALSE);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        }
        return true;
    }
    
    function formf_update_approval_SSBC($id, $type, $approver_id, $appID)
    {
        if ($type == 0) {
            
            $data = array('project_approval' => 4);
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
    
    function formf_update_approval_Chair($id, $type, $approver_id, $appID)
    {
        if ($type == 0) {
            
            $data = array('project_approval' => 4);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        } elseif ($type == 1) {
            $data = array('project_approval' => 3, 'approver_id' => $approver_id);
            $this->db->set('approval_date', 'NOW()', FALSE);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appID);
            $this->db->update('project', $data);
        }
        return true;
    }
    
    function export_exempt_update_approval($id, $type, $approver_id, $appid)
    {
        if ($type == 0) {
            
            $data = array('project_approval' => 3);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appid);
            $this->db->update('project', $data);
        } elseif ($type == 1) {
            $data = array('project_approval' => 1, 'approver_id' => $approver_id);
            $this->db->set('approval_date', 'NOW()', FALSE);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appid);
            $this->db->update('project', $data);
        }
        return true;
    }
    
    function incident_exempt_update_approval_SSBC($id, $type, $approver_id, $appid)
    {
        if ($type == 0) {
            
            $data = array('project_approval' => 3);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appid);
            $this->db->update('project', $data);
        } elseif ($type == 1) {
            $data = array('project_approval' => 2, 'approver_id' => $approver_id);
            $this->db->set('approval_date', 'NOW()', FALSE);
            $this->db->where('account_id', $id);
            $this->db->where('project_id', $appid);
            $this->db->update('project', $data);
        }
        return true;
    }
    
    
    
    
}
?>
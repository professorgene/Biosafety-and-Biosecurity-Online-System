<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notification_of_LMO_and_BM_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
    
    function get_all_edit_request() 
    {
        $this->db->select('*');
        $this->db->from('notificationlmobiohazardousmaterial');
        $this->db->join('accounts', 'notificationlmobiohazardousmaterial.account_id = accounts.account_id');
        $this->db->where('notificationlmobiohazardousmaterial.editable', 1);
        $query = $this->db->get();
		return $query->result();
    }
	
    function get_all_form() 
    {
        $this->db->select('*');
        $this->db->from('notificationlmobiohazardousmaterial');
        $this->db->join('accounts', 'notificationlmobiohazardousmaterial.account_id = accounts.account_id');
        $this->db->where('notificationlmobiohazardousmaterial.application_approved IS NULL', null, false);
        $query = $this->db->get();
		return $query->result();
    }
    
	function get_form_by_id($id)
	{
		$this->db->where('application_id', $id);
        $query = $this->db->get('notificationlmobiohazardousmaterial');
		return $query->result();
	}
	
    function get_form_by_account_id($id)
	{
		$this->db->where('account_id', $id);
        $query = $this->db->get('notificationlmobiohazardousmaterial');
		return $query->result();
	}
	
	function insert_new_applicant_data($data)
    {
		return $this->db->insert('notificationlmobiohazardousmaterial', $data);
	}
    
    function update_applicant_data($id, $data)
    {
        $this->db->set('application_approved', 'NULL', FALSE);
        $this->db->where('application_id', $id);
		$this->db->update('notificationlmobiohazardousmaterial', $data);
        return true;
	}
    
    function update_approval($id, $type, $approver_id, $appid)
    {
        if ($type == 0) {
            
            $data = array('application_approved' => 3);
            $this->db->where('account_id', $id);
            $this->db->where('application_id', $appid);
            $this->db->update('notificationlmobiohazardousmaterial', $data);
        } elseif ($type == 1) {
            $data = array('application_approved' => 1, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->where('application_id', $appid);
            $this->db->update('notificationlmobiohazardousmaterial', $data);
        }
        return true;
    }
    
    function edit_request($id){
        
        $data = array('editable' => 1);
        $this->db->where('application_id', $id);
        $this->db->update('notificationlmobiohazardousmaterial', $data);
        
        return true;
            
    }
    
    function update_editable($id, $type, $approver_id, $appid)
    {
        if ($type == 0) {
            
            $data = array('editable' => 3);
            $this->db->where('account_id', $id);
            $this->db->where('application_id', $appid);
            $this->db->update('notificationlmobiohazardousmaterial', $data);
        } elseif ($type == 1) {
            $data = array('editable' => 2, 'approver_id' => $approver_id);
            $this->db->where('account_id', $id);
            $this->db->where('application_id', $appid);
            $this->db->update('notificationlmobiohazardousmaterial', $data);
        }
        return true;
        
    }
    
}
?>
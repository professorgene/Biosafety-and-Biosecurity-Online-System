<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class project_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
    
    function insert_new_proj($data)
    {
		return $this->db->insert('project', $data);
	}
    
    /*
	function get_account($email, $pass)
	{
		$this->db->where('account_email', $email);
		$this->db->where('account_password', $pass);
        $this->db->where('account_approved', 1);
        $query = $this->db->get('accounts');
		return $query->result();
	}
	
	# Retrieves Account by ID
	function get_account_by_id($id)
	{
		$this->db->where('account_id', $id);
        $query = $this->db->get('accounts');
		return $query->result();
	}
    
    function recover_account($email)
    {
        $this->db->where('account_email', $email);
        $this->db->where('account_approved', 1);
        $query = $this->db->get('accounts');
        return $query->result();
    }
    
    function get_account_type($id)
    {
        $this->db->select('account_type');
        $this->db->from('accounts');
		$this->db->where('account_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_all_account() 
    {
        $this->db->where('account_approved', 0);
        $query = $this->db->select('*')->from('accounts')->get();
		return $query->result();
    }
    
    function update_account($id, $data)
    {
        extract($data);
        #if ($account_email != ''){
        #    $this->db->where('account_id', $id);
        #    $this->db->update('accounts', array('account_email' => $account_email));
        #}
        if ($account_password != ''){
            $this->db->where('account_id', $id);
            $this->db->update('accounts', array('account_password' => $account_password));
        }
        #return $this->db->last_query();
        return true;
    }
    
    function update_approval($id, $type)
    {
        if ($type == 0) {
            #$data = array('account_approved' => 0);
            $data = array('account_email' => 'denied', 'account_approved' => 2);
            $this->db->where('account_id', $id);
            $this->db->update('accounts', $data);
        } elseif ($type == 1) {
            $data = array('account_approved' => 1);
            $this->db->where('account_id', $id);
            $this->db->update('accounts', $data);
        }
        return true;
    }
    */
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class statistic_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
    # get all records within the week
	function get_all_new_projects()
	{
        # to be used with short query
        # $startdate = date('Y-m-d H:i:s', strtotime('-1 week'));
        # $enddate = date('Y-m-d H:i:s');
        
        $this->db->where('project_status', 'submitted');
        
        # Logic:
        # select * from project where project_date between date_sub(now(),INTERVAL 1 WEEK) and now()
        # full length query
        $this->db->where('project_date between date_sub(now(),INTERVAL 1 WEEK) and now()');
        
        # short query
        # $this->db->where('project_date >=', $startdate);
        # $this->db->where('project_date <=', $enddate);
        $query = $this->db->get('project');
		return $query->result();
	}
    
    # get all records within the month
	function get_all_new_users()
	{
        # to be used with short query
        # $startdate = date('Y-m-d H:i:s', strtotime('-1 month'));
        # $enddate = date('Y-m-d H:i:s');
        
        $this->db->where('account_approved', 0);
        
        # Logic:
        # select * from project where project_date between date_sub(now(),INTERVAL 1 WEEK) and now()
        # full length query
        $this->db->where('account_date between date_sub(now(),INTERVAL 1 MONTH) and now()');
        
        # short query
        # $this->db->where('project_date >=', $startdate);
        # $this->db->where('project_date <=', $enddate);
        $query = $this->db->get('accounts');
		return $query->result();
	}
    
    function get_all_new_approved_users()
	{
        # to be used with short query
        # $startdate = date('Y-m-d H:i:s', strtotime('-1 month'));
        # $enddate = date('Y-m-d H:i:s');
        
        $this->db->where('account_approved', 0);
        $this->db->or_where('account_approved', 1);
        
        # Logic:
        # select * from project where project_date between date_sub(now(),INTERVAL 1 WEEK) and now()
        # full length query
        $this->db->where('account_date between date_sub(now(),INTERVAL 1 MONTH) and now()');
        
        # short query
        # $this->db->where('project_date >=', $startdate);
        # $this->db->where('project_date <=', $enddate);
        $query = $this->db->get('accounts');
		return $query->result();
	}
    
    # get all users
	function get_all_existing_users()
	{
        $this->db->where('account_approved', 0);
        $this->db->or_where('account_approved', 1);
        $query = $this->db->get('accounts');
		return $query->result();
	}
    
    
    function get_all_inventory()
    {
        $query = $this->db->select('*')->from('inventory')->get();
		return $query->result();
    }
    
}
?>


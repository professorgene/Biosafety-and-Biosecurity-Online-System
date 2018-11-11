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
        $this->db->where('project_approval <', 100);
        
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
	function get_all_new_users_within_month()
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
    
    function get_all_new_approved_users_within_month()
	{
        # to be used with short query
        # $startdate = date('Y-m-d H:i:s', strtotime('-1 month'));
        # $enddate = date('Y-m-d H:i:s');
        
        $this->db->where('account_approved', 0);
        $this->db->or_where('account_approved', 1);
        #$this->db->where('account_approved', 1);
        
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
    function get_all_new_users()
	{
        $this->db->where('account_approved', 0);
        $query = $this->db->get('accounts');
		return $query->result();
	}
    function get_all_new_approved_users()
	{
        $this->db->or_where('account_approved', 1);
        $query = $this->db->get('accounts');
		return $query->result();
	}
    
    function get_all_inventory()
    {
        $query = $this->db->select('*')->from('inventory')->get();
		return $query->result();
    }
    
    # application related
    function get_all_new_applications()
    {
        $this->db->where('project_approval <', 100);
        $this->db->where('project_status', 'submitted');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_approved_applications()
    {
        $this->db->where('project_approval', 110);
        $this->db->where('project_status', 'submitted');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_new_app_lmo_applications()
    {
        $this->db->where('project_approval <', 100);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'app_lmo');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_approved_app_lmo_applications()
    {
        $this->db->where('project_approval', 110);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'app_lmo');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_new_app_bio_applications()
    {
        $this->db->where('project_approval <', 100);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'app_bio');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_approved_app_bio_applications()
    {
        $this->db->where('project_approval', 110);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'app_bio');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_new_app_exempt_applications()
    {
        $this->db->where('project_approval <', 100);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'app_exempt');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_approved_app_exempt_applications()
    {
        $this->db->where('project_approval', 110);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'app_exempt');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_new_procurement_applications()
    {
        $this->db->where('project_approval <', 100);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'procurement');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_approved_procurement_applications()
    {
        $this->db->where('project_approval', 110);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'procurement');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_new_notifLMOBM_applications()
    {
        $this->db->where('project_approval <', 100);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'notifLMOBM');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_approved_notifLMOBM_applications()
    {
        $this->db->where('project_approval', 110);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'notifLMOBM');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_new_anuualfinalreport_applications()
    {
        $this->db->where('project_approval <', 100);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'anuualfinalreport');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_approved_anuualfinalreport_applications()
    {
        $this->db->where('project_approval', 110);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'anuualfinalreport');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_new_exportLMO_applications()
    {
        $this->db->where('project_approval <', 100);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'exportLMO');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_approved_exportLMO_applications()
    {
        $this->db->where('project_approval', 110);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'exportLMO');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_new_exportExempt_applications()
    {
        $this->db->where('project_approval <', 100);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'exportExempt');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_approved_exportExempt_applications()
    {
        $this->db->where('project_approval', 110);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'exportExempt');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_new_incidentExempt_applications()
    {
        $this->db->where('project_approval <', 100);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'incidentExempt');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_approved_incidentExempt_applications()
    {
        $this->db->where('project_approval', 110);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'incidentExempt');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_new_minorbio_applications()
    {
        $this->db->where('project_approval <', 100);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'minorbio');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_approved_minorbio_applications()
    {
        $this->db->where('project_approval', 110);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'minorbio');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_new_majorbio_applications()
    {
        $this->db->where('project_approval <', 100);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'majorbio');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_approved_majorbio_applications()
    {
        $this->db->where('project_approval', 110);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'majorbio');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_new_occupational_applications()
    {
        $this->db->where('project_approval <', 100);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'occupational');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_approved_occupational_applications()
    {
        $this->db->where('project_approval', 110);
        $this->db->where('project_status', 'submitted');
        $this->db->where('project_type', 'occupational');
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_applications()
    {
        $query = $this->db->select('*')->from('project')->get();
		return $query->result();
    }
    
}
?>


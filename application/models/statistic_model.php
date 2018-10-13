<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class statistic_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
    # get all records within the week
	function get_all_project()
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
    
}
?>


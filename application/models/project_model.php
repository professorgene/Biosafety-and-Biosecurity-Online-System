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
    
    function get_proj_id($id)
    {
        $this->db->where('project_id', $id);
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_proj_by_user_id($id)
    {
        $this->db->where('account_id', $id);
        $query = $this->db->get('project');
		return $query->result();
    }
    
    function get_all_proj() 
    {
        $this->db->where('project_approval', 0);
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
}
?>
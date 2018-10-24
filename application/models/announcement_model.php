<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class announcement_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
    
    function get_all_announcement($page) 
    {
        $this->db->where('announcement_page', $page);
        $query = $this->db->select('*')->from('announcement')->get();
		return $query->result();
    }
	
	# Insert New Announcement
	function insert_new_announcement($data)
    {
		return $this->db->insert('announcement', $data);
	}
    
    # Remove Announcement
	function remove_announcement($id)
    {
		$this->db->where('announcement_id', $id);
        $data = array('announcement_page' => 'deleted');
        if ($this->db->update('announcement', $data)){
            return true;
        } else {
            return false;
        }
	}
    
    # Update Announcement
    function update_announcement($id, $data)
    {
        $this->db->where('announcement_id', $id);
        if ($this->db->update('announcement', $data)){
            return true;
        } else {
            return false;
        }
    }
}
?>
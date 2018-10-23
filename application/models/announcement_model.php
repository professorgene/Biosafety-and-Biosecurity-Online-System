<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class announcement_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	function all_announcement()
	{
		$query = $this->db->get('announcement');
		return $query->result();
	}
	
	#Retrieves announcement by pages
	function get_announcement($id)
	{
		$query = $this->db->get('announcement', array('id'=>$id));
		return $query->row_array();
	}
	
	#Update announcement
	function update_announcement($data, $announcement_id)
    {   
        $this->db->where('announcement_id', $announcement_id);
        if($this->db->update('announcement', $data)){
            return true;
        }
	}
}
?>
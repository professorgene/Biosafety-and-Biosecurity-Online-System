<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class upload_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
    function update_stuff($id, $data)
    {
        $this->db->where('order_id', $id);
        if ($this->db->update('test', $data)){
            return true;
        } else {
            return false;
        }
    }
    
    function get_stuff($id) {
		$this->db->where('order_id', $id);
        $query = $this->db->select('*')->from('test')->get();
        return $query->result();
    }
    
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class educational_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
    # All active Quiz
	function get_all_quiz()
	{
        #$this->db->or_where('quiz_approval', 0);
        $this->db->where('quiz_approval', 1);
        $query = $this->db->get('educational');
		return $query->result();
	}
    
    # New Quiz
    function insert_new_quiz($data)
    {
		return $this->db->insert('educational', $data);
	}
    
    # Retrieves Inventory by ID
	function get_quiz_by_id($id)
	{
		$this->db->where('quiz_id', $id);
        $query = $this->db->get('educational');
		return $query->result();
	}
    
    # Deleting Quiz
    function delete_quiz($id) {
        $data = array('quiz_approval' => 0);
        $this->db->where('quiz_id', $id);
        $this->db->update('educational', $data);
    }
}
?>
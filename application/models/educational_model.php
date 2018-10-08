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
        if($this->db->update('educational', $data)){
            return true;
        }
    }
    
    # Records mark
    function insert_marks($data){
        return $this->db->insert('marks', $data);
    }
    
    # Retrieves ALL marks by user id
    function get_all_marks($acc_id) {
        $this->db->where('account_id', $acc_id);
        $query = $this->db->get('marks');
		return $query->result();
    }
    
    # Retrieves marks by ID
    function get_marks_by_id($quiz_id, $acc_id) {
        $this->db->where('quiz_id', $quiz_id);
        $this->db->where('account_id', $acc_id);
        $query = $this->db->get('marks');
		return $query->result();
    }
}
?>
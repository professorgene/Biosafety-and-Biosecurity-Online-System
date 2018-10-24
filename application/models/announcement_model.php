<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class announcement_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
    function list_product(){
	$product = $this->db->query('select * from announcement');
	return $product;
	} 
	function save($array)
	{
		$this->db->insert('announcement',$array);
	}
	function update($id,$array_item)
	{
		$this->db->where('announcement_id',$id);
		$this->db->update('announcement',$array_item);
	}
}
?>
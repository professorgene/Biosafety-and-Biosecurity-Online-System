<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notification_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
    function get_reminders($id, $project_id) {
        $this->db->where('account_id', $id);
        $this->db->like('notification_title', "Reminder for Project " . $project_id);
        $this->db->order_by("notification_id","desc");
        $query = $this->db->get('notification');
        return $query->row();
    }
    
	function get_all_notification($id, $type)
	{
        foreach ($type as $row) {
            $account_type = $row->account_type;
        }
        if($account_type == 1){
            $this->db->where(array('account_id' => $id, 'notification_type' => 1));
            #$this->db->where('account_id', $id);
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 2){
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 2);
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 3){
            #$this->db->where(array('account_id' => $id, 'notification_type' => 3));
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 3);
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 4){
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 4);
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 5){
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 5);
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 6){
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 6);
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 7){
            $this->db->where(array('account_id' => $id, 'notification_type' => 1));
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
	}
    
    function get_all_registration($id, $type)
	{
        foreach ($type as $row) {
            $account_type = $row->account_type;
        }
        if($account_type == 1){
            $this->db->where(array('account_id' => $id, 'notification_type' => 1));
            #$this->db->where('account_id', $id);
            $this->db->like('notification_description', 'account');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 2){
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 2);
            $this->db->like('notification_description', 'account');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 3){
            #$this->db->where(array('account_id' => $id, 'notification_type' => 3));
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 3);
            $this->db->like('notification_description', 'account');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 4){
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 4);
            $this->db->like('notification_description', 'account');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 5){
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 5);
            $this->db->like('notification_description', 'account');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 6){
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 6);
            $this->db->like('notification_description', 'account');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 7){
            $this->db->where(array('account_id' => $id, 'notification_type' => 1));
            $this->db->like('notification_description', 'account');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
	}
    
    function get_all_application($id, $type)
	{
        foreach ($type as $row) {
            $account_type = $row->account_type;
        }
        if($account_type == 1){
            $this->db->where(array('account_id' => $id, 'notification_type' => 1));
            #$this->db->where('account_id', $id);
            $this->db->like('notification_description', 'application');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 2){
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 2);
            $this->db->like('notification_description', 'application');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 3){
            #$this->db->where(array('account_id' => $id, 'notification_type' => 3));
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 3);
            $this->db->like('notification_description', 'application');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 4){
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 4);
            $this->db->like('notification_description', 'application');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 5){
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 5);
            $this->db->like('notification_description', 'application');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 6){
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 6);
            $this->db->like('notification_description', 'application');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 7){
            $this->db->where(array('account_id' => $id, 'notification_type' => 1));
            $this->db->like('notification_description', 'application');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
	}
    
    function get_all_approval($id, $type)
	{
        foreach ($type as $row) {
            $account_type = $row->account_type;
        }
        if($account_type == 1){
            $this->db->where(array('account_id' => $id, 'notification_type' => 1));
            #$this->db->where('account_id', $id);
            $this->db->like('notification_description', 'approved');
            $this->db->or_like('notification_description', 'rejected');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 2){
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 2);
            $this->db->like('notification_description', 'approved');
            $this->db->or_like('notification_description', 'rejected');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 3){
            #$this->db->where(array('account_id' => $id, 'notification_type' => 3));
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 3);
            $this->db->like('notification_description', 'approved');
            $this->db->or_like('notification_description', 'rejected');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 4){
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 4);
            $this->db->like('notification_description', 'approved');
            $this->db->or_like('notification_description', 'rejected');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 5){
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 5);
            $this->db->like('notification_description', 'approved');
            $this->db->or_like('notification_description', 'rejected');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 6){
            $this->db->where('account_id', $id);
            $this->db->or_where('notification_type', 6);
            $this->db->like('notification_description', 'approved');
            $this->db->or_like('notification_description', 'rejected');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
        if($account_type == 7){
            $this->db->where(array('account_id' => $id, 'notification_type' => 1));
            $this->db->like('notification_description', 'approved');
            $this->db->or_like('notification_description', 'rejected');
            $this->db->order_by("notification_id","desc");
            $query = $this->db->get('notification');
            return $query->result();
        }
	}
    
    function insert_new_notification($id, $type, $title, $msg) {
        $data =  array(
            'account_id' => $id,
            'notification_type' => $type,
            'notification_title' => $title,
            'notification_description' => $msg
        );
        
        return $this->db->insert('notification', $data);
    }
    
    function get_read($id, $type) {
        $notif = [];
        $this->db->where(array('account_id' => $id));
        if ($type == 2) {
            $this->db->or_where(array('notification_type' => 2));
        } elseif ($type == 3) {
            $this->db->or_where(array('notification_type' => 3));
        } elseif ($type == 4) {
            $this->db->or_where(array('notification_type' => 4));
        } elseif ($type == 5) {
            $this->db->or_where(array('notification_type' => 5));
        } elseif ($type == 6) {
            $this->db->or_where(array('notification_type' => 6));
        } else {
            $this->db->where(array('notification_type' => $type));
        }
        $query = $this->db->get('notification');
        foreach ($query->result() as $i) {
            if ($i->notification_read == 0) {
                array_push($notif, $i->notification_read);
            }
        }
        if (in_array(0, $notif)) {
            return array(0, count((array)$notif));
        } else {
            return array(1, 0);
        }
    }
    
    function update_read($id, $type)
    {
        $this->db->where('account_id', $id);
        if ($type == 2) {
            $this->db->or_where(array('notification_type' => 2));
        } elseif ($type == 3) {
            $this->db->or_where(array('notification_type' => 3));
        } elseif ($type == 4) {
            $this->db->or_where(array('notification_type' => 4));
        } elseif ($type == 5) {
            $this->db->or_where(array('notification_type' => 5));
        } elseif ($type == 6) {
            $this->db->or_where(array('notification_type' => 6));
        } else {
            $this->db->where(array('notification_type' => $type));
        }
        $this->db->update('notification', array('notification_read' => 1));
        return true;
    }
}
?>
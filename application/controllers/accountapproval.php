<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class accountapproval extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('email_model');
		
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('Account Approvals', true);
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $data['all_accounts'] = $this->account_model->get_all_account();
        
        $this->load->template('accountapproval_view', $data);
	}
    
    public function approve()
    {
        $id = $this->uri->segment(3);

        $result = $this->account_model->get_account_by_id($id);
        $this->email_model->send_email( $result[0]->account_email, "Registration Approved", "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Your account has been approved by: " . $this->session->userdata('account_name') . "</p>");
        
        if($this->account_model->update_approval($id, 1)){
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully approved the registration!</div>');
            redirect('accountapproval/index');
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
            redirect('accountapproval/index');
        }
        
    }
    
    public function reject()
    {
        $id = $this->uri->segment(3);
        $msg = base64_decode($this->uri->segment(4));

        $result = $this->account_model->get_account_by_id($id);
        $this->email_model->send_email( $result[0]->account_email, "Registration Rejected", "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Your account has been rejected by: " . $this->session->userdata('account_name') . " due to " . $msg . "</p>");
        
        if($this->account_model->update_approval($id, 0)){
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully rejected the registration!</div>');
            redirect('accountapproval/index');
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
            redirect('accountapproval/index');
        }
    }
    
    public function edit()
	{
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $data['all_accounts'] = $this->account_model->get_all_approved_account($this->session->userdata('account_id'));
        
        $this->load->template('accountedit_view', $data);
	}
}

?>
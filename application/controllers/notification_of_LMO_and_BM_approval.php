<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notification_of_LMO_and_BM_approval extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('notification_of_LMO_and_BM_model');
        $this->load->model('email_model');
        $this->load->model('project_model');
		
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('Notification of LMO and Biohazardous Materials', true);
        
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $data['all_notif_LMO_BM_proj'] = $this->project_model->get_all_sub_notification_of_LMO_and_BM();
        
        $this->load->template('notification_of_LMO_and_BM_approval_view', $data);
	}
    
    public function approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->notification_of_LMO_and_BM_model->update_approval($id, 1, $approver_id, $appID);
        $this->project_model->notif_LMO_BM_update_approval($id, 1, $approver_id, $appID);
        
        //Send email to PI giving them the required ID number for the notified LMO/Biohazard Material
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Notification of LMO and Biohazardous Materials Project Submission Approved", "<p>Your Notification of LMO and Biohazardous Materials Project Has Been Approved. </p>");
        
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project Approved</div>');
		
        $this->notification_model->insert_new_notification($id, 1, "New Project For Notification of LMO and Biohazardous Material Project Approved", "Notification of LMO and Biohazardous Materials Project Submission Approved by : " . $this->session->userdata('account_name'));
		
        redirect('notification_of_LMO_and_BM_approval/index');
    }
    
    public function reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->notification_of_LMO_and_BM_model->update_approval($id, 0, $approver_id, $appID);
        $this->project_model->notif_LMO_BM_update_approval($id, 0, $approver_id, $appID);
        
        //Send email to PI that their form has been rejected

		$this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Notification of LMO and Biohazardous Materials Project Submission Rejected", "<p>Your Notification of LMO and Biohazardous Materials Project Has Been Rejected.</p>");
        $this->notification_model->insert_new_notification($id, 1, "New Project For Notification of LMO and Biohazardous Material Project Rejected", "Notification of LMO and Biohazardous Materials Project Rejected by : " . $this->session->userdata('account_name'));        
		
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project Rejected</div>');
        
        redirect('notification_of_LMO_and_BM_approval/index');
    }
}

?>
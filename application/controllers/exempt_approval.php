<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class exempt_approval extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('project_model');
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('exempt_model');
        $this->load->model('hirarc_model');
        $this->load->model('swp_model');
        $this->load->model('email_model');
		
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('New Application','/newapplication',true);
		$this->breadcrumbs->push('Exempt Dealing Approvals', true);
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $data['all_exempt_proj'] = $this->project_model->get_all_sub_exempt();
        $data['all_exempt_proj_Chair'] = $this->project_model->get_all_sub_exempt2();
        $data['all_exempt_proj_SSBC'] = $this->project_model->get_all_sub_exempt3();
    
        
        
        
        $this->load->template('exempt_approval_view', $data);
	}
    
    //Methods For Approving And Rejecting Annex 2 Forms
    public function approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $this->exempt_model->update_approval($id, 1, $approver_id, $appID);
        $this->hirarc_model->update_BSO($id, 1, $approver_id, $appID);
        $this->swp_model->update_approval($id, 1, $approver_id, $appID);
        $this->project_model->update_approval($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 2, "New Project Application For Exempt Dealing Approved", "BSO has approved a new project application for exempt dealing.");        
        redirect('exempt_approval/index');
    }
    
    public function reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->exempt_model->update_approval($id, 0, $approver_id, $appID);
        $this->hirarc_model->update_BSO($id, 0, $approver_id, $appID);
        $this->swp_model->update_approval($id, 0, $approver_id, $appID);
        $this->project_model->update_approval($id, 0, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", New Project Application For Exempt Dealing Submission Rejected", "<p>Your New Project Application For Exempt Dealing Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('exempt_approval/index');
    }
    
    public function Chair_approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->exempt_model->update_yes_issue($id, 1, $approver_id, $appID);
        $this->hirarc_model->update_yes_issue($id, 1, $approver_id, $appID);
        $this->swp_model->update_yes_issue($id, 1, $approver_id, $appID);
        $this->project_model->update_yes_issue($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 3, "New Project Application For Exempt Dealing Approved", "SSBC Chair has approved a new project application for exempt dealing that requires additional input.");
        
        redirect('exempt_approval/index');
    }
    
    public function approve2($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $this->exempt_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        $this->hirarc_model->update_SSBC($id, 1, $approver_id, $appID);
        $this->swp_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        $this->project_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 2, "New Project Application For Exempt Dealing Approved", "SSBC Member has approved an new project application for exempt dealing");
        
        redirect('exempt_approval/index');
    }
    
    public function reject2($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->exempt_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        $this->hirarc_model->update_SSBC($id, 0, $approver_id, $appID);
        $this->swp_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        $this->project_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", New Project Application For Exempt Dealing Submission Rejected", "<p>Your New Project Application For Exempt Dealing Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('exempt_approval/index');
    }
    
    public function final_approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->exempt_model->final_approval($id, 1, $approver_id, $appID);
        $this->hirarc_model->final_approval($id, 1, $approver_id, $appID);
        $this->swp_model->final_approval($id, 1, $approver_id, $appID);
        $this->project_model->final_approval($id, 1, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been fully approved
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", New Project Application For Exempt Dealing Submission Approved", "<p>Your New Project Application For Exempt Dealing Has Been Approved. </p>");
        
        redirect('exempt_approval/index');
    }
    
    public function final_reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->exempt_model->final_approval($id, 0, $approver_id, $appID);
        $this->hirarc_model->final_approval($id, 0, $approver_id, $appID);
        $this->swp_model->final_approval($id, 0, $approver_id, $appID);
        $this->project_model->final_approval($id, 0, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", New Project Application For Exempt Dealing Submission Rejected", "<p>Your New Project Application For Exempt Dealing Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('exempt_approval/index');
    }
    
    
    
}
    
?>
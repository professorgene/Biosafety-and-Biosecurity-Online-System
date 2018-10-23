<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class biohazard_approval extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('project_model');
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('biohazard_model');
        $this->load->model('hirarc_model');
        $this->load->model('swp_model');
        $this->load->model('email_model');
		
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('New Application','/newapplication',true);
		$this->breadcrumbs->push('Biohazardous Material', true);
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $data['all_bm_proj'] = $this->project_model->get_all_sub_bio();
        $data['all_bm_proj_Chair'] = $this->project_model->get_all_sub_bio2();
        $data['all_bm_proj_SSBC'] = $this->project_model->get_all_sub_bio3();
        
        
        $this->load->template('biohazard_approval_view', $data);
	}
    
    //Methods For Approving And Rejecting Annex 2 Forms
    public function approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->biohazard_model->update_approval($id, 1, $approver_id, $appID);
        $this->hirarc_model->update_BSO($id, 1, $approver_id, $appID);
        $this->swp_model->update_approval($id, 1, $approver_id, $appID);
        $this->project_model->update_approval($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 2, "New Project Application for Biohazard Material Approved", "BSO has approved a new project application for biohazard material ");
        
        redirect('biohazard_approval/index');
    }
    
    public function reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->biohazard_model->update_approval($id, 0, $approver_id, $appID);
        $this->hirarc_model->update_BSO($id, 0, $approver_id, $appID);
        $this->swp_model->update_approval($id, 0, $approver_id, $appID);
        $this->project_model->update_approval($id, 0, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", New Project Application for Biohazard Material Submission Rejected", "<p>Your New Project Application for Biohazard Material Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('biohazard_approval/index');
    }
    
    public function Chair_approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->biohazard_model->update_yes_issue($id, 1, $approver_id, $appID);
        $this->hirarc_model->update_yes_issue($id, 1, $approver_id, $appID);
        $this->swp_model->update_yes_issue($id, 1, $approver_id, $appID);
        $this->project_model->update_yes_issue($id, 1, $approver_id, $appID);
        
        //Notify All SSBC Members that SSBC Chair has approved a form but still requires their input
        $this->notification_model->insert_new_notification(null, 3, "New Project Application for Biohazard Material Approved", "SSBC Chair has approved a new project application for biohazard material that requires additional input");
        
        redirect('biohazard_approval/index');
    }
    
    public function approve2($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->biohazard_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        $this->hirarc_model->update_SSBC($id, 1, $approver_id, $appID);
        $this->swp_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        $this->project_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        
        
        //Notify SSBC Chair that SSBC Members have reviewed and approved the form
        $this->notification_model->insert_new_notification(null, 2, "Biohazard Materials Application Approved", "SSBC members have approved a new project application for biohazard material.");
        
        redirect('biohazard_approval/index');
    }
    
    public function reject2($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->biohazard_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        $this->hirarc_model->update_SSBC($id, 0, $approver_id, $appID);
        $this->swp_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        $this->project_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", New Project Application for Biohazard Material Submission Rejected", "<p>Your New Project Application for Biohazard Material Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('biohazard_approval/index');
    }
    
    public function final_approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->biohazard_model->final_approval($id, 1, $approver_id, $appID);
        $this->hirarc_model->final_approval($id, 1, $approver_id, $appID);
        $this->swp_model->final_approval($id, 1, $approver_id, $appID);
        $this->project_model->final_approval($id, 1, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been fully approved
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>New Project Application for Biohazard Material Submission Approved", "<p>Your New Project Application for Biohazard Material Submission Has Been Approved. </p>");
        
        redirect('biohazard_approval/index');
    }
    
    public function final_reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->biohazard_model->final_approval($id, 0, $approver_id, $appID);
        $this->hirarc_model->final_approval($id, 0, $approver_id, $appID);
        $this->swp_model->final_approval($id, 0, $approver_id, $appID);
        $this->project_model->final_approval($id, 0, $approver_id, $appID);
        
        
        //Send email to applicant let them know their form submission has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", New Project Application for Biohazard Material Submission Rejected", "<p>Your New Project Application for Biohazard Material Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('biohazard_approval/index');
    }
    
    
}
    
?>
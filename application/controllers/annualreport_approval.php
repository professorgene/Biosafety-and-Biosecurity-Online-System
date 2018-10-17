<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class annualreport_approval extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('annualfinalreport_model');
        $this->load->model('hirarc_model');
        $this->load->model('swp_model');
        $this->load->model('email_model');
        $this->load->model('project_model');
		
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('Annual or Final Report', true);
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $data['all_annual_proj'] = $this->project_model->get_all_sub_annual();
        $data['all_annual_SSBC_proj'] = $this->project_model->get_all_sub_annual2();
        $data['all_annual_Chair_proj'] = $this->project_model->get_all_sub_annual3();
        
        
        $this->load->template('annualreport_approval_view', $data);
	}
    
    
    public function ammend($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->annualfinalreport_model->proceed_ammend($id, 0, $approver_id, $appID);
        $this->project_model->proceed_ammend($id, 0, $approver_id, $appID);
        
        //Send email to Applicant notify them that their application has been rejected
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Annual Final Report Form Submission Rejected", "<p>Your Annual Final Report Form Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('annualreport_approval/index');
    }
    
    public function approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->annualfinalreport_model->update_approval($id, 1, $approver_id, $appID);
        $this->project_model->update_approval($id, 1, $approver_id, $appID);
        
        //Notify SSBC Members That BSO Has Approved A Form
        $this->notification_model->insert_new_notification(null, 3, "Annual Final Report Form Application Approved", "BSO has approved an Annual Final Report Form Application that requires additional input. ");
        
        redirect('annualreport_approval/index');
    }
    
    public function approve_BSO($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->annualfinalreport_model->update_approval_BSO($id, 1, $approver_id, $appID);
        $this->project_model->update_approval_BSO($id, 1, $approver_id, $appID);
        
        //Send email to Applicant notify them that their application has been fully approved
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Annual Final Report Form Submission Approved", "<p>Your Annual Final Report Form Has Been Approved</p>");
        
        redirect('annualreport_approval/index');
    }
    
    public function reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->annualfinalreport_model->update_approval($id, 0, $approver_id, $appID);
        $this->project_model->update_approval($id, 0, $approver_id, $appID);
        
        //Send email to Applicant notify them that their application has been rejected
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Annual Final Report Project  Submission Rejected", "<p>Your Annual Final Report Project Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('annualreport_approval/index');
    }
    
    public function approve2($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->annualfinalreport_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        $this->project_model->annual_update_approval_SSBC($id, 1, $approver_id, $appID);
        
        //Notify SSBC Chair That SSBC members Have Approved a Form
        $this->notification_model->insert_new_notification(null, 2, "Annual Final Report Form Application Approved", "SSBC Members have approved an Annual Final Report Form Application. ");
        
        redirect('annualreport_approval/index');
    }
    
    public function reject2($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->annualfinalreport_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        $this->project_model->annual_update_approval_SSBC($id, 0, $approver_id, $appID);
        
        //Send email to Applicant notify them that their application has been fully rejected
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Annual Final Report Project Submission Rejected", "<p>Your Annual Final Report Project Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('annualreport_approval/index');
    }
    
    public function approve3($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->annualfinalreport_model->update_approval_Chair($id, 1, $approver_id, $appID);
        $this->project_model->update_approval_Chair($id, 1, $approver_id, $appID);
        
        //Send email to Applicant notify them that their application has been fully approved
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Annual Final Report Project Submission Approved", "<p>Your Annual Final Report Form Has Been Approved</p>");
        
        redirect('annualreport_approval/index');
    }
    
    public function reject3($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->annualfinalreport_model->update_approval_Chair($id, 0, $approver_id, $appID);
        $this->project_model->update_approval_Chair($id, 0, $approver_id, $appID);
        
        //Send email to Applicant notify them that their application has been fully rejected
         $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Annual Final Report Project Submission", "<p>Your Annual Final Report Project Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('annualreport_approval/index');
    }
    //End Of Annual Final Report Functions
    
    
}
    
?>
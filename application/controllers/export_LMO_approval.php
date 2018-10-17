<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class export_LMO_approval extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('formf_model');
        $this->load->model('email_model');
        $this->load->model('project_model');
		
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('Exporting of Biological Material','/exportingrequest',true);
		$this->breadcrumbs->push('Living Modified Organisms (LMO)', true);
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $data['all_formf_proj'] = $this->project_model->get_all_sub_export_LMO();
        $data['all_formf_SSBC_proj'] = $this->project_model->get_all_sub_export_LMO2();
        $data['all_formf_Chair_proj'] = $this->project_model->get_all_sub_export_LMO3();
        
        $this->load->template('export_LMO_approval_view', $data);
	}
    
    public function approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->formf_model->update_approval($id, 1, $approver_id, $appID);
        $this->project_model->formf_update_approval($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 3, "Notification For Exporting LMO Form Approved", "BSO has approved a Notification For Exporting LMO Form Application");
        
        redirect('export_LMO_approval/index');
    }
    
    public function reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->formf_model->update_approval($id, 0, $approver_id, $appID);
        $this->project_model->formf_update_approval($id, 0, $approver_id, $appID);
        
        //Send email notify PI that their form has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Notification For Exporting LMO Form Submission Rejected", "<p>Your Notification For Exporting LMO Form Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('export_LMO_approval/index');
    }
    
    public function approve2($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->formf_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        $this->project_model->formf_update_approval_SSBC($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 2, "Notification For Exporting LMO Form Approved", "SSBC Member has approved a Notification For Exporting LMO Form Application");
        
        redirect('export_LMO_approval/index');
    }
    
    public function reject2($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->formf_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        $this->project_model->formf_update_approval_SSBC($id, 0, $approver_id, $appID);
        
         //Send email notify PI that their form has been rejected
         $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Notification For Exporting LMO Form Submission Rejected", "<p>Your Notification For Exporting LMO Form Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('export_LMO_approval/index');
    }
    
    public function approve3($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->formf_model->update_approval_Chair($id, 1, $approver_id, $appID);
        $this->project_model->formf_update_approval_Chair($id, 1, $approver_id, $appID);
        
        //Send email to PI, remind them to inform BSO when LMO will arrive to importing country
         $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Notification For Exporting LMO Form Submission Approved", "<p>Your Notification For Exporting LMO Form Submission Has Been Approved. Please Be sure to inform BSO when the shipped LMO had arrive to importing country</p>");
        
        redirect('export_LMO_approval/index');
    }
    
    public function reject3($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->formf_model->update_approval_Chair($id, 0, $approver_id, $appID);
        $this->project_model->formf_update_approval_Chair($id, 0, $approver_id, $appID);
        
         //Send email notify PI that their form has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Notification For Exporting LMO Form Submission Rejected", "<p>Your Notification For Exporting LMO Form Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('export_LMO_approval/index');
    }
}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class incidentaccident_exempt extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('incidentaccidentreport_model');
        $this->load->model('email_model');
        $this->load->model('project_model');
		
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('Incident Accident Reporting','/incidentaccident_type',true);
		$this->breadcrumbs->push('Incident/Accident Reporting for Exempt Dealing or Biohazardous Materials Project Approvals', true);
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $data['all_exemptincident'] = $this->project_model->get_all_sub_incident_exempt();
        $data['all_exemptincident_SSBC'] = $this->project_model->get_all_sub_incident_exempt2();
        
        $this->load->template('incidentaccident_exempt_view', $data);
	}
    
    
    public function approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->incidentaccidentreport_model->update_approval($id, 1, $approver_id, $appID);
        $this->project_model->incident_exempt_update_approval($id, 1, $approver_id, $appID);
        
		$this->notification_model->insert_new_notification(null, 5, "Minor Biological Incident/Accident Report Form Approved", "BSO has approved a Minor Biological Incident/Accident Form.");
        
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been approved!</div>');
        
        redirect('incidentaccident_exempt/index');
    }
    
    public function reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $this->incidentaccidentreport_model->update_approval($id, 0, $approver_id, $appID);
        $this->project_model->incident_exempt_update_approval($id, 0, $approver_id, $appID);
        
        //No need to inform by email just continue with investigation
        
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been rejected!</div>');
        
        redirect('incidentaccident_exempt/index');
    }
    
    public function approve2($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->incidentaccidentreport_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        $this->project_model->incident_exempt_update_approval_SSBC($id, 1, $approver_id, $appID);
        
        //Send email to victim or witnesses investigation outcomes
        $this->email_model->send_email($result[0]->account_email, "Incident Accident Report Project Submission Processed", "<p>Dear ". $result[0]->account_fullname .", Your Incident Accident Report Project Submission Has Been Processed.</p>");
        $this->notification_model->insert_new_notification($id, 1, "Incident Accident Report Project Submission Processed", "Incident Accident Report Project Submission Processed by : " . $this->session->userdata('account_name'));
		
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been approved!</div>');
        
        redirect('incidentaccident_exempt/index');
    }
    
    public function reject2($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $this->incidentaccidentreport_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        $this->project_model->incident_exempt_update_approval_SSBC($id, 0, $approver_id, $appID);
        
		$this->notification_model->insert_new_notification($id, 1, "Incident Accident Report Project Submission Rejected", "Incident Accident Report Project Submission Rejected by : " . $this->session->userdata('account_name'));
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been rejected!</div>');
        
        redirect('incidentaccident_exempt/index');
    }
    
    
    
    
}

?>
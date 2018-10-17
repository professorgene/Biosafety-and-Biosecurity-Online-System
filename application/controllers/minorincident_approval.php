<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class minorincident_approval extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('incidentaccidentreport_model');
        $this->load->model('email_model');
        $this->load->model('project_model');
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $data['all_minor'] = $this->project_model->get_all_sub_incident1_form();
        $data['all_minor_SSBC'] = $this->project_model->get_all_sub_incident1_form2();
        
        $this->load->template('minorincident_approval_view', $data);
	}
    
    //Methods For Approving And Rejecting Annex 2 Forms
    public function approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->incidentaccidentreport_model->update_approval($id, 1, $approver_id, $appID);
        $this->project_model->procurement_update_approval($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 5, "Minor Biological Incident/Accident Report Form Approved", "BSO has approved a Minor Biological Incident/Accident Form.");
        
        redirect('minorincident_approval/index');
    }
    
    public function reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $this->incidentaccidentreport_model->update_approval($id, 0, $approver_id, $appID);
        $this->project_model->procurement_update_approval($id, 0, $approver_id, $appID);
        
        redirect('minorincident_approval/index');
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
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Incident Accident Report Form Submission Processed", "<p>Your Incident Accident Report Form Submission Has Been Processed. (Investigations Outcomes Here)</p>");
        
        redirect('minorincident_approval/index');
    }
    
    public function reject2($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $this->incidentaccidentreport_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        $this->project_model->incident_exempt_update_approval_SSBC($id, 0, $approver_id, $appID);
        
        redirect('minorincident_approval/index');
    }
    
    
    
    
}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class majorincident_approval extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('incidentaccidentreport_model');
        $this->load->model('annex3_model');
        $this->load->model('email_model');
        $this->load->model('project_model');
		
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('Incident Accident Reporting','/incidentaccident_type',true);
		$this->breadcrumbs->push('LMO','/incidentaccident_LMO_type', true);
		$this->breadcrumbs->push('Major Biological Incident or Accident Form Approvals', true);
        
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $data['all_major'] = $this->project_model->get_all_sub_incident2_form();
        $data['all_major_SSBC'] = $this->project_model->get_all_sub_incident2_form2();
        
        $this->load->template('majorincident_approval_view', $data);
	}
    
    //Methods For Approving And Rejecting Incident Accident Forms
    public function approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->incidentaccidentreport_model->update_approval($id, 1, $approver_id, $appID);
        $this->annex3_model->update_approval($id, 1, $approver_id, $appID);
        $this->project_model->procurement_update_approval($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 3, "Major Biological Incident/Accident Report Form Approved", "BSO has approved a Major Biological Incident/Accident Form.");
        
        $this->notification_model->insert_new_notification(null, 5, "Major Biological Incident/Accident Report Form Approved", "BSO has approved a Major Biological Incident/Accident Form.");
        
        redirect('majorincident_approval/index');
    }
    
    public function reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $this->incidentaccidentreport_model->update_approval($id, 0, $approver_id, $appID);
        $this->annex3_model->update_approval($id, 0, $approver_id, $appID);
        $this->project_model->procurement_update_approval($id, 0, $approver_id, $appID);
        
        //no need to send email here just continue investigation
        
        redirect('majorincident_approval/index');
    }
    
    public function approve2($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->incidentaccidentreport_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        $this->annex3_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        $this->project_model->incident_exempt_update_approval_SSBC($id, 1, $approver_id, $appID);
        
        //send email to victim or witnesses for investigation outcomes
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Incident Accident Report Form Submission Processed", "<p>Your Incident Accident Report Form Submission Has Been Processed. (Investigations Outcomes Here)</p>");
        
        redirect('majorincident_approval/index');
    }
    
    public function reject2($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $this->incidentaccidentreport_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        $this->annex3_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        $this->project_model->incident_exempt_update_approval_SSBC($id, 0, $approver_id, $appID);
        
        //no need email here just continue invstigation
        
        redirect('majorincident_approval/index');
    }
    
    
    
    
}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class occupationaldisease_approval extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('incidentaccidentreport_model');
        $this->load->model('annex4_model');
        $this->load->model('email_model');
        $this->load->model('project_model');
        
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('Incident Accident Reporting','/incidentaccident_type',true);
		$this->breadcrumbs->push('LMO','/incidentaccident_LMO_type', true);
		$this->breadcrumbs->push('Occupational Disease Or Exposure', true);
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $data['all_major'] = $this->project_model->get_all_sub_incident3_form();
        $data['all_major_HSO'] = $this->project_model->get_all_sub_incident3_form2();
        $data['all_major_SSBC'] = $this->project_model->get_all_sub_incident3_form2();
        
        $this->load->template('occupationaldisease_approval_view', $data);
	}
    
    //Methods For Approving And Rejecting Incident Accident Forms
    public function approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->incidentaccidentreport_model->update_approval($id, 1, $approver_id, $appID);
        $this->annex4_model->update_approval($id, 1, $approver_id, $appID);
        $this->project_model->procurement_update_approval($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 3, "Occupational Disease or Exposure Project Approved", "BSO has approved a Occupational Disease or Exposure Project.");
        
        $this->notification_model->insert_new_notification(null, 5, "Occupational Disease or Exposure Project Approved", "BSO has approved a Occupational Disease or Exposure Project.");
        
        redirect('occupationaldisease_approval/index');
    }
    
    public function reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $this->incidentaccidentreport_model->update_approval($id, 0, $approver_id, $appID);
        $this->annex4_model->update_approval($id, 0, $approver_id, $appID);
        $this->project_model->procurement_update_approval($id, 0, $approver_id, $appID);
        
        redirect('occupationaldisease_approval/index');
    }
    
    public function approve2($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->incidentaccidentreport_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        $this->annex4_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        $this->project_model->incident_exempt_update_approval_SSBC($id, 1, $approver_id, $appID);
        
        //send email to victim or witnesses for investigation outcomes
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Occupational Disease or Exposure Project Submission Processed", "<p>Your Occupational Disease or Exposure Project Submission Has Been Processed. (Investigations Outcomes Here)</p>");
        
        redirect('occupationaldisease_approval/index');
    }
    
    public function reject2($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $this->incidentaccidentreport_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        $this->annex4_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        $this->project_model->incident_exempt_update_approval_SSBC($id, 0, $approver_id, $appID);
        
        redirect('occupationaldisease_approval/index');
    }
    
    
    
    
    
}

?>
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
        
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('Incident Accident Reporting','/incidentaccident_type',true);
		$this->breadcrumbs->push('LMO','/incidentaccident_LMO_type', true);
		$this->breadcrumbs->push('Occupational Disease Or Exposure', true);
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $data['all_major'] = $this->incidentaccidentreport_model->get_all_incident3_form();
        $data['all_major_HSO'] = $this->incidentaccidentreport_model->get_all_incident3_form3();
        $data['all_major_SSBC'] = $this->incidentaccidentreport_model->get_all_incident3_form2();
        
        $data['all_annex4'] = $this->annex4_model->get_all_annex4_form();
        $data['all_annex4_HSO'] = $this->annex4_model->get_all_annex4_form3();
        $data['all_annex4_SSBC'] = $this->annex4_model->get_all_annex4_form2();
        
        $this->load->template('occupationaldisease_approval_view', $data);
	}
    
    //Methods For Approving And Rejecting Incident Accident Forms
    public function approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->incidentaccidentreport_model->update_approval($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 3, "Major Biological Incident/Accident Report Form Approved", "BSO has approved a Major Biological Incident/Accident Form.");
        
        $this->notification_model->insert_new_notification(null, 5, "Major Biological Incident/Accident Report Form Approved", "BSO has approved a Major Biological Incident/Accident Form.");
        
        redirect('occupationaldisease_approval/index');
    }
    
    public function reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $this->incidentaccidentreport_model->update_approval($id, 0, $approver_id, $appID);
        
        redirect('occupationaldisease_approval/index');
    }
    
    public function approve2($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->incidentaccidentreport_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        
        //send email to victim or witnesses for investigation outcomes
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Incident Accident Report Form Submission Processed", "<p>Your Incident Accident Report Form Submission Has Been Processed. (Investigations Outcomes Here)</p>");
        
        redirect('occupationaldisease_approval/index');
    }
    
    public function reject2($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $this->incidentaccidentreport_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        
        redirect('occupationaldisease_approval/index');
    }
    
    public function approve3($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->incidentaccidentreport_model->update_approval_HSO($id, 1, $approver_id, $appID);
        
        redirect('occupationaldisease_approval/index');
    }
    
    public function reject3($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $this->incidentaccidentreport_model->update_approval_HSO($id, 0, $approver_id, $appID);
        
        redirect('occupationaldisease_approval/index');
    }
    
    
    //Methods For Approving And Rejecting Annex 4 Forms
    public function approve_annex4($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->annex4_model->update_approval($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 3, "Annex 4 Form Approved", "BSO has approved an Annex 4 Form.");
        
        $this->notification_model->insert_new_notification(null, 5, "Annex 4 Form Approved", "BSO has approved an Annex 4 Form.");
        
        redirect('occupationaldisease_approval/index');
    }
    
    public function reject_annex4($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $this->annex4_model->update_approval($id, 0, $approver_id, $appID);
        
        redirect('occupationaldisease_approval/index');
    }
    
    public function approve2_annex4($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->annex4_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        
        //send email to victim or witnesses for investigation outcomes
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Annex 4 Form Submission Processed", "<p>Your Annex 4 Form Submission Has Been Processed. (Investigations Outcomes Here)</p>");
        
        redirect('occupationaldisease_approval/index');
    }
    
    public function reject2_annex4($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $this->annex4_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        
        redirect('occupationaldisease_approval/index');
    }
    
    
    
}

?>
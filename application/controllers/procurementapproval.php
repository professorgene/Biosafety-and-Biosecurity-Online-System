<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class procurementapproval extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('project_model');
        $this->load->model('account_model');
        $this->load->model('procurement_model');
        $this->load->model('email_model');
        
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('Procurement of Biological Material', true);
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $data['all_procurement_proj'] = $this->project_model->get_all_sub_procurement();
        
        $this->load->template('procurementapproval_view', $data);
	}
    
    public function approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        //$this->procurement_model->update_approval($id, 1, $approver_id, $appID);
        $this->project_model->procurement_update_approval($id, 1, $approver_id, $appID);
        
        //Send email to Applicant requesting them to print out assessment sheets, QSF, and Pathogen data safety sheet. Tell them they can proceed to Notification of LMO and Biohazardous materials when the items arrived
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Pre-Purchase Material Risk assessment Form Submission Approved", "<p>Your Pre-Purchase Material Risk assessment Form Has Been Approved. You are required to print out the assessment, and attach it together with QSF and Pathogen Safety Data Sheet, which are to be approved by BSO, RCO director, Faculty manager and or/etc. Furthermore, once the items have arrived, you may proceed with filling out a Notification of LMO and Biohazardous Materials form. </p>");
        
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project Approved</div>');
        
        redirect('procurementapproval/index');
    }
    
    public function reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        //$msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->procurement_model->update_approval($id, 0, $approver_id, $appID);
        $this->project_model->procurement_update_approval($id, 0, $approver_id, $appID);
        
        //Send email to Applicant telling them their form has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Pre-Purchase Material Risk assessment Form Submission Rejected", "<p>Your Pre-Purchase Material Risk assessment Form Has Been Rejected</p>");
        $this->notification_model->insert_new_notification($id, 1, "Pre-Purchase Material Risk assessment Project Rejected", "Pre-Purchase Material Risk assessment Project Rejected by : " . $this->session->userdata('account_name'));
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project Rejected</div>');
        
        redirect('procurementapproval/index');
    }
}

?>
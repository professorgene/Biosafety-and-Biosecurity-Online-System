<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class export_exempt_BM extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('email_model');
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('notification_of_exporting_biological_material_model');
        
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $data['all_export'] = $this->notification_of_exporting_biological_material_model->get_all_form();
        
        $this->load->template('export_exempt_BM_view', $data);
	}
    
    public function approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->notification_of_exporting_biological_material_model->update_approval($id, 1, $approver_id, $appID);
        
        //Send email to PI, remind them to inform BSO when the shipped exempt dealing or biohazardous material arrived in importing country
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Notification For Exporting Biohazardous Materials Form Submission Approved", "<p>Your Notification For Exporting Biohazardous Materials Form Submission Has Been Approved. Please Be sure to inform BSO when the shipped Biohazardous Materials had arrive to importing country</p>");
        
        
        redirect('export_exempt_BM/index');
    }
    
    public function reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $this->notification_of_exporting_biological_material_model->update_approval($id, 0, $approver_id, $appID);
        
        //Send email to PI notify them that their form has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Notification For Exporting Biohazardous Materials Form Submission Rejected", "<p>Your Notification For Exporting Biohazardous Materials Form Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('export_exempt_BM/index');
    }
}

?>
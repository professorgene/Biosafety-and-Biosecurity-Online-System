<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class editrequest_approval extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('email_model');
        
        //Form Models
        $this->load->model('annex2_model');
        $this->load->model('annex3_model');
        $this->load->model('annex4_model');
        $this->load->model('annex5_model');
        $this->load->model('annualfinalreport_model');
        $this->load->model('biohazard_model');
        $this->load->model('exempt_model');
        $this->load->model('forme_model');
        $this->load->model('formf_model');
        $this->load->model('hirarc_model');
        $this->load->model('incidentaccidentreport_model');
        $this->load->model('notification_of_exporting_biological_material_model');
        $this->load->model('notification_of_LMO_and_BM_model');
        $this->load->model('pc1_model');
        $this->load->model('pc2_model');
        $this->load->model('procurement_model');
        $this->load->model('swp_model');
		
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('Modification & Extension Requests', true);
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $data['all_annex2'] = $this->annex2_model->get_all_edit_request();
        $data['all_annex3'] = $this->annex3_model->get_all_edit_request();
        $data['all_annex4'] = $this->annex4_model->get_all_edit_request();
        $data['all_annex5'] = $this->annex5_model->get_all_edit_request();
        $data['all_annual'] = $this->annualfinalreport_model->get_all_edit_request();
        $data['all_biohazard'] = $this->biohazard_model->get_all_edit_request();
        $data['all_exempt'] = $this->exempt_model->get_all_edit_request();
        $data['all_forme'] = $this->forme_model->get_all_edit_request();
        $data['all_formf'] = $this->formf_model->get_all_edit_request();
        $data['all_hirarc'] = $this->hirarc_model->get_all_edit_request();
        $data['all_incident'] = $this->incidentaccidentreport_model->get_all_edit_request();
        $data['all_notif_export'] = $this->notification_of_exporting_biological_material_model->get_all_edit_request();
        $data['all_notif_LMO'] = $this->notification_of_LMO_and_BM_model->get_all_edit_request();
        $data['all_pc1'] = $this->pc1_model->get_all_edit_request();
        $data['all_pc2'] = $this->pc2_model->get_all_edit_request();
        $data['all_procurement'] = $this->procurement_model->get_all_edit_request();
        $data['all_swp'] = $this->swp_model->get_all_edit_request();
        
        
        $this->load->template('editrequest_approval_view', $data);
	}
    
    //Methods For Approving And Rejecting Annex 2 Requests
    public function approve($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->annex2_model->update_editable($id, 1, $approver_id, $appid);
        
        //Send email to applicant let them know their form submission has been fully approved
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annex 2 Form Approved", "<p>Your Request For Editing An Annex 2 Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->annex2_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annex 2 Form Rejected", "<p>Your Request For Editing An Annex 2 Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting Annex 3 Requests
    public function approve_annex3($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->annex3_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annex 3 Form Approved", "<p>Your Request For Editing An Annex 3 Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject_annex3($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->annex3_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annex 3 Form Rejected", "<p>Your Request For Editing An Annex 3 Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting Annex 4 Requests
    public function approve_annex4($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->annex4_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annex 4 Form Approved", "<p>Your Request For Editing An Annex 4 Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject_annex4($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->annex4_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annex 4 Form Rejected", "<p>Your Request For Editing An Annex 4 Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting Annex 5 Requests
    public function approve_annex5($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->annex5_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annex 5 Form Approved", "<p>Your Request For Editing An Annex 5 Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject_annex5($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->annex5_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annex 5 Form Rejected", "<p>Your Request For Editing An Annex 5 Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting Annual Final Report Requests
    public function approve_annual($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->annualfinalreport_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annual Final Report Form Approved", "<p>Your Request For Editing An Annual Final Report Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject_annual($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->annualfinalreport_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annual Final Report Form Rejected", "<p>Your Request For Editing An Annual Final Report Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting Biohazard material Requests
    public function approve_biohazard($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->biohazard_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Biohazard Material Application Form Approved", "<p>Your Request For Editing A Biohazard Material Application Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject_biohazard($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->biohazard_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Biohazard Material Application Form Rejected", "<p>Your Request For Editing A Biohazard Material Application Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting Exempt Dealing form Requests
    public function approve_exempt($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->exempt_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Exempt Dealing Application Form Approved", "<p>Your Request For Editing An Exempt Dealing Application Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject_exempt($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->exempt_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Exempt Dealing Application Form Rejected", "<p>Your Request For Editing An Exempt Dealing Application Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting Form E Requests
    public function approve_forme($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->forme_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Form E Application Form Approved", "<p>Your Request For Editing A Form E Application Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject_forme($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->forme_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Form E Application Form Rejected", "<p>Your Request For Editing A Form E Application Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting Form F Requests
    public function approve_formf($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->formf_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Form F Application Form Approved", "<p>Your Request For Editing A Form F Application Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject_formf($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->formf_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Form F Application Form Rejected", "<p>Your Request For Editing A Form F Application Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting HIRARC form Requests
    public function approve_hirarc($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->hirarc_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For HIRARC Form Approved", "<p>Your Request For Editing A HIRARC Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject_hirarc($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->hirarc_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For HIRARC Form Rejected", "<p>Your Request For Editing A HIRARC Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting Incident Accident report form Requests
    public function approve_incident($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->incidentaccidentreport_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Incident Accident Report Form Approved", "<p>Your Request For Editing A Incident Accident Report Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject_incident($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->incidentaccidentreport_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Incident Accident Report Form Rejected", "<p>Your Request For Editing A Incident Accident Report Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting Exporting form Requests
    public function approve_export($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->notification_of_exporting_biological_material_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Notification of Exporting of Biological Material Form Approved", "<p>Your Request For Editing A Notification of Exporting of Biological Material Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject_export($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->notification_of_exporting_biological_material_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Notification of Exporting of Biological Material Form Rejected", "<p>Your Request For Notification of Exporting of Biological Material Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting Notification form Requests
    public function approve_notification($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->notification_of_LMO_and_BM_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Notification of LMO and Biohazardous Material Form Approved", "<p>Your Request For Editing A Notification of LMO and Biohazardous Material Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject_notification($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->notification_of_LMO_and_BM_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Notification of LMO and Biohazardous Material Form Rejected", "<p>Your Request For Editing Notification of LMO and Biohazardous Material Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting PC1 form Requests
    public function approve_pc1($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->pc1_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For PC1 Application Form Approved", "<p>Your Request For Editing A PC1 Application Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject_pc1($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->pc1_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For PC1 Form Rejected", "<p>Your Request For Editing PC1 Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting PC2 form Requests
    public function approve_pc2($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->pc2_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For PC2 Application Form Approved", "<p>Your Request For Editing A PC2 Application Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject_pc2($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->pc2_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For PC2 Form Rejected", "<p>Your Request For Editing PC2 Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting procurement form Requests
    public function approve_procurement($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->procurement_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Pre-purchase Material Risk Assessment Form Approved", "<p>Your Request For Editing A Pre-purchase Material Risk Assessment Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject_procurement($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->procurement_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Pre-purchase Material Risk Assessment Form Rejected", "<p>Your Request For Editing Pre-purchase Material Risk Assessment Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting swp form Requests
    public function approve_swp($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->swp_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Safety Work Procedure Form Approved", "<p>Your Request For Editing A Edit Request For Safety Work Procedure Form Has Been Approved. </p>");
        
        redirect('editrequest_approval/index');
    }
    
    public function reject_swp($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->swp_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Safety Work Procedure Form Rejected", "<p>Your Request For Editing Safety Work Procedure Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('editrequest_approval/index');
    }
    
}
    
?>
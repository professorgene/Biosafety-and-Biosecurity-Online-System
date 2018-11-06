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
        $this->load->model('project_model');
		
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('Modification & Extension Requests', true);
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $data['all_lmo_project'] = $this->project_model->get_all_lmo_edit_request();
        $data['all_bio_project'] = $this->project_model->get_all_bio_edit_request();
        $data['all_exempt_project'] = $this->project_model->get_all_exempt_edit_request();
        $data['all_procurement_project'] = $this->project_model->get_all_procurement_edit_request();
        $data['all_notif_LMO_project'] = $this->project_model->get_all_notif_LMO_edit_request();
        $data['all_annual_project'] = $this->project_model->get_all_annual_edit_request();
        $data['all_annual_project'] = $this->project_model->get_all_annual_edit_request();
        $data['all_export_LMO_project'] = $this->project_model->get_all_export_LMO_edit_request();
        $data['all_export_Exempt_project'] = $this->project_model->get_all_export_exempt_edit_request();
        $data['all_incident_Exempt_project'] = $this->project_model->get_all_incident_exempt_edit_request();
        $data['all_minor_incident'] = $this->project_model->get_all_minor_edit_request();
        $data['all_major_incident'] = $this->project_model->get_all_major_edit_request();
        $data['all_occupational_incident'] = $this->project_model->get_all_occupational_edit_request();
        
        
        $this->load->template('editrequest_approval_view', $data);
	}
    
    //Methods For Approving And Rejecting application for lmo edit requests
    public function approve($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $type = 
        $result = $this->account_model->get_account_by_id($id);
        $this->annex2_model->update_editable($id, 1, $approver_id, $appid);
        $this->forme_model->update_editable($id, 1, $approver_id, $appid);
        $this->hirarc_model->update_editable($id, 1, $approver_id, $appid);
        $this->pc1_model->update_editable($id, 1, $approver_id, $appid);
        $this->pc2_model->update_editable($id, 1, $approver_id, $appid);
        $this->swp_model->update_editable($id, 1, $approver_id, $appid);
        $this->project_model->update_editable($id, 1, $approver_id, $appid);
        
        //Send email to applicant let them know their form submission has been fully approved
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For New Application For LMO Project Approved", "<p>Your Request For Editing An Application For LMO Project Has Been Approved. </p>");
        $this->notification_model->insert_new_notification($id, 1, "Edit Request For New Application For LMO Project Approved", "Edit Request For New Application For LMO Project Approved by : " . $this->session->userdata('account_name'));
		
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
        $this->forme_model->update_editable($id, 0, $approver_id, $appid);
        $this->hirarc_model->update_editable($id, 0, $approver_id, $appid);
        $this->pc1_model->update_editable($id, 0, $approver_id, $appid);
        $this->pc2_model->update_editable($id, 0, $approver_id, $appid);
        $this->swp_model->update_editable($id, 0, $approver_id, $appid);
        $this->project_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For New Application For LMO Project Rejected", "<p>Your Request For Editing An Application For LMO Project Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For New Application For LMO Project Rejected", "Edit Request For New Application For LMO Project Rejected by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting Biohazard Materials Application Requests
    public function approve_bio($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->biohazard_model->update_editable($id, 1, $approver_id, $appid);
        $this->hirarc_model->update_editable($id, 1, $approver_id, $appid);
        $this->swp_model->update_editable($id, 1, $approver_id, $appid);
        $this->project_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Application for Biohazardous Materials Approved", "<p>Your Request For Editing An Application for Biohazardous Materials Has Been Approved. </p>");
        $this->notification_model->insert_new_notification($id, 1, "Edit Request For Application for Biohazardous Materials Approved", "Edit Request For Application for Biohazardous Materials Approved by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    public function reject_bio($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->biohazard_model->update_editable($id, 0, $approver_id, $appid);
        $this->hirarc_model->update_editable($id, 0, $approver_id, $appid);
        $this->swp_model->update_editable($id, 0, $approver_id, $appid);
        $this->project_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Application for Biohazardous Materials Rejected", "<p>Your Request For Editing An Application for Biohazardous Materials Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Application for Biohazardous Materials Rejected", "Edit Request For Application for Biohazardous Materials Rejected by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting exempt dealing application
    public function approve_exempt($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->exempt_model->update_editable($id, 1, $approver_id, $appid);
        $this->hirarc_model->update_editable($id, 1, $approver_id, $appid);
        $this->swp_model->update_editable($id, 1, $approver_id, $appid);
        $this->project_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Application for Exempt Dealing Approved", "<p>Your Request For Editing An Application for Exempt Dealing Has Been Approved. </p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Application for Exempt Dealing Approved", "Edit Request For Application for Exempt Dealing Approved by : " . $this->session->userdata('account_name'));
		
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
        $this->hirarc_model->update_editable($id, 0, $approver_id, $appid);
        $this->swp_model->update_editable($id, 0, $approver_id, $appid);
        $this->project_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Application for Exempt Dealing", "<p>Your Request For Editing An AApplication for Exempt Dealing Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Application for Exempt Dealing", "Edit Request For Application for Exempt Dealing by : " . $this->session->userdata('account_name'));
		
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
        $this->project_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Pre-purchase Material Risk Assessment Project Approved", "<p>Your Request For Editing A Pre-purchase Material Risk Assessment Project Has Been Approved. </p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Pre-purchase Material Risk Assessment Project Approved", "Edit Request For Pre-purchase Material Risk Assessment Project Approved by : " . $this->session->userdata('account_name'));
		
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
        $this->project_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Pre-purchase Material Risk Assessment Project Rejected", "<p>Your Request For Editing Pre-purchase Material Risk Assessment Project Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Pre-purchase Material Risk Assessment Project Rejected", "Edit Request For Pre-purchase Material Risk Assessment Project Rejected by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting notification of LMO and BM project requests
    public function approve_notif_LMO($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->notification_of_LMO_and_BM_model->update_editable($id, 1, $approver_id, $appid);
        $this->project_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Notification of LMO and BM Project Approved", "<p>Your Request For Editing A Notification of LMO and BM Project Has Been Approved. </p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Notification of LMO and BM Project Approved", "Edit Request For Notification of LMO and BM Project Approved by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    public function reject_notif_LMO($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->notification_of_LMO_and_BM_model->update_editable($id, 0, $approver_id, $appid);
        $this->project_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Notification of LMO and BM Project Rejected", "<p>Your Request For Editing Notification of LMO and BM Project Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        $this->notification_model->insert_new_notification($id, 1, "Edit Request For Notification of LMO and BM Project Rejected", "Edit Request For Notification of LMO and BM Project Rejected by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    //Methods For Approving And Rejecting annual project requests
    public function approve_annual($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->annualfinalreport_model->update_editable($id, 1, $approver_id, $appid);
        $this->project_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annual Final Report Project Approved", "<p>Your Request For Editing A Annual Final Report Project Has Been Approved. </p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Annual Final Report Project Approved", "Edit Request For Annual Final Report Project Approved by : " . $this->session->userdata('account_name'));
		
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
        $this->project_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annual Final Report Project Rejected", "<p>Your Request For Editing Annual Final Report Project Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Annual Final Report Project Rejected", "Edit Request For Annual Final Report Project Rejected by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    public function approve_export_LMO($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->formf_model->update_editable($id, 1, $approver_id, $appid);
        $this->project_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annual Final Report Project Approved", "<p>Your Request For Editing A Annual Final Report Project Has Been Approved. </p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Annual Final Report Project Approved", "Edit Request For Annual Final Report Project Approved by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    public function reject_export_LMO($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->formf_model->update_editable($id, 0, $approver_id, $appid);
        $this->project_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annual Final Report Project Rejected", "<p>Your Request For Editing Annual Final Report Project Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Annual Final Report Project Rejected", "Edit Request For Annual Final Report Project Rejected by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    public function approve_export_Exempt($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->notification_of_exporting_biological_material_model->update_editable($id, 1, $approver_id, $appid);
        $this->project_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annual Final Report Project Approved", "<p>Your Request For Editing A Annual Final Report Project Has Been Approved. </p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Annual Final Report Project Approved", "Edit Request For Annual Final Report Project Approved by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    public function reject_export_Exempt($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->notification_of_exporting_biological_material_model->update_editable($id, 0, $approver_id, $appid);
        $this->project_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annual Final Report Project Rejected", "<p>Your Request For Editing Annual Final Report Project Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Annual Final Report Project Rejected", "Edit Request For Annual Final Report Project Rejected by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    public function approve_incident_Exempt($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->incidentaccidentreport_model->update_editable($id, 1, $approver_id, $appid);
        $this->project_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Incident Accident Report For Exempt Dealings or Biohazardous Material Project Approved", "<p>Your Request For Editing A Incident Accident Report For Exempt Dealings or Biohazardous Material project Has Been Approved. </p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Incident Accident Report For Exempt Dealings or Biohazardous Material Project Approved", "Edit Request For Incident Accident Report For Exempt Dealings or Biohazardous Material Project Approved by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    public function reject_incident_Exempt($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->incidentaccidentreport_model->update_editable($id, 0, $approver_id, $appid);
        $this->project_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Annual Final Report Project Rejected", "<p>Your Request For Editing Annual Final Report Project Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Annual Final Report Project Rejected", "Edit Request For Annual Final Report Project Rejected by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    public function approve_minor($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->incidentaccidentreport_model->update_editable($id, 1, $approver_id, $appid);
        $this->project_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Minor Incident Accident Report For LMO Project Approved", "<p>Your Request For Editing A Minor Incident Accident Report For LMO Project Has Been Approved. </p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Minor Incident Accident Report For LMO Project Approved", "Edit Request For Minor Incident Accident Report For LMO Project Approved by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    public function reject_minor($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->incidentaccidentreport_model->update_editable($id, 0, $approver_id, $appid);
        $this->project_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Minor Incident Accident Report For LMO Project Rejected", "<p>Your Request For Editing Minor Incident Accident Report For LMO Project Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Minor Incident Accident Report For LMO Project Rejected", "Edit Request For Minor Incident Accident Report For LMO Project Rejected by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    public function approve_major($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->incidentaccidentreport_model->update_editable($id, 1, $approver_id, $appid);
        $this->annex3_model->update_editable($id, 1, $approver_id, $appid);
        $this->project_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Major Incident Accident Report For LMO Project Approved", "<p>Your Request For Editing A Major Incident Accident Report For LMO project Has Been Approved. </p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Major Incident Accident Report For LMO Project Approved", "Edit Request For Major Incident Accident Report For LMO Project Approved by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    public function reject_major($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->incidentaccidentreport_model->update_editable($id, 0, $approver_id, $appid);
        $this->annex3_model->update_editable($id, 0, $approver_id, $appid);
        $this->project_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Major Incident Accident Report For LMO Project Rejected", "<p>Your Request For Editing Major Incident Accident Report For LMO Project Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Major Incident Accident Report For LMO Project Rejected", "Edit Request For Major Incident Accident Report For LMO Project Rejected by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    public function approve_occupational($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->incidentaccidentreport_model->update_editable($id, 1, $approver_id, $appid);
        $this->annex4_model->update_editable($id, 1, $approver_id, $appid);
        $this->project_model->update_editable($id, 1, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Occupational Disease or Exposure Project Approved", "<p>Your Request For Editing A Occupational Disease or Exposure Project Has Been Approved. </p>");
                
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Occupational Disease or Exposure Project Approved", "Edit Request For Occupational Disease or Exposure Project Approved by : " . $this->session->userdata('account_name'));
		
		redirect('editrequest_approval/index');
    }
    
    public function reject_occupational($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->incidentaccidentreport_model->update_editable($id, 0, $approver_id, $appid);
        $this->annex4_model->update_editable($id, 0, $approver_id, $appid);
        $this->project_model->update_editable($id, 0, $approver_id, $appid);
        
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Edit Request For Occupational Disease or Exposure Project Rejected", "<p>Your Request For Editing MOccupational Disease or Exposure Project Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Edit Request For Occupational Disease or Exposure Project Rejected", "Edit Request For Occupational Disease or Exposure Project Rejected by : " . $this->session->userdata('account_name'));
		
        redirect('editrequest_approval/index');
    }
    
    
    
}
    
?>
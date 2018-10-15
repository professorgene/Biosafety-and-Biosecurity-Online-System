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
        
        /*$data['all_annex2'] = $this->annex2_model->get_all_edit_request();
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
        $data['all_swp'] = $this->swp_model->get_all_edit_request();*/
        
        
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
        
        redirect('editrequest_approval/index');
    }
    
    
    
}
    
?>
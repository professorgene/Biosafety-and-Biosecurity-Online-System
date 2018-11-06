<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class history extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('project_model');
        $this->load->model('history_model');
        $this->load->model('email_model');
		//breadcrumb
		$this->breadcrumbs->unshift('Home', '/');
        $this->breadcrumbs->push('New Project','/projectselect', true);
		$this->breadcrumbs->push('Application','/applicationpage', true);		
        $this->breadcrumbs->push('Modification of Approved Project', true);
        
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
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $data['past'] = $this->history_model->get_all_project_by_id($this->session->userdata('account_id'));
        #$data['total'] = count((array)$data['past']);
        
        $this->load->template('history_view', $data);
	}
    
    public function edit_application($id, $type, $editable)
    {
        
        $id = $this->uri->segment(3);
        $type = $this->uri->segment(4);
        $editable = $this->uri->segment(5);
        
        if($type =="app_lmo"){
            
            if($editable == 2){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['editload'] = "true";
            $data['appID'] = $id;

            $data['retrieved'] = $this->annex2_model->get_form_by_project_id($id);
            $data['retrieved2'] = $this->forme_model->get_form_by_project_id($id);
            $data['retrieved3'] = $this->hirarc_model->get_form_by_project_id($id);
            $data['retrieved4'] = $this->pc1_model->get_form_by_project_id($id);
            $data['retrieved5'] = $this->pc2_model->get_form_by_project_id($id);
            $data['retrieved6'] = $this->swp_model->get_form_by_project_id($id);

            $this->load->template('lmoproj_view', $data);
            }
            else
            {
            
                $this->annex2_model->edit_request($id);
                $this->forme_model->edit_request($id);
                $this->hirarc_model->edit_request($id);
                $this->pc1_model->edit_request($id);
                $this->pc2_model->edit_request($id);
                $this->swp_model->edit_request($id);
                $this->project_model->edit_request($id);
            
                $this->notification_model->insert_new_notification(null, 4, "Application for Living Modified Organisms Modification Request", "The following user has requested to edit an Application for Living Modified Organisms: " . $this->session->userdata('account_name'));
                
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Edit Request Sent</div>');
                
                redirect('history/index');
            }
            
        }elseif($type =="app_bio"){
            
            if($editable == 2){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['editload'] = "true";
            $data['appID'] = $id;

            $data['retrieved'] = $this->biohazard_model->get_form_by_project_id($id);
            $data['retrieved3'] = $this->hirarc_model->get_form_by_project_id($id);
            $data['retrieved6'] = $this->swp_model->get_form_by_project_id($id);

            $this->load->template('biohazardproj_view', $data);
            }
            else
            {
            
                $this->biohazard_model->edit_request($id);
                $this->hirarc_model->edit_request($id);
                $this->swp_model->edit_request($id);
                $this->project_model->edit_request($id);
            
                $this->notification_model->insert_new_notification(null, 4, "Application for Biohazardous Materials Modification Request", "The following user has requested to edit an Application for Biohazardous Materials: " . $this->session->userdata('account_name'));
                
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Edit Request Sent</div>');
                redirect('history/index');
            }
            
        }elseif($type =="app_exempt"){
            
            if($editable == 2){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['editload'] = "true";
            $data['appID'] = $id;

            $data['retrieved'] = $this->exempt_model->get_form_by_project_id($id);
            $data['retrieved3'] = $this->hirarc_model->get_form_by_project_id($id);
            $data['retrieved6'] = $this->swp_model->get_form_by_project_id($id);

            $this->load->template('exemptproj_view', $data);
            }
            else
            {
            
                $this->exempt_model->edit_request($id);
                $this->hirarc_model->edit_request($id);
                $this->swp_model->edit_request($id);
                $this->project_model->edit_request($id);
            
                $this->notification_model->insert_new_notification(null, 4, "Application for Exempt Dealings Modification Request", "The following user has requested to edit an Application for Exempt Dealings: " . $this->session->userdata('account_name'));
                
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Edit Request Sent</div>');
                redirect('history/index');
            }
            
        }elseif($type =="procurement"){
            
            if($editable == 2){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['editload'] = "true";
            $data['appID'] = $id;

            $data['retrieved'] = $this->procurement_model->get_form_by_project_id($id);
            

            $this->load->template('procurementproj_view', $data);
            }
            else
            {
            
                $this->procurement_model->edit_request($id);
                $this->project_model->edit_request($id);
            
                $this->notification_model->insert_new_notification(null, 4, "Application for Procurement of Biohazardous Materials Modification Request", "The following user has requested to edit an Application for Procurement of Biohazardous Materials: " . $this->session->userdata('account_name'));
                
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Edit Request Sent</div>');
                redirect('history/index');
            }
            
        }elseif($type =="notifLMOBM"){
            
            if($editable == 2){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['editload'] = "true";
            $data['appID'] = $id;

            $data['retrieved'] = $this->notification_of_LMO_and_BM_model->get_form_by_project_id($id);
            

            $this->load->template('notification_of_LMO_and_BM_proj_view', $data);
            }
            else
            {
            
                $this->notification_of_LMO_and_BM_model->edit_request($id);
                $this->project_model->edit_request($id);
            
                $this->notification_model->insert_new_notification(null, 4, "Notification of LMO and BM Modification Request", "The following user has requested to edit an Application for Notification of LMO and BM: " . $this->session->userdata('account_name'));
                
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Edit Request Sent</div>');
                redirect('history/index');
            }
            
        }elseif($type =="anuualfinalreport"){
            
            if($editable == 2){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['editload'] = "true";
            $data['appID'] = $id;

            $data['retrieved'] = $this->annualfinalreport_model->get_form_by_project_id($id);
            

            $this->load->template('annualorfinalreportproj_view', $data);
            }
            else
            {
            
                $this->annualfinalreport_model->edit_request($id);
                $this->project_model->edit_request($id);
            
                $this->notification_model->insert_new_notification(null, 4, "Annual or Final Report Modification Request", "The following user has requested to edit an Annual or Final Report: " . $this->session->userdata('account_name'));
                
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Edit Request Sent</div>');
                redirect('history/index');
            }
            
        }elseif($type =="exportLMO"){
            
            if($editable == 2){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['editload'] = "true";
            $data['appID'] = $id;

            $data['retrieved'] = $this->formf_model->get_form_by_project_id($id);
            

            $this->load->template('exportingofbioLMOproj_view', $data);
            }
            else
            {
            
                $this->formf_model->edit_request($id);
                $this->project_model->edit_request($id);
            
                $this->notification_model->insert_new_notification(null, 4, "Annual or Final Report Modification Request", "The following user has requested to edit an Annual or Final Report: " . $this->session->userdata('account_name'));
                
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Edit Request Sent</div>');
                redirect('history/index');
            }
            
        }elseif($type =="exportExempt"){
            
            if($editable == 2){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['editload'] = "true";
            $data['appID'] = $id;

            $data['retrieved'] = $this->notification_of_exporting_biological_material_model->get_form_by_project_id($id);
            

            $this->load->template('exportingofbioexemptdealingproj_view', $data);
            }
            else
            {
            
                $this->notification_of_exporting_biological_material_model->edit_request($id);
                $this->project_model->edit_request($id);
            
                $this->notification_model->insert_new_notification(null, 4, "Annual or Final Report Modification Request", "The following user has requested to edit an Annual or Final Report: " . $this->session->userdata('account_name'));
                
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Edit Request Sent</div>');
                redirect('history/index');
            }
            
        }elseif($type =="incidentExempt"){
            
            if($editable == 2){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['editload'] = "true";
            $data['appID'] = $id;

            $data['retrieved'] = $this->incidentaccidentreport_model->get_form_by_project_id($id);
            

            $this->load->template('incidentaccidentreportingpageexemptproj_view', $data);
            }
            else
            {
            
                $this->incidentaccidentreport_model->edit_request($id);
                $this->project_model->edit_request($id);
            
                $this->notification_model->insert_new_notification(null, 4, "Incident Accident Report for exempt dealing or biohazardous materials Modification Request", "The following user has requested to edit an Annual or Final Report: " . $this->session->userdata('account_name'));
                
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Edit Request Sent</div>');
                redirect('history/index');
            }
            
        }elseif($type =="minorbio"){
            
            if($editable == 2){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['editload'] = "true";
            $data['appID'] = $id;

            $data['retrieved'] = $this->incidentaccidentreport_model->get_form_by_project_id($id);
            

            $this->load->template('minorbioproj_view', $data);
            }
            else
            {
            
                $this->incidentaccidentreport_model->edit_request($id);
                $this->project_model->edit_request($id);
            
                $this->notification_model->insert_new_notification(null, 4, "Minor Incident Accident Report Modification Request", "The following user has requested to edit a Minor Incident Accident Report: " . $this->session->userdata('account_name'));
                
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Edit Request Sent</div>');
                redirect('history/index');
            }
            
        }elseif($type =="majorbio"){
            
            if($editable == 2){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['editload'] = "true";
            $data['appID'] = $id;

            $data['retrieved'] = $this->incidentaccidentreport_model->get_form_by_project_id($id);
            $data['retrieved2'] = $this->annex3_model->get_form_by_project_id($id);
            

            $this->load->template('majorincidentaccidentreportingpageproj_view', $data);
            }
            else
            {
            
                $this->incidentaccidentreport_model->edit_request($id);
                $this->annex3_model->edit_request($id);
                $this->project_model->edit_request($id);
            
                $this->notification_model->insert_new_notification(null, 4, "Major Incident Accident Report Modification Request", "The following user has requested to edit a Major Incident Accident Report: " . $this->session->userdata('account_name'));
                
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Edit Request Sent</div>');
                redirect('history/index');
            }
            
        }elseif($type =="occupational"){
            
            if($editable == 2){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['editload'] = "true";
            $data['appID'] = $id;

            $data['retrieved'] = $this->incidentaccidentreport_model->get_form_by_project_id($id);
            $data['retrieved2'] = $this->annex4_model->get_form_by_project_id($id);
            

            $this->load->template('occupationaldiseaseexposurepageproj_view', $data);
            }
            else
            {
            
                $this->incidentaccidentreport_model->edit_request($id);
                $this->annex4_model->edit_request($id);
                $this->project_model->edit_request($id);
            
                $this->notification_model->insert_new_notification(null, 4, "Major Incident Accident Report Modification Request", "The following user has requested to edit a Major Incident Accident Report: " . $this->session->userdata('account_name'));
                
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Edit Request Sent</div>');
                redirect('history/index');
            }
            
        }
        
            
        
    }
    
    
}

?>
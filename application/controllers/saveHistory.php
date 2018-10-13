<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class saveHistory extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('project_model');
        $this->load->model('saveHistory_model');
        $this->load->model('email_model');
		//breadcrumb
		$this->breadcrumbs->unshift('Home', '/');	
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
        
        $data['past'] = $this->saveHistory_model->get_all_project_by_id($this->session->userdata('account_id'));
        #$data['total'] = count((array)$data['past']);
        
        $this->load->template('saveHistory_view', $data);
	}
    
    /*public function continue($id){
        
        $id = $this->uri->segment(3);
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $data['load'] = "true";
        $data['saveload'] = "true";
        $data['appID'] = $id;
        
        $data['retrieved'] = $this->annex2_model->get_form_by_project_id($id);
        $data['retrieved2'] = $this->forme_model->get_form_by_project_id($id);
        $data['retrieved3'] = $this->hirarc_model->get_form_by_project_id($id);
        $data['retrieved4'] = $this->pc1_model->get_form_by_project_id($id);
        $data['retrieved5'] = $this->pc2_model->get_form_by_project_id($id);
        $data['retrieved6'] = $this->swp_model->get_form_by_project_id($id);
        
        $this->load->template('lmoproj_view', $data);
        
    }*/
    
    public function edit_application($id, $type, $editable)
    {
        
        $id = $this->uri->segment(3);
        $type = $this->uri->segment(4);
        $editable = $this->uri->segment(5);
        
        if($type =="ANNEX%202%20FORM"){
            
            
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->annex2_model->get_form_by_id($id);

                $this->load->template('annex2_view', $data);
                
            }else{
                
                $this->annex2_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "Annex 2 Application Modification Request", "The following user has requested to edit an Annex 2 form: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
            
            
            
        }elseif($type =="ANNEX%203%20FORM"){
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->annex3_model->get_form_by_id($id);

                $this->load->template('annex3_view', $data);
                
            }else{
                
                $this->annex3_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "Annex 3 Application Modification Request", "The following user has requested to edit an Annex 3 form: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
        }elseif($type =="ANNEX%204%20FORM"){
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->annex4_model->get_form_by_id($id);

                $this->load->template('annex4_view', $data);
                
            }else{
                
                $this->annex4_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "Annex 4 Application Modification Request", "The following user has requested to edit an Annex 4 form: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
        }elseif($type =="ANNEX%205%20FORM"){
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->annex5_model->get_form_by_id($id);

                $this->load->template('annex5_view', $data);
                
            }else{
                
                $this->annex5_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "Annex 5 Application Modification Request", "The following user has requested to edit an Annex 5 form: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
        }elseif($type =="SBC%20ANNUAL%20OR%20FINAL%20REPORT%20FOR%20USE%20OF%20BIOHAZARDOUS%20MATERIALS"){
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->annualfinalreport_model->get_form_by_id($id);

                $this->load->template('annualfinalreport_view', $data);
                
            }else{
                
                $this->annualfinalreport_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "Annual or Final Report Application Modification Request", "The following user has requested to edit an Annual or Final Report form: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
        }elseif($type =="APPLICATION%20FOR%20BIOSAFETY%20CLEARANCE%20FORM"){
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->biohazard_model->get_form_by_id($id);

                $this->load->template('biohazard_view', $data);
                
            }else{
                
                $this->biohazard_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "Application for Biosafety Clearance Form Modification Request", "The following user has requested to edit an Application for Biosafety Clearance form: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
        }elseif($type =="APPLICATION%20FOR%20BIOSAFETY%20CLEARANCE%20EXEMPT%20DEALINGS%20FORM"){
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->exempt_model->get_form_by_id($id);

                $this->load->template('exempt_view', $data);
                
            }else{
                
                $this->exempt_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "Application for Biosafety Clearance Exempt Dealings Form Modification Request", "The following user has requested to edit an Application for Biosafety Clearance Exempt Dealings form: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
        }elseif($type =="FORM%20E"){
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->forme_model->get_form_by_id($id);

                $this->load->template('forme_view', $data);
                
            }else{
                
                $this->forme_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "Form E Modification Request", "The following user has requested to edit a Form E: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
        }elseif($type =="FORM%20F"){
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->formf_model->get_form_by_id($id);

                $this->load->template('formf_view', $data);
                
            }else{
                
                $this->formf_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "Form F Modification Request", "The following user has requested to edit a Form F: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
        }elseif($type =="OHS-F-4.5.X%20HIRARC%20FORM"){
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->hirarc_model->get_form_by_id($id);

                $this->load->template('hirarc_view', $data);
                
            }else{
                
                $this->hirarc_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "HIRARC Form Modification Request", "The following user has requested to edit a HIRARC form: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
        }elseif($type =="OHS-F-4.20.X%20INCIDENT%20ACCIDENT%20REPORT"){
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->incidentaccidentreport_model->get_form_by_id($id);

                $this->load->template('incidentaccidentreport_view', $data);
                
            }else{
                
                $this->incidentaccidentreport_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "Incident Accident Report Application Modification Request", "The following user has requested to edit an Incident Accident Report form: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
        }elseif($type =="SSBC%20NOTIFICATION%20OF%20EXPORTING%20LMO%20AND%20BIOHAZARDOUS%20MATERIAL"){
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->notification_of_exporting_biological_material_model->get_form_by_id($id);

                $this->load->template('notification_of_exporting_biological_material_view', $data);
                
            }else{
                
                $this->notification_of_exporting_biological_material_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "SSBC Notification of LMO and Biohazardous Material Application Modification Request", "The following user has requested to edit a SSBC Notification of LMO and Biohazardous Material form: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
        }elseif($type =="NOTIFICATION%20OF%20LMO%20AND%20BIOHAZARDOUS%20MATERIAL"){
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->notification_of_LMO_and_BM_model->get_form_by_id($id);

                $this->load->template('notification_of_LMO_and_BM_view', $data);
                
            }else{
                
                $this->notification_of_LMO_and_BM_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "SSBC Notification of LMO and Biohazardous Material Application Modification Request", "The following user has requested to edit a SSBC Notification of LMO and Biohazardous Material form: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
        }elseif($type =="APPLICATION%20FOR%20NLRDS%20SUITABLE%20FOR%20PC1%20FORM"){
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->pc1_model->get_form_by_id($id);

                $this->load->template('pc1_view', $data);
                
            }else{
                
                $this->pc1_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "PC1 Application Modification Request", "The following user has requested to edit a PC1 form: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
        }elseif($type =="APPLICATION%20FOR%20NLRDS%20SUITABLE%20FOR%20PC2%20FORM"){
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->pc2_model->get_form_by_id($id);

                $this->load->template('pc2_view', $data);
                
            }else{
                
                $this->pc2_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "PC2 Application Modification Request", "The following user has requested to edit a PC2 form: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
        }elseif($type =="OHS-F-4.18.X%20PRE-PURCHASE%20MATERIAL%20RISK%20ASSESSMENT"){
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->procurement_model->get_form_by_id($id);

                $this->load->template('procurement_view', $data);
                
            }else{
                
                $this->procurement_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "Pre-purchase Material Risk Assessment Application Modification Request", "The following user has requested to edit a Pre-purchase Material Risk Assessment form: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
        }elseif($type =="SSBC%20SAFE%20WORK%20PROCEDURE"){
            
            if($editable == 2){
                
                $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
                $data['load'] = "true";
                $data['editload'] = "true";
                $data['appID'] = $id;

                
                $data['retrieved'] = $this->swp_model->get_form_by_id($id);

                $this->load->template('swp_view', $data);
                
            }else{
                
                $this->swp_model->edit_request($id);
                $this->notification_model->insert_new_notification(null, 4, "Safe Work Procedure Application Modification Request", "The following user has requested to edit a Safe Work Procedure form: " . $this->session->userdata('account_name'));
                redirect('history/index');
                
            }
            
        }
        
        
        
    }
    
    
}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class exemptproj extends CI_Controller{
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('project_model');
        $this->load->model('notification_model');
        $this->load->model('exempt_model');
        $this->load->model('hirarc_model');
        $this->load->model('swp_model');
		
		//breadcrum
		$this->breadcrumbs->unshift('Home', '/');
		$this->breadcrumbs->push('New Project','/projectselect', true);		
		$this->breadcrumbs->push('Application','/applicationpage', true);
        $this->breadcrumbs->push('New Application','/newapplicationpage', true);
        $this->breadcrumbs->push('Exempt Dealing', true);
        
    }
		
		public function index(){
			 $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            
            $save = $this->input->post('saveButton');
            $submit = $this->input->post('submitButton');
            $proj_id = $this->session->userdata("projectId");
            $saveStatus = "saved";
            $submitStatus = "submitted";
            $projectSave = 'saved';
            $projectSubmit = 'submitted';
            
            if (!isset($save) && !isset($submit)){
                
                $this->load->template('exemptproj_view', $data);
                
            }elseif(isset($save)){
                
                //exempt
                $ar1 = implode(',',$this->input->post('project_add_qualification'));
                $ar2 = implode(',',$this->input->post('project_add_name'));
                $ar3 = implode(',',$this->input->post('project_add_department'));
                $ar4 = implode(',',$this->input->post('project_add_campus'));
                $ar5 = implode(',',$this->input->post('project_add_postal_address'));
                $ar6 = implode(',',$this->input->post('project_add_telephone'));
                $ar7 = implode(',',$this->input->post('project_add_fax'));
                $ar8 = implode(',',$this->input->post('project_add_email_address'));
                $ar9 = implode(',',$this->input->post('project_add_title'));
                
                //hirarc
                $ar10 = implode(',',$this->input->post('HIRARC_activity'));
                $ar11 = implode(',',$this->input->post('HIRARC_hazard'));
                $ar12 = implode(',',$this->input->post('HIRARC_effects'));
                $ar13 = implode(',',$this->input->post('HIRARC_risk_control'));
                $ar14 = implode(',',$this->input->post('HIRARC_LLH'));
                $ar15 = implode(',',$this->input->post('HIRARC_SEV'));
                $ar16 = implode(',',$this->input->post('HIRARC_RR'));
                $ar17 = implode(',',$this->input->post('HIRARC_control_measure'));
                $ar18 = implode(',',$this->input->post('HIRARC_PIC'));
                
                
                $exemptData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no '),
                    'project_title' => $this->input->post('project_title'),
                    'project_supervisor_title' => $this->input->post('project_supervisor_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_qualification' => $this->input->post('project_supervisor_qualification'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_campus' => $this->input->post('project_supervisor_campus'),
                    'project_supervisor_postal_address' => $this->input->post('project_supervisor_postal_address'),
                    'project_supervisor_telephone' => $this->input->post('project_supervisor_telephone'),
                    'project_supervisor_fax' => $this->input->post('project_supervisor_fax'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_add_title' => $ar9,
                    'project_add_qualification' => $ar1,
                    'project_add_name' => $ar2,
                    'project_add_department' => $ar3,
                    'project_add_campus' => $ar4,
                    'project_add_postal_address' => $ar5,
                    'project_add_telephone' => $ar6,
                    'project_add_fax' => $ar7,
                    'project_add_email_address' => $ar8,
                    'exemption_type_2' => $this->input->post('exemption_type_2'),
                    'exemption_type_3' => $this->input->post('exemption_type_3'),
                    'exemption_type_3A' => $this->input->post('exemption_type_3A'),
                    'exemption_type_4' => $this->input->post('exemption_type_4'),
                    'exemption_type_5' => $this->input->post('exemption_type_5'),
                    'project_summary' => $this->input->post('project_summary'),
                    'project_hazard' => $this->input->post('project_hazard'),
                    'project_SOP' => $this->input->post('project_SOP'),
                    'project_facilities_building_no' => $this->input->post('project_facilities_building_no'),
                    'project_facilities_room_no' => $this->input->post('project_facilities_room_no'),
                    'project_facilities_containment_level' => $this->input->post('project_facilities_containment_level'),
                    'project_facilities_certification_no' => $this->input->post('project_facilities_certification_no'),
                    'officer_notified' => $this->input->post('officer_notified'),
                    'officer_name' => $this->input->post('officer_name'),
                    'laboratory_manager' => $this->input->post('laboratory_manager'),
                    'status' => $saveStatus
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name'),
                    'date' => $this->input->post('date'),
                    'process_location' => $this->input->post('process_location'),
                    'conducted_name' => $this->input->post('conducted_name'),
                    'conducted_designation' => $this->input->post('conducted_designation'),
                    'approved_name' => $this->input->post('approved_name'),
                    'approved_designation' => $this->input->post('approved_designation'),
                    'date_from' => $this->input->post('date_from'),
                    'date_to' => $this->input->post('date_to'),
                    'review_date' => $this->input->post('review_date'),
                    'HIRARC_activity' => $ar10,
                    'HIRARC_hazard' => $ar11,
                    'HIRARC_effects' => $ar12,
                    'HIRARC_risk_control' => $ar13,
                    'HIRARC_LLH' => $ar14,
                    'HIRARC_SEV' => $ar15,
                    'HIRARC_RR' => $ar16,
                    'HIRARC_control_measure' => $ar17,
                    'HIRARC_PIC' => $ar18,
                    'application_type' => $this->input->post('application_type'),
                    'status' => $saveStatus
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by'),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no'),
                    'SWP_designation' => $this->input->post('SWP_designation'),
                    'SWP_faculty' => $this->input->post('SWP_faculty'),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title'),
                    'SWP_project_title' => $this->input->post('SWP_project_title'),
                    'SWP_location' => $this->input->post('SWP_location'),
                    'SWP_description' => $this->input->post('SWP_description'),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational'),
                    'SWP_operational' => $this->input->post('SWP_operational'),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational'),
                    'SWP_risk' => $this->input->post('SWP_risk'),
                    'SWP_control' => $this->input->post('SWP_control'),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name'),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date'),
                    'SWP_name' => $this->input->post('SWP_name'),
                    'SWP_PI' => $this->input->post('SWP_PI'),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by'),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI'),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date'),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date'),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained'),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer'),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by'),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by'),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date'),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks'),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by'),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date'),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks'),
                    'application_type' => $this->input->post('application_type'),
                    'status' => $saveStatus
                );
                
                
                if($this->exempt_model->insert_new_applicant_data($exemptData) && $this->hirarc_model->insert_new_applicant_data($hirarcData) && $this->swp_model->insert_new_applicant_data($swpData) && $this->project_model->update_proj_status($proj_id, $projectSave))
                {
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully saved!</div>', $biohazardData);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectName');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('home/index');
  
                }
                 
                
            }elseif(isset($submit)){
                
                //exempt
                $ar1 = implode(',',$this->input->post('project_add_qualification'));
                $ar2 = implode(',',$this->input->post('project_add_name'));
                $ar3 = implode(',',$this->input->post('project_add_department'));
                $ar4 = implode(',',$this->input->post('project_add_campus'));
                $ar5 = implode(',',$this->input->post('project_add_postal_address'));
                $ar6 = implode(',',$this->input->post('project_add_telephone'));
                $ar7 = implode(',',$this->input->post('project_add_fax'));
                $ar8 = implode(',',$this->input->post('project_add_email_address'));
                $ar9 = implode(',',$this->input->post('project_add_title'));
                
                //hirarc
                $ar10 = implode(',',$this->input->post('HIRARC_activity'));
                $ar11 = implode(',',$this->input->post('HIRARC_hazard'));
                $ar12 = implode(',',$this->input->post('HIRARC_effects'));
                $ar13 = implode(',',$this->input->post('HIRARC_risk_control'));
                $ar14 = implode(',',$this->input->post('HIRARC_LLH'));
                $ar15 = implode(',',$this->input->post('HIRARC_SEV'));
                $ar16 = implode(',',$this->input->post('HIRARC_RR'));
                $ar17 = implode(',',$this->input->post('HIRARC_control_measure'));
                $ar18 = implode(',',$this->input->post('HIRARC_PIC'));
                
                
                $exemptData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no '),
                    'project_title' => $this->input->post('project_title'),
                    'project_supervisor_title' => $this->input->post('project_supervisor_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_qualification' => $this->input->post('project_supervisor_qualification'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_campus' => $this->input->post('project_supervisor_campus'),
                    'project_supervisor_postal_address' => $this->input->post('project_supervisor_postal_address'),
                    'project_supervisor_telephone' => $this->input->post('project_supervisor_telephone'),
                    'project_supervisor_fax' => $this->input->post('project_supervisor_fax'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_add_title' => $ar9,
                    'project_add_qualification' => $ar1,
                    'project_add_name' => $ar2,
                    'project_add_department' => $ar3,
                    'project_add_campus' => $ar4,
                    'project_add_postal_address' => $ar5,
                    'project_add_telephone' => $ar6,
                    'project_add_fax' => $ar7,
                    'project_add_email_address' => $ar8,
                    'exemption_type_2' => $this->input->post('exemption_type_2'),
                    'exemption_type_3' => $this->input->post('exemption_type_3'),
                    'exemption_type_3A' => $this->input->post('exemption_type_3A'),
                    'exemption_type_4' => $this->input->post('exemption_type_4'),
                    'exemption_type_5' => $this->input->post('exemption_type_5'),
                    'project_summary' => $this->input->post('project_summary'),
                    'project_hazard' => $this->input->post('project_hazard'),
                    'project_SOP' => $this->input->post('project_SOP'),
                    'project_facilities_building_no' => $this->input->post('project_facilities_building_no'),
                    'project_facilities_room_no' => $this->input->post('project_facilities_room_no'),
                    'project_facilities_containment_level' => $this->input->post('project_facilities_containment_level'),
                    'project_facilities_certification_no' => $this->input->post('project_facilities_certification_no'),
                    'officer_notified' => $this->input->post('officer_notified'),
                    'officer_name' => $this->input->post('officer_name'),
                    'laboratory_manager' => $this->input->post('laboratory_manager'),
                    'status' => $submitStatus
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name'),
                    'date' => $this->input->post('date'),
                    'process_location' => $this->input->post('process_location'),
                    'conducted_name' => $this->input->post('conducted_name'),
                    'conducted_designation' => $this->input->post('conducted_designation'),
                    'approved_name' => $this->input->post('approved_name'),
                    'approved_designation' => $this->input->post('approved_designation'),
                    'date_from' => $this->input->post('date_from'),
                    'date_to' => $this->input->post('date_to'),
                    'review_date' => $this->input->post('review_date'),
                    'HIRARC_activity' => $ar10,
                    'HIRARC_hazard' => $ar11,
                    'HIRARC_effects' => $ar12,
                    'HIRARC_risk_control' => $ar13,
                    'HIRARC_LLH' => $ar14,
                    'HIRARC_SEV' => $ar15,
                    'HIRARC_RR' => $ar16,
                    'HIRARC_control_measure' => $ar17,
                    'HIRARC_PIC' => $ar18,
                    'application_type' => $this->input->post('application_type'),
                    'status' => $submitStatus
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by'),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no'),
                    'SWP_designation' => $this->input->post('SWP_designation'),
                    'SWP_faculty' => $this->input->post('SWP_faculty'),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title'),
                    'SWP_project_title' => $this->input->post('SWP_project_title'),
                    'SWP_location' => $this->input->post('SWP_location'),
                    'SWP_description' => $this->input->post('SWP_description'),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational'),
                    'SWP_operational' => $this->input->post('SWP_operational'),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational'),
                    'SWP_risk' => $this->input->post('SWP_risk'),
                    'SWP_control' => $this->input->post('SWP_control'),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name'),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date'),
                    'SWP_name' => $this->input->post('SWP_name'),
                    'SWP_PI' => $this->input->post('SWP_PI'),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by'),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI'),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date'),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date'),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained'),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer'),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by'),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by'),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date'),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks'),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by'),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date'),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks'),
                    'application_type' => $this->input->post('application_type'),
                    'status' => $submitStatus
                );
                
                
                if($this->exempt_model->insert_new_applicant_data($exemptData) && $this->hirarc_model->insert_new_applicant_data($hirarcData) && $this->swp_model->insert_new_applicant_data($swpData) && $this->project_model->update_proj_status($proj_id, $projectSubmit))
                {
                    $this->notification_model->insert_new_notification(null, 4, "New Project Application For Exempt Dealing", "The following user has submitted a new application for Exempt Dealing: " . $this->session->userdata('account_name'));
					
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $biohazardData);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectName');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('home/index');
  
                }
                
            }
            
            
        }
        
        //load project in disabled state
        public function load_project($proj_id){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            //$id = $this->input->get('id');
            $id = $this->uri->segment(3);
            
            $data['appID'] = $id;
            
            $data['retrieved'] = $this->exempt_model->get_form_by_project_id($id);
            $data['retrieved3'] = $this->hirarc_model->get_form_by_project_id($id);
            $data['retrieved6'] = $this->swp_model->get_form_by_project_id($id);
        
            $this->load->template('exemptproj_view', $data);
        }
        
        public function update_form(){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
             
            $update = $this->input->post('updateButton');
            $saveStatus = "saved";
            $submitStatus = "submitted";
            $projectSave = 'saved';
            $projectSubmit = 'submitted';
            $editableValue = 0;
            $appID = $this->input->post('appid');
            
            if (!isset($update)){
                
                $this->load->template('exemptproj_view', $data);
                
            }elseif(isset($update)){
                
                //exempt
                $ar1 = implode(',',$this->input->post('project_add_qualification'));
                $ar2 = implode(',',$this->input->post('project_add_name'));
                $ar3 = implode(',',$this->input->post('project_add_department'));
                $ar4 = implode(',',$this->input->post('project_add_campus'));
                $ar5 = implode(',',$this->input->post('project_add_postal_address'));
                $ar6 = implode(',',$this->input->post('project_add_telephone'));
                $ar7 = implode(',',$this->input->post('project_add_fax'));
                $ar8 = implode(',',$this->input->post('project_add_email_address'));
                $ar9 = implode(',',$this->input->post('project_add_title'));
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity'));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard'));
                $ar64 = implode(',',$this->input->post('HIRARC_effects'));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control'));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH'));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV'));
                $ar68 = implode(',',$this->input->post('HIRARC_RR'));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure'));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC'));
                
                
                $exemptData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $appID,
                    'date_received' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no '),
                    'project_title' => $this->input->post('project_title'),
                    'project_supervisor_title' => $this->input->post('project_supervisor_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_qualification' => $this->input->post('project_supervisor_qualification'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_campus' => $this->input->post('project_supervisor_campus'),
                    'project_supervisor_postal_address' => $this->input->post('project_supervisor_postal_address'),
                    'project_supervisor_telephone' => $this->input->post('project_supervisor_telephone'),
                    'project_supervisor_fax' => $this->input->post('project_supervisor_fax'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_add_title' => $ar9,
                    'project_add_qualification' => $ar1,
                    'project_add_name' => $ar2,
                    'project_add_department' => $ar3,
                    'project_add_campus' => $ar4,
                    'project_add_postal_address' => $ar5,
                    'project_add_telephone' => $ar6,
                    'project_add_fax' => $ar7,
                    'project_add_email_address' => $ar8,
                    'exemption_type_2' => $this->input->post('exemption_type_2'),
                    'exemption_type_3' => $this->input->post('exemption_type_3'),
                    'exemption_type_3A' => $this->input->post('exemption_type_3A'),
                    'exemption_type_4' => $this->input->post('exemption_type_4'),
                    'exemption_type_5' => $this->input->post('exemption_type_5'),
                    'project_summary' => $this->input->post('project_summary'),
                    'project_hazard' => $this->input->post('project_hazard'),
                    'project_SOP' => $this->input->post('project_SOP'),
                    'project_facilities_building_no' => $this->input->post('project_facilities_building_no'),
                    'project_facilities_room_no' => $this->input->post('project_facilities_room_no'),
                    'project_facilities_containment_level' => $this->input->post('project_facilities_containment_level'),
                    'project_facilities_certification_no' => $this->input->post('project_facilities_certification_no'),
                    'officer_notified' => $this->input->post('officer_notified'),
                    'officer_name' => $this->input->post('officer_name'),
                    'laboratory_manager' => $this->input->post('laboratory_manager'),
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $appID,
                    'company_name' => $this->input->post('company_name'),
                    'date' => $this->input->post('date'),
                    'process_location' => $this->input->post('process_location'),
                    'conducted_name' => $this->input->post('conducted_name'),
                    'conducted_designation' => $this->input->post('conducted_designation'),
                    'approved_name' => $this->input->post('approved_name'),
                    'approved_designation' => $this->input->post('approved_designation'),
                    'date_from' => $this->input->post('date_from'),
                    'date_to' => $this->input->post('date_to'),
                    'review_date' => $this->input->post('review_date'),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type'),
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $appID,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by'),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no'),
                    'SWP_designation' => $this->input->post('SWP_designation'),
                    'SWP_faculty' => $this->input->post('SWP_faculty'),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title'),
                    'SWP_project_title' => $this->input->post('SWP_project_title'),
                    'SWP_location' => $this->input->post('SWP_location'),
                    'SWP_description' => $this->input->post('SWP_description'),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational'),
                    'SWP_operational' => $this->input->post('SWP_operational'),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational'),
                    'SWP_risk' => $this->input->post('SWP_risk'),
                    'SWP_control' => $this->input->post('SWP_control'),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name'),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date'),
                    'SWP_name' => $this->input->post('SWP_name'),
                    'SWP_PI' => $this->input->post('SWP_PI'),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by'),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI'),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date'),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date'),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained'),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer'),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by'),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by'),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date'),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks'),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by'),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date'),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks'),
                    'application_type' => $this->input->post('application_type'),
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                
                
                if($this->exempt_model->update_applicant_data($appID, $exemptData) && $this->hirarc_model->update_applicant_data($appID, $hirarcData) && $this->swp_model->update_applicant_data($appID, $swpData) && $this->project_model->update_applicant_data($appID, $editableValue))
                {
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $biohazardData);
                    redirect('home/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('home/index');
  
                }
                
                
            }
            
        }
        
        public function load_saved_project(){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['saveload'] = "true";
            
            $id = $this->input->get('id');
            
            $data['appID'] = $id;
            
            $data['retrieved'] = $this->exempt_model->get_form_by_project_id($id);
            $data['retrieved3'] = $this->hirarc_model->get_form_by_project_id($id);
            $data['retrieved6'] = $this->swp_model->get_form_by_project_id($id);
        
            $this->load->template('exemptproj_view', $data);
        }
        
        public function delete_saved_project(){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $id = $this->input->get('id');
            $status = "deleted";
            
            
            if($this->project_model->update_proj_status($id, $status))
            {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been removed</div>');
                redirect('home/index');
            }
        
            
        }
        
        public function continue(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $save = $this->input->post('saveButton');
            $submit = $this->input->post('submitButton');
            $proj_id = $this->input->post('appid');
            $saveStatus = "saved";
            $submitStatus = "submitted";
            $projectSave = 'saved';
            $projectSubmit = 'submitted';
            
            if (!isset($save) && !isset($submit)){
                
                $this->load->template('exemptproj_view', $data);
            
            }elseif(isset($save)){
                
                //exempt
                $ar1 = implode(',',$this->input->post('project_add_qualification'));
                $ar2 = implode(',',$this->input->post('project_add_name'));
                $ar3 = implode(',',$this->input->post('project_add_department'));
                $ar4 = implode(',',$this->input->post('project_add_campus'));
                $ar5 = implode(',',$this->input->post('project_add_postal_address'));
                $ar6 = implode(',',$this->input->post('project_add_telephone'));
                $ar7 = implode(',',$this->input->post('project_add_fax'));
                $ar8 = implode(',',$this->input->post('project_add_email_address'));
                $ar9 = implode(',',$this->input->post('project_add_title'));
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity'));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard'));
                $ar64 = implode(',',$this->input->post('HIRARC_effects'));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control'));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH'));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV'));
                $ar68 = implode(',',$this->input->post('HIRARC_RR'));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure'));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC'));
                
                
                $exemptData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no '),
                    'project_title' => $this->input->post('project_title'),
                    'project_supervisor_title' => $this->input->post('project_supervisor_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_qualification' => $this->input->post('project_supervisor_qualification'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_campus' => $this->input->post('project_supervisor_campus'),
                    'project_supervisor_postal_address' => $this->input->post('project_supervisor_postal_address'),
                    'project_supervisor_telephone' => $this->input->post('project_supervisor_telephone'),
                    'project_supervisor_fax' => $this->input->post('project_supervisor_fax'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_add_title' => $ar9,
                    'project_add_qualification' => $ar1,
                    'project_add_name' => $ar2,
                    'project_add_department' => $ar3,
                    'project_add_campus' => $ar4,
                    'project_add_postal_address' => $ar5,
                    'project_add_telephone' => $ar6,
                    'project_add_fax' => $ar7,
                    'project_add_email_address' => $ar8,
                    'exemption_type_2' => $this->input->post('exemption_type_2'),
                    'exemption_type_3' => $this->input->post('exemption_type_3'),
                    'exemption_type_3A' => $this->input->post('exemption_type_3A'),
                    'exemption_type_4' => $this->input->post('exemption_type_4'),
                    'exemption_type_5' => $this->input->post('exemption_type_5'),
                    'project_summary' => $this->input->post('project_summary'),
                    'project_hazard' => $this->input->post('project_hazard'),
                    'project_SOP' => $this->input->post('project_SOP'),
                    'project_facilities_building_no' => $this->input->post('project_facilities_building_no'),
                    'project_facilities_room_no' => $this->input->post('project_facilities_room_no'),
                    'project_facilities_containment_level' => $this->input->post('project_facilities_containment_level'),
                    'project_facilities_certification_no' => $this->input->post('project_facilities_certification_no'),
                    'officer_notified' => $this->input->post('officer_notified'),
                    'officer_name' => $this->input->post('officer_name'),
                    'laboratory_manager' => $this->input->post('laboratory_manager'),
                    'status' => $saveStatus
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name'),
                    'date' => $this->input->post('date'),
                    'process_location' => $this->input->post('process_location'),
                    'conducted_name' => $this->input->post('conducted_name'),
                    'conducted_designation' => $this->input->post('conducted_designation'),
                    'approved_name' => $this->input->post('approved_name'),
                    'approved_designation' => $this->input->post('approved_designation'),
                    'date_from' => $this->input->post('date_from'),
                    'date_to' => $this->input->post('date_to'),
                    'review_date' => $this->input->post('review_date'),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type'),
                    'status' => $saveStatus
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by'),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no'),
                    'SWP_designation' => $this->input->post('SWP_designation'),
                    'SWP_faculty' => $this->input->post('SWP_faculty'),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title'),
                    'SWP_project_title' => $this->input->post('SWP_project_title'),
                    'SWP_location' => $this->input->post('SWP_location'),
                    'SWP_description' => $this->input->post('SWP_description'),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational'),
                    'SWP_operational' => $this->input->post('SWP_operational'),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational'),
                    'SWP_risk' => $this->input->post('SWP_risk'),
                    'SWP_control' => $this->input->post('SWP_control'),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name'),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date'),
                    'SWP_name' => $this->input->post('SWP_name'),
                    'SWP_PI' => $this->input->post('SWP_PI'),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by'),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI'),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date'),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date'),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained'),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer'),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by'),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by'),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date'),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks'),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by'),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date'),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks'),
                    'application_type' => $this->input->post('application_type'),
                    'status' => $saveStatus
                );
                
                
                if($this->exempt_model->update_saved_data($proj_id, $exemptData) && $this->hirarc_model->update_saved_data($proj_id, $hirarcData) && $this->swp_model->update_saved_data($proj_id, $swpData) && $this->project_model->update_proj_status($proj_id, $projectSave))
                {
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully saved!</div>', $biohazardData);
                    redirect('saveHistory/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('saveHistory/index');
  
                }
                 
                
            }elseif(isset($submit)){
                
                //exempt
                $ar1 = implode(',',$this->input->post('project_add_qualification'));
                $ar2 = implode(',',$this->input->post('project_add_name'));
                $ar3 = implode(',',$this->input->post('project_add_department'));
                $ar4 = implode(',',$this->input->post('project_add_campus'));
                $ar5 = implode(',',$this->input->post('project_add_postal_address'));
                $ar6 = implode(',',$this->input->post('project_add_telephone'));
                $ar7 = implode(',',$this->input->post('project_add_fax'));
                $ar8 = implode(',',$this->input->post('project_add_email_address'));
                $ar9 = implode(',',$this->input->post('project_add_title'));
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity'));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard'));
                $ar64 = implode(',',$this->input->post('HIRARC_effects'));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control'));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH'));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV'));
                $ar68 = implode(',',$this->input->post('HIRARC_RR'));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure'));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC'));
                
                
                $exemptData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no '),
                    'project_title' => $this->input->post('project_title'),
                    'project_supervisor_title' => $this->input->post('project_supervisor_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_qualification' => $this->input->post('project_supervisor_qualification'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_campus' => $this->input->post('project_supervisor_campus'),
                    'project_supervisor_postal_address' => $this->input->post('project_supervisor_postal_address'),
                    'project_supervisor_telephone' => $this->input->post('project_supervisor_telephone'),
                    'project_supervisor_fax' => $this->input->post('project_supervisor_fax'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_add_title' => $ar9,
                    'project_add_qualification' => $ar1,
                    'project_add_name' => $ar2,
                    'project_add_department' => $ar3,
                    'project_add_campus' => $ar4,
                    'project_add_postal_address' => $ar5,
                    'project_add_telephone' => $ar6,
                    'project_add_fax' => $ar7,
                    'project_add_email_address' => $ar8,
                    'exemption_type_2' => $this->input->post('exemption_type_2'),
                    'exemption_type_3' => $this->input->post('exemption_type_3'),
                    'exemption_type_3A' => $this->input->post('exemption_type_3A'),
                    'exemption_type_4' => $this->input->post('exemption_type_4'),
                    'exemption_type_5' => $this->input->post('exemption_type_5'),
                    'project_summary' => $this->input->post('project_summary'),
                    'project_hazard' => $this->input->post('project_hazard'),
                    'project_SOP' => $this->input->post('project_SOP'),
                    'project_facilities_building_no' => $this->input->post('project_facilities_building_no'),
                    'project_facilities_room_no' => $this->input->post('project_facilities_room_no'),
                    'project_facilities_containment_level' => $this->input->post('project_facilities_containment_level'),
                    'project_facilities_certification_no' => $this->input->post('project_facilities_certification_no'),
                    'officer_notified' => $this->input->post('officer_notified'),
                    'officer_name' => $this->input->post('officer_name'),
                    'laboratory_manager' => $this->input->post('laboratory_manager'),
                    'status' => $submitStatus
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name'),
                    'date' => $this->input->post('date'),
                    'process_location' => $this->input->post('process_location'),
                    'conducted_name' => $this->input->post('conducted_name'),
                    'conducted_designation' => $this->input->post('conducted_designation'),
                    'approved_name' => $this->input->post('approved_name'),
                    'approved_designation' => $this->input->post('approved_designation'),
                    'date_from' => $this->input->post('date_from'),
                    'date_to' => $this->input->post('date_to'),
                    'review_date' => $this->input->post('review_date'),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type'),
                    'status' => $submitStatus
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by'),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no'),
                    'SWP_designation' => $this->input->post('SWP_designation'),
                    'SWP_faculty' => $this->input->post('SWP_faculty'),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title'),
                    'SWP_project_title' => $this->input->post('SWP_project_title'),
                    'SWP_location' => $this->input->post('SWP_location'),
                    'SWP_description' => $this->input->post('SWP_description'),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational'),
                    'SWP_operational' => $this->input->post('SWP_operational'),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational'),
                    'SWP_risk' => $this->input->post('SWP_risk'),
                    'SWP_control' => $this->input->post('SWP_control'),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name'),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date'),
                    'SWP_name' => $this->input->post('SWP_name'),
                    'SWP_PI' => $this->input->post('SWP_PI'),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by'),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI'),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date'),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date'),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained'),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer'),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by'),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by'),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date'),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks'),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by'),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date'),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks'),
                    'application_type' => $this->input->post('application_type'),
                    'status' => $submitStatus
                );
                
                
                if($this->exempt_model->update_saved_data($proj_id, $exemptData) && $this->hirarc_model->update_saved_data($proj_id, $hirarcData) && $this->swp_model->update_saved_data($proj_id, $swpData) && $this->project_model->update_proj_status($proj_id, $projectSubmit))
                {
                    $this->notification_model->insert_new_notification(null, 4, "New Project Application For Exempt Dealing", "The following user has submitted a new application for Exempt Dealing: " . $this->session->userdata('account_name'));
					
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $biohazardData);
                    redirect('home/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('home/index');
  
                }
                
            }
        
        }
        
    }
?>
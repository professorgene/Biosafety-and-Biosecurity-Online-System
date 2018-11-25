<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class biohazardproj extends CI_Controller{
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('project_model');
        $this->load->model('biohazard_model');
        $this->load->model('hirarc_model');
        $this->load->model('swp_model');
		
		        //breadcrum
		$this->breadcrumbs->unshift('Home', '/');
        $this->breadcrumbs->push('New Project','/projectselect', true);		
		$this->breadcrumbs->push('Application','/applicationpage', true);
        $this->breadcrumbs->push('New Application','/newapplicationpage', true);
        $this->breadcrumbs->push('Biohazardous Material', true);
        
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
                
                $this->load->template('biohazardproj_view', $data);
                
            }elseif(isset($save)){
                
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
                $config['overwrite'] = TRUE;
                
                $this->load->library('upload'); //initialize
                $this->upload->initialize($config); //Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class
                #$this->upload->do_upload(); // do upload
                /*if($this->upload->do_upload('biohazard_signature_file')){
                    $biohazard_signature_file = $this->upload->data(); //returns an array containing all of the data related to the file you uploaded.
                }*/
                
                //biohazard
                $ar1 = implode(',',$this->input->post('project_personnel_name', TRUE));
                $ar2 = implode(',',$this->input->post('project_personnel_role', TRUE));
                $ar3 = implode(',',$this->input->post('project_SOP_title', TRUE));
                $ar4 = implode(',',$this->input->post('project_SOP_risk_title', TRUE));
                $ar5 = implode(',',$this->input->post('project_facilities_building', TRUE));
                $ar6 = implode(',',$this->input->post('project_facilities_room', TRUE));
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity', TRUE));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard', TRUE));
                $ar64 = implode(',',$this->input->post('HIRARC_effects', TRUE));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control', TRUE));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH', TRUE));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV', TRUE));
                $ar68 = implode(',',$this->input->post('HIRARC_RR', TRUE));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure', TRUE));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC', TRUE));
                
                
                $biohazardData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('date_received ', TRUE),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no ', TRUE),
                    'project_title' => $this->input->post('project_title', TRUE),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name', TRUE),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department', TRUE),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address', TRUE),
                    'project_alt_person' => $this->input->post('project_alt_person', TRUE),
                    'project_alt_department' => $this->input->post('project_alt_department', TRUE),
                    'project_alt_email' => $this->input->post('project_alt_email', TRUE),
                    'project_personnel_name' => $ar1,
                    'project_personnel_role' => $ar2,
                    'proposed_work_known' => $this->input->post('proposed_work_known', TRUE),
                    'proposed_work_may' => $this->input->post('proposed_work_may', TRUE),
                    'proposed_work_unknown' => $this->input->post('proposed_work_unknown', TRUE),
                    'proposed_work_isolation' => $this->input->post('proposed_work_isolation', TRUE),
                    'proposed_work_risk' => $this->input->post('proposed_work_risk', TRUE),
                    'proposed_work_sensitive' => $this->input->post('proposed_work_sensitive', TRUE),
                    'proposed_work_other' => $this->input->post('proposed_work_other', TRUE),
                    'project_summary' => $this->input->post('project_summary', TRUE),
                    'project_activity' => $this->input->post('project_activity', TRUE),
                    'project_SOP_title' => $ar3,
                    'project_SOP_risk_title' => $ar4,
                    'project_facilities_building' => $ar5,
                    'project_facilities_room' => $ar6,
                    'bio_officer_notified' => $this->input->post('bio_officer_notified', TRUE),
                    'officer_name' => $this->input->post('officer_name', TRUE),
                    'biohazard_signature' => $this->input->post('biohazard_signature', TRUE),
                    //'biohazard_signature_file' => $biohazard_signature_file['file_name'],
                    'status' => $saveStatus
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name', TRUE),
                    'date' => $this->input->post('date', TRUE),
                    'process_location' => $this->input->post('process_location', TRUE),
                    'conducted_name' => $this->input->post('conducted_name', TRUE),
                    'conducted_designation' => $this->input->post('conducted_designation', TRUE),
                    'approved_name' => $this->input->post('approved_name', TRUE),
                    'approved_designation' => $this->input->post('approved_designation', TRUE),
                    'date_from' => $this->input->post('date_from', TRUE),
                    'date_to' => $this->input->post('date_to', TRUE),
                    'review_date' => $this->input->post('review_date', TRUE),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $saveStatus
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by', TRUE),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no', TRUE),
                    'SWP_designation' => $this->input->post('SWP_designation', TRUE),
                    'SWP_faculty' => $this->input->post('SWP_faculty', TRUE),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title', TRUE),
                    'SWP_project_title' => $this->input->post('SWP_project_title', TRUE),
                    'SWP_location' => $this->input->post('SWP_location', TRUE),
                    'SWP_description' => $this->input->post('SWP_description', TRUE),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational', TRUE),
                    'SWP_operational' => $this->input->post('SWP_operational', TRUE),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational', TRUE),
                    'SWP_risk' => $this->input->post('SWP_risk', TRUE),
                    'SWP_control' => $this->input->post('SWP_control', TRUE),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name', TRUE),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date', TRUE),
                    'SWP_name' => $this->input->post('SWP_name', TRUE),
                    'SWP_PI' => $this->input->post('SWP_PI', TRUE),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by', TRUE),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI', TRUE),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date', TRUE),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date', TRUE),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained', TRUE),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer', TRUE),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by', TRUE),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by', TRUE),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date', TRUE),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks', TRUE),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by', TRUE),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date', TRUE),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks', TRUE),
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $saveStatus
                );
                
                
                if($this->biohazard_model->insert_new_applicant_data($biohazardData) && $this->hirarc_model->insert_new_applicant_data($hirarcData) && $this->swp_model->insert_new_applicant_data($swpData) && $this->project_model->update_proj_status($proj_id, $projectSave))
                {
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully saved!</div>', $biohazardData);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('home/index');
  
                }
                 
                
            }elseif(isset($submit)){
                
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
                $config['overwrite'] = TRUE;
                
                $this->load->library('upload'); //initialize
                $this->upload->initialize($config); //Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class
                #$this->upload->do_upload(); // do upload
                if($this->upload->do_upload('biohazard_signature_file')){
                    $biohazard_signature_file = $this->upload->data(); //returns an array containing all of the data related to the file you uploaded.
                }
                
                //biohazard
                $ar1 = implode(',',$this->input->post('project_personnel_name', TRUE));
                $ar2 = implode(',',$this->input->post('project_personnel_role', TRUE));
                $ar3 = implode(',',$this->input->post('project_SOP_title', TRUE));
                $ar4 = implode(',',$this->input->post('project_SOP_risk_title', TRUE));
                $ar5 = implode(',',$this->input->post('project_facilities_building', TRUE));
                $ar6 = implode(',',$this->input->post('project_facilities_room', TRUE));
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity', TRUE));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard', TRUE));
                $ar64 = implode(',',$this->input->post('HIRARC_effects', TRUE));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control', TRUE));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH', TRUE));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV', TRUE));
                $ar68 = implode(',',$this->input->post('HIRARC_RR', TRUE));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure', TRUE));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC', TRUE));
                
                
                $biohazardData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('date_received ', TRUE),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no ', TRUE),
                    'project_title' => $this->input->post('project_title', TRUE),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name', TRUE),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department', TRUE),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address', TRUE),
                    'project_alt_person' => $this->input->post('project_alt_person', TRUE),
                    'project_alt_department' => $this->input->post('project_alt_department', TRUE),
                    'project_alt_email' => $this->input->post('project_alt_email', TRUE),
                    'project_personnel_name' => $ar1,
                    'project_personnel_role' => $ar2,
                    'proposed_work_known' => $this->input->post('proposed_work_known', TRUE),
                    'proposed_work_may' => $this->input->post('proposed_work_may', TRUE),
                    'proposed_work_unknown' => $this->input->post('proposed_work_unknown', TRUE),
                    'proposed_work_isolation' => $this->input->post('proposed_work_isolation', TRUE),
                    'proposed_work_risk' => $this->input->post('proposed_work_risk', TRUE),
                    'proposed_work_sensitive' => $this->input->post('proposed_work_sensitive', TRUE),
                    'proposed_work_other' => $this->input->post('proposed_work_other', TRUE),
                    'project_summary' => $this->input->post('project_summary', TRUE),
                    'project_activity' => $this->input->post('project_activity', TRUE),
                    'project_SOP_title' => $ar3,
                    'project_SOP_risk_title' => $ar4,
                    'project_facilities_building' => $ar5,
                    'project_facilities_room' => $ar6,
                    'bio_officer_notified' => $this->input->post('bio_officer_notified', TRUE),
                    'officer_name' => $this->input->post('officer_name', TRUE),
                    'biohazard_signature' => $this->input->post('biohazard_signature', TRUE),
                    //'biohazard_signature_file' => $biohazard_signature_file['file_name'],
                    'status' => $submitStatus
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name', TRUE),
                    'date' => $this->input->post('date', TRUE),
                    'process_location' => $this->input->post('process_location', TRUE),
                    'conducted_name' => $this->input->post('conducted_name', TRUE),
                    'conducted_designation' => $this->input->post('conducted_designation', TRUE),
                    'approved_name' => $this->input->post('approved_name', TRUE),
                    'approved_designation' => $this->input->post('approved_designation', TRUE),
                    'date_from' => $this->input->post('date_from', TRUE),
                    'date_to' => $this->input->post('date_to', TRUE),
                    'review_date' => $this->input->post('review_date', TRUE),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $submitStatus
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by', TRUE),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no', TRUE),
                    'SWP_designation' => $this->input->post('SWP_designation', TRUE),
                    'SWP_faculty' => $this->input->post('SWP_faculty', TRUE),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title', TRUE),
                    'SWP_project_title' => $this->input->post('SWP_project_title', TRUE),
                    'SWP_location' => $this->input->post('SWP_location', TRUE),
                    'SWP_description' => $this->input->post('SWP_description', TRUE),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational', TRUE),
                    'SWP_operational' => $this->input->post('SWP_operational', TRUE),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational', TRUE),
                    'SWP_risk' => $this->input->post('SWP_risk', TRUE),
                    'SWP_control' => $this->input->post('SWP_control', TRUE),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name', TRUE),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date', TRUE),
                    'SWP_name' => $this->input->post('SWP_name', TRUE),
                    'SWP_PI' => $this->input->post('SWP_PI', TRUE),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by', TRUE),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI', TRUE),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date', TRUE),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date', TRUE),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained', TRUE),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer', TRUE),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by', TRUE),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by', TRUE),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date', TRUE),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks', TRUE),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by', TRUE),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date', TRUE),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks', TRUE),
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $submitStatus
                );
                
                
                if($this->biohazard_model->insert_new_applicant_data($biohazardData) && $this->hirarc_model->insert_new_applicant_data($hirarcData) && $this->swp_model->insert_new_applicant_data($swpData) && $this->project_model->update_proj_status($proj_id, $projectSubmit))
                {
                    $this->notification_model->insert_new_notification(null, 4, "New Project Application for Biohazardous Material", "The following user has submitted a new project application for Biohazardous Material: " . $this->session->userdata('account_name'));
					
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $biohazardData);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
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
            
            $data['retrieved'] = $this->biohazard_model->get_form_by_project_id($id);
            $data['retrieved3'] = $this->hirarc_model->get_form_by_project_id($id);
            $data['retrieved6'] = $this->swp_model->get_form_by_project_id($id);
        
            $this->load->template('biohazardproj_view', $data);
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
                
                $this->load->template('biohazardproj_view', $data);
                
            }elseif(isset($update)){
                
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
                $config['overwrite'] = TRUE;
                
                $this->load->library('upload'); //initialize
                $this->upload->initialize($config); //Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class
                #$this->upload->do_upload(); // do upload
                if($this->upload->do_upload('biohazard_signature_file')){
                    $biohazard_signature_file = $this->upload->data(); //returns an array containing all of the data related to the file you uploaded.
                }
                
                //biohazard
                $ar1 = implode(',',$this->input->post('project_personnel_name', TRUE));
                $ar2 = implode(',',$this->input->post('project_personnel_role', TRUE));
                $ar3 = implode(',',$this->input->post('project_SOP_title', TRUE));
                $ar4 = implode(',',$this->input->post('project_SOP_risk_title', TRUE));
                $ar5 = implode(',',$this->input->post('project_facilities_building', TRUE));
                $ar6 = implode(',',$this->input->post('project_facilities_room', TRUE));
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity', TRUE));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard', TRUE));
                $ar64 = implode(',',$this->input->post('HIRARC_effects', TRUE));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control', TRUE));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH', TRUE));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV', TRUE));
                $ar68 = implode(',',$this->input->post('HIRARC_RR', TRUE));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure', TRUE));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC', TRUE));
                
                
                $biohazardData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('date_received ', TRUE),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no ', TRUE),
                    'project_title' => $this->input->post('project_title', TRUE),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name', TRUE),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department', TRUE),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address', TRUE),
                    'project_alt_person' => $this->input->post('project_alt_person', TRUE),
                    'project_alt_department' => $this->input->post('project_alt_department', TRUE),
                    'project_alt_email' => $this->input->post('project_alt_email', TRUE),
                    'project_personnel_name' => $ar1,
                    'project_personnel_role' => $ar2,
                    'proposed_work_known' => $this->input->post('proposed_work_known', TRUE),
                    'proposed_work_may' => $this->input->post('proposed_work_may', TRUE),
                    'proposed_work_unknown' => $this->input->post('proposed_work_unknown', TRUE),
                    'proposed_work_isolation' => $this->input->post('proposed_work_isolation', TRUE),
                    'proposed_work_risk' => $this->input->post('proposed_work_risk', TRUE),
                    'proposed_work_sensitive' => $this->input->post('proposed_work_sensitive', TRUE),
                    'proposed_work_other' => $this->input->post('proposed_work_other', TRUE),
                    'project_summary' => $this->input->post('project_summary', TRUE),
                    'project_activity' => $this->input->post('project_activity', TRUE),
                    'project_SOP_title' => $ar3,
                    'project_SOP_risk_title' => $ar4,
                    'project_facilities_building' => $ar5,
                    'project_facilities_room' => $ar6,
                    'bio_officer_notified' => $this->input->post('bio_officer_notified', TRUE),
                    'officer_name' => $this->input->post('officer_name', TRUE),
                    'biohazard_signature' => $this->input->post('biohazard_signature', TRUE),
                    //'biohazard_signature_file' => $biohazard_signature_file['file_name'],
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name', TRUE),
                    'date' => $this->input->post('date', TRUE),
                    'process_location' => $this->input->post('process_location', TRUE),
                    'conducted_name' => $this->input->post('conducted_name', TRUE),
                    'conducted_designation' => $this->input->post('conducted_designation', TRUE),
                    'approved_name' => $this->input->post('approved_name', TRUE),
                    'approved_designation' => $this->input->post('approved_designation', TRUE),
                    'date_from' => $this->input->post('date_from', TRUE),
                    'date_to' => $this->input->post('date_to', TRUE),
                    'review_date' => $this->input->post('review_date', TRUE),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by', TRUE),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no', TRUE),
                    'SWP_designation' => $this->input->post('SWP_designation', TRUE),
                    'SWP_faculty' => $this->input->post('SWP_faculty', TRUE),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title', TRUE),
                    'SWP_project_title' => $this->input->post('SWP_project_title', TRUE),
                    'SWP_location' => $this->input->post('SWP_location', TRUE),
                    'SWP_description' => $this->input->post('SWP_description', TRUE),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational', TRUE),
                    'SWP_operational' => $this->input->post('SWP_operational', TRUE),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational', TRUE),
                    'SWP_risk' => $this->input->post('SWP_risk', TRUE),
                    'SWP_control' => $this->input->post('SWP_control', TRUE),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name', TRUE),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date', TRUE),
                    'SWP_name' => $this->input->post('SWP_name', TRUE),
                    'SWP_PI' => $this->input->post('SWP_PI', TRUE),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by', TRUE),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI', TRUE),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date', TRUE),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date', TRUE),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained', TRUE),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer', TRUE),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by', TRUE),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by', TRUE),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date', TRUE),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks', TRUE),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by', TRUE),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date', TRUE),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks', TRUE),
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                
                
                if($this->biohazard_model->update_applicant_data($appID, $biohazardData) && $this->hirarc_model->update_applicant_data($appID, $hirarcData) && $this->swp_model->update_applicant_data($appID, $swpData) && $this->project_model->update_applicant_data($appID, $editableValue))
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
            
            $data['retrieved'] = $this->biohazard_model->get_form_by_project_id($id);
            $data['retrieved3'] = $this->hirarc_model->get_form_by_project_id($id);
            $data['retrieved6'] = $this->swp_model->get_form_by_project_id($id);
        
            $this->load->template('biohazardproj_view', $data);
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
                
                $this->load->template('biohazardproj_view', $data);
            
            }elseif(isset($save)){
                
                /*/$config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
                //$config['overwrite'] = TRUE;
                
                $this->load->library('upload'); //initialize
                $this->upload->initialize($config); //Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class
                #$this->upload->do_upload(); // do upload
                /*if($this->upload->do_upload('biohazard_signature_file')){
                    $biohazard_signature_file = $this->upload->data(); //returns an array containing all of the data related to the file you uploaded.
                }*/
                /*$this->upload->do_upload('biohazard_signature_file');
                $biohazard_signature_file = $this->upload->data(); */
                
                //biohazard
                $ar1 = implode(',',$this->input->post('project_personnel_name', TRUE));
                $ar2 = implode(',',$this->input->post('project_personnel_role', TRUE));
                $ar3 = implode(',',$this->input->post('project_SOP_title', TRUE));
                $ar4 = implode(',',$this->input->post('project_SOP_risk_title', TRUE));
                $ar5 = implode(',',$this->input->post('project_facilities_building', TRUE));
                $ar6 = implode(',',$this->input->post('project_facilities_room', TRUE));
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity', TRUE));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard', TRUE));
                $ar64 = implode(',',$this->input->post('HIRARC_effects', TRUE));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control', TRUE));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH', TRUE));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV', TRUE));
                $ar68 = implode(',',$this->input->post('HIRARC_RR', TRUE));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure', TRUE));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC', TRUE));
                
                
                $biohazardData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('date_received ', TRUE),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no ', TRUE),
                    'project_title' => $this->input->post('project_title', TRUE),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name', TRUE),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department', TRUE),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address', TRUE),
                    'project_alt_person' => $this->input->post('project_alt_person', TRUE),
                    'project_alt_department' => $this->input->post('project_alt_department', TRUE),
                    'project_alt_email' => $this->input->post('project_alt_email', TRUE),
                    'project_personnel_name' => $ar1,
                    'project_personnel_role' => $ar2,
                    'proposed_work_known' => $this->input->post('proposed_work_known', TRUE),
                    'proposed_work_may' => $this->input->post('proposed_work_may', TRUE),
                    'proposed_work_unknown' => $this->input->post('proposed_work_unknown', TRUE),
                    'proposed_work_isolation' => $this->input->post('proposed_work_isolation', TRUE),
                    'proposed_work_risk' => $this->input->post('proposed_work_risk', TRUE),
                    'proposed_work_sensitive' => $this->input->post('proposed_work_sensitive', TRUE),
                    'proposed_work_other' => $this->input->post('proposed_work_other', TRUE),
                    'project_summary' => $this->input->post('project_summary', TRUE),
                    'project_activity' => $this->input->post('project_activity', TRUE),
                    'project_SOP_title' => $ar3,
                    'project_SOP_risk_title' => $ar4,
                    'project_facilities_building' => $ar5,
                    'project_facilities_room' => $ar6,
                    'bio_officer_notified' => $this->input->post('bio_officer_notified', TRUE),
                    'officer_name' => $this->input->post('officer_name', TRUE),
                    'biohazard_signature' => $this->input->post('biohazard_signature', TRUE),
                    //'biohazard_signature_file' => $biohazard_signature_file['file_name'],
                    'status' => $saveStatus
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name', TRUE),
                    'date' => $this->input->post('date', TRUE),
                    'process_location' => $this->input->post('process_location', TRUE),
                    'conducted_name' => $this->input->post('conducted_name', TRUE),
                    'conducted_designation' => $this->input->post('conducted_designation', TRUE),
                    'approved_name' => $this->input->post('approved_name', TRUE),
                    'approved_designation' => $this->input->post('approved_designation', TRUE),
                    'date_from' => $this->input->post('date_from', TRUE),
                    'date_to' => $this->input->post('date_to', TRUE),
                    'review_date' => $this->input->post('review_date', TRUE),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $saveStatus
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by', TRUE),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no', TRUE),
                    'SWP_designation' => $this->input->post('SWP_designation', TRUE),
                    'SWP_faculty' => $this->input->post('SWP_faculty', TRUE),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title', TRUE),
                    'SWP_project_title' => $this->input->post('SWP_project_title', TRUE),
                    'SWP_location' => $this->input->post('SWP_location', TRUE),
                    'SWP_description' => $this->input->post('SWP_description', TRUE),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational', TRUE),
                    'SWP_operational' => $this->input->post('SWP_operational', TRUE),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational', TRUE),
                    'SWP_risk' => $this->input->post('SWP_risk', TRUE),
                    'SWP_control' => $this->input->post('SWP_control', TRUE),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name', TRUE),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date', TRUE),
                    'SWP_name' => $this->input->post('SWP_name', TRUE),
                    'SWP_PI' => $this->input->post('SWP_PI', TRUE),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by', TRUE),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI', TRUE),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date', TRUE),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date', TRUE),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained', TRUE),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer', TRUE),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by', TRUE),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by', TRUE),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date', TRUE),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks', TRUE),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by', TRUE),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date', TRUE),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks', TRUE),
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $saveStatus
                );
                
                
                if($this->biohazard_model->update_saved_data($proj_id, $biohazardData) && $this->hirarc_model->update_saved_data($proj_id, $hirarcData) && $this->swp_model->update_saved_data($proj_id, $swpData) && $this->project_model->update_proj_status($proj_id, $projectSave))
                {
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully saved!</div>', $biohazardData);
                    redirect('saveHistory/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('saveHistory/index');
  
                }
                 
                
            }elseif(isset($submit)){
                
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
                $config['overwrite'] = TRUE;
                
                $this->load->library('upload'); //initialize
                $this->upload->initialize($config); //Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class
                #$this->upload->do_upload(); // do upload
                if($this->upload->do_upload('biohazard_signature_file')){
                    $biohazard_signature_file = $this->upload->data(); //returns an array containing all of the data related to the file you uploaded.
                }
                
                //biohazard
                $ar1 = implode(',',$this->input->post('project_personnel_name', TRUE));
                $ar2 = implode(',',$this->input->post('project_personnel_role', TRUE));
                $ar3 = implode(',',$this->input->post('project_SOP_title', TRUE));
                $ar4 = implode(',',$this->input->post('project_SOP_risk_title', TRUE));
                $ar5 = implode(',',$this->input->post('project_facilities_building', TRUE));
                $ar6 = implode(',',$this->input->post('project_facilities_room', TRUE));
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity', TRUE));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard', TRUE));
                $ar64 = implode(',',$this->input->post('HIRARC_effects', TRUE));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control', TRUE));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH', TRUE));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV', TRUE));
                $ar68 = implode(',',$this->input->post('HIRARC_RR', TRUE));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure', TRUE));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC', TRUE));
                
                
                $biohazardData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('date_received ', TRUE),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no ', TRUE),
                    'project_title' => $this->input->post('project_title', TRUE),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name', TRUE),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department', TRUE),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address', TRUE),
                    'project_alt_person' => $this->input->post('project_alt_person', TRUE),
                    'project_alt_department' => $this->input->post('project_alt_department', TRUE),
                    'project_alt_email' => $this->input->post('project_alt_email', TRUE),
                    'project_personnel_name' => $ar1,
                    'project_personnel_role' => $ar2,
                    'proposed_work_known' => $this->input->post('proposed_work_known', TRUE),
                    'proposed_work_may' => $this->input->post('proposed_work_may', TRUE),
                    'proposed_work_unknown' => $this->input->post('proposed_work_unknown', TRUE),
                    'proposed_work_isolation' => $this->input->post('proposed_work_isolation', TRUE),
                    'proposed_work_risk' => $this->input->post('proposed_work_risk', TRUE),
                    'proposed_work_sensitive' => $this->input->post('proposed_work_sensitive', TRUE),
                    'proposed_work_other' => $this->input->post('proposed_work_other', TRUE),
                    'project_summary' => $this->input->post('project_summary', TRUE),
                    'project_activity' => $this->input->post('project_activity', TRUE),
                    'project_SOP_title' => $ar3,
                    'project_SOP_risk_title' => $ar4,
                    'project_facilities_building' => $ar5,
                    'project_facilities_room' => $ar6,
                    'bio_officer_notified' => $this->input->post('bio_officer_notified', TRUE),
                    'officer_name' => $this->input->post('officer_name', TRUE),
                    'biohazard_signature' => $this->input->post('biohazard_signature', TRUE),
                    //'biohazard_signature_file' => $biohazard_signature_file['file_name'],
                    'status' => $submitStatus
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name', TRUE),
                    'date' => $this->input->post('date', TRUE),
                    'process_location' => $this->input->post('process_location', TRUE),
                    'conducted_name' => $this->input->post('conducted_name', TRUE),
                    'conducted_designation' => $this->input->post('conducted_designation', TRUE),
                    'approved_name' => $this->input->post('approved_name', TRUE),
                    'approved_designation' => $this->input->post('approved_designation', TRUE),
                    'date_from' => $this->input->post('date_from', TRUE),
                    'date_to' => $this->input->post('date_to', TRUE),
                    'review_date' => $this->input->post('review_date', TRUE),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $submitStatus
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by', TRUE),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no', TRUE),
                    'SWP_designation' => $this->input->post('SWP_designation', TRUE),
                    'SWP_faculty' => $this->input->post('SWP_faculty', TRUE),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title', TRUE),
                    'SWP_project_title' => $this->input->post('SWP_project_title', TRUE),
                    'SWP_location' => $this->input->post('SWP_location', TRUE),
                    'SWP_description' => $this->input->post('SWP_description', TRUE),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational', TRUE),
                    'SWP_operational' => $this->input->post('SWP_operational', TRUE),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational', TRUE),
                    'SWP_risk' => $this->input->post('SWP_risk', TRUE),
                    'SWP_control' => $this->input->post('SWP_control', TRUE),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name', TRUE),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date', TRUE),
                    'SWP_name' => $this->input->post('SWP_name', TRUE),
                    'SWP_PI' => $this->input->post('SWP_PI', TRUE),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by', TRUE),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI', TRUE),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date', TRUE),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date', TRUE),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained', TRUE),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer', TRUE),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by', TRUE),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by', TRUE),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date', TRUE),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks', TRUE),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by', TRUE),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date', TRUE),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks', TRUE),
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $submitStatus
                );
                
                
                if($this->biohazard_model->update_saved_data($proj_id, $biohazardData) && $this->hirarc_model->update_saved_data($proj_id, $hirarcData) && $this->swp_model->update_saved_data($proj_id, $swpData) && $this->project_model->update_proj_status($proj_id, $projectSubmit))
                {
                    
                    $this->notification_model->insert_new_notification(null, 4, "New Project Application for Biohazardous Material", "The following user has submitted a new project application for Biohazardous Material: " . $this->session->userdata('account_name'));
					
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $biohazardData);
                    redirect('saveHistory/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('saveHistory/index');
  
                }
                
            }
        
        }
        
        public function download($filename = NULL){
            
            //load download helper
            $this->load->helper('download');
            //read file contents
            $data = file_get_contents(base_url('/uploads/'.$filename));
            force_download($filename, $data);
            
        }
    }
?>
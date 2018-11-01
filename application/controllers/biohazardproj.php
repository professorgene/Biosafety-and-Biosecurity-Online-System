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
                if($this->upload->do_upload('biohazard_signature_file')){
                    $biohazard_signature_file = $this->upload->data(); //returns an array containing all of the data related to the file you uploaded.
                }
                
                //biohazard
                $ar1 = implode(',',$this->input->post('project_personnel_name'));
                $ar2 = implode(',',$this->input->post('project_personnel_role'));
                $ar3 = implode(',',$this->input->post('project_SOP_title'));
                $ar4 = implode(',',$this->input->post('project_SOP_risk_title'));
                $ar5 = implode(',',$this->input->post('project_facilities_building'));
                $ar6 = implode(',',$this->input->post('project_facilities_room'));
                
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
                
                
                $biohazardData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no '),
                    'project_title' => $this->input->post('project_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_alt_person' => $this->input->post('project_alt_person'),
                    'project_alt_department' => $this->input->post('project_alt_department'),
                    'project_alt_email' => $this->input->post('project_alt_email'),
                    'project_personnel_name' => $ar1,
                    'project_personnel_role' => $ar2,
                    'proposed_work_known' => $this->input->post('proposed_work_known'),
                    'proposed_work_may' => $this->input->post('proposed_work_may'),
                    'proposed_work_unknown' => $this->input->post('proposed_work_unknown'),
                    'proposed_work_isolation' => $this->input->post('proposed_work_isolation'),
                    'proposed_work_risk' => $this->input->post('proposed_work_risk'),
                    'proposed_work_sensitive' => $this->input->post('proposed_work_sensitive'),
                    'proposed_work_other' => $this->input->post('proposed_work_other'),
                    'project_summary' => $this->input->post('project_summary'),
                    'project_activity' => $this->input->post('project_activity'),
                    'project_SOP_title' => $ar3,
                    'project_SOP_risk_title' => $ar4,
                    'project_facilities_building' => $ar5,
                    'project_facilities_room' => $ar6,
                    'officer_notified' => $this->input->post('IBC_name'),
                    'officer_name' => $this->input->post('officer_name'),
                    'biohazard_signature' => $this->input->post('biohazard_signature'),
                    'biohazard_signature_file' => $biohazard_signature_file['file_name'],
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
                $ar1 = implode(',',$this->input->post('project_personnel_name'));
                $ar2 = implode(',',$this->input->post('project_personnel_role'));
                $ar3 = implode(',',$this->input->post('project_SOP_title'));
                $ar4 = implode(',',$this->input->post('project_SOP_risk_title'));
                $ar5 = implode(',',$this->input->post('project_facilities_building'));
                $ar6 = implode(',',$this->input->post('project_facilities_room'));
                
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
                
                
                $biohazardData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no '),
                    'project_title' => $this->input->post('project_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_alt_person' => $this->input->post('project_alt_person'),
                    'project_alt_department' => $this->input->post('project_alt_department'),
                    'project_alt_email' => $this->input->post('project_alt_email'),
                    'project_personnel_name' => $ar1,
                    'project_personnel_role' => $ar2,
                    'proposed_work_known' => $this->input->post('proposed_work_known'),
                    'proposed_work_may' => $this->input->post('proposed_work_may'),
                    'proposed_work_unknown' => $this->input->post('proposed_work_unknown'),
                    'proposed_work_isolation' => $this->input->post('proposed_work_isolation'),
                    'proposed_work_risk' => $this->input->post('proposed_work_risk'),
                    'proposed_work_sensitive' => $this->input->post('proposed_work_sensitive'),
                    'proposed_work_other' => $this->input->post('proposed_work_other'),
                    'project_summary' => $this->input->post('project_summary'),
                    'project_activity' => $this->input->post('project_activity'),
                    'project_SOP_title' => $ar3,
                    'project_SOP_risk_title' => $ar4,
                    'project_facilities_building' => $ar5,
                    'project_facilities_room' => $ar6,
                    'officer_notified' => $this->input->post('IBC_name'),
                    'officer_name' => $this->input->post('officer_name'),
                    'biohazard_signature' => $this->input->post('biohazard_signature'),
                    'biohazard_signature_file' => $biohazard_signature_file['file_name'],
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
                
                
                if($this->biohazard_model->insert_new_applicant_data($biohazardData) && $this->hirarc_model->insert_new_applicant_data($hirarcData) && $this->swp_model->insert_new_applicant_data($swpData) && $this->project_model->update_proj_status($proj_id, $projectSubmit))
                {
                    
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
        public function load_project(){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            $id = $this->input->get('id');
            
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
                $ar1 = implode(',',$this->input->post('project_personnel_name'));
                $ar2 = implode(',',$this->input->post('project_personnel_role'));
                $ar3 = implode(',',$this->input->post('project_SOP_title'));
                $ar4 = implode(',',$this->input->post('project_SOP_risk_title'));
                $ar5 = implode(',',$this->input->post('project_facilities_building'));
                $ar6 = implode(',',$this->input->post('project_facilities_room'));
                
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
                
                
                $biohazardData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $appID,
                    'date_received ' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no '),
                    'project_title' => $this->input->post('project_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_alt_person' => $this->input->post('project_alt_person'),
                    'project_alt_department' => $this->input->post('project_alt_department'),
                    'project_alt_email' => $this->input->post('project_alt_email'),
                    'project_personnel_name' => $ar1,
                    'project_personnel_role' => $ar2,
                    'proposed_work_known' => $this->input->post('proposed_work_known'),
                    'proposed_work_may' => $this->input->post('proposed_work_may'),
                    'proposed_work_unknown' => $this->input->post('proposed_work_unknown'),
                    'proposed_work_isolation' => $this->input->post('proposed_work_isolation'),
                    'proposed_work_risk' => $this->input->post('proposed_work_risk'),
                    'proposed_work_sensitive' => $this->input->post('proposed_work_sensitive'),
                    'proposed_work_other' => $this->input->post('proposed_work_other'),
                    'project_summary' => $this->input->post('project_summary'),
                    'project_activity' => $this->input->post('project_activity'),
                    'project_SOP_title' => $ar3,
                    'project_SOP_risk_title' => $ar4,
                    'project_facilities_building' => $ar5,
                    'project_facilities_room' => $ar6,
                    'officer_notified' => $this->input->post('IBC_name'),
                    'officer_name' => $this->input->post('officer_name'),
                    'biohazard_signature' => $this->input->post('biohazard_signature'),
                    'biohazard_signature_file' => $biohazard_signature_file['file_name'],
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
                
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
                //$config['overwrite'] = TRUE;
                
                $this->load->library('upload'); //initialize
                $this->upload->initialize($config); //Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class
                #$this->upload->do_upload(); // do upload
                /*if($this->upload->do_upload('biohazard_signature_file')){
                    $biohazard_signature_file = $this->upload->data(); //returns an array containing all of the data related to the file you uploaded.
                }*/
                $this->upload->do_upload('biohazard_signature_file');
                $biohazard_signature_file = $this->upload->data(); 
                
                //biohazard
                $ar1 = implode(',',$this->input->post('project_personnel_name'));
                $ar2 = implode(',',$this->input->post('project_personnel_role'));
                $ar3 = implode(',',$this->input->post('project_SOP_title'));
                $ar4 = implode(',',$this->input->post('project_SOP_risk_title'));
                $ar5 = implode(',',$this->input->post('project_facilities_building'));
                $ar6 = implode(',',$this->input->post('project_facilities_room'));
                
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
                
                
                $biohazardData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no '),
                    'project_title' => $this->input->post('project_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_alt_person' => $this->input->post('project_alt_person'),
                    'project_alt_department' => $this->input->post('project_alt_department'),
                    'project_alt_email' => $this->input->post('project_alt_email'),
                    'project_personnel_name' => $ar1,
                    'project_personnel_role' => $ar2,
                    'proposed_work_known' => $this->input->post('proposed_work_known'),
                    'proposed_work_may' => $this->input->post('proposed_work_may'),
                    'proposed_work_unknown' => $this->input->post('proposed_work_unknown'),
                    'proposed_work_isolation' => $this->input->post('proposed_work_isolation'),
                    'proposed_work_risk' => $this->input->post('proposed_work_risk'),
                    'proposed_work_sensitive' => $this->input->post('proposed_work_sensitive'),
                    'proposed_work_other' => $this->input->post('proposed_work_other'),
                    'project_summary' => $this->input->post('project_summary'),
                    'project_activity' => $this->input->post('project_activity'),
                    'project_SOP_title' => $ar3,
                    'project_SOP_risk_title' => $ar4,
                    'project_facilities_building' => $ar5,
                    'project_facilities_room' => $ar6,
                    'officer_notified' => $this->input->post('IBC_name'),
                    'officer_name' => $this->input->post('officer_name'),
                    'biohazard_signature' => $this->input->post('biohazard_signature'),
                    'biohazard_signature_file' => $biohazard_signature_file['file_name'],
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
                $ar1 = implode(',',$this->input->post('project_personnel_name'));
                $ar2 = implode(',',$this->input->post('project_personnel_role'));
                $ar3 = implode(',',$this->input->post('project_SOP_title'));
                $ar4 = implode(',',$this->input->post('project_SOP_risk_title'));
                $ar5 = implode(',',$this->input->post('project_facilities_building'));
                $ar6 = implode(',',$this->input->post('project_facilities_room'));
                
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
                
                
                $biohazardData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no '),
                    'project_title' => $this->input->post('project_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_alt_person' => $this->input->post('project_alt_person'),
                    'project_alt_department' => $this->input->post('project_alt_department'),
                    'project_alt_email' => $this->input->post('project_alt_email'),
                    'project_personnel_name' => $ar1,
                    'project_personnel_role' => $ar2,
                    'proposed_work_known' => $this->input->post('proposed_work_known'),
                    'proposed_work_may' => $this->input->post('proposed_work_may'),
                    'proposed_work_unknown' => $this->input->post('proposed_work_unknown'),
                    'proposed_work_isolation' => $this->input->post('proposed_work_isolation'),
                    'proposed_work_risk' => $this->input->post('proposed_work_risk'),
                    'proposed_work_sensitive' => $this->input->post('proposed_work_sensitive'),
                    'proposed_work_other' => $this->input->post('proposed_work_other'),
                    'project_summary' => $this->input->post('project_summary'),
                    'project_activity' => $this->input->post('project_activity'),
                    'project_SOP_title' => $ar3,
                    'project_SOP_risk_title' => $ar4,
                    'project_facilities_building' => $ar5,
                    'project_facilities_room' => $ar6,
                    'officer_notified' => $this->input->post('IBC_name'),
                    'officer_name' => $this->input->post('officer_name'),
                    'biohazard_signature' => $this->input->post('biohazard_signature'),
                    'biohazard_signature_file' => $biohazard_signature_file['file_name'],
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
                
                
                if($this->biohazard_model->update_saved_data($proj_id, $biohazardData) && $this->hirarc_model->update_saved_data($proj_id, $hirarcData) && $this->swp_model->update_saved_data($proj_id, $swpData) && $this->project_model->update_proj_status($proj_id, $projectSubmit))
                {
                    
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
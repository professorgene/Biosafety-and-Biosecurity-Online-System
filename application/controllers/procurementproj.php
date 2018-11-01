<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class procurementproj extends CI_Controller{
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('procurement_model');
        $this->load->model('project_model');
		
        //breadcrum
		$this->breadcrumbs->unshift('Home', '/');
		$this->breadcrumbs->push('New Project','/projectselect', true);		
		$this->breadcrumbs->push('Procurement of Biological Material','/procurementpage', true);
		$this->breadcrumbs->push('OHS-F-4.18.X PRE-PURCHASE MATERIAL RISK ASSESSMENT', true);
		
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
                
                $this->load->template('procurementproj_view', $data);
                
            }elseif(isset($save)){
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'Sec1_chemical' => $this->input->post('Sec1_chemical'),
                    'Sec1_biological_material' => $this->input->post('Sec1_biological_material'),
                    'Sec1_equipment' => $this->input->post('Sec1_equipment'),
                    'Sec1_doc_id' => $this->input->post('Sec1_doc_id'),
                    'Sec1_review_date' => $this->input->post('Sec1_review_date'),
                    'Sec2A_name' => $this->input->post('Sec2A_name'),
                    'Sec2A_statement' => $this->input->post('Sec2A_statement'),
                    'Sec2A_manufacturer' => $this->input->post('Sec2A_manufacturer'),
                    'Sec2A_waste' => $this->input->post('Sec2A_waste'),
                    'Sec2A_hazardous' => $this->input->post('Sec2A_hazardous'),
                    'Sec2A_waste_type_corrosive' => $this->input->post('Sec2A_waste_type_corrosive'),
                    'Sec2A_waste_type_ignitable' => $this->input->post('Sec2A_waste_type_ignitable'),
                    'Sec2A_waste_type_reactive' => $this->input->post('Sec2A_waste_type_reactive'),
                    'Sec2A_waste_type_toxic' => $this->input->post('Sec2A_waste_type_toxic'),
                    'Sec2A_waste_type_infectious' => $this->input->post('Sec2A_waste_type_infectious'),
                    'Sec2A2_permit' => $this->input->post('Sec2A2_permit'),
                    'Sec2A2_storage' => $this->input->post('Sec2A2_storage'),
                    'Sec2A2_permit_type' => $this->input->post('Sec2A2_permit_type'),
                    'Sec2A2_waste_requirement' => $this->input->post('Sec2A2_waste_requirement'),
                    'Sec2A2_MSDS' => $this->input->post('Sec2A2_MSDS'),
                    'Sec2A2_risk_control_training' => $this->input->post('Sec2A2_risk_control_training'),
                    'Sec2A2_risk_control_inspection' => $this->input->post('Sec2A2_risk_control_inspection'),
                    'Sec2A2_risk_control_SOP' => $this->input->post('Sec2A2_risk_control_SOP'),
                    'Sec2A2_risk_control_PPE' => $this->input->post('Sec2A2_risk_control_PPE'),
                    'Sec2A2_risk_control_engineering' => $this->input->post('Sec2A2_risk_control_engineering'),
                    'Sec2A2_exposure_inhalation' => $this->input->post('Sec2A2_exposure_inhalation'),
                    'Sec2A2_exposure_skin' => $this->input->post('Sec2A2_exposure_skin'),
                    'Sec2A2_exposure_ingestion' => $this->input->post('Sec2A2_exposure_ingestion'),
                    'Sec2A2_exposure_injection' => $this->input->post('Sec2A2_exposure_injection'),
                    'Sec2A2_exposure_others' => $this->input->post('Sec2A2_exposure_others'),
                    'Sec2A2_exposure_description' => $this->input->post('Sec2A2_exposure_description'),
                    'Sec2A2_emergency_first_aid_kit' => $this->input->post('Sec2A2_emergency_first_aid_kit'),
                    'Sec2A2_emergency_shower' => $this->input->post('Sec2A2_emergency_shower'),
                    'Sec2A2_emergency_eyewash' => $this->input->post('Sec2A2_emergency_eyewash'),
                    'Sec2A2_emergency_neutralizing' => $this->input->post('Sec2A2_emergency_neutralizing'),
                    'Sec2A2_emergency_spill' => $this->input->post('Sec2A2_emergency_spill'),
                    'Sec2A2_emergency_restrict' => $this->input->post('Sec2A2_emergency_restrict'),
                    'Sec2A3_storage_inhalation' => $this->input->post('Sec2A3_storage_inhalation'),
                    'Sec2A3_storage_skin' => $this->input->post('Sec2A3_storage_skin'),
                    'Sec2A3_storage_ingestion' => $this->input->post('Sec2A3_storage_ingestion'),
                    'Sec2A3_storage_injection' => $this->input->post('Sec2A3_storage_injection'),
                    'Sec2A3_storage_others' => $this->input->post('Sec2A3_storage_others'),
                    'Sec2A3_other_storage_description' => $this->input->post('Sec2A3_other_storage_description'),
                    'Sec2A3_storage_control' => $this->input->post('Sec2A3_storage_control'),
                    'Sec2A3_handling_inhalation' => $this->input->post('Sec2A3_handling_inhalation'),
                    'Sec2A3_handling_skin' => $this->input->post('Sec2A3_handling_skin'),
                    'Sec2A3_handling_ingestion' => $this->input->post('Sec2A3_handling_ingestion'),
                    'Sec2A3_handling_injection' => $this->input->post('Sec2A3_handling_injection'),
                    'Sec2A3_handling_others' => $this->input->post('Sec2A3_handling_others'),
                    'Sec2A3_handling_description' => $this->input->post('Sec2A3_handling_description'),
                    'Sec2A3_handling_control' => $this->input->post('Sec2A3_handling_control'),
                    'Sec2A3_spill_inhalation' => $this->input->post('Sec2A3_spill_inhalation'),
                    'Sec2A3_spill_skin' => $this->input->post('Sec2A3_spill_skin'),
                    'Sec2A3_spill_ingestion' => $this->input->post('Sec2A3_spill_ingestion'),
                    'Sec2A3_spill_injection' => $this->input->post('Sec2A3_spill_injection'),
                    'Sec2A3_spill_others' => $this->input->post('Sec2A3_spill_others'),
                    'Sec2A3_spill_description' => $this->input->post('Sec2A3_spill_description'),
                    'Sec2A3_spill_control' => $this->input->post('Sec2A3_spill_control'),
                    'Sec2A3_disposal_inhalation' => $this->input->post('Sec2A3_disposal_inhalation'),
                    'Sec2A3_disposal_skin' => $this->input->post('Sec2A3_disposal_skin'),
                    'Sec2A3_disposal_ingestion' => $this->input->post('Sec2A3_disposal_ingestion'),
                    'Sec2A3_disposal_injection' => $this->input->post('Sec2A3_disposal_injection'),
                    'Sec2A3_disposal_others' => $this->input->post('Sec2A3_disposal_others'),
                    'Sec2A3_disposal_description' => $this->input->post('Sec2A3_disposal_description'),
                    'Sec2A3_disposal_control' => $this->input->post('Sec2A3_disposal_control'),
                    'Sec2B1_equipment_name' => $this->input->post('Sec2B1_equipment_name'),
                    'Sec2B1_activity_type' => $this->input->post('Sec2B1_activity_type'),
                    'Sec2B1_activity_location' => $this->input->post('Sec2B1_activity_location'),
                    'Sec2B2_machinery_description' => $this->input->post('Sec2B2_machinery_description'),
                    'Sec2B2_checklist_crushing' => $this->input->post('Sec2B2_checklist_crushing'),
                    'Sec2B2_checklist_temperature' => $this->input->post('Sec2B2_checklist_temperature'),
                    'Sec2B2_checklist_shearing' => $this->input->post('Sec2B2_checklist_shearing'),
                    'Sec2B2_checklist_electrical' => $this->input->post('Sec2B2_checklist_electrical'),
                    'Sec2B2_checklist_drawing' => $this->input->post('Sec2B2_checklist_drawing'),
                    'Sec2B2_checklist_noise' => $this->input->post('Sec2B2_checklist_noise'),
                    'Sec2B2_checklist_cutting' => $this->input->post('Sec2B2_checklist_cutting'),
                    'Sec2B2_checklist_vibration' => $this->input->post('Sec2B2_checklist_vibration'),
                    'Sec2B2_checklist_entangle' => $this->input->post('Sec2B2_checklist_entangle'),
                    'Sec2B2_checklist_dust' => $this->input->post('Sec2B2_checklist_dust'),
                    'Sec2B2_checklist_impact' => $this->input->post('Sec2B2_checklist_impact'),
                    'Sec2B2_checklist_pressure' => $this->input->post('Sec2B2_checklist_pressure'),
                    'Sec2B2_checklist_abrasion' => $this->input->post('Sec2B2_checklist_abrasion'),
                    'Sec2B2_checklist_waste' => $this->input->post('Sec2B2_checklist_waste'),
                    'Sec2B2_checklist_stabbing' => $this->input->post('Sec2B2_checklist_stabbing'),
                    'Sec2B2_checklist_fumes' => $this->input->post('Sec2B2_checklist_fumes'),
                    'Sec2B2_checklist_puncture' => $this->input->post('Sec2B2_checklist_puncture'),
                    'Sec2B2_checklist_chemical' => $this->input->post('Sec2B2_checklist_chemical'),
                    'Sec2B2_checklist_ejection' => $this->input->post('Sec2B2_checklist_ejection'),
                    'Sec2B2_checklist_allergens' => $this->input->post('Sec2B2_checklist_allergens'),
                    'Sec2B2_exposure' => $this->input->post('Sec2B2_exposure'),
                    'Sec2B2_users' => $this->input->post('Sec2B2_users'),
                    'Sec2B2_control_measures' => $this->input->post('Sec2B2_control_measures'),
                    'Sec2B2_procedural_behavioural' => $this->input->post('Sec2B2_procedural_behavioural'),
                    'Sec2B2_overall_assessment_risk_level' => $this->input->post('Sec2B2_overall_assessment_risk_level'),
                    'Sec2B2_risk_reduction_action' => $this->input->post('Sec2B2_risk_reduction_action'),
                    'Sec2B2_risk_reduction_by_who' => $this->input->post('Sec2B2_risk_reduction_by_who'),
                    'Sec2B2_risk_reduction_by_when' => $this->input->post('Sec2B2_risk_reduction_by_when'),
                    'Sec2B2_risk_reduction_action_completed' => $this->input->post('Sec2B2_risk_reduction_action_completed'),
                    'Sec2B2_overall_assessment_risk_level_after' => $this->input->post('Sec2B2_overall_assessment_risk_level_after'),
                    'Sec3_requestor' => $this->input->post('Sec3_requestor'),
                    'Sec3_requestor_signature' => $this->input->post('Sec3_requestor_signature'),
                    'Sec3_requestor_date' => $this->input->post('Sec3_requestor_date'),
                    'Sec3_supervisor_HMU' => $this->input->post('Sec3_supervisor_HMU'),
                    'Sec3_supervisor_signature' => $this->input->post('Sec3_supervisor_signature'),
                    'Sec3_supervisor_date' => $this->input->post('Sec3_supervisor_date'),
                    'Sec3_LO' => $this->input->post('Sec3_LO'),
                    'Sec3_LO_signature' => $this->input->post('Sec3_LO_signature'),
                    'Sec3_LO_date' => $this->input->post('Sec3_LO_date'),
                    'status' => $saveStatus
                    
                );
                
                
                if($this->procurement_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSave)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('procurementproj/index');
                    
                    
                    
                }
                
            }elseif(isset($submit)){
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'Sec1_chemical' => $this->input->post('Sec1_chemical'),
                    'Sec1_biological_material' => $this->input->post('Sec1_biological_material'),
                    'Sec1_equipment' => $this->input->post('Sec1_equipment'),
                    'Sec1_doc_id' => $this->input->post('Sec1_doc_id'),
                    'Sec1_review_date' => $this->input->post('Sec1_review_date'),
                    'Sec2A_name' => $this->input->post('Sec2A_name'),
                    'Sec2A_statement' => $this->input->post('Sec2A_statement'),
                    'Sec2A_manufacturer' => $this->input->post('Sec2A_manufacturer'),
                    'Sec2A_waste' => $this->input->post('Sec2A_waste'),
                    'Sec2A_hazardous' => $this->input->post('Sec2A_hazardous'),
                    'Sec2A_waste_type_corrosive' => $this->input->post('Sec2A_waste_type_corrosive'),
                    'Sec2A_waste_type_ignitable' => $this->input->post('Sec2A_waste_type_ignitable'),
                    'Sec2A_waste_type_reactive' => $this->input->post('Sec2A_waste_type_reactive'),
                    'Sec2A_waste_type_toxic' => $this->input->post('Sec2A_waste_type_toxic'),
                    'Sec2A_waste_type_infectious' => $this->input->post('Sec2A_waste_type_infectious'),
                    'Sec2A2_permit' => $this->input->post('Sec2A2_permit'),
                    'Sec2A2_storage' => $this->input->post('Sec2A2_storage'),
                    'Sec2A2_permit_type' => $this->input->post('Sec2A2_permit_type'),
                    'Sec2A2_waste_requirement' => $this->input->post('Sec2A2_waste_requirement'),
                    'Sec2A2_MSDS' => $this->input->post('Sec2A2_MSDS'),
                    'Sec2A2_risk_control_training' => $this->input->post('Sec2A2_risk_control_training'),
                    'Sec2A2_risk_control_inspection' => $this->input->post('Sec2A2_risk_control_inspection'),
                    'Sec2A2_risk_control_SOP' => $this->input->post('Sec2A2_risk_control_SOP'),
                    'Sec2A2_risk_control_PPE' => $this->input->post('Sec2A2_risk_control_PPE'),
                    'Sec2A2_risk_control_engineering' => $this->input->post('Sec2A2_risk_control_engineering'),
                    'Sec2A2_exposure_inhalation' => $this->input->post('Sec2A2_exposure_inhalation'),
                    'Sec2A2_exposure_skin' => $this->input->post('Sec2A2_exposure_skin'),
                    'Sec2A2_exposure_ingestion' => $this->input->post('Sec2A2_exposure_ingestion'),
                    'Sec2A2_exposure_injection' => $this->input->post('Sec2A2_exposure_injection'),
                    'Sec2A2_exposure_others' => $this->input->post('Sec2A2_exposure_others'),
                    'Sec2A2_exposure_description' => $this->input->post('Sec2A2_exposure_description'),
                    'Sec2A2_emergency_first_aid_kit' => $this->input->post('Sec2A2_emergency_first_aid_kit'),
                    'Sec2A2_emergency_shower' => $this->input->post('Sec2A2_emergency_shower'),
                    'Sec2A2_emergency_eyewash' => $this->input->post('Sec2A2_emergency_eyewash'),
                    'Sec2A2_emergency_neutralizing' => $this->input->post('Sec2A2_emergency_neutralizing'),
                    'Sec2A2_emergency_spill' => $this->input->post('Sec2A2_emergency_spill'),
                    'Sec2A2_emergency_restrict' => $this->input->post('Sec2A2_emergency_restrict'),
                    'Sec2A3_storage_inhalation' => $this->input->post('Sec2A3_storage_inhalation'),
                    'Sec2A3_storage_skin' => $this->input->post('Sec2A3_storage_skin'),
                    'Sec2A3_storage_ingestion' => $this->input->post('Sec2A3_storage_ingestion'),
                    'Sec2A3_storage_injection' => $this->input->post('Sec2A3_storage_injection'),
                    'Sec2A3_storage_others' => $this->input->post('Sec2A3_storage_others'),
                    'Sec2A3_other_storage_description' => $this->input->post('Sec2A3_other_storage_description'),
                    'Sec2A3_storage_control' => $this->input->post('Sec2A3_storage_control'),
                    'Sec2A3_handling_inhalation' => $this->input->post('Sec2A3_handling_inhalation'),
                    'Sec2A3_handling_skin' => $this->input->post('Sec2A3_handling_skin'),
                    'Sec2A3_handling_ingestion' => $this->input->post('Sec2A3_handling_ingestion'),
                    'Sec2A3_handling_injection' => $this->input->post('Sec2A3_handling_injection'),
                    'Sec2A3_handling_others' => $this->input->post('Sec2A3_handling_others'),
                    'Sec2A3_handling_description' => $this->input->post('Sec2A3_handling_description'),
                    'Sec2A3_handling_control' => $this->input->post('Sec2A3_handling_control'),
                    'Sec2A3_spill_inhalation' => $this->input->post('Sec2A3_spill_inhalation'),
                    'Sec2A3_spill_skin' => $this->input->post('Sec2A3_spill_skin'),
                    'Sec2A3_spill_ingestion' => $this->input->post('Sec2A3_spill_ingestion'),
                    'Sec2A3_spill_injection' => $this->input->post('Sec2A3_spill_injection'),
                    'Sec2A3_spill_others' => $this->input->post('Sec2A3_spill_others'),
                    'Sec2A3_spill_description' => $this->input->post('Sec2A3_spill_description'),
                    'Sec2A3_spill_control' => $this->input->post('Sec2A3_spill_control'),
                    'Sec2A3_disposal_inhalation' => $this->input->post('Sec2A3_disposal_inhalation'),
                    'Sec2A3_disposal_skin' => $this->input->post('Sec2A3_disposal_skin'),
                    'Sec2A3_disposal_ingestion' => $this->input->post('Sec2A3_disposal_ingestion'),
                    'Sec2A3_disposal_injection' => $this->input->post('Sec2A3_disposal_injection'),
                    'Sec2A3_disposal_others' => $this->input->post('Sec2A3_disposal_others'),
                    'Sec2A3_disposal_description' => $this->input->post('Sec2A3_disposal_description'),
                    'Sec2A3_disposal_control' => $this->input->post('Sec2A3_disposal_control'),
                    'Sec2B1_equipment_name' => $this->input->post('Sec2B1_equipment_name'),
                    'Sec2B1_activity_type' => $this->input->post('Sec2B1_activity_type'),
                    'Sec2B1_activity_location' => $this->input->post('Sec2B1_activity_location'),
                    'Sec2B2_machinery_description' => $this->input->post('Sec2B2_machinery_description'),
                    'Sec2B2_checklist_crushing' => $this->input->post('Sec2B2_checklist_crushing'),
                    'Sec2B2_checklist_temperature' => $this->input->post('Sec2B2_checklist_temperature'),
                    'Sec2B2_checklist_shearing' => $this->input->post('Sec2B2_checklist_shearing'),
                    'Sec2B2_checklist_electrical' => $this->input->post('Sec2B2_checklist_electrical'),
                    'Sec2B2_checklist_drawing' => $this->input->post('Sec2B2_checklist_drawing'),
                    'Sec2B2_checklist_noise' => $this->input->post('Sec2B2_checklist_noise'),
                    'Sec2B2_checklist_cutting' => $this->input->post('Sec2B2_checklist_cutting'),
                    'Sec2B2_checklist_vibration' => $this->input->post('Sec2B2_checklist_vibration'),
                    'Sec2B2_checklist_entangle' => $this->input->post('Sec2B2_checklist_entangle'),
                    'Sec2B2_checklist_dust' => $this->input->post('Sec2B2_checklist_dust'),
                    'Sec2B2_checklist_impact' => $this->input->post('Sec2B2_checklist_impact'),
                    'Sec2B2_checklist_pressure' => $this->input->post('Sec2B2_checklist_pressure'),
                    'Sec2B2_checklist_abrasion' => $this->input->post('Sec2B2_checklist_abrasion'),
                    'Sec2B2_checklist_waste' => $this->input->post('Sec2B2_checklist_waste'),
                    'Sec2B2_checklist_stabbing' => $this->input->post('Sec2B2_checklist_stabbing'),
                    'Sec2B2_checklist_fumes' => $this->input->post('Sec2B2_checklist_fumes'),
                    'Sec2B2_checklist_puncture' => $this->input->post('Sec2B2_checklist_puncture'),
                    'Sec2B2_checklist_chemical' => $this->input->post('Sec2B2_checklist_chemical'),
                    'Sec2B2_checklist_ejection' => $this->input->post('Sec2B2_checklist_ejection'),
                    'Sec2B2_checklist_allergens' => $this->input->post('Sec2B2_checklist_allergens'),
                    'Sec2B2_exposure' => $this->input->post('Sec2B2_exposure'),
                    'Sec2B2_users' => $this->input->post('Sec2B2_users'),
                    'Sec2B2_control_measures' => $this->input->post('Sec2B2_control_measures'),
                    'Sec2B2_procedural_behavioural' => $this->input->post('Sec2B2_procedural_behavioural'),
                    'Sec2B2_overall_assessment_risk_level' => $this->input->post('Sec2B2_overall_assessment_risk_level'),
                    'Sec2B2_risk_reduction_action' => $this->input->post('Sec2B2_risk_reduction_action'),
                    'Sec2B2_risk_reduction_by_who' => $this->input->post('Sec2B2_risk_reduction_by_who'),
                    'Sec2B2_risk_reduction_by_when' => $this->input->post('Sec2B2_risk_reduction_by_when'),
                    'Sec2B2_risk_reduction_action_completed' => $this->input->post('Sec2B2_risk_reduction_action_completed'),
                    'Sec2B2_overall_assessment_risk_level_after' => $this->input->post('Sec2B2_overall_assessment_risk_level_after'),
                    'Sec3_requestor' => $this->input->post('Sec3_requestor'),
                    'Sec3_requestor_signature' => $this->input->post('Sec3_requestor_signature'),
                    'Sec3_requestor_date' => $this->input->post('Sec3_requestor_date'),
                    'Sec3_supervisor_HMU' => $this->input->post('Sec3_supervisor_HMU'),
                    'Sec3_supervisor_signature' => $this->input->post('Sec3_supervisor_signature'),
                    'Sec3_supervisor_date' => $this->input->post('Sec3_supervisor_date'),
                    'Sec3_LO' => $this->input->post('Sec3_LO'),
                    'Sec3_LO_signature' => $this->input->post('Sec3_LO_signature'),
                    'Sec3_LO_date' => $this->input->post('Sec3_LO_date'),
                    'status' => $submitStatus
                    
                );
                
                
                if($this->procurement_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('procurementproj/index');
                    
                    
                    
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
            
            $data['retrieved'] = $this->procurement_model->get_form_by_project_id($id);
            
        
            $this->load->template('procurementproj_view', $data);
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
                
                $this->load->template('procurementproj_view', $data);
                
            }elseif(isset($update)){
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $appID,
                    'Sec1_chemical' => $this->input->post('Sec1_chemical'),
                    'Sec1_biological_material' => $this->input->post('Sec1_biological_material'),
                    'Sec1_equipment' => $this->input->post('Sec1_equipment'),
                    'Sec1_doc_id' => $this->input->post('Sec1_doc_id'),
                    'Sec1_review_date' => $this->input->post('Sec1_review_date'),
                    'Sec2A_name' => $this->input->post('Sec2A_name'),
                    'Sec2A_statement' => $this->input->post('Sec2A_statement'),
                    'Sec2A_manufacturer' => $this->input->post('Sec2A_manufacturer'),
                    'Sec2A_waste' => $this->input->post('Sec2A_waste'),
                    'Sec2A_hazardous' => $this->input->post('Sec2A_hazardous'),
                    'Sec2A_waste_type_corrosive' => $this->input->post('Sec2A_waste_type_corrosive'),
                    'Sec2A_waste_type_ignitable' => $this->input->post('Sec2A_waste_type_ignitable'),
                    'Sec2A_waste_type_reactive' => $this->input->post('Sec2A_waste_type_reactive'),
                    'Sec2A_waste_type_toxic' => $this->input->post('Sec2A_waste_type_toxic'),
                    'Sec2A_waste_type_infectious' => $this->input->post('Sec2A_waste_type_infectious'),
                    'Sec2A2_permit' => $this->input->post('Sec2A2_permit'),
                    'Sec2A2_storage' => $this->input->post('Sec2A2_storage'),
                    'Sec2A2_permit_type' => $this->input->post('Sec2A2_permit_type'),
                    'Sec2A2_waste_requirement' => $this->input->post('Sec2A2_waste_requirement'),
                    'Sec2A2_MSDS' => $this->input->post('Sec2A2_MSDS'),
                    'Sec2A2_risk_control_training' => $this->input->post('Sec2A2_risk_control_training'),
                    'Sec2A2_risk_control_inspection' => $this->input->post('Sec2A2_risk_control_inspection'),
                    'Sec2A2_risk_control_SOP' => $this->input->post('Sec2A2_risk_control_SOP'),
                    'Sec2A2_risk_control_PPE' => $this->input->post('Sec2A2_risk_control_PPE'),
                    'Sec2A2_risk_control_engineering' => $this->input->post('Sec2A2_risk_control_engineering'),
                    'Sec2A2_exposure_inhalation' => $this->input->post('Sec2A2_exposure_inhalation'),
                    'Sec2A2_exposure_skin' => $this->input->post('Sec2A2_exposure_skin'),
                    'Sec2A2_exposure_ingestion' => $this->input->post('Sec2A2_exposure_ingestion'),
                    'Sec2A2_exposure_injection' => $this->input->post('Sec2A2_exposure_injection'),
                    'Sec2A2_exposure_others' => $this->input->post('Sec2A2_exposure_others'),
                    'Sec2A2_exposure_description' => $this->input->post('Sec2A2_exposure_description'),
                    'Sec2A2_emergency_first_aid_kit' => $this->input->post('Sec2A2_emergency_first_aid_kit'),
                    'Sec2A2_emergency_shower' => $this->input->post('Sec2A2_emergency_shower'),
                    'Sec2A2_emergency_eyewash' => $this->input->post('Sec2A2_emergency_eyewash'),
                    'Sec2A2_emergency_neutralizing' => $this->input->post('Sec2A2_emergency_neutralizing'),
                    'Sec2A2_emergency_spill' => $this->input->post('Sec2A2_emergency_spill'),
                    'Sec2A2_emergency_restrict' => $this->input->post('Sec2A2_emergency_restrict'),
                    'Sec2A3_storage_inhalation' => $this->input->post('Sec2A3_storage_inhalation'),
                    'Sec2A3_storage_skin' => $this->input->post('Sec2A3_storage_skin'),
                    'Sec2A3_storage_ingestion' => $this->input->post('Sec2A3_storage_ingestion'),
                    'Sec2A3_storage_injection' => $this->input->post('Sec2A3_storage_injection'),
                    'Sec2A3_storage_others' => $this->input->post('Sec2A3_storage_others'),
                    'Sec2A3_other_storage_description' => $this->input->post('Sec2A3_other_storage_description'),
                    'Sec2A3_storage_control' => $this->input->post('Sec2A3_storage_control'),
                    'Sec2A3_handling_inhalation' => $this->input->post('Sec2A3_handling_inhalation'),
                    'Sec2A3_handling_skin' => $this->input->post('Sec2A3_handling_skin'),
                    'Sec2A3_handling_ingestion' => $this->input->post('Sec2A3_handling_ingestion'),
                    'Sec2A3_handling_injection' => $this->input->post('Sec2A3_handling_injection'),
                    'Sec2A3_handling_others' => $this->input->post('Sec2A3_handling_others'),
                    'Sec2A3_handling_description' => $this->input->post('Sec2A3_handling_description'),
                    'Sec2A3_handling_control' => $this->input->post('Sec2A3_handling_control'),
                    'Sec2A3_spill_inhalation' => $this->input->post('Sec2A3_spill_inhalation'),
                    'Sec2A3_spill_skin' => $this->input->post('Sec2A3_spill_skin'),
                    'Sec2A3_spill_ingestion' => $this->input->post('Sec2A3_spill_ingestion'),
                    'Sec2A3_spill_injection' => $this->input->post('Sec2A3_spill_injection'),
                    'Sec2A3_spill_others' => $this->input->post('Sec2A3_spill_others'),
                    'Sec2A3_spill_description' => $this->input->post('Sec2A3_spill_description'),
                    'Sec2A3_spill_control' => $this->input->post('Sec2A3_spill_control'),
                    'Sec2A3_disposal_inhalation' => $this->input->post('Sec2A3_disposal_inhalation'),
                    'Sec2A3_disposal_skin' => $this->input->post('Sec2A3_disposal_skin'),
                    'Sec2A3_disposal_ingestion' => $this->input->post('Sec2A3_disposal_ingestion'),
                    'Sec2A3_disposal_injection' => $this->input->post('Sec2A3_disposal_injection'),
                    'Sec2A3_disposal_others' => $this->input->post('Sec2A3_disposal_others'),
                    'Sec2A3_disposal_description' => $this->input->post('Sec2A3_disposal_description'),
                    'Sec2A3_disposal_control' => $this->input->post('Sec2A3_disposal_control'),
                    'Sec2B1_equipment_name' => $this->input->post('Sec2B1_equipment_name'),
                    'Sec2B1_activity_type' => $this->input->post('Sec2B1_activity_type'),
                    'Sec2B1_activity_location' => $this->input->post('Sec2B1_activity_location'),
                    'Sec2B2_machinery_description' => $this->input->post('Sec2B2_machinery_description'),
                    'Sec2B2_checklist_crushing' => $this->input->post('Sec2B2_checklist_crushing'),
                    'Sec2B2_checklist_temperature' => $this->input->post('Sec2B2_checklist_temperature'),
                    'Sec2B2_checklist_shearing' => $this->input->post('Sec2B2_checklist_shearing'),
                    'Sec2B2_checklist_electrical' => $this->input->post('Sec2B2_checklist_electrical'),
                    'Sec2B2_checklist_drawing' => $this->input->post('Sec2B2_checklist_drawing'),
                    'Sec2B2_checklist_noise' => $this->input->post('Sec2B2_checklist_noise'),
                    'Sec2B2_checklist_cutting' => $this->input->post('Sec2B2_checklist_cutting'),
                    'Sec2B2_checklist_vibration' => $this->input->post('Sec2B2_checklist_vibration'),
                    'Sec2B2_checklist_entangle' => $this->input->post('Sec2B2_checklist_entangle'),
                    'Sec2B2_checklist_dust' => $this->input->post('Sec2B2_checklist_dust'),
                    'Sec2B2_checklist_impact' => $this->input->post('Sec2B2_checklist_impact'),
                    'Sec2B2_checklist_pressure' => $this->input->post('Sec2B2_checklist_pressure'),
                    'Sec2B2_checklist_abrasion' => $this->input->post('Sec2B2_checklist_abrasion'),
                    'Sec2B2_checklist_waste' => $this->input->post('Sec2B2_checklist_waste'),
                    'Sec2B2_checklist_stabbing' => $this->input->post('Sec2B2_checklist_stabbing'),
                    'Sec2B2_checklist_fumes' => $this->input->post('Sec2B2_checklist_fumes'),
                    'Sec2B2_checklist_puncture' => $this->input->post('Sec2B2_checklist_puncture'),
                    'Sec2B2_checklist_chemical' => $this->input->post('Sec2B2_checklist_chemical'),
                    'Sec2B2_checklist_ejection' => $this->input->post('Sec2B2_checklist_ejection'),
                    'Sec2B2_checklist_allergens' => $this->input->post('Sec2B2_checklist_allergens'),
                    'Sec2B2_exposure' => $this->input->post('Sec2B2_exposure'),
                    'Sec2B2_users' => $this->input->post('Sec2B2_users'),
                    'Sec2B2_control_measures' => $this->input->post('Sec2B2_control_measures'),
                    'Sec2B2_procedural_behavioural' => $this->input->post('Sec2B2_procedural_behavioural'),
                    'Sec2B2_overall_assessment_risk_level' => $this->input->post('Sec2B2_overall_assessment_risk_level'),
                    'Sec2B2_risk_reduction_action' => $this->input->post('Sec2B2_risk_reduction_action'),
                    'Sec2B2_risk_reduction_by_who' => $this->input->post('Sec2B2_risk_reduction_by_who'),
                    'Sec2B2_risk_reduction_by_when' => $this->input->post('Sec2B2_risk_reduction_by_when'),
                    'Sec2B2_risk_reduction_action_completed' => $this->input->post('Sec2B2_risk_reduction_action_completed'),
                    'Sec2B2_overall_assessment_risk_level_after' => $this->input->post('Sec2B2_overall_assessment_risk_level_after'),
                    'Sec3_requestor' => $this->input->post('Sec3_requestor'),
                    'Sec3_requestor_signature' => $this->input->post('Sec3_requestor_signature'),
                    'Sec3_requestor_date' => $this->input->post('Sec3_requestor_date'),
                    'Sec3_supervisor_HMU' => $this->input->post('Sec3_supervisor_HMU'),
                    'Sec3_supervisor_signature' => $this->input->post('Sec3_supervisor_signature'),
                    'Sec3_supervisor_date' => $this->input->post('Sec3_supervisor_date'),
                    'Sec3_LO' => $this->input->post('Sec3_LO'),
                    'Sec3_LO_signature' => $this->input->post('Sec3_LO_signature'),
                    'Sec3_LO_date' => $this->input->post('Sec3_LO_date'),
                    'status' => $submitStatus,
                    'editable' => $editableValue
                    
                );
                
                
                if($this->procurement_model->update_applicant_data($appID, $data) && $this->project_model->update_applicant_data($appID, $editableValue)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('procurementproj/index');
                     
                    
                }
            }
        }
        
        public function load_saved_project(){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['saveload'] = "true";
            
            $id = $this->input->get('id');
            
            $data['appID'] = $id;
            
            $data['retrieved'] = $this->procurement_model->get_form_by_project_id($id);
            
        
            $this->load->template('procurementproj_view', $data);
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
                
                $this->load->template('procurementproj_view', $data);
                
            }elseif(isset($save)){
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'Sec1_chemical' => $this->input->post('Sec1_chemical'),
                    'Sec1_biological_material' => $this->input->post('Sec1_biological_material'),
                    'Sec1_equipment' => $this->input->post('Sec1_equipment'),
                    'Sec1_doc_id' => $this->input->post('Sec1_doc_id'),
                    'Sec1_review_date' => $this->input->post('Sec1_review_date'),
                    'Sec2A_name' => $this->input->post('Sec2A_name'),
                    'Sec2A_statement' => $this->input->post('Sec2A_statement'),
                    'Sec2A_manufacturer' => $this->input->post('Sec2A_manufacturer'),
                    'Sec2A_waste' => $this->input->post('Sec2A_waste'),
                    'Sec2A_hazardous' => $this->input->post('Sec2A_hazardous'),
                    'Sec2A_waste_type_corrosive' => $this->input->post('Sec2A_waste_type_corrosive'),
                    'Sec2A_waste_type_ignitable' => $this->input->post('Sec2A_waste_type_ignitable'),
                    'Sec2A_waste_type_reactive' => $this->input->post('Sec2A_waste_type_reactive'),
                    'Sec2A_waste_type_toxic' => $this->input->post('Sec2A_waste_type_toxic'),
                    'Sec2A_waste_type_infectious' => $this->input->post('Sec2A_waste_type_infectious'),
                    'Sec2A2_permit' => $this->input->post('Sec2A2_permit'),
                    'Sec2A2_storage' => $this->input->post('Sec2A2_storage'),
                    'Sec2A2_permit_type' => $this->input->post('Sec2A2_permit_type'),
                    'Sec2A2_waste_requirement' => $this->input->post('Sec2A2_waste_requirement'),
                    'Sec2A2_MSDS' => $this->input->post('Sec2A2_MSDS'),
                    'Sec2A2_risk_control_training' => $this->input->post('Sec2A2_risk_control_training'),
                    'Sec2A2_risk_control_inspection' => $this->input->post('Sec2A2_risk_control_inspection'),
                    'Sec2A2_risk_control_SOP' => $this->input->post('Sec2A2_risk_control_SOP'),
                    'Sec2A2_risk_control_PPE' => $this->input->post('Sec2A2_risk_control_PPE'),
                    'Sec2A2_risk_control_engineering' => $this->input->post('Sec2A2_risk_control_engineering'),
                    'Sec2A2_exposure_inhalation' => $this->input->post('Sec2A2_exposure_inhalation'),
                    'Sec2A2_exposure_skin' => $this->input->post('Sec2A2_exposure_skin'),
                    'Sec2A2_exposure_ingestion' => $this->input->post('Sec2A2_exposure_ingestion'),
                    'Sec2A2_exposure_injection' => $this->input->post('Sec2A2_exposure_injection'),
                    'Sec2A2_exposure_others' => $this->input->post('Sec2A2_exposure_others'),
                    'Sec2A2_exposure_description' => $this->input->post('Sec2A2_exposure_description'),
                    'Sec2A2_emergency_first_aid_kit' => $this->input->post('Sec2A2_emergency_first_aid_kit'),
                    'Sec2A2_emergency_shower' => $this->input->post('Sec2A2_emergency_shower'),
                    'Sec2A2_emergency_eyewash' => $this->input->post('Sec2A2_emergency_eyewash'),
                    'Sec2A2_emergency_neutralizing' => $this->input->post('Sec2A2_emergency_neutralizing'),
                    'Sec2A2_emergency_spill' => $this->input->post('Sec2A2_emergency_spill'),
                    'Sec2A2_emergency_restrict' => $this->input->post('Sec2A2_emergency_restrict'),
                    'Sec2A3_storage_inhalation' => $this->input->post('Sec2A3_storage_inhalation'),
                    'Sec2A3_storage_skin' => $this->input->post('Sec2A3_storage_skin'),
                    'Sec2A3_storage_ingestion' => $this->input->post('Sec2A3_storage_ingestion'),
                    'Sec2A3_storage_injection' => $this->input->post('Sec2A3_storage_injection'),
                    'Sec2A3_storage_others' => $this->input->post('Sec2A3_storage_others'),
                    'Sec2A3_other_storage_description' => $this->input->post('Sec2A3_other_storage_description'),
                    'Sec2A3_storage_control' => $this->input->post('Sec2A3_storage_control'),
                    'Sec2A3_handling_inhalation' => $this->input->post('Sec2A3_handling_inhalation'),
                    'Sec2A3_handling_skin' => $this->input->post('Sec2A3_handling_skin'),
                    'Sec2A3_handling_ingestion' => $this->input->post('Sec2A3_handling_ingestion'),
                    'Sec2A3_handling_injection' => $this->input->post('Sec2A3_handling_injection'),
                    'Sec2A3_handling_others' => $this->input->post('Sec2A3_handling_others'),
                    'Sec2A3_handling_description' => $this->input->post('Sec2A3_handling_description'),
                    'Sec2A3_handling_control' => $this->input->post('Sec2A3_handling_control'),
                    'Sec2A3_spill_inhalation' => $this->input->post('Sec2A3_spill_inhalation'),
                    'Sec2A3_spill_skin' => $this->input->post('Sec2A3_spill_skin'),
                    'Sec2A3_spill_ingestion' => $this->input->post('Sec2A3_spill_ingestion'),
                    'Sec2A3_spill_injection' => $this->input->post('Sec2A3_spill_injection'),
                    'Sec2A3_spill_others' => $this->input->post('Sec2A3_spill_others'),
                    'Sec2A3_spill_description' => $this->input->post('Sec2A3_spill_description'),
                    'Sec2A3_spill_control' => $this->input->post('Sec2A3_spill_control'),
                    'Sec2A3_disposal_inhalation' => $this->input->post('Sec2A3_disposal_inhalation'),
                    'Sec2A3_disposal_skin' => $this->input->post('Sec2A3_disposal_skin'),
                    'Sec2A3_disposal_ingestion' => $this->input->post('Sec2A3_disposal_ingestion'),
                    'Sec2A3_disposal_injection' => $this->input->post('Sec2A3_disposal_injection'),
                    'Sec2A3_disposal_others' => $this->input->post('Sec2A3_disposal_others'),
                    'Sec2A3_disposal_description' => $this->input->post('Sec2A3_disposal_description'),
                    'Sec2A3_disposal_control' => $this->input->post('Sec2A3_disposal_control'),
                    'Sec2B1_equipment_name' => $this->input->post('Sec2B1_equipment_name'),
                    'Sec2B1_activity_type' => $this->input->post('Sec2B1_activity_type'),
                    'Sec2B1_activity_location' => $this->input->post('Sec2B1_activity_location'),
                    'Sec2B2_machinery_description' => $this->input->post('Sec2B2_machinery_description'),
                    'Sec2B2_checklist_crushing' => $this->input->post('Sec2B2_checklist_crushing'),
                    'Sec2B2_checklist_temperature' => $this->input->post('Sec2B2_checklist_temperature'),
                    'Sec2B2_checklist_shearing' => $this->input->post('Sec2B2_checklist_shearing'),
                    'Sec2B2_checklist_electrical' => $this->input->post('Sec2B2_checklist_electrical'),
                    'Sec2B2_checklist_drawing' => $this->input->post('Sec2B2_checklist_drawing'),
                    'Sec2B2_checklist_noise' => $this->input->post('Sec2B2_checklist_noise'),
                    'Sec2B2_checklist_cutting' => $this->input->post('Sec2B2_checklist_cutting'),
                    'Sec2B2_checklist_vibration' => $this->input->post('Sec2B2_checklist_vibration'),
                    'Sec2B2_checklist_entangle' => $this->input->post('Sec2B2_checklist_entangle'),
                    'Sec2B2_checklist_dust' => $this->input->post('Sec2B2_checklist_dust'),
                    'Sec2B2_checklist_impact' => $this->input->post('Sec2B2_checklist_impact'),
                    'Sec2B2_checklist_pressure' => $this->input->post('Sec2B2_checklist_pressure'),
                    'Sec2B2_checklist_abrasion' => $this->input->post('Sec2B2_checklist_abrasion'),
                    'Sec2B2_checklist_waste' => $this->input->post('Sec2B2_checklist_waste'),
                    'Sec2B2_checklist_stabbing' => $this->input->post('Sec2B2_checklist_stabbing'),
                    'Sec2B2_checklist_fumes' => $this->input->post('Sec2B2_checklist_fumes'),
                    'Sec2B2_checklist_puncture' => $this->input->post('Sec2B2_checklist_puncture'),
                    'Sec2B2_checklist_chemical' => $this->input->post('Sec2B2_checklist_chemical'),
                    'Sec2B2_checklist_ejection' => $this->input->post('Sec2B2_checklist_ejection'),
                    'Sec2B2_checklist_allergens' => $this->input->post('Sec2B2_checklist_allergens'),
                    'Sec2B2_exposure' => $this->input->post('Sec2B2_exposure'),
                    'Sec2B2_users' => $this->input->post('Sec2B2_users'),
                    'Sec2B2_control_measures' => $this->input->post('Sec2B2_control_measures'),
                    'Sec2B2_procedural_behavioural' => $this->input->post('Sec2B2_procedural_behavioural'),
                    'Sec2B2_overall_assessment_risk_level' => $this->input->post('Sec2B2_overall_assessment_risk_level'),
                    'Sec2B2_risk_reduction_action' => $this->input->post('Sec2B2_risk_reduction_action'),
                    'Sec2B2_risk_reduction_by_who' => $this->input->post('Sec2B2_risk_reduction_by_who'),
                    'Sec2B2_risk_reduction_by_when' => $this->input->post('Sec2B2_risk_reduction_by_when'),
                    'Sec2B2_risk_reduction_action_completed' => $this->input->post('Sec2B2_risk_reduction_action_completed'),
                    'Sec2B2_overall_assessment_risk_level_after' => $this->input->post('Sec2B2_overall_assessment_risk_level_after'),
                    'Sec3_requestor' => $this->input->post('Sec3_requestor'),
                    'Sec3_requestor_signature' => $this->input->post('Sec3_requestor_signature'),
                    'Sec3_requestor_date' => $this->input->post('Sec3_requestor_date'),
                    'Sec3_supervisor_HMU' => $this->input->post('Sec3_supervisor_HMU'),
                    'Sec3_supervisor_signature' => $this->input->post('Sec3_supervisor_signature'),
                    'Sec3_supervisor_date' => $this->input->post('Sec3_supervisor_date'),
                    'Sec3_LO' => $this->input->post('Sec3_LO'),
                    'Sec3_LO_signature' => $this->input->post('Sec3_LO_signature'),
                    'Sec3_LO_date' => $this->input->post('Sec3_LO_date'),
                    'status' => $saveStatus
                    
                );
                
                
                if($this->procurement_model->update_saved_data($proj_id, $data) && $this->project_model->update_proj_status($proj_id, $projectSave)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('saveHistory/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('saveHistory/index');
                    
                    
                    
                }
                
            }elseif(isset($submit)){
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'Sec1_chemical' => $this->input->post('Sec1_chemical'),
                    'Sec1_biological_material' => $this->input->post('Sec1_biological_material'),
                    'Sec1_equipment' => $this->input->post('Sec1_equipment'),
                    'Sec1_doc_id' => $this->input->post('Sec1_doc_id'),
                    'Sec1_review_date' => $this->input->post('Sec1_review_date'),
                    'Sec2A_name' => $this->input->post('Sec2A_name'),
                    'Sec2A_statement' => $this->input->post('Sec2A_statement'),
                    'Sec2A_manufacturer' => $this->input->post('Sec2A_manufacturer'),
                    'Sec2A_waste' => $this->input->post('Sec2A_waste'),
                    'Sec2A_hazardous' => $this->input->post('Sec2A_hazardous'),
                    'Sec2A_waste_type_corrosive' => $this->input->post('Sec2A_waste_type_corrosive'),
                    'Sec2A_waste_type_ignitable' => $this->input->post('Sec2A_waste_type_ignitable'),
                    'Sec2A_waste_type_reactive' => $this->input->post('Sec2A_waste_type_reactive'),
                    'Sec2A_waste_type_toxic' => $this->input->post('Sec2A_waste_type_toxic'),
                    'Sec2A_waste_type_infectious' => $this->input->post('Sec2A_waste_type_infectious'),
                    'Sec2A2_permit' => $this->input->post('Sec2A2_permit'),
                    'Sec2A2_storage' => $this->input->post('Sec2A2_storage'),
                    'Sec2A2_permit_type' => $this->input->post('Sec2A2_permit_type'),
                    'Sec2A2_waste_requirement' => $this->input->post('Sec2A2_waste_requirement'),
                    'Sec2A2_MSDS' => $this->input->post('Sec2A2_MSDS'),
                    'Sec2A2_risk_control_training' => $this->input->post('Sec2A2_risk_control_training'),
                    'Sec2A2_risk_control_inspection' => $this->input->post('Sec2A2_risk_control_inspection'),
                    'Sec2A2_risk_control_SOP' => $this->input->post('Sec2A2_risk_control_SOP'),
                    'Sec2A2_risk_control_PPE' => $this->input->post('Sec2A2_risk_control_PPE'),
                    'Sec2A2_risk_control_engineering' => $this->input->post('Sec2A2_risk_control_engineering'),
                    'Sec2A2_exposure_inhalation' => $this->input->post('Sec2A2_exposure_inhalation'),
                    'Sec2A2_exposure_skin' => $this->input->post('Sec2A2_exposure_skin'),
                    'Sec2A2_exposure_ingestion' => $this->input->post('Sec2A2_exposure_ingestion'),
                    'Sec2A2_exposure_injection' => $this->input->post('Sec2A2_exposure_injection'),
                    'Sec2A2_exposure_others' => $this->input->post('Sec2A2_exposure_others'),
                    'Sec2A2_exposure_description' => $this->input->post('Sec2A2_exposure_description'),
                    'Sec2A2_emergency_first_aid_kit' => $this->input->post('Sec2A2_emergency_first_aid_kit'),
                    'Sec2A2_emergency_shower' => $this->input->post('Sec2A2_emergency_shower'),
                    'Sec2A2_emergency_eyewash' => $this->input->post('Sec2A2_emergency_eyewash'),
                    'Sec2A2_emergency_neutralizing' => $this->input->post('Sec2A2_emergency_neutralizing'),
                    'Sec2A2_emergency_spill' => $this->input->post('Sec2A2_emergency_spill'),
                    'Sec2A2_emergency_restrict' => $this->input->post('Sec2A2_emergency_restrict'),
                    'Sec2A3_storage_inhalation' => $this->input->post('Sec2A3_storage_inhalation'),
                    'Sec2A3_storage_skin' => $this->input->post('Sec2A3_storage_skin'),
                    'Sec2A3_storage_ingestion' => $this->input->post('Sec2A3_storage_ingestion'),
                    'Sec2A3_storage_injection' => $this->input->post('Sec2A3_storage_injection'),
                    'Sec2A3_storage_others' => $this->input->post('Sec2A3_storage_others'),
                    'Sec2A3_other_storage_description' => $this->input->post('Sec2A3_other_storage_description'),
                    'Sec2A3_storage_control' => $this->input->post('Sec2A3_storage_control'),
                    'Sec2A3_handling_inhalation' => $this->input->post('Sec2A3_handling_inhalation'),
                    'Sec2A3_handling_skin' => $this->input->post('Sec2A3_handling_skin'),
                    'Sec2A3_handling_ingestion' => $this->input->post('Sec2A3_handling_ingestion'),
                    'Sec2A3_handling_injection' => $this->input->post('Sec2A3_handling_injection'),
                    'Sec2A3_handling_others' => $this->input->post('Sec2A3_handling_others'),
                    'Sec2A3_handling_description' => $this->input->post('Sec2A3_handling_description'),
                    'Sec2A3_handling_control' => $this->input->post('Sec2A3_handling_control'),
                    'Sec2A3_spill_inhalation' => $this->input->post('Sec2A3_spill_inhalation'),
                    'Sec2A3_spill_skin' => $this->input->post('Sec2A3_spill_skin'),
                    'Sec2A3_spill_ingestion' => $this->input->post('Sec2A3_spill_ingestion'),
                    'Sec2A3_spill_injection' => $this->input->post('Sec2A3_spill_injection'),
                    'Sec2A3_spill_others' => $this->input->post('Sec2A3_spill_others'),
                    'Sec2A3_spill_description' => $this->input->post('Sec2A3_spill_description'),
                    'Sec2A3_spill_control' => $this->input->post('Sec2A3_spill_control'),
                    'Sec2A3_disposal_inhalation' => $this->input->post('Sec2A3_disposal_inhalation'),
                    'Sec2A3_disposal_skin' => $this->input->post('Sec2A3_disposal_skin'),
                    'Sec2A3_disposal_ingestion' => $this->input->post('Sec2A3_disposal_ingestion'),
                    'Sec2A3_disposal_injection' => $this->input->post('Sec2A3_disposal_injection'),
                    'Sec2A3_disposal_others' => $this->input->post('Sec2A3_disposal_others'),
                    'Sec2A3_disposal_description' => $this->input->post('Sec2A3_disposal_description'),
                    'Sec2A3_disposal_control' => $this->input->post('Sec2A3_disposal_control'),
                    'Sec2B1_equipment_name' => $this->input->post('Sec2B1_equipment_name'),
                    'Sec2B1_activity_type' => $this->input->post('Sec2B1_activity_type'),
                    'Sec2B1_activity_location' => $this->input->post('Sec2B1_activity_location'),
                    'Sec2B2_machinery_description' => $this->input->post('Sec2B2_machinery_description'),
                    'Sec2B2_checklist_crushing' => $this->input->post('Sec2B2_checklist_crushing'),
                    'Sec2B2_checklist_temperature' => $this->input->post('Sec2B2_checklist_temperature'),
                    'Sec2B2_checklist_shearing' => $this->input->post('Sec2B2_checklist_shearing'),
                    'Sec2B2_checklist_electrical' => $this->input->post('Sec2B2_checklist_electrical'),
                    'Sec2B2_checklist_drawing' => $this->input->post('Sec2B2_checklist_drawing'),
                    'Sec2B2_checklist_noise' => $this->input->post('Sec2B2_checklist_noise'),
                    'Sec2B2_checklist_cutting' => $this->input->post('Sec2B2_checklist_cutting'),
                    'Sec2B2_checklist_vibration' => $this->input->post('Sec2B2_checklist_vibration'),
                    'Sec2B2_checklist_entangle' => $this->input->post('Sec2B2_checklist_entangle'),
                    'Sec2B2_checklist_dust' => $this->input->post('Sec2B2_checklist_dust'),
                    'Sec2B2_checklist_impact' => $this->input->post('Sec2B2_checklist_impact'),
                    'Sec2B2_checklist_pressure' => $this->input->post('Sec2B2_checklist_pressure'),
                    'Sec2B2_checklist_abrasion' => $this->input->post('Sec2B2_checklist_abrasion'),
                    'Sec2B2_checklist_waste' => $this->input->post('Sec2B2_checklist_waste'),
                    'Sec2B2_checklist_stabbing' => $this->input->post('Sec2B2_checklist_stabbing'),
                    'Sec2B2_checklist_fumes' => $this->input->post('Sec2B2_checklist_fumes'),
                    'Sec2B2_checklist_puncture' => $this->input->post('Sec2B2_checklist_puncture'),
                    'Sec2B2_checklist_chemical' => $this->input->post('Sec2B2_checklist_chemical'),
                    'Sec2B2_checklist_ejection' => $this->input->post('Sec2B2_checklist_ejection'),
                    'Sec2B2_checklist_allergens' => $this->input->post('Sec2B2_checklist_allergens'),
                    'Sec2B2_exposure' => $this->input->post('Sec2B2_exposure'),
                    'Sec2B2_users' => $this->input->post('Sec2B2_users'),
                    'Sec2B2_control_measures' => $this->input->post('Sec2B2_control_measures'),
                    'Sec2B2_procedural_behavioural' => $this->input->post('Sec2B2_procedural_behavioural'),
                    'Sec2B2_overall_assessment_risk_level' => $this->input->post('Sec2B2_overall_assessment_risk_level'),
                    'Sec2B2_risk_reduction_action' => $this->input->post('Sec2B2_risk_reduction_action'),
                    'Sec2B2_risk_reduction_by_who' => $this->input->post('Sec2B2_risk_reduction_by_who'),
                    'Sec2B2_risk_reduction_by_when' => $this->input->post('Sec2B2_risk_reduction_by_when'),
                    'Sec2B2_risk_reduction_action_completed' => $this->input->post('Sec2B2_risk_reduction_action_completed'),
                    'Sec2B2_overall_assessment_risk_level_after' => $this->input->post('Sec2B2_overall_assessment_risk_level_after'),
                    'Sec3_requestor' => $this->input->post('Sec3_requestor'),
                    'Sec3_requestor_signature' => $this->input->post('Sec3_requestor_signature'),
                    'Sec3_requestor_date' => $this->input->post('Sec3_requestor_date'),
                    'Sec3_supervisor_HMU' => $this->input->post('Sec3_supervisor_HMU'),
                    'Sec3_supervisor_signature' => $this->input->post('Sec3_supervisor_signature'),
                    'Sec3_supervisor_date' => $this->input->post('Sec3_supervisor_date'),
                    'Sec3_LO' => $this->input->post('Sec3_LO'),
                    'Sec3_LO_signature' => $this->input->post('Sec3_LO_signature'),
                    'Sec3_LO_date' => $this->input->post('Sec3_LO_date'),
                    'status' => $submitStatus
                    
                );
                
                
                if($this->procurement_model->update_saved_data($proj_id, $data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('saveHistory/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('saveHistory/index');
                    
                    
                }
                
            }
        }
        
    }
?>
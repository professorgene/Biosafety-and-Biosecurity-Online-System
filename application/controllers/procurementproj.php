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
                    'Sec1_chemical' => $this->input->post('Sec1_chemical', TRUE),
                    'Sec1_biological_material' => $this->input->post('Sec1_biological_material', TRUE),
                    'Sec1_equipment' => $this->input->post('Sec1_equipment', TRUE),
                    'Sec1_doc_id' => $this->input->post('Sec1_doc_id', TRUE),
                    'Sec1_review_date' => $this->input->post('Sec1_review_date', TRUE),
                    'Sec2A_name' => $this->input->post('Sec2A_name', TRUE),
                    'Sec2A_statement' => $this->input->post('Sec2A_statement', TRUE),
                    'Sec2A_manufacturer' => $this->input->post('Sec2A_manufacturer', TRUE),
                    'Sec2A_waste' => $this->input->post('Sec2A_waste', TRUE),
                    'Sec2A_hazardous' => $this->input->post('Sec2A_hazardous', TRUE),
                    'Sec2A_waste_type_corrosive' => $this->input->post('Sec2A_waste_type_corrosive', TRUE),
                    'Sec2A_waste_type_ignitable' => $this->input->post('Sec2A_waste_type_ignitable', TRUE),
                    'Sec2A_waste_type_reactive' => $this->input->post('Sec2A_waste_type_reactive', TRUE),
                    'Sec2A_waste_type_toxic' => $this->input->post('Sec2A_waste_type_toxic', TRUE),
                    'Sec2A_waste_type_infectious' => $this->input->post('Sec2A_waste_type_infectious', TRUE),
                    'Sec2A2_permit' => $this->input->post('Sec2A2_permit', TRUE),
                    'Sec2A2_storage' => $this->input->post('Sec2A2_storage', TRUE),
                    'Sec2A2_permit_type' => $this->input->post('Sec2A2_permit_type', TRUE),
                    'Sec2A2_waste_requirement' => $this->input->post('Sec2A2_waste_requirement', TRUE),
                    'Sec2A2_MSDS' => $this->input->post('Sec2A2_MSDS', TRUE),
                    'Sec2A2_risk_control_training' => $this->input->post('Sec2A2_risk_control_training', TRUE),
                    'Sec2A2_risk_control_inspection' => $this->input->post('Sec2A2_risk_control_inspection', TRUE),
                    'Sec2A2_risk_control_SOP' => $this->input->post('Sec2A2_risk_control_SOP', TRUE),
                    'Sec2A2_risk_control_PPE' => $this->input->post('Sec2A2_risk_control_PPE', TRUE),
                    'Sec2A2_risk_control_engineering' => $this->input->post('Sec2A2_risk_control_engineering', TRUE),
                    'Sec2A2_exposure_inhalation' => $this->input->post('Sec2A2_exposure_inhalation', TRUE),
                    'Sec2A2_exposure_skin' => $this->input->post('Sec2A2_exposure_skin', TRUE),
                    'Sec2A2_exposure_ingestion' => $this->input->post('Sec2A2_exposure_ingestion', TRUE),
                    'Sec2A2_exposure_injection' => $this->input->post('Sec2A2_exposure_injection', TRUE),
                    'Sec2A2_exposure_others' => $this->input->post('Sec2A2_exposure_others', TRUE),
                    'Sec2A2_exposure_description' => $this->input->post('Sec2A2_exposure_description', TRUE),
                    'Sec2A2_emergency_first_aid_kit' => $this->input->post('Sec2A2_emergency_first_aid_kit', TRUE),
                    'Sec2A2_emergency_shower' => $this->input->post('Sec2A2_emergency_shower', TRUE),
                    'Sec2A2_emergency_eyewash' => $this->input->post('Sec2A2_emergency_eyewash', TRUE),
                    'Sec2A2_emergency_neutralizing' => $this->input->post('Sec2A2_emergency_neutralizing', TRUE),
                    'Sec2A2_emergency_spill' => $this->input->post('Sec2A2_emergency_spill', TRUE),
                    'Sec2A2_emergency_restrict' => $this->input->post('Sec2A2_emergency_restrict', TRUE),
                    'Sec2A3_storage_inhalation' => $this->input->post('Sec2A3_storage_inhalation', TRUE),
                    'Sec2A3_storage_skin' => $this->input->post('Sec2A3_storage_skin', TRUE),
                    'Sec2A3_storage_ingestion' => $this->input->post('Sec2A3_storage_ingestion', TRUE),
                    'Sec2A3_storage_injection' => $this->input->post('Sec2A3_storage_injection', TRUE),
                    'Sec2A3_storage_others' => $this->input->post('Sec2A3_storage_others', TRUE),
                    'Sec2A3_other_storage_description' => $this->input->post('Sec2A3_other_storage_description', TRUE),
                    'Sec2A3_storage_control' => $this->input->post('Sec2A3_storage_control', TRUE),
                    'Sec2A3_handling_inhalation' => $this->input->post('Sec2A3_handling_inhalation', TRUE),
                    'Sec2A3_handling_skin' => $this->input->post('Sec2A3_handling_skin', TRUE),
                    'Sec2A3_handling_ingestion' => $this->input->post('Sec2A3_handling_ingestion', TRUE),
                    'Sec2A3_handling_injection' => $this->input->post('Sec2A3_handling_injection', TRUE),
                    'Sec2A3_handling_others' => $this->input->post('Sec2A3_handling_others', TRUE),
                    'Sec2A3_handling_description' => $this->input->post('Sec2A3_handling_description', TRUE),
                    'Sec2A3_handling_control' => $this->input->post('Sec2A3_handling_control', TRUE),
                    'Sec2A3_spill_inhalation' => $this->input->post('Sec2A3_spill_inhalation', TRUE),
                    'Sec2A3_spill_skin' => $this->input->post('Sec2A3_spill_skin', TRUE),
                    'Sec2A3_spill_ingestion' => $this->input->post('Sec2A3_spill_ingestion', TRUE),
                    'Sec2A3_spill_injection' => $this->input->post('Sec2A3_spill_injection', TRUE),
                    'Sec2A3_spill_others' => $this->input->post('Sec2A3_spill_others', TRUE),
                    'Sec2A3_spill_description' => $this->input->post('Sec2A3_spill_description', TRUE),
                    'Sec2A3_spill_control' => $this->input->post('Sec2A3_spill_control', TRUE),
                    'Sec2A3_disposal_inhalation' => $this->input->post('Sec2A3_disposal_inhalation', TRUE),
                    'Sec2A3_disposal_skin' => $this->input->post('Sec2A3_disposal_skin', TRUE),
                    'Sec2A3_disposal_ingestion' => $this->input->post('Sec2A3_disposal_ingestion', TRUE),
                    'Sec2A3_disposal_injection' => $this->input->post('Sec2A3_disposal_injection', TRUE),
                    'Sec2A3_disposal_others' => $this->input->post('Sec2A3_disposal_others', TRUE),
                    'Sec2A3_disposal_description' => $this->input->post('Sec2A3_disposal_description', TRUE),
                    'Sec2A3_disposal_control' => $this->input->post('Sec2A3_disposal_control', TRUE),
                    'Sec2B1_equipment_name' => $this->input->post('Sec2B1_equipment_name', TRUE),
                    'Sec2B1_activity_type' => $this->input->post('Sec2B1_activity_type', TRUE),
                    'Sec2B1_activity_location' => $this->input->post('Sec2B1_activity_location', TRUE),
                    'Sec2B2_machinery_description' => $this->input->post('Sec2B2_machinery_description', TRUE),
                    'Sec2B2_checklist_crushing' => $this->input->post('Sec2B2_checklist_crushing', TRUE),
                    'Sec2B2_checklist_temperature' => $this->input->post('Sec2B2_checklist_temperature', TRUE),
                    'Sec2B2_checklist_shearing' => $this->input->post('Sec2B2_checklist_shearing', TRUE),
                    'Sec2B2_checklist_electrical' => $this->input->post('Sec2B2_checklist_electrical', TRUE),
                    'Sec2B2_checklist_drawing' => $this->input->post('Sec2B2_checklist_drawing', TRUE),
                    'Sec2B2_checklist_noise' => $this->input->post('Sec2B2_checklist_noise', TRUE),
                    'Sec2B2_checklist_cutting' => $this->input->post('Sec2B2_checklist_cutting', TRUE),
                    'Sec2B2_checklist_vibration' => $this->input->post('Sec2B2_checklist_vibration', TRUE),
                    'Sec2B2_checklist_entangle' => $this->input->post('Sec2B2_checklist_entangle', TRUE),
                    'Sec2B2_checklist_dust' => $this->input->post('Sec2B2_checklist_dust', TRUE),
                    'Sec2B2_checklist_impact' => $this->input->post('Sec2B2_checklist_impact', TRUE),
                    'Sec2B2_checklist_pressure' => $this->input->post('Sec2B2_checklist_pressure', TRUE),
                    'Sec2B2_checklist_abrasion' => $this->input->post('Sec2B2_checklist_abrasion', TRUE),
                    'Sec2B2_checklist_waste' => $this->input->post('Sec2B2_checklist_waste', TRUE),
                    'Sec2B2_checklist_stabbing' => $this->input->post('Sec2B2_checklist_stabbing', TRUE),
                    'Sec2B2_checklist_fumes' => $this->input->post('Sec2B2_checklist_fumes', TRUE),
                    'Sec2B2_checklist_puncture' => $this->input->post('Sec2B2_checklist_puncture', TRUE),
                    'Sec2B2_checklist_chemical' => $this->input->post('Sec2B2_checklist_chemical', TRUE),
                    'Sec2B2_checklist_ejection' => $this->input->post('Sec2B2_checklist_ejection', TRUE),
                    'Sec2B2_checklist_allergens' => $this->input->post('Sec2B2_checklist_allergens', TRUE),
                    'Sec2B2_exposure' => $this->input->post('Sec2B2_exposure', TRUE),
                    'Sec2B2_users' => $this->input->post('Sec2B2_users', TRUE),
                    'Sec2B2_control_measures' => $this->input->post('Sec2B2_control_measures', TRUE),
                    'Sec2B2_procedural_behavioural' => $this->input->post('Sec2B2_procedural_behavioural', TRUE),
                    'Sec2B2_overall_assessment_risk_level' => $this->input->post('Sec2B2_overall_assessment_risk_level', TRUE),
                    'Sec2B2_risk_reduction_action' => $this->input->post('Sec2B2_risk_reduction_action', TRUE),
                    'Sec2B2_risk_reduction_by_who' => $this->input->post('Sec2B2_risk_reduction_by_who', TRUE),
                    'Sec2B2_risk_reduction_by_when' => $this->input->post('Sec2B2_risk_reduction_by_when', TRUE),
                    'Sec2B2_risk_reduction_action_completed' => $this->input->post('Sec2B2_risk_reduction_action_completed', TRUE),
                    'Sec2B2_overall_assessment_risk_level_after' => $this->input->post('Sec2B2_overall_assessment_risk_level_after', TRUE),
                    'Sec3_requestor' => $this->input->post('Sec3_requestor', TRUE),
                    'Sec3_requestor_signature' => $this->input->post('Sec3_requestor_signature', TRUE),
                    'Sec3_requestor_date' => $this->input->post('Sec3_requestor_date', TRUE),
                    'Sec3_supervisor_HMU' => $this->input->post('Sec3_supervisor_HMU', TRUE),
                    'Sec3_supervisor_signature' => $this->input->post('Sec3_supervisor_signature', TRUE),
                    'Sec3_supervisor_date' => $this->input->post('Sec3_supervisor_date', TRUE),
                    'Sec3_LO' => $this->input->post('Sec3_LO', TRUE),
                    'Sec3_LO_signature' => $this->input->post('Sec3_LO_signature', TRUE),
                    'Sec3_LO_date' => $this->input->post('Sec3_LO_date', TRUE),
                    'status' => $saveStatus
                    
                );
                
                
                if($this->procurement_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSave)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully Saved!</div>', $data);
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
                    'Sec1_chemical' => $this->input->post('Sec1_chemical', TRUE),
                    'Sec1_biological_material' => $this->input->post('Sec1_biological_material', TRUE),
                    'Sec1_equipment' => $this->input->post('Sec1_equipment', TRUE),
                    'Sec1_doc_id' => $this->input->post('Sec1_doc_id', TRUE),
                    'Sec1_review_date' => $this->input->post('Sec1_review_date', TRUE),
                    'Sec2A_name' => $this->input->post('Sec2A_name', TRUE),
                    'Sec2A_statement' => $this->input->post('Sec2A_statement', TRUE),
                    'Sec2A_manufacturer' => $this->input->post('Sec2A_manufacturer', TRUE),
                    'Sec2A_waste' => $this->input->post('Sec2A_waste', TRUE),
                    'Sec2A_hazardous' => $this->input->post('Sec2A_hazardous', TRUE),
                    'Sec2A_waste_type_corrosive' => $this->input->post('Sec2A_waste_type_corrosive', TRUE),
                    'Sec2A_waste_type_ignitable' => $this->input->post('Sec2A_waste_type_ignitable', TRUE),
                    'Sec2A_waste_type_reactive' => $this->input->post('Sec2A_waste_type_reactive', TRUE),
                    'Sec2A_waste_type_toxic' => $this->input->post('Sec2A_waste_type_toxic', TRUE),
                    'Sec2A_waste_type_infectious' => $this->input->post('Sec2A_waste_type_infectious', TRUE),
                    'Sec2A2_permit' => $this->input->post('Sec2A2_permit', TRUE),
                    'Sec2A2_storage' => $this->input->post('Sec2A2_storage', TRUE),
                    'Sec2A2_permit_type' => $this->input->post('Sec2A2_permit_type', TRUE),
                    'Sec2A2_waste_requirement' => $this->input->post('Sec2A2_waste_requirement', TRUE),
                    'Sec2A2_MSDS' => $this->input->post('Sec2A2_MSDS', TRUE),
                    'Sec2A2_risk_control_training' => $this->input->post('Sec2A2_risk_control_training', TRUE),
                    'Sec2A2_risk_control_inspection' => $this->input->post('Sec2A2_risk_control_inspection', TRUE),
                    'Sec2A2_risk_control_SOP' => $this->input->post('Sec2A2_risk_control_SOP', TRUE),
                    'Sec2A2_risk_control_PPE' => $this->input->post('Sec2A2_risk_control_PPE', TRUE),
                    'Sec2A2_risk_control_engineering' => $this->input->post('Sec2A2_risk_control_engineering', TRUE),
                    'Sec2A2_exposure_inhalation' => $this->input->post('Sec2A2_exposure_inhalation', TRUE),
                    'Sec2A2_exposure_skin' => $this->input->post('Sec2A2_exposure_skin', TRUE),
                    'Sec2A2_exposure_ingestion' => $this->input->post('Sec2A2_exposure_ingestion', TRUE),
                    'Sec2A2_exposure_injection' => $this->input->post('Sec2A2_exposure_injection', TRUE),
                    'Sec2A2_exposure_others' => $this->input->post('Sec2A2_exposure_others', TRUE),
                    'Sec2A2_exposure_description' => $this->input->post('Sec2A2_exposure_description', TRUE),
                    'Sec2A2_emergency_first_aid_kit' => $this->input->post('Sec2A2_emergency_first_aid_kit', TRUE),
                    'Sec2A2_emergency_shower' => $this->input->post('Sec2A2_emergency_shower', TRUE),
                    'Sec2A2_emergency_eyewash' => $this->input->post('Sec2A2_emergency_eyewash', TRUE),
                    'Sec2A2_emergency_neutralizing' => $this->input->post('Sec2A2_emergency_neutralizing', TRUE),
                    'Sec2A2_emergency_spill' => $this->input->post('Sec2A2_emergency_spill', TRUE),
                    'Sec2A2_emergency_restrict' => $this->input->post('Sec2A2_emergency_restrict', TRUE),
                    'Sec2A3_storage_inhalation' => $this->input->post('Sec2A3_storage_inhalation', TRUE),
                    'Sec2A3_storage_skin' => $this->input->post('Sec2A3_storage_skin', TRUE),
                    'Sec2A3_storage_ingestion' => $this->input->post('Sec2A3_storage_ingestion', TRUE),
                    'Sec2A3_storage_injection' => $this->input->post('Sec2A3_storage_injection', TRUE),
                    'Sec2A3_storage_others' => $this->input->post('Sec2A3_storage_others', TRUE),
                    'Sec2A3_other_storage_description' => $this->input->post('Sec2A3_other_storage_description', TRUE),
                    'Sec2A3_storage_control' => $this->input->post('Sec2A3_storage_control', TRUE),
                    'Sec2A3_handling_inhalation' => $this->input->post('Sec2A3_handling_inhalation', TRUE),
                    'Sec2A3_handling_skin' => $this->input->post('Sec2A3_handling_skin', TRUE),
                    'Sec2A3_handling_ingestion' => $this->input->post('Sec2A3_handling_ingestion', TRUE),
                    'Sec2A3_handling_injection' => $this->input->post('Sec2A3_handling_injection', TRUE),
                    'Sec2A3_handling_others' => $this->input->post('Sec2A3_handling_others', TRUE),
                    'Sec2A3_handling_description' => $this->input->post('Sec2A3_handling_description', TRUE),
                    'Sec2A3_handling_control' => $this->input->post('Sec2A3_handling_control', TRUE),
                    'Sec2A3_spill_inhalation' => $this->input->post('Sec2A3_spill_inhalation', TRUE),
                    'Sec2A3_spill_skin' => $this->input->post('Sec2A3_spill_skin', TRUE),
                    'Sec2A3_spill_ingestion' => $this->input->post('Sec2A3_spill_ingestion', TRUE),
                    'Sec2A3_spill_injection' => $this->input->post('Sec2A3_spill_injection', TRUE),
                    'Sec2A3_spill_others' => $this->input->post('Sec2A3_spill_others', TRUE),
                    'Sec2A3_spill_description' => $this->input->post('Sec2A3_spill_description', TRUE),
                    'Sec2A3_spill_control' => $this->input->post('Sec2A3_spill_control', TRUE),
                    'Sec2A3_disposal_inhalation' => $this->input->post('Sec2A3_disposal_inhalation', TRUE),
                    'Sec2A3_disposal_skin' => $this->input->post('Sec2A3_disposal_skin', TRUE),
                    'Sec2A3_disposal_ingestion' => $this->input->post('Sec2A3_disposal_ingestion', TRUE),
                    'Sec2A3_disposal_injection' => $this->input->post('Sec2A3_disposal_injection', TRUE),
                    'Sec2A3_disposal_others' => $this->input->post('Sec2A3_disposal_others', TRUE),
                    'Sec2A3_disposal_description' => $this->input->post('Sec2A3_disposal_description', TRUE),
                    'Sec2A3_disposal_control' => $this->input->post('Sec2A3_disposal_control', TRUE),
                    'Sec2B1_equipment_name' => $this->input->post('Sec2B1_equipment_name', TRUE),
                    'Sec2B1_activity_type' => $this->input->post('Sec2B1_activity_type', TRUE),
                    'Sec2B1_activity_location' => $this->input->post('Sec2B1_activity_location', TRUE),
                    'Sec2B2_machinery_description' => $this->input->post('Sec2B2_machinery_description', TRUE),
                    'Sec2B2_checklist_crushing' => $this->input->post('Sec2B2_checklist_crushing', TRUE),
                    'Sec2B2_checklist_temperature' => $this->input->post('Sec2B2_checklist_temperature', TRUE),
                    'Sec2B2_checklist_shearing' => $this->input->post('Sec2B2_checklist_shearing', TRUE),
                    'Sec2B2_checklist_electrical' => $this->input->post('Sec2B2_checklist_electrical', TRUE),
                    'Sec2B2_checklist_drawing' => $this->input->post('Sec2B2_checklist_drawing', TRUE),
                    'Sec2B2_checklist_noise' => $this->input->post('Sec2B2_checklist_noise', TRUE),
                    'Sec2B2_checklist_cutting' => $this->input->post('Sec2B2_checklist_cutting', TRUE),
                    'Sec2B2_checklist_vibration' => $this->input->post('Sec2B2_checklist_vibration', TRUE),
                    'Sec2B2_checklist_entangle' => $this->input->post('Sec2B2_checklist_entangle', TRUE),
                    'Sec2B2_checklist_dust' => $this->input->post('Sec2B2_checklist_dust', TRUE),
                    'Sec2B2_checklist_impact' => $this->input->post('Sec2B2_checklist_impact', TRUE),
                    'Sec2B2_checklist_pressure' => $this->input->post('Sec2B2_checklist_pressure', TRUE),
                    'Sec2B2_checklist_abrasion' => $this->input->post('Sec2B2_checklist_abrasion', TRUE),
                    'Sec2B2_checklist_waste' => $this->input->post('Sec2B2_checklist_waste', TRUE),
                    'Sec2B2_checklist_stabbing' => $this->input->post('Sec2B2_checklist_stabbing', TRUE),
                    'Sec2B2_checklist_fumes' => $this->input->post('Sec2B2_checklist_fumes', TRUE),
                    'Sec2B2_checklist_puncture' => $this->input->post('Sec2B2_checklist_puncture', TRUE),
                    'Sec2B2_checklist_chemical' => $this->input->post('Sec2B2_checklist_chemical', TRUE),
                    'Sec2B2_checklist_ejection' => $this->input->post('Sec2B2_checklist_ejection', TRUE),
                    'Sec2B2_checklist_allergens' => $this->input->post('Sec2B2_checklist_allergens', TRUE),
                    'Sec2B2_exposure' => $this->input->post('Sec2B2_exposure', TRUE),
                    'Sec2B2_users' => $this->input->post('Sec2B2_users', TRUE),
                    'Sec2B2_control_measures' => $this->input->post('Sec2B2_control_measures', TRUE),
                    'Sec2B2_procedural_behavioural' => $this->input->post('Sec2B2_procedural_behavioural', TRUE),
                    'Sec2B2_overall_assessment_risk_level' => $this->input->post('Sec2B2_overall_assessment_risk_level', TRUE),
                    'Sec2B2_risk_reduction_action' => $this->input->post('Sec2B2_risk_reduction_action', TRUE),
                    'Sec2B2_risk_reduction_by_who' => $this->input->post('Sec2B2_risk_reduction_by_who', TRUE),
                    'Sec2B2_risk_reduction_by_when' => $this->input->post('Sec2B2_risk_reduction_by_when', TRUE),
                    'Sec2B2_risk_reduction_action_completed' => $this->input->post('Sec2B2_risk_reduction_action_completed', TRUE),
                    'Sec2B2_overall_assessment_risk_level_after' => $this->input->post('Sec2B2_overall_assessment_risk_level_after', TRUE),
                    'Sec3_requestor' => $this->input->post('Sec3_requestor', TRUE),
                    'Sec3_requestor_signature' => $this->input->post('Sec3_requestor_signature', TRUE),
                    'Sec3_requestor_date' => $this->input->post('Sec3_requestor_date', TRUE),
                    'Sec3_supervisor_HMU' => $this->input->post('Sec3_supervisor_HMU', TRUE),
                    'Sec3_supervisor_signature' => $this->input->post('Sec3_supervisor_signature', TRUE),
                    'Sec3_supervisor_date' => $this->input->post('Sec3_supervisor_date', TRUE),
                    'Sec3_LO' => $this->input->post('Sec3_LO', TRUE),
                    'Sec3_LO_signature' => $this->input->post('Sec3_LO_signature', TRUE),
                    'Sec3_LO_date' => $this->input->post('Sec3_LO_date', TRUE),
                    'status' => $submitStatus
                    
                );
                
                
                if($this->procurement_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSubmit))
				{
                    $this->notification_model->insert_new_notification(null, 4, "New Project For Procurement of Biological Material", "The following user has submitted a new project for Procurement of Biological Material: " . $this->session->userdata('account_name'));
					
					$this->notification_model->insert_new_notification(null, 5, "New Project For Procurement of Biological Material", "The following user has submitted a new project for Procurement of Biological Material: " . $this->session->userdata('account_name'));
					
					$this->notification_model->insert_new_notification(null, 6, "New Project For Procurement of Biological Material", "The following user has submitted a new project for Procurement of Biological Material: " . $this->session->userdata('account_name'));
					
					
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
        public function load_project($proj_id){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            //$id = $this->input->get('id');
            $id = $this->uri->segment(3);
            
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
                    'project_id' => $proj_id,
                    'Sec1_chemical' => $this->input->post('Sec1_chemical', TRUE),
                    'Sec1_biological_material' => $this->input->post('Sec1_biological_material', TRUE),
                    'Sec1_equipment' => $this->input->post('Sec1_equipment', TRUE),
                    'Sec1_doc_id' => $this->input->post('Sec1_doc_id', TRUE),
                    'Sec1_review_date' => $this->input->post('Sec1_review_date', TRUE),
                    'Sec2A_name' => $this->input->post('Sec2A_name', TRUE),
                    'Sec2A_statement' => $this->input->post('Sec2A_statement', TRUE),
                    'Sec2A_manufacturer' => $this->input->post('Sec2A_manufacturer', TRUE),
                    'Sec2A_waste' => $this->input->post('Sec2A_waste', TRUE),
                    'Sec2A_hazardous' => $this->input->post('Sec2A_hazardous', TRUE),
                    'Sec2A_waste_type_corrosive' => $this->input->post('Sec2A_waste_type_corrosive', TRUE),
                    'Sec2A_waste_type_ignitable' => $this->input->post('Sec2A_waste_type_ignitable', TRUE),
                    'Sec2A_waste_type_reactive' => $this->input->post('Sec2A_waste_type_reactive', TRUE),
                    'Sec2A_waste_type_toxic' => $this->input->post('Sec2A_waste_type_toxic', TRUE),
                    'Sec2A_waste_type_infectious' => $this->input->post('Sec2A_waste_type_infectious', TRUE),
                    'Sec2A2_permit' => $this->input->post('Sec2A2_permit', TRUE),
                    'Sec2A2_storage' => $this->input->post('Sec2A2_storage', TRUE),
                    'Sec2A2_permit_type' => $this->input->post('Sec2A2_permit_type', TRUE),
                    'Sec2A2_waste_requirement' => $this->input->post('Sec2A2_waste_requirement', TRUE),
                    'Sec2A2_MSDS' => $this->input->post('Sec2A2_MSDS', TRUE),
                    'Sec2A2_risk_control_training' => $this->input->post('Sec2A2_risk_control_training', TRUE),
                    'Sec2A2_risk_control_inspection' => $this->input->post('Sec2A2_risk_control_inspection', TRUE),
                    'Sec2A2_risk_control_SOP' => $this->input->post('Sec2A2_risk_control_SOP', TRUE),
                    'Sec2A2_risk_control_PPE' => $this->input->post('Sec2A2_risk_control_PPE', TRUE),
                    'Sec2A2_risk_control_engineering' => $this->input->post('Sec2A2_risk_control_engineering', TRUE),
                    'Sec2A2_exposure_inhalation' => $this->input->post('Sec2A2_exposure_inhalation', TRUE),
                    'Sec2A2_exposure_skin' => $this->input->post('Sec2A2_exposure_skin', TRUE),
                    'Sec2A2_exposure_ingestion' => $this->input->post('Sec2A2_exposure_ingestion', TRUE),
                    'Sec2A2_exposure_injection' => $this->input->post('Sec2A2_exposure_injection', TRUE),
                    'Sec2A2_exposure_others' => $this->input->post('Sec2A2_exposure_others', TRUE),
                    'Sec2A2_exposure_description' => $this->input->post('Sec2A2_exposure_description', TRUE),
                    'Sec2A2_emergency_first_aid_kit' => $this->input->post('Sec2A2_emergency_first_aid_kit', TRUE),
                    'Sec2A2_emergency_shower' => $this->input->post('Sec2A2_emergency_shower', TRUE),
                    'Sec2A2_emergency_eyewash' => $this->input->post('Sec2A2_emergency_eyewash', TRUE),
                    'Sec2A2_emergency_neutralizing' => $this->input->post('Sec2A2_emergency_neutralizing', TRUE),
                    'Sec2A2_emergency_spill' => $this->input->post('Sec2A2_emergency_spill', TRUE),
                    'Sec2A2_emergency_restrict' => $this->input->post('Sec2A2_emergency_restrict', TRUE),
                    'Sec2A3_storage_inhalation' => $this->input->post('Sec2A3_storage_inhalation', TRUE),
                    'Sec2A3_storage_skin' => $this->input->post('Sec2A3_storage_skin', TRUE),
                    'Sec2A3_storage_ingestion' => $this->input->post('Sec2A3_storage_ingestion', TRUE),
                    'Sec2A3_storage_injection' => $this->input->post('Sec2A3_storage_injection', TRUE),
                    'Sec2A3_storage_others' => $this->input->post('Sec2A3_storage_others', TRUE),
                    'Sec2A3_other_storage_description' => $this->input->post('Sec2A3_other_storage_description', TRUE),
                    'Sec2A3_storage_control' => $this->input->post('Sec2A3_storage_control', TRUE),
                    'Sec2A3_handling_inhalation' => $this->input->post('Sec2A3_handling_inhalation', TRUE),
                    'Sec2A3_handling_skin' => $this->input->post('Sec2A3_handling_skin', TRUE),
                    'Sec2A3_handling_ingestion' => $this->input->post('Sec2A3_handling_ingestion', TRUE),
                    'Sec2A3_handling_injection' => $this->input->post('Sec2A3_handling_injection', TRUE),
                    'Sec2A3_handling_others' => $this->input->post('Sec2A3_handling_others', TRUE),
                    'Sec2A3_handling_description' => $this->input->post('Sec2A3_handling_description', TRUE),
                    'Sec2A3_handling_control' => $this->input->post('Sec2A3_handling_control', TRUE),
                    'Sec2A3_spill_inhalation' => $this->input->post('Sec2A3_spill_inhalation', TRUE),
                    'Sec2A3_spill_skin' => $this->input->post('Sec2A3_spill_skin', TRUE),
                    'Sec2A3_spill_ingestion' => $this->input->post('Sec2A3_spill_ingestion', TRUE),
                    'Sec2A3_spill_injection' => $this->input->post('Sec2A3_spill_injection', TRUE),
                    'Sec2A3_spill_others' => $this->input->post('Sec2A3_spill_others', TRUE),
                    'Sec2A3_spill_description' => $this->input->post('Sec2A3_spill_description', TRUE),
                    'Sec2A3_spill_control' => $this->input->post('Sec2A3_spill_control', TRUE),
                    'Sec2A3_disposal_inhalation' => $this->input->post('Sec2A3_disposal_inhalation', TRUE),
                    'Sec2A3_disposal_skin' => $this->input->post('Sec2A3_disposal_skin', TRUE),
                    'Sec2A3_disposal_ingestion' => $this->input->post('Sec2A3_disposal_ingestion', TRUE),
                    'Sec2A3_disposal_injection' => $this->input->post('Sec2A3_disposal_injection', TRUE),
                    'Sec2A3_disposal_others' => $this->input->post('Sec2A3_disposal_others', TRUE),
                    'Sec2A3_disposal_description' => $this->input->post('Sec2A3_disposal_description', TRUE),
                    'Sec2A3_disposal_control' => $this->input->post('Sec2A3_disposal_control', TRUE),
                    'Sec2B1_equipment_name' => $this->input->post('Sec2B1_equipment_name', TRUE),
                    'Sec2B1_activity_type' => $this->input->post('Sec2B1_activity_type', TRUE),
                    'Sec2B1_activity_location' => $this->input->post('Sec2B1_activity_location', TRUE),
                    'Sec2B2_machinery_description' => $this->input->post('Sec2B2_machinery_description', TRUE),
                    'Sec2B2_checklist_crushing' => $this->input->post('Sec2B2_checklist_crushing', TRUE),
                    'Sec2B2_checklist_temperature' => $this->input->post('Sec2B2_checklist_temperature', TRUE),
                    'Sec2B2_checklist_shearing' => $this->input->post('Sec2B2_checklist_shearing', TRUE),
                    'Sec2B2_checklist_electrical' => $this->input->post('Sec2B2_checklist_electrical', TRUE),
                    'Sec2B2_checklist_drawing' => $this->input->post('Sec2B2_checklist_drawing', TRUE),
                    'Sec2B2_checklist_noise' => $this->input->post('Sec2B2_checklist_noise', TRUE),
                    'Sec2B2_checklist_cutting' => $this->input->post('Sec2B2_checklist_cutting', TRUE),
                    'Sec2B2_checklist_vibration' => $this->input->post('Sec2B2_checklist_vibration', TRUE),
                    'Sec2B2_checklist_entangle' => $this->input->post('Sec2B2_checklist_entangle', TRUE),
                    'Sec2B2_checklist_dust' => $this->input->post('Sec2B2_checklist_dust', TRUE),
                    'Sec2B2_checklist_impact' => $this->input->post('Sec2B2_checklist_impact', TRUE),
                    'Sec2B2_checklist_pressure' => $this->input->post('Sec2B2_checklist_pressure', TRUE),
                    'Sec2B2_checklist_abrasion' => $this->input->post('Sec2B2_checklist_abrasion', TRUE),
                    'Sec2B2_checklist_waste' => $this->input->post('Sec2B2_checklist_waste', TRUE),
                    'Sec2B2_checklist_stabbing' => $this->input->post('Sec2B2_checklist_stabbing', TRUE),
                    'Sec2B2_checklist_fumes' => $this->input->post('Sec2B2_checklist_fumes', TRUE),
                    'Sec2B2_checklist_puncture' => $this->input->post('Sec2B2_checklist_puncture', TRUE),
                    'Sec2B2_checklist_chemical' => $this->input->post('Sec2B2_checklist_chemical', TRUE),
                    'Sec2B2_checklist_ejection' => $this->input->post('Sec2B2_checklist_ejection', TRUE),
                    'Sec2B2_checklist_allergens' => $this->input->post('Sec2B2_checklist_allergens', TRUE),
                    'Sec2B2_exposure' => $this->input->post('Sec2B2_exposure', TRUE),
                    'Sec2B2_users' => $this->input->post('Sec2B2_users', TRUE),
                    'Sec2B2_control_measures' => $this->input->post('Sec2B2_control_measures', TRUE),
                    'Sec2B2_procedural_behavioural' => $this->input->post('Sec2B2_procedural_behavioural', TRUE),
                    'Sec2B2_overall_assessment_risk_level' => $this->input->post('Sec2B2_overall_assessment_risk_level', TRUE),
                    'Sec2B2_risk_reduction_action' => $this->input->post('Sec2B2_risk_reduction_action', TRUE),
                    'Sec2B2_risk_reduction_by_who' => $this->input->post('Sec2B2_risk_reduction_by_who', TRUE),
                    'Sec2B2_risk_reduction_by_when' => $this->input->post('Sec2B2_risk_reduction_by_when', TRUE),
                    'Sec2B2_risk_reduction_action_completed' => $this->input->post('Sec2B2_risk_reduction_action_completed', TRUE),
                    'Sec2B2_overall_assessment_risk_level_after' => $this->input->post('Sec2B2_overall_assessment_risk_level_after', TRUE),
                    'Sec3_requestor' => $this->input->post('Sec3_requestor', TRUE),
                    'Sec3_requestor_signature' => $this->input->post('Sec3_requestor_signature', TRUE),
                    'Sec3_requestor_date' => $this->input->post('Sec3_requestor_date', TRUE),
                    'Sec3_supervisor_HMU' => $this->input->post('Sec3_supervisor_HMU', TRUE),
                    'Sec3_supervisor_signature' => $this->input->post('Sec3_supervisor_signature', TRUE),
                    'Sec3_supervisor_date' => $this->input->post('Sec3_supervisor_date', TRUE),
                    'Sec3_LO' => $this->input->post('Sec3_LO', TRUE),
                    'Sec3_LO_signature' => $this->input->post('Sec3_LO_signature', TRUE),
                    'Sec3_LO_date' => $this->input->post('Sec3_LO_date', TRUE),
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
                    'Sec1_chemical' => $this->input->post('Sec1_chemical', TRUE),
                    'Sec1_biological_material' => $this->input->post('Sec1_biological_material', TRUE),
                    'Sec1_equipment' => $this->input->post('Sec1_equipment', TRUE),
                    'Sec1_doc_id' => $this->input->post('Sec1_doc_id', TRUE),
                    'Sec1_review_date' => $this->input->post('Sec1_review_date', TRUE),
                    'Sec2A_name' => $this->input->post('Sec2A_name', TRUE),
                    'Sec2A_statement' => $this->input->post('Sec2A_statement', TRUE),
                    'Sec2A_manufacturer' => $this->input->post('Sec2A_manufacturer', TRUE),
                    'Sec2A_waste' => $this->input->post('Sec2A_waste', TRUE),
                    'Sec2A_hazardous' => $this->input->post('Sec2A_hazardous', TRUE),
                    'Sec2A_waste_type_corrosive' => $this->input->post('Sec2A_waste_type_corrosive', TRUE),
                    'Sec2A_waste_type_ignitable' => $this->input->post('Sec2A_waste_type_ignitable', TRUE),
                    'Sec2A_waste_type_reactive' => $this->input->post('Sec2A_waste_type_reactive', TRUE),
                    'Sec2A_waste_type_toxic' => $this->input->post('Sec2A_waste_type_toxic', TRUE),
                    'Sec2A_waste_type_infectious' => $this->input->post('Sec2A_waste_type_infectious', TRUE),
                    'Sec2A2_permit' => $this->input->post('Sec2A2_permit', TRUE),
                    'Sec2A2_storage' => $this->input->post('Sec2A2_storage', TRUE),
                    'Sec2A2_permit_type' => $this->input->post('Sec2A2_permit_type', TRUE),
                    'Sec2A2_waste_requirement' => $this->input->post('Sec2A2_waste_requirement', TRUE),
                    'Sec2A2_MSDS' => $this->input->post('Sec2A2_MSDS', TRUE),
                    'Sec2A2_risk_control_training' => $this->input->post('Sec2A2_risk_control_training', TRUE),
                    'Sec2A2_risk_control_inspection' => $this->input->post('Sec2A2_risk_control_inspection', TRUE),
                    'Sec2A2_risk_control_SOP' => $this->input->post('Sec2A2_risk_control_SOP', TRUE),
                    'Sec2A2_risk_control_PPE' => $this->input->post('Sec2A2_risk_control_PPE', TRUE),
                    'Sec2A2_risk_control_engineering' => $this->input->post('Sec2A2_risk_control_engineering', TRUE),
                    'Sec2A2_exposure_inhalation' => $this->input->post('Sec2A2_exposure_inhalation', TRUE),
                    'Sec2A2_exposure_skin' => $this->input->post('Sec2A2_exposure_skin', TRUE),
                    'Sec2A2_exposure_ingestion' => $this->input->post('Sec2A2_exposure_ingestion', TRUE),
                    'Sec2A2_exposure_injection' => $this->input->post('Sec2A2_exposure_injection', TRUE),
                    'Sec2A2_exposure_others' => $this->input->post('Sec2A2_exposure_others', TRUE),
                    'Sec2A2_exposure_description' => $this->input->post('Sec2A2_exposure_description', TRUE),
                    'Sec2A2_emergency_first_aid_kit' => $this->input->post('Sec2A2_emergency_first_aid_kit', TRUE),
                    'Sec2A2_emergency_shower' => $this->input->post('Sec2A2_emergency_shower', TRUE),
                    'Sec2A2_emergency_eyewash' => $this->input->post('Sec2A2_emergency_eyewash', TRUE),
                    'Sec2A2_emergency_neutralizing' => $this->input->post('Sec2A2_emergency_neutralizing', TRUE),
                    'Sec2A2_emergency_spill' => $this->input->post('Sec2A2_emergency_spill', TRUE),
                    'Sec2A2_emergency_restrict' => $this->input->post('Sec2A2_emergency_restrict', TRUE),
                    'Sec2A3_storage_inhalation' => $this->input->post('Sec2A3_storage_inhalation', TRUE),
                    'Sec2A3_storage_skin' => $this->input->post('Sec2A3_storage_skin', TRUE),
                    'Sec2A3_storage_ingestion' => $this->input->post('Sec2A3_storage_ingestion', TRUE),
                    'Sec2A3_storage_injection' => $this->input->post('Sec2A3_storage_injection', TRUE),
                    'Sec2A3_storage_others' => $this->input->post('Sec2A3_storage_others', TRUE),
                    'Sec2A3_other_storage_description' => $this->input->post('Sec2A3_other_storage_description', TRUE),
                    'Sec2A3_storage_control' => $this->input->post('Sec2A3_storage_control', TRUE),
                    'Sec2A3_handling_inhalation' => $this->input->post('Sec2A3_handling_inhalation', TRUE),
                    'Sec2A3_handling_skin' => $this->input->post('Sec2A3_handling_skin', TRUE),
                    'Sec2A3_handling_ingestion' => $this->input->post('Sec2A3_handling_ingestion', TRUE),
                    'Sec2A3_handling_injection' => $this->input->post('Sec2A3_handling_injection', TRUE),
                    'Sec2A3_handling_others' => $this->input->post('Sec2A3_handling_others', TRUE),
                    'Sec2A3_handling_description' => $this->input->post('Sec2A3_handling_description', TRUE),
                    'Sec2A3_handling_control' => $this->input->post('Sec2A3_handling_control', TRUE),
                    'Sec2A3_spill_inhalation' => $this->input->post('Sec2A3_spill_inhalation', TRUE),
                    'Sec2A3_spill_skin' => $this->input->post('Sec2A3_spill_skin', TRUE),
                    'Sec2A3_spill_ingestion' => $this->input->post('Sec2A3_spill_ingestion', TRUE),
                    'Sec2A3_spill_injection' => $this->input->post('Sec2A3_spill_injection', TRUE),
                    'Sec2A3_spill_others' => $this->input->post('Sec2A3_spill_others', TRUE),
                    'Sec2A3_spill_description' => $this->input->post('Sec2A3_spill_description', TRUE),
                    'Sec2A3_spill_control' => $this->input->post('Sec2A3_spill_control', TRUE),
                    'Sec2A3_disposal_inhalation' => $this->input->post('Sec2A3_disposal_inhalation', TRUE),
                    'Sec2A3_disposal_skin' => $this->input->post('Sec2A3_disposal_skin', TRUE),
                    'Sec2A3_disposal_ingestion' => $this->input->post('Sec2A3_disposal_ingestion', TRUE),
                    'Sec2A3_disposal_injection' => $this->input->post('Sec2A3_disposal_injection', TRUE),
                    'Sec2A3_disposal_others' => $this->input->post('Sec2A3_disposal_others', TRUE),
                    'Sec2A3_disposal_description' => $this->input->post('Sec2A3_disposal_description', TRUE),
                    'Sec2A3_disposal_control' => $this->input->post('Sec2A3_disposal_control', TRUE),
                    'Sec2B1_equipment_name' => $this->input->post('Sec2B1_equipment_name', TRUE),
                    'Sec2B1_activity_type' => $this->input->post('Sec2B1_activity_type', TRUE),
                    'Sec2B1_activity_location' => $this->input->post('Sec2B1_activity_location', TRUE),
                    'Sec2B2_machinery_description' => $this->input->post('Sec2B2_machinery_description', TRUE),
                    'Sec2B2_checklist_crushing' => $this->input->post('Sec2B2_checklist_crushing', TRUE),
                    'Sec2B2_checklist_temperature' => $this->input->post('Sec2B2_checklist_temperature', TRUE),
                    'Sec2B2_checklist_shearing' => $this->input->post('Sec2B2_checklist_shearing', TRUE),
                    'Sec2B2_checklist_electrical' => $this->input->post('Sec2B2_checklist_electrical', TRUE),
                    'Sec2B2_checklist_drawing' => $this->input->post('Sec2B2_checklist_drawing', TRUE),
                    'Sec2B2_checklist_noise' => $this->input->post('Sec2B2_checklist_noise', TRUE),
                    'Sec2B2_checklist_cutting' => $this->input->post('Sec2B2_checklist_cutting', TRUE),
                    'Sec2B2_checklist_vibration' => $this->input->post('Sec2B2_checklist_vibration', TRUE),
                    'Sec2B2_checklist_entangle' => $this->input->post('Sec2B2_checklist_entangle', TRUE),
                    'Sec2B2_checklist_dust' => $this->input->post('Sec2B2_checklist_dust', TRUE),
                    'Sec2B2_checklist_impact' => $this->input->post('Sec2B2_checklist_impact', TRUE),
                    'Sec2B2_checklist_pressure' => $this->input->post('Sec2B2_checklist_pressure', TRUE),
                    'Sec2B2_checklist_abrasion' => $this->input->post('Sec2B2_checklist_abrasion', TRUE),
                    'Sec2B2_checklist_waste' => $this->input->post('Sec2B2_checklist_waste', TRUE),
                    'Sec2B2_checklist_stabbing' => $this->input->post('Sec2B2_checklist_stabbing', TRUE),
                    'Sec2B2_checklist_fumes' => $this->input->post('Sec2B2_checklist_fumes', TRUE),
                    'Sec2B2_checklist_puncture' => $this->input->post('Sec2B2_checklist_puncture', TRUE),
                    'Sec2B2_checklist_chemical' => $this->input->post('Sec2B2_checklist_chemical', TRUE),
                    'Sec2B2_checklist_ejection' => $this->input->post('Sec2B2_checklist_ejection', TRUE),
                    'Sec2B2_checklist_allergens' => $this->input->post('Sec2B2_checklist_allergens', TRUE),
                    'Sec2B2_exposure' => $this->input->post('Sec2B2_exposure', TRUE),
                    'Sec2B2_users' => $this->input->post('Sec2B2_users', TRUE),
                    'Sec2B2_control_measures' => $this->input->post('Sec2B2_control_measures', TRUE),
                    'Sec2B2_procedural_behavioural' => $this->input->post('Sec2B2_procedural_behavioural', TRUE),
                    'Sec2B2_overall_assessment_risk_level' => $this->input->post('Sec2B2_overall_assessment_risk_level', TRUE),
                    'Sec2B2_risk_reduction_action' => $this->input->post('Sec2B2_risk_reduction_action', TRUE),
                    'Sec2B2_risk_reduction_by_who' => $this->input->post('Sec2B2_risk_reduction_by_who', TRUE),
                    'Sec2B2_risk_reduction_by_when' => $this->input->post('Sec2B2_risk_reduction_by_when', TRUE),
                    'Sec2B2_risk_reduction_action_completed' => $this->input->post('Sec2B2_risk_reduction_action_completed', TRUE),
                    'Sec2B2_overall_assessment_risk_level_after' => $this->input->post('Sec2B2_overall_assessment_risk_level_after', TRUE),
                    'Sec3_requestor' => $this->input->post('Sec3_requestor', TRUE),
                    'Sec3_requestor_signature' => $this->input->post('Sec3_requestor_signature', TRUE),
                    'Sec3_requestor_date' => $this->input->post('Sec3_requestor_date', TRUE),
                    'Sec3_supervisor_HMU' => $this->input->post('Sec3_supervisor_HMU', TRUE),
                    'Sec3_supervisor_signature' => $this->input->post('Sec3_supervisor_signature', TRUE),
                    'Sec3_supervisor_date' => $this->input->post('Sec3_supervisor_date', TRUE),
                    'Sec3_LO' => $this->input->post('Sec3_LO', TRUE),
                    'Sec3_LO_signature' => $this->input->post('Sec3_LO_signature', TRUE),
                    'Sec3_LO_date' => $this->input->post('Sec3_LO_date', TRUE),
                    'status' => $saveStatus
                    
                );
                
                
                if($this->procurement_model->update_saved_data($proj_id, $data) && $this->project_model->update_proj_status($proj_id, $projectSave)){

                    
                   
				   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully Saved!</div>', $data);
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
                    'Sec1_chemical' => $this->input->post('Sec1_chemical', TRUE),
                    'Sec1_biological_material' => $this->input->post('Sec1_biological_material', TRUE),
                    'Sec1_equipment' => $this->input->post('Sec1_equipment', TRUE),
                    'Sec1_doc_id' => $this->input->post('Sec1_doc_id', TRUE),
                    'Sec1_review_date' => $this->input->post('Sec1_review_date', TRUE),
                    'Sec2A_name' => $this->input->post('Sec2A_name', TRUE),
                    'Sec2A_statement' => $this->input->post('Sec2A_statement', TRUE),
                    'Sec2A_manufacturer' => $this->input->post('Sec2A_manufacturer', TRUE),
                    'Sec2A_waste' => $this->input->post('Sec2A_waste', TRUE),
                    'Sec2A_hazardous' => $this->input->post('Sec2A_hazardous', TRUE),
                    'Sec2A_waste_type_corrosive' => $this->input->post('Sec2A_waste_type_corrosive', TRUE),
                    'Sec2A_waste_type_ignitable' => $this->input->post('Sec2A_waste_type_ignitable', TRUE),
                    'Sec2A_waste_type_reactive' => $this->input->post('Sec2A_waste_type_reactive', TRUE),
                    'Sec2A_waste_type_toxic' => $this->input->post('Sec2A_waste_type_toxic', TRUE),
                    'Sec2A_waste_type_infectious' => $this->input->post('Sec2A_waste_type_infectious', TRUE),
                    'Sec2A2_permit' => $this->input->post('Sec2A2_permit', TRUE),
                    'Sec2A2_storage' => $this->input->post('Sec2A2_storage', TRUE),
                    'Sec2A2_permit_type' => $this->input->post('Sec2A2_permit_type', TRUE),
                    'Sec2A2_waste_requirement' => $this->input->post('Sec2A2_waste_requirement', TRUE),
                    'Sec2A2_MSDS' => $this->input->post('Sec2A2_MSDS', TRUE),
                    'Sec2A2_risk_control_training' => $this->input->post('Sec2A2_risk_control_training', TRUE),
                    'Sec2A2_risk_control_inspection' => $this->input->post('Sec2A2_risk_control_inspection', TRUE),
                    'Sec2A2_risk_control_SOP' => $this->input->post('Sec2A2_risk_control_SOP', TRUE),
                    'Sec2A2_risk_control_PPE' => $this->input->post('Sec2A2_risk_control_PPE', TRUE),
                    'Sec2A2_risk_control_engineering' => $this->input->post('Sec2A2_risk_control_engineering', TRUE),
                    'Sec2A2_exposure_inhalation' => $this->input->post('Sec2A2_exposure_inhalation', TRUE),
                    'Sec2A2_exposure_skin' => $this->input->post('Sec2A2_exposure_skin', TRUE),
                    'Sec2A2_exposure_ingestion' => $this->input->post('Sec2A2_exposure_ingestion', TRUE),
                    'Sec2A2_exposure_injection' => $this->input->post('Sec2A2_exposure_injection', TRUE),
                    'Sec2A2_exposure_others' => $this->input->post('Sec2A2_exposure_others', TRUE),
                    'Sec2A2_exposure_description' => $this->input->post('Sec2A2_exposure_description', TRUE),
                    'Sec2A2_emergency_first_aid_kit' => $this->input->post('Sec2A2_emergency_first_aid_kit', TRUE),
                    'Sec2A2_emergency_shower' => $this->input->post('Sec2A2_emergency_shower', TRUE),
                    'Sec2A2_emergency_eyewash' => $this->input->post('Sec2A2_emergency_eyewash', TRUE),
                    'Sec2A2_emergency_neutralizing' => $this->input->post('Sec2A2_emergency_neutralizing', TRUE),
                    'Sec2A2_emergency_spill' => $this->input->post('Sec2A2_emergency_spill', TRUE),
                    'Sec2A2_emergency_restrict' => $this->input->post('Sec2A2_emergency_restrict', TRUE),
                    'Sec2A3_storage_inhalation' => $this->input->post('Sec2A3_storage_inhalation', TRUE),
                    'Sec2A3_storage_skin' => $this->input->post('Sec2A3_storage_skin', TRUE),
                    'Sec2A3_storage_ingestion' => $this->input->post('Sec2A3_storage_ingestion', TRUE),
                    'Sec2A3_storage_injection' => $this->input->post('Sec2A3_storage_injection', TRUE),
                    'Sec2A3_storage_others' => $this->input->post('Sec2A3_storage_others', TRUE),
                    'Sec2A3_other_storage_description' => $this->input->post('Sec2A3_other_storage_description', TRUE),
                    'Sec2A3_storage_control' => $this->input->post('Sec2A3_storage_control', TRUE),
                    'Sec2A3_handling_inhalation' => $this->input->post('Sec2A3_handling_inhalation', TRUE),
                    'Sec2A3_handling_skin' => $this->input->post('Sec2A3_handling_skin', TRUE),
                    'Sec2A3_handling_ingestion' => $this->input->post('Sec2A3_handling_ingestion', TRUE),
                    'Sec2A3_handling_injection' => $this->input->post('Sec2A3_handling_injection', TRUE),
                    'Sec2A3_handling_others' => $this->input->post('Sec2A3_handling_others', TRUE),
                    'Sec2A3_handling_description' => $this->input->post('Sec2A3_handling_description', TRUE),
                    'Sec2A3_handling_control' => $this->input->post('Sec2A3_handling_control', TRUE),
                    'Sec2A3_spill_inhalation' => $this->input->post('Sec2A3_spill_inhalation', TRUE),
                    'Sec2A3_spill_skin' => $this->input->post('Sec2A3_spill_skin', TRUE),
                    'Sec2A3_spill_ingestion' => $this->input->post('Sec2A3_spill_ingestion', TRUE),
                    'Sec2A3_spill_injection' => $this->input->post('Sec2A3_spill_injection', TRUE),
                    'Sec2A3_spill_others' => $this->input->post('Sec2A3_spill_others', TRUE),
                    'Sec2A3_spill_description' => $this->input->post('Sec2A3_spill_description', TRUE),
                    'Sec2A3_spill_control' => $this->input->post('Sec2A3_spill_control', TRUE),
                    'Sec2A3_disposal_inhalation' => $this->input->post('Sec2A3_disposal_inhalation', TRUE),
                    'Sec2A3_disposal_skin' => $this->input->post('Sec2A3_disposal_skin', TRUE),
                    'Sec2A3_disposal_ingestion' => $this->input->post('Sec2A3_disposal_ingestion', TRUE),
                    'Sec2A3_disposal_injection' => $this->input->post('Sec2A3_disposal_injection', TRUE),
                    'Sec2A3_disposal_others' => $this->input->post('Sec2A3_disposal_others', TRUE),
                    'Sec2A3_disposal_description' => $this->input->post('Sec2A3_disposal_description', TRUE),
                    'Sec2A3_disposal_control' => $this->input->post('Sec2A3_disposal_control', TRUE),
                    'Sec2B1_equipment_name' => $this->input->post('Sec2B1_equipment_name', TRUE),
                    'Sec2B1_activity_type' => $this->input->post('Sec2B1_activity_type', TRUE),
                    'Sec2B1_activity_location' => $this->input->post('Sec2B1_activity_location', TRUE),
                    'Sec2B2_machinery_description' => $this->input->post('Sec2B2_machinery_description', TRUE),
                    'Sec2B2_checklist_crushing' => $this->input->post('Sec2B2_checklist_crushing', TRUE),
                    'Sec2B2_checklist_temperature' => $this->input->post('Sec2B2_checklist_temperature', TRUE),
                    'Sec2B2_checklist_shearing' => $this->input->post('Sec2B2_checklist_shearing', TRUE),
                    'Sec2B2_checklist_electrical' => $this->input->post('Sec2B2_checklist_electrical', TRUE),
                    'Sec2B2_checklist_drawing' => $this->input->post('Sec2B2_checklist_drawing', TRUE),
                    'Sec2B2_checklist_noise' => $this->input->post('Sec2B2_checklist_noise', TRUE),
                    'Sec2B2_checklist_cutting' => $this->input->post('Sec2B2_checklist_cutting', TRUE),
                    'Sec2B2_checklist_vibration' => $this->input->post('Sec2B2_checklist_vibration', TRUE),
                    'Sec2B2_checklist_entangle' => $this->input->post('Sec2B2_checklist_entangle', TRUE),
                    'Sec2B2_checklist_dust' => $this->input->post('Sec2B2_checklist_dust', TRUE),
                    'Sec2B2_checklist_impact' => $this->input->post('Sec2B2_checklist_impact', TRUE),
                    'Sec2B2_checklist_pressure' => $this->input->post('Sec2B2_checklist_pressure', TRUE),
                    'Sec2B2_checklist_abrasion' => $this->input->post('Sec2B2_checklist_abrasion', TRUE),
                    'Sec2B2_checklist_waste' => $this->input->post('Sec2B2_checklist_waste', TRUE),
                    'Sec2B2_checklist_stabbing' => $this->input->post('Sec2B2_checklist_stabbing', TRUE),
                    'Sec2B2_checklist_fumes' => $this->input->post('Sec2B2_checklist_fumes', TRUE),
                    'Sec2B2_checklist_puncture' => $this->input->post('Sec2B2_checklist_puncture', TRUE),
                    'Sec2B2_checklist_chemical' => $this->input->post('Sec2B2_checklist_chemical', TRUE),
                    'Sec2B2_checklist_ejection' => $this->input->post('Sec2B2_checklist_ejection', TRUE),
                    'Sec2B2_checklist_allergens' => $this->input->post('Sec2B2_checklist_allergens', TRUE),
                    'Sec2B2_exposure' => $this->input->post('Sec2B2_exposure', TRUE),
                    'Sec2B2_users' => $this->input->post('Sec2B2_users', TRUE),
                    'Sec2B2_control_measures' => $this->input->post('Sec2B2_control_measures', TRUE),
                    'Sec2B2_procedural_behavioural' => $this->input->post('Sec2B2_procedural_behavioural', TRUE),
                    'Sec2B2_overall_assessment_risk_level' => $this->input->post('Sec2B2_overall_assessment_risk_level', TRUE),
                    'Sec2B2_risk_reduction_action' => $this->input->post('Sec2B2_risk_reduction_action', TRUE),
                    'Sec2B2_risk_reduction_by_who' => $this->input->post('Sec2B2_risk_reduction_by_who', TRUE),
                    'Sec2B2_risk_reduction_by_when' => $this->input->post('Sec2B2_risk_reduction_by_when', TRUE),
                    'Sec2B2_risk_reduction_action_completed' => $this->input->post('Sec2B2_risk_reduction_action_completed', TRUE),
                    'Sec2B2_overall_assessment_risk_level_after' => $this->input->post('Sec2B2_overall_assessment_risk_level_after', TRUE),
                    'Sec3_requestor' => $this->input->post('Sec3_requestor', TRUE),
                    'Sec3_requestor_signature' => $this->input->post('Sec3_requestor_signature', TRUE),
                    'Sec3_requestor_date' => $this->input->post('Sec3_requestor_date', TRUE),
                    'Sec3_supervisor_HMU' => $this->input->post('Sec3_supervisor_HMU', TRUE),
                    'Sec3_supervisor_signature' => $this->input->post('Sec3_supervisor_signature', TRUE),
                    'Sec3_supervisor_date' => $this->input->post('Sec3_supervisor_date', TRUE),
                    'Sec3_LO' => $this->input->post('Sec3_LO', TRUE),
                    'Sec3_LO_signature' => $this->input->post('Sec3_LO_signature', TRUE),
                    'Sec3_LO_date' => $this->input->post('Sec3_LO_date', TRUE),
                    'status' => $submitStatus
                    
                );
                
                
                if($this->procurement_model->update_saved_data($proj_id, $data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
                   $this->notification_model->insert_new_notification(null, 4, "New Project For Procurement of Biological Material", "The following user has submitted a new project for Procurement of Biological Material: " . $this->session->userdata('account_name'));
					
				   $this->notification_model->insert_new_notification(null, 5, "New Project For Procurement of Biological Material", "The following user has submitted a new project for Procurement of Biological Material: " . $this->session->userdata('account_name'));
					
				   $this->notification_model->insert_new_notification(null, 6, "New Project For Procurement of Biological Material", "The following user has submitted a new project for Procurement of Biological Material: " . $this->session->userdata('account_name'));
				   
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
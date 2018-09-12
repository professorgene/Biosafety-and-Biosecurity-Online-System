<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class procurement extends CI_Controller{
        
        function __construct()
        {
            parent::__construct();

            $this->load->database();
            $this->load->model('procurement_model');
            $this->load->model('notification_model');
            
            //breadcrum
            $this->breadcrumbs->unshift('Home', '/');	
            $this->breadcrumbs->push('Procurement of Biological Material','/procurementpage', true);
            $this->breadcrumbs->push('OHS-F-4.18.X Pre-Purchase Material Risk Assessment', true);
        }
        
        public function index(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('Sec1_chemical', 'Section 1 chemical', 'required');
            $this->form_validation->set_rules('Sec1_biological_material', 'Sec1 biological material', 'required');
            $this->form_validation->set_rules('Sec1_equipment', 'Sec1 equipment', 'required');
            $this->form_validation->set_rules('Sec1_doc_id', 'Sec1 doc id', 'required');
            $this->form_validation->set_rules('Sec1_review_date', 'Sec1 review date', 'required');
            /*$this->form_validation->set_rules('Sec2A_name', 'Sec2A name', 'required');
            $this->form_validation->set_rules('Sec2A_manufacturer', 'Sec2A manufacturer', 'required');
            $this->form_validation->set_rules('Sec2A_waste', 'Sec2A waste', 'required');
            $this->form_validation->set_rules('Sec2A_hazardous', 'Sec2A hazardous', 'required');
            $this->form_validation->set_rules('Sec2A2_permit', 'Sec2A2 permit', 'required');
            $this->form_validation->set_rules('Sec2A2_storage', 'Sec2A2 storage', 'required');
            $this->form_validation->set_rules('Sec2A2_permit_type', 'Sec2A2 permit type', 'required');
            $this->form_validation->set_rules('Sec2A2_waste_requirement', 'Sec2A2 waste requirement', 'required');
            $this->form_validation->set_rules('Sec2A2_MSDS', 'Sec2A2 MSDS', 'required');
            $this->form_validation->set_rules('Sec2A3_storage_description', 'Sec2A3 storage description', 'required');
            $this->form_validation->set_rules('Sec2A3_storage_control', 'Sec2A3 storage control', 'required');
            $this->form_validation->set_rules('Sec2A3_handling_description', 'Sec2A3 handling description', 'required');
            $this->form_validation->set_rules('Sec2A3_handling_control', 'Sec2A3 handling control', 'required');
            $this->form_validation->set_rules('Sec2A3_spill_description', 'Sec2A3 spill description', 'required');
            $this->form_validation->set_rules('Sec2A3_spill_control', 'Sec2A3 spill control', 'required');
            $this->form_validation->set_rules('Sec2A3_disposal_description', 'Sec2A3 disposal description', 'required');
            $this->form_validation->set_rules('Sec2A3_disposal_control', 'Sec2A3 disposal control', 'required');
            $this->form_validation->set_rules('Sec2B1_equipment_name', 'Sec2B1 equipment name', 'required');
            $this->form_validation->set_rules('Sec2B1_activity_type', 'Sec2B1 activity type', 'required');
            $this->form_validation->set_rules('Sec2B1_activity_location', 'Sec2B1 activity location', 'required');
            $this->form_validation->set_rules('Sec2B2_machinery_description', 'Sec2B2 machinery description', 'required');
            $this->form_validation->set_rules('Sec2B2_exposure', 'Sec2B2 exposure', 'required');
            $this->form_validation->set_rules('Sec2B2_users', 'Sec2B2 users', 'required');
            $this->form_validation->set_rules('Sec2B2_control_measures', 'Sec2B2 control measures', 'required');
            $this->form_validation->set_rules('Sec2B2_procedural_behavioural', 'Sec2B2 procedural behavioural', 'required');
            $this->form_validation->set_rules('Sec2B2_overall_assessment_risk_level', 'Sec2B2 overall assessment risk level', 'required');
            $this->form_validation->set_rules('Sec2B2_risk_reduction_action', 'Sec2B2 risk reduction action', 'required');
            $this->form_validation->set_rules('Sec2B2_risk_reduction_by_who', 'Sec2B2 risk reduction by who', 'required');
            $this->form_validation->set_rules('Sec2B2_risk_reduction_by_when', 'Sec2B2 risk reduction by when', 'required');
            $this->form_validation->set_rules('Sec2B2_risk_reduction_action_completed', 'Sec2B2 risk reduction action completed', 'required');
            $this->form_validation->set_rules('Sec2B2_overall_assessment_risk_level_after', 'Sec2B2 overall assessment risk level after', 'required');
            $this->form_validation->set_rules('Sec3_requestor', 'Sec3 requestor', 'required');
            $this->form_validation->set_rules('Sec3_supervisor', 'Sec3 supervisor', 'required');
            $this->form_validation->set_rules('Sec3_supervisor_date', 'Sec3 supervisor date', 'required');
            $this->form_validation->set_rules('Sec3_LO', 'Sec3 LO', 'required');
            $this->form_validation->set_rules('Sec3_LO_date', 'Sec3_LO_date', 'required');*/
           
            
            
            
            
            if ($this->form_validation->run() == FALSE)
            {
                
                $this->load->template('procurement_view', $data);
                   
            }
            else
            {
                
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
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
                    'Sec2A3_storage_description' => $this->input->post('Sec2A3_storage_description'),
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
                    'Sec3_requestor_date' => $this->input->post('Sec3_requestor_date'),
                    'Sec3_supervisor' => $this->input->post('Sec3_supervisor'),
                    'Sec3_supervisor_date' => $this->input->post('Sec3_supervisor_date'),
                    'Sec3_LO' => $this->input->post('Sec3_LO'),
                    'Sec3_LO_date' => $this->input->post('Sec3_LO_date')
                    
                );
                
                
                if($this->procurement_model->insert_new_applicant_data($data)){
                    
                   $this->notification_model->insert_new_notification(null, 4, "New Pre-Purchase Material Risk Assessment Application", "The following user has submitted a new Pre-Purchase Material Risk Assessment form: " . $this->session->userdata('account_name'));
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Form has been successfully submitted!</div>', $data);
                   redirect('procurement/index');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('procurement/index');
                    
                    
                    
                }
                
            }
        }
        
        public function load_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            //$id = '$this->session->userdata('account_id')';
            //$id = $this->uri->segment(3);
            $id = $this->input->get('id');
            $data['retrieved'] = $this->procurement_model->get_form_by_id($id);
            
            $this->load->template('procurement_view', $data);
            
        }
        
        public function update_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('Sec1_chemical', 'Section 1 chemical', 'required');
            $this->form_validation->set_rules('Sec1_biological_material', 'Sec1 biological material', 'required');
            $this->form_validation->set_rules('Sec1_equipment', 'Sec1 equipment', 'required');
            $this->form_validation->set_rules('Sec1_doc_id', 'Sec1 doc id', 'required');
            $this->form_validation->set_rules('Sec1_review_date', 'Sec1 review date', 'required');
            /*$this->form_validation->set_rules('Sec2A_name', 'Sec2A name', 'required');
            $this->form_validation->set_rules('Sec2A_manufacturer', 'Sec2A manufacturer', 'required');
            $this->form_validation->set_rules('Sec2A_waste', 'Sec2A waste', 'required');
            $this->form_validation->set_rules('Sec2A_hazardous', 'Sec2A hazardous', 'required');
            $this->form_validation->set_rules('Sec2A2_permit', 'Sec2A2 permit', 'required');
            $this->form_validation->set_rules('Sec2A2_storage', 'Sec2A2 storage', 'required');
            $this->form_validation->set_rules('Sec2A2_permit_type', 'Sec2A2 permit type', 'required');
            $this->form_validation->set_rules('Sec2A2_waste_requirement', 'Sec2A2 waste requirement', 'required');
            $this->form_validation->set_rules('Sec2A2_MSDS', 'Sec2A2 MSDS', 'required');
            $this->form_validation->set_rules('Sec2A3_storage_description', 'Sec2A3 storage description', 'required');
            $this->form_validation->set_rules('Sec2A3_storage_control', 'Sec2A3 storage control', 'required');
            $this->form_validation->set_rules('Sec2A3_handling_description', 'Sec2A3 handling description', 'required');
            $this->form_validation->set_rules('Sec2A3_handling_control', 'Sec2A3 handling control', 'required');
            $this->form_validation->set_rules('Sec2A3_spill_description', 'Sec2A3 spill description', 'required');
            $this->form_validation->set_rules('Sec2A3_spill_control', 'Sec2A3 spill control', 'required');
            $this->form_validation->set_rules('Sec2A3_disposal_description', 'Sec2A3 disposal description', 'required');
            $this->form_validation->set_rules('Sec2A3_disposal_control', 'Sec2A3 disposal control', 'required');
            $this->form_validation->set_rules('Sec2B1_equipment_name', 'Sec2B1 equipment name', 'required');
            $this->form_validation->set_rules('Sec2B1_activity_type', 'Sec2B1 activity type', 'required');
            $this->form_validation->set_rules('Sec2B1_activity_location', 'Sec2B1 activity location', 'required');
            $this->form_validation->set_rules('Sec2B2_machinery_description', 'Sec2B2 machinery description', 'required');
            $this->form_validation->set_rules('Sec2B2_exposure', 'Sec2B2 exposure', 'required');
            $this->form_validation->set_rules('Sec2B2_users', 'Sec2B2 users', 'required');
            $this->form_validation->set_rules('Sec2B2_control_measures', 'Sec2B2 control measures', 'required');
            $this->form_validation->set_rules('Sec2B2_procedural_behavioural', 'Sec2B2 procedural behavioural', 'required');
            $this->form_validation->set_rules('Sec2B2_overall_assessment_risk_level', 'Sec2B2 overall assessment risk level', 'required');
            $this->form_validation->set_rules('Sec2B2_risk_reduction_action', 'Sec2B2 risk reduction action', 'required');
            $this->form_validation->set_rules('Sec2B2_risk_reduction_by_who', 'Sec2B2 risk reduction by who', 'required');
            $this->form_validation->set_rules('Sec2B2_risk_reduction_by_when', 'Sec2B2 risk reduction by when', 'required');
            $this->form_validation->set_rules('Sec2B2_risk_reduction_action_completed', 'Sec2B2 risk reduction action completed', 'required');
            $this->form_validation->set_rules('Sec2B2_overall_assessment_risk_level_after', 'Sec2B2 overall assessment risk level after', 'required');
            $this->form_validation->set_rules('Sec3_requestor', 'Sec3 requestor', 'required');
            $this->form_validation->set_rules('Sec3_supervisor', 'Sec3 supervisor', 'required');
            $this->form_validation->set_rules('Sec3_supervisor_date', 'Sec3 supervisor date', 'required');
            $this->form_validation->set_rules('Sec3_LO', 'Sec3 LO', 'required');
            $this->form_validation->set_rules('Sec3_LO_date', 'Sec3_LO_date', 'required');*/
           
            
            
            
            
            if ($this->form_validation->run() == FALSE)
            {
                
                $this->load->template('procurement_view', $data);
                   
            }
            else
            {
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
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
                    'Sec2A3_storage_description' => $this->input->post('Sec2A3_storage_description'),
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
                    'Sec3_requestor_date' => $this->input->post('Sec3_requestor_date'),
                    'Sec3_supervisor' => $this->input->post('Sec3_supervisor'),
                    'Sec3_supervisor_date' => $this->input->post('Sec3_supervisor_date'),
                    'Sec3_LO' => $this->input->post('Sec3_LO'),
                    'Sec3_LO_date' => $this->input->post('Sec3_LO_date'),
                    'editable' => $editableValue
                    
                );
                
                
                if($this->procurement_model->update_applicant_data($appID, $data)){
                    
                   $this->notification_model->insert_new_notification(null, 4, "Pre-Purchase Material Risk Assessment Application Updated", "The following user has updated a Pre-Purchase Material Risk Assessment form: " . $this->session->userdata('account_name'));
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Form has been successfully updated!</div>', $data);
                   redirect('history/index');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('history/index');
                    
                    
                    
                }
                
            }
            
        }
        
    }
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class annex3 extends CI_Controller
    
    {
        
        function __construct()
        {
            parent::__construct();
            
            
            $this->load->database();
            $this->load->model('annex3_model');
            $this->load->model('notification_model');
            
            //breadcrumb
            $this->breadcrumbs->unshift('Home', '/');	
            $this->breadcrumbs->push('Incident Accident Reporting','/incidentaccidentreportingpage', true);
            $this->breadcrumbs->push('Living Modified Organism (LMO)','lmo61page',true);
            $this->breadcrumbs->push('Major Incident or Accident','majorincidentaccidentreportingpage',true);
            $this->breadcrumbs->push('Annex 3',true);
        }
        
        public function index()
        {
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('reference_no','Reference No.', 'required');
            $this->form_validation->set_rules('organization','Organization', 'required');
            $this->form_validation->set_rules('faculty','Faculty/Department', 'required');
            $this->form_validation->set_rules('laboratory','Laboratory', 'required');
            
            
            //PI/ LABORATORY PERSONEL INFORMATION
            $this->form_validation->set_rules('PI_name','PI/ Laboratory Personnel’s Name', 'required');
            $this->form_validation->set_rules('PI_telephone_number','Telephone', 'required|numeric');
            $this->form_validation->set_rules('PI_reported_date','DATE', 'required');
            $this->form_validation->set_rules('PI_reported_time','TIME', 'required');
            
            //IDENTIFY THE DIRECT AND CONTRIBUTING CAUSES OF THE INCIDENT
            $this->form_validation->set_rules('incident_description','Describe the incident','required');
            //checkbox data----here---missing
            $this->form_validation->set_rules('incident_contribution','Contributed to the incident', 'required');
            $this->form_validation->set_rules('incident_personal_factors','Personal factors', 'required');
            $this->form_validation->set_rules('incident_corrective_actions','Corrective actions', 'required');
            $this->form_validation->set_rules('incident_responsible','Responsible for implementing corrective actions', 'required');
            
            //signature
            $this->form_validation->set_rules('signature_PI_name','PI Name', 'required');
            $this->form_validation->set_rules('signature_PI_date','PI Date', 'required');

        
            if($this->form_validation->run()== FALSE) 
            {
                
                $data['error'] = "Somethings wrong";
                
                $this->load->template('annex3_view', $data);
            
            }
            
            else 
            {
                
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'reference_no' => $this->input->post('reference_no'),
                    'organization' => $this->input->post('organization'),
                    'faculty ' => $this->input->post('faculty'),
                    'laboratory' => $this->input->post('laboratory'),
                    'date' => $this->input->post('date'),
                    'PI_name' => $this->input->post('PI_name'),
                    'PI_telephone_number' => $this->input->post('PI_telephone_number'),
                    'PI_reported_date' => $this->input->post('PI_reported_date'),
                    'PI_reported_time' => $this->input->post('PI_reported_time'),
                    'incident_description' => $this->input->post('incident_description'),
                    'incident_cause_checklist_faulty_equipment' => $this->input->post('incident_cause_checklist_faulty_equipment'),
                    'incident_cause_checklist_no_equipment' => $this->input->post('incident_cause_checklist_no_equipment'),
                    'incident_cause_checklist_storage' => $this->input->post('incident_cause_checklist_storage'),
                    'incident_cause_checklist_weather' => $this->input->post('incident_cause_checklist_weather'),
                    'incident_cause_checklist_assistance' => $this->input->post('incident_cause_checklist_assistance'),
                    'incident_cause_checklist_electrical' => $this->input->post('incident_cause_checklist_electrical'),
                    'incident_cause_checklist_carelessness' => $this->input->post('incident_cause_checklist_carelessness'),
                    'incident_cause_checklist_terrain' => $this->input->post('incident_cause_checklist_terrain'),
                    'incident_cause_checklist_workspace' => $this->input->post('incident_cause_checklist_workspace'),
                    'incident_cause_checklist_training' => $this->input->post('incident_cause_checklist_training'),
                    'incident_cause_checklist_poor_access' => $this->input->post('incident_cause_checklist_poor_access'),
                    'incident_cause_checklist_unknown' => $this->input->post('incident_cause_checklist_unknown'),
                    'incident_cause_checklist_maintenance_staff' => $this->input->post('incident_cause_checklist_maintenance_staff'),
                    'incident_cause_checklist_supervision' => $this->input->post('incident_cause_checklist_supervision'),
                    'incident_cause_checklist_method' => $this->input->post('incident_cause_checklist_method'),
                    'incident_cause_checklist_none' => $this->input->post('incident_cause_checklist_none'),
                    'incident_cause_checklist_none_description' => $this->input->post('incident_cause_checklist_none_description'),
                    'incident_LMO_rDNA_release' => $this->input->post('incident_LMO_rDNA_release'),
                    'incident_LMO_rDNA_response' => $this->input->post('incident_LMO_rDNA_response'),
                    'incident_contribution' => $this->input->post('incident_contribution'),
                    'incident_personal_factors' => $this->input->post('incident_personal_factors'),
                    'incident_corrective_actions' => $this->input->post('incident_corrective_actions'),
                    'incident_responsible' => $this->input->post('incident_responsible'),
                    'signature_PI_name' => $this->input->post('signature_PI_name'),
                    'signature_PI_date' => $this->input->post('signature_PI_date'),
                    'signature_BO_name' => $this->input->post('signature_BO_name'),
                    'signature_BO_date' => $this->input->post('signature_BO_date'),
                    'signature_IBC_name' => $this->input->post('signature_IBC_name'),
                    'signature_IBC_date' => $this->input->post('signature_IBC_date'),
                    'IBC_approval' => $this->input->post('IBC_approval'),
                    'IBC_termination' => $this->input->post('IBC_termination'),
                    
                );
                
                
                if($this->annex3_model->insert_new_applicant_data($data)){
                    
                    $this->notification_model->insert_new_notification(null, 4, "New Annex 3 Application", "The following user has submitted a new Annex 3 form: " . $this->session->userdata('account_name'));
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Form has been successfully submitted!</div>', $data);
                    redirect('annex3/index');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('annex3/index');
                    
                    
                    
                }  
            }
            
        }
        
        public function load_form(){
            
            $data['readnotif'] = $this->notification_model->get_read($this->session->userdata('account_id'), $this->session->userdata('account_type'));
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            //$id = $this->uri->segment(3);
            $id = $this->input->get('id');
            $data['retrieved'] = $this->annex3_model->get_form_by_id($id);
            
            $this->load->template('annex3_view', $data);
            
        }
        
        public function update_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('reference_no','Reference No.', 'required');
            $this->form_validation->set_rules('organization','Organization', 'required');
            $this->form_validation->set_rules('faculty','Faculty/Department', 'required');
            $this->form_validation->set_rules('laboratory','Laboratory', 'required');
            
            
            //PI/ LABORATORY PERSONEL INFORMATION
            $this->form_validation->set_rules('PI_name','PI/ Laboratory Personnel’s Name', 'required');
            $this->form_validation->set_rules('PI_telephone_number','Telephone', 'required|numeric');
            $this->form_validation->set_rules('PI_reported_date','DATE', 'required');
            $this->form_validation->set_rules('PI_reported_time','TIME', 'required');
            
            //IDENTIFY THE DIRECT AND CONTRIBUTING CAUSES OF THE INCIDENT
            $this->form_validation->set_rules('incident_description','Describe the incident','required');
            //checkbox data----here---missing
            $this->form_validation->set_rules('incident_contribution','Contributed to the incident', 'required');
            $this->form_validation->set_rules('incident_personal_factors','Personal factors', 'required');
            $this->form_validation->set_rules('incident_corrective_actions','Corrective actions', 'required');
            $this->form_validation->set_rules('incident_responsible','Responsible for implementing corrective actions', 'required');
            
            //signature
            $this->form_validation->set_rules('signature_PI_name','PI Name', 'required');
            $this->form_validation->set_rules('signature_PI_date','PI Date', 'required');

        
            if($this->form_validation->run()== FALSE) 
            {
                
                $data['error'] = "Somethings wrong";
                
                $this->load->template('annex3_view', $data);
            
            }
            
            else 
            {
                
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'reference_no' => $this->input->post('reference_no'),
                    'organization' => $this->input->post('organization'),
                    'faculty ' => $this->input->post('faculty'),
                    'laboratory' => $this->input->post('laboratory'),
                    'date' => $this->input->post('date'),
                    'PI_name' => $this->input->post('PI_name'),
                    'PI_telephone_number' => $this->input->post('PI_telephone_number'),
                    'PI_reported_date' => $this->input->post('PI_reported_date'),
                    'PI_reported_time' => $this->input->post('PI_reported_time'),
                    'incident_description' => $this->input->post('incident_description'),
                    'incident_cause_checklist_faulty_equipment' => $this->input->post('incident_cause_checklist_faulty_equipment'),
                    'incident_cause_checklist_no_equipment' => $this->input->post('incident_cause_checklist_no_equipment'),
                    'incident_cause_checklist_storage' => $this->input->post('incident_cause_checklist_storage'),
                    'incident_cause_checklist_weather' => $this->input->post('incident_cause_checklist_weather'),
                    'incident_cause_checklist_assistance' => $this->input->post('incident_cause_checklist_assistance'),
                    'incident_cause_checklist_electrical' => $this->input->post('incident_cause_checklist_electrical'),
                    'incident_cause_checklist_carelessness' => $this->input->post('incident_cause_checklist_carelessness'),
                    'incident_cause_checklist_terrain' => $this->input->post('incident_cause_checklist_terrain'),
                    'incident_cause_checklist_workspace' => $this->input->post('incident_cause_checklist_workspace'),
                    'incident_cause_checklist_training' => $this->input->post('incident_cause_checklist_training'),
                    'incident_cause_checklist_poor_access' => $this->input->post('incident_cause_checklist_poor_access'),
                    'incident_cause_checklist_unknown' => $this->input->post('incident_cause_checklist_unknown'),
                    'incident_cause_checklist_maintenance_staff' => $this->input->post('incident_cause_checklist_maintenance_staff'),
                    'incident_cause_checklist_supervision' => $this->input->post('incident_cause_checklist_supervision'),
                    'incident_cause_checklist_method' => $this->input->post('incident_cause_checklist_method'),
                    'incident_cause_checklist_none' => $this->input->post('incident_cause_checklist_none'),
                    'incident_cause_checklist_none_description' => $this->input->post('incident_cause_checklist_none_description'),
                    'incident_LMO_rDNA_release' => $this->input->post('incident_LMO_rDNA_release'),
                    'incident_LMO_rDNA_response' => $this->input->post('incident_LMO_rDNA_response'),
                    'incident_contribution' => $this->input->post('incident_contribution'),
                    'incident_personal_factors' => $this->input->post('incident_personal_factors'),
                    'incident_corrective_actions' => $this->input->post('incident_corrective_actions'),
                    'incident_responsible' => $this->input->post('incident_responsible'),
                    'signature_PI_name' => $this->input->post('signature_PI_name'),
                    'signature_PI_date' => $this->input->post('signature_PI_date'),
                    'signature_BO_name' => $this->input->post('signature_BO_name'),
                    'signature_BO_date' => $this->input->post('signature_BO_date'),
                    'signature_IBC_name' => $this->input->post('signature_IBC_name'),
                    'signature_IBC_date' => $this->input->post('signature_IBC_date'),
                    'IBC_approval' => $this->input->post('IBC_approval'),
                    'IBC_termination' => $this->input->post('IBC_termination'),
                    'editable' => $editableValue
                );
                
                
                if($this->annex3_model->update_applicant_data($appID, $data)){
                
                    $this->notification_model->insert_new_notification(null, 4, "Annex 3 Application Updated", "The following user has updated an Annex 3 form: " . $this->session->userdata('account_name'));
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Form has been successfully updated!</div>', $data);
                    redirect('history/index');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('history/index');
                    
                    
                    
                }  
            }
            
            
        }
        
        
        public function fullname_check($str) {
            
            if (!preg_match('/^([a-z0-9 ])+$/i', $str)) {
                $this->form_validation->set_message('fullname_check', 'The %s field can only be alphanumerical');
                return FALSE;
            } else {
                return TRUE;
            }
        }
        
    }
?>
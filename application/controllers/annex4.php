<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class annex4 extends CI_Controller{
        
        function __construct()
        {
            parent::__construct();
            
            
            $this->load->database();
            $this->load->model('annex4_model');
            $this->load->model('notification_model');
            
            //breadcrum
            $this->breadcrumbs->unshift('Home', '/');	
            $this->breadcrumbs->push('Incident Accident Reporting','/incidentaccidentreportingpage', true);
            $this->breadcrumbs->push('Living Modified Organism (LMO)','lmo61page',true);
            $this->breadcrumbs->push('Occupational disease or exposure','occupationaldiseaseexposurepage',true);
            $this->breadcrumbs->push('Annex 4',true);
        }
        
        public function index()
        {
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('reference_no','Reference No.', 'required');
            $this->form_validation->set_rules('personnel_name','personnel name', 'required');
            $this->form_validation->set_rules('personnel_NRIC','personnel NRIC', 'required');
            $this->form_validation->set_rules('personnel_age','personnel age', 'required');
            $this->form_validation->set_rules('personnel_race','personnel race', 'required');
            $this->form_validation->set_rules('personnel_telephone_number','personnel telephone number', 'required');
            $this->form_validation->set_rules('personnel_office_number','personnel office number', 'required');
            $this->form_validation->set_rules('personnel_ext_number','personnel ext number', 'required');
            $this->form_validation->set_rules('personnel_employment_job','personnel employment job','required');
            $this->form_validation->set_rules('personnel_employment_faculty','personnel employment faculty', 'required');
            $this->form_validation->set_rules('personnel_employment_duration','personnel employment duration', 'required');
            $this->form_validation->set_rules('exposure_location','exposure location', 'required');
            $this->form_validation->set_rules('exposure_date','exposure date', 'required');
            $this->form_validation->set_rules('exposure_diagnosis','exposure diagnosis', 'required');
            $this->form_validation->set_rules('exposure_treatment','exposure treatment', 'required');
            $this->form_validation->set_rules('exposure_medical_cert_duration','exposure medical cert duration', 'required');
            $this->form_validation->set_rules('exposure_work_description','exposure work description', 'required');
            $this->form_validation->set_rules('exposure_hazard_or_agent','exposure hazard or agent', 'required');
            $this->form_validation->set_rules('exposure_duration','exposure duration', 'required');
            $this->form_validation->set_rules('exposure_symptoms','exposure symptoms', 'required');
            //$this->form_validation->set_rules('exposure_symptoms_duration','exposure symptoms duration', 'required');
            $this->form_validation->set_rules('signature_PI_name','signature PI name', 'required');
            $this->form_validation->set_rules('signature_PI_date','signature PI date', 'required');

        
            if($this->form_validation->run()== FALSE) 
            {
                
                //$data['load'] = "true";
                //$id = 1;
                //$data['retrieved'] = $this->annex2_model->get_form_by_id($id);
                
                //$data['error'] = "Somethings wrong";
                
                $this->load->template('annex4_view', $data);
            
            }
            
            else 
            {
                
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'reference_no' => $this->input->post('reference_no'),
                    'personnel_name' => $this->input->post('personnel_name'),
                    'personnel_NRIC ' => $this->input->post('personnel_NRIC'),
                    'personnel_age' => $this->input->post('personnel_age'),
                    'personnel_race' => $this->input->post('personnel_race'),
                    'personnel_telephone_number' => $this->input->post('personnel_telephone_number'),
                    'personnel_office_number' => $this->input->post('personnel_office_number'),
                    'personnel_ext_number' => $this->input->post('personnel_ext_number'),
                    'personnel_employment_job' => $this->input->post('personnel_employment_job'),
                    'personnel_employment_faculty' => $this->input->post('personnel_employment_faculty'),
                    'personnel_employment_status' => $this->input->post('personnel_employment_status'),
                    'personnel_employment_duration' => $this->input->post('personnel_employment_duration'),
                    'exposure_location' => $this->input->post('exposure_location'),
                    'exposure_date' => $this->input->post('exposure_date'),
                    'exposure_time' => $this->input->post('exposure_time'),
                    'exposure_diagnosis' => $this->input->post('exposure_diagnosis'),
                    'exposure_treatment' => $this->input->post('exposure_treatment'),
                    'exposure_medical_cert' => $this->input->post('exposure_medical_cert'),
                    'exposure_medical_cert_duration' => $this->input->post('exposure_medical_cert_duration'),
                    'exposure_work_description' => $this->input->post('exposure_work_description'),
                    'exposure_hazard_or_agent' => $this->input->post('exposure_hazard_or_agent'),
                    'exposure_duration' => $this->input->post('exposure_duration'),
                    'exposure_symptoms' => $this->input->post('exposure_symptoms'),
                    //'exposure_symptoms_duration' => $this->input->post('exposure_symptoms_duration'),
                    'signature_PI_name' => $this->input->post('signature_PI_name'),
                    'signature_PI_date' => $this->input->post('signature_PI_date'),
                    'signature_BO_name' => $this->input->post('signature_BO_name'),
                    'signature_BO_date' => $this->input->post('signature_BO_date'),
                    'signature_IBC_name' => $this->input->post('signature_IBC_name'),
                    'signature_IBC_date' => $this->input->post('signature_IBC_date'),
                    'IBC_approval' => $this->input->post('IBC_approval'),
                    'IBC_termination' => $this->input->post('IBC_termination')
                );
                
                
                if($this->annex4_model->insert_new_applicant_data($data)){
                    
                    $this->notification_model->insert_new_notification(null, 4, "New Annex 4 Application", "The following user has submitted a new Annex 4 form: " . $this->session->userdata('account_name'));
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Form has been successfully submitted!</div>', $data);
                    
                    redirect('annex4/index');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('annex4/index');
                    
                    
                    
                }  
            }
            
        }
        
        public function load_form(){
            
            $data['readnotif'] = $this->notification_model->get_read($this->session->userdata('account_id'), $this->session->userdata('account_type'));
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            //$id = $this->uri->segment(3);
            $id = $this->input->get('id');
            $data['retrieved'] = $this->annex4_model->get_form_by_id($id);
            
            $this->load->template('annex4_view', $data);
            
        }
        
        public function update_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('reference_no','Reference No.', 'required');
            $this->form_validation->set_rules('personnel_name','personnel name', 'required');
            $this->form_validation->set_rules('personnel_NRIC','personnel NRIC', 'required');
            $this->form_validation->set_rules('personnel_age','personnel age', 'required');
            $this->form_validation->set_rules('personnel_race','personnel race', 'required');
            $this->form_validation->set_rules('personnel_telephone_number','personnel telephone number', 'required');
            $this->form_validation->set_rules('personnel_office_number','personnel office number', 'required');
            $this->form_validation->set_rules('personnel_ext_number','personnel ext number', 'required');
            $this->form_validation->set_rules('personnel_employment_job','personnel employment job','required');
            $this->form_validation->set_rules('personnel_employment_faculty','personnel employment faculty', 'required');
            $this->form_validation->set_rules('personnel_employment_duration','personnel employment duration', 'required');
            $this->form_validation->set_rules('exposure_location','exposure location', 'required');
            $this->form_validation->set_rules('exposure_date','exposure date', 'required');
            $this->form_validation->set_rules('exposure_diagnosis','exposure diagnosis', 'required');
            $this->form_validation->set_rules('exposure_treatment','exposure treatment', 'required');
            $this->form_validation->set_rules('exposure_medical_cert_duration','exposure medical cert duration', 'required');
            $this->form_validation->set_rules('exposure_work_description','exposure work description', 'required');
            $this->form_validation->set_rules('exposure_hazard_or_agent','exposure hazard or agent', 'required');
            $this->form_validation->set_rules('exposure_duration','exposure duration', 'required');
            $this->form_validation->set_rules('exposure_symptoms','exposure symptoms', 'required');
            //$this->form_validation->set_rules('exposure_symptoms_duration','exposure symptoms duration', 'required');
            $this->form_validation->set_rules('signature_PI_name','signature PI name', 'required');
            $this->form_validation->set_rules('signature_PI_date','signature PI date', 'required');

        
            if($this->form_validation->run()== FALSE) 
            {
                
                $this->load->template('annex4_view', $data);
            
            }
            
            else 
            {
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'reference_no' => $this->input->post('reference_no'),
                    'personnel_name' => $this->input->post('personnel_name'),
                    'personnel_NRIC ' => $this->input->post('personnel_NRIC'),
                    'personnel_age' => $this->input->post('personnel_age'),
                    'personnel_race' => $this->input->post('personnel_race'),
                    'personnel_telephone_number' => $this->input->post('personnel_telephone_number'),
                    'personnel_office_number' => $this->input->post('personnel_office_number'),
                    'personnel_ext_number' => $this->input->post('personnel_ext_number'),
                    'personnel_employment_job' => $this->input->post('personnel_employment_job'),
                    'personnel_employment_faculty' => $this->input->post('personnel_employment_faculty'),
                    'personnel_employment_status' => $this->input->post('personnel_employment_status'),
                    'personnel_employment_duration' => $this->input->post('personnel_employment_duration'),
                    'exposure_location' => $this->input->post('exposure_location'),
                    'exposure_date' => $this->input->post('exposure_date'),
                    'exposure_time' => $this->input->post('exposure_time'),
                    'exposure_diagnosis' => $this->input->post('exposure_diagnosis'),
                    'exposure_treatment' => $this->input->post('exposure_treatment'),
                    'exposure_medical_cert' => $this->input->post('exposure_medical_cert'),
                    'exposure_medical_cert_duration' => $this->input->post('exposure_medical_cert_duration'),
                    'exposure_work_description' => $this->input->post('exposure_work_description'),
                    'exposure_hazard_or_agent' => $this->input->post('exposure_hazard_or_agent'),
                    'exposure_duration' => $this->input->post('exposure_duration'),
                    'exposure_symptoms' => $this->input->post('exposure_symptoms'),
                    //'exposure_symptoms_duration' => $this->input->post('exposure_symptoms_duration'),
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
                
                
                if($this->annex4_model->update_applicant_data($appID, $data)){
                    
                    $this->notification_model->insert_new_notification(null, 4, "Annex 4 Application Updated", "The following user has updated an Annex 4 form: " . $this->session->userdata('account_name'));
                    
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class formf extends CI_Controller
    {
        
        function __construct()
        {
            parent::__construct();

            
            $this->load->database();
            $this->load->model('formf_model');
			$this->load->model('notification_model');
            
        }
        
        public function index()
        {

            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            //echo 'Form validation testing OK';
            $this->form_validation->set_rules('exporter_organization','Organization', 'required');
            $this->form_validation->set_rules('exporter_name','Name of Applicant', 'required|callback_fullname_check');
            $this->form_validation->set_rules('exporter_position','Position in Organization', 'required');
            $this->form_validation->set_rules('exporter_telephone_office','Telephone (office)', 'required');
            $this->form_validation->set_rules('exporter_telephone_mobile','Telephone (mobile)', 'required');
            $this->form_validation->set_rules('exporter_fax','Fax number', 'required');
            $this->form_validation->set_rules('exporter_email_address','Email', 'required|valid_email');
            $this->form_validation->set_rules('exporter_postal_address','Postal Address', 'required');          
            $this->form_validation->set_rules('LMO_description','Description of LMO', 'required');
            $this->form_validation->set_rules('LMO_type_description','LMO Type', 'required');
            $this->form_validation->set_rules('LMO_identification','Identification of LMO', 'required');
            $this->form_validation->set_rules('LMO_scientific_name','Scientific name', 'required');
            $this->form_validation->set_rules('LMO_trait','Introduced Trait', 'required');
            $this->form_validation->set_rules('LMO_intended_usage','Intended use of LMO', 'required');
            $this->form_validation->set_rules('LMO_export_form','Describe form', 'required');
            $this->form_validation->set_rules('LMO_export_mode_description','Mode of export', 'required');
            $this->form_validation->set_rules('LMO_point_of_exit','Point of exit', 'required');
            $this->form_validation->set_rules('LMO_methods','Suggested methods', 'required');
            $this->form_validation->set_rules('import_country_name','Name of importing country', 'required');
            //$this->form_validation->set_rules('import_evidence','Evidence', 'required');
            $this->form_validation->set_rules('export_import_CBI','Section information', 'required');
            $this->form_validation->set_rules('applicant_signature_date','Date', 'required');
            $this->form_validation->set_rules('applicant_name','Name', 'required|callback_fullname_check');
            //$this->form_validation->set_rules('applicant_stamp','Official Stamp', 'required');
            
            //Head of organization/ Authorized Representative:
            $this->form_validation->set_rules('representative_signature_date','Date', 'required');
            $this->form_validation->set_rules('representative_name','Name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('representative_stamp','Official Stamp', 'required');
                        
            
            if($this->form_validation->run()== FALSE) 
            {
                
                $this->load->template('formf_view', $data);
            
            }
            else {
                
                $data = array(
                    
                    'account_id' => $this->session->userdata('account_id'),
                    'notification_checklist_form_completed' => $this->input->post('notification_checklist_form_completed'),
                    'notification_checklist_CBI' => $this->input->post('notification_checklist_CBI'),
                    'notification_checklist_submitted' => $this->input->post('notification_checklist_submitted'),
                    'exporter_organization' => $this->input->post('exporter_organization'),
                    'exporter_name' => $this->input->post('exporter_name'),
                    'exporter_position' => $this->input->post('exporter_position'),
                    'exporter_telephone_office' => $this->input->post('exporter_telephone_office'),
                    'exporter_telephone_mobile' => $this->input->post('exporter_telephone_mobile'),
                    'exporter_fax' => $this->input->post('exporter_fax'),
                    'exporter_email_address' => $this->input->post('exporter_email_address'),
                    'exporter_postal_address' => $this->input->post('exporter_postal_address'),
                    'LMO_description' => $this->input->post('LMO_description'),
                    'LMO_type_description' => $this->input->post('LMO_type_description'),
                    'LMO_identification' => $this->input->post('LMO_identification'),
                    'LMO_scientific_name' => $this->input->post('LMO_scientific_name'),
                    'LMO_trait' => $this->input->post('LMO_trait'),
                    'LMO_intended_usage' => $this->input->post('LMO_intended_usage'),
                    'LMO_export_form' => $this->input->post('LMO_export_form'),
                    'LMO_export_mode_description' => $this->input->post('LMO_export_mode_description'),
                    'LMO_point_of_exit' => $this->input->post('LMO_point_of_exit'),
                    'LMO_methods' => $this->input->post('LMO_methods'),
                    'import_country_name' => $this->input->post('import_country_name'),
                    'import_evidence' => $this->input->post('import_evidence'),
                    'export_import_CBI' => $this->input->post('export_import_CBI'),
                    'applicant_signature_date' => $this->input->post('applicant_signature_date'),
                    'applicant_name' => $this->session->userdata('account_name'),
                    'applicant_stamp' => $this->input->post('applicant_stamp'),
                    'representative_signature_date' => $this->input->post('representative_signature_date'),
                    'representative_name' => $this->input->post('representative_name'),
                    'representative_stamp' => $this->input->post('representative_stamp')
                );
                
                 if($this->formf_model->insert_new_applicant_data($data))
                    {
                    
                        $this->notification_model->insert_new_notification(null, 4, "New Form F Application", "The following user has submitted a new Form F: " . $this->session->userdata('account_name'));
                    
                        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Form has been successfully submitted!</div>', $data);
                       redirect('formf/index');
                     
                    } 
                else 
                    {                    
                       $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                       redirect('formf/index');     
                    } 
            }
            
        }
        
        public function load_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            //$id = $this->uri->segment(3);
            $id = $this->input->get('id');
            $data['retrieved'] = $this->formf_model->get_form_by_id($id);
            
            $this->load->template('formf_view', $data);
            
        }
        
        public function update_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            //echo 'Form validation testing OK';
            $this->form_validation->set_rules('exporter_organization','Organization', 'required');
            $this->form_validation->set_rules('exporter_name','Name of Applicant', 'required|callback_fullname_check');
            $this->form_validation->set_rules('exporter_position','Position in Organization', 'required');
            $this->form_validation->set_rules('exporter_telephone_office','Telephone (office)', 'required');
            $this->form_validation->set_rules('exporter_telephone_mobile','Telephone (mobile)', 'required');
            $this->form_validation->set_rules('exporter_fax','Fax number', 'required');
            $this->form_validation->set_rules('exporter_email_address','Email', 'required|valid_email');
            $this->form_validation->set_rules('exporter_postal_address','Postal Address', 'required');          
            $this->form_validation->set_rules('LMO_description','Description of LMO', 'required');
            $this->form_validation->set_rules('LMO_type_description','LMO Type', 'required');
            $this->form_validation->set_rules('LMO_identification','Identification of LMO', 'required');
            $this->form_validation->set_rules('LMO_scientific_name','Scientific name', 'required');
            $this->form_validation->set_rules('LMO_trait','Introduced Trait', 'required');
            $this->form_validation->set_rules('LMO_intended_usage','Intended use of LMO', 'required');
            $this->form_validation->set_rules('LMO_export_form','Describe form', 'required');
            $this->form_validation->set_rules('LMO_export_mode_description','Mode of export', 'required');
            $this->form_validation->set_rules('LMO_point_of_exit','Point of exit', 'required');
            $this->form_validation->set_rules('LMO_methods','Suggested methods', 'required');
            $this->form_validation->set_rules('import_country_name','Name of importing country', 'required');
            //$this->form_validation->set_rules('import_evidence','Evidence', 'required');
            $this->form_validation->set_rules('export_import_CBI','Section information', 'required');
            $this->form_validation->set_rules('applicant_signature_date','Date', 'required');
            $this->form_validation->set_rules('applicant_name','Name', 'required|callback_fullname_check');
            //$this->form_validation->set_rules('applicant_stamp','Official Stamp', 'required');
            
            //Head of organization/ Authorized Representative:
            $this->form_validation->set_rules('representative_signature_date','Date', 'required');
            $this->form_validation->set_rules('representative_name','Name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('representative_stamp','Official Stamp', 'required');
                        
            
            if($this->form_validation->run()== FALSE) 
            {
                
                $this->load->template('formf_view', $data);
            
            }
            else {
                
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                $data = array(
                    
                    'account_id' => $this->session->userdata('account_id'),
                    'notification_checklist_form_completed' => $this->input->post('notification_checklist_form_completed'),
                    'notification_checklist_CBI' => $this->input->post('notification_checklist_CBI'),
                    'notification_checklist_submitted' => $this->input->post('notification_checklist_submitted'),
                    'exporter_organization' => $this->input->post('exporter_organization'),
                    'exporter_name' => $this->input->post('exporter_name'),
                    'exporter_position' => $this->input->post('exporter_position'),
                    'exporter_telephone_office' => $this->input->post('exporter_telephone_office'),
                    'exporter_telephone_mobile' => $this->input->post('exporter_telephone_mobile'),
                    'exporter_fax' => $this->input->post('exporter_fax'),
                    'exporter_email_address' => $this->input->post('exporter_email_address'),
                    'exporter_postal_address' => $this->input->post('exporter_postal_address'),
                    'LMO_description' => $this->input->post('LMO_description'),
                    'LMO_type_description' => $this->input->post('LMO_type_description'),
                    'LMO_identification' => $this->input->post('LMO_identification'),
                    'LMO_scientific_name' => $this->input->post('LMO_scientific_name'),
                    'LMO_trait' => $this->input->post('LMO_trait'),
                    'LMO_intended_usage' => $this->input->post('LMO_intended_usage'),
                    'LMO_export_form' => $this->input->post('LMO_export_form'),
                    'LMO_export_mode_description' => $this->input->post('LMO_export_mode_description'),
                    'LMO_point_of_exit' => $this->input->post('LMO_point_of_exit'),
                    'LMO_methods' => $this->input->post('LMO_methods'),
                    'import_country_name' => $this->input->post('import_country_name'),
                    'import_evidence' => $this->input->post('import_evidence'),
                    'export_import_CBI' => $this->input->post('export_import_CBI'),
                    'applicant_signature_date' => $this->input->post('applicant_signature_date'),
                    'applicant_name' => $this->session->userdata('account_name'),
                    'applicant_stamp' => $this->input->post('applicant_stamp'),
                    'representative_signature_date' => $this->input->post('representative_signature_date'),
                    'representative_name' => $this->input->post('representative_name'),
                    'representative_stamp' => $this->input->post('representative_stamp'),
                    'editable' => $editableValue
                );
                
                 if($this->formf_model->update_applicant_data($appID, $data))
                    {
                    
                        $this->notification_model->insert_new_notification(null, 4, "Form F Application Updated", "The following user has updated a Form F: " . $this->session->userdata('account_name'));
                    
                        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Form has been successfully updated!</div>', $data);

                       redirect('history/index');
                     
                    } 
                else 
                    {                    
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
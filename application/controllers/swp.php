<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class swp extends CI_Controller{
		
        function __construct()
        {
            parent::__construct();

            $this->load->database();
            $this->load->model('swp_model');
            $this->load->model('notification_model');
        }
        
        public function index(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['hirarctype']= $this->input->get('type');
            if ($data['hirarctype']= $this->input->get('type') ==1) {
                //breadcrumb page 1
                $this->breadcrumbs->unshift('Home', '/');	
                $this->breadcrumbs->push('Application','/applicationpage', true);
                $this->breadcrumbs->push('New Application','/newapplicationpage', true);
                $this->breadcrumbs->push('Living Modified Organism','/livingmodifiedorganismpage',true);
                $this->breadcrumbs->push('SAFE WORK PROCEDURE', true);
            }else if ($data['hirarctype']= $this->input->get('type') ==2){
                //breadcrumb page 2
                $this->breadcrumbs->unshift('Home', '/');	
                $this->breadcrumbs->push('Application','/applicationpage', true);
                $this->breadcrumbs->push('New Application','/newapplicationpage', true);
                $this->breadcrumbs->push('Exempt Dealing','/exemptdealingpage',true);
                $this->breadcrumbs->push('SAFE WORK PROCEDURE', true);
                
            }else if ($data['hirarctype']= $this->input->get('type') ==3){
                //breadcrumb page 3
                $this->breadcrumbs->unshift('Home', '/');	
                $this->breadcrumbs->push('Application','/applicationpage', true);
                $this->breadcrumbs->push('New Application','/newapplicationpage', true);
                $this->breadcrumbs->push('Biohazardous Material','/biohazardous_materialpage',true);
                $this->breadcrumbs->push('SAFE WORK PROCEDURE', true);
            }else{
                //breadcrumb page 4
                $this->breadcrumbs->unshift('Home', '/');
                $this->breadcrumbs->push('SAFE WORK PROCEDURE', true);
            }
            
            $this->form_validation->set_rules('SWP_prepared_by', 'Staff/student_no', 'required');
            $this->form_validation->set_rules('SWP_staff_student_no', 'Staff/student_no', 'required');
            $this->form_validation->set_rules('SWP_designation', 'Designation', 'required');
            $this->form_validation->set_rules('SWP_faculty', 'Faculty', 'required');
            $this->form_validation->set_rules('SWP_unit_title', 'Unit title', 'required');
            $this->form_validation->set_rules('SWP_project_title', 'Project Title', 'required');
            $this->form_validation->set_rules('SWP_location', 'Location', 'required');
            $this->form_validation->set_rules('SWP_description', 'Description', 'required');
            $this->form_validation->set_rules('SWP_preoperational', 'Pre-operational', 'required');
            $this->form_validation->set_rules('SWP_operational', 'Operational', 'required');
            $this->form_validation->set_rules('SWP_postoperational', 'Post-operational', 'required');
            $this->form_validation->set_rules('SWP_risk', 'risk', 'required');
            $this->form_validation->set_rules('SWP_control', 'Control', 'required');
            $this->form_validation->set_rules('SWP_declaration_name', 'Declaration name', 'required');
            $this->form_validation->set_rules('SWP_declaration_date', 'Decalaration date', 'required');
            $this->form_validation->set_rules('SWP_signature_prepared_by', 'Prepared by date', 'required');
            $this->form_validation->set_rules('SWP_signature_PI', 'Verified by PI', 'required');
            $this->form_validation->set_rules('SWP_signature_prepared_by_date', 'Prepared by date', 'required');
            $this->form_validation->set_rules('SWP_signature_PI_date', 'Verified by PI date', 'required');
           
            
            
            
            
            if ($this->form_validation->run() == FALSE)
            {
                
                $this->load->template('swp_view', $data);
                
            }
            else
            {
                
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
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
                    'application_type' => $this->input->post('application_type')
                    
                );
                
                
                if($this->swp_model->insert_new_applicant_data($data)){
                    
                   $this->notification_model->insert_new_notification(null, 4, "New SAFE WORK PROCEDURE Application", "The following user has submitted a new SAFE WORK PROCEDURE form: " . $this->session->userdata('account_name'));
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Form has been successfully submitted!</div>', $data);
                   redirect('swp/index');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('swp/index');
                    
                    
                    
                }
                
            }
            
        }
        
        public function load_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['hirarctype']= $this->input->get('type');
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            //$id = '$this->session->userdata('account_id')';
            //$id = $this->uri->segment(3);
            $id = $this->input->get('id');
            $data['retrieved'] = $this->swp_model->get_form_by_id($id);
            
            $this->load->template('swp_view', $data);

        }
        
        public function update_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['hirarctype']= $this->input->get('type');
            
            $this->form_validation->set_rules('SWP_prepared_by', 'Staff/student_no', 'required');
            $this->form_validation->set_rules('SWP_staff_student_no', 'Staff/student_no', 'required');
            $this->form_validation->set_rules('SWP_designation', 'Designation', 'required');
            $this->form_validation->set_rules('SWP_faculty', 'Faculty', 'required');
            $this->form_validation->set_rules('SWP_unit_title', 'Unit title', 'required');
            $this->form_validation->set_rules('SWP_project_title', 'Project Title', 'required');
            $this->form_validation->set_rules('SWP_location', 'Location', 'required');
            $this->form_validation->set_rules('SWP_description', 'Description', 'required');
            $this->form_validation->set_rules('SWP_preoperational', 'Pre-operational', 'required');
            $this->form_validation->set_rules('SWP_operational', 'Operational', 'required');
            $this->form_validation->set_rules('SWP_postoperational', 'Post-operational', 'required');
            $this->form_validation->set_rules('SWP_risk', 'risk', 'required');
            $this->form_validation->set_rules('SWP_control', 'Control', 'required');
            $this->form_validation->set_rules('SWP_declaration_name', 'Declaration name', 'required');
            $this->form_validation->set_rules('SWP_declaration_date', 'Decalaration date', 'required');
            $this->form_validation->set_rules('SWP_signature_prepared_by', 'Prepared by date', 'required');
            $this->form_validation->set_rules('SWP_signature_PI', 'Verified by PI', 'required');
            $this->form_validation->set_rules('SWP_signature_prepared_by_date', 'Prepared by date', 'required');
            $this->form_validation->set_rules('SWP_signature_PI_date', 'Verified by PI date', 'required');
           
            
            
            
            
            if ($this->form_validation->run() == FALSE)
            {
                
                $this->load->template('swp_view', $data);
                
            }
            else
            {
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
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
                    'editable' => $editableValue
                    
                );
                
                
                if($this->swp_model->update_applicant_data($appID, $data)){
                    
                    $this->notification_model->insert_new_notification(null, 4, "SAFE WORK PROCEDURE Application Updated", "The following user has updated a SAFE WORK PROCEDURE form: " . $this->session->userdata('account_name'));
                    
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
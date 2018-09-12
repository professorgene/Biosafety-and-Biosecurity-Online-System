<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class hirarc extends CI_Controller{
        
        function __construct()
        {
            parent::__construct();

            $this->load->database();
            $this->load->model('hirarc_model');
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
                $this->breadcrumbs->push('OHS-F-4.5.X HIRARC Form', true);
            }else if ($data['hirarctype']= $this->input->get('type') ==2){
                //breadcrumb page 2
                $this->breadcrumbs->unshift('Home', '/');	
                $this->breadcrumbs->push('Application','/applicationpage', true);
                $this->breadcrumbs->push('New Application','/newapplicationpage', true);
                $this->breadcrumbs->push('Exempt Dealing','/exemptdealingpage',true);
                $this->breadcrumbs->push('OHS-F-4.5.X HIRARC Form', true);
                
            }else if ($data['hirarctype']= $this->input->get('type') ==3){
                //breadcrumb page 3
                $this->breadcrumbs->unshift('Home', '/');	
                $this->breadcrumbs->push('Application','/applicationpage', true);
                $this->breadcrumbs->push('New Application','/newapplicationpage', true);
                $this->breadcrumbs->push('Biohazardous Material','/biohazardous_materialpage',true);
                $this->breadcrumbs->push('OHS-F-4.5.X HIRARC Form', true);
            }else{
                //breadcrumb page 4
                $this->breadcrumbs->unshift('Home', '/');
                $this->breadcrumbs->push('OHS-F-4.5.X HIRARC Form', true);
            }
                
                
                
            
            $this->form_validation->set_rules('company_name', 'Company name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('date', 'Date', 'required');
            $this->form_validation->set_rules('process_location', 'Process location', 'required');
            $this->form_validation->set_rules('conducted_name', 'Conducted by who', 'required');
            $this->form_validation->set_rules('conducted_designation', 'Conducted by (designation)', 'required');
            $this->form_validation->set_rules('approved_name', 'Approver name', 'required');
            $this->form_validation->set_rules('approved_designation', 'Approver designation', 'required');
            $this->form_validation->set_rules('date_from', 'Date from', 'required');
            $this->form_validation->set_rules('date_to', 'Date to', 'required');
            $this->form_validation->set_rules('review_date', 'Review date', 'required');
            $this->form_validation->set_rules('HIRARC_activity[0]', 'Work Activity', 'required');
            $this->form_validation->set_rules('HIRARC_hazard[0]', 'Hazard', 'required');
            $this->form_validation->set_rules('HIRARC_effects[0]', 'cause/effect', 'required');
            $this->form_validation->set_rules('HIRARC_risk_control[0]', 'Risk Control', 'required');
            $this->form_validation->set_rules('HIRARC_LLH[0]', 'LLH', 'required');
            $this->form_validation->set_rules('HIRARC_SEV[0]', 'SEV', 'required');
            $this->form_validation->set_rules('HIRARC_RR[0]', 'RR', 'required');
            $this->form_validation->set_rules('HIRARC_control_measure[0]', 'Control measure', 'required');
            $this->form_validation->set_rules('HIRARC_PIC[0]', 'Due date', 'required');
            
            
            
            

            
            if ($this->form_validation->run() == FALSE)
            {
                
                $this->load->template('hirarc_view', $data);

            }
            else
            {
                $ar1 = implode(',',$this->input->post('HIRARC_activity'));
                $ar2 = implode(',',$this->input->post('HIRARC_hazard'));
                $ar3 = implode(',',$this->input->post('HIRARC_effects'));
                $ar4 = implode(',',$this->input->post('HIRARC_risk_control'));
                $ar5 = implode(',',$this->input->post('HIRARC_LLH'));
                $ar6 = implode(',',$this->input->post('HIRARC_SEV'));
                $ar7 = implode(',',$this->input->post('HIRARC_RR'));
                $ar8 = implode(',',$this->input->post('HIRARC_control_measure'));
                $ar9 = implode(',',$this->input->post('HIRARC_PIC'));
                
                
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
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
                    'HIRARC_activity' => $ar1,
                    'HIRARC_hazard' => $ar2,
                    'HIRARC_effects' => $ar3,
                    'HIRARC_risk_control' => $ar4,
                    'HIRARC_LLH' => $ar5,
                    'HIRARC_SEV' => $ar6,
                    'HIRARC_RR' => $ar7,
                    'HIRARC_control_measure' => $ar8,
                    'HIRARC_PIC' => $ar9,
                    'application_type' => $this->input->post('application_type')
                );
                
                
                if($this->hirarc_model->insert_new_applicant_data($data)){
                    
                   $this->notification_model->insert_new_notification(null, 4, "New HIRARC Form Application", "The following user has submitted a new HIRARC Form: " . $this->session->userdata('account_name'));
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Form has been successfully submitted!</div>', $data);
                   redirect('hirarc/index');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('hirarc/index');
                    
                    
                    
                }
                
            }
            
        }
			
        
        public function load_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['hirarctype']= $this->input->get('type');
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            //$id = $this->session->userdata('account_id');
            //$id = $this->uri->segment(3);
            $id = $this->input->get('id');
            $data['retrieved'] = $this->hirarc_model->get_form_by_id($id);
            
            $this->load->template('hirarc_view', $data);
            
        }
        
        public function update_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['hirarctype']= $this->input->get('type');
               
            
            $this->form_validation->set_rules('company_name', 'Company name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('date', 'Date', 'required');
            $this->form_validation->set_rules('process_location', 'Process location', 'required');
            $this->form_validation->set_rules('conducted_name', 'Conducted by who', 'required');
            $this->form_validation->set_rules('conducted_designation', 'Conducted by (designation)', 'required');
            $this->form_validation->set_rules('approved_name', 'Approver name', 'required');
            $this->form_validation->set_rules('approved_designation', 'Approver designation', 'required');
            $this->form_validation->set_rules('date_from', 'Date from', 'required');
            $this->form_validation->set_rules('date_to', 'Date to', 'required');
            $this->form_validation->set_rules('review_date', 'Review date', 'required');
            $this->form_validation->set_rules('HIRARC_activity[0]', 'Work Activity', 'required');
            $this->form_validation->set_rules('HIRARC_hazard[0]', 'Hazard', 'required');
            $this->form_validation->set_rules('HIRARC_effects[0]', 'cause/effect', 'required');
            $this->form_validation->set_rules('HIRARC_risk_control[0]', 'Risk Control', 'required');
            $this->form_validation->set_rules('HIRARC_LLH[0]', 'LLH', 'required');
            $this->form_validation->set_rules('HIRARC_SEV[0]', 'SEV', 'required');
            $this->form_validation->set_rules('HIRARC_RR[0]', 'RR', 'required');
            $this->form_validation->set_rules('HIRARC_control_measure[0]', 'Control measure', 'required');
            $this->form_validation->set_rules('HIRARC_PIC[0]', 'Due date', 'required');
            
            
            
            

            
            if ($this->form_validation->run() == FALSE)
            {
                
                $this->load->template('hirarc_view', $data);

            }
            else
            {
                $ar1 = implode(',',$this->input->post('HIRARC_activity'));
                $ar2 = implode(',',$this->input->post('HIRARC_hazard'));
                $ar3 = implode(',',$this->input->post('HIRARC_effects'));
                $ar4 = implode(',',$this->input->post('HIRARC_risk_control'));
                $ar5 = implode(',',$this->input->post('HIRARC_LLH'));
                $ar6 = implode(',',$this->input->post('HIRARC_SEV'));
                $ar7 = implode(',',$this->input->post('HIRARC_RR'));
                $ar8 = implode(',',$this->input->post('HIRARC_control_measure'));
                $ar9 = implode(',',$this->input->post('HIRARC_PIC'));
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
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
                    'HIRARC_activity' => $ar1,
                    'HIRARC_hazard' => $ar2,
                    'HIRARC_effects' => $ar3,
                    'HIRARC_risk_control' => $ar4,
                    'HIRARC_LLH' => $ar5,
                    'HIRARC_SEV' => $ar6,
                    'HIRARC_RR' => $ar7,
                    'HIRARC_control_measure' => $ar8,
                    'HIRARC_PIC' => $ar9,
                    'application_type' => $this->input->post('application_type'),
                    'editable' => $editableValue
                );
                
                
                if($this->hirarc_model->update_applicant_data($appID, $data)){
                   $this->notification_model->insert_new_notification(null, 4, "HIRARC Form Application Updated", "The following user has updated a HIRARC Form: " . $this->session->userdata('account_name'));
                    
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
        
        public function phone_check($str) {
            
            if (!preg_match('/^(\+?6?01)[0|1|2|3|4|6|7|8|9]\-*[0-9]{7,8}$/', $str)) {
                $this->form_validation->set_message('phone_check', 'Use a valid phone number');
                return FALSE;
            } else {
                return TRUE;
            }
            
        }
        
    }
?>
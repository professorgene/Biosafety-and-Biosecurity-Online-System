<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class notification_of_LMO_and_BM extends CI_Controller{
		
		
        function __construct()
        {
            parent::__construct();

            $this->load->database();
            $this->load->model('notification_of_LMO_and_BM_model');
            $this->load->model('notification_model');
            
            //breadcrum
            $this->breadcrumbs->unshift('Home', '/');	
            $this->breadcrumbs->push('Notification of LMO and Biohazardous Material','/notificationbiohazardouspage', true);
            $this->breadcrumbs->push('SSBC Notification of LMO and Biohazardous Material', true);
        }
        
        public function index(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('personnel_name', 'Name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('personnel_staff_student_no', 'Staff/student no', 'required');
            $this->form_validation->set_rules('personnel_designation', 'designatiom', 'required');
            $this->form_validation->set_rules('personnel_faculty', 'Faculty', 'required');
            $this->form_validation->set_rules('personnel_unit_code', 'Unit code', 'required');
            $this->form_validation->set_rules('personnel_project_title', 'Project title', 'required');
            $this->form_validation->set_rules('personnel_storage', 'storage', 'required');
            $this->form_validation->set_rules('personnel_keeper_name', 'keeper name', 'required');
            $this->form_validation->set_rules('declaration_name', 'decalration name', 'required');
            $this->form_validation->set_rules('declaration_date', 'decalaration date', 'required');
            
            
            if ($this->form_validation->run() == FALSE){
                
                //$data['load'] = "true";
                //$id = 1;
                //$data['retrieved'] = $this->annex2_model->get_form_by_id($id);
                $data['error'] = "Something is wrong";
                
                $this->load->template('notification_of_LMO_and_BM_view', $data);
                
            }else{
                
                $ar1 = implode(',',$this->input->post('LMO_name'));
                $ar2 = implode(',',$this->input->post('LMO_risk_level'));
                $ar3 = implode(',',$this->input->post('LMO_quantity'));
                $ar4 = implode(',',$this->input->post('LMO_volume'));
                
                $ar5 = implode(',',$this->input->post('biohazard_name'));
                $ar6 = implode(',',$this->input->post('biohazard_risk_level'));
                $ar7 = implode(',',$this->input->post('biohazard_quantity'));
                $ar8 = implode(',',$this->input->post('biohazard_volume'));
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'personnel_name' => $this->input->post('personnel_name'),
                    'personnel_staff_student_no' => $this->input->post('personnel_staff_student_no'),
                    'personnel_designation' => $this->input->post('personnel_designation'),
                    'personnel_faculty' => $this->input->post('personnel_faculty'),
                    'personnel_unit_code' => $this->input->post('personnel_unit_code'),
                    'personnel_project_title' => $this->input->post('personnel_project_title'),
                    'personnel_reference_no' => $this->input->post('personnel_reference_no'),
                    'personnel_storage' => $this->input->post('personnel_storage'),
                    'personnel_keeper_name' => $this->input->post('personnel_keeper_name'),
                    'LMO_list ' => $this->input->post('LMO_list '),
                    'LMO_name ' => $ar1,
                    'LMO_risk_level' => $ar2,
                    'LMO_quantity' => $ar3,
                    'LMO_volume' => $ar4,
                    'biohazard_list' => $this->input->post('biohazard_list'),
                    'biohazard_name' => $ar5,
                    'biohazard_risk_level' => $ar6,
                    'biohazard_quantity' => $ar7,
                    'biohazard_volume' => $ar8,
                    'declaration_name' => $this->input->post('declaration_name'),
                    'declaration_date' => $this->input->post('declaration_date'),
                    'signature_verified_by' => $this->input->post('signature_verified_by'),
                    'signature_verified_date' => $this->input->post('signature_verified_date'),
                    'notification_approved_by' => $this->input->post('notification_approved_by'),
                    'notification_declined_by' => $this->input->post('notification_declined_by'),
                    'notification_approver' => $this->input->post('notification_approver'),
                    'notification_decliner' => $this->input->post('notification_decliner'),
                    'notification_reviewed_by' => $this->input->post('notification_reviewed_by'),
                    'notification_approve_decline_date' => $this->input->post('notification_approve_decline_date'),
                    'notification_reviewed_by_date' => $this->input->post('notification_reviewed_by_date'),
                    'notification_approve_decline_remarks' => $this->input->post('notification_approve_decline_remarks'),
                    'notification_reviewed_by_remarks' => $this->input->post('notification_reviewed_by_remarks')
                );
                
                
                if($this->notification_of_LMO_and_BM_model->insert_new_applicant_data($data)){
                    
                   $this->notification_model->insert_new_notification(null, 4, "New SSBC Notification of LMO and Biohazardous Material Application", "The following user has submitted a new SSBC Notification of LMO and Biohazardous Material form: " . $this->session->userdata('account_name'));
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Form has been successfully submitted!</div>', $data);
                   redirect('notification_of_LMO_and_BM/index');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('notification_of_LMO_and_BM/index');
                    
                    
                    
                }
                
                
            }
            
            
            
        }
        
        public function load_form(){
            
            $data['readnotif'] = $this->notification_model->get_read($this->session->userdata('account_id'), $this->session->userdata('account_type'));
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            //$id = $this->uri->segment(3);
            $id = $this->input->get('id');
            $data['retrieved'] = $this->notification_of_LMO_and_BM_model->get_form_by_id($id);
            
            $this->load->template('notification_of_LMO_and_BM_view', $data);
            
        }
        
        public function update_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('personnel_name', 'Name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('personnel_staff_student_no', 'Staff/student no', 'required');
            $this->form_validation->set_rules('personnel_designation', 'designatiom', 'required');
            $this->form_validation->set_rules('personnel_faculty', 'Faculty', 'required');
            $this->form_validation->set_rules('personnel_unit_code', 'Unit code', 'required');
            $this->form_validation->set_rules('personnel_project_title', 'Project title', 'required');
            $this->form_validation->set_rules('personnel_storage', 'storage', 'required');
            $this->form_validation->set_rules('personnel_keeper_name', 'keeper name', 'required');
            $this->form_validation->set_rules('declaration_name', 'decalration name', 'required');
            $this->form_validation->set_rules('declaration_date', 'decalaration date', 'required');
            
            
            if ($this->form_validation->run() == FALSE){
                
                //$data['load'] = "true";
                //$id = 1;
                //$data['retrieved'] = $this->annex2_model->get_form_by_id($id);
                $data['error'] = "Something is wrong";
                
                $this->load->template('notification_of_LMO_and_BM_view', $data);
                
            }else{
                
                $ar1 = implode(',',$this->input->post('LMO_name'));
                $ar2 = implode(',',$this->input->post('LMO_risk_level'));
                $ar3 = implode(',',$this->input->post('LMO_quantity'));
                $ar4 = implode(',',$this->input->post('LMO_volume'));
                
                $ar5 = implode(',',$this->input->post('biohazard_name'));
                $ar6 = implode(',',$this->input->post('biohazard_risk_level'));
                $ar7 = implode(',',$this->input->post('biohazard_quantity'));
                $ar8 = implode(',',$this->input->post('biohazard_volume'));
                
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'personnel_name' => $this->input->post('personnel_name'),
                    'personnel_staff_student_no' => $this->input->post('personnel_staff_student_no'),
                    'personnel_designation' => $this->input->post('personnel_designation'),
                    'personnel_faculty' => $this->input->post('personnel_faculty'),
                    'personnel_unit_code' => $this->input->post('personnel_unit_code'),
                    'personnel_project_title' => $this->input->post('personnel_project_title'),
                    'personnel_reference_no' => $this->input->post('personnel_reference_no'),
                    'personnel_storage' => $this->input->post('personnel_storage'),
                    'personnel_keeper_name' => $this->input->post('personnel_keeper_name'),
                    'LMO_list ' => $this->input->post('LMO_list '),
                    'LMO_name ' => $ar1,
                    'LMO_risk_level' => $ar2,
                    'LMO_quantity' => $ar3,
                    'LMO_volume' => $ar4,
                    'biohazard_list' => $this->input->post('biohazard_list'),
                    'biohazard_name' => $ar5,
                    'biohazard_risk_level' => $ar6,
                    'biohazard_quantity' => $ar7,
                    'biohazard_volume' => $ar8,
                    'declaration_name' => $this->input->post('declaration_name'),
                    'declaration_date' => $this->input->post('declaration_date'),
                    'signature_verified_by' => $this->input->post('signature_verified_by'),
                    'signature_verified_date' => $this->input->post('signature_verified_date'),
                    'notification_approved_by' => $this->input->post('notification_approved_by'),
                    'notification_declined_by' => $this->input->post('notification_declined_by'),
                    'notification_approver' => $this->input->post('notification_approver'),
                    'notification_decliner' => $this->input->post('notification_decliner'),
                    'notification_reviewed_by' => $this->input->post('notification_reviewed_by'),
                    'notification_approve_decline_date' => $this->input->post('notification_approve_decline_date'),
                    'notification_reviewed_by_date' => $this->input->post('notification_reviewed_by_date'),
                    'notification_approve_decline_remarks' => $this->input->post('notification_approve_decline_remarks'),
                    'notification_reviewed_by_remarks' => $this->input->post('notification_reviewed_by_remarks'),
                    'editable' => $editableValue
                );
                
                
                if($this->notification_of_LMO_and_BM_model->update_applicant_data($appID, $data)){
                    
                   $this->notification_model->insert_new_notification(null, 4, "SSBC Notification of LMO and Biohazardous Material Application Updated", "The following user has updated a SSBC Notification of LMO and Biohazardous Material form: " . $this->session->userdata('account_name'));
                    
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
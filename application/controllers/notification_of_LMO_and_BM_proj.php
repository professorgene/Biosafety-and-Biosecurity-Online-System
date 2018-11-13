<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class notification_of_LMO_and_BM_proj extends CI_Controller{
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('project_model');
        $this->load->model('notification_of_LMO_and_BM_model');
         //breadcrum
		$this->breadcrumbs->unshift('Home', '/');
		$this->breadcrumbs->push('New Project','/projectselect', true);		
		$this->breadcrumbs->push('Notification of LMO and Biohazardous Material', '/notificationbiohazardouspage',true);
		
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
                
                $this->load->template('notification_of_LMO_and_BM_proj_view', $data);
                
            }elseif(isset($save)){
                
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
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no'),
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
                    'notification_approve_signature' => $this->input->post('notification_approve_signature'),
                    'notification_approve_decline_date' => $this->input->post('notification_approve_decline_date'),
                    'notification_reviewed_signature' => $this->input->post('notification_reviewed_signature'),
                    'notification_reviewed_by_date' => $this->input->post('notification_reviewed_by_date'),
                    'notification_approve_decline_remarks' => $this->input->post('notification_approve_decline_remarks'),
                    'notification_reviewed_by_remarks' => $this->input->post('notification_reviewed_by_remarks'),
                    'status' => $saveStatus
                );
                
                
                if($this->notification_of_LMO_and_BM_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSave)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully saved!</div>', $data);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('notification_of_LMO_and_BM/index');
                    
                    
                    
                }
                
            }elseif(isset($submit)){
                
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
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no'),
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
                    'notification_approve_signature' => $this->input->post('notification_approve_signature'),
                    'notification_approve_decline_date' => $this->input->post('notification_approve_decline_date'),
                    'notification_reviewed_signature' => $this->input->post('notification_reviewed_signature'),
                    'notification_reviewed_by_date' => $this->input->post('notification_reviewed_by_date'),
                    'notification_approve_decline_remarks' => $this->input->post('notification_approve_decline_remarks'),
                    'notification_reviewed_by_remarks' => $this->input->post('notification_reviewed_by_remarks'),
                    'status' => $submitStatus
                );
                
                
                if($this->notification_of_LMO_and_BM_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
                   $this->notification_model->insert_new_notification(null, 4, "New Project For Notification of LMO and Biohazardous Material", "The following user has submitted a new project for Notification of LMO and Biohazardous Material: " . $this->session->userdata('account_name'));
					
				   $this->notification_model->insert_new_notification(null, 5, "New Project For Notification of LMO and Biohazardous Material", "The following user has submitted a new project for Notification of LMO and Biohazardous Material: " . $this->session->userdata('account_name'));
					
				   $this->notification_model->insert_new_notification(null, 6, "New Project For Notification of LMO and Biohazardous Material", "The following user has submitted a new project for Notification of LMO and Biohazardous Material: " . $this->session->userdata('account_name'));
					
				   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('notification_of_LMO_and_BM/index');
                    
                    
                    
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
            
            $data['retrieved'] = $this->notification_of_LMO_and_BM_model->get_form_by_project_id($id);
            
        
            $this->load->template('notification_of_LMO_and_BM_proj_view', $data);
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
                
                $this->load->template('notification_of_LMO_and_BM_proj_view', $data);
                
            }elseif(isset($update)){
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
                    'project_id' => $appID,
                    'date_received ' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no'),
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
                    'notification_approve_signature' => $this->input->post('notification_approve_signature'),
                    'notification_approve_decline_date' => $this->input->post('notification_approve_decline_date'),
                    'notification_reviewed_signature' => $this->input->post('notification_reviewed_signature'),
                    'notification_reviewed_by_date' => $this->input->post('notification_reviewed_by_date'),
                    'notification_approve_decline_remarks' => $this->input->post('notification_approve_decline_remarks'),
                    'notification_reviewed_by_remarks' => $this->input->post('notification_reviewed_by_remarks'),
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                
                
                if($this->notification_of_LMO_and_BM_model->update_applicant_data($appID, $data) && $this->project_model->update_applicant_data($appID, $editableValue)){
                    
                   $this->notification_model->insert_new_notification(null, 4, "New Project For Notification of LMO and Biohazardous Material", "The following user has submitted a new project for Notification of LMO and Biohazardous Material: " . $this->session->userdata('account_name'));
					
					$this->notification_model->insert_new_notification(null, 5, "New Project For Notification of LMO and Biohazardous Material", "The following user has submitted a new project for Notification of LMO and Biohazardous Material: " . $this->session->userdata('account_name'));
					
					$this->notification_model->insert_new_notification(null, 6, "New Project For Notification of LMO and Biohazardous Material", "The following user has submitted a new project for Notification of LMO and Biohazardous Material: " . $this->session->userdata('account_name'));
				   
				   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('notification_of_LMO_and_BM_proj/index');
                     
                    
                }
            }
        }
        
        public function load_saved_project(){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['saveload'] = "true";
            
            $id = $this->input->get('id');
            
            $data['appID'] = $id;
            
            $data['retrieved'] = $this->notification_of_LMO_and_BM_model->get_form_by_project_id($id);
            
            $this->load->template('notification_of_LMO_and_BM_proj_view', $data);
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
                
                $this->load->template('notification_of_LMO_and_BM_proj_view', $data);
                
            }elseif(isset($save)){
                
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
                    'project_id' => $proj_id,
                    'date_received' => $this->input->post('date_received'),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no'),
                    'personnel_name' => $this->input->post('personnel_name'),
                    'personnel_staff_student_no' => $this->input->post('personnel_staff_student_no'),
                    'personnel_designation' => $this->input->post('personnel_designation'),
                    'personnel_faculty' => $this->input->post('personnel_faculty'),
                    'personnel_unit_code' => $this->input->post('personnel_unit_code'),
                    'personnel_project_title' => $this->input->post('personnel_project_title'),
                    'personnel_reference_no' => $this->input->post('personnel_reference_no'),
                    'personnel_storage' => $this->input->post('personnel_storage'),
                    'personnel_keeper_name' => $this->input->post('personnel_keeper_name'),
                    'LMO_list' => $this->input->post('LMO_list'),
                    'LMO_name' => $ar1,
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
                    'notification_approve_signature' => $this->input->post('notification_approve_signature'),
                    'notification_approve_decline_date' => $this->input->post('notification_approve_decline_date'),
                    'notification_reviewed_signature' => $this->input->post('notification_reviewed_signature'),
                    'notification_reviewed_by_date' => $this->input->post('notification_reviewed_by_date'),
                    'notification_approve_decline_remarks' => $this->input->post('notification_approve_decline_remarks'),
                    'notification_reviewed_by_remarks' => $this->input->post('notification_reviewed_by_remarks'),
                    'status' => $saveStatus
                );
                
                
                if($this->notification_of_LMO_and_BM_model->update_saved_data($proj_id, $data) && $this->project_model->update_proj_status($proj_id, $projectSave)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully saved!</div>', $data);
                    redirect('saveHistory/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('notification_of_LMO_and_BM_proj/index');
                    
                    
                    
                }
                
            }elseif(isset($submit)){
                
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
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no '),
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
                    'notification_approve_signature' => $this->input->post('notification_approve_signature'),
                    'notification_approve_decline_date' => $this->input->post('notification_approve_decline_date'),
                    'notification_reviewed_signature' => $this->input->post('notification_reviewed_signature'),
                    'notification_reviewed_by_date' => $this->input->post('notification_reviewed_by_date'),
                    'notification_approve_decline_remarks' => $this->input->post('notification_approve_decline_remarks'),
                    'notification_reviewed_by_remarks' => $this->input->post('notification_reviewed_by_remarks'),
                    'status' => $submitStatus
                );
                
                
                if($this->notification_of_LMO_and_BM_model->update_saved_data($proj_id, $data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
					
					$this->notification_model->insert_new_notification(null, 4, "New Project For Notification of LMO and Biohazardous Material", "The following user has submitted a new project for Notification of LMO and Biohazardous Material: " . $this->session->userdata('account_name'));
					
					$this->notification_model->insert_new_notification(null, 5, "New Project For Notification of LMO and Biohazardous Material", "The following user has submitted a new project for Notification of LMO and Biohazardous Material: " . $this->session->userdata('account_name'));
					
					$this->notification_model->insert_new_notification(null, 6, "New Project For Notification of LMO and Biohazardous Material", "The following user has submitted a new project for Notification of LMO and Biohazardous Material: " . $this->session->userdata('account_name'));
					
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('saveHistory/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('notification_of_LMO_and_BM_proj/index');
                    
                    
                }
                
            }
        }
        
    }
?>
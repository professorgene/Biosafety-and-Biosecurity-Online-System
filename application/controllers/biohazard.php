<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class biohazard extends CI_Controller{
        
        function __construct()
        {
            parent::__construct();

            $this->load->database();
            $this->load->model('biohazard_model');
            $this->load->model('notification_model');
            
            //breadcrumb
            $this->breadcrumbs->unshift('Home', '/');	
            $this->breadcrumbs->push('Application','/applicationpage', true);
            $this->breadcrumbs->push('New Application','/newapplicationpage', true);
            $this->breadcrumbs->push('Biohazardous Material','/biohazardous_materialpage',true);
            $this->breadcrumbs->push('Application for Biosafety Clearance Form', true);
        }
        
        public function index(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('project_title', 'Project title', 'required');
            $this->form_validation->set_rules('project_supervisor_name', 'Project supervisor name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('project_supervisor_department', 'Project supervisor department', 'required');
            $this->form_validation->set_rules('project_supervisor_email_address', 'Project supervisor email address ', 'required');
            $this->form_validation->set_rules('project_alt_person', 'Project alt person', 'required');
            $this->form_validation->set_rules('project_alt_department', 'project alt department', 'required');
            $this->form_validation->set_rules('project_alt_email', 'project alt email', 'required');
            $this->form_validation->set_rules('project_personel_name[0]', 'Personnel name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('project_personel_role[0]', 'Personnel role', 'required');
            $this->form_validation->set_rules('project_summary', 'Project Summary', 'required');
            $this->form_validation->set_rules('project_activity', 'Project activity', 'required');
            $this->form_validation->set_rules('project_SOP_title[0]', 'Title of SOP', 'required');
            $this->form_validation->set_rules('project_SOP_risk_title[0]', 'SOP risk title', 'required');
            $this->form_validation->set_rules('project_facilities_building[0]', 'Project facilities building', 'required');
            $this->form_validation->set_rules('project_facilities_room[0]', 'Project facilities room', 'required');
            $this->form_validation->set_rules('officer_name', 'Officer name', 'required');
            
            
            
            if ($this->form_validation->run() == FALSE){
                
                //$data['load'] = "true";
                //$id = 1;
                //$data['retrieved'] = $this->annex2_model->get_form_by_id($id);
                
                $this->load->template('biohazard_view', $data);
                
            }else{
                
                $ar1 = implode(',',$this->input->post('project_personnel_name'));
                $ar2 = implode(',',$this->input->post('project_personnel_role'));
                $ar3 = implode(',',$this->input->post('project_SOP_title'));
                $ar4 = implode(',',$this->input->post('project_SOP_risk_title'));
                $ar5 = implode(',',$this->input->post('project_facilities_building'));
                $ar6 = implode(',',$this->input->post('project_facilities_room'));
                
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_title' => $this->input->post('project_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_alt_person' => $this->input->post('project_alt_person'),
                    'project_alt_email' => $this->input->post('project_alt_email'),
                    'project_personnel_name' => $ar1,
                    'project_personnel_role' => $ar2,
                    'proposed_work_known' => $this->input->post('proposed_work_known'),
                    'proposed_work_may' => $this->input->post('proposed_work_may'),
                    'proposed_work_unknown' => $this->input->post('proposed_work_unknown'),
                    'proposed_work_isolation' => $this->input->post('proposed_work_isolation'),
                    'proposed_work_risk' => $this->input->post('proposed_work_risk'),
                    'proposed_work_sensitive' => $this->input->post('proposed_work_sensitive'),
                    'proposed_work_other' => $this->input->post('proposed_work_other'),
                    'project_summary' => $this->input->post('project_summary'),
                    'project_activity' => $this->input->post('project_activity'),
                    'project_SOP_title' => $ar3,
                    'project_SOP_risk_title' => $ar4,
                    'project_facilities_building' => $ar5,
                    'project_facilities_room' => $ar6,
                    'officer_notified' => $this->input->post('IBC_name'),
                    'officer_name' => $this->input->post('IBC_name')
                );
                
                
                if($this->biohazard_model->insert_new_applicant_data($data)){
                    
                    $this->notification_model->insert_new_notification(null, 4, "New Application for Biosafety Clearance Form", "The following user has submitted a new Application for Biosafety Clearance Form: " . $this->session->userdata('account_name'));
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Form has been successfully submitted!</div>', $data);
                    redirect('biohazard/index');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('biohazard/index');
                    
                    
                    
                }
                
                
            }
            
            
            
        }
        
        public function load_form(){
            
            $data['readnotif'] = $this->notification_model->get_read($this->session->userdata('account_id'), $this->session->userdata('account_type'));
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            //$id = $this->uri->segment(3);
            $id = $this->input->get('id');
            $data['retrieved'] = $this->biohazard_model->get_form_by_id($id);
            
            $this->load->template('biohazard_view', $data);
            
        }
        
        public function update_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('project_title', 'Project title', 'required');
            $this->form_validation->set_rules('project_supervisor_name', 'Project supervisor name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('project_supervisor_department', 'Project supervisor department', 'required');
            $this->form_validation->set_rules('project_supervisor_email_address', 'Project supervisor email address ', 'required');
            $this->form_validation->set_rules('project_alt_person', 'Project alt person', 'required');
            $this->form_validation->set_rules('project_alt_department', 'project alt department', 'required');
            $this->form_validation->set_rules('project_alt_email', 'project alt email', 'required');
            $this->form_validation->set_rules('project_personnel_name[0]', 'Personnel name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('project_personnel_role[0]', 'Personnel role', 'required');
            $this->form_validation->set_rules('project_summary', 'Project Summary', 'required');
            $this->form_validation->set_rules('project_activity', 'Project activity', 'required');
            $this->form_validation->set_rules('project_SOP_title[0]', 'Title of SOP', 'required');
            $this->form_validation->set_rules('project_SOP_risk_title[0]', 'SOP risk title', 'required');
            $this->form_validation->set_rules('project_facilities_building[0]', 'Project facilities building', 'required');
            $this->form_validation->set_rules('project_facilities_room[0]', 'Project facilities room', 'required');
            //$this->form_validation->set_rules('officer_name', 'Officer name', 'required');
            
            
            
            if ($this->form_validation->run() == FALSE){
                
                //$data['load'] = "true";
                //$id = 1;
                //$data['retrieved'] = $this->annex2_model->get_form_by_id($id);
                
                $this->load->template('biohazard_view', $data);
                
            }else{
                
                $ar1 = implode(',',$this->input->post('project_personnel_name'));
                $ar2 = implode(',',$this->input->post('project_personnel_role'));
                $ar3 = implode(',',$this->input->post('project_SOP_title'));
                $ar4 = implode(',',$this->input->post('project_SOP_risk_title'));
                $ar5 = implode(',',$this->input->post('project_facilities_building'));
                $ar6 = implode(',',$this->input->post('project_facilities_room'));
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_title' => $this->input->post('project_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_alt_person' => $this->input->post('project_alt_person'),
                    'project_alt_email' => $this->input->post('project_alt_email'),
                    'project_personnel_name' => $ar1,
                    'project_personnel_role' => $ar2,
                    'proposed_work_known' => $this->input->post('proposed_work_known'),
                    'proposed_work_may' => $this->input->post('proposed_work_may'),
                    'proposed_work_unknown' => $this->input->post('proposed_work_unknown'),
                    'proposed_work_isolation' => $this->input->post('proposed_work_isolation'),
                    'proposed_work_risk' => $this->input->post('proposed_work_risk'),
                    'proposed_work_sensitive' => $this->input->post('proposed_work_sensitive'),
                    'proposed_work_other' => $this->input->post('proposed_work_other'),
                    'project_summary' => $this->input->post('project_summary'),
                    'project_activity' => $this->input->post('project_activity'),
                    'project_SOP_title' => $ar3,
                    'project_SOP_risk_title' => $ar4,
                    'project_facilities_building' => $ar5,
                    'project_facilities_room' => $ar6,
                    'officer_notified' => $this->input->post('IBC_name'),
                    'officer_name' => $this->input->post('IBC_name'),
                    'editable' => $editableValue
                );
                
                
                if($this->biohazard_model->update_applicant_data($appID, $data)){
                    
                   $this->notification_model->insert_new_notification(null, 4, "Application for Biosafety Clearance Form Updated", "The following user has updated an Application for Biosafety Clearance Form: " . $this->session->userdata('account_name'));
                    
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
                $this->form_validation->set_message('fullname_check', 'The %s field can only be alphanumerical and not empty');
                return FALSE;
            } else {
                return TRUE;
            }
        }
        
        
        
    }
?>
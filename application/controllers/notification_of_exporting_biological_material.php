<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class notification_of_exporting_biological_material extends CI_Controller
	{
        function __construct()
        {
            parent::__construct();

            $this->load->database();
            $this->load->model('notification_of_exporting_biological_material_model');
            $this->load->model('notification_model');
            
            //breadcrum
            $this->breadcrumbs->unshift('Home', '/');	
            $this->breadcrumbs->push('Exporting of Biological Material','exportingbiologicalmaterialpage', true);
            $this->breadcrumbs->push('SSBC Notification of LMO and Biohazardous Material', true);
        }
        
        public function index(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('personnel_name', 'Name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('personnel_staff_student_no', 'Staff/student no', 'required');
            $this->form_validation->set_rules('personnel_designation', 'designatiom', 'required');
            $this->form_validation->set_rules('personnel_faculty', 'Faculty', 'required');
            $this->form_validation->set_rules('personnel_reference_no', 'Reference no', 'required');
            $this->form_validation->set_rules('personnel_project_title', 'Project title', 'required');
            $this->form_validation->set_rules('declaration_name', 'decalration name', 'required');
            $this->form_validation->set_rules('declaration_date', 'decalaration date', 'required');
            $this->form_validation->set_rules('importing_country', 'importing country', 'required');
            $this->form_validation->set_rules('importing_institude', 'Importing institute', 'required');
            $this->form_validation->set_rules('importing_person_in_charge', 'Person in charge', 'required');
            $this->form_validation->set_rules('importing_person_in_charge_telephone_no', 'Person in charge tel no.', 'required');
            
            
            if ($this->form_validation->run() == FALSE){
                
                $data['error'] = "Validation Error";
                
                $this->load->template('notification_of_exporting_biological_material_view', $data);
                
            }else{
                
                $ar1 = implode(',',$this->input->post('LMO_name'));
                $ar2 = implode(',',$this->input->post('LMO_risk_level'));
                $ar3 = implode(',',$this->input->post('LMO_category'));
                $ar4 = implode(',',$this->input->post('LMO_quantity'));
                $ar5 = implode(',',$this->input->post('LMO_volume'));
                
                $ar6 = implode(',',$this->input->post('biological_name'));
                $ar7 = implode(',',$this->input->post('biological_risk_level'));
                $ar8 = implode(',',$this->input->post('biological_category'));
                $ar9 = implode(',',$this->input->post('biological_quantity'));
                $ar10 = implode(',',$this->input->post('biological_volume'));
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'personnel_name' => $this->input->post('personnel_name'),
                    'personnel_staff_student_no' => $this->input->post('personnel_staff_student_no'),
                    'personnel_designation' => $this->input->post('personnel_designation'),
                    'personnel_faculty' => $this->input->post('personnel_faculty'),
                    'personnel_project_title' => $this->input->post('personnel_project_title'),
                    'personnel_reference_no' => $this->input->post('personnel_reference_no'),
                    'LMO_list ' => $this->input->post('LMO_list'),
                    'LMO_name ' => $ar1,
                    'LMO_risk_level' => $ar2,
                    'LMO_category'=> $ar3,
                    'LMO_quantity' => $ar4,
                    'LMO_volume' => $ar5,
                    'biological_list' => $this->input->post('biohazard_list'),
                    'biological_name' => $ar6,
                    'biological_risk_level' => $ar7,
                    'biological_category' => $ar8,
                    'biological_quantity' => $ar9,
                    'biological_volume' => $ar10,
                    'declaration_name' => $this->input->post('declaration_name'),
                    'declaration_date' => $this->input->post('declaration_date'),
                    'importing_country' => $this->input->post('importing_country'),
                    'importing_institude' => $this->input->post('importing_institude'),
                    'importing_person_in_charge' => $this->input->post('importing_person_in_charge'),
                    'importing_person_in_charge_telephone_no' => $this->input->post('importing_person_in_charge_telephone_no'),
                    'delivered_date' => $this->input->post('delivered_date'),
                    'incident_accident_report' => $this->input->post('incident_accident_report'),
                    'signature_verified_by' => $this->input->post('signature_verified_by'),
                    'signature_verified_date' => $this->input->post('signature_verified_date'),
                    'notification_approved_by' => $this->input->post('notification_approved_by'),
                    'notification_declined_by' => $this->input->post('notification_declined_by'),
                    'notification_reviewed_by' => $this->input->post('notification_reviewed_by'),
                    'notification_approve_decline_date' => $this->input->post('notification_approve_decline_date'),
                    'notification_reviewed_by_date' => $this->input->post('notification_reviewed_by_date'),
                    'notification_approve_decline_remarks' => $this->input->post('notification_approve_decline_remarks'),
                    'notification_reviewed_by_remarks' => $this->input->post('notification_reviewed_by_remarks')
                );
                
                
                if($this->notification_of_exporting_biological_material_model->insert_new_applicant_data($data)){
                    
                   $this->notification_model->insert_new_notification(null, 4, "New SSBC Notification of LMO and Biohazardous Material Application", "The following user has submitted a new SSBC Notification of LMO and Biohazardous Material form: " . $this->session->userdata('account_name'));
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Form has been successfully submitted!</div>', $data);
                   redirect('notification_of_exporting_biological_material/index');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('notification_of_exporting_biological_material/index');
  
                    
                }
                
                
            }
            
            
            
        }
        
        public function load_form(){
            
            $data['readnotif'] = $this->notification_model->get_read($this->session->userdata('account_id'), $this->session->userdata('account_type'));
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            $id = $this->input->get('id');
            $data['retrieved'] = $this->notification_of_exporting_biological_material_model->get_form_by_id($id);
            
            $this->load->template('notification_of_exporting_biological_material_view', $data);
            
        }
        
        public function update_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('personnel_name', 'Name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('personnel_staff_student_no', 'Staff/student no', 'required');
            $this->form_validation->set_rules('personnel_designation', 'designatiom', 'required');
            $this->form_validation->set_rules('personnel_faculty', 'Faculty', 'required');
            $this->form_validation->set_rules('personnel_reference_no', 'Reference no', 'required');
            $this->form_validation->set_rules('personnel_project_title', 'Project title', 'required');
            $this->form_validation->set_rules('declaration_name', 'decalration name', 'required');
            $this->form_validation->set_rules('declaration_date', 'decalaration date', 'required');
            $this->form_validation->set_rules('importing_country', 'importing country', 'required');
            $this->form_validation->set_rules('importing_institude', 'Importing institute', 'required');
            $this->form_validation->set_rules('importing_person_in_charge', 'Person in charge', 'required');
            $this->form_validation->set_rules('importing_person_in_charge_telephone_no', 'Person in charge tel no.', 'required');
            
            
            if ($this->form_validation->run() == FALSE){
                
                
                $this->load->template('notification_of_exporting_biological_material_view', $data);
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Validation Error.</div>');
                
            }else{
                
                $ar1 = implode(',',$this->input->post('LMO_name'));
                $ar2 = implode(',',$this->input->post('LMO_risk_level'));
                $ar3 = implode(',',$this->input->post('LMO_category'));
                $ar4 = implode(',',$this->input->post('LMO_quantity'));
                $ar5 = implode(',',$this->input->post('LMO_volume'));
                
                $ar6 = implode(',',$this->input->post('biological_name'));
                $ar7 = implode(',',$this->input->post('biological_risk_level'));
                $ar8 = implode(',',$this->input->post('biological_category'));
                $ar9 = implode(',',$this->input->post('biological_quantity'));
                $ar10 = implode(',',$this->input->post('biological_volume'));
                
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'personnel_name' => $this->input->post('personnel_name'),
                    'personnel_staff_student_no' => $this->input->post('personnel_staff_student_no'),
                    'personnel_designation' => $this->input->post('personnel_designation'),
                    'personnel_faculty' => $this->input->post('personnel_faculty'),
                    'personnel_project_title' => $this->input->post('personnel_project_title'),
                    'personnel_reference_no' => $this->input->post('personnel_reference_no'),
                    'LMO_list ' => $this->input->post('LMO_list'),
                    'LMO_name ' => $ar1,
                    'LMO_risk_level' => $ar2,
                    'LMO_category'=> $ar3,
                    'LMO_quantity' => $ar4,
                    'LMO_volume' => $ar5,
                    'biological_list' => $this->input->post('biohazard_list'),
                    'biological_name' => $ar6,
                    'biological_risk_level' => $ar7,
                    'biological_category' => $ar8,
                    'biological_quantity' => $ar9,
                    'biological_volume' => $ar10,
                    'declaration_name' => $this->input->post('declaration_name'),
                    'declaration_date' => $this->input->post('declaration_date'),
                    'importing_country' => $this->input->post('importing_country'),
                    'importing_institude' => $this->input->post('importing_institude'),
                    'importing_person_in_charge' => $this->input->post('importing_person_in_charge'),
                    'importing_person_in_charge_telephone_no' => $this->input->post('importing_person_in_charge_telephone_no'),
                    'delivered_date' => $this->input->post('delivered_date'),
                    'incident_accident_report' => $this->input->post('incident_accident_report'),
                    'signature_verified_by' => $this->input->post('signature_verified_by'),
                    'signature_verified_date' => $this->input->post('signature_verified_date'),
                    'notification_approved_by' => $this->input->post('notification_approved_by'),
                    'notification_declined_by' => $this->input->post('notification_declined_by'),
                    'notification_reviewed_by' => $this->input->post('notification_reviewed_by'),
                    'notification_approve_decline_date' => $this->input->post('notification_approve_decline_date'),
                    'notification_reviewed_by_date' => $this->input->post('notification_reviewed_by_date'),
                    'notification_approve_decline_remarks' => $this->input->post('notification_approve_decline_remarks'),
                    'notification_reviewed_by_remarks' => $this->input->post('notification_reviewed_by_remarks'),
                    'editable' => $editableValue
                );
                
                
                if($this->notification_of_exporting_biological_material_model->update_applicant_data($appID, $data)){
                    
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
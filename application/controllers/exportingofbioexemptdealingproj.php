<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class exportingofbioexemptdealingproj extends CI_Controller{
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
		$this->load->model('notification_of_exporting_biological_material_model');
        $this->load->model('project_model');
		
			//breadcrum
            $this->breadcrumbs->unshift('Home', '/');
			$this->breadcrumbs->push('New Project','/projectselect', true);				
            $this->breadcrumbs->push('Exporting of Biological Material','exportingbiologicalmaterialpage', true);
            $this->breadcrumbs->push('SSBC Notification of LMO and Biohazardous Material', true);
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
				
				$this->load->template('exportingofbioexemptdealingproj_view',$data);
        
		}elseif(isset($save)){
			
				$ar1 = implode(',',$this->input->post('LMO_name'));
			
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
					'project_id' => $proj_id,
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
					'status' => $saveStatus
				
				);

				
                if($this->notification_of_exporting_biological_material_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSave)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('exportingofbioexemptdealingproj/index');

                }

			}elseif(isset($submit)){

				$ar1 = implode(',',$this->input->post('LMO_name'));
			
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
					'project_id' => $proj_id,
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
					'status' => $submitStatus
				);	

                if($this->notification_of_exporting_biological_material_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('exportingofbioexemptdealingproj/index');
  
                }
                
            }
            
        }	

			//load project in disabled state
        public function load_project(){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            $id = $this->input->get('id');
            
            $data['appID'] = $id;
            
            $data['retrieved'] = $this->notification_of_exporting_biological_material_model->get_form_by_project_id($id);
            
        
            $this->load->template('exportingofbioexemptdealingproj_view', $data);
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
				
				$this->load->template('exportingofbioexemptdealingproj_view', $data);
				
			}elseif(isset($update)){
				
				$ar1 = implode(',',$this->input->post('LMO_name'));
			
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
					'project_id' => $appID,
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
					'status' => $submitStatus,
                    'editable' => $editableValue
				);	

				if($this->notification_of_exporting_biological_material_model->update_applicant_data($appID, $data) && $this->project_model->update_applicant_data($appID, $editableValue)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('exportingofbioexemptdealingproj/index');
                     
                    
                }
            }
        }
		
		public function load_saved_project(){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['saveload'] = "true";
            
            $id = $this->input->get('id');
            
            $data['appID'] = $id;
            
            $data['retrieved'] = $this->notification_of_exporting_biological_material_model->get_form_by_project_id($id);
            
        
            $this->load->template('exportingofbioexemptdealingproj_view', $data);
        }
        
        public function delete_saved_project(){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $id = $this->input->get('id');
            $status = "deleted";
            
            
            if($this->project_model->update_proj_status($id, $status))
            {
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
                
                $this->load->template('exportingofbioexemptdealingproj_view', $data);
                
            }elseif(isset($save)){
				
				$ar1 = implode(',',$this->input->post('LMO_name'));
			
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
					'project_id' => $proj_id,
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
					'status' => $saveStatus
				);
				
                if($this->notification_of_exporting_biological_material_model->update_saved_data($proj_id, $data) && $this->project_model->update_proj_status($proj_id, $projectSave)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('exportingofbioexemptdealingproj/index');
           
                }
					
			}elseif(isset($submit)){

				$ar1 = implode(',',$this->input->post('LMO_name'));
			
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
					'project_id' => $proj_id,
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
					'status' => $submitStatus
				);		

				if($this->notification_of_exporting_biological_material_model->update_saved_data($proj_id, $data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('exportingofbioexemptdealingproj/index');
                    
                    
                }
                
            }
        }
    }
?>
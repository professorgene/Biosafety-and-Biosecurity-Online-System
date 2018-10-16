<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class annualorfinalreportproj extends CI_Controller{
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
		$this->load->model('annualfinalreport_model');
        $this->load->model('project_model');
		
        //breadcrum
		$this->breadcrumbs->unshift('Home', '/');
		$this->breadcrumbs->push('New Project','/projectselect', true);		
		$this->breadcrumbs->push('Annual or Final Report', true);
        
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
			
				$this->load->template('annualorfinalreportproj_view',$data);
			
        }elseif(isset($save)){
			 $data = array(
                     'account_id' => $this->session->userdata('account_id'),
                     'project_id' => $proj_id,
					 'account_id' => $this->session->userdata('account_id'),
                     'SBC_reference_no' => $this->input->post('SBC_reference_no'),
                     'project_approval_date' => $this->input->post('project_approval_date'),
                     'project_report_date' => $this->input->post('project_report_date'),
                     'personnel_extra' => $this->input->post('personnel_extra'),
                     'project_title' => $this->input->post('project_title'),
                     'chief_investigator' => $this->input->post('chief_investigator'),
                     'personnel_extra' => $this->input->post('personnel_extra'),
                     'personnel_extra_title' => $this->input->post('personnel_extra_title'),
                     'personnel_extra_name' => $this->input->post('personnel_extra_name'),
                     'personnel_extra_qualifications' => $this->input->post('personnel_extra_qualifications'),
                     'personnel_extra_department' => $this->input->post('personnel_extra_department'),
                     'personnel_extra_campus' => $this->input->post('personnel_extra_campus'),
                     'personnel_extra_postal_address' => $this->input->post('personnel_extra_postal_address'),
                     'personnel_extra_telephone' => $this->input->post('personnel_extra_telephone'),
                     'personnel_extra_fax' => $this->input->post('personnel_extra_fax'),
                     'personnel_extra_email_address' => $this->input->post('personnel_extra_email_address'),
                     'project_summary' => $this->input->post('project_summary'),
                     'project_outline' => $this->input->post('project_outline'),
                     'project_incidents' => $this->input->post('project_incidents'),
                     'project_SOP' => $this->input->post('project_SOP'),
                     'project_facility_changes' => $this->input->post('project_facility_changes'),
                     'project_facility_room_number' => $this->input->post('project_facility_room_number'),
                     'project_facility_building_number' => $this->input->post('project_facility_building_number'),
                     'project_facility_description' => $this->input->post('project_facility_description'),
                     'project_sign_off_chief_investigator_name' => $this->input->post('project_sign_off_chief_investigator_name'),
                     'project_sign_off_BO_name' => $this->input->post('project_sign_off_BO_name'),
                     'status' => $saveStatus
                );
				
				
				if($this->annualfinalreport_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
                } else {
					
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                    redirect('annualorfinalreportproj/index');                   
                }
			}elseif(isset($submit)){
				
				$data = array(
					 'account_id' => $this->session->userdata('account_id'),
                     'project_id' => $proj_id,
					 'account_id' => $this->session->userdata('account_id'),
                     'SBC_reference_no' => $this->input->post('SBC_reference_no'),
                     'project_approval_date' => $this->input->post('project_approval_date'),
                     'project_report_date' => $this->input->post('project_report_date'),
                     'personnel_extra' => $this->input->post('personnel_extra'),
                     'project_title' => $this->input->post('project_title'),
                     'chief_investigator' => $this->input->post('chief_investigator'),
                     'personnel_extra' => $this->input->post('personnel_extra'),
                     'personnel_extra_title' => $this->input->post('personnel_extra_title'),
                     'personnel_extra_name' => $this->input->post('personnel_extra_name'),
                     'personnel_extra_qualifications' => $this->input->post('personnel_extra_qualifications'),
                     'personnel_extra_department' => $this->input->post('personnel_extra_department'),
                     'personnel_extra_campus' => $this->input->post('personnel_extra_campus'),
                     'personnel_extra_postal_address' => $this->input->post('personnel_extra_postal_address'),
                     'personnel_extra_telephone' => $this->input->post('personnel_extra_telephone'),
                     'personnel_extra_fax' => $this->input->post('personnel_extra_fax'),
                     'personnel_extra_email_address' => $this->input->post('personnel_extra_email_address'),
                     'project_summary' => $this->input->post('project_summary'),
                     'project_outline' => $this->input->post('project_outline'),
                     'project_incidents' => $this->input->post('project_incidents'),
                     'project_SOP' => $this->input->post('project_SOP'),
                     'project_facility_changes' => $this->input->post('project_facility_changes'),
                     'project_facility_room_number' => $this->input->post('project_facility_room_number'),
                     'project_facility_building_number' => $this->input->post('project_facility_building_number'),
                     'project_facility_description' => $this->input->post('project_facility_description'),
                     'project_sign_off_chief_investigator_name' => $this->input->post('project_sign_off_chief_investigator_name'),
                     'project_sign_off_BO_name' => $this->input->post('project_sign_off_BO_name'),
                     'status' => $submitStatus
				);
				
				 if($this->annualfinalreport_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
                } else {
					
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                    redirect('annualorfinalreportproj/index'); 
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
            $data['retrieved'] = $this->annualfinalreport_model->get_form_by_project_id($id);        
            $this->load->template('annualorfinalreportproj_view', $data);
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
				
				$this->load->template('annualorfinalreportproj_view', $data);
	
		    }elseif(isset($update)){
                $data = array(
					 'account_id' => $this->session->userdata('account_id'),
                     'project_id' => $proj_id,
					 'account_id' => $this->session->userdata('account_id'),
                     'SBC_reference_no' => $this->input->post('SBC_reference_no'),
                     'project_approval_date' => $this->input->post('project_approval_date'),
                     'project_report_date' => $this->input->post('project_report_date'),
                     'personnel_extra' => $this->input->post('personnel_extra'),
                     'project_title' => $this->input->post('project_title'),
                     'chief_investigator' => $this->input->post('chief_investigator'),
                     'personnel_extra' => $this->input->post('personnel_extra'),
                     'personnel_extra_title' => $this->input->post('personnel_extra_title'),
                     'personnel_extra_name' => $this->input->post('personnel_extra_name'),
                     'personnel_extra_qualifications' => $this->input->post('personnel_extra_qualifications'),
                     'personnel_extra_department' => $this->input->post('personnel_extra_department'),
                     'personnel_extra_campus' => $this->input->post('personnel_extra_campus'),
                     'personnel_extra_postal_address' => $this->input->post('personnel_extra_postal_address'),
                     'personnel_extra_telephone' => $this->input->post('personnel_extra_telephone'),
                     'personnel_extra_fax' => $this->input->post('personnel_extra_fax'),
                     'personnel_extra_email_address' => $this->input->post('personnel_extra_email_address'),
                     'project_summary' => $this->input->post('project_summary'),
                     'project_outline' => $this->input->post('project_outline'),
                     'project_incidents' => $this->input->post('project_incidents'),
                     'project_SOP' => $this->input->post('project_SOP'),
                     'project_facility_changes' => $this->input->post('project_facility_changes'),
                     'project_facility_room_number' => $this->input->post('project_facility_room_number'),
                     'project_facility_building_number' => $this->input->post('project_facility_building_number'),
                     'project_facility_description' => $this->input->post('project_facility_description'),
                     'project_sign_off_chief_investigator_name' => $this->input->post('project_sign_off_chief_investigator_name'),
                     'project_sign_off_BO_name' => $this->input->post('project_sign_off_BO_name'),
                     'status' => $saveStatus,
					 'editable' => $editableValue
				);
	
				 if($this->annualfinalreport_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    //$this->session->unset_userdata('projectId');
                    
                        
                } else {
					
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                    redirect('annualorfinalreportproj/index');
				}
			}
		
		}
		
		 public function load_saved_project(){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['saveload'] = "true";
            $id = $this->input->get('id');
            $data['appID'] = $id;

            $this->load->template('annualorfinalreportproj_view', $data);
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
                
                $this->load->template('annualorfinalreportproj_view', $data);
                
            }elseif(isset($save)){
		
				 }elseif(isset($save)){
                
                $data = array(
					 'account_id' => $this->session->userdata('account_id'),
                     'project_id' => $proj_id,
					 'account_id' => $this->session->userdata('account_id'),
                     'SBC_reference_no' => $this->input->post('SBC_reference_no'),
                     'project_approval_date' => $this->input->post('project_approval_date'),
                     'project_report_date' => $this->input->post('project_report_date'),
                     'personnel_extra' => $this->input->post('personnel_extra'),
                     'project_title' => $this->input->post('project_title'),
                     'chief_investigator' => $this->input->post('chief_investigator'),
                     'personnel_extra' => $this->input->post('personnel_extra'),
                     'personnel_extra_title' => $this->input->post('personnel_extra_title'),
                     'personnel_extra_name' => $this->input->post('personnel_extra_name'),
                     'personnel_extra_qualifications' => $this->input->post('personnel_extra_qualifications'),
                     'personnel_extra_department' => $this->input->post('personnel_extra_department'),
                     'personnel_extra_campus' => $this->input->post('personnel_extra_campus'),
                     'personnel_extra_postal_address' => $this->input->post('personnel_extra_postal_address'),
                     'personnel_extra_telephone' => $this->input->post('personnel_extra_telephone'),
                     'personnel_extra_fax' => $this->input->post('personnel_extra_fax'),
                     'personnel_extra_email_address' => $this->input->post('personnel_extra_email_address'),
                     'project_summary' => $this->input->post('project_summary'),
                     'project_outline' => $this->input->post('project_outline'),
                     'project_incidents' => $this->input->post('project_incidents'),
                     'project_SOP' => $this->input->post('project_SOP'),
                     'project_facility_changes' => $this->input->post('project_facility_changes'),
                     'project_facility_room_number' => $this->input->post('project_facility_room_number'),
                     'project_facility_building_number' => $this->input->post('project_facility_building_number'),
                     'project_facility_description' => $this->input->post('project_facility_description'),
                     'project_sign_off_chief_investigator_name' => $this->input->post('project_sign_off_chief_investigator_name'),
                     'project_sign_off_BO_name' => $this->input->post('project_sign_off_BO_name'),
                     'status' => $saveStatus
				);
				
				if($this->annualfinalreport_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    //$this->session->unset_userdata('projectId');
                    
                        
                } else {
					
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                    redirect('annualorfinalreportproj/index');
				}
				
			 }elseif(isset($submit)){
		
				$data = array(
					 'account_id' => $this->session->userdata('account_id'),
                     'project_id' => $proj_id,
					 'account_id' => $this->session->userdata('account_id'),
                     'SBC_reference_no' => $this->input->post('SBC_reference_no'),
                     'project_approval_date' => $this->input->post('project_approval_date'),
                     'project_report_date' => $this->input->post('project_report_date'),
                     'personnel_extra' => $this->input->post('personnel_extra'),
                     'project_title' => $this->input->post('project_title'),
                     'chief_investigator' => $this->input->post('chief_investigator'),
                     'personnel_extra' => $this->input->post('personnel_extra'),
                     'personnel_extra_title' => $this->input->post('personnel_extra_title'),
                     'personnel_extra_name' => $this->input->post('personnel_extra_name'),
                     'personnel_extra_qualifications' => $this->input->post('personnel_extra_qualifications'),
                     'personnel_extra_department' => $this->input->post('personnel_extra_department'),
                     'personnel_extra_campus' => $this->input->post('personnel_extra_campus'),
                     'personnel_extra_postal_address' => $this->input->post('personnel_extra_postal_address'),
                     'personnel_extra_telephone' => $this->input->post('personnel_extra_telephone'),
                     'personnel_extra_fax' => $this->input->post('personnel_extra_fax'),
                     'personnel_extra_email_address' => $this->input->post('personnel_extra_email_address'),
                     'project_summary' => $this->input->post('project_summary'),
                     'project_outline' => $this->input->post('project_outline'),
                     'project_incidents' => $this->input->post('project_incidents'),
                     'project_SOP' => $this->input->post('project_SOP'),
                     'project_facility_changes' => $this->input->post('project_facility_changes'),
                     'project_facility_room_number' => $this->input->post('project_facility_room_number'),
                     'project_facility_building_number' => $this->input->post('project_facility_building_number'),
                     'project_facility_description' => $this->input->post('project_facility_description'),
                     'project_sign_off_chief_investigator_name' => $this->input->post('project_sign_off_chief_investigator_name'),
                     'project_sign_off_BO_name' => $this->input->post('project_sign_off_BO_name'),
                     'status' => $submitStatus
				);
		
				if($this->annualfinalreport_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    //$this->session->unset_userdata('projectId');
                    
                        
                } else {
					
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                    redirect('annualorfinalreportproj/index');
				}
				
			}
			 
		}
	}
		
		
		
		
		
		
?>
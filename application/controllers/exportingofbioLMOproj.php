<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class exportingofbioLMOproj extends CI_Controller{
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
		$this->load->model('formf_model');
        $this->load->model('project_model');
		
			//breadcrum
            $this->breadcrumbs->unshift('Home', '/');
			$this->breadcrumbs->push('New Project','/projectselect', true);	
            $this->breadcrumbs->push('Exporting of Biological Material','exportingbiologicalmaterialpage', true);
            $this->breadcrumbs->push('Form F', true);
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
				
				$this->load->template('exportingofbioLMOproj_view',$data);
				
        }elseif(isset($save)){
			
			 $data = array(
					'account_id' => $this->session->userdata('account_id'),
					'project_id' => $proj_id,
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
                    'status' => $saveStatus
				);
				
				if($this->formf_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSave)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('exportingofbioLMOproj/index');
    
                }
				
			 }elseif(isset($submit)){
				 
				$data = array(
					'account_id' => $this->session->userdata('account_id'),
					'project_id' => $proj_id,
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
                    'status' => $submitStatus
				);
				
				
				if($this->formf_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
					$this->notification_model->insert_new_notification(null, 4, "New Project For Exporting of Biological Material(LMOs)", "The following user has submitted a new project for Exporting of Biological Material(LMOs): " . $this->session->userdata('account_name'));
					
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('exportingofbioLMOproj/index');
    
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
            
            $data['retrieved'] = $this->formf_model->get_form_by_project_id($id);
            
        
            $this->load->template('exportingofbioLMOproj_view', $data);
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
                
                $this->load->template('exportingofbioLMOproj_view', $data);
                
            }elseif(isset($update)){
                $data = array(
					'account_id' => $this->session->userdata('account_id'),
					'project_id' => $appID,
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
                    'status' => $submitStatus,
                    'editable' => $editableValue
					
				);
				
				
				if($this->formf_model->update_applicant_data($appID, $data) && $this->project_model->update_applicant_data($appID, $editableValue)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    //$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('exportingofbioLMOproj/index');
    
                }
			}
		 }
		 
		 public function load_saved_project(){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['saveload'] = "true";
            
            $id = $this->input->get('id');
            
            $data['appID'] = $id;
            
            $data['retrieved'] = $this->formf_model->get_form_by_project_id($id);
            
        
            $this->load->template('exportingofbioLMOproj_view', $data);
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
				
				$this->load->template('exportingofbioLMOproj_view', $data);
				
			}elseif(isset($save)){	
			
				$data = array(
					'account_id' => $this->session->userdata('account_id'),
					'project_id' => $proj_id,
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
                    'status' => $saveStatus
				);
				
				
				if($this->formf_model->update_saved_data($proj_id, $data) && $this->project_model->update_proj_status($proj_id, $projectSave)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    //$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('exportingofbioLMOproj/index');
    
                }
				
			}elseif(isset($submit)){
				
				$data = array(
					'account_id' => $this->session->userdata('account_id'),
					'project_id' => $proj_id,
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
                    'status' => $submitStatus
				);
				
				if($this->formf_model->update_saved_data($proj_id, $data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
					$this->notification_model->insert_new_notification(null, 4, "New Project For Exporting of Biological Material(LMOs)", "The following user has submitted a new project for Exporting of Biological Material(LMOs): " . $this->session->userdata('account_name'));
					
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    //$this->session->unset_userdata('projectId');
 
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('exportingofbioLMOproj/index');
    
                }				
			}
		 }
	}
				
				
?>
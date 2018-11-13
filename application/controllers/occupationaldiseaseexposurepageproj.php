<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class occupationaldiseaseexposurepageproj extends CI_Controller{
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('project_model');
        $this->load->model('annex4_model');
        $this->load->model('incidentaccidentreport_model');
		
		 //breadcrum
		$this->breadcrumbs->unshift('Home', '/');
		$this->breadcrumbs->push('New Project','/projectselect', true);		
		$this->breadcrumbs->push('Incident Accident Reporting','/incidentaccidentreportingpage', true);
        $this->breadcrumbs->push('Living Modified Organism (LMO)','lmo61page',true);
        $this->breadcrumbs->push('Occupational disease or exposure',true);
        
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
                
                $this->load->template('occupationaldiseaseexposurepageproj_view', $data);
                
            }elseif(isset($save)){
                
                $ar1 = implode(',',$this->input->post('investigation_preventive_no'));
                $ar2 = implode(',',$this->input->post('investigation_preventive_action'));
                $ar3 = implode(',',$this->input->post('investigation_preventive_by_whom'));
                $ar4 = implode(',',$this->input->post('investigation_preventive_timeline'));
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'victim_name' => $this->input->post('victim_name'),
                    'victim_age' => $this->input->post('victim_age'),
                    'victim_gender' => $this->input->post('victim_gender'),
                    'victim_citizenship' => $this->input->post('victim_citizenship'),
                    'victim_employment_designation' => $this->input->post('victim_employment_designation'),
                    'victim_faculty' => $this->input->post('victim_faculty'),
                    'doc_id' => $this->input->post('doc_id'),
                    'review_date' => $this->input->post('review_date'),
                    'incident_date' => $this->input->post('incident_date'),
                    'incident_time' => $this->input->post('incident_time'),
                    'incident_location' => $this->input->post('incident_location'),
                    'incident_type1' => $this->input->post('incident_type1'),
                    'incident_type2' => $this->input->post('incident_type2'),
                    'incident_type3' => $this->input->post('incident_type3'),
                    'incident_type4' => $this->input->post('incident_type4'),
                    'incident_type5' => $this->input->post('incident_type5'),
                    'incident_type6' => $this->input->post('incident_type6'),
                    'incident_type7' => $this->input->post('incident_type7'),
                    'incident_type8' => $this->input->post('incident_type8'),
                    'incident_type9' => $this->input->post('incident_type9'),
                    'incident_type_description' => $this->input->post('incident_type_description'),
                    'incident_injury' => $this->input->post('incident_injury'),
                    'incident_physician_or_hospital' => $this->input->post('incident_physician_or_hospital'),
                    'incident_details' => $this->input->post('incident_details'),
                    'incident_actions' => $this->input->post('incident_actions'),
                    'reporter_name' => $this->input->post('reporter_name'),
                    'reporter_designation' => $this->input->post('reporter_designation'),
                    'reporter_date' => $this->input->post('reporter_date'),
                    'investigation_victim' => $this->input->post('investigation_victim'),
                    'investigation_victim_age' => $this->input->post('investigation_victim_age'),
                    'investigation_victim_citizenship' => $this->input->post('investigation_victim_citizenship'),
                    'investigation_victim_job_description' => $this->input->post('investigation_victim_job_description'),
                    'investigation_findings' => $this->input->post('investigation_findings'),
                    'investigation_preventive_no' => $ar1,
                    'investigation_preventive_action' => $ar2,
                    'investigation_preventive_by_whom' => $ar3,
                    'investigation_preventive_timeline' => $ar4,
                    'investigated_by' => $this->input->post('investigated_by'),
                    'reviewed_by' => $this->input->post('reviewed_by'),
                    'application_type' => $this->input->post('application_type'),
                    'status' => $saveStatus
                );
                
                $annex4Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'reference_no' => $this->input->post('reference_no'),
                    'personnel_name' => $this->input->post('personnel_name'),
                    'personnel_NRIC ' => $this->input->post('personnel_NRIC'),
                    'personnel_age' => $this->input->post('personnel_age'),
                    'personnel_race' => $this->input->post('personnel_race'),
                    'personnel_telephone_number' => $this->input->post('personnel_telephone_number'),
                    'personnel_office_number' => $this->input->post('personnel_office_number'),
                    'personnel_ext_number' => $this->input->post('personnel_ext_number'),
                    'personnel_employment_job' => $this->input->post('personnel_employment_job'),
                    'personnel_employment_faculty' => $this->input->post('personnel_employment_faculty'),
                    'personnel_employment_status' => $this->input->post('personnel_employment_status'),
                    'personnel_employment_duration' => $this->input->post('personnel_employment_duration'),
                    'exposure_location' => $this->input->post('exposure_location'),
                    'exposure_date' => $this->input->post('exposure_date'),
                    'exposure_time' => $this->input->post('exposure_time'),
                    'exposure_diagnosis' => $this->input->post('exposure_diagnosis'),
                    'exposure_treatment' => $this->input->post('exposure_treatment'),
                    'exposure_medical_cert' => $this->input->post('exposure_medical_cert'),
                    'exposure_medical_cert_duration' => $this->input->post('exposure_medical_cert_duration'),
                    'exposure_work_description' => $this->input->post('exposure_work_description'),
                    'exposure_hazard_or_agent' => $this->input->post('exposure_hazard_or_agent'),
                    'exposure_duration' => $this->input->post('exposure_duration'),
                    'exposure_symptoms' => $this->input->post('exposure_symptoms'),
                    //'exposure_symptoms_duration' => $this->input->post('exposure_symptoms_duration'),
                    'signature_PI_name' => $this->input->post('signature_PI_name'),
                    'signature_PI_date' => $this->input->post('signature_PI_date'),
                    'signature_BO_name' => $this->input->post('signature_BO_name'),
                    'signature_BO_date' => $this->input->post('signature_BO_date'),
                    'signature_IBC_name' => $this->input->post('signature_IBC_name'),
                    'signature_IBC_date' => $this->input->post('signature_IBC_date'),
                    'IBC_approval' => $this->input->post('IBC_approval'),
                    'IBC_termination' => $this->input->post('IBC_termination'),
                    'status' => $submitStatus
                );
                
                
                if($this->annex4_model->insert_new_applicant_data($annex4Data) && $this->incidentaccidentreport_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSave)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('majorincidentaccidentreportingpageproj/index');
                    
                    
                    
                }
                
            }elseif(isset($submit)){
                
                $ar1 = implode(',',$this->input->post('investigation_preventive_no'));
                $ar2 = implode(',',$this->input->post('investigation_preventive_action'));
                $ar3 = implode(',',$this->input->post('investigation_preventive_by_whom'));
                $ar4 = implode(',',$this->input->post('investigation_preventive_timeline'));
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'victim_name' => $this->input->post('victim_name'),
                    'victim_age' => $this->input->post('victim_age'),
                    'victim_gender' => $this->input->post('victim_gender'),
                    'victim_citizenship' => $this->input->post('victim_citizenship'),
                    'victim_employment_designation' => $this->input->post('victim_employment_designation'),
                    'victim_faculty' => $this->input->post('victim_faculty'),
                    'doc_id' => $this->input->post('doc_id'),
                    'review_date' => $this->input->post('review_date'),
                    'incident_date' => $this->input->post('incident_date'),
                    'incident_time' => $this->input->post('incident_time'),
                    'incident_location' => $this->input->post('incident_location'),
                    'incident_type1' => $this->input->post('incident_type1'),
                    'incident_type2' => $this->input->post('incident_type2'),
                    'incident_type3' => $this->input->post('incident_type3'),
                    'incident_type4' => $this->input->post('incident_type4'),
                    'incident_type5' => $this->input->post('incident_type5'),
                    'incident_type6' => $this->input->post('incident_type6'),
                    'incident_type7' => $this->input->post('incident_type7'),
                    'incident_type8' => $this->input->post('incident_type8'),
                    'incident_type9' => $this->input->post('incident_type9'),
                    'incident_type_description' => $this->input->post('incident_type_description'),
                    'incident_injury' => $this->input->post('incident_injury'),
                    'incident_physician_or_hospital' => $this->input->post('incident_physician_or_hospital'),
                    'incident_details' => $this->input->post('incident_details'),
                    'incident_actions' => $this->input->post('incident_actions'),
                    'reporter_name' => $this->input->post('reporter_name'),
                    'reporter_designation' => $this->input->post('reporter_designation'),
                    'reporter_date' => $this->input->post('reporter_date'),
                    'investigation_victim' => $this->input->post('investigation_victim'),
                    'investigation_victim_age' => $this->input->post('investigation_victim_age'),
                    'investigation_victim_citizenship' => $this->input->post('investigation_victim_citizenship'),
                    'investigation_victim_job_description' => $this->input->post('investigation_victim_job_description'),
                    'investigation_findings' => $this->input->post('investigation_findings'),
                    'investigation_preventive_no' => $ar1,
                    'investigation_preventive_action' => $ar2,
                    'investigation_preventive_by_whom' => $ar3,
                    'investigation_preventive_timeline' => $ar4,
                    'investigated_by' => $this->input->post('investigated_by'),
                    'reviewed_by' => $this->input->post('reviewed_by'),
                    'application_type' => $this->input->post('application_type'),
                    'status' => $submitStatus
                );
                
                $annex4Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'reference_no' => $this->input->post('reference_no'),
                    'personnel_name' => $this->input->post('personnel_name'),
                    'personnel_NRIC ' => $this->input->post('personnel_NRIC'),
                    'personnel_age' => $this->input->post('personnel_age'),
                    'personnel_race' => $this->input->post('personnel_race'),
                    'personnel_telephone_number' => $this->input->post('personnel_telephone_number'),
                    'personnel_office_number' => $this->input->post('personnel_office_number'),
                    'personnel_ext_number' => $this->input->post('personnel_ext_number'),
                    'personnel_employment_job' => $this->input->post('personnel_employment_job'),
                    'personnel_employment_faculty' => $this->input->post('personnel_employment_faculty'),
                    'personnel_employment_status' => $this->input->post('personnel_employment_status'),
                    'personnel_employment_duration' => $this->input->post('personnel_employment_duration'),
                    'exposure_location' => $this->input->post('exposure_location'),
                    'exposure_date' => $this->input->post('exposure_date'),
                    'exposure_time' => $this->input->post('exposure_time'),
                    'exposure_diagnosis' => $this->input->post('exposure_diagnosis'),
                    'exposure_treatment' => $this->input->post('exposure_treatment'),
                    'exposure_medical_cert' => $this->input->post('exposure_medical_cert'),
                    'exposure_medical_cert_duration' => $this->input->post('exposure_medical_cert_duration'),
                    'exposure_work_description' => $this->input->post('exposure_work_description'),
                    'exposure_hazard_or_agent' => $this->input->post('exposure_hazard_or_agent'),
                    'exposure_duration' => $this->input->post('exposure_duration'),
                    'exposure_symptoms' => $this->input->post('exposure_symptoms'),
                    //'exposure_symptoms_duration' => $this->input->post('exposure_symptoms_duration'),
                    'signature_PI_name' => $this->input->post('signature_PI_name'),
                    'signature_PI_date' => $this->input->post('signature_PI_date'),
                    'signature_BO_name' => $this->input->post('signature_BO_name'),
                    'signature_BO_date' => $this->input->post('signature_BO_date'),
                    'signature_IBC_name' => $this->input->post('signature_IBC_name'),
                    'signature_IBC_date' => $this->input->post('signature_IBC_date'),
                    'IBC_approval' => $this->input->post('IBC_approval'),
                    'IBC_termination' => $this->input->post('IBC_termination'),
                    'status' => $submitStatus
                );
                
                
                if($this->annex4_model->insert_new_applicant_data($annex4Data) && $this->incidentaccidentreport_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
					
					$this->notification_model->insert_new_notification(null, 4, "New Project For Incident Accident Reporting (Occupational Disease Or Exposure)", "The following user has submitted a new project for Incident Accident Reporting  (Occupational Disease Or Exposure): " . $this->session->userdata('account_name'));                
                  
				  $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('majorincidentaccidentreportingpageproj/index');
                    
                    
                    
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
            
            $data['retrieved'] = $this->incidentaccidentreport_model->get_form_by_project_id($id);
            $data['retrieved2'] = $this->annex4_model->get_form_by_project_id($id);
            
        
            $this->load->template('occupationaldiseaseexposurepageproj_view', $data);
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
                
                $this->load->template('occupationaldiseaseexposurepageproj_view', $data);
                
            }elseif(isset($update)){
                $ar1 = implode(',',$this->input->post('investigation_preventive_no'));
                $ar2 = implode(',',$this->input->post('investigation_preventive_action'));
                $ar3 = implode(',',$this->input->post('investigation_preventive_by_whom'));
                $ar4 = implode(',',$this->input->post('investigation_preventive_timeline'));
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $appID,
                    'victim_name' => $this->input->post('victim_name'),
                    'victim_age' => $this->input->post('victim_age'),
                    'victim_gender' => $this->input->post('victim_gender'),
                    'victim_citizenship' => $this->input->post('victim_citizenship'),
                    'victim_employment_designation' => $this->input->post('victim_employment_designation'),
                    'victim_faculty' => $this->input->post('victim_faculty'),
                    'doc_id' => $this->input->post('doc_id'),
                    'review_date' => $this->input->post('review_date'),
                    'incident_date' => $this->input->post('incident_date'),
                    'incident_time' => $this->input->post('incident_time'),
                    'incident_location' => $this->input->post('incident_location'),
                    'incident_type1' => $this->input->post('incident_type1'),
                    'incident_type2' => $this->input->post('incident_type2'),
                    'incident_type3' => $this->input->post('incident_type3'),
                    'incident_type4' => $this->input->post('incident_type4'),
                    'incident_type5' => $this->input->post('incident_type5'),
                    'incident_type6' => $this->input->post('incident_type6'),
                    'incident_type7' => $this->input->post('incident_type7'),
                    'incident_type8' => $this->input->post('incident_type8'),
                    'incident_type9' => $this->input->post('incident_type9'),
                    'incident_type_description' => $this->input->post('incident_type_description'),
                    'incident_injury' => $this->input->post('incident_injury'),
                    'incident_physician_or_hospital' => $this->input->post('incident_physician_or_hospital'),
                    'incident_details' => $this->input->post('incident_details'),
                    'incident_actions' => $this->input->post('incident_actions'),
                    'reporter_name' => $this->input->post('reporter_name'),
                    'reporter_designation' => $this->input->post('reporter_designation'),
                    'reporter_date' => $this->input->post('reporter_date'),
                    'investigation_victim' => $this->input->post('investigation_victim'),
                    'investigation_victim_age' => $this->input->post('investigation_victim_age'),
                    'investigation_victim_citizenship' => $this->input->post('investigation_victim_citizenship'),
                    'investigation_victim_job_description' => $this->input->post('investigation_victim_job_description'),
                    'investigation_findings' => $this->input->post('investigation_findings'),
                    'investigation_preventive_no' => $ar1,
                    'investigation_preventive_action' => $ar2,
                    'investigation_preventive_by_whom' => $ar3,
                    'investigation_preventive_timeline' => $ar4,
                    'investigated_by' => $this->input->post('investigated_by'),
                    'reviewed_by' => $this->input->post('reviewed_by'),
                    'application_type' => $this->input->post('application_type'),
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                    
               $annex4Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'reference_no' => $this->input->post('reference_no'),
                    'personnel_name' => $this->input->post('personnel_name'),
                    'personnel_NRIC ' => $this->input->post('personnel_NRIC'),
                    'personnel_age' => $this->input->post('personnel_age'),
                    'personnel_race' => $this->input->post('personnel_race'),
                    'personnel_telephone_number' => $this->input->post('personnel_telephone_number'),
                    'personnel_office_number' => $this->input->post('personnel_office_number'),
                    'personnel_ext_number' => $this->input->post('personnel_ext_number'),
                    'personnel_employment_job' => $this->input->post('personnel_employment_job'),
                    'personnel_employment_faculty' => $this->input->post('personnel_employment_faculty'),
                    'personnel_employment_status' => $this->input->post('personnel_employment_status'),
                    'personnel_employment_duration' => $this->input->post('personnel_employment_duration'),
                    'exposure_location' => $this->input->post('exposure_location'),
                    'exposure_date' => $this->input->post('exposure_date'),
                    'exposure_time' => $this->input->post('exposure_time'),
                    'exposure_diagnosis' => $this->input->post('exposure_diagnosis'),
                    'exposure_treatment' => $this->input->post('exposure_treatment'),
                    'exposure_medical_cert' => $this->input->post('exposure_medical_cert'),
                    'exposure_medical_cert_duration' => $this->input->post('exposure_medical_cert_duration'),
                    'exposure_work_description' => $this->input->post('exposure_work_description'),
                    'exposure_hazard_or_agent' => $this->input->post('exposure_hazard_or_agent'),
                    'exposure_duration' => $this->input->post('exposure_duration'),
                    'exposure_symptoms' => $this->input->post('exposure_symptoms'),
                    //'exposure_symptoms_duration' => $this->input->post('exposure_symptoms_duration'),
                    'signature_PI_name' => $this->input->post('signature_PI_name'),
                    'signature_PI_date' => $this->input->post('signature_PI_date'),
                    'signature_BO_name' => $this->input->post('signature_BO_name'),
                    'signature_BO_date' => $this->input->post('signature_BO_date'),
                    'signature_IBC_name' => $this->input->post('signature_IBC_name'),
                    'signature_IBC_date' => $this->input->post('signature_IBC_date'),
                    'IBC_approval' => $this->input->post('IBC_approval'),
                    'IBC_termination' => $this->input->post('IBC_termination'),
                    'status' => $submitStatus
                );
                
                
                if($this->annex4_model->update_applicant_data($appID, $annex4Data) && $this->incidentaccidentreport_model->update_applicant_data($appID, $data) && $this->project_model->update_applicant_data($appID, $editableValue)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('majorincidentaccidentreportingpageproj/index');
                     
                    
                }
            }
        }
        
        public function load_saved_project(){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['saveload'] = "true";
            
            $id = $this->input->get('id');
            
            $data['appID'] = $id;
            
            $data['retrieved'] = $this->incidentaccidentreport_model->get_form_by_project_id($id);
            $data['retrieved2'] = $this->annex4_model->get_form_by_project_id($id);
            
        
            $this->load->template('occupationaldiseaseexposurepageproj_view', $data);
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
                
                $this->load->template('occupationaldiseaseexposurepageproj_view', $data);
                
            }elseif(isset($save)){
                
                $ar1 = implode(',',$this->input->post('investigation_preventive_no'));
                $ar2 = implode(',',$this->input->post('investigation_preventive_action'));
                $ar3 = implode(',',$this->input->post('investigation_preventive_by_whom'));
                $ar4 = implode(',',$this->input->post('investigation_preventive_timeline'));
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'victim_name' => $this->input->post('victim_name'),
                    'victim_age' => $this->input->post('victim_age'),
                    'victim_gender' => $this->input->post('victim_gender'),
                    'victim_citizenship' => $this->input->post('victim_citizenship'),
                    'victim_employment_designation' => $this->input->post('victim_employment_designation'),
                    'victim_faculty' => $this->input->post('victim_faculty'),
                    'doc_id' => $this->input->post('doc_id'),
                    'review_date' => $this->input->post('review_date'),
                    'incident_date' => $this->input->post('incident_date'),
                    'incident_time' => $this->input->post('incident_time'),
                    'incident_location' => $this->input->post('incident_location'),
                    'incident_type1' => $this->input->post('incident_type1'),
                    'incident_type2' => $this->input->post('incident_type2'),
                    'incident_type3' => $this->input->post('incident_type3'),
                    'incident_type4' => $this->input->post('incident_type4'),
                    'incident_type5' => $this->input->post('incident_type5'),
                    'incident_type6' => $this->input->post('incident_type6'),
                    'incident_type7' => $this->input->post('incident_type7'),
                    'incident_type8' => $this->input->post('incident_type8'),
                    'incident_type9' => $this->input->post('incident_type9'),
                    'incident_type_description' => $this->input->post('incident_type_description'),
                    'incident_injury' => $this->input->post('incident_injury'),
                    'incident_physician_or_hospital' => $this->input->post('incident_physician_or_hospital'),
                    'incident_details' => $this->input->post('incident_details'),
                    'incident_actions' => $this->input->post('incident_actions'),
                    'reporter_name' => $this->input->post('reporter_name'),
                    'reporter_designation' => $this->input->post('reporter_designation'),
                    'reporter_date' => $this->input->post('reporter_date'),
                    'investigation_victim' => $this->input->post('investigation_victim'),
                    'investigation_victim_age' => $this->input->post('investigation_victim_age'),
                    'investigation_victim_citizenship' => $this->input->post('investigation_victim_citizenship'),
                    'investigation_victim_job_description' => $this->input->post('investigation_victim_job_description'),
                    'investigation_findings' => $this->input->post('investigation_findings'),
                    'investigation_preventive_no' => $ar1,
                    'investigation_preventive_action' => $ar2,
                    'investigation_preventive_by_whom' => $ar3,
                    'investigation_preventive_timeline' => $ar4,
                    'investigated_by' => $this->input->post('investigated_by'),
                    'reviewed_by' => $this->input->post('reviewed_by'),
                    'application_type' => $this->input->post('application_type'),
                    'status' => $saveStatus
                );
                
                $annex4Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'reference_no' => $this->input->post('reference_no'),
                    'personnel_name' => $this->input->post('personnel_name'),
                    'personnel_NRIC ' => $this->input->post('personnel_NRIC'),
                    'personnel_age' => $this->input->post('personnel_age'),
                    'personnel_race' => $this->input->post('personnel_race'),
                    'personnel_telephone_number' => $this->input->post('personnel_telephone_number'),
                    'personnel_office_number' => $this->input->post('personnel_office_number'),
                    'personnel_ext_number' => $this->input->post('personnel_ext_number'),
                    'personnel_employment_job' => $this->input->post('personnel_employment_job'),
                    'personnel_employment_faculty' => $this->input->post('personnel_employment_faculty'),
                    'personnel_employment_status' => $this->input->post('personnel_employment_status'),
                    'personnel_employment_duration' => $this->input->post('personnel_employment_duration'),
                    'exposure_location' => $this->input->post('exposure_location'),
                    'exposure_date' => $this->input->post('exposure_date'),
                    'exposure_time' => $this->input->post('exposure_time'),
                    'exposure_diagnosis' => $this->input->post('exposure_diagnosis'),
                    'exposure_treatment' => $this->input->post('exposure_treatment'),
                    'exposure_medical_cert' => $this->input->post('exposure_medical_cert'),
                    'exposure_medical_cert_duration' => $this->input->post('exposure_medical_cert_duration'),
                    'exposure_work_description' => $this->input->post('exposure_work_description'),
                    'exposure_hazard_or_agent' => $this->input->post('exposure_hazard_or_agent'),
                    'exposure_duration' => $this->input->post('exposure_duration'),
                    'exposure_symptoms' => $this->input->post('exposure_symptoms'),
                    //'exposure_symptoms_duration' => $this->input->post('exposure_symptoms_duration'),
                    'signature_PI_name' => $this->input->post('signature_PI_name'),
                    'signature_PI_date' => $this->input->post('signature_PI_date'),
                    'signature_BO_name' => $this->input->post('signature_BO_name'),
                    'signature_BO_date' => $this->input->post('signature_BO_date'),
                    'signature_IBC_name' => $this->input->post('signature_IBC_name'),
                    'signature_IBC_date' => $this->input->post('signature_IBC_date'),
                    'IBC_approval' => $this->input->post('IBC_approval'),
                    'IBC_termination' => $this->input->post('IBC_termination'),
                    'status' => $saveStatus
                );
                
                
                if($this->annex4_model->update_saved_data($proj_id, $annex4Data) && $this->incidentaccidentreport_model->update_saved_data($proj_id, $data) && $this->project_model->update_proj_status($proj_id, $projectSave)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('procurementproj/index');
                    
                    
                    
                }
                
            }elseif(isset($submit)){
                
                $ar1 = implode(',',$this->input->post('investigation_preventive_no'));
                $ar2 = implode(',',$this->input->post('investigation_preventive_action'));
                $ar3 = implode(',',$this->input->post('investigation_preventive_by_whom'));
                $ar4 = implode(',',$this->input->post('investigation_preventive_timeline'));
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'victim_name' => $this->input->post('victim_name'),
                    'victim_age' => $this->input->post('victim_age'),
                    'victim_gender' => $this->input->post('victim_gender'),
                    'victim_citizenship' => $this->input->post('victim_citizenship'),
                    'victim_employment_designation' => $this->input->post('victim_employment_designation'),
                    'victim_faculty' => $this->input->post('victim_faculty'),
                    'doc_id' => $this->input->post('doc_id'),
                    'review_date' => $this->input->post('review_date'),
                    'incident_date' => $this->input->post('incident_date'),
                    'incident_time' => $this->input->post('incident_time'),
                    'incident_location' => $this->input->post('incident_location'),
                    'incident_type1' => $this->input->post('incident_type1'),
                    'incident_type2' => $this->input->post('incident_type2'),
                    'incident_type3' => $this->input->post('incident_type3'),
                    'incident_type4' => $this->input->post('incident_type4'),
                    'incident_type5' => $this->input->post('incident_type5'),
                    'incident_type6' => $this->input->post('incident_type6'),
                    'incident_type7' => $this->input->post('incident_type7'),
                    'incident_type8' => $this->input->post('incident_type8'),
                    'incident_type9' => $this->input->post('incident_type9'),
                    'incident_type_description' => $this->input->post('incident_type_description'),
                    'incident_injury' => $this->input->post('incident_injury'),
                    'incident_physician_or_hospital' => $this->input->post('incident_physician_or_hospital'),
                    'incident_details' => $this->input->post('incident_details'),
                    'incident_actions' => $this->input->post('incident_actions'),
                    'reporter_name' => $this->input->post('reporter_name'),
                    'reporter_designation' => $this->input->post('reporter_designation'),
                    'reporter_date' => $this->input->post('reporter_date'),
                    'investigation_victim' => $this->input->post('investigation_victim'),
                    'investigation_victim_age' => $this->input->post('investigation_victim_age'),
                    'investigation_victim_citizenship' => $this->input->post('investigation_victim_citizenship'),
                    'investigation_victim_job_description' => $this->input->post('investigation_victim_job_description'),
                    'investigation_findings' => $this->input->post('investigation_findings'),
                    'investigation_preventive_no' => $ar1,
                    'investigation_preventive_action' => $ar2,
                    'investigation_preventive_by_whom' => $ar3,
                    'investigation_preventive_timeline' => $ar4,
                    'investigated_by' => $this->input->post('investigated_by'),
                    'reviewed_by' => $this->input->post('reviewed_by'),
                    'application_type' => $this->input->post('application_type'),
                    'status' => $submitStatus
                );
                
                $annex4Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'reference_no' => $this->input->post('reference_no'),
                    'personnel_name' => $this->input->post('personnel_name'),
                    'personnel_NRIC ' => $this->input->post('personnel_NRIC'),
                    'personnel_age' => $this->input->post('personnel_age'),
                    'personnel_race' => $this->input->post('personnel_race'),
                    'personnel_telephone_number' => $this->input->post('personnel_telephone_number'),
                    'personnel_office_number' => $this->input->post('personnel_office_number'),
                    'personnel_ext_number' => $this->input->post('personnel_ext_number'),
                    'personnel_employment_job' => $this->input->post('personnel_employment_job'),
                    'personnel_employment_faculty' => $this->input->post('personnel_employment_faculty'),
                    'personnel_employment_status' => $this->input->post('personnel_employment_status'),
                    'personnel_employment_duration' => $this->input->post('personnel_employment_duration'),
                    'exposure_location' => $this->input->post('exposure_location'),
                    'exposure_date' => $this->input->post('exposure_date'),
                    'exposure_time' => $this->input->post('exposure_time'),
                    'exposure_diagnosis' => $this->input->post('exposure_diagnosis'),
                    'exposure_treatment' => $this->input->post('exposure_treatment'),
                    'exposure_medical_cert' => $this->input->post('exposure_medical_cert'),
                    'exposure_medical_cert_duration' => $this->input->post('exposure_medical_cert_duration'),
                    'exposure_work_description' => $this->input->post('exposure_work_description'),
                    'exposure_hazard_or_agent' => $this->input->post('exposure_hazard_or_agent'),
                    'exposure_duration' => $this->input->post('exposure_duration'),
                    'exposure_symptoms' => $this->input->post('exposure_symptoms'),
                    //'exposure_symptoms_duration' => $this->input->post('exposure_symptoms_duration'),
                    'signature_PI_name' => $this->input->post('signature_PI_name'),
                    'signature_PI_date' => $this->input->post('signature_PI_date'),
                    'signature_BO_name' => $this->input->post('signature_BO_name'),
                    'signature_BO_date' => $this->input->post('signature_BO_date'),
                    'signature_IBC_name' => $this->input->post('signature_IBC_name'),
                    'signature_IBC_date' => $this->input->post('signature_IBC_date'),
                    'IBC_approval' => $this->input->post('IBC_approval'),
                    'IBC_termination' => $this->input->post('IBC_termination'),
                    'status' => $submitStatus
                );
                
                
                if($this->annex4_model->update_saved_data($proj_id, $annex4Data) &&$this->incidentaccidentreport_model->update_saved_data($proj_id, $data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
                   $this->notification_model->insert_new_notification(null, 4, "New Project For Incident Accident Reporting (Occupational Disease Or Exposure)", "The following user has submitted a new project for Incident Accident Reporting  (Occupational Disease Or Exposure): " . $this->session->userdata('account_name')); 
				   
				   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('procurementproj/index');
                    
                    
                }
                
            }
        }
        
    }
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class incidentaccidentreportingpageexemptproj extends CI_Controller{
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('project_model');
        $this->load->model('incidentaccidentreport_model');
        
		
            $this->breadcrumbs->unshift('Home', '/');
			$this->breadcrumbs->push('New Project','/projectselect', true);			
		    $this->breadcrumbs->push('Incident Accident Reporting','/incidentaccidentreportingpage' ,true);
            $this->breadcrumbs->push('OHS-F-4.20.X',true);
        
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
                
                $this->load->template('incidentaccidentreportingpageexemptproj_view', $data);
                
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
                
                
                if($this->incidentaccidentreport_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSave)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
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
                
                
                if($this->incidentaccidentreport_model->insert_new_applicant_data($data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('incidentaccidentreport/index');
                    
                    
                    
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
            
            $data['retrieved'] = $this->incidentaccidentreport_model->get_form_by_project_id($id);
            
        
            $this->load->template('incidentaccidentreportingpageexemptproj_view', $data);
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
                
                $this->load->template('incidentaccidentreportingpageexemptproj_view', $data);
                
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
                    
               
                
                
                if($this->incidentaccidentreport_model->update_applicant_data($appID, $data) && $this->project_model->update_applicant_data($appID, $editableValue)){
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $data);
                    redirect('home/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('incidentaccidentreportingpageexemptproj/index');
                     
                    
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
            
        
            $this->load->template('incidentaccidentreportingpageexemptproj_view', $data);
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
                
                $this->load->template('incidentaccidentreportingpageexemptproj_view', $data);
                
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
                
                
                if($this->incidentaccidentreport_model->update_saved_data($proj_id, $data) && $this->project_model->update_proj_status($proj_id, $projectSave)){
                    
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
                
                
                if($this->incidentaccidentreport_model->update_saved_data($proj_id, $data) && $this->project_model->update_proj_status($proj_id, $projectSubmit)){
                    
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
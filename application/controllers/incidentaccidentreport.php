<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class incidentaccidentreport extends CI_Controller{
        
        function __construct()
        {
            parent::__construct();

            $this->load->database();
            $this->load->model('incidentaccidentreport_model');
            $this->load->model('notification_model');
        }
        
        public function index(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['hirarctype']= $this->input->get('type');
            
                      
            
            
            $this->form_validation->set_rules('victim_name', 'Victim name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('victim_age', 'Victim age', 'required');
            $this->form_validation->set_rules('victim_citizenship', 'Victim citizenship', 'required');
            $this->form_validation->set_rules('victim_employment_designation', 'victim employment designation', 'required');
            $this->form_validation->set_rules('victim_faculty', 'Victim faculty', 'required');
            $this->form_validation->set_rules('review_date', 'review date', 'required');
            $this->form_validation->set_rules('incident_date', 'incident date', 'required');
            $this->form_validation->set_rules('incident_location', 'incident location', 'required');
            $this->form_validation->set_rules('incident_details', 'incident details', 'required');
            $this->form_validation->set_rules('incident_actions', 'incident actions', 'required');
            $this->form_validation->set_rules('reporter_name', 'reporter name', 'required');
            $this->form_validation->set_rules('reporter_designation', 'reporter designation', 'required');
            $this->form_validation->set_rules('reporter_date', 'reporter date', 'required');
            $this->form_validation->set_rules('investigation_victim_age', 'investigation victim age', 'required');
            $this->form_validation->set_rules('investigation_victim_citizenship', 'investigation victim citizenship', 'required');
            $this->form_validation->set_rules('investigation_victim_job_description', 'investigation victim job description', 'required');
            $this->form_validation->set_rules('investigation_findings', 'investigation findings', 'required');
            $this->form_validation->set_rules('investigation_preventive_no[0]', 'investigation preventive no', 'required|callback_fullname_check');
            $this->form_validation->set_rules('investigation_preventive_action[0]', 'investigation preventive action', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('investigation_preventive_by_whom[0]', 'investigation preventive by whom', 'required');
            $this->form_validation->set_rules('investigation_preventive_timeline[0]', 'investigation preventive timeline', 'required');
            
            
            
            if ($this->form_validation->run() == FALSE){
                
                //$data['load'] = "true";
                //$id = 1;
                //$data['retrieved'] = $this->annex2_model->get_form_by_id($id);
                
                $this->load->template('incidentaccidentreport_view', $data);
                
            }else{
                
                $ar1 = implode(',',$this->input->post('investigation_preventive_no'));
                $ar2 = implode(',',$this->input->post('investigation_preventive_action'));
                $ar3 = implode(',',$this->input->post('investigation_preventive_by_whom'));
                $ar4 = implode(',',$this->input->post('investigation_preventive_timeline'));
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
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
                    'application_type' => $this->input->post('application_type')
                );
                
                
                if($this->incidentaccidentreport_model->insert_new_applicant_data($data)){
                    
                   $this->notification_model->insert_new_notification(null, 4, "New Incident Accident Report Application", "The following user has submitted a new Incident Accident Report form: " . $this->session->userdata('account_name'));
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Form has been successfully submitted!</div>', $data);
                   redirect('incidentaccidentreport/index');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('incidentaccidentreport/index');
                    
                    
                    
                }
                
                
            }
            
            
            
        }
        
        public function load_form(){
            
            $data['readnotif'] = $this->notification_model->get_read($this->session->userdata('account_id'), $this->session->userdata('account_type'));
            
            $data['hirarctype']= $this->input->get('type');
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            //$id = $this->uri->segment(3);
            $id = $this->input->get('id');
            $data['retrieved'] = $this->incidentaccidentreport_model->get_form_by_id($id);
            
            $this->load->template('incidentaccidentreport_view', $data);
            
        }
        
        public function update_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['hirarctype']= $this->input->get('type');
            
            $this->form_validation->set_rules('victim_name', 'Victim name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('victim_age', 'Victim age', 'required');
            $this->form_validation->set_rules('victim_citizenship', 'Victim citizenship', 'required');
            $this->form_validation->set_rules('victim_employment_designation', 'victim employment designation', 'required');
            $this->form_validation->set_rules('victim_faculty', 'Victim faculty', 'required');
            $this->form_validation->set_rules('review_date', 'review date', 'required');
            $this->form_validation->set_rules('incident_date', 'incident date', 'required');
            $this->form_validation->set_rules('incident_location', 'incident location', 'required');
            $this->form_validation->set_rules('incident_details', 'incident details', 'required');
            $this->form_validation->set_rules('incident_actions', 'incident actions', 'required');
            $this->form_validation->set_rules('reporter_name', 'reporter name', 'required');
            $this->form_validation->set_rules('reporter_designation', 'reporter designation', 'required');
            $this->form_validation->set_rules('reporter_date', 'reporter date', 'required');
            /*$this->form_validation->set_rules('investigation_victim_age', 'investigation victim age', 'required');
            $this->form_validation->set_rules('investigation_victim_citizenship', 'investigation victim citizenship', 'required');
            $this->form_validation->set_rules('investigation_victim_job_description', 'investigation victim job description', 'required');
            $this->form_validation->set_rules('investigation_findings', 'investigation findings', 'required');
            $this->form_validation->set_rules('investigation_preventive_no[0]', 'investigation preventive no', 'required');
            $this->form_validation->set_rules('investigation_preventive_action[0]', 'investigation preventive action', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('investigation_preventive_by_whom[0]', 'investigation preventive by whom', 'required');
            $this->form_validation->set_rules('investigation_preventive_timeline[0]', 'investigation preventive timeline', 'required');*/
            
            
            
            if ($this->form_validation->run() == FALSE){
                
                $this->load->template('incidentaccidentreport_view', $data);
                
            }else{
                
                $ar1 = implode(',',$this->input->post('investigation_preventive_no'));
                $ar2 = implode(',',$this->input->post('investigation_preventive_action'));
                $ar3 = implode(',',$this->input->post('investigation_preventive_by_whom'));
                $ar4 = implode(',',$this->input->post('investigation_preventive_timeline'));
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
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
                    'editable' => $editableValue
                );
                
                
                if($this->incidentaccidentreport_model->update_applicant_data($appID, $data)){
                    
                    $this->notification_model->insert_new_notification(null, 4, "Incident Accident Report Application Updated", "The following user has updated an Incident Accident Report form: " . $this->session->userdata('account_name'));
                    
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
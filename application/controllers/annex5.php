<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class annex5 extends CI_Controller{
        
        function __construct()
        {
            parent::__construct();

            $this->load->database();
			$this->load->model('notification_model');
            $this->load->model('annex5_model');
            
            //breadcrum
		    $this->breadcrumbs->unshift('Home', '/');	
		    $this->breadcrumbs->push('Application','/applicationpage' ,true);
            $this->breadcrumbs->push('Extension OR Termination of Approved Project', true);
            
        }
        
        public function index(){
			$data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('identification_PI_name', 'Name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('identification_email_address', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('identification_faculty', 'Faculty', 'required');
            $this->form_validation->set_rules('identification_telephone', 'Telephone', 'required');
            $this->form_validation->set_rules('identification_IBC_reference_no', 'IBC reference', 'required');
            $this->form_validation->set_rules('identification_NBB_reference_no', 'NBB reference', 'required');
            $this->form_validation->set_rules('identification_project_title', 'Project Title', 'required');
            $this->form_validation->set_rules('identification_LMO_rDNA', 'LMO/rDNA Materials', 'required');
            $this->form_validation->set_rules('request_type', 'Request Type', 'required');
            //$this->form_validation->set_rules('request_description', 'Request Description', 'required');
            $this->form_validation->set_rules('PI_change', 'Principal Investigator change', 'required');
            $this->form_validation->set_rules('RG_change', 'Risk Group (RG) change', 'required');
            $this->form_validation->set_rules('BSL_change', 'Biosafety Level (BSL) change', 'required');
            $this->form_validation->set_rules('LMO_rDNA_type_change', 'LMO/rDNA materials change', 'required');
            $this->form_validation->set_rules('LMO_rDNA_moved', 'LMO/rDNA moved', 'required');
            $this->form_validation->set_rules('LMO_rDNA_usage_change', 'LMO/rDNA usage change', 'required');
            $this->form_validation->set_rules('adverse_events', 'adverse events', 'required');
            $this->form_validation->set_rules('incident_report', 'incident report', 'required');
            $this->form_validation->set_rules('signature_PI_name', 'Principal Investigator Name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('signature_PI_date', 'Principal Investigator Date Signed', 'required');
            //$this->form_validation->set_rules('signature_BO_name', 'Biosafety Officer Name', 'required|callback_fullname_check');
            //$this->form_validation->set_rules('signature_BO_date', 'Biosafety Officer Date Signed', 'required');
            //$this->form_validation->set_rules('signature_IBC_name', 'IBC Chair Name', 'required|callback_fullname_check');
            //$this->form_validation->set_rules('signature_IBC_date', 'IBC Chair Date Signed', 'required');
            //$this->form_validation->set_rules('IBC_approval[]', 'IBC approval', 'required');
            //$this->form_validation->set_rules('IBC_termination', 'IBC termination', 'required');
            
            if ($this->form_validation->run() == FALSE)
            {
                
                $this->load->template('annex5_view',$data);
                
            }
            else
            {
                $ar1 = implode(',',$this->input->post('IBC_approval'));
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'identification_PI_name' => $this->input->post('identification_PI_name'),
                    'identification_email_address' => $this->input->post('identification_email_address'),
                    'identification_faculty' => $this->input->post('identification_faculty'),
                    'identification_telephone' => $this->input->post('identification_telephone'),
                    'identification_IBC_reference_no' => $this->input->post('identification_IBC_reference_no'),
                    'identification_NBB_reference_no' => $this->input->post('identification_NBB_reference_no'),
                    'identification_project_title' => $this->input->post('identification_project_title'),
                    'identification_LMO_rDNA' => $this->input->post('identification_LMO_rDNA'),
                    'request_type' => $this->input->post('request_type'),
                    'PI_change' => $this->input->post('PI_change'),
                    'RG_change' => $this->input->post('RG_change'),
                    'BSL_change' => $this->input->post('BSL_change'),
                    'LMO_rDNA_type_change' => $this->input->post('LMO_rDNA_type_change'),
                    'LMO_rDNA_moved' => $this->input->post('LMO_rDNA_moved'),
                    'adverse_events' => $this->input->post('adverse_events'),
                    'incident_report' => $this->input->post('incident_report'),
                    'signature_PI_name' => $this->input->post('signature_PI_name'),
                    'signature_PI_date' => $this->input->post('signature_PI_date'),
                    'signature_BO_name' => $this->input->post('signature_BO_name'),
                    'signature_BO_date' => $this->input->post('signature_BO_date'),
                    'signature_IBC_name' => $this->input->post('signature_BO_date'),
                    'signature_IBC_date' => $this->input->post('signature_BO_date'),
                    'IBC_approval' => $this->input->post('IBC_approval'),
                    'IBC_termination' => $this->input->post('IBC_termination')
                );
                
                if($this->annex5_model->insert_new_applicant_data($data)){
                    
                   $this->notification_model->insert_new_notification(null, 4, "New Annex 5 Application", "The following user has submitted a new Annex 5 form: " . $this->session->userdata('account_name'));
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Form has been successfully submitted!</div>', $data);
                   redirect('annex5/index');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('annex5/index');
                    
                    
                    
                }
                
                
            }
            
        }
        
        public function load_form(){
            
            $data['readnotif'] = $this->notification_model->get_read($this->session->userdata('account_id'), $this->session->userdata('account_type'));
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            //$id = $this->uri->segment(3);
            $id = $this->input->get('id');
            $data['retrieved'] = $this->annex5_model->get_form_by_id($id);
            
            $this->load->template('annex5_view', $data);
            
        }
        
        public function update_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('identification_PI_name', 'Name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('identification_email_address', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('identification_faculty', 'Faculty', 'required');
            $this->form_validation->set_rules('identification_telephone', 'Telephone', 'required');
            $this->form_validation->set_rules('identification_IBC_reference_no', 'IBC reference', 'required');
            $this->form_validation->set_rules('identification_NBB_reference_no', 'NBB reference', 'required');
            $this->form_validation->set_rules('identification_project_title', 'Project Title', 'required');
            $this->form_validation->set_rules('identification_LMO_rDNA', 'LMO/rDNA Materials', 'required');
            $this->form_validation->set_rules('request_type', 'Request Type', 'required');
            //$this->form_validation->set_rules('request_description', 'Request Description', 'required');
            $this->form_validation->set_rules('PI_change', 'Principal Investigator change', 'required');
            $this->form_validation->set_rules('RG_change', 'Risk Group (RG) change', 'required');
            $this->form_validation->set_rules('BSL_change', 'Biosafety Level (BSL) change', 'required');
            $this->form_validation->set_rules('LMO_rDNA_type_change', 'LMO/rDNA materials change', 'required');
            $this->form_validation->set_rules('LMO_rDNA_moved', 'LMO/rDNA moved', 'required');
            $this->form_validation->set_rules('LMO_rDNA_usage_change', 'LMO/rDNA usage change', 'required');
            $this->form_validation->set_rules('adverse_events', 'adverse events', 'required');
            $this->form_validation->set_rules('incident_report', 'incident report', 'required');
            $this->form_validation->set_rules('signature_PI_name', 'Principal Investigator Name', 'required|callback_fullname_check');
            $this->form_validation->set_rules('signature_PI_date', 'Principal Investigator Date Signed', 'required');
            //$this->form_validation->set_rules('signature_BO_name', 'Biosafety Officer Name', 'required|callback_fullname_check');
            //$this->form_validation->set_rules('signature_BO_date', 'Biosafety Officer Date Signed', 'required');
            //$this->form_validation->set_rules('signature_IBC_name', 'IBC Chair Name', 'required|callback_fullname_check');
            //$this->form_validation->set_rules('signature_IBC_date', 'IBC Chair Date Signed', 'required');
            //$this->form_validation->set_rules('IBC_approval[]', 'IBC approval', 'required');
            //$this->form_validation->set_rules('IBC_termination', 'IBC termination', 'required');
            
            if ($this->form_validation->run() == FALSE)
            {
                
                $this->load->template('annex5_view',$data);
                
            }
            else
            {
                $ar1 = implode(',',$this->input->post('IBC_approval'));
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'identification_PI_name' => $this->input->post('identification_PI_name'),
                    'identification_email_address' => $this->input->post('identification_email_address'),
                    'identification_faculty' => $this->input->post('identification_faculty'),
                    'identification_telephone' => $this->input->post('identification_telephone'),
                    'identification_IBC_reference_no' => $this->input->post('identification_IBC_reference_no'),
                    'identification_NBB_reference_no' => $this->input->post('identification_NBB_reference_no'),
                    'identification_project_title' => $this->input->post('identification_project_title'),
                    'identification_LMO_rDNA' => $this->input->post('identification_LMO_rDNA'),
                    'request_type' => $this->input->post('request_type'),
                    'PI_change' => $this->input->post('PI_change'),
                    'RG_change' => $this->input->post('RG_change'),
                    'BSL_change' => $this->input->post('BSL_change'),
                    'LMO_rDNA_type_change' => $this->input->post('LMO_rDNA_type_change'),
                    'LMO_rDNA_moved' => $this->input->post('LMO_rDNA_moved'),
                    'adverse_events' => $this->input->post('adverse_events'),
                    'incident_report' => $this->input->post('incident_report'),
                    'signature_PI_name' => $this->input->post('signature_PI_name'),
                    'signature_PI_date' => $this->input->post('signature_PI_date'),
                    'signature_BO_name' => $this->input->post('signature_BO_name'),
                    'signature_BO_date' => $this->input->post('signature_BO_date'),
                    'signature_IBC_name' => $this->input->post('signature_BO_date'),
                    'signature_IBC_date' => $this->input->post('signature_BO_date'),
                    'IBC_approval' => $this->input->post('IBC_approval'),
                    'IBC_termination' => $this->input->post('IBC_termination'),
                    'editable' => $editableValue
                );
                
                if($this->annex5_model->update_applicant_data($appID, $data)){
                    
                    $this->notification_model->insert_new_notification(null, 4, "Annex 5 Application Updated", "The following user has updated an Annex 5 form: " . $this->session->userdata('account_name'));
                    
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
        
        public function phone_check($str) {
            
            if (!preg_match('/^(\+?6?01)[0|1|2|3|4|6|7|8|9]\-*[0-9]{7,8}$/', $str)) {
                $this->form_validation->set_message('phone_check', 'Use a valid phone number');
                return FALSE;
            } else {
                return TRUE;
            }
        }
        
    }
?>
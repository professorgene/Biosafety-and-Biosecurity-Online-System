<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class biohazardous_materialpage extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('project_model');
        
        //breadcrum
		$this->breadcrumbs->unshift('Home', '/');
        $this->breadcrumbs->push('New Project','/projectselect', true);		
		$this->breadcrumbs->push('Application','/applicationpage', true);
        $this->breadcrumbs->push('New Application','/newapplicationpage', true);
        $this->breadcrumbs->push('Biohazardous Material', true);
    }
		
		public function index(){
			 $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('project_name', 'Project Name', 'required');
            $this->form_validation->set_rules('project_desc', 'Project Description', 'required');
        
            # Submit form
            if($this->form_validation->run() == FALSE){
                # validation fails
                $this->load->template('biohazardous_materialpage_view',$data);
            } else {
                $data = array(
                    'project_name' => $this->input->post('project_name'),
                    'project_desc' => $this->input->post('project_desc'),
                    'account_id' => $this->session->userdata('account_id')
                );
            
                if($this->project_model->insert_new_proj($data)){
                    #$this->notification_model->insert_new_notification(null, 4, "New Registration", "The following user has requested for an account: " . $this->input->post('account_fullname'));
                    #$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully created a new project!<br/>You may now return to the homepage.</div>');
                    #$this->email_model->send_email( $this->input->post('account_email'), "New Registration Details", "<p>Dear ". $this->input->post('account_fullname') .", <br/><br/>You have successfully requested for an account. Please wait between 1-3 working days before logging in again.</p>");
                     
                    $this->session->set_userdata('projectName', $data['project_name']);
                    
                    
                    redirect('biohazardproj/index');
                } else {
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                    redirect('biohazardous_materialpage/index');
                }
            }
        }
        
    
}
?>

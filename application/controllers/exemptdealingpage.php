<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class exemptdealingpage extends CI_Controller {
	
	
	function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('project_model');
        
         //breadcrum
		$this->breadcrumbs->unshift('Home', '/');	
		$this->breadcrumbs->push('Application','/applicationpage', true);
        $this->breadcrumbs->push('New Application','/newapplicationpage', true);
        $this->breadcrumbs->push('Exempt Dealing', true);
    }
		
		public function index(){
			 $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('project_name', 'Project Name', 'required');
            $this->form_validation->set_rules('project_desc', 'Project Description', 'required');
        
            # Submit form
            if($this->form_validation->run() == FALSE){
                # validation fails
                $this->load->template('exemptdealingpage_view',$data);
            } else {
                $data = array(
                    'project_name' => $this->input->post('project_name'),
                    'project_desc' => $this->input->post('project_desc'),
                    'account_id' => $this->session->userdata('account_id')
                );
            
                if($this->project_model->insert_new_proj($data)){
                     
                    $this->session->set_userdata('projectName', $data['project_name']);
                    
                    redirect('exemptproj/index');
                } else {
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                    redirect('exemptproj/index');
                }
            }
            
            
        }

	
}
?>

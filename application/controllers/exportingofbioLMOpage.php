<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class exportingofbioLMOpage extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('announcement_model');
        $this->load->model('project_model');
        
			//breadcrum
            $this->breadcrumbs->unshift('Home', '/');
			$this->breadcrumbs->push('New Project','/projectselect', true);	
            $this->breadcrumbs->push('Exporting of Biological Material','exportingbiologicalmaterialpage', true);
            $this->breadcrumbs->push('Form F', true);
    }
		
		public function index(){
			$data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
    
            
			$this->form_validation->set_rules('project_name', 'Project Name', 'required');
            $this->form_validation->set_rules('project_desc', 'Project Description', 'required');
        
            # Submit form
            if($this->form_validation->run() == FALSE){
                # validation fails
                $data['product_list'] = $this->announcement_model->list_product()->result();
                $this->load->template('exportingofbioLMOpage_view', $data);
            } else {
                $data = array(
                    'project_name' => $this->input->post('project_name'),
                    'project_desc' => $this->input->post('project_desc'),
                    'project_type' => 'exportLMO',
                    'account_id' => $this->session->userdata('account_id')
                );
            
                if($this->project_model->insert_new_proj($data)){
                    
                    //if data succesfully submitted, retrieve the row that has the same name as the one just submitted
                    $name = $this->input->post('project_name');
                     $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
                    $data['session'] = $this->project_model->get_proj_name($name);
                                    
                    $this->load->template('exportingofbioLMOproj_view', $data);
                } else {
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                    redirect('formf/index');
                }
            }
        }
		
		public function add()
		{
			$this->load->template('product_form');
		}
		public function save()
		{
			$array_item = array(
				'announcement_id' => $this->input->post('announcement_id'),
				//'account_id' => $this->input->post('account_id'),
				'announcement_description' => $this->input->post('announcement_description'),
				'announcement_date' => $this->input->post('announcement_date')
				);
			$this->load->model('announcement_model');
			$this->announcement_model->save($array_item);
			redirect('exportingofbioLMOpage');
		}
		public function save_edit()
		{
			$id = $this->input->post('announcement_id');
			$array_item = array(
				'announcement_id' => $this->input->post('announcement_id'),
				//'account_id' => $this->input->post('account_id'),
				'announcement_description' => $this->input->post('announcement_description'),
				'announcement_date' => $this->input->post('announcement_date')
				);
			$this->load->model('announcement_model');
			$this->announcement_model->update($id,$array_item);
			redirect('exportingofbioLMOpage');
		}
		public function edit(){
			$data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
			$this->load->model('announcement_model');
			$data['list_product'] = $this->announcement_model->list_product()->row_array();
			$this->load->template('exportingofbioLMOpage_view',$data);
		}
}
?>
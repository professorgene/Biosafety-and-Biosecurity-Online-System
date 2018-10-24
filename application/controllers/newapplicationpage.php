<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class newapplicationpage extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
		$this->load->model('announcement_model');
        
        //breadcrum
		$this->breadcrumbs->unshift('Home', '/');	
		$this->breadcrumbs->push('New Project','/projectselect', true);
		$this->breadcrumbs->push('Application','/applicationpage', true);
		$this->breadcrumbs->push('New Application', true);
    }
		
		public function index(){
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );

        # change the value inside ( ' HERE ' ) to call different announcement for different pages
        $data['announcement'] = $this->announcement_model->get_all_announcement( 'newapplicationpage' );

        $this->load->template('newapplicationpage_view', $data);
    }
		
		# reuse this function, do not create another new_announcement()!
    public function new_announcement() {
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $page = $this->uri->segment(3);
        $data['page'] = $page;
        $this->form_validation->set_rules('ann_title', 'Announcement title', 'required');
        $this->form_validation->set_rules('ann_desc', 'Announcement description', 'required');
        
        # Submit form
        if($this->form_validation->run() == FALSE){
            # validation fails
            $this->load->template('new_announcement_view', $data);
        } else {
            $data = array(
                'account_id' => $this->session->userdata('account_id'),
                'announcement_title' => $this->input->post('ann_title'),
                'announcement_desc' => $this->input->post('ann_desc'),
                'announcement_page' => $this->input->post('ann_page')
            );
            
            if($this->announcement_model->insert_new_announcement($data)){
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully created a new announcement!</div>');
                # change the value inside redirect( 'HERE' ) to call different announcement for different pages
                redirect('newapplicationpage/index');
            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                # change the value inside redirect( 'HERE' ) to call different announcement for different pages
                redirect('newapplicationpage/index');
            }
        }
    }

    public function delete_announcement($id) {
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $id = $this->uri->segment(3);

        # change the value inside (#id, ' HERE ' ) to call different announcement for different pages
        $data['announcement'] = $this->announcement_model->remove_announcement($id, 'newapplicationpage' );
        # change the value inside ( ' HERE ' ) to call different announcement for different pages
        $data['announcement'] = $this->announcement_model->get_all_announcement( 'newapplicationpage' );

        redirect('newapplicationpage/index');
    }
}
?>

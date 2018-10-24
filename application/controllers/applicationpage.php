<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class applicationpage extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
		$this->load->model('announcement_model');

		//breadcrum
		$this->breadcrumbs->unshift('Home', '/');	
		$this->breadcrumbs->push('New Project','/projectselect', true);
		$this->breadcrumbs->push('Application', true);
    }
		
    public function index(){
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );

        # change the value inside ( ' HERE ' ) to call different announcement for different pages
        $data['announcement'] = $this->announcement_model->get_all_announcement( 'applicationpage' );

        $this->load->template('applicationpage_view', $data);
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
                $originPage = $this->input->post('ann_page');
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully created a new announcement!</div>');
                
                if($originPage == 'applicationpage'){
                    redirect('applicationpage/index');
                    
                }elseif($originPage == 'procurementpage'){
                    redirect('procurementpage/index');
                    
                }elseif($originPage == 'notifbio'){
                    redirect('notificationbiohazardouspage/index');
                    
                }elseif($originPage == 'exportbiomaterial'){
                    redirect('exportingbiologicalmaterialpage/index');
                    
                }elseif($originPage == 'exportBioLmo'){
                    redirect('exportingofbioLMOpage/index');
                    
                }elseif($originPage == 'exportexempt'){
                    redirect('exportingofbioexemptdealingpage/index');
                    
                }elseif($originPage == 'lmo61page'){
                    redirect('lmo61page/index');
                    
                }elseif($originPage == 'minorbiopage'){
                    redirect('minorbiopage/index');
                    
                }elseif($originPage == 'majorincident'){
                    redirect('majorincidentaccidentreportingpage/index');
                    
                }elseif($originPage == 'occupation'){
                    redirect('occupationaldiseaseexposurepage/index');
                    
                }elseif($originPage == 'annualfinal'){
                    redirect('annualfinalreportpage/index');
                    
                }
                
            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                # change the value inside redirect( 'HERE' ) to call different announcement for different pages
                redirect('applicationpage/index');
            }
        }
    }

    public function delete_announcement($id) {
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $id = $this->uri->segment(3);

        # change the value inside (#id, ' HERE ' ) to call different announcement for different pages
        $data['announcement'] = $this->announcement_model->remove_announcement($id, 'applicationpage' );
        # change the value inside ( ' HERE ' ) to call different announcement for different pages
        $data['announcement'] = $this->announcement_model->get_all_announcement( 'applicationpage' );

        redirect('applicationpage/index');
    }
}
?>

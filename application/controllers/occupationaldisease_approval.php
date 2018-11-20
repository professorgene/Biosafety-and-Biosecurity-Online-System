<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class occupationaldisease_approval extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('incidentaccidentreport_model');
        $this->load->model('annex4_model');
        $this->load->model('email_model');
        $this->load->model('project_model');
        $this->load->model('comment_model');
        
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('Incident Accident Reporting','/incidentaccident_type',true);
		$this->breadcrumbs->push('LMO','/incidentaccident_LMO_type', true);
		$this->breadcrumbs->push('Occupational Disease Or Exposure', true);
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $data['all_major'] = $this->project_model->get_all_sub_incident3_form();
        $data['all_major_HSO'] = $this->project_model->get_all_sub_incident3_form2();
        $data['all_major_SSBC'] = $this->project_model->get_all_sub_incident3_form2();
        
        $this->load->template('occupationaldisease_approval_view', $data);
	}
    
    //Methods For Approving And Rejecting Incident Accident Forms
    public function approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        
        $this->project_model->occupational_update_approval($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 3, "Occupational Disease or Exposure Project Approved", "BSO has approved a Occupational Disease or Exposure Project.");
        
        $this->notification_model->insert_new_notification(null, 5, "Occupational Disease or Exposure Project Approved", "BSO has approved a Occupational Disease or Exposure Project.");
        
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been approved!</div>');
        
        redirect('occupationaldisease_approval/index');
    }
    
    public function reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        //$msg = base64_decode($this->uri->segment(5));
        
        $this->project_model->occupational_update_approval($id, 0, $approver_id, $appID);
        
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been rejected!</div>');
        
        redirect('occupationaldisease_approval/index');
    }
    
    public function approve2($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        
        $r1 = $this->project_model->get_sub_proj_by_proj_id($appID);
        $r2 = $this->comment_model->get_comment_by_project_id($appID);
        
        foreach ($r1 as $q1) {
            foreach ($r2 as $q2) {
                if( $q2->no_of_ssbc == 1 ){
                    if($q1->SSBC_mem1_id == null ){
                        # do projectapproval update based on approve / reject
                        $this->project_model->update_ssbc1($appID, $approver_id, 1);
                        $this->project_model->occupational_update_approval_SSBC($id, 1, $approver_id, $appID);

                    }
                } elseif ( $q2->no_of_ssbc == 2 ){
                    if( $q1->SSBC_mem2_id == null ){
                        if( $q1->SSBC_mem1_id != null && $q1->SSBC_mem1_id != $approver_id ){

                            $this->project_model->update_ssbc2($appID, $approver_id, 1);
                            
                            $r3 = $this->project_model->get_sub_proj_by_proj_id($appID);
                            foreach ( $r3 as $q3 ) {
                                $add = $q3->SSBC_mem2_res + $q3->SSBC_mem1_res;
                                $average = $add / 2;
                            }

                            if($average > 0.5){
                                $this->project_model->occupational_update_approval_SSBC($id, 1, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Approved</div>');
                                redirect('occupationaldisease_approval/index');
                            }elseif($average <= 0.5){
                                $this->project_model->occupational_update_approval_SSBC($id, 0, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Rejected</div>');
                                redirect('occupationaldisease_approval/index');
                            }

                        } elseif ( $q1->SSBC_mem1_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('occupationaldisease_approval/index');
                        } else {
                            # do ssbc1 = this approver id 
                            $this->project_model->update_ssbc1($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                        }

                    }
                } elseif ( $q2->no_of_ssbc == 3 ){
                    if( $q1->SSBC_mem3_id == null ){
                        if( $q1->SSBC_mem2_id != null && $q1->SSBC_mem2_id != $approver_id ){

                            $this->project_model->update_ssbc3($appID, $approver_id, 1);
                            
                            $r3 = $this->project_model->get_sub_proj_by_proj_id($appID);
                            foreach ( $r3 as $q3 ) {
                                $add = $q3->SSBC_mem3_res + $q3->SSBC_mem2_res + $q3->SSBC_mem1_res;
                                $average = $add / 3;
                            }

                            if($average > 0.5){
                                $this->project_model->occupational_update_approval_SSBC($id, 1, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Approved</div>');
                                redirect('occupationaldisease_approval/index');
                            }elseif($average <= 0.5){
                                $this->project_model->occupational_update_approval_SSBC($id, 0, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Rejected</div>');
                                redirect('occupationaldisease_approval/index');
                            }

                        } elseif ( $q1->SSBC_mem2_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('occupationaldisease_approval/index');
                            
                        } elseif( $q1->SSBC_mem1_id != null && $q1->SSBC_mem1_id != $approver_id ){

                            $this->project_model->update_ssbc2($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                            

                        } elseif ( $q1->SSBC_mem1_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('occupationaldisease_approval/index');
                        } else {
                            # do ssbc1 = this approver id 
                            $this->project_model->update_ssbc1($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                        }

                    }
                } elseif ( $q2->no_of_ssbc == 4 ){
                    if( $q1->SSBC_mem4_id == null ){
                        if( $q1->SSBC_mem3_id != null && $q1->SSBC_mem3_id != $approver_id ){

                            $this->project_model->update_ssbc4($appID, $approver_id, 1);
                            
                            $r3 = $this->project_model->get_sub_proj_by_proj_id($appID);
                            foreach ( $r3 as $q3 ) {
                                $add = $q3->SSBC_mem4_res + $q3->SSBC_mem3_res + $q3->SSBC_mem2_res + $q3->SSBC_mem1_res;
                                $average = $add / 4;
                            }

                            if($average > 0.5){
                                $this->project_model->occupational_update_approval_SSBC($id, 1, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Approved</div>');
                                redirect('occupationaldisease_approval/index');
                            }elseif($average <= 0.5){
                                $this->project_model->occupational_update_approval_SSBC($id, 0, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Rejected</div>');
                                redirect('occupationaldisease_approval/index');
                            }

                        } elseif( $q1->SSBC_mem2_id != null && $q1->SSBC_mem2_id != $approver_id ){

                            $this->project_model->update_ssbc3($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                            

                        } elseif ( $q1->SSBC_mem2_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            
                            redirect('occupationaldisease_approval/index');
                            
                        } elseif( $q1->SSBC_mem1_id != null && $q1->SSBC_mem1_id != $approver_id ){

                            $this->project_model->update_ssbc2($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                            

                        } elseif ( $q1->SSBC_mem1_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('occupationaldisease_approval/index');
                        } else {
                            # do ssbc1 = this approver id 
                            $this->project_model->update_ssbc1($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                        }

                    }
                } elseif ( $q2->no_of_ssbc == 5 ){
                    if( $q1->SSBC_mem5_id == null ){
                        if( $q1->SSBC_mem4_id != null && $q1->SSBC_mem4_id != $approver_id ){

                            $this->project_model->update_ssbc5($appID, $approver_id, 1);
                            
                            $r3 = $this->project_model->get_sub_proj_by_proj_id($appID);
                            foreach ( $r3 as $q3 ) {
                                $add = $q3->SSBC_mem5_res + $q3->SSBC_mem4_res + $q3->SSBC_mem3_res + $q3->SSBC_mem2_res + $q3->SSBC_mem1_res;
                                $average = $add / 5;
                            }

                            if($average > 0.5){
                                $this->project_model->occupational_update_approval_SSBC($id, 1, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Approved</div>');
                                redirect('occupationaldisease_approval/index');
                            }elseif($average <= 0.5){
                                $this->project_model->occupational_update_approval_SSBC($id, 0, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Rejected</div>');
                                redirect('occupationaldisease_approval/index');
                            }

                        } elseif( $q1->SSBC_mem3_id != null && $q1->SSBC_mem3_id != $approver_id ){

                            $this->project_model->update_ssbc4($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                            

                        } elseif ( $q1->SSBC_mem3_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            
                            redirect('occupationaldisease_approval/index');
                            
                        } elseif( $q1->SSBC_mem2_id != null && $q1->SSBC_mem2_id != $approver_id ){

                            $this->project_model->update_ssbc3($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                            

                        } elseif ( $q1->SSBC_mem2_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('occupationaldisease_approval/index');
                            
                        } elseif( $q1->SSBC_mem1_id != null && $q1->SSBC_mem1_id != $approver_id ){

                            $this->project_model->update_ssbc2($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                            

                        } elseif ( $q1->SSBC_mem1_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('occupationaldisease_approval/index');
                        } else {
                            # do ssbc1 = this approver id 
                            $this->project_model->update_ssbc1($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                        }

                    }
                }
            }
        }
        
        //$this->project_model->occupational_update_approval_SSBC($id, 1, $approver_id, $appID);
        
        //send email to victim or witnesses for investigation outcomes
        $this->email_model->send_email($result[0]->account_email, "Occupational Disease or Exposure Project Submission Processed", "<p>Dear ". $result[0]->account_fullname .", Your Occupational Disease or Exposure Project Submission Has Been Processed.</p>");
        
		$this->notification_model->insert_new_notification($id, 1, "Occupational Disease or Exposure Project Submission Processed", "Occupational Disease or Exposure Project Submission Processed by : " . $this->session->userdata('account_name'));
		
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been approved!</div>');
        
        redirect('occupationaldisease_approval/index');
    }
    
    public function reject2($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        //$msg = base64_decode($this->uri->segment(5));
        
        $r1 = $this->project_model->get_sub_proj_by_proj_id($appID);
        $r2 = $this->comment_model->get_comment_by_project_id($appID);
        
        foreach ($r1 as $q1) {
            foreach ($r2 as $q2) {
                if( $q2->no_of_ssbc == 1 ){
                    if($q1->SSBC_mem1_id == null ){
                        # do projectapproval update based on approve / reject
                        $this->project_model->update_ssbc1($appID, $approver_id, 1);
                        $this->project_model->occupational_update_approval_SSBC($id, 0, $approver_id, $appID);

                    }
                } elseif ( $q2->no_of_ssbc == 2 ){
                    if( $q1->SSBC_mem2_id == null ){
                        if( $q1->SSBC_mem1_id != null && $q1->SSBC_mem1_id != $approver_id ){

                            $this->project_model->update_ssbc2($appID, $approver_id, 1);
                            
                            $r3 = $this->project_model->get_sub_proj_by_proj_id($appID);
                            foreach ( $r3 as $q3 ) {
                                $add = $q3->SSBC_mem2_res + $q3->SSBC_mem1_res;
                                $average = $add / 2;
                            }

                            if($average > 0.5){
                                $this->project_model->occupational_update_approval_SSBC($id, 1, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Approved</div>');
                                redirect('occupationaldisease_approval/index');
                            }elseif($average <= 0.5){
                                $this->project_model->occupational_update_approval_SSBC($id, 0, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Rejected</div>');
                                redirect('occupationaldisease_approval/index');
                            }

                        } elseif ( $q1->SSBC_mem1_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('occupationaldisease_approval/index');
                        } else {
                            # do ssbc1 = this approver id 
                            $this->project_model->update_ssbc1($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                        }

                    }
                } elseif ( $q2->no_of_ssbc == 3 ){
                    if( $q1->SSBC_mem3_id == null ){
                        if( $q1->SSBC_mem2_id != null && $q1->SSBC_mem2_id != $approver_id ){

                            $this->project_model->update_ssbc3($appID, $approver_id, 1);
                            
                            $r3 = $this->project_model->get_sub_proj_by_proj_id($appID);
                            foreach ( $r3 as $q3 ) {
                                $add = $q3->SSBC_mem3_res + $q3->SSBC_mem2_res + $q3->SSBC_mem1_res;
                                $average = $add / 3;
                            }

                            if($average > 0.5){
                                $this->project_model->occupational_update_approval_SSBC($id, 1, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Approved</div>');
                                redirect('occupationaldisease_approval/index');
                            }elseif($average <= 0.5){
                                $this->project_model->occupational_update_approval_SSBC($id, 0, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Rejected</div>');
                                redirect('occupationaldisease_approval/index');
                            }

                        } elseif ( $q1->SSBC_mem2_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('occupationaldisease_approval/index');
                            
                        } elseif( $q1->SSBC_mem1_id != null && $q1->SSBC_mem1_id != $approver_id ){

                            $this->project_model->update_ssbc2($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                            

                        } elseif ( $q1->SSBC_mem1_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('occupationaldisease_approval/index');
                        } else {
                            # do ssbc1 = this approver id 
                            $this->project_model->update_ssbc1($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                        }

                    }
                } elseif ( $q2->no_of_ssbc == 4 ){
                    if( $q1->SSBC_mem4_id == null ){
                        if( $q1->SSBC_mem3_id != null && $q1->SSBC_mem3_id != $approver_id ){

                            $this->project_model->update_ssbc4($appID, $approver_id, 1);
                            
                            $r3 = $this->project_model->get_sub_proj_by_proj_id($appID);
                            foreach ( $r3 as $q3 ) {
                                $add = $q3->SSBC_mem4_res + $q3->SSBC_mem3_res + $q3->SSBC_mem2_res + $q3->SSBC_mem1_res;
                                $average = $add / 4;
                            }

                            if($average > 0.5){
                                $this->project_model->occupational_update_approval_SSBC($id, 1, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Approved</div>');
                                redirect('occupationaldisease_approval/index');
                            }elseif($average <= 0.5){
                                $this->project_model->occupational_update_approval_SSBC($id, 0, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Rejected</div>');
                                redirect('occupationaldisease_approval/index');
                            }

                        } elseif( $q1->SSBC_mem2_id != null && $q1->SSBC_mem2_id != $approver_id ){

                            $this->project_model->update_ssbc3($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                            

                        } elseif ( $q1->SSBC_mem2_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            
                            redirect('occupationaldisease_approval/index');
                            
                        } elseif( $q1->SSBC_mem1_id != null && $q1->SSBC_mem1_id != $approver_id ){

                            $this->project_model->update_ssbc2($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                            

                        } elseif ( $q1->SSBC_mem1_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('occupationaldisease_approval/index');
                        } else {
                            # do ssbc1 = this approver id 
                            $this->project_model->update_ssbc1($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                        }

                    }
                } elseif ( $q2->no_of_ssbc == 5 ){
                    if( $q1->SSBC_mem5_id == null ){
                        if( $q1->SSBC_mem4_id != null && $q1->SSBC_mem4_id != $approver_id ){

                            $this->project_model->update_ssbc5($appID, $approver_id, 1);
                            
                            $r3 = $this->project_model->get_sub_proj_by_proj_id($appID);
                            foreach ( $r3 as $q3 ) {
                                $add = $q3->SSBC_mem5_res + $q3->SSBC_mem4_res + $q3->SSBC_mem3_res + $q3->SSBC_mem2_res + $q3->SSBC_mem1_res;
                                $average = $add / 5;
                            }

                            if($average > 0.5){
                                $this->project_model->occupational_update_approval_SSBC($id, 1, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Approved</div>');
                                redirect('occupationaldisease_approval/index');
                            }elseif($average <= 0.5){
                                $this->project_model->occupational_update_approval_SSBC($id, 0, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Rejected</div>');
                                redirect('occupationaldisease_approval/index');
                            }

                        } elseif( $q1->SSBC_mem3_id != null && $q1->SSBC_mem3_id != $approver_id ){

                            $this->project_model->update_ssbc4($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                            

                        } elseif ( $q1->SSBC_mem3_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            
                            redirect('occupationaldisease_approval/index');
                            
                        } elseif( $q1->SSBC_mem2_id != null && $q1->SSBC_mem2_id != $approver_id ){

                            $this->project_model->update_ssbc3($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                            

                        } elseif ( $q1->SSBC_mem2_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('occupationaldisease_approval/index');
                            
                        } elseif( $q1->SSBC_mem1_id != null && $q1->SSBC_mem1_id != $approver_id ){

                            $this->project_model->update_ssbc2($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                            

                        } elseif ( $q1->SSBC_mem1_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('occupationaldisease_approval/index');
                        } else {
                            # do ssbc1 = this approver id 
                            $this->project_model->update_ssbc1($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('occupationaldisease_approval/index');
                        }

                    }
                }
            }
        } 
        
        //$this->project_model->occupational_update_approval_SSBC($id, 0, $approver_id, $appID);
        $this->notification_model->insert_new_notification($id, 1, "Occupational Disease or Exposure Project Submission Processed Rejected", "Occupational Disease or Exposure Project Submission Rejected by : " . $this->session->userdata('account_name'));
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been rejected!</div>');
        
        redirect('occupationaldisease_approval/index');
    }
    
    public function approve3($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->incidentaccidentreport_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        $this->annex4_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        $this->project_model->occupational_update_approval_HSO($id, 1, $approver_id, $appID);
        
        //send email to victim or witnesses for investigation outcomes
        $this->email_model->send_email($result[0]->account_email, "Occupational Disease or Exposure Project Submission Processed", "<p>Dear ". $result[0]->account_fullname .", Your Occupational Disease or Exposure Project Submission Has Been Processed.</p>");
        $this->notification_model->insert_new_notification($id, 1, "Occupational Disease or Exposure Project Submission Processed", "Occupational Disease or Exposure Project Submission Processed by : " . $this->session->userdata('account_name'));
		
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been approved!</div>');
        
        redirect('occupationaldisease_approval/index');
    }
    
    public function reject3($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        //$msg = base64_decode($this->uri->segment(5));
        $this->incidentaccidentreport_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        $this->annex4_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        $this->project_model->occupational_update_approval_HSO($id, 0, $approver_id, $appID);
        
		$this->notification_model->insert_new_notification($id, 1, "Occupational Disease or Exposure Project Submission Rejected", "Occupational Disease or Exposure Project Submission Rejected by : " . $this->session->userdata('account_name'));
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been rejected!</div>');
        redirect('occupationaldisease_approval/index');
    }
    
    
    
    
    
}

?>
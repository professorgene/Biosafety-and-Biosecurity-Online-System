<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class export_LMO_approval extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('formf_model');
        $this->load->model('email_model');
        $this->load->model('project_model');
        $this->load->model('comment_model');
		
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('Exporting of Biological Material','/exportingrequest',true);
		$this->breadcrumbs->push('Living Modified Organisms (LMO)', true);
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $data['all_formf_proj'] = $this->project_model->get_all_sub_export_LMO();
        $data['all_formf_SSBC_proj'] = $this->project_model->get_all_sub_export_LMO2();
        $data['all_formf_Chair_proj'] = $this->project_model->get_all_sub_export_LMO3();
        
        $this->load->template('export_LMO_approval_view', $data);
	}
    
    public function approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->formf_model->update_approval($id, 1, $approver_id, $appID);
        $this->project_model->formf_update_approval($id, 1, $approver_id, $appID);
        
        
        $this->notification_model->insert_new_notification(null, 3, "Notification For Exporting LMO Project Approved", "BSO has approved a Notification For Exporting LMO Project");
        
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been approved!</div>');
        
        redirect('export_LMO_approval/index');
    }
    
    public function reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        //$msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->formf_model->update_approval($id, 0, $approver_id, $appID);
        $this->project_model->formf_update_approval($id, 0, $approver_id, $appID);
        
        //Send email notify PI that their form has been rejected
        $this->email_model->send_email($result[0]->account_email, "Notification For Exporting LMO Project Submission Rejected", "<p>Dear ". $result[0]->account_fullname .", Your Notification For Exporting LMO Project Submission Has Been Rejected </p>");
        $this->notification_model->insert_new_notification($id, 1, "Notification For Exporting LMO Project Project Rejected", "Notification For Exporting LMO Project Rejected by : " . $this->session->userdata('account_name'));
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been rejected!</div>');
        
        redirect('export_LMO_approval/index');
    }
    
    public function approve2($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        
        $r1 = $this->project_model->get_sub_proj_by_proj_id($appID);
        $r2 = $this->comment_model->get_comment_by_project_id($appID);
        
        foreach ($r1 as $q1) {
            foreach ($r2 as $q2) {
                if( $q2->no_of_ssbc == 1 ){
                    if($q1->SSBC_mem1_id == null ){
                        # do projectapproval update based on approve / reject
                        $this->project_model->update_ssbc1($appID, $approver_id, 1);
                        $this->project_model->formf_update_approval_SSBC($id, 1, $approver_id, $appID);

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
                                $this->project_model->formf_update_approval_SSBC($id, 1, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Approved</div>');
                                redirect('export_LMO_approval/index');
                            }elseif($average <= 0.5){
                                $this->project_model->formf_update_approval_SSBC($id, 0, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Rejected</div>');
                                redirect('export_LMO_approval/index');
                            }

                        } elseif ( $q1->SSBC_mem1_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('export_LMO_approval/index');
                        } else {
                            # do ssbc1 = this approver id 
                            $this->project_model->update_ssbc1($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
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
                                $this->project_model->formf_update_approval_SSBC($id, 1, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Approved</div>');
                                redirect('export_LMO_approval/index');
                            }elseif($average <= 0.5){
                                $this->project_model->formf_update_approval_SSBC($id, 0, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Rejected</div>');
                                redirect('export_LMO_approval/index');
                            }

                        } elseif ( $q1->SSBC_mem2_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('export_LMO_approval/index');
                            
                        } elseif( $q1->SSBC_mem1_id != null && $q1->SSBC_mem1_id != $approver_id ){

                            $this->project_model->update_ssbc2($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
                            

                        } elseif ( $q1->SSBC_mem1_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('export_LMO_approval/index');
                        } else {
                            # do ssbc1 = this approver id 
                            $this->project_model->update_ssbc1($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
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
                                $this->project_model->formf_update_approval_SSBC($id, 1, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Approved</div>');
                                redirect('export_LMO_approval/index');
                            }elseif($average <= 0.5){
                                $this->project_model->formf_update_approval_SSBC($id, 0, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Rejected</div>');
                                redirect('export_LMO_approval/index');
                            }

                        } elseif( $q1->SSBC_mem2_id != null && $q1->SSBC_mem2_id != $approver_id ){

                            $this->project_model->update_ssbc3($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('applicationapproval/index');
                            

                        } elseif ( $q1->SSBC_mem2_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            
                            redirect('applicationapproval/index');
                            
                        } elseif( $q1->SSBC_mem1_id != null && $q1->SSBC_mem1_id != $approver_id ){

                            $this->project_model->update_ssbc2($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('applicationapproval/index');
                            

                        } elseif ( $q1->SSBC_mem1_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('applicationapproval/index');
                        } else {
                            # do ssbc1 = this approver id 
                            $this->project_model->update_ssbc1($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('applicationapproval/index');
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
                                $this->project_model->formf_update_approval_SSBC($id, 1, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Approved</div>');
                                redirect('export_LMO_approval/index');
                            }elseif($average <= 0.5){
                                $this->project_model->formf_update_approval_SSBC($id, 0, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Rejected</div>');
                                redirect('export_LMO_approval/index');
                            }

                        } elseif( $q1->SSBC_mem3_id != null && $q1->SSBC_mem3_id != $approver_id ){

                            $this->project_model->update_ssbc4($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
                            

                        } elseif ( $q1->SSBC_mem3_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            
                            redirect('export_LMO_approval/index');
                            
                        } elseif( $q1->SSBC_mem2_id != null && $q1->SSBC_mem2_id != $approver_id ){

                            $this->project_model->update_ssbc3($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
                            

                        } elseif ( $q1->SSBC_mem2_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('export_LMO_approval/index');
                            
                        } elseif( $q1->SSBC_mem1_id != null && $q1->SSBC_mem1_id != $approver_id ){

                            $this->project_model->update_ssbc2($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
                            

                        } elseif ( $q1->SSBC_mem1_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('export_LMO_approval/index');
                        } else {
                            # do ssbc1 = this approver id 
                            $this->project_model->update_ssbc1($appID, $approver_id, 1);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
                        }

                    }
                }
            }
        } 
        
        
        //$this->project_model->formf_update_approval_SSBC($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 2, "Notification For Exporting LMO Project Approved", "SSBC Member has approved a Notification For Exporting LMO Project");
        
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been approved!</div>');
        
        redirect('export_LMO_approval/index');
    }
    
    public function reject2($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        //$msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        
        $r1 = $this->project_model->get_sub_proj_by_proj_id($appID);
        $r2 = $this->comment_model->get_comment_by_project_id($appID);
        
        foreach ($r1 as $q1) {
            foreach ($r2 as $q2) {
                if( $q2->no_of_ssbc == 1 ){
                    if($q1->SSBC_mem1_id == null ){
                        # do projectapproval update based on approve / reject
                        $this->project_model->update_ssbc1($appID, $approver_id, 0);
                        $this->project_model->formf_update_approval_SSBC($id, 0, $approver_id, $appID);

                    }
                } elseif ( $q2->no_of_ssbc == 2 ){
                    if( $q1->SSBC_mem2_id == null ){
                        if( $q1->SSBC_mem1_id != null && $q1->SSBC_mem1_id != $approver_id ){

                            $this->project_model->update_ssbc2($appID, $approver_id, 0);
                            
                            $r3 = $this->project_model->get_sub_proj_by_proj_id($appID);
                            foreach ( $r3 as $q3 ) {
                                $add = $q3->SSBC_mem2_res + $q3->SSBC_mem1_res;
                                $average = $add / 2;
                            }

                            if($average > 0.5){
                                $this->project_model->formf_update_approval_SSBC($id, 1, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Approved</div>');
                                redirect('export_LMO_approval/index');
                            }elseif($average <= 0.5){
                                $this->project_model->formf_update_approval_SSBC($id, 0, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Rejected</div>');
                                redirect('export_LMO_approval/index');
                            }

                        } elseif ( $q1->SSBC_mem1_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('export_LMO_approval/index');
                        } else {
                            # do ssbc1 = this approver id 
                            $this->project_model->update_ssbc1($appID, $approver_id, 0);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
                        }

                    }
                } elseif ( $q2->no_of_ssbc == 3 ){
                    if( $q1->SSBC_mem3_id == null ){
                        if( $q1->SSBC_mem2_id != null && $q1->SSBC_mem2_id != $approver_id ){

                            $this->project_model->update_ssbc3($appID, $approver_id, 0);
                            
                            $r3 = $this->project_model->get_sub_proj_by_proj_id($appID);
                            foreach ( $r3 as $q3 ) {
                                $add = $q3->SSBC_mem3_res + $q3->SSBC_mem2_res + $q3->SSBC_mem1_res;
                                $average = $add / 3;
                            }

                            if($average > 0.5){
                                $this->project_model->formf_update_approval_SSBC($id, 1, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Approved</div>');
                                redirect('export_LMO_approval/index');
                            }elseif($average <= 0.5){
                                $this->project_model->formf_update_approval_SSBC($id, 0, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Rejected</div>');
                                redirect('export_LMO_approval/index');
                            }

                        } elseif ( $q1->SSBC_mem2_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('export_LMO_approval/index');
                            
                        } elseif( $q1->SSBC_mem1_id != null && $q1->SSBC_mem1_id != $approver_id ){

                            $this->project_model->update_ssbc2($appID, $approver_id, 0);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
                            

                        } elseif ( $q1->SSBC_mem1_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('export_LMO_approval/index');
                        } else {
                            # do ssbc1 = this approver id 
                            $this->project_model->update_ssbc1($appID, $approver_id, 0);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
                        }

                    }
                } elseif ( $q2->no_of_ssbc == 4 ){
                    if( $q1->SSBC_mem4_id == null ){
                        if( $q1->SSBC_mem3_id != null && $q1->SSBC_mem3_id != $approver_id ){

                            $this->project_model->update_ssbc4($appID, $approver_id, 0);
                            
                            $r3 = $this->project_model->get_sub_proj_by_proj_id($appID);
                            foreach ( $r3 as $q3 ) {
                                $add = $q3->SSBC_mem4_res + $q3->SSBC_mem3_res + $q3->SSBC_mem2_res + $q3->SSBC_mem1_res;
                                $average = $add / 4;
                            }

                            if($average > 0.5){
                                $this->project_model->formf_update_approval_SSBC($id, 1, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Approved</div>');
                                redirect('export_LMO_approval/index');
                            }elseif($average <= 0.5){
                                $this->project_model->formf_update_approval_SSBC($id, 0, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Rejected</div>');
                                redirect('export_LMO_approval/index');
                            }

                        } elseif( $q1->SSBC_mem2_id != null && $q1->SSBC_mem2_id != $approver_id ){

                            $this->project_model->update_ssbc3($appID, $approver_id, 0);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
                            

                        } elseif ( $q1->SSBC_mem2_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            
                            redirect('export_LMO_approval/index');
                            
                        } elseif( $q1->SSBC_mem1_id != null && $q1->SSBC_mem1_id != $approver_id ){

                            $this->project_model->update_ssbc2($appID, $approver_id, 0);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
                            

                        } elseif ( $q1->SSBC_mem1_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('export_LMO_approval/index');
                        } else {
                            # do ssbc1 = this approver id 
                            $this->project_model->update_ssbc1($appID, $approver_id, 0);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
                        }

                    }
                } elseif ( $q2->no_of_ssbc == 5 ){
                    if( $q1->SSBC_mem5_id == null ){
                        if( $q1->SSBC_mem4_id != null && $q1->SSBC_mem4_id != $approver_id ){

                            $this->project_model->update_ssbc5($appID, $approver_id, 0);
                            
                            $r3 = $this->project_model->get_sub_proj_by_proj_id($appID);
                            foreach ( $r3 as $q3 ) {
                                $add = $q3->SSBC_mem5_res + $q3->SSBC_mem4_res + $q3->SSBC_mem3_res + $q3->SSBC_mem2_res + $q3->SSBC_mem1_res;
                                $average = $add / 5;
                            }

                            if($average > 0.5){
                                $this->project_model->formf_update_approval_SSBC($id, 1, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Approved</div>');
                                redirect('export_LMO_approval/index');
                            }elseif($average <= 0.5){
                                $this->project_model->formf_update_approval_SSBC($id, 0, $approver_id, $appID);
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Conclusion Rejected</div>');
                                redirect('export_LMO_approval/index');
                            }

                        } elseif( $q1->SSBC_mem3_id != null && $q1->SSBC_mem3_id != $approver_id ){

                            $this->project_model->update_ssbc4($appID, $approver_id, 0);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
                            

                        } elseif ( $q1->SSBC_mem3_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            
                            redirect('export_LMO_approval/index');
                            
                        } elseif( $q1->SSBC_mem2_id != null && $q1->SSBC_mem2_id != $approver_id ){

                            $this->project_model->update_ssbc3($appID, $approver_id, 0);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
                            

                        } elseif ( $q1->SSBC_mem2_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('export_LMO_approval/index');
                            
                        } elseif( $q1->SSBC_mem1_id != null && $q1->SSBC_mem1_id != $approver_id ){

                            $this->project_model->update_ssbc2($appID, $approver_id, 0);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
                            

                        } elseif ( $q1->SSBC_mem1_id == $approver_id ) {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You have already approved this project</div>');
                            #leave blank and tell user he has already approved it
                            redirect('export_LMO_approval/index');
                        } else {
                            # do ssbc1 = this approver id 
                            $this->project_model->update_ssbc1($appID, $approver_id, 0);
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Project Approved</div>');
                            redirect('export_LMO_approval/index');
                        }

                    }
                }
            }
        }
        
        
        //$this->project_model->formf_update_approval_SSBC($id, 0, $approver_id, $appID);
        
         //Send email notify PI that their form has been rejected
         $this->email_model->send_email($result[0]->account_email, "Notification For Exporting LMO Project Submission Rejected", "<p>Dear ". $result[0]->account_fullname .", Your Notification For Exporting LMO Project Submission Has Been Rejected </p>");
        $this->notification_model->insert_new_notification($id, 1, "Notification For Exporting LMO Project Project Rejected", "Notification For Exporting LMO Project Rejected by : " . $this->session->userdata('account_name'));
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been rejected!</div>');
        
        redirect('export_LMO_approval/index');
    }
    
    public function approve3($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->formf_model->update_approval_Chair($id, 1, $approver_id, $appID);
        $this->project_model->formf_update_approval_Chair($id, 1, $approver_id, $appID);
        
		$this->notification_model->insert_new_notification($id, 1, "Notification For Exporting LMO Project Approved", "Your Notification For Exporting LMO Project has approved by: " . $this->session->userdata('account_name'));
        //Send email to PI, remind them to inform BSO when LMO will arrive to importing country
         $this->email_model->send_email($result[0]->account_email, "Notification For Exporting LMO Project Submission Approved", "<p>Dear ". $result[0]->account_fullname .", Your Notification For Exporting LMO Project Submission Has Been Approved. Please Be sure to inform BSO when the shipped LMO had arrive to importing country</p>");
        
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been approved!</div>');
        
        redirect('export_LMO_approval/index');
    }
    
    public function reject3($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        //$msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->formf_model->update_approval_Chair($id, 0, $approver_id, $appID);
        $this->project_model->formf_update_approval_Chair($id, 0, $approver_id, $appID);
        
         //Send email notify PI that their form has been rejected
        $this->email_model->send_email($result[0]->account_email, "Notification For Exporting LMO Project Submission Rejected", "<p>Dear ". $result[0]->account_fullname .", Your Notification For Exporting LMO Project Submission Has Been Rejected </p>");
        $this->notification_model->insert_new_notification($id, 1, "Notification For Exporting LMO Project Project Rejected", "Notification For Exporting LMO Project Rejected by : " . $this->session->userdata('account_name'));
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been rejected!</div>');
        
        redirect('export_LMO_approval/index');
    }
}

?>
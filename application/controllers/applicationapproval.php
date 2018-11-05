<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class applicationapproval extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('project_model');
        $this->load->model('comment_model');
        $this->load->model('email_model');
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('annex2_model');
        $this->load->model('forme_model');
        $this->load->model('hirarc_model');
        $this->load->model('pc1_model');
        $this->load->model('pc2_model');
        $this->load->model('swp_model');
		
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('New Application','/newapplication',true);
		$this->breadcrumbs->push('Living Modified Organisms (LMO)', true);
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $data['all_lmoproj'] = $this->project_model->get_all_sub_lmo();
        $data['all_lmoproj_Chair'] = $this->project_model->get_all_sub_lmo2();
        $data['all_lmoproj_SSBC'] = $this->project_model->get_all_sub_lmo3();
        
        
        $this->load->template('applicationapproval_view', $data);
	}
    
    //Methods For Approving And Rejecting Annex 2 Forms
    public function approve($id, $appid)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $this->annex2_model->update_approval($id, 1, $approver_id, $appid);
        $this->forme_model->update_approval($id, 1, $approver_id, $appid);
        $this->hirarc_model->update_BSO($id, 1, $approver_id, $appid);
        $this->pc1_model->update_approval($id, 1, $approver_id, $appid);
        $this->pc2_model->update_approval($id, 1, $approver_id, $appid);
        $this->swp_model->update_approval($id, 1, $approver_id, $appid);
        $this->project_model->update_approval($id, 1, $approver_id, $appid);
        
        $this->notification_model->insert_new_notification(null, 2, "New Project Application For LMO Approved", "BSO has approved an application for LMO");
        
        redirect('applicationapproval/index');
    }
    
    public function reject($id, $appid)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appid = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->annex2_model->update_approval($id, 0, $approver_id, $appid);
        $this->forme_model->update_approval($id, 0, $approver_id, $appid);
        $this->hirarc_model->update_BSO($id, 0, $approver_id, $appid);
        $this->pc1_model->update_approval($id, 0, $approver_id, $appid);
        $this->pc2_model->update_approval($id, 0, $approver_id, $appid);
        $this->swp_model->update_approval($id, 0, $approver_id, $appid);
        $this->project_model->update_approval($id, 0, $approver_id, $appid);
            
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", New Project Application For LMO Rejected", "<p>Your New Project Application Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('applicationapproval/index');
    }
    
    public function Chair_approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->annex2_model->update_yes_issue($id, 1, $approver_id, $appID);
        $this->forme_model->update_yes_issue($id, 1, $approver_id, $appID);
        $this->hirarc_model->update_yes_issue($id, 1, $approver_id, $appID);
        $this->pc1_model->update_yes_issue($id, 1, $approver_id, $appID);
        $this->pc2_model->update_yes_issue($id, 1, $approver_id, $appID);
        $this->swp_model->update_yes_issue($id, 1, $approver_id, $appID);
        $this->project_model->update_yes_issue($id, 1, $approver_id, $appID);
        
        //Notify All SSBC Members that SSBC Chair has approved a form but still requires their input
         $this->notification_model->insert_new_notification(null, 3, "New Project Application for LMO Approved", "SSBC Chair has approved an application for an LMO project that requires additional input");
        
        redirect('applicationapproval/index');
    }
    
    public function approve2($id, $appID)
    {
        
        
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        
        $q1 = $this->project_model->get_sub_proj_by_user_id($appID);
        $q2 = $this->comment_model->get_comment_by_project_id($appID);
        
        if($q2->no_of_ssbc == 1){
            if($q1->ssbc1_mem == null ){
                # do projectapproval update based on approve / reject
                $this->project_model->update_ssbc1($appID, 1);
                $this->project_model->update_approval_SSBC($id, 1, $approver_id, $appID);
                
            }
        } elseif ($q2->no_of_ssbc == 2){
            if($q1->ssbc2_mem == null ){
                if($q1->ssbc1_mem != null ){
                    
                    $this->project_model->update_ssbc2($appID, 1);
                    $add = $q1->ssbc1_mem + $q1->ssbc2_mem;
                    $average = $add / 2;
                    
                    if($average > 0.5){
                        $this->project_model->update_approval_SSBC($id, 1, $approver_id, $appID);
                        
                    }elseif($average <= 0.5){
                        $this->project_model->update_approval_SSBC($id, 0, $approver_id, $appID);
                        
                    }
                    
                } else {
                    # do ssbc1 = this approver id 
                    $this->project_model->update_ssbc1($appID, 1);
                    
                    
                }
                
            }
        } elseif ($q2->no_of_ssbc == 3){
            if($q1->ssbc3_mem == null ){
                if($q1->ssbc2_mem != null ){
                   
                    $this->project_model->update_ssbc3($appID, 1);
                    $add = $q1->ssbc1_mem + $q1->ssbc2_mem + $q1->ssbc3_mem;
                    $average = $add / 3;
                    
                    
                    if($average > 0.5){
                        $this->project_model->update_approval_SSBC($id, 1, $approver_id, $appID);
                        
                    }elseif($average <= 0.5){
                        $this->project_model->update_approval_SSBC($id, 0, $approver_id, $appID);
                        
                    }
                    
                } elseif($q1->ssbc1_mem != null ){
                    
                    $this->project_model->update_ssbc2($appID, 1);
                    
                    
                }else {
                    # do ssbc1 = this approver id 
                    $this->project_model->update_ssbc1($appID, 1);
                    
                    
                }
                
            }
        } elseif ($q2->no_of_ssbc == 4){
            if($q1->ssbc4_mem == null ){
                if($q1->ssbc3_mem != null){
                    
                    $this->project_model->update_ssbc4($appID, 1);
                    $add = $q1->ssbc1_mem + $q1->ssbc2_mem + $q1->ssbc3_mem + $q1->ssbc4_mem;
                    $average = $add / 4;
                    
                    
                    if($q1->ssbc_agreement > 0.5){
                        $this->project_model->update_approval_SSBC($id, 1, $approver_id, $appID);
                        
                    }elseif($q1->ssbc_agreement <= 0.5){
                        $this->project_model->update_approval_SSBC($id, 0, $approver_id, $appID);
                        
                    }
                    
                } elseif($q1->ssbc2_mem != null){
                    
                    $this->project_model->update_ssbc3($appID, 1);
                    
                    
                } elseif($q1->ssbc1_mem != null ){
                    
                    $this->project_model->update_ssbc2($appID, 1);
                    
                } else {
                    
                    $this->project_model->update_ssbc1($appID, 1);
                    
                    
                }
                
            }
        } elseif ($q2->no_of_ssbc == 5){
            if($q1->ssbc5_mem == null){
                if($q1->ssbc4_mem != null ){
                    
                    $this->project_model->update_ssbc5($appID, 1);
                    $add = $q1->ssbc1_mem + $q1->ssbc2_mem + $q1->ssbc3_mem + $q1->ssbc4_mem + $q1->ssbc5_mem;
                    $average = $add / 5;

                    
                    if($q1->ssbc_agreement > 0.5){
                        $this->project_model->update_approval_SSBC($id, 1, $approver_id, $appID);
                        
                    }elseif($q1->ssbc_agreement <= 0.5){
                        $this->project_model->update_approval_SSBC($id, 0, $approver_id, $appID);
                        
                    }
                    
                } elseif($q1->ssbc3_mem != null ){
                    
                    $this->project_model->update_ssbc4($appID, 1);
                    
                    
                } elseif($q1->ssbc2_mem != null ){
                    
                    $this->project_model->update_ssbc3($appID, 1);
                    
                } elseif($q1->ssbc1_mem != null){
                    
                    $this->project_model->update_ssbc2($appID, 1); 
                    
                } else {
                    
                    $this->project_model->update_ssbc1($appID, 1);
                    
                    
                }
                
            }
        }
        
        //Notify SSBC Chair that SSBC Members have reviewed and approved the form
        $this->notification_model->insert_new_notification(null, 2, "New Project Application for LMO Approved", "SSBC members have approved an application for an LMO project.");
            
        redirect('applicationapproval/index');
    }
    
    public function reject2($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(4));
        $result = $this->account_model->get_account_by_id($id);
        
        $q1 = $this->project_model->get_sub_proj_by_user_id($appID);
        $q2 = $this->comment_model->get_comment_by_project_id($appID);
        
        if($q2->no_of_ssbc == 1){
            if($q1->ssbc1_mem == null ){
                # do projectapproval update based on approve / reject
                $this->project_model->update_ssbc1($appID, 0);
                $this->project_model->update_approval_SSBC($id, 1, $approver_id, $appID);
                
            }
        } elseif ($q2->no_of_ssbc == 2){
            if($q1->ssbc2_mem == null ){
                if($q1->ssbc1_mem != null ){
                    
                    $this->project_model->update_ssbc2($appID, 0);
                    $add = $q1->ssbc1_mem + $q1->ssbc2_mem;
                    $average = $add / 2;
                    
                    if($average > 0.5){
                        $this->project_model->update_approval_SSBC($id, 1, $approver_id, $appID);
                        
                    }elseif($average <= 0.5){
                        $this->project_model->update_approval_SSBC($id, 0, $approver_id, $appID);
                        
                    }
                    
                } else {
                    # do ssbc1 = this approver id 
                    $this->project_model->update_ssbc1($appID, 0);
                    
                    
                }
                
            }
        } elseif ($q2->no_of_ssbc == 3){
            if($q1->ssbc3_mem == null ){
                if($q1->ssbc2_mem != null ){
                   
                    $this->project_model->update_ssbc3($appID, 0);
                    $add = $q1->ssbc1_mem + $q1->ssbc2_mem + $q1->ssbc3_mem;
                    $average = $add / 3;
                    
                    
                    if($average > 0.5){
                        $this->project_model->update_approval_SSBC($id, 0, $approver_id, $appID);
                        
                    }elseif($average <= 0.5){
                        $this->project_model->update_approval_SSBC($id, 0, $approver_id, $appID);
                        
                    }
                    
                } elseif($q1->ssbc1_mem != null ){
                    
                    $this->project_model->update_ssbc2($appID, 0);
                    
                    
                }else {
                    # do ssbc1 = this approver id 
                    $this->project_model->update_ssbc1($appID, 0);
                    
                    
                }
                
            }
        } elseif ($q2->no_of_ssbc == 4){
            if($q1->ssbc4_mem == null ){
                if($q1->ssbc3_mem != null){
                    
                    $this->project_model->update_ssbc4($appID, 0);
                    $add = $q1->ssbc1_mem + $q1->ssbc2_mem + $q1->ssbc3_mem + $q1->ssbc4_mem;
                    $average = $add / 4;
                    
                    
                    if($q1->ssbc_agreement > 0.5){
                        $this->project_model->update_approval_SSBC($id, 1, $approver_id, $appID);
                        
                    }elseif($q1->ssbc_agreement <= 0.5){
                        $this->project_model->update_approval_SSBC($id, 0, $approver_id, $appID);
                        
                    }
                    
                } elseif($q1->ssbc2_mem != null){
                    
                    $this->project_model->update_ssbc3($appID, 0);
                    
                    
                } elseif($q1->ssbc1_mem != null ){
                    
                    $this->project_model->update_ssbc2($appID, 0);
                    
                } else {
                    
                    $this->project_model->update_ssbc1($appID, 0);
                    
                    
                }
                
            }
        } elseif ($q2->no_of_ssbc == 5){
            if($q1->ssbc5_mem == null){
                if($q1->ssbc4_mem != null ){
                    
                    $this->project_model->update_ssbc5($appID, 0);
                    $add = $q1->ssbc1_mem + $q1->ssbc2_mem + $q1->ssbc3_mem + $q1->ssbc4_mem + $q1->ssbc5_mem;
                    $average = $add / 5;

                    
                    if($q1->ssbc_agreement > 0.5){
                        $this->project_model->update_approval_SSBC($id, 1, $approver_id, $appID);
                        
                    }elseif($q1->ssbc_agreement <= 0.5){
                        $this->project_model->update_approval_SSBC($id, 0, $approver_id, $appID);
                        
                    }
                    
                } elseif($q1->ssbc3_mem != null ){
                    
                    $this->project_model->update_ssbc4($appID, 0);
                    
                    
                } elseif($q1->ssbc2_mem != null ){
                    
                    $this->project_model->update_ssbc3($appID, 0);
                    
                } elseif($q1->ssbc1_mem != null){
                    
                    $this->project_model->update_ssbc2($appID, 0); 
                    
                } else {
                    
                    $this->project_model->update_ssbc1($appID, 0);
                    
                    
                }
                
            }
        }
        
        $this->project_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been rejected
        //$this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", New Project Application for LMO Rejected", "<p>Your New Project Application for LMO Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('applicationapproval/index');
    }
    
    public function final_approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->annex2_model->final_approval($id, 1, $approver_id, $appID);
        $this->forme_model->final_approval($id, 1, $approver_id, $appID);
        $this->hirarc_model->final_approval($id, 1, $approver_id, $appID);
        $this->pc1_model->final_approval($id, 1, $approver_id, $appID);
        $this->pc2_model->final_approval($id, 1, $approver_id, $appID);
        $this->swp_model->final_approval($id, 1, $approver_id, $appID);
        $this->project_model->final_approval($id, 1, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been fully approved
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", New Project Application for LMO Approved", "<p>Your New Project Application for LMO Submission Has Been Approved.</p>");
        
        redirect('applicationapproval/index');
    }
    
    public function final_reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->annex2_model->final_approval($id, 0, $approver_id, $appID);
        $this->forme_model->final_approval($id, 0, $approver_id, $appID);
        $this->hirarc_model->final_approval($id, 0, $approver_id, $appID);
        $this->pc1_model->final_approval($id, 0, $approver_id, $appID);
        $this->pc2_model->final_approval($id, 0, $approver_id, $appID);
        $this->swp_model->final_approval($id, 0, $approver_id, $appID);
        $this->project_model->final_approval($id, 0, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", New Project Application for LMO Approved", "<p>Your New Project Application for LMO Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        
        redirect('applicationapproval/index');
    }
    
    //End Of Mthods For Annex 2 Forms
    
    
}

?>
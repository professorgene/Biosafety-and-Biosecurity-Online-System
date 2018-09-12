<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class biohazard_approval extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('biohazard_model');
        $this->load->model('hirarc_model');
        $this->load->model('swp_model');
        $this->load->model('email_model');
		
		//breadcrum
		$this->breadcrumbs->unshift('Administrator Panel', '/index.php/adminpage');	
		$this->breadcrumbs->push('New Application','/newapplication',true);
		$this->breadcrumbs->push('Biohazardous Material', true);
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $data['all_bm'] = $this->biohazard_model->get_all_form();
        $data['all_bm_Chair'] = $this->biohazard_model->get_all_form2();
        $data['all_bm_SSBC'] = $this->biohazard_model->get_all_form3();
    
        $data['all_hirarc'] = $this->hirarc_model->get_all_hirarc3_form();
        $data['all_hirarc_Chair'] = $this->hirarc_model->get_all_hirarc3_form2();
        $data['all_hirarc_SSBC'] = $this->hirarc_model->get_all_hirarc3_form3();
        
        $data['all_swp'] = $this->swp_model->get_all_swp3_form();
        $data['all_swp_Chair'] = $this->swp_model->get_all_swp3_form2();
        $data['all_swp_SSBC'] = $this->swp_model->get_all_swp3_form3();
        
        
        $this->load->template('biohazard_approval_view', $data);
	}
    
    //Methods For Approving And Rejecting Annex 2 Forms
    public function approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->biohazard_model->update_approval($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 2, "Biohazard Materials Application Approved", "BSO has approved a Biohazard Materials Form ");
        
        redirect('biohazard_approval/index');
    }
    
    public function reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->biohazard_model->update_approval($id, 0, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Biohazard Material Application Submission Rejected", "<p>Your Biohazard Material Form Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('biohazard_approval/index');
    }
    
    public function Chair_approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->biohazard_model->update_yes_issue($id, 1, $approver_id, $appID);
        
        //Notify All SSBC Members that SSBC Chair has approved a form but still requires their input
        $this->notification_model->insert_new_notification(null, 3, "Biohazard Materials Application Approved", "SSBC Chair has approved a Biohazard Materials Application that requires additional input");
        
        redirect('biohazard_approval/index');
    }
    
    public function approve2($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->biohazard_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        
        //Notify SSBC Chair that SSBC Members have reviewed and approved the form
        $this->notification_model->insert_new_notification(null, 2, "Biohazard Materials Application Approved", "SSBC members have approved a Biohazard Materials Application.");
        
        redirect('biohazard_approval/index');
    }
    
    public function reject2($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->biohazard_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Biohazard Material Application Submission Rejected", "<p>Your Biohazard Material Form Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('biohazard_approval/index');
    }
    
    public function final_approve($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->biohazard_model->final_approval($id, 1, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been fully approved
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>Biohazard Material Application Submission Approved", "<p>Your Biohazard Material Form Submission Has Been Approved. </p>");
        
        redirect('biohazard_approval/index');
    }
    
    public function final_reject($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->biohazard_model->final_approval($id, 0, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Biohazard Material Application Submission Rejected", "<p>Your Biohazard Material Form Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('biohazard_approval/index');
    }
    
    //Methods For Approving And Rejecting HIRARC forms
    public function approve_hirarc($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->hirarc_model->update_BSO($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 2, "HIRARC Form Application Approved", "BSO has approved a HIRARC Form ");
        
        redirect('biohazard_approval/index');
    }
    
    public function reject_hirarc($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->hirarc_model->update_BSO($id, 0, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", HIRARC Form Submission Rejected", "<p>Your HIRARC Form Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('biohazard_approval/index');
    }
    
    public function Chair_approve_hirarc($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->hirarc_model->update_yes_issue($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 3, "HIRARC Form Application Approved", "SSBC Chair has approved a HIRARC Form Application that requires additional input");
        
        redirect('biohazard_approval/index');
    }
    
    
    public function approve_hirarc2($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->hirarc_model->update_SSBC($id, 1, $approver_id, $appID);
        
        //Notify SSBC Chair that SSBC Members have reviewed and approved the form
        $this->notification_model->insert_new_notification(null, 2, "HIRARC Form Application Approved", "SSBC members have approved a HIRARC Form Application.");
        
        redirect('biohazard_approval/index');
    }
    
    public function reject_hirarc2($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->hirarc_model->update_SSBC($id, 0, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", HIRARC Form Submission Rejected", "<p>Your HIRARC Form Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('biohazard_approval/index');
    }
    
    public function final_approve_hirarc($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->hirarc_model->final_approval($id, 1, $approver_id, $appID);
        
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", HIRARC Form Submission Approved", "<p>Your HIRARC Form Submission Has Been Approved. </p>");
        
        redirect('biohazard_approval/index');
    }
    
    public function final_reject_hirarc($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->hirarc_model->final_approval($id, 0, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been rejected
        $this->email_model->send_email($result[0]->account_email, "<p>Dear ". $result[0]->account_fullname .", <br/><br/>HIRARC Form Submission Rejected", "<p>Your HIRARC Form Submission Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('biohazard_approval/index');
    }
    
     //Methods For Approving And Rejecting SWP forms
    public function approve_swp($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->swp_model->update_approval($id, 1, $approver_id, $appID);
        
        $this->notification_model->insert_new_notification(null, 2, "Safety Work Procedure Form Application Approved", "BSO has approved a Safety Work Procedure Form Application.");
        
        redirect('biohazard_approval/index');
    }
    
    public function reject_swp($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->swp_model->update_approval($id, 0, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Safety Work Procedure Form Submission Rejected", "<p>Your Safety Work Procedure Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('biohazard_approval/index');
    }
    
    public function Chair_approve_swp($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->swp_model->update_yes_issue($id, 1, $approver_id, $appID);
        
         $this->notification_model->insert_new_notification(null, 3, "Safety Work Procedure Form Application Approved", "SSBC Chair has approved a Safety Work Procedure Form Application that requires additional input");
        
        redirect('biohazard_approval/index');
    }
    
    public function approve_swp_2($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $this->swp_model->update_approval_SSBC($id, 1, $approver_id, $appID);
        
        //Notify SSBC Chair that SSBC Members have reviewed and approved the form
        $this->notification_model->insert_new_notification(null, 2, "Safety Work Procedure Form Application Approved", "SSBC members have approved a Safety Work Procedure Form Application.");
        
        redirect('biohazard_approval/index');
    }
    
    public function reject_swp_2($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->swp_model->update_approval_SSBC($id, 0, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Safety Work Procedure Form Submission Rejected", "<p>Your Safety Work Procedure Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('biohazard_approval/index');
    } 
    
    public function final_approve_swp($id, $appID)
    {
        $approver_id = $this->session->userdata('account_id');
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $result = $this->account_model->get_account_by_id($id);
        $this->swp_model->final_approval($id, 1, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been fully approved
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Safety Work Procedure Form Submission Approved", "<p>Your Safety Work Procedure Form Has Been Approved. </p>");
        
        redirect('biohazard_approval/index');
    }
    
    public function final_reject_swp($id, $appID)
    {
        $approver_id = ' ';
        $id = $this->uri->segment(3);
        $appID = $this->uri->segment(4);
        $msg = base64_decode($this->uri->segment(5));
        $result = $this->account_model->get_account_by_id($id);
        $this->swp_model->final_approval($id, 0, $approver_id, $appID);
        
        //Send email to applicant let them know their form submission has been rejected
        $this->email_model->send_email($result[0]->account_email, "Dear ". $result[0]->account_fullname .", Safety Work Procedure Form Submission Rejected", "<p>Your Safety Work Procedure Form Has Been Rejected Due to The Following Reason(s): " . $msg . "</p>");
        
        redirect('biohazard_approval/index');
    }
    
}
    
?>
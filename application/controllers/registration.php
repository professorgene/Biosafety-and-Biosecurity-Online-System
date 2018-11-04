<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registration extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('account_model');
        $this->load->model('notification_model');
        $this->load->model('email_model');
    }
    
	public function index()
	{
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $this->form_validation->set_rules('account_fullname', 'Name', 'required|callback_fullname_check');
        $this->form_validation->set_rules('account_email', 'Email Address', 'required|valid_email|is_unique[accounts.account_email]');
        $this->form_validation->set_rules('account_password', 'Password', 'required');
        $this->form_validation->set_rules('account_confirmpassword', 'Confirm Password', 'required|matches[account_password]');
        $this->form_validation->set_rules('account_type', 'Account Type', 'required');
        
        # Submit form
        if($this->form_validation->run() == FALSE){
            # validation fails
            $this->load->template('registration_view', $data);
        } else {
            $data = array(
                'account_fullname' => $this->input->post('account_fullname'),
                'account_email' => $this->input->post('account_email'),
                'account_password' => $this->input->post('account_password'),
                'account_type' => $this->input->post('account_type')
            );
            
            if($this->account_model->insert_new_account($data)){
                $this->notification_model->insert_new_notification(null, 4, "New Registration", "The following user has requested for an account: " . $this->input->post('account_fullname'));
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully registered an account! Please wait while your account is being approved by an administrator. You will receive an e-mail notification after your account has been approved.”</div>');
                $this->email_model->send_email( $this->input->post('account_email'), "New Registration Details", "<p>Dear ". $this->input->post('account_fullname') .", <br/><br/>You have successfully requested for an account. Please wait between 1-3 working days before logging in again.</p>");
                redirect('registration/index');
            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                redirect('registration/index');
            }
        }
	}
    
    #
    # Validates fullname due to alpha limitation
    #
    public function fullname_check($str) {
    if (!preg_match('/^([a-z0-9 ])+$/i', $str)) {
        $this->form_validation->set_message('fullname_check', 'The %s field can only be alphanumerical');
        return FALSE;
    } else {
        return TRUE;
    }
}
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class settings extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('account_model');
        $this->load->model('notification_model');
    }
    
	public function index()
	{
        $data['accountdetails'] = $this->account_model->get_account_by_id($this->session->userdata('account_id'));
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        #$this->form_validation->set_rules('account_email', 'Email', 'required|valid_email|is_unique[accounts.account_email]');
        $this->form_validation->set_rules('account_password', 'Password', 'required');
        $this->form_validation->set_rules('account_confirmpassword', 'Confirm Password', 'required|matches[account_password]');
        
        if($this->form_validation->run() == FALSE){
            $this->load->template('settings_view', $data);
        } else {
            $data = array(
                #'account_email' => $this->input->post('account_email'),
                'account_password' => $this->input->post('account_password')
            );

            # checks for account credentials
            if($this->account_model->update_account($this->session->userdata('account_id'), $data)){
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully updated you email / password!</div>');
                redirect('settings/index');
            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                redirect('settings/index');
            }
        }
	}
}
?>
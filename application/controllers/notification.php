<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notification extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('account_model');
        $this->load->model('notification_model');
    }
    
    public function index() {
        $data['notification'] = $this->notification_model->get_all_notification( $this->session->userdata('account_id'), 
                                                                                $this->account_model->get_account_type($this->session->userdata('account_id')) );
        # Assumes user has chosen to read all pending notifications
        $this->notification_model->update_read($this->session->userdata('account_id'), $this->session->userdata('account_type'));
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $this->load->template('notification_view', $data);
    }
    
    public function registration() {
        $data['notification'] = $this->notification_model->get_all_registration( $this->session->userdata('account_id'), 
                                                                                $this->account_model->get_account_type($this->session->userdata('account_id')) );
        # Assumes user has chosen to read all pending notifications
        $this->notification_model->update_read($this->session->userdata('account_id'), $this->session->userdata('account_type'));
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $this->load->template('notification_view', $data);
    }
    
    public function application() {
        $data['notification'] = $this->notification_model->get_all_application( $this->session->userdata('account_id'), 
                                                                                $this->account_model->get_account_type($this->session->userdata('account_id')) );
        # Assumes user has chosen to read all pending notifications
        $this->notification_model->update_read($this->session->userdata('account_id'), $this->session->userdata('account_type'));
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $this->load->template('notification_view', $data);
    }
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminpage extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $this->load->template('adminpage_view', $data);
	}
}

?>
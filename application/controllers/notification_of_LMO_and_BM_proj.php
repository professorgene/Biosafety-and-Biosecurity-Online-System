<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class notification_of_LMO_and_BM_proj extends CI_Controller{
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        
    }
		
		public function index(){
			 $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            $this->load->template('notification_of_LMO_and_BM_proj_view',$data);
        }
        
    }
?>
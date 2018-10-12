<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class annualorfinalreportproj extends CI_Controller{
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
		
        //breadcrum
		$this->breadcrumbs->unshift('Home', '/');	
		$this->breadcrumbs->push('Annual or Final Report', true);
        
    }
		
		public function index(){
			 $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            $this->load->template('annualorfinalreportproj_view',$data);
        }
        
    }
?>
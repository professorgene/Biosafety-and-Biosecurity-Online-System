<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class incidentaccidentreportingpageexemptproj extends CI_Controller{
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
		
            $this->breadcrumbs->unshift('Home', '/');	
		    $this->breadcrumbs->push('Incident Accident Reporting','/incidentaccidentreportingpage' ,true);
            $this->breadcrumbs->push('OHS-F-4.20.X',true);
        
    }
		
		public function index(){
			 $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            $this->load->template('incidentaccidentreportingpageexemptproj_view',$data);
        }
        
    }
?>
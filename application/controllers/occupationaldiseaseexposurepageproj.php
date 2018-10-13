<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class occupationaldiseaseexposurepageproj extends CI_Controller{
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
		
		 //breadcrum
		$this->breadcrumbs->unshift('Home', '/');	
		$this->breadcrumbs->push('Incident Accident Reporting','/incidentaccidentreportingpage', true);
        $this->breadcrumbs->push('Living Modified Organism (LMO)','lmo61page',true);
        $this->breadcrumbs->push('Occupational disease or exposure',true);
        
    }
		
		public function index(){
			 $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            $this->load->template('occupationaldiseaseexposurepageproj_view',$data);
        }
        
    }
?>
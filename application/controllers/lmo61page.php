<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lmo61page extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
		$this->load->model('announcement_model');

		//breadcrum
		$this->breadcrumbs->unshift('Home', '/');
		$this->breadcrumbs->push('New Project','/projectselect', true);	
		$this->breadcrumbs->push('Incident Accident Reporting','/incidentaccidentreportingpage', true);
        $this->breadcrumbs->push('Living Modified Organism (LMO)',true);
		
    }
		
		public function index(){
			 $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            $this->load->model('announcement_model');
			
			$this->load->template('lmo61page_view',$data);
        }
		
		
}
?>

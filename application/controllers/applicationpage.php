<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class applicationpage extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
		$this->load->model('announcement_model');

		//breadcrum
		$this->breadcrumbs->unshift('Home', '/');	
		$this->breadcrumbs->push('New Project','/projectselect', true);
		$this->breadcrumbs->push('Application', true);
    }
		
		public function index(){
			$data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
			$this->load->model('announcement_model');
			$data['announcement_list'] = $this->announcement_model->all_announcement();
			$this->load->template('applicationpage_view',$data);
        }

}
?>

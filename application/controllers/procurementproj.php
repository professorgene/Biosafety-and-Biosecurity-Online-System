<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class procurementproj extends CI_Controller{
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
                //breadcrum
		$this->breadcrumbs->unshift('Home', '/');
		$this->breadcrumbs->push('New Project','/projectselect', true);		
		$this->breadcrumbs->push('Procurement of Biological Material','/procurementpage', true);
		$this->breadcrumbs->push('OHS-F-4.18.X PRE-PURCHASE MATERIAL RISK ASSESSMENT', true);
		
    }
		
		public function index(){
			 $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            $this->load->template('procurementproj_view',$data);
        }
        
    }
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class annualfinalreportpage extends CI_Controller {
	
	
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
            $this->load->model('announcement_model');
			$data['product_list'] = $this->announcement_model->list_product()->result();
			$this->load->template('annualfinalreportpage_view',$data);
        }

		public function add()
		{
			$this->load->template('product_form');
		}
		public function save()
		{
			$array_item = array(
				'announcement_id' => $this->input->post('announcement_id'),
				//'account_id' => $this->input->post('account_id'),
				'announcement_description' => $this->input->post('announcement_description'),
				'announcement_date' => $this->input->post('announcement_date')
				);
			$this->load->model('announcement_model');
			$this->announcement_model->save($array_item);
			redirect('annualfinalreportpage');
		}
		public function save_edit()
		{
			$id = $this->input->post('announcement_id');
			$array_item = array(
				'announcement_id' => $this->input->post('announcement_id'),
				//'account_id' => $this->input->post('account_id'),
				'announcement_description' => $this->input->post('announcement_description'),
				'announcement_date' => $this->input->post('announcement_date')
				);
			$this->load->model('announcement_model');
			$this->announcement_model->update($id,$array_item);
			redirect('annualfinalreportpage');
		}
		public function edit(){
			$data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
			$this->load->model('announcement_model');
			$data['list_product'] = $this->announcement_model->list_product()->row_array();
			$this->load->template('annualfinalreportpage_view',$data);
		}
}
?>

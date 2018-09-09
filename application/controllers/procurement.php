<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class procurement extends CI_Controller {

	
	public function index()
	{
		$this->load->template('procurement_view');
	}
}
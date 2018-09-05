<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pc1 extends CI_Controller {

	
	public function index()
	{
		$this->load->template('pc1_view');
	}
}
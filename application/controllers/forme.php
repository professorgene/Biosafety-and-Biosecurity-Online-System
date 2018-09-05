<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class forme extends CI_Controller {

	
	public function index()
	{
		$this->load->template('forme_view');
	}
}

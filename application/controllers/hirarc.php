<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hirarc extends CI_Controller {

	
	public function index()
	{
		$this->load->template('hirarc_view');
	}
}
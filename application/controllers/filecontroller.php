<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class filecontroller extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
		$this->load->helper('download');
    }
	
	public function index()
	{             
        $this->load->template('home_view', $data);
	}
	
	 public function download($fileName = NULL) {   
	   if ($fileName) {
		$file = realpath ( "application\download" ) . "\\" . $fileName;
			  
		if (file_exists ( $file )) {
			
		 $data = file_get_contents ( $file );
			//force download
			//force_download('/path/to/abctest.zip', NULL);
		 force_download ( $fileName, $data );
		} else {
			// Redirect to base url
			redirect ( base_url () );
		}
	}
  }
}

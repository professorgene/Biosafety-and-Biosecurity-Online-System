<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class email_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
    
	function send_email($target, $title, $msg)
	{
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'bbosswinburne@gmail.com',
            'smtp_pass' => 'swinburne',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->set_crlf("\r\n");
        
        // Set to, from, message, etc.
        $this->email->from('bbosswinburne@gmail.com', 'Swinburne BBOS');
        $this->email->to( $target );
        $this->email->subject( $title );
        $this->email->message( $msg );

        $result = $this->email->send();
        
        if ($result) {
            return true;
        } else {
            return false;
        }
	}
}
?>
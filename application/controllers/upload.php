<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class upload extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('upload_model');
        $this->load->model('notification_model');
    }
    
	public function index()
	{
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $this->form_validation->set_rules('order_name', 'Name', 'required');
        
        if($this->form_validation->run() == FALSE){
            $this->load->template('upload_view', $data);
        } else {
            
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|doc|pdf|zip';
            $config['overwrite'] = true;
            #$config['file_name'] = $this->session->userdata('account_id') . $_FILES['order_file'];

            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            if(!empty($_FILES['order_file'])){
                
                $config['file_name'] = $this->session->userdata('account_id') . $_FILES['order_file']['name'];

                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('order_file')){
                    $uploadData = $this->upload->data();
                    $order1 = $uploadData['file_name'];
                }else{
                    $order1 = null;
                }
            }else{
                $order1 = null;
            }
            
            if(!empty($_FILES['order_attach'])){
                
                $config['file_name'] = $this->session->userdata('account_id') . $_FILES['order_attach']['name'];

                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('order_attach')){
                    $uploadData = $this->upload->data();
                    $order2 = $uploadData['file_name'];
                }else{
                    $order2 = null;
                }
            }else{
                $order2 = null;
            }
            
            $data = array(
                #'account_email' => $this->input->post('account_email'),
                'order_name' => $this->input->post('order_name'),
                'order_file' => $order1,
                'order_attach' => $order2
            );

            # checks for account credentials
            if($this->upload_model->update_stuff(1, $data)){
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully updated your password!</div>');
                redirect('upload/index');
            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                redirect('upload/index');
            }
        }
	}
}
?>
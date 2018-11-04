<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class comment extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('project_model');
        $this->load->model('notification_model');
        $this->load->model('account_model');
        $this->load->model('comment_model');
        
		
    }
    
	public function index($id, $appid)
	{
    
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $data['id'] = $this->uri->segment(3);
        $data['project_id'] = $this->uri->segment(4);
        
        $data['project_info'] = $this->project_model->get_proj_id($data['project_id']);
    
        
        $this->load->template('comment_view', $data);
	}
    
    public function save_comment(){
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $save = $this->input->post('save');
        $proj_id = $this->input->post('project_id');
        $proj_type = $this->input->post('project_type');
        
        if (!isset($save)){
                
                $this->load->template('comment_view', $data);
        }else{
            
            $commentData = array(
                'comment_id' => $proj_id,
                'comment_type' => $proj_type,
                'annex2_comment' => $this->input->post('annex2_comment'),
                'forme_comment' => $this->input->post('forme_comment'),
                'pc1_comment' => $this->input->post('pc1_comment'),
                'pc2_comment' => $this->input->post('pc2_comment'),
                'hirarc_comment' => $this->input->post('hirarc_comment'),
                'swp_comment' => $this->input->post('swp_comment'),
                'biohazard_comment' => $this->input->post('biohazard_comment'),
                'exempt_comment' => $this->input->post('exempt_comment'),
                //'procurement_comment' => $this->input->post('annex2_comment'),
                //'notif_of_LMO_BM_comment' => $this->input->post('annex2_comment'),
                //'formf_comment' => $this->input->post('annex2_comment'),
                //'notif_of_export_bio_comment' => $this->input->post('annex2_comment'),
                //'incident_accident_comment' => $this->input->post('annex2_comment'),
                //'annex3_comment' => $this->input->post('annex2_comment'),
                //'annex4_comment' => $this->input->post('annex2_comment'),
                //'annual_report_comment' => $this->input->post('annex2_comment'),
                'no_of_ssbc' => $this->input->post('no_of_ssbc')
                
            );
            
            if($this->comment_model->save_comment($commentData))
            {
                    
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Comments has been successfully saved!</div>', $commentData);
                
                echo  "<script type='text/javascript'>";
                echo "window.close();";
                echo "</script>";
                //redirect('home/index');
                    
                        
            } else {
                    
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                redirect('comment/index');
  
            }
            
            
        }
        
    }
    
    public function load_comments($id, $appid){
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $data['id'] = $this->uri->segment(3);
        $data['project_id'] = $this->uri->segment(4);
        $data['load'] = "true";
        
        $data['project_info'] = $this->project_model->get_proj_id($data['project_id']);
        $data['comment_info'] = $this->comment_model->get_comment_by_project_id($data['project_id']);
        
        $this->load->template('comment_view', $data);
        
    }
    
    public function update_comment(){
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $save = $this->input->post('save');
        $proj_id = $this->input->post('project_id');
        $proj_type = $this->input->post('project_type');
        
        if (!isset($save)){
                
                $this->load->template('comment_view', $data);
        }else{
            
            $commentData = array(
                'comment_id' => $proj_id,
                'comment_type' => $proj_type,
                'annex2_comment' => $this->input->post('annex2_comment'),
                'forme_comment' => $this->input->post('forme_comment'),
                'pc1_comment' => $this->input->post('pc1_comment'),
                'pc2_comment' => $this->input->post('pc2_comment'),
                'hirarc_comment' => $this->input->post('hirarc_comment'),
                'swp_comment' => $this->input->post('swp_comment'),
                'biohazard_comment' => $this->input->post('biohazard_comment'),
                'exempt_comment' => $this->input->post('exempt_comment'),
                //'procurement_comment' => $this->input->post('annex2_comment'),
                //'notif_of_LMO_BM_comment' => $this->input->post('annex2_comment'),
                //'formf_comment' => $this->input->post('annex2_comment'),
                //'notif_of_export_bio_comment' => $this->input->post('annex2_comment'),
                //'incident_accident_comment' => $this->input->post('annex2_comment'),
                //'annex3_comment' => $this->input->post('annex2_comment'),
                //'annex4_comment' => $this->input->post('annex2_comment'),
                //'annual_report_comment' => $this->input->post('annex2_comment'),
                'no_of_ssbc' => $this->input->post('no_of_ssbc')
                
            );
            
            if($this->comment_model->update_comments($proj_id, $commentData))
            {
                    
                //$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Comments has been successfully saved!</div>', $commentData);
                
                echo  "<script type='text/javascript'>";
                echo "window.close();";
                echo "</script>";
                //redirect('home/index');
                    
                        
            } else {
                    
                //$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                //redirect('comment/index');
  
            }
            
            
        }
        
    }
    
    
    
}
    
?>
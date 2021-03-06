<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class historyproj extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('project_model');
        $this->load->model('history_model');
        $this->load->model('email_model');
		//breadcrumb
		$this->breadcrumbs->unshift('Home', '/');
        $this->breadcrumbs->push('Submitted or Past Applications', true);
        
        //Form Models
        $this->load->model('annex2_model');
        $this->load->model('annex3_model');
        $this->load->model('annex4_model');
        $this->load->model('annex5_model');
        $this->load->model('annualfinalreport_model');
        $this->load->model('biohazard_model');
        $this->load->model('exempt_model');
        $this->load->model('forme_model');
        $this->load->model('formf_model');
        $this->load->model('hirarc_model');
        $this->load->model('incidentaccidentreport_model');
        $this->load->model('notification_of_exporting_biological_material_model');
        $this->load->model('notification_of_LMO_and_BM_model');
        $this->load->model('pc1_model');
        $this->load->model('pc2_model');
        $this->load->model('procurement_model');
        $this->load->model('swp_model');
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $data['past'] = $this->history_model->get_all_project_by_id($this->session->userdata('account_id'));
        #$data['total'] = count((array)$data['past']);
        
        $this->load->template('history_view', $data);
	}
    
    public function edit_application($id, $type, $editable)
    {
        
        $id = $this->uri->segment(3);
        $type = $this->uri->segment(4);
        $editable = $this->uri->segment(5);
        
        if($type =="app_lmo"){
            
            if($editable == 2){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['editload'] = "true";
            $data['appID'] = $id;

            $data['retrieved'] = $this->annex2_model->get_form_by_project_id($id);
            $data['retrieved2'] = $this->forme_model->get_form_by_project_id($id);
            $data['retrieved3'] = $this->hirarc_model->get_form_by_project_id($id);
            $data['retrieved4'] = $this->pc1_model->get_form_by_project_id($id);
            $data['retrieved5'] = $this->pc2_model->get_form_by_project_id($id);
            $data['retrieved6'] = $this->swp_model->get_form_by_project_id($id);

            $this->load->template('lmoproj_view', $data);
            }
            else
            {
            
                $this->annex2_model->edit_request($id);
                $this->forme_model->edit_request($id);
                $this->hirarc_model->edit_request($id);
                $this->pc1_model->edit_request($id);
                $this->pc2_model->edit_request($id);
                $this->swp_model->edit_request($id);
                $this->project_model->edit_request($id);
            
                $this->notification_model->insert_new_notification(null, 4, "Annex 2 Application Modification Request", "The following user has requested to edit an Annex 2 form: " . $this->session->userdata('account_name'));
                redirect('history/index');
            }
            
        }
        
            
        
    }
    
    
}

?>
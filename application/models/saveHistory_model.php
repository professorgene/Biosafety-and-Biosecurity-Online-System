<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class saveHistory_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
        
        $this->load->model('project_model');
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
	
	function get_all_project_by_id($id)
	{
        $result = [];
        
        $i = $this->project_model->get_save_proj_by_user_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'project_id' => $row->project_id,
                    'project_desc' => $row->project_desc,
                    'approval' => $row->project_approval,
                    'name' => $row->project_name,
                    'editable' => $row->project_editable,
                    'type' => $row->project_type
                ];
                array_push($result, $data);
            }
        }
        
		return $result;
	}
}
?>
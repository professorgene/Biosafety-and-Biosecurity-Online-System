<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class history_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
        
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
	
	function get_all_form_by_id($id)
	{
        $result = [];
        
        $i = $this->annex2_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'ANNEX 2 FORM',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
        $i = $this->annex3_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'ANNEX 3 FORM',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
        $i = $this->annex4_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'ANNEX 4 FORM',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
        $i = $this->annex5_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'ANNEX 5 FORM',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
        $i = $this->annualfinalreport_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'SBC ANNUAL OR FINAL REPORT FOR USE OF BIOHAZARDOUS MATERIALS',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
        $i = $this->biohazard_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'APPLICATION FOR BIOSAFETY CLEARANCE FORM',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
        $i = $this->exempt_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'APPLICATION FOR BIOSAFETY CLEARANCE EXEMPT DEALINGS FORM',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
        $i = $this->forme_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'FORM E',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
        $i = $this->formf_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'FORM F',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
        $i = $this->hirarc_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'OHS-F-4.5.X HIRARC FORM',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
        $i = $this->incidentaccidentreport_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'OHS-F-4.20.X INCIDENT ACCIDENT REPORT',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
        $i = $this->notification_of_exporting_biological_material_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'SSBC NOTIFICATION OF EXPORTING LMO AND BIOHAZARDOUS MATERIAL',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
        $i = $this->notification_of_LMO_and_BM_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'NOTIFICATION OF LMO AND BIOHAZARDOUS MATERIAL',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
        $i = $this->pc1_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'APPLICATION FOR NLRDS SUITABLE FOR PC1 FORM',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
        $i = $this->pc2_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'APPLICATION FOR NLRDS SUITABLE FOR PC2 FORM',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
        $i = $this->procurement_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'OHS-F-4.18.X PRE-PURCHASE MATERIAL RISK ASSESSMENT',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
        $i = $this->swp_model->get_form_by_account_id($id);
        if(count((array)$i) > 0){
            foreach ($i as $row) {
                $data = [
                    'type' => 'SSBC SAFE WORK PROCEDURE',
                    'application_id' => $row->application_id,
                    'approval' => $row->application_approved,
                    'editable' => $row->editable
                ];
                array_push($result, $data);
            }
        }
        
		return $result;
	}
}
?>
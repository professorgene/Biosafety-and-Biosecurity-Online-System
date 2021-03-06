<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminpage extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('statistic_model');
    }
    
	public function index()
	{
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $newprojecttotal = $this->statistic_model->get_all_new_projects();
        $newuserstotal = $this->statistic_model->get_all_new_users();
        $approveduserstotal = $this->statistic_model->get_all_new_approved_users();
        $existinguserstotal = $this->statistic_model->get_all_existing_users();
        
        $allprojtotal = $this->statistic_model->get_all_new_applications();
        $allapprovedprojtotal = $this->statistic_model->get_all_approved_applications();
        
        $alllmototal = $this->statistic_model->get_all_approved_app_lmo_applications();
        $newlmototal = $this->statistic_model->get_all_new_app_lmo_applications();
        $allbiototal = $this->statistic_model->get_all_approved_app_bio_applications();
        $newbiototal = $this->statistic_model->get_all_new_app_bio_applications();
        $allexempttotal = $this->statistic_model->get_all_approved_app_exempt_applications();
        $newexempttotal = $this->statistic_model->get_all_new_app_exempt_applications();
        $allproctotal = $this->statistic_model->get_all_approved_procurement_applications();
        $newproctotal = $this->statistic_model->get_all_new_procurement_applications();
        $allnotiftotal = $this->statistic_model->get_all_approved_notifLMOBM_applications();
        $newnotiftotal = $this->statistic_model->get_all_new_notifLMOBM_applications();
        $allfinaltotal = $this->statistic_model->get_all_approved_anuualfinalreport_applications();
        $newfinaltotal = $this->statistic_model->get_all_new_anuualfinalreport_applications();
        $allexporttotal = $this->statistic_model->get_all_approved_exportLMO_applications();
        $newexporttotal = $this->statistic_model->get_all_new_exportLMO_applications();
        $allexportexempttotal = $this->statistic_model->get_all_approved_exportExempt_applications();
        $newexportexempttotal = $this->statistic_model->get_all_new_exportExempt_applications();
        $allincidenttotal = $this->statistic_model->get_all_approved_incidentExempt_applications();
        $newincidenttotal = $this->statistic_model->get_all_new_incidentExempt_applications();
        $allminortotal = $this->statistic_model->get_all_approved_minorbio_applications();
        $newminortotal = $this->statistic_model->get_all_new_minorbio_applications();
        $allmajortotal = $this->statistic_model->get_all_approved_majorbio_applications();
        $newmajortotal = $this->statistic_model->get_all_new_majorbio_applications();
        $allocctotal = $this->statistic_model->get_all_approved_occupational_applications();
        $newocctotal = $this->statistic_model->get_all_new_occupational_applications();
        
        # new applications
        $i = 0;
        foreach ($newlmototal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['newlmototal'] = $i;
        } else {
            $data['newlmototal'] = 0;
        }
        $i = 0;
        foreach ($newbiototal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['newbiototal'] = $i;
        } else {
            $data['newbiototal'] = 0;
        }
        $i = 0;
        foreach ($newexempttotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['newexempttotal'] = $i;
        } else {
            $data['newexempttotal'] = 0;
        }
        $i = 0;
        foreach ($newproctotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['newproctotal'] = $i;
        } else {
            $data['newproctotal'] = 0;
        }
        $i = 0;
        foreach ($newnotiftotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['newnotiftotal'] = $i;
        } else {
            $data['newnotiftotal'] = 0;
        }
        $i = 0;
        foreach ($newfinaltotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['newfinaltotal'] = $i;
        } else {
            $data['newfinaltotal'] = 0;
        }
        $i = 0;
        foreach ($newexporttotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['newexporttotal'] = $i;
        } else {
            $data['newexporttotal'] = 0;
        }
        $i = 0;
        foreach ($newexportexempttotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['newexportexempttotal'] = $i;
        } else {
            $data['newexportexempttotal'] = 0;
        }
        $i = 0;
        foreach ($newincidenttotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['newincidenttotal'] = $i;
        } else {
            $data['newincidenttotal'] = 0;
        }
        $i = 0;
        foreach ($newminortotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['newminortotal'] = $i;
        } else {
            $data['newminortotal'] = 0;
        }
        $i = 0;
        foreach ($newincidenttotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['newmajortotal'] = $i;
        } else {
            $data['newmajortotal'] = 0;
        }
        $i = 0;
        foreach ($newocctotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['newocctotal'] = $i;
        } else {
            $data['newocctotal'] = 0;
        }
        
        
        # Project related
        $i = 0;
        foreach ($allprojtotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['allprojtotal'] = $i;
        } else {
            $data['allprojtotal'] = 0;
        }
        $i = 0;
        foreach ($allapprovedprojtotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['allapprovedprojtotal'] = $i;
        } else {
            $data['allapprovedprojtotal'] = 0;
        }
        $i = 0;
        foreach ($alllmototal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['alllmototal'] = $i;
        } else {
            $data['alllmototal'] = 0;
        }
        $i = 0;
        foreach ($allbiototal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['allbiototal'] = $i;
        } else {
            $data['allbiototal'] = 0;
        }
        $i = 0;
        foreach ($allexempttotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['allexempttotal'] = $i;
        } else {
            $data['allexempttotal'] = 0;
        }
        $i = 0;
        foreach ($allproctotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['allproctotal'] = $i;
        } else {
            $data['allproctotal'] = 0;
        }
        $i = 0;
        foreach ($allnotiftotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['allnotiftotal'] = $i;
        } else {
            $data['allnotiftotal'] = 0;
        }
        $i = 0;
        foreach ($allfinaltotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['allfinaltotal'] = $i;
        } else {
            $data['allfinaltotal'] = 0;
        }
        $i = 0;
        foreach ($allexporttotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['allexporttotal'] = $i;
        } else {
            $data['allexporttotal'] = 0;
        }
        $i = 0;
        foreach ($allexportexempttotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['allexportexempttotal'] = $i;
        } else {
            $data['allexportexempttotal'] = 0;
        }
        $i = 0;
        foreach ($allincidenttotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['allincidenttotal'] = $i;
        } else {
            $data['allincidenttotal'] = 0;
        }
        $i = 0;
        foreach ($allminortotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['allminortotal'] = $i;
        } else {
            $data['allminortotal'] = 0;
        }
        $i = 0;
        foreach ($allincidenttotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['allmajortotal'] = $i;
        } else {
            $data['allmajortotal'] = 0;
        }
        $i = 0;
        foreach ($allocctotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['allocctotal'] = $i;
        } else {
            $data['allocctotal'] = 0;
        }
        
        # New project total (within the past week)
        $i = 0;
        foreach ($newprojecttotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['newprojecttotal'] = $i;
        } else {
            $data['newprojecttotal'] = 0;
        }
        
        # New users total
        $i = 0;
        foreach ($newuserstotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['newuserstotal'] = $i;
        } else {
            $data['newuserstotal'] = 0;
        }
        # New approved users total
        $i = 0;
        foreach ($approveduserstotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['approveduserstotal'] = $i;
        } else {
            $data['approveduserstotal'] = 0;
        }
        
        # Existing users total
        $i = 0;
        foreach ($existinguserstotal as $row){
            $i++;
        }
        if ($i > 0 && $i != null){
            $data['existinguserstotal'] = $i;
        } else {
            $data['existinguserstotal'] = 0;
        }
        
        $this->load->template('adminpage_view', $data);
	}
}

?>
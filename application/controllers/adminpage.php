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
        $existinguserstotal = $this->statistic_model->get_all_existing_users();
        
        # New project total
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
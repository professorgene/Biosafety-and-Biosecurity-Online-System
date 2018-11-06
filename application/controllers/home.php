<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('notification_model');
        $this->load->model('project_model');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $reminders = $this->project_model->get_approved_proj_by_user_id($this->session->userdata('account_id'));
        if ($reminders != null && $reminders != "") {
            foreach ($reminders as $rows) {
                $current_date = strtotime(date('Y-m-d H:i:s'));
                $project_interval = $current_date - strtotime($rows->project_date);
                if ($rows->project_duration == 1){
                    if ($project_interval > 25920000 && $project_interval < 31104000){
                        $reminder = $this->notification_model->get_reminders($this->session->userdata('account_id'),$rows->project_id);
                        if ($reminder != null && $reminder != "") {
                            $reminder_interval = $current_date - strtotime($reminder->notification_date);
                            if ($reminder_interval > 1209600){
                                $this->notification_model->insert_new_notification($this->session->userdata('account_id'), 1, "Reminder for Project " . $rows->project_id . ": " . $rows->project_name, "This is a gentle reminder for the following project: " . $rows->project_name . ", as it is reaching its dateline. Please consider applying for completion, extension or termination of the aforementioned project.");
                            }
                        } else {
                            $this->notification_model->insert_new_notification($this->session->userdata('account_id'), 1, "Reminder for Project " . $rows->project_id . ": " . $rows->project_name, "This is a gentle reminder for the following project: " . $rows->project_name . ", as it is reaching its dateline. Please consider applying for completion, extension or termination of the aforementioned project.");
                        }
                    }
                } elseif ($rows->project_duration == 2){
                    if ($project_interval > 57024000 && $project_interval < 62208000){
                        $reminder = $this->notification_model->get_reminders($this->session->userdata('account_id'),$rows->project_id);
                        if ($reminder != null && $reminder != "") {
                            $reminder_interval = $current_date - strtotime($reminder->notification_date);
                            if ($reminder_interval > 1209600){
                                $this->notification_model->insert_new_notification($this->session->userdata('account_id'), 1, "Reminder for Project " . $rows->project_id . ": " . $rows->project_name, "This is a gentle reminder for the following project: " . $rows->project_name . ", as it is reaching its dateline. Please consider applying for completion, extension or termination of the aforementioned project.");
                            }
                        } else {
                            $this->notification_model->insert_new_notification($this->session->userdata('account_id'), 1, "Reminder for Project " . $rows->project_id . ": " . $rows->project_name, "This is a gentle reminder for the following project: " . $rows->project_name . ", as it is reaching its dateline. Please consider applying for completion, extension or termination of the aforementioned project.");
                        }
                    }
                } elseif ($rows->project_duration == 5){
                    if ($project_interval > 150336000 && $project_interval < 155520000){
                        $reminder = $this->notification_model->get_reminders($this->session->userdata('account_id'),$rows->project_id);
                        if ($reminder != null && $reminder != "") {
                            $reminder_interval = $current_date - strtotime($reminder->notification_date);
                            if ($reminder_interval > 1209600){
                                $this->notification_model->insert_new_notification($this->session->userdata('account_id'), 1, "Reminder for Project " . $rows->project_id . ": " . $rows->project_name, "This is a gentle reminder for the following project: " . $rows->project_name . ", as it is reaching its dateline. Please consider applying for completion, extension or termination of the aforementioned project.");
                            }
                        } else {
                            $this->notification_model->insert_new_notification($this->session->userdata('account_id'), 1, "Reminder for Project " . $rows->project_id . ": " . $rows->project_name, "This is a gentle reminder for the following project: " . $rows->project_name . ", as it is reaching its dateline. Please consider applying for completion, extension or termination of the aforementioned project.");
                        }
                    }
                }
            }
        }
        
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        #
		# $this->load->view('landing_view');
        # Aethylwyne: Please check core/MY_Loader.php for inquiries
        #
        $this->load->template('home_view', $data);
	}
}
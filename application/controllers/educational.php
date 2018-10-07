<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class educational extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('educational_model');
        $this->load->model('notification_model');
        $this->load->model('email_model');
    }
	
	public function index() {
        $data['quiz'] = $this->educational_model->get_all_quiz();
        $data['mark'] = $this->educational_model->get_all_marks($this->session->userdata('account_id'));
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $this->load->template('educational_view', $data);
    }
    
    public function new_quiz() {
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $this->form_validation->set_rules('quiz_name', 'Quiz name', 'required');
        $this->form_validation->set_rules('quiz_desc', 'Quiz description', 'required');
        
        # Submit form
        if($this->form_validation->run() == FALSE){
            # validation fails
            $this->load->template('newquiz_view', $data);
        } else {
            
            $questions = serialize($this->input->post('ques[]'));
            $answersA = serialize($this->input->post('optA[]'));
            $answersB = serialize($this->input->post('optB[]'));
            $answersC = serialize($this->input->post('optC[]'));
            $answersD = serialize($this->input->post('optD[]'));
            
            $data = array(
                'account_id' => $this->session->userdata('account_id'),
                'quiz_name' => $this->input->post('quiz_name'),
                'quiz_desc' => $this->input->post('quiz_desc'),
                'quiz_fullmark' => $this->input->post('quiz_fullmark'),
                'quiz_question' => $questions,
                'quiz_ans_a' => $answersA,
                'quiz_ans_b' => $answersB,
                'quiz_ans_c' => $answersC,
                'quiz_ans_d' => $answersD
            );
            
            if($this->educational_model->insert_new_quiz($data)){
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully created a new quiz!</div>');
                redirect('educational/new_quiz');
            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                redirect('educational/new_quiz');
            }
        }
    }
    
    public function start_quiz() {
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $id = $this->uri->segment(3);
        $data['quiz'] = $this->educational_model->get_quiz_by_id($id);
        
        $this->load->template('startquiz_view', $data);
    }
}
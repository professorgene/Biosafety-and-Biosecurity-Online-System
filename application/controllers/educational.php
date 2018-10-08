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
    
    public function delete_quiz() {
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $id = $this->uri->segment(3);
        
        if( $this->educational_model->delete_quiz($id) ){
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully deleted the selected quiz!</div>');
            redirect('educational/index');
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
            redirect('educational/index');
        }
    }
    
    public function new_quiz() {
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $this->form_validation->set_rules('quiz_name', 'Quiz name', 'required');
        $this->form_validation->set_rules('quiz_desc', 'Quiz description', 'required');
        
        # Submit form
        if($this->form_validation->run() == FALSE || $this->input->post('true[]') == null){
            # validation fails
            $this->load->template('newquiz_view', $data);
        } else {
            
            $questions = serialize($this->input->post('ques[]'));
            $answersA = serialize($this->input->post('optA[]'));
            $answersB = serialize($this->input->post('optB[]'));
            $answersC = serialize($this->input->post('optC[]'));
            $answersD = serialize($this->input->post('optD[]'));
            $correctans = serialize($this->input->post('true[]'));
            
            $data = array(
                'account_id' => $this->session->userdata('account_id'),
                'quiz_name' => $this->input->post('quiz_name'),
                'quiz_desc' => $this->input->post('quiz_desc'),
                'quiz_fullmark' => $this->input->post('quiz_fullmark'),
                'quiz_question' => $questions,
                'quiz_ans_a' => $answersA,
                'quiz_ans_b' => $answersB,
                'quiz_ans_c' => $answersC,
                'quiz_ans_d' => $answersD,
                'quiz_answer' => $correctans
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
        $this->form_validation->set_rules('quizid', 'Quiz ID', 'required');
        
        if($this->form_validation->run() == FALSE){
            # validation fails
            $this->load->template('startquiz_view', $data);
        } else {
            $mark = 0;
            $quiz = $this->educational_model->get_quiz_by_id($this->input->post('quizid'));
            foreach($quiz as $row){
                $j = $row->quiz_fullmark;
                $true = unserialize($row->quiz_answer);
            }
            if($j>0){
                if($this->input->post('choice1') == $true[0]){
                    $mark += 1;
                }
            }
            if($j>1){
                if($this->input->post('choice2') == $true[1]){
                    $mark += 1;
                }
            }
            if($j>2){
                if($this->input->post('choice3') == $true[2]){
                    $mark += 1;
                }
            }
            if($j>3){
                if($this->input->post('choice4') == $true[3]){
                    $mark += 1;
                }
            }
            if($j>4){
                if($this->input->post('choice5') == $true[4]){
                    $mark += 1;
                }
            }
            if($j>5){
                if($this->input->post('choice6') == $true[5]){
                    $mark += 1;
                }
            }
            if($j>6){
                if($this->input->post('choice7') == $true[6]){
                    $mark += 1;
                }
            }
            if($j>7){
                if($this->input->post('choice8') == $true[7]){
                    $mark += 1;
                }
            }
            if($j>8){
                if($this->input->post('choice9') == $true[8]){
                    $mark += 1;
                }
            }
            if($j>9){
                if($this->input->post('choice10') == $true[9]){
                    $mark += 1;
                }
            }
            
            /*
            for($i=0; i<$j; $i++){
                if($this->input->post('choice'.$i) == $true[$i]){
                    $mark += 1;
                }
            }
            */
            $data = array(
                'quiz_id' => $this->input->post('quizid'),
                'account_id' => $this->session->userdata('account_id'),
                'mark' => $mark
            );
            
            if($this->educational_model->get_marks_by_id($this->input->post('quizid'), $this->session->userdata('account_id')) == true) {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You had already completed the quiz!</div>');
                redirect('educational/index');
            } else {
                if($this->educational_model->insert_marks($data)){
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully completed the quiz!</div>');
                    redirect('educational/index');
                } else {
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                    redirect('educational/start_quiz');
                }
            }
        }
    }
}
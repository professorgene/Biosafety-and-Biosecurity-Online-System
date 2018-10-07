<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - Educational Activities</title>
    
    <style>
        body {
            padding-top: 82px;
        }
        
        a, a:hover, a:active, a:visited {
            text-decoration: none;
            color: black;
        }
        
        .button_right {
            margin-right: 12px;
        }
        
        .table {
            background-color: white;
        }
    </style>
</head>

<body>
    
    <!-- Navigation Bar -->
    <?php include_once 'template/navbar.php' ?>
    
    <!-- Page Content -->
    <div class="container">
        <hr/>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10 text-center">
                <br/>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
            <div class="col-md-1">
            </div>
        </div>
        <?php if(isset($quiz)) { ?>
        <?php
            foreach($quiz as $row){
                $id = $row->quiz_id;
                echo "<legend class='text-center'>" . $row->quiz_name . "</legend>";
                echo "<p class='text-center'>" . $row->quiz_desc . "</p>";
                $ques = unserialize($row->quiz_question);
                $optA = unserialize($row->quiz_ans_a);
                $optB = unserialize($row->quiz_ans_b);
                $optC = unserialize($row->quiz_ans_c);
                $optD = unserialize($row->quiz_ans_d);
                $j = $row->quiz_fullmark;
            }
        ?>
        <?php echo form_open('educational/start_quiz/'.$id); ?>
        <?php for($i=0; $i<$j; $i++){ ?>
            <p>Question <?php echo $i+1 ?></p>
            <p><?php echo $ques[$i] ?></p>
            <div class="form-group">
                <input type="radio" name="choice<?php echo $i+1 ?>" value="1" required> <?php echo $optA[$i] ?><br/>
                <input type="radio" name="choice<?php echo $i+1 ?>" value="2"> <?php echo $optB[$i] ?><br/>
                <input type="radio" name="choice<?php echo $i+1 ?>" value="3"> <?php echo $optC[$i] ?><br/>
                <input type="radio" name="choice<?php echo $i+1 ?>" value="4"> <?php echo $optD[$i] ?><br/>
            </div>
            <hr/>
        <?php } ?>
        <input type="hidden" name="quizid" value="<?php echo $id ?>">
        <br/>
        <div class="form-group text-center">
            <span class="col-md-2"></span>
            <button name="submit" type="submit" class="btn btn-success col-md-3">Submit</button>
            <span class="col-md-2"></span>
            <button name="cancel" type="reset" class="btn col-md-3">Reset</button>
            <span class="col-md-2"></span>
        </div>
        <?php echo form_close(); ?>
        <?php } else { ?>
            <h2 class="text-center">Oops! Something went wrong! Please try again later!</h2>
        <?php } ?>
        <br/>
    </div>
    
</body>
</html>
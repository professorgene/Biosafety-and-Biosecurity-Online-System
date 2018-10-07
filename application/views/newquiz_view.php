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
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10 bg-white">
                <?php echo form_open('educational/new_quiz'); ?>
                <legend>New Quiz</legend>
                <br/>
                <div class="form-group">
                    <label for="quiz_name">Quiz Name:</label>
                    <input class="form-control" id="quiz_name" name="quiz_name" placeholder="Enter quiz name here." type="text" />
                    <span class="text-danger"><?php echo form_error('quiz_name'); ?></span>
                </div>
                <div class="form-group">
                    <label for="quiz_desc">Quiz Description:</label>
                    <input class="form-control" id="quiz_desc" name="quiz_desc" placeholder="Enter description here." type="text" />
                    <span class="text-danger"><?php echo form_error('quiz_desc'); ?></span>
                </div>
                
                <div class="form-group">
                    <label for="quiz_fullmark">Number of Questions:</label>
                    <select class="form-control" id="quiz_fullmark" name="quiz_fullmark" onchange="genQues()">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>

                <div class="row" id="allquestions"></div>
                
                <div class="form-group text-center">
                    <span class="col-md-2"></span>
                    <button name="submit" type="submit" class="btn btn-success col-md-3">Submit</button>
                    <span class="col-md-2"></span>
                    <button name="cancel" onclick="window.location.reload()" class="btn col-md-3">Reset</button>
                    <span class="col-md-2"></span>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="col-md-1">
            </div>
        </div>
        <br/>
    </div>
    <br/>
    
    <script>
        function genQues() {
            document.getElementById("allquestions").innerHTML = "";
            for (var i=0; i < document.getElementById("quiz_fullmark").value; i++) {  
                document.getElementById("allquestions").innerHTML += 
                    '<fieldset class="col-md-6">' +
                        '<legend>Question ' + (i+1) + '</legend>' +
                        '<div class="form-group">' +
                            '<textarea class="form-control" name="ques[]" placeholder="Enter the question here." required></textarea>' +
                        '</div>' +
                        '<div class="form-group">' +
                            '<label>Option 1:</label>' +
                            '<textarea class="form-control" name="optA[]" placeholder="Enter the answer here." required></textarea>' +
                        '</div>' +
                        '<div class="form-group">' +
                            '<label>Option 2:</label>' +
                            '<textarea class="form-control" name="optB[]" placeholder="Enter the answer here." required></textarea>' +
                        '</div>' +
                        '<div class="form-group">' +
                            '<label>Option 3:</label>' +
                            '<textarea class="form-control" name="optC[]" placeholder="Enter the answer here." required></textarea>' +
                        '</div>' +
                        '<div class="form-group">' +
                            '<label>Option 4:</label>' +
                            '<textarea class="form-control" name="optD[]" placeholder="Enter the answer here." required></textarea>' +
                        '</div>' +
                    '</fieldset>';
            }
            /*
            for (var i=0; i < document.getElementById("quiz_fullmark").value; i++) {  
                document.getElementById("allquestions").innerHTML += 
                    '<fieldset class="col-md-6">' +
                        '<legend>Question ' + (i+1) + '</legend>' +
                        '<div class="form-group">' +
                            '<textarea class="form-control" name="ques' + (i+1) + '" placeholder="Enter the question here." required></textarea>' +
                        '</div>' +
                        '<div class="form-group">' +
                            '<label>Option 1:</label>' +
                            '<textarea class="form-control" name="optA' + (i+1) + '" placeholder="Enter the answer here." required></textarea>' +
                        '</div>' +
                        '<div class="form-group">' +
                            '<label>Option 2:</label>' +
                            '<textarea class="form-control" name="optB' + (i+1) + '" placeholder="Enter the answer here." required></textarea>' +
                        '</div>' +
                        '<div class="form-group">' +
                            '<label>Option 3:</label>' +
                            '<textarea class="form-control" name="optC' + (i+1) + '" placeholder="Enter the answer here." required></textarea>' +
                        '</div>' +
                        '<div class="form-group">' +
                            '<label>Option 4:</label>' +
                            '<textarea class="form-control" name="optD' + (i+1) + '" placeholder="Enter the answer here." required></textarea>' +
                        '</div>' +
                    '</fieldset>';
            }
            */
        }
    </script>
</body>
</html>
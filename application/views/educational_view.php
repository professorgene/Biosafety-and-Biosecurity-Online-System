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
	<div id='breadcrumb1'><?php echo $this->breadcrumbs->show(); ?></div>
        <hr/>
        <div class="text-center row">
            <?php if($this->session->userdata('account_type') == 4) { ?>
                <a href="<?php echo base_url(); ?>index.php/educational/new_quiz" class="col-md-12"><button class="btn btn-info button_right" style="display:inline-block;width:200px;">New Quiz</button></a>
            <?php } ?>
        </div>
        <br/>
        <input class="form-control" id="searchbar" type="text" placeholder="Search here">
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
        
        <h5>Quiz</h5>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="1"></th>
                        <th colspan="3">Title</th>
                        <th colspan="6">Description</th>
                        <th class="text-right" colspan="1">Score</th>
                        <th colspan="1"></th>
                    </tr>
                </thead>
                <tbody id="quiz">
                <?php $i=0; foreach($quiz as $row): ?>
                    <tr class="searchable">
                        <td class="text-center" colspan="1"><?php echo $i = $i+1 ?></td>
                        <td colspan="3"><?php echo $row->quiz_name; ?></td>
                        <td colspan="6"><?php echo $row->quiz_desc; ?></td>
                        <td class="text-right" colspan="1"><?php 
                                if(isset($mark)){
                                    $words = "";
                                    foreach($mark as $row2) {
                                        if($row->quiz_id == $row2->quiz_id){
                                            $words = $row2->mark;
                                        }
                                    }
                                    $words = $words . " / " . $row->quiz_fullmark;
                                    echo $words;
                                }
                            ?></td>
                        <td class="text-center" colspan="1">
                            <i class="fa fa-play btn btn-info" onclick="start_quiz(<?php echo $row->quiz_id; ?>)" title="Begin Quiz"></i>
                            <?php if($this->session->userdata('account_type') == 4) { ?>
                            <i class="fa fa-times btn btn-danger" onclick="delete_quiz(<?php echo $row->quiz_id; ?>)" title="Delete Quiz"></i>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <script>
            $(document).ready(function(){
                $("#searchbar").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#quiz .searchable").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
            
            function start_quiz(i){
                window.location = "<?php echo base_url(); ?>index.php/educational/start_quiz/" + i;
            }
            
            function delete_quiz(i){
                var j = confirm("You are about to delete this quiz. Are you sure?");
                if (j) {
                    window.location = "<?php echo base_url(); ?>index.php/educational/delete_quiz/" + i;
                }
            }
        </script>
        
        <?php } ?>
        <br/>
    </div>
    
</body>
</html>
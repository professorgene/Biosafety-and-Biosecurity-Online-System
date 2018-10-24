<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - Annual or Final Report Page</title>
    
    <style>
        body {
            padding-top: 54px;
        }

        .portfolio-item {
            margin-bottom: 30px;
        }

        .card-img-top {
            height: auto;
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <?php include_once 'template/navbar.php' ?>

    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading -->
       <br>
        
        <div id='breadcrumb1'><?php echo $this->breadcrumbs->show(); ?></div>			
	
		<hr>
	<div class="row" >
	<div class="col-lg-5" >
        <?php echo form_open('exportingofbioexemptdealingpage/index'); ?>
                            <br/>
                            <legend>New Project</legend>
                            <br/>
                            <div class="form-group">
                                <label for="fullname">Project Name:</label>
                                <input class="form-control" id="projname" name="project_name" placeholder="Enter project name here." type="text" value="<?php echo set_value('project_name'); ?>" />
                                <span class="text-danger"><?php echo form_error('project_name'); ?></span>
                            </div>

                            <div class="form-group">
                                <label for="email_add">Project Description:</label>
                                <textarea rows="5" id="projdesc" name="project_desc" class="form-control" placeholder="Enter project description here." value="<?php echo set_value('project_desc'); ?>"></textarea>
                                <span class="text-danger"><?php echo form_error('project_desc'); ?></span>
                            </div>
        
                            <div class="form-group">
                                <label for="type">Project Duration:</label>
                                <select class="form-control" id="duration" name="project_duration" >
                                    <option value="1">1 Year</option>
                                    <option value="2">2 Year</option>
                                    <option value="3">5 Year</option>
                                </select>
                            </div>
                            <br/>
                            <div class="form-group text-center">
                                <span class="col-md-1"></span>
                                <button name="submit" type="submit" class="btn btn-success col-md-4">Create</button>
                                <span class="col-md-2"></span>
                                <button name="cancel" type="reset" class="btn col-md-4">Reset</button>
                                <span class="col-md-1"></span>
                            </div>
                        <?php echo form_close(); ?>
        <br/>
    </div>
		
		<div class="col-lg-7">
            <h3>Announcements
                <i class="fa fa-plus btn btn-info float-right" onclick="new_announcement()" title="New Announcement"></i>
            </h3>
            <div class="row">
                <div class="col-md-12 text-center">
                    <br/>
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
            </div>
            <?php if(isset($announcement)) {
                    foreach($announcement as $row) {
            ?>
            <div class="card my-4">
                <h5 class="card-header"><?php echo $row->announcement_title ?>
                    <i class="fa fa-times btn btn-danger float-right" onclick="delete_announcement(<?php echo $row->announcement_id; ?>)" title="Remove Announcement"></i>
                </h5>
                <div class="card-body">
                    <p><?php echo $row->announcement_desc ?></p>
                </div>
            </div>
            <?php   }
                } 
            ?>
		</div>
	</div>					
	</div>
	<br/>
    <script>
        <?php # Change the index.php/application/new_announcement/ + "xxx" to in the javascript here to the corresponding page. ?>
        function new_announcement(){
            window.location = "<?php echo base_url(); ?>index.php/exportingofbioexemptdealingpage/new_announcement/" + "exportexempt";
        }
    
        <?php # Change the index.php/xxx/delete_announcement to in the javascript here to the corresponding page. ?>
        function delete_announcement(i){
            var k = confirm("Are you sure?");
            if (k){
                window.location = "<?php echo base_url(); ?>index.php/exportingofbioexemptdealingpage/delete_announcement/" + i;
            }
        }
    </script>
</body>
</html>
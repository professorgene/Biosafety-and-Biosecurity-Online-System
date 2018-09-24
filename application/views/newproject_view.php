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
    <title>Swinburne Biosafety and Biosecurity Online System - Homepage</title>
    
    <style>
        body {
            padding-top: 54px;
        }
        
        a, a:hover, a:active, a:visited {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <?php include_once 'template/navbar.php' ?>

    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <h2 class="my-4 text-center">Welcome, <?php echo $this->session->userdata('account_name'); ?> 
			<div onclick="location.href='<?=base_url ()?>index.php/download/SSBC_Manualv2.1.pdf';" class="float-right">
				<i class="hovicon small effect-1 sub-a icon-book" title="Click to Download SSBC User Manual"></i>
				<br>
				<a href="<?=base_url ()?>index.php/download/SSBC_Manualv2.1.pdf" id="texthover">User Manual</a>
			</div>
        </h2>
			<br>
        
        <div class="vertical-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-3 col-sm-2 col-1">
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-8 col-10 bg-white">
                        <?php echo form_open('newproject/index'); ?>
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
                            <br/>
                            <div class="form-group text-center">
                                <span class="col-md-1"></span>
                                <button name="submit" type="submit" class="btn btn-success col-md-4">Create</button>
                                <span class="col-md-2"></span>
                                <button name="cancel" type="reset" class="btn col-md-4">Reset</button>
                                <span class="col-md-1"></span>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-2 col-1">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-3 col-sm-2 col-1">
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-8 col-10 text-center bg-white">
                        <br/>
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-2 col-1">
                    </div>
                </div>
                <br/>
            </div>
        </div>
	</div>
</body>
</html>
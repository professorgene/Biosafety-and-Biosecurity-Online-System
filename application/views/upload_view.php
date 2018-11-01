<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Swinburne Biosafety and Biosecurity Online System - Upload Test</title>
    
    <style>
        body {
            padding-top: 82px;
        }
        
    </style>
</head>

<body>
    <!-- Navigation -->
    <?php include_once 'template/navbar.php' ?>
    
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-md-2 col-sm-1 col-1">
            </div>
            <div class="col-xl-8 col-md-8 col-sm-10 col-10 text-center bg-white">
                <br/>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
            <div class="col-xl-2 col-md-2 col-sm-1 col-1">
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2 col-md-2 col-sm-1 col-1">
            </div>
            <div class="col-xl-8 col-md-8 col-sm-10 col-10 bg-white">
                <?php echo form_open_multipart('upload/index'); ?>
                    <br/>
                    <legend>Upload Testing</legend>
                    <br/>
                    <div class="form-group">
                        <label for="order_name">Full Name:</label>
                        <input class="form-control" id="order_name" name="order_name" placeholder="Enter your name here." type="text" />
                        <span class="text-danger"><?php echo form_error('order_name'); ?></span>
                    </div>
                
                    <div class="form-group">
                        <label>Upload 1:</label>
                        <input type="file" class="form-control" name="order_file" />
                    </div>
                
                    <div class="form-group">
                        <label>Upload 2:</label>
                        <input type="file" class="form-control" name="order_attach" />
                    </div>

                    <div class="form-group text-center">
                        <span class="col-md-4"></span>
                        <button name="submit" type="submit" class="btn btn-success col-md-4">Save</button>
                        <span class="col-md-4"></span>
                    </div>
                <?php echo form_close(); ?>
            </div>
            <div class="col-xl-2 col-md-2 col-sm-1 col-1">
            </div>
        </div>
        <br/>
    </div>
</body>
</html>
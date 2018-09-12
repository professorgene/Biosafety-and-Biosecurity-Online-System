<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('isLogin')){
    redirect('home/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Biosafety and Biosecurity Online System</title>
    
    <style>
        body {
            padding-top: 82px;
            background-image: url(<?php echo base_url('assets/images/login.jpg'); ?>);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        
        .vertical-center {
            min-height: 75%;
            min-height: 75vh;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <?php include_once 'template/navbar.php' ?>

    <!-- Page Content -->
    <div class="vertical-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-2 col-1">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-8 col-10 bg-white">
                    <?php echo form_open('landing/recovery'); ?>
                        <br/>
                        <legend>Password Recovery</legend>
                        <br/>
                        <div class="form-group">
                            <label for="email_add">Email Address:</label>
                            <input class="form-control" id="email_add" name="account_email" placeholder="Enter your email address here." type="text" value="<?php echo set_value('account_email'); ?>" />
                            <span class="text-danger"><?php echo form_error('account_email'); ?></span>
                        </div>
                        <div class="form-group text-center">
                            <span class="col-md-4"></span>
                            <button name="submit" type="submit" class="btn btn-success col-md-4">Recover Password</button>
                            <span class="col-md-4"></span>
                        </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-2 col-1">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-2 col-1">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-8 col-10 text-center bg-white">
                    <br/>
                <?php echo $this->session->flashdata('msg'); ?>
                    <p>Remember Your Password? <a href="<?php echo base_url(); ?>index.php/landing/index">Click Here to Login Now</a></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-2 col-1">
                </div>
            </div>
            <br/>
        </div>
    </div>
</body>
</html>
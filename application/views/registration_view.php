<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('isLogin')){
    redirect('home/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Biosafety and Biosecurity Online System - Registration</title>
    
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
        
        button {
            margin-right: 12px;
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
                <div class="col-xl-3 col-md-3 col-sm-2 col-1">
                </div>
                <div class="col-xl-6 col-md-6 col-sm-8 col-10 text-center bg-white">
                    <br/>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <p>Already had an account? <a href="<?php echo base_url(); ?>index.php/landing/index">Login Now</a></p>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-2 col-1">
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-3 col-sm-2 col-1">
                </div>
                <div class="col-xl-6 col-md-6 col-sm-8 col-10 bg-white">
                    <?php echo form_open('registration/index'); ?>
                        <br/>
                        <legend>Registration</legend>
                        <br/>
                        <div class="form-group">
                            <label for="fullname">Full Name:</label>
                            <input class="form-control" id="fullname" name="account_fullname" placeholder="Enter your name here." type="text" value="<?php echo set_value('account_fullname'); ?>" />
                            <span class="text-danger"><?php echo form_error('account_fullname'); ?></span>
                        </div>

                        <div class="form-group">
                            <label for="email_add">Email Address:</label>
                            <input class="form-control" id="email_add" name="account_email" placeholder="Enter your email address here." type="text" />
                            <span class="text-danger"><?php echo form_error('account_email'); ?> <?php echo set_value('account_email'); ?></span>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input class="form-control" id="password" name="account_password" placeholder="Enter your password here." type="password" />
                            <span class="text-danger"><?php echo form_error('account_password'); ?></span>
                        </div>

                        <div class="form-group">
                            <label for="confirmpassword">Confirm Password:</label>
                            <input class="form-control" id="confirmpassword" name="account_confirmpassword" placeholder="Re-enter your password here." type="password" />
                            <span class="text-danger"><?php echo form_error('account_confirmpassword'); ?></span>
                        </div>

                        <div class="form-group">
                            <label for="type">Account Type:</label>
                            <select class="form-control" id="type" name="account_type" >
                                <option value="1">Applicant / Project Investigator</option>
                                <option value="2">SSBC Chair</option>
                                <option value="3">SSBC Member</option>
                                <option value="4">Biosafety Officer</option>
                                <option value="5">Health and Safety Executive / Coordinator </option>
                                <option value="6">Laboratory Officer</option>
                                <option value="7">Student & Postgraduate</option>
                            </select>
                            <span class="text-danger"><?php echo form_error('account_type'); ?></span>
                        </div>

                        <div class="form-group text-center">
                            <span class="col-md-1"></span>
                            <button name="submit" type="submit" class="btn btn-success col-md-4">Register</button>
                            <span class="col-md-2"></span>
                            <button name="cancel" type="button" onclick="hard_reset()" class="btn col-md-4">Reset</button>
                            <span class="col-md-1"></span>
                        </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-2 col-1">
                </div>
            </div>
            <br/>
        </div>
    </div>
    <script>
        function hard_reset() {
            document.getElementById("fullname").value = "";
            document.getElementById("email_add").value = "";
            document.getElementById("password").value = "";
            document.getElementById("confirmpassword").value = "";
            document.getElementById("type").value = "";
        }
        
        $('html').bind('keypress', function(e){
           if(e.keyCode == 13)
           {
              return false;
           }
        });
    </script>
</body>
</html>
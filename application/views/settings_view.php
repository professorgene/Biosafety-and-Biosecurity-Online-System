<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Swinburne Biosafety and Biosecurity Online System - My Account</title>
    
    <style>
        body {
            padding-top: 82px;
        }
        
    </style>
</head>

<body>
    <!-- Navigation -->
    <?php include_once 'template/navbar.php' ?>
    
    <?php 
        foreach ($accountdetails as $details) {
            $acc_name = $details->account_fullname;
            $acc_email = $details->account_email;
            $acc_type = $details->account_type;
        }
    ?>
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
                <?php echo form_open('settings/index'); ?>
                    <br/>
                    <legend>My Account Settings</legend>
                    <br/>
                    <div class="form-group">
                        <label for="fullname">Full Name:</label>
                        <input class="form-control" id="fullname" name="account_fullname" placeholder="Enter your name here." type="text" value="<?php echo set_value('account_fullname', $acc_name); ?>" disabled="disabled" />
                    </div>

                    <div class="form-group">
                        <label for="email_add">Email Address:</label>
                        <input class="form-control" id="email_add" name="account_email" placeholder="Enter your email address here." type="text" value="<?php echo set_value('account_email', $acc_email); ?>" disabled="disabled" />
                        <span class="text-danger"><?php echo form_error('account_email'); ?></span>
                    </div>

                    <div class="form-group">
                        <label for="password">New Password:</label>
                        <input class="form-control" id="password" name="account_password" placeholder="Enter your password here." type="password" />
                        <span class="text-danger"><?php echo form_error('account_password'); ?></span>
                    </div>
                
                    <div class="form-group">
                        <label for="confirmpassword">Confirm New Password:</label>
                        <input class="form-control" id="confirmpassword" name="account_confirmpassword" placeholder="Reenter your password here." type="password" />
                        <span class="text-danger"><?php echo form_error('account_confirmpassword'); ?></span>
                    </div>

                    <div class="form-group">
                        <label for="type">Account Type:</label>
                        <select class="form-control" id="type" name="account_type" disabled="disabled">
                            <option value="1">Applicant / Project Investigator</option>
                            <option value="2">SSBC Chair</option>
                            <option value="3">SSBC Member</option>
                            <option value="4">Biosafety Officer</option>
                            <option value="5">Health and Safety Officer</option>
                            <option value="6">Lab Officer</option>
                            <option value="7">Student & Postgraduate</option>
                        </select>
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

        <script>
            document.getElementById("type").value = "<?php echo $acc_type; ?>";
        </script>
    </div>
</body>
</html>
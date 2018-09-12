<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Biosafety and Biosecurity Online System - Notification</title>
    
    <style>
        body {
            padding-top: 82px;
        }
        
        .notif {
            margin-top: 32px;
            background-color: white;
            border: 1px solid black;
            border-radius: 15px;
            padding-top: 15px;
            padding-bottom: 5px;
            padding-left: 12px;
            padding-right: 12px;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <?php include_once 'template/navbar.php' ?>
    
    <!-- Page Content -->
    <div class="container">
        <h5>Notifications</h5>
        <?php 
            if(count($notification) >= 1) { 
                foreach ($notification as $row):
        ?>
            <div class="row">
                <div class="col-md-1 col-1">
                </div>
                <div class="notif col-md-10 col-10">
                    <h1 style="float:left; font-size:1.1em;"><?php echo $row->notification_title ?></h1>
                    <h1 style="float:right; font-size:1.1em;"><?php echo $row->notification_date ?></h1>
                    <p style="clear:both; padding-top:8px;"><?php echo $row->notification_description ?></p>
                </div>
                <div class="col-md-1 col-1">
                </div>
            </div>
        <?php 
                endforeach;
            } else { 
        ?>
            <div class="row text-center">
                <div class="col-md-1 col-1">
                </div>
                <div class="notif col-md-10 col-10">
                    <h1 style="font-size:1.1em;">Currently, you have no pending notifications! Why not check again later?</h1>
                </div>
                <div class="col-md-1 col-1">
                </div>
            </div>
        <?php } ?>
        <br/>
    </div>
</body>
</html>
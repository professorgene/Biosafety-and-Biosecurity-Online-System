<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
if($this->session->userdata('account_type') != 2 && $this->session->userdata('account_type') != 3 && $this->session->userdata('account_type') != 4 && $this->session->userdata('account_type') != 5){
    redirect('home/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - New Application</title>
    
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
        <br>
        <div id='breadcrumb1'><?php echo $this->breadcrumbs->show(); ?></div>
        <hr>
        <?php if($this->session->userdata('account_type') == 2 || $this->session->userdata('account_type') == 3){ ?>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/majorincident_approval/index"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\History.jpg') ?>" alt=""></a>
                    <div class="card-body">
                        <h6 style="text-align: center" class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/majorincident_approval/index">Major Biological Incident or Accident Form Approvals</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/occupationaldisease_approval/index"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\History.jpg') ?>" alt=""></a>
                    <div class="card-body">
                        <h6 style="text-align: center" class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/occupationaldisease_approval/index">Occupational Disease Or Exposure</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
        <?php }else{ ?>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/minorincident_approval/index"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\History.jpg') ?>" alt=""></a>
                    <div class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/minorincident_approval/index">Minor Biological Incident or Accident Form Approvals</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/majorincident_approval/index"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\History.jpg') ?>" alt=""></a>
                    <div class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/majorincident_approval/index">Major Biological Incident or Accident Form Approvals</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/occupationaldisease_approval/index"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\History.jpg') ?>" alt=""></a>
                    <div class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/occupationaldisease_approval/index">Occupational Disease Or Exposure</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>
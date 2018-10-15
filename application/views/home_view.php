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
        <!-- Page Heading -->
        <h2 class="my-4 text-center">Welcome, <?php echo $this->session->userdata('account_name'); ?> 
			<div onclick="location.href='<?=base_url ()?>index.php/download/SSBC_Manualv2.1.pdf';" class="float-right">
				<i class="hovicon small effect-1 sub-a icon-book" title="Click to Download SSBC User Manual"></i>
				<br>
				<a href="<?=base_url ()?>index.php/download/SSBC_Manualv2.1.pdf" id="texthover">User Manual</a>
			</div>
        </h2>
			<br>
        
        <!--
        <div class="row">
            <?php if($this->session->userdata('account_type') != 5 && $this->session->userdata('account_type') != 6 && $this->session->userdata('account_type') != 7) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/applicationpage"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Application for Biosafety.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/applicationpage">Application <br> <br> </a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/procurementpage"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Procurement of Biological Material.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/procurementpage">Procurement of Biological Material</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/notificationbiohazardouspage"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Notification of LMO.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/notificationbiohazardouspage">Notification of LMO and Biohazardous Material</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/inventory/index"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\LMO Biohazardous Mat.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/inventory/index">LMO and Biohazardous Material Database</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <?php if($this->session->userdata('account_type') != 5 && $this->session->userdata('account_type') != 6 && $this->session->userdata('account_type') != 7) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/exportingbiologicalmaterialpage"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Exporting of Biological Material.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/exportingbiologicalmaterialpage">Exporting of Biological Material</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/incidentaccidentreportingpage"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Incident Accident Reporting.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/incidentaccidentreportingpage">Incident Accident Reporting<br> <br></a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/annualfinalreportpage"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Annual Report.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/annualfinalreportpage">Annual or Final Report <br> <br></a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/history"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\History.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/history">Submitted and Approved Applications</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
  -->     
        
        <div class="row">
            <?php if($this->session->userdata('account_type') != 5 && $this->session->userdata('account_type') != 6 && $this->session->userdata('account_type') != 7) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/projectselect"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Annual Report.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/projectselect">New Project</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/historyproj"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\History.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/historyproj">Submitted &amp; Approved Projects</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/inventory/index"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\LMO Biohazardous Mat.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/inventory/index">LMO &amp; Biohazardous Material Database</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <?php if($this->session->userdata('account_type') != 5 && $this->session->userdata('account_type') != 6 && $this->session->userdata('account_type') != 7) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/educational/index"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\History.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/educational/index">Educational Activities</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/saveHistory"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\History.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/saveHistory">Saved Projects</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
	</div>
</body>
</html>
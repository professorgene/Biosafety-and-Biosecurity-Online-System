<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}

?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Swinburne Sarawak Biosafety and Biosecurity Online System - Home Page</title>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/css/simple-sidebar.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    
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
            /*color: black;*/
        }
    </style>
    
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar">
            
            <?php if ($this->session->userdata('isLogin')){ ?>
            <div class="sidebar-header">
                <h3>Swinburne Sarawak</h3>
            </div>
            
            <ul class="list-unstyled components">
                <p>BBOS</p>
                <li>
                    <?php if($readnotif[0] ==0) { ?>
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/notification/index">
                        <span class="fa-layers fa-fw">
                            <i class="fas fa-bell fa-lg" style="color:#F65C26;"></i>
                            <span class="fa-layers-counter" style="color:#F65C26;"><?php echo $readnotif[1] ?> Notifications</span>
                        </span>
                    </a>
                    <?php } else { ?>
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/notification/index"><i class="fa fa-bell fa-lg fa-fw"></i> Notifications</a>
                    <?php } ?>
                </li>
                
                <?php if($this->session->userdata('account_type') == 2 || $this->session->userdata('account_type') == 3 || $this->session->userdata('account_type') == 4 || $this->session->userdata('account_type') == 5 || $this->session->userdata('account_type') == 6 ) { ?>
                <li>
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/adminpage/index"><i class="fa fa-tv fa-lg fa-fw"></i> Administrator Panel</a>
                </li>
                
                <?php } ?>
                <li>
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/settings/index"><i class="fa fa-user fa-lg fa-fw"></i> My Account</a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/landing/logout"><i class="fa fa-sign-out-alt fa-lg fa-fw"></i> Log Out</a>
                </li>
            </ul>
            <?php } else { ?>
            <div class="sidebar-header">
                <h3>Swinburne Sarawak</h3>
            </div>
            <?php } ?>    
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content Insert Here -->
        <div id="content">
            <div class="container-fluid">
                <h2 class="my-4 text-center">Welcome, <?php echo $this->session->userdata('account_name'); ?> 
                    <div onclick="location.href='<?=base_url ()?>index.php/download/SSBC_Manualv2.1.pdf';" class="float-right">
                        <i class="hovicon small effect-1 sub-a icon-book" title="Click to Download SSBC User Manual"></i>
                        <br>
                        <a href="<?=base_url ()?>index.php/download/SSBC_Manualv2.1.pdf" id="texthover">User Manual</a>
                    </div>
                </h2>
                <br>
                
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
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


</body>

</html>
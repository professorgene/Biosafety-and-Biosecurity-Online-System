<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
if($this->session->userdata('account_type') != 2 && $this->session->userdata('account_type') != 3 && $this->session->userdata('account_type') != 4 && $this->session->userdata('account_type') != 5 && $this->session->userdata('account_type') != 6){
    redirect('home/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Swinburne Biosafety and Biosecurity Online System - Admin Panel</title>
    
    <link rel="stylesheet" href="<?php echo base_url('assets/css/simple-donut.css') ?>">
    <script src="<?php echo base_url('assets\js\simple-donut-jquery.js') ?>"></script>

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
        <h2 class="my-4 text-center">Welcome to your Administrator Panel, <?php echo $this->session->userdata('account_name'); ?></h2>
        
        <?php if($this->session->userdata('account_type') == 2 || $this->session->userdata('account_type') == 3 || $this->session->userdata('account_type') == 4 ) {  ?>
        <div class="row">
            <?php if($this->session->userdata('account_type') == 4) {  ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/accountapproval/index"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\History2.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/accountapproval/index">Account Approvals<br> <br></a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/newapplication"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Application for Biosafety2.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/newapplication">New Application<br> <br></a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <?php if($this->session->userdata('account_type') == 4 ) {  ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/procurementapproval"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Procurement of Biological Material2.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/procurementapproval">Procurement of Biological Material</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/notification_of_LMO_and_BM_approval"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Notification of LMO2.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/notification_of_LMO_and_BM_approval">Notification of LMO and Biohazardous Materials</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/exportingrequest"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Exporting of Biological Material2.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/exportingrequest">Exporting of Biological Material</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/incidentaccident_type"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Incident Accident Reporting2.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/incidentaccident_type">Incident Accident Reporting <br> <br></a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/annualreport_approval"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Annual Report2.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/annualreport_approval">Annual or Final Report<br> <br></a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/editrequest_approval"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\History2.jpg') ?>" alt=""></a>
                    <div class="card-body">
                        <h6 style="text-align: center" class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/editrequest_approval">Modification & Extension Requests</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <?php if($this->session->userdata('account_type') == 5 ){ ?>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/procurementapproval"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Procurement of Biological Material2.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/procurementapproval">Procurement of Biological Material</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/incidentaccident_type"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\History2.jpg') ?>" alt=""></a>
                    <div class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/incidentaccident_type">Incident Accident Reporting</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <?php if($this->session->userdata('account_type') == 6 ){ ?>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/procurementapproval"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Procurement of Biological Material2.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/procurementapproval">Procurement of Biological Material</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/notification_of_LMO_and_BM_approval"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Notification of LMO2.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/notification_of_LMO_and_BM_approval">Notification of LMO and Biohazardous Materials</a>
                        </h6>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <hr/>
        
        <h3 class="my-4">Statistics</h3>
        <br/>
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12"><br/></div>
                    <div class="col-md-12"><h2 class="text-center"><?php echo $newprojecttotal ?></h2></div>
                    <div class="col-md-12"><br/></div>
                    <div class="col-md-12"><p class="text-center">Recently Submitted Projects</p></div>
                </div>
                <div class="row">
                    <div class="col-md-12"><br/></div>
                    <div class="col-md-12"><h2 class="text-center"><?php echo $existinguserstotal ?></h2></div>
                    <div class="col-md-12"><br/></div>
                    <div class="col-md-12"><p class="text-center">Total BBOS Users</p></div>
                </div>
            </div>
            <div class="col-md-3">
                <div id="newusers" class="donut-size">
                    <div class="pie-wrapper">
                        <span class="label">
                            <span class="num">0</span>
                        </span>
                        <div class="pie">
                            <div class="left-side half-circle"></div>
                            <div class="right-side half-circle"></div>
                        </div>
                        <div class="shadow"></div>
                    </div>
                </div>
                <br/>
                <p class="text-center">Active User Applications</p>
            </div>
            <div class="col-md-3">
                <div id="blank" class="donut-size">
                    <div class="pie-wrapper">
                        <span class="label">
                            <span class="num">0</span><span class="smaller">%</span>
                        </span>
                        <div class="pie">
                            <div class="left-side half-circle"></div>
                            <div class="right-side half-circle"></div>
                        </div>
                        <div class="shadow"></div>
                    </div>
                </div>
                <br/>
                <p class="text-center">Placeholder</p>
            </div>
            <div class="col-md-3">
                <div id="blank" class="donut-size">
                    <div class="pie-wrapper">
                        <span class="label">
                            <span class="num">0</span><span class="smaller">%</span>
                        </span>
                        <div class="pie">
                            <div class="left-side half-circle"></div>
                            <div class="right-side half-circle"></div>
                        </div>
                        <div class="shadow"></div>
                    </div>
                </div>
                <br/>
                <p class="text-center">Placeholder</p>
            </div>
        </div>
    </div>
    
    <br/>
    
    <script>
        // Automatically loads data into Statistic Panel. Use Pie for comparison, Donut for standalone
        updatePieChart('#newusers', <?php echo $newuserstotal ?>, <?php echo $existinguserstotal ?>);
    </script>
</body>
</html>
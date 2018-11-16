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
        <hr/>
        <h3 class="my-4">Navigation</h3>
        <?php if($this->session->userdata('account_type') == 2 || $this->session->userdata('account_type') == 3 || $this->session->userdata('account_type') == 4 ) {  ?>
        <div class="row">
            <?php if($this->session->userdata('account_type') == 4) {  ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item d-flex align-items-stretch">
                <div class="card card-block justify-content-center align-items-center">
                    <a href="<?php echo base_url(); ?>index.php/accountapproval/index"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\accountapproval.jpg') ?>" alt=""></a>
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
            <?php if($this->session->userdata('account_type') == 3 || $this->session->userdata('account_type') == 4 ) {  ?>
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
            <?php } ?>
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
                    <a href="<?php echo base_url(); ?>index.php/editrequest_approval"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Modification.jpg') ?>" alt=""></a>
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
                    <a href="<?php echo base_url(); ?>index.php/notification_of_LMO_and_BM_approval"><img class="card-img-top" src="<?php echo base_url('assets\images\ApplicantForm\Notification of LMO2.jpg') ?>" alt=""></a>
                    <div style="text-align: center" class="card-body">
                        <h6 class="card-title">
                            <a href="<?php echo base_url(); ?>index.php/notification_of_LMO_and_BM_approval">Notification of LMO and Biohazardous Materials</a>
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
        <br/>
        <hr/>
        <?php if($this->session->userdata('account_type') == 2 || $this->session->userdata('account_type') == 3 || $this->session->userdata('account_type') == 4 ) {  ?>
        <h3 class="my-4">Statistics</h3>
        <br/>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <canvas id="user-chart" width="800" height="450"></canvas>
            </div>
            <div class="col-md-5">
                <canvas id="proj-chart" width="800" height="450"></canvas>
            </div>
            <div class="col-md-1"></div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-6">
                <canvas id="approve-chart" width="800" height="450"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="approve2-chart" width="800" height="450"></canvas>
            </div>
        </div>
        
        <script>
            new Chart(document.getElementById("user-chart"), {
                type: 'pie',
                data: {
                  labels: ["New Users", "Approved Users"],
                  datasets: [{
                    label: "New Users",
                    backgroundColor: ["#e171c2", "#67afeb"],
                    data: [<?php echo $newuserstotal ?>, <?php echo $approveduserstotal ?>]
                  }]
                },
                options: {
                  title: {
                    display: true,
                    text: 'Total no. of BBOS Users: <?php echo $existinguserstotal ?>'
                  }
                }
            });
            new Chart(document.getElementById("proj-chart"), {
                type: 'doughnut',
                data: {
                  labels: ["Weekly New Project Applications"],
                  datasets: [{
                    label: "New Application",
                    backgroundColor: ["#e171c2"],
                    data: [<?php echo $newprojecttotal ?>]
                  }]
                },
                options: {
                  title: {
                    display: true,
                    text: 'Total no. of Applications Awaiting for Approval (Weekly): <?php echo $newprojecttotal ?>'
                  }
                }
            });
            new Chart(document.getElementById("approve-chart"), {
                type: 'pie',
                data: {
                  labels: ["LMO", "Bio", "Exempt", "Procument", "LMOBM", "Annual / Final", "Export LMO", "Export Exempt", "Incident Exempt", "Minor Bio", "Major Bio", "Occupational"],
                  datasets: [{
                    label: "Pending Applications",
                    backgroundColor: ["#e171c2", "#67afeb", "#354486", "#fa2531", "#acac85", "#b318c4", "#2a9b55", "#88888a", "#621621", "#7fd1ee", "#aab1c1", "#cbc223"],
                    data: [<?php echo $newlmototal ?>, <?php echo $newbiototal ?>, <?php echo $newexempttotal ?>, <?php echo $newproctotal ?>, <?php echo $newnotiftotal ?>, <?php echo $newfinaltotal ?>, <?php echo $newexporttotal ?>, <?php echo $newexempttotal ?>, <?php echo $newincidenttotal ?>, <?php echo $newminortotal ?>, <?php echo $newmajortotal ?>, <?php echo $newocctotal ?>]
                  }]
                },
                options: {
                  title: {
                    display: true,
                    text: 'Total no. of Applications Awaiting for Approval: <?php echo $newlmototal + $newbiototal + $newexempttotal + $newproctotal + $newnotiftotal + $newfinaltotal + $newexporttotal + $newexempttotal + $newincidenttotal + $newminortotal + $newmajortotal + $newocctotal ?>'
                  }
                }
            });
            new Chart(document.getElementById("approve2-chart"), {
                type: 'pie',
                data: {
                  labels: ["LMO", "Bio", "Exempt", "Procument", "LMOBM", "Annual / Final", "Export LMO", "Export Exempt", "Incident Exempt", "Minor Bio", "Major Bio", "Occupational"],
                  datasets: [{
                    label: "Approved Applications",
                    backgroundColor: ["#e171c2", "#67afeb", "#354486", "#fa2531", "#acac85", "#b318c4", "#2a9b55", "#88888a", "#621621", "#7fd1ee", "#aab1c1", "#cbc223"],
                    data: [<?php echo $alllmototal ?>, <?php echo $allbiototal ?>, <?php echo $allexempttotal ?>, <?php echo $allproctotal ?>, <?php echo $allnotiftotal ?>, <?php echo $allfinaltotal ?>, <?php echo $allexporttotal ?>, <?php echo $allexempttotal ?>, <?php echo $allincidenttotal ?>, <?php echo $allminortotal ?>, <?php echo $allmajortotal ?>, <?php echo $allocctotal ?>]
                  }]
                },
                options: {
                  title: {
                    display: true,
                    text: 'Total no. of Approved Applications: <?php echo $allapprovedprojtotal ?>'
                  }
                }
            });
        </script>
        <?php } ?>
        <br/>
    </div>
    <br/>
</body>
</html>
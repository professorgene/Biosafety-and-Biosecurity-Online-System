<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>New Application - Living Modified Organisms</title>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/css/simple-sidebar.css" type="text/css" rel="stylesheet">
    
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
    </style>
    

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Swinburne Sarawak</h3>
            </div>
            
            <ul class="list-unstyled components">
            <p>BBOS</p>
            <li class="active">
                <a href="<?php echo base_url(); ?>index.php/exemptdealingpage">Exempt Dealing</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/exempt">Application For Biosafety Clearance For Use Of Exempt Dealings</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/hirarc">OHS-F-4.5.X HIRARC Form</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/swp">Safe Work Procedure</a>
            </li>
        </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content Insert Here -->
        <div id="content">
            <div class="container-fluid">
                <div>
                    <h4>Exempted Activities</h4>
                </div>
                
                <div class="row">
                    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\3_exemptedactivities\ea1.jpg') ?>" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\3_exemptedactivities\ea2.jpg') ?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\3_exemptedactivities\ea3.jpg') ?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\3_exemptedactivities\ea4.jpg') ?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\3_exemptedactivities\ea5.jpg') ?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\3_exemptedactivities\ea6.jpg') ?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\3_exemptedactivities\ea7.jpg') ?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\3_exemptedactivities\ea8.jpg') ?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\3_exemptedactivities\ea9.jpg') ?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\3_exemptedactivities\ea10.jpg') ?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\3_exemptedactivities\ea11.jpg') ?>" alt="Second slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>				
                </div>
                
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


</body>

</html>
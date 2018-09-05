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

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div>
            
            <ul class="list-unstyled components">
            <p>Dummy Heading</p>
            <li class="active">
                <a href="#">Living Modified Organisms</a>
            </li>
            <li>
                <a href="#">Annex 2</a>
            </li>
            <li>
                <a href="#">Form E</a>
            </li>
            <li>
                <a href="#">PC1</a>
            </li>
            <li>
                <a href="#">PC2</a>
            </li>
            <li>
                <a href="#">OHS - HIRARC</a>
            </li>
            <li>
                <a href="#">Safe Work Procedure</a>
            </li>
        </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content Insert Here -->
        <div id="content">
                <div class="container-fluid">
                    <div>
                        <h4>Announcements</h4>
                    </div>
                    
                    <div>
                        <div class="row">
                            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid" src="<?php echo base_url('assets\images\2_LMO\lmo1.jpg') ?>" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" src="<?php echo base_url('assets\images\2_LMO\lmo2.jpg') ?>" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" src="<?php echo base_url('assets\images\2_LMO\lmo3.jpg') ?>" alt="Third slide">
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
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


</body>

</html>
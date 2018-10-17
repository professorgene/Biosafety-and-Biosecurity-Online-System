<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - Exempt Dealing Page</title>
    
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
    <!-- Navigation -->
    <?php include_once 'template/navbar.php' ?>

    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <br>
			
<div id='breadcrumb1'><?php echo $this->breadcrumbs->show(); ?></div>
		<hr>
	<div class="row" >
	<div class="col-lg-5" >
	
        <div class="row">
            <a href="<?php echo base_url(); ?>index.php/lmo61page">		
                    <div class="option1 card col-md-9 hover1" title="Living Modified Organism (LMO) Form">
                        <h5><span>LIVING MODIFIED ORGANISM (LMO)</span></h5>		
                    </div>				
            </a>
		</div>
        
        <div class="row">
            <a href="<?php echo base_url(); ?>index.php/incidentexemptpage">		
                    <div class="option1 card col-md-9 hover1" title="OHS-F-4.20.X Incident Accident Report Form">
                        <h5><span>EXEMPT DEALING OR BIOHAZARDOUS MATERIAL</span></h5>		
                    </div>				
            </a>
		</div>
        <br/>	
		</div>
		
		<div class="col-lg-7">
			<div>		
				<h4>Announcements</h4>
			</div>				
			<div class="row">
          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
			<div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\7_incidentaccidentreporting\iar1.jpg') ?>" alt="First slide">
			  </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\7_incidentaccidentreporting\iar2.jpg') ?>" alt="Second slide">
			  </div>
                <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\7_incidentaccidentreporting\iar3.jpg') ?>" alt="Second slide">
			  </div>
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
<br/>
</body>
</html>
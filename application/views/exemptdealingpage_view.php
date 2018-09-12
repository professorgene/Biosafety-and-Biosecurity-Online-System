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
            <a href="<?php echo base_url(); ?>index.php/exempt">		
                    <div class="option1 card col-md-9 hover1" title="SBC - Application for Biosafety Clearance for use of Exempt Dealings">
                        <h5><span>APPLICATION FOR BIOSAFETY CLEARANCE FOR USE OF EXEMPT DEALINGS</span></h5>		
                    </div>				
            </a>
		</div>
        
        <div class="row">
            <a href="<?php echo base_url(); ?>index.php/hirarc?type=2">		
                    <div class="option1 card col-md-9 hover1" title="Hazard Identification, Risk Assessment, Risk Control (HIRARC) Form">
                        <h5><span>OHS-F-4.5.X HIRARC FORM</span></h5>		
                    </div>				
            </a>
		</div>
        
        <div class="row">
            <a href="<?php echo base_url(); ?>index.php/swp?type=2">		
                    <div class="option1 card col-md-9 hover1" title="SSBC_001 Safe Work Procedure (SWP)">
                        <h5><span>SAFE WORK PROCEDURE</span></h5>		
                    </div>				
            </a>
		</div>				
		
		</div>
        <br/>
		
		<div class="col-lg-7">
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
	</div>
<br/>
</body>
</html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    
    <title>Swinburne Biosafety and Biosecurity Online System - Living Modified Organism</title>
    
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
            <a href="<?php echo base_url(); ?>index.php/annex2">		
                    <div class="option1 card col-md-9 hover1" title="Annex 2 IBC Assessment of Project Proposal Involving Modern Biotechnology Activities">
                        <h5><span>ANNEX 2</span></h5>		
                    </div>				
            </a>
		</div>		
		
        <div class="row">
            <a href="<?php echo base_url(); ?>index.php/forme">		
                    <div class="option1 card col-md-9 hover1" title="NBB/N/CU/15/FORM E">
                        <h5><span>FORM E</span></h5>		
                    </div>				
            </a>
		</div>
        
        <div class="row">
            <a href="<?php echo base_url(); ?>index.php/pc1">		
                    <div class="option1 card col-md-9 hover1" title="Application for Notifiable Low Risk Dealings (NLRDs) suitable for Physical Containment level 1 (PC1)">
                        <h5><span>SBC - APPLICATION FOR NLRDS SUITABLE FOR PC1</span></h5>	
                    </div>				
            </a>
		</div>
        
        <div class="row">
            <a href="<?php echo base_url(); ?>index.php/pc2">		
                    <div class="option1 card col-md-9 hover1" title="Application for Notifiable Low Risk Dealings (NLRDs) suitable for Physical Containment level 2 (PC2)">
                        <h5><span>SBC - APPLICATION FOR NLRDS SUITABLE FOR PC2</span></h5>	
                    </div>				
            </a>
		</div>
        
        <div class="row">
            <a href="<?php echo base_url(); ?>index.php/hirarc?type=1">		
                    <div class="option1 card col-md-9 hover1" title="OHS-F-4.5.X HIRARC Form - Hazard Identification, Risk Assessment, Risk Control (HIRARC)">
                        <h5><span>OHS-F-4.5.X HIRARC FORM</span></h5>	
                    </div>				
            </a>
		</div>
        
        <div class="row">
            <a href="<?php echo base_url(); ?>index.php/swp?type=1">		
                    <div class="option1 card col-md-9 hover1" title="SSBC_001 Safe Work Procedure (SWP)">
                        <h5><span>SAFE WORK PROCEDURE</span></h5>	
                    </div>				
            </a>
		</div>
        <br/>
    </div>
		
		<div class="col-lg-7">
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
	</div>
        <br/>
</body>
</html>
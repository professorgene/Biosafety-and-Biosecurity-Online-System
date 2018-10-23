<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    
    <title>Swinburne Biosafety and Biosecurity Online System - Application</title>

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
            <a href="<?php echo base_url(); ?>index.php/minorbiopage">		
                    <div class="option1 card col-md-9 hover1" title="New Application">
                        <h5><span>MINOR BIOLOGICAL INCIDENT OR ACCIDENT</span></h5>
                    </div>				
            </a>
		</div>
				
    
        <div class="row">
            <a href="<?php echo base_url(); ?>index.php/majorincidentaccidentreportingpage">		
                    <div class="option1 card col-md-9 hover1" title="Modification of Approved Project">
                        <h5><span>MAJOR BIOLOGICAL INCIDENT OR ACCIDENT</span></h5>				
                    </div>				
                
            </a>
			
		</div>
        
        <div class="row">
            <a href="<?php echo base_url(); ?>index.php/occupationaldiseaseexposurepage">		
                
                    <div class="option1 card col-md-9 hover1" title="Extension/Termination of Approved Project">
                        <h5><span>OCCUPATIONAL DISEASE OR EXPOSURE</span></h5>						
                    </div>	            
            </a>
			
        </div>
        <br/>
	</div>
		
	
	</div>					
	</div>
<br/>
</body>
</html>
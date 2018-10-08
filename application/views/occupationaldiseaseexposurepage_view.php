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
            <a href="<?php echo base_url(); ?>index.php/annex4">		
                    <div class="option1 card col-md-9 hover1" title="Annex 4 Occupational Disease or Exposure Investigation Form">
                        <h5><span>ANNEX 4 OCCUPATIONAL DISEASE OR EXPOSURE INVESTIGATION</span></h5>		
                    </div>				
            </a>
		</div>
        
        <div class="row">
            <a href="<?php echo base_url(); ?>index.php/incidentaccidentreport?type=3">		
                    <div class="option1 card col-md-9 hover1" title="OHS-F-4.20.X Incident Accident Report Form_V3">
                        <h5><span>OHS-F-4.20.X INCIDENT ACCIDENT REPORT</span></h5>		
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
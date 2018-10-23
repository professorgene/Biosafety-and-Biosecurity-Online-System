<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - Biohazardous Material</title>
    
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
            <?php echo form_open('biohazardous_materialpage/index'); ?>
            <br/>
            <legend>New Project</legend>
            <br/>
            <div class="form-group">
                <label for="fullname">Project Name:</label>
                <input class="form-control" id="projname" name="project_name" placeholder="Enter project name here." type="text" value="<?php echo set_value('project_name'); ?>" />
                <span class="text-danger"><?php echo form_error('project_name'); ?></span>
            </div>

            <div class="form-group">
                <label for="email_add">Project Description:</label>
                <textarea rows="5" id="projdesc" name="project_desc" class="form-control" placeholder="Enter project description here." value="<?php echo set_value('project_desc'); ?>"></textarea>
                <span class="text-danger"><?php echo form_error('project_desc'); ?></span>
            </div>
            
            <div class="form-group">
                <label for="type">Project Duration:</label>
                <select class="form-control" id="duration" name="project_duration" >
                    <option value="1">1 Year</option>
                    <option value="2">2 Year</option>
                    <option value="3">5 Year</option>
            </select>
            </div>
            <br/>
            <div class="form-group text-center">
                <span class="col-md-1"></span>
                <button name="submit" type="submit" class="btn btn-success col-md-4">Create</button>
                <span class="col-md-2"></span>
                <button name="cancel" type="reset" class="btn col-md-4">Reset</button>
                <span class="col-md-1"></span>
            </div>
            <?php echo form_close(); ?>
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
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="10"></li>
                
            </ol>
			<div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\4_biohazardousmaterials\bm1.jpg') ?>" alt="First slide">
			  </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\4_biohazardousmaterials\bm2.jpg') ?>" alt="Second slide">
			  </div>
                <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\4_biohazardousmaterials\bm3.jpg') ?>" alt="Second slide">
			  </div>
                <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\4_biohazardousmaterials\bm4.jpg') ?>" alt="Second slide">
			  </div>
                <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\4_biohazardousmaterials\bm5.jpg') ?>" alt="Second slide">
			  </div>
                <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\4_biohazardousmaterials\bm6.jpg') ?>" alt="Second slide">
			  </div>
                <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\4_biohazardousmaterials\bm7.jpg') ?>" alt="Second slide">
			  </div>
                <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\4_biohazardousmaterials\bm8.jpg') ?>" alt="Second slide">
			  </div>
                <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\4_biohazardousmaterials\bm9.jpg') ?>" alt="Second slide">
			  </div>
                <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\4_biohazardousmaterials\bm10.jpg') ?>" alt="Second slide">
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
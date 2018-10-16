<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - Annual or Final Report Page</title>
    
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
        <?php echo form_open('annualfinalreportpage/index'); ?>
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
		<?php if(isset($product_list)) { ?>		
			<div>		
				<?php foreach ($product_list as $list) { ?>
					<div class="card my-4">
						<h5 class="card-header">Announcements</h5>
						<div class="card-body">
						<?php echo $list->announcement_description ?> 
						</div>
					</div>	
				<?php } ?>
			</div>
				<?php if($this->session->userdata('account_type') == 4) {?>
				<a href="<?php echo base_url(); ?>index.php/annualfinalreportpage/edit" class="col-md-3"><button class="btn btn-primary button_right">Edit</button></a>	
				<?php }else{ ?>
				 
				 <?php } ?>
			<?php } else { ?>
				
				 <?php echo form_open('annualfinalreportpage/save_edit') ?>
				 <?php echo form_hidden('announcement_id',$list_product['announcement_id']) ?>

			<div class="card my-4">
								<h5 class="card-header">Announcements Edit</h5>
								<div class="card-body">
								<?php echo form_textarea('announcement_description',$list_product['announcement_description'],array('placeholder'=>'Note','style'=>'width:100%')) ?>  
								</div>
			</div>	


				<a href="<?php echo base_url(); ?>index.php/annualfinalreportpage/save_edit" class="col-md-3"><button class="btn btn-primary button_right">Save</button></a>
				<?php echo form_close(); ?>
			<?php } ?>
		</div>
	</div>					
	</div>
	<br/>
</body>
</html>
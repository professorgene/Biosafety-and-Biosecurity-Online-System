<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">	
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
            <a href="<?php echo base_url(); ?>index.php/newapplicationpage">		
                    <div class="option1 card col-md-9 hover1" title="New Application">
                        <h5><span>NEW APPLICATION</span></h5>
                    </div>				
            </a>
		</div>

        <div class="row">
            <a href="<?php echo base_url(); ?>index.php/history">		
                    <div class="option1 card col-md-9 hover1" title="Modification of Approved Project">
                        <h5><span>MODIFICATION OF APPROVED PROJECT</span></h5>				
                    </div>				
                
            </a>
		</div>
        
        <div class="row">
            <a href="<?php echo base_url(); ?>index.php/annex5">		
                
                    <div class="option1 card col-md-9 hover1" title="Extension/Termination of Approved Project">
                        <h5><span>EXTENSION OR TERMINATION OF APPROVED PROJECT</span></h5>						
                    </div>	            
            </a>
        </div>
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
				<a href="<?php echo base_url(); ?>index.php/applicationpage/edit" class="col-md-3"><button class="btn btn-primary button_right">Edit</button></a>	
				<?php }else{ ?>
				 
				 <?php } ?>
			<?php } else { ?>
				
				 <?php echo form_open('applicationpage/save_edit') ?>
				 <?php echo form_hidden('announcement_id',$list_product['announcement_id']) ?>

			<div class="card my-4">
								<h5 class="card-header">Announcements Edit</h5>
								<div class="card-body">
								<?php echo form_textarea('announcement_description',$list_product['announcement_description'],array('placeholder'=>'Note','style'=>'width:100%')) ?>  
								</div>
			</div>	

				<a href="<?php echo base_url(); ?>index.php/applicationpage/save_edit" class="col-md-3"><button class="btn btn-primary button_right">Save</button></a>	 
				<?php echo form_close(); ?>
			<?php } ?>
		</div>

	</div>
			
 </div>

<br/>
</body>

</html>
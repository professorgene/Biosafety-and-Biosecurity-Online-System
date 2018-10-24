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
            <a href="<?php echo base_url(); ?>index.php/exportingofbioLMOpage">		
                    <div class="option1 card col-md-9 hover1" title="Living Modified Organism (LMO) Form">
                        <h5><span>LIVING MODIFIED ORGANISM (LMO)</span></h5>		
                    </div>				
            </a>
		</div>
        
        <div class="row">
            <a href="<?php echo base_url(); ?>index.php/exportingofbioexemptdealingpage">		
                    <div class="option1 card col-md-9 hover1" title="Exempt Dealing or Biohazardous Material Form">
                        <h5><span>EXEMPT DEALING OR BIOHAZARDOUS MATERIAL</span></h5>		
                    </div>				
            </a>
		</div>
			 <br/>
		</div>
		
		<div class="col-lg-7">
            <h3>Announcements
                <i class="fa fa-plus btn btn-info float-right" onclick="new_announcement()" title="New Announcement"></i>
            </h3>
            <div class="row">
                <div class="col-md-12 text-center">
                    <br/>
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
            </div>
            <?php if(isset($announcement)) {
                    foreach($announcement as $row) {
            ?>
            <div class="card my-4">
                <h5 class="card-header"><?php echo $row->announcement_title ?>
                    <i class="fa fa-times btn btn-danger float-right" onclick="delete_announcement(<?php echo $row->announcement_id; ?>)" title="Remove Announcement"></i>
                </h5>
                <div class="card-body">
                    <p><?php echo $row->announcement_desc ?></p>
                </div>
            </div>
            <?php   }
                } 
            ?>
		</div>
	</div>					
	</div>
    <br/>
    <script>
        <?php # Change the index.php/application/new_announcement/ + "xxx" to in the javascript here to the corresponding page. ?>
        function new_announcement(){
            window.location = "<?php echo base_url(); ?>index.php/exportingbiologicalmaterialpage/new_announcement/" + "exportbiomaterial";
        }
    
        <?php # Change the index.php/xxx/delete_announcement to in the javascript here to the corresponding page. ?>
        function delete_announcement(i){
            var k = confirm("Are you sure?");
            if (k){
                window.location = "<?php echo base_url(); ?>index.php/exportingbiologicalmaterialpage/delete_announcement/" + i;
            }
        }
    </script>
</body>
</html>
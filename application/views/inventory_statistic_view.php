<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - Inventory and Storage Statistics</title>
    
    <style>
        body {
            padding-top: 82px;
        }
        
        .button_right {
            margin-right: 12px;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <?php include_once 'template/navbar.php' ?>
    
    <!-- Page Content -->
    <div class="container">
	<div id='breadcrumb1'><?php echo $this->breadcrumbs->show(); ?></div>
	<hr>
        <div class="text-center row">
            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>index.php/inventory/stats"><button class="btn btn-info button_right" style="display:inline-block;width:225px;">Statistics</button></a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>index.php/inventory/index"><button class="btn btn-info button_right" style="display:inline-block;width:225px;">Inventory Database</button></a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>index.php/inventory/index2"><button class="btn btn-info button_right" style="display:inline-block;width:225px;">Storage Database</button></a>
            </div>
        </div>
        <br/>
        <div class="text-center row">
            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>index.php/inventory/new_inventory"><button class="btn btn-info button_right" style="display:inline-block;width:225px;">New Inventory Application</button></a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>index.php/inventory/new_storage"><button class="btn btn-info button_right" style="display:inline-block;width:225px;">New Storage Application</button></a>
            </div>
        </div>
        <hr/>
        
        
        
        
    </div>
</body>
</html>
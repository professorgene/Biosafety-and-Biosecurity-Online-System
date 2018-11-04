<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - Storage Application</title>
    
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
    
    <?php 
        if (isset($details)) {
            foreach ($details as $detail) {
                $form_id = $detail->storage_id;
                $form_biohazard_id = $detail->biohazard_id;
                $form_biohazard_name = $detail->biohazard_name;
                $form_risk_group = $detail->risk_group;
                $form_location = $detail->location;
                $form_biohazard_source = $detail->biohazard_source;
                $form_date_created = $detail->date_created;
                $form_storage_location = $detail->storage_location;
                $form_keeper_name = $detail->keeper_name;
                $form_log_in_personnel = $detail->log_in_personnel;
            }
        } else {
            $form_id = "";
            $form_biohazard_id = "";
            $form_biohazard_name = "";
            $form_risk_group = "";
            $form_location = "";
            $form_biohazard_source = "";
            $form_date_created = "";
            $form_storage_location = "";
            $form_keeper_name = "";
            $form_log_in_personnel = "";
        }
    ?>
    
    <!-- Page Content -->
    <div class="container">
	<div id='breadcrumb1'><?php echo $this->breadcrumbs->show(); ?></div>
	<hr>
        <div class="text-center row">
            <div class="col-md-1"></div>
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
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>index.php/inventory/new_inventory"><button class="btn btn-info button_right" style="display:inline-block;width:225px;">New Inventory Application</button></a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>index.php/inventory/new_storage"><button class="btn btn-info button_right" style="display:inline-block;width:225px;">New Storage Application</button></a>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10 text-center bg-white">
                <br/>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
            <div class="col-md-1">
            </div>
        </div>
        <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10 bg-white">
                    <?php 
                        if(isset($details)){
                            echo form_open('inventory/edit2/'.$form_id);
                        } else {
                            echo form_open('inventory/new_storage');
                        }
                    ?>
                        
                        <legend>New Storage Application</legend>
                        <br/>
                        <div class="form-group">
                            <label for="biohazardid">ID No.:</label>
                            <input class="form-control" id="biohazardid" name="biohazard_id" placeholder="Enter the ID No. here." type="text" value="<?php echo set_value('biohazard_id', $form_biohazard_id); ?>" />
                            <span class="text-danger"><?php echo form_error('biohazard_id'); ?></span>
                        </div>
                    
                        <div class="form-group">
                            <label for="biohazardname">Name of Biohazardous Material:</label>
                            <input class="form-control" id="biohazardname" name="biohazard_name" placeholder="Enter the biohazard name here." type="text" value="<?php echo set_value('biohazard_name', $form_biohazard_name); ?>" />
                            <span class="text-danger"><?php echo form_error('biohazard_name'); ?></span>
                        </div>
                    
                        <div class="form-group">
                            <label for="riskgroup">Risk Group:</label>
                            <select class="form-control" id="riskgroup" name="risk_group">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                            <span class="text-danger"><?php echo form_error('risk_group'); ?></span>
                        </div>
                    
                        <div class="form-group">
                            <label for="locationname">Location of Collection / Supplier Name:</label>
                            <input class="form-control" id="locationname" name="location" placeholder="Enter location / supplier name here." type="text" value="<?php echo set_value('location', $form_location); ?>" />
                            <span class="text-danger"><?php echo form_error('location'); ?></span>
                        </div>
                    
                        <div class="form-group">
                            <label for="biohazardsource">Source of Biohazardous Material:</label>
                            <input class="form-control" id="biohazardsource" name="biohazard_source" placeholder="Enter the source of biohazardous material here." type="text" value="<?php echo set_value('biohazard_source', $form_biohazard_source); ?>" />
                            <span class="text-danger"><?php echo form_error('biohazard_source'); ?></span>
                        </div>
                    
                        <div class="form-group">
                            <label for="datecreated">Date Created:</label>
                            <input class="form-control" id="datecreated" name="date_created" placeholder="Enter the date here." type="date" value="<?php echo set_value('date_created', $form_date_created); ?>" />
                            <span class="text-danger"><?php echo form_error('date_created'); ?></span>
                        </div>
                    
                        <div class="form-group">
                            <label for="storagelocation">Storage Location:</label>
                            <input class="form-control" id="storagelocation" name="storage_location" placeholder="Enter storage location here." type="text" value="<?php echo set_value('storage_location', $form_storage_location); ?>" />
                            <span class="text-danger"><?php echo form_error('storage_location'); ?></span>
                        </div>
                    
                        <div class="form-group">
                            <label for="keepername">Keeper Name:</label>
                            <input class="form-control" id="keepername" name="keeper_name" placeholder="Enter the keeper's name here." type="text" value="<?php echo set_value('keeper_name', $form_keeper_name); ?>" />
                            <span class="text-danger"><?php echo form_error('keeper_name'); ?></span>
                        </div>
                    
                        <div class="form-group">
                            <label for="loginpersonnel">Log In Personnel:</label>
                            <input class="form-control" id="loginpersonnel" name="log_in_personnel" placeholder="Enter the log in personnel name here." type="text" value="<?php echo set_value('log_in_personnel', $form_log_in_personnel); ?>" />
                            <span class="text-danger"><?php echo form_error('log_in_personnel'); ?></span>
                        </div>

                        <div class="form-group text-center">
                            <span class="col-md-2"></span>
                            <button name="submit" type="submit" class="btn btn-success col-md-3">Submit</button>
                            <span class="col-md-2"></span>
                            <button name="cancel" type="button" onclick="hard_reset()" class="btn col-md-3">Reset</button>
                            <span class="col-md-2"></span>
                        </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="col-md-1">
                </div>
            </div>
        <br/>
    </div>
    
    <script>
        document.getElementById("riskgroup").value = "<?php echo $form_risk_group; ?>";
        
        function hard_reset() {
            document.getElementById("biohazardid").value = "";
            document.getElementById("biohazardname").value = "";
            document.getElementById("riskgroup").value = "";
            document.getElementById("locationname").value = "";
            document.getElementById("biohazardsource").value = "";
            document.getElementById("datecreated").value = "";
            document.getElementById("storagelocation").value = "";
            document.getElementById("keepername").value = "";
            document.getElementById("loginpersonnel").value = "";
        }
        
        $('html').bind('keypress', function(e){
           if(e.keyCode == 13)
           {
              return false;
           }
        });
    </script>
    
</body>
</html>
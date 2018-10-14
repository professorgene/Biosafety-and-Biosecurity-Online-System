<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - Inventory Application</title>
    
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
                $form_id = $detail->inventory_id;
                $form_program = $detail->program;
                $form_program_type = $detail->program_type;
                $form_unit_convenor = $detail->unit_convenor;
                $form_project_investigator = $detail->project_investigator;
                $form_unit_name = $detail->unit_name;
                $form_experiment_title = $detail->experiment_title;
                $form_project_title = $detail->project_title;
                $form_project_reference_no = $detail->project_reference_no;
                $form_biohazard_type = $detail->biohazard_type;
                $form_biohazard_name = $detail->biohazard_name;
                $form_biohazard_id = $detail->biohazard_id;
                $form_date_received = $detail->date_received;
                $form_log_in_personnel = $detail->log_in_personnel;
                $form_keeper_name = $detail->keeper_name;
                $form_remarks = $detail->remarks;
            }
        } else {
            $form_program = "";
            $form_program_type = "Teaching";
            $form_unit_convenor = "";
            $form_project_investigator = "";
            $form_unit_name = "";
            $form_experiment_title = "";
            $form_project_title = "";
            $form_project_reference_no = "";
            $form_biohazard_type = "";
            $form_biohazard_name = "";
            $form_biohazard_id = "";
            $form_date_received = "";
            $form_log_in_personnel = "";
            $form_keeper_name = "";
            $form_remarks = "";
        }
    ?>
    
    <!-- Page Content -->
    <div class="container">
	<div id='breadcrumb1'><?php echo $this->breadcrumbs->show(); ?></div>
	<hr>
        <div class="text-center row">
            <a href="<?php echo base_url(); ?>index.php/inventory/index" class="col-md-3"><button class="btn btn-info button_right" style="display:inline-block;width:225px;">Inventory Database</button></a>
            <a href="<?php echo base_url(); ?>index.php/inventory/index2" class="col-md-3"><button class="btn btn-info button_right" style="display:inline-block;width:225px;">Storage Database</button></a>
            <a href="<?php echo base_url(); ?>index.php/inventory/new_inventory" class="col-md-3"><button class="btn btn-info button_right" style="display:inline-block;width:225px;">New Inventory Application</button></a>
            <a href="<?php echo base_url(); ?>index.php/inventory/new_storage" class="col-md-3"><button class="btn btn-info button_right" style="display:inline-block;width:225px;">New Storage Application</button></a>
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
                            echo form_open('inventory/edit/'.$form_id);
                        } else {
                            echo form_open('inventory/new_inventory');
                        }
                    ?>
                       
                        <legend>New Inventory Application</legend>
                        <br/>
                        <div class="form-group">
                            <label for="programname">Program:</label>
                            <input class="form-control" id="programname" name="program" placeholder="Enter program name here. i.e. Master of Science by Research, Biotechnology, Civil Engineering, Chemical Engineering, etc." type="text" value="<?php echo set_value('program', $form_program); ?>" />
                            <span class="text-danger"><?php echo form_error('program'); ?></span>
                        </div>
                    
                        <div class="form-group">
                            <label for="programtype">Program Type:</label>
                            <select class="form-control" id="programtype" name="program_type" >
                                <option value="Teaching">Teaching</option>
                                <option value="FYP">FYP</option>
                                <option value="Research">Research</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    
                        <div class="row">
                            <div class="form-group col-md-6">
                                <p style="font-size:11px;"><em>* Please fill in the Unit Convenor section if Teaching is selected.</em></p>
                                <label for="unitconvenor">Unit Convenor:</label>
                                <input class="form-control" id="unitconvenor" name="unit_convenor" placeholder="Enter the unit convenor here." type="text" value="<?php echo set_value('unit_convenor', $form_unit_convenor); ?>" />
                            </div>

                            <div class="form-group col-md-6">
                                <p style="font-size:11px;"><em>* Please fill in the Project Investigator section if FYP / Research is selected.</em></p>
                                <label for="projectinvestigator">Project Investigator:</label>
                                <input class="form-control" id="projectinvestigator" name="project_investigator" placeholder="Enter the project investigator here." type="text" value="<?php echo set_value('project_investigator', $form_project_investigator); ?>" />
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="unitname">Unit Name:</label>
                                <input class="form-control" id="unitname" name="unit_name" placeholder="Enter unit name here." type="text" value="<?php echo set_value('unit_name', $form_unit_name); ?>" />
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="projecttitle">Project Title:</label>
                                <input class="form-control" id="projecttitle" name="project_title" placeholder="Enter project title here." type="text" value="<?php echo set_value('project_title', $form_project_title); ?>" />
                                <p style="font-size:11px;"></p>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="experimenttitle">Experiment Title:</label>
                                <input class="form-control" id="experimenttitle" name="experiment_title" placeholder="Enter experiment title here." type="text" value="<?php echo set_value('experiment_title', $form_experiment_title); ?>" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="referenceno">Project Reference No.:</label>
                                <input class="form-control" id="referenceno" name="project_reference_no" placeholder="Enter project reference number here." type="text" value="<?php echo set_value('project_reference_no', $form_project_reference_no); ?>" />
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="biohazardtype">Type of Biohazardous Material:</label>
                            <input class="form-control" id="biohazardtype" name="biohazard_type" placeholder="Enter the biohazard type here." type="text" value="<?php echo set_value('biohazard_type', $form_biohazard_type); ?>" />
                            <span class="text-danger"><?php echo form_error('biohazard_type'); ?></span>
                        </div>
                    
                        <div class="form-group">
                            <label for="biohazardname">Name of Biohazardous Material:</label>
                            <input class="form-control" id="biohazardname" name="biohazard_name" placeholder="Enter the biohazard name here." type="text" value="<?php echo set_value('biohazard_name', $form_biohazard_name); ?>" />
                            <span class="text-danger"><?php echo form_error('biohazard_name'); ?></span>
                        </div>
                    
                        <div class="form-group">
                            <label for="biohazardid">Given ID No.:</label>
                            <input class="form-control" id="biohazardid" name="biohazard_id" placeholder="Enter the biohazard ID here." type="text" value="<?php echo set_value('biohazard_id', $form_biohazard_id); ?>" />
                            <span class="text-danger"><?php echo form_error('biohazard_id'); ?></span>
                        </div>
                    
                        <div class="form-group">
                            <label for="datereceived">Date Received:</label>
                            <input class="form-control" id="datereceived" name="date_received" placeholder="Enter the date here." type="date" value="<?php echo set_value('date_received', $form_date_received); ?>" />
                        </div>
                    
                        <div class="form-group">
                            <label for="loginpersonnel">Log In Personnel:</label>
                            <input class="form-control" id="loginpersonnel" name="log_in_personnel" placeholder="Enter the log in personnel name here." type="text" value="<?php echo set_value('log_in_personnel', $form_log_in_personnel); ?>" />
                            <span class="text-danger"><?php echo form_error('log_in_personnel'); ?></span>
                        </div>
                    
                        <div class="form-group">
                            <label for="keepername">Keeper Name:</label>
                            <input class="form-control" id="keepername" name="keeper_name" placeholder="Enter the keeper's name here." type="text" value="<?php echo set_value('keeper_name', $form_keeper_name); ?>" />
                            <span class="text-danger"><?php echo form_error('keeper_name'); ?></span>
                        </div>
                    
                        <div class="form-group">
                            <label for="remark">Remarks:</label>
                            <input class="form-control" id="remark" name="remarks" placeholder="Enter remarks here, if any." type="text" value="<?php echo set_value('remarks', $form_remarks); ?>" />
                        </div>
                        
                        <div class="form-group text-center">
                            <span class="col-md-2"></span>
                            <button name="submit" type="submit" class="btn btn-success col-md-3">Submit</button>
                            <span class="col-md-2"></span>
                            <button name="cancel" type="reset" class="btn col-md-3">Reset</button>
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
        document.getElementById("programtype").value = "<?php echo $form_program_type; ?>";
    </script>
</body>
</html>
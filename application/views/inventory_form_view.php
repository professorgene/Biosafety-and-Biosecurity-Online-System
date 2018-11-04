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
                $form_biohazard_type_others = $detail->biohazard_type_others;
                $form_biohazard_name = $detail->biohazard_name;
                $form_biohazard_id = $detail->biohazard_id;
                $form_date_received = $detail->date_received;
                $form_log_in_personnel = $detail->log_in_personnel;
                $form_keeper_name = $detail->keeper_name;
                $form_remarks = $detail->remarks;
            }
        } else {
            $form_program = "";
            $form_program_type = "";
            $form_unit_convenor = "";
            $form_project_investigator = "";
            $form_unit_name = "";
            $form_experiment_title = "";
            $form_project_title = "";
            $form_project_reference_no = "";
            $form_biohazard_type = "";
            $form_biohazard_type_others = "";
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
                            echo form_open('inventory/edit/'. $form_id, array('id' => 'myform'));
                        } else {
                            echo form_open('inventory/new_inventory', array('id' => 'myform'));
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
                            <select class="form-control" id="programtype" name="program_type" onchange="program_type_disabled()">
                                <option value="Teaching">Teaching</option>
                                <option value="FYP">FYP</option>
                                <option value="Research">Research</option>
                            </select>
                            <span class="text-danger"><?php echo form_error('program_type'); ?></span>
                        </div>
                    
                        <div class="row">
                            <div class="form-group col-md-6">
                                <!-- <p style="font-size:11px;"><em>* Please fill in the Unit Convenor section if Teaching is selected.</em></p> -->
                                <label for="unitconvenor">Unit Convenor:</label>
                                <input class="form-control" id="unitconvenor" name="unit_convenor" placeholder="Enter the unit convenor here." type="text" value="<?php echo set_value('unit_convenor', $form_unit_convenor); ?>" />
                            </div>

                            <div class="form-group col-md-6">
                                <!-- <p style="font-size:11px;"><em>* Please fill in the Project Investigator section if FYP / Research is selected.</em></p> -->
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
                            <select class="form-control" id="biohazardtype" name="biohazard_type" onchange="bio_type()">
                                <option value="Microorganism (bacteria)">Microorganism (bacteria)</option>
                                <option value="Microorganism (fungi)">Microorganism (fungi)</option>
                                <option value="Microorganism (algae)">Microorganism (algae)</option>
                                <option value="Microorganism (virus)">Microorganism (virus)</option>
                                <option value="Human body tissue">Human body tissue</option>
                                <option value="Blood product">Blood product</option>
                                <option value="Mammalian cell line">Mammalian cell line</option>
                                <option value="Biological toxin">Biological toxin</option>
                                <option value="Others:">Others</option>
                            </select>
                            <br/>
                            <input class="form-control" id="biohazardtypeothers" name="biohazard_type_others" placeholder="Please specify." type="text" value="<?php echo set_value('biohazard_type_others', $form_biohazard_type_others); ?>" required />
                            <span class="text-danger"><?php echo form_error('biohazard_type'); ?></span>
                        </div>
                    
                        <div class="form-group">
                            <label for="biohazardname">Name of Biohazardous Material:</label>
                            <input class="form-control" id="biohazardname" name="biohazard_name" placeholder="Enter the biohazard name here. e.g.: Escherichia coli, Aspergillus niger, epithelial tissue, red blood cells, etc." type="text" value="<?php echo set_value('biohazard_name', $form_biohazard_name); ?>" />
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
                            <label for="keepername">Keeper's Name:</label>
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
        document.getElementById("programtype").value = "<?php echo $form_program_type; ?>";
        program_type_disabled();
        
        document.getElementById("biohazardtype").value = "<?php echo $form_biohazard_type; ?>";
        bio_type();
        
        function program_type_disabled() {
            if (document.getElementById("programtype").value == "Teaching") {
                document.getElementById("unitconvenor").disabled = false;
                document.getElementById("unitname").disabled = false;
                document.getElementById("experimenttitle").disabled = false;
                
                document.getElementById("projectinvestigator").disabled = true;
                document.getElementById("projecttitle").disabled = true;
                document.getElementById("referenceno").disabled = true;
            } else if (document.getElementById("programtype").value == "FYP" || document.getElementById("programtype").value == "Research") {
                document.getElementById("unitconvenor").disabled = true;
                document.getElementById("unitname").disabled = true;
                document.getElementById("experimenttitle").disabled = true;
                
                document.getElementById("projectinvestigator").disabled = false;
                document.getElementById("projecttitle").disabled = false;
                document.getElementById("referenceno").disabled = false;
            } else {
                document.getElementById("unitconvenor").disabled = true;
                document.getElementById("unitname").disabled = true;
                document.getElementById("experimenttitle").disabled = true;
                
                document.getElementById("projectinvestigator").disabled = true;
                document.getElementById("projecttitle").disabled = true;
                document.getElementById("referenceno").disabled = true;
            }
        }
        
        function bio_type() {
            if (document.getElementById("biohazardtype").value == "Others:") {
                document.getElementById("biohazardtypeothers").disabled = false;
            } else {
                document.getElementById("biohazardtypeothers").disabled = true;
            }
        }
        
        function hard_reset() {
            //$("#myform").trigger('reset');
            document.getElementById("programname").value = "";
            document.getElementById("programtype").value = "";
            document.getElementById("unitconvenor").value = "";
            document.getElementById("projectinvestigator").value = "";
            document.getElementById("unitname").value = "";
            document.getElementById("projecttitle").value = "";
            document.getElementById("experimenttitle").value = "";
            document.getElementById("referenceno").value = "";
            document.getElementById("biohazardtype").value = "";
            document.getElementById("biohazardtypeothers").value = "";
            document.getElementById("biohazardname").value = "";
            document.getElementById("biohazardid").value = "";
            document.getElementById("loginpersonnel").value = "";
            document.getElementById("keepername").value = "";
            document.getElementById("remark").value = "";
        }
    </script>
</body>
</html>
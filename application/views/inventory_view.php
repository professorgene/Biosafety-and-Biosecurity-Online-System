<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
	<title>Biosafety and Biosecurity Online System - Inventory</title>
    
    <style>
        body {
            padding-top: 82px;
        }
        
        .button_right {
            margin-right: 12px;
        }
        
        .table {
            background-color: white;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <?php include_once 'template/navbar.php' ?>
    
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
        <input class="form-control" id="searchbar" type="text" placeholder="Search here">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10 text-center">
                <br/>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
            <div class="col-md-1">
            </div>
        </div>
        
        <?php if(isset($inventory)) { ?>
        
        <h5>Inventory Database</h5>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Program</th>
                        <th>Program Type</th>
                        <th>Unit Convenor / Project Investigator</th>
                        <th>Unit Name & Experiment Title</th>
                        <th>Project Title & Project Reference No.</th>
                        <th>Type of Biohazard Material</th>
                        <th>Name of Biohazard Material</th>
                        <th>Given ID No.</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="inventory">
                <?php $i=0; foreach($inventory as $row): ?>
                    <tr class="searchable">
                        <td class="text-center"><?php echo $i = $i+1 ?></td>
                        <td><?php echo $row->program; ?></td>
                        <td><?php echo $row->program_type; ?></td>
                        <td><?php echo $row->unit_convenor . $row->project_investigator; ?></td>
                        <td><?php echo $row->unit_name . " " . $row->experiment_title; ?></td>
                        <td><?php echo $row->project_title . " " . $row->project_reference_no; ?></td>
                        <td><?php echo $row->biohazard_type; ?></td>
                        <td><?php echo $row->biohazard_name; ?></td>
                        <td><?php echo $row->biohazard_id; ?></td>
                        <td class="text-center">
                            <?php if($this->session->userdata('account_id') == $row->account_id || $this->session->userdata('account_type') == 4) { ?>
                            <i class="fa fa-bars btn btn-info" onclick="view_details(<?php echo $row->inventory_id; ?>)" title="Details"></i>
                            <hr/>
                            <i class="fa fa-edit btn btn-warning" onclick="edit_inventory_details(<?php echo $row->inventory_id; ?>)" title="Edit"></i>
                            <hr/>
                            <i class="fa fa-times btn btn-danger" onclick="delete_inventory_details(<?php echo $row->inventory_id; ?>)" title="Remove"></i>
                            <?php } else { ?>
                            <i class="fa fa-bars btn btn-info" onclick="view_details(<?php echo $row->inventory_id; ?>)" title="Details"></i>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr id="tr<?php echo $row->inventory_id; ?>" style="display:none;">
                        <td colspan="10">
                            <p>Date Received: <?php echo $row->date_received; ?></p>
                            <p>Log In Personnel: <?php echo $row->log_in_personnel; ?></p>
                            <p>Keeper Name: <?php echo $row->keeper_name; ?></p>
                            <p>Remarks: <?php echo $row->remarks; ?></p>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <script>
            $(document).ready(function(){
                $("#searchbar").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#inventory .searchable").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
        
        <script>
            function view_details(i){
                if (document.getElementById("tr"+i).style.display == "table-row"){
                    document.getElementById("tr"+i).style.display = "none";
                } else {
                    document.getElementById("tr"+i).style.display = "table-row";
                }
            }
            
            function edit_inventory_details(i){
                window.location = "<?php echo base_url(); ?>index.php/inventory/edit/" + i;
            }

            function delete_inventory_details(i){
                var j = prompt("Reason for Deleting:", "Project Completion, will decontaminate and dispose");
                if (j != null) {
                    window.location = "<?php echo base_url(); ?>index.php/inventory/delete/" + i + "/" + btoa(j);
                }
            }
        </script>
        <?php } else { ?>
        
        <h5>Storage Database</h5>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID No.</th>
                        <th>Name of Biohazardous Material</th>
                        <th>Risk Group</th>
                        <th>Storage Location</th>
                        <th>Keeper Name</th>
                        <th>Log In Personnel</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="storage">
                <?php $i=0; foreach($storage as $row): ?>
                    <tr class="searchable">
                        <td class="text-center"><?php echo $i = $i+1 ?></td>
                        <td><?php echo $row->biohazard_id; ?></td>
                        <td><?php echo $row->biohazard_name; ?></td>
                        <td><?php echo $row->risk_group; ?></td>
                        <td><?php echo $row->storage_location; ?></td>
                        <td><?php echo $row->keeper_name; ?></td>
                        <td><?php echo $row->log_in_personnel; ?></td>
                        <td class="text-center">
                            <?php if($this->session->userdata('account_id') == $row->account_id || $this->session->userdata('account_type') == 4) { ?>
                            <i class="fa fa-bars btn btn-info" onclick="view_details(<?php echo $row->storage_id; ?>)" title="Details"></i>
                            <hr/>
                            <i class="fa fa-edit btn btn-warning" onclick="edit_storage_details(<?php echo $row->storage_id; ?>)" title="Edit"></i>
                            <hr/>
                            <i class="fa fa-times btn btn-danger" onclick="delete_storage_details(<?php echo $row->storage_id; ?>)" title="Remove"></i>
                            <?php } else { ?>
                            <i class="fa fa-bars btn btn-info" onclick="view_details(<?php echo $row->storage_id; ?>)" title="Details"></i>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr id="tr<?php echo $row->storage_id; ?>" style="display:none;">
                        <td colspan="10">
                            <p>Location of Supplier / Company Name: <?php echo $row->location; ?></p>
                            <p>Source of Biohazardous Material: <?php echo $row->biohazard_source; ?></p>
                            <p>Date Created: <?php echo $row->date_created; ?></p>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <script>
            $(document).ready(function(){
                $("#searchbar").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#storage .searchable").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
            
        </script>
        
        <script>
            function view_details(i){
                if (document.getElementById("tr"+i).style.display == "table-row"){
                    document.getElementById("tr"+i).style.display = "none";
                } else {
                    document.getElementById("tr"+i).style.display = "table-row";
                }
            }
            
            function edit_storage_details(i){
                window.location = "<?php echo base_url(); ?>index.php/inventory/edit2/" + i;
            }

            function delete_storage_details(i){
                var j = prompt("Reason for Deleting:", "Project Completion, will decontaminate and dispose");
                if (j != null) {
                    window.location = "<?php echo base_url(); ?>index.php/inventory/delete2/" + i + "/" + btoa(j);
                }
            }
        </script>
        
        <?php } ?>
        <br/>
    </div>
    
</body>
</html>
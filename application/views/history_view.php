<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - Past Applications</title>
    
    <style>
        body {
            padding-top: 82px;
        }
        
        .table {
            background-color: white;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <?php include_once 'template/navbar.php' ?>

    <?php 
        if(!isset($past)) {
            $past = null;
        } 
    ?>
    
    
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading -->
		<div id='breadcrumb1'><?php echo $this->breadcrumbs->show(); ?></div>
		<hr>
        <h5>Submitted or Past Applications</h5>
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

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Project Name</th>
                        <th>Project Description</th>
                        <th>Approval Progress</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="inventory">
                    <?php $i=0; foreach($past as $row): ?>
                    <tr class="searchable">
                        <td class="text-center"><?php echo $i = $i + 1; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['project_desc']; ?></td>
                        <td class="text-center"><?php 
                            if($row['approval'] != 4 || $row['approval'] == null){
                                echo "Awaiting Approval";
                            } else {
                                echo "Approved";
                            }
                            ?>
                        </td>
                        <td class="text-center">
                            <i class="fa fa-bars btn btn-info" onclick="view_application(<?php echo $row['project_id']; ?>')" title="Details"></i>
                            
                            <!--<i class="fa fa-edit btn btn-warning" onclick="location.href='<?php echo site_url().'/history/edit_application/'.$row['project_id'].'/'.$row['type'].'/'.$row['editable']; ?>'" title="Edit"></i>-->
            
                            <i class="fa fa-clock btn btn-primary" onclick="extend_application()" title="Extend"></i>
                            <i class="fa fa-times btn btn-danger" onclick="terminate_application()" title="Terminate"></i>
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
            function view_application(i, j){
                if(j == "ANNEX 2 FORM"){
                    window.location = "<?php echo base_url(); ?>index.php/annex2/load_form?id=" + i;
                } else if (j == "ANNEX 3 FORM"){
                    window.location = "<?php echo base_url(); ?>index.php/annex3/load_form?id=" + i;
                } else if (j == "ANNEX 4 FORM"){
                    window.location = "<?php echo base_url(); ?>index.php/annex4/load_form?id=" + i;
                } else if (j == "ANNEX 5 FORM"){
                    window.location = "<?php echo base_url(); ?>index.php/annex5/load_form?id=" + i;
                } else if (j == "SBC ANNUAL OR FINAL REPORT FOR USE OF BIOHAZARDOUS MATERIALS"){
                    window.location = "<?php echo base_url(); ?>index.php/annualfinalreport/load_form?id=" + i;
                } else if (j == "APPLICATION FOR BIOSAFETY CLEARANCE FORM"){
                    window.location = "<?php echo base_url(); ?>index.php/biohazard/load_form?id=" + i;
                } else if (j == "APPLICATION FOR BIOSAFETY CLEARANCE EXEMPT DEALINGS FORM"){
                    window.location = "<?php echo base_url(); ?>index.php/exempt/load_form?id=" + i;
                } else if (j == "FORM E"){
                    window.location = "<?php echo base_url(); ?>index.php/forme/load_form?id=" + i;
                } else if (j == "FORM F"){
                    window.location = "<?php echo base_url(); ?>index.php/formf/load_form?id=" + i;
                } else if (j == "OHS-F-4.5.X HIRARC FORM"){
                    window.location = "<?php echo base_url(); ?>index.php/hirarc/load_form?id=" + i;
                } else if (j == "OHS-F-4.20.X INCIDENT ACCIDENT REPORT"){
                    window.location = "<?php echo base_url(); ?>index.php/incidentaccidentreport/load_form?id=" + i;
                } else if (j == "SSBC NOTIFICATION OF EXPORTING LMO AND BIOHAZARDOUS MATERIAL"){
                    window.location = "<?php echo base_url(); ?>index.php/notification_of_exporting_biological_material/load_form?id=" + i;
                } else if (j == "NOTIFICATION OF LMO AND BIOHAZARDOUS MATERIAL"){
                    window.location = "<?php echo base_url(); ?>index.php/notification_of_LMO_and_BM/load_form?id=" + i;
                } else if (j == "APPLICATION FOR NLRDS SUITABLE FOR PC1 FORM"){
                    window.location = "<?php echo base_url(); ?>index.php/pc1/load_form?id=" + i;
                } else if (j == "APPLICATION FOR NLRDS SUITABLE FOR PC2 FORM"){
                    window.location = "<?php echo base_url(); ?>index.php/pc2/load_form?id=" + i;
                } else if (j == "OHS-F-4.18.X PRE-PURCHASE MATERIAL RISK ASSESSMENT"){
                    window.location = "<?php echo base_url(); ?>index.php/procurement/load_form?id=" + i;
                } else if (j == "SSBC SAFE WORK PROCEDURE"){
                    window.location = "<?php echo base_url(); ?>index.php/swp/load_form?id=" + i;
                }
            }

            function edit_application(i, j, k){
                if(confirm("You will be submitting an edit request to the corresponding officer. Are you sure?")){
                    window.location = "<?php echo base_url(); ?>index.php/history/edit_application/" + i + "/" + btoa(j) + "/" + k;
                }
            } 

            function extend_application(){
                 window.location = "<?php echo base_url(); ?>index.php/annex5/";
            }

            function terminate_application(){
                 window.location = "<?php echo base_url(); ?>index.php/annex5/";
            }
        </script>
    </div>
</body>
</html>
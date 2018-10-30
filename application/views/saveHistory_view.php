<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - Saved Projects</title>
    
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
        <h5>Saved Project Applications</h5>
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
                            <i class="fa fa-bars btn btn-info" onclick="view_application(<?php echo $row['project_id']; ?>, '<?php echo $row['type']; ?>')" title="View"></i>
                            
                            <i class="fa fa-times btn btn-danger" onclick="delete_application(<?php echo $row['project_id']; ?>, '<?php echo $row['type']; ?>')" title="Remove Project"></i>
                            
            
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
                if(j == "app_lmo"){
                    window.location = "<?php echo base_url(); ?>index.php/lmoproj/load_saved_project?id=" + i;
                    
                }else if(j == "app_bio"){
                    window.location = "<?php echo base_url(); ?>index.php/biohazardproj/load_saved_project?id=" + i;
                    
                }else if(j == "app_exempt"){
                    window.location = "<?php echo base_url(); ?>index.php/exemptproj/load_saved_project?id=" + i;
                    
                }else if(j == "procurement"){
                    window.location = "<?php echo base_url(); ?>index.php/procurementproj/load_saved_project?id=" + i;
                    
                }else if(j == "notifLMOBM"){
                    window.location = "<?php echo base_url(); ?>index.php/notification_of_LMO_and_BM_proj/load_saved_project?id=" + i;
                    
                }else if(j == "anuualfinalreport"){
                    window.location = "<?php echo base_url(); ?>index.php/annualorfinalreportproj/load_saved_project?id=" + i;
                    
                }else if(j == "exportLMO"){
                    window.location = "<?php echo base_url(); ?>index.php/exportingofbioLMOproj/load_saved_project?id=" + i;
                    
                }else if(j == "exportExempt"){
                    window.location = "<?php echo base_url(); ?>index.php/exportingofbioexemptdealingproj/load_saved_project?id=" + i;
                    
                }else if(j == "incidentExempt"){
                    window.location = "<?php echo base_url(); ?>index.php/incidentaccidentreportingpageexemptproj/load_saved_project?id=" + i;
                    
                }else if(j == "minorbio"){
                    window.location = "<?php echo base_url(); ?>index.php/minorbioproj/load_saved_project?id=" + i;
                    
                }else if(j == "majorbio"){
                    window.location = "<?php echo base_url(); ?>index.php/majorincidentaccidentreportingpageproj/load_saved_project?id=" + i;
                    
                }else if(j == "occupational"){
                    window.location = "<?php echo base_url(); ?>index.php/occupationaldiseaseexposurepageproj/load_saved_project?id=" + i;
                    
                }
                
            }
            
            
            function delete_application(i, j){
                if(j == "app_lmo"){
                    window.location = "<?php echo base_url(); ?>index.php/lmoproj/delete_saved_project?id=" + i;
                    
                }else if(j == "app_bio"){
                    window.location = "<?php echo base_url(); ?>index.php/biohazardproj/delete_saved_project?id=" + i;
                    
                }else if(j == "app_exempt"){
                    window.location = "<?php echo base_url(); ?>index.php/exemptproj/delete_saved_project?id=" + i;
                    
                }else if(j == "procurement"){
                    window.location = "<?php echo base_url(); ?>index.php/procurementproj/delete_saved_project?id=" + i;
                    
                }else if(j == "notifLMOBM"){
                    window.location = "<?php echo base_url(); ?>index.php/notification_of_LMO_and_BM_proj/delete_saved_project?id=" + i;
                    
                }else if(j == "anuualfinalreport"){
                    window.location = "<?php echo base_url(); ?>index.php/annualorfinalreportproj/delete_saved_project?id=" + i;
                    
                }else if(j == "exportLMO"){
                    window.location = "<?php echo base_url(); ?>index.php/exportingofbioLMOproj/delete_saved_project?id=" + i;
                    
                }else if(j == "exportExempt"){
                    window.location = "<?php echo base_url(); ?>index.php/exportingofbioexemptdealingproj/delete_saved_project?id=" + i;
                    
                }else if(j == "incidentExempt"){
                    window.location = "<?php echo base_url(); ?>index.php/incidentaccidentreportingpageexemptproj/delete_saved_project?id=" + i;
                    
                }else if(j == "minorbio"){
                    window.location = "<?php echo base_url(); ?>index.php/minorbioproj/delete_saved_project?id=" + i;
                    
                }else if(j == "majorbio"){
                    window.location = "<?php echo base_url(); ?>index.php/majorincidentaccidentreportingpageproj/delete_saved_project?id=" + i;
                    
                }else if(j == "occupational"){
                    window.location = "<?php echo base_url(); ?>index.php/occupationaldiseaseexposurepageproj/delete_saved_project?id=" + i;
                    
                }
                
            }

        </script>
    </div>
</body>
</html>
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
                        <th>Comments</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="inventory">
                    <?php $i=0; foreach($past as $row): ?>
                    <tr class="searchable">
                        <td class="text-center"><?php echo $i = $i + 1; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['project_desc']; ?></td>
                        <td class="text-center">
                            <?php 
                            if($row['approval'] == 0 || $row['approval'] == null || $row['approval'] < 100){
                                echo "Awaiting Approval";
                            } elseif($row['approval'] >= 100 && $row['approval'] <= 109 ) {
                                echo "Rejected";
                            } elseif($row['approval'] == 110) {
                                echo "Approved";
                            }
                            ?>
                        </td>
                        <td><button class="btn btn-primary" onclick="view_comment(<?php echo $row['project_id']; ?>)">View Comments</button></td>
                        <td class="text-center">
                            
                            <i class="fa fa-bars btn btn-info" onclick="view_application(<?php echo $row['project_id']; ?>, '<?php echo $row['type']; ?>')" title="Details"></i>
                            
                            <i class="fa fa-edit btn btn-warning" onclick="location.href='<?php echo site_url().'/history/edit_application/'.$row['project_id'].'/'.$row['type'].'/'.$row['editable']; ?>'" title="Edit"></i>
            
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
            function view_comment(i){
                window.location = "<?php echo base_url(); ?>index.php/comment/view_comments?id=" + i;
            }
            
            function view_application(i, j){
                //check what type of project is it then go to project controller
                if(j == "app_lmo"){
                    
                    window.open("<?php echo base_url(); ?>index.php/lmoproj/load_project/" + i);
                    
                }else if(j == "app_bio"){
                    
                    window.open("<?php echo base_url(); ?>index.php/biohazardproj/load_project/" + i);
                    
                }else if(j == "app_exempt"){
                    
                    window.open("<?php echo base_url(); ?>index.php/exemptproj/load_project/" + i);
                    
                    
                }else if(j == "procurement"){
                    
                    window.open("<?php echo base_url(); ?>index.php/procurementproj/load_project/" + i);
                    
                }else if(j == "notifLMOBM"){
                   
                    window.open("<?php echo base_url(); ?>index.php/notification_of_LMO_and_BM_proj/load_project/" + i);
                    
                }else if(j == "anuualfinalreport"){
                    
                    window.open("<?php echo base_url(); ?>index.php/annualorfinalreportproj/load_project/" + i);
                    
                }else if(j == "exportLMO"){
                    
                    window.open("<?php echo base_url(); ?>index.php/exportingofbioLMOproj/load_project/" + i);
                    
                }else if(j == "exportExempt"){
                    
                    window.open("<?php echo base_url(); ?>index.php/exportingofbioexemptdealingproj/load_project/" + i);
                    
                }else if(j == "minorbio"){
                    
                    window.open("<?php echo base_url(); ?>index.php/minorbioproj/load_project/" + i);
                    
                }else if(j == "majorbio"){
                    
                    window.open("<?php echo base_url(); ?>index.php/majorincidentaccidentreportingpageproj/load_project/" + i);
                    
                }else if(j == "occupational"){
                    window.open("<?php echo base_url(); ?>index.php/occupationaldiseaseexposurepageproj/load_project/" + i);
                    
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
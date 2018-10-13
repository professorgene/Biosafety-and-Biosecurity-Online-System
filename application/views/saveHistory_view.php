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
                            <i class="fa fa-bars btn btn-info" onclick="view_application(<?php echo $row['project_id']; ?>)" title="Details"></i>
                            
                            <!--<i class="fa fa-edit btn btn-warning" onclick="location.href='<?php echo site_url().'/history/edit_application/'.$row['project_id'].'/'.$row['type'].'/'.$row['editable']; ?>'" title="Edit"></i>-->
            
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
            function view_application(i){
                window.location = "<?php echo base_url(); ?>index.php/lmoproj/load_project?id=" + i;
            }

        </script>
    </div>
</body>
</html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
if($this->session->userdata('account_type') != 4 && $this->session->userdata('account_type') != 5 ){
    redirect('home/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Swinburne Biosafety and Biosecurity Online System - Minor Biological Incident or Accident Approval</title>
    
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
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <!-- Navigation -->
    <?php include_once 'template/navbar.php' ?>

    <!-- Page Content -->
    <div class="container">
 
    <div id='breadcrumb1'><?php echo $this->breadcrumbs->show(); ?></div>
        
		<hr>
        <h5>Incident/Accident Reporting for Exempt Dealing or Biohazardous Materials Project Approvals</h5>
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
        
        <!-- Incident Accident Report Forms -->
        <!-- IF current user is BSO, then show applications that have not been approved -->
        <?php if($this->session->userdata('account_type') == 4) { ?>
        <?php if(isset($all_exemptincident)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            Incident Accident Report For Exempt Dealing or Biohazardous Materials
                        </th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Account Email</th>
                        <th>Full Name</th>
                        <th>Project Name</th>
                        <th>Account Type</th>
                        <th>View</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="account">
                <?php $i=0; foreach($all_exemptincident as $row): ?>
                    <tr class="searchable">
                        <td><?php echo $i = $i+1 ?></td>
                        <td><?php echo $row->account_email; ?></td>
                        <td><?php echo $row->account_fullname; ?></td>
                        <td><?php echo $row->project_name; ?></td>
                        <td><?php 
                                        if($row->account_type == 1) {
                                            echo "Applicant / PI";
                                        } elseif($row->account_type == 2) {
                                            echo "SSBC Chair / SSBC Members";
                                        } elseif($row->account_type == 3) {
                                            echo "Students / Postgraduates";
                                        } elseif($row->account_type == 4) {
                                            echo "BSO";
                                        } elseif($row->account_type == 5) {
                                            echo "HSO / Lab Officer";
                                        }
                            ?></td>
                        <td><button type="button" name = 'load' value = 'Load' onclick="load(<?php echo $row->project_id; ?>)" class="btn btn-primary">Load</button></td>
                        
                        <td class="text-center">
                            <i class="btn btn-success fa fa-check" onclick="approve(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"></i>
                            <hr/>
                            <i class="btn btn-danger fa fa-times" onclick="reject(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"></i>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        <?php } ?>
        
        <!-- IF current user is HSO, then show applications that were approved by BSO -->
        <?php if($this->session->userdata('account_type') == 5) { ?>
        <?php if(isset($all_exemptincident_SSBC)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            Incident Accident Report For Exempt Dealing or Biohazardous Materials
                        </th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Account Email</th>
                        <th>Full Name</th>
                        <th>Project Name</th>
                        <th>Account Type</th>
                        <th>View</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="account">
                <?php $i=0; foreach($all_exemptincident_SSBC as $row): ?>
                    <tr class="searchable">
                        <td><?php echo $i = $i+1 ?></td>
                        <td><?php echo $row->account_email; ?></td>
                        <td><?php echo $row->account_fullname; ?></td>
                        <td><?php echo $row->project_name; ?></td>
                        <td><?php 
                                        if($row->account_type == 1) {
                                            echo "Applicant / PI";
                                        } elseif($row->account_type == 2) {
                                            echo "SSBC Chair / SSBC Members";
                                        } elseif($row->account_type == 3) {
                                            echo "Students / Postgraduates";
                                        } elseif($row->account_type == 4) {
                                            echo "BSO";
                                        } elseif($row->account_type == 5) {
                                            echo "HSO / Lab Officer";
                                        }
                            ?></td>
                        <td><button type="button" name = 'load' value = 'Load' onclick="load(<?php echo $row->project_id; ?>)" class="btn btn-primary">Load</button></td>
                        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve2(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject2(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        <?php } ?>
        <!-- End Of Incident Accident Report -->
        
        <br/>
    </div>
    
    <script>
        $(document).ready(function(){
            $("#searchbar").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#account .searchable").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    
    <script>
        function load(i){
            window.open("<?php echo base_url(); ?>index.php/incidentaccidentreportingpageexemptproj/load_project/" + i);
        }
        
        function approve(i,k){
            
            window.open("<?php echo base_url(); ?>index.php/comment/index/" + i + "/" + k );
            
            var x = confirm("Please fill in the comments, if any, in the new window before selecting OK.");
            if (x) {
                window.location = "<?php echo base_url(); ?>index.php/incidentaccident_exempt/approve/" + i + "/" + k;
            }
        }
        
        function reject(i,k){
            
            
            window.open("<?php echo base_url(); ?>index.php/comment/index/" + i + "/" + k );
            
            var x = confirm("Please fill in the comments, if any, in the new window before selecting OK.");
            if (x) {
                window.location = "<?php echo base_url(); ?>index.php/incidentaccident_exempt/reject/" + i + "/" + k;
            }
            
        }
    </script>
    
    <script>
        function approve2(i,k){
            
            window.open("<?php echo base_url(); ?>index.php/comment/load_comments/" + i + "/" + k );
            
            var x = confirm("Please fill in the comments, if any, in the new window before selecting OK.");
            if (x) {
                window.location = "<?php echo base_url(); ?>index.php/incidentaccident_exempt/approve2/" + i + "/" + k;
            }
        }
        
        function reject2(i,k){
                
            window.open("<?php echo base_url(); ?>index.php/comment/load_comments/" + i + "/" + k );
            
            var x = confirm("Please fill in the comments, if any, in the new window before selecting OK.");
            if (x) {
                window.location = "<?php echo base_url(); ?>index.php/incidentaccident_exempt/reject2/" + i + "/" + k;
            }
            
        }
    </script>
</body>
</html>
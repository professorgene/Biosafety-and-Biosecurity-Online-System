<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
if($this->session->userdata('account_type') != 2 && $this->session->userdata('account_type') != 3 && $this->session->userdata('account_type') != 4 ){
    redirect('home/index');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - Annual or Final Report Approval</title>
    
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

    <!-- Page Content -->
    <div class="container">
		<div id='breadcrumb1'><?php echo $this->breadcrumbs->show(); ?></div>
		<hr>
        <h5>Annual or Final Report Project Approvals</h5>
        <br/>
        <input class="form-control" id="searchbar" type="text" placeholder="Search here">
        <br/>
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
        
        <!-- Annual or Final Report Forms -->
        <!-- IF current user is BSO, then show applications that have not been approved -->
        <?php if($this->session->userdata('account_type') == 4) { ?>
        <?php if(isset($all_annual_proj)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            Annual Final Report Approvals
                        </th>
                    </tr>
                    <tr>
                        <th>No.</th>
                        <th>Account Email</th>
                        <th>Full Name</th>
                        <th>Project Name</th>
                        <th>Account Type</th>
                        <th>View Form</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody id="account">
                <?php $i=0; foreach($all_annual_proj as $row): ?>
                    <tr class="searchable">
                        <td><?php echo $i = $i+1 ?></td>
                        <td><?php echo $row->account_email; ?></td>
                        <td><?php echo $row->account_fullname; ?></td>
                        <td><?php echo $row->project_name; ?></td>
                        <td><?php 
                                        if($row->account_type == 1) {
                                            echo "Applicant / PI";
                                        } elseif($row->account_type == 2) {
                                            echo "SSBC Chair";
                                        } elseif($row->account_type == 3) {
                                            echo "SSBC Members";
                                        } elseif($row->account_type == 4) {
                                            echo "BSO";
                                        } elseif($row->account_type == 5) {
                                            echo "HSO / Lab Officer";
                                        }
                            ?></td>
                        <td><button type="button" name = 'load' value = 'Load' onclick="location.href='<?php echo site_url().'/annualorfinalreportproj/load_project?id='.$row->project_id;?>'" class="btn btn-primary">Load</button></td>
                        
                        <?php if($row->project_approval == 0 ) { ?>
                        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>, <?php echo $row->project_type; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                        
                        <?php }elseif($row->project_approval == 56 ) { ?>
                        <td id="annex2_issue" class="text-center">
                                <button class="btn btn-success" onclick="BSO_approve(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="There's issue">Yes</button>
                                <hr>
                                <button class="btn btn-danger" onclick="annex2_show()" title="No Issue">No</button>
                        </td>
                        <!-- If No Issue -->
                        <td id="annex2_Chair" style="display:none;" class="text-center">
                            <button class="btn btn-success" onclick="BSO_final_approve(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="BSO_final_approve(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                        <?php } ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        <?php } ?>
        
        <!-- IF current user is SSBC Members, then show applications that BSO thinks has major issues -->
        <?php if($this->session->userdata('account_type') == 3) { ?>
        <?php if(isset($all_annual_SSBC_proj)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                         <th colspan="7">
                            Annual Final Report Approvals
                        </th>
                    </tr>
                    <tr>
                        <th>No.</th>
                        <th>Account Email</th>
                        <th>Full Name</th>
                        <th>Project Name</th>
                        <th>Account Type</th>
                        <th>View Form</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="account">
                <?php $i=0; foreach($all_annual_SSBC_proj as $row): ?>
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
                        <td><button type="button" name = 'load' value = 'Load' onclick="location.href='<?php echo site_url().'/annualorfinalreportproj/load_project?id='.$row->project_id;?>'" class="btn btn-primary">Load</button></td>
                        
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
        
        <!-- IF current user is SSBC Chair, then show applications that were approved by SSBC memebers -->
        <?php if($this->session->userdata('account_type') == 2) { ?>
        <?php if(isset($all_annual_Chair_proj)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                         <th colspan="7">
                            Annual Final Report Approvals
                        </th>
                    </tr>
                    <tr>
                        <th>No.</th>
                        <th>Account Email</th>
                        <th>Full Name</th>
                        <th>Project Name</th>
                        <th>Account Type</th>
                        <th>View Form</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="account">
                <?php $i=0; foreach($all_annual_Chair_proj as $row): ?>
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
                        <td><button type="button" name = 'load' value = 'Load' onclick="location.href='<?php echo site_url().'/annualorfinalreportproj/load_project?id='.$row->project_id;?>'" class="btn btn-primary">Load</button></td>
                        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="final_approve(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="final_reject(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        <?php } ?>
        <!-- End Of Annual or Final Report Form -->

        
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
    
    <!-- Annual & Final Report Approval and Reject Function -->
    <script>
        function approve(i,k){
            window.open("<?php echo base_url(); ?>index.php/comment/index/" + i + "/" + k );
            
            var x = confirm("Please fill in the comments, if any, in the new window before selecting OK.");
            if (x) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/approve/" + i + "/" + k;
            }
            
        }
        
        function reject(i,k){
            
            window.open("<?php echo base_url(); ?>index.php/comment/index/" + i + "/" + k );
            
            var x = confirm("Please fill in the comments, if any, in the new window before selecting OK.");
            if (x) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/reject/" + i + "/" + k;
            }
            
        }
    </script>
    
    <script> 
        function BSO_approve(i,k){
            window.open("<?php echo base_url(); ?>index.php/comment/load_comments/" + i + "/" + k );
            
            var x = confirm("Please fill in the comments, if any, in the new window before selecting OK.");
            if (x) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/BSO_approve/" + i + "/" + k;
            }
            
        }
        
        function annex2_show(){
        
            var v = document.getElementById("annex2_issue");
            v.style.display = "none";
            
            var x = document.getElementById("annex2_Chair");
            x.style.display = "block";
        }
        
        
        function final_approve(i,k){
            window.open("<?php echo base_url(); ?>index.php/comment/load_comments/" + i + "/" + k );
            
            var x = confirm("Please fill in the comments, if any, in the new window before selecting OK.");
            if (x) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/final_approve/" + i + "/" + k;
            }
            
        }
        
        function final_reject(i,k){
            
            window.open("<?php echo base_url(); ?>index.php/comment/load_comments/" + i + "/" + k );
            
            var x = confirm("Please fill in the comments, if any, in the new window before selecting OK.");
            if (x) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/final_reject/" + i + "/" + k;
            }
            
        }
        
        function BSO_final_approve(i,k){
            window.open("<?php echo base_url(); ?>index.php/comment/load_comments/" + i + "/" + k );
            
            var x = confirm("Please fill in the comments, if any, in the new window before selecting OK.");
            if (x) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/BSO_final_approve/" + i + "/" + k;
            }
            
        }
        
        function BSO_final_reject(i,k){
            
            window.open("<?php echo base_url(); ?>index.php/comment/load_comments/" + i + "/" + k );
            
            var x = confirm("Please fill in the comments, if any, in the new window before selecting OK.");
            if (x) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/BSO_final_reject/" + i + "/" + k;
            }
            
        }
    </script>
    
    <script>
        function approve2(i,k){
            window.open("<?php echo base_url(); ?>index.php/comment/load_comments/" + i + "/" + k );
            
            var x = confirm("Please fill in the comments, if any, in the new window before selecting OK.");
            if (x) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/approve2/" + i + "/" + k;
            }
        }
        
        function reject2(i,k){
            window.open("<?php echo base_url(); ?>index.php/comment/load_comments/" + i + "/" + k );
            
            var x = confirm("Please fill in the comments, if any, in the new window before selecting OK.");
            if (x) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/rejct2/" + i + "/" + k;
            }
            
        }
    </script>
    
    
</body>
</html>
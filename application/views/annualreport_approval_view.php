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
                        <th id="proceed1">Proceed/Ammend</th>
                        <th id="issue" style="display:none;">Major Issues</th>
                        <th id="approval" style="display:none;">Approval</th>
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
                        
                        
                        <td id="proceed2" class="text-center">
                            <button class="btn btn-success" onclick="proceed(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Proceed"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="ammend(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Ammend"><i class="fa fa-times"></i></button>
                        </td>
                        <td id="issuecell" style="display:none;">
                            <button class="btn btn-success" onclick="approve(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve">Yes</button>
                            <hr/>
                            <button class="btn btn-danger" onclick="show_approval()" title="Reject">No</button>
                        </td>
                        <td id="approval_cell" style="display:none;">
                            <button class="btn btn-success" onclick="approve_BSO(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve">Yes</button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject">No</button>
                        </td>
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
                        <th id="proceed1">Proceed/Ammend</th>
                        <th id="issue" style="display:none;">Major Issues</th>
                        <th id="approval" style="display:none;">Approval</th>
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
                        <th id="proceed1">Proceed/Ammend</th>
                        <th id="issue" style="display:none;">Major Issues</th>
                        <th id="approval" style="display:none;">Approval</th>
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
                            <button class="btn btn-success" onclick="approve3(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject3(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
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
        function proceed(i,k){
            //window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/proceed/" + i;
            
            var u = document.getElementById("issue");
            u.style.display = "block";
            var v = document.getElementById("issuecell");
            v.style.display = "block";
            
            var w = document.getElementById("proceed1");
            w.style.display = "none";
            var x = document.getElementById("proceed2");
            x.style.display = "none";
        }
        
        function ammend(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/ammend/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function show_approval(){
            var u = document.getElementById("issue");
            u.style.display = "none";
            var v = document.getElementById("issuecell");
            v.style.display = "none";
            
            var w = document.getElementById("approval");
            w.style.display = "block";
            var x = document.getElementById("approval_cell");
            x.style.display = "block";
        }
        
        function approve(i,k){
            window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/approve/" + i + "/" + k;
        }
        
        function approve_BSO(i,k){
            window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/approve_BSO/" + i + "/" + k;
        }
        
        function reject(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/reject/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function approve2(i,k){
            window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/approve2/" + i + "/" + k;
        }
        
        function reject2(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/reject2/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function approve3(i,k){
            window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/approve3/" + i + "/" + k;
        }
        
        function reject3(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/reject3/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    
</body>
</html>
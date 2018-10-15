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
    <title>Swinburne Biosafety and Biosecurity Online System - Application Approval</title>
    
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
        <h5>Application for Biohazardous Materials Project Approvals</h5>
        <br/>
        <input class="form-control" id="searchbar" type="text" placeholder="Search here">
        <br/>
        
        <!-- Biohazard Materials Forms -->
        <!-- IF current user is BSO, then show applications that have not been approved -->
        <?php if($this->session->userdata('account_type') == 4) { ?>
        <?php if(isset($all_bm_proj)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            New Application For Biohazardous Materials Project
                        </th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Account Email</th>
                        <th>Full Name</th>
                        <th>Project Name</th>
                        <th>Account Type</th>
                        <th>View Form</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="account">
                <?php $i=0; foreach($all_bm_proj as $row): ?>
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
                        <td><button type="button" name = 'biohazard_load' value = 'Load' onclick="location.href='<?php echo site_url().'/biohazardproj/load_project?id='.$row->project_id;?>'" class="btn btn-primary">Load</button></td>
                        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        <?php } ?>
        
        <!-- IF current user is SSBC Chair, then show applications that were approved by BSO/SSBC members -->
        <?php if($this->session->userdata('account_type') == 2) { ?>
        <?php if(isset($all_bm_proj_Chair)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            New Application For Biohazardous Materials Project
                        </th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Account Email</th>
                        <th>Full Name</th>
                        <th>Project Name</th>
                        <th>Account Type</th>
                        <th>View Form</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="account">
                <?php $i=0; foreach($all_bm_proj_Chair as $row): ?>
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
                        <td><button type="button" name = 'biohazard_load' value = 'Load' onclick="location.href='<?php echo site_url().'/biohazardproj/load_project?id='.$row->project_id;?>'" class="btn btn-primary">Load</button></td>
                        
                        <?php if($row->project_approval == 1 ) { ?>
                        <td id="biohazard_issue" class="text-center">
                                <button class="btn btn-success" onclick="Chair_approve(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="There's issue">Yes</button>
                                <hr>
                                <button class="btn btn-danger" onclick="biohazard_show()" title="No Issue">No</button>
                        </td>
                        <td id="biohazard_Chair" style="display:none;" class="text-center">
                            <button class="btn btn-success" onclick="final_approve(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="final_reject(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                        <?php }elseif($row->project_approval == 3 ){ ?>
                        <td  class="text-center">
                            <button class="btn btn-success" onclick="final_approve(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="final_reject(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                        <?php } ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        <?php } ?>
        
        <!-- IF current user is SSBC Members, then show applications that Chair thinks has major issues. -->
        <?php if($this->session->userdata('account_type') == 3) { ?>
        <?php if(isset($all_bm_proj_SSBC)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            New Application For Biohazardous Materials Project
                        </th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Account Email</th>
                        <th>Full Name</th>
                        <th>Project Name</th>
                        <th>Account Type</th>
                        <th>View Form</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="account">
                <?php $i=0; foreach($all_bm_proj_SSBC as $row): ?>
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
                        <td><button type="button" name = 'biohazard_load' value = 'Load' onclick="location.href='<?php echo site_url().'/biohazardproj/load_project?id='.$row->project_id;?>'" class="btn btn-primary">Load</button></td>
                        
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
        <!-- End Of Biohazard Material Form -->
        
        
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
    
    <!-- Biohazard Approval and Reject Function -->
    <script>
        function approve(i,k){
            window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/approve/" + i + "/" + k;
        }
        
        function reject(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/reject/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function Chair_approve(i,k){
            window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/Chair_approve/" + i + "/" + k;
        }
        
        function biohazard_show(){
            
            var v = document.getElementById("biohazard_issue");
            v.style.display = "none";
            
            var x = document.getElementById("biohazard_Chair");
            x.style.display = "block";
        }
        
        function Chair_disapprove(i,k){
            window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/Chair_disapprove/" + i + "/" + k;
        }
        
        function final_approve(i,k){
            window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/final_approve/" + i + "/" + k;
        }
        
        function final_reject(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/final_reject/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function approve2(i,k){
            window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/approve2/" + i + "/" + k;
        }
        
        function reject2(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/reject2/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <!-- HIRARC Approval and Reject Function -->
    <script>
        function approve_hirarc(i,k){
            window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/approve_hirarc/" + i + "/" + k;
        }
        
        function reject_hirarc(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/reject_hirarc/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function hirarc3_show(){
            
            var v = document.getElementById("hirarc3_issue");
            v.style.display = "none";
            
    
            var x = document.getElementById("hirarc3_proceed");
            x.style.display = "block";
        }
        
        function Chair_approve_hirarc(i,k){
            window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/Chair_approve_hirarc/" + i + "/" + k;
        }
        
        
        function Chair_disapprove_hirarc(i,k){
            window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/Chair_disapprove_hirarc/" + i + "/" + k;
        }
        
        function final_approve_hirarc(i,k){
            window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/final_approve_hirarc/" + i + "/" + k;
        }
        
        function final_reject_hirarc(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/final_reject_hirarc/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function approve_hirarc2(i,k){
            window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/approve_hirarc2/" + i + "/" + k;
        }
        
        function reject_hirarc2(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/reject_hirarc2/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    <!-- END of HIRARC -->
    
    <!-- SWP Approval and Reject Function -->
    <script>
        function approve_swp(i,k){
            window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/approve_swp/" + i + "/" + k;
        }
        
        function reject_swp(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/reject_swp/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function swp3_show(){

            var v = document.getElementById("swp3_issue");
            v.style.display = "none";
            
            
            var x = document.getElementById("swp3_proceed");
            x.style.display = "block";
        }
        
        function Chair_approve_swp(i,k){
            window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/Chair_approve_swp/" + i + "/" + k;
        }
        
        
        function final_approve_swp(i,k){
            window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/final_approve_swp/" + i + "/" + k;
        }
        
        function final_reject_swp(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/final_reject_swp/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function approve_swp_2(i,k){
            window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/approve_swp_2/" + i + "/" + k;
        }
        
        function reject_swp_2(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/biohazard_approval/reject_swp_2/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    <!-- End Of Swp -->
    
</body>
</html>
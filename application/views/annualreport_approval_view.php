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
        <h5>Annual or Final Report Form Approvals</h5>
        <br/>
        <input class="form-control" id="searchbar" type="text" placeholder="Search here">
        <br/>
        
        <!-- Annual or Final Report Forms -->
        <!-- IF current user is BSO, then show applications that have not been approved -->
        <?php if($this->session->userdata('account_type') == 4) { ?>
        <?php if(isset($all_annual)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Annual Final Report Forms
                        </th>
                    </tr>
                    <tr>
                        <th>No.</th>
                        <th>Account Email</th>
                        <th>Full Name</th>
                        <th>Account Type</th>
                        <th>View Form</th>
                        <th id="proceed1">Proceed/Ammend</th>
                        <th id="issue" style="display:none;">Major Issues</th>
                        <th id="approval" style="display:none;">Approval</th>
                    </tr>
                </thead>
                <tbody id="account">
                <?php $i=0; foreach($all_annual as $row): ?>
                    <tr class="searchable">
                        <td><?php echo $i = $i+1 ?></td>
                        <td><?php echo $row->account_email; ?></td>
                        <td><?php echo $row->account_fullname; ?></td>
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
                        <td><button type="button" name = 'annual_load' value = 'Load' onclick="location.href='<?php echo site_url().'/annualfinalreport/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td id="proceed2" class="text-center">
                            <button class="btn btn-success" onclick="proceed(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Proceed"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="ammend(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Ammend"><i class="fa fa-times"></i></button>
                        </td>
                        <td id="issuecell" style="display:none;">
                            <button class="btn btn-success" onclick="approve(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve">Yes</button>
                            <hr/>
                            <button class="btn btn-danger" onclick="show_approval()" title="Reject">No</button>
                        </td>
                        <td id="approval_cell" style="display:none;">
                            <button class="btn btn-success" onclick="approve_BSO(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve">Yes</button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject">No</button>
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
        <?php if(isset($all_annual_SSBC)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Annual Final Report Forms
                        </th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>Account Email</th>
                        <th>Full Name</th>
                        <th>Account Type</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="account">
                <?php $i=0; foreach($all_annual_SSBC as $row): ?>
                    <tr class="searchable">
                        <td><?php echo $i = $i+1 ?></td>
                        <td><?php echo $row->account_email; ?></td>
                        <td><?php echo $row->account_fullname; ?></td>
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
                        <td><button type="button" name = 'annual_load' value = 'Load' onclick="location.href='<?php echo site_url().'/annualfinalreport/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve2(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject2(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
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
        <?php if(isset($all_annual_Chair)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Annual Final Report Forms
                        </th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>Account Email</th>
                        <th>Full Name</th>
                        <th>Account Type</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="account">
                <?php $i=0; foreach($all_annual_Chair as $row): ?>
                    <tr class="searchable">
                        <td><?php echo $i = $i+1 ?></td>
                        <td><?php echo $row->account_email; ?></td>
                        <td><?php echo $row->account_fullname; ?></td>
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
                        <td><button type="button" name = 'annual_load' value = 'Load' onclick="location.href='<?php echo site_url().'/annualfinalreport/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve3(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject3(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
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
    
    <!-- HIRARC Approval and Reject Function -->
    <!--
    <script>
        function hirarc_proceed(i){
            
            var u = document.getElementById("hirarc_issue");
            u.style.display = "block";
            var v = document.getElementById("hirarc_issuecell");
            v.style.display = "block";
            
            var w = document.getElementById("hirarc_proceed");
            w.style.display = "none";
            var x = document.getElementById("hirarc_proceed2");
            x.style.display = "none";
        }
        
        function hirarc_ammend(i){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/hirarc_ammend/" + i + "/" + btoa(j);
            }
        }
        
        function hirarc_show_approval(){
            var u = document.getElementById("hirarc_issue");
            u.style.display = "none";
            var v = document.getElementById("hirarc_issuecell");
            v.style.display = "none";
            
            var w = document.getElementById("hirarc_approval");
            w.style.display = "block";
            var x = document.getElementById("hirarc_approval_cell");
            x.style.display = "block";
        }
        
        function approve_hirarc(i){
            window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/approve_hirarc/" + i;
        }
        
        function hirarc_approve_BSO(i){
            window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/hirarc_approve_BSO/" + i;
        }
        
        function reject_hirarc(i){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/reject_hirarc/" + i + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function approve_hirarc2(i){
            window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/approve_hirarc2/" + i;
        }
        
        function reject_hirarc2(i){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/reject_hirarc2/" + i + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function approve_hirarc3(i){
            window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/approve_hirarc3/" + i;
        }
        
        function reject_hirarc3(i){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/reject_hirarc3/" + i + "/" + btoa(j);
            }
        }
    </script>
-->
    <!-- END of HIRARC -->
    
    <!-- SWP Approval and Reject Function -->
    <!--
    <script>
        function swp_proceed(i){
            
            var u = document.getElementById("swp_issue");
            u.style.display = "block";
            var v = document.getElementById("swp_issuecell");
            v.style.display = "block";
            
            var w = document.getElementById("swp_proceed");
            w.style.display = "none";
            var x = document.getElementById("swp_proceed2");
            x.style.display = "none";
        }
        
        function swp_ammend(i){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/swp_ammend/" + i + "/" + btoa(j);
            }
        }
        
        function swp_show_approval(){
            var u = document.getElementById("swp_issue");
            u.style.display = "none";
            var v = document.getElementById("swp_issuecell");
            v.style.display = "none";
            
            var w = document.getElementById("swp_approval");
            w.style.display = "block";
            var x = document.getElementById("swp_approval_cell");
            x.style.display = "block";
        }
        
        function approve_swp(i){
            window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/approve_swp/" + i;
        }
        
        function swp_approve_BSO(i){
            window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/swp_approve_BSO/" + i;
        }
        
        function reject_swp(i){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/reject_swp/" + i + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function approve_swp_2(i){
            window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/approve_swp_2/" + i;
        }
        
        function reject_swp_2(i){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/reject_swp_2/" + i + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function approve_swp_3(i){
            window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/approve_swp_3/" + i;
        }
        
        function reject_swp_3(i){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/annualreport_approval/reject_swp_3/" + i + "/" + btoa(j);
            }
        }
    </script>
-->
    <!-- END of SWP -->
    
</body>
</html>
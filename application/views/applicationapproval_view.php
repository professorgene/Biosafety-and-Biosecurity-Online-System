<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
if($this->session->userdata('account_type') != 2 && $this->session->userdata('account_type') != 3 && $this->session->userdata('account_type') != 4 && $this->session->userdata('account_type') != 5 && $this->session->userdata('account_type') != 6 ){
    redirect('home/index');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - NEW Application Approval</title>
    
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
        <h5>Application Approvals</h5>
        <br/>
        <input class="form-control" id="searchbar" type="text" placeholder="Search here">
        <br/>
        
        <!-- New Application LMO Projects -->
        <!-- IF current user is BSO, then show projects that have not been approved -->
        <?php if($this->session->userdata('account_type') == 4) { ?>
        <?php if(isset($all_lmoproj)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            New Application For Living Modified Organisms
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
                <?php $i=0; foreach($all_lmoproj as $row): ?>
                    <tr class="searchable">
                        <td><?php echo $i = $i+1 ?></td>
                        <td><?php echo $row->account_email; ?></td>
                        <td><?php echo $row->account_fullname; ?></td>
                        <td><?php echo $row->project_name; ?></td>
                        <td><?php 
                                        if($row->account_type == 1) {
                                            echo "Applicant / Project Investigator";
                                        } elseif($row->account_type == 2) {
                                            echo "SSBC Chair";
                                        } elseif($row->account_type == 3) {
                                            echo "SSBC Members";
                                        } elseif($row->account_type == 4) {
                                            echo "Biosafety Officer";
                                        } elseif($row->account_type == 5) {
                                            echo "Health and Safety Officer";
                                        } elseif($row->account_type == 6) {
                                            echo "Lab Officer";
                                        } elseif($row->account_type == 7) {
                                            echo "Student & Postgraduate";
                                        }
                            ?></td>
                        <td><button type="button" name = 'load' value = 'Load' onclick="location.href='<?php echo site_url().'/lmoproj/load_project?id='.$row->project_id;?>'" class="btn btn-primary">Load</button></td>
                        
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
        
        <!-- IF current user is SSBC Chair, then show applications that were approved by BSO -->
        <?php if($this->session->userdata('account_type') == 2) { ?>
        <?php if(isset($all_lmoproj_Chair)) { ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            New Application For Living Modified Organisms
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
                    <?php $i=0; foreach($all_lmoproj_Chair as $row): ?>
                    <tr class="searchable">
                        <td><?php echo $i = $i+1 ?></td>
                        <td><?php echo $row->account_email; ?></td>
                        <td><?php echo $row->account_fullname; ?></td>
                        <td><?php echo $row->project_name; ?></td>
                        <td><?php 
                                        if($row->account_type == 1) {
                                            echo "Applicant / Project Investigator";
                                        } elseif($row->account_type == 2) {
                                            echo "SSBC Chair";
                                        } elseif($row->account_type == 3) {
                                            echo "SSBC Members";
                                        } elseif($row->account_type == 4) {
                                            echo "Biosafety Officer";
                                        } elseif($row->account_type == 5) {
                                            echo "Health and Safety Officer";
                                        } elseif($row->account_type == 6) {
                                            echo "Lab Officer";
                                        } elseif($row->account_type == 7) {
                                            echo "Student & Postgraduate";
                                        }
                            ?></td>
                        <td><button type="button" name = 'load' value = 'Load' onclick="location.href='<?php echo site_url().'/lmoproj/load_project?id='.$row->project_id;?>'" class="btn btn-primary">Load</button></td>
                        
                        <?php if($row->project_approval == 1 ) { ?>
                        <td id="annex2_issue" class="text-center">
                                <button class="btn btn-success" onclick="Chair_approve(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="There's issue">Yes</button>
                                <hr>
                                <button class="btn btn-danger" onclick="annex2_show()" title="No Issue">No</button>
                        </td>
                        <td id="annex2_Chair" style="display:none;" class="text-center">
                            <button class="btn btn-success" onclick="final_approve(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="final_reject(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                        <?php }elseif($row->project_approval == 3 ){ ?>
                        <td class="text-center">
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
        
        <!-- IF current user is SSBC Member, then show applications that SSBC Chair thinks has major issues -->
        <?php if($this->session->userdata('account_type') == 3) { ?>
        <?php if(isset($all_lmoproj_SSBC)) { ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            New Application For Living Modified Organisms
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
                    <tr class="searchable">
                        <?php $i=0; foreach($all_lmoproj_SSBC as $row): ?>
                        <td><?php echo $i = $i+1 ?></td>
                        <td><?php echo $row->account_email; ?></td>
                        <td><?php echo $row->account_fullname; ?></td>
                        <td><?php echo $row->project_name; ?></td>
                        <td><?php 
                                        if($row->account_type == 1) {
                                            echo "Applicant / Project Investigator";
                                        } elseif($row->account_type == 2) {
                                            echo "SSBC Chair";
                                        } elseif($row->account_type == 3) {
                                            echo "SSBC Members";
                                        } elseif($row->account_type == 4) {
                                            echo "Biosafety Officer";
                                        } elseif($row->account_type == 5) {
                                            echo "Health and Safety Officer";
                                        } elseif($row->account_type == 6) {
                                            echo "Lab Officer";
                                        } elseif($row->account_type == 7) {
                                            echo "Student & Postgraduate";
                                        }
                            ?></td>
                        <td><button type="button" name = 'load' value = 'Load' onclick="location.href='<?php echo site_url().'/lmoproj/load_project?id='.$row->project_id;?>'" class="btn btn-primary">Load</button></td>
        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_2(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_2(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        <?php } ?>
        <!-- End Of New Application LMO Projects -->
        
        
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
    
    <!-- Annex2 Approval and Reject Function -->
    <script>
        function approve(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/approve/" + i + "/" + k;
        }
        
        function reject(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/reject/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script> 
        function Chair_approve(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/Chair_approve/" + i + "/" + k;
        }
        
        function annex2_show(){
        
            var v = document.getElementById("annex2_issue");
            v.style.display = "none";
            
            
            var x = document.getElementById("annex2_Chair");
            x.style.display = "block";
        }
        
        function Chair_disapprove(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/Chair_disapprove/" + i + "/" + k;
        }
        
        function final_approve(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/final_approve/" + i + "/" + k;
        }
        
        function final_reject(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/final_reject/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function approve_2(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/approve2/" + i + "/" + k;
        }
        
        function reject_2(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/reject2/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <!-- Form E Approval and Reject Function -->
    <script>
        function approve_forme(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/approve_forme/" + i + "/" + k;
        }
        
        function reject_forme(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/reject_forme/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function Chair_approve_forme(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/Chair_approve_forme/" + i + "/" + k;
        }
        
        function forme_show(){
            
            var v = document.getElementById("forme_issue");
            v.style.display = "none";
            
           
            var x = document.getElementById("forme_proceed");
            x.style.display = "block";
        }
        
        
        function Chair_disapprove_forme(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/Chair_disapprove_forme/" + i + "/" + k;
        }
        
        function final_approve_forme(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/final_approve_forme/" + i + "/" + k;
        }
        
        function final_reject_forme(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/final_reject_forme/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function approve_forme2(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/approve_forme2/" + i + "/" + k;
        }
        
        function reject_forme2(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/reject_forme2/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    <!-- END of Form E -->
    
    <!-- HIRARC Approval and Reject Function -->
    <script>
        function approve_hirarc(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/approve_hirarc/" + i + "/" + k;
        }
        
        function reject_hirarc(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/reject_hirarc/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function hirarc_show(){
            
            var v = document.getElementById("hirarc_issue");
            v.style.display = "none";
            
            
            var x = document.getElementById("hirarc_proceed");
            x.style.display = "block";
        }
        
        function Chair_approve_hirarc(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/Chair_approve_hirarc/" + i + "/" + k;
        }
        
        
        function Chair_disapprove_hirarc(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/Chair_disapprove_hirarc/" + i + "/" + k;
        }
        
        function final_approve_hirarc(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/final_approve_hirarc/" + i + "/" + k;
        }
        
        function final_reject_hirarc(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/final_reject_hirarc/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function approve_hirarc2(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/approve_hirarc2/" + i + "/" + k;
        }
        
        function reject_hirarc2(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/reject_hirarc2/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    <!-- END of HIRARC -->
    
    <!-- PC1 Approval and Reject Function -->
    <script>
        function approve_pc1(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/approve_pc1/" + i + "/" + k;
        }
        
        function reject_pc1(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/reject_pc1/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function pc1_show(){

            var v = document.getElementById("pc1_issue");
            v.style.display = "none";
            
            
            var x = document.getElementById("pc1_proceed");
            x.style.display = "block";
        }
        
        function Chair_approve_pc1(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/Chair_approve_pc1/" + i + "/" + k;
        }
        
        
        function final_approve_pc1(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/final_approve_pc1/" + i + "/" + k;
        }
        
        function final_reject_pc1(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/final_reject_pc1/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function approve_pc1_2(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/approve_pc1_2/" + i + "/" + k;
        }
        
        function reject_pc1_2(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/reject_pc1_2/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    <!-- END of PC1 -->
    
    <!-- PC2 Approval and Reject Function -->
    <script>
        function approve_pc2(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/approve_pc2/" + i + "/" + k;
        }
        
        function reject_pc2(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/reject_pc2/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function pc2_show(){

            var v = document.getElementById("pc2_issue");
            v.style.display = "none";
            
            
            var x = document.getElementById("pc2_proceed");
            x.style.display = "block";
        }
        
        function Chair_approve_pc2(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/Chair_approve_pc2/" + i + "/" + k;
        }
        
        
        function final_approve_pc2(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/final_approve_pc2/" + i + "/" + k;
        }
        
        function final_reject_pc2(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/final_reject_pc2/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function approve_pc2_2(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/approve_pc2_2/" + i + "/" + k;
        }
        
        function reject_pc2_2(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/reject_pc2_2/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    <!-- END of PC2 -->
    
    <!-- SWP Approval and Reject Function -->
    <script>
        function approve_swp(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/approve_swp/" + i + "/" + k;
        }
        
        function reject_swp(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/reject_swp/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function swp_show(){

            var v = document.getElementById("swp_issue");
            v.style.display = "none";
            
            
            var x = document.getElementById("swp_proceed");
            x.style.display = "block";
        }
        
        function Chair_approve_swp(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/Chair_approve_swp/" + i + "/" + k;
        }
        
        
        function final_approve_swp(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/final_approve_swp/" + i + "/" + k;
        }
        
        function final_reject_swp(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/final_reject_swp/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    
    <script>
        function approve_swp_2(i,k){
            window.location = "<?php echo base_url(); ?>index.php/applicationapproval/approve_swp_2/" + i + "/" + k;
        }
        
        function reject_swp_2(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/applicationapproval/reject_swp_2/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>
    <!-- END of SWP -->


</body>
</html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
if($this->session->userdata('account_type') != 4){
    redirect('home/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - Account Approval</title>
    
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
        <h5>Account Approvals</h5>
        <hr/>
        <div class="text-center row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>index.php/accountapproval/index"><button class="btn btn-info button_right" style="display:inline-block;width:200px;">New Users</button></a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>index.php/accountapproval/edit"><button class="btn btn-info button_right" style="display:inline-block;width:200px;">Existing Users</button></a>
            </div>
            <div class="col-md-3"></div>
        </div>
        <hr/>
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
        
        <?php if(isset($all_accounts)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Account Email</th>
                        <th>Full Name</th>
                        <th>Account Type</th>
                        <th>Registration Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="account">
                <?php $i=0; foreach($all_accounts as $row): ?>
                    <tr class="searchable">
                        <td><?php echo $i = $i+1 ?></td>
                        <td><?php echo $row->account_email; ?></td>
                        <td><?php echo $row->account_fullname; ?></td>
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
                        <td><?php echo $row->account_date; ?></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <i class="btn btn-success fa fa-check" onclick="approve(<?php echo $row->account_id; ?>)" title="Approve"></i>
                            <hr/>
                            <i class="btn btn-danger fa fa-times" onclick="reject(<?php echo $row->account_id; ?>)" title="Reject"></i>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
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
        function approve(i){
            var k = confirm("Are you sure?");
            if (k){
                window.location = "<?php echo base_url(); ?>index.php/accountapproval/approve/" + i;
            }
        }
        
        function reject(i){
            var j = prompt("Reason for Rejecting:", "Invalid email/name");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/accountapproval/reject/" + i + "/" + btoa(j);
            }
        }
    </script>
</body>
</html>
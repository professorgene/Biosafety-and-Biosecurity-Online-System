<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
if($this->session->userdata('account_type') != 2 && $this->session->userdata('account_type') != 4 ){
    redirect('home/index');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - Edit Form Requests Approval</title>
    
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
        <h5>Edit Request Approvals</h5>
        <br/>
        <input class="form-control" id="searchbar" type="text" placeholder="Search here">
        <br/>
        
        <!-- Biohazard Materials Forms -->
        <!-- IF current user is BSO, then show all edit request that have not been approved -->
        <?php if($this->session->userdata('account_type') == 4) { ?>
        
        <?php if(isset($all_annex2)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Annex 2 Forms
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
                <?php $i=0; foreach($all_annex2 as $row): ?>
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
                        <td><button type="button" name = 'biohazard_load' value = 'Load' onclick="location.href='<?php echo site_url().'/annex2/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <!-- Annex 3 Forms -->
        <?php if(isset($all_annex3)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Annex 3 Forms
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
                <?php $i=0; foreach($all_annex3 as $row): ?>
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
                        <td><button type="button" name = 'biohazard_load' value = 'Load' onclick="location.href='<?php echo site_url().'/annex3/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_annex3(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_annex3(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <!-- Annex 4 Forms -->
        <?php if(isset($all_annex4)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Annex 4 Forms
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
                <?php $i=0; foreach($all_annex4 as $row): ?>
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
                        <td><button type="button" name = 'annex4_load' value = 'Load' onclick="location.href='<?php echo site_url().'/annex4/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_annex4(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_annex4(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        
        <!-- Annex 5 Forms -->
        <?php if(isset($all_annex5)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Annex 5 Forms
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
                <?php $i=0; foreach($all_annex5 as $row): ?>
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
                        <td><button type="button" name = 'annex5_load' value = 'Load' onclick="location.href='<?php echo site_url().'/annex5/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_annex5(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_annex5(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <!-- Annual Final report Forms -->
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
                        <th></th>
                        <th>Account Email</th>
                        <th>Full Name</th>
                        <th>Account Type</th>
                        <th></th>
                        <th></th>
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
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_annual(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_annual(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <!-- Biohazard Materials Forms -->
        <?php if(isset($all_biohazard)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Biohazard Material Forms
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
                <?php $i=0; foreach($all_biohazard as $row): ?>
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
                        <td><button type="button" name = 'biohazard_load' value = 'Load' onclick="location.href='<?php echo site_url().'/biohazard/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_biohazard(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_biohazard(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <!-- Exempt Dealings Forms -->
        <?php if(isset($all_exempt)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Exempt Dealings Forms
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
                <?php $i=0; foreach($all_exempt as $row): ?>
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
                        <td><button type="button" name = 'biohazard_load' value = 'Load' onclick="location.href='<?php echo site_url().'/exempt/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_exempt(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_exempt(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <!-- Form E Forms -->
        <?php if(isset($all_forme)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Form E Forms
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
                <?php $i=0; foreach($all_forme as $row): ?>
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
                        <td><button type="button" name = 'forme_load' value = 'Load' onclick="location.href='<?php echo site_url().'/forme/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_forme(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_forme(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <!-- Form F Forms -->
        <?php if(isset($all_formf)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Form F Forms
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
                <?php $i=0; foreach($all_formf as $row): ?>
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
                        <td><button type="button" name = 'formf_load' value = 'Load' onclick="location.href='<?php echo site_url().'/formf/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_formf(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_formf(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <!-- Hirarc Forms -->
        <?php if(isset($all_hirarc)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Hirarc Forms
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
                <?php $i=0; foreach($all_hirarc as $row): ?>
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
                        <td><button type="button" name = 'biohazard_load' value = 'Load' onclick="location.href='<?php echo site_url().'/hirarc/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_hirarc(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_hirarc(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        
        
        <!-- Incident Forms -->
        <?php if(isset($all_incident)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Incident Accident Report Forms
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
                <?php $i=0; foreach($all_incident as $row): ?>
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
                        <td><button type="button" name = 'incident_load' value = 'Load' onclick="location.href='<?php echo site_url().'/incidentaccidentreport/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_incident(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_incident(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <!-- Notification of Exporting Forms -->
        <?php if(isset($all_notif_export)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Notification of Exporting LMO or Biological material Forms
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
                <?php $i=0; foreach($all_notif_export as $row): ?>
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
                        <td><button type="button" name = 'notif_export_load' value = 'Load' onclick="location.href='<?php echo site_url().'/notification_of_exporting_biological_material/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_export(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_export(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <!-- Notification of LMO & BM Forms -->
        <?php if(isset($all_notif_LMO)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Notification of LMO and Biohazardous Material Forms
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
                <?php $i=0; foreach($all_notif_LMO as $row): ?>
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
                        <td><button type="button" name = 'notif_load' value = 'Load' onclick="location.href='<?php echo site_url().'/notification_of_LMO_and_BM/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_notification(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_notification(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <!-- PC1 Forms -->
        <?php if(isset($all_pc1)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            PC1 Forms
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
                <?php $i=0; foreach($all_pc1 as $row): ?>
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
                        <td><button type="button" name = 'biohazard_load' value = 'Load' onclick="location.href='<?php echo site_url().'/pc1/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_pc1(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_pc1(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <!-- PC2 Forms -->
        <?php if(isset($all_pc2)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            PC2 Forms
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
                <?php $i=0; foreach($all_pc2 as $row): ?>
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
                        <td><button type="button" name = 'biohazard_load' value = 'Load' onclick="location.href='<?php echo site_url().'/pc2/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_pc2(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_pc2(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <!-- Procuremnt Forms -->
        <?php if(isset($all_procurement)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Pre-Purchase Material Risk Assesment Forms
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
                <?php $i=0; foreach($all_procurement as $row): ?>
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
                        <td><button type="button" name = 'biohazard_load' value = 'Load' onclick="location.href='<?php echo site_url().'/procurement/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_procurement(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_procurement(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <!-- SWP Forms -->
        <?php if(isset($all_swp)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">
                            Safety Work Procedure Forms
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
                <?php $i=0; foreach($all_swp as $row): ?>
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
                        <td><button type="button" name = 'biohazard_load' value = 'Load' onclick="location.href='<?php echo site_url().'/swp/load_form?id='.$row->application_id;?>'" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_swp(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_swp(<?php echo $row->account_id; ?>, <?php echo $row->application_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <!-- end of first if condition -->
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
    
    <!-- Request Approval and Reject Function for annex 2 -->
    <script>
        function approve(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve/" + i + "/" + k;
        }
        
        function reject(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_annex3(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_annex3/" + i + "/" + k;
        }
        
        function reject_annex3(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_annex3/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_annex4(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_annex4/" + i + "/" + k;
        }
        
        function reject_annex4(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_annex4/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_annex5(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_annex5/" + i + "/" + k;
        }
        
        function reject_annex5(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_annex5/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_annual(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_annual/" + i + "/" + k;
        }
        
        function reject_annual(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_annual/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_biohazard(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_biohazard/" + i + "/" + k;
        }
        
        function reject_biohazard(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_biohazard/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_exempt(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_exempt/" + i + "/" + k;
        }
        
        function reject_exempt(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_exempt/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_forme(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_forme/" + i + "/" + k;
        }
        
        function reject_forme(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_forme/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_formf(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_formf/" + i + "/" + k;
        }
        
        function reject_formf(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_formf/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_hirarc(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_hirarc/" + i + "/" + k;
        }
        
        function reject_hirarc(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_hirarc/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_incident(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_incident/" + i + "/" + k;
        }
        
        function reject_incident(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_incident/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_export(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_export/" + i + "/" + k;
        }
        
        function reject_export(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_export/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_notification(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_notification/" + i + "/" + k;
        }
        
        function reject_notification(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_notification/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_pc1(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_pc1/" + i + "/" + k;
        }
        
        function reject_pc1(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_pc1/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_pc2(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_pc2/" + i + "/" + k;
        }
        
        function reject_pc2(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_pc2/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_procurement(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_procurement/" + i + "/" + k;
        }
        
        function reject_procurement(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_procurement/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_swp(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_swp/" + i + "/" + k;
        }
        
        function reject_swp(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_swp/" + i + "/" + k + "/" + btoa(j);
            }
        }
    </script>

    
</body>
</html>
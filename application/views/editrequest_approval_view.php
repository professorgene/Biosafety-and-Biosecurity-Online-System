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
        
        <!-- All Project Forms -->
        <!-- IF current user is BSO, then show all edit request that have not been approved -->
        <?php if($this->session->userdata('account_type') == 4) { ?>
        
        <?php if(isset($all_lmo_project)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            Application For Living Modified Organisms
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
                <?php $i=0; foreach($all_lmo_project as $row): ?>
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
                        <td><button type="button" name = 'biohazard_load' value = 'Load' onclick="view_application(<?php echo $row->project_id; ?>, '<?php echo $row->project_type; ?>')" class="btn btn-primary">Load</button></td>
                        
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
        
        <!-- Application for Biohazard Project -->
        <?php if(isset($all_bio_project)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            Application For Biohazardous Materials
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
                <?php $i=0; foreach($all_bio_project as $row): ?>
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
                        <td><button type="button" name = 'biohazard_load' value = 'Load'onclick="view_application(<?php echo $row->project_id; ?>, '<?php echo $row->project_type; ?>')" class="btn btn-primary">Load</button></td>
                        <!--
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/accountapproval/approve/<?php echo $row->account_id; ?>" title="Approve"><i class="fa fa-check"></i></a>
                            <hr/>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/accountapproval/reject/<?php echo $row->account_id; ?>" title="Reject"><i class="fa fa-times"></i></a>
                        </td>
                        -->
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_bio(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_bio(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <!-- Exempt Dealings Projects -->
        <?php if(isset($all_exempt_project)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            Application For Exempt Dealings
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
                <?php $i=0; foreach($all_exempt_project as $row): ?>
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
                        <td><button type="button" name = 'exempt_load' value = 'Load' onclick="view_application(<?php echo $row->project_id; ?>, '<?php echo $row->project_type; ?>')" class="btn btn-primary">Load</button></td>
                        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_exempt(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_exempt(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <?php if(isset($all_procurement_project)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            Procurement of Biological Material
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
                <?php $i=0; foreach($all_procurement_project as $row): ?>
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
                        <td><button type="button" name = 'procurement_load' value = 'Load' onclick="view_application(<?php echo $row->project_id; ?>, '<?php echo $row->project_type; ?>')" class="btn btn-primary">Load</button></td>
                        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_procurement(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_procurement(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <?php if(isset($all_notif_LMO_project)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            Notification of LMO and Biohazardous Material Projects
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
                <?php $i=0; foreach($all_notif_LMO_project as $row): ?>
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
                        <td><button type="button" name = 'notif_lmo_load' value = 'Load' onclick="view_application(<?php echo $row->project_id; ?>, '<?php echo $row->project_type; ?>')" class="btn btn-primary">Load</button></td>
                        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_notif_LMO(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_notif_LMO(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <?php if(isset($all_annual_project)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            Annual Final Report Projects
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
                <?php $i=0; foreach($all_annual_project as $row): ?>
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
                        <td><button type="button" name = 'notif_lmo_load' value = 'Load' onclick="view_application(<?php echo $row->project_id; ?>, '<?php echo $row->project_type; ?>')" class="btn btn-primary">Load</button></td>
                        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_annual(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_annual(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <?php if(isset($all_export_LMO_project)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            Notification of Exporting LMO Projects
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
                <?php $i=0; foreach($all_export_LMO_project as $row): ?>
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
                        <td><button type="button" name = 'notif_lmo_load' value = 'Load' onclick="view_application(<?php echo $row->project_id; ?>, '<?php echo $row->project_type; ?>')" class="btn btn-primary">Load</button></td>
                        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_export_LMO(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_export_LMO(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <?php if(isset($all_export_Exempt_project)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            Notification of Exporting Biological Material Projects
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
                <?php $i=0; foreach($all_export_Exempt_project as $row): ?>
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
                        <td><button type="button" name = 'notif_lmo_load' value = 'Load' onclick="view_application(<?php echo $row->project_id; ?>, '<?php echo $row->project_type; ?>')" class="btn btn-primary">Load</button></td>
                        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_export_Exempt(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_export_Exempt(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <?php if(isset($all_incident_Exempt_project)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            Incident Accident Report for Exempt Dealings or Biohazardous Materials
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
                <?php $i=0; foreach($all_incident_Exempt_project as $row): ?>
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
                        <td><button type="button" name = 'incident_exempt_load' value = 'Load' onclick="view_application(<?php echo $row->project_id; ?>, '<?php echo $row->project_type; ?>')" class="btn btn-primary">Load</button></td>
                        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_incident_Exempt(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_incident_Exempt(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <?php if(isset($all_minor_incident)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            Minor Incident Accident Report for Living Modified Organisms
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
                <?php $i=0; foreach($all_minor_incident as $row): ?>
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
                        <td><button type="button" name = 'incident_exempt_load' value = 'Load' onclick="view_application(<?php echo $row->project_id; ?>, '<?php echo $row->project_type; ?>')" class="btn btn-primary">Load</button></td>
                        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_minor(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_minor(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <?php if(isset($all_major_incident)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            Major Incident Accident Report for Living Modified Organisms
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
                <?php $i=0; foreach($all_major_incident as $row): ?>
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
                        <td><button type="button" name = 'incident_exempt_load' value = 'Load' onclick="view_application(<?php echo $row->project_id; ?>, '<?php echo $row->project_type; ?>')" class="btn btn-primary">Load</button></td>
                        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_minor(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_minor(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php } ?>
        
        <?php if(isset($all_occupational_incident)) { ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">
                            Occupational Disease or Exposure Project
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
                <?php $i=0; foreach($all_occupational_incident as $row): ?>
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
                        <td><button type="button" name = 'incident_exempt_load' value = 'Load' onclick="view_application(<?php echo $row->project_id; ?>, '<?php echo $row->project_type; ?>')" class="btn btn-primary">Load</button></td>
                        
                        <td class="text-center">
                            <button class="btn btn-success" onclick="approve_minor(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Approve"><i class="fa fa-check"></i></button>
                            <hr/>
                            <button class="btn btn-danger" onclick="reject_minor(<?php echo $row->account_id; ?>, <?php echo $row->project_id; ?>)" title="Reject"><i class="fa fa-times"></i></button>
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
        function view_application(i, j){
                //check what type of project is it then go to project controller
                if(j == "app_lmo"){
                    window.location = "<?php echo base_url(); ?>index.php/lmoproj/load_project?id=" + i;
                    
                }else if(j == "app_bio"){
                    window.location = "<?php echo base_url(); ?>index.php/biohazardproj/load_project?id=" + i;
                    
                }else if(j == "app_exempt"){
                    window.location = "<?php echo base_url(); ?>index.php/exemptproj/load_project?id=" + i;
                    
                }else if(j == "procurement"){
                    window.location = "<?php echo base_url(); ?>index.php/procurementproj/load_project?id=" + i;
                    
                }else if(j == "notifLMOBM"){
                    window.location = "<?php echo base_url(); ?>index.php/notification_of_LMO_and_BM_proj/load_project?id=" + i;
                    
                }else if(j == "anuualfinalreport"){
                    window.location = "<?php echo base_url(); ?>index.php/annualorfinalreportproj/load_project?id=" + i;
                    
                }else if(j == "exportLMO"){
                    window.location = "<?php echo base_url(); ?>index.php/exportingofbioLMOproj/load_project?id=" + i;
                    
                }else if(j == "exportExempt"){
                    window.location = "<?php echo base_url(); ?>index.php/exportingofbioexemptdealingproj/load_project?id=" + i;
                    
                }else if(j == "incidentExempt"){
                    window.location = "<?php echo base_url(); ?>index.php/incidentaccidentreportingpageexemptproj/load_project?id=" + i;
                    
                }else if(j == "minorbio"){
                    window.location = "<?php echo base_url(); ?>index.php/minorbioproj/load_project?id=" + i;
                    
                }else if(j == "majorbio"){
                    window.location = "<?php echo base_url(); ?>index.php/majorincidentaccidentreportingpageproj/load_project?id=" + i;
                    
                }else if(j == "occupational"){
                    window.location = "<?php echo base_url(); ?>index.php/occupationaldiseaseexposurepageproj/load_project?id=" + i;
                    
                }                                  
        }
        
        
        function approve(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve/" + i + "/" + k;
        }
        
        function reject(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject/" + i + "/" + k + "/" + btoa(j);
            }
        }
        
        function approve_bio(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_bio/" + i + "/" + k;
        }
        
        function reject_bio(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_bio/" + i + "/" + k + "/" + btoa(j);
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
            
        function approve_procurement(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_procurement/" + i + "/" + k;
        }
        
        function reject_procurement(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_procurement/" + i + "/" + k + "/" + btoa(j);
            }
        }
            
        function approve_notif_LMO(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_notif_LMO/" + i + "/" + k;
        }
        
        function reject_notif_LMO(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_notif_LMO/" + i + "/" + k + "/" + btoa(j);
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
        
        function approve_export_LMO(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_export_LMO/" + i + "/" + k;
        }
        
        function reject_export_LMO(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_export_LMO/" + i + "/" + k + "/" + btoa(j);
            }
            
            
        }
        
        function approve_export_Exempt(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_export_Exempt/" + i + "/" + k;
        }
        
        function reject_export_Exempt(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_export_Exempt/" + i + "/" + k + "/" + btoa(j);
            }
            
            
        }
        
        function approve_incident_Exempt(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_incident_Exempt/" + i + "/" + k;
        }
        
        function reject_incident_Exempt(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_incident_Exempt/" + i + "/" + k + "/" + btoa(j);
            }
            
            
        }
        
        function approve_minor(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_minor/" + i + "/" + k;
        }
        
        function reject_minor(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_minor/" + i + "/" + k + "/" + btoa(j);
            }
            
            
        }
        
        function approve_major(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_major/" + i + "/" + k;
        }
        
        function reject_major(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_major/" + i + "/" + k + "/" + btoa(j);
            }
            
            
        }
        
        function approve_occupational(i,k){
            window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/approve_occupational/" + i + "/" + k;
        }
        
        function reject_occupational(i,k){
            var j = prompt("Reason for Rejecting:", "Does not meet requirements");
            if (j != null) {
                window.location = "<?php echo base_url(); ?>index.php/editrequest_approval/reject_occupational/" + i + "/" + k + "/" + btoa(j);
            }
            
            
        }
        
        
    </script>

    
</body>
</html>
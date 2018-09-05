<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>New Application - Living Modified Organisms: OHS - HIRARC Form</title>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/css/simple-sidebar.css" type="text/css" rel="stylesheet">
    
    <style>
        body {
            padding-top: 82px;
        }
        
        .btn-sample{
            position: fixed;
            margin-left: 60px;
        }
        
        .approve_section{
            display: none;
        }
        
        .tblTitle{
            background-color: black;
            color: white;
            text-align: center;
        }
        
        .tblTitle2{
            background-color: #808080;
            color: white;
            text-align: center;
        }
        
        .greendata{
            background-color: lawngreen;
        }
        
        .reddata{
            background-color: red;
        }
        
        .yellowdata{
            background-color: yellow;
        }
        
        .colspace{
            width: 50px;
        }
        .sectiontarget::before {
          content:"";
          display:block;
          height:60px; /* fixed header height*/
          margin:-60px 0 0; /* negative fixed header height */
        }
    </style>
    

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Swinburne Sarawak</h3>
            </div>
            
            <ul class="list-unstyled components">
            <p>BBOS</p>
            <li>
                <a href="<?php echo base_url(); ?>index.php/lmoproject">Living Modified Organisms</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/annex2">Annex 2</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/forme">Form E</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/pc1">PC1</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/pc2">PC2</a>
            </li>
            <li class="active">
                <a href="<?php echo base_url(); ?>index.php/hirarc">OHS - HIRARC</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/swp">Safe Work Procedure</a>
            </li>
        </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content Insert Here -->
        <div id="content">
            <div class="container-fluid">
                
                <?php if(isset($editload)) { echo form_open('hirarc/update_form'); } else { echo form_open('hirarc/index'); } ?>
                <?php if(isset($disabled)){ echo "<fieldset disabled='disabled'>"; } ?>
                   <div>
                       <h5><strong>PLEASE FILL OUT ALL INFORMATION REQUESTED</strong></h5>
                   </div>
                
                <div>
                    <?php if(isset($refer)) { ?>
                    <p><?php echo $refer; ?></p>
                    <?php } ?>
                </div>
                   
                   <br>
                   
                   <div id="section_1" class="sectiontarget">
                       <table class="table table-bordered" id="section_1">
                           <thead>
                                <tr>
                                   <th class="tblTitle" colspan="10"><h8 id="section_1"><strong>Section 1 - Person Completing Form Details</strong></h8></th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <th>1.01 Company/Department</th>
                                   <td><input type="text" class="form-control" name="company_name" value="<?php if(isset($load)){echo set_value('company_name', $item->company_name);}else{echo set_value('company_name');} ?>">
                                   <span class="text-danger"><?php echo form_error('company_name'); ?></span>
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.02 Date</th>
                                   <td><input type="date" class="form-control" name="date" value="<?php if(isset($load)){echo set_value('date', $item->date);}else{echo set_value('date');} ?>">
                                   <span class="text-danger"><?php echo form_error('date'); ?></span>
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.03 Process Location</th>
                                   <td><input type="text" class="form-control" name="process_location" value="<?php if(isset($load)){echo set_value('process_location', $item->process_location);}else{echo set_value('process_location');} ?>">
                                       <span class="text-danger"><?php echo form_error('process_location'); ?></span>
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.04 Conducted by (name)</th>
                                   <td><input type="text" class="form-control" name="conducted_name" value="<?php if(isset($load)){echo set_value('conducted_name', $item->conducted_name);}else{echo set_value('conducted_name');} ?>"><span class="text-danger"><?php echo form_error('conducted_name'); ?></span>
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.04.2 Conducted by (designation)</th>
                                   <td><input type="text" class="form-control" name="conducted_designation" value="<?php if(isset($load)){echo set_value('conducted_designation', $item->conducted_designation);}else{echo set_value('conducted_designation');} ?>">
                                   <span class="text-danger"><?php echo form_error('conducted_designation'); ?></span>
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.05 Approved by (name)</th>
                                   <td><input type="text" class="form-control" name="approved_name" value="<?php if(isset($load)){echo set_value('approved_name', $item->approved_name);}else{echo set_value('approved_name');} ?>"><span class="text-danger"><?php echo form_error('approved_name'); ?></span>
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.05.2 Approved by (designation)</th>
                                   <td><input type="text" class="form-control" name="approved_designation" value="<?php if(isset($load)){echo set_value('approved_designation', $item->approved_designation);}else{echo set_value('approved_designation');} ?>">
                                   <span class="text-danger"><?php echo form_error('approved_designation'); ?></span>
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.06 Date (From)</th>
                                   <td><input type="date" class="form-control" name="date_from" value="<?php if(isset($load)){echo set_value('date_from', $item->date_from);}else{echo set_value('date_from');} ?>">
                                   <span class="text-danger"><?php echo form_error('date_from'); ?></span>
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.06.2 Date (To)</th>
                                   <td><input type="date" class="form-control" name="date_to" value="<?php if(isset($load)){echo set_value('date_to', $item->date_to);}else{echo set_value('date_to');} ?>">
                                   <span class="text-danger"><?php echo form_error('date_to'); ?></span>
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.07 Review Date</th>
                                   <td><input type="date" class="form-control" name="review_date" value="<?php if(isset($load)){echo set_value('review_date', $item->review_date);}else{echo set_value('review_date');} ?>">
                                   <span class="text-danger"><?php echo form_error('review_date'); ?></span>
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.08 Doc. No.</th>
                                   <td>OHS/F/4.5.X</td>
                               </tr>
                               
                           </tbody>
                       </table>
                   </div>
                   
                   <div id="section_2" class="sectiontarget">
                       <table class="table table-bordered" id="hirarcTb">
                           <thead>
                               <tr>
                                   <th class="tblTitle" colspan="10">HIRARC</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <th colspan="4">1. Hazard Identification</th>
                                   <th colspan="4">2. Risk Analysis</th>
                                   <th colspan="2">1. Risk Control</th>
                               </tr>
                               <tr>
                                   <th width="5">No.</th>
                                   <th>Work Activity</th>
                                   <th>Hazard</th>
                                   <th>Which can cause/effect</th>
                                   <th>Existing Risk Control (if any)</th>
                                   <th>LLH</th>
                                   <th>SEV</th>
                                   <th>RR</th>
                                   <th>Recommended Control Measures</th>
                                   <th>PIC (Due date/status)</th>
                               </tr>
                               <tr>
                                   <td>1</td>
                                   <td><input type="text" class="form-control" name="HIRARC_activity[0]" value="<?php if(isset($load)){echo set_value('HIRARC_activity[0]', $a[0]);}else{echo set_value('HIRARC_activity[0]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_hazard[0]" value="<?php if(isset($load)){echo set_value('HIRARC_hazard[0]', $b[0]);}else{echo set_value('HIRARC_hazard[0]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_effects[0]" value="<?php if(isset($load)){echo set_value('HIRARC_effects[0]', $c[0]);}else{echo set_value('HIRARC_effects[0]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_risk_control[0]" value="<?php if(isset($load)){echo set_value('HIRARC_risk_control[0]', $d[0]);}else{echo set_value('HIRARC_risk_control[0]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_LLH[0]" value="<?php if(isset($load)){echo set_value('HIRARC_LLH[0]', $e[0]);}else{echo set_value('HIRARC_LLH[0]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_SEV[0]" value="<?php if(isset($load)){echo set_value('HIRARC_SEV[0]', $f[0]);}else{echo set_value('HIRARC_SEV[0]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_RR[0]" value="<?php if(isset($load)){echo set_value('HIRARC_RR[0]', $g[0]);}else{echo set_value('HIRARC_RR[0]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_control_measure[0]" value="<?php if(isset($load)){echo set_value('HIRARC_control_measure[0]', $h[0]);}else{echo set_value('HIRARC_control_measure[0]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_PIC[0]" value="<?php if(isset($load)){echo set_value('HIRARC_PIC[0]', $i[0]);}else{echo set_value('HIRARC_PIC[0]');} ?>"></td>
                               </tr>
                               <tr>
                                   <td>2</td>
                                   <td><input type="text" class="form-control" name="HIRARC_activity[1]" value="<?php if(isset($load)){echo set_value('HIRARC_activity[1]', $a[1]);}else{echo set_value('HIRARC_activity[1]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_hazard[1]" value="<?php if(isset($load)){echo set_value('HIRARC_hazard[1]', $b[1]);}else{echo set_value('HIRARC_hazard[1]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_effects[1]" value="<?php if(isset($load)){echo set_value('HIRARC_effects[1]', $c[1]);}else{echo set_value('HIRARC_effects[1]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_risk_control[1]" value="<?php if(isset($load)){echo set_value('HIRARC_risk_control[1]', $d[1]);}else{echo set_value('HIRARC_risk_control[1]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_LLH[1]" value="<?php if(isset($load)){echo set_value('HIRARC_LLH[1]', $e[1]);}else{echo set_value('HIRARC_LLH[1]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_SEV[1]" value="<?php if(isset($load)){echo set_value('HIRARC_SEV[1]', $f[1]);}else{echo set_value('HIRARC_SEV[1]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_RR[1]" value="<?php if(isset($load)){echo set_value('HIRARC_RR[1]', $g[1]);}else{echo set_value('HIRARC_RR[1]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_control_measure[1]" value="<?php if(isset($load)){echo set_value('HIRARC_control_measure[1]', $h[1]);}else{echo set_value('HIRARC_control_measure[1]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_PIC[1]" value="<?php if(isset($load)){echo set_value('HIRARC_PIC[1]', $i[1]);}else{echo set_value('HIRARC_PIC[1]');} ?>"></td>
                               </tr>
                               <tr>
                                   <td>3</td>
                                   <td><input type="text" class="form-control" name="HIRARC_activity[2]" value="<?php if(isset($load)){echo set_value('HIRARC_activity[2]', $a[2]);}else{echo set_value('HIRARC_activity[2]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_hazard[2]" value="<?php if(isset($load)){echo set_value('HIRARC_hazard[2]', $b[2]);}else{echo set_value('HIRARC_hazard[2]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_effects[2]" value="<?php if(isset($load)){echo set_value('HIRARC_effects[2]', $c[2]);}else{echo set_value('HIRARC_effects[2]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_risk_control[2]" value="<?php if(isset($load)){echo set_value('HIRARC_risk_control[2]', $d[2]);}else{echo set_value('HIRARC_risk_control[2]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_LLH[2]" value="<?php if(isset($load)){echo set_value('HIRARC_LLH[2]', $e[2]);}else{echo set_value('HIRARC_LLH[2]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_SEV[2]" value="<?php if(isset($load)){echo set_value('HIRARC_SEV[2]', $f[2]);}else{echo set_value('HIRARC_SEV[2]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_RR[2]" value="<?php if(isset($load)){echo set_value('HIRARC_RR[2]', $g[2]);}else{echo set_value('HIRARC_RR[2]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_control_measure[2]" value="<?php if(isset($load)){echo set_value('HIRARC_control_measure[2]', $h[2]);}else{echo set_value('HIRARC_control_measure[2]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_PIC[2]" value="<?php if(isset($load)){echo set_value('HIRARC_PIC[2]', $i[2]);}else{echo set_value('HIRARC_PIC[2]');} ?>"></td>
                               </tr>
                               <tr>
                                   <td>4</td>
                                   <td><input type="text" class="form-control" name="HIRARC_activity[3]" value="<?php if(isset($load)){echo set_value('HIRARC_activity[3]', $a[3]);}else{echo set_value('HIRARC_activity[3]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_hazard[3]" value="<?php if(isset($load)){echo set_value('HIRARC_hazard[3]', $b[3]);}else{echo set_value('HIRARC_hazard[3]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_effects[3]" value="<?php if(isset($load)){echo set_value('HIRARC_effects[3]', $c[3]);}else{echo set_value('HIRARC_effects[3]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_risk_control[3]" value="<?php if(isset($load)){echo set_value('HIRARC_risk_control[3]', $d[3]);}else{echo set_value('HIRARC_risk_control[3]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_LLH[3]" value="<?php if(isset($load)){echo set_value('HIRARC_LLH[3]', $e[3]);}else{echo set_value('HIRARC_LLH[3]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_SEV[3]" value="<?php if(isset($load)){echo set_value('HIRARC_SEV[3]', $f[3]);}else{echo set_value('HIRARC_SEV[3]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_RR[3]" value="<?php if(isset($load)){echo set_value('HIRARC_RR[3]', $g[3]);}else{echo set_value('HIRARC_RR[3]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_control_measure[3]" value="<?php if(isset($load)){echo set_value('HIRARC_control_measure[3]', $h[3]);}else{echo set_value('HIRARC_control_measure[3]');} ?>"></td>
                                   
                                   <td><input type="text" class="form-control" name="HIRARC_PIC[3]" value="<?php if(isset($load)){echo set_value('HIRARC_PIC[3]', $i[3]);}else{echo set_value('HIRARC_PIC[3]');} ?>"></td>
                               </tr>
                           </tbody>
                       </table>
                       <span class="text-danger"><?php echo form_error('HIRARC_activity[0]'); ?></span>
                       <span class="text-danger"><?php echo form_error('HIRARC_hazard[0]'); ?></span>
                       <span class="text-danger"><?php echo form_error('HIRARC_effects[0]'); ?></span>
                       <span class="text-danger"><?php echo form_error('HIRARC_risk_control[0]'); ?></span>
                       <span class="text-danger"><?php echo form_error('HIRARC_LLH[0]'); ?></span>
                       <span class="text-danger"><?php echo form_error('HIRARC_SEV[0]'); ?></span>
                       <span class="text-danger"><?php echo form_error('HIRARC_RR[0]'); ?></span>
                       <span class="text-danger"><?php echo form_error('HIRARC_control_measure[0]'); ?></span>
                       <span class="text-danger"><?php echo form_error('HIRARC_PIC[0]'); ?></span>
                   </div>
                
                <input type="hidden" value="<?php if(isset($hirarctype)){echo $hirarctype;}  ?>" name="application_type" />
                   
                   <br>
                   
                   <div>
                       <table class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th class="tblTitle2">Likelihood (L)</th>
                                   <th class="tblTitle2">Example</th>
                                   <th class="tblTitle2">Rating</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <td>Most Likely</td>
                                   <td>The most likely result of the hazard/event being realized</td>
                                   <td>5</td>
                               </tr>
                               <tr>
                                   <td>Possible</td>
                                   <td>Has a good chance of occuring and is not unusual</td>
                                   <td>4</td>
                               </tr>
                               <tr>
                                   <td>Conceivable</td>
                                   <td>Might be occur at some time in the future</td>
                                   <td>3</td>
                               </tr>
                               <tr>
                                   <td>Remote</td>
                                   <td>Has not been known to occur after many years</td>
                                   <td>2</td>
                               </tr>
                               <tr>
                                   <td>Inconceivable</td>
                                   <td>Is practically imposible and has never occurred</td>
                                   <td>1</td>
                               </tr>
                           </tbody>
                       </table>
                   </div>
                   
                   <div>
                       <table class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th class="tblTitle2">Severity (S)</th>
                                   <th class="tblTitle2">Example</th>
                                   <th class="tblTitle2">Rating</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <td>Catastrophic</td>
                                   <td>Numerous casualties, irrecoverible property damage and productivity</td>
                                   <td>5</td>
                               </tr>
                               <tr>
                                   <td>Fatal</td>
                                   <td>Approximately one single fatality major property damage if hazard is realized</td>
                                   <td>4</td>
                               </tr>
                               <tr>
                                   <td>Serious</td>
                                   <td>Non-fatal injury, permanent disability</td>
                                   <td>3</td>
                               </tr>
                               <tr>
                                   <td>Minor</td>
                                   <td>Disabling but not permanent injury</td>
                                   <td>2</td>
                               </tr>
                               <tr>
                                   <td>Negligible</td>
                                   <td>Minor abrasions, bruises, cuts, first aid type injury</td>
                                   <td>1</td>
                               </tr>
                           </tbody>
                       </table>
                   </div>
                   
                   <div>
                       <table class="table table-bordered">
                           <thead>
                               <tr>
                                   <th colspan="1"></th>
                                   <th colspan="5" class="tblTitle2">Severity(S)</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <th class="tblTitle2">Likelihood</th>
                                   <th class="tblTitle2">1</th>
                                   <th class="tblTitle2">2</th>
                                   <th class="tblTitle2">3</th>
                                   <th class="tblTitle2">4</th>
                                   <th class="tblTitle2">5</th>
                               </tr>
                               <tr>
                                   <th class="tblTitle2">5</th>
                                   <th class="yellowdata">5</th>
                                   <th class="yellowdata">10</th>
                                   <th class="reddata">15</th>
                                   <th class="reddata">20</th>
                                   <th class="reddata">25</th>
                               </tr>
                               <tr>
                                   <th class="tblTitle2">4</th>
                                   <th class="greendata">4</th>
                                   <th class="yellowdata">8</th>
                                   <th class="yellowdata">12</th>
                                   <th class="reddata">16</th>
                                   <th class="reddata">20</th>
                               </tr>
                               <tr>
                                   <th class="tblTitle2">3</th>
                                   <th class="greendata">3</th>
                                   <th class="yellowdata">6</th>
                                   <th class="yellowdata">9</th>
                                   <th class="yellowdata">12</th>
                                   <th class="reddata">15</th>
                               </tr>
                               <tr>
                                   <th class="tblTitle2">2</th>
                                   <th class="greendata">2</th>
                                   <th class="greendata">4</th>
                                   <th class="yellowdata">6</th>
                                   <th class="yellowdata">8</th>
                                   <th class="yellowdata">10</th>
                               </tr>
                               <tr>
                                   <th class="tblTitle2">1</th>
                                   <th class="greendata">1</th>
                                   <th class="greendata">2</th>
                                   <th class="greendata">3</th>
                                   <th class="greendata">4</th>
                                   <th class="yellowdata">5</th>
                               </tr>
                           </tbody>
                       </table>
                   </div>
                   <br>
                   
                   <div>
                       <table class="table table-bordered">
                           <thead>
                               <tr>
                                   <th class="tblTitle2">Risk</th>
                                   <th class="tblTitle2">Description</th>
                                   <th class="tblTitle2">Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <td class="reddata colspace">15 - 25</td>
                                   <td class="reddata">HIGH</td>
                                   <td>A HIGH risk requires immediate action to control the hazard as detailed in the hierarchy of control. Actions taken must be documented on the risk assesment form including data for completion.</td>
                               </tr>
                               <tr>
                                   <td class="yellowdata colspace">5 - 12</td>
                                   <td class="yellowdata">MEDIUM</td>
                                   <td>A MEDIUM risk requires a planned approach to controlling the hazard and applies temporary measure if required. Actions taken must be documented on the risk assesment form including data for completion.</td>
                               </tr>
                               <tr>
                                   <td class="greendata colspace">5 - 12</td>
                                   <td class="greendata">LOW</td>
                                   <td>A risk identified as LOW may be considered as acceptable and further reduction may not be neccessary. However if the risk can be resolved quickly and efficiently, control measures should be implemented and recorded.</td>
                               </tr>
                           </tbody>
                       </table>
                   </div>
                   
                   <br>
                
                
                   <div>
                    <input type="hidden" name="appid" value="<?php if(isset($appID)){echo $appID;} ?>">
                </div>
                
                   <div style="text-align: center">
                       <?php if(isset($editload)){ ?>
                       <button type="submit" name = 'hirarc_update' value = 'Update' onclick="location.href='<?php echo site_url().'/hirarc/update_form';?>'" class="btn btn-primary">Update</button>
                       <?php }else{ ?>
                       <button name="submit" type="submit" class="btn btn-primary col-md-2">Submit</button>
                       <?php } ?>
                   </div>
               <?php if(isset($disabled)){ echo "</fieldset>"; } ?>
               <?php echo form_close(); ?>
              
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


</body>

</html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>New Application - Living Modified Organisms: Safe Work Procedure Form</title>

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
        
        #first-table{
            background-color: #95a5a6;
            text-align: center;
        }
        
        .tblTitle{
            background-color: black;
            color: white;
            text-align: center;
        }
        
        .tbheader1{
            background-color:  #95a5a6 ;
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
            <li>
                <a href="<?php echo base_url(); ?>index.php/hirarc">OHS - HIRARC</a>
            </li>
            <li class="active">
                <a href="<?php echo base_url(); ?>index.php/swp">Safe Work Procedure</a>
            </li>
        </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content Insert Here -->
        <div id="content">
            <div class="container-fluid">
                <?php if(isset($editload)) { echo form_open('swp/update_form'); } else { echo form_open('swp/index'); } ?>
                <?php if(isset($disabled)){ echo "<fieldset disabled='disabled'>"; } ?>
                   <div>
                       <h5><strong>PLEASE FILL IN ALL INFORMATION REQUESTED</strong></h5>
                   </div>
                   
                   <br>
                   
                   <table class="table table-bordered" id="first-table">
                       <thead>
                           <tr>
                               <th>Date Received</th>
                               <th>SSBC Reference Number</th>
                           </tr>
                       </thead>
                       <tbody>
                           <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="date_received" placeholder="Date:"></td>
                           <td><input type="text" name="SBC_reference_no" class="form-control"></td>
                       </tbody>
                   </table>
                   
                <div id="section_1" class="sectiontarget">
                   <table class="table table-bordered" id="section_1">
                           <thead>
                                <tr>
                                   <th class="tblTitle" colspan="4"><h8 id="section_1"><strong>Section 1 - General Details</strong></h8></th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <th class="tbheader1">1.01 SWP Prepared by:</th>
                                   <td><input type="text" name="SWP_prepared_by" class="form-control" value="<?php if(isset($load)){echo set_value('SWP_prepared_by', $item->SWP_prepared_by);}else{echo set_value('SWP_prepared_by');} ?>"></td>
                                   
                                   
                                   <th class="tbheader1">1.02 Staff/Student No.:</th>
                                   <td><input type="text" name="SWP_staff_student_no" class="form-control" value="<?php if(isset($load)){echo set_value('SWP_staff_student_no', $item->SWP_staff_student_no);}else{echo set_value('SWP_staff_student_no');} ?>"></td>
                                   
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.03 Designation:</th>
                                   <td><input type="text" class="form-control" name="SWP_designation" value="<?php if(isset($load)){echo set_value('SWP_designation', $item->SWP_designation);}else{echo set_value('SWP_designation');} ?>"></td>
                                   
                                   
                                   <th class="tbheader1">1.04 Faculty/unit:</th>
                                   <td><input type="text" class="form-control" name="SWP_faculty" value="<?php if(isset($load)){echo set_value('SWP_faculty', $item->SWP_faculty);}else{echo set_value('SWP_faculty');} ?>"></td>
                                   
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.05 Unit Code/Unit Title (if teaching):</th>
                                   <td colspan="4"><input type="text" class="form-control" name="SWP_unit_title" value="<?php if(isset($load)){echo set_value('SWP_unit_title', $item->SWP_unit_title);}else{echo set_value('SWP_unit_title');} ?>"></td>
                                   
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.06 Project Title (if research):</th>
                                   <td colspan="4"><input type="text" class="form-control" name="SWP_project_title" value="<?php if(isset($load)){echo set_value('SWP_project_title', $item->SWP_project_title);}else{echo set_value('SWP_project_title');} ?>"></td>
                                   
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.07 Location: </th>
                                   <td colspan="4"><input type="text" class="form-control" name="SWP_location" value="<?php if(isset($load)){echo set_value('SWP_location', $item->SWP_location);}else{echo set_value('SWP_location');} ?>"></td>
                                   
                               </tr>
                               
                           </tbody>
                       </table>
                <span class="text-danger"><?php echo form_error('SWP_prepared_by'); ?></span>
                <span class="text-danger"><?php echo form_error('SWP_staff_student_no'); ?></span>
                <span class="text-danger"><?php echo form_error('SWP_designation'); ?></span>
                <span class="text-danger"><?php echo form_error('SWP_faculty'); ?></span>
                <span class="text-danger"><?php echo form_error('SWP_unit_title'); ?></span>
                <span class="text-danger"><?php echo form_error('SWP_project_title'); ?></span>
                <span class="text-danger"><?php echo form_error('SWP_location'); ?></span>

                   
                   <br><input type="hidden" value="<?php if(isset($hirarctype)){echo $hirarctype;} ?>" name="application_type" />
                   
                <div id="section_2" class="sectiontarget">
                   <table width="920" class="table table-bordered">
                       <thead>
                           <tr>
                               <th class="tblTitle" colspan="4"><h8 id="section_2"><strong>Section 2 - Experiment General Details</strong></h8></th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <th class="tbheader1">Brief Description of the Activity</th>
                           </tr>
                           <tr>
                               <td><textarea rows="3" name="SWP_description" class="form-control"><?php if(isset($load)){echo set_value('SWP_description', $item->SWP_description);}else{echo set_value('SWP_description');} ?></textarea></td>
                           </tr>
                           <tr>
                               <th class="tbheader1">A. Pre-operational</th>
                           </tr>
                           <tr>
                               <td><textarea class="form-control" rows="40" name="SWP_preoperational" placeholder="E.g. Proper lab attire; proper personal protective equipment; hand hygiene; understand the equipment SOPs etc."><?php if(isset($load)){echo set_value('SWP_preoperational', $item->SWP_preoperational);}else{echo set_value('SWP_preoperational');} ?></textarea></td>
                               
                           </tr>
                           
                           <tr>
                               <th class="tbheader1">B. Operational</th>
                           </tr>
                           <tr>
                               <td><textarea class="form-control" name="SWP_operational" rows="45" placeholder="E.g. Proper handling of the specimens/samples; samples processing in BSC; imaging of the specimens using microscopes; analyzing samples using plate reader; emergency response to biological spills or accident etc." value=""><?php if(isset($load)){echo set_value('SWP_operational', $item->SWP_operational);}else{echo set_value('SWP_operational');} ?></textarea></td>
                           </tr>
                           
                           <tr>
                              <th class="tbheader1">C. Post-operational</th>
                           </tr>
                           <tr>
                               <td>
                                   <textarea class="form-control" name="SWP_postoperational" rows="45" placeholder="E.g. Proper labelling, storage and transportation of the specimens/samples; decontamination and disposal of the specimens/samples (solid/liquid waste); cleaning of the workspaces and equipment etc."><?php if(isset($load)){echo set_value('SWP_postoperational', $item->SWP_postoperational);}else{echo set_value('SWP_postoperational');} ?></textarea>
                               </td>
                           </tr>
                           
                           <tr>
                               <th class="tbheader1">D. Potential Hazard Identification and Risk of Exposure to Hazards</th>
                           </tr>
                           <tr>
                               <td>
                                   <textarea class="form-control" name="SWP_risk" rows="5" ><?php if(isset($load)){echo set_value('SWP_risk', $item->SWP_risk);}else{echo set_value('SWP_risk');} ?></textarea>
                               </td>
                           </tr>
                           
                           <tr>
                               <th class="tbheader1">E. Exposure Control Specific to the above mentioned Hazards</th>
                           </tr>
                           <tr>
                               <td>
                                   <textarea class="form-control" name="SWP_control" rows="5"><?php if(isset($load)){echo set_value('SWP_control', $item->SWP_control);}else{echo set_value('SWP_control');} ?></textarea>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                
                <span class="text-danger"><?php echo form_error('SWP_description'); ?></span>
                <span class="text-danger"><?php echo form_error('SWP_preoperational'); ?></span>
                <span class="text-danger"><?php echo form_error('SWP_postoperational'); ?></span>
                <span class="text-danger"><?php echo form_error('SWP_risk'); ?></span>
                <span class="text-danger"><?php echo form_error('SWP_control'); ?></span>
                </div>
                   <br><br>
                   
                <div id="section_3" class="sectiontarget">
                   <table width="920" class="table table-bordered">
                       <thead>
                           <tr>
                               <th class="tblTitle" colspan="4"><h8 id="section_3"><strong>Section 3 - Declaration</strong></h8></th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <p>I have checked and I hereby confirm that the above information is correct. I will obey and follow all the Standard Operating Procedures (SOP) and Safe Working Procedures (SWP) as stated in the laboratory rules and regulations.</p>
                               </td>
                           </tr>
                           <tr>
                               <td><input type="text" name="SWP_declaration_name" class="form-control" placeholder="Name & Signature:" value="<?php if(isset($load)){echo set_value('SWP_declaration_name', $item->SWP_declaration_name);}else{echo set_value('SWP_declaration_name');} ?>"></td>
                               
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="SWP_declaration_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('SWP_declaration_date', $item->SWP_declaration_date);}else{echo set_value('SWP_declaration_date');} ?>"></td>
                           </tr>
                       </tbody>
                   </table>
                <span class="text-danger"><?php echo form_error('SWP_declaration_name'); ?></span>
                <span class="text-danger"><?php echo form_error('SWP_declaration_date'); ?></span>
                </div>
                
                <div id="section_4" class="sectiontarget">
                   <table width="920" class="table table-bordered">
                       <thead>
                           <tr>
                               <th class="tblTitle" colspan="4"><h8 id="section_4"><strong>Section 4 - Signature</strong></h8></th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td>Prepared by:</td>
                               <td>Verified By (Project Investigator):</td>
                           </tr>
                           <tr>
                               <td><input type="text" class="form-control" name="SWP_signature_prepared_by" placeholder="Signature:" value="<?php if(isset($load)){echo set_value('SWP_signature_prepared_by', $item->SWP_signature_prepared_by);}else{echo set_value('SWP_signature_prepared_by');} ?>"></td>
                               
                               <td><input type="text" class="form-control" name="SWP_signature_PI" placeholder="Signature:" value="<?php if(isset($load)){echo set_value('SWP_signature_PI', $item->SWP_signature_PI);}else{echo set_value('SWP_signature_PI');} ?>"></td>
                           </tr>
                           <tr>
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="SWP_signature_prepared_by_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('SWP_signature_prepared_by_date', $item->SWP_signature_prepared_by_date);}else{echo set_value('SWP_signature_prepared_by_date');} ?>"></td>
                               
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="SWP_signature_PI_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('SWP_signature_PI_date', $item->SWP_signature_PI_date);}else{echo set_value('SWP_signature_PI_date');} ?>"></td>
                           </tr>
                       </tbody>
                   </table>
                <span class="text-danger"><?php echo form_error('SWP_signature_prepared_by'); ?></span>
                <span class="text-danger"><?php echo form_error('SWP_signature_PI'); ?></span>
                <span class="text-danger"><?php echo form_error('SWP_signature_prepared_by_date'); ?></span>
                <span class="text-danger"><?php echo form_error('SWP_signature_PI_date'); ?></span>
                </div>
                
                <div id="section_5" class="sectiontarget">
                   <table width="920" class="table table-bordered">
                       <thead>
                           <tr>
                               <th class="tblTitle" colspan="4"><h8 id="section_5"><strong>Section 5 - For Office Use Only</strong></h8></th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <p>Have the lab personnels gone through the training(s)?</p>
                                   
                                   <div class="checkbox">
                                        <label><input type="radio"  name="SWP_lab_trained" value="1">Yes</label>
                                        <label><input type="radio"  name="SWP_lab_trained" value="0">No </label>
                                   </div>
                                   
                                   <p>If yes, by who and when?</p>
                                   
                                   <input type="text" class="form-control" name="SWP_lab_trainer" value="<?php if(isset($load)){echo set_value('SWP_lab_trainer', $item->SWP_lab_trainer);}else{echo set_value('SWP_lab_trainer');} ?>">
                               </td>
                           </tr>
                           <tr>
                               <td>
                                <div class="checkbox">
                                     <label><input type="radio" name="SWP_approval_by" value="1">Approved By:</label>
                                    <input type="text" class="form-control" name="SWP_approved_by" value="<?php if(isset($load)){echo set_value('SWP_approved_by', $item->SWP_approved_by);}else{echo set_value('SWP_approved_by');} ?>">
                                </div>
                                <div class="checkbox">
                                     <label><input type="radio" name="SWP_approval_by" value="0">Declined By:</label>
                                    <input type="text" class="form-control" name="SWP_declined_by" value="<?php if(isset($load)){echo set_value('SWP_declined_by', $item->SWP_declined_by);}else{echo set_value('SWP_declined_by');} ?>">
                                </div>
                               </td>
                               <td style="width:450px">
                                   <input type="text" class="form-control" name="SWP_reviewed_by" placeholder="Reviewed by:" value="<?php if(isset($load)){echo set_value('SWP_reviewed_by', $item->SWP_reviewed_by);}else{echo set_value('SWP_reviewed_by');} ?>">
                               </td>
                           </tr>
                           <tr>
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="SWP_approve_decline_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('SWP_approve_decline_date', $item->SWP_approve_decline_date);}else{echo set_value('SWP_approve_decline_date');} ?>"></td>
                               
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="SWP_reviewed_by_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('SWP_reviewed_by_date', $item->SWP_reviewed_by_date);}else{echo set_value('SWP_reviewed_by_date');} ?>"></td>
                           </tr>
                           <tr>
                               <td>
                                   <input type="text" class="form-control" name="SWP_approve_decline_remarks" placeholder="Remarks:" value="<?php if(isset($load)){echo set_value('SWP_approve_decline_remarks', $item->SWP_approve_decline_remarks);}else{echo set_value('SWP_approve_decline_remarks');} ?>">
                               </td>
                               <td>
                                   <input type="text" class="form-control" name="SWP_reviewed_by_remarks" placeholder="Remarks:" value="<?php if(isset($load)){echo set_value('SWP_reviewed_by_remarks', $item->SWP_reviewed_by_remarks);}else{echo set_value('SWP_reviewed_by_remarks');} ?>">
                               </td>
                           </tr>
                       </tbody>
                   </table>

                   
                <div>
                    <input type="hidden" name="appid" value="<?php if(isset($appID)){echo $appID;} ?>">

                </div>
                <div style="text-align: center">
                       <?php if(isset($editload)){ ?>
                       <button type="submit" name = 'swp_update' value = 'Update' onclick="location.href='<?php echo site_url().'/swp/update_form';?>'" class="btn btn-primary">Update</button>
                       <?php }else{ ?>
                       <button name="submit" type="submit" class="btn btn-primary col-md-2">Submit</button>
                       <?php } ?>
                </div>
                
                   
               <?php if(isset($disabled)){ echo "</fieldset>"; } ?>
               <?php echo form_close(); ?>
               </div>
              </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


</body>

</html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Biosafety and Biosecurity Online System - Annex 5</title>
    
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
        
        .grey{
            background-color: grey;
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
    <?php include_once 'template/navbar.php' ?>
    
    <?php
    
    if(isset($load)){
        foreach($retrieved as $item){
        
        }
        
        
    }else{
           
        }
    
    ?>
    
    <div class="container">
        <div id='breadcrumb1'><?php echo $this->breadcrumbs->show(); ?></div>
        <hr>
        <div class="row">
            <div class="col-md-1">
            </div>
            
            <div class="col-md-9">
               <?php if(isset($editload)) { echo form_open('annex5/update_form'); } else { echo form_open('annex5/index'); } ?>
                <?php if(isset($disabled)){ echo "<fieldset disabled='disabled'>"; } ?>
                   <div class="text-muted">
                       <h5>Guidelines for Institutional Biosafety Committees:<br>
                       Use of Living Modified Organisms and Related Materials
                       </h5>
                   </div>
                   <br>
                   
                   <div>
                       <h3>
                           <strong>IBC/PE-NT/10/ANNEX5</strong>
                       </h3>
                   </div>
                   
                   <br>
                   
                   <div>
                       <h3>
                           <strong>PROJECT EXTENSION & NOTICE OF <br> TERMINATION</strong>
                       </h3>
                   </div>
                   
                   <div>
                       <h5>To be completed by Principal Investigator. Completed form should be submitted <br> to the NBB.</h5>
                       
                       <h5>Project Extension: If you wish to continue your modern biotechnology activities <br> you must complete this form and submit it to the IBC at least one month prior to <br> end of the current approval period of the project.</h5>
                       
                       <h5>Termination: If at any time you wish to terminate your modern biotechnology <br> activities, complete this form and submit it to the IBC.</h5>
                   </div>
                   
                   <div class="sectiontarget" id="section_1">
                       <h4><strong>1. Identification</strong></h4>
                       <ol type="a">
                           <li>Name of Principal Investigator: 
                               <div class="form_group">
                                   <input type="text" class="form-control" name="identification_PI_name" value="<?php if(isset($load)){echo set_value('identification_PI_name', $item->identification_PI_name);}else{echo set_value('identification_PI_name');} ?>">
                                   <span class="text-danger"><?php echo form_error('identification_PI_name'); ?></span>
                               </div>
                           </li>
                           <li>Email: 
                               <div class="form_group">
                                   <input type="email" class="form-control" name="identification_email_address" value="<?php if(isset($load)){echo set_value('identification_email_address', $item->identification_email_address);}else{echo set_value('identification_email_address');} ?>">
                                   <span class="text-danger"><?php echo form_error('identification_email_address'); ?></span>
                               </div>
                           </li>
                           <li>Faculty/Department: 
                               <div class="form_group">
                                   <input type="text" class="form-control" name="identification_faculty" value="<?php if(isset($load)){echo set_value('identification_faculty', $item->identification_faculty);}else{echo set_value('identification_faculty');} ?>">
                                   <span class="text-danger"><?php echo form_error('identification_faculty'); ?></span>
                               </div>
                           </li>
                           <li>Tel: 
                               <div class="form_group">
                                   <input type="tel" class="form-control" name="identification_telephone" value="<?php if(isset($load)){echo set_value('identification_telephone', $item->identification_telephone);}else{echo set_value('identification_telephone');} ?>">
                                   <span class="text-danger"><?php echo form_error('identification_telephone'); ?></span>
                               </div>
                           </li>
                           <li>IBC Reference No.: 
                               <div class="form_group">
                                   <input type="text" class="form-control" name="identification_IBC_reference_no" value="<?php if(isset($load)){echo set_value('identification_IBC_reference_no', $item->identification_IBC_reference_no);}else{echo set_value('identification_IBC_reference_no');} ?>">
                                    <span class="text-danger"><?php echo form_error('identification_IBC_reference_no'); ?></span>
                               </div>
                           </li>
                           <li>NBB Reference No. (if applicable): 
                               <div class="form_group">
                                   <input type="text" class="form-control" name="identification_NBB_reference_no" value="<?php if(isset($load)){echo set_value('identification_NBB_reference_no', $item->identification_NBB_reference_no);}else{echo set_value('identification_NBB_reference_no');} ?>">
                                   <span class="text-danger"><?php echo form_error('identification_NBB_reference_no'); ?></span>
                               </div>
                           </li>
                           <li>Project Title:
                               <div class="form_group">
                                   <input type="text" class="form-control" name="identification_project_title" value="<?php if(isset($load)){echo set_value('identification_project_title', $item->identification_project_title);}else{echo set_value('identification_project_title');} ?>">
                                   <span class="text-danger"><?php echo form_error('identification_project_title'); ?></span>
                               </div>
                           </li>
                           <li>Identify LMO/rDNA materials:
                               <div class="form_group">
                                   <input type="text" class="form-control" name="identification_LMO_rDNA" value="<?php if(isset($load)){echo set_value('identification_LMO_rDNA', $item->identification_LMO_rDNA);}else{echo set_value('identification_LMO_rDNA');} ?>">
                                   <span class="text-danger"><?php echo form_error('identification_LMO_rDNA'); ?></span>
                               </div>
                           </li>
                       </ol>
                   </div>
                   
                   <div class="sectiontarget" id="section_2">
                       <h4><strong>2. Request for Project Extension/Notice of Termination</strong></h4>
                       
                       <div class="radio">
                           <label>
                               <input type="radio" value="1" name="request_type" <?php echo set_radio('request_type', '1'); ?> <?php if(isset($load)){if($item->request_type==1){echo "checked=checked";}}else{} ?> >
                               &nbsp;request extend IBC approval of my use/possession of the LMO/rDNA materials described above. (Complete &nbsp;&nbsp;&nbsp;&nbsp;Sections C, and D below)
                           </label>
                       </div>
                       
                       <br>
                       
                       <div>OR</div>
                       
                       <br>
                       
                       <div class="radio">
                           <label>
                               <input type="radio" value="2" name="request_type" <?php echo set_radio('request_type', '2'); ?> <?php if(isset($load)){if($item->request_type==2){echo "checked=checked";}}else{} ?> >&nbsp;request termination of IBC approval. Describe when and how the LMO/rDNA materials identified above will be &nbsp;&nbsp;&nbsp;&nbsp; disposed of:
                           </label>
                       </div>
                       
                       <span class="text-danger"><?php echo form_error('request_type'); ?></span>
                   </div>
                   
                   <div class="sectiontarget" id="section_3">
                       <h4><strong>3. General Information</strong></h4>
                       
                       <ol type="a">
                           <li>
                               Will the Principal Investigator change?<br>
                                   <label class="radio-inline"><input type="radio" value="1" name="PI_change" <?php echo set_radio('PI_change', '1'); ?> <?php if(isset($load)){if($item->PI_change==1){echo "checked=checked";}}else{} ?> >Yes</label>
                               
                                   <label class="radio-inline"><input type="radio" value="0" name="PI_change" <?php echo set_radio('PI_change', '0'); ?> <?php if(isset($load)){if($item->PI_change==0){echo "checked=checked";}}else{} ?> >No</label>
                               <span class="text-danger"><?php echo form_error('PI_change'); ?></span>
                           </li>
                           <li>
                               Will the Risk Group (RG) change?<br>
                                   <label class="radio-inline"><input type="radio" value="1" name="RG_change" <?php echo set_radio('RG_change', '1'); ?> <?php if(isset($load)){if($item->RG_change==1){echo "checked=checked";}}else{} ?>>Yes</label>
                               
                                   <label class="radio-inline"><input type="radio" value="0" name="RG_change" <?php echo set_radio('RG_change', '0'); ?> <?php if(isset($load)){if($item->RG_change==0){echo "checked=checked";}}else{} ?>>No</label>
                               <span class="text-danger"><?php echo form_error('RG_change'); ?></span>
                           </li>
                           <li>
                               Will the Biosafety Level (BSL) change?<br>
                               <label class="radio-inline"><input type="radio" value="1" name="BSL_change" <?php echo set_radio('BSL_change', '1'); ?> <?php if(isset($load)){if($item->BSL_change==1){echo "checked=checked";}}else{} ?> >Yes</label> 
                               
                               <label class="radio-inline"><input type="radio" value="0" name="BSL_change" <?php echo set_radio('BSL_change', '0'); ?> <?php if(isset($load)){if($item->BSL_change==0){echo "checked=checked";}}else{} ?> >No</label>
                               
                               <span class="text-danger"><?php echo form_error('BSL_change'); ?></span>
                           </li>
                           <li>
                               Will the type or amount of LMO/rDNA materials change?<br>
                               <label class="radio-inline"><input type="radio" value="1" name="LMO_rDNA_type_change" <?php echo set_radio('LMO_rDNA_type_change', '1'); ?> <?php if(isset($load)){if($item->LMO_rDNA_type_change==1){echo "checked=checked";}}else{} ?>>Yes</label>         
                               
                               <label class="radio-inline"><input type="radio" value="0" name="LMO_rDNA_type_change" <?php echo set_radio('LMO_rDNA_type_change', '0'); ?> <?php if(isset($load)){if($item->LMO_rDNA_type_change==0){echo "checked=checked";}}else{} ?>>No</label>
                               
                               <span class="text-danger"><?php echo form_error('LMO_rDNA_type_change'); ?></span>
                           </li>
                           <li>
                               Will the LMO/rDNA materials be moved to another laboratory?<br>
                               <label class="radio-inline"><input type="radio" value="1" name="LMO_rDNA_moved" <?php echo set_radio('LMO_rDNA_moved', '1'); ?> <?php if(isset($load)){if($item->LMO_rDNA_moved==1){echo "checked=checked";}}else{} ?>>Yes</label>     
                               
                               <label class="radio-inline"><input type="radio" value="0" name="LMO_rDNA_moved" <?php echo set_radio('LMO_rDNA_moved', '0'); ?> <?php if(isset($load)){if($item->LMO_rDNA_moved==0){echo "checked=checked";}}else{} ?>>No</label>
                               <span class="text-danger"><?php echo form_error('LMO_rDNA_moved'); ?></span>
                           </li>
                          <li>
                               Will the use of the LMO/rDNA materials change?<br>
                               <label class="radio-inline"><input type="radio" value="1" name="LMO_rDNA_usage_change" <?php echo set_radio('LMO_rDNA_usage_change', '1'); ?> <?php if(isset($load)){if($item->LMO_rDNA_moved==1){echo "checked=checked";}}else{} ?> >Yes</label>               
                              
                               <label class="radio-inline"><input type="radio" value="0" name="LMO_rDNA_usage_change" <?php echo set_radio('LMO_rDNA_usage_change', '0'); ?> <?php if(isset($load)){if($item->LMO_rDNA_moved==0){echo "checked=checked";}}else{} ?> >No</label>
                              
                              <span class="text-danger"><?php echo form_error('LMO_rDNA_usage_change'); ?></span>
                           </li>
                       </ol>
                       
                       <p>
                           If the answer to any of the above questions (1–6) is Yes, you must submit an application form <strong>NBB/N/CU/10/ANNEX 5</strong>  (Notification for contained use and import for contained use activities for classes 1, 2, 3 and 4) to the NBB through IBC for approval before making any of these changes.
                       </p>
                       
                   </div>
                   
                   <div class="sectiontarget" id="section_4">
                       <h4><strong>4. Adverse Events</strong></h4>
                       
                       <ol type="a">
                           <li>
                               Have any adverse events occurred since the project approval or last request for project extension approval?<br>
                               <label class="radio-inline"><input type="radio" value="1" name="adverse_events" <?php echo set_radio('adverse_events', '1'); ?> <?php if(isset($load)){if($item->adverse_events==1){echo "checked=checked";}}else{} ?> >Yes</label>                             
                               <label class="radio-inline"><input type="radio" value="0" name="adverse_events" <?php echo set_radio('adverse_events', '0'); ?> <?php if(isset($load)){if($item->adverse_events==0){echo "checked=checked";}}else{} ?> >No</label>
                               
                               <span class="text-danger"><?php echo form_error('adverse_events'); ?></span>
                           </li>
                           <li>
                               If so, was an Incident Reporting Form submitted to the IBC as required by the IBC regulation?<br>
                               <label class="radio-inline"><input type="radio" value="1" name="incident_report" <?php echo set_radio('incident_report', '1'); ?> <?php if(isset($load)){if($item->incident_report==1){echo "checked=checked";}}else{} ?>>Yes</label>
                               
                               <label class="radio-inline"><input type="radio" value="0" name="incident_report" <?php echo set_radio('incident_report', '0'); ?> <?php if(isset($load)){if($item->incident_report==0){echo "checked=checked";}}else{} ?>>No</label>
                               <span class="text-danger"><?php echo form_error('incident_report'); ?></span>
                               
                           </li>
                       </ol>
                   </div>
                   
                   <div class="sectiontarget" id="section_5">
                       <h4><strong>5. Certification</strong></h4>
                       
                       <p>I certify that the above information accurately describes the current status of the modern biotechnology activities that was previously approved by the IBC. I understand that I must resubmit a new <strong>NBB/N/CU/10/ANNEX 5 </strong> (Notification for contained use and import for contained use activities for classes 1, 2, 3 and 4) form in the event my use of, or amount of LMO/rDNA materials changes, or if I have terminated my use /possession of LMO/rDNA and wish to begin modern biotechnology activity again.
                       </p>
                   </div>
                   
                   <div class="row">
                       <div class="col-md-6 form-group">
                           <textarea rows="2" class="form-control"></textarea>
                           <p>Signature of Principal Investigator</p>
                           <label class="control-label col-sm-2" for="signature_PI_name">Name:</label>
                           <div class="col-sm-10">
                               <input type="text" class="form-control" name="signature_PI_name" value="<?php if(isset($load)){echo set_value('signature_PI_name', $item->signature_PI_name);}else{echo set_value('signature_PI_name');} ?>">
                               <span class="text-danger"><?php echo form_error('signature_PI_name'); ?></span>
                           </div>
                           <label class="control-label col-sm-2" for="signature_PI_date">Date:</label>
                           <div class="col-sm-10">
                               <input type="date" class="form-control" name="signature_PI_date" value="<?php if(isset($load)){echo set_value('signature_PI_date', $item->signature_PI_date);}else{echo set_value('signature_PI_date');} ?>">
                               <span class="text-danger"><?php echo form_error('signature_PI_date'); ?></span>
                           </div>
                           
                       </div>
                       
                       <div class="col-md-6 form-group">
                           <textarea rows="2" class="form-control"></textarea>
                           <p>Signature of Biosafety Officer</p>
                           <label class="control-label col-sm-2" for="signature_BO_name">Name:</label>
                           <div class="col-sm-10">
                               <input type="text" class="form-control" name="signature_BO_name" value="<?php if(isset($load)){echo set_value('signature_BO_name', $item->signature_BO_name);}else{echo set_value('signature_BO_name');} ?>">
                               <span class="text-danger"><?php echo form_error('signature_BO_name'); ?></span>
                           </div>
                           <label class="control-label col-sm-2" for="signature_BO_date">Date:</label>
                           <div class="col-sm-10">
                               <input type="date" class="form-control" name="signature_BO_date" value="<?php if(isset($load)){echo set_value('signature_BO_date', $item->signature_BO_date);}else{echo set_value('signature_BO_date');} ?>">
                               <span class="text-danger"><?php echo form_error('signature_BO_date'); ?></span>
                           </div>
                           
                       </div>
                   </div>
                   
                   <div class="row">
                       <div class="col-md-6 form-group">
                           <textarea rows="2" class="form-control"></textarea>
                           <p>Signature of IBC Chair</p>
                           <label class="control-label col-sm-2" for="signature_IBC_name">Name:</label>
                           <div class="col-sm-10">
                               <input type="text" class="form-control" name="signature_IBC_name" value="<?php if(isset($load)){echo set_value('signature_IBC_name', $item->signature_IBC_name);}else{echo set_value('signature_IBC_name');} ?>">
                               <span class="text-danger"><?php echo form_error('signature_IBC_name'); ?></span>
                           </div>
                           <label class="control-label col-sm-2" for="signature_IBC_date" >Date:</label>
                           <div class="col-sm-10">
                               <input type="date" class="form-control" name="signature_IBC_date" value="<?php if(isset($load)){echo set_value('signature_IBC_date', $item->signature_IBC_date);}else{echo set_value('signature_IBC_date');} ?>">
                               <span class="text-danger"><?php echo form_error('signature_IBC_date'); ?></span>
                           </div>
                       </div> 
                   </div>
                   
                   <br>
                   
                   <div>
                       <p>Send a copy to NBB,</p>
                       <p>Department of Biosafety,<br>
                         Ministry of Natural Resources & Environment,<br>
                         Level 1, Podium 2,<br>
                         Precinct 4, 62574 Putrajaya.<br>
                         Tel: 03-88861580 Fax: 03-88904935<br>
                         </p>
                   </div>
                   
                   <div class="row">
                       <div class="col-md-6 grey">
                           <p><strong>IBC Use Only</strong></p>
                           
                            <div class="checkbox">
                              <label><input type="checkbox" name="IBC_approval" value="1" <?php echo set_checkbox('IBC_approval', '1'); ?> <?php if(isset($load)){if($item->IBC_approval==1){echo "checked=checked";}}else{} ?>> Use/Possession Approved</label>
                            </div>
                            <div class="checkbox">
                              <label><input type="checkbox" name="IBC_approval" value="2" <?php echo set_checkbox('IBC_approval', '2'); ?> <?php if(isset($load)){if($item->IBC_approval==2){echo "checked=checked";}}else{} ?>> Use/Possession Disapproved</label>
                            </div>
                            <div class="checkbox">
                              <label><input type="checkbox" name="IBC_termination" value="1" <?php echo set_checkbox('IBC_termination', '1'); ?> <?php if(isset($load)){if($item->IBC_termination==1){echo "checked=checked";}}else{} ?> > Termination Approved</label>
                            </div> 
                       </div>
                   </div>
                
                <br>
                
                <div>
                    <input type="hidden" name="appid" value="<?php if(isset($appID)){echo $appID;} ?>">
                </div>
                
                <div style="text-align: center">
                       <?php if(isset($editload)){ ?>
                       <button type="submit" name = 'updateButton' value = 'Update' onclick="location.href='<?php echo site_url().'/annex5/update_form';?>'" class="btn btn-primary">Update</button>
                       <?php }else{ ?>
                        <button name="submitButton" type="submit" class="btn btn-primary col-md-2">Submit</button>
                       <?php } ?>
                   </div>
                
               <?php if(isset($disabled)){ echo "</fieldset>"; } ?>
               <?php echo form_close(); ?>
            </div>
            
            <div class="col-md-2">
                <div class="btn-group-vertical btn-sample">
                    <a href="#top" class="btn btn-success">Top</a>
                    <a href="#section_1" class="btn btn-success">Section 1</a>
                    <a href="#section_2" class="btn btn-success">Section 2</a>
                    <a href="#section_3" class="btn btn-success">Section 3</a>
                    <a href="#section_4" class="btn btn-success">Section 4</a>
                       <?php if(isset($editload)){ ?>
                       <button type="submit" name = 'updateButton' value = 'Update' onclick="location.href='<?php echo site_url().'/annex5/update_form';?>'" class="btn btn-primary">Update</button>
                       <?php }else{ ?>
                        <button name="submitButton" type="submit" class="btn btn-primary">Submit</button>
                       <?php } ?>
                </div>   
            </div>
        </div>
        
        
    </div>
</body>
</html>
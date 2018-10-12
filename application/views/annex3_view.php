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
    <title>Biosafety and Biosecurity Online System - Annex 3</title>
    
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

        <div class="row">
            <div class="col-md-1">
            </div>
            
            <div class="col-md-9">
                <?php if(isset($editload)) { echo form_open('annex3/update_form'); } else { echo form_open('annex3/index'); } ?>
                <?php if(isset($disabled)){ echo "<fieldset disabled='disabled'>"; } ?>
                    <div>
                        <br/>
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                
                
                   <div class="text-muted">
                       <h5>Guidelines for Institutional Biosafety Committees:<br>
                       Use of Living Modified Organisms and Related Materials
                       </h5>
                   </div>
                   <br>
                   
                   <div>
                       <h3>
                           <strong>IBC/IR/10/ANNEX3</strong>
                       </h3>
                   </div>
                   
                   <br>
                   
                   <div>
                       <h3>
                           <strong>INSTITUTIONAL BIOSAFETY COMMITTEE <br>INCIDENT REPORTING FORM</strong>
                       </h3>
                   </div>
                   <hr>
                   <div>
                       <h5>To be completed by the <b>Principal Investigator/Laboratory personnel</b> involved in the incident.</h5>                      
                       <h5>This form is to be used by the BSO to report all incidents which did not result in injury.</h5>
                       <h5><b>Please complete and submit to the IBC within 24 hours and to the NBB within 48
							hours of the incident.</b></h5>
                   </div>
                   <hr>
				   
				   <div>
                       <h5><b>Reference No. :   </b></h5><input  maxlength="20" type="text" name="reference_no" value="<?php if(isset($load)){echo set_value('reference_no', $item->reference_no);}else{echo set_value('reference_no');} ?>">
				   </div>
				   
				  <hr>
                       
                       <div 
							class="form-group"><h6><strong>ORGANISATION :</strong></h6><input type="text" class="form-control" name="organization" id="organization" value="<?php if(isset($load)){echo set_value('organization', $item->organization);}else{echo set_value('organization');} ?>">
                           <span class="text-danger"><?php echo form_error('organization'); ?></span>
                       </div>
					   <div 
							class="form-group"><h6><strong>FACULTY/DEPARTMENT :</strong></h6><input type="text" class="form-control" name="faculty" id="faculty" value="<?php if(isset($load)){echo set_value('faculty', $item->faculty);}else{echo set_value('faculty');} ?>">
                           <span class="text-danger"><?php echo form_error('faculty'); ?></span>
                       </div>
					   <div 
							class="form-group"><h6><strong>LABORATORY :</strong></h6><input type="text" class="form-control" name="laboratory" id="laboratory" value="<?php if(isset($load)){echo set_value('laboratory', $item->laboratory);}else{echo set_value('laboratory');} ?>" >
                           <span class="text-danger"><?php echo form_error('laboratory'); ?></span>
                       </div>
					   <div 
							class="form-group"><h6><strong>DATE & TIME OF INCIDENT :</strong></h6><input type="date" class="form-control" name="date" id="date" value="<?php if(isset($load)){echo set_value('date', $item->date);}else{echo set_value('date');} ?>" >
                           <span class="text-danger"><?php echo form_error('date'); ?></span>
                       </div>
                   
                   <div id="section_1" class="sectiontarget">                      
                       <table class="table table-bordered">
                           <thead>
                                <tr>
                                   <th class="tblTitle" colspan="10"><h8><strong>PI/ LABORATORY PERSONEL INFORMATION</strong></h8></th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <th>PI/ Laboratory Personnel’s Name:</th>
                                   <td><input type="text" class="form-control" name="PI_name" value="<?php if(isset($load)){echo set_value('PI_name', $item->PI_name);}else{echo set_value('PI_name');} ?>"></td>
                               </tr>
							   <tr>
                                   <th>Telephone:</th>
                                   <td><input type="text" class="form-control" name="PI_telephone_number" value="<?php if(isset($load)){echo set_value('PI_telephone_number', $item->PI_telephone_number);}else{echo set_value('PI_telephone_number');} ?>"></td>
                               </tr>
							   
							                          
                           <tr>
                               <th colspan="2">
							       The incident was reported on
							   </th>                               
                           </tr>
                           <tr>
                               <td>DATE: <input type="date" class="form-control" name="PI_reported_date" value="<?php if(isset($load)){echo set_value('PI_reported_date', $item->PI_reported_date);}else{echo set_value('PI_reported_date');} ?>"></td>
                               <td>TIME: <input type="text" class="form-control" name="PI_reported_time" value="<?php if(isset($load)){echo set_value('PI_reported_time', $item->PI_reported_time);}else{echo set_value('PI_reported_time');} ?>"></td>
                           </tr>                
                           </tbody>
                       </table>
                       <span class="text-danger"><?php echo form_error('PI_name'); ?></span>
                       <span class="text-danger"><?php echo form_error('PI_telephone_number'); ?></span>
                       <span class="text-danger"><?php echo form_error('PI_reported_date'); ?></span>
                       <span class="text-danger"><?php echo form_error('PI_reported_time'); ?></span>
                   </div>
				   <hr>
				   
                <div id="section_2" class="sectiontarget">
				   <table class="table table-bordered">
                           <thead>
                                <tr>
                                   <th class="tblTitle" colspan="4"><h8><strong>IDENTIFY THE DIRECT AND CONTRIBUTING CAUSES OF THE INCIDENT</strong></h8></th>
                               </tr>
                           </thead>
                           <tbody>                               													   
                               <tr>
                                   <th colspan="4" class="tbheader1" id="part1" >1. Describe the incident (use appendix if necessary).</th>  
                               </tr> 
                           <tr>
                               <td colspan="4">
										<textarea rows="6" maxlength="500" name="incident_description" class="form-control" ><?php if(isset($load)){echo set_value('incident_description', $item->incident_description);}else{echo set_value('incident_description');} ?></textarea>
							   </td>
                           </tr>
                           </tbody>
						   <tbody>                               													   
                               <tr>
                                   <th colspan="4" class="tbheader1" id="part2" >2. Probable cause or causes of incident (tick 1 or more boxes for
										appropriate answers).
								   </th>  
                               </tr>
								<tr>                                   
                                   <td colspan="2">										
								   <div class="checkbox">
											<label><input type="checkbox" name="incident_cause_checklist_faulty_equipment" value="1" <?php echo set_checkbox('incident_cause_checklist_faulty_equipment', '1'); ?> <?php if(isset($load)){if($item->incident_cause_checklist_faulty_equipment==1){echo "checked=checked";}}else{} ?>> Fault of equipment</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_cause_checklist_no_equipment" value="1" <?php echo set_checkbox('incident_cause_checklist_no_equipment', '1'); ?> <?php if(isset($load)){if($item->incident_cause_checklist_no_equipment==1){echo "checked=checked";}}else{} ?>> Equipment unavailable</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_cause_checklist_storage" value="1" <?php echo set_checkbox('incident_cause_checklist_storage', '1'); ?> <?php if(isset($load)){if($item->incident_cause_checklist_storage==1){echo "checked=checked";}}else{} ?> > Poor storage</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_cause_checklist_weather" value="1" <?php echo set_checkbox('incident_cause_checklist_weather', '1'); ?> <?php if(isset($load)){if($item->incident_cause_checklist_weather==1){echo "checked=checked";}}else{} ?> > Weather</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_cause_checklist_assistance" value="1" <?php echo set_checkbox('incident_cause_checklist_assistance', '1'); ?> <?php if(isset($load)){if($item->incident_cause_checklist_assistance==1){echo "checked=checked";}}else{} ?> > Assistance unavailable</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_cause_checklist_electrical" value="1" <?php echo set_checkbox('incident_cause_checklist_electrical', '1'); ?> <?php if(isset($load)){if($item->incident_cause_checklist_electrical==1){echo "checked=checked";}}else{} ?> > Electrical fault</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_cause_checklist_carelessness" value="1" <?php echo set_checkbox('incident_cause_checklist_carelessness', '1'); ?> <?php if(isset($load)){if($item->incident_cause_checklist_carelessness==1){echo "checked=checked";}}else{} ?> > Carelessness</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_cause_checklist_terrain" value="1" <?php echo set_checkbox('incident_cause_checklist_terrain', '1'); ?> <?php if(isset($load)){if($item->incident_cause_checklist_terrain==1){echo "checked=checked";}}else{} ?> > Terrain</label>
									</div>
									
									</td>
                                   
                                   <td colspan="2">
									<div class="checkbox">
											<label><input type="checkbox" name="incident_cause_checklist_workspace" value="1" <?php echo set_checkbox('incident_cause_checklist_workspace', '1'); ?> <?php if(isset($load)){if($item->incident_cause_checklist_workspace==1){echo "checked=checked";}}else{} ?>> Inadequate workspace</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_cause_checklist_training" value="1" <?php echo set_checkbox('incident_cause_checklist_training', '1'); ?> <?php if(isset($load)){if($item->incident_cause_checklist_training==1){echo "checked=checked";}}else{} ?>> Lack of training</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_cause_checklist_poor_access" value="1" <?php echo set_checkbox('incident_cause_checklist_poor_access', '1'); ?> <?php if(isset($load)){if($item->incident_cause_checklist_poor_access==1){echo "checked=checked";}}else{} ?>> Poor access</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_cause_checklist_unknown" value="1" <?php echo set_checkbox('incident_cause_checklist_unknown', '1'); ?> <?php if(isset($load)){if($item->incident_cause_checklist_unknown==1){echo "checked=checked";}}else{} ?>> Unknown</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_cause_checklist_maintenance_staff" value="1" <?php echo set_checkbox('incident_cause_checklist_maintenance_staff', '1'); ?> <?php if(isset($load)){if($item->incident_cause_checklist_maintenance_staff==1){echo "checked=checked";}}else{} ?>> Fault and maintenance staff / engineer</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_cause_checklist_supervision" value="1" <?php echo set_checkbox('incident_cause_checklist_supervision', '1'); ?> <?php if(isset($load)){if($item->incident_cause_checklist_supervision==1){echo "checked=checked";}}else{} ?>> Lack of attention / supervision</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="" value="incident_cause_checklist_method" <?php echo set_checkbox('incident_cause_checklist_method', '1'); ?> <?php if(isset($load)){if($item->incident_cause_checklist_method==1){echo "checked=checked";}}else{} ?>> Incorrect method / work practices</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_cause_checklist_none" value="1" <?php echo set_checkbox('incident_cause_checklist_none', '1'); ?> <?php if(isset($load)){if($item->incident_cause_checklist_none==1){echo "checked=checked";}}else{} ?>> None of the above*</label>
									</div>															   
								   </td>
                               </tr>
                           <tr>
                               <td colspan="4">* State cause if not listed above:
										<textarea rows="6" maxlength="500" name="incident_cause_checklist_none_description" class="form-control" ><?php if(isset($load)){echo set_value('incident_cause_checklist_none_description', $item->incident_cause_checklist_none_description);}else{echo set_value('incident_cause_checklist_none_description');} ?></textarea>
							   </td>
                           </tr>
                           </tbody>
						  <tbody>                               													   
                               <tr>
                                   <th colspan="4" class="tbheader1" id="part3"> 3. Did the incident contribute to any release or dispersal of LMO/rDNA materials
										outside the containment/ field experiment area?
										<br>If “Yes” <input type="checkbox" name="incident_LMO_rDNA_release" value="1" <?php echo set_checkbox('incident_LMO_rDNA_release', '1'); ?> <?php if(isset($load)){if($item->incident_LMO_rDNA_release==1){echo "checked=checked";}}else{} ?>> , please "tick the check box" and state the emergency response plan taken.</th>  
                               </tr> 
                           <tr>
                               <td colspan="4">
										<textarea rows="6" maxlength="500" name="incident_LMO_rDNA_response" class="form-control" ><?php if(isset($load)){echo set_value('incident_LMO_rDNA_response', $item->incident_LMO_rDNA_response);}else{echo set_value('incident_LMO_rDNA_response');} ?></textarea>
							   </td>
                           </tr>
                           </tbody>
						   <tbody>                               													   
                               <tr>
                                   <th colspan="4" class="tbheader1" id="part4">4. What act(s) by the staff and/or others contributed to the incident (e.g. wrong
										tool or equipment, improper position or placement, work rule violation, failed to
										follow instructions, etc.)?</tr> 
                           <tr>
                               <td colspan="4">
										<textarea rows="6" maxlength="500" name="incident_contribution" class="form-control" ><?php if(isset($load)){echo set_value('incident_contribution', $item->incident_contribution);}else{echo set_value('incident_contribution');} ?></textarea>
							   </td>
                           </tr>
                           </tbody><tbody>                               													   
                               <tr>
                                   <th colspan="4" class="tbheader1" id="part5">5. What personal factors contributed to the incident (e.g. improper attitude,
										fatigue, inattention, substance abuse, failing to wear PPE etc.)?
							  </tr> 
                           <tr>
                               <td colspan="4">
										<textarea rows="6" maxlength="500" name="incident_personal_factors" class="form-control" ><?php if(isset($load)){echo set_value('incident_personal_factors', $item->incident_personal_factors);}else{echo set_value('incident_personal_factors');} ?></textarea>
							   </td>
                           </tr>
                           </tbody><tbody>                               													   
                               <tr>
                                   <th colspan="4" class="tbheader1" id="part6">6. What corrective actions have been or will be taken to prevent a recurrence
										of this type of incident (e.g. repair / modify / replace equipment, counseling,
										training, policies, procedures, etc.)?
							   </tr> 
                           <tr>
                               <td colspan="4">
										<textarea rows="6" maxlength="500" name="incident_corrective_actions" class="form-control" ><?php if(isset($load)){echo set_value('incident_corrective_actions', $item->incident_corrective_actions);}else{echo set_value('incident_corrective_actions');} ?></textarea>
							   </td>
                           </tr>
                           </tbody><tbody>                               													   
                               <tr>
                                   <th colspan="4" class="tbheader1" id="part7">7. Who is responsible to implement corrective actions?
							   </tr> 
                           <tr>
                               <td colspan="4">
										<textarea rows="6" maxlength="500" name="incident_responsible" class="form-control" ><?php if(isset($load)){echo set_value('incident_responsible', $item->incident_responsible);}else{echo set_value('incident_responsible');} ?></textarea>
							   </td>
                           </tr>
                           </tbody>
                    </table>
                </div>
                <span class="text-danger"><?php echo form_error('incident_description'); ?></span>
                <span class="text-danger"><?php echo form_error('incident_contribution'); ?></span>
                <span class="text-danger"><?php echo form_error('incident_personal_factors'); ?></span>
                <span class="text-danger"><?php echo form_error('incident_corrective_actions'); ?></span>
                <span class="text-danger"><?php echo form_error('incident_responsible'); ?></span>
                   
                   <div class="row">
                       <div class="col-md-6 form-group">
                           <textarea rows="2" class="form-control"></textarea>
                           <p>Signature of Principal Investigator</p>
                           
                           <label class="control-label col-sm-2" for="signature_PI_name">Name:</label>
                           <div class="col-sm-10">
                               <input type="text" class="form-control" name="signature_PI_name" value="<?php if(isset($load)){echo set_value('signature_PI_name', $item->signature_PI_name);}else{echo set_value('signature_PI_name');} ?>">
                           </div>
                           <span class="text-danger"><?php echo form_error('signature_PI_name'); ?></span>
                           
                           <label class="control-label col-sm-2" for="signature_PI_date">Date:</label>
                           <div class="col-sm-10">
                               <input type="date" class="form-control" name="signature_PI_date" value="<?php if(isset($load)){echo set_value('signature_PI_date', $item->signature_PI_date);}else{echo set_value('signature_PI_date');} ?>">
                           </div>
                           <span class="text-danger"><?php echo form_error('signature_PI_date'); ?></span>
                           
                       </div>
                       
                       <div class="col-md-6 form-group">
                           <textarea rows="2" class="form-control"></textarea>
                           <p>Signature of Biosafety Officer</p>
                           <label class="control-label col-sm-2" for="signature_BO_name">Name:</label>
                           <div class="col-sm-10">
                               <input type="text" class="form-control" name="signature_BO_name" value="<?php if(isset($load)){echo set_value('signature_BO_name', $item->signature_BO_name);}else{echo set_value('signature_BO_name');} ?>">
                           </div>
                           <label class="control-label col-sm-2" for="signature_BO_date">Date:</label>
                           <div class="col-sm-10">
                               <input type="date" class="form-control" name="signature_BO_date" value="<?php if(isset($load)){echo set_value('signature_BO_date', $item->signature_BO_date);}else{echo set_value('signature_BO_date');} ?>">
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
                           </div>
                           <label class="control-label col-sm-2" for="signature_PI_date">Date:</label>
                           <div class="col-sm-10">
                               <input type="date" class="form-control" name="signature_IBC_date" value="<?php if(isset($load)){echo set_value('signature_IBC_date', $item->signature_IBC_date);}else{echo set_value('signature_IBC_date');} ?>">
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
                   <hr/>
                
                <div>
                    <input type="hidden" name="appid" value="<?php if(isset($appID)){echo $appID;} ?>">
                </div>
				   

                  <div style="text-align: center">
                       <?php if(isset($editload)){ ?>
                       <button type="submit" name = 'annex3_update' value = 'Update' onclick="location.href='<?php echo site_url().'/annex3/update_form';?>'" class="btn btn-primary">Update</button>
                       <?php }else{ ?>
                       <button name="submit" type="submit" class="btn btn-primary col-md-2">Submit</button>
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
                </div>   
            </div>
        </div>
        
        
    </div>
</body>
</html>
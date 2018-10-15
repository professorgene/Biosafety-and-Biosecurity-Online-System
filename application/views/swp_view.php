
    <?php
    
    if(isset($load)){
        foreach($retrieved6 as $swp){
            
        }
        
        
    }else{
           
        }
    
    ?>
    
        <div class="row">
            
            <div class="col-md-10">
               
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
                                   <td><input type="text" name="SWP_prepared_by" class="form-control" value="<?php if(isset($load)){echo set_value('SWP_prepared_by', $swp->SWP_prepared_by);}else{echo set_value('SWP_prepared_by');} ?>"></td>
                                   
                                   
                                   <th class="tbheader1">1.02 Staff/Student No.:</th>
                                   <td><input type="text" name="SWP_staff_student_no" class="form-control" value="<?php if(isset($load)){echo set_value('SWP_staff_student_no', $swp->SWP_staff_student_no);}else{echo set_value('SWP_staff_student_no');} ?>"></td>
                                   
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.03 Designation:</th>
                                   <td><input type="text" class="form-control" name="SWP_designation" value="<?php if(isset($load)){echo set_value('SWP_designation', $swp->SWP_designation);}else{echo set_value('SWP_designation');} ?>"></td>
                                   
                                   
                                   <th class="tbheader1">1.04 Faculty/unit:</th>
                                   <td><input type="text" class="form-control" name="SWP_faculty" value="<?php if(isset($load)){echo set_value('SWP_faculty', $swp->SWP_faculty);}else{echo set_value('SWP_faculty');} ?>"></td>
                                   
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.05 Unit Code/Unit Title (if teaching):</th>
                                   <td colspan="4"><input type="text" class="form-control" name="SWP_unit_title" value="<?php if(isset($load)){echo set_value('SWP_unit_title', $swp->SWP_unit_title);}else{echo set_value('SWP_unit_title');} ?>"></td>
                                   
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.06 Project Title (if research):</th>
                                   <td colspan="4"><input type="text" class="form-control" name="SWP_project_title" value="<?php if(isset($load)){echo set_value('SWP_project_title', $swp->SWP_project_title);}else{echo set_value('SWP_project_title');} ?>"></td>
                                   
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.07 Location: </th>
                                   <td colspan="4"><input type="text" class="form-control" name="SWP_location" value="<?php if(isset($load)){echo set_value('SWP_location', $swp->SWP_location);}else{echo set_value('SWP_location');} ?>"></td>
                                   
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
                               <td><textarea rows="3" name="SWP_description" class="form-control"><?php if(isset($load)){echo set_value('SWP_description', $swp->SWP_description);}else{echo set_value('SWP_description');} ?></textarea></td>
                           </tr>
                           <tr>
                               <th class="tbheader1">A. Pre-operational</th>
                           </tr>
                           <tr>
                               <td><textarea class="form-control" rows="40" name="SWP_preoperational" placeholder="E.g. Proper lab attire; proper personal protective equipment; hand hygiene; understand the equipment SOPs etc."><?php if(isset($load)){echo set_value('SWP_preoperational', $swp->SWP_preoperational);}else{echo set_value('SWP_preoperational');} ?></textarea></td>
                               
                           </tr>
                           
                           <tr>
                               <th class="tbheader1">B. Operational</th>
                           </tr>
                           <tr>
                               <td><textarea class="form-control" name="SWP_operational" rows="45" placeholder="E.g. Proper handling of the specimens/samples; samples processing in BSC; imaging of the specimens using microscopes; analyzing samples using plate reader; emergency response to biological spills or accident etc." value=""><?php if(isset($load)){echo set_value('SWP_operational', $swp->SWP_operational);}else{echo set_value('SWP_operational');} ?></textarea></td>
                           </tr>
                           
                           <tr>
                              <th class="tbheader1">C. Post-operational</th>
                           </tr>
                           <tr>
                               <td>
                                   <textarea class="form-control" name="SWP_postoperational" rows="45" placeholder="E.g. Proper labelling, storage and transportation of the specimens/samples; decontamination and disposal of the specimens/samples (solid/liquid waste); cleaning of the workspaces and equipment etc."><?php if(isset($load)){echo set_value('SWP_postoperational', $swp->SWP_postoperational);}else{echo set_value('SWP_postoperational');} ?></textarea>
                               </td>
                           </tr>
                           
                           <tr>
                               <th class="tbheader1">D. Potential Hazard Identification and Risk of Exposure to Hazards</th>
                           </tr>
                           <tr>
                               <td>
                                   <textarea class="form-control" name="SWP_risk" rows="5" ><?php if(isset($load)){echo set_value('SWP_risk', $swp->SWP_risk);}else{echo set_value('SWP_risk');} ?></textarea>
                               </td>
                           </tr>
                           
                           <tr>
                               <th class="tbheader1">E. Exposure Control Specific to the above mentioned Hazards</th>
                           </tr>
                           <tr>
                               <td>
                                   <textarea class="form-control" name="SWP_control" rows="5"><?php if(isset($load)){echo set_value('SWP_control', $swp->SWP_control);}else{echo set_value('SWP_control');} ?></textarea>
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
                               <td><input type="text" name="SWP_declaration_name" class="form-control" placeholder="Name & Signature:" value="<?php if(isset($load)){echo set_value('SWP_declaration_name', $swp->SWP_declaration_name);}else{echo set_value('SWP_declaration_name');} ?>"></td>
                               
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="SWP_declaration_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('SWP_declaration_date', $swp->SWP_declaration_date);}else{echo set_value('SWP_declaration_date');} ?>"></td>
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
                               <td><input type="text" class="form-control" name="SWP_signature_prepared_by" placeholder="Signature:" value="<?php if(isset($load)){echo set_value('SWP_signature_prepared_by', $swp->SWP_signature_prepared_by);}else{echo set_value('SWP_signature_prepared_by');} ?>"></td>
                               
                               <td><input type="text" class="form-control" name="SWP_signature_PI" placeholder="Signature:" value="<?php if(isset($load)){echo set_value('SWP_signature_PI', $swp->SWP_signature_PI);}else{echo set_value('SWP_signature_PI');} ?>"></td>
                           </tr>
                           <tr>
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="SWP_signature_prepared_by_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('SWP_signature_prepared_by_date', $swp->SWP_signature_prepared_by_date);}else{echo set_value('SWP_signature_prepared_by_date');} ?>"></td>
                               
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="SWP_signature_PI_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('SWP_signature_PI_date', $swp->SWP_signature_PI_date);}else{echo set_value('SWP_signature_PI_date');} ?>"></td>
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
                                   
                                   <input type="text" class="form-control" name="SWP_lab_trainer" value="<?php if(isset($load)){echo set_value('SWP_lab_trainer', $swp->SWP_lab_trainer);}else{echo set_value('SWP_lab_trainer');} ?>">
                               </td>
                           </tr>
                           <tr>
                               <td>
                                <div class="checkbox">
                                     <label><input type="radio" name="SWP_approval_by" value="1">Approved By:</label>
                                    <input type="text" class="form-control" name="SWP_approved_by" value="<?php if(isset($load)){echo set_value('SWP_approved_by', $swp->SWP_approved_by);}else{echo set_value('SWP_approved_by');} ?>">
                                </div>
                                <div class="checkbox">
                                     <label><input type="radio" name="SWP_approval_by" value="0">Declined By:</label>
                                    <input type="text" class="form-control" name="SWP_declined_by" value="<?php if(isset($load)){echo set_value('SWP_declined_by', $swp->SWP_declined_by);}else{echo set_value('SWP_declined_by');} ?>">
                                </div>
                               </td>
                               <td style="width:450px">
                                   <input type="text" class="form-control" name="SWP_reviewed_by" placeholder="Reviewed by:" value="<?php if(isset($load)){echo set_value('SWP_reviewed_by', $swp->SWP_reviewed_by);}else{echo set_value('SWP_reviewed_by');} ?>">
                               </td>
                           </tr>
                           <tr>
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="SWP_approve_decline_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('SWP_approve_decline_date', $swp->SWP_approve_decline_date);}else{echo set_value('SWP_approve_decline_date');} ?>"></td>
                               
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="SWP_reviewed_by_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('SWP_reviewed_by_date', $swp->SWP_reviewed_by_date);}else{echo set_value('SWP_reviewed_by_date');} ?>"></td>
                           </tr>
                           <tr>
                               <td>
                                   <input type="text" class="form-control" name="SWP_approve_decline_remarks" placeholder="Remarks:" value="<?php if(isset($load)){echo set_value('SWP_approve_decline_remarks', $swp->SWP_approve_decline_remarks);}else{echo set_value('SWP_approve_decline_remarks');} ?>">
                               </td>
                               <td>
                                   <input type="text" class="form-control" name="SWP_reviewed_by_remarks" placeholder="Remarks:" value="<?php if(isset($load)){echo set_value('SWP_reviewed_by_remarks', $swp->SWP_reviewed_by_remarks);}else{echo set_value('SWP_reviewed_by_remarks');} ?>">
                               </td>
                           </tr>
                       </tbody>
                   </table>

                   
                <div>
                    <input type="hidden" name="appid" value="<?php if(isset($appID)){echo $appID;} ?>">

                </div>
                <div style="text-align: center">
                       
                       <?php if(isset($editload)){ ?>
                       <button type="submit" name = 'updateButton' value = 'Update' onclick="location.href='<?php echo site_url().'/swp/update_form';?>'" class="btn btn-primary">Update</button>
                       <?php }else{ ?>
                       <button name="saveButton" type="submit" class="btn btn-primary col-md-2">Save</button>
                       <button name="submitButton" type="submit" class="btn btn-primary col-md-2">Submit</button>
                       <?php } ?>
                </div>
                
                   
               
                    </div>
            
                </div>
        
            </div>
            
            <div class="col-md-2">
                    <div class="btn-group-vertical btn-sample">
                        <a href="#top" class="btn btn-success">Top</a>
                        <a href="#section_1" class="btn btn-success">Section 1</a>
                        <a href="#section_2" class="btn btn-success">Section 2</a>
                        <a href="#section_3" class="btn btn-success">Section 3</a>
                        <a href="#section_4" class="btn btn-success">Section 4</a>
                        <a href="#section_5" class="btn btn-success">Section 5</a>
                    </div>   
                </div>
            
            
	</div>
	
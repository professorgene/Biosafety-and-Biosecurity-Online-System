
    <?php
    
    if(isset($load)){
        foreach($retrieved6 as $swp){
            
        }
        
        
    }else{
           
        }
    
    ?>
    
        <div class="row">
            <div class="col-md-10">
               <img class="card-img-top" src="<?php echo base_url('assets\images\FormLogo\SWP.jpg') ?>" alt="">	
                   <div>
                       <h5><strong>PLEASE FILL IN ALL INFORMATION REQUESTED</strong></h5>
                   </div>
                   
                   <br>
                   
                   <table class="table table-bordered">
                       <thead class="tblTitle2">
                           <tr>
                               <th>DATE RECEIVED</th>
                               <th>SBC REFERENCE NUMBER</th>
                           </tr>
                       </thead>
                       <tbody class="tblTitle2">
                           <tr>
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="date_received" placeholder="Office use only" value="<?php if(isset($load)){echo set_value('date_received', $swp->date_received);}else{echo set_value('date_received');} ?>" <?php if($this->session->userdata('account_type') != 4){echo "disabled";} ?> rows="1">
                               </td>
                               <td>
                                   <input type="text" class="form-control" name="SBC_reference_no" placeholder="Office use only" value="<?php if(isset($load)){echo set_value('SBC_reference_no', $swp->SBC_reference_no);}else{echo set_value('SBC_reference_no');} ?>" <?php if($this->session->userdata('account_type') != 4){echo "disabled";} ?> rows="1">
                               </td>
                           </tr>
                       </tbody>
                </table>
                   
                <div id="swp_section_1" class="sectiontarget">
                   <table class="table table-bordered" id="section_1">
                           <thead>
                                <tr>
                                   <th class="tblTitle" colspan="4"><h8 id="section_1"><strong>Section 1 - General Details</strong></h8></th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <th class="tbheader1">1.01 SWP Prepared by:</th>
                                   <td>
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> name="SWP_prepared_by" class="form-control"><?php if(isset($load)){echo set_value('SWP_prepared_by', $swp->SWP_prepared_by);}else{echo set_value('SWP_prepared_by');} ?></textarea>
                                   </td>
                                   
                                   
                                   <th class="tbheader1">1.02 Staff/Student No.:</th>
                                   <td>
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> name="SWP_staff_student_no" class="form-control"><?php if(isset($load)){echo set_value('SWP_staff_student_no', $swp->SWP_staff_student_no);}else{echo set_value('SWP_staff_student_no');} ?></textarea>
                                   </td>
                                   
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.03 Designation:</th>
                                   <td>
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_designation"><?php if(isset($load)){echo set_value('SWP_designation', $swp->SWP_designation);}else{echo set_value('SWP_designation');} ?></textarea>
                                   </td>
                                   
                                   
                                   <th class="tbheader1">1.04 Faculty/unit:</th>
                                   <td>
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_faculty"><?php if(isset($load)){echo set_value('SWP_faculty', $swp->SWP_faculty);}else{echo set_value('SWP_faculty');} ?></textarea>
                                   </td>
                                   
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.05 Unit Code/Unit Title (if teaching):</th>
                                   <td colspan="4">
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_unit_title"><?php if(isset($load)){echo set_value('SWP_unit_title', $swp->SWP_unit_title);}else{echo set_value('SWP_unit_title');} ?></textarea>
                                   </td>
                                   
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.06 Project Title (if research):</th>
                                   <td colspan="4">
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_project_title"><?php if(isset($load)){echo set_value('SWP_project_title', $swp->SWP_project_title);}else{echo set_value('SWP_project_title');} ?></textarea>
                                   </td>
                                   
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.07 Location: </th>
                                   <td colspan="4">
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_location"><?php if(isset($load)){echo set_value('SWP_location', $swp->SWP_location);}else{echo set_value('SWP_location');} ?></textarea>
                                   </td>
                                   
                               </tr>
                               
                           </tbody>
                       </table>

                   
                   <br><input type="hidden" value="<?php if(isset($hirarctype)){echo $hirarctype;} ?>" name="application_type" />
                   
                <div id="swp_section_2" class="sectiontarget">
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
                               <td><textarea <?php if(isset($disabled)){echo "disabled";} ?> rows="3" name="SWP_description" class="form-control"><?php if(isset($load)){echo set_value('SWP_description', $swp->SWP_description);}else{echo set_value('SWP_description');} ?></textarea></td>
                           </tr>
                           <tr>
                               <th class="tbheader1">A. Pre-operational</th>
                           </tr>
                           <tr>
                               <td><textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" rows="40" name="SWP_preoperational" placeholder="E.g. Proper lab attire; proper personal protective equipment; hand hygiene; understand the equipment SOPs etc."><?php if(isset($load)){echo set_value('SWP_preoperational', $swp->SWP_preoperational);}else{echo set_value('SWP_preoperational');} ?></textarea></td>
                               
                           </tr>
                           
                           <tr>
                               <th class="tbheader1">B. Operational</th>
                           </tr>
                           <tr>
                               <td><textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_operational" rows="45" placeholder="E.g. Proper handling of the specimens/samples; samples processing in BSC; imaging of the specimens using microscopes; analyzing samples using plate reader; emergency response to biological spills or accident etc." value=""><?php if(isset($load)){echo set_value('SWP_operational', $swp->SWP_operational);}else{echo set_value('SWP_operational');} ?></textarea></td>
                           </tr>
                           
                           <tr>
                              <th class="tbheader1">C. Post-operational</th>
                           </tr>
                           <tr>
                               <td>
                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_postoperational" rows="45" placeholder="E.g. Proper labelling, storage and transportation of the specimens/samples; decontamination and disposal of the specimens/samples (solid/liquid waste); cleaning of the workspaces and equipment etc."><?php if(isset($load)){echo set_value('SWP_postoperational', $swp->SWP_postoperational);}else{echo set_value('SWP_postoperational');} ?></textarea>
                               </td>
                           </tr>
                           
                           <tr>
                               <th class="tbheader1">D. Potential Hazard Identification and Risk of Exposure to Hazards</th>
                           </tr>
                           <tr>
                               <td>
                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_risk" rows="5" ><?php if(isset($load)){echo set_value('SWP_risk', $swp->SWP_risk);}else{echo set_value('SWP_risk');} ?></textarea>
                               </td>
                           </tr>
                           
                           <tr>
                               <th class="tbheader1">E. Exposure Control Specific to the above mentioned Hazards</th>
                           </tr>
                           <tr>
                               <td>
                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_control" rows="5"><?php if(isset($load)){echo set_value('SWP_control', $swp->SWP_control);}else{echo set_value('SWP_control');} ?></textarea>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                
                </div>
                   <br><br>
                   
                <div id="swp_section_3" class="sectiontarget">
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
                               <td>
                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> name="SWP_declaration_name" class="form-control" placeholder="Name & Signature:"><?php if(isset($load)){echo set_value('SWP_declaration_name', $swp->SWP_declaration_name);}else{echo set_value('SWP_declaration_name');} ?></textarea>
                               </td>
                               
                               <td>
                                   <input <?php if(isset($disabled)){echo "disabled";} ?> type="date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='date')" name="SWP_declaration_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('SWP_declaration_date', $swp->SWP_declaration_date);}else{echo set_value('SWP_declaration_date');} ?>">
                               </td>
                           </tr>
                       </tbody>
                   </table>
                
                </div>
                
                <div id="swp_section_4" class="sectiontarget">
                   <table width="920" class="table table-bordered">
                       <thead>
                           <tr>
                               <th class="tblTitle" colspan="4"><h8 id="section_4"><strong>Section 4 - Signature</strong></h8></th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td>
                                   Prepared by:<textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_name"><?php if(isset($load)){echo set_value('SWP_name', $swp->SWP_name);}else{echo set_value('SWP_name');} ?></textarea>
                               </td>
                               <td>
                                   Verified By (Project Investigator):<textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_PI" placeholder="Signature:"><?php if(isset($load)){echo set_value('SWP_PI', $swp->SWP_PI);}else{echo set_value('SWP_PI');} ?></textarea>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_signature_prepared_by" placeholder="Name and Signature"><?php if(isset($load)){echo set_value('SWP_signature_prepared_by', $swp->SWP_signature_prepared_by);}else{echo set_value('SWP_signature_prepared_by');} ?></textarea>
                               </td>
                               
                               <td>
                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_signature_PI" placeholder="Name and Signature"><?php if(isset($load)){echo set_value('SWP_signature_PI', $swp->SWP_signature_PI);}else{echo set_value('SWP_signature_PI');} ?></textarea>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <input <?php if(isset($disabled)){echo "disabled";} ?> type="date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="SWP_signature_prepared_by_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('SWP_signature_prepared_by_date', $swp->SWP_signature_prepared_by_date);}else{echo set_value('SWP_signature_prepared_by_date');} ?>">
                               </td>
                               
                               <td>
                                   <input <?php if(isset($disabled)){echo "disabled";} ?> type="date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="SWP_signature_PI_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('SWP_signature_PI_date', $swp->SWP_signature_PI_date);}else{echo set_value('SWP_signature_PI_date');} ?>">
                               </td>
                           </tr>
                       </tbody>
                   </table>
                
                </div>
                
                <div id="swp_section_5" class="sectiontarget">
                   <table width="920" class="table table-bordered">
                       <thead>
                           <tr>
                               <th class="tblTitle" colspan="4"><h8><strong>Section 5 - For Office Use Only</strong></h8></th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <p>Have the lab personnel gone through the training(s)?</p>
                                   
                                   <div class="checkbox">
                                       <label class="radio-inline"><input <?php if(isset($disabled)){echo "disabled";} ?> type="radio" value="yes" name="SWP_lab_trained" <?php if($this->session->userdata('account_type') != 2 || $this->session->userdata('account_type') != 4){echo "disabled";} ?> <?php if(isset($load)){if($swp->SWP_lab_trained=='yes'){echo set_radio('SWP_lab_trained', 'yes', TRUE);}} ?>> Yes</label>
                                               
                                       <label class="radio-inline"><input <?php if(isset($disabled)){echo "disabled";} ?> type="radio" value="no" name="officer_notified" <?php if($this->session->userdata('account_type') != 2 || $this->session->userdata('account_type') != 4){echo "disabled";} ?> <?php echo set_radio('SWP_lab_trained', 'no', FALSE); ?> <?php if(isset($load)){if($swp->SWP_lab_trained=='no'){echo set_radio('SWP_lab_trained', 'no', TRUE);}} ?>> No</label>
                                       
                                   </div>
                                   
                                   <p>If yes, by who and when?</p>
                                   
                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_lab_trainer" <?php if($this->session->userdata('account_type') != 2 || $this->session->userdata('account_type') != 4){echo "disabled";} ?> ><?php if(isset($load)){echo set_value('SWP_lab_trainer', $swp->SWP_lab_trainer);}else{echo set_value('SWP_lab_trainer');} ?></textarea>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                <div class="checkbox">
                                     <label><input type="radio" name="SWP_approval_by" value="1">Approved By:</label>
                                    <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_approved_by" <?php if($this->session->userdata('account_type') != 2 || $this->session->userdata('account_type') != 4){echo "disabled";} ?> ><?php if(isset($load)){echo set_value('SWP_approved_by', $swp->SWP_approved_by);}else{echo set_value('SWP_approved_by');} ?></textarea>
                                </div>
                                <div class="checkbox">
                                     <label><input type="radio" name="SWP_approval_by" value="0">Declined By:</label>
                                    <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_declined_by" <?php if($this->session->userdata('account_type') != 2 || $this->session->userdata('account_type') != 4){echo "disabled";} ?> ><?php if(isset($load)){echo set_value('SWP_declined_by', $swp->SWP_declined_by);}else{echo set_value('SWP_declined_by');} ?></textarea>
                                </div>
                               </td>
                               <td style="width:450px">
                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_reviewed_by" placeholder="Reviewed by:" <?php if($this->session->userdata('account_type') != 2 || $this->session->userdata('account_type') != 4){echo "disabled";} ?> ><?php if(isset($load)){echo set_value('SWP_reviewed_by', $swp->SWP_reviewed_by);}else{echo set_value('SWP_reviewed_by');} ?></textarea>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <input <?php if(isset($disabled)){echo "disabled";} ?> type="date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="SWP_approve_decline_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('SWP_approve_decline_date', $swp->SWP_approve_decline_date);}else{echo set_value('SWP_approve_decline_date');} ?>" <?php if($this->session->userdata('account_type') != 2 || $this->session->userdata('account_type') != 4){echo "disabled";} ?>>
                               </td>
                               
                               <td>
                                   <input <?php if(isset($disabled)){echo "disabled";} ?> type="date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="SWP_reviewed_by_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('SWP_reviewed_by_date', $swp->SWP_reviewed_by_date);}else{echo set_value('SWP_reviewed_by_date');} ?>" <?php if($this->session->userdata('account_type') != 2 || $this->session->userdata('account_type') != 4){echo "disabled";} ?>>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_approve_decline_remarks" placeholder="Remarks:" <?php if($this->session->userdata('account_type') != 2 || $this->session->userdata('account_type') != 4){echo "disabled";} ?> ><?php if(isset($load)){echo set_value('SWP_approve_decline_remarks', $swp->SWP_approve_decline_remarks);}else{echo set_value('SWP_approve_decline_remarks');} ?></textarea>
                               </td>
                               <td>
                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="SWP_reviewed_by_remarks" placeholder="Remarks:" <?php if($this->session->userdata('account_type') != 2 || $this->session->userdata('account_type') != 4){echo "disabled";} ?> ><?php if(isset($load)){echo set_value('SWP_reviewed_by_remarks', $swp->SWP_reviewed_by_remarks);}else{echo set_value('SWP_reviewed_by_remarks');} ?></textarea>
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
                        <button name="saveButton" type="submit" class="btn btn-primary col-md-2" <?php if(isset($disabled)){echo "disabled='disabled'";} ?>>Save</button>
                        <button name="submitButton" type="submit" class="btn btn-primary col-md-2" <?php if(isset($disabled)){echo "disabled='disabled'";} ?>>Submit</button>
                        <?php } ?>
                    </div>
                
                   
               
                    </div>
            
                </div>
        
            </div>
            
            <div class="col-md-2">
                    <div class="btn-group-vertical btn-sample">
                        <a href="#top" class="btn btn-success">Top</a>
                        <a href="#swp_section_1" class="btn btn-success">Section 1</a>
                        <a href="#swp_section_2" class="btn btn-success">Section 2</a>
                        <a href="#swp_section_3" class="btn btn-success">Section 3</a>
                        <a href="#swp_section_4" class="btn btn-success">Section 4</a>
                        <a href="#swp_section_5" class="btn btn-success">Section 5</a>
                        <?php if(isset($editload)){ ?>
                        <button type="submit" name = 'updateButton' value = 'Update' onclick="location.href='<?php echo site_url().'/annex2/update_form';?>'" class="btn btn-primary">Update</button>
                        <?php }else{ ?>
                        <button name="saveButton" type="submit" class="btn btn-primary" <?php if(isset($disabled)){echo "disabled='disabled'";} ?>>Save</button>
                        <button name="submitButton" type="submit" class="btn btn-primary" <?php if(isset($disabled)){echo "disabled='disabled'";} ?>>Submit</button>
                        <?php } ?>
                    </div>   
                </div>
            
            
	</div>
	
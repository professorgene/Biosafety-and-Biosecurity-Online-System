    <?php
    
    if(isset($load)){
        foreach($retrieved as $item){
            
        }
        
        
    }else{
           
        }
    
    ?>
    
        <div class="row">
            
            <div class="col-md-10">
               <?php if(isset($editload)) { echo form_open('notification_of_LMO_and_BM/update_form'); } else { echo form_open('notification_of_LMO_and_BM/index'); } ?>
                <?php if(isset($disabled)){ echo "<fieldset disabled='disabled'>"; } ?>
                   <div>
                       <h5 class="dark_background">PLEASE FILL IN ALL INFORMATION REQUESTED</h5>
                   </div>
                
                
                
                <div>
                        <br/>
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                   
                   <p><strong>Important Note:</strong></p>
                   <p>This form is to be completed when new LMOs or biohazardous materials has been acquired.  </p>
                   
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
                                   <th class="tblTitle" colspan="4"><h8 id="section_1"><strong>Section 1 - Personnel Details</strong></h8></th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <th class="tbheader1">1.01 Name (as per I.C. / Passport):</th>
                                   <td><div class="form-group"><input type="text" name="personnel_name" class="form-control" value="<?php if(isset($load)){echo set_value('personnel_name', $item->personnel_name);}else{echo set_value('personnel_name');} ?>"></div></td>
                                   
                                   <th class="tbheader1">1.02 1.02   Staff / Student No.:</th>
                                   <td><div class="form-group"><input type="text" name="personnel_staff_student_no" class="form-control" value="<?php if(isset($load)){echo set_value('personnel_staff_student_no', $item->personnel_staff_student_no);}else{echo set_value('personnel_staff_student_no');} ?>" ></div></td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.03 Designation:</th>
                                   <td><input type="text" class="form-control" name="personnel_designation" value="<?php if(isset($load)){echo set_value('personnel_designation', $item->personnel_designation);}else{echo set_value('personnel_designation');} ?>" ></td>
                                   
                                   <th class="tbheader1">1.04 Faculty/unit:</th>
                                   <td><input type="text" class="form-control" name="personnel_faculty" value="<?php if(isset($load)){echo set_value('personnel_faculty', $item->personnel_faculty);}else{echo set_value('personnel_faculty');} ?>" ></td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.05 Unit Code/Unit Title (if teaching):</th>
                                   <td colspan="4"><input type="text" class="form-control" name="personnel_unit_code" value="<?php if(isset($load)){echo set_value('personnel_unit_code', $item->personnel_unit_code);}else{echo set_value('personnel_unit_code');} ?>"></td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.06 Project Title and Ref. No. (if FYP / research):</th>
                                   <td colspan="4"><input type="text" class="form-control" name="personnel_project_title" value="<?php if(isset($load)){echo set_value('personnel_project_title', $item->personnel_project_title);}else{echo set_value('personnel_project_title');} ?>" ></td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.07 Storage Location: </th>
                                   <td colspan="4"><input type="text" class="form-control" name="personnel_storage" value="<?php if(isset($load)){echo set_value('personnel_storage', $item->personnel_storage);}else{echo set_value('personnel_storage');} ?>" ></td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.08 Name of the Keeper: </th>
                                   <td colspan="4"><input type="text" class="form-control" name="personnel_keeper_name" value="<?php if(isset($load)){echo set_value('personnel_keeper_name', $item->personnel_keeper_name);}else{echo set_value('personnel_keeper_name');} ?>" ></td>
                               </tr>
                               
                           </tbody>
                       </table>
                <span class="text-danger"><?php echo form_error('personnel_name'); ?></span>
                <span class="text-danger"><?php echo form_error('personnel_staff_student_no'); ?></span>
                <span class="text-danger"><?php echo form_error('personnel_designation'); ?></span>
                <span class="text-danger"><?php echo form_error('personnel_faculty'); ?></span>
                <span class="text-danger"><?php echo form_error('personnel_unit_code'); ?></span>
                <span class="text-danger"><?php echo form_error('personnel_project_title'); ?></span>
                <span class="text-danger"><?php echo form_error('personnel_storage'); ?></span>
                <span class="text-danger"><?php echo form_error('personnel_keeper_name'); ?></span>
                </div>
                
                <div id="section_2" class="sectiontarget">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th class="tblTitle" colspan="4">
                                   <h8 id="section_2"><strong>Section 2 - Details of the Biohazard Materials</strong></h8>
                               </th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td class="tbheader1">
                                   <div style="float:left;width:50%;">A. List of Living Modified Organism</div>
                                   <div style="float:right;width:50%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="LMO_list" value="1" <?php echo set_checkbox('LMO_list', '1'); ?> <?php if(isset($load)){if($item->LMO_list==1){echo "checked=checked";}}else{} ?> >Not Applicable</label>
                                   </div>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <table class="table table-bordered">
                                       <tr>
                                           <th>Name</th>
                                           <th>Risk Level</th>
                                           <th>Quantity</th>
                                           <th>Volume(g or mL)</th>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_name[0]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_risk_level[0]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_quantity[0]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_volume[0]"></div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_name[1]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_risk_level[1]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_quantity[1]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_volume[1]"></div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_name[2]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_risk_level[2]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_quantity[2]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_volume[2]"></div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_name[3]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_risk_level[3]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_quantity[3]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_volume[3]"></div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_name[4]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_risk_level[4]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_quantity[4]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_volume[4]"></div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_name[5]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_risk_level[5]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_quantity[5]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="LMO_volume[5]"></div>
                                           </td>
                                       </tr>
                                   </table>
                               </td>
                           </tr>
                           
                           <tr>
                               <td class="tbheader1">
                                   <div style="float:left;width:50%;">B. List of Biohazardous Material</div>
                                   <div style="float:right;width:50%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="biohazard_list" value="1" <?php echo set_checkbox('biohazard_list', '1'); ?> <?php if(isset($load)){if($item->biohazard_list==1){echo "checked=checked";}}else{} ?>>Not Applicable</label>
                                   </div>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <table class="table table-bordered">
                                       <tr>
                                           <th>Name</th>
                                           <th>Risk Level</th>
                                           <th>Quantity</th>
                                           <th>Volume(g or mL)</th>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_name[0]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_risk_level[0]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_quantity[0]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_volume[0]"></div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_name[1]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_risk_level[1]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_quantity[1]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_volume[1]"></div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_name[2]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_risk_level[2]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_quantity[2]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_volume[2]"></div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_name[3]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_risk_level[3]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_quantity[3]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_volume[3]"></div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_name[4]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_risk_level[4]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_quantity[4]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_volume[4]"></div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_name[5]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_risk_level[5]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_quantity[5]"></div>
                                           </td>
                                           <td>
                                               <div class="form-group"><input type="text" class="form-control" name="biohazard_volume[5]"></div>
                                           </td>
                                       </tr>
                                   </table>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                </div>
                   
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
                                  <ul>
                                      <li>I, hereby declare that the information I have provided in this form for Notification of LMO and Biohazardous Material is true and correct.</li>
                                      
                                      <li>Swinburne University of Technology Sarawak Campus collects, uses and destroys personal data in accordance with our Privacy Collection Notice at <a href="http://www.swinburne.edu.my/privacy/">http://www.swinburne.edu.my/privacy/</a> and Employee's Privacy Collection Notice at Blackboard>My.Swinburne>Student & Corporate Services> Human Resources>Employee's Privacy Collection Notice.</li>
                                   </ul>
                               </td>
                           </tr>
                           <tr>
                               <td><input type="text" name="declaration_name" class="form-control" placeholder="Name & Signature:" value="<?php if(isset($load)){echo set_value('declaration_name', $item->declaration_name);}else{echo set_value('declaration_name');} ?>"></td>
                               
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="declaration_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('declaration_date', $item->declaration_date);}else{echo set_value('declaration_date');} ?>"></td>
                           </tr>
                       </tbody>
                   </table>
                <span class="text-danger"><?php echo form_error('declaration_name'); ?></span>
                <span class="text-danger"><?php echo form_error('declaration_date'); ?></span>
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
                               <td colspan="2">Verified by (Unit Convenor / Project Investigator): </td>
                           </tr>
                           <tr>
                               <td colspan="2"><input type="text" class="form-control" name="signature_verified_by" placeholder="Signature:" value="<?php if(isset($load)){echo set_value('signature_verified_by', $item->signature_verified_by);}else{echo set_value('signature_verified_by');} ?>" ></td>
                               
                           </tr>
                           <tr>
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="signature_verified_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('signature_verified_date', $item->signature_verified_date);}else{echo set_value('signature_verified_date');} ?>" ></td>
                           </tr>
                       </tbody>
                   </table>
                <span class="text-danger"><?php echo form_error('signature_verified_by'); ?></span>
                <span class="text-danger"><?php echo form_error('signature_verified_date'); ?></span>
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
                               <td>
                                <div class="checkbox">
                                     <label><input type="checkbox" name="notification_approved_by" value="1" <?php echo set_checkbox('notification_approved_by', '1'); ?> <?php if(isset($load)){if($item->notification_approved_by==1){echo "checked=checked";}}else{} ?>> Approved By:</label>
                                    <input type="text" class="form-control" name="notification_approver" value="<?php if(isset($load)){echo set_value('notification_approver', $item->notification_approver);}else{echo set_value('notification_approver');} ?>">
                                </div>
                                <div class="checkbox">
                                     <label><input type="checkbox" name="notification_declined_by" value="1" <?php echo set_checkbox('notification_declined_by', '1'); ?> <?php if(isset($load)){if($item->notification_declined_by==1){echo "checked=checked";}}else{} ?>> Declined By:</label>
                                    <input type="text" class="form-control" name="notification_decliner" value="<?php if(isset($load)){echo set_value('notification_decliner', $item->notification_decliner);}else{echo set_value('notification_decliner');} ?>">
                                </div>
                               </td>
                               <td style="width:450px">
                                   <input type="text" class="form-control" name="notification_reviewed_by" placeholder="Reviewed by:" value="<?php if(isset($load)){echo set_value('notification_reviewed_by', $item->notification_reviewed_by);}else{echo set_value('notification_reviewed_by');} ?>">
                               </td>
                           </tr>
                           <tr>
                               <td><input type="text" class="form-control" placeholder="Signature:"></td>
                               <td><input type="text" class="form-control" placeholder="Signature:"></td>
                           </tr>
                           <tr>
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="notification_approve_decline_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('notification_approve_decline_date', $item->notification_approve_decline_date);}else{echo set_value('notification_approve_decline_date');} ?>"></td>
                               
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="notification_reviewed_by_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('notification_reviewed_by_date', $item->notification_reviewed_by_date);}else{echo set_value('notification_reviewed_by_date');} ?>"></td>
                           </tr>
                           <tr>
                               <td>
                                   <input type="text" class="form-control" name="notification_approve_decline_remarks" placeholder="Remarks:" value="<?php if(isset($load)){echo set_value('notification_approve_decline_remarks', $item->notification_approve_decline_remarks);}else{echo set_value('notification_approve_decline_remarks');} ?>">
                               </td>
                               <td>
                                   <input type="text" class="form-control" name="notification_reviewed_by_remarks" placeholder="Remarks:" value="<?php if(isset($load)){echo set_value('notification_reviewed_by_remarks', $item->notification_reviewed_by_remarks);}else{echo set_value('notification_reviewed_by_remarks');} ?>" >
                               </td>
                           </tr>
                       </tbody>
                   </table>
                </div>
                   <div>
                    <input type="hidden" name="appid" value="<?php if(isset($appID)){echo $appID;} ?>">
                   </div>
                
                   <div style="text-align: center">
                       <?php if(isset($editload)){ ?>
                       <button type="submit" name = 'notification_of_LMO_and_BM_update' value = 'Update' onclick="location.href='<?php echo site_url().'/notification_of_LMO_and_BM/update_form';?>'" class="btn btn-primary">Update</button>
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
                    <a href="#section_3" class="btn btn-success">Section 3</a>
                    <a href="#section_4" class="btn btn-success">Section 4</a>
                    <a href="#section_5" class="btn btn-success">Section 5</a>
                </div>   
            </div>
        </div>
        
        
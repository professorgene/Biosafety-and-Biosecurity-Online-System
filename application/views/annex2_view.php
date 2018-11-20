   <?php
    
    if(isset($load)){
        foreach($retrieved as $annex2){
            $ar3 = $annex2->personnel_involved;
            $ar4 = $annex2->personnel_designation;
            $i = explode(",", $ar3);
            $e = explode(",", $ar4);
        }
        
        
    }else{
           
        }
    
    ?>
        
        <div class="row">
            
            <div class="col-md-10">
                
                
                
                    <div>
                        <br/>
                        <?php echo $this->session->flashdata('msg'); ?>
                        
                    </div>


                   <div>
                       <h4><strong>IBC/AP/13/ANNEX 2</strong></h4>
                   </div><br>
                   
                   <div><h4><strong>IBC ASSESSMENT OF PROJECT PROPOSAL INVOLVING MODERN BIOTECHNOLOGY ACTIVITIES</strong></h4></div><br>
                   
                   <div>
                       <p>IBC/AP/13/ANNEX 2 is to be used for assessment of a proposal to carry out modern<br> biotechnology activities. This form serves to guide the IBC in the consideration and evaluation of<br> the project proposal. Completed IBC assessments should be submitted to the National<br> Biosafety Board (NBB), together with the corresponding application form.</p>
                   </div><br>
                   
                   <div>
                       <h5><strong>Instructions for Completion of the Form</strong></h5>
                       <p>IBC must submit a typed, completed assessment form to NBB, attached to the corresponding <br>application form, and should retain a copy for record and reference. The assessment form must<br> be signed by the IBC Chair and summited to NBB. A clear and concise explanation is required<br> on the IBC's position on each of the experimental parameters identified in the assessment form.</p>
                   </div><br>
                   
                   <div>
                       <h5><strong>Some Specific Provisions:<br> Proposal for Contained Use Activity of LMO/rDNA Material</strong></h5><br>
                       <p>IBC may authorize or commission research work immediately, upon obtaining an<br> acknowledgement of receipt for contained use from the Director General of Biosafety. The<br> contained use activity should observe the rudimentary standards, in current or past practice, as<br> appropriate to the particular organism under investigation.</p>
                   </div><br>
                   
                   <div>
                       <h5><strong>Proposal for Field Experiment of LMO/rDNA Material</strong></h5>
                       <p>Principal Investigator (PI) must obtain endorsement from IBC and should not start a field<br> experiment until a certificate of approval is granted by NBB. Measures for the control and<br> containment of field work must comply with NBB and IBC advice/instruction. </p>
                   </div>
                   
                   <hr>
                   
                   <div id="section_1">
                       
                       <table class="table table-bordered">
                           
                           <h6 class="sectiontarget"><strong>1.General Information</strong></h6>
                           
                           <tbody>
                               <tr>
                                   <td width="10px">1.</td>
                                   <td>
                                       <div class="form-group row">
                                           <label for="applicant_name" class="col-sm-4">Name of Applicant :</label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" id="applicant_name" name="applicant_name" rows="2"><?php if(isset($load)){echo set_value('applicant_name', $annex2->applicant_name);}else{echo set_value('applicant_name');} ?></textarea>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               
                               <tr>
                                   <td width="10px">2.</td>
                                   <td>
                                       <div class="form-group row">
                                           <label for="institutional_address" class="col-sm-4">Institutional address :</label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" id="institutional_address" name="institutional_address" rows="2"><?php if(isset($load)){echo set_value('institutional_address', $annex2->institutional_address);}else{echo set_value('institutional_address');} ?></textarea>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               
                               <tr>
                                   <td width="10px">3.</td>
                                   <td>
                                       <div class="form-group row">
                                           <label for="collaborating_partners" class="col-sm-4">Collaborating partners :<br><p class="font-weight-light">indicate names and<br> addresses of the instituion/s (if any)</p></label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" id="collaborating_partners" name="collaborating_partners" rows="2"><?php if(isset($load)){echo set_value('collaborating_partners', $annex2->collaborating_partners);}else{echo set_value('collaborating_partners');} ?></textarea>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               
                               <tr>
                                   <td width="10px">4.</td>
                                   <td>
                                       <div class="form-group row">
                                           <label for="project_title" class="col-sm-4">Project Title :</label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" id="project_title" name="project_title" rows="2"><?php if(isset($load)){echo set_value('project_title', $annex2->project_title);}else{echo set_value('project_title');} ?></textarea>
                                               <span class="text-danger"><?php echo form_error('project_title'); ?></span>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               
                           </tbody>
                           
                       </table>
                   </div>
                   
                   <br>
                   
                   <div id="section_2">
                       <table class="table table-bordered">
                           <h6 class="sectiontarget"><strong>2.Experimental Parameters</strong></h6>
                           <p>&nbsp;&nbsp; IBC assessment/recommendation on each of the following:</p>
                           
                           <tbody>
                               <tr>
                                   <td width="10px">1.</td>
                                   <td>
                                       <div class="form-group row">
                                           <label for="project_objective_methodology" class="col-sm-4">Project objective and  : <br> methodology</label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" id="project_objective_methodology" name="project_objective_methodology" rows="2"><?php if(isset($load)){echo set_value('project_objective_methodology', $annex2->project_objective_methodology);}else{echo set_value('project_objective_methodology');} ?></textarea>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               
                               <tr>
                                   <td width="10px">2.</td>
                                   <td>
                                       <div class="row"><label class="col-sm-4">Biological system</label></div>
                                       
                                       <div class="form-group row">
                                           <label for="biological_system_parent_organisms" class="col-sm-4">i.&nbsp;&nbsp; Common name of parent :<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;organism(s)</label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" id="biological_system_parent_organisms" name="biological_system_parent_organisms" rows="2"><?php if(isset($load)){echo set_value('biological_system_parent_organisms', $annex2->biological_system_parent_organisms);}else{echo set_value('biological_system_parent_organisms');} ?></textarea>
                                           </div>
                                       </div>
                                       
                                       <div class="form-group row">
                                           <label for="biological_system_donor_organisms" class="col-sm-4">ii.&nbsp;&nbsp; Common name of donor :<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;organism(s)</label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" id="biological_system_donor_organisms" name="biological_system_donor_organisms" rows="2"><?php if(isset($load)){echo set_value('biological_system_donor_organisms', $annex2->biological_system_donor_organisms);}else{echo set_value('biological_system_donor_organisms');} ?></textarea>
                                           </div>
                                       </div>
                                       
                                       <div class="form-group row">
                                           <label for="biological_system_modified_traits" class="col-sm-4">iii.&nbsp;&nbsp; Name of gene(s) for the :<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;modified traits(s)</label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" id="biological_system_modified_traits" name="biological_system_modified_traits" rows="2"><?php if(isset($load)){echo set_value('biological_system_modified_traits', $annex2->biological_system_modified_traits);}else{echo set_value('biological_system_modified_traits');} ?></textarea>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               
                               <tr>
                                   <td width="10px">3.</td>
                                   <td>
                                       <div class="form-group row">
                                           <label for="premises" class="col-sm-4">Premises or location of &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<br>contained use activity/field<br>experiment </label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" id="premises" name="premises" rows="2"><?php if(isset($load)){echo set_value('premises', $annex2->premises);}else{echo set_value('premises');} ?></textarea>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               
                               <tr>
                                   <td width="10px">4.</td>
                                   <td>
                                       <div class="form-group row">
                                           <label for="period" class="col-sm-4">Period of contained use &nbsp;&nbsp;:<br>activity/field experiment</label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" id="period" name="period" rows="2"><?php if(isset($load)){echo set_value('period', $annex2->period);}else{echo set_value('period');} ?></textarea>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               
                               <tr>
                                   <td width="10px">5.</td>
                                   <td>
                                       <div class="form-group row">
                                           <label for="risk_assessment_and_management" class="col-sm-4">Risk assesment and risk &nbsp;&nbsp;:<br>management</label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" id="risk_assessment_and_management" name="risk_assessment_and_management" rows="2"><?php if(isset($load)){echo set_value('risk_assessment_and_management', $annex2->risk_assessment_and_management);}else{echo set_value('risk_assessment_and_management');} ?></textarea>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               
                               <tr>
                                   <td width="10px">6.</td>
                                   <td>
                                       <div class="form-group row">
                                           <label for="emergency_response_plan" class="col-sm-4">Emergency response plan &nbsp;&nbsp;:</label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" id="emergency_response_plan" name="emergency_response_plan" rows="2"><?php if(isset($load)){echo set_value('emergency_response_plan', $annex2->emergency_response_plan);}else{echo set_value('emergency_response_plan');} ?></textarea>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               
                               <tr>
                                   <td width="10px">7.</td>
                                   <td>
                                       <div class="form-group row">
                                           <label for="IBC_recommendation" class="col-sm-4">Additional IBC &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<br>recommendation (if any)</label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" id="IBC_recommendation" name="IBC_recommendation" rows="2"><?php if(isset($load)){echo set_value('IBC_recommendation', $annex2->IBC_recommendation);}else{echo set_value('IBC_recommendation');} ?></textarea>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               
                           </tbody>
                       </table>

                   </div>
                   
                   <br>
                   
                   <div id="section_3">
                       <table class="table table-bordered">
                           <h6 class="sectiontarget"><strong>3.Details of Principal Investigator (PI)</strong></h6>
                           
                           <tbody>
                               <tr>
                                   <td width="10px">1.</td>
                                   <td>
                                       <div class="form-group row">
                                           <label for="PI_experience_and_expertise" class="col-sm-4">Experience and expertise:</label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" id="PI_experience_and_expertise" name="PI_experience_and_expertise" rows="2"><?php if(isset($load)){echo set_value('PI_experience_and_expertise', $annex2->PI_experience_and_expertise);}else{echo set_value('PI_experience_and_expertise');} ?></textarea>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               
                               <tr>
                                   <td width="10px">2.</td>
                                   <td>
                                       <div class="form-group row">
                                           <label for="PI_training" class="col-sm-4">Training:</label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" id="PI_training" name="PI_training" rows="2"><?php if(isset($load)){echo set_value('PI_training', $annex2->PI_training);}else{echo set_value('PI_training');} ?></textarea>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               
                               <tr>
                                   <td width="10px">3.</td>
                                   <td>
                                       <div class="form-group row">
                                           <label for="PI_health" class="col-sm-4">Health:</label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?>  class="form-control" id="PI_health" name="PI_health" rows="2"><?php if(isset($load)){echo set_value('PI_health', $annex2->PI_health);}else{echo set_value('PI_health');} ?></textarea>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               
                               <tr>
                                   <td width="10px">4.</td>
                                   <td>
                                       <div class="form-group row">
                                           <label for="PI_other" class="col-sm-4">Others (please specify):</label>
                                           <div class="col-sm-7">
                                               <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" id="PI_health" name="PI_other" rows="2"><?php if(isset($load)){echo set_value('PI_other', $annex2->PI_other);}else{echo set_value('PI_other');} ?></textarea>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                           </tbody>
                       </table>
                       
                   </div>
                   
                   <br>
                   
                   <div>
                       <h6 id="section_4" class="sectiontarget"><strong>4.List of all personnel involved in project</strong></h6>
                       <table class="table table-bordered">
                           <thead>
                               <tr>
                                   <th>No.</th>
                                   <th>Name</th>
                                   <th>Designation</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <td>1</td>
                                   <td><textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" name="personnel_involved[0]"><?php if(isset($load)){echo set_value('personnel_involved[0]', $i[0]);}else{echo set_value('personnel_involved[0]');} ?></textarea>
                                   </td>
                                   
                                   <td><textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" name="personnel_designation[0]"><?php if(isset($load)){echo set_value('personnel_designation[0]', $e[0]);}else{echo set_value('personnel_designation[0]');} ?></textarea>
                                   </td>
                                   
                               </tr>
                               <tr>
                                   <td>2</td>
                                   <td><textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" name="personnel_involved[1]"><?php if(isset($load)){echo set_value('personnel_involved[1]', $i[1]);}else{echo set_value('personnel_involved[1]');} ?></textarea></td>
                                   
                                   <td><textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" name="personnel_designation[1]"><?php if(isset($load)){echo set_value('personnel_designation[1]', $e[1]);}else{echo set_value('personnel_designation[1]');} ?></textarea></td>
                                   
                               </tr>
                               <tr>
                                   <td>3</td>
                                   <td><textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" name="personnel_involved[2]"><?php if(isset($load)){echo set_value('personnel_involved[2]', $i[2]);}else{echo set_value('personnel_involved[2]');} ?></textarea></td>
                                   
                                   <td><textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" name="personnel_designation[2]"><?php if(isset($load)){echo set_value('personnel_designation[2]', $e[2]);}else{echo set_value('personnel_designation[2]');} ?></textarea></td>
                               
                               </tr>
                               <tr>
                                   <td>4</td>
                                   <td><textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" name="personnel_involved[3]"><?php if(isset($load)){echo set_value('personnel_involved[3]', $i[3]);}else{echo set_value('personnel_involved[3]');} ?></textarea></td>
                                   
                                   <td><textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" name="personnel_designation[3]"><?php if(isset($load)){echo set_value('personnel_designation[3]', $e[3]);}else{echo set_value('personnel_designation[3]');} ?></textarea></td>
                                
                               </tr>
                               <tr>
                                   <td>5</td>
                                   <td><textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" name="personnel_involved[4]"><?php if(isset($load)){echo set_value('personnel_involved[4]', $i[4]);}else{echo set_value('personnel_involved[4]');} ?></textarea></td>
                                   
                                   <td><textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> class="form-control" name="personnel_designation[4]"><?php if(isset($load)){echo set_value('personnel_designation[4]', $e[4]);}else{echo set_value('personnel_designation[4]');} ?></textarea></td>
                                   
                               </tr>
                           </tbody>
                       </table>
                       
                   </div>
                   
                   <div>
                       <div>
                           <label for="IBC_signature">Signature (of IBC Chair) and Date</label>
                           <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> rows="5" name="IBC_approved" class="form-control"  ></textarea>
                       </div>
                       
                       <div class="form-group">
                           <label for="ibc_name">Name:</label>
                           <textarea <?php if(isset($disabled)){echo "disabled='disabled'";} ?> name="IBC_name" class="form-control"><?php if(isset($load)){echo set_value('IBC_name', $annex2->IBC_name);}else{echo set_value('IBC_name');} ?></textarea>
                       </div>
                       <div class="form-group">
                           <label for="ibc_date">Date:</label>
                           <input <?php if(isset($disabled)){echo "disabled='disabled'";} ?> type="date" name="IBC_date" class="form-control" value="<?php if(isset($load)){echo set_value('IBC_date', $annex2->IBC_date);}else{echo set_value('IBC_date');} ?>">
                       </div>
                   </div>
                
                <div>
                    <input type="hidden" name="appid" value="<?php if(isset($appID)){echo $appID;} ?>">
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <hr>
                        <p>To be assessed for suitability by PI</p>
                    </div>
                </div>
                
                
                   
                   <div class="row">
                       <span class="col-md-5"></span>
                       <?php if(isset($editload)){ ?>
                       <button type="submit" name = 'updateButton' value = 'Update' onclick="location.href='<?php echo site_url().'/annex2/update_form';?>'" class="btn btn-primary">Update</button>
                       <?php }else{ ?>
                       <button name="saveButton" type="submit" class="btn btn-primary col-md-2" <?php if(isset($disabled)){echo "disabled='disabled'";} ?>>Save</button>
                       <?php } ?>
                       
                       <span class="col-md-5"></span>
                   </div>
                    

                
                
            </div>
            
            
            <div class="col-md-2">
                <div class="btn-group-vertical btn-sample">
                    <a href="#top" class="btn btn-success">Top</a>
                    <a href="#section_1" class="btn btn-success">Section 1</a>
                    <a href="#section_2" class="btn btn-success">Section 2</a>
                    <a href="#section_3" class="btn btn-success">Section 3</a>
                    <a href="#section_4" class="btn btn-success">Section 4</a>
                    <?php if(isset($editload)){ ?>
                    <button type="submit" name = 'updateButton' value = 'Update' onclick="location.href='<?php echo site_url().'/annex2/update_form';?>'" class="btn btn-primary">Update</button>
                    <?php }else{ ?>
                    <button name="saveButton" type="submit" class="btn btn-primary" <?php if(isset($disabled)){echo "disabled='disabled'";} ?>>Save</button>
                    <?php } ?>
                    <!-- <a href="#" onclick="window.print()" class="btn btn-success">Print</a> -->
                </div>   
            </div>
        </div>


        
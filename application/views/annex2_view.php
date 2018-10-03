   <?php
    
    if(isset($load)){
        foreach($retrieved as $item){
            $ar3 = $item->personnel_involved;
            $ar4 = $item->personnel_designation;
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
                   </div>
                   
                   <div><h4><strong>IBC ASSESSMENT OF PROJECT PROPOSAL INVOLVING MODERN BIOTECHNOLOGY ACTIVITIES</strong></h4></div>
                   
                   <div>
                       <p>IBC/AP/13/ANNEX 2 is to be used for assessment of a proposal to carry out modern biotechnology activities. This form serves to guide the IBC in the consideration and evaluation of the project proposal. Completed IBC assessments should be submitted to the National Biosafety Board (NBB), together with the corresponding application form.</p>
                   </div>
                   
                   <div>
                       <h5><strong>Instructions for Completion of the Form</strong></h5>
                       <p>IBC must submit a typed, completed assessment form to NBB, attached to the corresponding application form, and should retain a copy for record and reference. The assessment form must be signed by the IBC Chair and summited to NBB. A clear and concise explanation is required on the IBC's position on each of the experimental parameters identified in the assessment form.</p>
                   </div>
                   
                   <div>
                       <h5><strong>Some Specific Provisions: Proposal for Contained Use Activity of LMO/rDNA Material</strong></h5>
                       <p>IBC may authorize or commission research work immediately, upon obtaining an acknowledgement of receipt for contained use from the Director General of Biosafety. The contained use activity should observe the rudimentary standards, in current or past practice, as appropriate to the particular organism under investigation.</p>
                   </div>
                   
                   <div>
                       <h5><strong>Proposal for Field Experiment of LMO/rDNA Material</strong></h5>
                       <p>Principal Investigator (PI) must obtain endorsement from IBC and should not start a field experiment until a certificate of approval is granted by NBB. Measures for the control and containment of field work must comply with NBB and IBC advice/instruction. </p>
                   </div>
                   
                   <hr>
                   
                   <div>
                       <h6 id="section_1" class="sectiontarget"><strong>1.General Information</strong></h6>
                       
                       <div class="form-group">
                           Name of applicant: 
                           <input type="text" class="form-control" name="applicant_name" value="<?php if(isset($load)){echo set_value('applicant_name', $item->applicant_name);}else{echo set_value('applicant_name');} ?>" >
                           <span class="text-danger"><?php echo form_error('applicant_name'); ?></span>
                       </div>
                       
                       <div class="form-group">
                           Institutional address:
                           <input type="text" class="form-control" name="institutional_address" value="<?php if(isset($load)){echo set_value('institutional_address', $item->institutional_address);}else{echo set_value('institutional_address');} ?>">
                           <span class="text-danger"><?php echo form_error('institutional_address'); ?></span>
                       </div>
                       
                       <div class="form-group">
                           Collaborating partners: <input type="text" class="form-control" name="collaborating_partners"  placeholder="indicate names & addresses of the instituion/s (if any)" value="<?php if(isset($load)){echo set_value('collaborating_partners', $item->collaborating_partners);}else{echo set_value('collaborating_partners');} ?>" >
                           <span class="text-danger"><?php echo form_error('collaborating_partners'); ?></span>
                       </div>
                       
                       <div class="form-group">
                           Project Title: 
                           <input type="text" class="form-control" name="project_title" value="<?php if(isset($load)){echo set_value('project_title', $item->project_title);}else{echo set_value('project_title');} ?>"  >
                           <span class="text-danger"><?php echo form_error('project_title'); ?></span>
                       </div>
                   </div>
                   
                   <hr>
                   
                   <div>
                       <h6 id="section_2" class="sectiontarget"><strong>2.Experimental Parameters</strong></h6>
                       <p>IBC assessment/recommendation on each of the following:</p>
                       
                       <div class="form-group">
                           Project objective and methodology: <input type="text" class="form-control" name="project_objective_methodology" value="<?php if(isset($load)){echo set_value('project_objective_methodology', $item->project_objective_methodology);}else{echo set_value('project_objective_methodology');} ?>">
                           <span class="text-danger"><?php echo form_error('project_objective_methodology'); ?></span>
                       </div>
                       
                       <div class="form-group">
                           <p>Biological System: </p>
                               i. Common name of parent organism(s):
                           <input type="text" class="form-control" name="biological_system_parent_organisms" id="parent_org_name" value="<?php if(isset($load)){echo set_value('biological_system_parent_organisms', $item->biological_system_parent_organisms);}else{echo set_value('biological_system_parent_organisms');} ?>" >
                           
                           <span class="text-danger"><?php echo form_error('biological_system_parent_organisms'); ?></span>
                           
                               ii. Common name of donor organism(s):
                           <input type="text" class="form-control" name="biological_system_donor_organisms"  id="donor_org_name" value="<?php if(isset($load)){echo set_value('biological_system_donor_organisms', $item->biological_system_donor_organisms);}else{echo set_value('biological_system_donor_organisms');} ?>" >
                           
                           <span class="text-danger"><?php echo form_error('biological_system_donor_organisms'); ?></span>
                           
                               iii. Name of gene(s) for the modified traits(s): 
                           <input type="text" class="form-control" name="biological_system_modified_traits" value="<?php if(isset($load)){echo set_value('biological_system_modified_traits', $item->biological_system_modified_traits);}else{echo set_value('biological_system_modified_traits');} ?>">
                           
                           <span class="text-danger"><?php echo form_error('biological_system_modified_traits'); ?></span>
                           
                       </div>
                       
                       <div class="form-group">
                           Premises or location of contained use activity/field experiment: <input type="text" class="form-control" name="premises" value="<?php if(isset($load)){echo set_value('premises', $item->premises);}else{echo set_value('premises');} ?>" >
                           <span class="text-danger"><?php echo form_error('premises'); ?></span>
                       </div>
                       
                       <div class="form-group">
                           Period of contained use activity/field experiment: <input type="text" class="form-control" name="period" value="<?php if(isset($load)){echo set_value('period', $item->period);}else{echo set_value('period');} ?>" >
                           <span class="text-danger"><?php echo form_error('period'); ?></span>
                       </div>
                       
                       <div class="form-group">
                           Risk assesment and risk management: <input type="text" class="form-control" name="risk_assessment_and_management" value="<?php if(isset($load)){echo set_value('risk_assessment_and_management', $item->risk_assessment_and_management);}else{echo set_value('risk_assessment_and_management');} ?>" >
                           <span class="text-danger"><?php echo form_error('risk_assessment_and_management'); ?></span>
                       </div>
                       
                       <div class="form-group">
                           Emergency response plan: <input type="text" class="form-control" name="emergency_response_plan" value="<?php if(isset($load)){echo set_value('emergency_response_plan', $item->emergency_response_plan);}else{echo set_value('emergency_response_plan');} ?>" >
                           <span class="text-danger"><?php echo form_error('emergency_response_plan'); ?></span>
                       </div>
                       
                       <div class="form-group">
                           Additional IBC recommendation (if any): <input type="text" class="form-control" name="IBC_recommendation" value="<?php if(isset($load)){echo set_value('IBC_recommendation', $item->IBC_recommendation);}else{echo set_value('IBC_recommendation');} ?>" >
                           <span class="text-danger"><?php echo form_error('IBC_recommendation'); ?></span>
                       </div>

                   </div>
                   
                   <hr>
                   
                   <div>
                       <h6 id="section_3" class="sectiontarget"><strong>3.Details of Principal Investigators(PI)</strong></h6>
                       
                       <div class="form-group">
                           Experience and expertise: <input type="text" class="form-control" name="PI_experience_and_expertise" value="<?php if(isset($load)){echo set_value('PI_experience_and_expertise', $item->PI_experience_and_expertise);}else{echo set_value('PI_experience_and_expertise');} ?>" >
                           <span class="text-danger"><?php echo form_error('PI_experience_and_expertise'); ?></span>
                       </div>
                       
                       <div class="form-group">
                           Training: <input type="text" class="form-control" name="PI_training" value="<?php if(isset($load)){echo set_value('PI_training', $item->PI_training);}else{echo set_value('PI_training');} ?>">
                           <span class="text-danger"><?php echo form_error('PI_training'); ?></span>
                       </div>
                       
                       <div class="form-group">
                           Health: <input type="text" class="form-control" name="PI_health" value="<?php if(isset($load)){echo set_value('PI_health', $item->PI_health);}else{echo set_value('PI_health');} ?>">
                           <span class="text-danger"><?php echo form_error('PI_health'); ?></span>
                       </div>
                       
                       <div class="form-group">
                           Others (please specify): <input type="text" class="form-control" name="PI_other" value="<?php if(isset($load)){echo set_value('PI_other', $item->PI_other);}else{echo set_value('PI_other');} ?>" >
                           <span class="text-danger"><?php echo form_error('PI_other'); ?></span>
                       </div>
                   </div>
                   
                   <hr>
                   
                   <div>
                       <h6 id="section_4" class="sectiontarget"><strong>4.List of all Personnel involved in Project</strong></h6>
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
                                   <td><input type="text" class="form-control" name="personnel_involved[0]" value="<?php if(isset($load)){echo set_value('personnel_involved[0]', $i[0]);}else{echo set_value('personnel_involved[0]');} ?>" >
                                   </td>
                                   
                                   <td><input type="text" class="form-control" name="personnel_designation[0]" value="<?php if(isset($load)){echo set_value('personnel_designation[0]', $e[0]);}else{echo set_value('personnel_designation[0]');} ?>" >
                                   </td>
                                   
                               </tr>
                               <tr>
                                   <td>2</td>
                                   <td><input type="text" class="form-control" name="personnel_involved[1]" value="<?php if(isset($load)){echo set_value('personnel_involved[1]', $i[1]);}else{echo set_value('personnel_involved[1]');} ?>" ></td>
                                   
                                   <td><input type="text" class="form-control" name="personnel_designation[1]" value="<?php if(isset($load)){echo set_value('personnel_designation[1]', $e[1]);}else{echo set_value('personnel_designation[1]');} ?>" ></td>
                                   
                               </tr>
                               <tr>
                                   <td>3</td>
                                   <td><input type="text" class="form-control" name="personnel_involved[2]" value="<?php if(isset($load)){echo set_value('personnel_involved[2]', $i[2]);}else{echo set_value('personnel_involved[2]');} ?>" ></td>
                                   
                                   <td><input type="text" class="form-control" name="personnel_designation[2]" value="<?php if(isset($load)){echo set_value('personnel_designation[2]', $e[2]);}else{echo set_value('personnel_designation[2]');} ?>" ></td>
                               
                               </tr>
                               <tr>
                                   <td>4</td>
                                   <td><input type="text" class="form-control" name="personnel_involved[3]" value="<?php if(isset($load)){echo set_value('personnel_involved[3]', $i[3]);}else{echo set_value('personnel_involved[3]');} ?>" ></td>
                                   
                                   <td><input type="text" class="form-control" name="personnel_designation[3]" value="<?php if(isset($load)){echo set_value('personnel_designation[3]', $e[3]);}else{echo set_value('personnel_designation[3]');} ?>" ></td>
                                
                               </tr>
                               <tr>
                                   <td>5</td>
                                   <td><input type="text" class="form-control" name="personnel_involved[4]" value="<?php if(isset($load)){echo set_value('personnel_involved[4]', $i[4]);}else{echo set_value('personnel_involved[4]');} ?>" ></td>
                                   
                                   <td><input type="text" class="form-control" name="personnel_designation[4]" value="<?php if(isset($load)){echo set_value('personnel_designation[4]', $e[4]);}else{echo set_value('personnel_designation[4]');} ?>" ></td>
                                   
                               </tr>
                           </tbody>
                       </table>
                       <span class="text-danger"><?php echo form_error('personnel_involved[0]'); ?></span>
                       <span class="text-danger"><?php echo form_error('personnel_designation[0]'); ?></span>
                       
                   </div>
                   
                   <div>
                       <div>
                           <label for="IBC_signature">Signature (of IBC Chair) and Date</label>
                           <textarea rows="5" name="IBC_approved" class="form-control"  ></textarea>
                       </div>
                       
                       <div class="form-group">
                           <label for="ibc_name">Name:</label>
                           <input type="text" name="IBC_name" class="form-control" value="<?php if(isset($load)){echo set_value('IBC_name', $item->IBC_name);}else{echo set_value('IBC_name');} ?>" size="15">
                           <span class="text-danger"><?php echo form_error('IBC_name'); ?></span>
                       </div>
                       <div class="form-group">
                           <label for="ibc_date">Date:</label>
                           <input type="date" name="IBC_date" class="form-control" value="<?php if(isset($load)){echo set_value('IBC_date', $item->IBC_date);}else{echo set_value('IBC_date');} ?>" size="15">
                           <span class="text-danger"><?php echo form_error('IBC_date'); ?></span>
                       </div>
                   </div>
                
                <div>
                    <input type="hidden" name="appid" value="<?php if(isset($appID)){echo $appID;} ?>">
                </div>
                
                
                   
                   <div class="row">
                       <span class="col-md-5"></span>
                       <?php if(isset($editload)){ ?>
                       <button type="submit" name = 'annex2_update' value = 'Update' onclick="location.href='<?php echo site_url().'/annex2/update_form';?>'" class="btn btn-primary">Update</button>
                       <?php }else{ ?>
                       <button name="saveButton" type="submit" class="btn btn-primary col-md-2">Save</button>
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
                </div>   
            </div>
        </div>
        
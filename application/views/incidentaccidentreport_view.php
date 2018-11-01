  
    <?php
    
    if(isset($load)){
        foreach($retrieved as $item){
            $newar1 = $item->investigation_preventive_no;
            $newar2 = $item->investigation_preventive_action;
            $newar3 = $item->investigation_preventive_by_whom;
            $newar4 = $item->investigation_preventive_timeline;
            $a = explode(",", $newar1);
            $b = explode(",", $newar2);
            $c = explode(",", $newar3);
            $d = explode(",", $newar4);
        }
        
        
    }else{
           
        }
    
    ?>
    
    
     

        <div class="row">
            
            <div class="col-md-10">
               
                   <div>
                       <h5>OHS-F-4.20.X INCIDENT ACCIDENT REPORT</h5>	
                       <h5><strong>PLEASE FILL IN ALL INFORMATION REQUESTED</strong></h5>
                   </div>
                                     		   
				   <hr>
                <input type="hidden" value="<?php if(isset($hirarctype)){echo $hirarctype;} ?>" name="application_type" />
                   
                <div id="section_1" class="sectiontarget">   
                <table class="table table-bordered" id="section_1">
                           <thead>
                                <tr>
                                   <th class="tblTitle" colspan="4"><h8 id="section_1"><strong>SECTION 1 – Victim Personal Details (*Details required as per OSH (NADOPOD) Regulation 2004)</strong></h8></th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <th class="tbheader1">1.01  Name (as per I.C./Passport):</th>								   
                                   <td><textarea name="victim_name" class="form-control"><?php if(isset($load)){echo set_value('victim_name', $item->victim_name);}else{echo set_value('victim_name');} ?></textarea></td>				   						 		   
							
                                   <th class="tbheader1">1.05  Employment Designation:</th>								   
                                   <td><textarea name="victim_employment_designation" class="form-control"><?php if(isset($load)){echo set_value('victim_employment_designation', $item->victim_employment_designation);}else{echo set_value('victim_employment_designation');} ?></textarea></td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.02   Gender:</th>
                                   <td>
										<div class="checkbox">
											<label><input type="checkbox" name="victim_gender" value="1" <?php echo set_checkbox('victim_gender', '1'); ?> <?php if(isset($load)){if($item->victim_gender==1){echo "checked=checked";}}else{} ?>> MALE</label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" name="victim_gender" value="0" <?php echo set_checkbox('victim_gender', '0'); ?> <?php if(isset($load)){if($item->victim_gender==0){echo "checked=checked";}}else{} ?>> FEMALE</label>
										</div>
								   </td>
                                   <th class="tbheader1">1.06   Unit/Faculty:</th>
                                   <td><textarea name="victim_faculty" class="form-control"><?php if(isset($load)){echo set_value('victim_faculty', $item->victim_faculty);}else{echo set_value('victim_faculty');} ?></textarea></td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.03  Age:</th>
                                   <td><textarea name="victim_age" class="form-control"><?php if(isset($load)){echo set_value('victim_age', $item->victim_age);}else{echo set_value('victim_age');} ?></textarea></td>
                                   
                                   <th class="tbheader1">1.07   Doc ID:</th>
                                   <td><input  type="text" name="doc_id" class="form-control" value="OHS/F/4.20.X" disabled></td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.04   Citizenship:</th>
                                   <td><textarea name="victim_citizenship" class="form-control"><?php if(isset($load)){echo set_value('victim_citizenship', $item->victim_citizenship);}else{echo set_value('victim_citizenship');} ?></textarea></td>

                                   <th class="tbheader1">1.08   Review Date:</th>
                                   <td><input type="date" name="review_date" class="form-control" value="<?php if(isset($load)){echo set_value('review_date', $item->review_date);}else{echo set_value('review_date');} ?>"></td>
                               </tr>							   
                           </tbody>
                       </table>
                </div>
					   <hr>
                
				<div id="section_2" class="sectiontarget">
					   <table class="table table-bordered" id="section_2">
                           <thead>
                                <tr>
                                   <th class="tblTitle" colspan="4"><h8 id="section_2"><strong>SECTION 2 – Incident/Accident Details</strong></h8></th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <th class="tbheader1">2.1 Date of incident:</th>
                                   <td colspan="4"><input  type="date" class="form-control" name="incident_date" value="<?php if(isset($load)){echo set_value('incident_date', $item->incident_date);}else{echo set_value('incident_date');} ?>" ></td>
							   </tr>
                               <tr>
                                   <th class="tbheader1">2.2 Time:</th>
                                   <td colspan="4"><textarea class="form-control" name="incident_time"><?php if(isset($load)){echo set_value('incident_time', $item->incident_time);}else{echo set_value('incident_time');} ?></textarea></td>
                               </tr>
							   <tr>
                                   <th class="tbheader1">2.3 Room/Area:</th>
                                   <td colspan="4"><textarea class="form-control" name="incident_location"><?php if(isset($load)){echo set_value('incident_location', $item->incident_location);}else{echo set_value('incident_location');} ?></textarea></td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">2.4 Type of Incident:</th>
                                   <td colspan="1">										
								   <div class="checkbox">
											<label><input  type="checkbox" name="incident_type1" value="1" <?php echo set_checkbox('incident_type1', '1'); ?> <?php if(isset($load)){if($item->incident_type1==1){echo "checked=checked";}}else{} ?> > Slips, Trips and Falls</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_type2" value="2" <?php echo set_checkbox('incident_type2', '2'); ?> <?php if(isset($load)){if($item->incident_type2==2){echo "checked=checked";}}else{} ?> > Unsafe Act</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_type3" value="3" <?php echo set_checkbox('incident_type3', '3'); ?> <?php if(isset($load)){if($item->incident_type3==3){echo "checked=checked";}}else{} ?> > Burns/Fire</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_type4" value="4" <?php echo set_checkbox('incident_type4', '4'); ?> <?php if(isset($load)){if($item->incident_type4==4){echo "checked=checked";}}else{} ?> > Repetitive strain injury</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_type5" value="5" <?php echo set_checkbox('incident_type5', '5'); ?> <?php if(isset($load)){if($item->incident_type5==5){echo "checked=checked";}}else{} ?> > Cuts/Laceration</label>
									</div>
									
									</td>
                                   
                                   <td colspan="2">
									<div class="checkbox">
											<label><input type="checkbox" name="incident_type6" value="6" <?php echo set_checkbox('incident_type6', '6'); ?> <?php if(isset($load)){if($item->incident_type6==6){echo "checked=checked";}}else{} ?> > Bump/Crash/Impact injury</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_type7" value="7" <?php echo set_checkbox('incident_type7', '7'); ?> <?php if(isset($load)){if($item->incident_type7==7){echo "checked=checked";}}else{} ?> > Chemical/Biological Spillage</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_type8" value="8" <?php echo set_checkbox('incident_type8', '8'); ?> <?php if(isset($load)){if($item->incident_type8==8){echo "checked=checked";}}else{} ?> > Occupational Health/Illness</label>
									</div>
									<div class="checkbox">
											<label><input type="checkbox" name="incident_type9" value="9" <?php echo set_checkbox('incident_type9', '9'); ?> <?php if(isset($load)){if($item->incident_type9==9){echo "checked=checked";}}else{} ?> > Unsafe Workplace Condition</label>
									</div>
									
									<div> Others (specify):<textarea name="incident_type_description" class="form-control"><?php if(isset($load)){echo set_value('incident_type_description', $item->incident_type_description);}else{echo set_value('incident_type_description');} ?>
									</textarea></div>
								   
								   
								   </td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">2.5 Any Injuries?:</th>
                                   <td>
										<div class="checkbox">
                                        <label><input type="checkbox"  name="incident_injury" value="1" <?php echo set_checkbox('incident_injury', '1'); ?> <?php if(isset($load)){if($item->incident_injury==1){echo "checked=checked";}}else{} ?>> Yes </label>
                                            
                                        <label><input type="checkbox"  name="incident_injury" value="0" <?php echo set_checkbox('incident_injury', '0'); ?> <?php if(isset($load)){if($item->incident_injury==0){echo "checked=checked";}}else{} ?>> No </label>
										</div>
								   </td>
                                   <th class="tbheader1">2.6 Requires physician/hospital visit?:</th>
                                   <td>
								   		<div class="checkbox">
                                        <label><input type="checkbox"  name="incident_physician_or_hospital" value="1" <?php echo set_checkbox('incident_physician_or_hospital', '1'); ?> <?php if(isset($load)){if($item->incident_physician_or_hospital==1){echo "checked=checked";}}else{} ?>> Yes </label>
                                            
                                        <label><input type="checkbox"  name="incident_physician_or_hospital" value="0" <?php echo set_checkbox('incident_physician_or_hospital', '0'); ?> <?php if(isset($load)){if($item->incident_physician_or_hospital==0){echo "checked=checked";}}else{} ?> > No  </label>
										</div>
								   </td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">2.7 Details of incident:</th>
                                   <td colspan="4"><textarea class="form-control" name="incident_details"><?php if(isset($load)){echo set_value('incident_details', $item->incident_details);}else{echo set_value('incident_details');} ?></textarea></td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">2.8 Actions Taken:</th>
                                   <td colspan="4"><textarea class="form-control" name="incident_actions"><?php if(isset($load)){echo set_value('incident_actions', $item->incident_actions);}else{echo set_value('incident_actions');} ?></textarea></td>
                               </tr>                               
                           </tbody>
                       </table>
                </div>
                   
				   <hr>  
                <div id="section_3" class="sectiontarget">
                   <table  class="table table-bordered" id="section_3">
                       <thead>
                           <tr>
                               <th class="tblTitle" colspan="4"><h8 id="section_3"><strong>SECTION 3 – Reporter Detail</strong></h8></th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
							       •	I, hereby declare that the information I have provided in this form for Notification of Exporting Biological Material is true and correct.
								   <br>
								   •	Swinburne University of Technology Sarawak Campus collects, uses and destroys personal data in accordance with our Privacy Collection Notice at <a href="http://www.swinburne.edu.my/privacy/">http://www.swinburne.edu.my/privacy</a>
								        and Employee's Privacy Collection Notice at <a style="color:blue;">Blackboard>My.Swinburne>Student & Corporate Services> Human Resources>Employee's Privacy Collection Notice.</a>
							   </td>                               
                           </tr>
                           <tr>
                                   <th class="tbheader1">Reported by:</th>
                                   <td style="width:80%"><textarea class="form-control" name="reporter_name"><?php if(isset($load)){echo set_value('reporter_name', $item->reporter_name);}else{echo set_value('reporter_name');} ?></textarea></td>
                           </tr>
						   <tr>
                                   <th class="tbheader1">Designation:</th>
                                   <td style="width:80%"><textarea class="form-control" name="reporter_designation"><?php if(isset($load)){echo set_value('reporter_designation', $item->reporter_designation);}else{echo set_value('reporter_designation');} ?></textarea></td>
                           </tr>
						   <tr>
                                   <th class="tbheader1">Date:</th>
                                   <td style="width:80%"><input  type="date" class="form-control" name="reporter_date" value="<?php if(isset($load)){echo set_value('reporter_date', $item->reporter_date);}else{echo set_value('reporter_date');} ?>" ></td>
                           </tr>
                       </tbody>
                   </table>
                </div>
				   <hr>
                <div id="section_4" class="sectiontarget">
                   <table class="table table-bordered" id="section_4">
                           <thead>
                                <tr>
                                   <th class="tblTitle" colspan="4"><h8 id="section_4"><strong>SECTION 4 – For Investigation Team Only (*Details required as per OSH (NADOPOD) Regulation 2004)</strong></h8></th>
                               </tr>
                           </thead>
                           <tbody>                               
                               <tr>
                                   <th class="tbheader1">4.1 Any victim?:</th>
                                   <td>
										<div class="checkbox">
                                        <label><input type="checkbox"  name="investigation_victim" value="1" <?php echo set_checkbox('investigation_victim', '0'); ?> <?php if(isset($load)){if($item->investigation_victim==1){echo "checked=checked";}}else{} ?> > Yes </label>
                                            
                                        <label><input type="checkbox"  name="investigation_victim" value="0" <?php echo set_checkbox('investigation_victim', '0'); ?> <?php if(isset($load)){if($item->investigation_victim==0){echo "checked=checked";}}else{} ?> > No </label>
										</div>
								   </td>
                                   <th class="tbheader1">4.3 Victim’s citizenship:</th>
                                   <td>
										<textarea class="form-control" name="investigation_victim_citizenship"><?php if(isset($load)){echo set_value('investigation_victim_citizenship', $item->investigation_victim_citizenship);}else{echo set_value('investigation_victim_citizenship');} ?></textarea>
								   </td>
                               </tr>
							   <tr>
                                   <th class="tbheader1">4.2 Victim’s age:</th>
                                   <td>
										<textarea class="form-control" name="investigation_victim_age"><?php if(isset($load)){echo set_value('investigation_victim_age', $item->investigation_victim_age);}else{echo set_value('investigation_victim_age');} ?></textarea>
								   </td>
                                   <th class="tbheader1">4.4 Victim’s job description:</th>
                                   <td>
										<textarea class="form-control" name="investigation_victim_job_description"><?php if(isset($load)){echo set_value('investigation_victim_job_description', $item->investigation_victim_job_description);}else{echo set_value('investigation_victim_job_description');} ?></textarea>
								   </td>
                               </tr>
							   
                               <tr>
                                   <th colspan="4" class="tbheader1">4.5 Investigation Findings:</th>  
                               </tr> 
                           <tr>
                               <td colspan="4">
										<textarea rows="6" maxlength="500" name="investigation_findings" class="form-control" ><?php if(isset($load)){echo set_value('investigation_findings', $item->investigation_findings);}else{echo set_value('investigation_findings');} ?></textarea>
							   </td>
                           </tr>
                           </tbody>
                       </table>
                </div>
				   <hr>
                   <table  class="table table-bordered">
                       <thead>
                           <tr>
                               <th class="tblTitle" colspan="4"><h8><strong>CORRECTIVE/PREVENTIVE ACTION</strong></h8></th>
                           </tr>
                       </thead>
						<table class="table table-bordered">

                           <tbody style="width:100%">
                               <tr style="width:25%">
                                   <th width="20">Number</th>
                                   <th>Action</th>
                                   <th>By Whom</th>
                                   <th>Timeline/Completion Date</th>                                                                     
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea class="form-control" name="investigation_preventive_no[0]"><?php if(isset($load)){echo set_value('investigation_preventive_no[0]', $a[0]);}else{echo set_value('investigation_preventive_no[0]');} ?>
								   </textarea></th>
                                   
                                   <th><textarea  class="form-control" name="investigation_preventive_action[0]"><?php if(isset($load)){echo set_value('investigation_preventive_action[0]', $b[0]);}else{echo set_value('investigation_preventive_action[0]');} ?>
								   </textarea></th>
                                   
                                   <th><textarea class="form-control" name="investigation_preventive_by_whom[0]"><?php if(isset($load)){echo set_value('investigation_preventive_by_whom[0]', $c[0]);}else{echo set_value('investigation_preventive_by_whom[0]');} ?>
								   </textarea></th>
                                   
                                   <th><input  type="date" class="form-control" name="investigation_preventive_timeline[0]" value="<?php if(isset($load)){echo set_value('investigation_preventive_timeline[0]', $d[0]);}else{echo set_value('investigation_preventive_timeline[0]');} ?>"></th>
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea class="form-control" name="investigation_preventive_no[1]"><?php if(isset($load)){echo set_value('investigation_preventive_no[1]', $a[1]);}else{echo set_value('investigation_preventive_no[1]');} ?>
								   </textarea></th>
                                   
                                   <th><textarea class="form-control" name="investigation_preventive_action[1]"><?php if(isset($load)){echo set_value('investigation_preventive_action[1]', $b[1]);}else{echo set_value('investigation_preventive_action[1]');} ?>
								   </textarea></th>
                                   
                                   <th><textarea class="form-control" name="investigation_preventive_by_whom[1]"><?php if(isset($load)){echo set_value('investigation_preventive_by_whom[1]', $c[1]);}else{echo set_value('investigation_preventive_by_whom[1]');} ?></textarea></th>
                                   
                                   <th><input type="date" class="form-control" name="investigation_preventive_timeline[1]" value="<?php if(isset($load)){echo set_value('investigation_preventive_timeline[1]', $d[1]);}else{echo set_value('investigation_preventive_timeline[1]');} ?>"></th>
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea class="form-control" name="investigation_preventive_no[2]"><?php if(isset($load)){echo set_value('investigation_preventive_no[2]', $a[2]);}else{echo set_value('investigation_preventive_no[2]');} ?>
								   </textarea></th>
                                   
                                   <th><textarea class="form-control" name="investigation_preventive_action[2]"><?php if(isset($load)){echo set_value('investigation_preventive_action[2]', $b[2]);}else{echo set_value('investigation_preventive_action[2]');} ?>
								   </textarea></th>
                                   
                                   <th><textarea class="form-control" name="investigation_preventive_by_whom[2]"><?php if(isset($load)){echo set_value('investigation_preventive_by_whom[2]', $c[2]);}else{echo set_value('investigation_preventive_by_whom[2]');} ?>
								   </textarea></th>
                                   
                                   <th><input  type="date" class="form-control" name="investigation_preventive_timeline[2]" value="<?php if(isset($load)){echo set_value('investigation_preventive_timeline[2]', $d[2]);}else{echo set_value('investigation_preventive_timeline[2]');} ?>"></th>
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea  class="form-control" name="investigation_preventive_no[3]"><?php if(isset($load)){echo set_value('investigation_preventive_no[3]', $a[3]);}else{echo set_value('investigation_preventive_no[3]');} ?>
								   </textarea></th>
                                   
                                   <th><textarea class="form-control" name="investigation_preventive_action[3]"><?php if(isset($load)){echo set_value('investigation_preventive_action[3]', $b[3]);}else{echo set_value('investigation_preventive_action[3]');} ?></textarea></th>
                                   
                                   <th><textarea class="form-control" name="investigation_preventive_by_whom[3]"><?php if(isset($load)){echo set_value('investigation_preventive_by_whom[3]', $c[3]);}else{echo set_value('investigation_preventive_by_whom[3]');} ?></textarea></th>
                                   
                                   <th><input type="date" class="form-control" name="investigation_preventive_timeline[3]" value="<?php if(isset($load)){echo set_value('investigation_preventive_timeline[3]', $d[3]);}else{echo set_value('investigation_preventive_timeline[3]');} ?>" ></th>
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea  class="form-control" name="investigation_preventive_no[4]"><?php if(isset($load)){echo set_value('investigation_preventive_no[4]', $a[4]);}else{echo set_value('investigation_preventive_no[4]');} ?>
								   </textarea></th>
                                   
                                   <th><textarea  class="form-control" name="investigation_preventive_action[4]"><?php if(isset($load)){echo set_value('investigation_preventive_action[4]', $b[4]);}else{echo set_value('investigation_preventive_action[4]');} ?>
								   </textarea></th>
                                   
                                   <th><textarea class="form-control" name="investigation_preventive_by_whom[4]"><?php if(isset($load)){echo set_value('investigation_preventive_by_whom[4]', $c[4]);}else{echo set_value('investigation_preventive_by_whom[4]');} ?>
								   </textarea></th>
                                   
                                   <th><input type="date" class="form-control" name="investigation_preventive_timeline[4]" value="<?php if(isset($load)){echo set_value('investigation_preventive_timeline[4]', $d[4]);}else{echo set_value('investigation_preventive_timeline[4]');} ?>" ></th>
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea class="form-control" name="investigation_preventive_no[5]"><?php if(isset($load)){echo set_value('investigation_preventive_no[5]', $a[5]);}else{echo set_value('investigation_preventive_no[5]');} ?>
								   </textarea></th>
                                   
                                   <th><textarea class="form-control" name="investigation_preventive_action[5]"><?php if(isset($load)){echo set_value('investigation_preventive_action[5]', $b[5]);}else{echo set_value('investigation_preventive_action[5]');} ?>
								   </textarea></th>
                                   
                                   <th><textarea class="form-control" name="investigation_preventive_by_whom[5]"><?php if(isset($load)){echo set_value('investigation_preventive_by_whom[5]', $c[5]);}else{echo set_value('investigation_preventive_by_whom[5]');} ?>
								   </textarea></th>
                                   
                                   <th><input type="date" class="form-control" name="investigation_preventive_timeline[5]" value="<?php if(isset($load)){echo set_value('investigation_preventive_timeline[5]', $d[5]);}else{echo set_value('investigation_preventive_timeline[5]');} ?>" ></th>
                               </tr>
                           <tr>
                               <td colspan="4">
                                   <table class="table table-bordered">
                                       <tr>
                                           <td>Report/Investigated By: <textarea class="form-control" name="investigated_by"><?php if(isset($load)){echo set_value('investigated_by', $item->investigated_by);}else{echo set_value('investigated_by');} ?>
										   </textarea></td>
                                           
                                           <td>Reviewed By: <textarea class="form-control" name="reviewed_by"><?php if(isset($load)){echo set_value('reviewed_by', $item->reviewed_by);}else{echo set_value('reviewed_by');} ?>
										   </textarea></td>
                                       </tr>                                       
                                   </table>
                               </td>
                           </tr>							   
                           </tbody>
                       </table>
                   </table>
                   
				   <hr>
                
                <div>
                    <input type="hidden" name="appid" value="<?php if(isset($appID)){echo $appID;} ?>">
                </div>
                
                   <div style="text-align: center">
                       <?php if(isset($editload)){ ?>
                       <button type="submit" name = 'updateButton' value = 'Update' onclick="location.href='<?php echo site_url().'/incidentaccidentreport/update_form';?>'" class="btn btn-primary">Update</button>
                       <?php }else{ ?>
                       <button name="saveButton" type="submit" class="btn btn-primary col-md-2">Save</button>
                        <button name="submitButton" type="submit" class="btn btn-primary col-md-2">Submit</button>
                       <?php } ?>
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
    

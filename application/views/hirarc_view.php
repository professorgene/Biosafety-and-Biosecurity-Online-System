 <?php
    
    if(isset($load)){
        foreach($retrieved3 as $hirarc){
            $load1 = $hirarc->HIRARC_activity;
            $load2 = $hirarc->HIRARC_hazard;
            $load3 = $hirarc->HIRARC_effects;
            $load4 = $hirarc->HIRARC_risk_control;
            $load5 = $hirarc->HIRARC_LLH;
            $load6 = $hirarc->HIRARC_SEV;
            $load7 = $hirarc->HIRARC_RR;
            $load8 = $hirarc->HIRARC_control_measure;
            $load9 = $hirarc->HIRARC_PIC;
            
            $hi1 = explode(",", $load1);
            $hi2 = explode(",", $load2);
            $hi3 = explode(",", $load3);
            $hi4 = explode(",", $load4);
            $hi5 = explode(",", $load5);
            $hi6 = explode(",", $load6);
            $hi7 = explode(",", $load7);
            $hi8 = explode(",", $load8);
            $hi9 = explode(",", $load9);
        }
        
        
    }else{
           
        }
    
    ?>

<script>
    function calculate0(){
        var llh0 = document.getElementById("LLH0");
        var sev0 = document.getElementById("SEV0");
        var rr0 = document.getElementById("RR0");
        
        var result = llho * sev0;
        rr0.value = result;
    }
</script>
    
        <div id="hirarctop" class="row">   
            
            
            <div class="col-md-10">
               
                   <div>
                       <h5><strong>PLEASE FILL OUT ALL INFORMATION REQUESTED</strong></h5>
                   </div>
                
                <div>
                    <?php if(isset($refer)) { ?>
                    <p><?php echo $refer; ?></p>
                    <?php } ?>
                </div>
                   
                   <br>
                   
                   <div id="hirarc_section_1" class="sectiontarget">
                       <table class="table table-bordered" id="section_1">
                           <thead>
                                <tr>
                                   <th class="tblTitle" colspan="10"><h8 id="section_1"><strong>Section 1 - Person Completing Form Details</strong></h8></th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <th>1.01 Company/Department</th>
                                   <td>
                                       <textarea class="form-control" name="company_name"><?php if(isset($load)){echo set_value('company_name', $hirarc->company_name);}else{echo set_value('company_name');} ?></textarea>
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.02 Date</th>
                                   <td>
                                       <input type="date" class="form-control" name="date" value="<?php if(isset($load)){echo set_value('date', $hirarc->date);}else{echo set_value('date');} ?>">
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.03 Process Location</th>
                                   <td>
                                       <textarea class="form-control" name="process_location"><?php if(isset($load)){echo set_value('process_location', $hirarc->process_location);}else{echo set_value('process_location');} ?></textarea>
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.04 Conducted by (name)</th>
                                   <td>
                                       <textarea class="form-control" name="conducted_name"><?php if(isset($load)){echo set_value('conducted_name', $hirarc->conducted_name);}else{echo set_value('conducted_name');} ?></textarea>
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.04.2 Conducted by (designation)</th>
                                   <td>
                                       <textarea class="form-control" name="conducted_designation"><?php if(isset($load)){echo set_value('conducted_designation', $hirarc->conducted_designation);}else{echo set_value('conducted_designation');} ?></textarea>
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.05 Approved by (name)</th>
                                   <td>
                                       <textarea class="form-control" name="approved_name"><?php if(isset($load)){echo set_value('approved_name', $hirarc->approved_name);}else{echo set_value('approved_name');} ?></textarea>
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.05.2 Approved by (designation)</th>
                                   <td>
                                       <textarea class="form-control" name="approved_designation"><?php if(isset($load)){echo set_value('approved_designation', $hirarc->approved_designation);}else{echo set_value('approved_designation');} ?></textarea>
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.06 Date (From ... To ...)</th>
                                   <td>
                                       <input type="date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="date_from" placeholder="Date (From...)" value="<?php if(isset($load)){echo set_value('date_from', $hirarc->date_from);}else{echo set_value('date_from');} ?>">
                                       
                                       <input type="date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="date_to" placeholder="Date (To...)" value="<?php if(isset($load)){echo set_value('date_to', $hirarc->date_to);}else{echo set_value('date_to');} ?>">
                                   
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.07 Review Date</th>
                                   <td>
                                       <input type="date" class="form-control" name="review_date" value="<?php if(isset($load)){echo set_value('review_date', $hirarc->review_date);}else{echo set_value('review_date');} ?>">
                                   </td>
                               </tr>
                               <tr>
                                   <th>1.08 Doc. No.</th>
                                   <td>OHS/F/4.5.X</td>
                               </tr>
                               
                           </tbody>
                       </table>
                   </div>
                   
                   <div id="hirarc_section_2" class="sectiontarget">
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
                                   <td>
                                       <textarea class="form-control" name="HIRARC_activity[0]"><?php if(isset($load)){echo set_value('HIRARC_activity[0]', $hi1[0]);}else{echo set_value('HIRARC_activity[0]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_hazard[0]"><?php if(isset($load)){echo set_value('HIRARC_hazard[0]', $hi2[0]);}else{echo set_value('HIRARC_hazard[0]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_effects[0]"><?php if(isset($load)){echo set_value('HIRARC_effects[0]', $hi3[0]);}else{echo set_value('HIRARC_effects[0]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_risk_control[0]"><?php if(isset($load)){echo set_value('HIRARC_risk_control[0]', $hi4[0]);}else{echo set_value('HIRARC_risk_control[0]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" id="LLH0" name="HIRARC_LLH[0]" oninput="calculate0()"><?php if(isset($load)){echo set_value('HIRARC_LLH[0]', $hi5[0]);}else{echo set_value('HIRARC_LLH[0]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" id="SEV0" name="HIRARC_SEV[0]" oninput="calculate0()"><?php if(isset($load)){echo set_value('HIRARC_SEV[0]', $hi6[0]);}else{echo set_value('HIRARC_SEV[0]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" id="RR0" name="HIRARC_RR[0]"><?php if(isset($load)){echo set_value('HIRARC_RR[0]', $hi7[0]);}else{echo set_value('HIRARC_RR[0]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_control_measure[0]"><?php if(isset($load)){echo set_value('HIRARC_control_measure[0]', $hi8[0]);}else{echo set_value('HIRARC_control_measure[0]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_PIC[0]"><?php if(isset($load)){echo set_value('HIRARC_PIC[0]', $hi9[0]);}else{echo set_value('HIRARC_PIC[0]');} ?></textarea>
                                   </td>
                               </tr>
                               <tr>
                                   <td>2</td>
                                   <td>
                                       <textarea class="form-control" name="HIRARC_activity[1]"><?php if(isset($load)){echo set_value('HIRARC_activity[1]', $hi1[1]);}else{echo set_value('HIRARC_activity[1]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_hazard[1]"><?php if(isset($load)){echo set_value('HIRARC_hazard[0]', $hi2[1]);}else{echo set_value('HIRARC_hazard[1]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_effects[1]"><?php if(isset($load)){echo set_value('HIRARC_effects[1]', $hi3[1]);}else{echo set_value('HIRARC_effects[1]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_risk_control[1]"><?php if(isset($load)){echo set_value('HIRARC_risk_control[1]', $hi4[1]);}else{echo set_value('HIRARC_risk_control[1]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_LLH[1]"><?php if(isset($load)){echo set_value('HIRARC_LLH[1]', $hi5[1]);}else{echo set_value('HIRARC_LLH[1]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_SEV[1]"><?php if(isset($load)){echo set_value('HIRARC_SEV[1]', $hi6[1]);}else{echo set_value('HIRARC_SEV[1]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_RR[1]"><?php if(isset($load)){echo set_value('HIRARC_RR[1]', $hi7[1]);}else{echo set_value('HIRARC_RR[1]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_control_measure[1]"><?php if(isset($load)){echo set_value('HIRARC_control_measure[1]', $hi8[1]);}else{echo set_value('HIRARC_control_measure[1]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_PIC[1]"><?php if(isset($load)){echo set_value('HIRARC_PIC[1]', $hi9[1]);}else{echo set_value('HIRARC_PIC[1]');} ?></textarea>
                                   </td>
                               </tr>
                               <tr>
                                   <td>3</td>
                                   <td>
                                       <textarea class="form-control" name="HIRARC_activity[2]"><?php if(isset($load)){echo set_value('HIRARC_activity[2]', $hi1[2]);}else{echo set_value('HIRARC_activity[2]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_hazard[2]"><?php if(isset($load)){echo set_value('HIRARC_hazard[2]', $hi2[2]);}else{echo set_value('HIRARC_hazard[2]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_effects[2]"><?php if(isset($load)){echo set_value('HIRARC_effects[2]', $hi3[2]);}else{echo set_value('HIRARC_effects[2]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_risk_control[2]"><?php if(isset($load)){echo set_value('HIRARC_risk_control[2]', $hi4[2]);}else{echo set_value('HIRARC_risk_control[2]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_LLH[2]"><?php if(isset($load)){echo set_value('HIRARC_LLH[2]', $hi5[2]);}else{echo set_value('HIRARC_LLH[2]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_SEV[2]"><?php if(isset($load)){echo set_value('HIRARC_SEV[2]', $hi6[2]);}else{echo set_value('HIRARC_SEV[2]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_RR[2]"><?php if(isset($load)){echo set_value('HIRARC_RR[2]', $hi7[2]);}else{echo set_value('HIRARC_RR[2]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_control_measure[2]"><?php if(isset($load)){echo set_value('HIRARC_control_measure[2]', $hi8[2]);}else{echo set_value('HIRARC_control_measure[2]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_PIC[2]"><?php if(isset($load)){echo set_value('HIRARC_PIC[2]', $hi9[2]);}else{echo set_value('HIRARC_PIC[2]');} ?></textarea>
                                   </td>
                               </tr>
                               <tr>
                                   <td>4</td>
                                   <td>
                                       <textarea class="form-control" name="HIRARC_activity[3]"><?php if(isset($load)){echo set_value('HIRARC_activity[3]', $hi1[3]);}else{echo set_value('HIRARC_activity[3]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_hazard[3]"><?php if(isset($load)){echo set_value('HIRARC_hazard[3]', $hi2[3]);}else{echo set_value('HIRARC_hazard[3]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_effects[3]"><?php if(isset($load)){echo set_value('HIRARC_effects[3]', $hi3[3]);}else{echo set_value('HIRARC_effects[3]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_risk_control[3]"><?php if(isset($load)){echo set_value('HIRARC_risk_control[3]', $hi4[3]);}else{echo set_value('HIRARC_risk_control[3]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_LLH[3]"><?php if(isset($load)){echo set_value('HIRARC_LLH[3]', $hi5[3]);}else{echo set_value('HIRARC_LLH[3]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_SEV[3]"><?php if(isset($load)){echo set_value('HIRARC_SEV[3]', $hi6[3]);}else{echo set_value('HIRARC_SEV[3]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_RR[3]"><?php if(isset($load)){echo set_value('HIRARC_RR[3]', $hi7[3]);}else{echo set_value('HIRARC_RR[3]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_control_measure[3]"><?php if(isset($load)){echo set_value('HIRARC_control_measure[3]', $hi8[3]);}else{echo set_value('HIRARC_control_measure[3]');} ?></textarea>
                                   </td>
                                   
                                   <td>
                                       <textarea class="form-control" name="HIRARC_PIC[3]"><?php if(isset($load)){echo set_value('HIRARC_PIC[3]', $hi9[3]);}else{echo set_value('HIRARC_PIC[3]');} ?></textarea>
                                   </td>
                               </tr>
                           </tbody>
                       </table>

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
                                   <td>Might be occur at sometime in the future</td>
                                   <td>3</td>
                               </tr>
                               <tr>
                                   <td>Remote</td>
                                   <td>Has not been known to occur after many years</td>
                                   <td>2</td>
                               </tr>
                               <tr>
                                   <td>Inconceivable</td>
                                   <td>Is practically impossible and has never occurred</td>
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
                                   <td>Numerous fatalities, irrecoverable property damage and productivity</td>
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
                                   <th colspan="5" class="tblTitle2">Severity (S)</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <th class="tblTitle2">Likelihood (L)</th>
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
                                   <th class="greendata2">3</th>
                                   <th class="yellowdata">6</th>
                                   <th class="yellowdata">9</th>
                                   <th class="yellowdata">12</th>
                                   <th class="reddata">15</th>
                               </tr>
                               <tr>
                                   <th class="tblTitle2">2</th>
                                   <th class="greendata2">2</th>
                                   <th class="greendata2">4</th>
                                   <th class="yellowdata">6</th>
                                   <th class="yellowdata">8</th>
                                   <th class="yellowdata">10</th>
                               </tr>
                               <tr>
                                   <th class="tblTitle2">1</th>
                                   <th class="greendata2">1</th>
                                   <th class="greendata2">2</th>
                                   <th class="greendata2">3</th>
                                   <th class="greendata2">4</th>
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
                                   <td>A MEDIUM risk requires a planned approach to controlling the hazard and applies temporary measure if required. Actions taken must be documented on the risk assesment form including date for completion.</td>
                               </tr>
                               <tr>
                                   <td class="greendata2 colspace">1 - 4</td>
                                   <td class="greendata2">LOW</td>
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
                       <button type="submit" name = 'updateButton' value = 'Update' onclick="location.href='<?php echo site_url().'/hirarc/update_form';?>'" class="btn btn-primary">Update</button>
                       <?php }else{ ?>
                       <button name="saveButton" type="submit" class="btn btn-primary col-md-2">Save</button>
                       <button name="submitButton" type="submit" class="btn btn-primary col-md-2">Submit</button>
                       <?php } ?>
                       
                   </div>
               
            </div>
            
            <div class="col-md-2">
                <div class="btn-group-vertical btn-sample">
                    <a href="#hirarctop" class="btn btn-success">Top</a>
                    <a href="#hirarc_section_1" class="btn btn-success">Section 1</a>
                    <a href="#hirarc_section_2" class="btn btn-success">Section 2</a>
                </div>   
            </div>
        </div>
        
        
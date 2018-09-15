 
    <?php
    
    if(isset($load)){
        foreach($retrieved as $item){
            
        }
        
        
    }else{
           
        }
    
    ?>
    
        <div class="row">

            <div class="col-md-10">
               <?php if(isset($editload)) { echo form_open('procurement/update_form'); } else { echo form_open('procurement/index'); } ?>
                <?php if(isset($disabled)){ echo "<fieldset disabled='disabled'>"; } ?>
                   
                   <div>
                        <br/>
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                   
                   <div>
                       <h5 class="dark_background">PLEASE FILL IN ALL INFORMATION REQUESTED</h5>
                  </div>
                   
                   <p><strong>Purpose:</strong>To identify, assess and manage risks associated with the requested substances and/or material (chemical/biological/equipment) prior procurement.</p>
                   
                   <p><strong>Note:</strong>Fill in the neccessary and related sections</p>
                   
                <div id="section_1" class="sectiontarget">
                   <table class="table table-bordered" id="section_1">
                       <thead>
                           <tr>
                               <th colspan="6" class="tblTitle">Section 1 - Details on Purchase</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <th class="tbheader1" width="90">
                                   1.01 To Purchase<br>
                                   <p class="grey-text">Fill in Section 2A for chemical/biological</p>
                                   <p class="grey-text">Fill in Section 2B for Equipment</p>
                               </th>
                               <td>
                                   <table class="table table-bordered">
                                       <tr>
                                           <td>Chemical</td>
                                           <td>
                                               <div class="checkbox">
                                                   <label><input type="checkbox" value="1" name="Sec1_chemical" <?php echo  set_checkbox('Sec1_chemical', '1'); ?> <?php if(isset($load)){if($item->Sec1_chemical==1){echo "checked=checked";}}else{} ?> ></label>
                                               </div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>Biological Material</td>
                                           <td>
                                               <div class="checkbox">
                                                   <label><input type="checkbox" value="1" name="Sec1_biological_material" <?php echo  set_checkbox('Sec1_biological_material', '1'); ?> <?php if(isset($load)){if($item->Sec1_biological_material==1){echo "checked=checked";}}else{} ?> ></label>
                                               </div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>Equipment</td>
                                           <td>
                                               <div class="checkbox">
                                                   <label><input type="checkbox" value="1" name="Sec1_equipment" <?php echo  set_checkbox('Sec1_equipment', '1'); ?> <?php if(isset($load)){if($item->Sec1_equipment==1){echo "checked=checked";}}else{} ?> ></label>
                                               </div>
                                           </td>
                                       </tr>
                                   </table>
                               </td>
                               <th class="text-center tbheader1">
                                   1.02 Doc ID
                               </th>
                               <td class="text-center"><input type="text" class="form-control" name="Sec1_doc_id"  value="<?php if(isset($load)){echo set_value('Sec1_doc_id', $item->Sec1_doc_id);}else{echo set_value('Sec1_doc_id');} ?>"></td>
                               
                               <th class="text-center tbheader1">1.03 Review Date</th>
                               <td class="text-center"><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="Sec1_review_date" value="<?php if(isset($load)){echo set_value('Sec1_review_date', $item->Sec1_review_date);}else{echo set_value('Sec1_review_date');} ?>" ></td>
                           </tr>
                       </tbody>
                   </table>
                </div>
                <div id="section_2" class="sectiontarget">
                   <table class="table table-bordered" id="section_2">
                       <thead>
                           <th colspan="4" class="tblTitle">Section 2A - Details on Purchase
                           <p>Section  2A1– Details on the substance</p></th>
                       </thead>
                       <tbody>
                           <tr>
                               <th class="tbheader1">1.01 Name of the substance</th>
                               <td><div class="form-group"><input type="text" class="form-control" name="Sec2A_name" value="<?php if(isset($load)){echo set_value('Sec2A_name', $item->Sec2A_name);}else{echo set_value('Sec2A_name');} ?>" ></div></td>
                               <th class="tbheader1">1.04 If “Yes”, list the hazard statement</th>
                               <td><div class="form-group"><input type="text" class="form-control" name="Sec2A_statement" value="<?php if(isset($load)){echo set_value('Sec2A_statement', $item->Sec2A_statement);}else{echo set_value('Sec2A_statement');} ?>" ></div></td>
                           </tr>
                           <tr>
                               <th class="tbheader1">1.02 Substance’s manufacturer</th>
                               <td><div class="form-group"><input type="text" class="form-control" name="Sec2A_manufacturer" value="<?php if(isset($load)){echo set_value('Sec2A_manufacturer', $item->Sec2A_manufacturer);}else{echo set_value('Sec2A_manufacturer');} ?>" ></div></td>
                               <th class="tbheader1">1.05 Is the waste a scheduled waste?<p class="grey-text">*If it’s hazardous, it’s a scheduled waste</p></th>
                               <td>
                                   <label class="radio-inline"><input type="radio" value="1" name="Sec2A_waste" <?php echo set_radio('Sec2A_waste', '1'); ?> <?php if(isset($load)){if($item->Sec2A_waste==1){echo "checked=checked";}}else{} ?> />Yes</label>
                                   <label class="radio-inline"><input type="radio" value="0" name="Sec2A_waste" <?php echo set_radio('Sec2A_waste', '0'); ?> <?php if(isset($load)){if($item->Sec2A_waste==0){echo "checked=checked";}}else{} ?> >No</label>
                               </td>
                           </tr>
                           <tr>
                               <th class="tbheader1">1.03 Is the substance a hazardous substance?</th>
                               <td>
                                   <label class="radio-inline"><input type="radio" value="1" name="Sec2A_hazardous" <?php echo set_radio('Sec2A_hazardous', '1'); ?> <?php if(isset($load)){if($item->Sec2A_hazardous==1){echo "checked=checked";}}else{} ?> >Yes</label>
                                   <label class="radio-inline"><input type="radio" value="0" name="Sec2A_hazardous" <?php echo set_radio('Sec2A_hazardous', '0'); ?> <?php if(isset($load)){if($item->Sec2A_hazardous==0){echo "checked=checked";}}else{} ?> >No</label>
                               </td>
                               <th class="tbheader1">1.06 If “Yes”, list the scheduled waste characteristic</th>
                               <td>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="1" name="Sec2A_waste_type_corrosive" <?php echo set_checkbox('Sec2A_waste_type_corrosive', '1'); ?> <?php if(isset($load)){if($item->Sec2A_waste_type_corrosive==1){echo "checked=checked";}}else{} ?> >Corrosive</label>
                                   </div>
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A_waste_type_ignitable" <?php echo set_checkbox('Sec2A_waste_type_ignitable', '1'); ?> <?php if(isset($load)){if($item->Sec2A_waste_type_ignitable==1){echo "checked=checked";}}else{} ?> >Ignitable</label>
                                   </div>
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A_waste_type_reactive" <?php echo set_checkbox('Sec2A_waste_type_reactive', '1'); ?> <?php if(isset($load)){if($item->Sec2A_waste_type_reactive==1){echo "checked=checked";}}else{} ?> >Reactive</label>
                                   </div> 
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A_waste_type_toxic" <?php echo set_checkbox('Sec2A_waste_type_toxic', '1'); ?> <?php if(isset($load)){if($item->Sec2A_waste_type_toxic==1){echo "checked=checked";}}else{} ?> >Toxic</label>
                                   </div> 
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A_waste_type_infectious" <?php echo set_checkbox('Sec2A_waste_type_infectious', '1'); ?> <?php if(isset($load)){if($item->Sec2A_waste_type_infectious==1){echo "checked=checked";}}else{} ?> >Infectious</label>
                                   </div> 
                               </td>
                           </tr>
                       </tbody>
                   </table>
                </div>
                
                   <table class="table table-bordered">
                       <thead>
                           <th colspan="4" class="tblTitle">Section 2A2 – Description of work / activities / use</th>
                       </thead>
                       <tbody>
                           <tr>
                               <th class="tbheader1">2.01 Licensing / permit required?</th>
                               <td>
                                   <label class="radio-inline"><input type="radio" value="1" name="Sec2A2_permit" <?php echo set_radio('Sec2A2_permit', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_permit==1){echo "checked=checked";}}else{} ?>>Yes</label>
                                   
                                   <label class="radio-inline"><input type="radio" value="0" name="Sec2A2_permit" <?php echo set_radio('Sec2A2_permit', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_permit==0){echo "checked=checked";}}else{} ?>>No</label>
                               </td>
                               <th class="tbheader1">2.05 Storage requirements?</th>
                               <td><div class="form-group"><input type="text" class="form-control" name="Sec2A2_storage" value="<?php if(isset($load)){echo set_value('Sec2A2_storage', $item->Sec2A2_storage);}else{echo set_value('Sec2A2_storage');} ?>"></div></td>
                           </tr>
                           <tr>
                               <th class="tbheader1">2.02 If “Yes”, type of license / permit required</th>
                               <td><div class="form-group"><input type="text" class="form-control" name="Sec2A2_permit_type" value="<?php if(isset($load)){echo set_value('Sec2A2_permit_type', $item->Sec2A2_permit_type);}else{echo set_value('Sec2A2_permit_type');} ?>" ></div></td>
                               
                               <th class="tbheader1">2.06 Waste / disposal requirements?<p class="grey-text">*Refer to Disposal section in SDS or the Accidental Release section</p>
                               </th>
                               <td>
                                   <label class="radio-inline"><input type="radio" value="1" name="Sec2A2_waste_requirement" <?php echo set_radio('Sec2A2_waste_requirement', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_waste_requirement==1){echo "checked=checked";}}else{} ?> >Yes</label>
                                   
                                   <label class="radio-inline"><input type="radio" value="0" name="Sec2A2_waste_requirement" <?php echo set_radio('Sec2A2_waste_requirement', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_waste_requirement==0){echo "checked=checked";}}else{} ?> >No</label>
                               </td>
                           </tr>
                           <tr>
                               <th class="tbheader1"><p>2.03 Current MSDS (less than 5yrs) is available</p></th>
                               <td>
                                   <label class="radio-inline"><input type="radio" value="1" name="Sec2A2_MSDS" <?php echo set_radio('Sec2A2_MSDS', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_MSDS==1){echo "checked=checked";}}else{} ?> >Yes</label>
                                   
                                   <label class="radio-inline"><input type="radio" value="0" name="Sec2A2_MSDS" <?php echo set_radio('Sec2A2_MSDS', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_MSDS==0){echo "checked=checked";}}else{} ?> >No</label>
                               </td>
                               <th class="tbheader1"><p>2.07 Risk control for the use of material</p></th>
                               <td>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="1" name="Sec2A2_risk_control_training" <?php echo set_checkbox('Sec2A2_risk_control_training', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_risk_control_training==1){echo "checked=checked";}}else{} ?> >Training Procedure</label>
                                   </div>
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A2_risk_control_inspection" <?php echo set_checkbox('Sec2A2_risk_control_inspection', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_risk_control_inspection==1){echo "checked=checked";}}else{} ?> >Inspections</label>
                                   </div>
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A2_risk_control_SOP" <?php echo set_checkbox('Sec2A2_risk_control_SOP', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_risk_control_SOP==1){echo "checked=checked";}}else{} ?> >SOPs</label>
                                   </div> 
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A2_risk_control_PPE" <?php echo set_checkbox('Sec2A2_risk_control_PPE', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_risk_control_PPE==1){echo "checked=checked";}}else{} ?> >PPE requirement</label>
                                   </div> 
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A2_risk_control_engineering" <?php echo set_checkbox('Sec2A2_risk_control_engineering', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_risk_control_engineering==1){echo "checked=checked";}}else{} ?> >Engineering control</label>
                                   </div> 
                               </td>
                           </tr>
                           <tr>
                               <th class="tbheader1"><p>2.04 Exposure route of substance</p></th>
                               <td>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="1" name="Sec2A2_exposure_inhalation" <?php echo set_checkbox('Sec2A2_exposure_inhalation', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_exposure_inhalation==1){echo "checked=checked";}}else{} ?> >Inhalation</label>
                                   </div>
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A2_exposure_skin" <?php echo set_checkbox('Sec2A2_exposure_skin', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_exposure_skin==1){echo "checked=checked";}}else{} ?> >Skin (absorption)</label>
                                   </div>
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A2_exposure_ingestion" <?php echo set_checkbox('Sec2A2_exposure_ingestion', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_exposure_ingestion==1){echo "checked=checked";}}else{} ?> >Ingestion</label>
                                   </div> 
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A2_exposure_injection" <?php echo set_checkbox('Sec2A2_exposure_injection', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_exposure_injection==1){echo "checked=checked";}}else{} ?> >Injection</label>
                                   </div> 
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A2_exposure_others" <?php echo set_checkbox('Sec2A2_exposure_others', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_exposure_others==1){echo "checked=checked";}}else{} ?> >Others</label>
                                   </div>
                                   <div class="form-group"><input type="text" class="form-control" name="Sec2A2_exposure_description" placeholder="specify" value="<?php if(isset($load)){echo set_value('Sec2A2_exposure_description', $item->Sec2A2_exposure_description);}else{echo set_value('Sec2A2_exposure_description');} ?>"></div>
                               </td>
                               <th class="tbheader1">2.08 First aid and emergency requirement</th>
                               <td>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="1" name="Sec2A2_emergency_first_aid_kit" <?php echo set_checkbox('Sec2A2_emergency_first_aid_kit', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_emergency_first_aid_kit==1){echo "checked=checked";}}else{} ?> >Additional first aid kit contents</label>
                                   </div>
                                   
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A2_emergency_shower" <?php echo set_checkbox('Sec2A2_emergency_shower', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_emergency_shower==1){echo "checked=checked";}}else{} ?> >Emergency Shower</label>
                                   </div>
                                   
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A2_emergency_eyewash" <?php echo set_checkbox('Sec2A2_emergency_eyewash', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_emergency_eyewash==1){echo "checked=checked";}}else{} ?> >Emergency eyewash</label>
                                   </div> 
                                   
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A2_emergency_neutralizing" <?php echo set_checkbox('Sec2A2_emergency_neutralizing', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_emergency_neutralizing==1){echo "checked=checked";}}else{} ?> >Neutralizing agent</label>
                                   </div> 
                                   
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A2_emergency_spill" <?php echo set_checkbox('Sec2A2_emergency_spill', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_emergency_spill==1){echo "checked=checked";}}else{} ?> >Spill kit</label>
                                   </div> 
                                   
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A2_emergency_restrict" <?php echo set_checkbox('Sec2A2_emergency_restrict', '1'); ?> <?php if(isset($load)){if($item->Sec2A2_emergency_restrict==1){echo "checked=checked";}}else{} ?> >Restrict Access</label>
                                   </div> 
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   
                   <table class="table table-bordered">
                       <thead>
                           <th colspan="3" class="tblTitle">Section 2A3 – Review material process</th>
                       </thead>
                       <tbody>
                           <tr>
                               <th class="tbheader1">Category</th>
                               <th class="tbheader1">Hazards and Routes of Exposure</th>
                               <th class="tbheader1">Control Description
                                   <p class="grey-text">*List engineering control needed</p>
                                   <p class="grey-text">*List PPE needed</p>
                                   <p class="grey-text">*List specific method of handling/using/disposing (if applicable)</p>
                                   <p class="grey-text">*If the control description is the same, you may write “as above” or “refer to -category-“ (e.g. “refer to “handling”)</p>
                               </th>
                           </tr>
                           <tr>
                               <td>Storage</td>
                               <td>
                                   <div class="checkbox">
                                        <label><input type="checkbox" value="1" name="Sec2A3_storage_inhalation" <?php echo  set_checkbox('Sec2A3_storage_inhalation', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_storage_inhalation==1){echo "checked=checked";}}else{} ?> >Inhalation</label>
                                   </div>
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A3_storage_skin" <?php echo set_checkbox('Sec2A3_storage_skin', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_storage_skin==1){echo "checked=checked";}}else{} ?> >Skin (absorption)</label>
                                   </div>
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A3_storage_ingestion" <?php echo set_checkbox('Sec2A3_storage_ingestion', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_storage_ingestion==1){echo "checked=checked";}}else{} ?> >Ingestion</label>
                                   </div> 
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A3_storage_injection" <?php echo set_checkbox('Sec2A3_storage_injection', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_storage_injection==1){echo "checked=checked";}}else{} ?> >Injection</label>
                                   </div> 
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A3_storage_others" <?php echo set_checkbox('Sec2A3_storage_others', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_storage_others==1){echo "checked=checked";}}else{} ?> >Others</label>
                                   </div>
                                   <div class="form-group"><input type="text" class="form-control" name="Sec2A3_storage_description" placeholder="specify" value="<?php if(isset($load)){echo set_value('Sec2A3_storage_description', $item->Sec2A3_storage_description);}else{echo set_value('Sec2A3_storage_description');} ?>"></div>
                               </td>
                               <td>
                                   <textarea rows="10" class="form-control" name="Sec2A3_storage_control"><?php if(isset($load)){echo set_value('Sec2A3_storage_control', $item->Sec2A3_storage_control);}else{echo set_value('Sec2A3_storage_control');} ?></textarea>
                               </td>
                           </tr>
                           <tr>
                               <td>Handling(applying/using/decanting/mixing)</td>
                               <td>
                                   <div class="checkbox">
                                        <label><input type="checkbox" value="1" name="Sec2A3_handling_inhalation" <?php echo  set_checkbox('Sec2A3_handling_inhalation', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_handling_inhalation==1){echo "checked=checked";}}else{} ?> >Inhalation</label>
                                   </div>
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A3_handling_skin" <?php echo  set_checkbox('Sec2A3_handling_skin', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_handling_skin==1){echo "checked=checked";}}else{} ?> >Skin (absorption)</label>
                                   </div>
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A3_handling_ingestion" <?php echo  set_checkbox('Sec2A3_handling_ingestion', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_handling_ingestion==1){echo "checked=checked";}}else{} ?> >Ingestion</label>
                                   </div> 
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A3_handling_injection" <?php echo  set_checkbox('Sec2A3_handling_injection', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_handling_injection==1){echo "checked=checked";}}else{} ?> >Injection</label>
                                   </div> 
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A3_handling_others" <?php echo  set_checkbox('Sec2A3_handling_others', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_handling_others==1){echo "checked=checked";}}else{} ?> >Others</label>
                                   </div>
                                   <div class="form-group">
                                       <input type="text" class="form-control" name="Sec2A3_handling_description" placeholder="specify" value="<?php if(isset($load)){echo set_value('Sec2A3_handling_description', $item->Sec2A3_handling_description);}else{echo set_value('Sec2A3_handling_description');} ?>">
                                   </div>
                               </td>
                               <td>
                                   <textarea rows="10" class="form-control" name="Sec2A3_handling_control"><?php if(isset($load)){echo set_value('Sec2A3_handling_control', $item->Sec2A3_handling_control);}else{echo set_value('Sec2A3_handling_control');} ?></textarea>
                               </td>
                           </tr>
                           <tr>
                               <td>Spill / Leak</td>
                               <td>
                                   <div class="checkbox">
                                        <label><input type="checkbox" value="1" name="Sec2A3_spill_inhalation" <?php echo  set_checkbox('Sec2A3_spill_inhalation', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_spill_inhalation==1){echo "checked=checked";}}else{} ?> >Inhalation</label>
                                   </div>
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A3_spill_skin" <?php echo  set_checkbox('Sec2A3_spill_skin', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_spill_skin==1){echo "checked=checked";}}else{} ?> >Skin (absorption)</label>
                                   </div>
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A3_spill_ingestion" <?php echo  set_checkbox('Sec2A3_spill_ingestion', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_spill_ingestion==1){echo "checked=checked";}}else{} ?> >Ingestion</label>
                                   </div> 
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A3_spill_injection" <?php echo  set_checkbox('Sec2A3_spill_injection', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_spill_injection==1){echo "checked=checked";}}else{} ?> >Injection</label>
                                   </div> 
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A3_spill_others" <?php echo  set_checkbox('Sec2A3_spill_others', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_spill_others==1){echo "checked=checked";}}else{} ?> >Others</label>
                                   </div>
                                   <div class="form-group">
                                       <input type="text" class="form-control" name="Sec2A3_spill_description" placeholder="specify" value="<?php if(isset($load)){echo set_value('Sec2A3_spill_description', $item->Sec2A3_spill_description);}else{echo set_value('Sec2A3_spill_description');} ?>">
                                   </div>
                               </td>
                               <td>
                                   <textarea rows="10" class="form-control" name="Sec2A3_spill_control"><?php if(isset($load)){echo set_value('Sec2A3_spill_control', $item->Sec2A3_spill_control);}else{echo set_value('Sec2A3_spill_control');} ?></textarea>
                               </td>
                           </tr>
                           <tr>
                               <td>Disposal</td>
                               <td>
                                   <div class="checkbox">
                                        <label><input type="checkbox" value="1" name="Sec2A3_disposal_inhalation" <?php echo  set_checkbox('Sec2A3_disposal_inhalation', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_disposal_inhalation==1){echo "checked=checked";}}else{} ?> >Inhalation</label>
                                   </div>
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A3_disposal_skin" <?php echo  set_checkbox('Sec2A3_disposal_skin', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_disposal_skin==1){echo "checked=checked";}}else{} ?> >Skin (absorption)</label>
                                   </div>
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A3_disposal_ingestion" <?php echo  set_checkbox('Sec2A3_disposal_ingestion', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_disposal_ingestion==1){echo "checked=checked";}}else{} ?> >Ingestion</label>
                                   </div> 
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A3_disposal_injection" <?php echo  set_checkbox('Sec2A3_disposal_injection', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_disposal_injection==1){echo "checked=checked";}}else{} ?> >Injection</label>
                                   </div> 
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2A3_disposal_others" <?php echo  set_checkbox('Sec2A3_disposal_others', '1'); ?> <?php if(isset($load)){if($item->Sec2A3_disposal_others==1){echo "checked=checked";}}else{} ?> >Others</label>
                                   </div>
                                   <div class="form-group"><input type="text" class="form-control" name="Sec2A3_disposal_description" placeholder="specify" value="<?php if(isset($load)){echo set_value('Sec2A3_disposal_description', $item->Sec2A3_disposal_description);}else{echo set_value('Sec2A3_disposal_description');} ?>"></div>
                               </td>
                               <td>
                                   <textarea rows="10" class="form-control" name="Sec2A3_disposal_control"><?php if(isset($load)){echo set_value('Sec2A3_disposal_control', $item->Sec2A3_disposal_control);}else{echo set_value('Sec2A3_disposal_control');} ?></textarea>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   
                   <table class="table table-bordered">
                       <thead>
                           <th colspan="4" class="tblTitle">
                               Section 2B - – Risk Assessment for Equipment/Machinery<p>Section 2B1 – Details on the Equipment/Machinery</p>
                           </th>
                       </thead>
                       <tbody>
                           <tr>
                               <th class="tbheader1">1.01 Name of the equipment</th>
                               <td><input type="text" class="form-control" name="Sec2B1_equipment_name" value="<?php if(isset($load)){echo set_value('Sec2B1_equipment_name', $item->Sec2B1_equipment_name);}else{echo set_value('Sec2B1_equipment_name');} ?> "></td>
                           </tr>
                           <tr>
                               <th class="tbheader1">1.02 Type of Activity</th>
                               <td><input type="text" class="form-control" name="Sec2B1_activity_type" value="<?php if(isset($load)){echo set_value('Sec2B1_activity_type', $item->Sec2B1_activity_type);}else{echo set_value('Sec2B1_activity_type');} ?>"></td>
                           </tr>
                           <tr>
                               <th class="tbheader1">1.03 Location of Activity</th>
                               <td><input type="text" class="form-control" name="Sec2B1_activity_location" value="<?php if(isset($load)){echo set_value('Sec2B1_activity_location', $item->Sec2B1_activity_location);}else{echo set_value('Sec2B1_activity_location');} ?>" ></td>
                           </tr>
                       </tbody>
                   </table>
                   
                   <table class="table table-bordered">
                       <thead>
                           <th colspan="6" class="tblTitle">
                               Section 2B2 – Description of work / activities / use
                           </th>
                       </thead>
                       <tbody>
                           <tr>
                               <th colspan="1" class="tbheader1" width="280">2.01 Description of machinery use
                                   <p class="grey-text">(Give sufficient detail so that it is clear as<br> to the range of uses and the environment in <br> which the machinery is used <br> e.g. occupancy, access (slips, obstructions, space),<br> distractions, hot work causing fire <br> to wood dust in close proximity)
                                   </p>  
                               </th>
                               <td colspan="5">
                                   <textarea rows="10" class="form-control" name="Sec2B2_machinery_description"><?php if(isset($load)){echo set_value('Sec2B2_machinery_description', $item->Sec2B2_machinery_description);}else{echo set_value('Sec2B2_machinery_description');} ?></textarea>
                               </td>
                           </tr>
                           <tr>
                               <td colspan="6" class="tbheader1">2.02 Hazard Details</td>
                           </tr>
                           <tr>
                               <td colspan="3" class="tbheader1 text-center">Mechanical Hazards</td>
                               <td colspan="3" class="tbheader1 text-center">Non-Mechanical Hazards</td>
                           </tr>
                           <tr>
                               <td colspan="3" class="tbheader1 text-center">*Tick where applicable</td>
                               <td colspan="3" class="tbheader1 text-center">*Tick where applicable</td>
                           </tr>
                           <tr>
                               <td colspan="1">Crushing</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_crushing" <?php echo  set_checkbox('Sec2B2_checklist_crushing', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_crushing==1){echo "checked=checked";}}else{} ?>></label>
                                   </div>
                               </td>
                               <td colspan="1">Temperature (high or low)</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_temperature" <?php echo  set_checkbox('Sec2B2_checklist_temperature', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_temperature==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                           </tr>
                           <tr>
                               <td colspan="1">Shearing</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_shearing" <?php echo  set_checkbox('Sec2B2_checklist_shearing', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_shearing==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                               <td colspan="1">Electrical</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_electrical" <?php echo  set_checkbox('Sec2B2_checklist_electrical', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_electrical==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                           </tr>
                           <tr>
                               <td colspan="1">Drawing-in</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_drawing" <?php echo  set_checkbox('Sec2B2_checklist_drawing', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_drawing==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                               <td colspan="1">Noise</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_noise" <?php echo  set_checkbox('Sec2B2_checklist_noise', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_noise==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                           </tr>
                           <tr>
                               <td colspan="1">Cutting</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_cutting" <?php echo  set_checkbox('Sec2B2_checklist_cutting', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_cutting==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                               <td colspan="1">Vibration</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_vibration" <?php echo  set_checkbox('Sec2B2_checklist_vibration', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_vibration==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                           </tr>
                           <tr>
                               <td colspan="1">Entanglement</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_entangle" <?php echo  set_checkbox('Sec2B2_checklist_entangle', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_entangle==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                               <td colspan="1">Dust</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_dust" <?php echo  set_checkbox('Sec2B2_checklist_dust', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_dust==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                           </tr>
                           <tr>
                               <td colspan="1">Impact</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_impact" <?php echo  set_checkbox('Sec2B2_checklist_impact', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_impact==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                               <td colspan="1">Pressure</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_pressure" <?php echo  set_checkbox('Sec2B2_checklist_pressure', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_pressure==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                           </tr>
                           <tr>
                               <td colspan="1">Abrasion</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_abrasion" <?php echo  set_checkbox('Sec2B2_checklist_abrasion', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_abrasion==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                               <td colspan="1">Waste</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_waste" <?php echo  set_checkbox('Sec2B2_checklist_waste', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_waste==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                           </tr>
                           <tr>
                               <td colspan="1">Stabbing</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_stabbing" <?php echo  set_checkbox('Sec2B2_checklist_stabbing', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_stabbing==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                               <td colspan="1">Fumes</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_fumes" <?php echo  set_checkbox('Sec2B2_checklist_fumes', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_fumes==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                           </tr>
                           <tr>
                               <td colspan="1">Puncture</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_puncture" <?php echo  set_checkbox('Sec2B2_checklist_puncture', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_puncture==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                               <td colspan="1">Chemicals</td>
                               <td colspan="2"> 
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_chemical" <?php echo  set_checkbox('Sec2B2_checklist_chemical', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_chemical==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                           </tr>
                           <tr>
                               <td colspan="1">Ejection</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_ejection" <?php echo  set_checkbox('Sec2B2_checklist_ejection', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_ejection==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                               <td colspan="1">Allergens</td>
                               <td colspan="2">
                                   <div class="checkbox">
                                       <label><input type="checkbox" value="1" name="Sec2B2_checklist_allergens" <?php echo  set_checkbox('Sec2B2_checklist_allergens', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_checklist_allergens==1){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                           </tr>
                           <tr>
                               <td colspan="1">Exposure</td>
                               <td colspan="5"><input type="text" class="form-control" name="Sec2B2_exposure" placeholder="(duration/frequency of use) e.g. 10mins/daily, 3 hours/monthly" value="<?php if(isset($load)){echo set_value('Sec2B2_exposure', $item->Sec2B2_exposure);}else{echo set_value('Sec2B2_exposure');} ?>"></td>
                           </tr>
                           <tr>
                               <td colspan="1">Users</td>
                               <td colspan="5"><input type="text" class="form-control" name="Sec2B2_users" placeholder="Competency, inexperience, those persons at increased risk of harm (disabled, pregnancy)" value="<?php if(isset($load)){echo set_value('Sec2B2_users', $item->Sec2B2_users);}else{echo set_value('Sec2B2_users');} ?>" ></td>
                           </tr>
                           <tr>
                               <td colspan="1">Outline the control measures for the use of the machinery</td>
                               <td colspan="5"><textarea type="text" rows="6" class="form-control" name="Sec2B2_control_measures" placeholder=".e. Engineering controls e.g. guarding: fixed guards, adjustable guards, protections devices e.g. photoelectric or appliances e.g. jigs, push sticks, holders or markings/warnings, limiting persons in the area."><?php if(isset($load)){echo set_value('Sec2B2_control_measures', $item->Sec2B2_control_measures);}else{echo set_value('Sec2B2_control_measures');} ?></textarea></td>
                           </tr>
                           <tr>
                               <td colspan="1">Outline the procedural and behavioural control measures for the use of machinery</td>
                               <td colspan="5"><textarea type="text" rows="6" class="form-control" name="Sec2B2_procedural_behavioural" placeholder=".e. Engineering controls e.g. guarding: fixed guards, adjustable guards, protections devices e.g. photoelectric or appliances e.g. jigs, push sticks, holders or markings/warnings, limiting persons in the area."><?php if(isset($load)){echo set_value('Sec2B2_procedural_behavioural', $item->Sec2B2_procedural_behavioural);}else{echo set_value('Sec2B2_procedural_behavioural');} ?></textarea></td>
                           </tr>
                           
                           <tr>
                               <th colspan="6" class="tbheader1"><strong>Overall assesment</strong> of the risk posed by this machine type with existing control measures</th>
                           </tr>
                           <tr>
                               <th colspan="6" class="tbheader1"><strong>Risk Level (Tick)</strong></th>
                           </tr>
                           <tr>
                               <td class="greendata">Low</td>
                               <td>
                                   <div class="checkbox">
                                       <label><input type="radio" value="1" name="Sec2B2_overall_assessment_risk_level" <?php echo set_radio('Sec2B2_overall_assessment_risk_level', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_overall_assessment_risk_level==1){echo "checked=checked";}}else{} ?> /></label>
                                   </div>
                               </td>
                               <td class="yellowdata">Medium</td>
                               <td>
                                   <div class="checkbox">
                                       <label><input type="radio" value="2" name="Sec2B2_overall_assessment_risk_level" <?php echo set_radio('Sec2B2_overall_assessment_risk_level', '2'); ?> <?php if(isset($load)){if($item->Sec2B2_overall_assessment_risk_level==2){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                               <td class="reddata">High</td>
                               <td>
                                   <div class="checkbox">
                                       <label><input type="radio" value="3" name="Sec2B2_overall_assessment_risk_level" <?php echo set_radio('Sec2B2_overall_assessment_risk_level', '3'); ?> <?php if(isset($load)){if($item->Sec2B2_overall_assessment_risk_level==3){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                           </tr>
                           <tr>
                               <td colspan="6" class="tbheader1"><strong>Actions required to reduce the risk</strong></td>
                           </tr>
                           <tr>
                               <td colspan="2" class="tbheader1"><strong>Action</strong></td>
                               <td colspan="1" class="tbheader1"><strong>By Who</strong></td>
                               <td colspan="1" class="tbheader1"><strong>By When</strong></td>
                               <td colspan="2" class="tbheader1"><strong>Action Completed</strong></td>
                           </tr>
                           <tr>
                               <td colspan="2" class="tbheader1"><textarea rows="5" class="form-control" name="Sec2B2_risk_reduction_action"><?php if(isset($load)){echo set_value('Sec2B2_risk_reduction_action', $item->Sec2B2_risk_reduction_action);}else{echo set_value('Sec2B2_risk_reduction_action');} ?></textarea></td>
                               
                               <td colspan="1" class="tbheader1"><textarea rows="5" class="form-control" name="Sec2B2_risk_reduction_by_who"><?php if(isset($load)){echo set_value('Sec2B2_risk_reduction_by_who', $item->Sec2B2_risk_reduction_by_who);}else{echo set_value('Sec2B2_risk_reduction_by_who');} ?></textarea></td>
                               
                               <td colspan="1" class="tbheader1"><textarea rows="5" class="form-control" name="Sec2B2_risk_reduction_by_when"><?php if(isset($load)){echo set_value('Sec2B2_risk_reduction_by_when', $item->Sec2B2_risk_reduction_by_when);}else{echo set_value('Sec2B2_risk_reduction_by_when');} ?></textarea></td>
                               
                               <td colspan="2" class="tbheader1"><textarea rows="5" class="form-control" name="Sec2B2_risk_reduction_action_completed"><?php if(isset($load)){echo set_value('Sec2B2_risk_reduction_action_completed', $item->Sec2B2_risk_reduction_action_completed);}else{echo set_value('Sec2B2_risk_reduction_action_completed');} ?></textarea></td>
                           </tr>
                           <tr>
                               <th colspan="6" class="tbheader1"><strong>Overall assesment</strong> of the risk posed by this machine type with additional control measures</th>
                           </tr>
                           <tr>
                               <th colspan="6" class="tbheader1"><strong>Risk Level (Tick)</strong></th>
                           </tr>
                           <tr>
                               <td class="greendata">Low</td>
                               <td>
                                   <div class="checkbox">
                                       <label><input type="radio" value="1" name="Sec2B2_overall_assessment_risk_level_after" <?php echo set_radio('Sec2B2_overall_assessment_risk_level_after', '1'); ?> <?php if(isset($load)){if($item->Sec2B2_overall_assessment_risk_level_after==1){echo "checked=checked";}}else{} ?> /></label>
                                   </div>
                               </td>
                               <td class="yellowdata">Medium</td>
                               <td>
                                   <div class="checkbox">
                                       <label><input type="radio" value="2" name="Sec2B2_overall_assessment_risk_level_after" <?php echo set_radio('Sec2B2_overall_assessment_risk_level_after', '2'); ?> <?php if(isset($load)){if($item->Sec2B2_overall_assessment_risk_level_after==2){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                               <td class="reddata">High</td>
                               <td>
                                   <div class="checkbox">
                                       <label><input type="radio" value="3" name="Sec2B2_overall_assessment_risk_level_after" <?php echo set_radio('Sec2B2_overall_assessment_risk_level_after', '3'); ?> <?php if(isset($load)){if($item->Sec2B2_overall_assessment_risk_level_after==3){echo "checked=checked";}}else{} ?> ></label>
                                   </div>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   
                   <table class="table table-bordered">
                       <p><strong>ACTION LEVEL: (To identify what action needs to be taken).</strong></p>
                       
                       <thead>
                           <tr>
                               <th width="100" class="tbheader1"><strong>Risk Level:</strong></th>
                               <th class="tbheader1"><strong>Action:</strong></th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td class="greendata">Low</td>
                               <td>No further action required.  However, continue to monitor the machinery and work activity.</td>
                           </tr>
                           <tr>
                               <td class="yellowdata">Medium</td>
                               <td>Additional actions and controls must be implemented to ensure the machinery can be used safely.  </td>
                           </tr>
                           <tr>
                               <td class="reddata">High</td>
                               <td>Machinery cannot be used until the risk level has been reduced to a satisfactory level.  Further controls must be implemented.</td>
                           </tr>
                       </tbody>
                   </table>
                   
                   <table class="table table-bordered" id="section_3">
                       <thead>
                           <th colspan="4" class="tblTitle">
                               Section 3 – Consultation and Acknowledgement
                           </th>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="4">
                                   <ul>
                                       <li>
                                           I, hereby declare that the information I have provided in this report form for Pre-Purchase Material Risk Assessment is true and correct.
                                       </li>
                                       <li>
                                           Swinburne University of Technology Sarawak Campus collects, uses and destroys personal data in accordance with our Privacy Collection Notice at http://www.swinburne.edu.my/privacy/ and Employee's Privacy Collection Notice at Blackboard>My.Swinburne>Student & Corporate Services> Human Resources>Employee's Privacy Collection Notice.
                                       </li>
                                   </ul>
                               </td>
                           </tr>
                           <tr>
                               <td class="tbheader1">Requestor's Name</td>
                               <td><input type="text" class="form-control" name="Sec3_requestor" value="<?php if(isset($load)){echo set_value('Sec3_requestor', $item->Sec3_requestor);}else{echo set_value('Sec3_requestor');} ?>"></td>
                               
                               <td class="tbheader1">Signature and date</td>
                               <td class="text-center"><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="Sec3_requestor_date" value="<?php if(isset($load)){echo set_value('Sec3_requestor_date', $item->Sec3_requestor_date);}else{echo set_value('Sec3_requestor_date');} ?>"></td>
                           </tr>
                           <tr>
                               <td class="tbheader1">HMU / Dean / Lab Coordinator / Supervisor / Project’s Supervisor</td>
                               <td><input type="text" class="form-control" name="Sec3_supervisor" value="<?php if(isset($load)){echo set_value('Sec3_supervisor', $item->Sec3_supervisor);}else{echo set_value('Sec3_supervisor');} ?>"></td>
                               
                               <td class="tbheader1">Signature and date</td>
                               <td class="text-center"><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="Sec3_supervisor_date" value="<?php if(isset($load)){echo set_value('Sec3_supervisor_date', $item->Sec3_supervisor_date);}else{echo set_value('Sec3_supervisor_date');} ?>"></td>
                           </tr>
                           <tr>
                               <td class="tbheader1">Lab Officer</td>
                               <td><input type="text" class="form-control" name="Sec3_LO" value="<?php if(isset($load)){echo set_value('Sec3_LO', $item->Sec3_LO);}else{echo set_value('Sec3_LO');} ?>"></td>
                               
                               <td class="tbheader1">Signature and date</td>
                               <td class="text-center"><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="Sec3_LO_date" value="<?php if(isset($load)){echo set_value('Sec3_LO_date', $item->Sec3_LO_date);}else{echo set_value('Sec3_LO_date');} ?>"></td>
                           </tr>
                       </tbody>
                   </table>
                   <span class="text-danger"><?php echo form_error('Sec3_requestor'); ?></span>
                   <span class="text-danger"><?php echo form_error('Sec3_requestor_date'); ?></span>
                   <span class="text-danger"><?php echo form_error('Sec3_supervisor'); ?></span>
                   <span class="text-danger"><?php echo form_error('Sec3_supervisor_date'); ?></span>
                   <span class="text-danger"><?php echo form_error('Sec3_LO'); ?></span>
                   <span class="text-danger"><?php echo form_error('Sec3_LO_date'); ?></span>
                   
                <hr>
                
                
                    <div>
                    <input type="hidden" name="appid" value="<?php if(isset($appID)){echo $appID;} ?>">
                </div>
                
                   <div style="text-align: center">
                       <?php if(isset($editload)){ ?>
                       <button type="submit" name = 'procurement_update' value = 'Update' onclick="location.href='<?php echo site_url().'/procurement/update_form';?>'" class="btn btn-primary">Update</button>
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
                </div>   
            </div>
        </div>
        
        
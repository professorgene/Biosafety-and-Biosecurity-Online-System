    <?php
    
    if(isset($load)){
        foreach($retrieved as $item){
            
            $new1 = $item->LMO_name;
            $new2 = $item->LMO_risk_level;
            $new3 = $item->LMO_quantity;
            $new4 = $item->LMO_volume;
            
            $new5 = $item->biohazard_name;
            $new6 = $item->biohazard_risk_level;
            $new7 = $item->biohazard_quantity;
            $new8 = $item->biohazard_volume;
            
            $ar1 = explode(",", $new1);
            $ar2 = explode(",", $new2);
            $ar3 = explode(",", $new3);
            $ar4 = explode(",", $new4);
            
            $ar5 = explode(",", $new5);
            $ar6 = explode(",", $new6);
            $ar7 = explode(",", $new7);
            $ar8 = explode(",", $new8);
            
        }
        
    }else{
           
        }
    
    ?>

    
        <div class="row">
            
            <div class="col-md-10">
               
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
                   
                   <table class="table table-bordered">
                       <thead class="tblTitle2">
                           <tr>
                               <th>DATE RECEIVED</th>
                               <th>SBC REFERENCE NUMBER</th>
                           </tr>
                       </thead>
                       <tbody class="tblTitle2">
                           <tr>
                               <td><input class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="date_received" placeholder="Office use only" value="<?php if(isset($load)){echo set_value('date_received', $item->date_received);}else{echo set_value('date_received');} ?>" <?php if($this->session->userdata('account_type') != 2){echo "disabled";} ?> rows="1">
                               </td>
                               <td>
                                   <input type="text" class="form-control" name="SBC_reference_no" placeholder="Office use only" value="<?php if(isset($load)){echo set_value('SBC_reference_no', $item->SBC_reference_no);}else{echo set_value('SBC_reference_no');} ?>" <?php if($this->session->userdata('account_type') != 2){echo "disabled";} ?> rows="1">
                               </td>

                           </tr>
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
                                   <td>
                                       <div class="form-group">
                                           <textarea name="personnel_name" class="form-control"><?php if(isset($load)){echo set_value('personnel_name', $item->personnel_name);}else{echo set_value('personnel_name');} ?></textarea>
                                       </div>
                                   </td>
                                   
                                   <th class="tbheader1">1.02 1.02   Staff / Student No.:</th>
                                   <td>
                                       <div class="form-group">
                                           <textarea name="personnel_staff_student_no" class="form-control" ><?php if(isset($load)){echo set_value('personnel_staff_student_no', $item->personnel_staff_student_no);}else{echo set_value('personnel_staff_student_no');} ?></textarea>
                                       </div>
                                   </td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.03 Designation:</th>
                                   <td>
                                       <textarea class="form-control" name="personnel_designation" ><?php if(isset($load)){echo set_value('personnel_designation', $item->personnel_designation);}else{echo set_value('personnel_designation');} ?></textarea>
                                   </td>
                                   
                                   <th class="tbheader1">1.04 Faculty/unit:</th>
                                   <td>
                                       <textarea class="form-control" name="personnel_faculty" ><?php if(isset($load)){echo set_value('personnel_faculty', $item->personnel_faculty);}else{echo set_value('personnel_faculty');} ?></textarea>
                                   </td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.05 Unit Code/Unit Title (if teaching):</th>
                                   <td colspan="4">
                                       <textarea class="form-control" name="personnel_unit_code" ><?php if(isset($load)){echo set_value('personnel_unit_code', $item->personnel_unit_code);}else{echo set_value('personnel_unit_code');} ?></textarea>
                                   </td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.06 Project Title and Ref. No. (if FYP / research):</th>
                                   <td colspan="4">
                                       <textarea class="form-control" name="personnel_project_title"><?php if(isset($load)){echo set_value('personnel_project_title', $item->personnel_project_title);}else{echo set_value('personnel_project_title');} ?></textarea>
                                   </td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.07 Storage Location: </th>
                                   <td colspan="4"><textarea class="form-control" name="personnel_storage" ><?php if(isset($load)){echo set_value('personnel_storage', $item->personnel_storage);}else{echo set_value('personnel_storage');} ?></textarea></td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.08 Name of the Keeper: </th>
                                   <td colspan="4">
                                       <textarea class="form-control" name="personnel_keeper_name" ><?php if(isset($load)){echo set_value('personnel_keeper_name', $item->personnel_keeper_name);}else{echo set_value('personnel_keeper_name');} ?></textarea>
                                   </td>
                               </tr>
                               
                           </tbody>
                       </table>
            
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
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_name[0]">
                                                       <?php 
                                                       if(isset($load)){
                                                           echo set_value('LMO_name[0]', $ar1[0]);
                                                       } else {
                                                           echo set_value('LMO_name[0]');} 
                                                       ?>
                                                   </textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_risk_level[0]">
                                                       <?php 
                                                       if(isset($load)){
                                                           echo set_value('LMO_risk_level[0]', $ar2[0]);
                                                       } else {
                                                           echo set_value('LMO_risk_level[0]');
                                                       } 
                                                       ?>
                                                   </textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_quantity[0]"><?php if(isset($load)){echo set_value('LMO_quantity[0]', $ar3[0]);}else{echo set_value('LMO_quantity[0]');} ?>
                                                   </textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_volume[0]"><?php if(isset($load)){echo set_value('LMO_volume[0]', $ar4[0]);}else{echo set_value('LMO_volume[0]');} ?>
                                                   </textarea>
                                               </div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_name[1]"><?php if(isset($load)){echo set_value('LMO_name[1]', $ar1[1]);}else{echo set_value('LMO_name[1]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_risk_level[1]">
                                                       <?php 
                                                       if(isset($load)){
                                                           echo set_value('LMO_risk_level[1]', $ar2[1]);
                                                       }else{
                                                           echo set_value('LMO_risk_level[1]');
                                                       } 
                                                       ?>
                                                   </textarea>
                                               </div>
                                               
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_quantity[1]"><?php if(isset($load)){echo set_value('LMO_quantity[1]', $ar3[1]);}else{echo set_value('LMO_quantity[1]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_volume[1]"><?php if(isset($load)){echo set_value('LMO_volume[1]', $ar4[1]);}else{echo set_value('LMO_volume[1]');} ?></textarea>
                                               </div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_name[2]"><?php if(isset($load)){echo set_value('LMO_name[2]', $ar1[2]);}else{echo set_value('LMO_name[2]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_risk_level[2]">
                                                       <?php
                                                       if(isset($load)){
                                                           echo set_value('LMO_risk_level[2]', $ar2[2]);
                                                       }else{
                                                           echo set_value('LMO_risk_level[2]');
                                                       } 
                                                       ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_quantity[2]"><?php if(isset($load)){echo set_value('LMO_quantity[2]', $ar3[2]);}else{echo set_value('LMO_quantity[2]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_volume[2]"><?php if(isset($load)){echo set_value('LMO_volume[2]', $ar4[2]);}else{echo set_value('LMO_volume[2]');} ?></textarea>
                                               </div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_name[3]"><?php if(isset($load)){echo set_value('LMO_name[3]', $ar1[3]);}else{echo set_value('LMO_name[3]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_risk_level[3]">
                                                       <?php 
                                                       if(isset($load)){
                                                           echo set_value('LMO_risk_level[3]', $ar2[3]);
                                                       }else{
                                                           echo set_value('LMO_risk_level[3]');
                                                       } 
                                                       ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_quantity[3]"><?php if(isset($load)){echo set_value('LMO_quantity[3]', $ar3[3]);}else{echo set_value('LMO_quantity[3]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_volume[3]"><?php if(isset($load)){echo set_value('LMO_volume[3]', $ar4[3]);}else{echo set_value('LMO_volume[3]');} ?></textarea>
                                               </div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_name[4]"><?php if(isset($load)){echo set_value('LMO_name[4]', $ar1[4]);}else{echo set_value('LMO_name[4]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_risk_level[4]">
                                                       <?php 
                                                       if(isset($load)){
                                                           echo set_value('LMO_risk_level[4]', $ar2[4]);
                                                       }else{
                                                           echo set_value('LMO_risk_level[4]');
                                                       } ?>
                                                   </textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_quantity[4]"><?php if(isset($load)){echo set_value('LMO_quantity[4]', $ar3[4]);}else{echo set_value('LMO_quantity[4]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_volume[4]"><?php if(isset($load)){echo set_value('LMO_volume[4]', $ar4[4]);}else{echo set_value('LMO_volume[4]');} ?></textarea>
                                               </div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_name[5]"><?php if(isset($load)){echo set_value('LMO_name[5]', $ar1[5]);}else{echo set_value('LMO_name[5]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_risk_level[5]">
                                                       <?php 
                                                       if(isset($load)){
                                                           echo set_value('LMO_risk_level[5]', $ar2[5]);
                                                       }else{
                                                           echo set_value('LMO_risk_level[5]');
                                                       } ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_quantity[5]"><?php if(isset($load)){echo set_value('LMO_quantity[5]', $ar3[5]);}else{echo set_value('LMO_quantity[5]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="LMO_volume[5]"><?php if(isset($load)){echo set_value('LMO_volume[5]', $ar4[5]);}else{echo set_value('LMO_volume[5]');} ?></textarea>
                                               </div>
                                           </td>
                                       </tr>
                                   </table>
                               </td>
                           </tr>
                           
                           <tr>
                               <td class="tbheader1">
                                   <div style="float:left;width:50%;">B. List of Biohazardous Material</div>
                                   <div style="float:right;width:50%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="biohazard_list" value="1" <?php echo set_checkbox('biohazard_list', '1'); ?> <?php if(isset($load)){if($item->biohazard_list==1){echo "checked=checked";}}else{} ?>> Not Applicable</label>
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
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_name[0]"><?php if(isset($load)){echo set_value('biohazard_name[0]', $ar5[0]);}else{echo set_value('biohazard_name[0]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_risk_level[0]"><?php if(isset($load)){echo set_value('biohazard_risk_level[0]', $ar6[0]);}else{echo set_value('biohazard_risk_level[0]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_quantity[0]"><?php if(isset($load)){echo set_value('biohazard_quantity[0]', $ar7[0]);}else{echo set_value('biohazard_quantity[0]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_volume[0]"><?php if(isset($load)){echo set_value('biohazard_volume[0]', $ar8[0]);}else{echo set_value('biohazard_volume[0]');} ?></textarea>
                                               </div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_name[1]"><?php if(isset($load)){echo set_value('biohazard_name[1]', $ar5[1]);}else{echo set_value('biohazard_name[1]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_risk_level[1]"><?php if(isset($load)){echo set_value('biohazard_risk_level[1]', $ar6[1]);}else{echo set_value('biohazard_risk_level[1]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_quantity[1]"><?php if(isset($load)){echo set_value('biohazard_quantity[1]', $ar7[1]);}else{echo set_value('biohazard_quantity[1]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_volume[1]"><?php if(isset($load)){echo set_value('biohazard_volume[1]', $ar8[1]);}else{echo set_value('biohazard_volume[1]');} ?></textarea>
                                               </div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_name[2]"><?php if(isset($load)){echo set_value('biohazard_name[2]', $ar5[2]);}else{echo set_value('biohazard_name[2]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_risk_level[2]"><?php if(isset($load)){echo set_value('biohazard_risk_level[2]', $ar6[2]);}else{echo set_value('biohazard_risk_level[2]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_quantity[2]"><?php if(isset($load)){echo set_value('biohazard_quantity[2]', $ar7[2]);}else{echo set_value('biohazard_quantity[2]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_volume[2]"><?php if(isset($load)){echo set_value('biohazard_volume[2]', $ar8[2]);}else{echo set_value('biohazard_volume[2]');} ?></textarea>
                                               </div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_name[3]"><?php if(isset($load)){echo set_value('biohazard_name[3]', $ar5[3]);}else{echo set_value('biohazard_name[3]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_risk_level[3]"><?php if(isset($load)){echo set_value('biohazard_risk_level[3]', $ar6[3]);}else{echo set_value('biohazard_risk_level[30]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_quantity[3]"><?php if(isset($load)){echo set_value('biohazard_quantity[3]', $ar7[3]);}else{echo set_value('biohazard_quantity[3]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_volume[3]"><?php if(isset($load)){echo set_value('biohazard_volume[3]', $ar8[3]);}else{echo set_value('biohazard_volume[3]');} ?></textarea>
                                               </div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_name[4]"><?php if(isset($load)){echo set_value('biohazard_name40]', $ar5[4]);}else{echo set_value('biohazard_name[4]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_risk_level[4]"><?php if(isset($load)){echo set_value('biohazard_risk_level[4]', $ar6[4]);}else{echo set_value('biohazard_risk_level[4]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_quantity[4]"><?php if(isset($load)){echo set_value('biohazard_quantity[4]', $ar7[4]);}else{echo set_value('biohazard_quantity[4]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_volume[4]"><?php if(isset($load)){echo set_value('biohazard_volume[4]', $ar8[4]);}else{echo set_value('biohazard_volume[4]');} ?></textarea>
                                               </div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_name[5]"><?php if(isset($load)){echo set_value('biohazard_name[5]', $ar5[5]);}else{echo set_value('biohazard_name[5]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_risk_level[5]"><?php if(isset($load)){echo set_value('biohazard_risk_level[5]', $ar6[5]);}else{echo set_value('biohazard_risk_level[5]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_quantity[5]"><?php if(isset($load)){echo set_value('biohazard_quantity[5]', $ar7[5]);}else{echo set_value('biohazard_quantity[5]');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="biohazard_volume[5]"><?php if(isset($load)){echo set_value('biohazard_volume[5]', $ar8[5]);}else{echo set_value('biohazard_volume[5]');} ?></textarea>
                                               </div>
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
                               <td>
                                   <textarea name="declaration_name" class="form-control" placeholder="Name & Signature:" ><?php if(isset($load)){echo set_value('declaration_name', $item->declaration_name);}else{echo set_value('declaration_name');} ?></textarea>
                               </td>
                               
                               <td>
                                   <input type="date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="declaration_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('declaration_date', $item->declaration_date);}else{echo set_value('declaration_date');} ?>">
                               </td>
                           </tr>
                       </tbody>
                   </table>
                
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
                               <td colspan="2"><textarea class="form-control" name="signature_verified_by" placeholder="Signature:" ><?php if(isset($load)){echo set_value('signature_verified_by', $item->signature_verified_by);}else{echo set_value('signature_verified_by');} ?></textarea></td>
                               
                           </tr>
                           <tr>
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="signature_verified_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('signature_verified_date', $item->signature_verified_date);}else{echo set_value('signature_verified_date');} ?>" ></td>
                           </tr>
                       </tbody>
                   </table>
            
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
                                    
                                    <textarea class="form-control" name="notification_approver" ><?php if(isset($load)){echo set_value('notification_approver', $item->notification_approver);}else{echo set_value('notification_approver');} ?></textarea>
                                </div>
                                <div class="checkbox">
                                     <label><input type="checkbox" name="notification_declined_by" value="1" <?php echo set_checkbox('notification_declined_by', '1'); ?> <?php if(isset($load)){if($item->notification_declined_by==1){echo "checked=checked";}}else{} ?>> Declined By:</label>
                                    
                                    <textarea class="form-control" name="notification_decliner" ><?php if(isset($load)){echo set_value('notification_decliner', $item->notification_decliner);}else{echo set_value('notification_decliner');} ?></textarea>
                                </div>
                               </td>
                               <td style="width:450px">
                                   <textarea class="form-control" name="notification_reviewed_by" placeholder="Reviewed by:"><?php if(isset($load)){echo set_value('notification_reviewed_by', $item->notification_reviewed_by);}else{echo set_value('notification_reviewed_by');} ?></textarea>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <textarea class="form-control" placeholder="Signature:" name="notification_approve_signature"><?php if(isset($load)){echo set_value('notification_approve_signature', $item->notification_approve_signature);}else{echo set_value('notification_approve_signature');} ?></textarea>
                               </td>
                               
                               <td>
                                   <textarea class="form-control" placeholder="Signature:" name="notification_reviewed_signature"><?php if(isset($load)){echo set_value('notification_reviewed_signature', $item->notification_reviewed_signature);}else{echo set_value('notification_reviewed_signature');} ?></textarea>
                               </td>
                           </tr>
                           <tr>
                               <td><input type="date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="notification_approve_decline_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('notification_approve_decline_date', $item->notification_approve_decline_date);}else{echo set_value('notification_approve_decline_date');} ?>"></td>
                               
                               <td><input type="date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="notification_reviewed_by_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('notification_reviewed_by_date', $item->notification_reviewed_by_date);}else{echo set_value('notification_reviewed_by_date');} ?>"></td>
                           </tr>
                           <tr>
                               <td>
                                   <textarea class="form-control" name="notification_approve_decline_remarks" placeholder="Remarks:" ><?php if(isset($load)){echo set_value('notification_approve_decline_remarks', $item->notification_approve_decline_remarks);}else{echo set_value('notification_approve_decline_remarks');} ?></textarea>
                               </td>
                               <td>
                                   <textarea class="form-control" name="notification_reviewed_by_remarks" placeholder="Remarks:"  ><?php if(isset($load)){echo set_value('notification_reviewed_by_remarks', $item->notification_reviewed_by_remarks);}else{echo set_value('notification_reviewed_by_remarks');} ?></textarea>
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
                       <button type="submit" name = 'updateButton' value = 'Update' onclick="location.href='<?php echo site_url().'/notification_of_LMO_and_BM/update_form';?>'" class="btn btn-primary">Update</button>
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
                    <a href="#section_5" class="btn btn-success">Section 5</a>
                </div>   
            </div>
        </div>
        
        
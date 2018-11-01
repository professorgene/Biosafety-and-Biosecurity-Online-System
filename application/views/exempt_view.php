 
    <?php
    
    if(isset($load)){
        foreach($retrieved as $item){
            $new1 = $item->project_add_qualification;
            $new2 = $item->project_add_name;
            $new3 = $item->project_add_department;
            $new4 = $item->project_add_campus;
            $new5 = $item->project_add_postal_address;
            $new6 = $item->project_add_telephone;
            $new7 = $item->project_add_fax;
            $new8 = $item->project_add_email_address;
            $new9 = $item->project_add_title;
            $a = explode(",", $new1);
            $b = explode(",", $new2);
            $c = explode(",", $new3);
            $d = explode(",", $new4);
            $e = explode(",", $new5);
            $f = explode(",", $new6);
            $g = explode(",", $new7);
            $h = explode(",", $new8);
            $i = explode(",", $new9);
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
                
                   <h4 class="centering"><u>Swinburne Biosafety Commitee</u></h4>
                   
                   <h3 class="centering">Application for biosafety clearance for use of</h3>
                   <h3 class="centering">Exempt dealings</h3>
                   
                   <table class="table table-bordered blackborder">
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
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10" class="reddata">1</th>
                               <th>Title of Project</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                              <td colspan="2"><textarea name="project_title" class="form-control"><?php if(isset($load)){echo set_value('project_title', $item->project_title);}else{echo set_value('project_title');} ?></textarea></td> 
                           </tr>
                       </tbody>
                   </table>
                
                </div>
                
                <div id="section_2" class="sectiontarget">
                    <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_2">2</th>
                               <th colspan="2">Researchers involved in the conduct of the project</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <table class="table table-bordered">
                                       <tr>
                                          <td colspan="3">Project Supervisor <em>(must be a Swinburne staff member)</em></td> 
                                       </tr>
                                       <tr>
                                           <td width="80">
                                               Title: <textarea class="form-control" name="project_supervisor_title"><?php if(isset($load)){echo set_value('project_supervisor_title', $item->project_supervisor_title);}else{echo set_value('project_supervisor_title');} ?></textarea>
                                           </td>
                                           
                                           <td>
                                               Name: <textarea class="form-control" name="project_supervisor_name"><?php if(isset($load)){echo set_value('project_supervisor_name', $item->project_supervisor_name);}else{echo set_value('project_supervisor_name');} ?></textarea>
                                           </td>
                                           
                                           <td>
                                               Current qualifications (please include all): <textarea class="form-control" name="project_supervisor_qualification"><?php if(isset($load)){echo set_value('project_supervisor_qualification', $item->project_supervisor_qualification);}else{echo set_value('project_supervisor_qualification');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">
                                               Department: <textarea class="form-control" name="project_supervisor_department"><?php if(isset($load)){echo set_value('project_supervisor_department', $item->project_supervisor_department);}else{echo set_value('project_supervisor_department');} ?></textarea>
                                           </td>
                                           
                                           <td colspan="1">
                                               Campus: <textarea class="form-control" name="project_supervisor_campus"><?php if(isset($load)){echo set_value('project_supervisor_campus', $item->project_supervisor_campus);}else{echo set_value('project_supervisor_campus');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="3">
                                               Full postal address (including internal mail details): <textarea class="form-control" name="project_supervisor_postal_address"><?php if(isset($load)){echo set_value('project_supervisor_postal_address', $item->project_supervisor_postal_address);}else{echo set_value('project_supervisor_postal_address');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">
                                               <div class="form-group row">
                                                   <label for="project_supervisor_telephone" class="col-sm-4">Phone:</label>
                                                   <div class="col-sm-7">
                                                       <textarea class="form-control" name="project_supervisor_telephone" rows="1"><?php if(isset($load)){echo set_value('project_supervisor_telephone', $item->project_supervisor_telephone);}else{echo set_value('project_supervisor_telephone');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                           <td>
                                               <div class="form-group row">
                                                   <label for="project_supervisor_fax" class="col-sm-4">Fax:</label>
                                                   <div class="col-sm-7">
                                                       <textarea class="form-control" name="project_supervisor_fax" rows="1"><?php if(isset($load)){echo set_value('project_supervisor_fax', $item->project_supervisor_fax);}else{echo set_value('project_supervisor_fax');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                           
                                       </tr>
                                       <tr>
                                           <td colspan="3">
                                               Email (MUST be staff email address): <textarea class="form-control" name="project_supervisor_email_address"><?php if(isset($load)){echo set_value('project_supervisor_email_address', $item->project_supervisor_email_address);}else{echo set_value('project_supervisor_email_address');} ?></textarea>
                                           </td>
                                       </tr>
                                   </table>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                    
                </div>
                
                <div id="section_3" class="sectiontarget">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_3">3</th>
                               <th colspan="2">Additional people to be included in correspondence regarding this dealing<br>(e.g. Research Assistants, Biosafety Officers, Facility Managers)</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <table class="table table-bordered">
                                       <tr>
                                           <td width="80">
                                               Title: <textarea class="form-control" name="project_add_title[0]"><?php if(isset($load)){echo set_value('project_add_title[0]', $i[0]);}else{echo set_value('project_add_title[0]');} ?></textarea>
                                           </td>
                                           
                                           <td>
                                               Name: <textarea class="form-control" name="project_add_name[0]"><?php if(isset($load)){echo set_value('project_add_name[0]', $b[0]);}else{echo set_value('project_add_name[0]');} ?></textarea>
                                           </td>
                                           
                                           <td>
                                               Current qualifications (please include all): 
                                               <textarea class="form-control" name="project_add_qualification[0]"><?php if(isset($load)){echo set_value('project_add_qualification[0]', $a[0]);}else{echo set_value('project_add_qualification[0]');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">
                                               Department: <textarea class="form-control" name="project_add_department[0]"><?php if(isset($load)){echo set_value('project_add_department[0]', $c[0]);}else{echo set_value('project_add_department[0]');} ?></textarea>
                                           </td>
                                           
                                           <td colspan="1">
                                               Campus: <textarea class="form-control" name="project_add_campus[0]"><?php if(isset($load)){echo set_value('project_add_campus[0]', $d[0]);}else{echo set_value('project_add_campus[0]');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="3">
                                               Full postal address (including internal mail details): <textarea class="form-control" name="project_add_postal_address[0]"><?php if(isset($load)){echo set_value('project_add_postal_address[0]', $e[0]);}else{echo set_value('project_add_postal_address[0]');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">
                                               <div class="form-group row">
                                                   <label for="project_add_telephone[0]" class="col-sm-4">Phone:</label>
                                                   <div class="col-sm-7">
                                                       <textarea class="form-control" name="project_add_telephone[0]" rows="1"><?php if(isset($load)){echo set_value('project_add_telephone[0]', $f[0]);}else{echo set_value('project_add_telephone[0]');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                           <td>
                                               <div class="form-group row">
                                                   <label for="project_add_fax[0]" class="col-sm-4">Fax:</label>
                                                   <div class="col-sm-7">
                                                       <textarea class="form-control" name="project_add_fax[0]" rows="1"><?php if(isset($load)){echo set_value('project_add_fax[0]', $g[0]);}else{echo set_value('project_add_fax[0]');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                       </tr>
                                       <tr>
                                           <td colspan="3">
                                               Email (MUST be staff email address): <textarea class="form-control" name="project_add_email_address[0]"><?php if(isset($load)){echo set_value('project_add_email_address[0]', $h[0]);}else{echo set_value('project_add_email_address[0]');} ?></textarea>
                                           </td>
                                       </tr>
                                   </table>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                </div>
                   <table class="table table-bordered">
                                       <tr>
                                           <td width="80">
                                               Title: <textarea class="form-control" name="project_add_title[1]"><?php if(isset($load)){echo set_value('project_add_title[1]', $i[1]);}else{echo set_value('project_add_title[1]');} ?></textarea>
                                           </td>
                                           
                                           <td>
                                               Name: <textarea class="form-control" name="project_add_name[1]"><?php if(isset($load)){echo set_value('project_add_name[1]', $b[1]);}else{echo set_value('project_add_name[1]');} ?></textarea>
                                           </td>
                                           
                                           <td>
                                               Current qualifications (please include all): 
                                               <textarea class="form-control" name="project_add_qualification[1]"><?php if(isset($load)){echo set_value('project_add_qualification[1]', $a[1]);}else{echo set_value('project_add_qualification[1]');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">
                                               Department: <textarea class="form-control" name="project_add_department[1]"><?php if(isset($load)){echo set_value('project_add_department[1]', $c[1]);}else{echo set_value('project_add_department[1]');} ?></textarea>
                                           </td>
                                           
                                           <td colspan="1">
                                               Campus: <textarea class="form-control" name="project_add_campus[1]"><?php if(isset($load)){echo set_value('project_add_campus[1]', $d[1]);}else{echo set_value('project_add_campus[1]');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="3">
                                               Full postal address (including internal mail details): <textarea class="form-control" name="project_add_postal_address[1]"><?php if(isset($load)){echo set_value('project_add_postal_address[1]', $e[1]);}else{echo set_value('project_add_postal_address[1]');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">
                                               <div class="form-group row">
                                                   <label for="project_add_telephone[1]" class="col-sm-4">Phone:</label>
                                                   <div class="col-sm-7">
                                                       <textarea class="form-control" name="project_add_telephone[1]" rows="1"><?php if(isset($load)){echo set_value('project_add_telephone[1]', $f[1]);}else{echo set_value('project_add_telephone[1]');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                           <td>
                                               <div class="form-group row">
                                                   <label for="project_add_fax[1]" class="col-sm-4">Fax:</label>
                                                   <div class="col-sm-7">
                                                       <textarea class="form-control" name="project_add_fax[1]" rows="1"><?php if(isset($load)){echo set_value('project_add_fax[1]', $g[1]);}else{echo set_value('project_add_fax[1]');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                       </tr>
                                       <tr>
                                           <td colspan="3">
                                               Email (MUST be staff email address): <textarea class="form-control" name="project_add_email_address[1]"><?php if(isset($load)){echo set_value('project_add_email_address[1]', $h[1]);}else{echo set_value('project_add_email_address[1]');} ?></textarea>
                                           </td>
                                       </tr>
                                   </table>
                    
                   <div id="section_4" class="sectiontarget">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_4">4</th>
                               <th colspan="2">Exemption Category</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input type="checkbox" class="form-control" value="1" name="exemption_type_2" <?php echo set_checkbox('exemption_type_2', '1'); ?> <?php if(isset($load)){if($item->exemption_type_2==1){echo "checked=checked";}}else{} ?> >
                                   </div>
                               </td>
                               <td>
                                   2)	A dealing with a genetically modified Caenorhabditis elegans, unless: <br>
                                   (a) an advantage is conferred on the animal by the genetic modification; or <br>
                                   (b) as a result of the genetic modification, the animal is capable of secreting or producing an infectious agent.

                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input type="checkbox" class="form-control" value="1" name="exemption_type_3" <?php echo set_checkbox('exemption_type_3', '1'); ?> <?php if(isset($load)){if($item->exemption_type_3==1){echo "checked=checked";}}else{} ?> >
                                   </div>
                               </td>
                               <td>
                                  3)	A dealing with an animal into which genetically modified somatic cells have been introduced, if:<br>
                                          (a) the somatic cells are not capable of giving rise to infectious agents as a result of the genetic modification; and <br>
                                          (b) the animal is not infected with a virus that is capable of recombining with the genetically modified nucleic acid in the somatic cells.
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input type="checkbox" class="form-control" value="1" name="exemption_type_3A" <?php echo set_checkbox('exemption_type_3A', '1'); ?> <?php if(isset($load)){if($item->exemption_type_3A==1){echo "checked=checked";}}else{} ?> >
                                   </div>
                               </td>
                               <td>
                                  3A) A dealing with an animal whose somatic cells have been genetically modified in vivo by a   replication defective viral vector, if: <br>
        (a)	the in vivo modification occurred as part of a previous dealing; and <br>
		(b) the replication defective viral vector is no longer in the animal; and <br>
		(c) no germ line cells have been genetically modified; and <br>
		(d) the somatic cells cannot give rise to infectious agents as a result of the genetic modification; and <br>
		(e) the animal is not infected with a virus that can recombine with the genetically modified nucleic acid in the somatic cells of the animal. <br>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input type="checkbox" class="form-control" value="1" name="exemption_type_4" <?php echo set_checkbox('exemption_type_4', '1'); ?> <?php if(isset($load)){if($item->exemption_type_4==1){echo "checked=checked";}}else{} ?> >
                                   </div>
                               </td>
                               <td>
                                  4)     (1) Subject to subitem (2), a dealing involving a host/vector system mentioned in Part 2 of  this Schedule and producing no more than 25 litres of GMO culture in each vessel containing the resultant culture.<br>
                                   (2) The donor nucleic acid: <br>
                                   (a) must meet either of the following requirements:<br>
				    (i) it must not be derived from organisms implicated in, or with a history of causing, disease in otherwise healthy: <br>
					(A) human beings; or <br>
					(B) animals; or <br>
					(C) plants; or <br>
					(D) fungi; <br>
                                   
                   (ii) it must be characterised and the information derived from its  characterisation show that it is unlikely to increase the capacity of the host or vector to cause harm; <br>
			 (b) must not code for a toxin with an LD50 of less than 100 g/kg; and<br>
			 (c) must not code for a toxin with an LD50 of 100 g/kg or more, if  the intention is to express the toxin at high levels; and<br>
			 (d) must not be uncharacterised nucleic acid from a toxin-producing organism; and<br>
			 (e) must not include a viral sequence, unless the donor nucleic acid:<br>
				(i) is missing at least 1 gene essential for viral multiplication that: <br>
               (A) is not available in the cell into which the nucleic acid is introduced; and<br>
               (B) will not become available during the dealing; and <br>
			    (ii) cannot restore replication competence to the vector.<br>

                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input type="checkbox" class="form-control" value="1" name="exemption_type_5" <?php echo set_checkbox('exemption_type_5', '1'); ?> <?php if(isset($load)){if($item->exemption_type_5==1){echo "checked=checked";}}else{} ?> >
                                   </div>
                               </td>
                               <td>
                                   5)	A dealing involving shot gun cloning, or the preparation of a cDNA library, in a host/vector system mentioned in item 1 of Part 2 of this Schedule, if the donor nucleic acid is not derived from either:<br> (a) a pathogen; or <br> (b) a toxin producing organism.
                               </td>
                           </tr>
                       </tbody>
                   </table>
                    </div>
                    
                    <div id="section_5" class="sectiontarget">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_5">5</th>
                               <th colspan="2">Project Summary - briefly describe the project, including background, aims and methods. (This should be written in plain English)</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2"><div class="form-group"><textarea class="form-control" name="project_summary" rows="6"><?php if(isset($load)){echo set_value('project_summary', $item->project_summary);}else{echo set_value('project_summary');} ?></textarea></div></td>
                           </tr>
                       </tbody>
                   </table>
                <span class="text-danger"><?php echo form_error('project_summary'); ?></span>
                    </div>
                    
                    <div id="section_6" class="sectiontarget">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_6">6</th>
                               <th colspan="2">What are the possible hazard(s) or risk(s) involved? If your work involves an exempt dealing - clarify why it is exempt.</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2"><div class="form-group"><textarea class="form-control" name="project_hazard" rows="6"><?php if(isset($load)){echo set_value('project_hazard', $item->project_hazard);}else{echo set_value('project_hazard');} ?></textarea></div></td>
                           </tr>
                       </tbody>
                   </table>
                <span class="text-danger"><?php echo form_error('project_hazard'); ?></span>
                    </div>
                    
                    <div id="section_7" class="sectiontarget">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_7">7</th>
                               <th colspan="2">Provide a list of the SOPs and Risk Assessments to be used. (Attach all to application)</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2"><div class="form-group"><div class="form-group"><textarea class="form-control" name="project_SOP" rows="6"><?php if(isset($load)){echo set_value('project_SOP', $item->project_SOP);}else{echo set_value('project_SOP');} ?></textarea></div></div></td>
                           </tr>
                       </tbody>
                   </table>
                    </div>
                    
                    <div id="section_8" class="sectiontarget">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10" class="reddata" id="section_8">8</th>
                               <th>Facilities to be used</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <table class="table table-bordered">
                                       <tr>
                                           <td>
                                               <div class="form-group row">
                                                   <label for="project_facilities_building_no" class="col-sm-4">Building number:</label>
                                                   <div class="col-sm-7">
                                                       <textarea class="form-control" name="project_facilities_building_no" rows="1"><?php if(isset($load)){echo set_value('project_facilities_building_no', $item->project_facilities_building_no);}else{echo set_value('project_facilities_building_no');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                           <td>
                                               <div class="form-group row">
                                                   <label for="project_facilities_room_no" class="col-sm-4">Room number:</label>
                                                   <div class="col-sm-7">
                                                       <textarea class="form-control" name="project_facilities_room_no" rows="1"><?php if(isset($load)){echo set_value('project_facilities_room_no', $item->project_facilities_room_no);}else{echo set_value('project_facilities_room_no');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group row">
                                                   <label for="project_facilities_containment_level" class="col-sm-4">Containment Level:</label>
                                                   <div class="col-sm-7">
                                                       <textarea class="form-control" name="project_facilities_containment_level" rows="1"><?php if(isset($load)){echo set_value('project_facilities_containment_level', $item->project_facilities_containment_level);}else{echo set_value('project_facilities_containment_level');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                           <td>
                                               <div class="form-group row">
                                                   <label for="project_facilities_certification_no" class="col-sm-4">Certification number:</label>
                                                   <div class="col-sm-7">
                                                       <textarea class="form-control" name="project_facilities_certification_no" rows="1"><?php if(isset($load)){echo set_value('project_facilities_certification_no', $item->project_facilities_certification_no);}else{echo set_value('project_facilities_certification_no');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                    
                                       </tr>
                                   </table>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                
                    </div>
                    
                    <div id="section_9" class="sectiontarget">
                   <table class="table table-bordered">
                       <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_9">9</th>
                               <th>Biosafety Officer(s)/ Lab Manager notification</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <table class="table table-bordered">
                                       <tr>
                                           <td>
                                               Has/have the Biosafety Officer(s)/Lab Manager responsible for the facilities where the dealing is to be conducted been made aware of this application? &nbsp;&nbsp;
                                               
                                               
                                               <div class="checkbox">
                                                   <label class="radio-inline"><input type="radio" value="yes" name="officer_notified" <?php if(isset($load)){if($item->officer_notified=='yes'){echo set_radio('officer_notified', 'yes', TRUE);}} ?>> Yes</label>
                                               
                                                   <label class="radio-inline"><input type="radio" value="no" name="officer_notified" <?php echo set_radio('officer_notified', 'no', FALSE); ?> <?php if(isset($load)){if($item->officer_notified=='no'){echo set_radio('officer_notified', 'no', TRUE);}} ?>> No</label>
                                       
                                               </div>
                                               

                                           </td>
                                           
                                       </tr>
                                   </table>
                               </td>
                           </tr>
                           
                           <tr>
                               <td colspan="2">
                                   <table class="table table-bordered">
                                       <tr>
                                           <td>Name of Biosafety Officer(s)</td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea class="form-control" name="officer_name"><?php if(isset($load)){echo set_value('officer_name', $item->officer_name);}else{echo set_value('officer_name');} ?></textarea>
                                               </div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>Name of Laboratory Manager</td>
                                           <td>
                                               <div class="form-group"><textarea class="form-control" name="laboratory_manager" ><?php if(isset($load)){echo set_value('laboratory_manager', $item->laboratory_manager);}else{echo set_value('laboratory_manager');} ?></textarea></div>
                                           </td>
                                       </tr>
                                   </table>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   </table>
                </div>
                
                <div>
                    <input type="hidden" name="appid" value="<?php if(isset($appID)){echo $appID;} ?>">
                </div>
                
                <div style="text-align: center">
                       <?php if(isset($editload)){ ?>
                       <button type="submit" name = 'updateButton' value = 'Update' class="btn btn-primary">Update</button>
                       <?php }else{ ?>
                       <button name="saveButton" type="submit" class="btn btn-primary col-md-2">Save</button>
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
                    <a href="#section_6" class="btn btn-success">Section 6</a>
                    <a href="#section_7" class="btn btn-success">Section 7</a>
                    <a href="#section_8" class="btn btn-success">Section 8</a>
                    <a href="#section_9" class="btn btn-success">Section 9</a>
                </div>   
            </div>
        </div>
        
        
    

    <?php
    
    if(isset($load)){
        foreach($retrieved5 as $pc2){
            $read1 = $pc2->project_add_qualification;
            $read2 = $pc2->project_add_name;
            $read3 = $pc2->project_add_department;
            $read4 = $pc2->project_add_campus;
            $read5 = $pc2->project_add_postal_address;
            $read6 = $pc2->project_add_telephone;
            $read7 = $pc2->project_add_fax;
            $read8 = $pc2->project_add_email_address;
            $read9 = $pc2->project_add_title;
            $pc2a = explode(",", $read1);
            $pc2b = explode(",", $read2);
            $pc2c = explode(",", $read3);
            $pc2d = explode(",", $read4);
            $pc2e = explode(",", $read5);
            $pc2f = explode(",", $read6);
            $pc2g = explode(",", $read7);
            $pc2h = explode(",", $read8);
            $pc2i = explode(",", $read9);
        }
        
        
    }else{
           
        }
    
    ?>
    
        <div class="row">
            
            <div class="col-md-10">
               
                   <h4 class="centering"><u>Swinburne Biosafety Commitee</u></h4>
                   
                   <h3 class="centering">Application for Notifiable Low Risk Dealings</h3>
                   <h3 class="centering">(NLRDs) suitable for Physical Containment level 2 </h3>
                   <h3 class="centering">(PC2)</h3>
                   
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
                    <td><input class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="date_received" placeholder="Office use only" value="<?php if(isset($load)){echo set_value('date_received', $pc1->date_received);}else{echo set_value('date_received');} ?>" <?php if($this->session->userdata('account_type') != 4){echo "disabled";} ?> rows="1">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="SBC_reference_no" placeholder="Office use only" value="<?php if(isset($load)){echo set_value('SBC_reference_no', $pc1->SBC_reference_no);}else{echo set_value('SBC_reference_no');} ?>" <?php if($this->session->userdata('account_type') != 4){echo "disabled";} ?> rows="1">
                    </td>
                </tr>
            </tbody>
        </table>
                   
                <div id="pc2_section_1" class="sectiontarget">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10" class="reddata">1</th>
                               <th>Title of Project</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                              <td colspan="2"><textarea <?php if(isset($disabled)){echo "disabled";} ?> name="pc2_project_title" class="form-control"><?php if(isset($load)){echo set_value('pc2_project_title', $pc2->project_title);}else{echo set_value('pc2_project_title');} ?></textarea></td> 
                           </tr>
                       </tbody>
                   </table>
                   
                    
                </div>
                
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
                                               Title: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_supervisor_title"><?php if(isset($load)){echo set_value('pc2_project_supervisor_title', $pc2->project_supervisor_title);}else{echo set_value('pc2_project_supervisor_title');} ?></textarea>
                                           </td>
                                           
                                           <td>
                                               Name: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_supervisor_name"><?php if(isset($load)){echo set_value('pc2_project_supervisor_name', $pc2->project_supervisor_name);}else{echo set_value('pc2_project_supervisor_name');} ?></textarea>
                                           </td>
                                           
                                           <td>
                                               Current qualifications (please include all): <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_supervisor_qualification"><?php if(isset($load)){echo set_value('pc2_project_supervisor_qualification', $pc2->project_supervisor_qualification);}else{echo set_value('pc2_project_supervisor_qualification');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">
                                               Department: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_supervisor_department"><?php if(isset($load)){echo set_value('pc2_project_supervisor_department', $pc2->project_supervisor_department);}else{echo set_value('pc2_project_supervisor_department');} ?></textarea>
                                           </td>
                                           
                                           <td colspan="1">
                                               Campus: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_supervisor_campus"><?php if(isset($load)){echo set_value('pc2_project_supervisor_campus', $pc2->project_supervisor_campus);}else{echo set_value('pc2_project_supervisor_campus');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="3">
                                               Full postal address (including internal mail details): <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_supervisor_postal_address"><?php if(isset($load)){echo set_value('pc2_project_supervisor_postal_address', $pc2->project_supervisor_postal_address);}else{echo set_value('pc2_project_supervisor_postal_address');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">
                                               <div class="form-group row">
                                                   <label for="pc2_project_supervisor_telephone" class="col-sm-4">Phone:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_supervisor_telephone" rows="1"><?php if(isset($load)){echo set_value('pc2_project_supervisor_telephone', $pc2->pc2_project_supervisor_telephone);}else{echo set_value('pc2_project_supervisor_telephone');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                           <td>
                                               <div class="form-group row">
                                                   <label for="pc2_project_supervisor_fax" class="col-sm-4">Fax:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_supervisor_fax" rows="1"><?php if(isset($load)){echo set_value('pc2_project_supervisor_fax', $pc2->project_supervisor_fax);}else{echo set_value('pc2_project_supervisor_fax');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                           
                                       </tr>
                                       <tr>
                                           <td colspan="3">
                                               Email (MUST be staff email address): <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_supervisor_email_address"><?php if(isset($load)){echo set_value('pc2_project_supervisor_email_address', $pc2->project_supervisor_email_address);}else{echo set_value('pc2_project_supervisor_email_address');} ?></textarea>
                                           </td>
                                       </tr>
                                   </table>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   
                   
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
                                               Title: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_title[0]"><?php if(isset($load)){echo set_value('pc2_project_add_title[0]', $pc2i[0]);}else{echo set_value('pc2_project_add_title[0]');} ?></textarea>
                                           </td>
                                           
                                           <td>
                                               Name: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_name[0]"><?php if(isset($load)){echo set_value('pc2_project_add_name[0]', $pc2a[0]);}else{echo set_value('pc2_project_add_name[0]');} ?></textarea>
                                           </td>
                                           
                                           <td>
                                               Current qualifications (please include all): 
                                               <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_qualification[0]"><?php if(isset($load)){echo set_value('pc2_project_add_qualification[0]', $pc2b[0]);}else{echo set_value('pc2_project_add_qualification[0]');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">
                                               Department: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_department[0]"><?php if(isset($load)){echo set_value('pc2_project_add_department[0]', $pc2c[0]);}else{echo set_value('pc2_project_add_department[0]');} ?></textarea>
                                           </td>
                                           
                                           <td colspan="1">
                                               Campus: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_campus[0]"><?php if(isset($load)){echo set_value('pc2_project_add_campus[0]', $pc2d[0]);}else{echo set_value('pc2_project_add_campus[0]');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="3">
                                               Full postal address (including internal mail details): <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_postal_address[0]"><?php if(isset($load)){echo set_value('pc2_project_add_postal_address[0]', $pc2e[0]);}else{echo set_value('pc2_project_add_postal_address[0]');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">
                                               <div class="form-group row">
                                                   <label for="pc2_project_add_telephone[0]" class="col-sm-4">Phone:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_telephone[0]" rows="1"><?php if(isset($load)){echo set_value('pc2_project_add_telephone[0]', $pc2f[0]);}else{echo set_value('pc2_project_add_telephone[0]');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                           <td>
                                               <div class="form-group row">
                                                   <label for="pc2_project_add_fax[0]" class="col-sm-4">Fax:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_fax[0]" rows="1"><?php if(isset($load)){echo set_value('pc2_project_add_fax[0]', $pc2g[0]);}else{echo set_value('pc2_project_add_fax[0]');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                       </tr>
                                       <tr>
                                           <td colspan="3">
                                               Email (MUST be staff email address): <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_email_address[0]"><?php if(isset($load)){echo set_value('pc2_project_add_email_address[0]', $pc2h[0]);}else{echo set_value('pc2_project_add_email_address[0]');} ?></textarea>
                                           </td>
                                       </tr>
                                   </table>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   
                   <table class="table table-bordered">
                                       <tr>
                                           <td width="80">
                                               Title: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_title[1]"><?php if(isset($load)){echo set_value('pc2_project_add_title[1]', $pc2i[1]);}else{echo set_value('pc2_project_add_title[1]');} ?></textarea>
                                           </td>
                                           
                                           <td>
                                               Name: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_name[1]"><?php if(isset($load)){echo set_value('pc2_project_add_name[1]', $pc2a[1]);}else{echo set_value('pc2_project_add_name[1]');} ?></textarea>
                                           </td>
                                           
                                           <td>
                                               Current qualifications (please include all): 
                                               <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_qualification[1]"><?php if(isset($load)){echo set_value('pc2_project_add_qualification[1]', $pc2b[1]);}else{echo set_value('pc2_project_add_qualification[1]');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">
                                               Department: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_department[1]"><?php if(isset($load)){echo set_value('pc2_project_add_department[1]', $pc2c[1]);}else{echo set_value('pc2_project_add_department[1]');} ?></textarea>
                                           </td>
                                           
                                           <td colspan="1">
                                               Campus: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_campus[1]"><?php if(isset($load)){echo set_value('pc2_project_add_campus[1]', $pc2d[1]);}else{echo set_value('pc2_project_add_campus[1]');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="3">
                                               Full postal address (including internal mail details): <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_postal_address[1]"><?php if(isset($load)){echo set_value('pc2_project_add_postal_address[1]', $pc2e[1]);}else{echo set_value('pc2_project_add_postal_address[1]');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">
                                               <div class="form-group row">
                                                   <label for="pc2_project_add_telephone[1]" class="col-sm-4">Phone:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_telephone[1]" rows="1"><?php if(isset($load)){echo set_value('pc2_project_add_telephone[1]', $pc2f[1]);}else{echo set_value('pc2_project_add_telephone[1]');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                           <td>
                                               <div class="form-group row">
                                                   <label for="pc2_project_add_fax[1]" class="col-sm-4">Fax:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_fax[1]" rows="1"><?php if(isset($load)){echo set_value('pc2_project_add_fax', $pc2g[1]);}else{echo set_value('pc2_project_add_fax[1]');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                       </tr>
                                       <tr>
                                           <td colspan="3">
                                               Email (MUST be staff email address): <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_add_email_address[1]"><?php if(isset($load)){echo set_value('pc2_project_add_email_address[1]', $pc2h[1]);}else{echo set_value('pc2_project_add_email_address[1]');} ?></textarea>
                                           </td>
                                       </tr>
                                   </table>
                   
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_4">4</th>
                               <th colspan="2">Type of Dealing (check the box that applies)</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input <?php if(isset($disabled)){echo "disabled";} ?> type="checkbox" value="1" class="form-control" name="pc2_dealing_type_a" <?php echo set_checkbox('pc2_dealing_type_a', '1'); ?> <?php if(isset($load)){if($pc2->dealing_type_a==1){echo "checked=checked";}}else{} ?>>
                                   </div>
                               </td>
                               <td>
                                   (a)  A dealing involving whole animals (including non-vertebrates) that:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    (i) involves genetic modification of the genome of the oocyte or zygote or early embryo by any means to produce a &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; novel whole organism; and <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    (ii) does not involve any of the following:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            (A) a genetically modified laboratory guinea pig;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            (B) a genetically modified laboratory mouse;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            (C) a genetically modified laboratory rabbit;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            (D) a genetically modified laboratory rat;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            (E) a genetically modified <em>Caenorhabditis elegans</em>;



                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input <?php if(isset($disabled)){echo "disabled";} ?> type="checkbox" value="1" class="form-control" name="dealing_type_aa" <?php echo set_checkbox('dealing_type_aa', '1'); ?> <?php if(isset($load)){if($pc2->dealing_type_aa==1){echo "checked=checked";}}else{} ?>>
                                   </div>
                               </td>
                               <td>
                                   (aa) A dealing involving a genetically modified laboratory guinea pig, a genetically modified mouse, a genetically   modified laboratory rabbit, a genetically modified laboratory rat, or a genetically modified <em>Caenorhabditis elegans</em> if:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    (i) the genetic modification confers an advantage on the animal; and <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    (ii) the animal is not capable of secreting or producing an infectious agent as a result of the genetic modification;
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input <?php if(isset($disabled)){echo "disabled";} ?> type="checkbox" value="1" class="form-control" name="dealing_type_b" <?php echo set_checkbox('dealing_type_b', '1'); ?> <?php if(isset($load)){if($pc2->dealing_type_b==1){echo "checked=checked";}}else{} ?>>
                                   </div>
                               </td>
                               <td>
                                   (b)  A dealing involving a genetically modified plant;
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input type="checkbox" value="1" class="form-control" name="pc2_dealing_type_c" <?php echo set_checkbox('pc2_dealing_type_c', '1'); ?> <?php if(isset($load)){if($pc2->dealing_type_c==1){echo "checked=checked";}}else{} ?>>
                                   </div>
                               </td>
                               <td>
                                   (c)  A dealing involving a host/vector system not mentioned in paragraph 1.1 (c) or Part 2 of                       Schedule 2, if neither host nor vector has been implicated in, or has a history of causing,  disease in otherwise healthy:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   (i) human beings; or<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   (ii) animals; or<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   (iii) plants; or<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   (iv) fungi;

                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input <?php if(isset($disabled)){echo "disabled";} ?> type="checkbox" value="1" class="form-control" name="dealing_type_d" <?php echo set_checkbox('dealing_type_d', '1'); ?> <?php if(isset($load)){if($pc2->dealing_type_d==1){echo "checked=checked";}}else{} ?>>
                                   </div>
                               </td>
                               <td>
                                   (d)  A dealing involving a host and vector not mentioned as a host/vector system in Part 2 of Schedule 2, if:<br>&nbsp;&nbsp;&nbsp;&nbsp;
                                   (i) the host or vector has been implicated in, or has a history of causing, disease in otherwise healthy:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        (A) human beings; or<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        (B) animals; or<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        (C) plants; or<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        (D) fungi; and<br>&nbsp;&nbsp;&nbsp;&nbsp;
                                   (ii) the donor nucleic acid is characterised; and<br>&nbsp;&nbsp;&nbsp;&nbsp;
                                   (iii) the characterisation of the donor nucleic acid shows that it is unlikely to increase  the capacity of the host or vector <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; to cause harm;
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input <?php if(isset($disabled)){echo "disabled";} ?> type="checkbox" value="1" class="form-control" name="dealing_type_e" <?php echo set_checkbox('dealing_type_e', '1'); ?> <?php if(isset($load)){if($pc2->dealing_type_e==1){echo "checked=checked";}}else{} ?>>
                                   </div>
                               </td>
                               <td>
                                   (e)  A dealing involving a host/vector system mentioned in Part 2 of Schedule 2, if the donor nucleic acid:<br>&nbsp;&nbsp;&nbsp;&nbsp;
                                        (i) encodes a pathogenic determinant; or<br>&nbsp;&nbsp;&nbsp;&nbsp;
                                        (ii) is uncharacterised nucleic acid from an organism that has been implicated in, or has a history of causing, disease in <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;otherwise healthy:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                (A) human beings; or<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                (B) animals; or<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                (C) plants; or<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                (D) fungi;

                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input <?php if(isset($disabled)){echo "disabled";} ?> type="checkbox" value="1" class="form-control" name="dealing_type_f" <?php echo set_checkbox('dealing_type_f', '1'); ?> <?php if(isset($load)){if($pc2->dealing_type_f==1){echo "checked=checked";}}else{} ?>>
                                   </div>
                               </td>
                               <td>
                                   (f)   A dealing involving a host/vector system mentioned in Part 2 of Schedule 2 and producing more than 25 litres of GMO culture in each vessel containing the resultant culture, if:<br>&nbsp;&nbsp;&nbsp;&nbsp;
                                        (i) the dealing is undertaken in a facility that is certified by the Regulator as a large scale facility; and<br>&nbsp;&nbsp;&nbsp;&nbsp;
                                        (ii) the donor nucleic acid satisfies the conditions set out in subitem 4 (2) of Part 1 of Schedule 2;

                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input <?php if(isset($disabled)){echo "disabled";} ?> type="checkbox" value="1" class="form-control" name="dealing_type_g" <?php echo set_checkbox('dealing_type_g', '1'); ?> <?php if(isset($load)){if($pc2->dealing_type_g==1){echo "checked=checked";}}else{} ?>>
                                   </div>
                               </td>
                               <td>
                                   (g)  A dealing involving complementation of knocked-out genes, if the complementation is unlikely  to increase the <br>&nbsp;&nbsp;&nbsp;&nbsp;capacity of the GMO to cause harm compared to the capacity of the parent organism before the genes were knocked <br>&nbsp;&nbsp;&nbsp; out;

                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input <?php if(isset($disabled)){echo "disabled";} ?> type="checkbox" value="1" class="form-control" name="dealing_type_h" <?php echo set_checkbox('dealing_type_h', '1'); ?> <?php if(isset($load)){if($pc2->dealing_type_h==1){echo "checked=checked";}}else{} ?>>
                                   </div>
                               </td>
                               <td>
                                   (h)  A dealing involving shot-gun cloning, or the preparation of a cDNA library, in a host/vector system mentioned in <br>&nbsp;&nbsp;&nbsp;&nbsp; item 1 of Part 2 of Schedule 2, if the donor nucleic acid is derived from either:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            (i) a pathogen; or <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            (ii) a toxin-producing organism;
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input <?php if(isset($disabled)){echo "disabled";} ?> type="checkbox" value="1" class="form-control" name="dealing_type_i" <?php echo set_checkbox('dealing_type_i', '1'); ?> <?php if(isset($load)){if($pc2->dealing_type_i==1){echo "checked=checked";}}else{} ?>>
                                   </div>
                               </td>
                               <td>
                                   (i)   A dealing involving the introduction of a replication defective viral vector unable to transduce human cells into a <br>&nbsp;&nbsp;&nbsp;&nbsp; host not mentioned in Part 2 of Schedule 2, if the donor nucleic acid cannot restore replication competence to the <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; vector;

                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input <?php if(isset($disabled)){echo "disabled";} ?> type="checkbox" value="1" class="form-control" name="dealing_type_j" <?php echo set_checkbox('dealing_type_j', '1'); ?> <?php if(isset($load)){if($pc2->dealing_type_j==1){echo "checked=checked";}}else{} ?>>
                                   </div>
                               </td>
                               <td>
                                   (j)  A dealing involving the introduction of a replication defective non-retroviral vector able to transduce human cells,<br>&nbsp;&nbsp;&nbsp; other than a dealing mentioned in paragraph 1.1 (c), into a host  mentioned in Part 2 of Schedule 2, if the donor <br>&nbsp;&nbsp;&nbsp;&nbsp;nucleic acid cannot restore replication  competence to the vector;

                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input <?php if(isset($disabled)){echo "disabled";} ?> type="checkbox" value="1" class="form-control" name="dealing_type_k" <?php echo set_checkbox('dealing_type_k', '1'); ?> <?php if(isset($load)){if($pc2->dealing_type_k==1){echo "checked=checked";}}else{} ?>>
                                   </div>
                               </td>
                               <td>
                                   (k)  A dealing involving the introduction of a replication defective non-retroviral vector able to  transduce human cells into <br>&nbsp;&nbsp;&nbsp;  a host not mentioned in Part 2 of Schedule 2, if:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                        (i) the donor nucleic acid cannot restore replication competence to the vector; and <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                        (ii) the donor nucleic acid does not: <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                        (A) confer an oncogenic modification in humans; or <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                        (B) encode a protein with immunomodulatory activity in humans;


                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input <?php if(isset($disabled)){echo "disabled";} ?> type="checkbox" value="1" class="form-control" name="dealing_type_l" <?php echo set_checkbox('dealing_type_l', '1'); ?> <?php if(isset($load)){if($pc2->dealing_type_l==1){echo "checked=checked";}}else{} ?>>
                                   </div>
                               </td>
                               <td>
                                   (l)  A dealing involving the introduction of a replication defective retroviral vector able to transduce human cells into a &nbsp;&nbsp;&nbsp;&nbsp;host mentioned in Part 2 of Schedule 2, if:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            (i) all viral genes have been removed from the retroviral vector so that it cannot replicate or assemble into a virion <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; without these functions being supplied <em>in trans</em>; and <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            (ii) viral genes needed for virion production in the packaging cell line are expressed from independent, unlinked loci <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; with minimal sequence overlap with the vector to limit or prevent recombination; and<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            (iii) either:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;(A) the retroviral vector includes a deletion in the Long Terminal Repeat  sequence of DNA that prevents <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; transcription of genomic RNA following integration into the  host cell DNA; or <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;(B) the packaging cell line and packaging plasmids express only viral genes  <em>gagpol</em>, rev and an envelope protein <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; gene, or a subset of these;

                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input <?php if(isset($disabled)){echo "disabled";} ?> type="checkbox" value="1" class="form-control" name="dealing_type_m" <?php echo set_checkbox('dealing_type_m', '1'); ?> <?php if(isset($load)){if($pc2->dealing_type_m==1){echo "checked=checked";}}else{} ?>>
                                   </div>
                               </td>
                               <td>
                                   (m) A dealing involving the introduction of a replication defective retroviral vector able to transduce<br>
                                   &nbsp;&nbsp;&nbsp;&nbsp;human cells into a host not mentioned in Part 2 of Schedule 2, if: <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        (i) the donor nucleic acid does not: <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        (A) confer an oncogenic modification in humans; or <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        (B) encode a protein with immunomodulatory activity in humans; and <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        (ii) all viral genes have been removed from the retroviral vector so that it cannot replicate or assemble into a virion <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; without these functions being supplied in trans; and <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   (iii) viral genes needed for virion production in the packaging cell line are expressed from independent, unlinked loci<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; with minimal sequence overlap with the vector to limit or prevent recombination; and <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   (iv) either: <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       (A) the retroviral vector includes a deletion in the Long Terminal Repeat sequence of DNA that prevents<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; transcription of genomic RNA following integration into the host cell DNA; or <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       (B) the packaging cell line and packaging plasmids express only viral genes <em>gagpol</em>, rev and an envelope <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;protein gene, or a subset of these.

                               </td>
                           </tr>
                       </tbody>
                   </table>
                   
                <div id="pc2_section_5" class="sectiontarget">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata">5</th>
                               <th colspan="2">Project Summary - briefly describe the project, including the aims of the proposed dealing, method of producing GMOs and their use. (This should be written in plain English).</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <div class="form-group">
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_summary" rows="6"><?php if(isset($load)){echo set_value('pc2_project_summary', $pc2->project_summary);}else{echo set_value('pc2_project_summary');} ?></textarea>
                                   </div>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   <span class="text-danger"><?php echo form_error('pc2_project_summary'); ?></span>
                </div>
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_6">6</th>
                               <th colspan="2">Table of GMOs – list all the GMOs to be generated and or used</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <table class="table table-bordered">
                                       <tr>
                                           <td>
                                               Scientific name of unmodified organism
                                           </td>
                                           <td>
                                               Vectors and method of transfer
                                           </td>
                                           <td>
                                               Gene Identity and Species of Origin
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group">
                                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_GMO_name"><?php if(isset($load)){echo set_value('pc2_GMO_name', $pc2->GMO_name);}else{echo set_value('pc2_GMO_name');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_GMO_method"><?php if(isset($load)){echo set_value('pc2_GMO_method', $pc2->GMO_method);}else{echo set_value('pc2_GMO_method');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_GMO_origin"><?php if(isset($load)){echo set_value('pc2_GMO_origin', $pc2->GMO_origin);}else{echo set_value('pc2_GMO_origin');} ?></textarea>
                                               </div>
                                           </td>
                                       </tr>
                                   </table>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   
                   
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_7">7</th>
                               <th colspan="2">Modified trait(s) and gene(s) responsible (Eg fungal resistance, attenuation, protein expression, disease resistance etc)) </th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <table class="table table-bordered">
                                       <tr>
                                           <td>
                                               Class of modified trait
                                           </td>
                                           <td>
                                               Details
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group">
                                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_modified_trait_class"><?php if(isset($load)){echo set_value('pc2_modified_trait_class', $pc2->modified_trait_class);}else{echo set_value('pc2_modified_trait_class');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_modified_trait_description"><?php if(isset($load)){echo set_value('pc2_modified_trait_description', $pc2->modified_trait_description);}else{echo set_value('pc2_modified_trait_description');} ?></textarea>
                                               </div>
                                           </td>
                                       </tr>
                                   </table>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_8">8</th>
                               <th colspan="2">What are the possible hazard(s) or risk(s) to the staff performing the proposed genetic modification(s)?</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <div class="form-group">
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> rows="15" class="form-control" name="pc2_project_hazard_staff" placeholder="250 words max"><?php if(isset($load)){echo set_value('pc2_project_hazard_staff', $pc2->project_hazard_staff);}else{echo set_value('pc2_project_hazard_staff');} ?></textarea>
                                   </div>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   <span class="text-danger"><?php echo form_error('pc2_project_hazard_staff'); ?></span>
                   
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_9">9</th>
                               <th colspan="2">What are the possible hazard(s) or risk(s) from an unintentional release of the GMO(s) into the environment?</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <div class="form-group">
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> rows="15" class="form-control" name="pc2_project_hazard_environment" placeholder="250 words max"><?php if(isset($load)){echo set_value('pc2_project_hazard_environment', $pc2->project_hazard_environment);}else{echo set_value('pc2_project_hazard_environment');} ?></textarea>
                                   </div>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   <span class="text-danger"><?php echo form_error('pc2_project_hazard_environment'); ?></span>
                   
                <div id="pc2_section_10" class="sectiontarget">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata">10</th>
                               <th colspan="2">What are the steps you will take in the event of an unintentional release of the GMO(s)?</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <div class="form-group">
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> rows="15" class="form-control" name="pc2_project_hazard_steps" placeholder="250 words max"><?php if(isset($load)){echo set_value('pc2_project_hazard_steps', $pc2->project_hazard_steps);}else{echo set_value('pc2_project_hazard_steps');} ?></textarea>
                                   </div>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   <span class="text-danger"><?php echo form_error('pc2_project_hazard_steps'); ?></span>
                </div>
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_11">11</th>
                               <th colspan="2">Do you propose to transport the GMO(s) outside a certified facility? (Include details about method of transportation)</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <div class="form-group">
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> rows="15" class="form-control" name="pc2_project_transport" placeholder="250 words max"><?php if(isset($load)){echo set_value('pc2_project_transport', $pc2->project_transport);}else{echo set_value('pc2_project_transport');} ?></textarea>
                                   </div>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   <span class="text-danger"><?php echo form_error('pc2_project_transport'); ?></span>
                   
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_12">12</th>
                               <th colspan="2">How will the GMO(s) be disposed of?</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <div class="form-group">
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> rows="15" class="form-control" name="pc2_project_disposal" placeholder="250 words max"><?php if(isset($load)){echo set_value('pc2_project_disposal', $pc2->project_disposal);}else{echo set_value('pc2_project_disposal');} ?></textarea>
                                   </div>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   <span class="text-danger"><?php echo form_error('pc2_project_disposal'); ?></span>
                   
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_13">13</th>
                               <th colspan="2">Provide a list of the SOPs and Risk Assessments for the protocols to be used. (Attach all listed to application)</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <div class="form-group">
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> rows="15" class="form-control" name="pc2_project_SOP"><?php if(isset($load)){echo set_value('pc2_project_SOP', $pc2->project_SOP);}else{echo set_value('pc2_project_SOP');} ?></textarea>
                                   </div>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10" class="reddata" id="section_14">14</th>
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
                                                   <label for="pc2_project_facilities_building_no" class="col-sm-4">Building number:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_facilities_building_no" rows="1"><?php if(isset($load)){echo set_value('pc2_project_facilities_building_no', $pc2->project_facilities_building_no);}else{echo set_value('pc2_project_facilities_building_no');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                           <td>
                                               <div class="form-group row">
                                                   <label for="pc2_project_facilities_room_no" class="col-sm-4">Room number:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_facilities_room_no" rows="1"><?php if(isset($load)){echo set_value('pc2_project_facilities_room_no', $pc2->project_facilities_room_no);}else{echo set_value('pc2_project_facilities_room_no');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group row">
                                                   <label for="pc2_project_facilities_containment_level" class="col-sm-4">Containment Level:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_facilities_containment_level" rows="1"><?php if(isset($load)){echo set_value('pc2_project_facilities_containment_level', $pc2->project_facilities_containment_level);}else{echo set_value('pc2_project_facilities_containment_level');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                           <td>
                                               <div class="form-group row">
                                                   <label for="pc2_project_facilities_certification_no" class="col-sm-4">Certification number:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_project_facilities_certification_no" rows="1"><?php if(isset($load)){echo set_value('pc2_project_facilities_certification_no', $pc2->project_facilities_certification_no);}else{echo set_value('pc2_project_facilities_certification_no');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                    
                                       </tr>
                                   </table>
                                   
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   
                <div id="pc2_section_15" class="sectiontarget">
                   <table class="table table-bordered">
                       <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_15">15</th>
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
                                               
                                               <label class="radio-inline"><input <?php if(isset($disabled)){echo "disabled";} ?> type="radio" value="yes" name="pc2_officer_notified" <?php if(isset($load)){if($pc2->officer_notified=='yes'){echo set_radio('pc2_officer_notified', 'yes', TRUE);}} ?>> Yes</label>
                                               
                                               <label class="radio-inline"><input <?php if(isset($disabled)){echo "disabled";} ?> type="radio" value="no" name="pc2_officer_notified" <?php echo set_radio('pc2_officer_notified', 'no', FALSE); ?> <?php if(isset($load)){if($pc2->officer_notified=='no'){echo set_radio('pc2_officer_notified', 'no', TRUE);}} ?>> No</label>
                                               

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
                                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_officer_name"><?php if(isset($load)){echo set_value('pc2_officer_name', $pc2->officer_name);}else{echo set_value('pc2_officer_name');} ?></textarea>
                                               </div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>Name of Laboratory Manager</td>
                                           <td><div class="form-group"><textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc2_laboratory_manager" ><?php if(isset($load)){echo set_value('pc2_laboratory_manager', $pc2->laboratory_manager);}else{echo set_value('pc2_laboratory_manager');} ?></textarea></div></td>
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
                       <button type="submit" name = 'updateButton' value = 'Update' onclick="location.href='<?php echo site_url().'/pc2/update_form';?>'" class="btn btn-primary">Update</button>
                       <?php }else{ ?>
                       <button name="saveButton" type="submit" class="btn btn-primary col-md-2">Save</button>
                       <?php } ?>
                       
                   </div>
               
            </div>
            
            <div class="col-md-2">
                <div class="btn-group-vertical btn-sample">
                    <a href="#top" class="btn btn-success">Top</a>
                    <a href="#pc2_section_1" class="btn btn-success">Section 1</a>
                    <a href="#pc2_section_5" class="btn btn-success">Section 2</a>
                    <a href="#pc2_section_10" class="btn btn-success">Section 3</a>
                    <a href="#pc2_section_15" class="btn btn-success">Section 4</a>
                </div>   
            </div>
        </div>
        
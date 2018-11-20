 
    <?php
    
    if(isset($load)){
        foreach($retrieved4 as $pc1){
            $value1 = $pc1->project_add_qualification;
            $value2 = $pc1->project_add_name;
            $value3 = $pc1->project_add_department;
            $value4 = $pc1->project_add_campus;
            $value5 = $pc1->project_add_postal_address;
            $value6 = $pc1->project_add_telephone;
            $value7 = $pc1->project_add_fax;
            $value8 = $pc1->project_add_email_address;
            $value9 = $pc1->project_add_title;
            $pc1a = explode(",", $value1);
            $pc1b = explode(",", $value2);
            $pc1c = explode(",", $value3);
            $pc1d = explode(",", $value4);
            $pc1e = explode(",", $value5);
            $pc1f = explode(",", $value6);
            $pc1g = explode(",", $value7);
            $pc1h = explode(",", $value8);
            $pc1i = explode(",", $value9);
        }
        
        
    }else{
           
        }
    
    ?>
    
<div class="row">
    <div class="col-md-10">
           <br>
        <?php if(isset($error)){echo $error;} ?>

                   
        <table class="table table-bordered">
            <img class="card-img-top" src="<?php echo base_url('assets\images\FormLogo\PC1.jpg') ?>" alt="">
            
            <thead class="tblTitle2">
                <tr>
                    <th>DATE RECEIVED</th>
                    <th>SBC REFERENCE NUMBER</th>
                </tr>
            </thead>
            <tbody class="tblTitle2">
                <tr>
                    <td>
                        <input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="date_received" placeholder="Office use only" value="<?php if(isset($load)){echo set_value('date_received', $pc1->date_received);}else{echo set_value('date_received');} ?>" <?php if($this->session->userdata('account_type') != 4){echo "disabled";} ?> rows="1">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="SBC_reference_no" placeholder="Office use only" value="<?php if(isset($load)){echo set_value('SBC_reference_no', $pc1->SBC_reference_no);}else{echo set_value('SBC_reference_no');} ?>" <?php if($this->session->userdata('account_type') != 4){echo "disabled";} ?> rows="1">
                    </td>
                </tr>
            </tbody>
        </table>
                   
         <div id="pc1_section_1" class="sectiontarget">
             <table class="table table-bordered" id="section_1">
                 <thead>
                     <tr>
                         <th width="10px" class="reddata">1</th>
                         <th>Title of Project</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <td colspan="2">
                             <textarea <?php if(isset($disabled)){echo "disabled";} ?> name="pc1_project_title" class="form-control"><?php if(isset($load)){echo set_value('pc1_project_title', $pc1->project_title);}else{echo set_value('pc1_project_title');} ?></textarea>
                         </td> 
                     </tr>
                 </tbody>
             </table>
             <span class="text-danger"><?php echo form_error('pc1_project_title'); ?></span>
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
                                          <td colspan="3">Project Supervisor (must be a Swinburne staff member)</td> 
                                       </tr>
                                       
                                       <tr>
                                           <td>
                                               Title:
                                                   <div>
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" id="project_supervisor_title" name="project_supervisor_title" rows="1"><?php if(isset($load)){echo set_value('project_supervisor_title', $pc1->project_supervisor_title);}else{echo set_value('project_supervisor_title');} ?></textarea>
                                                   </div>
                                           </td>
                                           
                                           <td>
                                               Name:
                                                   <div>
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" id="project_supervisor_name" name="project_supervisor_name" rows="1"><?php if(isset($load)){echo set_value('project_supervisor_name', $pc1->project_supervisor_name);}else{echo set_value('project_supervisor_name');} ?></textarea>
                                                   </div>
                                               
                                           </td>
                                           
                                           <td>
                                               Current qualifications (please include all):
                                               <div>
                                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" id="project_supervisor_qualification" name="project_supervisor_qualification" rows="2"><?php if(isset($load)){echo set_value('project_supervisor_qualification', $pc1->project_supervisor_qualification);}else{echo set_value('project_supervisor_qualification');} ?></textarea>
                                               </div>
                                           </td>
                                           
                                       </tr>
                                       
                                       <tr>
                                           
                                           <td colspan="2">
                                               Department:
                                                   <div>
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" id="project_supervisor_department" name="project_supervisor_department" rows="1"><?php if(isset($load)){echo set_value('project_supervisor_department', $pc1->project_supervisor_department);}else{echo set_value('project_supervisor_department');} ?></textarea>
                                                   </div>
                                               
                                           </td>
                                           
                                           <td>
                                               Campus:
                                                   <div>
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" id="project_supervisor_campus" name="project_supervisor_campus" rows="1"><?php if(isset($load)){echo set_value('project_supervisor_campus', $pc1->project_supervisor_campus);}else{echo set_value('project_supervisor_campus');} ?></textarea>
                                                   </div>
                                               
                                           </td>
                                           
                                       </tr>
                                       
                                       <tr>
                                           <td colspan="3">
                                               Full postal address (including internal mail details): <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_supervisor_postal_address" rows="2"><?php if(isset($load)){echo set_value('project_supervisor_postal_address', $pc1->project_supervisor_postal_address);}else{echo set_value('project_supervisor_postal_address');} ?></textarea>
                                           </td>
                                       </tr>
                                       
                                       <tr>
                                           <td colspan="2">
                                               <div class="form-group row">
                                                   <label for="pc1_project_supervisor_telephone" class="col-sm-4">Phone:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="pc1_project_supervisor_telephone" rows="1"><?php if(isset($load)){echo set_value('pc1_project_supervisor_telephone', $pc1->pc1_project_supervisor_telephone);}else{echo set_value('pc1_project_supervisor_telephone');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                           <td>
                                               <div class="form-group row">
                                                   <label for="project_supervisor_fax" class="col-sm-4">Fax:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" id="project_supervisor_fax" name="project_supervisor_fax" rows="1"><?php if(isset($load)){echo set_value('project_supervisor_fax', $pc1->project_supervisor_fax);}else{echo set_value('project_supervisor_fax');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                       </tr>
                                       
                                       <tr>
                                           <td colspan="3">
                                               Email (MUST be staff email address): <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_supervisor_email_address" rows="1"><?php if(isset($load)){echo set_value('project_supervisor_email_address', $pc1->project_supervisor_email_address);}else{echo set_value('project_supervisor_email_address');} ?></textarea>
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
                               <th colspan="2">Additional people to be included in correspondence regarding this dealing<br>(e.g. Research Assistants, Biosafety Officer, Facility Managers)</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">
                                   <table class="table table-bordered">
                                       <tr>
                                           <td width="200">
                                               Title: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_title[0]"><?php if(isset($load)){echo set_value('project_add_title[0]', $pc1i[0]);}else{echo set_value('project_add_title[0]');} ?>
                                               </textarea>
                                           </td>
                                           
                                           <td>
                                               Name: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_name[0]"><?php if(isset($load)){echo set_value('project_add_name[0]', $pc1a[0]);}else{echo set_value('project_add_name[0]');} ?></textarea>
                                           </td>
                                           
                                           <td>
                                               Current qualifications (please include all): 
                                               <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_qualification[0]"><?php if(isset($load)){echo set_value('project_add_qualification[0]', $pc1b[0]);}else{echo set_value('project_add_qualification[0]');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">
                                               Department: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_department[0]"><?php if(isset($load)){echo set_value('project_add_department[0]', $pc1c[0]);}else{echo set_value('project_add_department[0]');} ?></textarea>
                                           </td>
                                           
                                           <td colspan="1">
                                               Campus: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_campus[0]"><?php if(isset($load)){echo set_value('project_add_campus[0]', $pc1d[0]);}else{echo set_value('project_add_campus[0]');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="3">
                                               Full postal address (including internal mail details): <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_postal_address[0]"><?php if(isset($load)){echo set_value('project_add_postal_address[0]', $pc1e[0]);}else{echo set_value('project_add_postal_address[0]');} ?></textarea>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">
                                               <div class="form-group row">
                                                   <label for="project_add_telephone[0]" class="col-sm-4">Phone:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_telephone[0]" rows="1"><?php if(isset($load)){echo set_value('project_add_telephone[0]', $pc1f[0]);}else{echo set_value('project_add_telephone[0]');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                           <td>
                                               <div class="form-group row">
                                                   <label for="project_add_fax[0]" class="col-sm-4">Fax:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_fax[0]" rows="1"><?php if(isset($load)){echo set_value('project_add_fax[0]', $pc1g[0]);}else{echo set_value('project_add_fax[0]');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td colspan="3">
                                               Email (MUST be staff email address): <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_email_address[0]" rows="1"><?php if(isset($load)){echo set_value('project_add_email_address[0]', $pc1h[0]);}else{echo set_value('project_add_email_address[0]');} ?></textarea>
                                           </td>
                                       </tr>
                                   </table>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   
                   <table class="table table-bordered">
                       <tr>
                           <td width="90px">
                               Title: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_title[1]"><?php if(isset($load)){echo set_value('project_add_title[1]', $pc1i[1]);}else{echo set_value('project_add_title[1]');} ?></textarea>
                           </td>
                                           
                           <td>
                               Name: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_name[1]"><?php if(isset($load)){echo set_value('project_add_name[1]', $pc1a[1]);}else{echo set_value('project_add_name[1]');} ?></textarea>
                           </td>
                                           
                           <td>
                               Current qualifications (please include all): <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_qualification[1]"><?php if(isset($load)){echo set_value('project_add_qualification[1]', $pc1b[1]);}else{echo set_value('project_add_qualification[1]');} ?></textarea>
                           </td>
                       </tr>
                       
                       <tr>
                           <td colspan="2">
                               Department: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_department[1]"><?php if(isset($load)){echo set_value('project_add_department[1]', $pc1c[1]);}else{echo set_value('project_add_department[1]');} ?></textarea>
                           </td>
                           
                           <td colspan="1">
                               Campus: <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_campus[1]"><?php if(isset($load)){echo set_value('project_add_campus[1]', $pc1d[1]);}else{echo set_value('project_add_campus[1]');} ?></textarea>
                           </td>
                       </tr>
                       
                       <tr>
                           <td colspan="3">Full postal address (including internal mail details): <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_postal_address[1]"><?php if(isset($load)){echo set_value('project_add_postal_address[1]', $pc1e[1]);}else{echo set_value('project_add_postal_address[1]');} ?></textarea>
                           </td>
                       </tr>
                       
                        <tr>
                            <td colspan="2">
                                <div class="form-group row">
                                    <label for="project_add_telephone[1]" class="col-sm-4">Phone:</label>
                                    <div class="col-sm-7">
                                        <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_telephone[1]" rows="1"><?php if(isset($load)){echo set_value('project_add_telephone[1]', $pc1f[1]);}else{echo set_value('project_add_telephone[1]');} ?></textarea>
                                    </div>
                                </div>
                            </td>
                            
                                           
                            <td>
                                <div class="form-group row">
                                    <label for="project_add_fax[1]" class="col-sm-4">Fax:</label>
                                    <div class="col-sm-7">
                                        <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_fax[1]" rows="1"><?php if(isset($load)){echo set_value('project_add_fax[1]', $pc1g[1]);}else{echo set_value('project_add_fax[1]');} ?></textarea>
                                    </div>
                                </div>
                            </td>
                                           
                       </tr>
                       
                       <tr>
                           <td colspan="3">Email (MUST be staff email address): <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_add_email_address[1]" rows="1"><?php if(isset($load)){echo set_value('project_add_email_address[1]', $pc1h[1]);}else{echo set_value('project_add_email_address[1]');} ?></textarea>
                           </td>
                       </tr>
                       
                   </table>
                   
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10px" class="reddata" id="section_4">4</th>
                               <th colspan="2">Type of Dealing (check the box that applies) - Schedule 3, Part 1, 1.1</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input <?php if(isset($disabled)){echo "disabled";} ?> type="checkbox" value="1" class="form-control" name="dealing_type_a" <?php echo set_checkbox('dealing_type_a', '1'); ?> <?php if(isset($load)){if($pc1->dealing_type_a==1){echo "checked=checked";}}else{} ?>>
                                   </div>
                               </td>
                               <td>
                                   (a)	A dealing involving a genetically modified laboratory guinea pig, a genetically modified <br>&nbsp;&nbsp;&nbsp; laboratory mouse, a genetically modified laboratory rabbit or a genetically modified laboratory<br>&nbsp;&nbsp;&nbsp; rat, unless:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (i) an advantage is conferred on the animal by the genetic modification; or<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (ii) the animal is capable of secreting or producing an infectious agent as a result of the genetic modification;


                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <div class="form-group">
                                       <input <?php if(isset($disabled)){echo "disabled";} ?> type="checkbox" value="1" class="form-control" name="dealing_type_c" <?php echo set_checkbox('dealing_type_c', '1'); ?> <?php if(isset($load)){if($pc1->dealing_type_c==1){echo "checked=checked";}}else{} ?>>
                                   </div>
                               </td>
                               <td>
                                   (c) A dealing involving a replication defective vector derived from <em>Human adenovirus</em> or <em>Adeno</em><br>&nbsp;&nbsp;&nbsp; <em>associated virus</em> in a host mentioned in item 4 of Part 2 of Schedule 2, if the donor nucleic acid:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   (i)	cannot restore replication competence to the vector; and <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   (ii) does not: <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   (A)	confer an oncogenic modification in humans; or <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   (B)	encode a protein with immunomodulatory activity in humans.

                               </td>
                           </tr>
                       </tbody>
                   </table>
                   
         <div id="pc1_section_5" class="sectiontarget">
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
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_summary" rows="6"><?php if(isset($load)){echo set_value('project_summary', $pc1->project_summary);}else{echo set_value('project_summary');} ?></textarea>
                                   </div>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                <span class="text-danger"><?php echo form_error('project_summary'); ?></span>
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
                                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="GMO_name"><?php if(isset($load)){echo set_value('GMO_name', $pc1->GMO_name);}else{echo set_value('GMO_name');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="GMO_method"><?php if(isset($load)){echo set_value('GMO_method', $pc1->GMO_method);}else{echo set_value('GMO_method');} ?></textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="GMO_origin"><?php if(isset($load)){echo set_value('GMO_origin', $pc1->GMO_origin);}else{echo set_value('GMO_origin');} ?></textarea>
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
                                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="modified_trait_class"><?php if(isset($load)){echo set_value('modified_trait_class', $pc1->modified_trait_class);}else{echo set_value('modified_trait_class');} ?>
                                                   </textarea>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="modified_trait_description"><?php if(isset($load)){echo set_value('modified_trait_description', $pc1->modified_trait_description);}else{echo set_value('modified_trait_description');} ?></textarea>
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
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> rows="15" class="form-control" name="project_hazard_staff" placeholder="250 words max"><?php if(isset($load)){echo set_value('project_hazard_staff', $pc1->project_hazard_staff);}else{echo set_value('project_hazard_staff');} ?></textarea>
                                   </div>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                <span class="text-danger"><?php echo form_error('project_hazard_staff'); ?></span>
                   
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
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> rows="15" class="form-control" name="project_hazard_environment" placeholder="250 words max"><?php if(isset($load)){echo set_value('project_hazard_environment', $pc1->project_hazard_environment);}else{echo set_value('project_hazard_environment');} ?></textarea>
                                   </div>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                <span class="text-danger"><?php echo form_error('project_hazard_environment'); ?></span>
                   
         <div id="pc1_section_10" class="sectiontarget">
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
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> rows="15" class="form-control" name="project_hazard_steps" placeholder="250 words max"><?php if(isset($load)){echo set_value('project_hazard_steps', $pc1->project_hazard_steps);}else{echo set_value('project_hazard_steps');} ?></textarea>
                                   </div>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                <span class="text-danger"><?php echo form_error('project_hazard_steps'); ?></span>
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
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> rows="15" class="form-control" name="project_transport" placeholder="250 words max"><?php if(isset($load)){echo set_value('project_transport', $pc1->project_transport);}else{echo set_value('project_transport');} ?></textarea>
                                   </div>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                <span class="text-danger"><?php echo form_error('project_transport'); ?></span>
                   
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
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> rows="15" class="form-control" name="project_disposal" placeholder="250 words max"><?php if(isset($load)){echo set_value('project_disposal', $pc1->project_disposal);}else{echo set_value('project_disposal');} ?></textarea>
                                   </div>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                <span class="text-danger"><?php echo form_error('project_disposal'); ?></span>
                   
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
                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> rows="15" class="form-control" name="project_SOP" placeholder="250 words max"><?php if(isset($load)){echo set_value('project_SOP', $pc1->project_SOP);}else{echo set_value('project_SOP');} ?></textarea>
                                   </div>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th width="10" class="reddata" id="pc1_section_14">14</th>
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
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_facilities_building_no" rows="1"><?php if(isset($load)){echo set_value('project_facilities_building_no', $pc1->project_facilities_building_no);}else{echo set_value('project_facilities_building_no');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                           <td>
                                               <div class="form-group row">
                                                   <label for="project_facilities_room_no" class="col-sm-4">Room number:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_facilities_room_no" rows="1"><?php if(isset($load)){echo set_value('project_facilities_room_no', $pc1->project_facilities_room_no);}else{echo set_value('project_facilities_room_no');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                
                                       </tr>
                                       <tr>
                                           <td>
                                               <div class="form-group row">
                                                   <label for="project_facilities_containment_level" class="col-sm-4">Containment Level:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_facilities_containment_level" rows="1"><?php if(isset($load)){echo set_value('project_facilities_containment_level', $pc1->project_facilities_containment_level);}else{echo set_value('project_facilities_containment_level');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                                           
                                           <td>
                                               <div class="form-group row">
                                                   <label for="project_facilities_containment_level" class="col-sm-4">Certification number:</label>
                                                   <div class="col-sm-7">
                                                       <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="project_facilities_certification_no" rows="1"><?php if(isset($load)){echo set_value('project_facilities_certification_no', $pc1->project_facilities_certification_no);}else{echo set_value('project_facilities_certification_no');} ?></textarea>
                                                   </div>
                                               </div>
                                           </td>
                    
                                       </tr>
                                   </table>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   
         <div id="pc1_section_15" class="sectiontarget">
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
                                               
                                               <label class="radio-inline"><input <?php if(isset($disabled)){echo "disabled";} ?> type="radio" value="yes" name="pc1_officer_notified" <?php if(isset($load)){if($pc1->pc1_officer_notified=='yes'){echo set_radio('pc1_officer_notified', 'yes', TRUE);}} ?>> Yes</label>
                                               
                                               <label class="radio-inline"><input <?php if(isset($disabled)){echo "disabled";} ?> type="radio" value="no" name="pc1_officer_notified" <?php echo set_radio('pc1_officer_notified', 'no', FALSE); ?> <?php if(isset($load)){if($pc1->pc1_officer_notified=='no'){echo set_radio('pc1_officer_notified', 'no', TRUE);}} ?>> No</label>
                                               

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
                                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="officer_name"><?php if(isset($load)){echo set_value('officer_name', $pc1->officer_name);}else{echo set_value('officer_name');} ?></textarea>
                                               </div>
                                           </td>
                                       </tr>
                                       
                                       <tr>
                                           <td>Name of Laboratory Manager</td>
                                           <td>
                                               <div class="form-group">
                                                   <textarea <?php if(isset($disabled)){echo "disabled";} ?> class="form-control" name="laboratory_manager"><?php if(isset($load)){echo set_value('laboratory_manager', $pc1->laboratory_manager);}else{echo set_value('laboratory_manager');} ?></textarea>
                                               </div>
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
                       <button type="submit" name = 'updateButton' value = 'Update' onclick="location.href='<?php echo site_url().'/pc1/update_form';?>'" class="btn btn-primary">Update</button>
                       <?php }else{ ?>
                       <button name="saveButton" type="submit" class="btn btn-primary col-md-2">Save</button>
                       <?php } ?>
                       
                   </div>
               
            </div>
            
            <div class="col-md-2">
                <div class="btn-group-vertical btn-sample">
                    <a href="#top" class="btn btn-success">Top</a>
                    <a href="#pc1_section_1" class="btn btn-success">Section 1</a> 
                    <a href="#pc1_section_5" class="btn btn-success">Section 2</a>
                    <a href="#pc1_section_10" class="btn btn-success">Section 3</a>
                    <a href="#pc1_section_15" class="btn btn-success">Section 4</a>
                    <?php if(isset($editload)){ ?>
                    <button type="submit" name = 'updateButton' value = 'Update' onclick="location.href='<?php echo site_url().'/pc1/update_form';?>'" class="btn btn-primary">Update</button>
                    <?php }else{ ?>
                    <button name="saveButton" type="submit" class="btn btn-primary">Save</button>
                    <?php } ?>
                </div>   
            </div>
        </div>
        
        
   
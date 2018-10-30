<?php
    
    
    if(isset($load)){
        foreach($retrieved2 as $item){
            
            $new1 = $item->project_team_name;
            $new2 = $item->project_team_address;
            $new3 = $item->project_team_telephone_number;
            $new4 = $item->project_team_email_address;
            $new5 = $item->project_team_qualification;
            $new6 = $item->project_team_designation;
            $new7 = $item->LMO_desc_name_parent;
            $new8 = $item->LMO_desc_name_donor;
            $new9 = $item->LMO_desc_method;
            $new10 = $item->LMO_desc_class;
            $new11 = $item->LMO_desc_trait;
            $new12 = $item->LMO_desc_genes_function;
            $new13 = $item->risk_assessment_genes_potential_hazard;
            $new14 = $item->risk_assessment_genes_comments;
            $new15 = $item->risk_assessment_genes_management;
            $new16 = $item->risk_assessment_genes_residual;
            $new17 = $item->risk_assessment_admin_potential_hazard;
            $new18 = $item->risk_assessment_admin_comments;
            $new19 = $item->risk_assessment_admin_management;
            $new20 = $item->risk_assessment_admin_residual;
            $new21 = $item->risk_assessment_containment_potential_hazard;
            $new22 = $item->risk_assessment_containment_comments;
            $new23 = $item->risk_assessment_containment_management;
            $new24 = $item->risk_assessment_containment_residual;
            $new25 = $item->risk_assessment_special_potential_hazard;
            $new26 = $item->risk_assessment_special_comments;
            $new27 = $item->risk_assessment_special_management;
            $new28 = $item->risk_assessment_special_residual;
            $new29 = $item->premise_name;
            $new30 = $item->premise_type;
            $new31 = $item->premise_BSL;
            $new32 = $item->premise_IBC;
            $new33 = $item->premise_IBC_date;
            $new34 = $item->premise_certification_date;
            $new35 = $item->premise_certification_no;
            $new36 = $item->premise_address;
            $new37 = $item->premise_officer_name;
            $new38 = $item->premise_telephone_business;
            $new39 = $item->premise_telephone_mobile;
            $new40 = $item->premise_fax;
            $new41 = $item->premise_email;
            
            $a = explode(",", $new1);
            $b = explode(",", $new2);
            $c = explode(",", $new3);
            $d = explode(",", $new4);
            $ee = explode(",", $new5);
            $f = explode(",", $new6);
            $g = explode(",", $new7);
            $h = explode(",", $new8);
            $ii = explode(",", $new9);
            $j = explode(",", $new10);
            $k = explode(",", $new11);
            $l = explode(",", $new12);
            $m = explode(",", $new13);
            $n = explode(",", $new14);
            $o = explode(",", $new15);
            $p = explode(",", $new16);
            $q = explode(",", $new17);
            $r = explode(",", $new18);
            $s = explode(",", $new19);
            $t = explode(",", $new20);
            $u = explode(",", $new21);
            $v = explode(",", $new22);
            $w = explode(",", $new23);
            $x = explode(",", $new24);
            $y = explode(",", $new25);
            $z = explode(",", $new26);
            $aa = explode(",", $new27);
            $ab = explode(",", $new28);
            $ac = explode(",", $new29);
            $ad = explode(",", $new30);
            $ae = explode(",", $new31);
            $af = explode(",", $new32);
            $ag = explode(",", $new33);
            $ah = explode(",", $new34);
            $ai = explode(",", $new35);
            $aj = explode(",", $new36);
            $ak = explode(",", $new37);
            $al = explode(",", $new38);
            $am = explode(",", $new39);
            $an = explode(",", $new40);
            $ao = explode(",", $new41);
        }
        
        
    }else{
           
        }
    
    ?>
        
            
            <div class="row">
                
                <div class="col-md-11">
                    
                    
                    
                    <div>
                        <br/>
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                    
                        <div>
                            <h5 class="centering"><strong>BIOSAFETY ACT 2007</strong></h5>
                             <br>
                            <h5 class="centering"><strong>BIOSAFETY REGULATIONS 2010</strong></h5>
                             <br>
                            <h5 class="centering"><strong>NBB/N/CU/15/FORM E</strong></h5>
                        </div>
                        
                         <br>
                        
                        <div>
                            <h8>NOTIFICATION FOR CONTAINED USE AND IMPORT FOR CONTAINED USE ACTIVITIES INVOLVING LIVING MODIFIED ORGANISM (LMO) FOR BIOSAFETY LEVELS 1, 2, 3 AND 4
                            </h8>
                        </div>
                         <br>
                        
                        
                        <div><p>Please refer to the Explanatory Notes of NBB/N/CU/15/FORM E before filling up this form</p></div>
                        
                        <div class="form-group">
                            <label class="control-label" for="forme_project_title"><h6><strong>PROJECT TITLE:</strong></h6></label>
                            <input type="text" class="form-control col-md-5" name="forme_project_title" value="<?php if(isset($load)){echo set_value('forme_project_title', $item->project_title);}else{echo set_value('forme_project_title');} ?>" >
                        </div>
                        
                        <br>
                        
                        <table class="table table-bordered">
                            <h8><strong>Notification Check List</strong></h8>
                            <tr>
                                <td>1. Form NBB/N/CU/15/FORM E is complete with the relevant signatures</td>
                                <td>
                                    <div class="checkbox">
                                      <label><input type="checkbox" value="1" name="checklist_form" <?php echo set_checkbox('checklist_form', '1'); ?> <?php if(isset($load)){if($item->checklist_form==1){echo "checked=checked";}}else{} ?> ></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2. Cover letter from applicant's institute provided</td>
                                <td>
                                    <div class="checkbox">
                                      <label><input type="checkbox" value="1" name="checklist_coverletter" <?php echo set_checkbox('checklist_coverletter', '1'); ?> <?php if(isset($load)){if($item->checklist_coverletter==1){echo "checked=checked";}}else{} ?> ></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3. Notification has been assessed and sent through the IBC (if relevant)</td>
                                <td>
                                    <div class="checkbox">
                                      <label><input type="checkbox" value="1" name="checklist_IBC" <?php echo set_checkbox('checklist_IBC', '1'); ?> <?php if(isset($load)){if($item->checklist_IBC==1){echo "checked=checked";}}else{} ?> ></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>4. IBC Assesment Report (hardcopy and softcopy) </td>
                                <td>
                                    <div class="checkbox">
                                      <label><input type="checkbox" value="1" name="checklist_IBC_report" <?php echo set_checkbox('checklist_IBC_report', '1'); ?> <?php if(isset($load)){if($item->checklist_IBC_report==1){echo "checked=checked";}}else{} ?> ></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>5. A copy of clearance documents from the relevant Government agencies (if required) </td>
                                <td>
                                    <div class="checkbox">
                                      <label><input type="checkbox" value="1" name="checklist_clearance" <?php echo set_checkbox('checklist_clearance', '1'); ?> <?php if(isset($load)){if($item->checklist_clearance==1){echo "checked=checked";}}else{} ?> ></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>6. Any information to be treated as confidential business information has been clearly marked "CBI" in the notification </td>
                                <td>
                                    <div class="checkbox">
                                      <label><input type="checkbox" value="1" name="checklist_CBI" <?php echo set_checkbox('checklist_CBI', '1'); ?> <?php if(isset($load)){if($item->checklist_CBI==1){echo "checked=checked";}}else{} ?> ></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>7. One(1) original and six(6) hardcopies of the completed notification are submitted. A soft copy of the submitted notification that does not contain any CBI. </td>
                                <td>
                                    <div class="checkbox">
                                      <label><input type="checkbox" value="1" name="checklist_CBI_submit" <?php echo set_checkbox('checklist_CBI_submit', '1'); ?> <?php if(isset($load)){if($item->checklist_CBI_submit==1){echo "checked=checked";}}else{} ?> ></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>8. All supporting documents/attachments required (e.g. SOPs, references) </td>
                                <td>
                                    <div class="checkbox">
                                      <label><input type="checkbox" value="1" name="checklist_support" <?php echo set_checkbox('checklist_support', '1'); ?> <?php if(isset($load)){if($item->checklist_support==1){echo "checked=checked";}}else{} ?> ></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>9. A copy of letter of authorization from R&D collaboration involving more than one premises (if any)</td>
                                <td>
                                    <div class="checkbox">
                                      <label><input type="checkbox" value="1" name="checklist_RnD" <?php echo set_checkbox('checklist_RnD', '1'); ?> <?php if(isset($load)){if($item->checklist_RnD==1){echo "checked=checked";}}else{} ?> ></label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <h8><strong>Note: Please retain a copy of your completed notification.</strong></h8>
                        
                        <br><br>
                        
                        <table class="table table-bordered">
                            <h8><strong>Preliminary information</strong></h8>
                            <tr>
                                <td>1.  Organization:</td>
                                <td><input type="text" class="form-control" name="organization" value="<?php if(isset($load)){echo set_value('organization', $item->organization);}else{echo set_value('organization');} ?>" ></td>
                            </tr>
                            <tr>
                                <td>2.  Name of Applicant(Principal Investigator):</td>
                                <td><input type="text" class="form-control" name="applicant_name_PI" value="<?php if(isset($load)){echo set_value('applicant_name_PI', $item->applicant_name_PI);}else{echo set_value('applicant_name_PI');} ?>" ></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td width="515">3. Position in Organization:</td>
                                            <td><input type="text" class="form-control" name="position" value="<?php if(isset($load)){echo set_value('position', $item->position);}else{echo set_value('position');} ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Telephone(office):</td>
                                            <td><input type="tel" class="form-control" name="telephone_office" value="<?php if(isset($load)){echo set_value('telephone_office', $item->telephone_office);}else{echo set_value('telephone_office');} ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Telephone(mobile):</td>
                                            <td><input type="tel" class="form-control" name="telephone_mobile" value="<?php if(isset($load)){echo set_value('telephone_mobile', $item->telephone_mobile);}else{echo set_value('telephone_mobile');} ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Fax number:</td>
                                            <td><input type="text" class="form-control" name="fax" value="<?php if(isset($load)){echo set_value('fax', $item->fax);}else{echo set_value('fax');} ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Email address:</td>
                                            <td><input type="email" class="form-control" name="email_address" value="<?php if(isset($load)){echo set_value('email_address', $item->email_address);}else{echo set_value('email_address');} ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Postal address:</td>
                                            <td><input type="text" class="form-control" name="postal_address" value="<?php if(isset($load)){echo set_value('postal_address', $item->postal_address);}else{echo set_value('postal_address');} ?>" ></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>Project Title:</td>
                                <td><input type="text" class="form-control" name="project_title2" value="<?php if(isset($load)){echo set_value('project_title2', $item->project_title2);}else{echo set_value('project_title2');} ?>" ></td>
                            </tr>
                            <tr>
                                <td>IBC Project Identification No.:</td>
                                <td><input type="text" class="form-control" name="IBC_project_identification_no" value="<?php if(isset($load)){echo set_value('IBC_project_identification_no', $item->IBC_project_identification_no);}else{echo set_value('IBC_project_identification_no');} ?>" ></td>
                            </tr>
                            <tr>
                                <td>Is this the first time the activity is being notified:</td>
                                <td><input type="text" class="form-control" name="notified_first" value="<?php if(isset($load)){echo set_value('notified_first', $item->notified_first);}else{echo set_value('notified_first');} ?>" ></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table class="table table-notified">
                                        <tr>
                                            <td width="505">                                   
                                                i)Please provide the NBB reference number of your previous notification.
                                               
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="NBB_reference" value="<?php if(isset($load)){echo set_value('NBB_reference', $item->NBB_reference);}else{echo set_value('NBB_reference');} ?>" >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                ii)How is this notification different from the previous notification submitted for this activity?(please provide an attachment if additional space is required)
                                            </td>
                                            <td>
                                                <textarea rows="5" class="form-control" name="NBB_difference"><?php if(isset($load)){echo set_value('NBB_difference', $item->NBB_difference);}else{echo set_value('NBB_difference');} ?></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        
                        <br>
                        
                        <table class="table table-bordered">
                            <h8><strong>Details of Importer</strong></h8>
                            <p>
                                <em>This section is relevant only if the LMO is importer. Importer refers to person or business bringing the LMO in behalf of the applicant</em>
                            </p>
                            
                            <tr>
                                <td>8. Organization:</td>
                                <td><input type="text" class="form-control" name="importer_organization" value="<?php if(isset($load)){echo set_value('importer_organization', $item->importer_organization);}else{echo set_value('importer_organization');} ?>"></td>
                            </tr>
                            <tr>
                                <td>9. Contact Person:</td>
                                <td><input type="text" class="form-control" name="importer_contact_person" value="<?php if(isset($load)){echo set_value('importer_contact_person', $item->importer_contact_person);}else{echo set_value('importer_contact_person');} ?>" ></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td width="310">10. Position in Organization:</td>
                                            <td><input type="text" class="form-control" name="importer_position" value="<?php if(isset($load)){echo set_value('importer_position', $item->importer_position);}else{echo set_value('importer_position');} ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Telephone(office):</td>
                                            <td><input type="tel" class="form-control" name="importer_telephone_office" value="<?php if(isset($load)){echo set_value('importer_telephone_office', $item->importer_telephone_office);}else{echo set_value('importer_telephone_office');} ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Telephone(mobile):</td>
                                            <td><input type="tel" class="form-control" name="importer_telephone_mobile" value="<?php if(isset($load)){echo set_value('importer_telephone_mobile', $item->importer_telephone_mobile);}else{echo set_value('importer_telephone_mobile');} ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Fax number:</td>
                                            <td><input type="text" class="form-control" name="importer_fax" value="<?php if(isset($load)){echo set_value('importer_fax', $item->importer_fax);}else{echo set_value('importer_fax');} ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Email address:</td>
                                            <td><input type="email" class="form-control" name="importer_email_address" value="<?php if(isset($load)){echo set_value('importer_email_address', $item->importer_email_address);}else{echo set_value('importer_email_address');} ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Postal address:</td>
                                            <td><input type="text" class="form-control" name="importer_postal_address" value="<?php if(isset($load)){echo set_value('importer_postal_address', $item->importer_postal_address);}else{echo set_value('importer_postal_address');} ?>" ></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <br>
                        
                        <h8><strong>Institutional Biosafety Commitee (IBC) Assesment for the contained use and import for containe use and import for contained use of LMO</strong></h8>
                        <p>
                            <em>This must be completed by the registered IBC of the applicants organization.<br>This section is not relevant to organizations not involved in biotechnology research and development.</em>
                        </p>
                        
                        <br>
                        
                        <table class="table table-bordered">
                            <h8><strong>IBC Details</strong></h8>
                            
                            <tr>
                                <td>1</td>
                                <td>Name of Organization:</td>
                                <td><input type="text" class="form-control" name="IBC_organization_name" value="<?php if(isset($load)){echo set_value('IBC_organization_name', $item->IBC_organization_name);}else{echo set_value('IBC_organization_name');} ?>" ></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td colspan="2">
                                    <table class="table table-bordered">
                                        
                                            <td>
                                                <tr>
                                                    <td>Name of IBC Chairperson:</td>
                                                    <td colspan="3"><input type="text" class="form-control" name="IBC_chairperson" value="<?php if(isset($load)){echo set_value('IBC_chairperson', $item->IBC_chairperson);}else{echo set_value('IBC_chairperson');} ?>" ></td>
                                                </tr>
                                                <tr>
                                                    <td>Telephone Number:</td>
                                                    <td><input type="tel" class="form-control" name="IBC_telephone_number" value="<?php if(isset($load)){echo set_value('IBC_telephone_number', $item->IBC_telephone_number);}else{echo set_value('IBC_telephone_number');} ?>" ></td>
                                                    <td>Fax:</td>
                                                    <td><input type="text" class="form-control" name="IBC_fax" value="<?php if(isset($load)){echo set_value('IBC_fax', $item->IBC_fax);}else{echo set_value('IBC_fax');} ?>" ></td>
                                                </tr>
                                                <tr>
                                                    <td>E-mail address:</td>
                                                    <td colspan="3"><input type="email" class="form-control" name="IBC_email_address" value="<?php if(isset($load)){echo set_value('IBC_email_address', $item->IBC_email_address);}else{echo set_value('IBC_email_address');} ?>" ></td>
                                                </tr>
                                            </td>
                                        
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Name of Principal Investigator:</td>
                                <td><input type="text" class="form-control" name="IBC_PI_name" value="<?php if(isset($load)){echo set_value('IBC_PI_name', $item->IBC_PI_name);}else{echo set_value('IBC_PI_name');} ?>"  ></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Project Title:</td>
                                <td><input type="text" class="form-control" name="IBC_project_title" value="<?php if(isset($load)){echo set_value('IBC_project_title', $item->IBC_project_title);}else{echo set_value('IBC_project_title');} ?>"  ></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Date of the IBC Assesment:</td>
                                <td>
                                    <input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="forme_IBC_date" value="<?php if(isset($load)){echo set_value('forme_IBC_date', $item->IBC_date);}else{echo set_value('forme_IBC_date');} ?>"  >
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>
                                    Does the IBC consider that the Principal Investigator and every other person authorized to be involved in the contained use of the LMO have adequate training and experience for this task?:</td>
                                <td>
                                    <label class="radio-inline"><input type="radio" value="1" name="IBC_adequate" <?php echo set_radio('IBC_adequate', '1', FALSE); ?> <?php if(isset($load)){if($item->IBC_adequate==1){echo "checked=checked";}}else{} ?> >Yes</label>
                                    
                                    <label class="radio-inline"><input type="radio" value="0" name="IBC_adequate" <?php echo set_radio('IBC_adequate', '0', FALSE); ?> <?php if(isset($load)){if($item->IBC_adequate==0){echo "checked=checked";}} ?> >No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td colspan="2">
                                    The following information to this project has been checked and approved.
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <ol type="a">
                                        <li>Description of project activities</li>
                                        <li>The description and genetics of the LMO</li>
                                    </ol>
                                </td>
                                <td>
                                    <label class="radio-inline"><input type="radio" value="1" name="IBC_checklist_activities" <?php echo set_radio('IBC_checklist_activities', '1', FALSE); ?> <?php if(isset($load)){if($item->IBC_checklist_activities==0){echo "checked=checked";}} ?> />Yes</label>
                                    
                                    <label class="radio-inline"><input type="radio" value="0" name="IBC_checklist_activities" <?php echo set_radio('IBC_checklist_activities', '0', FALSE); ?> <?php if(isset($load)){if($item->IBC_checklist_activities==0){echo "checked=checked";}} ?> >No</label>
                                    
                                    <br>
                                    
                                    <label class="radio-inline"><input type="radio" value="1" name="IBC_checklist_description" <?php echo set_radio('IBC_checklist_description', '1', FALSE); ?> <?php if(isset($load)){if($item->IBC_checklist_description==1){echo "checked=checked";}} ?> >Yes</label>
                                    
                                    <label class="radio-inline"><input type="radio" value="0" name="IBC_checklist_description" <?php echo set_radio('IBC_checklist_description', '0', FALSE); ?> <?php if(isset($load)){if($item->IBC_checklist_description==0){echo "checked=checked";}} ?> >No</label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <ol type="a" start="c">
                                        <li>The emergency response plan and the specific measures to be taken in relation to a contained use activity involving LMO</li><br>
                                        <li>All persons involved are appropriately trained:</li>
                                    </ol>
                                </td>
                                <td>
                                    <label class="radio-inline"><input type="radio" value="1" name="IBC_checklist_emergency_response"> <?php echo set_checkbox('IBC_checklist_emergency_response', '1', FALSE); ?> <?php if(isset($load)){if($item->IBC_checklist_emergency_response==1){echo "checked=checked";}}else{} ?> Yes</label>
                                    
                                    <label class="radio-inline"><input type="radio" value="0" name="IBC_checklist_emergency_response" <?php echo set_checkbox('IBC_checklist_emergency_response', '0', FALSE); ?> <?php if(isset($load)){if($item->IBC_checklist_emergency_response==0){echo "checked=checked";}}else{} ?> >No</label>
                                    
                                    <br><br><br>
                                    
                                    <label class="radio-inline"><input type="radio" value="1" name="IBC_checklist_trained" <?php echo set_checkbox('IBC_checklist_trained', '1', FALSE); ?> <?php if(isset($load)){if($item->IBC_checklist_trained==1){echo "checked=checked";}}else{} ?> >Yes</label>
                                    
                                    <label class="radio-inline"><input type="radio" value="0" name="IBC_checklist_trained" <?php echo set_checkbox('IBC_checklist_trained', '0', FALSE); ?> <?php if(isset($load)){if($item->IBC_checklist_trained==0){echo "checked=checked";}}else{} ?>>No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>
                                    Has the information provided in Form NBB/N/CU/15/FORM E been checked by the IBC and found to be complete?
                                </td>
                                <td>
                                    <label class="radio-inline"><input type="radio" value="1" name="IBC_form_approved" <?php echo set_checkbox('IBC_form_approved', '1'); ?> <?php if(isset($load)){if($item->IBC_form_approved==1){echo "checked=checked";}}else{} ?> >Yes</label>
                                    
                                    <label class="radio-inline"><input type="radio" value="0" name="IBC_form_approved" <?php echo set_checkbox('IBC_form_approved', '0'); ?> <?php if(isset($load)){if($item->IBC_form_approved==0){echo "checked=checked";}}else{} ?> >No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>
                                    Has the IBC assessed the biosafety of the proposed project?<br>
                                    <p>
                                        <em>The risks that the IBC is required to assess are:</em><br>
                                    </p>
                                    <ol type="a">
                                        <li>risks to the health and safety of human (occupational exposure) from the activities associated with genetic modification</li>
                                        <li>risks to the health and safety of human and animals from an unintentional release of the LMO; and</li>
                                        <li>risks to the environment form an unintentional release of the LMO</li>
                                    </ol>
                                    <br>
                                    
                                    <p>
                                        Please append a copy of the IBC's assessment report and indicate the attachments in which details are provided.
                                    </p>
                                    <p>A template of the IBC Assessment report (IBC/AP/15/ANNEX2) can be obtained at <a href="http://www.biosafety.nre.gov.my">http://www.biosafety.nre.gov.my</a></p>
                                </td>
                                <td>
                                    <label class="radio-inline"><input type="radio" value="1" name="IBC_biosafety_approved" <?php echo set_checkbox('IBC_biosafety_approved', '1'); ?> <?php if(isset($load)){if($item->IBC_biosafety_approved==1){echo "checked=checked";}}else{} ?> >Yes</label>
                                    
                                    <label class="radio-inline"><input type="radio" value="0" name="IBC_biosafety_approved" <?php echo set_checkbox('IBC_biosafety_approved', '0'); ?> <?php if(isset($load)){if($item->IBC_biosafety_approved==0){echo "checked=checked";}}else{} ?> >No</label>
                                </td>
                            </tr>
                        </table>
                        
                        <br><br>
                        
                        <div>
                            <h8><strong>Signatures and Statutory Declaration</strong></h8><br>
                            
                            <h8><strong><em>Please mark [X] in the chosen box</em></strong></h8>
                            
                            <div class="checkbox">
                              <label><input type="checkbox" value="1" name="signature_statutory_endorsed" <?php echo set_checkbox('signature_statutory_endorsed', '1'); ?> <?php if(isset($load)){if($item->signature_statutory_endorsed==1){echo "checked=checked";}}else{} ?> >The contained use of LMO in within this project has been assessed as above and endorsed by the IBC.</label>
                            </div>
                            <div class="checkbox">
                              <label>
                                  <input type="checkbox" value="1" name="signature_statutory_applicant_free" <?php echo set_checkbox('signature_statutory_applicant_free', '1'); ?> <?php if(isset($load)){if($item->signature_statutory_applicant_free==1){echo "checked=checked";}}else{} ?> >Applicant is not involved in modern biotechnology research and development
                                </label>
                            </div>
                            
                            <div>
                                <p>We declare that all information and documents herein are true and correct. We understand that providing misleading information to the NBB, deliberately or otherwise, is an offence under the Biosafety act 2007.</p>
                            </div>
                            
                            <h8><strong>Applicant/Principal Investigator:</strong></h8>
                            
                            <br>
                            <div>
                                <table class="table">
                                    <tr>
                                        <td>Signature:</td>
                                        <td><input type="text" class="form-control"></td>
                                        
                                        <td>Date:</td>
                                        <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="applicant_PI_signature_date" value="<?php if(isset($load)){echo set_value('applicant_PI_signature_date', $item->applicant_PI_signature_date);}else{echo set_value('applicant_PI_signature_date');} ?>"></td>
                                    </tr>
                                </table>
                            </div>
                            
                            <div>
                                <table class="table">
                                    <tr>
                                        <td>Name as in Identity Card/Passport:</td>
                                        <td><input type="text" class="form-control" name="applicant_PI_signature_name" value="<?php if(isset($load)){echo set_value('applicant_PI_signature_name', $item->applicant_PI_signature_name);}else{echo set_value('applicant_PI_signature_name');} ?>" ></td>
                                    </tr>
                                </table>
                            </div>
                            
                            <div>
                                Official Stamp:
                                <textarea rows="5" class="form-control" name="applicant_PI_signature_stamp"><?php if(isset($load)){echo set_value('applicant_PI_signature_stamp', $item->applicant_PI_signature_stamp);}else{echo set_value('applicant_PI_signature_stamp');} ?></textarea>
                            </div>
                            
                            <br>
                            
                            <div>
                                <h8><strong>IBC Chairperson:</strong></h8>
                                <p><em>This section is not relevant to organizations not involved in modern biotechnology research and development</em></p>
                            </div>
                            
                            <div>
                                <table class="table">
                                    <tr>
                                        <td>Signature:</td>
                                        <td><input type="text" class="form-control"></td>
                                        
                                        <td>Date:</td>
                                        <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="IBC_chairperson_signature_date" value="<?php if(isset($load)){echo set_value('IBC_chairperson_signature_date', $item->IBC_chairperson_signature_date);}else{echo set_value('IBC_chairperson_signature_date');} ?>" ></td>
                                    </tr>
                                </table>
                            </div>
                            
                            <div>
                                <table class="table">
                                    <tr>
                                        <td>Name as in Identity Card/Passport:</td>
                                        <td><input type="text" class="form-control" name="IBC_chairperson_signature_name" value="<?php if(isset($load)){echo set_value('IBC_chairperson_signature_name', $item->IBC_chairperson_signature_name);}else{echo set_value('IBC_chairperson_signature_name');} ?>" ></td>
                                    </tr>
                                </table>
                            </div>
                            
                            <div>
                                Official Stamp:
                                <textarea rows="5" class="form-control" name="IBC_chairperson_signature_stamp"><?php if(isset($load)){echo set_value('IBC_chairperson_signature_stamp', $item->IBC_chairperson_signature_stamp);}else{echo set_value('IBC_chairperson_signature_stamp');} ?></textarea>
                            </div>
                            
                            <br>
                            
                            <div>
                                <h8><strong>Head of Organization/Authourize representative:</strong></h8>
                            </div>
                            
                            <div>
                                <table class="table">
                                    <tr>
                                        <td>Signature:</td>
                                        <td><input type="text" class="form-control"></td>
                                        
                                        <td>Date:</td>
                                        <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="organization_representative_signature_date" value="<?php if(isset($load)){echo set_value('organization_representative_signature_date', $item->organization_representative_signature_date);}else{echo set_value('organization_representative_signature_date');} ?>"></td>
                                    </tr>
                                </table>
                            </div>
                            
                            <div>
                                <table class="table">
                                    <tr>
                                        <td>Name as in Identity Card/Passport:</td>
                                        <td><input type="text" class="form-control" name="organization_representative_signature_name" value="<?php if(isset($load)){echo set_value('organization_representative_signature_name', $item->organization_representative_signature_name);}else{echo set_value('organization_representative_signature_name');} ?>" ></td>
                                    </tr>
                                </table>
                            </div>
                            
                            <div>
                                Official Stamp:
                                <textarea rows="5" class="form-control" name="organization_representative_signature_stamp"><?php if(isset($load)){echo set_value('organization_representative_signature_stamp', $item->organization_representative_signature_stamp);}else{echo set_value('organization_representative_signature_stamp');} ?></textarea>
                            </div>
                            
                        </div>
                        
                        <br><br><br>
                        
                        <div id="part_a">
                            <h8><strong>Part A: General Information</strong></h8>
                            
                            <ol type="1">
                                <li>
                                    Project team member's details.<br><br>
                                    Information required is only for key persons involved in the project. IBC should have a record for <strong>ALL</strong> persons involved in the project.
                                </li>
                            </ol>
                            
                            <table class="table table-bordered">
                                <h8><strong>Table 1: Description of team members' details</strong></h8>
                                <thead>
                                    <tr>
                                        <th class="tbheader1">Name</th>
                                        <th class="tbheader1">Address, Contact Number & Email</th>
                                        <th class="tbheader1">Qualifications/Experience</th>
                                        <th class="tbheader1">Designation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" name="project_team_name[0]" value="<?php if(isset($load)){echo set_value('project_team_name[0]', $a[0]);}else{echo set_value('project_team_name[0]');} ?>" ></td>
                                        <td>
                                            <textarea rows="5" class="form-control" name="project_team_address[0]" placeholder="address"><?php if(isset($load)){echo set_value('project_team_address[0]', $b[0]);}else{echo set_value('project_team_address[0]');} ?></textarea><br>
                                            
                                            <input type="tel" class="form-control" name="project_team_telephone_number[0]" placeholder="contact no" value="<?php if(isset($load)){echo set_value('project_team_telephone_number[0]', $c[0]);}else{echo set_value('project_team_telephone_number[0]');} ?>" ><br>
                                            
                                            <input type="email" class="form-control" name="project_team_email_address[0]" placeholder="email" value="<?php if(isset($load)){echo set_value('project_team_email_address[0]', $d[0]);}else{echo set_value('project_team_email_address[0]');} ?>" >
                                        </td>
                                        <td><input type="text" class="form-control" name="project_team_qualification[0]" value="<?php if(isset($load)){echo set_value('project_team_qualification[0]', $ee[0]);}else{echo set_value('project_team_qualification[0]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="project_team_designation[0]" value="<?php if(isset($load)){echo set_value('project_team_designation[0]', $f[0]);}else{echo set_value('project_team_designation[0]');} ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" name="project_team_name[1]" value="<?php if(isset($load)){echo set_value('project_team_name[1]', $a[1]);}else{echo set_value('project_team_name[1]');} ?>" ></td>
                                        <td>
                                            <textarea rows="5" class="form-control" name="project_team_address[1]" placeholder="address"><?php if(isset($load)){echo set_value('project_team_address[1]', $b[1]);}else{echo set_value('project_team_address[1]');} ?></textarea><br>
                                            
                                            <input type="tel" class="form-control" name="project_team_telephone_number[1]" placeholder="contact no" value="<?php if(isset($load)){echo set_value('project_team_telephone_number[1]', $c[1]);}else{echo set_value('project_team_telephone_number[1]');} ?>" ><br>
                                            
                                            <input type="email" class="form-control" name="project_team_email_address[1]" placeholder="email" value="<?php if(isset($load)){echo set_value('project_team_email_address[1]', $d[1]);}else{echo set_value('project_team_email_address[1]');} ?>" >
                                        </td>
                                        <td><input type="text" class="form-control" name="project_team_qualification[1]" value="<?php if(isset($load)){echo set_value('project_team_qualification[1]', $ee[1]);}else{echo set_value('project_team_qualification[1]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="project_team_designation[1]" value="<?php if(isset($load)){echo set_value('project_team_designation[1]', $f[1]);}else{echo set_value('project_team_designation[1]');} ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" name="project_team_name[2]" value="<?php if(isset($load)){echo set_value('project_team_name[2]', $a[2]);}else{echo set_value('project_team_name[2]');} ?>" ></td>
                                        <td>
                                            <textarea rows="5" class="form-control" name="project_team_address[2]" placeholder="address"><?php if(isset($load)){echo set_value('project_team_address[2]', $b[2]);}else{echo set_value('project_team_address[2]');} ?></textarea><br>
                                            
                                            <input type="tel" class="form-control" name="project_team_telephone_number[2]" placeholder="contact no" value="<?php if(isset($load)){echo set_value('project_team_telephone_number[2]', $c[2]);}else{echo set_value('project_team_telephone_number[2]');} ?>" ><br>
                                            
                                            <input type="email" class="form-control" name="project_team_email_address[2]" placeholder="email" value="<?php if(isset($load)){echo set_value('project_team_email_address[2]', $d[2]);}else{echo set_value('project_team_email_address[2]');} ?>" >
                                        </td>
                                        <td><input type="text" class="form-control" name="project_team_qualification[2]" value="<?php if(isset($load)){echo set_value('project_team_qualification[2]', $ee[2]);}else{echo set_value('project_team_qualification[2]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="project_team_designation[2]" value="<?php if(isset($load)){echo set_value('project_team_designation[2]', $f[2]);}else{echo set_value('project_team_designation[2]');} ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" name="project_team_name[3]" value="<?php if(isset($load)){echo set_value('project_team_name[3]', $a[3]);}else{echo set_value('project_team_name[3]');} ?>" ></td>
                                        <td>
                                            <textarea rows="5" class="form-control" name="project_team_address[3]" placeholder="address"><?php if(isset($load)){echo set_value('project_team_address[3]', $b[3]);}else{echo set_value('project_team_address[3]');} ?></textarea><br>
                                            
                                            <input type="tel" class="form-control" name="project_team_telephone_number[3]" placeholder="contact no" value="<?php if(isset($load)){echo set_value('project_team_telephone_number[3]', $c[3]);}else{echo set_value('project_team_telephone_number[3]');} ?>" ><br>
                                            
                                            <input type="email" class="form-control" name="project_team_email_address[3]" placeholder="email" value="<?php if(isset($load)){echo set_value('project_team_email_address[3]', $d[3]);}else{echo set_value('project_team_email_address[3]');} ?>" >
                                        </td>
                                        <td><input type="text" class="form-control" name="project_team_qualification[3]" value="<?php if(isset($load)){echo set_value('project_team_qualification[3]', $ee[3]);}else{echo set_value('project_team_qualification[3]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="project_team_designation[3]" value="<?php if(isset($load)){echo set_value('project_team_designation[3]', $f[3]);}else{echo set_value('project_team_designation[3]');} ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" name="project_team_name[4]" value="<?php if(isset($load)){echo set_value('project_team_name[4]', $a[4]);}else{echo set_value('project_team_name[4]');} ?>" ></td>
                                        <td>
                                            <textarea rows="5" class="form-control" name="project_team_address[4]" placeholder="address"><?php if(isset($load)){echo set_value('project_team_address[4]', $b[4]);}else{echo set_value('project_team_address[4]');} ?></textarea><br>
                                            
                                            <input type="tel" class="form-control" name="project_team_telephone_number[4]" placeholder="contact no" value="<?php if(isset($load)){echo set_value('project_team_telephone_number[4]', $c[4]);}else{echo set_value('project_team_telephone_number[4]');} ?>" ><br>
                                            
                                            <input type="email" class="form-control" name="project_team_email_address[4]" placeholder="email" value="<?php if(isset($load)){echo set_value('project_team_email_address[4]', $d[4]);}else{echo set_value('project_team_email_address[4]');} ?>" >
                                        </td>
                                        <td><input type="text" class="form-control" name="project_team_qualification[4]" value="<?php if(isset($load)){echo set_value('project_team_qualification[4]', $ee[4]);}else{echo set_value('project_team_qualification[4]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="project_team_designation[4]" value="<?php if(isset($load)){echo set_value('project_team_designation[4]', $f[4]);}else{echo set_value('project_team_designation[4]');} ?>"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br>
                        </div>
                        
                        <div id="part_b">
                             <h8><strong>Part B: Project Introduction</strong></h8>
                            
                            <p>In this Part, the applicant is required to describe the proposed activities with the LMO within the context of the project.</p>
                            
                            <ol type="1" start="2">
                                <li>
                                    General Objective:<input type="text" class="form-control" name="project_intro_objective" value="<?php if(isset($load)){echo set_value('project_intro_objective', $item->project_intro_objective);}else{echo set_value('project_intro_objective');} ?>" ><br>
                                    
                                    Specific Objective(s): <strong>(if any)</strong><input type="text" class="form-control" name="project_intro_specifics" value="<?php if(isset($load)){echo set_value('project_intro_specifics', $item->project_intro_specifics);}else{echo set_value('project_intro_specifics');} ?>" ><br>
                                </li>
                                <li>
                                    Description of project activities (please provide flowchart of the activities and the premises where each activity is conducted):
                                    <input type="file" class="form-control" name="project_intro_activities"><br>
                                </li>
                                <li>
                                    Biosafety Level (BSL) of the proposed activity:<br>
                                    (the biosafety containment level is determined by the risk assessment of the activity)<br>
                                     <label class="radio-inline"><input type="radio" value="1" name="project_intro_BSL" <?php echo set_radio('project_intro_BSL', '1'); ?> <?php if(isset($load)){if($item->project_intro_BSL==1){echo "checked=checked";}}else{} ?> >BSL 1</label>
                                    
                                     <label class="radio-inline"><input type="radio" value="2" name="project_intro_BSL" <?php echo set_radio('project_intro_BSL', '2'); ?> <?php if(isset($load)){if($item->project_intro_BSL==2){echo "checked=checked";}}else{} ?>>BSL 2</label>
                                    
                                     <label class="radio-inline"><input type="radio" value="3" name="project_intro_BSL" <?php echo set_radio('project_intro_BSL', '3'); ?> <?php if(isset($load)){if($item->project_intro_BSL==3){echo "checked=checked";}}else{} ?>>BSL 3</label> 
                                    
                                     <label class="radio-inline"><input type="radio" value="4" name="project_intro_BSL" <?php echo set_radio('project_intro_BSL', '4'); ?> <?php if(isset($load)){if($item->project_intro_BSL==4){echo "checked=checked";}}else{} ?>>BSL 4</label> 
                                </li>
                                <li>
                                    Estimated duration of activity(please provide Gantt Chart):
                                    <input type="file" class="form-control" name="project_intro_duration"><br>
                                </li>
                                <li>
                                    Intended Date of Commencement:
                                    <input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="project_intro_intended_date_commencement" value="<?php if(isset($load)){echo set_value('project_intro_intended_date_commencement', $item->project_intro_intended_date_commencement);}else{echo set_value('project_intro_intended_date_commencement');} ?>" >
                                </li>
                                <li>
                                    Expected Date of Completion:
                                    <input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="project_intro_expected_date_completion" value="<?php if(isset($load)){echo set_value('project_intro_expected_date_completion', $item->project_intro_expected_date_completion);}else{echo set_value('project_intro_expected_date_completion');} ?>">
                                </li>
                                <li>
                                    Date of importation or intended importation (for an imported LMO)
                                    <input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="project_intro_importation_date" value="<?php if(isset($load)){echo set_value('project_intro_importation_date', $item->project_intro_importation_date);}else{echo set_value('project_intro_importation_date');} ?>" >
                                </li>
                                <li>
                                    If the experiments are succesful, are there plans for field experiment?<br>
                                    <label class="radio-inline"><input type="radio" value="1" name="project_intro_field_experiment" <?php echo set_radio('project_intro_field_experiment', '1'); ?> <?php if(isset($load)){if($item->project_intro_field_experiment==1){echo "checked=checked";}}else{} ?> >Yes</label>
                                    
                                    <label class="radio-inline"><input type="radio" value="0" name="project_intro_field_experiment" <?php echo set_radio('project_intro_field_experiment', '0'); ?> <?php if(isset($load)){if($item->project_intro_field_experiment==0){echo "checked=checked";}}else{} ?> >No</label>
                                </li>
                            </ol>
                        </div>
                        
                        <div id="part_c">
                            <h8><strong>Part C: Description of the LMO</strong></h8>
                            
                            <p>
                                Please refer to the explanatory notes on Part C before filling in the specific information in a tabulated form as shown below
                            </p>
                            
                            <table class="table table-bordered">
                                <h8><strong>Table 2: Description of the LMO for contained use activities</strong></h8>
                                <thead>
                                    <tr>
                                        <th>LMO</th>
                                        <th>Common and scientific name(s) of parent organism (recipient)</th>
                                        <th>Common and scientific  name(s) of donor organism</th>
                                        <th>Vector(s) and method of genetic modification</th>
                                        <th>Class of modified trait (Refer to Box 1 of the Explanatory Notes)</th>
                                        <th>Modified trait</th>
                                        <th>Number of genes involved (Please provide the gene construct(s) map)</th>
                                        <th>Identity and function of the gene(s) involved</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><input type="text" class="form-control" name="LMO_desc_name_parent[0]" value="<?php if(isset($load)){echo set_value('LMO_desc_name_parent[0]', $g[0]);}else{echo set_value('LMO_desc_name_parent[0]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="LMO_desc_name_donor[0]" value="<?php if(isset($load)){echo set_value('LMO_desc_name_donor[0]', $h[0]);}else{echo set_value('LMO_desc_name_donor[0]');} ?>"></td>
                                        
                                        <td><input type="text" class="form-control" name="LMO_desc_method[0]" value="<?php if(isset($load)){echo set_value('LMO_desc_method[0]', $ii[0]);}else{echo set_value('LMO_desc_method[0]');} ?>"></td>
                                        
                                        <td><input type="text" class="form-control" name="LMO_desc_class[0]" value="<?php if(isset($load)){echo set_value('LMO_desc_class[0]', $j[0]);}else{echo set_value('LMO_desc_class[0]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="LMO_desc_trait[0]" value="<?php if(isset($load)){echo set_value('LMO_desc_trait[0]', $k[0]);}else{echo set_value('LMO_desc_trait[0]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="premise_certification_report[0]" value="<?php if(isset($load)){echo set_value('premise_certification_report[0]', $item->premise_certification_report);}else{echo set_value('premise_certification_report[0]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="LMO_desc_genes_function[0]" value="<?php if(isset($load)){echo set_value('LMO_desc_genes_function[0]', $l[0]);}else{echo set_value('LMO_desc_genes_function[0]');} ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><input type="text" class="form-control" name="LMO_desc_name_parent[1]" value="<?php if(isset($load)){echo set_value('LMO_desc_name_parent[1]', $g[1]);}else{echo set_value('LMO_desc_name_parent[1]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="LMO_desc_name_donor[1]" value="<?php if(isset($load)){echo set_value('LMO_desc_name_donor[1]', $h[1]);}else{echo set_value('LMO_desc_name_donor[1]');} ?>"></td>
                                        
                                        <td><input type="text" class="form-control" name="LMO_desc_method[1]" value="<?php if(isset($load)){echo set_value('LMO_desc_method[1]', $ii[1]);}else{echo set_value('LMO_desc_method[1]');} ?>"></td>
                                        
                                        <td><input type="text" class="form-control" name="LMO_desc_class[1]" value="<?php if(isset($load)){echo set_value('LMO_desc_class[1]', $j[1]);}else{echo set_value('LMO_desc_class[1]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="LMO_desc_trait[1]" value="<?php if(isset($load)){echo set_value('LMO_desc_trait[1]', $k[1]);}else{echo set_value('LMO_desc_trait[1]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="premise_certification_report[1]" value="<?php if(isset($load)){echo set_value('premise_certification_report[1]', $item->premise_certification_report);}else{echo set_value('premise_certification_report[1]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="LMO_desc_genes_function[1]" value="<?php if(isset($load)){echo set_value('LMO_desc_genes_function[1]', $l[1]);}else{echo set_value('LMO_desc_genes_function[1]');} ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><input type="text" class="form-control" name="LMO_desc_name_parent[2]" value="<?php if(isset($load)){echo set_value('LMO_desc_name_parent[2]', $g[2]);}else{echo set_value('LMO_desc_name_parent[2]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="LMO_desc_name_donor[2]" value="<?php if(isset($load)){echo set_value('LMO_desc_name_donor[2]', $h[2]);}else{echo set_value('LMO_desc_name_donor[2]');} ?>"></td>
                                        
                                        <td><input type="text" class="form-control" name="LMO_desc_method[2]" value="<?php if(isset($load)){echo set_value('LMO_desc_method[2]', $ii[2]);}else{echo set_value('LMO_desc_method[2]');} ?>"></td>
                                        
                                        <td><input type="text" class="form-control" name="LMO_desc_class[2]" value="<?php if(isset($load)){echo set_value('LMO_desc_class[2]', $j[2]);}else{echo set_value('LMO_desc_class[2]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="LMO_desc_trait[2]" value="<?php if(isset($load)){echo set_value('LMO_desc_trait[2]', $k[2]);}else{echo set_value('LMO_desc_trait[2]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="premise_certification_report[2]" value="<?php if(isset($load)){echo set_value('premise_certification_report[2]', $item->premise_certification_report);}else{echo set_value('premise_certification_report[2]');} ?>" ></td>
                                        
                                        <td><input type="text" class="form-control" name="LMO_desc_genes_function[2]" value="<?php if(isset($load)){echo set_value('LMO_desc_genes_function[2]', $l[2]);}else{echo set_value('LMO_desc_genes_function[2]');} ?>"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <br>
                        
                        <div id="part_d">
                            <h8><strong>Part D: Risk assessment and management</strong></h8><br>
                            
                            <h8><strong>D1 Risk Assessment (Basic information)</strong></h8>
                            <ol type="1" start="10">
                                <li>
                                    10.	What are the possible hazard(s) and the likelihood and consequence of the hazard(s) occurring (i.e. the risk) from the proposed genetic modification(s) including unintentional release to the health and safety of human and animals and the environment? You are required to fill in the matrix below. Please refer to Chapter 4 of <a href="www.biosafety.nre.gov.my/guideline.shtml">Biosafety Guidelines: Contained use activity of Living Modified Organism</a>(www.biosafety.nre.gov.my/guideline.shtml)
                                </li>
                            </ol>
                            
                            <table class="table table-bordered">
                                <h8 class="centering"><strong>Risk assessment matrix</strong></h8>
                                <thead>
                                    <th class="tbheader2">Hazard from</th>
                                    <th class="tbheader2">Identification of Potential Hazard</th>
                                    <th class="tbheader2">Comments on Risk</th>
                                    <th class="tbheader2">Risk Management by Applicant</th>
                                    <th class="tbheader2">Residual Risk</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="bluerow">Science of Genetic modification </td>
                                        <td>
                                            <input type="text" class="form-control" name="risk_assessment_genes_potential_hazard[0]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_genes_potential_hazard[0]', $m[0]);}else{echo set_value('risk_assessment_genes_potential_hazard[0]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_genes_potential_hazard[1]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_genes_potential_hazard[1]', $m[1]);}else{echo set_value('risk_assessment_genes_potential_hazard[1]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_genes_potential_hazard[2]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_genes_potential_hazard[2]', $m[2]);}else{echo set_value('risk_assessment_genes_potential_hazard[2]');} ?>" >
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="risk_assessment_genes_comments[0]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_genes_comments[0]', $n[0]);}else{echo set_value('risk_assessment_genes_comments[0]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_genes_comments[1]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_genes_comments[1]', $n[1]);}else{echo set_value('risk_assessment_genes_comments[1]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_genes_comments[2]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_genes_comments[2]', $n[2]);}else{echo set_value('risk_assessment_genes_comments[2]');} ?>" >
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="risk_assessment_genes_management[0]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_genes_management[0]', $o[0]);}else{echo set_value('risk_assessment_genes_management[0]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_genes_management[1]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_genes_management[1]', $o[1]);}else{echo set_value('risk_assessment_genes_management[1]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_genes_management[2]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_genes_management[2]', $o[2]);}else{echo set_value('risk_assessment_genes_management[2]');} ?>" >
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="risk_assessment_genes_residual[0]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_genes_residual[0]', $p[0]);}else{echo set_value('risk_assessment_genes_residual[0]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_genes_residual[1]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_genes_residual[1]', $p[1]);}else{echo set_value('risk_assessment_genes_residual[1]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_genes_residual[2]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_genes_residual[2]', $p[2]);}else{echo set_value('risk_assessment_genes_residual[2]');} ?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bluerow">Admin. Policy, People and Practice </td>
                                        <td>
                                            <input type="text" class="form-control" name="risk_assessment_admin_potential_hazard[0]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_admin_potential_hazard[0]', $q[0]);}else{echo set_value('risk_assessment_admin_potential_hazard[0]');} ?>">
                                            
                                            <input type="text" class="form-control" name="risk_assessment_admin_potential_hazard[1]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_admin_potential_hazard[1]', $q[1]);}else{echo set_value('risk_assessment_admin_potential_hazard[1]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_admin_potential_hazard[2]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_admin_potential_hazard[2]', $q[2]);}else{echo set_value('risk_assessment_admin_potential_hazard[2]');} ?>" >
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="risk_assessment_admin_comments[0]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_admin_comments[0]', $r[0]);}else{echo set_value('risk_assessment_admin_comments[0]');} ?>">
                                            
                                            <input type="text" class="form-control" name="risk_assessment_admin_comments[1]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_admin_comments[1]', $r[1]);}else{echo set_value('risk_assessment_admin_comments[1]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_admin_comments[2]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_admin_comments[2]', $r[2]);}else{echo set_value('risk_assessment_admin_comments[2]');} ?>" >
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="risk_assessment_admin_management[0]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_admin_management[0]', $s[0]);}else{echo set_value('risk_assessment_admin_management[0]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_admin_management[1]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_admin_management[1]', $s[1]);}else{echo set_value('risk_assessment_admin_management[1]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_admin_management[2]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_admin_management[2]', $s[2]);}else{echo set_value('risk_assessment_admin_management[2]');} ?>" >
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="risk_assessment_admin_residual[0]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_admin_residual[0]', $t[0]);}else{echo set_value('risk_assessment_admin_residual[0]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_admin_residual[1]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_admin_residual[1]', $t[1]);}else{echo set_value('risk_assessment_admin_residual[1]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_admin_residual[2]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_admin_residual[2]', $t[2]);}else{echo set_value('risk_assessment_admin_residual[2]');} ?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bluerow">Containment integrity</td>
                                        <td>
                                            <input type="text" class="form-control" name="risk_assessment_containment_potential_hazard[0]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_containment_potential_hazard[0]', $u[0]);}else{echo set_value('risk_assessment_containment_potential_hazard[0]');} ?>">
                                            
                                            <input type="text" class="form-control" name="risk_assessment_containment_potential_hazard[1]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_containment_potential_hazard[1]', $u[1]);}else{echo set_value('risk_assessment_containment_potential_hazard[1]');} ?>">
                                            
                                            <input type="text" class="form-control" name="risk_assessment_containment_potential_hazard[2]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_containment_potential_hazard[2]', $u[2]);}else{echo set_value('risk_assessment_containment_potential_hazard[2]');} ?>" >
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="risk_assessment_containment_comments[0]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_containment_comments[0]', $v[0]);}else{echo set_value('risk_assessment_containment_comments[0]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_containment_comments[1]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_containment_comments[1]', $v[1]);}else{echo set_value('risk_assessment_containment_comments[1]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_containment_comments[2]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_containment_comments[2]', $v[2]);}else{echo set_value('risk_assessment_containment_comments[2]');} ?>" >
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="risk_assessment_containment_management[0]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_containment_management[0]', $w[0]);}else{echo set_value('risk_assessment_containment_management[0]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_containment_management[1]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_containment_management[1]', $w[1]);}else{echo set_value('risk_assessment_containment_management[1]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_containment_management[2]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_containment_management[2]', $w[2]);}else{echo set_value('risk_assessment_containment_management[2]');} ?>" >
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="risk_assessment_containment_residual[0]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_containment_residual[0]', $x[0]);}else{echo set_value('risk_assessment_containment_residual[0]');} ?>">
                                            
                                            <input type="text" class="form-control" name="risk_assessment_containment_residual[1]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_containment_residual[1]', $x[1]);}else{echo set_value('risk_assessment_containment_residual[1]');} ?>">
                                            
                                            <input type="text" class="form-control" name="risk_assessment_containment_residual[2]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_containment_residual[2]', $x[2]);}else{echo set_value('risk_assessment_containment_residual[2]');} ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bluerow">Special risks unique to notification</td>
                                        <td>
                                            <input type="text" class="form-control" name="risk_assessment_special_potential_hazard[0]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_special_potential_hazard[0]', $y[0]);}else{echo set_value('risk_assessment_special_potential_hazard[0]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_special_potential_hazard[1]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_special_potential_hazard[1]', $y[1]);}else{echo set_value('risk_assessment_special_potential_hazard[1]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_special_potential_hazard[2]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_special_potential_hazard[2]', $y[2]);}else{echo set_value('risk_assessment_special_potential_hazard[2]');} ?>" >
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="risk_assessment_special_comments[0]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_special_comments[0]', $z[0]);}else{echo set_value('risk_assessment_special_comments[0]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_special_comments[1]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_special_comments[1]', $z[1]);}else{echo set_value('risk_assessment_special_comments[1]');} ?>">
                                            
                                            <input type="text" class="form-control" name="risk_assessment_special_comments[2]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_special_comments[2]', $z[2]);}else{echo set_value('risk_assessment_special_comments[2]');} ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="risk_assessment_special_management[0]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_special_management[0]', $aa[0]);}else{echo set_value('risk_assessment_special_management[0]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_special_management[1]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_special_management[1]', $aa[1]);}else{echo set_value('risk_assessment_special_management[1]');} ?>">
                                            
                                            <input type="text" class="form-control" name="risk_assessment_special_management[2]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_special_management[2]', $aa[2]);}else{echo set_value('risk_assessment_special_management[2]');} ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="risk_assessment_special_residual[0]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_special_residual[0]', $ab[0]);}else{echo set_value('risk_assessment_special_residual[0]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_special_residual[1]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_special_residual[1]', $ab[1]);}else{echo set_value('risk_assessment_special_residual[1]');} ?>" >
                                            
                                            <input type="text" class="form-control" name="risk_assessment_special_residual[2]" placeholder="click to enter text" value="<?php if(isset($load)){echo set_value('risk_assessment_special_residual[2]', $ab[2]);}else{echo set_value('risk_assessment_special_residual[2]');} ?>" >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br>
                            
                            <h8><strong>D2 Risk Management</strong></h8><br><br>
                            
                            <ol type="1" start="11">
                                <li>
                                    Do you propose to transport the LMO outside the premises or between premises?
                                    <p><em>If yes, provide specific Standard Operating Procedures (SOPs) which are compliant with the Biosafety Guidelines. Please ensure all the premises used are included in Part E of this form.</em></p>
                                    <textarea rows="5" class="form-control" name="risk_management_transport"><?php if(isset($load)){echo set_value('risk_management_transport', $item->risk_management_transport);}else{echo set_value('risk_management_transport');} ?></textarea>
                                </li>
                                <li>
                                    How will the LMO be disposed of?
                                    <p><em>Provide specific Standard Operating Procedures (SOPs) which are compliant with the Biosafety Guidelines. If the activity invovlves LMO at various growth stages (seedlings,trees), the SOP should cover the disposal of LMO at each growth stage. </em></p>
                                    <textarea rows="6" class="form-control" name="risk_management_disposed"><?php if(isset($load)){echo set_value('risk_management_disposed', $item->risk_management_disposed);}else{echo set_value('risk_management_disposed');} ?></textarea>
                                </li>
                                <li>
                                    How will the solid and liquid wastes from the activities (e.g. media, disposable gloves, planting materials, plant parts, etc) be treated and disposed of?
                                    <p><em>Provide specific Standard Operating Procedures (SOPs) which are compliant with the Biosafety Guidelines.</em></p>
                                    <textarea rows="6" class="form-control" name="risk_management_wastes"><?php if(isset($load)){echo set_value('risk_management_wastes', $item->risk_management_wastes);}else{echo set_value('risk_management_wastes');} ?></textarea>
                                </li>
                                <li>
                                    How will the wastewaters from the activities be disposed of?(e.g. water used for cleaning equipment, watering the plants, etc.)
                                    <p><em>Provide specific Standard Operating Procedures (SOPs) which are compliant with the Biosafety Guidelines.</em></p>
                                    <textarea rows="6" class="form-control" name="risk_management_wastewater"><?php if(isset($load)){echo set_value('risk_management_wastewater', $item->risk_management_wastewater);}else{echo set_value('risk_management_wastewater');} ?></textarea>
                                </li>
                                <li>
                                    How will the equipment/tools/surfaces used during the activities be decontaminated?(e.g.sharp, pipette, decontaminated glassware, etc)
                                    <p><em>Provide specific Standard Operating Procedures (SOPs) which are compliant with the Biosafety Guidelines.</em></p>
                                    <textarea rows="6" class="form-control" name="risk_management_decontaminated"><?php if(isset($load)){echo set_value('risk_management_decontaminated', $item->risk_management_decontaminated);}else{echo set_value('risk_management_decontaminated');} ?></textarea>
                                </li>
                            </ol>
                            
                            <br><br>
                            
                            <h8><strong>D3 Emergency Response Plan</strong></h8><br><br>
                            
                            <ol type="1" start="16">
                                <li>
                                    Provide plans for protecting human and animal health and the environment in the case of the occurence of an undesirable effect observed during contained use of activities.
                                    <p><em>(e.g. medical management which includes first aid and hospitalization, line of communication both within and outside the organization.</em></p>
                                    <textarea rows="6" class="form-control" name="risk_response_environment"><?php if(isset($load)){echo set_value('risk_response_environment', $item->risk_response_environment);}else{echo set_value('risk_response_environment');} ?></textarea>
                                </li>
                                <li>
                                    Provide plans for removal of the LMO in the affected areas in the case of an unintentional release
                                    <p><em>(e.g. to contain and treat spillage)</em></p>
                                    <textarea rows="6" class="form-control" name="risk_response_plan"><?php if(isset($load)){echo set_value('risk_response_plan', $item->risk_response_plan);}else{echo set_value('risk_response_plan');} ?></textarea>
                                </li>
                                <li>
                                    Provide plans for disposal of plants, animals and any other organisms exposed during the unintentional release.
                                    <textarea rows="6" class="form-control" name="risk_response_disposal"><?php if(isset($load)){echo set_value('risk_response_disposal', $item->risk_response_disposal);}else{echo set_value('risk_response_disposal');} ?></textarea>
                                </li>
                                <li>
                                    Provide plans for isolation of the area affected by the unintentional release <em>(e.g. evacuation and quarantine)</em>
                                    <textarea rows="6" class="form-control" name="risk_response_isolation"><?php if(isset($load)){echo set_value('risk_response_isolation', $item->risk_response_isolation);}else{echo set_value('risk_response_isolation');} ?></textarea>
                                </li>
                                <li>
                                    Provide details of any other contingency measure that will be in place to rectify any unintended consequences if an adverse effect becomes evident during the contained use of activities or when an unintentional release occurs.
                                    <textarea rows="6" class="form-control" name="risk_response_contigency"><?php if(isset($load)){echo set_value('risk_response_contigency', $item->risk_response_contigency);}else{echo set_value('risk_response_contigency');} ?></textarea>
                                </li>
                            </ol>                         
                        </div>
                        
                        <div id="part_e">
                            <h8><strong>Part E: The Premises</strong></h8>
                            
                            <ol type="1" start="21">
                               <li>
                                   Please provide information for all of the facilities being used for the contained use activities in the table below.<br>
                                <p><em>Note 1: For a Research and Development collaboration involving more than one IBC, please provide proof of collaboration (such as letter of authorization) to use the premises.</em></p>
                                <p>Note 2: *For notifications with more than one premises, use additional columns provided.</p>
                               </li>   
                            </ol>
                            
                            <div>
                                <table class="table table-bordered">
                                    <h8><strong>Table 3: Details of premises</strong></h8>
                                    <thead>
                                        <th class="tbheader1">Information required</th>
                                        <th class="tbheader1">Premises 1</th>
                                        <th class="tbheader1">Premises 2*</th>
                                        <th class="tbheader1">Premises 3*</th>
                                        <th class="tbheader1">Premises 4*</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1. Name of premises:</td>
                                            <td><input type="text" class="form-control" name="premise_name[0]" value="<?php if(isset($load)){echo set_value('premise_name[0]', $ac[0]);}else{echo set_value('premise_name[0]');} ?>" ></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_name[1]" value="<?php if(isset($load)){echo set_value('premise_name[1]', $ac[1]);}else{echo set_value('premise_name[1]');} ?>" ></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_name[2]" value="<?php if(isset($load)){echo set_value('premise_name[2]', $ac[2]);}else{echo set_value('premise_name[2]');} ?>" ></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_name[3]" value="<?php if(isset($load)){echo set_value('premise_name[3]', $ac[3]);}else{echo set_value('premise_name[3]');} ?>" ></td>
                                        </tr>
                                        <tr>
                                           <td>
                                               2. Premises type: <br> 
                                            <p>
                                                <em>(e.g)animal containment premises, laboratory, insect containment premises, greenhouse, etc.)</em>
                                            </p>
                                            <p>
                                                <em>(Please specify if it is a large scale facility involving culture volume greater than or equal to 10L of culture of any LMO)</em>
                                               </p>
                                            </td> 
                                            <td><input type="text" class="form-control" name="premise_type[0]" value="<?php if(isset($load)){echo set_value('premise_type[0]', $ad[0]);}else{echo set_value('premise_type[0]');} ?>"></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_type[1]" value="<?php if(isset($load)){echo set_value('premise_type[1]', $ad[1]);}else{echo set_value('premise_type[1]');} ?>"></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_type[2]" value="<?php if(isset($load)){echo set_value('premise_type[2]', $ad[2]);}else{echo set_value('premise_type[2]');} ?>"></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_type[3]" value="<?php if(isset($load)){echo set_value('premise_type[3]', $ad[3]);}else{echo set_value('premise_type[3]');} ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>3. Biosafety level (BSL):</td>
                                            <td><input type="text" class="form-control" name="premise_BSL[0]" value="<?php if(isset($load)){echo set_value('premise_BSL[0]', $ae[0]);}else{echo set_value('premise_BSL[0]');} ?>" ></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_BSL[1]" value="<?php if(isset($load)){echo set_value('premise_BSL[1]', $ae[1]);}else{echo set_value('premise_BSL[1]');} ?>" ></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_BSL[2]" value="<?php if(isset($load)){echo set_value('premise_BSL[2]', $ae[2]);}else{echo set_value('premise_BSL[2]');} ?>" ></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_BSL[3]" value="<?php if(isset($load)){echo set_value('premise_BSL[3]', $ae[3]);}else{echo set_value('premise_BSL[3]');} ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>4. Who undertook the inspection of the premises? <p><em>(please indicate which IBC)</em></p></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_IBC[0]" value="<?php if(isset($load)){echo set_value('premise_IBC[0]', $af[0]);}else{echo set_value('premise_IBC[0]');} ?>" ></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_IBC[1]" value="<?php if(isset($load)){echo set_value('premise_IBC[1]', $af[1]);}else{echo set_value('premise_IBC[1]');} ?>" ></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_IBC[2]" value="<?php if(isset($load)){echo set_value('premise_IBC[2]', $af[2]);}else{echo set_value('premise_IBC[2]');} ?>" ></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_IBC[3]" value="<?php if(isset($load)){echo set_value('premise_IBC[3]', $af[3]);}else{echo set_value('premise_IBC[3]');} ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>5. Date of the most recent inspection: <p>Attach lastest inspection report</p></td>
                                            
                                            <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="premise_IBC_date[0]" placeholder="date" value="<?php if(isset($load)){echo set_value('premise_IBC_date[0]', $ag[0]);}else{echo set_value('premise_IBC_date[0]');} ?>" ></td>
                                            
                                            <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="premise_IBC_date[1]" placeholder="date" value="<?php if(isset($load)){echo set_value('premise_IBC_date[1]', $ag[1]);}else{echo set_value('premise_IBC_date[1]');} ?>" ></td>
                                            
                                            <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="premise_IBC_date[2]" placeholder="date" value="<?php if(isset($load)){echo set_value('premise_IBC_date[2]', $ag[2]);}else{echo set_value('premise_IBC_date[2]');} ?>" ></td>
                                            
                                            <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="premise_IBC_date[3]" placeholder="date" value="<?php if(isset($load)){echo set_value('premise_IBC_date[3]', $ag[3]);}else{echo set_value('premise_IBC_date[3]');} ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>6. Fill the following if premises is BSL 3 or BSL 4: <p>Date of certification by competent authority</p>
                                            <p>Certificate reference no:</p>
                                                <p>Attach latest inspection report</p>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="premise_certification_date[0]" placeholder="date" value="<?php if(isset($load)){echo set_value('premise_certification_date[0]', $ah[0]);}else{echo set_value('premise_certification_date[0]');} ?>"><br>
                                                
                                                <input type="text" class="form-control" name="premise_certification_no[0]" placeholder="certificate no" value="<?php if(isset($load)){echo set_value('premise_certification_no[0]', $ai[0]);}else{echo set_value('premise_certification_no[0]');} ?>"><br>
                                                
                                                <input type="text" class="form-control" name="premise_certification_report[0]" value="<?php if(isset($load)){echo set_value('premise_certification_report[0]', $item->premise_certification_report);}else{echo set_value('premise_certification_report[0]');} ?>" >
                                                
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="premise_certification_date[1]" placeholder="date" value="<?php if(isset($load)){echo set_value('premise_certification_date[1]', $ah[1]);}else{echo set_value('premise_certification_date[1]');} ?>"><br>
                                                
                                                <input type="text" class="form-control" name="premise_certification_no[1]" placeholder="certificate no" value="<?php if(isset($load)){echo set_value('premise_certification_no[1]', $ai[1]);}else{echo set_value('premise_certification_no[1]');} ?>"><br>
                                                
                                                <input type="text" class="form-control" name="premise_certification_report[1]" value="<?php if(isset($load)){echo set_value('premise_certification_report[1]', $item->premise_certification_report);}else{echo set_value('premise_certification_report[1]');} ?>" >
                                                
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="premise_certification_date[2]" placeholder="date" value="<?php if(isset($load)){echo set_value('premise_certification_date[2]', $ah[2]);}else{echo set_value('premise_certification_date[2]');} ?>"><br>
                                                
                                                <input type="text" class="form-control" name="premise_certification_no[2]" placeholder="certificate no" value="<?php if(isset($load)){echo set_value('premise_certification_no[2]', $ai[2]);}else{echo set_value('premise_certification_no[2]');} ?>"><br>
                                                
                                                <input type="text" class="form-control" name="premise_certification_report[2]" value="<?php if(isset($load)){echo set_value('premise_certification_report[2]', $item->premise_certification_report);}else{echo set_value('premise_certification_report[2]');} ?>" >
                                                
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="premise_certification_date[3]" placeholder="date" value="<?php if(isset($load)){echo set_value('premise_certification_date[3]', $ah[3]);}else{echo set_value('premise_certification_date[3]');} ?>"><br>
                                                
                                                <input type="text" class="form-control" name="premise_certification_no[3]" placeholder="certificate no" value="<?php if(isset($load)){echo set_value('premise_certification_no[3]', $ai[3]);}else{echo set_value('premise_certification_no[3]');} ?>"><br>
                                                
                                                <input type="text" class="form-control" name="premise_certification_report[3]" value="<?php if(isset($load)){echo set_value('premise_certification_report[3]', $item->premise_certification_report);}else{echo set_value('premise_certification_report[3]');} ?>" >
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7. Address of premises:</td>
                                            <td><input type="text" class="form-control" name="premise_address[0]" value="<?php if(isset($load)){echo set_value('premise_address[0]', $aj[0]);}else{echo set_value('premise_address[0]');} ?>"></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_address[1]" value="<?php if(isset($load)){echo set_value('premise_address[1]', $aj[1]);}else{echo set_value('premise_address[1]');} ?>"></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_address[2]" value="<?php if(isset($load)){echo set_value('premise_address[3]', $aj[2]);}else{echo set_value('premise_address[2]');} ?>"></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_address[3]" value="<?php if(isset($load)){echo set_value('premise_address[3]', $aj[3]);}else{echo set_value('premise_address[3]');} ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>8. Name of contact person for premises/Biosafety Officer Name:</td>
                                            <td><input type="text" class="form-control" name="premise_officer_name[0]" value="<?php if(isset($load)){echo set_value('premise_officer_name[0]', $ak[0]);}else{echo set_value('premise_officer_name[0]');} ?>"></td>
                                            <td><input type="text" class="form-control" name="premise_officer_name[1]" value="<?php if(isset($load)){echo set_value('premise_officer_name[1]', $ak[1]);}else{echo set_value('premise_officer_name[1]');} ?>"></td>
                                            <td><input type="text" class="form-control" name="premise_officer_name[2]" value="<?php if(isset($load)){echo set_value('premise_officer_name[2]', $ak[2]);}else{echo set_value('premise_officer_name[2]');} ?>"></td>
                                            <td><input type="text" class="form-control" name="premise_officer_name[3]" value="<?php if(isset($load)){echo set_value('premise_officer_name[3]', $ak[3]);}else{echo set_value('premise_officer_name[3]');} ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>9. Business phone number:</td>
                                            <td><input type="text" class="form-control" name="premise_telephone_business[0]" value="<?php if(isset($load)){echo set_value('premise_telephone_business[0]', $al[0]);}else{echo set_value('premise_telephone_business[0]');} ?>"></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_telephone_business[1]" value="<?php if(isset($load)){echo set_value('premise_telephone_business[1]', $al[1]);}else{echo set_value('premise_telephone_business[1]');} ?>"></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_telephone_business[2]" value="<?php if(isset($load)){echo set_value('premise_telephone_business[2]', $al[2]);}else{echo set_value('premise_telephone_business[2]');} ?>"></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_telephone_business[3]" value="<?php if(isset($load)){echo set_value('premise_telephone_business[3]', $al[3]);}else{echo set_value('premise_telephone_business[3]');} ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>10. Mobile phone number:</td>
                                            <td><input type="text" class="form-control" name="premise_telephone_mobile[0]" value="<?php if(isset($load)){echo set_value('premise_telephone_mobile[0]', $am[0]);}else{echo set_value('premise_telephone_mobile[0]');} ?>"></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_telephone_mobile[1]" value="<?php if(isset($load)){echo set_value('premise_telephone_mobile[1]', $am[1]);}else{echo set_value('premise_telephone_mobile[1]');} ?>"></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_telephone_mobile[2]" value="<?php if(isset($load)){echo set_value('premise_telephone_mobile[2]', $am[2]);}else{echo set_value('premise_telephone_mobile[2]');} ?>"></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_telephone_mobile[3]" value="<?php if(isset($load)){echo set_value('premise_telephone_mobile[3]', $am[3]);}else{echo set_value('premise_telephone_mobile[3]');} ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>11. Fax number:</td>
                                            <td><input type="text" class="form-control" name="premise_fax[0]" value="<?php if(isset($load)){echo set_value('premise_fax[0]', $an[0]);}else{echo set_value('premise_fax[0]');} ?>"></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_fax[1]" value="<?php if(isset($load)){echo set_value('premise_fax[1]', $an[1]);}else{echo set_value('premise_fax[1]');} ?>"></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_fax[2]" value="<?php if(isset($load)){echo set_value('premise_fax[2]', $an[2]);}else{echo set_value('premise_fax[2]');} ?>"></td>
                                            
                                            <td><input type="text" class="form-control" name="premise_fax[3]" value="<?php if(isset($load)){echo set_value('premise_fax[3]', $an[3]);}else{echo set_value('premise_fax[3w]');} ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>12. E-mail address:</td>
                                            <td><input type="email" class="form-control" name="premise_email[0]" value="<?php if(isset($load)){echo set_value('premise_email[0]', $ao[0]);}else{echo set_value('premise_email[0]');} ?>" ></td>
                                            
                                            <td><input type="email" class="form-control" name="premise_email[1]" value="<?php if(isset($load)){echo set_value('premise_email[1]', $ao[1]);}else{echo set_value('premise_email[1]');} ?>"></td>
                                            
                                            <td><input type="email" class="form-control" name="premise_email[2]" value="<?php if(isset($load)){echo set_value('premise_email[2]', $ao[2]);}else{echo set_value('premise_email[2]');} ?>"></td>
                                            
                                            <td><input type="email" class="form-control" name="premise_email[3]" value="<?php if(isset($load)){echo set_value('premise_email[3]', $ao[3]);}else{echo set_value('premise_email[3]');} ?>"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div id="part_f">
                            <h8><strong>Part F: Confidential Business Information</strong></h8>
                            <br>
                            
                            <p>Enter in this section any information required in Part A - E which confidentiality is claimed together with full jsutification for that claim.<br> </p>
                            <p>Criteria for confidentiality are as follows (section 59 of Biosafety Act 2007):</p>
                            <ol type="a">
                                <li>that the information is not known generally among, or readily accessible to, any person within the circle that normally deals with the kind of information sought to be made confidential;
                                </li>
                                <li>
                                    that the information has commercial value because it is secret; and
                                </li>
                                <li>
                                    those reasonable steps have been taken to keep the information secret.
                                </li>
                            </ol>
                            
                            <textarea rows="7" class="form-control" name="confidential_description"><?php if(isset($load)){echo set_value('confidential_description', $item->confidential_description);}else{echo set_value('confidential_description');} ?></textarea>
                        </div>
                        
                        <div id="part_g">
                            <h8><strong>Part G: List of references</strong></h8>
                            
                            <textarea rows="7" class="form-control" name="reference_description"><?php if(isset($load)){echo set_value('reference_description', $item->reference_description);}else{echo set_value('reference_description');} ?></textarea>
                        </div>
                        <br>
                        <br>
                        
                        <div id="notes">
                            <h5 class="centering"><strong>EXPLANATORY NOTES FOR FORM E</strong></h5>
                            <br>
                            
                            <div>
                                <h8><strong>NOTIFICATION FOR CONTAINED USE AND IMPORT FOR CONTAINED USE ACTIVITIES INVOLVING LIVING MODIFIED ORGANISM (LMO) FOR BIOSAFETY LEVELS 1, 2, 3 AND 4
                                    </strong></h8>
                            </div>
                            
                            <br>
                            
                            <div>
                                NBB/N/CU/15?FORM E shall be submitted to the Director General as a notification for contained use and import for contained use [not involving release into the environment of Living Modified Organism (LMO) as specified in Second Schedule of the Act]. Any organization undertaking modern biotechnology research and development shall submit the notification through its institutional Biosafety Commitee (IBC) that is registered with the National Biosafety Board (NBB). The IBC should do an assessment prior to the submission and submit the result of the assesment via the IBC Assessment Form (put link website link etc). Not all parts in this form will apply to every case. Therefore, applicants will only address the specific questions/paramaeters that are appropriate to individual application.
                            </div>
                            <br>
                            
                            <div>
                                In each case where it is not technically possible or it does not appear necessary to give the information, the reasons shall be stated. The risk assessment, risk management plan, emergency response plan and the fullfillment of any other requirements under the Biosafety Act 2007 will be the basis of the decision by the NBB.
                            </div>
                            <br>
                            
                            <div>
                                <p>The applicant shall submit 1 original and 6 copies of the notification to the Director General. The six copies submitted shoul be identical to the original form. Please ensure that the information provided can be clearly read/seen. This submission should be accompanied by a cover letter from the applicant's institution. A soft copy of the submitted notification (<u><strong>including all supporting documents/attachments, if any</strong></u>) shall also be provided in the form of a CD by the applicant. However, <u><strong>all information that has been decalred as Confidential Business Information (CBI) should be omitted from the CD</strong></u>. <u>Please provide one CD per application (do not combine with any other application that you may submit concurrently).</u> </p>
                            </div>
                            
                            <div>
                                <h8><strong>Providing Information</strong></h8>
                                <p>The information provided in this notification will be used to evaluate the emergency response plan as specified in section 37 of the Biosafety Act 2007 and specific measures to be taken in relation to a contained use activity involving LMO. Thus it is important to provide accurate and timely information that is as comprehensive as existing scientific knowledge woul permit, and  supported by whatever data is available.</p>
                                <p>If the LMO is imported, details of importer, date of importation and approval from relevant authorities like Department of Agriculture (DOA), Ministry of Health, Malaysia, etc. should be provided. </p>
                                
                                <p>The NBB may require additional information, the applicant will be notified should this be the case. If the applicant fails to provide the additional information requested, the notification shall be deemed to have been withdrawn but it shall not affect the right of the application to make a fresh notification.</p>
                            </div>
                            
                            <div>
                                <h8><strong>Description of LMO (Part C)</strong></h8>
                                <p>'Parent organism' refers to the final recipient of the intended genetic modification.<br>
                                'Donor organism' referes to the source of the genetic sequences used for modification.<br>
                                'Vector' should include all vectors and method(s) used.<br>
                                'Modified trait' can be stated as "unknown" if for example building a genomic library.<br>
                                Identity and functio of gene(s) of donor organism responsible for the modified trait can be stated as "unknown" if for example building a genomic library.</p>
                            </div>
                            
                            <div>
                                <h8><strong>Class of modified trait, please refer box below.</strong></h8>
                                <p>If the LMO has more than one modified trait please list all. If the modified trait is not listed in the Box 1, please list it as "other" and provide details of the modified traits.</p>
                            </div>
                            
                            <table class="table table-bordered">
                                <h8 class="centering">Box 1: Class of modified trait</h8>
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Class (type) of trait</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Abiotic stress resistance</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Altered argonomic characteristics</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Altered nutritional characteristics</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Altered pharmaceutical characteristics</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Altered physical product characteristics</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Antibiotic resistance</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Foreign antigen expression</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Attenuation</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Bacterial resistance</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Disease resistance</td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Flower colour</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Fungal resistance</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Herbicide tolerance</td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Immuno-modulatory protein expression</td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>Pest resistance e.g. insect resistance</td>
                                    </tr>
                                    <tr>
                                        <td>16</td>
                                        <td>Protein expression</td>
                                    </tr>
                                    <tr>
                                        <td>17</td>
                                        <td>Reporter/maker gene expression</td>
                                    </tr>
                                    <tr>
                                        <td>18</td>
                                        <td>Virus resistance</td>
                                    </tr>
                                    <tr>
                                        <td>19</td>
                                        <td>Others (please specify)</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div>
                                <h8><strong>Accuracy of the information</strong></h8>
                                <p>The notification should also be carefully checked before submission to enure that all the information is accurate. If the information provided is incorrect, incomplete or misleading, the NBB may issue a withdrawal of the acknowledgement of receipt of notification without prejudice to the submission of a fresh notification</p>
                            </div>
                            
                            <div>
                                <h8>Confidentiality</h8>
                                <p>Any information within this notification which is to be treated as Confidential Business Inforamtion (CBI), as described in section 59(3) of the Biosafety Act 2007 should be clearly marked "CBI" in the relevant parts of the notification by providing the justification for the request for CBI. The following information shall not be considered confidential:
                                </p>
                                
                                <ol type="a">
                                    <li>The name and address of the applicant</li>
                                    <li>
                                        A general description of the LMO
                                    </li>
                                    <li>
                                        A summary of the risk assessment of the effects on the conservation and sustainable use of biological diversity, taking also into account risks to human health; and
                                    </li>
                                    <li>
                                        Any methods and plans for emergency response
                                    </li>
                                </ol>
                            </div>
                            
                            <div>
                                <h8><strong>Authorization</strong></h8>
                                <p>Please ensure that if this notification is being completed on behalf of the proposed user, that the person completing this notification holds proper authority to submit this notification for the proposed user. Please provide written proof of authorization.</p>
                            </div>
                            
                            <div>
                                <p><strong>For further information or any queries related to filling up this form, </strong>please contact the office of the Director General by:<br>
                                Telephone: 603-8886 1580<br>
                                E-mail address: biosafety@nre.gov.my</p>
                                
                            </div>
                            
                            <div>
                                <h8><strong>The completed form and cover letter to be submitted as follows:</strong></h8>
                                <p>The Director General<br>
                                Department of Biosafety<br>
                                Ministry of Natural Resources and Environment Malaysia<br>
                                Level 1, Podium 2<br>
                                Wisma Sumber Asli, No.25, Persiaran Perdana<br>
                                Precinct 4, Federal Government Administrative Centre<br>
                                62574 Putrajaya, Malaysia</p>
                            </div>
                            
                            <div>
                                <h8><strong>Acknowledgement of Receipt</strong></h8>
                                <p>Upon receipt of the notification, the Director General shall send to the applicant an acknowledgement of receipt with an assigned reference number. The reference number should be used in all correspondence with respect to the notification. The activity can start only after the acknowledgement is issued. The Principal Investigator is still required to be complaint to any decisions made by the NBB (as described in section 30(3) of the Biosafety Act 2007 and is required to comply with other written laws governing LMO.</p>
                            </div>
                            
                            <div>
                                <h8><strong>Exemption</strong></h8>
                                <p>The First Schedule of the Biosafety (approval and Notification) Regualtions 2010 allows exemptions for some types of techniques and contained use of activities in relation to LMO posing a very low risk (i.e. contained research activities involving very well understood organisms and processes for creating and studying LMO). Exempted activities should be carried out under coditions of standard laboratory practice. Appropriate biosafety levels as according to Second Schedule of the Biosafety (Approval and Notification) Regulations 2010 should be used for the exempted activities and personnel should have appropriate training. Principal Investigators who beleive that the work falls into any of the exemptions should nevertheless notify their IBC of the proposed project. The IBC shall review all submitted research projects to determine their exemption or non-exemption status.</p>
                            </div>
                            
                            <div>
                                <h8><strong>Please retain a copy of your completed notification</strong></h8>
                            </div>
                            
                        </div>
                        <hr>
                    
                    <div>
                    <input type="hidden" name="appid" value="<?php if(isset($appID)){echo $appID;} ?>">
                </div>
                    
                    <div style="text-align: center">
                        
                       <?php if(isset($editload)){ ?>
                       <button type="submit" name = 'updateButton' value = 'Update' onclick="location.href='<?php echo site_url().'/forme/update_form';?>'" class="btn btn-primary">Update</button>
                       <?php }else{ ?>
                       <button name="saveButton" type="submit" class="btn btn-primary col-md-2">Save</button>
                       <?php } ?>
                    
                </div>
                
                </div>
                
                 <div class="col-md-1">
                     <div class="btn-group-vertical btn-sample">
                         <a href="#top" class="btn btn-success">Top</a>
                         <a href="#part_a" class="btn btn-success">Section 1</a>
                         <a href="#part_b" class="btn btn-success">Section 2</a>
                         <a href="#part_c" class="btn btn-success">Section 3</a>
                         <a href="#part_d" class="btn btn-success">Section 4</a>
                         <a href="#part_e" class="btn btn-success">Section 5</a>
                         <a href="#part_f" class="btn btn-success">Section 6</a>
                         <a href="#part_g" class="btn btn-success">Section 7</a>
                     </div>   
                 </div>
                
            </div>    
                
        
        
        <script>
            (function($){       
                $('input[type="file"]').bind('change',function(){           
                    $("#img_text").html($('input[type="file"]').val());
                });
            })(jQuery)
        </script>
        

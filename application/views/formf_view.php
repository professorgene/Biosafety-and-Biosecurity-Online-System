<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Biosafety and Biosecurity Online System - Form F</title>
    
    <style>
        body {
            padding-top: 82px;
        }
        
        .btn-sample{
            position: fixed;
            margin-left: 60px;
        }
        
        .approve_section{
            display: none;
        }
        .sectiontarget::before {
          content:"";
          display:block;
          height:60px; /* fixed header height*/
          margin:-60px 0 0; /* negative fixed header height */
        }
    </style>
</head>    
<body>
    <?php include_once 'template/navbar.php' ?>
    
    <?php
    
    if(isset($load)){
        foreach($retrieved as $item){
            
        }
        
        
    }else{
           
        }
    
    ?>
    
    <div  class="container">

        <div class="row">
            <div class="col-md-1">
            </div>
            
            <div class="col-md-9">
              <?php if(isset($editload)) { echo form_open('formf/update_form'); } else { echo form_open('formf/index'); } ?>
                <?php if(isset($disabled)){ echo "<fieldset disabled='disabled'>"; } ?>
                    <div>
                        <br/>
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                
                   <div><h4><strong>TITLE:</strong></h4></div>
				   <div><h4><strong>BIOSAFETY ACT 2007</strong></h4></div>
				   <div><h4><strong>BIOSAFETY REGULATIONS 2010</strong></h4></div>
				   <div><h4><strong>NBB/N/Ex/10/FORM F</strong></h4></div>
                   
				   <div>
                       <h5><strong>NOTIFICATION FOR EXPORT OF LIVING MODIFIED ORGANISM (LMO)</strong></h5>
                       <p>	
						  NBB/N/Ex/10/FORM F shall be submitted to the Director General as a notification 
						  for export of LMO under the Biosafety Act 2007. The applicant shall submit 1 
					      original and 6 copies of the notification to the Director General. 
					      A soft copy of the submitted notification (including all supporting documents/attachments, if any) 
					      shall also be provided in the form of a CD by the applicant. However, all information that has been declared as 
					      Confidential Business Information (CBI) should be omitted from the CD.
					   </p>
				   </div>
                
                   <div>
                       <h5><strong>Accuracy of Information</strong></h5>
                       <p>
						  The notification should be carefully checked before submission to ensure that all the information is accurate. 
						  If the information provided is incorrect or incomplete or misleading, the Director General may issue a withdrawal 
						  of the acknowledgement of submission of notification without prejudice to the submission of a fresh notification.
					   </p>
				   </div>
                
				   <div>
                       <h5><strong>Compliance with Requirements of Importing Country</strong></h5>
                       <p>
						  The applicant is required to comply with all the requirements of the importing country to export LMO. 
						  Evidence of compliance should be submitted with this notification. 
					   </p>
				   </div>
                
				   <div>
                       <h5><strong>Confidentiality</strong></h5>
                       <p>
						  Any information within this application which is to be treated as Confidential Business Information (CBI), as 
						  described in the Biosafety Act 2007 in section 59(3) should be clearly marked “CBI” in the relevant parts of 
						  the application by providing the justification for the request for CBI. The following information shall not 
						  be considered confidential:
					   </p>
					   <p>a) The name and address of the applicant
						  <br>b) Description of the LMO
					   </p>
				   </div>
                
				   <div>
                       <h5><strong>For further information:</strong></h5>
                       <p>
						  Please contact the Director General by:
						  <br>Telephone: 03-8886 1579		
						  <br>Email: biosafety@nre.gov.my	
					   </p>
				   </div>				   
				   <div>
                       <h5><strong>The completed form to be submitted as follows:</strong></h5>
                       <p>
						  Director General	
							<br>Department of Biosafety
							<br>Ministry of Natural Resources and Environment Malaysia
							<br>Level 1, Podium 2
							<br>Wisma Sumber Asli, No. 25, Persiaran Perdana
							<br>Precinct 4, Federal Government Administrative Centre
							<br>62574 Putrajaya, Malaysia
					   </p>
				   </div>				   
				   <div>
                       <h5><strong>Acknowledgement of Receipt</strong></h5>
                       <p>
						 Upon receipt of the notification, the Director General shall send to the applicant 
						 an acknowledgement of receipt with an assigned reference number. The reference number 
						 should be used in all correspondence with respect to the notification. 
					   </p>
				   </div>				   
				   <div>
                       <h5><strong>Exemption</strong></h5>
                       <p>
						 An applicant who has submitted a Notification for export of LMO and has received an 
						 Acknowledgement of Receipt from the Director General is exempt from making any subsequent 
						 Notifications for the same LMO, to the same country for the same purpose (as specified in the 
						 Acknowledgement of Receipt). However, there is no exemption for compliance with all the requirements of 
						 the importing country to export LMO for each subsequent export. 
					   </p>
				   </div>
                   
                   <hr>
                   
				   <div>
                       <h5><strong><i>Please retain a copy of your completed form</i></strong></h5>
				   </div>				   
                   <div>
                       <table class="table table-bordered">
                           <thead>
                                <tr>
                                   <th class="tblTitle" colspan="10"><strong>NOTIFICATION CHECK LIST</strong></th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <th>Form NBB/N/Ex/10/FORM F is completed with relevant signatures obtained</th>
                                   <td><input type="checkbox" name="notification_checklist_form_completed" value="1" <?php echo set_checkbox('notification_checklist_form_completed', '1'); ?> <?php if(isset($load)){if($item->notification_checklist_form_completed==1){echo "checked=checked";}}else{} ?>></td>
                               </tr>
                               <tr>
                                   <th>Any information to be treated as confidential business information should be clearly marked “CBI” in the notification</th>
                                   <td><input type="checkbox" name="notification_checklist_CBI" value="1" <?php echo set_checkbox('notification_checklist_CBI', '1'); ?> <?php if(isset($load)){if($item->notification_checklist_CBI==1){echo "checked=checked";}}else{} ?> ></td>
                               </tr>
                               <tr>
                                   <th>1 Original and 6 copies of the complete notification submitted. A soft copy of the submitted notification (including all supporting documents/attachments, if any) that do not contain any CBI.</th>
                                   <td><input type="checkbox" name="notification_checklist_submitted" value="1" <?php echo set_checkbox('notification_checklist_submitted', '1'); ?> <?php if(isset($load)){if($item->notification_checklist_submitted==1){echo "checked=checked";}}else{} ?>></td>
                               </tr>
                           </tbody>
                       </table>
                   </div>
                   
                   <hr>
                    
					<div id="section_1" class="sectiontarget">
                       <h6 id="part1"><strong>Part 1 Details of the Applicant (Exporter) </strong></h6>
                       <div class="form-group">
                           Organization: <input type="text" class="form-control" name="exporter_organization" value="<?php if(isset($load)){echo set_value('exporter_organization', $item->exporter_organization);}else{echo set_value('exporter_organization');} ?>">
                           <span class="text-danger"><?php echo form_error('exporter_organization'); ?></span>
                       </div>                       
                       <div class="form-group">
                           Name of Applicant: <input type="text" class="form-control" name="exporter_name" value="<?php if(isset($load)){echo set_value('exporter_name', $item->exporter_name);}else{echo set_value('exporter_name');} ?>">
                           <span class="text-danger"><?php echo form_error('exporter_name'); ?></span>
                       </div>                       
                       <div class="form-group">
                           Position in Organization: <input type="text" class="form-control" name="exporter_position" value="<?php if(isset($load)){echo set_value('exporter_position', $item->exporter_position);}else{echo set_value('exporter_position');} ?>">
                           <span class="text-danger"><?php echo form_error('exporter_position'); ?></span>
                       </div>                       
                       <div class="form-group">
                           Telephone (office): <input type="text" class="form-control" name="exporter_telephone_office" value="<?php if(isset($load)){echo set_value('exporter_telephone_office', $item->exporter_telephone_office);}else{echo set_value('exporter_telephone_office');} ?>">
                           <span class="text-danger" ><?php echo form_error('exporter_telephone_office'); ?></span>
                       </div>					   
					   <div class="form-group">
                           Telephone (mobile): <input type="text" class="form-control" name="exporter_telephone_mobile" value="<?php if(isset($load)){echo set_value('exporter_telephone_mobile', $item->exporter_telephone_mobile);}else{echo set_value('exporter_telephone_mobile');} ?>">
                           <span class="text-danger"><?php echo form_error('exporter_telephone_mobile'); ?></span>
                       </div>					   
					   <div class="form-group">
                           Fax number: <input type="text" class="form-control" name="exporter_fax" value="<?php if(isset($load)){echo set_value('exporter_fax', $item->exporter_fax);}else{echo set_value('exporter_fax');} ?>">
                           <span class="text-danger"><?php echo form_error('exporter_fax'); ?></span>
                       </div>					   
					   <div class="form-group">
                           Email: <input type="text" class="form-control" name="exporter_email_address" value="<?php if(isset($load)){echo set_value('exporter_email_address', $item->exporter_email_address);}else{echo set_value('exporter_email_address');} ?>">
                           <span class="text-danger"><?php echo form_error('exporter_email_address'); ?></span>
                       </div>					   
					   <div class="form-group">
                           Postal Address: <input type="text" class="form-control" name="exporter_postal_address" value="<?php if(isset($load)){echo set_value('exporter_postal_address', $item->exporter_postal_address);}else{echo set_value('exporter_postal_address');} ?>">
                           <span class="text-danger"><?php echo form_error('exporter_postal_address'); ?></span>
                       </div>			   
					</div>
                    
					<hr>
					
					<div id="section_2" class="sectiontarget">
                       <h6 id="part2"><strong>Part 2  Details of LMO to be exported</strong></h6>
                       <div class="form-group">
                           Description of LMO to be exported <input type="text" class="form-control" name="LMO_description" value="<?php if(isset($load)){echo set_value('LMO_description', $item->LMO_description);}else{echo set_value('LMO_description');} ?>">
                           <span class="text-danger"><?php echo form_error('LMO_description'); ?></span>
                       </div>                       
                       <div class="form-group">
                           Plant, Fish/shellfish, Virus ,Animal, Micro-organism (bacterium/fungus etc.), Animal cell, Others (Please specify)
						<input type="text" class="form-control" name="LMO_type_description" value="<?php if(isset($load)){echo set_value('LMO_type_description', $item->LMO_type_description);}else{echo set_value('LMO_type_description');} ?>">
                           <span class="text-danger"><?php echo form_error('LMO_type_description'); ?></span>
                       </div>                       
                       <div class="form-group">
                           Identification of LMO <input type="text" class="form-control" name="LMO_identification" value="<?php if(isset($load)){echo set_value('LMO_identification', $item->LMO_identification);}else{echo set_value('LMO_identification');} ?>">
                           <span class="text-danger"><?php echo form_error('LMO_identification'); ?></span>
                       </div>                       
                       <div class="form-group">
                           Common name(s), Scientific name <input type="text" class="form-control" name="LMO_scientific_name" value="<?php if(isset($load)){echo set_value('LMO_scientific_name', $item->LMO_scientific_name);}else{echo set_value('LMO_scientific_name');} ?>" >
                           <span class="text-danger"><?php echo form_error('LMO_scientific_name'); ?></span>
                       </div>					   
					   <div class="form-group">
                           Introduced  Trait(s) <input type="text" class="form-control" name="LMO_trait" value="<?php if(isset($load)){echo set_value('LMO_trait', $item->LMO_trait);}else{echo set_value('LMO_trait');} ?>" >
                           <span class="text-danger"><?php echo form_error('LMO_trait'); ?></span>
                       </div>					   			   
					   <div class="form-group">
                          Intended use of LMO <input type="text" class="form-control" name="LMO_intended_usage" value="<?php if(isset($load)){echo set_value('LMO_intended_usage', $item->LMO_intended_usage);}else{echo set_value('LMO_intended_usage');} ?>" >
                           <span class="text-danger"><?php echo form_error('LMO_intended_usage'); ?></span>
                       </div>					   
					   <div class="form-group">
                          Describe the form in which LMO will be exported e.g. as seeds, cuttings, live fish, etc.
						  <input type="text" class="form-control" name="LMO_export_form" value="<?php if(isset($load)){echo set_value('LMO_export_form', $item->LMO_export_form);}else{echo set_value('LMO_export_form');} ?>">
                           <span class="text-danger"><?php echo form_error('LMO_export_form'); ?></span>
                       </div>
					   <div class="form-group">
                          Mode of export: Sea, Rail, Road, Air, Others (Please specify)	
					      <input type="text" class="form-control" name="LMO_export_mode_description" value="<?php if(isset($load)){echo set_value('LMO_export_mode_description', $item->LMO_export_mode_description);}else{echo set_value('LMO_export_mode_description');} ?>">
                           <span class="text-danger"><?php echo form_error('LMO_export_mode_description'); ?></span>
                       </div>
					   <div class="form-group">
                          Point of exit<input type="text" class="form-control" name="LMO_point_of_exit" value="<?php if(isset($load)){echo set_value('LMO_point_of_exit', $item->LMO_point_of_exit);}else{echo set_value('LMO_point_of_exit');} ?>">
                           <span class="text-danger"><?php echo form_error('LMO_point_of_exit'); ?></span>
                       </div>					   
					   <div class="form-group">
                          Suggested methods for safe handling, storage, transport and use (if available) 
						  <input type="text" class="form-control" name="LMO_methods" value="<?php if(isset($load)){echo set_value('LMO_methods', $item->LMO_methods);}else{echo set_value('LMO_methods');} ?>">
                           <span class="text-danger"><?php echo form_error('LMO_methods'); ?></span>
                       </div>					   					   
					</div>					

                    <hr>
                    
					<div id="section_3" class="sectiontarget">
                       <h6 id="part3"><strong>Part 3  Importing Country</strong></h6>
                       <div class="form-group">
                           Name of importing country <input type="text" class="form-control" name="import_country_name" value="<?php if(isset($load)){echo set_value('import_country_name', $item->import_country_name);}else{echo set_value('import_country_name');} ?>">
                           <span class="text-danger"><?php echo form_error('import_country_name'); ?></span>
                       </div>                       
                       <div class="form-group">
                           Evidence of compliance with importing country’s requirements (e.g. Copy of Import permit, copy of approval from competent authority, etc.)
						   <input type="file" class="form-control" name="import_evidence" value="<?php echo set_value('import_evidence'); ?>">
                           <span class="text-danger"><?php echo form_error('import_evidence'); ?></span>
                       </div>              
					</div>
                   
				    <hr>
                    
					<div id="section_4" class="sectiontarget">
                       <h6 id="part4"><strong>Part 4 Confidential Business Information</strong></h6>
                       <div class="form-group">
                           Enter in this section any information required in Part 1-3 for which you are claiming confidentiality, together with full justification for that claim.
						   <input type="text" class="form-control" name="export_import_CBI" value="<?php if(isset($load)){echo set_value('export_import_CBI', $item->export_import_CBI);}else{echo set_value('export_import_CBI');} ?>">
                           <span class="text-danger"><?php echo form_error('export_import_CBI'); ?></span>
                       </div>                       
             		</div>	
					
				    <hr>
                    
					<div id="section_5" class="sectiontarget">
                       <h6 id="part5"><strong>Part 5 Signatures and Statutory Declaration</strong></h6>
                       <div class="form-group">
                           We declare that all information and documents provided to the importing country are accurate and true and in compliance with the requirements of the 
						   importing country. <br>
						   We also understand that providing misleading information to the National Biosafety Board (NBB), deliberately or otherwise, is an offence under the Biosafety Act 2007.						   
                       </div>                       
             		</div>	
					
					<hr>
					
					<div>
                       <h6><strong>Applicant:</strong></h6>
                       <div class="form-group">
						  Date <input type="date" class="form-control" name="applicant_signature_date" value="<?php if(isset($load)){echo set_value('applicant_signature_date', $item->applicant_signature_date);}else{echo set_value('applicant_signature_date');} ?>" >
                          <span class="text-danger"><?php echo form_error('applicant_signature_date'); ?></span>
                       </div>
					   <div class="form-group">
                          Name as in Identity Card/Passport:<input type="text" class="form-control" name="applicant_name" value="<?php if(isset($load)){echo set_value('applicant_name', $item->applicant_name);}else{echo set_value('applicant_name');} ?>" >
                          <span class="text-danger"><?php echo form_error('applicant_name'); ?></span>
                       </div>
					   <div class="form-group">
                          Official Stamp <input type="text" class="form-control" name="applicant_stamp" value="<?php if(isset($load)){echo set_value('applicant_stamp', $item->applicant_stamp);}else{echo set_value('applicant_stamp');} ?>" >
                           <span class="text-danger"><?php echo form_error('applicant_stamp'); ?></span>
                       </div>					   
             		</div>
					
					<hr>
					
					<div>
                       <h6><strong>Head of organization/ Authorized Representative:</strong></h6>
                        
                       <div class="form-group">
					      Date <input type="date" class="form-control" name="representative_signature_date" value="<?php if(isset($load)){echo set_value('representative_signature_date', $item->representative_signature_date);}else{echo set_value('representative_signature_date');} ?>" >
                           <span class="text-danger"><?php echo form_error('representative_signature_date'); ?></span>
                       </div>
                        
					   <div class="form-group">
                          Name as in Identity Card/Passport:<input type="text" class="form-control" name="representative_name" value="<?php if(isset($load)){echo set_value('representative_name', $item->representative_name);}else{echo set_value('representative_name');} ?>" >
                           <span class="text-danger"><?php echo form_error('representative_name'); ?></span>
                       </div>
                        
					   <div class="form-group">
                          Official Stamp <input type="text" class="form-control" name="representative_stamp" value="<?php if(isset($load)){echo set_value('representative_stamp', $item->representative_stamp);}else{echo set_value('representative_stamp');} ?>" >
                           <span class="text-danger"><?php echo form_error('representative_stamp'); ?></span>
                       </div>					   
             		</div>
					
					<hr>
                
                
					<div>
                    <input type="hidden" name="appid" value="<?php if(isset($appID)){echo $appID;} ?>">
                </div>
                
                   <div style="text-align: center">
                       <?php if(isset($editload)){ ?>
                       <button type="submit" name = 'updateButton' value = 'Update' onclick="location.href='<?php echo site_url().'/formf/update_form';?>'" class="btn btn-primary">Update</button>
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
        
        
    </div>
</body>
</html>
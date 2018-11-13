
    <?php include_once 'template/navbar.php' ?>
    <?php
    
    if(isset($load)){
        foreach($retrieved as $item){
            $newar1 = $item->LMO_name;
            $newar2 = $item->LMO_risk_level;
            $newar3 = $item->LMO_category;
            $newar4 = $item->LMO_quantity;
            $newar5 = $item->LMO_volume;
            
            $newar6 = $item->biological_name;
            $newar7 = $item->biological_risk_level;
            $newar8 = $item->biological_category;
            $newar9 = $item->biological_quantity;
            $newar10 = $item->biological_volume;
            
            $a = explode(",", $newar1);
            $b = explode(",", $newar2);
            $c = explode(",", $newar3);
            $d = explode(",", $newar4);
            $e = explode(",", $newar5);
            $f = explode(",", $newar6);
            $g = explode(",", $newar7);
            $h = explode(",", $newar8);
            $i = explode(",", $newar9);
            $j = explode(",", $newar10);
        }
        
        
    }else{
           
        }
    
    ?>
    
    <div class="container">

        <div class="row">
    <div class="col-md-12">
		<img class="card-img-top" src="<?php echo base_url('assets\images\FormLogo\NotificationOfLMOandBio.jpg') ?>" alt="">	
    </div>           
            <div class="col-md-10">
               
                   <div>
                       <h5><strong>PLEASE FILL IN ALL INFORMATION REQUESTED</strong></h5>
                   </div>
                   
                   <br>
                   
                   <table class="table table-bordered" id="first-table">
                       <thead>
                           <tr>
                               <th>Date Received</th>
                               <th>SSBC Reference Number</th>
                           </tr>
                       </thead>
                       <tbody>
                           <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="date_received" placeholder="Office use only"></td>
                           <td><input type="text" name="SBC_reference_no" class="form-control" placeholder="Office use only"></td>
                       </tbody>
                   </table>
				   
				   <hr>
                   
                <div id="section_1" class="sectiontarget">
                   <table class="table table-bordered" id="section_1">
                           <thead>
                                <tr>
                                   <th class="tblTitle" colspan="4"><h8 id="section_1"><strong>SECTION 1 – Personnel Details</strong></h8></th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <th class="tbheader1">1.01 Name (as per I.C./Passport):</th>
                                   <td><textarea name="personnel_name" class="form-control"><?php if(isset($load)){echo set_value('personnel_name', $item->personnel_name);}else{echo set_value('personnel_name');} ?>
								   </textarea></td>
                                   
                                   <th class="tbheader1">1.02 Staff/Student No.:</th>
                                   <td><textarea  name="personnel_staff_student_no" class="form-control"><?php if(isset($load)){echo set_value('personnel_staff_student_no', $item->personnel_staff_student_no);}else{echo set_value('personnel_staff_student_no');} ?></textarea></td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.03 Designation:</th>
                                   <td><textarea  class="form-control" name="personnel_designation"><?php if(isset($load)){echo set_value('personnel_designation', $item->personnel_designation);}else{echo set_value('personnel_designation');} ?>
								   </textarea></td>
                                   
                                   <th class="tbheader1">1.04 Faculty/unit:</th>
                                   <td><textarea  class="form-control" name="personnel_faculty"><?php if(isset($load)){echo set_value('personnel_faculty', $item->personnel_faculty);}else{echo set_value('personnel_faculty');} ?>
								   </textarea></td>
                               </tr>
                               <tr>
                                   <th class="tbheader1">1.05 Project Title:</th>
                                   <td><textarea class="form-control" name="personnel_project_title"><?php if(isset($load)){echo set_value('personnel_project_title', $item->personnel_project_title);}else{echo set_value('personnel_project_title');} ?></textarea></td>
                                   
							   	   <th class="tbheader1">Ref. No.:</th>
                                   <td><textarea class="form-control" name="personnel_reference_no"><?php if(isset($load)){echo set_value('personnel_reference_no', $item->personnel_reference_no);}else{echo set_value('personnel_reference_no');} ?></textarea></td>
							   </tr>                              
                           </tbody>
                       </table>
                </div>
                   
                   <span class="text-danger"><?php echo form_error('personnel_name'); ?></span>
                   <span class="text-danger"><?php echo form_error('personnel_staff_student_no'); ?></span>
                   <span class="text-danger"><?php echo form_error('personnel_designation'); ?></span>
                   <span class="text-danger"><?php echo form_error('personnel_faculty'); ?></span>
                   <span class="text-danger"><?php echo form_error('personnel_project_title'); ?></span>
                   <span class="text-danger"><?php echo form_error('personnel_reference_no'); ?></span>
					   
					   <hr>
                  <div id="section_2" class="sectiontarget">
				   <table class="table table-bordered" id="section_2" >
				           <thead>
                                <tr>
                                   <th class="tblTitle" colspan="4"><h8 id="section_2"><strong>SECTION 2 – Details of the Biological Material to be Exported</strong></h8></th>
                               </tr>
                           </thead>

                       <table class="table table-bordered">
						   <tr>
                               <th colspan="4"class="tbheader1">A. List of Exempted Living Modified Organism (LMO) to be Exported</th>
							   <th colspan="1" class="tbheader1"> 
								<div class="checkbox"><label><input type="checkbox" name="LMO_list" value="1" <?php echo set_checkbox('LMO_list', '1'); ?> <?php if(isset($load)){if($item->LMO_list==1){echo "checked=checked";}}else{} ?>> Not Applicable</label>
								</div>
							   </th>
                           </tr>
                           <tbody style="width:100%">
                               <tr style="width:25%">
                                   <th>Name</th>
                                   <th>Risk Level</th>
                                   <th>Category A or B Substances</th>
                                   <th>Quantity</th>
                                   <th>Volume (g or mL)</th>                                  
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea class="form-control" name="LMO_name[0]"><?php if(isset($load)){echo set_value('LMO_name[0]', $a[0]);}else{echo set_value('LMO_name[0]');} ?></textarea></th>
                                   
                                   <th><textarea class="form-control" name="LMO_risk_level[0]"><?php if(isset($load)){echo set_value('LMO_risk_level[0]', $b[0]);}else{echo set_value('LMO_risk_level[0]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="LMO_category[0]"><?php if(isset($load)){echo set_value('LMO_category[0]', $c[0]);}else{echo set_value('LMO_category[0]');} ?></textarea></th>
                                   
                                   <th><textarea class="form-control" name="LMO_quantity[0]"><?php if(isset($load)){echo set_value('LMO_quantity[0]', $d[0]);}else{echo set_value('LMO_quantity[0]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="LMO_volume[0]"><?php if(isset($load)){echo set_value('LMO_volume[0]', $e[0]);}else{echo set_value('LMO_volume[0]');} ?></textarea></th>
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea   class="form-control" name="LMO_name[1]" ><?php if(isset($load)){echo set_value('LMO_name[1]', $a[1]);}else{echo set_value('LMO_name[1]');} ?></textarea></th>
                                   
                                   <th><textarea   class="form-control" name="LMO_risk_level[1]"><?php if(isset($load)){echo set_value('LMO_risk_level[1]', $b[1]);}else{echo set_value('LMO_risk_level[1]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="LMO_category[1]" ><?php if(isset($load)){echo set_value('LMO_category[1]', $c[1]);}else{echo set_value('LMO_category[1]');} ?></textarea></th>
                                   
                                   <th><textarea   class="form-control" name="LMO_quantity[1]"><?php if(isset($load)){echo set_value('LMO_quantity[1]', $d[1]);}else{echo set_value('LMO_quantity[1]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="LMO_volume[1]" ><?php if(isset($load)){echo set_value('LMO_volume[1]', $e[1]);}else{echo set_value('LMO_volume[1]');} ?></textarea></th>
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea   class="form-control" name="LMO_name[2]"><?php if(isset($load)){echo set_value('LMO_name[2]', $a[2]);}else{echo set_value('LMO_name[2]');} ?></textarea></th>
                                   
                                   <th><textarea   class="form-control" name="LMO_risk_level[2]"><?php if(isset($load)){echo set_value('LMO_risk_level[2]', $b[2]);}else{echo set_value('LMO_risk_level[2]');} ?></textarea></th>
                                   
                                   <th><textarea   class="form-control" name="LMO_category[2]"><?php if(isset($load)){echo set_value('LMO_category[2]', $c[2]);}else{echo set_value('LMO_category[2]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="LMO_quantity[2]"><?php if(isset($load)){echo set_value('LMO_quantity[2]', $d[2]);}else{echo set_value('LMO_quantity[2]');} ?></textarea></th>
                                   
                                   <th><textarea   class="form-control" name="LMO_volume[2]"><?php if(isset($load)){echo set_value('LMO_volume[2]', $e[2]);}else{echo set_value('LMO_volume[2]');} ?></textarea></th>
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea   class="form-control" name="LMO_name[3]"><?php if(isset($load)){echo set_value('LMO_name[3]', $a[3]);}else{echo set_value('LMO_name[3]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="LMO_risk_level[3]"><?php if(isset($load)){echo set_value('LMO_risk_level[3]', $b[3]);}else{echo set_value('LMO_risk_level[3]');} ?></textarea></th>
                                   
                                   <th><textarea   class="form-control" name="LMO_category[3]"><?php if(isset($load)){echo set_value('LMO_category[3]', $c[3]);}else{echo set_value('LMO_category[3]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="LMO_quantity[3]"><?php if(isset($load)){echo set_value('LMO_quantity[3]', $d[3]);}else{echo set_value('LMO_quantity[3]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="LMO_volume[3]"><?php if(isset($load)){echo set_value('LMO_volume[3]', $e[3]);}else{echo set_value('LMO_volume[3]');} ?></textarea></th>
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea  class="form-control" name="LMO_name[4]"><?php if(isset($load)){echo set_value('LMO_name[4]', $a[4]);}else{echo set_value('LMO_name[4]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="LMO_risk_level[4]" ><?php if(isset($load)){echo set_value('LMO_risk_level[4]', $b[4]);}else{echo set_value('LMO_risk_level[4]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="LMO_category[4]" ><?php if(isset($load)){echo set_value('LMO_category[4]', $c[4]);}else{echo set_value('LMO_category[4]');} ?></textarea></th>
                                   
                                   <th><textarea   class="form-control" name="LMO_quantity[4]" ><?php if(isset($load)){echo set_value('LMO_quantity[4]', $d[4]);}else{echo set_value('LMO_quantity[4]');} ?></textarea></th>
                                   
                                   <th><textarea   class="form-control" name="LMO_volume[4]" ><?php if(isset($load)){echo set_value('LMO_volume[4]', $e[4]);}else{echo set_value('LMO_volume[4]');} ?></textarea></th>
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea   class="form-control" name="LMO_name[5]"><?php if(isset($load)){echo set_value('LMO_name[5]', $a[5]);}else{echo set_value('LMO_name[5]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="LMO_risk_level[5]"><?php if(isset($load)){echo set_value('LMO_risk_level[5]', $b[5]);}else{echo set_value('LMO_risk_level[5]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="LMO_category[5]" ><?php if(isset($load)){echo set_value('LMO_category[5]', $c[5]);}else{echo set_value('LMO_category[5]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="LMO_quantity[5]"><?php if(isset($load)){echo set_value('LMO_quantity[5]', $d[5]);}else{echo set_value('LMO_quantity[5]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="LMO_volume[5]"><?php if(isset($load)){echo set_value('LMO_volume[5]', $e[5]);}else{echo set_value('LMO_volume[5]');} ?></textarea></th>
                               </tr>							   
                           </tbody>
                       </table>
					   
					   <table class="table table-bordered">
						   <tr>
                               <th colspan="4"class="tbheader1">B. List of Biological Material to be Exported</th>
							   <th colspan="1" class="tbheader1"> 
								<div class="checkbox"><label><input type="checkbox" name="biological_list" value="1" <?php echo set_checkbox('biological_list', '1'); ?> <?php if(isset($load)){if($item->biological_list==1){echo "checked=checked";}}else{} ?> /> Not Applicable</label>
								</div>
							   </th>
                           </tr>
                           <tbody style="width:100%">
                               <tr style="width:25%">
                                   <th class="tblTitle2">Name</th>
                                   <th class="yellowdata">Risk Level</th>
                                   <th class="yellowdata">Category A or B Substances</th>
                                   <th class="reddata">Quantity</th>
                                   <th class="reddata">Volume (g or mL)</th>                                  
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea class="form-control" name="biological_name[0]"><?php if(isset($load)){echo set_value('biological_name[0]', $f[0]);}else{echo set_value('biological_name[0]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_risk_level[0]"><?php if(isset($load)){echo set_value('biological_risk_level[0]', $g[0]);}else{echo set_value('biological_risk_level[0]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_category[0]"><?php if(isset($load)){echo set_value('biological_category[0]', $h[0]);}else{echo set_value('biological_category[0]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_quantity[0]" ><?php if(isset($load)){echo set_value('biological_quantity[0]', $i[0]);}else{echo set_value('biological_quantity[0]');} ?></textarea></th>
                                   
                                   <th><textarea   class="form-control" name="biological_volume[0]" ><?php if(isset($load)){echo set_value('biological_volume[0]', $j[0]);}else{echo set_value('biological_volume[0]');} ?></textarea></th>
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea class="form-control" name="biological_name[1]" ><?php if(isset($load)){echo set_value('biological_name[1]', $f[1]);}else{echo set_value('biological_name[1]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_risk_level[1]"><?php if(isset($load)){echo set_value('biological_risk_level[1]', $g[1]);}else{echo set_value('biological_risk_level[1]');} ?></textarea></th>
                                   
                                   <th><textarea class="form-control" name="biological_category[1]"><?php if(isset($load)){echo set_value('biological_category[1]', $h[1]);}else{echo set_value('biological_category[1]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_quantity[1]"><?php if(isset($load)){echo set_value('biological_quantity[1]', $i[1]);}else{echo set_value('biological_quantity[1]');} ?></textarea></th>
                                   
                                   <th><textarea class="form-control" name="biological_volume[1]" ><?php if(isset($load)){echo set_value('biological_volume[1]', $j[1]);}else{echo set_value('biological_volume[1]');} ?></textarea></th>
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea  class="form-control" name="biological_name[2]" ><?php if(isset($load)){echo set_value('biological_name[2]', $f[2]);}else{echo set_value('biological_name[2]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_risk_level[2]" ><?php if(isset($load)){echo set_value('biological_risk_level[2]', $g[2]);}else{echo set_value('biological_risk_level[2]');} ?></textarea></th>
                                   
                                   <th><textarea   class="form-control" name="biological_category[2]" ><?php if(isset($load)){echo set_value('biological_category[2]', $h[2]);}else{echo set_value('biological_category[2]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_quantity[2]" ><?php if(isset($load)){echo set_value('biological_quantity[2]', $i[2]);}else{echo set_value('biological_quantity[2]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_volume[2]" ><?php if(isset($load)){echo set_value('biological_volume[2]', $j[2]);}else{echo set_value('biological_volume[2]');} ?></textarea></th>
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea   class="form-control" name="biological_name[3]" ><?php if(isset($load)){echo set_value('biological_name[3]', $f[3]);}else{echo set_value('biological_name[3]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_risk_level[3]"><?php if(isset($load)){echo set_value('biological_risk_level[3]', $g[3]);}else{echo set_value('biological_risk_level[3]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_category[3]"><?php if(isset($load)){echo set_value('biological_category[3]', $h[3]);}else{echo set_value('biological_category[3]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_quantity[3]" ><?php if(isset($load)){echo set_value('biological_quantity[3]', $i[3]);}else{echo set_value('biological_quantity[3]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_volume[3]" ><?php if(isset($load)){echo set_value('biological_volume[3]', $j[3]);}else{echo set_value('biological_volume[3]');} ?></textarea></th>
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea  class="form-control" name="biological_name[4]"><?php if(isset($load)){echo set_value('biological_name[4]', $f[4]);}else{echo set_value('biological_name[4]');} ?></textarea></th>
                                   
                                   <th><textarea   class="form-control" name="biological_risk_level[4]" ><?php if(isset($load)){echo set_value('biological_risk_level[4]', $g[4]);}else{echo set_value('biological_risk_level[4]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_category[4]"><?php if(isset($load)){echo set_value('biological_category[4]', $h[4]);}else{echo set_value('biological_category[4]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_quantity[4]" ><?php if(isset($load)){echo set_value('biological_quantity[4]', $i[4]);}else{echo set_value('biological_quantity[4]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_volume[4]" ><?php if(isset($load)){echo set_value('biological_volume[4]', $j[4]);}else{echo set_value('biological_volume[4]');} ?></textarea></th>
                               </tr>
                               <tr style="width:25%">
                                   <th><textarea   class="form-control" name="biological_name[5]" ><?php if(isset($load)){echo set_value('biological_name[5]', $f[5]);}else{echo set_value('biological_name[5]');} ?></textarea></th>
                                   
                                   <th><textarea   class="form-control" name="biological_risk_level[5]" ><?php if(isset($load)){echo set_value('biological_risk_level[5]', $g[5]);}else{echo set_value('biological_risk_level[5]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_category[5]"><?php if(isset($load)){echo set_value('biological_category[5]', $h[5]);}else{echo set_value('biological_category[5]');} ?></textarea></th>
                                   
                                   <th><textarea class="form-control" name="biological_quantity[5]"><?php if(isset($load)){echo set_value('biological_quantity[5]', $i[5]);}else{echo set_value('biological_quantity[5]');} ?></textarea></th>
                                   
                                   <th><textarea  class="form-control" name="biological_volume[5]"><?php if(isset($load)){echo set_value('biological_volume[5]', $j[5]);}else{echo set_value('biological_volume[5]');} ?></textarea></th>
                               </tr>							   
                           </tbody>
                       </table>	
                      </table>			   
                   </div>
                   
				   <hr>                  
				   <div id="section_3" class="sectiontarget">                      
                       <table class="table table-bordered">
                           <thead>
                                <tr>
                                   <th class="tblTitle" colspan="10"><h8 id="section_3"><strong>SECTION 3 – Details of the Importing Country / Institute</strong></h8></th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <th>3.01   Country:</th>
                                   <td><textarea class="form-control" name="importing_country"><?php if(isset($load)){echo set_value('importing_country', $item->importing_country);}else{echo set_value('importing_country');} ?></textarea></td>
                               </tr>
							   <tr>
                                   <th>3.02   Institute Name:</th>
                                   <td><textarea  class="form-control" name="importing_institude"><?php if(isset($load)){echo set_value('importing_institude', $item->importing_institude);}else{echo set_value('importing_institude');} ?></textarea></td>
                               </tr>
                               <tr>
                                   <th>3.03   Person-in-charge (who receive the material):</th>
                                   <td><textarea   class="form-control" name="importing_person_in_charge" ><?php if(isset($load)){echo set_value('importing_person_in_charge', $item->importing_person_in_charge);}else{echo set_value('importing_person_in_charge');} ?></textarea></td>
                               </tr>
                               <tr>
                                   <th>3.04   Contact Number: </th>
                                   <td><textarea  class="form-control" name="importing_person_in_charge_telephone_no"><?php if(isset($load)){echo set_value('importing_person_in_charge_telephone_no', $item->importing_person_in_charge_telephone_no);}else{echo set_value('importing_person_in_charge_telephone_no');} ?></textarea></td>
                               </tr>                 
                           </tbody>
                       </table>
                   </div>
                <span class="text-danger"><?php echo form_error('importing_country'); ?></span>
                <span class="text-danger"><?php echo form_error('importing_institude'); ?></span>
                <span class="text-danger"><?php echo form_error('importing_person_in_charge'); ?></span>
                <span class="text-danger"><?php echo form_error('importing_person_in_charge_telephone_no'); ?></span>
                
				   
				  <div id="section_4" class="sectiontarget">
                   <table  class="table table-bordered">
                       <thead>
                           <tr>
                               <th class="tblTitle" colspan="4"><h8 id="section_4"><strong>SECTION 4 – Declaration</strong></h8></th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td colspan="2">							   
								<ul>
                                      <li>I, hereby declare that the information I have provided in this form for Notification of Exporting Biological Material is true and correct.
								   
                                      <li>Swinburne University of Technology Sarawak Campus collects, uses and destroys personal data in accordance with our Privacy Collection Notice at <a href="http://www.swinburne.edu.my/privacy/">http://www.swinburne.edu.my/privacy</a>
								        and Employee's Privacy Collection Notice at <a style="color:blue;">Blackboard>My.Swinburne>Student & Corporate Services> Human Resources>Employee's Privacy Collection Notice.</a>
								</ul>
							   </td>                               
                           </tr>
                           <tr>
                               <td><textarea  class="form-control" name="declaration_name" placeholder="Signature: your name"><?php if(isset($load)){echo set_value('declaration_name', $item->declaration_name);}else{echo set_value('declaration_name');} ?></textarea></td>
                               
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="declaration_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('declaration_date', $item->declaration_date);}else{echo set_value('declaration_date');} ?>"></td>
                           </tr>
                       </tbody>
                   </table>
                </div>
                   
				   <hr>
                <div id="section_5" class="sectiontarget">
                   <table  class="table table-bordered">
                       <thead>
                           <tr>
                               <th class="tblTitle" colspan="4"><h8 id="section_5"><strong>SECTION 5 – Signature</strong></h8></th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>                            
                               <td>Verified By(Project Investigator):</td>
                           </tr>
                           <tr>
                               <td><textarea  class="form-control" name="signature_verified_by" placeholder="Signature:"><?php if(isset($load)){echo set_value('signature_verified_by', $item->signature_verified_by);}else{echo set_value('signature_verified_by');} ?></textarea></td>
                           </tr>
                           <tr>
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="signature_verified_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('signature_verified_date', $item->signature_verified_date);}else{echo set_value('signature_verified_date');} ?>"></td>
                           </tr>
                       </tbody>
                   </table>
                </div>
                   
				   <hr>
                <div id="section_6" class="sectiontarget">
                   <table width="920" class="table table-bordered">
                       <thead>
                           <tr>
                               <th class="tblTitle" colspan="4"><h8 id="section_6"><strong>SECTION 6 – For Office Use Only</strong></h8></th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td>
                                <div class="checkbox">
                                     <label><input type="checkbox" name="notification_approved_by" value="1" <?php echo set_checkbox('notification_approved_by', '1'); ?> <?php if(isset($load)){if($item->notification_approved_by==1){echo "checked=checked";}}else{} ?>> Approved By:</label>
                                </div>
                                <div class="checkbox">
                                     <label><input type="checkbox" name="notification_declined_by" value="1" <?php echo set_checkbox('notification_declined_by', '1'); ?> <?php if(isset($load)){if($item->notification_declined_by==1){echo "checked=checked";}}else{} ?>> Declined By:</label>
                                </div>
                               </td>
                               <td style="width:450px">
                                   <textarea  class="form-control" name="notification_reviewed_by" placeholder="Reviewed by:"><?php if(isset($load)){echo set_value('notification_reviewed_by', $item->notification_reviewed_by);}else{echo set_value('notification_reviewed_by');} ?>
                               </textarea></td>
                           </tr>
                           <tr>
                               <td><textarea  class="form-control" name="signature_notification_verified_by" placeholder="Signature:" ></textarea></td>
                               
							   <td><textarea class="form-control" name="signature_notification_reviewed_by" placeholder="Signature:" ></textarea></td>
                           </tr>
                           <tr>
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="notification_approve_decline_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('notification_approve_decline_date', $item->notification_approve_decline_date);}else{echo set_value('notification_approve_decline_date');} ?>"></td>
                               
                               <td><input type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" name="notification_reviewed_by_date" placeholder="Date:" value="<?php if(isset($load)){echo set_value('notification_reviewed_by_date', $item->notification_reviewed_by_date);}else{echo set_value('notification_reviewed_by_date');} ?>" ></td>
                           </tr>
                           <tr>
                               <td>
                                   <textarea class="form-control" name="notification_approve_decline_remarks" placeholder="Remarks:"><?php if(isset($load)){echo set_value('notification_approve_decline_remarks', $item->notification_approve_decline_remarks);}else{echo set_value('notification_approve_decline_remarks');} ?>
                               </textarea></td>
                               <td>
                                   <textarea class="form-control" name="notification_reviewed_by_remarks" placeholder="Remarks:"><?php if(isset($load)){echo set_value('notification_reviewed_by_remarks', $item->notification_reviewed_by_remarks);}else{echo set_value('notification_reviewed_by_remarks');} ?>
                               </textarea></td>
                           </tr>
                       </tbody>
                   </table>
                </div>
				   
				   <hr>
				   <div id="section_7" class="sectiontarget">                     
                       <table class="table table-bordered">
                           <thead>
                                <tr>
                                   <th class="tblTitle" colspan="10"><h8 id="section_7"><strong>SECTION 7 – Follow-up of the Exported Biological Material (For Office Use Only)</strong></h8></th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <th>7.01   Delivered date:</th>
                                   <td><input type="date" class="form-control" name="delivered_date" value="<?php if(isset($load)){echo set_value('delivered_date', $item->delivered_date);}else{echo set_value('delivered_date');} ?>" ></td>
                               </tr>
                               <tr>
                                   <th>7.02   Any incident or accident occurs during the exporting?:</th>
                                   <td><textarea  class="form-control" name="incident_accident_report"><?php if(isset($load)){echo set_value('incident_accident_report', $item->incident_accident_report);}else{echo set_value('incident_accident_report');} ?></textarea></td>
                               </tr>              
                           </tbody>
                       </table>
                   </div>
				   
				   <hr>
              
                
					<div>
                    <input  type="hidden" name="appid" value="<?php if(isset($appID)){echo $appID;} ?>">
                </div>
                
                   <div style="text-align: center">
                       <?php if(isset($editload)){ ?>
                       <button type="submit" name = 'updateButton' value = 'Update' onclick="location.href='<?php echo site_url().'/notification_of_exporting_biological_material/update_form';?>'" class="btn btn-primary">Update</button>
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
					<a href="#section_6" class="btn btn-success">Section 6</a>
					<a href="#section_7" class="btn btn-success">Section 7</a>
                </div>   
            </div>
        </div>               
    </div>

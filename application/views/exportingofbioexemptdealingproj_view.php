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
    <title>Biosafety and Biosecurity Online System - New Application: Exempt Dealing Project.</title>
    
    <style>
        body {
            padding-top: 82px;
        }
        
        .btn-sample{
            position: fixed;
            margin-left: 60px;
        }
        
        #first-table{
            background-color: #95a5a6;
            text-align: center;
        }
        
        .tblTitle{
            background-color: black;
            color: white;
            text-align: center;
        }
        
        .tbheader1{
            background-color:  #95a5a6 ;
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
        if(isset($session))
        {
            
            foreach($session as $info)
            {
                $id = $info->project_id;
            } 
          
            $this->session->set_userdata("projectId", $id);
            
        }
        
        ?>
    
    
    <div class="container">
	 
        <div class="row">
		<div id='breadcrumb1'><?php echo $this->breadcrumbs->show(); ?></div>
            <div class="col-md-12">
			<br>
                <ul class="nav nav-tabs">
                    <li class="nav-item active"><a href="#notification" class="nav-link" data-toggle="tab">SSBC Notification of Exporting  Biohazardous Material</a></li>
                    
                </ul>
                
                <?php if(isset($editload)) { echo form_open('exportingofbioexemptdealingproj/update_form'); } elseif(isset($saveload)) {echo form_open('exportingofbioexemptdealingproj/continue');} else { echo form_open('exportingofbioexemptdealingproj/index'); } ?>
                <?php if(isset($disabled)){ echo "<fieldset disabled='disabled'>"; } ?>
                <div class="tab-content">
                    <div class="tab-pane active" id="notification">
                        <br/>
                        <?php include 'notification_of_exporting_biological_material_view.php' ?>
                    </div>
                    
                    
                </div>
                <?php if(isset($disabled)){ echo "</fieldset>"; } ?>
                <?php echo form_close(); ?>
                
                
            </div>
        </div>
    </div>
</body>
</html>
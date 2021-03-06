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
    <title>Biosafety and Biosecurity Online System - Notification of LMO and Biohazardous Materials.</title>
    
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
        
        .dark_background{
            background-color: black;
            color: white;
        }
        
        .tbheader1{
            background-color:  #95a5a6 ;
        }
        
        .right-side{
            text-align: right;
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
        <br>

        <div id='breadcrumb1'><?php echo $this->breadcrumbs->show(); ?></div>		

		<hr>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item active"><a href="#notif_LMO_BM_tab" class="nav-link" data-toggle="tab">Notification of LMO and Biohazardous Materials</a></li>
                </ul>
                
                <?php if(isset($editload)) { echo form_open('notification_of_LMO_and_BM_proj/update_form'); } elseif(isset($saveload)) {echo form_open('notification_of_LMO_and_BM_proj/continue');} else { echo form_open('notification_of_LMO_and_BM_proj/index'); } ?>
                <?php if(isset($disabled)){ echo "<fieldset disabled='disabled'>"; } ?>
                <div class="tab-content">
                    <div class="tab-pane active" id="notif_LMO_BM_tab">
                        <br/>
                        <?php include 'notification_of_LMO_and_BM_view.php' ?>
                    </div>
                </div>
                <?php if(isset($disabled)){ echo "</fieldset>"; } ?>
               <?php echo form_close(); ?>
                
            </div>
        </div>
    </div>
</body>
</html>
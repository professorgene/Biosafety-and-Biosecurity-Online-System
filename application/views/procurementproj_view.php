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
            padding-top: 54px;
        }
        
        .btn-sample{
            position: fixed;
            margin-left: 60px;
        }
        
        .approve_section{
            display: none;
        }
        
        .tblTitle{
            background-color: black;
            color: white;
            text-align: center;
        }
        
        .tblTitle2{
            background-color: #808080;
            color: white;
            text-align: center;
        }
        
         .dark_background{
            background-color: black;
            color: white;
        }
        
        .greendata{
            background-color: lawngreen;
        }
        
        .greendata2{
            background-color: rgb(13, 177, 75);
        }
        
        .reddata{
            background-color: red;
        }
        
        .yellowdata{
            background-color: yellow;
        }
        
        .grey-text{
            color: gainsboro;
        }
        
        .tbheader1{
            background-color:  #95a5a6 ;
        }
        
        .colspace{
            width: 50px;
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
                    <li class="nav-item active"><a href="#procurementtab" class="nav-link" data-toggle="tab">Pre-Purchase Material Risk Assessment Form</a></li>
                </ul>
                
                <?php if(isset($editload)) { echo form_open('procurementproj/update_form'); } elseif(isset($saveload)) {echo form_open('procurementproj/continue');} else { echo form_open('procurementproj/index'); } ?>
                <?php if(isset($disabled)){ echo "<fieldset disabled='disabled'>"; } ?>
                <div class="tab-content">

                    <div class="tab-pane active" id="procurementtab">
                        <?php include 'procurement_view.php' ?>
                    </div>
                    
                </div>
                <?php if(isset($disabled)){ echo "</fieldset>"; } ?>
               <?php echo form_close(); ?>
                
            </div>
        </div>
    </div>
</body>
</html>
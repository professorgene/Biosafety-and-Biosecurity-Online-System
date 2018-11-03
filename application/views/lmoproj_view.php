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
    <title>Biosafety and Biosecurity Online System - New Application: Living Modified Organisms Project.</title>
    
    <style>
        body {
            padding-top: 82px;
        }
        
        .btn-sample{
            position: fixed;
            margin-left: 60px;
        }
        
        .file-input-wrapper {
                height: 30px;
                margin: 2px;
                overflow: hidden;
                position: relative;
                width: 118px;
                background-color: #fff;
                cursor: pointer;
            }
        
            .file-input-wrapper > input[type="file"] {
                font-size: 40px;
                position: absolute;
                top: 0;
                right: 0;
                opacity: 0;
                cursor: pointer;
            }
        
            .file-input-wrapper > .btn-file-input {
                background-color: #494949;
                border-radius: 4px;
                color: #fff;
                display: inline-block;
                height: 34px;
                margin: 0 0 0 -1px;
                padding-left: 0;
                width: 121px;
                cursor: pointer;
            }
            
            .file-input-wrapper:hover > .btn-file-input {
                //background-color: #494949;
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
        
        .approve_section{
            display: none;
        }
        
        .tblTitle2{
            background-color: #808080;
            color: white;
            text-align: center;
        }
        
        .tbheader1{
            background-color:  #95a5a6 ;
        }
        
        .tbheader2{
                background-color: palegreen;
                text-align: center;
            }
        
        .centering{
            text-align: center;
        }
        
        .bluerow{
                background-color: aquamarine;
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
    
    
    <div class="container">
        
        <div id='breadcrumb1'><?php echo $this->breadcrumbs->show(); ?></div>
		
		<hr>
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
    
        <div class="row">
        
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item active"><a href="#annex2tab" class="nav-link active" data-toggle="tab">Annex 2 Form</a></li>
                    <li class="nav-item "><a href="#formetab" class="nav-link" data-toggle="tab">Form E</a></li>
                    <li class="nav-item "><a href="#pc1tab" class="nav-link" data-toggle="tab">PC1 Form</a></li>
                    <li class="nav-item "><a href="#pc2tab" class="nav-link" data-toggle="tab">PC2 Form</a></li>
                    <li class="nav-item"><a href="#hirarctab" class="nav-link" data-toggle="tab">OHS-F-4.5.X HIRARC FORM</a></li>
                    <li class="nav-item"><a href="#swptab" class="nav-link" data-toggle="tab">Safe Work Procedure</a></li>
                </ul>
                
                <?php if(isset($editload)) { echo form_open_multipart('lmoproj/update_form'); } elseif(isset($saveload)) {echo form_open_multipart('lmoproj/continue');} else { echo form_open_multipart('lmoproj/index'); } ?>
                <?php if(isset($disabled)){ echo "<fieldset disabled='disabled'>"; } ?>
                <div class="tab-content">
                    <div class="tab-pane active" id="annex2tab">
                        <br/>
                        <?php include 'annex2_view.php' ?>
                    </div>
                    
                    <div class="tab-pane fade" id="formetab">
                        <br/>
                        <?php include 'forme_view.php' ?>
                    </div>
                    
                    <div class="tab-pane fade" id="pc1tab">
                        <br/>
                        <?php include 'pc1_view.php' ?>
                    </div>
                    
                    <div class="tab-pane fade" id="pc2tab">
                        <br/>
                        <?php include 'pc2_view.php' ?>
                    </div>
                    
                    <div class="tab-pane fade" id="hirarctab">
                        <br/>
                        <?php include 'hirarc_view.php' ?>
                    </div>
                    
                    <div class="tab-pane fade" id="swptab">
                        <br/>
                        <?php include 'swp_view.php' ?>
                    </div>
                </div>
                <?php if(isset($disabled)){ echo "</fieldset>"; } ?>
               <?php echo form_close(); ?>
                
                
                
            </div>
        </div>
    </div>
</body>
</html>
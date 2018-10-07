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
    <title>Biosafety and Biosecurity Online System - New Application: Biohazardous Materials Project.</title>
    
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
        
        .centering{
            text-align: center;
        }
        
        .greendata{
            background-color: lawngreen;
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
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item active"><a href="#biohazardtab" class="nav-link" data-toggle="tab">Biohazard Material Form</a></li>
                    <li class="nav-item"><a href="#hirarctab" class="nav-link" data-toggle="tab">OHS-F-4.5.X HIRARC FORM</a></li>
                    <li class="nav-item"><a href="#swptab" class="nav-link" data-toggle="tab">Safe Work Procedure</a></li>
                </ul>
                
                <?php if(isset($editload)) { echo form_open('biohazardproj/update_form'); } else { echo form_open('biohazardproj/index'); } ?>
                <?php if(isset($disabled)){ echo "<fieldset disabled='disabled'>"; } ?>
                <div class="tab-content">
                    <div class="tab-pane active" id="biohazardtab">
                        <br/>
                        <?php include 'biohazard_view.php' ?>
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
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
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item active"><a href="#procurementtab" class="nav-link" data-toggle="tab">Pre-Purchase Material Risk Assessment Form</a></li>
                </ul>
                
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="procurementtab">
                        <br/>
                        <?php include 'procurement_view.php' ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>
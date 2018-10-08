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
        
        .blackborder{
            border-color: black;
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
		<div id='breadcrumb1'><?php echo $this->breadcrumbs->show(); ?></div>
            <div class="col-md-12">
			<br>
                <ul class="nav nav-tabs">
                    <li class="nav-item active"><a href="#ohstab" class="nav-link" data-toggle="tab">HIRARC Form</a></li>
                </ul>
                
                <div class="tab-content">
                    <div class="tab-pane active" id="ohstab">
                        <br/>
                        <?php include 'incidentaccidentreport_view.php' ?>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - Inventory and Storage Statistics</title>
    
    <style>
        body {
            padding-top: 82px;
        }
        
        .button_right {
            margin-right: 12px;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <?php include_once 'template/navbar.php' ?>
    
    <!-- Page Content -->
    <div class="container">
	<div id='breadcrumb1'><?php echo $this->breadcrumbs->show(); ?></div>
	<hr>
        <div class="text-center row">
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>index.php/inventory/stats"><button class="btn btn-info button_right" style="display:inline-block;width:225px;">Statistics</button></a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>index.php/inventory/index"><button class="btn btn-info button_right" style="display:inline-block;width:225px;">Inventory Database</button></a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>index.php/inventory/index2"><button class="btn btn-info button_right" style="display:inline-block;width:225px;">Storage Database</button></a>
            </div>
        </div>
        <br/>
        <div class="text-center row">
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>index.php/inventory/new_inventory"><button class="btn btn-info button_right" style="display:inline-block;width:225px;">New Inventory Application</button></a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>index.php/inventory/new_storage"><button class="btn btn-info button_right" style="display:inline-block;width:225px;">New Storage Application</button></a>
            </div>
        </div>
        <hr/>
		
        <div class="row">
            <div class="col-md-12">
                <h3>Statistics</h3>
                <canvas id="bar-chart-grouped" width="800" height="450"></canvas>
            </div>
            
            <script>
                new Chart(document.getElementById("bar-chart-grouped"), {
                    type: 'horizontalBar',
                    data: {
                      labels: ["Bacteria", "Fungi", "Algae", "Virus", "Human body tissue", "Blood product", "Mammalian cell line", "Biological toxin", "Others"],
                      datasets: [
                        {
                          label: "Total",
                          backgroundColor: "#727ce0",
                          data: [<?php echo $bacteriatotal[0] ?>, <?php echo $fungitotal[0] ?>,<?php echo $algaetotal[0] ?>,<?php echo $virustotal[0] ?>,<?php echo $hbttotal[0] ?>,<?php echo $bloodtotal[0] ?>,<?php echo $mcltotal[0] ?>,<?php echo $toxintotal[0] ?>,<?php echo $otherstotal[0] ?>]
                        }, {
                          label: "Teaching",
                          backgroundColor: "#e171c2",
                          data: [<?php echo $bacteriatotal[1] ?>, <?php echo $fungitotal[1] ?>,<?php echo $algaetotal[1] ?>,<?php echo $virustotal[1] ?>,<?php echo $hbttotal[1] ?>,<?php echo $bloodtotal[1] ?>,<?php echo $mcltotal[1] ?>,<?php echo $toxintotal[1] ?>,<?php echo $otherstotal[1] ?>]
                        }, {
                          label: "Research",
                          backgroundColor: "#67afeb",
                          data: [<?php echo $bacteriatotal[2] ?>, <?php echo $fungitotal[2] ?>,<?php echo $algaetotal[2] ?>,<?php echo $virustotal[2] ?>,<?php echo $hbttotal[2] ?>,<?php echo $bloodtotal[2] ?>,<?php echo $mcltotal[2] ?>,<?php echo $toxintotal[2] ?>,<?php echo $otherstotal[2] ?>]
                        }
                      ]
                    },
                    options: {
                      title: {
                        display: true,
                        text: 'Biohazard Types'
                      }
                    }
                });
            </script>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <h3>Labelling Requirements</h3>
                <div class="row">
                    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\6_LabellingRequirements\LR_1.jpg') ?>" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\6_LabellingRequirements\LR_2.jpg') ?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\6_LabellingRequirements\LR_3.jpg') ?>" alt="Third slide">			  
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?php echo base_url('assets\images\6_LabellingRequirements\LR_4.jpg') ?>" alt="Forth slide">			  
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>				
                </div>
            </div>
        </div>
        <br/>
        <br/>
    </div>
</body>
</html>
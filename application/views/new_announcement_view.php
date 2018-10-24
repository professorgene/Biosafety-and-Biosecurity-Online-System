<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">	
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
    <title>Swinburne Biosafety and Biosecurity Online System - New Announcement</title>

    <style>
        body {
            padding-top: 82px;
        }

        .portfolio-item {
            margin-bottom: 30px;
        }

        .card-img-top {
            height: auto;
            width: 100%;
        }
    </style>
</head>

<body>
<!-- Navigation -->
<?php include_once 'template/navbar.php' ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-1">
        </div>
        <br/>
        <div class="col-md-10 bg-white">
            <?php echo form_open('applicationpage/new_announcement'); ?>
            <br/>
            <legend>New Announcement</legend>
            <br/>
            <div class="form-group">
                <label for="ann_title">Announcement Title:</label>
                <input class="form-control" id="ann_title" name="ann_title" placeholder="Enter quiz name here." type="text" required/>
            </div>
            <div class="form-group">
                <label for="ann_desc">Announcement Description:</label>
                <textarea class="form-control" id="ann_desc" name="ann_desc" placeholder="Enter description here." required></textarea>
            </div>
            <?php if(isset($page)){ ?>
            <input type="hidden" id="ann_page" name="ann_page" value="<?php echo $page ?>">
            <?php } ?>
            <br/>
            <div class="form-group text-center">
                <span class="col-md-2"></span>
                <button name="submit" type="submit" class="btn btn-success col-md-3">Submit</button>
                <span class="col-md-2"></span>
                <button name="cancel" type="button" onclick="history.back()" class="btn col-md-3">Return</button>
                <span class="col-md-2"></span>
            </div>
            <?php echo form_close(); ?>
        </div>
        <div class="col-md-1">
        </div>
    </div>
</div>
<br/>
</body>
</html>
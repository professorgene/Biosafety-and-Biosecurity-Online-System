<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('isLogin')){
    redirect('landing/index');
}
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css" type="text/css">
<title>Swinburne Biosafety and Biosecurity Online System - Educational Activities</title>
    
    <style>
        body {
            padding-top: 82px;
        }
        
        a, a:hover, a:active, a:visited {
            text-decoration: none;
            color: black;
        }
        
        .button_right {
            margin-right: 12px;
        }
        
        .table {
            background-color: white;
        }
    </style>
</head>

<body>

    
    <!-- Navigation Bar -->
    <?php include_once 'template/navbar.php' ?>
    
    <?php
    
    if(isset($load)){
        foreach($comment_info as $comment){
            
        }
        
        
    }else{
           
        }
    
    ?>
    
    <!-- Page Content -->
    <div class="container">
        <hr/>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10 text-center">
                <br/>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
            <div class="col-md-1">
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10 bg-white">
                <legend>Project Comments</legend>
                <br/>
                <?php if(!isset($load)){echo form_open('comment/save_comment');?>
                <?php }else{echo form_open('comment/update_comment');} ?>
                <br/>
                
                <?php if(isset($project_info)){ ?>
                <?php foreach($project_info as $row): ?>
                
                <?php if($row->project_type == "app_lmo"){ ?>
                <div class="form-group">
                    <label for="annex2_comment">Annex 2 Comments:</label>
                    <textarea class="form-control" name="annex2_comment" ><?php if(isset($load)){echo set_value('annex2_comment', $comment->annex2_comment);}else{echo set_value('annex2_comment');} ?></textarea>
                    
                </div>
                
                <div class="form-group">
                    <label for="forme_comment">Form E Comments</label>
                    <textarea class="form-control" name="forme_comment" ><?php if(isset($load)){echo set_value('forme_comment', $comment->forme_comment);}else{echo set_value('forme_comment');} ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="pc1_comment">PC 1 Comments</label>
                    <textarea class="form-control" name="pc1_comment" ><?php if(isset($load)){echo set_value('pc1_comment', $comment->pc1_comment);}else{echo set_value('pc1_comment');} ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="pc2_comment">PC 2 Comments</label>
                    <textarea class="form-control" name="pc2_comment" ><?php if(isset($load)){echo set_value('pc2_comment', $comment->pc2_comment);}else{echo set_value('pc2_comment');} ?></textarea>
                </div>
                <?php } ?>
                
                <?php if($row->project_type == "app_bio"){ ?>
                <div class="form-group">
                    <label for="biohazard_comment">Biohazardous Material Comments</label>
                    <textarea class="form-control" name="biohazard_comment" ><?php if(isset($load)){echo set_value('biohazard_comment', $comment->biohazard_comment);}else{echo set_value('biohazard_comment');} ?></textarea>
                </div>
                <?php } ?>
                
                <?php if($row->project_type == "app_exempt"){ ?>
                <div class="form-group">
                    <label for="exempt_comment">Exempt Dealing Comments</label>
                    <textarea class="form-control" name="exempt_comment" ><?php if(isset($load)){echo set_value('exempt_comment', $comment->exempt_comment);}else{echo set_value('exempt_comment');} ?></textarea>
                </div>
                <?php } ?>
                
                <?php if($row->project_type == "app_lmo" || $row->project_type == "app_bio" || $row->project_type == "app_exempt"){ ?>
                <div class="form-group">
                    <label for="hirarc_comment">HIRARC Comments</label>
                    <textarea class="form-control" name="hirarc_comment" ><?php if(isset($load)){echo set_value('hirarc_comment', $comment->hirarc_comment);}else{echo set_value('hirarc_comment');} ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="swp_comment">SWP Comments</label>
                    <textarea class="form-control" name="swp_comment" ><?php if(isset($load)){echo set_value('swp_comment', $comment->swp_comment);}else{echo set_value('swp_comment');} ?></textarea>
                </div>
                <?php } ?>
                
                <?php if($row->project_type == "procurement"){ ?>
                <div class="form-group">
                    <label for="procurement_comment">Pre-Purchase Material Risk Assessment Comments</label>
                    <textarea class="form-control" name="procurement_comment" ><?php if(isset($load)){echo set_value('procurement_comment', $comment->procurement_comment);}else{echo set_value('procurement_comment');} ?></textarea>
                </div>
                <?php } ?>
                
                <?php if($row->project_type == "notifLMOBM"){ ?>
                <div class="form-group">
                    <label for="notif_of_LMO_BM_comment">Notification of LMO and Biohazardous Materials Comments</label>
                    <textarea class="form-control" name="notif_of_LMO_BM_comment" ><?php if(isset($load)){echo set_value('notif_of_LMO_BM_comment', $comment->notif_of_LMO_BM_comment);}else{echo set_value('notif_of_LMO_BM_comment');} ?></textarea>
                </div>
                <?php } ?>
                
                <?php if($row->project_type == "exportLMO"){ ?>
                <div class="form-group">
                    <label for="notif_of_export_bio_comment">Form F Comments</label>
                    <textarea class="form-control" name="notif_of_export_bio_comment" ><?php if(isset($load)){echo set_value('notif_of_export_bio_comment', $comment->notif_of_export_bio_comment);}else{echo set_value('notif_of_export_bio_comment');} ?></textarea>
                </div>
                <?php } ?>
                
                <?php if($row->project_type == "exportExempt"){ ?>
                <div class="form-group">
                    <label for="formf_comment">Exporting of Biological Material: Exempt Dealing or Biohazardous Material Comments</label>
                    <textarea class="form-control" name="formf_comment" ><?php if(isset($load)){echo set_value('formf_comment', $comment->formf_comment);}else{echo set_value('formf_comment');} ?></textarea>
                </div>
                <?php } ?>
                
                <?php if($row->project_type == "majorbio"){ ?>
                <div class="form-group">
                    <label for="annex3_comment">Annex 3 Comments</label>
                    <textarea class="form-control" name="annex3_comment" ><?php if(isset($load)){echo set_value('annex3_comment', $comment->annex3_comment);}else{echo set_value('annex3_comment');} ?></textarea>
                </div>
                <?php } ?>
                
                <?php if($row->project_type == "occupational"){ ?>
                <div class="form-group">
                    <label for="annex4_comment">Annex 4 Comments</label>
                    <textarea class="form-control" name="annex4_comment" ><?php if(isset($load)){echo set_value('annex4_comment', $comment->annex4_comment);}else{echo set_value('annex4_comment');} ?></textarea>
                </div>
                <?php } ?>
                
                <?php if($row->project_type == "minorbio" || $row->project_type == "majorbio" || $row->project_type == "incidentExempt" || $row->project_type == "occupational"){ ?>
                <div class="form-group">
                    <label for="incident_accident_comment">Incident or Accidents Report Comments</label>
                    <textarea class="form-control" name="incident_accident_comment" ><?php if(isset($load)){echo set_value('incident_accident_comment', $comment->incident_accident_comment);}else{echo set_value('incident_accident_comment');} ?></textarea>
                </div>
                <?php } ?>
                
                <?php if($row->project_type == "anuualfinalreport"){ ?>
                <div class="form-group">
                    <label for="annual_report_comment">Annual/Final Report Comments</label>
                    <textarea class="form-control" name="annual_report_comment" ><?php if(isset($load)){echo set_value('annual_report_comment', $comment->annual_report_comment);}else{echo set_value('annual_report_comment');} ?></textarea>
                </div>
                <?php } ?>
                
                <?php if($row->project_type == "app_lmo" || $row->project_type == "app_bio" || $row->project_type == "app_exempt" || $row->project_type == "exportLMO" || $row->project_type == "majorbio" || $row->project_type == "occupational" || $row->project_type == "anuualfinalreport"){ ?>
                <div class="form-group">
                    <label for="type">No. of SSBC members to review:</label>
                    <select <?php if(isset($load)){if($this->session->userdata('account_type') == 3){echo "disabled"; }}?> class="form-control" name="no_of_ssbc" >
                        <option value="1" <?php if(isset($load)){if($comment->no_of_ssbc == 1){echo set_select('no_of_ssbc', '1', TRUE);}} ?>>1</option>
                        <option value="2" <?php if(isset($load)){if($comment->no_of_ssbc == 2){echo set_select('no_of_ssbc', '1', TRUE);}} ?>>2</option>
                        <option value="3" <?php if(isset($load)){if($comment->no_of_ssbc == 3){echo set_select('no_of_ssbc', '1', TRUE);}} ?>>3</option>
                        <option value="4" <?php if(isset($load)){if($comment->no_of_ssbc == 4){echo set_select('no_of_ssbc', '1', TRUE);}} ?>>4</option>
                        <option value="5" <?php if(isset($load)){if($comment->no_of_ssbc == 5){echo set_select('no_of_ssbc', '1', TRUE);}} ?>>5</option> 
                    </select>
                </div>
                <?php } ?>
                
                
                <input type="hidden" name="project_id" value="<?php if(isset($row->project_id)){echo $row->project_id;} ?>">
                <input type="hidden" name="project_type" value="<?php if(isset($row->project_type)){echo $row->project_type;} ?>">
                <?php endforeach; ?>
                <?php } ?>
                
                
                <br/>
                <div class="form-group text-center">
                    <span class="col-md-2"></span>
                    <button name="save" type="submit" class="btn btn-success col-md-3">Save Comments</button>
                    <span class="col-md-2"></span>
                    
                </div>
                <?php echo form_close(); ?>
                
                <script>
                    function close(){
                        window.close;
                    }
                </script>
            </div>
            <div class="col-md-1">
            </div>
        </div>
        <br/>
    </div>
    <br/>
    
</body>
</html>
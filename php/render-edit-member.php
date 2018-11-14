<?php
require_once('../../../../wp-config.php');

$id = intval( $_REQUEST['id']);
 
 global $wpdb; 

$table_name = $wpdb->prefix . 'tbc_members';
 
$tablename = $wpdb->prefix . "tbc_members";

$member = $wpdb->get_row( "SELECT * FROM $table_name WHERE id = $id" );
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<div class="wrap"> 
    
    
   
<div class="container">
    <br>
    
    <div class="row">                    
         <div class="col-sm-8">
             <div class="panel panel-primary">
               <div class="panel-heading">
                 <h3 class="panel-title"> Edit  </h3>
                 
        
                </div>
                 
                <div class="panel-body">
                    <?php if (isset($_REQUEST['result']) && $_REQUEST['result'] == 'success') {?>
                 <div class="alert alert-success" role="alert"> Well done! You successfully updated the information. </div>
                 <?php }?>                       
                <?php  if (isset($_REQUEST['result']) && $_REQUEST['result'] == 'failed') {?>
                 <div class="alert alert-danger" role="alert"> Update failed! Please try again.</div>
                <?php } ?>
                    <div id="tbc_results"> </div>
                    <form class="form-horizontal" role="form" id="add-form" action="<?=esc_url(PLUGIN_DIR_URL . ('php/process-edit-member.php?id='.$member->id) )?>"  method="post">

                        <div class="form-group">
                          <label class="control-label col-sm-3" for="name">Name:</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" name="name" id="name" value="<?=$member->name?>">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="department">Department:</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="department" name="department" value="<?=$member->department?>">
                          </div>
                        </div>
                        
                        
                         <div class="form-group">
                          <label class="control-label col-sm-3" for="graduation-year">Graduation Year :</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="graduation" name="graduation-year"  value="<?=$member->grade_year?>">
                          </div>
                        </div>
                        
                       
                        
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="email">Email:</label>
                          <div class="col-sm-9">
                              <input type="email" class="form-control" name="tbc_email" id="tbc_email" value="<?=$member->email?>">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="phone">Phone:</label>
                          <div class="col-sm-9">
                              <input type="tel" class="form-control" id="phone" name="phone" value="<?=$member->phone?>">
                          </div>
                        </div>
                        
                         <div class="form-group">
                          <label class="control-label col-sm-3" for="address">Address:</label>
                          <div class="col-sm-9">                               
                              <textarea id="address" name="address" cols="50" rows="5"><?=$member->address?></textarea>
                          </div>
                        </div>

                        <div class="form-group">        
                          <div class="col-sm-offset-3 col-sm-9">
                             
                             <input type="submit" name="tbc-edit-member" id="<?php echo 'delete_'.$member->id.'_'. wp_create_nonce('delete_' . $member->id )?>" class="btn btn-primary btn-block update" value="<?php _e('Update','tbc') ?>" />
                              <img src="<?php echo admin_url('/images/wpspin_light.gif');?>" class="" id="tbc-icon-load" style="display: none" />
                         
                          </div>
                        </div>

            </form>
               
                 <a class="btn btn-primary" href="<?php echo site_url() .'/wp-admin/admin.php?page=all-member' ?>">Go Back </a> 
               
                
                </div>
            </div>          
          
        </div>
        
        <div class="col-sm-4">
           
        </div>
        
    </div>
        
    
</div> <!-- /container -->
</div>
 
 

  
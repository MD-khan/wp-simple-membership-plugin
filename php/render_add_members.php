<?php function tbc_render_add_member() {?>
<div class="wrap"> 
<div class="container">
    <br>
    
    <div class="row">                    
         <div class="col-sm-8">
             <div class="panel panel-primary">
               <div class="panel-heading">
                 <h3 class="panel-title"> Add a New DUAANE  Member </h3>
                </div>
                 
                <div class="panel-body">
                    <div id="tbc_results"> </div>
                    <form class="form-horizontal" role="form" id="add-form" action="" method="post">

                        <div class="form-group">
                          <label class="control-label col-sm-3" for="name">Name:</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" name="name" id="name" placeholder="Enter member full name here">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="department">Department:</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="department" name="department" placeholder="Enter department name here">
                          </div>
                        </div>
                        
                        
                         <div class="form-group">
                          <label class="control-label col-sm-3" for="graduation-year">Graduation Year :</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="graduation" name="graduation-year" placeholder="Enter graduation year here">
                          </div>
                        </div>
                        
                       
                        
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="email">Email:</label>
                          <div class="col-sm-9">
                              <input type="email" class="form-control" name="tbc_email" id="tbc_email" placeholder="Enter email address here">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="phone">Phone:</label>
                          <div class="col-sm-9">
                              <input type="tel" class="form-control" id="phone" name="phone"placeholder="Enter phone number here">
                          </div>
                        </div>
                        
                         <div class="form-group">
                          <label class="control-label col-sm-3" for="address">Address:</label>
                          <div class="col-sm-9">                               
                              <textarea id="address" name="address" cols="50" rows="5"></textarea>
                          </div>
                        </div>

                        <div class="form-group">        
                          <div class="col-sm-offset-3 col-sm-9">
                             <input type="submit" name="tbc-add-member" id="tbc-submit" class="button-primary" value="<?php _e('Submit','tbc') ?>" />
                              <img src="<?php echo admin_url('/images/wpspin_light.gif');?>" class="" id="tbc-icon-load" style="display: none" />
                          </div>
                        </div>

            </form>
                </div>
            </div>          
          
        </div>
        
        <div class="col-sm-4">
           
        </div>
        
    </div>
        
    
</div> <!-- /container -->
</div>
<?php } add_shortcode( 'add_members', 'tbc_render_add_member' );
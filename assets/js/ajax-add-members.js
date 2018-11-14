jQuery(document).ready(function(){ 
     jQuery('#add-form').submit(function(e) {
       
       e.preventDefault();
      //var ajaxurl = "<?php ?>"
      
      data = {
          action: 'tbc_add_members',
          name: jQuery('#name').val(),
          department: jQuery('#department').val(),
          grader_year: jQuery('#graduation').val(),          
          email: jQuery('#tbc_email').val(),
          phone:jQuery('#phone').val(),
          address:jQuery('#address').val(),
          tbc_add_member_nonce: tbc_vars.tbc_add_member_nonce
      };
      
      var check_empty_fileds = jQuery.isEmptyObject(data.name && data.department && data.grader_year && data.email && data.phone && data.address);
      
      if (check_empty_fileds) {
          jQuery('#tbc_results').html('<div class="alert alert-warning" role="alert"> All fields are required</div');
           
         return false;
        
      } 
       
      
      jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
           beforeSend: function() {
             jQuery('#tbc-icon-load').show();      
             jQuery('#tbc-submit').attr('disabled', true);
        },
            success:function(response) {
            jQuery('#tbc_results').html(response);
            jQuery('#add-form')[0].reset();
           
          
             },
            
           async:true
           
});

    jQuery('#tbc-icon-load').hide();
   jQuery('#tbc-submit').attr('disabled', false);
   return false;
     
     
     
   });
});
jQuery(document).ready(function() {
  
   data = {
        action: 'tbc_all_members',
        tbc_all_member_nonce: tbc_vars.tbc_all_member_nonce
      };
      
       jQuery.post(ajaxurl, data, function(response){
         
        jQuery('#tbc-member-results').html(response);        
       
      });
  
    // Edit
     
    jQuery('#table-example').DataTable();
});
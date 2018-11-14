<?php

function tbc_admin_enqueue_scripts($hook) {
   	
    global $main_member_settings , $add_member_setings, $all_members_setings, $message_settings;
   
      wp_enqueue_style( 'bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"  );
       
      
     
      wp_enqueue_style( 'style-name', '//cdn.datatables.net/1.10.12/css/jquery.dataTables.css' );
       
       wp_enqueue_script(
                        'data_tables', 
                        '//cdn.datatables.net/1.10.12/js/jquery.dataTables.js',
                         array('jquery'), // or array(), or array('jquery') if this depends on jQuery
                        '1.0', // or your plugin version, or the version of the js file
                         true   // $in_footer
                    );
      
      wp_enqueue_script(
                        'table', 
                         PLUGIN_DIR_URL .'assets/js/data-table.js',
                       false, // or array(), or array('jquery') if this depends on jQuery
                        '1.0', // or your plugin version, or the version of the js file
                         true   // $in_footer
                    );
      
      
    if( $hook == $main_member_settings)  {         
        
        wp_enqueue_script('admin_main_script',  PLUGIN_DIR_URL.'assets/js/ajax-add-members.js', array('jquery'));
        
        wp_localize_script('admin_main_script', tbc_vars, array(            
            'tbc_nonce' => wp_create_nonce('tbc_nonce')) 
        );
        return;      
    }
     
    //ADD MEMBERS 
    if( $hook == $add_member_setings ) {        
     
        wp_enqueue_script('admin_add_member_script',  PLUGIN_DIR_URL.'assets/js/ajax-add-members.js', array('jquery'));
       
        wp_localize_script('admin_add_member_script', tbc_vars, array(            
            'tbc_add_member_nonce' => wp_create_nonce('tbc_add_member_nonce')) 
        );
        /**
       wp_localize_script( 'admin_add_member_script', 'tbc_vars', 
               array( 'ajaxurl' => admin_url( 'admin-ajax.php' ),
                   'tbc_add_member_nonce' => wp_create_nonce('tbc_add_member_nonce'))
               );
         * 
         */
        return; 
        
        
        
    }
    
    if( $hook == $all_members_setings ) {        
     
        wp_enqueue_script('admin_all_member_script',  PLUGIN_DIR_URL.'assets/js/ajax-all-members.js', array('jquery'));
        
        wp_localize_script('admin_all_member_script', tbc_vars, array(            
            'tbc_all_member_nonce' => wp_create_nonce('tbc_all_member_nonce')) 
        );
        
      
         // wp_enqueue_script('admin_edit_member_script',  PLUGIN_DIR_URL.'assets/js/ajax-delete-member.js', array('jquery'));
        
     
     
       
       
       return;    
           
     }
     
      
          
           
}
  
add_action('admin_enqueue_scripts', 'tbc_admin_enqueue_scripts');

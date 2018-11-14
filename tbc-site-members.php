<?php
/**
 * Plugin Name: Site Members
 * Plugin URI: http://tecbraces.com
 * Description: This plugin adds site members and send them message.
 * Version: 1.0.0
 * Author: MD Monirujaman Khan
 * Author URI: http://monirkhan.net
 * License: GPL2
 */
?>
<?php
// security
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'PLUGIN_DIR_PATH', plugin_dir_path( __FILE__) );

define('PLUGIN_DIR_URL',  plugin_dir_url(__FILE__) );

 
 /**
 * Enqueue scripts and style
 */
require_once PLUGIN_DIR_PATH . 'php/srcipt-setup.php';


// Add main menu called MEMBERS 
require_once PLUGIN_DIR_PATH . 'php/setup-admin-panel-pages.php';
 

function tbc_render_member_main_page() {
    
     
    echo 'main page';
}

/**
 * Render : views
 */
// Render Add members
require_once PLUGIN_DIR_PATH . 'php/render_add_members.php';


// Render retrive members
require_once PLUGIN_DIR_PATH . 'php/render-retrive-members.php';

//Render message
require_once PLUGIN_DIR_PATH . 'php/render-message.php';



/**
 * 
 * Ajax 
 */

// ajax process add members
require_once PLUGIN_DIR_PATH . 'php/ajax-add-members.php';

// ajas process retrive members
require_once PLUGIN_DIR_PATH . 'php/ajax-retrive-members.php';

 
/**
* Database 
 */

// Create table 
require_once PLUGIN_DIR_PATH . 'php/db-create-member-table.php';
register_activation_hook(__FILE__, 'tbc_install_member_table');
 



function delete_row() {    
 
  $mixed_data = explode('_', $_POST['element_id']);
  $id = intval($mixed_data[1]);
  $noce = $mixed_data[2];
  $is_noce = wp_verify_nonce($noce,  $mixed_data[0] . '_' . $mixed_data[1]);
  
   if ( $is_noce ) {
        
        global $wpdb;	
	$table_name = $wpdb->prefix . 'tbc_members';
        
        $delete = $wpdb->delete( $table_name, array( 'id' => $id ) );
            if( $delete){
                
                echo 'del_sucess';
                  die();
            }
            return;
        die();
   }

   echo 'Security check failed';
  
  
  
  die();

}
add_action('wp_ajax_delete_member', 'delete_row');
//add_action( 'wp_ajax_nopriv_your_delete_action', 'delete_row');

?>
 <script>
    jQuery(document).ready(function() { 
        
    jQuery(document).on('click', '.delete', function () {        
        if (confirm('Are you sure, You want to delete a member? Press YES or Cancel')) {        
    var id = this.id;
    jQuery.ajax({        
        type: 'POST',
        url: ajaxurl,
        data: {"action": "delete_member", "element_id": id},
        success: function (data) {            
            alert('A member has been deleted')
            console.log(data);
           location.reload();
          }     
       });
    }
    });




jQuery('#table-example').DataTable();
 }); 
</script>
<?php

require_once('../../../../wp-config.php');

$id = intval( $_REQUEST['id']);
 
 global $wpdb; 

$table_name = $wpdb->prefix . 'tbc_members';
 
  
$update = $wpdb->update( $table_name, array( 
                                    'name' => sanitize_text_field($_POST['name']), 
                                    'department' => sanitize_text_field($_POST['department']),                                     
                                    'grade_year' => sanitize_text_field($_POST['graduation-year']), 
                                    'email' => sanitize_email($_POST['tbc_email']), 
                                    'phone' => sanitize_text_field($_POST['phone']), 
                                    'address' => sanitize_text_field($_POST['address'])
                                    ),
                                    array( 'id' => $id  )
                              
                                 ); 
 if( $update) {
     
    header('Location: ' . PLUGIN_DIR_URL ."php/render-edit-member.php?id=$id&result=success");
    
 } else {
 
 header('Location: ' . PLUGIN_DIR_URL ."php/render-edit-member.php?id=$id&result=failed");
 }
 
 
<?php
function tbc_admin_page() {
     
    global $main_member_settings , $add_member_setings, $all_members_setings, $message_settings;
    
    $main_member_settings = add_menu_page( __( 'Members', 'tbc' ),__( 'Members', 'tbc' ),'manage_options','member-main','tbc_render_member_main_page','dashicons-groups', 2 );

    $add_member_setings = add_submenu_page( 'member-main', 'Add', 'Add Member', 'manage_options', 'add-member', 'tbc_render_add_member');
    
    $all_members_setings = add_submenu_page( 'member-main', 'All Members', 'All Members', 'manage_options', 'all-member', 'tbc_render_all_member');
    
     remove_submenu_page('member-main','member-main');
  //  $message_settings = add_submenu_page( 'member-main', 'Messages', 'Messages', 'manage_options', 'message', 'tbc_render_messages');

     // REMOVE THE SUBMENU CREATED BY add_menu_page
   //global $submenu;
    //unset( $submenu['member'][0] );
    
}

  
add_action('admin_menu', 'tbc_admin_page');
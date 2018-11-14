<?php
 function tbc_install_member_table () {
     
   global $wpdb;
   
   global $tbc_member_db_version;
   $tbc_member_db_version = '1.0';

   $table_name = $wpdb->prefix . "tbc_members"; 
    
   
   $charset_collate = $wpdb->get_charset_collate();

   $sql="CREATE TABLE IF NOT EXISTS $table_name (id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(100) DEFAULT NULL,
        department varchar(100) DEFAULT NULL,
        grade_year varchar(20) DEFAULT NULL,
        email varchar(255) DEFAULT NULL,
        phone varchar(40) DEFAULT NULL,
        address text DEFAULT NULL,
        posted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        UNIQUE KEY  id (id))
        $charset_collate;";     

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );
   
   add_option( 'tbc_member_db_version', $tbc_member_db_version );
}
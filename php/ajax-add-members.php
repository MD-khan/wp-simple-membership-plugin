<?php
function tbc_ajax_process_add_member(){
    
    if( !isset($_REQUEST['tbc_add_member_nonce']) || !wp_verify_nonce($_REQUEST['tbc_add_member_nonce'], 'tbc_add_member_nonce')) {
        die('Permission check failed');
        return;
    }
    
   // insert data 
    global $wpdb;	
	$table_name = $wpdb->prefix . 'tbc_members';
      
        $name = $_POST['name'];
        $department = $_POST['department'];
        $grader_year = $_POST['grader_year'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
	$address = $_POST['address'];
        
        //Check if email is exist
        $email_results = $wpdb->get_row ("SELECT email FROM $table_name WHERE email = '".$email."'");
        
        if (count ($email_results) > 0) { ?>
            <div class="alert alert-danger" role="alert"> 
                Action failed! Member already exist with email: <?=$email_results->email?>
            </div
        <?php                        
            die();
            return;
        } 
     // Insert if member is new 
	$wpdb->insert( 
		$table_name, 
		array( 
                    'name' => $name,
                    'department' => $department,
                    'grade_year' => $grader_year,                    
		    'email' => $email,
                    'phone' => $phone,
                    'address' => $address
                 ) 
	);
        ?> <div class="alert alert-success" role="alert"> Action Success: You have successfully added <?=$name?></div>
<?php      
    die();
         
    
}
add_action('wp_ajax_tbc_add_members', 'tbc_ajax_process_add_member');

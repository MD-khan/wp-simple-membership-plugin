<?php
function tbc_process_ajax_retrive_members()

{
  if( !isset($_POST['tbc_all_member_nonce']) || !wp_verify_nonce($_POST['tbc_all_member_nonce'], 'tbc_all_member_nonce')) {
        die('Permission check failed');
        return;
    } 
    
    global $wpdb;
    
    $table_name = $wpdb->prefix . "tbc_members"; 
    
    $members = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $table_name ") );
      
   if(count($members) > 0 ) {?>
 <div id="example_wrapper" class="dataTables_wrapper table-responsive">
    
     <span id="del-results"></span>
     <table id="table-example" class="display dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
        <thead>
                <tr role="row">
                    
                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 136px;">Name</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 216px;">Department</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 102px;">Year</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 42px;">Email </th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 92px;">Phone</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 79px;">Action</th>
                
                </tr>
        </thead>
       
        <tfoot>
                <tr>
                    <th rowspan="1" colspan="1">Name</th>
                    <th rowspan="1" colspan="1">Department</th>
                    <th rowspan="1" colspan="1">Year</th>
                    <th rowspan="1" colspan="1">Email</th>
                    <th rowspan="1" colspan="1">Phone</th>
                    <th rowspan="1" colspan="1">Action</th>
                </tr>
        </tfoot
        
     <tbody>	 
    <?php    
     foreach ( $members as $member ) { ?>  
    <tr role="row" class="odd">
        <td class="sorting_1"> <?=$member->name?> </td>
        <td><?=$member->department?></td>
        <td><?=$member->grade_year?></td>
        <td><?=$member->email?></td>
        <td><?=$member->phone?></td>
        <td>
           <button  class="delete btn  btn-danger btn-sm" id="<?php echo 'delete_'.$member->id.'_'. wp_create_nonce('delete_' . $member->id )?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>
           |
           <a class="btn btn-sm btn-success" href="<?php echo esc_url(PLUGIN_DIR_URL . ('php/render-edit-member.php?id='.$member->id))?>"> Edit  </a>
        </td>
        <?php ?>
      </tr> 
          <?php }  die(); ?>
     </tbody>
    
     </table>
   
 </div>
   <?php }  echo 'No members found!'; ?>    
   <?php
      die();
}
add_action('wp_ajax_tbc_all_members', 'tbc_process_ajax_retrive_members');
//Here need to add delete action  
?>
 
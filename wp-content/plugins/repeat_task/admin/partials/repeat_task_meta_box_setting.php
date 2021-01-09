<h3 class="bg-danger">hey here is the settings of those all post types which are availabble in your site.. so choose the options in which youu wantto specify the meta-box</h3>
<div class="text-center">
<!-- code for show the post types -->
<?php
$args = array(
   'public'   => true,
   '_builtin' => false
);
$output = 'names'; // 'names' or 'objects' (default: 'names')
$operator = 'or'; // 'and' or 'or' (default: 'and')  
$post_types = get_post_types( $args, $output, $operator );
echo '<form method = "POST">';
$array_for_checked_data = [];
$checked_data = get_option('insert_cheked_data_for_meat_box');
if ( $post_types ) { // If there are any custom public post types.  
    $checked='';
    foreach ( $post_types  as $post_type ) {
        if($post_type == 'attachment') { 
            continue;
        }
        if(in_array($post_type,$checked_data)) {
            $checked = "checked";
        } else{
            $checked='';
        }
    ?>
    <input type="checkbox" class="check_box_meta_box_1" name = "check_box_meta_box_1[]" value="<?php echo $post_type; ?>" <?php echo $checked?>><?php echo $post_type; ?><br>
    <?php
    }
    echo '<input type="button" value="Meta-Box-Shown" name="show_metabox" id="show_metabox"></form>';
}
?>
</div>
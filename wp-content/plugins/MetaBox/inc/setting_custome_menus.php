<?php
add_action( 'admin_menu', 'ced_mat_box_setting' );
/**
 * ced_mat_box_setting
 *
 * @return void
 */
function ced_mat_box_setting() {
    add_menu_page(
        'meta-box-setting',
        'Meta Setting',
        'manage_options',
        'meta-setting',
        'ced_mat_box_setting_html',
        'dashicons-admin-network',
        5
    );
}
/**
 * ced_mat_box_setting_html
 *
 * @return void
 */
function ced_mat_box_setting_html() {  
    $args = array(
       'public'   => true,
       '_builtin' => false
    );  
    $output = 'names'; // 'names' or 'objects' (default: 'names')
    $operator = 'or'; // 'and' or 'or' (default: 'and')
    echo '<h3 style="color:red;">hey Here You can choose the option for show the meta boxes</h3>'; 
    $post_types = get_post_types ( $args, $output, $operator );
    echo "<form action='' method='post'>";
    if ($post_types ) { // If there are any custom public post types.
        $posttypecheck=get_option('custom_meta_choice');
        foreach ( $post_types  as $post_type ) {
            $checked="";
            if (is_array($posttypecheck)) {
                if (in_array($post_type, $posttypecheck)) {
                    $checked="checked";
                } else {
                    $checked="";
                }
            } else {
                $checked="";
            }
            ?>
            <input type="checkbox" id="check_box" name="check_box[]" value="<?php echo $post_type ?>" <?php echo $checked ?>>  <?php echo $post_type ?>
            <?php
        }
        echo '<input type="submit" name="save_choice" value="Save_Choice"></form>';  
    }
}
// insert the selected data into option table 
if (isset($_POST['save_choice'])) {
    $choice=$_POST['check_box'];
    update_option('custom_meta_choice', $choice);
    }
?>
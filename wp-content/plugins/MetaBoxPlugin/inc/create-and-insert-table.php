<?php

// CRAETE A FUNCTION FOR CARETING A TABLE IN DB DURING INSTALLATION OR ACTIAVTION  OF PLUGIN

function Ced_Table_for_subscribe_data() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'Subscribe_data';

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        e_mail text(15) NOT NULL,
        post_id text(10) NULL,
        UNIQUE KEY id (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
register_activation_hook( __FILE__, 'Ced_Table_for_subscribe_data' );

Ced_Table_for_subscribe_data();
        
// methodes for insret the data into cpost_meta table 
function Ced_insert_data_subscrbe() {
    if(isset($_POST['submit_email'])) {
        $var = array();
            $email = $_POST['email'];
            $id = $_POST['get_id'];   
            $var = get_post_meta($id, 'ced_subscribed_email',1); 
            if(!empty($var)) {
                $var[] = $_POST['email']; 
            } else {
                $var = array($_POST['email']);
            }
            update_post_meta($id, 'ced_subscribed_email', $var);


    // global $wpdb;    
    // $table_name = $wpdb->prefix . 'Subscribe_data';
    
    // $wpdb->insert( 
    //     $table_name, 
    //     array( 
    //         'time' => current_time( 'mysql' ), 
    //         'e_mail' => $email, 
    //         'post_id' => $id, 
    //     ) 
    // );
}
}
// register_activation_hook( __FILE__, 'Ced_insert_data_subscrbe' );
Ced_insert_data_subscrbe();
?>
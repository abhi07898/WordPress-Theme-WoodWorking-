<?php
// function for create a table in DB
global $jal_db_version;
$jal_db_version = '1.0';

function jal_install() {
    global $wpdb;
    global $jal_db_version;

    $table_name = $wpdb->prefix . 'custome_plugin_table';
    
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (

        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        name tinytext NOT NULL,
        contact text NOT NULL,
        e_mail text NOT NULL,
        address text NOT NULL,
        url varchar(55) DEFAULT '' NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( 'jal_db_version', $jal_db_version );
}
register_activation_hook( __FILE__, 'jal_install' );

// create a funtopn for short code generatore 
function contact_form($da) {
   
    $Contact = "This is the form .. If you fill this it will gerae for us to cjhekc the some conecpt of plugins";
    $Contact .= '<form method="POST"><table style="border:2px solid black;">
    <tr><td style = "padding:10px 30px;border:1px solid black;">Name</td><td style = "padding:10px 30px;border:1px solid black;"><input type="text" name="name" id="name"></td></tr>
    <tr><td style = "padding:10px 30px;border:1px solid black;">Contact</td><td style = "padding:10px 30px;border:1px solid black;"><input type="number" name="contact" id="contact"></td></tr>
    <tr><td style = "padding:10px 30px;border:1px solid black;">E_mail</td><td style = "padding:10px 30px;border:1px solid black;"><input type="email" name="email" id="email"></td></tr>
    <tr><td style = "padding:10px 30px;border:1px solid black;">Address</td><td style = "padding:10px 30px;border:1px solid black;"><input type="text" name="address" id="address"></td></tr>
    <tr><td style = "padding:10px 30px;border:1px solid black;">URL</td><td style = "padding:10px 30px;border:1px solid black;"><input type="url" name="url" id="url"></td></tr>
    <tr><td style = "padding:10px 30px;border:1px solid black;"> </td><td style = "padding:10px 30px;border:1px solid black;"><input type="submit" value="click for save in db" id="submit" name="submit"></td></tr></form>';
    ECHO $Contact;
}
add_shortcode('contact_short_code_112asdf','contact_form');
         function jal_install_data() {
            if(isset($_POST['submit'])){
                 $name = $_POST['name'];
                 $contact = $_POST['contact'];
                 $email = $_POST['email'];
                 $address = $_POST['address'];
                 $url = $_POST['url'];
                 global $wpdb;          
                 $table_name = $wpdb->prefix . 'custome_plugin_table';    
                 $wpdb->insert( 
                    $table_name, 
                    array( 
                        'time'      => current_time( 'mysql' ), 
                        'name'      => $name, 
                        'contact'   => $contact, 
                        'e_mail'    => $email,
                        'address'   => $address,
                        'url'       => $url
                    ) 
                  
                );
                  echo '<pre>';
                    print_r($wpdb);  die();
            }
        }
        jal_install_data();

?>
    

// }

















<?php
function Ced_show_Customplugin_data() {
    global $wpdb;
    // this adds the prefix which is set by the user upon instillation of wordpress
    $table_name = $wpdb->prefix . "Custome_plugin";
    // this will get the data from your table
    $retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name" );
    ?>
    <ul>
    <?php foreach ($retrieve_data as $retrieved_data){ ?>
    <li><?php echo $retrieved_data->name;?></li>
    <li><?php echo $retrieved_data->address;?></li>
    <li><?php echo $retrieved_data->url;?></li>
    <?php 
    }
    ?>
    </ul>   
    <?php
}
Ced_show_Customplugin_data();
?>

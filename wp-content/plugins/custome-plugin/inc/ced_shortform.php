<?php
/**
 * cedCoss_wordpress_plugin_demo
 *
 * @param  mixed $atts
 * @return void
 */
function ced_shortcode_form($atts) {
   $Contact = '<form   method="POST"><table style="border:2px solid black;">
    <tr><td style = "padding:10px 30px;border:1px solid black;">Name</td><td style = "padding:10px 30px;border:1px solid black;"><input type="text" name="name" id="name"></td></tr>
    <tr><td style = "padding:10px 30px;border:1px solid black;">Contact</td><td style = "padding:10px 30px;border:1px solid black;"><input type="number" name="contact" id="contact"></td></tr>
    <tr><td style = "padding:10px 30px;border:1px solid black;">E_mail</td><td style = "padding:10px 30px;border:1px solid black;"><input type="email" name="email" id="email"></td></tr>
    <tr><td style = "padding:10px 30px;border:1px solid black;">Address</td><td style = "padding:10px 30px;border:1px solid black;"><input type="text" name="address" id="address"></td></tr>
    <tr><td style = "padding:10px 30px;border:1px solid black;">URL</td><td style = "padding:10px 30px;border:1px solid black;"><input type="url" name="url" id="url"></td></tr>
    <tr><td style = "padding:10px 30px;border:1px solid black;"> </td><td style = "padding:10px 30px;border:1px solid black;"><input type="submit" value="click for save in db" id="submit" name="submit"></td></tr></form>';    
    return $Contact;

}
add_shortcode("contact_plugin_short_code", 'ced_shortcode_form'); 
 
 /**
  * used for store thr data in a table which created during the actuvation of plugin(wp_custome_plugin) table.
  * ced_insertdata_Custome_plugin
  *
  * @return void
  */
 function ced_insertdata_Custome_plugin() {
            if(isset($_POST['submit'])){
                 $name = $_POST['name'];
                 $contact = $_POST['contact'];
                 $email = $_POST['email'];
                 $address = $_POST['address'];
                 $url = $_POST['url'];
                 global $wpdb;          
                 $table_name = $wpdb->prefix . 'Custome_plugin';    
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
                echo '<script>alert("Insert ho Gyaa")</script>';
              
            }
        }
         ced_insertdata_Custome_plugin();    
?>
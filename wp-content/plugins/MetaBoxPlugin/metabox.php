<?php
/**
 * @package Akismet
 */
/*
Plugin Name: Custom-Meta Box(for store	)
Plugin URI: https://cedcoss.com/
Description: Custome -mat bos designed and eated by me on so,e pages like custome and pages and plosts Used by millions, Custome-Plugin is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. Its a plugin that ceraerted during the test of all learned concept: activate the Akismet plugin and then go to your Akismet Settings page to set up your API key.
Version: 4.1.7
Author: Abhishek (Woo-Commerce)
Author URI: https://cedcommerce/blog.com
License: GPLv2 or later
Text Domain: Custome-Plugin
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/
// directory file 

if(!defined ("CED_PLUGIN_DIR_PATH") ) {
    define("CED_PLUGIN_DIR_PATH",plugin_dir_path(__FILE__)); 
}

if(!defined( 'CED_PLUGIN_URL')) {
    define('CED_PLUGIN_URL', plugins_url());   
}

// including css and js file 
if (!function_exists("ced_plugins_scripts")) {
    add_action('admin_enqueue_scripts', 'ced_plugins_scripts');
    function ced_plugins_scripts() {
        wp_enqueue_style('ced_css', CED_PLUGIN_URL.'assets/css/style.css');
        wp_enqueue_script('ced_js', CED_PLUGIN_URL.'assets/js/main.js');
    }   
}
// create a function for add meta box on pre define pages 
function Ced_custome_neta_box() {
    //page
    add_meta_box("ced-page-id", "Ced Page Metabox", "ced_pages_function", "page", "normal", "high");
    //post
    add_meta_box("ced-post-id", "Ced Post Metabox", "ced_post_function", "post", "side", "high");
    // portfolio a new meta box
    add_meta_box( "ced-portofolio-id", "Ced(GitHub)Another-Meta Box", "ced_another_metabox", "portofolio","side", "low" );
}
add_action("add_meta_boxes", "Ced_custome_neta_box");
// call back function for post meta box 
function ced_post_function() {
    // echo "post Data Meta Box";
}
// call back function for page meta box 
function ced_pages_function() {
    // echo "This is page funciton for pshow the details Meta Box";
}
function ced_another_metabox() {
    ?>
    <p>Git Hub link of my post</p>
    <p><a href="https://github.com/abhi07898" target="_blank">Github link</a></p>
    <?php
}
ced_post_function();
ced_pages_function();
// create a function for add the met box on cusotme post types
function ced_metaBox_for_custome_post() {
    //custom post type  
    add_meta_box("ced-cpt-id", "ced Portfolio Metabox", "ced_portfolio_function", "portofolio", "side", "high");
}
add_action("add_meta_boxes_portofolio", "ced_metaBox_for_custome_post");
// functio for show teh  conthen on portfolio page 
function ced_portfolio_function(){
    echo "hii this is a custome meta box for practise the meta concept";
    $data = get_post_meta(161, "portfolio_meta_data",true);
    ?>
        <p>
            <label for="protfolio_name">Portfolio Custome Title</label>
            <input type="port" name="port" placeholder="custom title" value="<?php echo $data;?>">
        </p>
    <?php
}


add_action("save_post", "save_the_meta_box_data", 10, 2); 
function save_the_meta_box_data($post_id, $post) {
    $post_slug = "portofolio";
    if($post_slug!= $post->post_type) {
        return;
    }
    $port_title_custom = '';
    if(isset($_POST['port'])) {
        $port_title_custom = sanitize_text_field( $_POST['port']);
    }else {
        $port_title_custom= '';
    }
    // insert the data into post_meta table 
    update_post_meta($post_id, "portfolio_meta_data",$port_title_custom);
}
// create a custome meta box for show the all post types 
function show_all_post_type_metaBox() {
    add_meta_box('posts-id', 'POST TYPES', 'ced_all_post_callbackfun', 'portofolio','side') ;
}
add_action("add_meta_boxes", 'show_all_post_type_metaBox');
function ced_all_post_callbackfun() {
    $data = get_users();
    
    foreach($data as $key => $val) {
        ?>
            <br><input type="checkbox" name="checkbox" value="<?php echo $val?>"> <?php echo $val;?>
        <?php
    }
}


// learn with develpoer site 
function wporg_add_custom_box() {
    $screen_array = get_option('custom_meta_choice');
    $screens = [ $screen_array ];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'wporg_box_id',                 // Unique ID
            'Custom Meta Box Title',      // Box title
            'wporg_custom_box_html',  // Content callback, must be of type callable
            $screen,
            'side'                            // Post type
        );
    }
    // add_option('custom_meta_choice','','yes' );
}
add_action( 'add_meta_boxes', 'wporg_add_custom_box' );
function wporg_custom_box_html( $post ) {
    ?>
    <label for="wporg_field">Description for this field</label>
    <select name="wporg_field" id="wporg_field" class="postbox">
        <option value="">Select something...</option>
        <option value="something">Something</option>
        <option value="else">Else</option>
    </select>
    <?php
}
include_once CED_PLUGIN_DIR_PATH."inc/setting_custome_menus.php";  
?>
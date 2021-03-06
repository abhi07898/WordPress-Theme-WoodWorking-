<?php
/**
 * @package Akismet
 */
/*
Plugin Name: WooCommerce-Test-PLugin
Plugin URI: https://cedcoss.com/
Description: Used by millions, Custome-Plugin is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. Its a plugin that ceraerted during the test of all learned concept: activate the Akismet plugin and then go to your Akismet Settings page to set up your API key.
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
    define('CED_PLUGIN_URL',plugin_dir_url(__FILE__));   
}

// including css and js file 
if (!function_exists("ced_plugins_scripts")) {
    function ced_plugins_scripts() {
        wp_enqueue_style('ced_css', CED_PLUGIN_URL.'assets/css/style.css');
        // wp_enqueue_style('ced_css_boot', CED_PLUGIN_URL.'assets/bootstrap/css/bootstrap.min.css');
        wp_enqueue_script('ced_js', CED_PLUGIN_URL.'assets/js/main.js');
        // wp_enqueue_script('ced_js_boot', CED_PLUGIN_URL.'assets/bootstrap/js/bootstrap.min.js');
    }
    add_action('wp_enqueue_scripts','ced_plugins_scripts');
}
// create a admin Menu
add_action( 'admin_menu', 'Ced_Create_Custome_menu' );

function Ced_Create_Custome_menu() {
    add_menu_page(
        'Menu Test', //page name 
        'Test-Menu',  //menus name
        'manage_options', //admin level
        'test-menu', //page slug
        'Ced_test_menu_callback_fun', //callback function
        10
    );
    //  add_submenu_page(
    //     'test-menu', //parents slug
    //     'Test-Menu-show-Data', //page title
    //     'View Data', // menu title
    //     'manage_options', //capability
    //     'test-menu-plugin', //slug
    //     'Ced_test_menu_callback_fun' //calllback function
    // );
}
// call back function calling
function Ced_test_menu_callback_fun() { 
    include_once CED_PLUGIN_DIR_PATH."inc/show-subscribe-data.php";  
}
// calling cusotme blog function 
include_once CED_PLUGIN_DIR_PATH."inc/cusome-post-plugin.php";  

// including of plugin file(custome-widgits)

include_once CED_PLUGIN_DIR_PATH."inc/updated-widget-for-test.php";  
    function register_widgits() {
        register_widget( 'Updated_widgets_for_test' );
    }
    add_action( 'widgets_init', 'register_widgits' );

include_once CED_PLUGIN_DIR_PATH."inc/create-and-insert-table.php"; 


// function wporg_add_new_options_page_html()
// {
//     include_once CED_PLUGIN_DIR_PATH."inc/add_submenu_2.php";  
// }

// CRAETE A FUNCTION FOR CARETING A TABLE IN DB DURING INSTALLATION OR ACTIAVTION  OF PLUGIN

// function CED_my_plugin_create_db() {
//     global $wpdb;
//     $charset_collate = $wpdb->get_charset_collate();
//     $table_name = $wpdb->prefix . 'Custome_plugin';

//     $sql = "CREATE TABLE $table_name (
//         id mediumint(9) NOT NULL AUTO_INCREMENT,
//         time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
//         name text(15) NOT NULL,
//         contact text(15) NOT NULL,
//         e_mail text(15) NOT NULL,
//         address text(15) NOT NULL, 
//         url text(15) NOT NULL,
//         UNIQUE KEY id (id)
//     ) $charset_collate;";

//     require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
//     dbDelta( $sql );
// }
// register_activation_hook( __FILE__, 'CED_my_plugin_create_db' );

// include_once CED_PLUGIN_DIR_PATH."inc/short-form.php";  
// // include_once CED_PLUGIN_DIR_PATH."inc/fetching_custome_data.php";

// // create a form with short code ,means(create a function that return a short code) 

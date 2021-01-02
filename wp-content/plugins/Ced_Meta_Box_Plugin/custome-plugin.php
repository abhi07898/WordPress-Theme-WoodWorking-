<?php
/**
 * @package Akismet
 */
/*
Plugin Name: Meta Box (Plugin)
Plugin URI: https://cedcoss.com/
Description: this plugin si basically used for Custome met aboxes.... Used by millions, Custome-Plugin is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. Its a plugin that ceraerted during the test of all learned concept: activate the Akismet plugin and then go to your Akismet Settings page to set up your API key.
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
function Ced_add_some_custom_metaBox() {

    //page
    add_meta_box("ced-page-id", "CED Page Metabox", "wpl_ced_pages_function", "page", "normal", "high");

    //post
    add_meta_box("ced-post-id", "CED Post Metabox", "wpl_ced_post_function", "post", "side", "high");
}
add_action("add_meta_boxes", "Ced_add_some_custom_metaBox");

?>
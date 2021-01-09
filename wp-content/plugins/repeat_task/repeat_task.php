<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.cedcoss.com
 * @since             1.0.0
 * @package           Repeat_task
 *
 * @wordpress-plugin
 * Plugin Name:       Repeat_task
 * Plugin URI:        www.cedcommerce.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Cedcoss Woo- Commerce
 * Author URI:        www.cedcoss.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       repeat_task
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'REPEAT_TASK_VERSION', '1.0.0' );
define( 'REPEAT_TASK_FILE_URL', plugin_dir_url(__FILE__) );
define( 'REPEAT_TASK_FILE_PATH', plugin_dir_path(__FILE__) );
define ('REPEAT_TASK_TEXT_DOMAIN','text-domain');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-repeat_task-activator.php
 */
function activate_repeat_task() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-repeat_task-activator.php';
	$repeat_task_activate_object = new Repeat_task_Activator();
	$repeat_task_activate_object->activate();
	$repeat_task_activate_object->create_page_repeatPage_during_activation();
	// Repeat_task_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-repeat_task-deactivator.php
 */
function deactivate_repeat_task() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-repeat_task-deactivator.php';
	$repeat_task_deactivate_object = new Repeat_task_Deactivator();
	$repeat_task_deactivate_object->deactivate();
 	// Repeat_task_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_repeat_task' );
register_deactivation_hook( __FILE__, 'deactivate_repeat_task' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-repeat_task.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_repeat_task() {

	$plugin = new Repeat_task();
	$plugin->run();

}
run_repeat_task();

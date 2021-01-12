<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.cedcommercecom
 * @since             1.0.0
 * @package           Add_To_Cart
 *
 * @wordpress-plugin
 * Plugin Name:       AddToCart
 * Plugin URI:        www.cedcommerce.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Cedcoss
 * Author URI:        www.cedcommercecom
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       add-to-cart
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
define( 'ADD_TO_CART_VERSION', '1.0.0' );
define( 'ADD_TO_CART_TEXT_DOMAIN', 'ced_text' );
define( 'ADD_TO_CART_DIR_PATH',  plugin_dir_path(__FILE__) );
define( 'ADD_TO_CART_DIR_URL',  plugin_dir_url(__FILE__) );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-add-to-cart-activator.php
 */
function activate_add_to_cart() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-add-to-cart-activator.php';
	$ced_activatore_object = new Add_To_Cart_Activator();
	$ced_activatore_object-> ced_product_page();
	$ced_activatore_object-> ced_addtocart_page();
	$ced_activatore_object -> ced_checkout_page();
	$ced_activatore_object -> ced_create_order_table();
	
	// Add_To_Cart_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-add-to-cart-deactivator.php
 */
function deactivate_add_to_cart() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-add-to-cart-deactivator.php';
	Add_To_Cart_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_add_to_cart' );
register_deactivation_hook( __FILE__, 'deactivate_add_to_cart' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-add-to-cart.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_add_to_cart() {

	$plugin = new Add_To_Cart();
	$plugin->run();

}
run_add_to_cart();

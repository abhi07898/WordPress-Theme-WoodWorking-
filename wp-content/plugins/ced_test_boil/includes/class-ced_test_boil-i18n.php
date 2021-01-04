<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.cedcoss.com/
 * @since      1.0.0
 *
 * @package    Ced_test_boil
 * @subpackage Ced_test_boil/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ced_test_boil
 * @subpackage Ced_test_boil/includes
 * @author     Abhishek Pandey <Abhishekpandey@cedcoss.com>
 */
class Ced_test_boil_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ced_test_boil',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

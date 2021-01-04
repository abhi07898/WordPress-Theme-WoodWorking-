<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://www.cedcoss.com/
 * @since      1.0.0
 *
 * @package    Ced_test_boil
 * @subpackage Ced_test_boil/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Ced_test_boil
 * @subpackage Ced_test_boil/includes
 * @author     Abhishek Pandey <Abhishekpandey@cedcoss.com>
 */
class Ced_test_boil_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function deactivate() {
		global $wpdb; 
		$wpdb->query( 
				" DROP TABLE IF EXISTS wp_ced_boil_table_1"
		);
		function delet_page_boiler_page() {
			global $wpdb;
			$get_data = $wpdb->get_row(
				$wpdb->prepare(
					"SELECT ID from ".$wpdb->prefix."posts WHERE post_name = %s",'boiler_page'
				)
			);
			$page_id = $get_data->ID;
			if ($page_id > 0) {
				echo "aa to";
				wp_delete_post($page_id, true);
			}
		}
		delet_page_boiler_page();
	}

}

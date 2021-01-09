<?php

/**
 * Fired during plugin deactivation
 *
 * @link       www.cedcoss.com
 * @since      1.0.0
 *
 * @package    Repeat_task
 * @subpackage Repeat_task/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Repeat_task
 * @subpackage Repeat_task/includes
 * @author     Cedcoss Woo- Commerce <abhishekpandey@cedcoss.com>
 */
class Repeat_task_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		global $wpdb; 
		$sql = "DROP TABLE IF EXISTS wp_details";
		$wpdb -> query($sql);
	}

}

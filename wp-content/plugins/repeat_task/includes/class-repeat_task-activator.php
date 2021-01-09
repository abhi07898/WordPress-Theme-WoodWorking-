<?php

/**
 * Fired during plugin activation
 *
 * @link       www.cedcoss.com
 * @since      1.0.0
 *
 * @package    Repeat_task
 * @subpackage Repeat_task/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Repeat_task
 * @subpackage Repeat_task/includes
 * @author     Cedcoss Woo- Commerce <abhishekpandey@cedcoss.com>
 */
class Repeat_task_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $ced_create_db_version;
		$ced_create_db_version = '1.0';
		function ced_create_table_during_activation() {
			global $wpdb;
			global $ced_create_db_version;
			$table_name = $wpdb->prefix . 'details';			
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				name text NOT NULL,
				contact text NOT NULL,
				adddress text NOT NULL,
				url varchar(55) DEFAULT '' NOT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;";
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
		ced_create_table_during_activation();
	}
	public function create_page_repeatPage_during_activation() {
		global $wpdb;
		$get_data = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT * from ".$wpdb->prefix."posts WHERE post_name = %s",'page_during_repeat'
			)
		);
		if(!empty($get_data)) {
			// sdg sdif sdifh 
		} else {
			$post_arr_data =  array(
				"post_title" => "reapert_page",
				"post_name" => "page_during_repeat",
				"post_status" => "publish",
				"post_type" => "page",
				"post_author" => 1,
				"post_content" => "this is a page which create during the activation of plugin boiler plate"
			);
			wp_insert_post($post_arr_data);
		}
	}

}

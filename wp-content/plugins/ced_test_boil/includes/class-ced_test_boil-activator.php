<?php
/**
 * Fired during plugin activation
 *
 * @link       https://www.cedcoss.com/
 * @since      1.0.0
 *
 * @package    Ced_test_boil
 * @subpackage Ced_test_boil/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ced_test_boil
 * @subpackage Ced_test_boil/includes
 * @author     Abhishek Pandey <Abhishekpandey@cedcoss.com>
 */
class Ced_test_boil_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	// public static function activate() { }

	public function activate() {
// check for plugin using plugin name

		if(is_plugin_active("MetaBoxPlugin/metabox.php")) {
			global $ced_table_plugin_version;
			$ced_table_plugin_version = '1.0';
			function Ced_table_creation_during_activate() {
				global $wpdb;
				global $ced_table_plugin_version;
				$table_name = $wpdb->prefix . 'ced_boil_table';			
				$charset_collate = $wpdb->get_charset_collate();
				$sql = "CREATE TABLE $table_name (
					id mediumint(9) NOT NULL AUTO_INCREMENT,
					time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
					name text NOT NULL,
					contact text NOT NULL,
					address text NOT NULL,
					url varchar(55) DEFAULT '' NOT NULL,
					PRIMARY KEY  (id)
				) $charset_collate;";
				require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
				dbDelta( $sql );
				add_option( 'ced_table_plugin_version', $ced_table_plugin_version );
			}
			// CREATE A  ANOTHER TABLE DURING ACTIVATION THE TABLE 
			function Ced_table_creation_during_activate_1() {
				global $wpdb;
				global $ced_table_plugin_version;
				$table_name = $wpdb->prefix . 'ced_boil_table_1';			
				$charset_collate = $wpdb->get_charset_collate();
				$sql = "CREATE TABLE $table_name (
					id mediumint(9) NOT NULL AUTO_INCREMENT,
					time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
					name text NOT NULL,
					contact text NOT NULL,
					address text NOT NULL,
					url varchar(55) DEFAULT '' NOT NULL,
					PRIMARY KEY  (id)
				) $charset_collate;";
				require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
				dbDelta( $sql );
				add_option( 'ced_table_plugin_version', $ced_table_plugin_version );
			}
			Ced_table_creation_during_activate();
			Ced_table_creation_during_activate_1();

			// create a page when plugin activated 
			function create_page() {
				global $wpdb;
				$get_data = $wpdb->get_row(
					$wpdb->prepare(
						"SELECT * from ".$wpdb->prefix."posts WHERE post_name = %s",'boil_page'
					)
				);
				if(!empty($get_data)) {
					// sdg sdif sdifh 
				} else {
					$post_arr_data =  array(
						"post_title" => "boil_page",
						"post_name" => "boil_page",
						"post_status" => "publish",
						"post_type" => "page",
						"post_author" => 1,
						"post_content" => "this is a page which create during the activation during repeat the task"
					);
					wp_insert_post($post_arr_data);
				}
		}
		create_page();
		} else { 
			wp_die("Depnedency Not Exists", "ced_test_boil");
		} 
		

}
}

<?php

/**
 * Fired during plugin activation
 *
 * @link       www.cedcommercecom
 * @since      1.0.0
 *
 * @package    Add_To_Cart
 * @subpackage Add_To_Cart/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Add_To_Cart
 * @subpackage Add_To_Cart/includes
 * @author     Cedcoss <abhishekpandey@cedcoss.com>
 */
class Add_To_Cart_Activator {

	
	/**
	 * ced_product_page
	 * Description : create a page during activatoin of pluign for show the product content
	 * Date : 8-1-2020
	 * @since 1.0.0	
	 * @return void
	 */
	public function ced_product_page() {
		global $wpdb;
		$get_data = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT * from ".$wpdb->prefix."posts WHERE post_name = %s",'ced_product_page'
			)
		);
		if(!empty($get_data)) {
		} else {
			$post_arr_data =  array(
				"post_title" => "Ced_Product",
				"post_name" => "ced_product_page",
				"post_status" => "publish",
				"post_type" => "page",
				"post_author" => 1,
				"post_content" => "[short_code_page]"
			);
			wp_insert_post($post_arr_data);
		}
	}	
	/**
	 * ced_addtocart_page
	 * Description : create a page during the activation of plugin with name Ced_AddToCart for show the crart item data
	 * Date : 8-1-2020
	 * @since 1.0.0
	 * @return void
	 */
	public function ced_addtocart_page() {
		global $wpdb;
		$get_data_cart = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT * from ".$wpdb->prefix."posts WHERE post_name = %s",'ced_addtocart_page'
			)
		);
		if(!empty($get_data_cart)) {

		} else {
			$post_arr_data = array(
				"post_title" => "Ced_AddToCart",
				"post_name" => "ced_addtocart_page",
				"post_status" => "publish",
				"post_type" => "page",
				"post_author" => 1,
				"post_content" => "Add to cart Page"
			);
			wp_insert_post($post_arr_data);
		}

	} 	
	/**
	 * ced_checkout_page
	 * Description : create a page during the activation of plugin for show the chack-out page
	 * Date : 12-1-2020
	 * @since 1.0.0
	 * @return void
	 */
	public function ced_checkout_page() {
		global $wpdb;
		$get_data_cart = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT * from ".$wpdb->prefix."posts WHERE post_name = %s",'ced_checkout_page'
			)
		);
		if(!empty($get_data_cart)) {

		} else {
			$post_arr_data = array(
				"post_title" => "Ced_Checkout_Page",
				"post_name" => "ced_checkout_page",
				"post_status" => "publish",
				"post_type" => "page",
				"post_author" => 1,
				"post_content" => "it's a page creating during the activation of plugin for show the checkout item "
			);
			wp_insert_post($post_arr_data);
		}

	} 
	// register_activation_hook( __FILE__, 'myPluginCreateTable');	
	/**
	 * ced_create_order_table
	 * Description : create a table during activation of this plugin for store the content and data regarding from order
	 * Date :  12-1-2020
	 * @since 1.0.0
	 * @return void
	 */
	public function ced_create_order_table() {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$table_name = $wpdb->prefix . 'ced_order_table';
		$sql = "CREATE TABLE `$table_name` (
			`order_id` int(111) NOT NULL AUTO_INCREMENT,
			`user_id` int(111) NOT NULL,
			`time` date NOT NULL DEFAULT current_timestamp(),
			`customer_detail` varchar(555) NOT NULL,
			`order_detail` varchar(555) NOT NULL,
			`purchased_amount` int(111) NOT NULL,
			PRIMARY KEY (`order_id`))";
		if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
	}
	/**
	 * ced_thankyou_page
	 * Description : create a page during the activation of plugin for show the thankyou information after the placed order
	 * Date : 13-1-2020
	 * @since 1.0.0
	 * @return void
	 */
	public function ced_thankyou_page() {
		global $wpdb;
		$get_data_cart = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT * from ".$wpdb->prefix."posts WHERE post_name = %s",'ced_thankyou_page'
			)
		);
		if(!empty($get_data_cart)) {

		} else {
			$post_arr_data = array(
				"post_title" => "Ced_thankyou_page",
				"post_name" => "ced_thankyou_page",
				"post_status" => "publish",
				"post_type" => "page",
				"post_author" => 1,
				"post_content" => "it's a page creating during the activation of plugin for show thethankouy page  item "
			);
			wp_insert_post($post_arr_data);
		}

	}

}

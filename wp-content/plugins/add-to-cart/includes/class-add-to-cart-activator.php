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
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function ced_product_page() {
		global $wpdb;
		$get_data = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT * from ".$wpdb->prefix."posts WHERE post_name = %s",'ced_product_page'
			)
		);
		if(!empty($get_data)) {
			// sdg sdif sdifh 
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

}

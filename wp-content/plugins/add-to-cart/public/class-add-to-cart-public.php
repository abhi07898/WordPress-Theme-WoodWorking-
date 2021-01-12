<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.cedcommercecom
 * @since      1.0.0
 *
 * @package    Add_To_Cart
 * @subpackage Add_To_Cart/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Add_To_Cart
 * @subpackage Add_To_Cart/public
 * @author     Cedcoss <abhishekpandey@cedcoss.com>
 */
class Add_To_Cart_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Add_To_Cart_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Add_To_Cart_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style('ced_bootstrap_css', ADD_TO_CART_DIR_URL. 'assets/css/bootstrap.min.css', array(), $this->version, 'all' );

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/add-to-cart-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Add_To_Cart_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Add_To_Cart_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script('jQuery');
		wp_enqueue_script( 'ced_bootstrap_js', ADD_TO_CART_DIR_URL.'assets/js/bootstrap.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) .'js/add-to-cart-public.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'public_cart_js', array (
			'ajax_url' => admin_url('admin-ajax.php')
		) );	

	}	
	/**
	 * 
	 * ced_create_page_for_single_post
	 * Discription : function is used for create a public single page(add-to-cart-singletemp.php) 
	 * Date : 8-10-2021
	 * @since : 1.0.0
	 * @param  mixed $single_page_temp
	 * @return void
	 * 
	 */
	public function ced_create_page_for_single_post($single_page_temp) {
		$post_type = "product";
		if(is_singular($post_type)) {
			$single_page_temp = plugin_dir_path( __FILE__ ) . 'partials/add-to-cart-singlepage-layout.php';
		}
		return $single_page_temp;
	}	
	/**
	 * 
	 * ced_create_page_for_add_to_cart
	 * Discription : function is used for create a public cart page(add-to-cart-addtocart.php)
	 * Date : 8-10-2021
	 * @since : 1.0.0
	 * @param  mixed $template
	 * @return void
	 * 
	 */
	public function ced_create_page_for_add_to_cart($template)
	{
		// get_query_var('pagename') is used for select the page_name
		$page_name = get_query_var('pagename');
		if($page_name == 'ced_addtocart_page'){
			$template = plugin_dir_path(__FILE__). 'partials/add-to-cart-cartitem-layout.php';
		} 
		return $template;
	}
	/**
	 * 
	 * generate_short_code_for_page
	 * Discription : function for generate short code for a page ehich ative during the activation of plugin
	 * Date : 8-1-2020
	 * @since 1.0.0
	 * @param  mixed $ret
	 * @return void
	 */
	public function generate_short_code_for_page($ret) {
		require plugin_dir_path( __FILE__ ) . 'partials/add-to-cart-productsitem-layout.php';
	 return ;
	}
	public function ced_update_cart() {
		// session_start();
		// $quant = $_POST['quant'];
		// $key = $_POST['key'];
		// 	$cart_data_update = array();
		// 	if(is_user_logged_in()) {
		// 		if ( ! function_exists( 'get_current_user_id' ) ) {
		// 			return 0;
		// 		}
		// 		$user_id = get_current_user_id();
		// 		$cart_data_arr = get_user_meta( $user_id, 'add_to_cart_details');
		// 		$cart_data_update = $cart_data_arr[0];
		// 	} else {
		// 		if(isset($_SESSION['product'])) {
		// 			$cart_data_update = $_SESSION['product'];
		// 		}  
		// 	}
		// 	foreach($cart_data_update as $product_key => $value) {
		// 		if($value['key'] == $key){
		// 		$_SESSION['product'][$product_key]['qunatity']= $quantity;
		// 		if(is_user_logged_in()) {
		// 				if ( ! function_exists( 'get_current_user_id' ) ) {
		// 					return 0;
		// 				}
		// 				$cart_data_update[$product_key]['qunatity']= $quant;
		// 				$user_id = get_current_user_id();
		// 				update_user_meta( $user_id, 'add_to_cart_details', $cart_data_update);
		// 			}
		// 		} 
		// 	}
		
		wp_die();
	}
	public function ced_create_page_for_chekout_content($check_template) 
	{
		$page_name = get_query_var('pagename');
		if($page_name == 'ced_checkout_page') {
			$check_template = plugin_dir_path(__FILE__).'partials/add-to-cart-checkoutpage-layout.php';
		}
		return $check_template;

	} 
}

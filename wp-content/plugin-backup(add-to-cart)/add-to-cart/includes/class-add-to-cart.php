<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       www.cedcommercecom
 * @since      1.0.0
 *
 * @package    Add_To_Cart
 * @subpackage Add_To_Cart/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Add_To_Cart
 * @subpackage Add_To_Cart/includes
 * @author     Cedcoss <abhishekpandey@cedcoss.com>
 */
class Add_To_Cart {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Add_To_Cart_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'ADD_TO_CART_VERSION' ) ) {
			$this->version = ADD_TO_CART_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'add-to-cart';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Add_To_Cart_Loader. Orchestrates the hooks of the plugin.
	 * - Add_To_Cart_i18n. Defines internationalization functionality.
	 * - Add_To_Cart_Admin. Defines all hooks for the admin area.
	 * - Add_To_Cart_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-add-to-cart-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-add-to-cart-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-add-to-cart-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-add-to-cart-public.php';

		$this->loader = new Add_To_Cart_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Add_To_Cart_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Add_To_Cart_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {
		$plugin_admin = new Add_To_Cart_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'init', $plugin_admin, 'ced_porduct_post' );
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'ced_product_meta_feilds' );
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'ced_product_meta_feilds' );
		$this->loader->add_action( 'init', $plugin_admin, 'ced_product_texonomies' );
		$this->loader->add_action( 'save_post', $plugin_admin, 'ced_save_inventory_data',10,2);
		$this->loader->add_action( 'wp_logout', $plugin_admin, 'logout_user');
		// $this->loader->add_shortcode( 'short_code_page', $plugin_admin, 'generate_short_code_for_page');
		// add_shortcode( 'short_code_page', array( $plugin_admin, 'generate_short_code_for_page' ));
		// add_shortcode( 'bartag', 'bartag_func' );// add_action("save_post", "save_the_meta_box_data", 10, 2); 
	}
	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {
		$plugin_public = new Add_To_Cart_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		add_shortcode( 'short_code_page', array( $plugin_public, 'generate_short_code_for_page' ));
		$this->loader->add_action( 'template_include', $plugin_public, 'ced_create_page_for_single_post' );
		$this->loader->add_action( 'template_include', $plugin_public, 'ced_create_page_for_add_to_cart' );
		$this->loader->add_action( 'wp_ajax_cart_updation', $plugin_public, 'ced_update_cart');
		$this->loader->add_action( 'wp_ajax_nopriv_cart_updation', $plugin_public, 'ced_update_cart');	
		$this->loader->add_action( 'template_include', $plugin_public, 'ced_create_page_for_chekout_content' );	
		$this->loader->add_action( 'wp_ajax_check_out_customer_detail', $plugin_public, 'ced_insertion_of_checkout_data');
		$this->loader->add_action( 'wp_ajax_nopriv_check_out_customer_detail', $plugin_public, 'ced_insertion_of_checkout_data');
		$this->loader->add_action( 'template_include', $plugin_public, 'ced_create_page_for_thankyou_content');
		


		// cart_updation
		
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Add_To_Cart_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}

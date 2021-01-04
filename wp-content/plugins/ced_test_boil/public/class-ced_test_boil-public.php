<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.cedcoss.com/
 * @since      1.0.0
 *
 * @package    Ced_test_boil
 * @subpackage Ced_test_boil/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ced_test_boil
 * @subpackage Ced_test_boil/public
 * @author     Abhishek Pandey <Abhishekpandey@cedcoss.com>
 */
class Ced_test_boil_Public {

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
		 * defined in Ced_test_boil_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ced_test_boil_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ced_test_boil-public.css', array(), $this->version, 'all' );

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
		 * defined in Ced_test_boil_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ced_test_boil_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ced_test_boil-public.js', array( 'jquery' ), $this->version, false );

	}
	public function show_meta_data_public($content) {
		if(is_single()):
		$content_value = get_post_meta(get_the_ID(), 'boil_meta_box', true); 
		$content_data = "<h2>$content_value</h2>";
		endif;
		return $content_data.$content;	
	}

}

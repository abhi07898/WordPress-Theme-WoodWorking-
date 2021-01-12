<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.cedcommercecom
 * @since      1.0.0
 *
 * @package    Add_To_Cart
 * @subpackage Add_To_Cart/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Add_To_Cart
 * @subpackage Add_To_Cart/admin
 * @author     Cedcoss <abhishekpandey@cedcoss.com>
 */
class Add_To_Cart_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/css/bootstrap.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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
		// $posttype = isset($_REQUEST['post_type'])?$_REQUEST['post_type'] : '';
		// $valid_post = 'product';
		// if($posttype == $valid_post)  {
			wp_enqueue_script('jquery');
			wp_enqueue_script( 'ced_js', plugin_dir_url( __FILE__ ) . 'js/add-to-cart-admin.js', array( 'jquery' ), $this->version, false );
			wp_localize_script( 'ced_js', 'save_meta_box_data', array (
				'ajax_url' => admin_url('admin-ajax.php')
			) );
		// }
		
	}	
	/**
	 * ced_porduct_post
	 * Discription : register a post type with product name
	 * Date : 8-1-2021
	 * @since 1.0.0 
	 * @return void
	 */
	function ced_porduct_post() {
		register_post_type( 'product',
		// CPT Options
			array(
				'labels' => array(
					'name' => __( 'Products' ),
					'singular_name' => __( 'Product' ),
					'parent_item_colon'   => __( 'Parent Product' ),
					'all_items'           => __( 'All Products' ),
					'view_item'           => __( 'View Product' ),
					'add_new_item'        => __( 'Add New Product' ),
					'add_new'             => __( 'Add New' ),
					'edit_item'           => __( 'Edit Product' ),
					'update_item'         => __( 'Update Product' ),
					'search_items'        => __( 'Search Product' ),
					'not_found'           => __( 'Not Found' ),
					'not_found_in_trash'  => __( 'Not found in Trash' ),

				),
				'public' => true,
				'supports'   => array( 'title','screen','editor',  'author', 'thumbnail','comments' ),
				'has_archive' => true,
				'rewrite' => array('slug' => 'product'),
				'show_in_rest' => true,	 
			)
		);
	}
	public function ced_product_meta_feilds() {
		add_meta_box("ced-inventory", "Inventory",  array($this,"ced_inventory_meta_feilds"),"product", "side", "high");
		add_meta_box("ced-pricing", "Pricing",  array($this,"ced_pricing_meta_feilds"), "product", "side", "high");
	}	
	/**
	 * 
	 * call_back function for inventory
	 * Discription: A callback function for create a content for  inventory_meta_feilds
	 * Date : 8-2-2021
	 * @since : 1.0.0
	 * @param  mixed $args
	 * @return void
	 */
	public function ced_inventory_meta_feilds($args) {
		global $post;
		$data = get_post_meta($post->ID,'product_meta_data',1);
		$error;
		if($data['invent'] < 0) {
			$error = "Inventory should be greater than 0";
			$db_val = 0;
		} else {
			$error = '';
			$db_val = $data['invent'];
		}
		?> 
		Inventory <br>
		<input type="number" name = "ced_inventory_meta_feilds"value="<?php echo $db_val;?>" id="ced_inventory_meta_feilds" placeholder="inventory">
		<p id = "invent_error" style = "color:red;"><?php echo $error;?></p>
		<?php
	}	
	/**
	 * 
	 * call_back function for product price details
	 * Discription : A call back function for create content for ced_pricing_meta_feilds
	 * Date : 8-2-2020
	 * @since 1.0.0
	 * @param  mixed $args
	 * @return void
	 */
	public function ced_pricing_meta_feilds($args) {
		global $post;
		$data = get_post_meta($post->ID,'product_meta_data',1);
		$error='';
		if($data['disc'] > $data['regular']) {
			$error = "Discount amount always lesser than regular amount"; 
			$updated_data = 0;
		} else {
			$updated_data = $data['disc'];
		}
		?> 
		Regular Price <br>
		<input type="number" value="<?php echo $data['regular'];?>"name = "regular_price" id="regular_price" placeholder="Regular_price"> 
		<br>
	    Discount Price<br>
		<input type="number" value="<?php echo $updated_data;?>" name = "discount" id="discount" placeholder="Discount price">
		<p style = "color:red;" id="price_error"><?php echo $error;?></p>
		<?php
	}

	
	/**
	 * ced_save_inventory_data
	 * Discription : function for save the meta feilds data into post_meta table
	 * Date : 8-1-2020
	 * @since 1.0.0
	 * @param  mixed $post_id
	 * @param  mixed $post
	 * @return void
	 */
	function ced_save_inventory_data($post_id, $post) {
		$post_slug = "product";
		if($post_slug!= $post->post_type) {
			return;
		}
		$inventory = isset($_POST['ced_inventory_meta_feilds']) ? sanitize_text_field($_POST['ced_inventory_meta_feilds']) : '';
		$regular_price = isset($_POST['regular_price']) ? sanitize_text_field($_POST['regular_price']) : '';
		$discount_price = isset($_POST['discount']) ? sanitize_text_field($_POST['discount']) : '';
		// if($inventory < 0 ) {
		// 	$inventory = 0;
		// }
		if($discount_price < 0) {
			$discount_price = 0;
		}
		$final_product_meta_deta = array("invent" => $inventory, "regular"=>$regular_price ,"disc"=>$discount_price);
		update_post_meta($post_id, "product_meta_data",$final_product_meta_deta);
	}	
	/**
	 * ced_product_texonomies
	 * Discription : function for create a custom texonomy with Product Categories
	 * Date : 8-1-2020
	 * @since 1.0.0
	 * @return void
	 */
	public function ced_product_texonomies(){
		$labels_product_cat = array(
			'name' => _x( 'Product Categories', 'taxonomy general name' ),
			'singular_name' => _x( 'Product Category', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Product Categories' ),
			'all_items' => __( 'All Product Categorys' ),
			'parent_item' => __( 'Parent Product Category' ),
			'parent_item_colon' => __( 'Parent Product Category:' ),
			'edit_item' => __( 'Edit Product Category' ), 
			'update_item' => __( 'Update Product Category' ),
			'add_new_item' => __( 'Add New Product Category' ),
			'new_item_name' => __( 'New Product Category Name' ),
			'menu_name' => __( 'Product Categories' ),
		);    		
		// Now register the taxonomy
		register_taxonomy('Product Categorys',array('product'), array(
			'hierarchical' => true,
			'labels' => $labels_product_cat,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'Product' ),
		));	
	}	
	/**
	 * logout_user 
	 * Description : function for destroy the session when user logout
	 * Date : 12-1-2020
	 * @since 1.0.0
	 * @return void
	 */
	public function logout_user() {
		session_start();
		unset($_SESSION['product']);
	}
	
}
	


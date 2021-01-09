<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.cedcoss.com
 * @since      1.0.0
 *
 * @package    Repeat_task
 * @subpackage Repeat_task/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Repeat_task
 * @subpackage Repeat_task/admin
 * @author     Cedcoss Woo- Commerce <abhishekpandey@cedcoss.com>
 */
class Repeat_task_Admin {

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
		 * defined in Repeat_task_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Repeat_task_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$valid_page = array('setting','details-froms', 'latest-task');
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] :"";
		if(in_array($page,$valid_page)) {
			wp_enqueue_style( 'ced_bootstrap_css', REPEAT_TASK_FILE_URL. 'assets/css/bootstrap.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'ced_dataTable_css', REPEAT_TASK_FILE_URL. 'assets/css/dataTables.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'ced_sweetalert_css', REPEAT_TASK_FILE_URL. 'assets/css/sweetalert.min.css', array(), $this->version, 'all' );
		}
		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/repeat_task-admin.css', array(), $this->version, 'all' );

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
		 * defined in Repeat_task_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Repeat_task_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$valid_page = array('details-froms','setting','latest-task');
		$page = isset($_REQUEST['page'])? $_REQUEST['page']:'';
		if(in_array($page, $valid_page)) {
			wp_enqueue_script('jquery');
			wp_enqueue_script( 'ced_bootstrap_js', REPEAT_TASK_FILE_URL. 'assets/js/bootstrap.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( 'ced_datatable_js', REPEAT_TASK_FILE_URL. 'assets/js/datatables.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( 'ced_sweetalert_js', REPEAT_TASK_FILE_URL. 'assets/js/sweetalert.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( 'ced_admin_file_js', REPEAT_TASK_FILE_URL. 'admin/js/repeat_task-admin.js', array( 'jquery' ), $this->version, false );
			wp_localize_script( 'ced_admin_file_js', 'save_metabox_selected_options', array (
				'ajax_url' => admin_url('admin-ajax.php')
			) );
			$title_nonce = wp_create_nonce( 'title_example' );
			wp_localize_script(
				'ced_admin_file_js',
				'ced_noce_data',
				array(
					'ajax_url' => admin_url( 'admin-ajax.php' ),
					'nonce'    => $title_nonce,
				)
			);
		}	
	}	
	/**
	 * create a custom menu for some user specific settings related to settings
	 * ced_add_cutom_menu
	 *
	 * @return void
	 */
	public function ced_add_cutom_menu()
	{
		add_menu_page( 'Task','Latest-Task', 'manage_options','latest-task', array($this, "latest_task_callbckfun"),'dashicons-nametag',5 );		

		add_menu_page( 'Setting','Setting', 'manage_options','setting', array($this, "ced_custome_menu_callfun"),'dashicons-nametag',5 );		
		add_submenu_page( 'setting', 'Meta-Box',"Meta-box-setting",'manage_options','setting', array($this, "ced_custome_menu_callfun"),1);
		add_submenu_page( 'setting', 'deatil-form', 'Deatil Form', 'manage_options', 'details-froms', array($this, 'ced_details_form_insertion'),2);
	}
	/**
	 * call back function for ced_add_custom_menu() 
	 * ced_custome_menu_callfun
	 *
	 * @return void
	 */
	function ced_custome_menu_callfun(){
		require_once REPEAT_TASK_FILE_PATH."admin/partials/repeat_task_meta_box_setting.php";
	}	
	/**
	 * ced_details_form_insertion
	 *
	 * @return void
	 */
	function ced_details_form_insertion() {		
		require_once REPEAT_TASK_FILE_PATH."admin/partials/repeat_task_form_insertion.php";
	}	
	/**
	 * ced_insertion_metabox_detail
	 *
	 * @return void
	 */
	function ced_insertion_metabox_detail() {
		$data = $_POST['checked_data'];
		print_r($data);
		// save the data into options table
		update_option('insert_cheked_data_for_meat_box', $data);
	}	
	/**
	 * insert the data into details table after clicking the save__detaals button
	 * ced_insertion_detail
	 *
	 * @return void
	 */
	function ced_insertion_detail(){
		$data = $_POST['data'];
		$name = esc_html($data[0]);
		$contact = esc_html($data[1]);
		$address = esc_html($data[2]);
		$url = esc_html($data[3]);
		global $wpdb;
		// insert data into wp_details
		$wpdb->query(
			$wpdb->prepare(
			"
			INSERT INTO wp_details
			( name, contact, adddress , url)
			VALUES ( %s, %s, %s, %s )
			",
			array(
				  $name,
				  $contact,
				  $address,
				  $url,
			   )
			)
		 );	
	}		
	/**
	 * latest_task_callbckfun
	 *
	 * a task in which i ma trying to add some data in a menu options
	 * @return void
	 */
	public function latest_task_callbckfun() {
		esc_attr_e('<h3>Enter the Custome Page Name</h3>',REPEAT_TASK_TEXT_DOMAIN);	
		?>
			
			<input type="text" id="page_name" name = "custome_page" class="ml-5"><br>
			<input type="button" id="save_post_menu" value="  click_for_Custom_post  " class="btn ml-5 btn-outline-danger mt-2">
			<h4>hii this is a features for cretea a cusotm page</h4>	
		<?php
		$data = get_option('data_for_custome_post');
		if(!empty($data)){
			echo "<pre>";
			print_r($data);
		} else {
			echo "No records founds";
		}
	}	
	/**
	 * insert_data_of_custome_page
	 *
	 * @return void
	 */
	public function insert_data_of_custome_page() {
		$page_name_data = get_option('data_for_custome_post');
		$page_name = esc_html($_POST['data']);	
		if(in_array($page_name,$page_name_data)){
			echo esc_html("This name is already exists!!!");
		} else {
			if(!empty( $page_name_data )) {
				$page_name_data[] = $page_name;
			} else {
				$page_name_data = array($page_name);			
			}
			update_option('data_for_custome_post', $page_name_data, 1);
		}
		
	}
	// function wporg_filter_title( $title) {
	// 	return 'The ' . $title . ' was filtered';
	// }
	public function my_nonce_handler()
	{
		print_r($_POST);
		die;
	}

	// function example_add_cron_interval( $schedules ) { 
	// 	$schedules['five_seconds'] = array(
	// 		'interval' => 5,
	// 		'display'  => esc_html__( 'Every Five Seconds' ), );
	// 	return $schedules;
	// 	wp_schedule_event( time(), 'five_seconds', 'bl_cron_hook' );
	// }
	

}
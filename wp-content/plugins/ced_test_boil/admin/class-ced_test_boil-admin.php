<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.cedcoss.com/
 * @since      1.0.0
 *
 * @package    Ced_test_boil
 * @subpackage Ced_test_boil/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ced_test_boil
 * @subpackage Ced_test_boil/admin
 * @author     Abhishek Pandey <Abhishekpandey@cedcoss.com>
 */
class Ced_test_boil_Admin {

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
		 * defined in Ced_test_boil_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ced_test_boil_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		// created for some specific [ages only ]
		$valid_pages = array("ced-boil-test-menu","view-all","add-inforamtion","ced-boil-view-data");
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] :"";
		if(in_array($page,$valid_pages)){
			wp_enqueue_style( 'ced_bootstrap.css_url',CED_TEST_BOIL_URL.'assets/css/bootstrap.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'ced_datatablecss_url',CED_TEST_BOIL_URL.'assets/css/dataTables.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'ced_sweetalertcss_url',CED_TEST_BOIL_URL.'assets/css/sweetalert.css', array(), $this->version, 'all' );
		}		
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
		 * defined in Ced_test_boil_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ced_test_boil_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$valid_pages = array("ced-boil-test-menu","view-all","add-inforamtion","ced-boil-view-data");
		$page = isset($_REQUEST['page'])? $_REQUEST['page'] : "";
		if(in_array($page,$valid_pages)) {
			wp_enqueue_script('jquery');
			wp_enqueue_script( 'ced_boostrap_js',CED_TEST_BOIL_URL.'assets/js/bootstrap.min.js', array( 'jquery' ), $this->version);
			wp_enqueue_script( 'ced_dataTable_js',CED_TEST_BOIL_URL.'assets/js/datatables.min.js', array( 'jquery' ), $this->version);
			wp_enqueue_script( 'ced_jquery-validate_js',CED_TEST_BOIL_URL.'assets/js/jquery.validate.min.js', array( 'jquery' ), $this->version);
			wp_enqueue_script( 'ced_sweetalert_js',CED_TEST_BOIL_URL.'assets/js/sweetalert.min.js', array( 'jquery' ), $this->version);
			wp_enqueue_script( 'ced_admin_js',CED_TEST_BOIL_URL.'admin/js/ced_test_boil-admin.js', array( 'jquery' ), $this->version);
			wp_localize_script("ced_admin_js","boil_test_localize", array(
				"name" => "Boiler_test_ajax",
				"author" => "Abhsihek",
				"ajax_url" => admin_url("admin-ajax.php")
			));
		}

		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ced_test_boil-admin.js', array( 'jquery' ), $this->version, false );

	}
	// function for create menus 
	public function Ced_Test_Boil_Menu() {
		add_menu_page( 'Ced-test', 'Ced Boil Menu', 'manage_options','ced-boil-test-menu', array($this, "call_back_fun_add_menu"), 'dashicons-admin-post', 5 );
		// try to creat a sub menus 
		add_submenu_page( 'ced-boil-test-menu', 'dashboard', 'Dashboard', 'manage_options', 'ced-boil-test-menu', array($this, 'call_back_fun_add_menu'));
		add_submenu_page( 'ced-boil-test-menu', 'View Data', 'View Data', 'manage_options', 'ced-boil-view-data', array($this, 'call_back_fun_view_data'));
		add_submenu_page( 'ced-boil-test-menu', 'add-info', 'Add Information', 'manage_options', 'add-inforamtion', array($this, 'call_back_fun_add_information'));
		add_submenu_page( 'ced-boil-test-menu', 'view_all', 'View All', 'manage_options', 'view-all', array($this, 'view_menu_function'));
	}
	function call_back_fun_add_menu() {
		echo "<h3>here i am trying ti use wpdb object to access the adrta from deifferent different tables</h3>";
	}
	function call_back_fun_add_information() {
		require_once CED_TEST_BOIL_PATH."admin/partials/ced_test_boil_add_information.php";
	}
	function call_back_fun_view_data() {
		require_once CED_TEST_BOIL_PATH."admin/partials/ced_test_boil_view_data.php";
	}
	function view_menu_function() {
		global $wpdb;
		echo "<h3>View menu functions basically designed for viw the all content</h3>";
		echo "using of get_var() <br>";
		$single_user_emial = $wpdb->get_var("Select user_email from wp_users ");
		echo $single_user_emial;
		// ++++++++++++++++++++++++++
		echo '<h3>using of get_row() with using second paremeter for fetch the data in associative array<br></h3>';
		$single_row_from_user = $wpdb->get_row("Select * from wp_users", ARRAY_A);
		echo "<pre>";
		print_r($single_row_from_user);
		echo "</pre>";
		// ++++++++++++++++++++++++++
		echo '<h3>using of get_row() with Preapare Statement <br></h3>';
		$single_row_from_user = $wpdb->get_row($wpdb->prepare("Select * from wp_users WHERE ID= %d",1),ARRAY_A);
		echo "<pre>";
		print_r($single_row_from_user);
		echo "</pre>";
		// ++++++++++++++++++++++++++
		echo '<h3>using of get_col() with using second paremeter for fetch the data in associative array<br></h3>';
		$title_col = $wpdb->get_col("SELECT post_title from wp_posts LIMIT 5");
		echo "<pre>";
		print_r($title_col);
		echo "</pre>";
		// ++++++++++++++++++++++++++
		echo '<h3>using of get_results() with using second paremeter for fetch the data in associative array<br></h3>';
		$whole_data = $wpdb->get_results("SELECT * from wp_posts LIMIT 2", ARRAY_A);
		echo "<pre>";
		print_r($whole_data);
		echo "</pre>";
		// ++++++++++++++++++++++++++		
	}
// functions fro create  some another menus
	public function Ced_Test_Boil_Menu_1() {
		add_menu_page('Ced_Test_1', 'Ced Boil Menu 1', 'manage_options', 'ced-boil-test-menu-1', array($this, "callbackfun_menu_1"), 'dashicons-admin-generic', 6);
	} 
	function callbackfun_menu_1() {
		echo '<h1>Another Menus for boilerplate</h1>';
	}
// create a meta box that will show in the page of post pdhna hai

	function add_custom_meta_box()
	{
		add_meta_box("boil_meta_box", "Fell Free to Enter", "feel_free_to_enter", "post", "side", "high");
		function feel_free_to_enter()
		{
			$value = get_post_meta(get_the_ID(),"boil_meta_box", true);
			?>
			<label for="feel_free">Whats in your Mind</label>
			<input type="text" name="feel_free" value="<?php echo $value;?>" id = "feel_free"> 
			<p>Hey admin you are free to write currently whats in your mind</p>
			<?php	
		}
	}
	function save($post_id)
	{
		if ( array_key_exists( "feel_free", $_POST ) ) {
			update_post_meta(
				$post_id,
				'boil_meta_box',
				$_POST["feel_free"]
			);
		}
	}
// methods for handel the request of ajax
	public function ajax_request_handle() {
		$data = $_POST['data'];  
		$name = $data[0];
		$contact = $data[1];
		$address = $data[2];
		$url = $data[3];
		global $wpdb;
		$sql = $wpdb->query( "INSERT INTO `wp_ced_boil_table` (`name`, `contact`, `address`, `url`) values( '$name', '$contact', '$address','$url')");
		return $sql;
	}
// try to use admin_notices
function sample_admin_notice__error() {
    $class = 'notice notice-success is-dismissible';
    $message = __( 'Hey if you have a problrm contact with me ->.', 'sample-text-domain' );
 
    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
}

	}

<?php
/**
 * video functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Video
 */


/*********************************************************************************************************
* Basics
**********************************************************************************************************/

if ( ! function_exists( 'shop_and_commerce_setup' ) ) :

function shop_and_commerce_setup() {
	load_theme_textdomain( 'shop-and-commerce-languages', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'woocommerce' );	
	
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'shop-and-commerce' ),
	) );
	
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'shop_and_commerce_custom_background_args', array(
		'default-color' => '',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'shop_and_commerce_setup' );
	
function shop_and_commerce_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'shop_and_commerce_content_width', 640 );
}
add_action( 'after_setup_theme', 'shop_and_commerce_content_width', 0 );

/**
 * Register widget area.
 */
function shop_and_commerce_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'shop-and-commerce' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'shop-and-commerce' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		
}

add_action( 'widgets_init', 'shop_and_commerce_widgets_init' );

/************************** Includes ******************************/
		require get_template_directory() . '/kirki/kirki.php';
		require get_template_directory() . '/inc/custom-header.php';
		require get_template_directory() . '/inc/template-tags.php';
		require get_template_directory() . '/inc/extras.php';
		require get_template_directory() . '/inc/customizer.php';
		require get_template_directory() . '/inc/jetpack.php';
		require get_template_directory() . '/js/viewportchecker.php';
		require get_template_directory() . '/woocommerce/woo-cart.php';
		require get_template_directory() . '/woocommerce/woo-functions.php';
	
/**
 * Enqueue scripts and styles.
 */
function shop_and_commerce_scripts() {
	wp_enqueue_style( 'shop-and-commerce-style', get_stylesheet_uri() );
	wp_enqueue_script( 'jquery');
	
	wp_enqueue_style( 'shop-and-commerce-animation-menu', get_template_directory_uri() . '/css/flipInX.css');
	
	wp_enqueue_style( 'shop-and-commerce-animata-css', get_template_directory_uri() . '/css/animate.css');
	
	wp_enqueue_style( 'seos-scroll-css', get_template_directory_uri() . '/css/scroll-effect.css');

	wp_enqueue_script( 'shop-and-commerce-viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js');
	
	wp_enqueue_script( 'shop-and-commerce-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_style( 'shop-and-commerce-fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
		
	wp_enqueue_script( 'shop-and-commerce-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_style( 'shop-and-commerce-genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );
			
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shop_and_commerce_scripts' );


function shop_and_commerce_admin_scripts() {

	wp_enqueue_style( 'shop_and_commerce_admin', get_template_directory_uri() . '/css/admin.css');

}

add_action( 'admin_enqueue_scripts', 'shop_and_commerce_admin_scripts' );


/*********************************************************************************************************
* Excerpt
**********************************************************************************************************/
	
function shop_and_commerce_excerpt_more( $shop_and_commerce_link ) {
	if ( is_admin() ) {
		return $shop_and_commerce_link;
	}

	$shop_and_commerce_link = sprintf( '<p class="link-more"><a href="%1$s" class="read-more">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Read More<span class="screen-reader-text"> "%s"</span>', 'shop-and-commerce' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $shop_and_commerce_link;
}
add_filter( 'excerpt_more', 'shop_and_commerce_excerpt_more' );


/*********************************************************************************************************
* Add Thumbnails in Pages 
**********************************************************************************************************/

	add_filter('manage_pages_columns', 'shop_and_commerce_pages_columns', 5);
	add_action('manage_pages_custom_column', 'shop_and_commerce_pages_custom_columns', 5, 2);

	function shop_and_commerce_pages_columns($defaults){
		$defaults['shop_and_commerce_pages_columns'] = __('Featured Image', 'shop-and-commerce');
		return $defaults;
	}

	function shop_and_commerce_pages_custom_columns($column_name, $id){
			if($column_name === 'shop_and_commerce_pages_columns'){
			echo the_post_thumbnail( 'featured-thumbnail' );
		}
	}
	
/*********************************************************************************************************
* Add Thumbnails in Posts
**********************************************************************************************************/

	add_filter('manage_posts_columns', 'shop_and_commerce_posts_columns', 5);
	add_action('manage_posts_custom_column', 'shop_and_commerce_posts_custom_columns', 5, 2);

	function shop_and_commerce_posts_columns($defaults){
		$defaults['mn_post_thumbs'] = __('Featured Image', 'shop-and-commerce');
		return $defaults;
	}

	function shop_and_commerce_posts_custom_columns($column_name, $id){
			if($column_name === 'mn_post_thumbs'){
			echo the_post_thumbnail( 'featured-thumbnail' );
		}
	}

	
/***********************************************************************************
 * SEOS Shop And Commerce Buy
***********************************************************************************/

		function shop_and_commerce_support($wp_customize){
			class Seos_Business_Customize extends WP_Customize_Control {
				public function render_content() { ?>
				<div class="shop_and_commerce-info"> 
					<div class="button media-button button-primary button-large media-button-select">
						<a style="color: #fff;" href="<?php echo esc_url( 'https://seosthemes.com/free-wordpress-shop-and-commerce-theme/' ); ?>" title="<?php esc_attr_e( 'Update Pro', 'shop-and-commerce' ); ?>" target="_blank">
						<?php _e( 'Shop And Commerce Update Pro', 'shop-and-commerce' ); ?>
						</a>
					</div>
				</div>
				<?php
				}
			}
		}
		add_action('customize_register', 'shop_and_commerce_support');

		function customize_styles_shop_and_commerce( $input ) { ?>
			<style type="text/css">
				#customize-theme-controls #accordion-section-shop_and_commerce_buy_section .accordion-section-title,
				#customize-theme-controls #accordion-section-shop_and_commerce_buy_section > .accordion-section-title {
					background: #555555;
					color: #FFFFFF;
				}

				.shop_and_commerce-info button a {
					color: #FFFFFF;
				}	
			</style>
		<?php }
		
		add_action( 'customize_controls_print_styles', 'customize_styles_shop_and_commerce');

		if ( ! function_exists( 'shop_and_commerce_buy' ) ) :
			function shop_and_commerce_buy( $wp_customize ) {
			$wp_customize->add_section( 'shop_and_commerce_buy_section', array(
				'title'			=> __('Shop And Commerce Update Pro', 'shop-and-commerce'),
				'description'	=> __('	Learn more about Shop And Commerce. ','shop-and-commerce'),
				'priority'		=> 1,
			));
			$wp_customize->add_setting( 'shop_and_commerce_setting', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new Seos_Business_Customize(
					$wp_customize,'shop_and_commerce_setting', array(
						'label'		=> __('Shop And Commerce Update Pro', 'shop-and-commerce'),
						'section'	=> 'shop_and_commerce_buy_section',
						'settings'	=> 'shop_and_commerce_setting',
					)
				)
			);
		}
		endif;
		 
		add_action('customize_register', 'shop_and_commerce_buy');
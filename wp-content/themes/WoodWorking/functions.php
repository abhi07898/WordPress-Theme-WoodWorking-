<?php
/**
 * create a function for defiening and adding the css and js files for read the whole JS and CSS content
 * Ced_woodWorking_theme_script
 *
 * @return void
 */
function Ced_woodWorking_theme_script()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}
//hooks implimentation
add_action('wp_enqueue_scripts', 'Ced_woodWorking_theme_script');
// add theme suppport- means adding the content which is supportable by this theme
add_theme_support(
    'post-formats',
    array(
        'link',
        'aside',
        'gallery',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat',
    )
);
add_theme_support('post-thumbnails');
set_post_thumbnail_size(1568, 9999);
// creating funciton for menus and create a hoks action 
/**
 * register_my_menus
 *
 * @return void
 */
function register_my_menus() 
{
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu'),
        'footer-menu' => __( 'Footer')
       )
    );
}
add_action('init', 'register_my_menus');
/**
 * function for footer
 * Ced_woodWorking_sidebar_registration
 *
 * @return void
 */
function Ced_woodWorking_sidebar_registration() 
{
    // Arguments used in all register_sidebar() calls.
    $shared_args = array(
        'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
        'after_title'   => '</h2>',
        'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
        'after_widget'  => '</div></div>',
    );
    // Footer #1.
    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => __( 'SieBar-1', 'woodWorking' ),
                'id'          => 'sidebar-1',
                'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'woodWorking' ),
            )
        )
    );
    // Footer #2.
    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => __( 'SideBar-2', 'woodWorking' ),
                'id'          => 'sidebar-2',
                'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'woodWorking' ),
            )
        )
    );

}

add_action( 'widgets_init', 'Ced_woodWorking_sidebar_registration' );

/**
 * Portofolio_post_type
 *
 * @return void
 */
function Portofolio_post_type() {
    $labels = array(
     'name'                => _x( 'Portofolios', 'Post Type General Name', 'acsweb' ),
     'singular_name'       => _x( 'Portofolio', 'Post Type Singular Name', 'acsweb' ),
     'menu_name'           => __( 'Portofolio', 'acsweb' ),
     'parent_item_colon'   => __( 'Parent Portofolio', 'acsweb' ),
     'all_items'           => __( 'All Portofolio', 'acsweb' ),
     'view_item'           => __( 'View Portofolio', 'acsweb' ),
     'add_new_item'        => __( 'Add New Portofolio', 'acsweb' ),
     'add_new'             => __( 'Add New', 'acsweb' ),
     'edit_item'           => __( 'Edit Portofolio', 'acsweb' ),
     'update_item'         => __( 'Update Portofolio', 'acsweb' ),
     'search_items'        => __( 'Search Portofolio', 'acsweb' ),
     'not_found'           => __( 'Not Found', 'acsweb' ),
     'not_found_in_trash'  => __( 'Not found in Trash', 'acsweb' ),
    );
    $args = array(
     'label'               => __( 'Portofolio', 'acsweb' ),
     'description'         => __( 'Portofolio news and reviews', 'acsweb' ),
     'labels'              => $labels,
     'supports'            => array( 'title','screen','editor', 'excerpt', 'author', 'thumbnail','comments' ),
    //  defining slug variable
     'rewrite'             => array('slug' => 'Portofolio'),
     'hierarchical'        => false,
     'public'              => true,
     'show_ui'             => true,
     'show_in_menu'        => true,
     'show_in_nav_menus'   => true,
     'show_in_admin_bar'   => true, 
     'menu_position'       => 5,
     'menu_icon'           => '',
     'can_export'          => true,
     'has_archive'         => true,
     'exclude_from_search' => false,
     'publicly_queryable'  => true,
     'capability_type'     => 'page',
     'taxonomies'          => array( 'category'),
     
    );
    register_post_type('Portofolio', $args);
   }
   add_action( 'init', 'Portofolio_post_type' );
  
/**
 * create a function for add custom texonomy
 * Ced_create_texonomy_for_Portofolio
 *
 * @return void
 */
function Ced_create_texonomy_for_Portofolio() {

    $labels = array(
        'name'              => _x( 'Tags', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Tags', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Tags', 'textdomain' ),
        'all_items'         => __( 'All Tags', 'textdomain' ),
        'parent_item'       => __( 'Parent Tags', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Tags:', 'textdomain' ),
        'edit_item'         => __( 'Edit Tags', 'textdomain' ),
        'update_item'       => __( 'Update Tags', 'textdomain' ),
        'add_new_item'      => __( 'Add New Tags', 'textdomain' ),
        'new_item_name'     => __( 'New Tags Name', 'textdomain' ),
        'menu_name'         => __( 'Tags', 'textdomain' ),
    );
    /**
    * create a function for add custome texonomy
    * Ced_create_texonomy_for_Portofolio
    *
    * @return void
    */
    $args = array(
        'labels'                => $labels,
        'description'           => __( 'Tags', 'textdomain' ),
        'hierarchical'          => false,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_tagcloud'         => true,
        'show_in_quick_edit'    => true,
        'show_admin_column'     => false,
        'show_in_rest'          => true,
    );
    register_taxonomy( 'tags', array('portofolio'), $args );
    $labels = array(
        'name'              => _x( 'Colors', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Color', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Colors', 'textdomain' ),
        'all_items'         => __( 'All Colors', 'textdomain' ),
        'parent_item'       => __( 'Parent Color', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Color:', 'textdomain' ),
        'edit_item'         => __( 'Edit Color', 'textdomain' ),
        'update_item'       => __( 'Update Color', 'textdomain' ),
        'add_new_item'      => __( 'Add New Color', 'textdomain' ),
        'new_item_name'     => __( 'New Color Name', 'textdomain' ),
        'menu_name'         => __( 'Color', 'textdomain' ),
    );
    $args = array(
        'labels'                => $labels,
        'description'           => __( 'Colors of Products', 'textdomain' ),
        'hierarchical'          => false,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_tagcloud'         => true,
        'show_in_quick_edit'    => true,
        'show_admin_column'     => false,
        'show_in_rest'          => true,
    );
    register_taxonomy( 'color', array('portofolio'), $args );
}
add_action( 'init', 'Ced_create_texonomy_for_Portofolio' );
/**
 * create a funtion for custome widgets date = (28-12-2020)
 * wpb_widget
 */
class wpb_widget extends WP_Widget {  
    function __construct() {
    parent::__construct(      
        // Base ID of your widget
        'wpb_widget',      
        // Widget name will appear in UI
    __  ('WPBeginner Widget', 'wpb_widget_domain'),       
        // Widget description
        array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), ) 
        );
    }    
    // Creating widget front-end    
    public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title']; 
    // This is where you run the code and display the output
        $loop = new WP_Query( array( 'post_type' => 'Portofolio', 'posts_per_page' => 10 ) ); 
        while ( $loop->have_posts() ) : $loop->the_post();
        the_title('<a href="' . get_permalink()  . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark" center>', '</a></br>' ); 
        endwhile;  
    echo $args['after_widget'];
    }
              
    // Widget Backend     
    /**
     * form
     *
     * @param  mixed $instance
     * @return void
     */
    public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
    $title = $instance[ 'title' ];
    }
    else {
    $title = __('New title', 'wpb_widget_domain' );
    }
    // Widget admin form
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php 
    }
    /**
     * update
     *
     * Updating widget replacing old instances with new 
     * @param  mixed $new_instance
     * @param  mixed $old_instance
     * @return void
     */
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
    }
}   
    /**
     * 
     * Register and load the widget    
     * wpb_load_widget
     *
     * @return void
     */
    function wpb_load_widget() {
        register_widget( 'wpb_widget' );
    }
    add_action( 'widgets_init', 'wpb_load_widget');  
    
    // function call_back_fun($title) {
    //     $post_types = get_post_types( );
    //             return '<strong> Abhishek' . $title . '</strong>';
    // }
    // add_filter( 'the_title','call_back_fun');
?>

<?php
// The widget class
class Subscribe_Now_Widgit extends WP_Widget {

	// Main constructor
	public function __construct() {
		parent::__construct(
			'my_custom_widget',
			__( 'Subscribe_Now_Widgit', 'text_domain' ),
			array(
				'customize_selective_refresh' => true,	
			)
		);
	}

	// The widget form (for the backend )
	public function form( $instance ) {

		// Set widget defaults
		$defaults = array(
			'title'    => '',
			'check_box' => ''
		);
		
		// Parse current settings with defaults
		 wp_parse_args( ( array ) $instance, $defaults ) ; ?>

		<?php // Widget Title ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<!-- showing the whoele post types -->
		<?php
			$args = array(
			   'public'   => true,
			   '_builtin' => false
			);
			  
			$output = 'names'; // 'names' or 'objects' (default: 'names')
			$operator = 'or'; // 'and' or 'or' (default: 'and')
			  
			$post_types = get_post_types( $args, $output, $operator );
			  
			if ( $post_types ) { // If there are any custom public post types.
			   echo "The post's Type <br><br>";
			    foreach ( $post_types  as $post_type ) { ?>
			    		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'check_box') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'check_box[]' ) ); ?>" type="checkbox" value="<?php echo $post_type ;?>" /><?php echo $post_type ?> <br>
			        
			   <?php  }			  
			    echo '</input>'; 
			}
		?>



		

	<?php }

	// Update widget settings
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		
		$instance['check_box'] = isset( $new_instance['check_box'] ) ? $new_instance['check_box']: false;
		print_r($instance['check_box']);
		// $instance['select']   = isset( $new_instance['select'] ) ? wp_strip_all_tags( $new_instance['select'] ) : '';
		return $instance;
	}

	// Display the widget
	public function widget( $args, $instance ) {

		extract( $args );
		// print_r($instance);
		// Check the widget options
		$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		$text     = isset( $instance['text'] ) ? $instance['text'] : '';
		// $textarea = isset( $instance['textarea'] ) ?$instance['textarea'] : '';
		// $select   = isset( $instance['select'] ) ? $instance['select'] : '';
		$checkbox = ! empty( $instance['checkbox'] ) ? $instance['checkbox'] : false;

		// WordPress core before_widget hook (always include )
		// echo $before_widget;

		// Display the widget
		echo '<div class="widget-text wp_widget_plugin_box">';

			// Display widget title if defined
			if ( $title ) {
				echo $title;
			}

		echo '</div>';

		// WordPress core after_widget hook (always include )
		// echo $after_widget;
		if ( is_single() && 'post' == get_post_type() ) {
				echo '<form method="POST"> Enter Your Email For Subscribe <br> <br><input type="email"  placeholder = "E-mail like(abhi07898@gmail.com)"name="email"><br><br><input type="submit" name="submit_email" value="SUBSCRIBE NOW"> 
					<input type="hidden" name="get_id" value="'.get_the_ID().'">
				</form> <br>';
		}
	
	}

}

// Register the widget
function my_register_custom_widget() {
	register_widget( 'Subscribe_Now_Widgit' );
}
add_action( 'widgets_init', 'my_register_custom_widget' );
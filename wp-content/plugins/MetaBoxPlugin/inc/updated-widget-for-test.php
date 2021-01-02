<?php
// Creating the widget 
class Updated_widgets_for_test extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'wpb_widget1', 
  
// Widget name will appear in UI
__('Updated_widgets_for_test', 'wpb_widget_domain'), 
  
// Widget description
array( 'description' => __( 'Subscribe Widgits ', 'wpb_widget_domain' ), ) 
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
if ( is_single() && (in_array(get_post_type(), $instance['check_box']))) {
				echo '<form method="POST"> Enter Your Email For Subscribe <br> <br><input type="email"  placeholder = "E-mail like(abhi07898@gmail.com)"name="email"><br><br><input type="submit" name="submit_email" value="SUBSCRIBE NOW"> 
					<input type="hidden" name="get_id" value="'.get_the_ID().'">
				</form> <br>','wpb_widget_domain';
		}
echo $args['after_widget'];
}
          
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<?php 

// ?concept for show the whole post type in backend of the wordpress
	$arggs = array(
	   'public'   => true,
	   '_builtin' => false
	);
	  
	$output = 'names'; // 'names' or 'objects' (default: 'names')
	$operator = 'or'; // 'and' or 'or' (default: 'and')
	  
	$post_types = get_post_types( $arggs, $output, $operator );
	  
	if ( $post_types ) { // If there are any custom public post types.
	   echo "The post's Type <br><br>";
	    foreach ( $post_types  as $post_type ) { ?>
	    		<input class="widefat" id="<?php echo  $this->get_field_id( 'check_box').$post_type ;?>" name = "<?php echo  $this->get_field_name( 'check_box[]' ) ; ?>" type="checkbox" value="<?php echo $post_type ;?>" /><?php echo $post_type ?> <br>
	        
	   <?php  }			  
	}      
}
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['check_box'] = isset(( $new_instance['check_box'] ) ) ? ( $new_instance['check_box'] ) : false;
// print_r($instance);
// die;
return $instance;
}
 
// Class wpb_widget ends here
} 
 
 
// Register and load the widget

?>
<?php
/**
 * Template Name: Home - Page
 */

	get_header();
	$ecommerce_plus_options = ecommerce_plus_get_theme_options();

	//2 sections before content
	do_action($ecommerce_plus_options['home_section_1']);
	do_action($ecommerce_plus_options['home_section_2']);
	
?>

<div class="inner-content-wrapper">
	<div class="container">
		<div class="row">
		<?php 
		while ( have_posts() ) : the_post();
			the_content();
		endwhile; // End of the loop.
		?>
		</div>
	</div>
</div>

<div class="home-template-wrapper">
	<?php
	//other sections after content
	do_action($ecommerce_plus_options['home_section_3']);
	do_action($ecommerce_plus_options['home_section_4']);
	do_action($ecommerce_plus_options['home_section_5']);
	do_action($ecommerce_plus_options['home_section_6']);
	do_action($ecommerce_plus_options['home_section_7']);
	do_action($ecommerce_plus_options['home_section_8']);
	do_action($ecommerce_plus_options['home_section_9']);
	do_action($ecommerce_plus_options['home_section_10']);
	do_action($ecommerce_plus_options['home_section_11']);	
	do_action($ecommerce_plus_options['home_section_12']);					
	?>
</div>

<?php
get_footer();

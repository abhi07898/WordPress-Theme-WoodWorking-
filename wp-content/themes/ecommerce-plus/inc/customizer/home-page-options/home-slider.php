<?php
/**
 * Slider Section options
 */
$ecommerce_plus_options = ecommerce_plus_get_theme_options();

// Add Slider section
$wp_customize->add_section( 'ecommerce_plus_slider_section', array(
	'title'             => esc_html__( 'Main Slider','ecommerce-plus' ),
	'description'       => esc_html__( 'Slider Section options. Select post category, height, button text and a link. First create a page from home-page-template and set as home page. Then open customizer.', 'ecommerce-plus' ),
	'panel'             => 'ecommerce_plus_home_panel',
));

$wp_customize->selective_refresh->add_partial( 'ecommerce_plus_options[slider_cat]', array(
	'selector' => '#home-post-slider .carousel-caption',
) );
	

// Post Category
$wp_customize->add_setting( 'ecommerce_plus_options[slider_cat]' , array(
	'default'   		=> $ecommerce_plus_options['slider_cat'],
	'sanitize_callback' => 'ecommerce_plus_sanitize_select',
	'type'				=> 'option'
));

$wp_customize->add_control('ecommerce_plus_options[slider_cat]' , array(
	'label' 	=> __('Select Category','ecommerce-plus' ),
	'section' 	=> 'ecommerce_plus_slider_section',
	'type'		=> 'select',
	'choices'	=> ecommerce_plus_get_post_categories(),
));

// Slider btn label
$wp_customize->add_setting( 'ecommerce_plus_options[slider_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'type' 				=> 'option',
	'default'			=> $ecommerce_plus_options['slider_btn_label'],
));

$wp_customize->add_control( 'ecommerce_plus_options[slider_btn_label]', array(
	'label'           	=> esc_html__( 'Button Label', 'ecommerce-plus' ),
	'section'        	=> 'ecommerce_plus_slider_section',
	'type'				=> 'text',
));

//url
$wp_customize->add_setting( 'ecommerce_plus_options[slider_btn_url]', array(
	'sanitize_callback' => 'esc_url_raw',
	'type' 				=> 'option',
	'default'			=> $ecommerce_plus_options['slider_btn_url'],
));

$wp_customize->add_control( 'ecommerce_plus_options[slider_btn_url]', array(
	'label'           	=> esc_html__( 'Button Link', 'ecommerce-plus' ),
	'description'       => esc_html__( '(If empty, the post link will be used)', 'ecommerce-plus' ),
	'section'        	=> 'ecommerce_plus_slider_section',
	'type'				=> 'text',
));


// Height
$wp_customize->add_setting( 'ecommerce_plus_options[slider_height]', array(
	'default'   		=> $ecommerce_plus_options['slider_height'],
	'sanitize_callback' => 'absint',
	'type'      		=> 'option'
));

$wp_customize->add_control('ecommerce_plus_options[slider_height]', array(
	'section'   => 'ecommerce_plus_slider_section',
	'label'     =>  esc_html__( 'Slider Height (px)', 'ecommerce-plus' ),
	'type'      => 'number'
));


// Max Slides
$wp_customize->add_setting( 'ecommerce_plus_options[slider_max]', array(
	'default'   		=> $ecommerce_plus_options['slider_max'],
	'sanitize_callback' => 'absint',
	'type'      		=> 'option'
));

$wp_customize->add_control('ecommerce_plus_options[slider_max]', array(
	'section'   => 'ecommerce_plus_slider_section',
	'label'     =>  esc_html__( 'Number of Slides', 'ecommerce-plus' ),
	'type'      => 'number'
));


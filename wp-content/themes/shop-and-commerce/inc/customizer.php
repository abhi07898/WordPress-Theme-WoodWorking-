<?php
/**
 * Theme Customizer.
 *
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shop_and_commerce_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	function shop_and_commerce_kirki_configuration() {
    return array( 'url_path'     => get_stylesheet_directory_uri() . '/kirki/' );
}
add_filter( 'kirki/config', 'shop_and_commerce_kirki_configuration' );

/***********************************************************************************
 * Home Page Image
***********************************************************************************/	

		
		
/********** Home Page Image **********/
		
		$wp_customize->add_section( 'shop_and_commerce_front_page_image' , array(
			'title'       => __( 'Home Page Image', 'shop-and-commerce' ),
			'description' => __( 'Select IMG. The image will be activated in your home page.', 'shop-and-commerce' ),
			'priority'		=> 2,
		) );

		$wp_customize->add_setting( 'hide_home_image', array(
		'default'        => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'hide_home_image', array(
			'section'   => 'shop_and_commerce_front_page_image',
			'label'     => 'Hide Home Page Image',
			'type'      => 'checkbox'
			 )
		);	
	 
		$wp_customize->add_setting( 'front_page_image', array (
			'default' => get_template_directory_uri() .'/images/home-page.jpg',
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
			$wp_customize, 
			'front_page_image', 
			array(
					'default-image' => get_template_directory_uri() . '/images/home-page.jpg',	
				'label'      => __( 'Image:', 'shop-and-commerce' ),
				'description' => __( 'Load IMG from your media:', 'shop-and-commerce' ),
				'section'    => 'shop_and_commerce_front_page_image',
				'settings'   => 'front_page_image',
			) ) );

		$wp_customize->add_setting( 'activate_custom_height', array(
		'default'        => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'activate_custom_height', array(
			'section'   => 'shop_and_commerce_front_page_image',
			'label'     => 'Activate Custom Height',
			'type'      => 'checkbox'
			 )
		);	
		
		$wp_customize->add_setting( 'custom_height', array(
		'default'        => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'custom_height', array(
			'type' => 'range',
			'priority' => 10,
			'section' => 'shop_and_commerce_front_page_image',
			'label' => __( 'Custom Height', 'shop-and-commerce' ),
			'description' => '',
			'input_attrs' => array(
				'min' => 45,
				'max' => 100,
				'step' => 1,
			),
		) );
	
/***********************************************************************************
 * Home Page Buttons
***********************************************************************************/	

		
		$wp_customize->add_panel( 'shop_and_commerce_buttons' , array(
			'title'       => __( 'Home Page Buttons', 'shop-and-commerce' ),
			'priority'		=> 3,
		) );
		
/********** Button 1 **********/

		$wp_customize->add_setting( 'hide_buttn_1', array(
		'default'        => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'hide_buttn_1', array(
			'section'   => 'shop_and_commerce_section_buttons',
			'label'     => 'Hide Button 1',
			'type'      => 'checkbox'
			 )
		 );	
		 
		$wp_customize->add_section( 'shop_and_commerce_section_buttons' , array(
			'title'       => __( 'Home Page Button 1', 'shop-and-commerce' ),
			'panel' => 'shop_and_commerce_buttons',
			'priority'		=> 3,
		) );
		
		$wp_customize->add_setting( 'shop_and_commerce_button_text1', array (
			'default' => 'Read More',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop_and_commerce_button_text1', array(
			'label'    => __( 'Button Text 1:', 'shop-and-commerce' ),
			'section'  => 'shop_and_commerce_section_buttons',
			'description' => __( 'Add Text. The buttons will be activated in your home page:', 'shop-and-commerce' ),
			'settings' => 'shop_and_commerce_button_text1',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'shop_and_commerce_button_url1', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => '#',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop_and_commerce_button_url1', array(
			'label'    => __( 'Button URL:', 'shop-and-commerce' ),
			'section'  => 'shop_and_commerce_section_buttons',
			'description' => __( 'Copy and paste the URL from your media:', 'shop-and-commerce' ),			
			'settings' => 'shop_and_commerce_button_url1',
		) ) );
				
/********** Button 2 **********/

		$wp_customize->add_setting( 'hide_buttn_2', array(
		'default'        => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'hide_buttn_2', array(
			'section'   => 'shop_and_commerce_section_buttons2',
			'label'     => 'Hide Button 2',
			'type'      => 'checkbox'
			 )
		 );	
		 
		$wp_customize->add_section( 'shop_and_commerce_section_buttons2' , array(
			'title'       => __( 'Home Page Button 2', 'shop-and-commerce' ),
			'panel' => 'shop_and_commerce_buttons',
			'priority'		=> 3,
		) );
		
		$wp_customize->add_setting( 'shop_and_commerce_button_text2', array (
			'default' => 'Read More',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop_and_commerce_button_text2', array(
			'label'    => __( 'Button Text 2:', 'shop-and-commerce' ),
			'section'  => 'shop_and_commerce_section_buttons2',
			'description' => __( 'Add Text. The buttons will be activated in your home page:', 'shop-and-commerce' ),
			'settings' => 'shop_and_commerce_button_text2',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'shop_and_commerce_button_url2', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => '#',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop_and_commerce_button_url2', array(
			'label'    => __( 'Button URL:', 'shop-and-commerce' ),
			'section'  => 'shop_and_commerce_section_buttons2',
			'description' => __( 'Copy and paste the URL from your media:', 'shop-and-commerce' ),			
			'settings' => 'shop_and_commerce_button_url2',
		) ) );
		
/***********************************************************************************
 * Home Page Products
***********************************************************************************/	
		
		$wp_customize->add_panel( 'shop_and_commerce_homa_image_panel' , array(
			'title'       => __( 'Home Page Products', 'shop-and-commerce' ),
			'description' => __( 'Select IMG and Recent News will be activated in your home page.', 'shop-and-commerce' ),
			'priority'		=> 3,
		) );
		
		
/********** Products 1 **********/
		 
		$wp_customize->add_section( 'shop_and_commerce_section_1' , array(
			'title'       => __( 'Products 1', 'shop-and-commerce' ),
			'panel' => 'shop_and_commerce_homa_image_panel',
			'description' => __( 'Select IMG. The image will be activated in your home page.', 'shop-and-commerce' ),
			'priority'		=> 3,
		) );

		$wp_customize->add_setting( 'hide_img_1', array(
			'default'        => false,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'hide_img_1', array(
			'section'   => 'shop_and_commerce_section_1',
			'label'     => 'Hide Default Image 1',
			'type'      => 'checkbox'
			 )
		 );	
		 
		$wp_customize->add_setting( 'shop_and_commerce_img1', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => get_template_directory_uri() .'/images/product1.jpg',
		) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
			$wp_customize, 
			'shop_and_commerce_img1', 
			array(
				'label'      => __( 'Image:', 'shop-and-commerce' ),
				'description' => __( 'Load IMG from your media:', 'shop-and-commerce' ),
				'section'    => 'shop_and_commerce_section_1',
				'settings'   => 'shop_and_commerce_img1',
			) ) );
			
		$wp_customize->add_setting( 'shop_and_commerce_title1', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop_and_commerce_title1', array(
			'label'    => __( 'Image Title:', 'shop-and-commerce' ),
			'section'  => 'shop_and_commerce_section_1',
			'description' => __( 'The title of your Image. Will be activated in your home page:', 'shop-and-commerce' ),
			'settings' => 'shop_and_commerce_title1',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'shop_and_commerce_text1', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop_and_commerce_text1', array(
			'label'    => __( 'Price:', 'shop-and-commerce' ),
			'section'  => 'shop_and_commerce_section_1',
			'description' => __( 'Content of your Image. Will be activated in your home page:', 'shop-and-commerce' ),
			'settings' => 'shop_and_commerce_text1',
			'type' => 'text',
		) ) );
			
		$wp_customize->add_setting( 'shop_and_commerce_url1', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => '#',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop_and_commerce_url1', array(
			'label'    => __( 'Image URL:', 'shop-and-commerce' ),
			'section'  => 'shop_and_commerce_section_1',
			'description' => __( 'Copy and paste the URL from your media:', 'shop-and-commerce' ),			
			'settings' => 'shop_and_commerce_url1',
		) ) );
			
		
/********** Products 2 **********/
		
		$wp_customize->add_section( 'shop_and_commerce_section_2' , array(
			'title'       => __( 'Products 2', 'shop-and-commerce' ),
			'panel' => 'shop_and_commerce_homa_image_panel',
			'description' => __( 'Select IMG. The image will be activated in your home page.', 'shop-and-commerce' ),
			'priority'		=> 3,
		) );

		$wp_customize->add_setting( 'hide_img_2', array(
			'default'        => false,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'hide_img_2', array(
			'section'   => 'shop_and_commerce_section_2',
			'label'     => 'Hide Default Image 2',
			'type'      => 'checkbox'
			 )
		 );	
		 
		$wp_customize->add_setting( 'shop_and_commerce_img2', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => get_template_directory_uri() .'/images/product2.jpg',			
		) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
			$wp_customize, 
			'shop_and_commerce_img2', 
			array(
				'label'      => __( 'Image:', 'shop-and-commerce' ),
				'description' => __( 'Load IMG from your media:', 'shop-and-commerce' ),
				'section'    => 'shop_and_commerce_section_2',
				'settings'   => 'shop_and_commerce_img2',
			) ) );
			
		$wp_customize->add_setting( 'shop_and_commerce_title2', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop_and_commerce_title2', array(
			'label'    => __( 'Image Title:', 'shop-and-commerce' ),
			'section'  => 'shop_and_commerce_section_2',
			'description' => __( 'The title of your Image. Will be activated in your home page:', 'shop-and-commerce' ),
			'settings' => 'shop_and_commerce_title2',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'shop_and_commerce_text2', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop_and_commerce_text2', array(
			'label'    => __( 'Price:', 'shop-and-commerce' ),
			'section'  => 'shop_and_commerce_section_2',
			'description' => __( 'Content of your Image. Will be activated in your home page:', 'shop-and-commerce' ),
			'settings' => 'shop_and_commerce_text2',
			'type' => 'text',
		) ) );
			
		$wp_customize->add_setting( 'shop_and_commerce_url2', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => '#',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop_and_commerce_url2', array(
			'label'    => __( 'Image URL:', 'shop-and-commerce' ),
			'section'  => 'shop_and_commerce_section_2',
			'description' => __( 'Copy and paste the URL from your media:', 'shop-and-commerce' ),			
			'settings' => 'shop_and_commerce_url2',
		) ) );
		
/********** Products 3 **********/
		
		$wp_customize->add_section( 'shop_and_commerce_section_3' , array(
			'title'       => __( 'Products 3', 'shop-and-commerce' ),
			'panel' => 'shop_and_commerce_homa_image_panel',
			'description' => __( 'Select IMG. The image will be activated in your home page.', 'shop-and-commerce' ),
			'priority'		=> 3,
		) );

		$wp_customize->add_setting( 'hide_img_3', array(
			'default'        => false,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'hide_img_3', array(
			'section'   => 'shop_and_commerce_section_3',
			'label'     => 'Hide Default Image 3',
			'type'      => 'checkbox'
			 )
		 );	
		 
		$wp_customize->add_setting( 'shop_and_commerce_img3', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => get_template_directory_uri() .'/images/product3.jpg',			
		) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
			$wp_customize, 
			'shop_and_commerce_img3', 
			array(
				'label'      => __( 'Image:', 'shop-and-commerce' ),
				'description' => __( 'Load IMG from your media:', 'shop-and-commerce' ),
				'section'    => 'shop_and_commerce_section_3',
				'settings'   => 'shop_and_commerce_img3',
			) ) );
			
		$wp_customize->add_setting( 'shop_and_commerce_title3', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop_and_commerce_title3', array(
			'label'    => __( 'Image Title:', 'shop-and-commerce' ),
			'section'  => 'shop_and_commerce_section_3',
			'description' => __( 'The title of your Image. Will be activated in your home page:', 'shop-and-commerce' ),
			'settings' => 'shop_and_commerce_title3',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'shop_and_commerce_text3', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop_and_commerce_text3', array(
			'label'    => __( 'Price:', 'shop-and-commerce' ),
			'section'  => 'shop_and_commerce_section_3',
			'description' => __( 'Content of your Image. Will be activated in your home page:', 'shop-and-commerce' ),
			'settings' => 'shop_and_commerce_text3',
			'type' => 'text',
		) ) );
			
		$wp_customize->add_setting( 'shop_and_commerce_url3', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => '#',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop_and_commerce_url3', array(
			'label'    => __( 'Image URL:', 'shop-and-commerce' ),
			'section'  => 'shop_and_commerce_section_3',
			'description' => __( 'Copy and paste the URL from your media:', 'shop-and-commerce' ),			
			'settings' => 'shop_and_commerce_url3',
		) ) );


/********** Products 4 **********/
		
		$wp_customize->add_section( 'shop_and_commerce_section_4' , array(
			'title'       => __( 'Products 4', 'shop-and-commerce' ),
			'panel' => 'shop_and_commerce_homa_image_panel',
			'description' => __( 'Select IMG. The image will be activated in your home page.', 'shop-and-commerce' ),
			'priority'		=> 3,
		) );

		$wp_customize->add_setting( 'hide_img_4', array(
			'default'        => false,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'hide_img_4', array(
			'section'   => 'shop_and_commerce_section_4',
			'label'     => 'Hide Default Image 34',
			'type'      => 'checkbox'
			 )
		 );	
		 
		$wp_customize->add_setting( 'shop_and_commerce_img4', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => get_template_directory_uri() .'/images/product4.jpg',			
		) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
			$wp_customize, 
			'shop_and_commerce_img4', 
			array(
				'label'      => __( 'Image:', 'shop-and-commerce' ),
				'description' => __( 'Load IMG from your media:', 'shop-and-commerce' ),
				'section'    => 'shop_and_commerce_section_4',
				'settings'   => 'shop_and_commerce_img4',
			) ) );
			
		$wp_customize->add_setting( 'shop_and_commerce_title4', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop_and_commerce_title4', array(
			'label'    => __( 'Image Title:', 'shop-and-commerce' ),
			'section'  => 'shop_and_commerce_section_4',
			'description' => __( 'The title of your Image. Will be activated in your home page:', 'shop-and-commerce' ),
			'settings' => 'shop_and_commerce_title4',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'shop_and_commerce_text4', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop_and_commerce_text4', array(
			'label'    => __( 'Price:', 'shop-and-commerce' ),
			'section'  => 'shop_and_commerce_section_4',
			'description' => __( 'Content of your Image. Will be activated in your home page:', 'shop-and-commerce' ),
			'settings' => 'shop_and_commerce_text4',
			'type' => 'text',
		) ) );
			
		$wp_customize->add_setting( 'shop_and_commerce_url4', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => '#',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop_and_commerce_url4', array(
			'label'    => __( 'Image URL:', 'shop-and-commerce' ),
			'section'  => 'shop_and_commerce_section_4',
			'description' => __( 'Copy and paste the URL from your media:', 'shop-and-commerce' ),			
			'settings' => 'shop_and_commerce_url4',
		) ) );

/********** Other Products **********/

	for($pro=5;$pro<=60;$pro++) {

		$wp_customize->add_section( 'shop_and_commerce_section_'.$pro , array(
			'title'       => __( 'PRO Products '.$pro, 'shop-and-commerce' ),
			'panel' => 'shop_and_commerce_homa_image_panel',
			'description'    => __( '<a target="_blank" href="http://seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),	
			'priority'		=> 3,
		) );		 
		$wp_customize->add_setting( 'demo1'.$pro, array(
			'default'        => false,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'demo1'.$pro, array(
			'section'   => 'shop_and_commerce_section_'.$pro,
			'label'     => 'Products '.$pro,
			'type'      => 'radio'
			 )
		 );	
	}

/********** Product Slider **********/	
		$wp_customize->add_section( 'shop_and_commerce_slider_section' , array(
			'title'       => __( ' Product Slider PRO', 'shop-and-commerce' ),
			'description'    => __( '<a target="_blank" href="http://seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),	
			'priority'		=> 2,
		) );
		
		$wp_customize->add_setting( 'demo2', array(
			'default'        => false,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'demo2', array(
			'section'   => 'shop_and_commerce_slider_section',
			'label'     => 'Products ',
			'type'      => 'radio'
			 )
		 );	
}
add_action( 'customize_register', 'shop_and_commerce_customize_register' );

Kirki::add_panel( 'shop_and_commerce_panel1', array(
    'priority'    => 4,
    'title'       => __( 'Theme Options PRO', 'shop-and-commerce' ),
    'description' => __( 'Theme Options', 'shop-and-commerce' ),
) );

/***********************************************
Theme Options
************************************************/

Kirki::add_section( 'sectio_1', array(
    'title'          => __( 'Custom CSS PRO', 'shop-and-commerce' ),
	'panel'          => 'shop_and_commerce_panel1',	
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_1', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_1', array(
	'type'        => 'radio',
	'settings'    => 'options_1',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),
	'section'     => 'sectio_1',
) );

/*******************************/

Kirki::add_section( 'sectio_2', array(
    'title'          => __( 'Disable All Comments PRO', 'shop-and-commerce' ),
	'panel'          => 'shop_and_commerce_panel1',
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_2', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_2', array(
	'type'        => 'radio',
	'settings'    => 'options_2',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_2',
) );


/*******************************/

Kirki::add_section( 'sectio_3', array(
    'title'          => __( 'Hide Content and Sidebar - Home Page PRO', 'shop-and-commerce' ),
	'panel'          => 'shop_and_commerce_panel1',
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_3', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_3', array(
	'type'        => 'radio',
	'settings'    => 'options_3',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_3',
) );


/*******************************/

Kirki::add_section( 'sectio_4', array(
    'title'          => __( 'Hide All Titles PRO', 'shop-and-commerce' ),
	'panel'          => 'shop_and_commerce_panel1',
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_4', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_4', array(
	'type'        => 'radio',
	'settings'    => 'options_4',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_4',
) );


/*******************************/

Kirki::add_section( 'sectio_5', array(
    'title'          => __( 'All Google Fonts PRO', 'shop-and-commerce' ),
	'panel'          => 'shop_and_commerce_panel1',	
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_5', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_5', array(
	'type'        => 'radio',
	'settings'    => 'options_5',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_5',
) );


/*******************************/

Kirki::add_section( 'sectio_6', array(
    'title'          => __( 'Mobile Call Now PRO', 'shop-and-commerce' ),
	'panel'          => 'shop_and_commerce_panel1',
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_6', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_6', array(
	'type'        => 'radio',
	'settings'    => 'options_6',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_6',
) );



/*******************************/

Kirki::add_section( 'sectio_7', array(
    'title'          => __( 'Read More Button Options PRO', 'shop-and-commerce' ),
	'panel'          => 'shop_and_commerce_panel1',
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_7', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_7', array(
	'type'        => 'radio',
	'settings'    => 'options_7',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_7',
) );


/***********************************************
WooCommerce Cart Options
************************************************/

Kirki::add_panel( 'woocommerce', array(
    'priority'    => 10,
    'title'       => __( 'WooCommerce', 'shop-and-commerce' ),
    'description' => __( 'WooCommerce', 'shop-and-commerce' ),
) );

Kirki::add_section( 'shop_and_commerce_section_animations_8', array(
    'title'          => __( 'WooCommerce Cart Options', 'shop-and-commerce' ),
	'panel'          => 'woocommerce',
    'priority'       => 7,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'seos_display_woo_cart', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'seos_display_woo_cart', array(
	'type'        => 'switch',
	'settings'    => 'seos_display_woo_cart',
	'label'       => __( 'Activate Cart in Header', 'shop-and-commerce' ),
	'description'       => __( 'WooCommerce is a free eCommerce plugin that allows you to sell anything, beautifully. Built to integrate seamlessly with WordPress, WooCommerce is the world’s favorite eCommerce solution that gives both store owners and developers complete control. Before using woocommerce options you need install WooCommerce. <a target="_blank" href="https://wordpress.org/plugins/woocommerce/">Download here.</a><br />', 'shop-and-commerce' ),
	'section'     => 'shop_and_commerce_section_animations_8',
	'default'     => '',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'on', 'shop-and-commerce' ),
		'' => esc_attr__( 'off', 'shop-and-commerce' ),
	),
) );

Kirki::add_config( 'display_woo_cart_text_item', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'display_woo_cart_text_item', array(
	'type'     => 'text',
	'settings' => 'display_woo_cart_text_item',
	'label'    => __( 'Custom Item Text', 'shop-and-commerce' ),
	'section'  => 'shop_and_commerce_section_animations_8',
 
	'priority' => 10,
) );

Kirki::add_config( 'display_woo_cart_text_items', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'display_woo_cart_text_items', array(
	'type'     => 'text',
	'settings' => 'display_woo_cart_text_items',
	'label'    => __( 'Custom Items Text', 'shop-and-commerce' ),
	'section'  => 'shop_and_commerce_section_animations_8',
 
	'priority' => 10,
) );


Kirki::add_config( 'display_woo_cart_text_empty_cart', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'display_woo_cart_text_empty_cart', array(
	'type'     => 'text',
	'settings' => 'display_woo_cart_text_empty_cart',
	'label'    => __( 'Custom Empty Cart Text', 'shop-and-commerce' ),
	'section'  => 'shop_and_commerce_section_animations_8',
 
	'priority' => 10,
) );


Kirki::add_config( 'shop_and_commerce_woo_cart_color', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'shop_and_commerce_woo_cart_color', array(
	'type'        => 'color',
	'settings'    => 'shop_and_commerce_woo_cart_color',
	'label'       => __( 'Cart Color', 'shop-and-commerce' ),
	'section'     => 'shop_and_commerce_section_animations_8',
	'default'     => '#683B60',
	'priority'    => 10,
) );	

Kirki::add_config( 'shop_and_commerce_woo_cart_hover_color', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'shop_and_commerce_woo_cart_hover_color', array(
	'type'        => 'color',
	'settings'    => 'shop_and_commerce_woo_cart_hover_color',
	'label'       => __( 'Cart Hover Color', 'shop-and-commerce' ),
	'section'     => 'shop_and_commerce_section_animations_8',
	'default'     => '#97568b',
	'priority'    => 10,
) );	

Kirki::add_config( 'shop_and_commerce_woo_cart_background', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'shop_and_commerce_woo_cart_background', array(
	'type'        => 'color',
	'settings'    => 'shop_and_commerce_woo_cart_background',
	'label'       => __( 'Cart Background Color', 'shop-and-commerce' ),
	'section'     => 'shop_and_commerce_section_animations_8',
	'default'     => '#f1f1f1',
	'priority'    => 10,
) );	

Kirki::add_config( 'shop_and_commerce_woo_cart_background_hover', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'shop_and_commerce_woo_cart_background_hover', array(
	'type'        => 'color',
	'settings'    => 'shop_and_commerce_woo_cart_background_hover',
	'label'       => __( 'Cart Background Hover Color', 'shop-and-commerce' ),
	'section'     => 'shop_and_commerce_section_animations_8',
	'default'     => '#f1f1f1',
	'priority'    => 10,
) );	

/*******************************/

Kirki::add_section( 'sectio_21', array(
    'title'          => __( 'Shop Page Options PRO', 'shop-and-commerce' ),
	'panel'          => 'woocommerce',
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_21', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_21', array(
	'type'        => 'radio',
	'settings'    => 'options_21',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_21',
) );


/*******************************/

Kirki::add_section( 'sectio_22', array(
    'title'          => __( 'Disable Checkout Fields PRO', 'shop-and-commerce' ),
	'panel'          => 'woocommerce',
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_22', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_22', array(
	'type'        => 'radio',
	'settings'    => 'options_22',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_22',
) );


/*******************************/

Kirki::add_section( 'sectio_23', array(
    'title'          => __( 'Terms and Conditions Field PRO', 'shop-and-commerce' ),
	'panel'          => 'woocommerce',	
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_23', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_23', array(
	'type'        => 'radio',
	'settings'    => 'options_23',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),	
	'section'     => 'sectio_23',
) );


/*******************************/

Kirki::add_section( 'sectio_24', array(
    'title'          => __( 'WooCommerce Styles PRO', 'shop-and-commerce' ),
	'panel'          => 'woocommerce',
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_24', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_24', array(
	'type'        => 'radio',
	'settings'    => 'options_24',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_24',
) );



/***********************************************
Animations
************************************************/

Kirki::add_panel( 'shop_and_commerce_panel2', array(
    'priority'    => 4,
    'title'       => __( 'Animations PRO', 'shop-and-commerce' ),
    'description' => __( 'Animations', 'shop-and-commerce' ),
) );

Kirki::add_section( 'sectio_8', array(
    'title'          => __( 'Sub Menu Animations PRO', 'shop-and-commerce' ),
	'panel'          => 'shop_and_commerce_panel2',	
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_8', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_8', array(
	'type'        => 'radio',
	'settings'    => 'options_8',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),	
	'section'     => 'sectio_8',
) );

Kirki::add_section( 'sectio_9', array(
    'title'          => __( 'Site Title Animations PRO', 'shop-and-commerce' ),
	'panel'          => 'shop_and_commerce_panel2',	
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_9', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_9', array(
	'type'        => 'radio',
	'settings'    => 'options_9',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),	
	'section'     => 'sectio_9',
) );

/*****************************************/

Kirki::add_section( 'sectio_10', array(
    'title'          => __( 'Home Page Button 1 Animations PRO', 'shop-and-commerce' ),
	'panel'          => 'shop_and_commerce_panel2',
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_10', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_10', array(
	'type'        => 'radio',
	'settings'    => 'options_10',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_10',
) );

/*****************************************/

Kirki::add_section( 'sectio_11', array(
    'title'          => __( 'Home Page Button 2 Animations PRO', 'shop-and-commerce' ),
	'panel'          => 'shop_and_commerce_panel2',
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_11', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_11', array(
	'type'        => 'radio',
	'settings'    => 'options_11',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_11',
) );

/*****************************************/

Kirki::add_section( 'sectio_12', array(
    'title'          => __( 'Home Page Product Animations PRO', 'shop-and-commerce' ),
	'panel'          => 'shop_and_commerce_panel2',
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_12', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_12', array(
	'type'        => 'radio',
	'settings'    => 'options_12',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_12',
) );

/*****************************************/

Kirki::add_section( 'sectio_13', array(
    'title'          => __( 'About US Post Type Animations PRO', 'shop-and-commerce' ),
	'panel'          => 'shop_and_commerce_panel2',
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_13', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_13', array(
	'type'        => 'radio',
	'settings'    => 'options_13',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_13',
) );


/*****************************************/

Kirki::add_section( 'sectio_14', array(
    'title'          => __( 'Sidebar Animations PRO', 'shop-and-commerce' ),
	'panel'          => 'shop_and_commerce_panel2',
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_14', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_14', array(
	'type'        => 'radio',
	'settings'    => 'options_14',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_14',
) );

/*****************************************/

Kirki::add_section( 'sectio_15', array(
    'title'          => __( 'Content Animations PRO', 'shop-and-commerce' ),
	'panel'          => 'shop_and_commerce_panel2',
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_15', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_15', array(
	'type'        => 'radio',
	'settings'    => 'options_15',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_15',
) );

/*****************************************/

Kirki::add_section( 'sectio_16', array(
    'title'          => __( 'Footer Animations PRO', 'shop-and-commerce' ),
	'panel'          => 'shop_and_commerce_panel2',
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_16', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_16', array(
	'type'        => 'radio',
	'settings'    => 'options_16',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_16',
) );

/***********************************************
Header Options
************************************************/

Kirki::add_section( 'sectio_17', array(
    'title'          => __( 'Header Options PRO', 'shop-and-commerce' ),
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_17', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_17', array(
	'type'        => 'radio',
	'settings'    => 'options_17',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_17',
) );

/***********************************************
Social Icons
************************************************/

Kirki::add_section( 'sectio_18', array(
    'title'          => __( 'Social Icons PRO', 'shop-and-commerce' ),
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_18', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_18', array(
	'type'        => 'radio',
	'settings'    => 'options_18',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_18',
) );

/***********************************************
Menu Options
************************************************/

Kirki::add_panel( 'menu', array(
    'priority'    => 10,
    'title'       => __( 'Menu Options', 'shop-and-commerce' ),
    'description' => __( 'Menu Options', 'shop-and-commerce' ),
) );

Kirki::add_section( 'shop_and_commerce_menu_position', array(
    'title'          => __( 'Menu Position', 'shop-and-commerce' ),
	'panel'          => 'menu',
    'priority'       => 7,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'seos_display_menu', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'seos_display_menu', array(
	'type'        => 'switch',
	'settings'    => 'seos_display_menu',
	'label'       => __( 'Show the menu before header', 'shop-and-commerce' ),
	'section'     => 'shop_and_commerce_menu_position',
	'default'     => '',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'on', 'shop-and-commerce' ),
		'' => esc_attr__( 'off', 'shop-and-commerce' ),
	),
) );

/*******************************/

Kirki::add_section( 'sectio_25', array(
    'title'          => __( 'Menu Colors PRO', 'shop-and-commerce' ),
	'panel'          => 'menu',
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_25', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_25', array(
	'type'        => 'radio',
	'settings'    => 'options_25',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_25',
) );

/*******************************/

Kirki::add_section( 'sectio_26', array(
    'title'          => __( 'About US Custom Post Type PRO', 'shop-and-commerce' ),
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_26', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_26', array(
	'type'        => 'radio',
	'settings'    => 'options_26',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_26',
) );

/*******************************/

Kirki::add_section( 'sectio_27', array(
    'title'          => __( 'Sidebar Options PRO', 'shop-and-commerce' ),
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_27', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_27', array(
	'type'        => 'radio',
	'settings'    => 'options_27',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_27',
) );

/*******************************/

Kirki::add_section( 'sectio_28', array(
    'title'          => __( 'Back To Top Button Options PRO', 'shop-and-commerce' ),
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_28', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_28', array(
	'type'        => 'radio',
	'settings'    => 'options_28',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_28',
) );


/*******************************/

Kirki::add_section( 'sectio_29', array(
    'title'          => __( 'Footer Options PRO', 'shop-and-commerce' ),
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'options_29', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'options_29', array(
	'type'        => 'radio',
	'settings'    => 'options_29',
    'description'    => __( '<a target="_blank" href="//seosthemes.info/shop-and-commerce-free-wordpress-theme">Preview Pro Version</a>', 'shop-and-commerce' ),		
	'section'     => 'sectio_29',
) );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function shop_and_commerce_customize_preview_js() {
	wp_enqueue_script( 'shop_and_commerce_customizer', esc_url(get_template_directory_uri()) . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'shop_and_commerce_customize_preview_js' );




/**************************************
Styles
**************************************/	
	
	function shop_and_commerce_css_styles () { ?>
	<style>
			<?php if(get_theme_mod('shop_and_commerce_woo_cart_color')) { ?> .sp-cart a { color: <?php echo esc_html(get_theme_mod('shop_and_commerce_woo_cart_color')); ?> !important;} <?php } ?>
			<?php if(get_theme_mod('shop_and_commerce_woo_cart_hover_color')) { ?> .sp-cart a:hover { color: <?php echo esc_html(get_theme_mod('shop_and_commerce_woo_cart_hover_color')); ?> !important;} <?php } ?>
			<?php if(get_theme_mod('shop_and_commerce_woo_cart_background')) { ?> .sp-cart a { background: <?php echo esc_html(get_theme_mod('shop_and_commerce_woo_cart_background')); ?> !important;} <?php } ?>
			<?php if(get_theme_mod('shop_and_commerce_woo_cart_background_hover')) { ?> .sp-cart a:hover { background: <?php echo esc_html(get_theme_mod('shop_and_commerce_woo_cart_background_hover')); ?> !important;} <?php } ?>
	
			<?php if (get_theme_mod ('activate_custom_height')) { ?>
				header .site-branding {
						min-height: <?php echo esc_html(get_theme_mod ('custom_height')); ?>vw !important;
						background-attachment: inherit !important;
				}

				@media screen and (max-width: 76.5em) {
							
					.site-title img {
						max-height: 80px;
					}

					header .site-branding .site-title {
						margin-top: 0;
						font-size: 5vw;					
					}
							
					.sp-button2 a, .sp-button1 a {
						font-size: 2vw;
						padding: 1vw;
					}
					.sp-button1, .sp-button2 {
						margin-top: 3vw;
					}
				}

				<?php } ?>		
	</style>
	<?php }
	add_action('wp_head','shop_and_commerce_css_styles');
	
/*********************************************************************************************************
* Excerpt
**********************************************************************************************************/
	if (get_theme_mod('shop_and_commerce_read_more_activate')) {
		function seos_photography_excerpt_more( $more ) {
			return '<p class="link-more"><a class="read-more" href="'. esc_url(get_permalink( get_the_ID() )) . '">' . seos_photography_return_read_more_text (). '</a></p>';
		}
			add_filter( 'excerpt_more', 'seos_photography_excerpt_more' );

		function seos_photography_custom_excerpt_length( $length ) {
			if (get_theme_mod('seos_photography_read_more_lenght')) {
				return get_theme_mod('seos_photography_read_more_lenght');
			}
			else return 42;
		}
		add_filter( 'excerpt_length', 'seos_photography_custom_excerpt_length', 999 );
	}
	
	function seos_photography_return_read_more_text () {
		if (get_theme_mod('seos_photography_read_more_text')) {	 
			return get_theme_mod('shop_and_commerce_read_more_text');
		} 
		return "Read More";
		
	}	
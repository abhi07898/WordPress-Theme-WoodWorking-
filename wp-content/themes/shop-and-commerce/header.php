<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } else { do_action( 'wp_body_open' ); } ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'shop-and-commerce' ); ?></a>

	<?php if (get_theme_mod('seos_display_menu')) { ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'shop-and-commerce' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	<?php } ?>
		
	<header id="masthead" class="site-header" role="banner">

	<?php if (( is_front_page() or is_home() and get_theme_mod('front_page_image')) and !get_theme_mod('hide_home_image')) : ?>
	
		<div class="site-branding" 
		
		style="background-image: url('<?php if (get_theme_mod('front_page_image')) { echo esc_url(get_theme_mod('front_page_image')); } else { echo esc_url(get_template_directory_uri()) . '/images/home-page.jpg'; } ?>'); min-height: 850px">
		
			<div class="dotted">			
				<div class="sp-top-center">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						
				<?php $shop_and_commerce_description = get_bloginfo( 'description', 'display' );
				if ( $shop_and_commerce_description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $shop_and_commerce_description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
				
				<?php if(get_theme_mod('shop_and_commerce_button_text1') and !get_theme_mod('hide_buttn_1')) { ?>	
					<div class="sp-button1">
						<a href="<?php echo esc_url(get_theme_mod('shop_and_commerce_button_url1')); ?>"><?php echo esc_html(get_theme_mod('shop_and_commerce_button_text1')); ?></a>		
					</div>
				<?php } ?>
				
				<?php if(!get_theme_mod('shop_and_commerce_button_text1') and !get_theme_mod('hide_buttn_1')) { ?>	
					<div class="sp-button1">
						<a href="<?php echo esc_url(get_theme_mod('shop_and_commerce_button_url1')); ?>">Read More</a>		
					</div>
				<?php } ?>
			
				<?php if(get_theme_mod('shop_and_commerce_button_text2') and !get_theme_mod('hide_buttn_2')) { ?>	
					<div class="sp-button2">
						<a href="<?php echo esc_url(get_theme_mod('shop_and_commerce_button_url2')); ?>"><?php echo esc_html(get_theme_mod('shop_and_commerce_button_text2')); ?></a>		
					</div>
				<?php } ?>
				
				<?php if(!get_theme_mod('shop_and_commerce_button_text2') and !get_theme_mod('hide_buttn_2')) { ?>	
					<div class="sp-button2">
						<a href="<?php echo esc_url(get_theme_mod('shop_and_commerce_button_url2')); ?>">Read More</a>		
					</div>
				<?php } ?>				

				</div>
			</div>
		
		</div><!-- .site-branding -->
		
		<?php  else : ?>
		
		<div class="header-img" style="background-image: url('<?php header_image(); ?>'); min-height:<?php echo esc_attr(get_custom_header()->height); ?>%">
			<div class="dotted">	
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

					<?php $shop_and_commerce_description = get_bloginfo( 'description', 'display' );
					if ( $shop_and_commerce_description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $shop_and_commerce_description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif; ?>
		
			</div>
		</div><!-- .site-branding -->
		
		<?php endif; ?>
		
		<?php if (!get_theme_mod('seos_display_menu')) { ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'shop-and-commerce' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
		<?php } ?>
		
	<?php if ( get_theme_mod('seos_display_woo_cart') and  function_exists( 'woocommerce_get_page_id' ) ) {  shop_and_commerce_woo_cart(); } ?>					
	</header><!-- #masthead -->
	<div class="clear"></div>
		<?php if ( is_front_page() or is_home() ) { ?>
			
			<div class="container-images">
			
			<?php if (!get_theme_mod('hide_img_1')) : ?>
					<a href="#">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title"><?php if (!get_theme_mod('shop_and_commerce_title1')) : echo "Product"; else : echo esc_html(get_theme_mod('shop_and_commerce_title1')); endif; ?></div>
							<div class="sp-description"><?php if (!get_theme_mod('shop_and_commerce_text1')) : echo "39.00$"; else : echo esc_html(get_theme_mod('shop_and_commerce_text1')); endif; ?></div>
							<img src="<?php echo esc_url(get_template_directory_uri()) .'/images/product1.jpg'; ?>" alt="img-1" />
						</div>
					</a>				
			<?php else : ?>
			<?php if(get_theme_mod('shop_and_commerce_img1') ) : ?>
					<a href="<?php echo esc_url(get_theme_mod('shop_and_commerce_url1')); ?>">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title"><?php echo esc_html(get_theme_mod('shop_and_commerce_title1')); ?></div>
							<div class="sp-description"><?php echo esc_html(get_theme_mod('shop_and_commerce_text1')); ?></div>
							<img src="<?php echo esc_url(get_theme_mod('shop_and_commerce_img1')); ?>" alt="img-1" />
						</div>
					</a>				
			<?php endif; endif; ?>

			<?php if (!get_theme_mod('hide_img_2')) : ?>
					<a href="#">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title"><?php if (!get_theme_mod('shop_and_commerce_title2')) : echo "Product"; else : echo esc_html(get_theme_mod('shop_and_commerce_title2')); endif; ?></div>
							<div class="sp-description"><?php if (!get_theme_mod('shop_and_commerce_text2')) : echo "39.00$"; else : echo esc_html(get_theme_mod('shop_and_commerce_text2')); endif; ?></div>
							<img src="<?php echo esc_url(get_template_directory_uri()) .'/images/product2.jpg'; ?>" alt="img-2" />
						</div>
					</a>				
			<?php else : ?>
			<?php if(get_theme_mod('shop_and_commerce_img2') ) : ?>
					<a href="<?php echo esc_url(get_theme_mod('shop_and_commerce_url2')); ?>">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title"><?php echo esc_html(get_theme_mod('shop_and_commerce_title2')); ?></div>
							<div class="sp-description"><?php echo esc_html(get_theme_mod('shop_and_commerce_text2')); ?></div>
							<img src="<?php echo esc_url(get_theme_mod('shop_and_commerce_img2')); ?>" alt="img-2" />
						</div>
					</a>				
			<?php endif; endif; ?>

			<?php if (!get_theme_mod('hide_img_3')) : ?>
					<a href="#">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title"><?php if (!get_theme_mod('shop_and_commerce_title3')) : echo "Product"; else : echo esc_html(get_theme_mod('shop_and_commerce_title3')); endif; ?></div>
							<div class="sp-description"><?php if (!get_theme_mod('shop_and_commerce_text3')) : echo "39.00$"; else : echo esc_html(get_theme_mod('shop_and_commerce_text3')); endif; ?></div>
							<img src="<?php echo esc_url(get_template_directory_uri()) .'/images/product3.jpg'; ?>" alt="img-3" />
						</div>
					</a>				
			<?php else : ?>
			<?php if(get_theme_mod('shop_and_commerce_img3') ) : ?>
					<a href="<?php echo esc_url(get_theme_mod('shop_and_commerce_url3')); ?>">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title"><?php echo esc_html(get_theme_mod('shop_and_commerce_title3')); ?></div>
							<div class="sp-description"><?php echo esc_html(get_theme_mod('shop_and_commerce_text3')); ?></div>
							<img src="<?php echo esc_url(get_theme_mod('shop_and_commerce_img3')); ?>" alt="img-3" />
						</div>
					</a>				
			<?php endif; endif; ?>

			<?php if (!get_theme_mod('hide_img_4')) : ?>
					<a href="#">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title"><?php if (!get_theme_mod('shop_and_commerce_title4')) : echo "Product"; else : echo esc_html(get_theme_mod('shop_and_commerce_title4')); endif; ?></div>
							<div class="sp-description"><?php if (!get_theme_mod('shop_and_commerce_text4')) : echo "39.00$"; else : echo esc_html(get_theme_mod('shop_and_commerce_text4')); endif; ?></div>
							<img src="<?php echo esc_url(get_template_directory_uri()) .'/images/product4.jpg'; ?>" alt="img-4" />
						</div>
					</a>				
			<?php else : ?>
			<?php if(get_theme_mod('shop_and_commerce_img4') ) : ?>
					<a href="<?php echo esc_url(get_theme_mod('shop_and_commerce_url4')); ?>">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title"><?php echo esc_html(get_theme_mod('shop_and_commerce_title4')); ?></div>
							<div class="sp-description"><?php echo esc_html(get_theme_mod('shop_and_commerce_text4')); ?></div>
							<img src="<?php echo esc_url(get_theme_mod('shop_and_commerce_img4')); ?>" alt="img-4" />
						</div>
					</a>				
			<?php endif; endif; ?>
			
			</div><!-- .container-images -->
			
		<?php } ?>	

	<div id="content" class="site-content">

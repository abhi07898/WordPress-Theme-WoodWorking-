<?php function shop_and_commerce_woo_cart() { global $woocommerce; ?>
			
			<div class="sp-cart">		
	
			<?php if ( get_theme_mod('seos_display_woo_cart') == true ) : ?>
			
				<?php if ( function_exists( 'woocommerce_get_page_id' ) ) : ?>
				
					<div class="seos-cart">
						
						<?php global $woocommerce;

							// get cart quantity
							$qty = $woocommerce->cart->get_cart_contents_count();

							// get cart total
							$total = $woocommerce->cart->get_cart_total();

							// get cart url
							$cart_url = $woocommerce->cart->get_cart_url();

							// if multiple products in cart
							if($qty>1)
								  echo '<a id="cart_in_menu_11" class="cart_is_in_menu" href="'.$cart_url.'">'.  $qty. ' ' . get_theme_mod('display_woo_cart_text_items') . ' | <i class="fa fa-cart-arrow-down"></i>  '.$total.'</a>';

							// if single product in cart
							if($qty==1)
								  echo '<a id="cart_in_menu_1" class="cart_is_in_menu"  href="'.$cart_url.'">'.$qty. ' ' . get_theme_mod('display_woo_cart_text_item') . ' | <i class="fa fa-cart-arrow-down"></i>  '.$total.'</a>';
								  
								// if single product in cart
							if($qty<1)
								  echo '<a id="cart_in_menu_1" class="cart_is_in_menu"  href="'.$cart_url.'"> '. ' ' . get_theme_mod('display_woo_cart_text_empty_cart') . ' | <i class="fa fa-cart-arrow-down"></i> </a>'; 
							?>	
							
					</div>	
					
				<?php endif; ?>
			
			<?php endif; ?>
			
			</div>
<?php } 

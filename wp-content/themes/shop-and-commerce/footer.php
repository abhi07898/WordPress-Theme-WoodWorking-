<?php
/**
 * The template for displaying the footer.
 *
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<div class="site-info">
		
				<?php esc_attr_e('All rights reserved', 'shop-and-commerce'); ?>  &copy; <?php bloginfo('name'); ?>
				
				<a href="http://wordpress.org/" title="<?php esc_attr_e( 'WordPress', 'shop-and-commerce' ); ?>"><?php printf( esc_html_e( 'Powered by %s', 'shop-and-commerce' ), 'WordPress' ); ?></a>
							
				<a title="<?php esc_attr_e('Wordpress theme', 'shop-and-commerce'); ?>" href="<?php echo esc_url(__('https://seosthemes.com/', 'shop-and-commerce')); ?>" target="_blank"><?php esc_html_e('Theme by SEOS', 'shop-and-commerce'); ?></a>	
				
		</div><!-- .site-info -->
	
	</footer><!-- #colophon -->
</div><!-- #page -->
	
<?php wp_footer(); ?>

</body>
</html>

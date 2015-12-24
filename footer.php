<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sissy
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	  <div class="layout-container">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'sissy' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'sissy' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'sissy' ), 'sissy', '<a href="http://ceciliasantos.com" rel="designer">Cecilia Santos</a>' ); ?>
		</div><!-- .site-info -->
	 </div><!-- .layout-container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

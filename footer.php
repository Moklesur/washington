<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Washington
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<?php do_action('washington_footer_widget'); ?>
	<section class="footer-bottom text-center">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="site-info">
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'washington' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'washington' ), 'WordPress' ); ?></a>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</section>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

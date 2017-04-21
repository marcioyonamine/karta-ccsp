<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Karta
 */

?>
		</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-footer-widgets">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
			</div>
			<?php endif; ?>
		</div>

		<div class="site-info-ccsp">
			<div class="container">
				<div class="row">  
					<div class="col-sm-6 col-xs-12">
						<p class="site-info__copyright"><?php echo esc_html( get_theme_mod( 'karta_sitecopyright', esc_html__( 'Copyright', 'karta' ) . ' &copy; ' . get_bloginfo( 'name' ) ) ); ?></p>
					</div>
                  
                   
				</div>
			</div> 
		</div>
        </div>
	</footer>
<!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

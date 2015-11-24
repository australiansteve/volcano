<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Volcano
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="row"><!-- .row start -->

			<div class="small-12 columns"><!-- .columns start -->

				<div class="site-info">
					<p><i class="fa fa-copyright"></i> <?php echo date("Y");?> Copyright <?php bloginfo( 'name' ); ?></p>
				</div><!-- .site-info -->

			</div><!-- .columns end -->

		</div><!-- .row end -->

	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

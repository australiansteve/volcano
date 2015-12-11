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

			<div class="small-12 columns text-center tertiary-navigation"><!-- .columns start -->

				<ul class="horizontal menu">

					<?php 

					 	$args = array (
						 	'theme_location' 	=> 'tertiary',
						 	'container' 		=> '',
						 	'menu_class' 		=> '',
						 	'menu_id' 			=> '',
						 	'items_wrap' 		=> '%3$s'
					 	);
						wp_nav_menu( $args ); 
					?>

				</ul>

			</div><!-- .columns end -->

		</div><!-- .row end -->

		<div class="row"><!-- .row start -->

			<div class="small-12 columns text-center"><!-- .columns start -->

				<?php dynamic_sidebar('sidebar-2'); ?>

			</div><!-- .columns end -->

		</div><!-- .row end -->

		<div class="row"><!-- .row start -->

			<div class="small-12 columns text-center"><!-- .columns start -->

				Other links

			</div><!-- .columns end -->

		</div><!-- .row end -->

		<div class="row"><!-- .row start -->

			<div class="small-12 medium-6 columns"><!-- .columns start -->

				<p><i class="fa fa-copyright"></i> <?php bloginfo( 'name' ); ?> <?php echo date("Y");?></p>

			</div><!-- .columns end -->

			<div class="small-12 medium-6 columns text-right"><!-- .columns start -->

				<a href="#" class="return-to-top"><i class="fa fa-caret-up"></i> Top</a>

			</div><!-- .columns end -->

		</div><!-- .row end -->

	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>

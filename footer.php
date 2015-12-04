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

			<div class="small-12 columns text-center"><!-- .columns start -->

				<a class="social-link" href="#" ><i class="fa fa-2x fa-facebook-official"></i></a>
				<a class="social-link" href="#" ><i class="fa fa-2x fa-instagram"></i></a>
				<a class="social-link" href="#" ><i class="fa fa-2x fa-pinterest"></i></a>
				<a class="social-link" href="#" ><i class="fa fa-2x fa-twitter-square"></i></a>

			</div><!-- .columns end -->

		</div><!-- .row end -->

		<div class="row"><!-- .row start -->

			<div class="small-12 columns text-center"><!-- .columns start -->

				Subscribe

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

				<a href="#" class="fa fa-caret-up return-to-top">Top</a>

			</div><!-- .columns end -->

		</div><!-- .row end -->

	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * The front-page.php template file.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Volcano
 */

get_header(); ?>

<div class="row"><!-- .row start -->

	<div class="small-12 columns"><!-- .columns start -->

		<?php dynamic_sidebar('slider-sidebar'); ?>

	</div><!-- .columns end -->

</div><!-- .row end -->

<div class="row"><!-- .row start -->

	<div class="small-12 columns"><!-- .columns start -->

		<div id="primary" class="content-area frontpage">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'page-templates/partials/content-titleless', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'page-templates/partials/content-titleless', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	</div><!-- .columns end -->

</div><!-- .row end -->

<div class="row small-up-1 medium-up-3 austeve_gallery_preview"><!-- .row start -->

	<?php dynamic_sidebar( 'austeve_gallery_1' ); ?>

</div><!-- .row end -->

<div class="row"><!-- .row start -->

	<div class="small-12 columns"><!-- .columns start -->

		<?php get_sidebar(); ?>

	</div><!-- .columns end -->

</div><!-- .row end -->

<?php get_footer(); ?>

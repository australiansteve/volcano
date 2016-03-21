<?php
/**
 * The template for displaying all single posts.
 *
 * @package Volcano
 */

get_header(); ?>
	
<div class="row"><!-- .row start -->

	<div class="medium-8 small-12 columns"><!-- .columns start -->

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'page-templates/partials/content', 'single' ); ?>

				<?php 
				the_post_navigation(array(
			        'prev_text'          => '<i class="fa fa-arrow-left"></i> Previous',
			        'next_text'          => 'Next <i class="fa fa-arrow-right"></i>',
			        'screen_reader_text' => __( 'Read more from '.get_bloginfo('name').':' ),
			    )); ?>
				
			<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	</div><!-- .columns end -->

	<div class="medium-4 small-12 columns"><!-- .columns start -->

		<?php dynamic_sidebar('blog-sidebar'); ?>

	</div><!-- .columns end -->

</div><!-- .row end -->

<?php get_footer(); ?>

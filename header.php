<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Volcano
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">

		<div class="row"><!-- .row start -->

			<div class="small-12 medium-4 columns"><!-- .columns start -->

				<div class="site-branding">

					<div class="row"><!-- .row start -->

						<div class="small-12 columns"><!-- .columns start -->

							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

								<?php 
								if (get_theme_mod('bloglogo') === '')
								{
									echo bloginfo('name');
								}
								else
								{
									echo "<img class='blog-logo' src='".get_theme_mod('bloglogo')."'/>";
								}
								?>
								</a>
							</h1>

						</div><!-- .columns end -->

						<div class="small-12 columns"><!-- .columns start -->

							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>

						</div><!-- .columns end -->

					</div><!-- .row end -->

				</div><!-- .site-branding -->

			</div><!-- .columns end -->

			<div class="small-12 medium-8 columns"><!-- .columns start -->

				<div class="menus">

					<div class="row"><!-- .row start -->

						<div class="medium-12 columns show-for-medium"><!-- .columns start -->

							<div class="top-bar secondary-navigation" data-topbar role="navigation">
							
								<div class="top-bar-right">

									<!-- Right Nav Section -->
									<ul class="medium-horizontal menu">

										<?php 

										 	$args = array (
											 	'theme_location' 	=> 'secondary',
											 	'container' 		=> '',
											 	'menu_class' 		=> '',
											 	'menu_id' 			=> '',
											 	'items_wrap' 		=> '%3$s'
										 	);
											wp_nav_menu( $args ); 
										?>

									</ul>

								</div>
							</div>

						</div><!-- .columns end -->

						<div class="small-12 columns"><!-- .columns start -->

							<div class="title-bar show-for-small-only" data-responsive-toggle="primary-menu" data-hide-for="medium">
  								<button class="menu-icon" type="button" data-toggle=""></button>
  								<div class="title-bar-title">Menu</div>
							</div>

							<div id="primary-menu" class="top-bar primary-navigation" data-topbar>
								
								<div class="top-bar-right">

									<!-- Right Nav Section -->
									<ul class="vertical medium-horizontal menu">

										<?php
										 	$args = array (
											 	'theme_location' 	=> 'primary',
											 	'container' 		=> '',
											 	'menu_class' 		=> '',
											 	'menu_id' 			=> '',
											 	'items_wrap' 		=> '%3$s'
										 	);
											wp_nav_menu( $args );
										?>
									</ul>

									<ul class="vertical medium-horizontal menu show-for-small-only">
										<?php 
										 	$args = array (
											 	'theme_location' 	=> 'secondary',
											 	'container' 		=> '',
											 	'menu_class' 		=> '',
											 	'menu_id' 			=> '',
											 	'items_wrap' 		=> '%3$s'
										 	);
											wp_nav_menu( $args );
										?>

									</ul>

								</section>
							</div>

						</div><!-- .columns end -->

					</div><!-- .row end -->
				</div><!-- .menus -->

			</div><!-- .columns end -->

		</div><!-- .row end -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">

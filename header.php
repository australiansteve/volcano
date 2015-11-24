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

	<!--?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_class' => '', 'menu_id' => '', 'items_wrap' => '%3$s' ) ); ?-->


<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">

		<div class="row"><!-- .row start -->

			<div class="small-12 medium-4 columns"><!-- .columns start -->

				<div class="site-branding">

					<div class="row"><!-- .row start -->

						<div class="small-12 columns"><!-- .columns start -->

							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

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

						<div class="medium-12 columns show-for-medium-up"><!-- .columns start -->

							<nav class="top-bar" data-topbar role="navigation">
								<ul class="title-area">

									<li class="name"></li>

									<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
									<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>

								</ul>

								<section class="top-bar-section">

									<!-- Right Nav Section -->
									<ul class="right">

										<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => '', 'menu_class' => '', 'menu_id' => '', 'items_wrap' => '%3$s' ) ); ?>

									</ul>

								</section>
							</nav>

						</div><!-- .columns end -->

						<div class="small-12 columns"><!-- .columns start -->

							<nav class="top-bar" data-topbar role="navigation">
								<ul class="title-area">

									<li class="name"></li>

									<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
									<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>

								</ul>

								<section class="top-bar-section">

									<!-- Right Nav Section -->
									<ul class="right">

										<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_class' => '', 'menu_id' => '', 'items_wrap' => '%3$s' ) ); ?>

										<span class="show-for-small-only">

											<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => '', 'menu_class' => '', 'menu_id' => '', 'items_wrap' => '%3$s' ) ); ?>
										
										</span>
										
									</ul>

								</section>
							</nav>

						</div><!-- .columns end -->

					</div><!-- .row end -->
				</div><!-- .menus -->

			</div><!-- .columns end -->

		</div><!-- .row end -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">

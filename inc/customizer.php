<?php
/**
 * Volcano Theme Customizer
 *
 * @package Volcano
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function volcano_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	/* Header background colour */
	$wp_customize->add_setting( 'header_background_color' , array(
	    'default'     => '#FFFFFF',
	    'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
		'label'        => __( 'Header colour', 'volcano' ),
		'section'    => 'colors',
		'settings'   => 'header_background_color',
	) ) );

	$wp_customize->get_setting( 'header_background_color' )->transport = 'postMessage';

	/* Header text colour */
	$wp_customize->add_setting( 'header_text_color' , array(
	    'default'     => '#00FF77',
	    'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_text_color', array(
		'label'        => __( 'Header Text colour', 'volcano' ),
		'section'    => 'colors',
		'settings'   => 'header_text_color',
	) ) );

	$wp_customize->get_setting( 'header_text_color' )->transport = 'postMessage';

	/* Logo! */
	$wp_customize->add_setting( 'bloglogo' , array(
	    'default'     => '',
	    'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bloglogo', array(
		'label'        => __( 'Logo', 'volcano' ),
		'section'    => 'title_tagline',
		'settings'   => 'bloglogo',
	) ) );

	$wp_customize->get_setting( 'bloglogo' )->transport = 'postMessage';
	
}
add_action( 'customize_register', 'volcano_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function volcano_customize_preview_js() {// Localize the script with new data

	wp_register_script( 'volcano_customizer', '/js/customizer.js', array( 'customize-preview' ), '20130508', true );

	$translation_array = array( 
		'siteurl' => get_option('siteurl'), 
		'blogname' => get_option('blogname') 
	);

	wp_localize_script( 'volcano_customizer', 'WPVARS', $translation_array );

	wp_enqueue_script( 'volcano_customizer' );
}
add_action( 'customize_preview_init', 'volcano_customize_preview_js' );

function volcano_customize_css()
{
    ?>
        <style type="text/css">
            #masthead, #masthead>.row, .top-bar, .top-bar-section li:not(.has-form) a:not(.button), .top-bar-section li:not(.has-form) a:not(.button):hover { 
             	background:<?php echo get_theme_mod('header_background_color', '#FFFFFF'); ?>; 
            }

            @media only screen and (max-width: 40em) { 
            	.top-bar, .top-bar.expanded .title-area { 
             		background:<?php echo get_theme_mod('header_text_color', '#FFFFFF'); ?>; 
             	}

             	.top-bar-section ul li {
				    border-bottom: 1px solid <?php echo get_theme_mod('header_text_color', '#FFFFFF'); ?>;
				}
			}

            .site-title a, .top-bar-section li:not(.has-form) a:not(.button), .top-bar-section li:not(.has-form) a:not(.button):hover { 
        	  	color:<?php echo get_theme_mod('header_text_color', '#000000'); ?>; 
            }

        </style>
    <?php
}
add_action( 'wp_head', 'volcano_customize_css');

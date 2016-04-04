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

	/* Font family */
	$wp_customize->add_setting( 'font_family' , array(
	    'default'     => 'Helvetica',
	    'transport'   => 'postMessage',
	) );

	$wp_customize->add_control( 'font_family', array(
			'label'    => __( 'Header & footer font', 'volcano' ),
			'section'  => 'colors',
			'settings' => 'font_family',
			'type'     => 'select',
			'choices'  => array(
				'Helvetica Neue'  => 'Helvetica Neue',
				'Neou Thin' => 'Neou (thin)',
				'Neou Bold' => 'Neou (thick)',
			),
	) );

	$wp_customize->get_setting( 'font_family' )->transport = 'postMessage';

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
	
	/* START - WooCommerce customizations */
	$wp_customize->add_section( 'volcano_woocommerce' , array(
	    'title'      	=> __('WooCommerce customizations','volcano'),
	    'description'	=> __('If the WooCommerce plugin is installed, use this section to override some aspects of the default styling.','volcano'),
	    'priority'   	=> 120,
	) );

	$wp_customize->add_setting( 'wc_color_1' , array(
	    'default'     => '#8fae1b',
	    'transport'   => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wc_color_1', array(
		'label'        => __( 'WooCommerce color 1', 'volcano' ),
		'section'    => 'volcano_woocommerce',
		'settings'   => 'wc_color_1',
	) ) );

	$wp_customize->get_setting( 'wc_color_1' )->transport = 'postMessage';

	$wp_customize->add_setting( 'wc_color_2' , array(
	    'default'     => '#a46497',
	    'transport'   => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wc_color_2', array(
		'label'        => __( 'WooCommerce color 2', 'volcano' ),
		'section'    => 'volcano_woocommerce',
		'settings'   => 'wc_color_2',
	) ) );

	$wp_customize->get_setting( 'wc_color_2' )->transport = 'postMessage';

	$wp_customize->add_setting( 'wc_color_3' , array(
	    'default'     => '#a46497',
	    'transport'   => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wc_color_3', array(
		'label'        => __( 'WooCommerce color 3', 'volcano' ),
		'description'    => 'Info messages etc.',
		'section'    => 'volcano_woocommerce',
		'settings'   => 'wc_color_3',
	) ) );

	$wp_customize->get_setting( 'wc_color_3' )->transport = 'postMessage';

	/* END - WooCommerce customizations */

}
add_action( 'customize_register', 'volcano_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function volcano_customize_preview_js() {// Localize the script with new data

	wp_register_script( 'volcano_customizer', get_template_directory_uri().'/inc/js/customizer.js', array( 'customize-preview' ), '20130508', true );

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
            #masthead, #masthead>.row { 
             	background:<?php echo get_theme_mod('header_background_color', '#FFFFFF'); ?>; 
            }

            .menu-item a, .title-bar-title, #colophon { 
				font-family: "<?php echo get_theme_mod('font_family', 'Helvetica Neue'); ?>", Helvetica, Roboto, Arial, sans-serif;;
			}

            @media only screen and (max-width: 40em) { 
            	.title-bar { 
             		background:<?php echo get_theme_mod('header_text_color', '#FFFFFF'); ?>; 
             	}

             	.primary-navigation.top-bar {
				    border-left: 1px solid <?php echo get_theme_mod('header_text_color', '#FFFFFF'); ?>;
				    border-right: 1px solid <?php echo get_theme_mod('header_text_color', '#FFFFFF'); ?>;
             	}

             	.primary-navigation ul li {
				    border-bottom: 1px solid <?php echo get_theme_mod('header_text_color', '#FFFFFF'); ?>;
				}

			}

            .site-title a, .top-bar li a:not(.button), .top-bar li a:not(.button):hover { 
        	  	color:<?php echo get_theme_mod('header_text_color', '#000000'); ?>; 
            }

            #colophon button[type="submit"] {
            	background: <?php echo get_theme_mod('header_text_color', '#FFFFFF'); ?>;
            	color: <?php echo get_theme_mod('header_background_color', '#000000'); ?>;
            }


            /* WooCommerce customizations */
            /* Color 1 */
            .woocommerce ul.products li.product .price del, 
            .woocommerce ul.products li.product .price ins,
            .woocommerce div.product p.price,
            .woocommerce .woocommerce-message:before {
    			color: <?php echo get_theme_mod('wc_color_1', '#8fae1b'); ?>;
			}

			.woocommerce span.onsale {
    			background-color: <?php echo get_theme_mod('wc_color_1', '#8fae1b'); ?>;
			}

			.woocommerce .woocommerce-message {
				border-top-color: <?php echo get_theme_mod('wc_color_1', '#8fae1b'); ?>;
			}

            /* Color 2 */
            .woocommerce #respond input#submit.alt, 
            .woocommerce a.button.alt, 
            .woocommerce button.button.alt, 
            .woocommerce input.button.alt {
    			background-color: <?php echo get_theme_mod('wc_color_2', '#a46497'); ?>;
			}

			<?php $wc2_hex = get_theme_mod('wc_color_2', '#a46497');
				list($wc2_r, $wc2_g, $wc2_b) = sscanf($wc2_hex, "#%02x%02x%02x");
			?>
			.woocommerce #respond input#submit.alt:hover, 
			.woocommerce a.button.alt:hover, 
			.woocommerce button.button.alt:hover, 
			.woocommerce input.button.alt:hover {
    			background-color: rgba(<?php echo "$wc2_r, $wc2_g, $wc2_b, 0.6"; ?>);
			}

            /* Color 3 */
			.woocommerce .woocommerce-info {
				border-top-color: <?php echo get_theme_mod('wc_color_3', '#8fae1b'); ?>;
			}

			.woocommerce .woocommerce-info:before {
    			color: <?php echo get_theme_mod('wc_color_3', '#8fae1b'); ?>;
			}

        </style>
    <?php
}
add_action( 'wp_head', 'volcano_customize_css');

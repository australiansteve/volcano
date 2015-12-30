/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_text_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .top-bar li a:not(.button), .top-bar li a:not(.button):hover, .top-bar li a:not(.button):visited' ).css( {
					'color': '#000'
				} );
				$( '#colophon button[type="submit"]' ).css( {
					'background': '#000'
				} );

			} else {
				$( '.site-title a, .top-bar li a:not(.button), .top-bar li a:not(.button):hover, .top-bar li a:not(.button):visited' ).css( {
					'color': to
				} );
				$( '#colophon button[type="submit"]' ).css( {
					'background': '#000'
				} );
			}
		} );
	} );

	// Header background color.
	wp.customize( 'header_background_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '#masthead, #masthead>.row' ).css( {
					'background': '#FFF'
				} );
				$( '#colophon button[type="submit"]' ).css( {
					'color': '#000'
				} );
			} else {
				$( '#masthead, #masthead>.row' ).css( {
					'background': to
				} );
				$( '#colophon button[type="submit"]' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Logo
	wp.customize( 'bloglogo', function( value ) {
		value.bind( function( to ) {
			if ( '' === to ) {
				$( '.site-branding .site-title a' ).html( WPVARS.blogname );
			} else {
				$( '.site-branding .site-title a' ).html( "<img class='blog-logo' src='" + to + "'/>" );
			}
		} );
	} );

	// Woocommerce color 1.
	wp.customize( 'wc_color_1', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '' ).css( {
					'background': '#8fae1b'
				} );
			} else {
				$( '' ).css( {
					'background': to
				} );
			}
		} );
	} );

	// Woocommerce color 2.
	wp.customize( 'wc_color_2', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt' ).css( {
					'background-color': '#a46497'
				} );
			} else {
				$( '.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt' ).css( {
					'background-color': to
				} );
			}
		} );
	} );

} )( jQuery );

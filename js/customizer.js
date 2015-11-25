/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

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
				$( '.site-title a, .top-bar-section li:not(.has-form) a:not(.button)' ).css( {
					'color': '#000'
				} );
			} else {
				$( '.site-title a, .top-bar-section li:not(.has-form) a:not(.button)' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Header background color.
	wp.customize( 'header_background_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '#masthead, #masthead>.row, .top-bar, .top-bar-section li:not(.has-form) a:not(.button), .top-bar-section li:not(.has-form) a:not(.button):hover' ).css( {
					'background': '#FFF'
				} );
			} else {
				$( '#masthead, #masthead>.row, .top-bar, .top-bar-section li:not(.has-form) a:not(.button), .top-bar-section li:not(.has-form) a:not(.button):hover' ).css( {
					'background': to
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
				$( '.site-branding .site-title a' ).html( "<img src='" + to + "'/>" );
			}
		} );
	} );

} )( jQuery );

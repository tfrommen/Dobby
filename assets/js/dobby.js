/* global dobbySettings, jQuery */
(function( $ ) {
	'use strict';

	const closet = $( '.dobby-closet' );
	const dobby = $( '#dobby' );
	const inlineClass = 'dobby-inline';
	const notices = closet.find( 'div.error,div.notice,div.updated' );

	function reveal() {
		notices.filter( `.${inlineClass}` ).removeClass( `inline ${inlineClass}` );
		closet.insertAfter( dobby ).show();
		dobby.remove();
	}

	function getClass() {
		if ( closet.find( 'div.error,div.notice-error' ).length ) {
			return 'notice-error';
		}

		if ( closet.find( 'div.notice-warning' ).length ) {
			return 'notice-warning';
		}

		return 'notice-info';
	}

	if ( notices.length < dobbySettings.threshold ) {
		reveal();

		return;
	}

	notices.not( '.inline' ).addClass( `inline ${inlineClass}` );

	dobby.addClass( getClass() ).removeClass( 'hide-if-js' );

	$( '.dobby-button' ).click( reveal );
})( jQuery );

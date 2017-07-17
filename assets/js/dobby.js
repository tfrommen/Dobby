/* global dobbySettings, jQuery */
(function( $ ) {
	'use strict';

	const closet = $( '.dobby-closet' );
	const dobby = $( '#dobby' );
	const notices = closet.find( 'div.error,div.notice,div.updated' );

	function reveal() {
		closet.replaceWith( closet.html() );
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

	notices.addClass( 'inline' );

	dobby.addClass( getClass() ).removeClass( 'hide-if-js' );

	$( '.dobby-button' ).click( function() {
		closet.insertAfter( dobby );
		reveal();
	} );
})( jQuery );

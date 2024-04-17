( function( $ ) {
	// Ajax notice.
	$( document ).on( 'click', '.notice-icon-font-awesome .notice-dismiss', function() {
		$.ajax( {
			url: adminLocalize.ajaxUrl,
			type: 'POST',
			data: {
				action: 'icon_font_awesome_action_dismiss_notice',
				mynonce: adminLocalize.ajaxNonce,
			},
			success( response ) {
				// console.log( 'Ajax success:', response );
			},
			error( error ) {
				// console.error( 'Ajax error:', error );
			},
		} );
	} );
}( jQuery ) );

//# sourceMappingURL=admin-global.js.map

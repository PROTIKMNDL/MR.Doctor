( function( api ) {

	// Extends our custom "opus-blog" section.
	api.sectionConstructor['opus-blog'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );

(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	 $(document).ready(function() {
		$("#erf_single_viev_table tr").click(function(event) {
			let id = $(event.target).data('id');
			let field = $(event.target).data('name');
			var value = 0;
			if ($(event.target).data('checked') == '0'){
				value = 1
			}
			$.ajax({
				type: "POST",
				url: AdminEventRequestFormRequests.url,
				data: {
					key: AdminEventRequestFormRequests.key,
					action: 'erf_check_field_row',
					id: id,
					field: field,
					value: value,
				},
				success: function(response){
					if(response.success){
						$(event.target).attr('data-checked', value);
						if(value){
							$(event.target).removeClass("field-not-checked");
							$(event.target).addClass("field-checked");	
						}else{
							$(event.target).addClass("field-not-checked");
							$(event.target).removeClass("field-checked");	
						}
					}
				}
			});
		});
	});

})( jQuery );

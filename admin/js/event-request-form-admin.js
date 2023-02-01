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
		$(".event-request-remove-item").click(function(event){
			const row_name = $(this).data('name');
			if (confirm('Está seguro de eliminar la entrada de ' + row_name + '?')) {
				$('#loading-gif').toggle();
				const row_id = $(this).data('id');
				$.ajax({
					type: "POST",
					url: AdminEventRequestFormRequests.url,
					data: {
						key: AdminEventRequestFormRequests.key,
						action: 'erf_remove_form_entry',
						id: row_id,
					},
					success: function(response){
						$('#loading-gif').toggle();
						if(response.success){
							location.reload();
						}
					}
				});	
			}
		});
		$(".check-box").click(function(event) {
			let id = $(this).data('id');
			let field = $(this).data('name');
			var value = ($(this).prop('checked'))?1:0;
			$('#loading-gif').toggle();
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
					$('#loading-gif').toggle();
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

jQuery(document).ready(function($) {
	$('.delete-district').on('click', function(event) {
		event.preventDefault();
		var parent_a =  $(this).parent();
		var url  = $(this).attr('url');
		if (!confirm("Are you sure ? to pay ")) {
            return false;
        }

		$.ajax({
			url: url,
			type: 'GET',
		})
		.done(function(data) {
			if (data == 'ok') {
				parent_a.remove();
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
	
});
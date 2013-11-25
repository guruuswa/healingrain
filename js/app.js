jQuery(document).ready(function($) {
	var spinner,
		isbn = $('#_isbn'),
		loader = $('#loader'),
		nonce = $('#google_nonce');

	$('#search-google').click(function() {

		if(!isbn.val()) {
			isbn.focus();
			return;
		}

		spinner = new Spinner({ 
			length: 15, 
			width: 8,
			radius: 23, 
			trail: 27, 
			color: '#9EF690',
			className: 'spins' 
		});

		loader.after(spinner.spin().el).show();

		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: { 
				isbn: isbn.val(),
				nonce: nonce.val(),
				action: 'google_action_callback'				
			},
			success: function(response) {
				
				spinner.stop();

				loader.hide();

				if(response === '0') {
					return;
				}

				var book = JSON.parse(response);

				$('#acf-field-isbn').val(book.ISBN);
				$('#acf-field-author').val(book.Author);
				$('#acf-field-rating').val(book.Rating);
				$('#acf-field-subtitle').val(book.Subtitle);				
				$('#acf-field-publisher').val(book.Publisher);
				$('#acf-field-pagecount').val(book.PageCount);										
				$('#acf-field-description').val(book.Description);
				$('input[name="post_title"]').focus().val(book.Title);
				$('#acf-field-datepublished').val(book.DatePublished);				
			}
		});
	});


	$('.digits').bind('keydown', function (e) { 
		var key = e.keyCode;
		if ([ 8, 9, 13, 27, 46 ].indexOf(key) !== -1) return;                
		else {
			if (e.shiftKey || (key < 48 || key > 57) && (key < 96 || key > 105)) {
				e.preventDefault();
			}
		}
	}); 
});

$(function() {
	// Add boostrap tooltip functionality
    $('[data-toggle="tooltip"]').tooltip();
	
	// Open links in new tab
	$(document).on('click', '.js-external', function() {
		let target = $(this).attr('href');
		window.open(target);
		return false;
	});
	
	// Animate the scroll duration
	$(document).on('click', '.scroll-to-top', function() {
		$('body, html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
	
	// Show or hide the scroll link
	$(window).scroll(function() {
		if ($(this).scrollTop() > 100) {
			$('.scroll-to-top').fadeIn();
		} else {
			$('.scroll-to-top').fadeOut();
		}
	});
	
	// Create stats view
	$(document).on('click', '.column__action--show-chart', function() {
		let self = $(this);
		let id = self.data('id');
		$('.loader-image').show(); 
		$.ajax({
			url: "stats",
			type: "get",
			data: { 
				id: id
			},
			cache: false,
			success: function(data) {
				console.log(data);
				$('.stock-details').html(data);
				$('.loader-image').hide();
			},
			error: function(xhr) {
				$('.loader-image').hide(); 
			}
		}).done(function() {
			let position = $('.stats').offset().top;
			$('body, html').animate({
				scrollTop: position
			}, 800);
		});
		return false;
	});
	
});

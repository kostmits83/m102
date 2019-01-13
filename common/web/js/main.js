
$(function() {
	// Show or hide the scroll link
	$(window).scroll(function() {
		if ($(this).scrollTop() > 100) {
			$('.scroll-to-top').fadeIn();
		} else {
			$('.scroll-to-top').fadeOut();
		}
	});
	
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
	
	// Create stats view
	$(document).on('click', '.js-show-chart', function() {
		let self = $(this);
		let id = self.data('id');
		let symbol = self.data('symbol');
		$('.loader-image').show();
		$.ajax({
			url: 'stats',
			type: 'get',
			data: { 
				id: id
			},
			cache: false,
			success: function(response) {
				$('.stock-details').html(response);
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
			
			getChart(symbol);
			
		});
		return false;
	});
	
	// Show highstock chart
	function getChart(symbol) {
		$('.loader-image').show();
		$.ajax({
			type: 'post',
			data: { 
				symbol: symbol
			},
			dataType: 'json',
			url: 'chart',
			success: function(dataStocks) {
				$('.loader-image').hide();
				Highcharts.stockChart('js-highstock', {
					rangeSelector: {
						selected: 1
					},
					title: {
						text: symbol + ' Stock Price'
					},
					series: [{
						name: symbol,
						data: dataStocks,
						tooltip: {
							valueDecimals: 2
						}
					}]
				});
			},
			error: function(xhr) {
				$('.loader-image').hide();
			}
		});
	}
	
	// Add to favorites and comparison lists
	$(document).on('click', '.js-add-stock-to-favors', function() {
		let self = $(this);
		let id = self.data('id');
		let typeId = self.data('type_id');
		$.ajax({
			url: 'add-stock-to-favors',
			type: 'post',
			dataType: 'json',
			data: { 
				id: id,
				typeId: typeId
			},
			cache: false,
			success: function(response) {
				$.notify({
					icon: response.icon,
					title: response.title,
					message: response.message,
				},{
					type: response.type,
					delay: 3500,
					showProgressbar: false
				});
			},
			error: function(xhr) {
			}
		});
		return false;
	});
	
	// Delete from favorites and comparison lists
	$(document).on('click', '.js-delete-stock-from-favors', function() {
		var self = $(this);
		var id = self.data('id');
		var typeId = self.data('type_id');
		$.ajax({
			url: self[0].href,
			type: 'post',
			dataType: 'json',
			data: { 
				id: id,
				typeId: typeId
			},
			cache: false,
			success: function(response) {
				$('.stock-favors-' + typeId + '-' + id).slideUp();
				$.notify({
					icon: response.icon,
					title: response.title,
					message: response.message,
				},{
					type: response.type,
					delay: 3500,
					showProgressbar: false
				});
			},
			error: function(xhr) {
			}
		});
		return false;
	});
	
	// Delete from portfolio
	$(document).on('click', '.js-delete-stock-from-portfolio', function() {
		var self = $(this);
		var id = self.data('id');
		$.ajax({
			url: self[0].href,
			type: 'post',
			dataType: 'json',
			data: { 
				id: id
			},
			cache: false,
			success: function(response) {
				$('.portfolio-' + id).hide();
				$.notify({
					icon: response.icon,
					title: response.title,
					message: response.message,
				},{
					type: response.type,
					delay: 3500,
					showProgressbar: false
				});
			},
			error: function(xhr) {
			}
		});
		return false;
	});
	
	// Open modal to add stock to portfolio list
	$('#body').on('click', '.js-add-stock-to-portfolio', function(e) {
		e.preventDefault();
		$('#modalAddStockToPortfolio').modal('show')
			.find('.modal-body')
			.load($(this).attr('href'));

		return false;
	});
	
	// Add stock to portfolio list
	$('#body').on('submit', '#form-add-stock-to-portfolio', function(e) {
		e.preventDefault();
		let self = $(this);
		$.ajax({
			url: self.attr('action'),
			type: self.attr('method'),
			data: new FormData(self[0]),
			mimeType: 'multipart/form-data',
			contentType: false,
			cache: false,
			processData: false,
			dataType: 'json',
			success: function (response) {
				$('#modalAddStockToPortfolio').modal('hide');
				$.notify({
					icon: response.icon,
					title: response.title,
					message: response.message,
				},{
					type: response.type,
					delay: 3500,
					showProgressbar: false
				});
			}
		});
		return false;
	});
	
	// Update the total price
	$('#body').on('keyup, blur', '.js-stock-add-to-portfolio-shares, .js-stock-add-to-portfolio-price', function() {
		let shares = $('.js-stock-add-to-portfolio-shares');
		let price = $('.js-stock-add-to-portfolio-price');
		
		let sharesValue = parseInt(shares.val());
		let priceValue = parseFloat(price.val());
		
		if (isNaN(sharesValue) || sharesValue < 0) {
			shares.val('');
			sharesValue = 0;
		}
		if (isNaN(priceValue) || priceValue < 0) {
			price.val('');
			priceValue = 0;
		}
		let totalPrice = parseFloat(sharesValue * priceValue).toFixed(2);
		$('.js-total-price-value').html(totalPrice);
	});
	
	// This is to trigger language picker
	$('#body').on('click', '.lang-picker input', function() {
		document.forms.formLang.submit();
	});
	
});

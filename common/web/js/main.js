
// Show or hide the scroll link
$(window).scroll(function () {
	if ($(this).scrollTop() > 100) {
		$(".scroll-to-top").fadeIn();
	} else {
		$(".scroll-to-top").fadeOut();
	}
});

// Animate the scroll duration
$(".scroll-to-top").click(function () {
	$("body, html").animate({
		scrollTop: 0
	}, 800);
	return false;
});

// Open links in new tab
$(".js-external").click(function() {
	var target = $(this).attr("href");
	window.open(target);
	return false;
});

jQuery(function($) {
	$('.slick-homi').slick({
		prevArrow: ".le-prev",
		nextArrow: ".le-next"
	});
	$(".navbar-default .navbar-nav>li>a").click(function(event) {
		$url = $(this).attr('href');
		if ($url!='#') {
			window.location.href = $url;
		}
	});
	$('a.collap-sed').on('mouseenter', function(){
		$(this).trigger('click');
	})
	var url = window.location.pathname, 
	urlRegExp = new RegExp(url.replace(/\/$/,'') + "$"); 
	$('.sidebar li a').each(function(){
	    if(urlRegExp.test(this.href.replace(/\/$/,''))){
	        $(this).addClass('active');
	        var grandpa = $(this).parent().parent();
	        grandpa.removeClass('collapse');
			$(this).next(grandpa).removeClass('collapse');
	    }
	});

	$('.the-cols figure').on('mouseenter', function(e) {
		e.stopPropagation();
		$(this).find('.description').stop(true, true).fadeIn('300', function() {
			
		});
	});
	$('.the-cols figure').on('mouseleave', function(e) {
		e.stopPropagation();
		$(this).find('.description').stop(true, true).hide();
	});

	$('.slick-proyectos').slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000
	});
});

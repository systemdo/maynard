// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('body').on('click', '.li-navegadores a', function(event) {
        var $anchor = $(this);
        //remove active
        $('.navbar li.active').removeClass('active');
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');

    	//add active    
        if (!$anchor.parent().hasClass('active')) {
		    $anchor.parent().addClass('active');
		}

        event.preventDefault();
    });
    //Closes the Responsive Menu on Menu Item Click
	$('.navbar-collapse ul li a').click(function() {
	    $('.navbar-toggle:visible').click();
	});


});


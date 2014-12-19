jQuery(document).ready(function($) {

	// ADD THIS IN INIT FUNCTION
	var windowWidth = ($(window).innerWidth());
	$('picture').css('max-width', windowWidth);

	/*
	* top nav: display icon on hover
	*/
	$('li.nav-item')
		.mouseenter(function() {
			$(this).find('i').fadeIn(100);
		})
		.mouseleave(function() {
			$(this).find('i').fadeOut(100);
		});

	/*
	* hide reveal menu
	*/
	$('a#toggle-menu').on('click', function(e) {
		var $this = $(this);
		e.preventDefault();

		// toggle menu class
		($this.hasClass('active')) ? $this.removeClass('active') : $(this).addClass('active');
		
		$('div#header-nav-container').slideToggle(300);
	});

	/*
	* hide dropdown menu on resize
	* resize pict max with to fake responsiveness
	*/
	$(window).on('resize', function() {

		windowWidth = ($(window).innerWidth());

		if(windowWidth > 600) {
			$('a#toggle-menu').removeClass('active');
			$('div#header-nav-container').attr('style', '');
		}

		$('picture').css('max-width', windowWidth);

		return windowWidth;

	});

	/*
	* slideshow
	*/
	// MOVE INTO INIT FUNCTION
	// ensure there is a previous slide
	if($('section#home-slideshow').length != 0) {
		$('.previous-slide').css('margin-left', -windowWidth).parent().insertBefore($('.current-slide').parent());
		// $('.previous-slide').css('margin-left', -2500).insertBefore($('.current-slide'));
	}
	
	$('span').on('click', function() {

		var direction = $(this).data('dir'),
				currentImg = $('.current-slide'),
				nextImg = $('.next-slide'),
				prevImg = $('.previous-slide'),
				currentIndex = currentImg.index();

		if(direction == 'next') {

			currentImg.css('margin-left' , -windowWidth);

			setTimeout(function() {
				currentImg.removeClass('current-slide').addClass('previous-slide');
				nextImg.removeClass('next-slide').addClass('current-slide');
				prevImg.removeClass('previous-slide').addClass('next-slide').css('margin-left', 0);
				prevImg.parent().insertAfter(nextImg.parent());
			}, 2000);

		} else {
			prevImg.css('margin-left' , 0);
			
			setTimeout(function() {
				
				currentImg.removeClass('current-slide').addClass('next-slide');
				nextImg.removeClass('next-slide').addClass('previous-slide').css('margin-left', -windowWidth);
				prevImg.removeClass('previous-slide').addClass('current-slide');
				nextImg.parent().insertBefore(prevImg.parent());
				
			}, 2000);
		}
		

	});

});
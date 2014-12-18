jQuery(document).ready(function($) {

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
	*/
	$(window).on('resize', function() {
		if($(window).width() > 600) {
			$('a#toggle-menu').removeClass('active');
			$('div#header-nav-container').attr('style', '');
		}
	});

	/*
	* slide
	*/

	// init work
	// ensure there is a previous slide
	$('.previous-slide').css('margin-left', -2500).parent().insertBefore($('.current-slide').parent());
	// $('.previous-slide').css('margin-left', -2500).insertBefore($('.current-slide'));

	$('span').on('click', function() {

		var direction = $(this).data('dir'),
				currentImg = $('.current-slide'),
				currentIndex = currentImg.index(),
				nextImg = $('.next-slide'),
				prevImg = $('.previous-slide');

		//nextImg.addClass('next-slide');
		//prevImg.addClass('previous-slide');

		if(direction == 'next') {

			currentImg.css('margin-left' , -2500);
			// edit classes
			// change element index to ensure prev and next

		} else {
			prevImg.css('margin-left' , 0);
			// edit classes
			// change element index to ensure prev and next
		}
		

	});

});
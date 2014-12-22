jQuery(document).ready(function($) {

	// globals
	// this could be just one object
	var windowWidth,
			currentPage;

	// INIT SCRIPT
	(function pzInit() {
		windowWidth = ($(window).innerWidth());
		$('picture').css('max-width', windowWidth);

		// homepage
		if($('section#home-slideshow').length != 0) {
			currentPage = 'Homepage';
		}

		return windowWidth, currentPage;
	}());


	/*
	* homepage
	*/
	if(currentPage == 'Homepage') {

		// shortcuts interactivity
		$('div#direction-shortcut, div#border-times-shortcut').on('click', function() {
			$(this).find('div.shortcut-info').animate({width:'toggle'},350);
		});

		// set up slides
		var slides = $('picture.home-img'),
		slideLength = slides.length;
		$('.previous-slide').css('margin-left', -windowWidth).parent().insertBefore($('.current-slide').parent());
		// $('.previous-slide').css('margin-left', -2500).insertBefore($('.current-slide'));
	
		// add dots to slides
		slides.each(function(index) {	
			var spanContainer = $(this).parent().find('span.slide-dots');
			for(var ii = 0; ii < slideLength; ii++) {
				if(ii === index) {
					$('<div class="s-dot active-s-dot"></div>').appendTo(spanContainer);
				} else {
					$('<div class="s-dot"></div>').appendTo(spanContainer);
				}
			}
		});
	}
	
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

		var previousReset = {
			'margin-left' 				: windowWidth * -1,
			'-webkit-transition' 	: 'margin-left 0s',
			'transition'					: 'margin-left 0s'
		};

		var removeReset = {
			'-webkit-transition' 	: 'margin-left 2s',
			'transition'					: 'margin-left 2s'
		};

		if(windowWidth > 600) {
			$('a#toggle-menu').removeClass('active');
			$('div#header-nav-container').attr('style', '');
		}

		$('picture').css('max-width', windowWidth);
		$('picture').eq(0).css(previousReset);

		setTimeout(function() {
			$('picture').eq(0).css(removeReset);
		}, 2000);

		return windowWidth;

	});

	/*
	* slideshow
	*/	
	$('span').on('click', function() {

		var direction = $(this).data('dir'),
				currentImg = $('.current-slide'),
				//nextImg = $('.next-slide'),
				//prevImg = $('.previous-slide'),
				slidesLength = $('picture.home-img').length,
				currentIndex = currentImg.parent().index();

		var	nextIndex = (currentIndex + 1 >= slidesLength ) ? 0 : currentIndex + 1;
		var	prevIndex = (currentIndex - 1 < 0 ) ? slidesLength - 1 : currentIndex - 1;

		var nextImg = $('picture').eq(nextIndex);
		var prevImg = $('picture').eq(prevIndex);

		$('div.slide-info').fadeOut('fast');

		if(direction == 'next') {

			currentImg.css('margin-left' , -windowWidth);

			setTimeout(function() {
				$('div.slide-info').fadeIn();
				currentImg.removeClass('current-slide').addClass('previous-slide');
				nextImg.removeClass('next-slide').addClass('current-slide');
				prevImg.removeClass('previous-slide').addClass('next-slide').css('margin-left', 0);
				prevImg.parent().insertAfter(nextImg.parent());
			}, 2000);

		} else {

			prevImg.css('margin-left' , 0);
			
			setTimeout(function() {
				$('div.slide-info').fadeIn();
				currentImg.removeClass('current-slide').addClass('next-slide');
				nextImg.removeClass('next-slide').addClass('previous-slide').css('margin-left', -windowWidth);
				prevImg.removeClass('previous-slide').addClass('current-slide');
				nextImg.parent().insertBefore(prevImg.parent());
			}, 2000);
		}
		

	});

});
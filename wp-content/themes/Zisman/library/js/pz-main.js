jQuery(document).ready(function($) {

	// globals
	// this could be just one object
	var windowWidth,
			currentPage;

	// INIT SCRIPT
	(function pzInit() {
		windowWidth = ($(window).innerWidth());
		$('picture').css('max-width', windowWidth);

		// get current page
		switch(true) {
			case $('section#home-slideshow').length != 0:
				currentPage = 'homepage';
				break;
			case $('section.articles-wrapper').length != 0:
				currentPage = 'articles';
				break;
			case $('section.immigration-links-wrapper').length != 0:
				currentPage = 'immigration-links';
				break;
			case $('section.us-immigration-wrapper').length != 0:
				currentPage = 'us-immigration';
				break;
			case $('section.attorney-bio-wrapper').length != 0:
				currentPage = 'attorney-bio';
				break;
			case $('section.contact-wrapper').length != 0:
				currentPage = 'contact';
				break;
		}

		return windowWidth, currentPage;

	}());


	/*
	* homepage
	*/
	if(currentPage == 'homepage') {

		// shortcuts interactivity
		$('div#direction-shortcut, div#border-times-shortcut').on('click', function() {
			$(this).find('div.shortcut-info').animate({width:'toggle'},350);
		});

		// set up slides
		var slides = $('picture.home-img'),
		slideLength = slides.length;
		//$('.previous-slide').css('margin-left', -windowWidth).parent().insertBefore($('.current-slide').parent());
	
		// add dots to slides
		slides.each(function(index) {	
			var spanContainer = $(this).parent().find('span.slide-dots');
			for(var ii = 0; ii < slideLength; ii++) {
				if(ii === index) {
					$('<div class="s-dot active-s-dot" data-index="' + ii + '"></div>').appendTo(spanContainer);
				} else {
					$('<div class="s-dot" data-index="' + ii + '"></div>').appendTo(spanContainer);
				}
			}
		});

		// init slideshow
		var homeSlideshow = new pzSlideshow($('picture.home-img'), $('div.slide-info'));

		$('span.SLIDESHOW-NAVIGATOR').on('click', function() {
			var $this = $(this);
			homeSlideshow.slide($this);
		});	

		$('div.s-dot').on('click', function() {
			var goToIndex = $(this).data('index');
			homeSlideshow.slideByIndex(goToIndex)
		})

		//setTimeout(function() {
		//	homeSlideshow.autoSlide();
		//}, 2000);
		
	}

	/*
	* contact
	*/
	if(currentPage == 'contact') {

		// google map
		// resize google map height
		if(windowWidth > 800) {
			$('section.embedded-map').css('height', 350);
		} else if(windowWidth < 800 && windowWidth > 500) {
			$('section.embedded-map').css('height', 280);
		} else if(windowWidth < 500) {
			$('section.embedded-map').css('height', 200);
		}

		var map;
		var vancouver = new google.maps.LatLng(49.279971, -123.124991);

		var MY_MAPTYPE_ID = 'custom_style';

		function initialize() {

		  var featureOpts = [
		    {
		        "featureType": "administrative",
		        "elementType": "labels.text.fill",
		        "stylers": [{ "color": "#444444" }]
		    },
		    {
		        "featureType": "landscape",
		        "elementType": "all",
		        "stylers": [
		            { "color": "#f2f2f2" }
		        ]
		    },
		    {
		        "featureType": "poi",
		        "elementType": "all",
		        "stylers": [
		            { "visibility": "off" }
		        ]
		    },
		    {
		        "featureType": "poi.park",
		        "elementType": "geometry.fill",
		        "stylers": [
		            { "saturation": "-36" },
		            { "lightness": "-6" },
		            { "visibility": "on" },
		            { "gamma": "1" },
		            { "hue": "#00a4ff" }
		        ]
		    },
		    {
		        "featureType": "road",
		        "elementType": "all",
		        "stylers": [
		            { "saturation": -100 },
		            { "lightness": 45 }
		        ]
		    },
		    {
		        "featureType": "road",
		        "elementType": "geometry.fill",
		        "stylers": [{ "visibility": "on" }]
		    },
		    {
		        "featureType": "road.highway",
		        "elementType": "all",
		        "stylers": [{ "visibility": "simplified" }]
		    },
		    {
		        "featureType": "road.highway",
		        "elementType": "geometry.fill",
		        "stylers": [
		            { "visibility": "on" },
		            { "hue": "#ff0000" }
		        ]
		    },
		    {
		        "featureType": "road.arterial",
		        "elementType": "labels.icon",
		        "stylers": [{ "visibility": "off" }]
		    },
		    {
		        "featureType": "transit",
		        "elementType": "all",
		        "stylers": [{ "visibility": "off" }]
		    },
		    {
		        "featureType": "water",
		        "elementType": "all",
		        "stylers": [
		            { "color": "#c2d6f1" },
		            { "visibility": "on" }
		        ]
		    }
			]

		  var mapOptions = {
		    zoom: 14,
		    center: vancouver,
		    mapTypeControlOptions: {
		      mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
		    },
		    mapTypeId: MY_MAPTYPE_ID
		  };

		  map = new google.maps.Map(document.getElementById('page-banner'),
		      mapOptions);

		  var marker = new google.maps.Marker({
		      position: new google.maps.LatLng(49.279971, -123.124991),
		      map: map,
		      title: 'Hello World!'
		  });

		  var styledMapOptions = {
		    name: 'Custom Style'
		  };

		  var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

		  map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
		}
		google.maps.event.addDomListener(window, 'load', initialize);

		// form validation
		$('form#contact-form').on('submit', function(ev) {

			var form = $(this),
			 		nameInput = form.find('input#contact-name'),
			 		nameInputVal = nameInput.val().trim();
			 		emailInput = form.find('input#contact-email'),
			 		emailInputVal = emailInput.val().trim();
			 		messageInput = form.find('textarea#contact-message'),
			 		messageInputVal = messageInput.val().trim(),
			 		formErrors = false;

			if(nameInputVal == '' || nameInputVal == 'Please enter your name') {
				console.log(nameInputVal);
				nameInput.addClass('form-error');
				nameInput.val('Please enter your name');
				ev.preventDefault();

				formErrors = true;
			}

			if(emailInputVal == '' || emailInputVal == 'Please enter your email address') {
				emailInput.addClass('form-error');
				emailInput.val('Please enter your email address');
				ev.preventDefault();

				formErrors = true;
			}

			if(messageInputVal == '' || messageInputVal == 'Please enter your message') {
				messageInput.addClass('form-error');
				messageInput.val('Please enter your message');
				ev.preventDefault();

				formErrors = true;
			}

			if(formErrors == false) {
				console.log('sumbit');
			}

		});

		$('input#contact-name, input#contact-email, textarea#contact-message').on('focus', function() {

			var $this = $(this);
			if($this.hasClass('form-error')) {
				$this.removeClass('form-error').val('');
			}
		})
	}

	/*
	* top nav: display icon on active page
	*/
	$('li.nav-item[data-page="' + currentPage + '"]').find('i').fadeIn(100);

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

	/**
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

		// resize map height on contact page
		if(currentPage = 'contact') {
			if(windowWidth < 800 && windowWidth > 500) {
				$('section.embedded-map').css('height', 280);
			} else if(windowWidth < 500) {
				$('section.embedded-map').css('height', 200);
			}
		}
		

		var removeReset = {
			'-webkit-transition' 	: 'margin-left 2s',
			'transition'					: 'margin-left 2s'
		};

		if(windowWidth > 600) {
			$('a#toggle-menu').removeClass('active');
			$('div#header-nav-container').attr('style', '');
		}

		$('picture').css('max-width', windowWidth);
		$('picture.home-img').eq(0).css(previousReset);

		setTimeout(function() {
			$('picture.home-img').eq(0).css(removeReset);
		}, 2000);

		return windowWidth;

	});

	/**
	* SLIDESHOW CONSTRUCTOR
	*
	* @param $slideElem: the slide image elements
	* @assumption elem[0] has class 'current-slide', elem[1] has class 'next-slide', elem[lenght-1] has class 'previous-slide'
	* @param $slideText: any text that should slide with the images
	* @param $dirElem: navigation elements. Prev needs data-dir 'prev', Next needs data-dir 'next'
	*/
	function pzSlideshow(slideElem, slideText) {
		this.slides = slideElem;
		this.slidesLength = slideElem.length; 
		this.slideText = slideText || '';
		this.interval = false;
	}

	pzSlideshow.prototype.slide = function(dirElem) {

		var direction = typeof dirElem !== 'undefined' ? dirElem.data('dir') : 'next';
		var currentImg = $('.current-slide');
		var currentIndex = currentImg.parent().index();
		var	nextIndex = (currentIndex + 1 >= this.slidesLength ) ? 0 : currentIndex + 1;
		var	prevIndex = (currentIndex - 1 < 0 ) ? this.slidesLength - 1 : currentIndex - 1;
		
		var nextImg = $('picture').eq(nextIndex);
		var prevImg = $('picture').eq(prevIndex);
		var lastImg = $('picture').eq(this.slidesLength - 1);

		this.slideText.fadeOut('fast');

		if(direction == 'next') {

			currentImg.css('margin-left' , -windowWidth);

			setTimeout(function() {
				$('div.slide-info').eq(nextIndex).fadeIn('slow');
				currentImg.removeClass('current-slide').addClass('previous-slide');
				nextImg.removeClass('next-slide').addClass('current-slide');
				prevImg.removeClass('previous-slide').addClass('next-slide').css('margin-left', 0);
				prevImg.parent().insertAfter(lastImg.parent());
			}, 1000);

		} else {

			prevImg.css('margin-left' , 0);
			
			setTimeout(function() {
				$('div.slide-info').eq(prevIndex).fadeIn('slow');
				currentImg.removeClass('current-slide').addClass('next-slide');
				nextImg.removeClass('next-slide');
				lastImg.addClass('previous-slide').css('margin-left', -windowWidth);
				prevImg.removeClass('previous-slide').addClass('current-slide');
				lastImg.parent().insertBefore(prevImg.parent());
			}, 1000);
		}
	}

	pzSlideshow.prototype.slideByIndex = function(goTo) {

		var currentImg = $('.current-slide');
		var currentIndex = currentImg.data('indexslide');
		var	nextIndex = (goTo + 1 >= this.slidesLength ) ? 0 : goTo + 1;
		var	prevIndex = (goTo - 1 < 0 ) ? this.slidesLength - 1 : goTo - 1;

		var nextImg = $('picture').eq(nextIndex);
		var prevImg = $('picture').eq(prevIndex);
		var lastImg = $('picture').eq(this.slidesLength - 1);
		var goToImg = $('picture[data-indexslide="' + goTo + '"]');
		var goToParent = goToImg.parent();
		var currentImgParent = currentImg.parent();

		console.log('currentIndex=> ' + currentIndex + 'goToIndex => ' + goTo);

		if(goTo === currentImg) {
			return false;
		}

		this.slideText.fadeOut('fast');

		if(goTo > currentIndex) {
			
			goToImg.addClass('next-slide').css('margin-left' , 0);
			goToImg.parent().insertAfter(currentImg.parent());

			setTimeout(function() {
				currentImg.css('margin-left' , -windowWidth);
				setTimeout(function() {
					goToImg.parent().find('div.slide-info').fadeIn('slow');
					currentImg.removeClass('current-slide');
					goToImg.removeClass('next-slide previous-slide').addClass('current-slide');	
				}, 1200);
			}, 200);

			
		} else {

			goToImg.addClass('previous-slide').css('margin-left' , -windowWidth);
			goToImg.parent().insertBefore(currentImg.parent());
			
			setTimeout(function() {
				goToImg.css('margin-left' , 0);	
				setTimeout(function() {
					goToImg.parent().find('div.slide-info').fadeIn('slow');
					currentImg.removeClass('current-slide');
					goToImg.removeClass('next-slide previous-slide').addClass('current-slide');
				}, 1200);
			}, 200);		
		}
	};

	pzSlideshow.prototype.autoSlide = function(delay) {

		this.interval = true;

		var $this = this,
				delay = delay || 7000;
		setInterval(function() {
			$this.slide();
		}, delay);
	}
});
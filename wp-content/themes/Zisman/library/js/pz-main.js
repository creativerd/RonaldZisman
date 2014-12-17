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

});
$(function() {
	// Vertical Scrolling Navigation
	$.scrollIt({
	  upKey: 38,             // key code to navigate to the next section
	  downKey: 40,           // key code to navigate to the previous section
	  easing: 'easeInOutCubic',      // the easing function for animation
	  scrollTime: 1000,       // how long (in ms) the animation takes
	  activeClass: 'active', // class given to the active nav element
	  onPageChange: null,    // function(pageIndex) that is called when page is changed
	  topOffset: 0           // offste (in px) for fixed top navigation
	});

	// Fancybox Galery modal
	$(".fancybox").fancybox({
		openEffect  : 'none',
		closeEffect	: 'none'
	});

	$('.bxslider').bxSlider({
		minSlides: 1,
		maxSlides: 3,
		slideWidth: 340,
		slideMargin: 10,
		infiniteLoop: false,
		pager: false
	});

	// Toggle class Highlight post home
	$('.btn.open, .btn.close').click(function(){
		$('.highlight.post').toggleClass('active');
	})

	$( "#tabs" ).tabs();
	$( ".post , .page" ).each(function() {
  		$(this).addClass('post-item');
	});

	// Set Target Blank for social menu 
	$('#menu-social a').each(function( ) {
		$(this).attr("target","_blank");
		title = $(this).html();
		$(this).attr("title", title);
	});

	if ($('body').hasClass('blog') || $('body').hasClass('page-template-page-blog')){
		$('.menu .menu-blog').addClass('current');
	}

	function scrollMenuPanel(){
	  	var topPage = $(this).scrollTop();

		if($('body').hasClass('home')){
		 	//var video_height = $('.home_panel').height();
		 	var scrollPosition = $('.fixed').offset().top;
		 	var top_number = scrollPosition;

			if (topPage >= 0 && topPage < scrollPosition){
				$('body').addClass('header_extended');
				$('body').removeClass('header_normal');
			}else if (scrollPosition < 0 || topPage < 0){
				$('body').addClass('header_extended');
				$('body').removeClass('header_normal');
			}else {
		  		$('body').addClass('header_normal');
		  		$('body').removeClass('header_extended');
			}
		} else{
			//var video_height = $('.home_panel').height();
		 	var scrollPosition = $('.fixed').offset().top;

			if (topPage > 0){
				$('body').addClass('header_normal');
				$('body').removeClass('header_extended');
			}else{
				$('body').addClass('header_extended');
				$('body').removeClass('header_normal');
			}

			if ($('body').hasClass('blog') || $('body').hasClass('page-template-page-blog')){
				var top_number = 500;
			}else{
				var top_number = 200;
			}
		}
	  	
	      
		if (topPage < top_number) {
		  $('body').addClass('top');
		  $('body').removeClass('not-top');
		}
		else{
		  $('body').addClass('not-top');
		  $('body').removeClass('top');
		}
	}
	scrollMenuPanel();

	// Panel
	$(window).scroll(function () {
		scrollMenuPanel();
 	});

 	// Fancybox
	if ( $(".gallery")) {
		$(".gallery img").each(function( ) {
			//console.log(output);
	  		$(this).parent().addClass('fancybox');
	  		$(this).parent().attr( "data-fancybox-group", "gallery" );
		});
	}

	// Fancybox Galery modal
	$(".fancybox").fancybox({
		openEffect  : 'none',
		closeEffect	: 'none'
	});
	$('.gallery-item a img').each(function(){
		img_description = $(this).attr('alt');
		$(this).parent().attr( 'title', img_description );
	});

	// Menu Dropdown 
	$( ".menu_link" ).click(function() {
		if ($( window ).width() < 979){
			$( ".menu.responsive.cntt" ).toggle("blind");
		}
	});
	$( ".menu.responsive.cntt" ).click(function() {
		if ($( window ).width() < 979){
			$( ".menu.responsive.cntt" ).toggle("blind");
		}
	});
})


// Responsive debugger script
$(document).ready(function(){
	var MEASUREMENTS_ID = 'measurements'; // abstracted-out for convenience in renaming
	$("body").append('<div id="'+MEASUREMENTS_ID+'"></div>');
	$("#"+MEASUREMENTS_ID).css({
	    'position': 'fixed',
	    'bottom': '0',
	    'right': '0',
	    'background-color': 'black',
	    'color': 'white',
	    'padding': '5px',
	    'font-size': '10px',
	    'opacity': '0.4',
	    'font-family': 'Arial, Sans',
	    'z-index': '100'
	});
	getDimensions = function(){
	    return $(window).width() + ' (' + $(document).width() + ') x ' + $(window).height() + ' (' + $(document).height() + ')';
	}
	getOrientation = function(){
		if ($(window).width() >= $(window).height()){
			return 'horizontal';
		}else{
			return 'vertical';
		}
	}
	setOrientation = function(){
	    if (getOrientation() == 'vertical' && !$('body').hasClass('vertical')){
	    	$('body').addClass('vertical');
	    } else if (getOrientation() == 'horizontal' && $('body').hasClass('vertical')){
	    	$('body').removeClass('vertical');
	    }
	}
	setOrientation();

	$("#"+MEASUREMENTS_ID).text(getDimensions());
	$(window).on("resize", function(){
	    $("#"+MEASUREMENTS_ID).text(getDimensions());
	    setOrientation();
	});
});

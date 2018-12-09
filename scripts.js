jQuery(document).ready(function($) {
	'use strict';

		// Search Block Start

		$('.space-search').click(function(){
		'use strict';
			$('.space-header-search-block').addClass('active');
		});

		$('.space-search-exit').click(function(){
		'use strict';
			$('.space-header-search-block').removeClass('active');
		});

		// Search Block End

		// Mobile Menu Open Start

		$('.fa-bars').click(function(){
		'use strict';
			$('.space-mobile-menu-wrap').addClass('active');
		});

		$('.space-mobile-exit').click(function(){
		'use strict';
			$('.space-mobile-menu-wrap').removeClass('active');
		});

		// Mobile Menu Open End

		// Mobile Children Start

		$(".menu-item-has-children a").click(function(event){
			'use strict';
			  event.stopPropagation();
			  location.href = this.href;
		  	});

			$(".menu-item-has-children").click(function(){
			'use strict';
		    	  $(this).addClass("toggled");
		    	  if($(".menu-item-has-children").hasClass("toggled"))
		    	  {
		    	  $(this).children("ul").toggle();
			  }
			  $(this).toggleClass("space-up");
		    	  return false;
	  	});

		// Mobile Children End

		// Float Header Start

		var stickyOffset = $('.space-header-block').offset().top;

		$(window).scroll(function(){
			'use strict';
		  var sticky = $('.space-header-block'),
		      scroll = $(window).scrollTop();
		    
		  if (scroll >= 200) sticky.addClass('fixed');
		  else sticky.removeClass('fixed');
		});

		// Float Header End

		// Scroll To Top Start

		if ($('#scrolltop').length) {

		    var scrollTrigger = 100, // px

		        backToTop = function () {
				'use strict';
		            var scrollTop = $(window).scrollTop();
		            if (scrollTop > scrollTrigger) {
		                $('#scrolltop').addClass('show');
		            } else {
		                $('#scrolltop').removeClass('show');
		            }
		        };

		    backToTop();

		    $(window).on('scroll', function () {
			'use strict';
		        backToTop();
		    });

		    $('#scrolltop').on('click', function (e) {
			'use strict';
		        e.preventDefault();
		        $('html,body').animate({
		            scrollTop: 0
		        }, 1000);
		    });

		}

		// Scroll To Top End

});
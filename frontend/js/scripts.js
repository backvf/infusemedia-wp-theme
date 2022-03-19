"use strict";


		/* Nav */
		subNavDesktop();
		mobileNav();
		subNavMobile();
		/* Floating hat */

		floatingHat();
		/* Reviews carousel */

		reviewsCarousel();
		/* Accordion solutions on mobile devices */

		mobileSolutions();
		/* View panel switch page view */

		showViewLinks();
		/* Show all clients */

		if (jQuery().readmore) {
			jQuery('#clients').readmore({
				speed: 0,
				lessLink: '<a href="#" class="btn clients__button">Hide</a>',
				moreLink: '<a href="#" class="btn clients__button">Show more</a>'
			});
		}

		/* Carousel of ideas */
		if (jQuery().slick) {
			jQuery('#insights').slick({
				infinite: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				dots: true,
				appendArrows: '#insights-controls',
				appendDots: '#insights-dots',
				swipe: false,
				mobileFirst: true,
				prevArrow: "\n      <button type=\"button\" class=\"slick-prev\">\n        <svg class=\"slick-arrow__icon-pointer\">\n          <use xlink:href=\"" + data.themeUrl + "/frontend/images/icons.svg#icon-pointer-arrow\"></use>\n        </svg>\n      </button>\n    ",
				nextArrow: "\n      <button type=\"button\" class=\"slick-next\">\n        <svg class=\"slick-arrow__icon-pointer\">\n          <use xlink:href=\"" + data.themeUrl + "/frontend/images/icons.svg#icon-pointer-arrow\"></use>\n        </svg>\n      </button>\n    ",
				responsive: [{
					breakpoint: 767,
					settings: {
						swipe: true
					}
				}, {
					breakpoint: 1279,
					settings: {
						swipe: true,
						slidesToShow: 2,
						slidesToScroll: 2
					}
				}]
			});
		}

/* Trimming long text to insight */

jQuery('.insight__main-text-container').each(function () {
	new Dotdotdot(this, {});
});

function floatingHat() {
	var header = jQuery('#main-header');
	var windowObject = jQuery(window);
	toggleClassHeader(windowObject, header);
	windowObject.bind('scroll', function () {
		toggleClassHeader(windowObject, header);
	});
}

function toggleClassHeader(windowObject, header) {
	if (windowObject.scrollTop() > 10) {
		header.addClass('main-header_float');
	} else {
		header.removeClass('main-header_float');
	}
}

function subNavDesktop() {
	var subNavs = jQuery('.sub-links-container');
	var linkContainers = jQuery('.link-container');
	linkContainers.hover(function () {
		if (window.innerWidth > 1279) {
			var currentSubNav = jQuery(this).find('.sub-links-container');
			jQuery(this).addClass('current');
			currentSubNav.stop().fadeIn(300);
		}
	}, function () {
		if (window.innerWidth > 1279) {
			var currentSubNav = jQuery(this).find('.sub-links-container');
			jQuery(this).removeClass('current');
			currentSubNav.stop().fadeOut(300);
		}
	});
	jQuery(window).bind('resize', function () {
		if (window.innerWidth < 1280) {
			return;
		}

		subNavs.removeAttr('style');
		linkContainers.removeClass('current');
	});
}

function mobileNav() {
	var pull = jQuery('#pull');
	var nav = jQuery('#header-nav');
	var body = jQuery('body');
	pull.on('click', function () {
		nav.stop().fadeToggle(300);
		pull.toggleClass('active');
		body.toggleClass('overflow');
	});
	jQuery(window).bind('resize', function () {
		if (window.innerWidth < 1280) {
			return;
		}

		pull.removeClass('active');
		body.removeClass('overflow');
		nav.removeAttr('style');
	});
}

function subNavMobile() {
	var navLinks = jQuery('.link-event');
	var navMainContainer = jQuery('.header__wrapper-nav');
	navLinks.on('click', function (event) {
		if (window.innerWidth < 1280) {
			var linkContainer = jQuery(this).closest('.link-container');
			var subNav = linkContainer.find('.sub-links-container');

			if (!subNav.length) {
				return;
			}

			event.preventDefault();

			if (!linkContainer.hasClass('current')) {
				var activeLinkContainer = navMainContainer.find('.current');
				var activeSubNav = activeLinkContainer.find('.sub-links-container');

				if (activeSubNav.length) {
					activeLinkContainer.removeClass('current');
					activeSubNav.stop().slideUp(300);
				}

				subNav.stop().slideDown(300);
				linkContainer.addClass('current');
			} else {
				subNav.stop().slideUp(300);
				linkContainer.removeClass('current');
			}
		}
	});
}

function mobileSolutions() {
	var numbers = jQuery('.solution__number');
	var buttonsContainers = jQuery('.solution__link-container');
	var contentSolutions = jQuery('.solution__content');
	numbers.on('click', function () {
		if (window.innerWidth < 768) {
			var parentContainer = jQuery(this).closest('.solution');
			var solutionContent = parentContainer.find('.solution__content');
			var btnContainer = parentContainer.find('.solution__link-container');
			solutionContent.stop().slideToggle(300, function () {
				parentContainer.toggleClass('opened');
			});
			btnContainer.stop().slideToggle(300);
		}
	});
	jQuery(window).bind('resize', function () {
		if (window.innerWidth > 767) {
			buttonsContainers.removeAttr('style');
			contentSolutions.removeAttr('style');
		}
	});
}

function showViewLinks() {
	var linkPull = jQuery('.link-views');
	var viewPanel = jQuery('#views');
	linkPull.on('click', function (event) {
		if (window.innerWidth > 1279) {
			event.preventDefault();
			viewPanel.stop().slideToggle(300);
		}
	});
	jQuery(window).bind('resize', function () {
		if (window.innerWidth > 1279) {
			return;
		}

		viewPanel.removeAttr('style');
	});
}

function reviewsCarousel() {
	if (jQuery().slick) {
		var countMainSlides = jQuery('#reviews-list .reviews__item').length - 1;
		var countSubSlides = jQuery('#reviews-sub-carousel .reviews__sub-carousel-slide').length - 1;
				  var revsInt;
				  jQuery('#reviews-list').on('init',function() {
					revsInt = setInterval(function() {
					  jQuery('#reviews-arrows .slick-prev').trigger('click');
					},4000);
					console.log('init')
				  });
				  jQuery('.reviews').on('mouseenter',function() {
					clearInterval(revsInt);
				  }).on('mouseleave',function() {
					revsInt = setInterval(function() {
					  jQuery('#reviews-arrows .slick-prev').trigger('click');
					},4000);
				  });
		jQuery('#reviews-list').slick({
			initialSlide: countMainSlides,
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			dots: true,
			appendArrows: '#reviews-arrows',
			appendDots: '#reviews-dots',
			asNavFor: '#reviews-sub-carousel',
			swipe: true,
			mobileFirst: true,
			prevArrow: "\n      <button type=\"button\" class=\"slick-prev\">\n        <svg class=\"slick-arrow__icon-pointer\">\n          <use xlink:href=\"" + data.themeUrl + "/frontend/images/icons.svg#icon-pointer-arrow\"></use>\n        </svg>\n      </button>\n    ",
			nextArrow: "\n      <button type=\"button\" class=\"slick-next\">\n        <svg class=\"slick-arrow__icon-pointer\">\n          <use xlink:href=\"" + data.themeUrl + "/frontend/images/icons.svg#icon-pointer-arrow\"></use>\n        </svg>\n      </button>\n    ",
			responsive: [{
				breakpoint: 1279,
				settings: {
					swipe: false
				}
			}]
		});
		jQuery('#reviews-sub-carousel').slick({
			initialSlide: countSubSlides,
			infinite: true,
			slidesToShow: 2,
			slidesToScroll: 1,
			arrows: false,
			dots: false,
			asNavFor: '#reviews-list',
			swipe: false
		});
	}
}

jQuery(document).on('input', '[name="firstname"], [name="lastname"]', function () {
		this.value = this.value.replace(/[^a-z ]/i, '');
	});
jQuery(document).on('input', '[name="email"]', function () {
		this.value = this.value.replace(/[\u0400-\u04FF]/, '');
	});




function copyToClipboard(text) {
    if (window.clipboardData && window.clipboardData.setData) {
        // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
        return window.clipboardData.setData("Text", text);

    }
    else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
        var textarea = document.createElement("textarea");
        textarea.textContent = text;
        textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in Microsoft Edge.
        document.body.appendChild(textarea);
        textarea.select();
        try {
            return document.execCommand("copy");  // Security exception may be thrown by some browsers.
        }
        catch (ex) {
            console.warn("Copy to clipboard failed.", ex);
            return false;
        }
        finally {
            document.body.removeChild(textarea);
        }
    }
}


jQuery(document).ready(function($){
	
    if(!localStorage.getItem("mypopup22")){
    	setTimeout(function(){
			$(".mypopup").addClass("on");
        }, 3000);
        localStorage.setItem("mypopup22","ok");
    }
    
    $(".mypopup-close").on("click", function(){
    	$(".mypopup").removeClass("on");
		$('#acc-video').trigger('pause');
	});
});

jQuery(document).ready(function($) {

	if(localStorage.getItem("cookie-ok")=="ok"){
    	$("body").addClass("cookie-ok");
    }
	$("body").on("click",".cmplz-btn.cmplz-accept",function(){
    	localStorage.setItem("cookie-ok","ok");
    });

	jQuery(".image-with-share-button").click(function(){
        var src = jQuery(this).parents(".image-with-share").find("img").attr("src"),
        title = jQuery("head title").text(),
        url = window.location.href;
        var full = `<a href="${url}" target="_blank"><img src="${src}" alt="${title}" width="auto" border="none" /></a>`;
        copyToClipboard(full);
    	jQuery(this).addClass("ok");
        setTimeout(function(){
        	jQuery(".image-with-share-button").removeClass("ok");
        },3000);
    });
});
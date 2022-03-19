$(document).ready(function() {

	$('.revs-block').each(function() {
		var revs = $(this),
			slides = revs.find('.revs-slide'),
			links = revs.find('.revs-tab-link'),
			revsInit = false;

		links.on('click',function() {
			var id = $(this).attr('data-revs');

			revsGo(id);
		});

		links.last().trigger('click');

		function revsGo(id) {
			revs.find('.revs-tab').removeClass('active');
			revs.find('.revs-tab-link[data-revs="'+id+'"]').closest('.revs-tab').addClass('active');

			slides.removeClass('active');
			revs.find('.revs-slide[data-revs="'+id+'"]').addClass('active');

			if (revsInit) {
				if (window.matchMedia('(max-width:767px)').matches) {
					var revsPos = revs.position().top;
					$('html, body').animate({scrollTop:revsPos - 85},300);
				}
			}

			revsInit = true;
		}
	});

	// Scroll Spy
	function scrollSpy(block, options) {
		options = $.extend({
			sections: '.scrollspy-section',
			menu: '.scrollspy-menu',
			links: '.scrollspy-link',
			parrents: '.scrollspy-parent',
			parrentsLinks: '.scrollspy-parent-link',
			scrollOffset: 0,
			scrollSpeed: 500,
			hashOnScroll: true,
			defineOffset: function() {
				return $(window).height() * .3;
			},
			onMenuHighlight: null,
			onInit: null
		}, options);
		
		let links = block.find(options.links),
			sections = block.find(options.sections),
			menu = block.find(options.menu),
			sOffset = options.scrollOffset,
			dOffset = options.defineOffset,
			isScrolling = true,
			inited = false,
			currentHash = '',
			timer;
			
		if (typeof options.defineOffset == 'function') {
			dOffset = options.defineOffset.call(this);
		}
			
		if (typeof options.scrollOffset == 'function') {
			sOffset = options.scrollOffset.call(this);
		}

		sections.each(function() {
			$(this).attr('data-id', $(this).attr('id'));
		});

		block.on('scrollspy.init',function() {
			init();
		});

		function init() {
			let initHash = window.location.hash;
			if (initHash && initHash !== '') {
				let start = block.find(options.links+'[href="'+initHash+'"]');

				if (start.length) {
					setTimeout(function() {
						start.trigger('click');
					},30);
				} else {
					isScrolling = false;
					defineScroll();
				}	
			} else {
				isScrolling = false;
				defineScroll();
			}
			inited = true;
			options.onInit.call();
		}

		$(window)
			.on('resize',function() {
				if (typeof options.defineOffset == 'function') {
					dOffset = options.defineOffset.call(this);
				}
			
				if (typeof options.scrollOffset == 'function') {
					setTimeout(function() {
						sOffset = options.scrollOffset.call(this);
					},30);
				}

				defineScroll();
			})
			.on('scroll',function(e) {
				defineScroll();
			});

		links.each(function() {
			if ($(this).is('a[href*="#"]')) {
				$(this).on('click', function(e){
					e.preventDefault();
					let id = $(this).attr('href').substr(1);
					isScrolling = true;

					scrollToAnchor(
						$(this).attr('href'),
						sOffset,
						options.scrollSpeed
					);

					menuHighlight(id);

					setTimeout(function() {
						isScrolling = false;
					}, options.scrollSpeed + 50);

					currentHash = id;
					setHash(currentHash)
				});
			}
		});

		function defineScroll() {
			if (inited && !isScrolling) {
				let scrolled = $(window).scrollTop(),
					winHeight = $(window).height(),
					scrSec = [];

				sections.each(function() {
					if (scrolled + winHeight - dOffset >= $(this).offset().top) {
						let id = $(this).attr('id')
						menuHighlight(id);

						scrSec.push(id);
					}
				});

				if (options.hashOnScroll === true) {
					if (scrSec[scrSec.length - 1] !== currentHash) {
						currentHash = scrSec[scrSec.length - 1] || '';

						if (currentHash) {
							hashOnScroll(currentHash);
						}
					}
				}
			}
		}

		function menuHighlight(id) {
			let actLink = menu.find(options.links + '[href="#'+id+'"]');

			links.removeClass('active');
			actLink
				.addClass('active')
				.closest(options.parrents).find(options.parrentsLinks)
					.addClass('active');

			options.onMenuHighlight.call();
		}

		function setHash(hash) {
			//window.location.hash = hash;
		}

		function hashOnScroll(id) {
			let targ = block.find('#'+id);
			targ.attr('id', '');
			setHash(id);
			setTimeout(() => targ.attr('id',id));
		}
	}

	// Scroll to Anchor
	function scrollToAnchor(id, offs, speed) {
		if ($(id).length) {
			let scrollOffset = offs || 0,
				scrollPos = $(id).offset().top - scrollOffset,
				sp = speed || 500;
			$('html, body').animate({
				scrollTop: scrollPos
			}, sp);
		}
	}

	function guW() {
		if ($('.guide').length) {
			document.documentElement.style.setProperty('--guW', $('.guide').width() + 'px');
		}
	}

	$('.guide').each(function() {
		let guide = $(this),
			guideHeads = guide.find('.guide-menu__link--parent'),
			guidePrevItem = '';

		scrollSpy(guide, {
			scrollOffset: function() {
				let offs = 75;
				if (window.matchMedia('(max-width:1279px)').matches) {
					offs = 103;
				}
				if (window.matchMedia('(max-width:1000px)').matches) {
					offs = 153;
				}
				if (window.matchMedia('(max-width:767px)').matches) {
					offs = 135;
				}
				return offs;
			},
			onMenuHighlight: function() {
				guide.trigger('menu.scroll');
			},
			onInit: function() {
				setTimeout(function() {
					guide.trigger('menu.scroll');
				},700);
			}
		});

		let guideScroll,
			gsInited = false;

		guideScroll = guide.find('.guide__left-scroll').overlayScrollbars({
			scrollbars : {
				clickScrolling : true,
				autoHide: 'leave',
				autoHideDelay: 0,
			}
		}).overlayScrollbars();

		guide.find('.guide-menu__arrow').each(function() {
			let arr = $(this),
				item = arr.closest('.guide-menu__item');

			arr.on('click',function() {
				if (!item.hasClass('opened')) {
					item.addClass('opened');
				} else {
					item.removeClass('opened');
				}
			});
		});

		guide.find('.guide__trigger').on('click',function() {
			let men = $(this).closest('.guide__left');
			if (!men.hasClass('active')) {
				men.addClass('active');
			} else {
				men.removeClass('active');
			}
		});

		guide.find('.guide-menu__link, .guide-menu__sublink').on('click',function() {
			guide.find('.guide__left').removeClass('active');
		});

		let tim = null;
		guide.on('menu.scroll', function() {
			if (!tim) {
				tim = setTimeout(function() {
					guideScroll.scroll({
						el:guide.find('.guide-menu__sublink.active'),
						block : 'center'
					}, 300);

					setTimeout(() => expandActiveItem())
					tim = null;
				},600);
			}
			
			guide.find('.scrollspy-link').removeClass('highlight');

			guide.find('.scrollspy-link.active').last().addClass('highlight');
		});

		guideHeads.on('click',function() {
			if (window.matchMedia('(min-width:1001px)').matches) {
				let item = $(this).closest('.guide-menu__item');

				if (item.hasClass('dt-opened')) {
					if (!item.hasClass('closed')) {
						item.find('.guide-menu__sublist').slideUp(400);
						item.addClass('closed');
					} else {
						item.find('.guide-menu__sublist').slideDown(400);
						item.removeClass('closed');
					}
				}
			}
		});

		guide.find('.guide__left .guide__sum').on('click',function() {
			guide.find('.guide__left').toggleClass('dt-opened');
		});

		$('.guide-head .guide__sum').on('click',function() {
			scrollToAnchor('#guide', 50, 500);
		});

		$(window).on('scroll resize', defineSumBtn);
		
		function expandActiveItem() {
				
			let newActiveItem = guide.find('.guide-menu__link--parent.active').attr('href');
			if (guidePrevItem !== newActiveItem) {
				guide.find('.guide-menu__item').removeClass('dt-opened');
	
				guide.find('.guide-menu__link--parent.active').not('.guide-menu__link--singe').closest('.guide-menu__item')
					.addClass('dt-opened');

					
				if (window.matchMedia('(min-width:1001px)').matches) {
					guide.find('.guide-menu__item').find('.guide-menu__sublist').slideUp(400);

					guide.find('.guide-menu__link--parent.active').not('.guide-menu__link--singe').closest('.guide-menu__item')
						.find('.guide-menu__sublist').slideDown(400);
				}
	
				guidePrevItem = guide.find('.guide-menu__link--parent.active').attr('href');
			}
		}
	});

	function defineSumBtn() {
		let headH = $('.guide-head').outerHeight() + $('.guide-head').offset().top - $('.main-header').outerHeight(),
			scrolled = $(window).scrollTop();

		if (scrolled > headH) {
			$('.guide__left').removeClass('dt--hide-side');
		} else {
			$('.guide__left').addClass('dt--hide-side');
		}
	}

	function storyAnimate() {

		gsap.registerPlugin( ScrollTrigger);
	
		const locoScroll = new LocomotiveScroll({
			el: document.querySelector('.smooth-scroll'),
			smooth: true
		});
	
		locoScroll.on('scroll', ScrollTrigger.update);
		
		ScrollTrigger.scrollerProxy('.smooth-scroll', {
			scrollTop(value) {
				return arguments.length ? locoScroll.scrollTo(value, 0, 0) : locoScroll.scroll.instance.scroll.y;
			},
			getBoundingClientRect() {
				return {
					top: 0,
					left: 0,
					width: window.innerWidth,
					height: window.innerHeight
				};
			},
			pinType: document.querySelector('.smooth-scroll').style.transform ? 'transform' : 'fixed'
		});
	
		locoScroll.on('scroll',function(args) {
			if (args.delta.y > 10) {
				$('#main-header').addClass('main-header_float');
			} else {
				$('#main-header').removeClass('main-header_float');
			}
		});
	
		gsap.to('.story-head__img', {
			scrollTrigger: {
				trigger: '#story-2012',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top bottom',
				end: 'top top',
			},
			translateY: '-200%'
		});
	
		gsap.from('.story-2013__bg2', {
			scrollTrigger: {
				trigger: '#story-2013-bot',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top bottom',
				end: 'top 30%',
			},
			translateX: '100%'
		});
	
		gsap.to('.story-2013__bot', {
			scrollTrigger: {
				trigger: '#story-2013-bot',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top+=40% top',
				end: 'bottom+=200vh top',
			},
			translateX: '30%'
		});
	
		gsap.from('.story-2015__stripes-in', {
			scrollTrigger: {
				trigger: '#story-2015',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top bottom',
				end: 'top -40%',
			},
			translateX: '-80%',
			translateY: '200%'
		});
	
		gsap.to('.story-2015__stripes-in img', {
			scrollTrigger: {
				trigger: '#story-2016',
				scroller: '.smooth-scroll',
				scrub: true,
				start: '+40% bottom',
				end: 'bottom top',
			},
			translateX: '50%'
		});
	
		/*gsap.to('.story-2016__bg-in', {
			scrollTrigger: {
				trigger: '#story-2016-text',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top +50%',
				end: '+300% top',
			},
			translateX: '500px'
		});
	
		gsap.to('.story-2016__text', {
			scrollTrigger: {
				trigger: '#story-2016-text',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top +50%',
				end: '+300% top',
			},
			translateX: '500px'
		});*/
	
		gsap.to('.story-2016__text', {
			scrollTrigger: {
				trigger: '#story-2016-text',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top +50%',
				end: '+300% top',
			},
			translateY: '-100px'
		});
	
		gsap.from('.story-2016__sq-in', {
			scrollTrigger: {
				trigger: '#story-2016',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top bottom',
				end: 'top top',
			},
			translateX: '370px',
			translateY: '500px'
		});
	
		gsap.to('.story-2016__sq', {
			scrollTrigger: {
				trigger: '#story-2017',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top bottom',
				end: 'top top',
			},
			translateX: '-120%'
		});
	
		gsap.from('.story-2016__year', {
			scrollTrigger: {
				trigger: '#story-2016',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top bottom',
				end: 'top top',
			},
			translateX: '50%'
		});
	
		gsap.to('.story-2018__wheel img', {
			scrollTrigger: {
				trigger: '#story-2018-bot',
				scroller: '.smooth-scroll',
				scrub: true,
				start: '+20% bottom',
				end: 'top 50%',
			},
			rotate: '180deg'
		});
	
		gsap.to('.story-2018__wheel img', {
			scrollTrigger: {
				trigger: '#story-2018-bot',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top 50%',
				end: '+20% top',
			},
			translateY: '-150%',
			opacity: 0
		});
	
		gsap.from('.story-2018__inc img', {
			scrollTrigger: {
				trigger: '#story-2018-bot',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top 50%',
				end: '+20% top',
			},
			translateY: '150%',
		});
	
		gsap.from('.story-2019__left-in', {
			scrollTrigger: {
				trigger: '#story-2019',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top bottom',
				end: 'top 30%',
			},
			translateX: '-100%'
		});
	
		gsap.from('.story-2019__bot-bg-in', {
			scrollTrigger: {
				trigger: '#story-2019-bot',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top bottom',
				end: 'top 50%',
			},
			translateX: '-100%',
			onComplete: function(i, o) {
				$('.story-2019__text').addClass('active');
			},
			onStart: function() {
				$('.story-2019__text').removeClass('active');
			}
		});
	
		gsap.from('.story-2019__text-in2', {
			scrollTrigger: {
				trigger: '#story-2019-bot',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top bottom',
				end: 'top 20%',
			},
			translateY: '100%'
		});
	
		gsap.to('.story-2019__360', {
			scrollTrigger: {
				trigger: '#story-2019-text',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top bottom',
				end: 'top 20%',
			},
			translateY: '-40%'
		});
	
		gsap.from('.story-2019__inc', {
			scrollTrigger: {
				trigger: '#story-2019-bot',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top 50%',
				end: '-60% top',
			},
			translateY: '200%',
			onComplete: function(i, o) {
				/*$('.story-2019__inc').removeClass('animated');
				setTimeout(function() {
					$('.story-2019__inc').addClass('animated');
				});*/
			}
		});
	
		gsap.from('.story-2020__year', {
			scrollTrigger: {
				trigger: '#story-2020',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top bottom',
				end: 'top 30%',
			},
			translateX: '-50%',
			onComplete: function() {
				/*$('.story-2020__year, .story-2020__logo').removeClass('animated');
				setTimeout(function() {
					$('.story-2020__year, .story-2020__logo').addClass('animated');
				});*/
			}
		});
	
		gsap.from('.story-2020__logo', {
			scrollTrigger: {
				trigger: '#story-2020',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top bottom',
				end: 'top 30%',
			},
			translateX: '50%'
		});
	
		gsap.from('.story-2020__compass', {
			scrollTrigger: {
				trigger: '#story-2020',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top 50%',
				end: 'top top',
			},
			translateX: '-100%',
			translateY: '100%',
			onComplete: function(i, o) {
				$('.story-2020__compass-in').removeClass('animated');
				setTimeout(function() {
					$('.story-2020__compass-in').addClass('animated');
				});
			}
		});
	
		gsap.from('.story-tod__bg-in', {
			scrollTrigger: {
				trigger: '#story-tod-text',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top bottom',
				end: 'top +60%',
			},
			translateX: '-100%'
		});
	
		gsap.from('.story-tod__img', {
			scrollTrigger: {
				trigger: '#story-tod',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top bottom',
				end: 'top top',
			},
			translateX: '40%',
			translateY: '-80%'
		});
	
		gsap.from('.story-tod__left-in', {
			scrollTrigger: {
				trigger: '#story-tod-bot',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top bottom',
				end: 'top +40%',
			},
			translateX: '-200%',
			translateY: '120%',
		});
	
		gsap.from('.story-tod__right-in', {
			scrollTrigger: {
				trigger: '#story-tod-bot',
				scroller: '.smooth-scroll',
				scrub: true,
				start: 'top bottom',
				end: 'top +50%',
			},
			translateX: '100%',
		});
		
		
		ScrollTrigger.addEventListener('refresh', () => locoScroll.update());
		ScrollTrigger.refresh();
	}
	
	function stW() {
		if ($('.story-head').length) {
			document.documentElement.style.setProperty('--stW', $('.story-head').width() + 'px');
		}
	}

	/*if (device.desktop()) {
		var vidU = $('.story-2020__video-c').attr('data-video-url');
		$('.story-2020__video-c').html('<div class="story-2020__video"><div class="story-2020__video-in"><video autoplay loop muted="" preload="metadata"><source src="'+vidU+'.mp4" type="video/mp4"><source src="'+vidU+'.webm" type="video/webm"><source src="'+vidU+'.ogv" type="video/ogg"></video></div></div>')
	} else {
		var imgU = $('.story-2020__video-c').attr('data-image-url');
		$('.story-2020__video-c').html('<div class="story-2020__video-img"><img src="'+imgU+'" alt="" /></div>')
	}

	if ($('.smooth-scroll').length && window.matchMedia('(min-width:1024px)').matches) {
		storyAnimate();
	}*/

	if ($('.our-story-scroll').length) {
		if (device.desktop()) {
			var vidU = $('.story-2020__video-c').attr('data-video-url');
			$('.story-2020__video-c').html('<div class="story-2020__video"><div class="story-2020__video-in"><video autoplay loop muted="" preload="metadata"><source src="'+vidU+'.mp4" type="video/mp4"><source src="'+vidU+'.webm" type="video/webm"><source src="'+vidU+'.ogv" type="video/ogg"></video></div></div>')
		} else {
			var imgU = $('.story-2020__video-c').attr('data-image-url');
			$('.story-2020__video-c').html('<div class="story-2020__video-img"><img src="'+imgU+'" alt="" /></div>')
		}

		if (window.matchMedia('(min-width:1024px)').matches) {
			storyAnimate();
		}
	}
	
	stW();
	$(window).on('resize',function() {
		guW();
		stW();
	});

	$(window).trigger('resize');
});

$(window).on('load',function() {
	$(window).trigger('resize');
	$('.scrollspy-block').trigger('scrollspy.init');
});
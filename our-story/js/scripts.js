"use strict";

jQuery(function ($) {
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

  $('#clients').readmore({
    speed: 0,
    lessLink: '<a href="#" class="btn clients__button">Hide</a>',
    moreLink: '<a href="#" class="btn clients__button">Show more</a>'
  });
  /* Carousel of ideas */

  $('#insights').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    appendArrows: '#insights-controls',
    appendDots: '#insights-dots',
    swipe: false,
    mobileFirst: true,
    prevArrow: "\n      <button type=\"button\" class=\"slick-prev\">\n        <svg class=\"slick-arrow__icon-pointer\">\n          <use xlink:href=\"images/icons.svg#icon-pointer-arrow\"></use>\n        </svg>\n      </button>\n    ",
    nextArrow: "\n      <button type=\"button\" class=\"slick-next\">\n        <svg class=\"slick-arrow__icon-pointer\">\n          <use xlink:href=\"images/icons.svg#icon-pointer-arrow\"></use>\n        </svg>\n      </button>\n    ",
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
  /* Trimming long text to insight */

  $('.insight__main-text-container').each(function () {
    new Dotdotdot(this, {});
  });
});

function floatingHat() {
  var header = $('#main-header');
  var windowObject = $(window);
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
  var subNavs = $('.sub-links-container');
  var linkContainers = $('.link-container');
  linkContainers.hover(function () {
    if (window.innerWidth > 1279) {
      var currentSubNav = $(this).find('.sub-links-container');
      $(this).addClass('current');
      currentSubNav.stop().fadeIn(300);
    }
  }, function () {
    if (window.innerWidth > 1279) {
      var currentSubNav = $(this).find('.sub-links-container');
      $(this).removeClass('current');
      currentSubNav.stop().fadeOut(300);
    }
  });
  $(window).bind('resize', function () {
    if (window.innerWidth < 1280) {
      return;
    }

    subNavs.removeAttr('style');
    linkContainers.removeClass('current');
  });
}

function mobileNav() {
  var pull = $('#pull');
  var nav = $('#header-nav');
  var body = $('body');
  pull.on('click', function () {
    nav.stop().fadeToggle(300);
    pull.toggleClass('active');
    body.toggleClass('overflow');
  });
  $(window).bind('resize', function () {
    if (window.innerWidth < 1280) {
      return;
    }

    pull.removeClass('active');
    body.removeClass('overflow');
    nav.removeAttr('style');
  });
}

function subNavMobile() {
  var navLinks = $('.link-event');
  var navMainContainer = $('.header__wrapper-nav');
  navLinks.on('click', function (event) {
    if (window.innerWidth < 1280) {
      var linkContainer = $(this).closest('.link-container');
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
  var numbers = $('.solution__number');
  var buttonsContainers = $('.solution__link-container');
  var contentSolutions = $('.solution__content');
  numbers.on('click', function () {
    if (window.innerWidth < 768) {
      var parentContainer = $(this).closest('.solution');
      var solutionContent = parentContainer.find('.solution__content');
      var btnContainer = parentContainer.find('.solution__link-container');
      solutionContent.stop().slideToggle(300, function () {
        parentContainer.toggleClass('opened');
      });
      btnContainer.stop().slideToggle(300);
    }
  });
  $(window).bind('resize', function () {
    if (window.innerWidth > 767) {
      buttonsContainers.removeAttr('style');
      contentSolutions.removeAttr('style');
    }
  });
}

function showViewLinks() {
  var linkPull = $('.link-views');
  var viewPanel = $('#views');
  linkPull.on('click', function (event) {
    if (window.innerWidth > 1279) {
      event.preventDefault();
      viewPanel.stop().slideToggle(300);
    }
  });
  $(window).bind('resize', function () {
    if (window.innerWidth > 1279) {
      return;
    }

    viewPanel.removeAttr('style');
  });
}

function reviewsCarousel() {
  var countMainSlides = $('#reviews-list .reviews__item').length - 1;
  var countSubSlides = $('#reviews-sub-carousel .reviews__sub-carousel-slide').length - 1;
  $('#reviews-list').slick({
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
    prevArrow: "\n      <button type=\"button\" class=\"slick-prev\">\n        <svg class=\"slick-arrow__icon-pointer\">\n          <use xlink:href=\"images/icons.svg#icon-pointer-arrow\"></use>\n        </svg>\n      </button>\n    ",
    nextArrow: "\n      <button type=\"button\" class=\"slick-next\">\n        <svg class=\"slick-arrow__icon-pointer\">\n          <use xlink:href=\"images/icons.svg#icon-pointer-arrow\"></use>\n        </svg>\n      </button>\n    ",
    responsive: [{
      breakpoint: 1279,
      settings: {
        swipe: false
      }
    }]
  });
  $('#reviews-sub-carousel').slick({
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
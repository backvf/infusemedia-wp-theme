jQuery(function ($) {
  /* Dynamically changing the title in the banner of the service page */
  initTypedPlugin();

  /* Our reviews carousel */
  ourReviewsCarousel();
});

function initTypedPlugin() {
  new Typed('#banner-serve-typed', {
    strings: ['marketers', 'demand professionals', 'sales professionals', 'executives', 'agency partners', 'channel partners'],
    typeSpeed: 25,
    startDelay: 0,
    backSpeed: 55,
    loop: true,
    cursorChar: '|'
  });
}

function ourReviewsCarousel() {
  $('#our-reviews-carousel').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    appendArrows: '#our-reviews-arrow',
    appendDots: '#our-reviews-dots',
    swipe: true,
    mobileFirst: true,
    adaptiveHeight: true,
    prevArrow: "\n      <button type=\"button\" class=\"slick-prev\">\n        <svg class=\"slick-arrow__icon-pointer\">\n          <use xlink:href=\"/wp-content/themes/infusemedia/frontend/images/icons.svg#icon-pointer-arrow\"></use>\n        </svg>\n      </button>\n    ",
    nextArrow: "\n      <button type=\"button\" class=\"slick-next\">\n        <svg class=\"slick-arrow__icon-pointer\">\n          <use xlink:href=\"/wp-content/themes/infusemedia/frontend/images/icons.svg#icon-pointer-arrow\"></use>\n        </svg>\n      </button>\n    ",
    responsive: [
      {
        breakpoint: 767,
        settings: {
          appendArrows: '#our-reviews-header',
          adaptiveHeight: false
        }
      },
      {
        breakpoint: 1279,
        settings: {
          slidesToShow: 2,
          appendArrows: '#our-reviews-header',
          adaptiveHeight: false
        }
      }
    ]
  });
}
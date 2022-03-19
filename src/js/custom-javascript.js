jQuery(document).ready(function ($) {
    
    var isMobile = false; //initiate as false
    // device detection
    if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
        || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
        isMobile = true;
            // Remove hover on mobile devices
        function hasTouch() {
            return 'ontouchstart' in document.documentElement
                || navigator.maxTouchPoints > 0
                || navigator.msMaxTouchPoints > 0;
        }

        if (hasTouch()) { // remove all the :hover stylesheets
            try { // prevent exception on browsers not supporting DOM styleSheets properly
            for (var si in document.styleSheets) {
                var styleSheet = document.styleSheets[si];
                if (!styleSheet.rules) continue;

                for (var ri = styleSheet.rules.length - 1; ri >= 0; ri--) {
                if (!styleSheet.rules[ri].selectorText) continue;

                if (styleSheet.rules[ri].selectorText.match(':hover')) {
                    styleSheet.deleteRule(ri);
                }
                }
            }
            } catch (ex) {}
        }
    }

    //Menu

    if(isMobile == true) {
        $('.menu-item-has-children > a').on('click', function() {
            if($(this).hasClass('readyRe')) {
                location.href = this.href;
            } else {
                $('.menu-item-has-children > a').removeClass('readyRe');
                $(this).addClass('readyRe');
            }
        });
    }
    
    //Footer movements

    
    if (window.matchMedia( "(max-width: 767px)" ).matches) {
        $('#copyright-element').appendTo('#mobile-transfer');
        $('#wrapper-footer > div').removeClass('container').addClass('container-fluid');
    }

    window.addEventListener('resize', function() {
        if (window.matchMedia( "(max-width: 767px)" ).matches) {
            $('#copyright-element').appendTo('#mobile-transfer');
            $('#wrapper-footer > div').removeClass('container').addClass('container-fluid');
        } else {
            $('#copyright-element').appendTo('#desktop-transfer');
            $('#wrapper-footer > div').removeClass('container-fluid').addClass('container');
        }
    });


    if($('.description-row-second').length) {
        var x = '';
        new ResizeSensor($('.description-row-second'), function(){
                x = $('.description-row-second').css('padding-left');
                $('.column-fix-pad').css('padding-left', x);
        });
        window.addEventListener('resize', function() {
            $('.column-fix-pad').css('padding-left', x);
        });
    }
    if($('.special-fix-pad').length) {
        var x = '';
        new ResizeSensor($('.header-row'), function(){
                x = $('.header-row').css('padding-left');
                $('.special-fix-pad').css('padding-left', x);
        });
        window.addEventListener('resize', function() {
            $('.special-fix-pad').css('padding-left', x);
        });
    }

    // alignment right
    if($('.special-fix-pad-right').length) {
        var x = '';
        new ResizeSensor($('.header-row-right'), function(){
                x = $('.header-row-right').css('padding-right');
                $('.special-fix-pad-right').css('padding-right', x);
        });
        window.addEventListener('resize', function() {
            $('.special-fix-pad-right').css('padding-right', x);
        });
    }
    // end of alignment right
    
    if($('#infusemedia-modal-video').length) {
        $('#infusemedia-modal-video').appendTo("body");
        $('#infusemedia-modal-video').on('shown.bs.modal', function () {
            $('#infusemedia-modal-video video')[0].play();
        });
        $('#infusemedia-modal-video').on('hidden.bs.modal', function () {
            $('#infusemedia-modal-video video')[0].pause();
        });
    }

    // Insights page slider init
    if($('.insights-slider').length) {
        $('.insights-slider').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            infinite: true,
            dots: true,
            prevArrow: jQuery('.slick-prev-btn'),
            nextArrow: jQuery('.slick-next-btn'),
            appendDots: '.custom-dots',
            //initialSlide: 1,
        }).on({
            beforeChange: function(event, slick, currentSlide, nextSlide) {
                // $('.insights-slider-wrapper').removeClass('slide' + (currentSlide + 1) + '-current').addClass('slide' + (nextSlide + 1) + '-current');
                $('.super-slide-' + (currentSlide)).fadeOut('slow');
                $('.super-slide-' + (nextSlide)).fadeIn('slow');
            }
        });
    }

    // Insights Article slider init
    function equalHeight($param) {
        var maxHeight = 0;
    
        $param.each(function(){
            var thisH = $(this).height();
            if (thisH > maxHeight) { maxHeight = thisH; }
        });
    
        $param.height(maxHeight);
    } /* end equalHeight function */

    if($('.insights-article .related-insights').children().length > 3) {
        if($('.insights-article .related-insights').length) {
            $('.related-insights').slick({
                autoplay: true,
                autoplaySpeed: 5000,
                infinite: true,
                dots: true,  
                slidesToShow: 4,
                slidesToScroll: 1,
                prevArrow: jQuery('.slick-prev-btn'),
                nextArrow: jQuery('.slick-next-btn'),
                appendDots: '.custom-dots-insights',
                // initialSlide: 1,
                responsive: [
                    {
                      breakpoint: 1024,
                      settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                      }
                    },
                    {
                      breakpoint: 991,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                      }
                    },
                    {
                      breakpoint: 767,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                      }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                  ]
            })
            equalHeight($('.insight-post'));
            if($('.slick-dots').find('li').length < 2){
                $('.dots-container').hide();
            }
        }
    } else {
        $('.insights-article .section_ri .dots-container').hide();
        $('.insights-article .related-insights.row').attr('style', 'justify-content: center;')
    }
    window.addEventListener('resize', function() {
        if($('.insights-article .related-insights').children().length > 3) {
            if($('.insights-article .related-insights').length) {
                equalHeight($('.insight-post'));
                if($('.slick-dots').find('li').length < 2){
                    $('.dots-container').hide();
                } else {
                    $('.dots-container').show();
                }
            }
        }
    });

    if( !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        $('li.dropdown').on('click', function() {
            var $el = $(this);
            if ($el.hasClass('show')) {
                var $a = $el.children('a.dropdown-toggle');
                if ($a.length && $a.attr('href')) {
                    location.href = $a.attr('href');
                }
            }
        });
    }

    if ($('#upload-cv')[0]) {
        $('#upload-cv').change(function () {
          var file = $('#upload-cv').val();
    
          if (file) {
            console.log(file);
    
            if (file.substring(3, 11) == 'fakepath') {
              file = file.substring(12);
            }
    
            $('#upload-cv-label').html(file); 
          }
        });
        var wpcf7Elm = document.querySelector('.wpcf7');
        wpcf7Elm.addEventListener('wpcf7mailsent', function (event) {
          $('#upload-cv-label').html('Send CV (pdf, doc, docx)');
        }, false);
        wpcf7Elm.addEventListener('wpcf7invalid', function (event) {
          if ($('#upload-cv').hasClass('wpcf7-not-valid')) {
            $('#upload-cv-label').addClass('wpcf7-not-valid');
          } else {
            $('#upload-cv-label').removeClass('wpcf7-not-valid');
          }
        }, false);
      }
      window.addEventListener('message', event => {
        if(event.data.type === 'hsFormCallback' && event.data.eventName === 'onFormReady') {
            // the form is ready to manipulate!
            if ($('input[id^="upload_cv"]')[0]) {
                $('input[type="file"]').change(function(e){
                    var fileName = e.target.files[0].name;
                    $('.hs_upload_cv label span:first-child').html(fileName); 
                });
            }
        }

        function onElementInserted(containerSelector, elementSelector, callback) {

            var onMutationsObserved = function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.addedNodes.length) {
                        var elements = $(mutation.addedNodes).find(elementSelector);
                        for (var i = 0, len = elements.length; i < len; i++) {
                            callback(elements[i]);
                        }
                    }
                });
            };
        
            var target = $(containerSelector)[0];
            var config = { childList: true, subtree: true };
            var MutationObserver = window.MutationObserver || window.WebKitMutationObserver;
            var observer = new MutationObserver(onMutationsObserved);    
            observer.observe(target, config);
        
        }
        
        onElementInserted('body', 'ul.hs-error-msgs', function(element) {
            $('.hs_upload_cv label').addClass('invalid error');
        });

     });

});


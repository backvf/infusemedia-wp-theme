
jQuery( document ).ready(function() {
    jQuery(".insights-filters .searchsettings").appendTo(".insights-filters .search-filter-options-inner");

    jQuery( ".search-filter-header" ).click(function() {
        var toggle = jQuery(this);
        jQuery(this).parent().find('.search-filter-options').slideToggle( "fast", function() {
            toggle.toggleClass('open').toggleClass('closed');
        });
    });
    jQuery( ".asp_filter_generic > legend" ).each(function(index) {
        jQuery(this).append('<input class="filter_toogle_all_generic" name="filter_toogle_all_generic_'+index+'" id="filter_toogle_all_generic_'+index+'" type="checkbox" checked="checked" ><label for="filter_toogle_all_generic_'+index+'"></label>');
    });

    jQuery(document).on("change",".filter_toogle_all_generic",function() {
        var value = jQuery(this).is(':checked');
        jQuery(this).closest('.asp_filter_generic').find('.asp_option input[type="checkbox"]').prop('checked', value);
        var settingEl = $(this).closest('.searchsettings');
        var id = settingEl.data('id');
        ASP.api(id, "searchFor", jQuery('#ajaxsearchpro'+id+'_1 .orig').val());
    });

    jQuery( ".header__nav-link-search, .header__search" ).click(function(e) {
        e.preventDefault();
        jQuery('.main-search').slideToggle( "fast");
        jQuery(this).toggleClass('active');
        jQuery('#search-overlay').toggle();
        if (!jQuery(this).hasClass('active')) {
            ASP.api(2, "closeResults");
        }
        return false;
    });

    positioMainSearchSettings();

    jQuery( "#search-overlay" ).click(function() {
        hideMainSearch();
    });

    jQuery( ".header__nav-item.has-children" ).hover(function() {
        hideMainSearch();
    });
});

jQuery(window).on("resize", function () {
    var input = jQuery('.ajaxsearchpro input[type="search"]');
    if (jQuery(window).width() < 500 ) {
        input.attr("placeholder","Search by keyword");
    }
    else { input.attr("placeholder","Search by keyword, article title, category, etc.");}
}).resize();

jQuery(window).on("resize", function () {
    positioMainSearchSettings();
});

jQuery(window).scroll(function() {
    hideMainSearch();
});

function hideMainSearch() {
    jQuery('.main-search').hide();
    jQuery('.header__nav-link-search').removeClass('active');
    jQuery('#search-overlay').hide();
    ASP.api(2, "closeResults");
}

function positioMainSearchSettings() {
    var mainSearchSettings = jQuery(".main-header .searchsettings");
    if (jQuery(window).width() < 1280 ) {
        if (!mainSearchSettings.length) {
            mainSearchSettings = jQuery("#ajaxsearchprores2_1 .searchsettings");
        }
        if (mainSearchSettings.length) {
            mainSearchSettings.appendTo(".main-header .search-filter-options-inner");
        }
    }
    else {
        if (!mainSearchSettings.length) {
            mainSearchSettings = jQuery(".main-header .search-filter-options-inner .searchsettings");
        }
        if (mainSearchSettings.length) {
            mainSearchSettings.appendTo("#ajaxsearchprores2_1");
        }
    }
}

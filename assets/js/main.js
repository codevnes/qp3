jQuery(document).ready(function() {

    /* Backtop
     ---------------------------------------------------------------*/
    jQuery(window).scroll(function(){jQuery(this).scrollTop()>1000?jQuery("#back-top").fadeIn(100):jQuery("#back-top").fadeOut(100)}),jQuery("#back-top").click(function(){return jQuery("body,html").animate({scrollTop:0},1200),!1});
    /* Mobile Menu
     ---------------------------------------------------------------*/

    jQuery('body').on('click', '#showmenu', function() {
        jQuery(this).toggleClass('active');
        jQuery('body').toggleClass('nav-is-toggled');
        jQuery('.panel-overlay').toggleClass('active');
        jQuery('.btn-close').toggleClass('active');
    });
    jQuery('body').on('click', '.btn-close,.panel-overlay', function() {
        jQuery('body').toggleClass('nav-is-toggled');
        jQuery(this).removeClass('active');
        jQuery('.panel-overlay').removeClass('active');
        jQuery('.btn-close').removeClass('active');
        jQuery('#showmenu').removeClass('active');
    });

    jQuery("#mobilenav ul.sub-menu,.widget_nav_menu ul.sub-menu").before('<span class="arrow"> <i class="icon-angle-down"></i> </span>');

    jQuery("body").on('click', '.arrow', function() {
        if (jQuery(this).parent('li').hasClass('open')) {
            jQuery(this).parent('li').find('ul.sub-menu').slideUp("normal");
            jQuery(this).parent('li').removeClass('open');
        } else {
            jQuery(this).parent('li').addClass('open').find('ul.sub-menu').first().slideToggle("normal");
        }
    });
    jQuery("body").on('click', '#mobilenav .mobile-menu > li.open > .arrow,.widget_nav_menu ul.menu > li.open > .arrow', function() {
        jQuery('#mobilenav .mobile-menu li,.widget_nav_menu ul.menu li').removeClass('open');
        jQuery('#mobilenav .mobile-menu li,.widget_nav_menu ul.menu li').find('ul.sub-menu').slideUp('normal');
    });


    /* Widget Toggle
     ---------------------------------------------------------------*/
    jQuery(window).load(function() {
        jQuery('.widget_nav_menu .current-menu-ancestor').addClass('open');
        jQuery('.widget_nav_menu .current-menu-ancestor.open > .sub-menu').slideToggle("normal");
    });

    if( jQuery(window).width() < 1100 ) {
        var fixmeTop = jQuery('.site-header').offset().top;
        jQuery(window).bind('scroll', function() {
            var currentScroll = jQuery(window).scrollTop();
            if (currentScroll > fixmeTop) {
                jQuery('.site-header').addClass('fixed')
            } else {
                jQuery('.site-header').removeClass('fixed');
            }
        });
    }

});

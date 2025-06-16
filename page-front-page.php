<?php
/**
 * Template Name: Trang chủ
 *
 * @package QP3
 */

get_header();
?>

<div id="fullpage">
    <ul id="menu">
        <li data-menuanchor="anchor-video" class="active"><a href="#anchor-video"><span class="menu-nb">01</span><span
                    class="menu-tt"> QP GREEN PARK </span></a></li>
        <li data-menuanchor="anchor-about"><a href="#anchor-about"><span class="menu-nb">02</span><span class="menu-tt">
                    Giới thiệu </span></a></li>
        <li data-menuanchor="anchor-product"><a href="#anchor-product"><span class="menu-nb">03</span><span
                    class="menu-tt"> Sản phẩm </span></a></li>
        <li data-menuanchor="anchor-location"><a href="#anchor-location"><span class="menu-nb">04</span><span class="menu-tt">
                    Vị trí </span></a></li>
        <li data-menuanchor="anchor-media"><a href="#anchor-media"><span class="menu-nb">05</span><span class="menu-tt">
                    Thư viện </span></a></li>
        <li data-menuanchor="anchor-news"><a href="#anchor-news"><span class="menu-nb">06</span><span class="menu-tt">
                    Tin tức </span></a></li>
        <li data-menuanchor="anchor-contact"><a href="#anchor-contact"><span class="menu-nb">07</span><span
                    class="menu-tt"> Liên hệ </span></a></li>
    </ul>

    <?php get_template_part('template-parts/home/section', 'video'); ?>
    <?php get_template_part('template-parts/home/section', 'about'); ?>
    <?php get_template_part('template-parts/home/section', 'products'); ?>
    <?php get_template_part('template-parts/home/section', 'location'); ?>
    <?php get_template_part('template-parts/home/section', 'media'); ?>
    <?php get_template_part('template-parts/home/section', 'news'); ?>
    <?php get_template_part('template-parts/home/section', 'contact'); ?>
</div>
<script>
    jQuery(document).ready(function () {
        if (jQuery(window).width() > 1089) {
            var myFullpage = new fullpage('#fullpage', {
                verticalCentered: true,
                anchors: ['anchor-video', 'anchor-about', 'anchor-product', 'anchor-location', 'anchor-media', 'anchor-news', 'anchor-contact'],
                lazyLoad: true,
                // licenseKey: 'OPEN-SOURCE-GPLV3-LICENSE',
                lockAnchors: false,
                slidesNavigation: false,
                controlArrows: false,
                normalScrollElements: '.mobilenav__inner',
                css3: true,
                navigation: false,
                menu: '#menu',
                onLeave: function (origin, destination, direction) {
                    //using index
                    if (destination.index == 0) {
                        var heading = jQuery('#video .heading span').text();
                        jQuery('#callbacks').text(heading);
                    } else if (destination.index == 1) {
                        var heading = jQuery('#intro .heading span').text();
                        jQuery('#callbacks').text(heading);
                    } else if (destination.index == 2) {
                        var heading = jQuery('#product .heading span').text();
                        jQuery('#callbacks').text('Sản phẩm');
                    } else if (destination.index == 3) {
                        var heading = jQuery('#location .heading span').text();
                        jQuery('#callbacks').text('Vị trí');
                    } else if (destination.index == 4) {
                        var heading = jQuery('#media .heading span').text();
                        jQuery('#callbacks').text(heading);
                    } else if (destination.index == 5) {
                        var heading = jQuery('#news .heading span').text();
                        jQuery('#callbacks').text(heading);
                    } else if (destination.index == 6) {
                        var heading = jQuery('#contact .heading span').text();
                        jQuery('#callbacks').text(heading);
                    } else {
                        var heading = jQuery('#video .heading span').text();
                        jQuery('#callbacks').text(heading);
                    }
                },
            });
        }

    });
</script>
<?php get_footer(); ?>
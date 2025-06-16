<?php
/**
 * Template Name: Trang vị trí
 *
 * @package QP3
 */

get_header();
?>

<div id="fullpage">
    <ul id="menu">
            <li data-menuanchor="anchor-location"><a href="#anchor-location"><span class="menu-nb">1</span><span
                        class="menu-tt">
                        Vị trí </span></a>
            </li>
            <li data-menuanchor="anchor-location-link"><a href="#anchor-location-link"><span class="menu-nb">2</span><span
                    class="menu-tt">
                    Liên kết vùng </span></a>
        </li>
    </ul>

    <?php get_template_part('template-parts/home/section', 'location'); ?>
    <?php get_template_part('template-parts/section/section', 'location-link'); ?>
</div>
<script>
    jQuery(document).ready(function () {
        if (jQuery(window).width() > 1089) {
            var myFullpage = new fullpage('#fullpage', {
                verticalCentered: true,
                anchors: ['anchor-location', 'anchor-location-link'],
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
                        var heading = jQuery('#location .heading span').text();
                        jQuery('#callbacks').text('Vị trí');
                    } else if (destination.index == 1) {
                        var heading = jQuery('#location-link .heading span').text();
                        jQuery('#callbacks').text(heading);
                    } else {
                        var heading = jQuery('#location .heading span').text();
                        jQuery('#callbacks').text(heading);
                    }
                },
            });
        }

    });
</script>
<?php get_footer(); ?>
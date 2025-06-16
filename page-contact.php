<?php
/**
 * Template Name: Trang liên hệ
 *
 * @package QP3
 */

get_header();
?>

<div id="fullpage">
    <ul id="menu">
        <li data-menuanchor="anchor-contact"><a href="#anchor-contact"><span class="menu-nb">07</span><span
                    class="menu-tt"> Liên hệ </span></a></li>
    </ul>

    <?php get_template_part('template-parts/home/section', 'contact'); ?>
</div>
<script>
    jQuery(document).ready(function () {
        if (jQuery(window).width() > 1089) {
            var myFullpage = new fullpage('#fullpage', {
                verticalCentered: true,
                anchors: ['anchor-contact'],
                lazyLoad: true,
                // licenseKey: 'OPEN-SOURCE-GPLV3-LICENSE',
                lockAnchors: false,
                slidesNavigation: false,
                controlArrows: false,
                normalScrollElements: '.mobilenav__inner',
                css3: true,
                navigation: false,
                menu: '#menu'
            });
        }

    });
</script>
<?php get_footer(); ?>
<?php
/**
 * Template Name: Trang thư viện
 *
 * @package QP3
 */

// Enqueue Swiper JS and CSS files
wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), '1.0.0');
wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), '1.0.0', true);
wp_enqueue_script('gallery-swiper-js', get_template_directory_uri() . '/assets/js/gallery-swiper.js', array('jquery', 'swiper-js'), '1.0.0', true);

get_header();
?>

<div id="fullpage">
    <ul id="menu">
        <li data-menuanchor="anchor-contact"><a href="#anchor-contact">
                <span class="menu-nb">01</span>
                <span class="menu-tt"> Thư viện ảnh </span></a></li>
    </ul>

    <?php get_template_part('template-parts/section/section', 'images'); ?>
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
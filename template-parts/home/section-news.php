<?php
/**
 * Template part for displaying the news section on the front page
 *
 * @package QP3
 */
?>

<section class="section section-news news" id="news" data-anchor="anchor-news">
    <div class="container">
        <div class="news__wrapper">
            <h2 class="news__heading heading d-lx-none"><span>Tin tức</span></h2>
            
            <div class="news__tabs">
                <ul class="news__tabs-list">
                    <?php
                    // Get categories with posts
                    $categories = get_categories(array(
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'hide_empty' => true,
                    ));
                    
                    // Skip "Uncategorized" if it exists
                    $first = true;
                    foreach ($categories as $category) :
                        if ($category->slug === 'uncategorized') continue;
                    ?>
                        <li class="news__tabs-item">
                            <a class="news__tabs-link <?php echo $first ? 'news__tabs-link--active' : ''; ?>" data-tab="<?php echo esc_attr($category->slug); ?>">
                                <span><?php echo esc_html($category->name); ?></span>
                            </a>
                        </li>
                    <?php 
                        $first = false;
                    endforeach; ?>
                </ul>
                
                <div class="news__content">
                    <?php 
                    $first = true;
                    foreach ($categories as $category) :
                        if ($category->slug === 'uncategorized') continue;
                    ?>
                    <div id="tab-<?php echo esc_attr($category->slug); ?>" class="news__content-tab <?php echo $first ? 'news__content-tab--active' : ''; ?>">
                        <h2 class="news__content-heading d-sm-none"><span><?php echo esc_html($category->name); ?></span></h2>
                        <div class="news__slider swiper">
                            <div class="news__slider-wrapper swiper-wrapper">
                                <?php
                                $cat_args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 9,
                                    'cat' => $category->term_id,
                                );
                                $cat_query = new WP_Query($cat_args);
                                
                                if ($cat_query->have_posts()) :
                                    while ($cat_query->have_posts()) : $cat_query->the_post();
                                ?>
                                <div class="news__slide swiper-slide">
                                    <article class="news__card">
                                        <div class="news__card-inner" data-post-id="<?php the_ID(); ?>">
                                            <div class="news__card-media">
                                                <a class="news__card-img-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>)"></a>
                                            </div>
                                            <div class="news__card-content">
                                                <div class="news__card-meta">
                                                    <span class="news__card-date"><?php echo get_the_date('d/m/Y'); ?></span>
                                                </div>
                                                <h3 class="news__card-title">
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                                </h3>
                                                <div class="news__card-action">
                                                    <a href="<?php the_permalink(); ?>" class="news__card-link" title="<?php the_title_attribute(); ?>">Xem thêm <i class="fas fa-angle-double-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                            </div>
                            <div class="news__slider-nav">
                                <div class="news__slider-button news__slider-button--prev"><i class="fas fa-chevron-left"></i></div>
                                <div class="news__slider-button news__slider-button--next"><i class="fas fa-chevron-right"></i></div>
                            </div>
                            <div class="news__slider-pagination swiper-pagination"></div>
                        </div>
                    </div>
                    <?php 
                        $first = false;
                    endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section> 
<?php
/**
 * Template part for displaying market news posts on the front page
 *
 * @package QP3
 */
?>

<div class="list-posts swiper-container">
    <div class="box-button">
        <div class="box-button-inner">
            <div class="swiper-button swiper-prev"><i class="fas fa-chevron-left"></i></div>
            <div class="swiper-button swiper-next"><i class="fas fa-chevron-right"></i></div>
        </div>
    </div>
    <div class="swiper-wrapper blog-shortcode style-4">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 9,
            'category_name' => 'tin-thi-truong',
        );
        $news_query = new WP_Query($args);
        
        if ($news_query->have_posts()) :
            while ($news_query->have_posts()) : $news_query->the_post();
        ?>
        <div class="swiper-item swiper-slide">
            <article id="post-<?php the_ID(); ?>" class="post-item element hentry post-news post-<?php the_ID(); ?> post type-post status-publish format-standard has-post-thumbnail">
                <div class="post-info" data-idpost="<?php the_ID(); ?>">
                    <div class="post-info__thumb">
                        <a class="d-block img" title="<?php the_title_attribute(); ?>" style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>)"></a>
                    </div>
                    <div class="post-info__content">
                        <div class="post-info__meta">
                            <span class="date-time"><?php echo get_the_date('d/m/Y'); ?></span>
                        </div>
                        <h3 class="post-info__title">
                            <a title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="post-info__link">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Xem thêm <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
        <!-- Default market news items if none are available -->
        <div class="swiper-item swiper-slide">
            <article id="post-73" class="post-item element hentry post-news post-73 post type-post status-publish format-standard has-post-thumbnail category-tin-thi-truong">
                <div class="post-info" data-idpost="73">
                    <div class="post-info__thumb"><a class="d-block img" title="Đất nền Di Linh &#8211; Lâm Đồng: Xây dựng hạ tầng và phát triển tiề&#8230;" style="background-image:url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/uploads/2022/03/img-news-3.jpg)"></a>
                    </div>
                    <div class="post-info__content">
                        <div class="post-info__meta"><span class="date-time">06/07/2022</span>
                        </div>
                        <h3 class="post-info__title"><a title="Đất nền Di Linh &#8211; Lâm Đồng: Xây dựng hạ tầng và phát triển tiề&#8230;">Đất nền Di Linh &#8211; Lâm Đồng: Xây dựng hạ tầng và phát triển tiề&#8230;</a>
                        </h3>
                        <div class="post-info__link"><a title="Đất nền Di Linh &#8211; Lâm Đồng: Xây dựng hạ tầng và phát triển tiề&#8230;">Xem thêm <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <div class="swiper-item swiper-slide">
            <article id="post-74" class="post-item element hentry post-news post-74 post type-post status-publish format-standard has-post-thumbnail category-tin-phuong-dong category-tin-thi-truong">
                <div class="post-info" data-idpost="74">
                    <div class="post-info__thumb"><a class="d-block img" title="Chính sách ưu đãi tại Central Lake Di Linh" style="background-image:url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/uploads/2022/03/img-news-4.jpg)"></a>
                    </div>
                    <div class="post-info__content">
                        <div class="post-info__meta"><span class="date-time">06/07/2022</span>
                        </div>
                        <h3 class="post-info__title"><a title="Chính sách ưu đãi tại Central Lake Di Linh">Chính sách ưu đãi tại Central Lake Di Linh</a>
                        </h3>
                        <div class="post-info__link"><a title="Chính sách ưu đãi tại Central Lake Di Linh">Xem thêm <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <?php endif; ?>
    </div>
    <div class="swiper-pagination"></div>
</div> 
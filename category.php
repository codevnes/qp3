<?php
/**
 * The template for displaying category pages
 *
 * @package QP3
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="category container">
        <div class="category__header">
            <div class="container">
                <div class="category__header-content">
                    <h1 class="category__title"><?php single_cat_title(); ?></h1>
                    <?php if (category_description()) : ?>
                        <div class="category__description">
                            <?php echo category_description(); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="category__meta">
                        <div class="category__post-count">
                            <i class="fa-solid fa-newspaper"></i>
                            <?php printf(
                                _n('%s bài viết', '%s bài viết', get_queried_object()->count, 'qp3'),
                                number_format_i18n(get_queried_object()->count)
                            ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="category__filters">
            <div class="container">
                <div class="category__filters-content">
                    <div class="category__filter-group">
                        <span class="category__filter-label">Sắp xếp theo:</span>
                        <div class="category__filter-options">
                            <a href="<?php echo add_query_arg('orderby', 'date', get_category_link(get_queried_object_id())); ?>" class="category__filter-option <?php echo (!isset($_GET['orderby']) || $_GET['orderby'] == 'date') ? 'category__filter-option--active' : ''; ?>">
                                <i class="fa-solid fa-calendar-days"></i> Mới nhất
                            </a>
                            <a href="<?php echo add_query_arg('orderby', 'title', get_category_link(get_queried_object_id())); ?>" class="category__filter-option <?php echo (isset($_GET['orderby']) && $_GET['orderby'] == 'title') ? 'category__filter-option--active' : ''; ?>">
                                <i class="fa-solid fa-arrow-down-a-z"></i> Tiêu đề
                            </a>
                            <a href="<?php echo add_query_arg('orderby', 'comment_count', get_category_link(get_queried_object_id())); ?>" class="category__filter-option <?php echo (isset($_GET['orderby']) && $_GET['orderby'] == 'comment_count') ? 'category__filter-option--active' : ''; ?>">
                                <i class="fa-solid fa-comments"></i> Bình luận
                            </a>
                        </div>
                    </div>
                    
                    <div class="category__view-toggle">
                        <button class="category__view-button category__view-button--grid category__view-button--active" data-view="grid">
                            <i class="fa-solid fa-grid-2"></i>
                        </button>
                        <button class="category__view-button category__view-button--list" data-view="list">
                            <i class="fa-solid fa-list"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="category__content">
            <div class="container">
                <div class="category__posts category__posts--grid">
                    <?php if (have_posts()) : ?>
                        <?php
                        // Custom query to handle ordering
                        $orderby = isset($_GET['orderby']) ? sanitize_text_field($_GET['orderby']) : 'date';
                        $order = 'date' === $orderby ? 'DESC' : ('title' === $orderby ? 'ASC' : 'DESC');
                        
                        $args = array(
                            'cat' => get_queried_object_id(),
                            'orderby' => $orderby,
                            'order' => $order,
                            'posts_per_page' => 12,
                            'paged' => get_query_var('paged') ? get_query_var('paged') : 1
                        );
                        
                        $category_query = new WP_Query($args);
                        
                        while ($category_query->have_posts()) :
                            $category_query->the_post();
                            
                            // Get post date components
                            $date_number = get_the_date('d');
                            $date_month_year = get_the_date('.m.Y');
                        ?>
                            <article class="category__post">
                                <div class="category__post-inner">
                                    <div class="category__post-image">
                                        <a href="<?php the_permalink(); ?>" class="category__post-image-link">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('medium_large', array('class' => 'category__post-img')); ?>
                                            <?php else : ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.jpg" alt="<?php the_title_attribute(); ?>" class="category__post-img">
                                            <?php endif; ?>
                                        </a>
                                        <div class="category__post-date">
                                            <span class="category__post-date-number"><?php echo $date_number; ?></span>
                                            <span class="category__post-date-month-year"><?php echo $date_month_year; ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="category__post-content">
                                        <div class="category__post-meta">
                                            <?php
                                            $categories = get_the_category();
                                            if (!empty($categories)) :
                                                $category = $categories[0];
                                            ?>
                                                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="category__post-category">
                                                    <i class="fa-solid fa-folder"></i> <?php echo esc_html($category->name); ?>
                                                </a>
                                            <?php endif; ?>
                                            
                                            <div class="category__post-comments">
                                                <i class="fa-solid fa-comments"></i> <?php comments_number('0', '1', '%'); ?>
                                            </div>
                                        </div>
                                        
                                        <h2 class="category__post-title">
                                            <a href="<?php the_permalink(); ?>" class="category__post-title-link">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                        
                                        <div class="category__post-excerpt">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        
                                        <a href="<?php the_permalink(); ?>" class="category__post-read-more">
                                            Đọc tiếp <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile; ?>
                        
                        <?php wp_reset_postdata(); ?>
                        
                        <div class="category__pagination">
                            <?php
                            echo paginate_links(array(
                                'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                                'format' => '?paged=%#%',
                                'current' => max(1, get_query_var('paged')),
                                'total' => $category_query->max_num_pages,
                                'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
                                'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
                            ));
                            ?>
                        </div>
                    <?php else : ?>
                        <div class="category__no-posts">
                            <div class="category__no-posts-icon">
                                <i class="fa-solid fa-face-frown"></i>
                            </div>
                            <h2 class="category__no-posts-title">Không tìm thấy bài viết</h2>
                            <p class="category__no-posts-text">Không có bài viết nào trong danh mục này. Vui lòng thử lại sau.</p>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="category__no-posts-button">Quay lại trang chủ</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?> 
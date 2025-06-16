<?php
/**
 * The template for displaying single posts
 */

get_header();
?>

<main id="primary" class="site-main">
    <article class="blog">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <!-- Categories Header -->
            <div class="container">
                <div class="blog__categories-header">
                    <ul class="blog__categories-header-list">
                        <?php
                        $categories = get_categories();
                        foreach ($categories as $category) {
                            $active_class = has_category($category->term_id) ? 'blog__categories-header-link--active' : '';
                            echo '<li class="blog__categories-header-item"><a href="' . get_category_link($category->term_id) . '" class="blog__categories-header-link ' . $active_class . '">' . $category->name . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            
            <!-- Blog Content -->
            <div class="container">
                <div class="blog__container">
                    <h1 class="blog__title"><?php the_title(); ?></h1>
                    
                    <div class="blog__meta">
                        <div class="blog__categories">
                            <?php
                            $post_categories = get_the_category();
                            $cats = array();
                            foreach ($post_categories as $cat) {
                                $cats[] = '<a href="' . get_category_link($cat->term_id) . '" class="blog__categories-link">' . $cat->name . '</a>';
                            }
                            echo implode(', ', $cats);
                            ?>
                        </div>
                        <div class="blog__date"><?php echo get_the_date(); ?></div>
                        
                        <?php if(function_exists('get_field') && get_field('author')) : ?>
                        <div class="blog__author">
                            <i class="fa-solid fa-user"></i> <?php echo get_field('author'); ?>
                        </div>
                        <?php endif; ?>
                        
                        <div class="blog__comments-count">
                            <i class="fa-solid fa-comments"></i> <?php comments_number('0 bình luận', '1 bình luận', '% bình luận'); ?>
                        </div>
                    </div>
                    
                    <?php if(has_post_thumbnail()) : ?>
                    <div class="blog__featured-image d-none">
                        <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="blog__content">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php 
                    // Display tags if they exist
                    $tags = get_the_tags();
                    if($tags) : 
                    ?>
                    <div class="blog__tags">
                        <i class="fa-solid fa-tags"></i>
                        <?php 
                        foreach($tags as $tag) {
                            echo '<a href="' . get_tag_link($tag->term_id) . '" class="blog__tags-link">' . $tag->name . '</a>';
                        }
                        ?>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Social Share -->
                    <div class="blog__social-share">
                        <span class="blog__social-share-text"><i class="fa-solid fa-share-nodes"></i> Chia sẻ:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="blog__social-share-link blog__social-share-link--facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="blog__social-share-link blog__social-share-link--twitter">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="blog__social-share-link blog__social-share-link--linkedin">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                        <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>" class="blog__social-share-link blog__social-share-link--email">
                            <i class="fa-solid fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            
        <?php endwhile; endif; ?>
    </article>
    
    <!-- Related Posts Section -->
    <section class="related-posts__section">
        <div class="container">
            <h2 class="related-posts__title">TIN LIÊN QUAN</h2>
            
            <div class="related-posts__grid">
                <?php
                $categories = get_the_category(get_the_ID());
                if ($categories) {
                    $category_ids = array();
                    foreach ($categories as $category) {
                        $category_ids[] = $category->term_id;
                    }
                    
                    $args = array(
                        'category__in' => $category_ids,
                        'post__not_in' => array(get_the_ID()),
                        'posts_per_page' => 3,
                        'ignore_sticky_posts' => 1
                    );
                    
                    $related_query = new WP_Query($args);
                    
                    if ($related_query->have_posts()) {
                        while ($related_query->have_posts()) {
                            $related_query->the_post();
                            
                            // Get post date components
                            $date_number = get_the_date('d');
                            $date_month_year = get_the_date('.m.Y');
                            ?>
                            
                            <article class="related-posts__item">
                                <div class="related-posts__image">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium_large'); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.jpg" alt="<?php the_title_attribute(); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="related-posts__content">
                                    <h3 class="related-posts__item-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="related-posts__date">
                                        <span class="related-posts__date-number"><?php echo $date_number; ?></span>
                                        <span class="related-posts__date-month-year"><?php echo $date_month_year; ?></span>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="related-posts__read-more">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </article>
                            
                            <?php
                        }
                        wp_reset_postdata();
                    } else {
                        // If no related posts based on category, show recent posts
                        $args = array(
                            'post__not_in' => array(get_the_ID()),
                            'posts_per_page' => 3,
                            'ignore_sticky_posts' => 1
                        );
                        
                        $recent_query = new WP_Query($args);
                        
                        if ($recent_query->have_posts()) {
                            while ($recent_query->have_posts()) {
                                $recent_query->the_post();
                                
                                // Get post date components
                                $date_number = get_the_date('d');
                                $date_month_year = get_the_date('.m.Y');
                                ?>
                                
                                <article class="related-posts__item">
                                    <div class="related-posts__image">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('medium_large'); ?>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.jpg" alt="<?php the_title_attribute(); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="related-posts__content">
                                        <h3 class="related-posts__item-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <div class="related-posts__date">
                                            <span class="related-posts__date-number"><?php echo $date_number; ?></span>
                                            <span class="related-posts__date-month-year"><?php echo $date_month_year; ?></span>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="related-posts__read-more">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </article>
                                
                                <?php
                            }
                            wp_reset_postdata();
                        }
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php
// The footer will be loaded via the QP3_custom_footer() function in functions.php
get_footer();
?> 
<?php
/**
 * The template for displaying property type taxonomy
 *
 * @package QP3
 */

get_header();
?>

<div class="container property-type-archive">
    <?php
    $term = get_queried_object();
    
    // Get ACF fields for this term
    $thumbnail = get_field('thumbnail', $term);
    $short_desc = get_field('short_desc', $term);
    $features = get_field('features', $term);
    $main_colors = get_field('main_colors', $term);
    $materials = get_field('materials', $term);
    $functions = get_field('functions', $term);
    $layout_image = get_field('layout_image', $term);
    $design_style = get_field('design_style', $term);
    $note = get_field('note', $term);
    ?>

    <div class="property-type-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="property-type-title"><i class="fas fa-home"></i> <?php echo esc_html($term->name); ?></h1>
                <?php if ($short_desc) : ?>
                    <div class="property-type-description">
                        <?php echo wp_kses_post($short_desc); ?>
                    </div>
                <?php endif; ?>
                
                <div class="property-type-details">
                    <?php if ($features) : ?>
                        <div class="property-type-features">
                            <h3><i class="fas fa-star"></i> <?php _e('Đặc điểm nổi bật', 'qp3'); ?></h3>
                            <ul>
                                <?php foreach ($features as $feature) : ?>
                                    <li><?php echo esc_html($feature['feature_item']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if ($functions) : ?>
                        <div class="property-type-functions">
                            <h3><i class="fas fa-tasks"></i> <?php _e('Công năng sử dụng', 'qp3'); ?></h3>
                            <p><?php echo wp_kses_post($functions); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if ($design_style) : ?>
                        <div class="property-type-design">
                            <h3><i class="fas fa-paint-brush"></i> <?php _e('Phong cách thiết kế', 'qp3'); ?></h3>
                            <p><?php echo esc_html($design_style); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if ($materials) : ?>
                        <div class="property-type-materials">
                            <h3><i class="fas fa-cubes"></i> <?php _e('Vật liệu tiêu biểu', 'qp3'); ?></h3>
                            <p><?php echo esc_html($materials); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if ($note) : ?>
                        <div class="property-type-note">
                            <h3><i class="fas fa-sticky-note"></i> <?php _e('Ghi chú khác', 'qp3'); ?></h3>
                            <p><?php echo wp_kses_post($note); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6">
                <?php if ($thumbnail) : ?>
                    <div class="property-type-thumbnail">
                        <img src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($thumbnail['alt']); ?>">
                    </div>
                <?php endif; ?>
                
                <?php if ($layout_image) : ?>
                    <div class="property-type-layout">
                        <h3><i class="fas fa-layer-group"></i> <?php _e('Layout mặt bằng', 'qp3'); ?></h3>
                        <img src="<?php echo esc_url($layout_image['url']); ?>" alt="<?php echo esc_attr($layout_image['alt']); ?>">
                    </div>
                <?php endif; ?>

                <?php if ($main_colors) : ?>
                    <div class="property-type-colors">
                        <h3><i class="fas fa-palette"></i> <?php _e('Phối màu chính', 'qp3'); ?></h3>
                        <div class="color-swatches">
                            <?php foreach ($main_colors as $color_item) : ?>
                                <span class="color-swatch" style="background-color: <?php echo esc_attr($color_item['color']); ?>"></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="property-listing">
        <h2><i class="fas fa-list"></i> <?php _e('Danh sách Sản phẩm', 'qp3'); ?></h2>
        
        <?php
        $args = array(
            'post_type' => 'property',
            'posts_per_page' => 6,
            'tax_query' => array(
                array(
                    'taxonomy' => 'property_type',
                    'field'    => 'term_id',
                    'terms'    => $term->term_id,
                ),
            ),
        );
        
        $query = new WP_Query($args);
        
        if ($query->have_posts()) : ?>
            <div class="row">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="property-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="property-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="property-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="property-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary"><i class="fas fa-eye"></i> <?php _e('Xem chi tiết', 'qp3'); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            
            <?php wp_reset_postdata(); ?>
            
            <div class="view-all-link">
                <a href="<?php echo esc_url(get_post_type_archive_link('property')); ?>" class="btn btn-outline-primary"><i class="fas fa-th-list"></i> <?php _e('Xem tất cả sản phẩm BĐS', 'qp3'); ?></a>
            </div>
            
        <?php else : ?>
            <p><i class="fas fa-info-circle"></i> <?php _e('Chưa có sản phẩm BĐS nào thuộc loại hình này.', 'qp3'); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?> 
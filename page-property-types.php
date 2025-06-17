<?php
/**
 * Template Name: Danh sách loại hình BĐS
 * 
 * A template for displaying all property types
 *
 * @package QP3
 */

get_header();
?>

<div class="container property-types-page">
    <div class="page-header">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <?php if (get_the_content()) : ?>
            <div class="page-description">
                <?php the_content(); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php
    // Get all property types
    $property_types = get_terms(array(
        'taxonomy' => 'property_type',
        'hide_empty' => false,
    ));

    if (!empty($property_types) && !is_wp_error($property_types)) :
    ?>
        <div class="property-types-grid">
            <div class="row">
                <?php foreach ($property_types as $property_type) :
                    // Get ACF fields
                    $thumbnail = get_field('thumbnail', $property_type);
                    $short_desc = get_field('short_desc', $property_type);
                    $features = get_field('features', $property_type);
                ?>
                    <div class="col-md-4 mb-4">
                        <div class="property-type-card">
                            <?php if ($thumbnail) : ?>
                                <div class="property-type-card-image">
                                    <a href="<?php echo esc_url(get_term_link($property_type)); ?>">
                                        <img src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($property_type->name); ?>">
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="property-type-card-content">
                                <h3 class="property-type-card-title">
                                    <a href="<?php echo esc_url(get_term_link($property_type)); ?>">
                                        <?php echo esc_html($property_type->name); ?>
                                    </a>
                                </h3>
                                
                                <?php if ($short_desc) : ?>
                                    <div class="property-type-card-description">
                                        <?php echo wp_kses_post(wp_trim_words($short_desc, 20, '...')); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($features) : ?>
                                    <div class="property-type-features-preview">
                                        <ul>
                                            <?php 
                                            // Display up to 3 features
                                            $count = 0;
                                            foreach ($features as $feature) : 
                                                if ($count < 3) :
                                            ?>
                                                <li><?php echo esc_html($feature['feature_item']); ?></li>
                                            <?php 
                                                endif;
                                                $count++;
                                            endforeach; 
                                            ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                
                                <a href="<?php echo esc_url(get_term_link($property_type)); ?>" class="property-type-card-link">
                                    <?php _e('Xem chi tiết', 'qp3'); ?> <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else : ?>
        <div class="no-property-types">
            <p><?php _e('Chưa có loại hình BĐS nào được tạo.', 'qp3'); ?></p>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?> 
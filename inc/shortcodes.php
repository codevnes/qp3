<?php
/**
 * Custom Shortcodes
 *
 * @package QP3
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Shortcode to display Property Types in a grid
 * Usage: [property_types_grid count="6" columns="3"]
 */
function qp3_property_types_grid_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'count' => 6,     // Number of property types to display
            'columns' => 3,   // Number of columns in the grid
        ),
        $atts,
        'property_types_grid'
    );
    
    // Get property types
    $property_types = get_terms(array(
        'taxonomy' => 'property_type',
        'hide_empty' => false,
        'number' => intval($atts['count']),
    ));
    
    if (is_wp_error($property_types) || empty($property_types)) {
        return '<p>' . __('Chưa có loại hình BĐS nào.', 'qp3') . '</p>';
    }
    
    $columns_class = 'col-md-' . (12 / intval($atts['columns']));
    
    ob_start();
    ?>
    <div class="property-types-grid">
        <div class="row">
            <?php foreach ($property_types as $property_type) : 
                // Get ACF fields
                $thumbnail = get_field('thumbnail', $property_type);
                $short_desc = get_field('short_desc', $property_type);
            ?>
                <div class="<?php echo esc_attr($columns_class); ?> mb-4">
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
                            
                            <a href="<?php echo esc_url(get_term_link($property_type)); ?>" class="property-type-card-link">
                                <?php _e('Xem chi tiết', 'qp3'); ?> <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('property_types_grid', 'qp3_property_types_grid_shortcode');

/**
 * Shortcode to display Properties by Property Type
 * Usage: [properties_by_type type="villa" count="3" columns="3"]
 */
function qp3_properties_by_type_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'type' => '',     // Slug of the property type
            'count' => 3,     // Number of properties to display
            'columns' => 3,   // Number of columns in the grid
        ),
        $atts,
        'properties_by_type'
    );
    
    if (empty($atts['type'])) {
        return '<p>' . __('Hãy chỉ định loại hình BĐS.', 'qp3') . '</p>';
    }
    
    // Get properties by type
    $args = array(
        'post_type' => 'property',
        'posts_per_page' => intval($atts['count']),
        'tax_query' => array(
            array(
                'taxonomy' => 'property_type',
                'field'    => 'slug',
                'terms'    => sanitize_title($atts['type']),
            ),
        ),
    );
    
    $query = new WP_Query($args);
    
    if (!$query->have_posts()) {
        return '<p>' . __('Không tìm thấy sản phẩm BĐS nào thuộc loại này.', 'qp3') . '</p>';
    }
    
    $columns_class = 'col-md-' . (12 / intval($atts['columns']));
    
    ob_start();
    ?>
    <div class="properties-by-type-grid">
        <div class="row">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="<?php echo esc_attr($columns_class); ?> mb-4">
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
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php _e('Xem chi tiết', 'qp3'); ?></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('properties_by_type', 'qp3_properties_by_type_shortcode'); 
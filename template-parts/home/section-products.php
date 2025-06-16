<?php
/**
 * Template part for displaying the products section on the front page
 *
 * @package QP3
 */
?>

<div id="product" data-anchor="anchor-product" class="section anchor product">
    <div class="container">
        <div class="product__wrapper">
            <h2 class="heading product__heading d-lx-none"><span>Sản phẩm</span></h2>
            <div class="product__navigation">
                <div class="product__navigation-inner">
                    <div class="product__navigation-button product__navigation-button--prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="product__navigation-button product__navigation-button--next"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
            <div class="swiper myProducts">
                <div class="swiper-wrapper">
                    <?php
                    // Lấy tất cả các term của taxonomy property_type
                    $property_types = get_terms(array(
                        'taxonomy' => 'property_type',
                        'hide_empty' => false,
                        'parent' => 0, // Chỉ lấy các term cha
                    ));
                    
                    if (!empty($property_types) && !is_wp_error($property_types)) :
                        foreach ($property_types as $property_type) :
                            // Lấy thông tin ACF của term
                            $thumbnail = get_field('thumbnail', 'property_type_' . $property_type->term_id);
                            $short_desc = get_field('short_desc', 'property_type_' . $property_type->term_id);
                            $features = get_field('features', 'property_type_' . $property_type->term_id);
                            $materials = get_field('materials', 'property_type_' . $property_type->term_id);
                            $functions = get_field('functions', 'property_type_' . $property_type->term_id);
                            $location = get_field('location', 'property_type_' . $property_type->term_id);
                    ?>
                    <div class="swiper-slide">
                        <div class="product-card">
                            <div class="product-card__content" data-term-id="<?php echo $property_type->term_id; ?>">
                                <div class="row no-gutters">
                                    <div class="product-card__image-column">
                                        <div class="product-card__image">
                                            <?php if ($thumbnail) : ?>
                                                <img src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($property_type->name); ?>">
                                            <?php else : ?>
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/uploads/2022/07/img-pro-5.png" alt="<?php echo esc_attr($property_type->name); ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="product-card__info-column">
                                        <div class="product-card__info">
                                            <h3 class="product-card__title"><?php echo esc_html($property_type->name); ?></h3>
                                            <div class="product-card__excerpt">
                                                <?php echo esc_html($short_desc); ?>
                                            </div>
                                            <div class="product-card__fields">
                                                <?php if ($features) : ?>
                                                <div class="product-card__field product-card__field--features">
                                                    <span class="product-card__field-label"><i class="fal fa-star"></i> Đặc điểm</span>
                                                    <span class="product-card__field-value">
                                                        <?php 
                                                        $feature_items = array();
                                                        foreach ($features as $feature) {
                                                            $feature_items[] = $feature['feature_item'];
                                                        }
                                                        echo esc_html(implode(', ', $feature_items));
                                                        ?>
                                                    </span>
                                                </div>
                                                <?php endif; ?>
                                                
                                                <?php if ($materials) : ?>
                                                <div class="product-card__field product-card__field--materials">
                                                    <span class="product-card__field-label"><i class="fal fa-layer-group"></i> Vật liệu</span>
                                                    <span class="product-card__field-value"><?php echo esc_html($materials); ?></span>
                                                </div>
                                                <?php endif; ?>
                                                
                                                <?php if ($functions) : ?>
                                                <div class="product-card__field product-card__field--functions">
                                                    <span class="product-card__field-label"><i class="fal fa-tasks"></i> Công năng</span>
                                                    <span class="product-card__field-value"><?php echo esc_html($functions); ?></span>
                                                </div>
                                                <?php endif; ?>
                                                
                                                <?php if ($location) : ?>
                                                <div class="product-card__field product-card__field--location">
                                                    <span class="product-card__field-label"><i class="fal fa-map-marker-alt"></i> Vị trí</span>
                                                    <span class="product-card__field-value"><?php echo esc_html($location); ?></span>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="product-card__link">
                                                <a href="<?php echo esc_url(get_term_link($property_type)); ?>" title="<?php echo esc_attr($property_type->name); ?>">Chi tiết <i class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        endforeach;
                    else :
                    ?>
                    <!-- Default content if no property types are available -->
                    <div class="swiper-slide">
                        <div class="product-card">
                            <div class="product-card__content">
                                <div class="row no-gutters">
                                    <div class="product-card__image-column">
                                        <div class="product-card__image">
                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/uploads/2022/07/img-pro-5.png" alt="Loại hình BĐS">
                                        </div>
                                    </div>
                                    <div class="product-card__info-column">
                                        <div class="product-card__info">
                                            <h3 class="product-card__title">Căn hộ cao cấp</h3>
                                            <div class="product-card__excerpt">Căn hộ cao cấp được thiết kế hiện đại, tiện nghi với không gian sống đẳng cấp và tiện ích đầy đủ.</div>
                                            <div class="product-card__fields">
                                                <div class="product-card__field product-card__field--features">
                                                    <span class="product-card__field-label"><i class="fal fa-star"></i> Đặc điểm nổi bật</span>
                                                    <span class="product-card__field-value">Không gian mở, ánh sáng tự nhiên, view đẹp</span>
                                                </div>
                                                <div class="product-card__field product-card__field--materials">
                                                    <span class="product-card__field-label"><i class="fal fa-layer-group"></i> Vật liệu tiêu biểu</span>
                                                    <span class="product-card__field-value">Kính, thép, gỗ cao cấp</span>
                                                </div>
                                                <div class="product-card__field product-card__field--functions">
                                                    <span class="product-card__field-label"><i class="fal fa-tasks"></i> Công năng sử dụng</span>
                                                    <span class="product-card__field-value">Ở, làm việc, giải trí</span>
                                                </div>
                                                <div class="product-card__field product-card__field--location">
                                                    <span class="product-card__field-label"><i class="fal fa-map-marker-alt"></i> Vị trí</span>
                                                    <span class="product-card__field-value">Trung tâm thành phố</span>
                                                </div>
                                            </div>
                                            <div class="product-card__link"><a title="Căn hộ cao cấp">Chi tiết <i class="fas fa-arrow-right"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-card">
                            <div class="product-card__content">
                                <div class="row no-gutters">
                                    <div class="product-card__image-column">
                                        <div class="product-card__image">
                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/uploads/2022/07/img-pro-5.png" alt="Loại hình BĐS">
                                        </div>
                                    </div>
                                    <div class="product-card__info-column">
                                        <div class="product-card__info">
                                            <h3 class="product-card__title">Biệt thự nghỉ dưỡng</h3>
                                            <div class="product-card__excerpt">Biệt thự nghỉ dưỡng được thiết kế hài hòa với thiên nhiên, mang đến không gian sống xanh và trải nghiệm nghỉ dưỡng cao cấp.</div>
                                            <div class="product-card__fields">
                                                <div class="product-card__field product-card__field--features">
                                                    <span class="product-card__field-label"><i class="fal fa-star"></i> Đặc điểm nổi bật</span>
                                                    <span class="product-card__field-value">Không gian xanh, hồ bơi riêng, khu vườn</span>
                                                </div>
                                                <div class="product-card__field product-card__field--materials">
                                                    <span class="product-card__field-label"><i class="fal fa-layer-group"></i> Vật liệu tiêu biểu</span>
                                                    <span class="product-card__field-value">Gỗ tự nhiên, đá, kính</span>
                                                </div>
                                                <div class="product-card__field product-card__field--functions">
                                                    <span class="product-card__field-label"><i class="fal fa-tasks"></i> Công năng sử dụng</span>
                                                    <span class="product-card__field-value">Nghỉ dưỡng, tiếp khách, sinh hoạt gia đình</span>
                                                </div>
                                                <div class="product-card__field product-card__field--location">
                                                    <span class="product-card__field-label"><i class="fal fa-map-marker-alt"></i> Vị trí</span>
                                                    <span class="product-card__field-value">Ven biển, vùng núi</span>
                                                </div>
                                            </div>
                                            <div class="product-card__link"><a title="Biệt thự nghỉ dưỡng">Chi tiết <i class="fas fa-arrow-right"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div> 
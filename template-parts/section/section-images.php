<?php
/**
 * Template part for displaying the images
 *
 * @package QP3
 */

// Get gallery images from ACF options
$images = get_field('library_images', 'option');
$gallery_title = get_field('gallery_title', 'option') ?: 'Thư Viện Ảnh';

// Ensure we have a valid array of images
if (!is_array($images)) {
    $images = array();
}
?>

<section id="images" data-anchor="anchor-images" class="section section-images">
    <div class="container">
        <div class="wrap">
            <h2 class="heading d-lx-none"><span>Thư viện ảnh</span></h2>


            <div class="image__header">
                <h2 class="image__header-title">Phối Cảnh 3D
                    <br>
                    <strong>Tổng thể dự án</strong>
            </div>


            <?php if (!empty($images)): ?>
                <div class="image-gallery swiper swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ($images as $index => $image): ?>
                            <?php
                            // Ensure image has required data
                            if (empty($image) || !is_array($image) || !isset($image['id'])) {
                                continue;
                            }

                            // Get image data - this ensures we have all the correct fields
                            $img_id = $image['id'];
                            $full_url = wp_get_attachment_url($img_id);
                            $large_url = wp_get_attachment_image_url($img_id, 'large');
                            $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                            $caption = wp_get_attachment_caption($img_id);

                            // Skip if we can't get valid URLs
                            if (empty($full_url)) {
                                continue;
                            }

                            // If large size isn't available, use the full size
                            if (empty($large_url)) {
                                $large_url = $full_url;
                            }
                            ?>
                            <div class="gallery-item swiper-slide">
                                <a href="<?php echo esc_url($full_url); ?>" data-fancybox="gallery"
                                    data-caption="<?php echo esc_attr($caption ? $caption : ''); ?>">
                                    <div class="img-wrapper">
                                        <img src="<?php echo esc_url($large_url); ?>" alt="<?php echo esc_attr($alt_text); ?>"
                                            loading="lazy">
                                    </div>
                                    <?php if (!empty($caption)): ?>
                                        <div class="caption"><?php echo esc_html($caption); ?></div>
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-nav-container">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            <?php else: ?>
                <div class="no-images">
                    <p><?php esc_html_e('Chưa có hình ảnh nào trong thư viện.', 'QP3'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
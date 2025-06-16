<?php
/**
 * Template part for displaying the activity section on the front page
 *
 * @package QP3
 */
?>

<div id="activity" data-anchor="anchor-activity" class="section anchor section-activity">
    <div class="container">
        <div class="wrap">
            <h2 class="heading d-lx-none"><span>Lĩnh vực hoạt động</span></h2>
            <div class="swiper myactivity">
                <div class="swiper-wrapper blog-shortcode project-shortcode style-custom">
                    <?php
                    // Check if we have custom activity fields
                    $activities = get_field('activities', 'option');
                    if ($activities) :
                        foreach ($activities as $activity) :
                    ?>
                    <div class="item-activity swiper-item swiper-slide">
                        <div class="info-activity">
                            <div class="thumb-activity">
                                <?php if (!empty($activity['image'])) : ?>
                                    <img class="w-100" src="<?php echo esc_url($activity['image']); ?>" alt="<?php echo esc_attr($activity['title']); ?>">
                                <?php else : ?>
                                    <img class="w-100" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/uploads/2022/07/img-lvhd.png" alt="<?php echo esc_attr($activity['title']); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="content-activity">
                                <div class="info-activity">
                                    <h3 class="title-activity"><?php echo esc_html($activity['title']); ?></h3>
                                    <div class="desc-activity">
                                        <?php echo wp_kses_post($activity['description']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        endforeach;
                    else :
                    ?>
                    <!-- Default activities if no custom fields are available -->
                    <div class="item-activity swiper-item swiper-slide">
                        <div class="info-activity">
                            <div class="thumb-activity"><img class="w-100" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/uploads/2022/07/img-lvhd.png" alt="Đầu tư bất động sản"></div>
                            <div class="content-activity">
                                <div class="info-activity">
                                    <h3 class="title-activity">Đầu tư bất động sản</h3>
                                    <div class="desc-activity">
                                        <p>Inceptos volutpat a porttitor venenatis a est ullamcorper urna sed in senectus ridiculus alesuada id id potenti. Mollis rutrum dignissim aptent senectus nunc dictumst. Pellentesque senectus massa tellus justo feugiat lacus, gravida ornare.</p>
                                        <p>Viverra facilisi nonummy dui. Posuere ultricies vestibulum urna cras dictum, vel condimentum facilisi, natoque sagittis mauris ultricies. Convallis arcu platea et ante id ante nullam pharetra, lacinia etiam. Consequat pharetra eget litora quis velit ad phasellus suspendisse interdum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-activity swiper-item swiper-slide">
                        <div class="info-activity">
                            <div class="thumb-activity"><img class="w-100" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/uploads/2022/07/img-lvhd.png" alt="Đầu tư bất động sản"></div>
                            <div class="content-activity">
                                <div class="info-activity">
                                    <h3 class="title-activity">Đầu tư bất động sản</h3>
                                    <div class="desc-activity">
                                        <p>Inceptos volutpat a porttitor venenatis a est ullamcorper urna sed in senectus ridiculus alesuada id id potenti. Mollis rutrum dignissim aptent senectus nunc dictumst. Pellentesque senectus massa tellus justo feugiat lacus, gravida ornare.</p>
                                        <p>Viverra facilisi nonummy dui. Posuere ultricies vestibulum urna cras dictum, vel condimentum facilisi, natoque sagittis mauris ultricies. Convallis arcu platea et ante id ante nullam pharetra, lacinia etiam. Consequat pharetra eget litora quis velit ad phasellus suspendisse interdum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="box-button btn-activity">
                    <div class="box-button-inner">
                        <div class="swiper-button swiper-prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="swiper-button swiper-next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
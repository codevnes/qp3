<?php
/**
 * Template part for displaying the projects section on the front page
 *
 * @package QP3
 */
?>

<div id="project" data-anchor="anchor-project" class="section anchor section-project">
    <div class="container">
        <div class="wrap-project">
            <h2 class="heading d-lx-none"><span>Dự án tiêu biểu</span></h2>
            <div class="box-button">
                <div class="box-button-inner">
                    <div class="swiper-button swiper-prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="swiper-button swiper-next"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
            <div class="swiper myProject">
                <div class="swiper-wrapper blog-shortcode project-shortcode style-custom">
                    <?php
                    $args = array(
                        'post_type' => 'project',
                        'posts_per_page' => 5,
                    );
                    $projects_query = new WP_Query($args);
                    
                    if ($projects_query->have_posts()) :
                        while ($projects_query->have_posts()) : $projects_query->the_post();
                            $project_quy_mo = get_field('quy_mo');
                            $project_tien_do = get_field('tien_do');
                            $project_vi_tri = get_field('vi_tri');
                    ?>
                    <div class="swiper-item swiper-slide">
                        <div class="project-item post-project">
                            <div class="post-info" data-idproject="<?php echo get_the_ID(); ?>">
                                <div class="row no-gutters">
                                    <div class="col-image">
                                        <div class="project-info__thumb">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <img class="w-100" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                            <?php else : ?>
                                                <img class="w-100" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/uploads/2022/07/img-pro-5.png" alt="<?php the_title(); ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-desc">
                                        <div class="project-info">
                                            <h3 class="project-info__title"><?php the_title(); ?></h3>
                                            <div class="project-info__excerpt"><?php the_excerpt(); ?></div>
                                            <div class="post-field">
                                                <?php if ($project_quy_mo) : ?>
                                                <div class="item-field qm-field">
                                                    <span class="tt-field">Quy mô</span>
                                                    <span class="vl-field"><?php echo esc_html($project_quy_mo); ?></span>
                                                </div>
                                                <?php endif; ?>
                                                <?php if ($project_tien_do) : ?>
                                                <div class="item-field td-field">
                                                    <span class="tt-field">Tiến độ</span>
                                                    <span class="vl-field"><?php echo esc_html($project_tien_do); ?></span>
                                                </div>
                                                <?php endif; ?>
                                                <?php if ($project_vi_tri) : ?>
                                                <div class="item-field td-field">
                                                    <span class="tt-field">Vị trí</span>
                                                    <span class="vl-field"><?php echo esc_html($project_vi_tri); ?></span>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="post-info__link">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Chi tiết <i class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                    ?>
                    <!-- Default projects if none are available -->
                    <div class="swiper-item swiper-slide">
                        <div class="project-item post-project">
                            <div class="post-info" data-idproject="133">
                                <div class="row no-gutters">
                                    <div class="col-image">
                                        <div class="project-info__thumb"><img class="w-100" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/uploads/2022/07/img-pro-5.png" alt="Image Intro"></div>
                                    </div>
                                    <div class="col-desc">
                                        <div class="project-info">
                                            <h3 class="project-info__title">Vinhomes &#8211; The Origami</h3>
                                            <div class="project-info__excerpt">Ogimi Village - được thiết kế đặc biệt theo phong cách kiến trúc của làng quê Ogimi - Okinawa Nhật Bản. Với hệ thống tiện ích nội khu đẳng cấp cùng phong cảnh núi đồi và sự ưu ái về khí hậu mà thiên nhiên ban tặng, hứa hẹn sẽ trở thành tâm điểm phồn hoa giữa thiên đường du lịch nghỉ dưỡng Bảo Lộc</div>
                                            <div class="post-field">
                                                <div class="item-field qm-field"><span class="tt-field">Quy mô</span><span class="vl-field">1.5 ha</span></div>
                                                <div class="item-field td-field"><span class="tt-field">Tiến độ</span><span class="vl-field">Hoàn thiện hạ tầng</span></div>
                                                <div class="item-field td-field"><span class="tt-field">Vị trí</span><span class="vl-field">Quốc Lộ 20 - Đại Lào - Bảo Lộc</span></div>
                                            </div>
                                            <div class="post-info__link"><a title="Vinhomes &#8211; The Origami">Chi tiết <i class="fas fa-arrow-right"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-item swiper-slide">
                        <div class="project-item post-project">
                            <div class="post-info" data-idproject="123">
                                <div class="row no-gutters">
                                    <div class="col-image">
                                        <div class="project-info__thumb"><img class="w-100" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/uploads/2022/07/img-pro-5.png" alt="Image Intro"></div>
                                    </div>
                                    <div class="col-desc">
                                        <div class="project-info">
                                            <h3 class="project-info__title">Central Lake &#8211; Di Linh</h3>
                                            <div class="project-info__excerpt">Ogimi Village - được thiết kế đặc biệt theo phong cách kiến trúc của làng quê Ogimi - Okinawa Nhật Bản. Với hệ thống tiện ích nội khu đẳng cấp cùng phong cảnh núi đồi và sự ưu ái về khí hậu mà thiên nhiên ban tặng, hứa hẹn sẽ trở thành tâm điểm phồn hoa giữa thiên đường du lịch nghỉ dưỡng Bảo Lộc</div>
                                            <div class="post-field">
                                                <div class="item-field qm-field"><span class="tt-field">Quy mô</span><span class="vl-field">1.5 ha</span></div>
                                                <div class="item-field td-field"><span class="tt-field">Tiến độ</span><span class="vl-field">Hoàn thiện hạ tầng</span></div>
                                                <div class="item-field td-field"><span class="tt-field">Vị trí</span><span class="vl-field">Quốc Lộ 20 - Đại Lào - Bảo Lộc</span></div>
                                            </div>
                                            <div class="post-info__link"><a title="Central Lake &#8211; Di Linh">Chi tiết <i class="fas fa-arrow-right"></i></a></div>
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
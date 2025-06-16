<?php
/**
 * Template part for displaying the recruitment section on the front page
 *
 * @package QP3
 */
?>

<div id="info-recruitment" data-anchor="anchor-recruitment" class="section section-recruitment">
    <div class="container">
        <div class="wrap">
            <h2 class="heading d-lx-none"><span>Cơ hội nghề nghiệp</span></h2>
            <div class="row no-gutters">
                <div class="col-image">
                    <div class="img-recruitment">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/uploads/2022/07/img-re-3.png" alt="Image Intro">
                    </div>
                </div>
                <div class="col-desc">
                    <div class="content-recruitment">
                        <?php
                        $args = array(
                            'post_type' => 'recruitment',
                            'posts_per_page' => 4,
                        );
                        $recruitment_query = new WP_Query($args);
                        
                        if ($recruitment_query->have_posts()) :
                            while ($recruitment_query->have_posts()) : $recruitment_query->the_post();
                                $recruitment_quantity = get_field('quantity');
                        ?>
                        <div class="item-recruitment">
                            <a class="btn-recruitment d-block" data-idrecruitment="<?php echo get_the_ID(); ?>">
                                <span class="tt"><?php the_title(); ?></span>
                                <span class="qty">Số lượng <?php echo esc_html($recruitment_quantity ? $recruitment_quantity : '0'); ?></span>
                            </a>
                        </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                        ?>
                        <!-- Default recruitments if none are available -->
                        <div class="item-recruitment"><a class="btn-recruitment d-block" data-idrecruitment="101"><span class="tt">Nhân viên nghiên cứu thị trường</span><span class="qty">Số lượng 15</span></a></div>
                        <div class="item-recruitment"><a class="btn-recruitment d-block" data-idrecruitment="103"><span class="tt">Trưởng phòng kinh doanh</span><span class="qty">Số lượng 03</span></a></div>
                        <div class="item-recruitment"><a class="btn-recruitment d-block" data-idrecruitment="100"><span class="tt">Nhân viên tư vấn</span><span class="qty">Số lượng 50</span></a></div>
                        <div class="item-recruitment"><a class="btn-recruitment d-block" data-idrecruitment="99"><span class="tt">Nhân viên kinh doanh</span><span class="qty">Số lượng 300</span></a></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
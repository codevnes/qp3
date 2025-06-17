<?php
/**
 * Template part for displaying the media section on the front page
 *
 * @package QP3
 */
?>

<div id="media" data-anchor="anchor-media" class="section section-media">
    <div class="container">
        <div class="wrap">
            <h2 class="heading d-lx-none"><span>Thư viện</span></h2>
            <div class="media-box">
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <div class="item-media">
                            <a class="link-media" href="<?php echo esc_url(home_url('/thu-vien/')); ?>">
                                <img class="w-100" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/uploads/2022/07/tva.jpg" alt="Gallery" />
                                <span class="icon">
                                    <span class="inner">
                                        <i class="fas fa-images"></i> Hình ảnh
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="item-media">
                            <a class="link-media" href="<?php echo esc_url(home_url('/thu-vien/')); ?>">
                                <img class="w-100" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/uploads/2022/07/tvv.jpg" alt="Gallery" />
                                <span class="icon">
                                    <span class="inner">
                                        <i class="fas fa-play-circle"></i> Video
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
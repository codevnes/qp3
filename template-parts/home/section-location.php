<?php
/**
 * Template part for displaying the location section on the front page
 *
 * @package QP3
 */
?>

<section id="location" data-anchor="anchor-location" class="section anchor section-location">
    <div class="container">
        <div class="section-location__wrap">
            <h2 class="section-location__heading heading d-lx-none"><span>Vị trí</span></h2>
            <div class="row align-items-center">
                <div class="col-lx-4">
                    <div class="section-location__content">
                        <div class="section-location__title-wrapper">
                            <h2 class="section-location__title">Vị trí Vàng</h2>
                            <h3 class="section-location__subtitle">Trung Tâm Bắc Tân Uyên – Thuận Lợi Giao Thông</h3>
                        </div>
                        <div class="section-location__info">
                            <p><strong>Khu Nhà Ở Quang Phúc 3</strong> tọa lạc tại xã Bình Mỹ, huyện Bắc Tân Uyên, tỉnh Bình Dương – một trong những khu vực đang phát triển năng động nhất của thành phố Tân Uyên. Nằm trên mặt tiền các tuyến đường lớn, dự án dễ dàng kết nối đến trung tâm thành phố, các khu công nghiệp, trường học, bệnh viện và tiện ích hiện đại xung quanh. Vị trí "vàng" này không chỉ thuận tiện cho sinh hoạt, an cư mà còn mang lại tiềm năng đầu tư và kinh doanh vượt trội cho cư dân.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lx-8">
                    <div class="section-location__image-wrapper">
                        <div class="section-location__image text-center">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/location/main.svg" class="section-location__map--bg img-fluid w-100" alt="Vị trí dự án">
                            <object class="section-location__map--layer section-location__map--line" type="image/svg+xml" data="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/location/line-map.svg" title="Vị trí dự án"></object>
                            <object class="section-location__map--layer section-location__map--icon" type="image/svg+xml" data="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/location/icon-map.svg" title="Vị trí dự án"></object>
                            <object class="section-location__map--layer section-location__map--train" type="image/svg+xml" data="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/location/train.svg" title="Vị trí dự án"></object>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
<?php
/**
 * The template for displaying the footer on single post pages
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package QP3
 */
?>

</main><!-- #main -->
</div><!-- #content -->

<footer class="footer-single">
    <div class="footer-single__top">
        <div class="container">
            <div class="footer-single__registration">
                <div class="footer-single__registration-content">
                    <h2 class="footer-single__heading">ĐĂNG KÝ TƯ VẤN</h2>
                    
                    <form class="footer-single__form">
                        <div class="footer-single__form-row">
                            <div class="footer-single__form-group">
                                <input type="text" class="footer-single__input" placeholder="HỌ TÊN (*)" required>
                            </div>
                            <div class="footer-single__form-group">
                                <input type="tel" class="footer-single__input" placeholder="ĐIỆN THOẠI (*)" required>
                            </div>
                        </div>
                        
                        <div class="footer-single__form-group footer-single__form-group--full">
                            <input type="email" class="footer-single__input" placeholder="EMAIL">
                        </div>
                        
                        <div class="footer-single__form-group footer-single__form-group--full">
                            <div class="footer-single__select-wrapper">
                                <select class="footer-single__select">
                                    <option value="">CHỌN LOẠI CĂN HỘ BẠN QUAN TÂM</option>
                                    <option value="1pn">Căn hộ 1 phòng ngủ</option>
                                    <option value="2pn">Căn hộ 2 phòng ngủ</option>
                                    <option value="3pn">Căn hộ 3 phòng ngủ</option>
                                    <option value="penthouse">Penthouse</option>
                                </select>
                                <div class="footer-single__select-icon">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="footer-single__form-group footer-single__form-group--full">
                            <textarea class="footer-single__textarea" placeholder="LỜI NHẮN"></textarea>
                        </div>
                        
                        <button type="submit" class="footer-single__submit">
                            ĐĂNG KÝ NGAY
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer-single__main">
        <div class="container">
            <div class="footer-single__grid">
                <div class="footer-single__info">
                    <div class="footer-single__logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="<?php bloginfo('name'); ?>" class="footer-single__logo-img">
                    </div>
                    
                    <div class="footer-single__project">
                        <h3 class="footer-single__project-title">DỰ ÁN:</h3>
                        <p class="footer-single__project-address">Đường Song Hành, Phường An Phú, TP Thủ Đức, TP Hồ Chí Minh</p>
                    </div>
                    
                    <div class="footer-single__sales">
                        <h3 class="footer-single__sales-title">SALES GALLERY:</h3>
                        <p class="footer-single__sales-address">A12 Vòng xoay Võ Tòng Phan, Phường An Phú, TP Thủ Đức, TP Hồ Chí Minh</p>
                    </div>
                    
                    <div class="footer-single__contact">
                        <div class="footer-single__contact-item">
                            <span class="footer-single__contact-label">HOTLINE:</span>
                            <a href="tel:19008063" class="footer-single__contact-link">1900 8063</a>
                        </div>
                        
                        <div class="footer-single__contact-item">
                            <span class="footer-single__contact-label">EMAIL:</span>
                            <a href="mailto:info@theprive.vn" class="footer-single__contact-link">info@theprive.vn</a>
                        </div>
                    </div>
                    
                    <div class="footer-single__social">
                        <a href="#" class="footer-single__social-link footer-single__social-link--facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="footer-single__social-link footer-single__social-link--youtube">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                        <a href="#" class="footer-single__social-link footer-single__social-link--tiktok">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer-single__bottom">
        <div class="container">
            <div class="footer-single__copyright">
                <p class="footer-single__copyright-text">© <?php echo date('Y'); ?> THE PRIVÉ. ALL RIGHTS RESERVED.</p>
                <div class="footer-single__links">
                    <a href="#" class="footer-single__link">CHÍNH SÁCH BẢO MẬT</a>
                    <span class="footer-single__separator">•</span>
                    <a href="#" class="footer-single__link">ĐIỀU KHOẢN CHUNG</a>
                </div>
            </div>
            
            <div class="footer-single__disclaimer">
                <p class="footer-single__disclaimer-text">
                    Lưu ý: Hình ảnh mang tính chất minh họa. Chủ đầu tư có quyền thay đổi những thông tin, 
                    hình ảnh liên quan đến dự án ở tài liệu này hoặc bất kỳ những phát sinh nào theo yêu cầu của cơ quan nhà nước có thẩm quyền.
                </p>
            </div>
        </div>
    </div>
    
    <div class="footer-single__back-top">
        <i class="fa-solid fa-chevron-up"></i>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html> 
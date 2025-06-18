document.addEventListener('DOMContentLoaded', function() {
    // Initialize the image gallery swiper
    const gallerySwiper = new Swiper('.section-images .image-gallery', {
        slidesPerView: 1, // Default for mobile
        spaceBetween: 20,
        loop: true,
        centeredSlides: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        pagination: {
            el: '.section-images .swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: '.section-images .swiper-button-next',
            prevEl: '.section-images .swiper-button-prev',
        },
        breakpoints: {
            // When screen width is >= 768px (tablets and desktops)
            768: {
                slidesPerView: 2.4,
                spaceBetween: 30,
                centeredSlides: false
            }
        },
        keyboard: {
            enabled: true
        },
        a11y: {
            prevSlideMessage: 'Ảnh trước',
            nextSlideMessage: 'Ảnh tiếp theo'
        }
    });
}); 
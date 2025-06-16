/**
 * Product Swiper Initialization
 */
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Products Swiper
    if (document.querySelector('.myProducts')) {
        const productsSwiper = new Swiper('.myProducts', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.product__navigation-button--next',
                prevEl: '.product__navigation-button--prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
            },
            on: {
                init: function() {
                    console.log('Products Swiper initialized');
                }
            }
        });
    }

    // Initialize Location Slider
    if (document.querySelector('.slider--location')) {
        const locationSlider = new Swiper('.slider--location', {
            slidesPerView: 1.2,
            spaceBetween: 20,
            loop: true,
            navigation: {
                nextEl: '.slider--location .swiper-button-next',
                prevEl: '.slider--location .swiper-button-prev'
            },
            pagination: {
                el: '.slider--location .swiper-pagination',
                clickable: true
            },
            breakpoints: {
                320: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 1.2
                },
                1024: {
                    slidesPerView: 1.5
                }
            }
        });
    }
}); 
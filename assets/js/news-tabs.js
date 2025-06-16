/**
 * News Section Tabs and Slider Functionality
 */
(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Initialize tab functionality
        initNewsTabs();
        
        // Initialize news sliders
        initNewsSliders();
    });
    
    /**
     * Initialize tabs functionality
     */
    function initNewsTabs() {
        const tabLinks = $('.news__tabs-link');
        
        // Handle tab click
        tabLinks.on('click', function(e) {
            e.preventDefault();
            
            const tabId = $(this).data('tab');
            
            // Remove active class from all tabs and content
            tabLinks.removeClass('news__tabs-link--active');
            $('.news__content-tab').removeClass('news__content-tab--active');
            
            // Add active class to clicked tab and corresponding content
            $(this).addClass('news__tabs-link--active');
            $(`#tab-${tabId}`).addClass('news__content-tab--active');
            
            // Reinitialize the slider for the active tab
            if (typeof Swiper !== 'undefined') {
                setTimeout(function() {
                    initNewsSliders();
                }, 100);
            }
        });
    }
    
    /**
     * Initialize Swiper sliders for news sections
     */
    function initNewsSliders() {
        // Destroy existing sliders first
        if (window.newsSliders) {
            window.newsSliders.forEach(function(slider) {
                if (slider && typeof slider.destroy === 'function') {
                    slider.destroy();
                }
            });
        }
        
        // Store sliders for later reference
        window.newsSliders = [];
        
        // Initialize sliders for each tab content
        $('.news__slider').each(function(index) {
            const $slider = $(this);
            
            // Only initialize if visible
            if ($slider.closest('.news__content-tab').hasClass('news__content-tab--active') || 
                $slider.closest('.news__content-tab').css('display') === 'block') {
                
                const newSlider = new Swiper($slider[0], {
                    slidesPerView: 2,
                    spaceBetween: 20,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: $slider.find('.swiper-pagination')[0],
                        clickable: true,
                    },
                    navigation: {
                        nextEl: $slider.find('.news__slider-button--next')[0],
                        prevEl: $slider.find('.news__slider-button--prev')[0],
                    },
                    breakpoints: {
                        576: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 3,
                        }
                    }
                });
                
                window.newsSliders.push(newSlider);
            }
        });
    }
    
})(jQuery);

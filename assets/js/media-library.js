/**
 * Media Library page functionality
 */
jQuery(document).ready(function($) {
    // Tab switching functionality
    $('.media-library-tabs .tab-item').on('click', function() {
        var tabId = $(this).data('tab');
        
        // Update tab navigation
        $('.media-library-tabs .tab-item').removeClass('active');
        $(this).addClass('active');
        
        // Update tab content
        $('.tab-panel').removeClass('active');
        $('#' + tabId + '-panel').addClass('active');

        // Store active tab in sessionStorage
        sessionStorage.setItem('active_media_tab', tabId);
    });

    // Restore previously selected tab if available
    var activeTab = sessionStorage.getItem('active_media_tab');
    if (activeTab) {
        $('.media-library-tabs .tab-item[data-tab="' + activeTab + '"]').trigger('click');
    }
    
    // Initialize Fancybox for images and videos
    if ($.fancybox) {
        // Image galleries
        $('[data-fancybox^="gallery-"]').fancybox({
            buttons: [
                "zoom",
                "slideShow",
                "fullScreen",
                "thumbs",
                "close"
            ],
            loop: true,
            protect: true,
            animationEffect: "fade",
            transitionEffect: "fade"
        });
        
        // Videos
        $('[data-fancybox="video"]').fancybox({
            buttons: [
                "fullScreen",
                "close"
            ],
            youtube: {
                controls: 1,
                showinfo: 0
            },
            vimeo: {
                color: '00adef',
                autoplay: true
            },
            video: {
                autoStart: true
            }
        });
    }

    // Handle image lazy loading
    if ('loading' in HTMLImageElement.prototype) {
        // Browser supports native lazy loading
        const lazyImages = document.querySelectorAll('.gallery-item img, .video-thumbnail img');
        lazyImages.forEach(img => {
            img.setAttribute('loading', 'lazy');
        });
    } else {
        // Fallback for browsers that don't support lazy loading
        const lazyImages = document.querySelectorAll('.gallery-item img, .video-thumbnail img');
        
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            lazyImages.forEach(img => {
                imageObserver.observe(img);
            });
        }
    }
});

/**
 * Media Library Gallery initialization
 */
(function($) {
    'use strict';

    // Wait for DOM to be ready
    $(document).ready(function() {
        // Check if Fancybox exists before binding
        if (typeof Fancybox !== 'undefined') {
            // Initialize Fancybox for gallery items
            Fancybox.bind('[data-fancybox="gallery"]', {
                // Custom options
                dragToClose: false,
                Toolbar: {
                    display: [
                        { id: "prev", position: "center" },
                        { id: "counter", position: "center" },
                        { id: "next", position: "center" },
                        "zoom",
                        "slideshow",
                        "fullscreen",
                        "download",
                        "close",
                    ],
                },
                Image: {
                    zoom: true,
                },
                Thumbs: {
                    autoStart: true,
                }
            });
            
            console.log('Fancybox initialized for gallery');
        } else {
            console.error('Fancybox not loaded');
        }
    });

    // Debug gallery images
    if (document.querySelector('.image-gallery')) {
        console.log('Gallery found');
        const galleryItems = document.querySelectorAll('.gallery-item img');
        console.log('Gallery items found:', galleryItems.length);
        
        // Check each image source
        galleryItems.forEach(function(img, index) {
            console.log('Image ' + index + ' src:', img.getAttribute('src'));
            
            // If image src is undefined or empty, add an error class
            if (!img.getAttribute('src') || img.getAttribute('src') === 'undefined') {
                img.classList.add('img-error');
                console.error('Image ' + index + ' has invalid src');
            }
        });
    } else {
        console.log('No gallery found on page');
    }

})(jQuery); 
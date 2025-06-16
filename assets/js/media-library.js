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
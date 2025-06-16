/**
 * Category page functionality
 */
document.addEventListener('DOMContentLoaded', function() {
    // View toggle functionality (grid/list)
    const viewButtons = document.querySelectorAll('.category__view-button');
    const postsContainer = document.querySelector('.category__posts');
    const posts = document.querySelectorAll('.category__post');
    
    if (viewButtons.length && postsContainer) {
        // Set initial view from localStorage or default to grid
        const savedView = localStorage.getItem('categoryView') || 'grid';
        setView(savedView, false); // No animation on initial load
        
        // Add click event listeners to view buttons
        viewButtons.forEach(button => {
            button.addEventListener('click', function() {
                const view = this.getAttribute('data-view');
                setView(view, true); // Animate when user clicks
                
                // Save preference to localStorage
                localStorage.setItem('categoryView', view);
            });
        });
    }
    
    // Function to set the current view
    function setView(view, animate) {
        // If animating, first hide all posts
        if (animate) {
            posts.forEach(post => {
                post.style.opacity = '0';
                post.style.transform = 'translateY(20px)';
            });
            
            // Short delay before changing view
            setTimeout(() => {
                // Update posts container class
                postsContainer.className = 'category__posts category__posts--' + view;
                
                // Reveal posts with staggered delay
                posts.forEach((post, index) => {
                    setTimeout(() => {
                        post.style.opacity = '1';
                        post.style.transform = 'translateY(0)';
                    }, index * 50);
                });
            }, 300);
        } else {
            // No animation, just switch view
            postsContainer.className = 'category__posts category__posts--' + view;
        }
        
        // Update active button
        viewButtons.forEach(button => {
            if (button.getAttribute('data-view') === view) {
                button.classList.add('category__view-button--active');
            } else {
                button.classList.remove('category__view-button--active');
            }
        });
    }
    
    // Animate posts on scroll
    if (posts.length) {
        // Add transition styles to all posts for smooth animations
        posts.forEach(post => {
            post.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        });
        
        // Create intersection observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('category__post--visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });
        
        // Observe each post
        posts.forEach((post, index) => {
            // Add initial state class
            post.classList.add('category__post--hidden');
            
            // Add staggered delay
            post.style.transitionDelay = `${index * 0.1}s`;
            
            // Observe post
            observer.observe(post);
        });
    }
    
    // Handle responsive behavior
    function handleResponsiveLayout() {
        const isMobile = window.innerWidth <= 767;
        
        // If on mobile and in list view, consider switching to grid for better mobile experience
        if (isMobile && localStorage.getItem('categoryView') === 'list') {
            // Optional: automatically switch to grid on very small screens
            // setView('grid', false);
            // localStorage.setItem('categoryView', 'grid');
        }
    }
    
    // Run on load and resize
    handleResponsiveLayout();
    window.addEventListener('resize', handleResponsiveLayout);
}); 
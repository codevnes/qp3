/**
 * Blog functionality
 */
document.addEventListener('DOMContentLoaded', function() {
    // Active category highlighting
    const highlightActiveCategory = () => {
        const currentUrl = window.location.href;
        document.querySelectorAll('.blog__categories-header-link').forEach(link => {
            if (link.href === currentUrl) {
                link.classList.add('blog__categories-header-link--active');
            }
        });
    };
    
    highlightActiveCategory();
    
    // Add animation effects to related post items
    const animateRelatedPosts = () => {
        const relatedItems = document.querySelectorAll('.related-posts__item');
        
        if (relatedItems.length) {
            relatedItems.forEach((item, index) => {
                // Add staggered animation delay
                item.style.animationDelay = `${index * 0.15}s`;
                item.classList.add('related-posts__item--animate');
            });
        }
    };
    
    // Run animations after a short delay
    setTimeout(animateRelatedPosts, 300);
}); 
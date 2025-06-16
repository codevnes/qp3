# System Patterns: KN Holdings WordPress Theme

## Code Organization
- WordPress theme structure with template parts for modularity
- Custom post types for specialized content
- SCSS compilation workflow

## Template Structure
- Header and footer templates
- Template parts organized by section (home/section-*)
- Custom post type templates

## JavaScript Libraries
- Fullpage.js for vertical scrolling sections
- Swiper.js for carousels/sliders
- Fancybox for media galleries
- jQuery for DOM manipulation

## CSS/SCSS Architecture
- SCSS source files in assets/sass/
- Compiled to main.css or main.min.css

## WordPress Integration
- Custom post types (e.g., Projects)
- Theme customizer options
- Navigation menus
- Widget areas

## Responsive Design
- Different behavior on mobile (fullpage.js disabled under 1089px)
- Mobile-specific navigation

## Development Workflow
- SASS watch for development
- Build script for production

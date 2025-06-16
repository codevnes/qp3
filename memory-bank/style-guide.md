# Style Guide: KN Holdings WordPress Theme

## Code Style

### PHP
- Follow WordPress coding standards
- Use proper indentation (4 spaces)
- Comment functions and complex code blocks
- Use meaningful variable and function names
- Prefix functions with 'QP3_'

### JavaScript
- Use jQuery for DOM manipulation
- Comment complex logic
- Initialize scripts in document.ready blocks
- Use meaningful variable names

### SCSS/CSS
- Organize SCSS files by component/section
- Use BEM naming convention where appropriate
- Use variables for colors and common values
- Comment section breaks

## Naming Conventions

### Files
- Template parts: section-{name}.php
- SCSS partials: _component-name.scss
- JavaScript: descriptive-name.js

### Functions
- Prefix all functions with 'QP3_'
- Use descriptive names: QP3_register_post_types()

### Classes
- Use descriptive class names
- Follow BEM methodology where appropriate

## Documentation
- Comment all functions with description
- Document parameters and return values
- Include file headers with @package QP3

## Git Workflow
- Create meaningful commit messages
- Group related changes in single commits
- Test before committing

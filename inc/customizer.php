<?php
/**
 * QP3 Theme Customizer
 *
 * @package QP3
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function qp3_customize_register($wp_customize) {
    // Site Identity section is created by WordPress Core
    // We'll just add our custom description to help users understand
    
    // Get the site logo control
    $wp_customize->get_control('custom_logo')->description = __('Upload your logo to display it in the header. If no logo is set, the default logo will be used.', 'QP3');
    
    // Modify the site title settings
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    
    // Add selective refresh support
    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('custom_logo', array(
            'selector'        => '.logo',
            'render_callback' => 'qp3_customize_partial_logo',
        ));
        
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'qp3_customize_partial_blogname',
        ));
        
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'qp3_customize_partial_blogdescription',
        ));
    }
}
add_action('customize_register', 'qp3_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function qp3_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function qp3_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Render the logo for the selective refresh partial.
 *
 * @return void
 */
function qp3_customize_partial_logo() {
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        echo '<img alt="Logo" src="' . esc_url(get_template_directory_uri()) . '/assets/uploads/2022/07/logo.svg">';
        // We're keeping the logo image for now as it's the brand logo, not an icon that can be replaced with Font Awesome
    }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function qp3_customize_preview_js() {
    wp_enqueue_script('qp3-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'qp3_customize_preview_js'); 
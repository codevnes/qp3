<?php
/**
 * Media Library Admin Page and ACF configuration
 *
 * @package QP3
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Register ACF Options Page for Media Library
 */
function qp3_register_media_library_options_page() {
    if (!function_exists('acf_add_options_page')) {
        return;
    }
    
    // Add parent options page
    acf_add_options_page(array(
        'page_title'    => 'Thư Viện',
        'menu_title'    => 'Thư Viện',
        'menu_slug'     => 'media-library',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'icon_url'      => 'dashicons-images-alt2',
        'position'      => 20,
    ));

    // Add sub-pages
    acf_add_options_sub_page(array(
        'page_title'    => 'Thư Viện Ảnh',
        'menu_title'    => 'Thư Viện Ảnh',
        'parent_slug'   => 'media-library',
        'menu_slug'     => 'image-library',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Thư Viện Video',
        'menu_title'    => 'Thư Viện Video',
        'parent_slug'   => 'media-library',
        'menu_slug'     => 'video-library',
    ));
}
add_action('acf/init', 'qp3_register_media_library_options_page');

/**
 * Register ACF fields for Image Library
 */
function qp3_register_image_library_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_image_library',
        'title' => 'Thư Viện Ảnh',
        'fields' => array(
            array(
                'key' => 'field_gallery_title',
                'label' => 'Tiêu đề thư viện',
                'name' => 'gallery_title',
                'type' => 'text',
                'instructions' => 'Nhập tiêu đề hiển thị cho thư viện ảnh',
                'required' => 0,
                'default_value' => 'Thư Viện Ảnh',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
            ),
            array(
                'key' => 'field_library_images',
                'label' => 'Hình ảnh',
                'name' => 'library_images',
                'type' => 'gallery',
                'instructions' => 'Tải lên nhiều hình ảnh cho thư viện',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'insert' => 'append',
                'library' => 'all',
                'min' => 0,
                'max' => 0,
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => 'jpg,jpeg,png',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'image-library',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => false,
    ));
}
add_action('acf/init', 'qp3_register_image_library_acf_fields');

/**
 * Register ACF fields for Video Library
 */
function qp3_register_video_library_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_video_library',
        'title' => 'Thư Viện Video',
        'fields' => array(
            array(
                'key' => 'field_library_videos',
                'label' => 'Danh sách video',
                'name' => 'library_videos',
                'type' => 'repeater',
                'instructions' => 'Thêm video vào thư viện',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => 'field_video_title',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => 'Thêm video',
                'sub_fields' => array(
                    array(
                        'key' => 'field_video_title',
                        'label' => 'Tiêu đề',
                        'name' => 'title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_video_thumbnail',
                        'label' => 'Ảnh thumbnail',
                        'name' => 'thumbnail',
                        'type' => 'image',
                        'instructions' => 'Ảnh đại diện cho video',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => 'jpg,jpeg,png',
                    ),
                    array(
                        'key' => 'field_video_url',
                        'label' => 'URL Video',
                        'name' => 'video_url',
                        'type' => 'url',
                        'instructions' => 'Nhập URL video YouTube hoặc Vimeo',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => 'https://www.youtube.com/watch?v=...',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'video-library',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => false,
    ));
}
add_action('acf/init', 'qp3_register_video_library_acf_fields'); 
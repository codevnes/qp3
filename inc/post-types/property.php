<?php
/**
 * Đăng ký post type Sản phẩm BĐS và taxonomy Loại hình BĐS + ACF cho taxonomy
 *
 * @package QP3
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Register Property post type
 */
function qp3_register_property_post_type() {
    $labels = array(
        'name'               => _x('Sản phẩm BĐS', 'post type general name', 'qp3'),
        'singular_name'      => _x('Sản phẩm BĐS', 'post type singular name', 'qp3'),
        'menu_name'          => _x('Sản phẩm BĐS', 'admin menu', 'qp3'),
        'name_admin_bar'     => _x('Sản phẩm BĐS', 'add new on admin bar', 'qp3'),
        'add_new'            => _x('Thêm mới', 'property', 'qp3'),
        'add_new_item'       => __('Thêm sản phẩm BĐS', 'qp3'),
        'new_item'           => __('Sản phẩm BĐS mới', 'qp3'),
        'edit_item'          => __('Sửa sản phẩm BĐS', 'qp3'),
        'view_item'          => __('Xem sản phẩm BĐS', 'qp3'),
        'all_items'          => __('Tất cả sản phẩm BĐS', 'qp3'),
        'search_items'       => __('Tìm kiếm sản phẩm BĐS', 'qp3'),
        'parent_item_colon'  => __('Sản phẩm BĐS cha:', 'qp3'),
        'not_found'          => __('Không tìm thấy sản phẩm BĐS nào.', 'qp3'),
        'not_found_in_trash' => __('Không tìm thấy sản phẩm BĐS nào trong thùng rác.', 'qp3')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Sản phẩm bất động sản', 'qp3'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'bat-dong-san'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-building',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => false, // KHÔNG hỗ trợ Gutenberg
    );

    register_post_type('property', $args);
}
add_action('init', 'qp3_register_property_post_type');

/**
 * Register Property Type taxonomy
 */
function qp3_register_property_type_taxonomy() {
    $labels = array(
        'name'              => _x('Loại hình BĐS', 'taxonomy general name', 'qp3'),
        'singular_name'     => _x('Loại hình BĐS', 'taxonomy singular name', 'qp3'),
        'search_items'      => __('Tìm loại hình', 'qp3'),
        'all_items'         => __('Tất cả loại hình', 'qp3'),
        'parent_item'       => __('Loại hình cha', 'qp3'),
        'parent_item_colon' => __('Loại hình cha:', 'qp3'),
        'edit_item'         => __('Sửa loại hình', 'qp3'),
        'update_item'       => __('Cập nhật loại hình', 'qp3'),
        'add_new_item'      => __('Thêm loại hình', 'qp3'),
        'new_item_name'     => __('Tên loại hình mới', 'qp3'),
        'menu_name'         => __('Loại hình BĐS', 'qp3'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'loai-hinh-bds'),
        'show_in_rest'      => false, // KHÔNG hỗ trợ Gutenberg
    );

    register_taxonomy('property_type', array('property'), $args);
}
add_action('init', 'qp3_register_property_type_taxonomy');

/**
 * Register ACF fields for Property Type taxonomy
 */
function qp3_register_property_type_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_property_type_fields',
        'title' => 'Thông tin loại hình BĐS',
        'fields' => array(
            array(
                'key' => 'field_thumbnail',
                'label' => 'Ảnh đại diện',
                'name' => 'thumbnail',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_short_desc',
                'label' => 'Mô tả ngắn',
                'name' => 'short_desc',
                'type' => 'textarea',
                'rows' => 2,
            ),
            array(
                'key' => 'field_features',
                'label' => 'Đặc điểm nổi bật',
                'name' => 'features',
                'type' => 'repeater',
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'field_feature_item',
                        'label' => 'Đặc điểm',
                        'name' => 'feature_item',
                        'type' => 'text',
                    )
                )
            ),
            array(
                'key' => 'field_main_colors',
                'label' => 'Phối màu chính',
                'name' => 'main_colors',
                'type' => 'repeater',
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'field_color',
                        'label' => 'Màu sắc',
                        'name' => 'color',
                        'type' => 'color_picker',
                    )
                )
            ),
            array(
                'key' => 'field_materials',
                'label' => 'Vật liệu tiêu biểu',
                'name' => 'materials',
                'type' => 'text',
            ),
            array(
                'key' => 'field_functions',
                'label' => 'Công năng sử dụng',
                'name' => 'functions',
                'type' => 'textarea',
                'rows' => 2,
            ),
            array(
                'key' => 'field_layout_image',
                'label' => 'Layout mặt bằng',
                'name' => 'layout_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_design_style',
                'label' => 'Phong cách thiết kế',
                'name' => 'design_style',
                'type' => 'text',
            ),
            array(
                'key' => 'field_note',
                'label' => 'Ghi chú khác',
                'name' => 'note',
                'type' => 'textarea',
                'rows' => 2,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'property_type',
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
    ));
}
add_action('acf/init', 'qp3_register_property_type_acf_fields'); 
<?php

// Add custom style in child theme
function wpr_add_style()
{
    wp_enqueue_style(
        'wpr-academy-style',
        get_stylesheet_directory_uri() . '/style.css',
    );
}
add_action('wp_enqueue_scripts', 'wpr_add_style');

// Create CPT Engineers
function engineers()
{
    $args = [
        'label'               => __( 'Engineers', '' ),
        'labels' => [
            'name' => __('Engineers'),
            'singular_name' => __('Engineers'),
            'add_new_item' => __('Add engineer'),
            'add_new' => __('Add engineer'),
            'edit_item' => __('Edit engineer'),
        ],
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
        'show_in_rest' => true,
        'menu_position'       => 4,
    ];
    register_post_type('engineers', $args);
}
add_action('init', 'engineers');

// Create CPT Software
function software()
{
    $args = [
        'label'               => __( 'Software', '' ),
        'labels' => [
            'name' => __('Software'),
            'singular_name' => __('Software'),
            'add_new_item' => __('Add software'),
            'add_new' => __('Add software'),
            'edit_item' => __('Edit software'),
        ],
        'hierarchical' => true,
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-analytics',
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
        'show_in_rest' => true,
        'menu_position'       => 5,
    ];
    register_post_type('software', $args);
}
add_action('init', 'software');


<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

function create_custom_post_talk(){

    $labels = array(
        'name' => 'Manage talks',
        'singular_name' => 'Talk',
        'add_new' => 'Add new talk',
        'add_new_item' => 'Add new talk',
        'edit_item' => 'Edit talk',
        'new_item' => 'New talk',
        'view_item' => 'View talk',
        'search_items' => 'Search talks',
        'not_found' => 'No talks found',
        'not_found_in_trash' => 'No talks found in Trash',
        'parent_item_colon' => '',
    );
       $args = array(
        'label' => __('Talks'),
        'labels' => $labels, // from array above
        'public' => true,
        'can_export' => true,
        'show_ui' => true,
        '_builtin' => false,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-calendar', // from this list
        'hierarchical' => false,
        'rewrite' => array( "slug" => "talks" ), // defines URL base
        'supports'=> array('title', 'thumbnail', 'editor', 'excerpt'),
        'show_in_nav_menus' => true,
        'taxonomies' => array( 'talk_category', 'post_tag'), // own categories
        'has_archive' => true,
        'has_status' => true,

    );
       register_post_type('talk', $args); // used as internal identifier

};

add_action('init','create_custom_post_talk'); // define talk custom post type





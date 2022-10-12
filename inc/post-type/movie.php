<?php

/**
 * Create Movie Post Type
 */
function chadplugin_movie_post_type() {
    $labels = array(
        'name'                  => _x( 'Movies', 'Post type general name', 'chad-plugin' ),
        'singular_name'         => _x( 'Movie', 'Post type singular name', 'chad-plugin' ),
        'menu_name'             => _x( 'Movies', 'Admin Menu text', 'chad-plugin' ),
        'name_admin_bar'        => _x( 'Movie', 'Add New on Toolbar', 'chad-plugin' ),
        'add_new'               => __( 'Add New', 'chad-plugin' ),
        'add_new_item'          => __( 'Add New Movie', 'chad-plugin' ),
        'new_item'              => __( 'New Movie', 'chad-plugin' ),
        'edit_item'             => __( 'Edit Movie', 'chad-plugin' ),
        'view_item'             => __( 'View Movie', 'chad-plugin' ),
        'all_items'             => __( 'All Movies', 'chad-plugin' ),
        'search_items'          => __( 'Search Movies', 'chad-plugin' ),
        'parent_item_colon'     => __( 'Parent Movies:', 'chad-plugin' ),
        'not_found'             => __( 'No movie found.', 'chad-plugin' ),
        'not_found_in_trash'    => __( 'No movie found in Trash.', 'chad-plugin' ),
        'featured_image'        => _x( 'Movie Cover Image', '', 'chad-plugin' ),
        'set_featured_image'    => _x( 'Set cover image', '', 'chad-plugin' ),
        'remove_featured_image' => _x( 'Remove cover image', '', 'chad-plugin' ),
        'use_featured_image'    => _x( 'Use as cover image', '', 'chad-plugin' ),
        'archives'              => _x( 'Movie archives', '', 'chad-plugin' ),
        'insert_into_item'      => _x( 'Insert into movie', '', 'chad-plugin' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this movie', '', 'chad-plugin' ),
        'filter_items_list'     => _x( 'Filter movies list', '', 'chad-plugin' ),
        'items_list_navigation' => _x( 'Movies list navigation', '', 'chad-plugin' ),
        'items_list'            => _x( 'Movies list', '', 'chad-plugin' ),
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'movie' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
    register_post_type( 'movie', $args );
}
add_action( 'init', 'chadplugin_movie_post_type' );

/**
 * Update title placeholder
 */
function chadplugin_update_movie_title_placeholder() {
    $screen = get_current_screen();
    if( 'movie' === $screen->post_type ) {
        $title = 'Add movie name';
    }
    return $title;
}
add_filter('enter_title_here', 'chadplugin_update_movie_title_placeholder');
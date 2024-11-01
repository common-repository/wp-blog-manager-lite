<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$labels = array(
    'name' => _x( 'WP Blog Manager', 'post type general name', WPBM_TD ),
    'singular_name' => _x( 'WP Blog Manager', 'post type singular name', WPBM_TD ),
    'menu_name' => _x( 'WP Blog Manager', 'admin menu', WPBM_TD ),
    'name_admin_bar' => _x( 'WP Blog Manager', 'add new on admin bar', WPBM_TD ),
    'add_new' => _x( 'Add New', 'WP Blog Manager', WPBM_TD ),
    'add_new_item' => __( 'Add New WP Blog Manager', WPBM_TD ),
    'new_item' => __( 'New WP Blog Manager', WPBM_TD ),
    'edit_item' => __( 'Edit WP Blog Manager', WPBM_TD ),
    'view_item' => __( 'View WP Blog Manager', WPBM_TD ),
    'all_items' => __( 'All WP Blog Manager', WPBM_TD ),
    'search_items' => __( 'Search WP Blog Manager', WPBM_TD ),
    'parent_item_colon' => __( 'Parent WP Blog Manager:', WPBM_TD ),
    'not_found' => __( 'No WP Blog Manager found.', WPBM_TD ),
    'not_found_in_trash' => __( 'No WP Blog Manager found in Trash.', WPBM_TD )
);

$args = array(
    'labels' => $labels,
    'description' => __( 'Description.', WPBM_TD ),
    'public' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-feedback',
    'query_var' => true,
    'rewrite' => array( 'slug' => WPBM_TD ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title' )
);


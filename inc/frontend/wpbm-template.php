<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$query = new WP_Query( $args );
$rowCount = $query -> found_posts;
$class_layout = 'wpbm-layout-' . $wpbm_option[ 'wpbm_select_layout' ] . '-section';

if ( $query -> have_posts() ) {

    $wpbm_row = 1;
    while ( $query -> have_posts() ) {
        $query -> the_post();
        $product_post_id=get_the_ID();
        $wpbm_extra_option = get_post_meta( $product_post_id, 'wpbm_extra_option', true );
        if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'list' ) {
            include(WPBM_PATH . 'inc/frontend/content/wpbm-list.php');
        } else if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'grid' ) {
            include(WPBM_PATH . 'inc/frontend/content/wpbm-grid.php');
        } else {
            include(WPBM_PATH . 'inc/frontend/content/wpbm-slider.php');
        }
    }
} else {
    _e( 'Post not found', WPBM_TD );
}
wp_reset_postdata();

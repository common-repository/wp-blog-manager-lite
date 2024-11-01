<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $post;
$post_id = $post -> ID;
$wpbm_option = get_post_meta( $post_id, 'wpbm_option', true );
?>
<div class = "wpbm-backend-outer-wrap">
    <div class="wpbm-menu-wrapper">
        <ul class="wpbm-menu-tab">
            <li data-menu="post-settings" class="wpbm-tab-tigger wpbm-active">
                <span class="dashicons dashicons-welcome-write-blog"></span>
                <?php _e( 'Post Settings', WPBM_TD ) ?>
            </li>
            <li data-menu="layout-settings" class="wpbm-tab-tigger">
                <span class="dashicons dashicons-layout"></span>
                <?php _e( 'Layout Settings', WPBM_TD ) ?>
            </li>
            <li data-menu="general-settings" class="wpbm-tab-tigger">
                <span class="dashicons dashicons-admin-generic"></span>
                <?php _e( 'General Settings', WPBM_TD ) ?>
            </li>
            <li data-menu="social-share-settings" class="wpbm-tab-tigger">
                <span class="dashicons dashicons-share"></span>
                <?php _e( 'Social Share Settings', WPBM_TD ) ?>
            </li>
        </ul>
    </div>
    <div class ="wpbm-settings-wrap wpbm-active-container" data-menu-ref="post-settings">
        <?php include(WPBM_PATH . 'inc/admin/settings/wpbm-post.php'); ?>
    </div>
    <div class ="wpbm-settings-wrap" data-menu-ref="layout-settings">
        <?php include(WPBM_PATH . 'inc/admin/settings/wpbm-layout.php'); ?>
    </div>
    <div class ="wpbm-settings-wrap" data-menu-ref="general-settings">
        <?php include(WPBM_PATH . 'inc/admin/settings/wpbm-general.php'); ?>
    </div>
    <div class ="wpbm-settings-wrap" data-menu-ref="social-share-settings">
        <?php include(WPBM_PATH . 'inc/admin/settings/wpbm-social.php'); ?>
    </div>
    <div class ="wpbm-settings-wrap" data-menu-ref="filter-settings">
        <?php include(WPBM_PATH . 'inc/admin/settings/wpbm-filter.php'); ?>
    </div>
</div>

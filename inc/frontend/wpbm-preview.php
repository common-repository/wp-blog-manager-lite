<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<html>
    <head>
        <title><?php _e( 'Preview Blog', WPBM_TD ); ?></title>
        <?php wp_head(); ?>
        <style>
            body:before{display:none !important;}
            body:after{display:none !important;}
            body{background:#F1F1F1 !important;}
        </style>
    </head>
    <body>
        <div class="wpbm-preview-main-container">
            <div class="wpbm-preview-title-wrap">
                <div class="wpbm-preview-title"><?php _e( 'Preview Mode', WPBM_TD ); ?></div>
            </div>
            <div class="wpbm-preview-note"><?php _e( 'This is just the basic preview and it may look different when used in frontend as per your theme\'s styles.', WPBM_TD ); ?></div>
            <div class="wpbm-form-preview-wrap">
                <?php
                $blog_id = intval( sanitize_text_field( $_GET[ 'blog_id' ] ) );

                echo do_shortcode( '[wpbm id="' . $blog_id . '"]' );
                ?>
            </div>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>


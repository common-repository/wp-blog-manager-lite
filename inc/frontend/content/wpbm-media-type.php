<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$image = isset( $wpbm_option[ 'wpbm_image_size' ] ) ? esc_attr( $wpbm_option[ 'wpbm_image_size' ] ) : 'full';
?>
<div class="wpbm-image" >
<?php if ( has_post_thumbnail( $product_post_id ) ) { ?>
        <a href="<?php echo get_permalink( $product_post_id ); ?>" target="_blank"><?php echo get_the_post_thumbnail( $product_post_id, $image ); ?></a>
        <?php
    } else {
        ?>
        <img src="<?php echo WPBM_IMG_DIR; ?>/no-image-available.png" alt="No image available">
        <?php
    }
    ?></div>
    <?php if(( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'slider' ) && (isset($wpbm_option['wpbm_slide_height']) && !empty($wpbm_option['wpbm_slide_height'])) ) {?>
    	<style>
    		.wpbm-slider-template-1 .wpbm-image,
            .wpbm-slider-template-2 .wpbm-image {
    			height: <?php echo esc_attr($wpbm_option['wpbm_slide_height']).'px' ?>;
    		}
    	</style>
    <?php }
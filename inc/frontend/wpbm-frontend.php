<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$wpbm_mobile_detector = new WPBM_Mobile_Detect();
$post_id = $atts[ 'id' ];
//global $post;
$wpbm_option = get_post_meta( $post_id, 'wpbm_option', true );
$class_layout = 'wpbm-layout-' . $wpbm_option[ 'wpbm_select_layout' ] . '-section';
$random_num = rand( 111111111, 999999999 );
if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'list' ) {
    $wpbm_layout_class = 'wpbm-list-' . $wpbm_option[ 'wpbm_list_template' ] . ' wpbm-list wpbm-left-image';
} else if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'grid' ) {

    //  global $wpbm_mobile_detector;
    $desktop = esc_attr( $wpbm_option[ 'desktop_column' ] );
    $mobile = esc_attr( $wpbm_option[ 'mobile_column' ] );
    $tablet = esc_attr( $wpbm_option[ 'tablet_column' ] );
    if ( $wpbm_mobile_detector -> isMobile() && ! $wpbm_mobile_detector -> isTablet() ) {
        $wpbm_layout_class = 'wpbm-grid-' . $wpbm_option[ 'wpbm_grid_template' ] . ' wpbm-grid' . ' wpbm-mobile-col-' . $mobile;
    } else if ( $wpbm_mobile_detector -> isTablet() ) {
        $wpbm_layout_class = 'wpbm-grid-' . $wpbm_option[ 'wpbm_grid_template' ] . ' wpbm-grid' . ' wpbm-tablet-col-' . $tablet;
    } else {
        $wpbm_layout_class = 'wpbm-grid-' . $wpbm_option[ 'wpbm_grid_template' ] . ' wpbm-grid' . ' wpbm-desktop-col-' . $desktop;
    }
} else if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'slider' ) {
    $wpbm_layout_class = 'wpbm-slider-wrapper' . ' wpbm-slider-' . $wpbm_option[ 'wpbm_slider_template' ];
}
?>
<div class="wpbm-post-outer-wrapper-<?php echo esc_attr($random_num); ?> <?php
?> wpbm-main-blog-wrapper <?php echo esc_attr( $wpbm_layout_class ); ?>" <?php
     if ( $wpbm_option[ 'wpbm_select_layout' ] == 'slider' ) {
         ?>
         data-template = "<?php
         if ( isset( $wpbm_option[ 'wpbm_slider_template' ] ) ) {
             echo esc_attr( $wpbm_option[ 'wpbm_slider_template' ] );
         }
         ?>"
         data-controls = "<?php
         if ( isset( $wpbm_option[ 'wpbm_nav_controls' ] ) ) {
             echo esc_attr( $wpbm_option[ 'wpbm_nav_controls' ] );
         }
         ?>"
         data-auto = "<?php
         if ( isset( $wpbm_option[ 'wpbm_slide_auto' ] ) ) {
             echo esc_attr( $wpbm_option[ 'wpbm_slide_auto' ] );
         }
         ?>"
         data-speed = "<?php
         if ( isset( $wpbm_option[ 'wpbm_slide_speed' ] ) ) {
             echo esc_attr( $wpbm_option[ 'wpbm_slide_speed' ] );
         }
         ?>"
         data-pager = "<?php
         if ( isset( $wpbm_option[ 'wpbm_slide_pager' ] ) ) {
             echo esc_attr( $wpbm_option[ 'wpbm_slide_pager' ] );
         }
         ?>"
     <?php }
     ?>

     data-id="wpbm_<?php
     echo rand( 1111111, 9999999 );
     ?>">
         <?php
         if ( $wpbm_option[ 'wpbm_select_layout' ] == 'grid' || $wpbm_option[ 'wpbm_select_layout' ] == 'list' ) {
             ?>
        <div class="<?php echo esc_attr( $class_layout ); ?>">
            <?php
        }
        if ( isset( $wpbm_option[ 'wpbm_post_excerpt' ] ) ) {
            $excerpt = esc_attr( $wpbm_option[ 'wpbm_post_excerpt' ] );
        }
        if ( isset( $wpbm_option[ 'wpbm_post_number' ] ) ) {
            $post_number = esc_attr( $wpbm_option[ 'wpbm_post_number' ] );
        } else {
            $post_number = 4;
        }
        if ( isset( $wpbm_option[ 'wpbm_select_order' ] ) ) {
            $order = esc_attr( $wpbm_option[ 'wpbm_select_order' ] );
        } else {
            $order = 'DESC';
        }
        if ( isset( $wpbm_option[ 'wpbm_select_orderby' ] ) ) {
            $order_by = esc_attr( $wpbm_option[ 'wpbm_select_orderby' ] );
        } else {
            $order_by = 'date';
        }
        if ( isset( $wpbm_option[ 'wpbm_select_post_status' ] ) ) {
            $status = esc_attr( $wpbm_option[ 'wpbm_select_post_status' ] );
        } else {
            $status = 'publish';
        }

        $date_format = 'j F  Y';

        if ( isset( $wpbm_option[ 'post_type' ] ) ) {
            $post_type = esc_attr( $wpbm_option[ 'post_type' ] );
        }

        /*
         * Condition for taxonomy
         */

        $tax = esc_attr( $wpbm_option[ 'select_post_taxonomy' ] );

        if ( $wpbm_option[ 'simple_taxonomy_terms' ] == '' ) {
            $terms = get_terms( $tax, array( 'hide_empty' => false ) );
            $term_ids = wp_list_pluck( $terms, 'term_id' );
            $id = implode( ", ", array_keys( $term_ids ) );
            $tax_query = array( array(
                    'taxonomy' => $tax,
                    'field' => 'term_id',
                    'terms' => array( $id )
                ), );
        } else {
            $simple_term = esc_attr( $wpbm_option[ 'simple_taxonomy_terms' ] );
            $tax_query = array( array(
                    'taxonomy' => $tax,
                    'field' => 'term_id',
                    'terms' => $simple_term
                ), );
        }
        $args = array(
            'post_type' => $post_type,
            'order' => $order,
            'orderby' => $order_by,
            'posts_per_page' => $post_number,
            'post_status' => $status
        );
        if ( ! empty( $tax_query ) ) {
            $args[ 'tax_query' ] = $tax_query;
        }

        include(WPBM_PATH . 'inc/frontend/wpbm-template.php');
        if ( $wpbm_option[ 'wpbm_select_layout' ] == 'grid' || $wpbm_option[ 'wpbm_select_layout' ] == 'list' ) {
            ?>
        </div>
        <?php
    }
    ?>
</div>




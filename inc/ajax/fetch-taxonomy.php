<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
?>
<option value="select" <?php if ( isset( $wpbm_option[ 'select_post_taxonomy' ] ) && $wpbm_option[ 'select_post_taxonomy' ] == 'select' ) echo 'selected=="selected"'; ?>><?php echo _e( 'Select', WPBM_TD ); ?></option>

<?php
if ( $select_post == 'post' ) {
    $exclude = array( 'post_format' );

    foreach ( $taxonomies as $key => $value ) {
        if ( in_array( $key, $exclude ) ) {
            unset( $taxonomies[ $key ] );
        }
    }
    if ( is_array( $taxonomies ) ) {
        foreach ( $taxonomies as $tax ) {
            $value = $tax -> name;
            $label = $tax -> label;
            ?>
            <option value="<?php echo esc_attr( $value ); ?>" <?php if ( isset( $wpbm_option[ 'select_post_taxonomy' ] ) && $wpbm_option[ 'select_post_taxonomy' ] == $value ) echo 'selected=="selected"'; ?>><?php echo esc_attr( $label ); ?></option>
            <?php
        }
    }
}
else {
    foreach ( $taxonomies as $tax ) {
        $value = $tax -> name;
        $label = $tax -> label;
        ?>
        <option value="<?php echo esc_attr( $value ); ?>" <?php if ( isset( $wpbm_option[ 'select_post_taxonomy' ] ) && $wpbm_option[ 'select_post_taxonomy' ] == $value ) echo 'selected=="selected"'; ?>><?php echo esc_attr( $label ); ?></option>
        <?php
    }
}



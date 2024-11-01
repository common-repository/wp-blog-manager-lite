<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
?>
<div class="wpbm-post-selection-wrap">
    <div class ="wpbm-post-option-wrap">
        <label><?php _e( 'Post Type', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <?php
            $post_types = get_post_types();
            // Post types to exclude
            $exclude = array( 'attachment', 'revision', 'nav_menu_item', 'custom_css', 'customize_changeset', 'wpblogmanager', 'page' );
            // Filter out all unwanted post types
            foreach ( $post_types as $key => $value ) {
                if ( in_array( $key, $exclude ) ) {
                    unset( $post_types[ $key ] );
                }
            }
            if ( is_array( $post_types ) ) {
                ?>
                <select  name="wpbm_option[post_type]" class="wpbm-post-type">
                    <?php
                    foreach ( $post_types as $key => $value ) {
                        ?>
                        <option value="<?php echo esc_attr($key); ?>" <?php if ( isset( $wpbm_option[ 'post_type' ] ) && $wpbm_option[ 'post_type' ] == $key ) echo 'selected=="selected"'; ?>><?php echo esc_attr( $value ); ?></option>
                    <?php }
                    ?>
                </select>
            <?php } ?>
        </div>
    </div>

    <div class ="wpbm-query-setting-wrap wpbm-active-field" data-menu-ref="taxonomy-settings">
        <?php include(WPBM_PATH . 'inc/admin/filter/wpbm-taxonomy.php'); ?>
    </div>

    <div class="wpbm-separation-wrap">
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'OrderBy', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_select_orderby]" class="wpbm-select-orderby">
                    <option value="none"  <?php if ( isset( $wpbm_option[ 'wpbm_select_orderby' ] ) && $wpbm_option[ 'wpbm_select_orderby' ] == 'none' ) echo 'selected=="selected"'; ?>><?php _e( 'None', WPBM_TD ) ?></option>
                    <option value="ID"  <?php if ( isset( $wpbm_option[ 'wpbm_select_orderby' ] ) && $wpbm_option[ 'wpbm_select_orderby' ] == 'ID' ) echo 'selected=="selected"'; ?>><?php _e( 'ID', WPBM_TD ) ?></option>
                    <option value="author"  <?php if ( isset( $wpbm_option[ 'wpbm_select_orderby' ] ) && $wpbm_option[ 'wpbm_select_orderby' ] == 'author' ) echo 'selected=="selected"'; ?>><?php _e( 'Author', WPBM_TD ) ?></option>
                    <option value="title"  <?php if ( isset( $wpbm_option[ 'wpbm_select_orderby' ] ) && $wpbm_option[ 'wpbm_select_orderby' ] == 'title' ) echo 'selected=="selected"'; ?>><?php _e( 'Title', WPBM_TD ) ?></option>
                    <option value="name"  <?php if ( isset( $wpbm_option[ 'wpbm_select_orderby' ] ) && $wpbm_option[ 'wpbm_select_orderby' ] == 'name' ) echo 'selected=="selected"'; ?>><?php _e( 'Post Name', WPBM_TD ) ?></option>
                    <option value="type"  <?php if ( isset( $wpbm_option[ 'wpbm_select_orderby' ] ) && $wpbm_option[ 'wpbm_select_orderby' ] == 'type' ) echo 'selected=="selected"'; ?>><?php _e( 'Post Type', WPBM_TD ) ?></option>
                    <option value="date"  <?php if ( isset( $wpbm_option[ 'wpbm_select_orderby' ] ) && $wpbm_option[ 'wpbm_select_orderby' ] == 'date' ) echo 'selected=="selected"'; ?>><?php _e( 'Date', WPBM_TD ) ?></option>
                    <option value="modified"  <?php if ( isset( $wpbm_option[ 'wpbm_select_orderby' ] ) && $wpbm_option[ 'wpbm_select_orderby' ] == 'modified' ) echo 'selected=="selected"'; ?>><?php _e( 'Last Modified Date', WPBM_TD ) ?></option>
                    <option value="parent"  <?php if ( isset( $wpbm_option[ 'wpbm_select_orderby' ] ) && $wpbm_option[ 'wpbm_select_orderby' ] == 'parent' ) echo 'selected=="selected"'; ?>><?php _e( 'Parent ID', WPBM_TD ) ?></option>
                    <option value="rand"  <?php if ( isset( $wpbm_option[ 'wpbm_select_orderby' ] ) && $wpbm_option[ 'wpbm_select_orderby' ] == 'rand' ) echo 'selected=="selected"'; ?>><?php _e( 'Random', WPBM_TD ) ?></option>
                    <option value="comment_count"  <?php if ( isset( $wpbm_option[ 'wpbm_select_orderby' ] ) && $wpbm_option[ 'wpbm_select_orderby' ] == 'comment_count' ) echo 'selected=="selected"'; ?>><?php _e( 'Comment Count', WPBM_TD ) ?></option>
                    <option value="menu_order"  <?php if ( isset( $wpbm_option[ 'wpbm_select_orderby' ] ) && $wpbm_option[ 'wpbm_select_orderby' ] == 'menu_order' ) echo 'selected=="selected"'; ?>><?php _e( 'Menu Order', WPBM_TD ) ?></option>
                    <option value="meta_value"  <?php if ( isset( $wpbm_option[ 'wpbm_select_orderby' ] ) && $wpbm_option[ 'wpbm_select_orderby' ] == 'meta_value' ) echo 'selected=="selected"'; ?>><?php _e( 'Alphabetical Meta Value', WPBM_TD ) ?></option>
                    <option value="meta_value_num"  <?php if ( isset( $wpbm_option[ 'wpbm_select_orderby' ] ) && $wpbm_option[ 'wpbm_select_orderby' ] == 'meta_value_num' ) echo 'selected=="selected"'; ?>><?php _e( 'Numeric Meta Value', WPBM_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class="wpbm-orderby-meta-warp" style="display: none;">
            <div class ="wpbm-post-option-wrap">
                <label><?php _e( 'Meta Key', WPBM_TD ); ?></label>
                <div class="wpbm-post-field-wrap">
                    <input type="text" class="wpbm-orderby-key" name="wpbm_option[wpbm_orderby_key]" value="<?php
                    if ( isset( $wpbm_option[ 'wpbm_orderby_key' ] ) ) {
                        echo esc_attr( $wpbm_option[ 'wpbm_orderby_key' ] );
                    }
                    ?>" >
                </div>
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Order', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_select_order]" class="wpbm-select-order">
                    <option value="ASC"  <?php if ( isset( $wpbm_option[ 'wpbm_select_order' ] ) && $wpbm_option[ 'wpbm_select_order' ] == 'ASC' ) echo 'selected=="selected"'; ?>><?php _e( 'Ascending', WPBM_TD ) ?></option>
                    <option value="DESC"  <?php if ( isset( $wpbm_option[ 'wpbm_select_order' ] ) && $wpbm_option[ 'wpbm_select_order' ] == 'DESC' ) echo 'selected=="selected"'; ?>><?php _e( 'Descending', WPBM_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Post Status', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_select_post_status]" class="wpbm-select-post-status">
                    <option value="publish"  <?php if ( isset( $wpbm_option[ 'wpbm_select_post_status' ] ) && $wpbm_option[ 'wpbm_select_post_status' ] == 'publish' ) echo 'selected=="selected"'; ?>><?php _e( 'Publish', WPBM_TD ) ?></option>
                    <option value="pending"  <?php if ( isset( $wpbm_option[ 'wpbm_select_post_status' ] ) && $wpbm_option[ 'wpbm_select_post_status' ] == 'pending' ) echo 'selected=="selected"'; ?>><?php _e( 'Pending', WPBM_TD ) ?></option>
                    <option value="draft"  <?php if ( isset( $wpbm_option[ 'wpbm_select_post_status' ] ) && $wpbm_option[ 'wpbm_select_post_status' ] == 'draft' ) echo 'selected=="selected"'; ?>><?php _e( 'Draft', WPBM_TD ) ?></option>
                    <option value="auto-draft"  <?php if ( isset( $wpbm_option[ 'wpbm_select_post_status' ] ) && $wpbm_option[ 'wpbm_select_post_status' ] == 'auto-draft' ) echo 'selected=="selected"'; ?>><?php _e( 'Auto Draft', WPBM_TD ) ?></option>
                    <option value="future"  <?php if ( isset( $wpbm_option[ 'wpbm_select_post_status' ] ) && $wpbm_option[ 'wpbm_select_post_status' ] == 'future' ) echo 'selected=="selected"'; ?>><?php _e( 'Future', WPBM_TD ) ?></option>
                    <option value="private"  <?php if ( isset( $wpbm_option[ 'wpbm_select_post_status' ] ) && $wpbm_option[ 'wpbm_select_post_status' ] == 'private' ) echo 'selected=="selected"'; ?>><?php _e( 'Private', WPBM_TD ) ?></option>
                    <option value="inherit"  <?php if ( isset( $wpbm_option[ 'wpbm_select_post_status' ] ) && $wpbm_option[ 'wpbm_select_post_status' ] == 'inherit' ) echo 'selected=="selected"'; ?>><?php _e( 'Inherit', WPBM_TD ) ?></option>
                    <option value="trash"  <?php if ( isset( $wpbm_option[ 'wpbm_select_post_status' ] ) && $wpbm_option[ 'wpbm_select_post_status' ] == 'trash' ) echo 'selected=="selected"'; ?>><?php _e( 'Trash', WPBM_TD ) ?></option>
                </select>
            </div>
        </div>
    </div>
</div>
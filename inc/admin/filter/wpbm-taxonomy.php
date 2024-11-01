<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="wpbm-taxonomy-main-wrap">
    <div class ="wpbm-post-option-wrap">
        <label><?php _e( 'Taxonomy/Category', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <select name="wpbm_option[select_post_taxonomy]" class="wpbm-select-taxonomy">
                <option value="select" <?php if ( isset( $wpbm_option[ 'select_post_taxonomy' ] ) && $wpbm_option[ 'select_post_taxonomy' ] == 'select' ) echo 'selected=="selected"'; ?>><?php echo _e( 'Choose Taxonomy', WPBM_TD ); ?></option>
                <?php
                $taxonomies = get_object_taxonomies( 'post', 'objects' );
                $exclude = array( 'post_format' );
                // Filter out all unwanted post types
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
                        <option value="<?php echo $value;
                        ?>" <?php if ( isset( $wpbm_option[ 'select_post_taxonomy' ] ) && $wpbm_option[ 'select_post_taxonomy' ] == $value ) echo 'selected=="selected"'; ?>><?php echo $label; ?></option>
                                <?php
                            }
                        }
                        ?>
            </select>
            <p class="description"><?php _e( 'Please select the post type first', WPBM_TD ); ?></p>
        </div>
    </div>
    <div class="wpbm-simple-terms-wrap" >
        <div class="wpbm-post-option-wrap">
            <label><?php _e( 'Term', WPBM_TD ); ?></label>
            <div class="wpbm-tooltip-icon">
                <span class="dashicons dashicons-info"></span>
                <span class="wpbm-tooltip-info"><?php _e( 'Terms refers to the items in a taxonomy.
For example, a website has categories books, politics, and blogging in it. While category itself is a taxonomy the items inside it are called terms.', WPBM_TD ); ?></span>
            </div>
            <div class="wpbm-post-field-wrap">
                <div class="wpbm-info-wrap">
                    <select name="wpbm_option[simple_taxonomy_terms]" class="wpbm-simple-taxonomy-term">
                        <option value=""><?php echo _e( 'Choose Term', WPBM_TD ); ?></option>
                        <?php
                        if ( ! empty( $wpbm_option[ 'simple_taxonomy_terms' ] ) ) {
                            echo $this -> wpbm_fetch_category_list( $wpbm_option[ 'select_post_taxonomy' ], $wpbm_option[ 'simple_taxonomy_terms' ] );
                        }
                        ?>
                    </select>
                    <p class="description"><?php _e( 'Please select taxonomy first.', WPBM_TD ); ?></p>
                </div>

            </div>
        </div>
    </div>
</div>
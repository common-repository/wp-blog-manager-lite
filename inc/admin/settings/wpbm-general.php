<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="wpbm-general-outer-wrap">
    <div class = "wpbm-post-option-wrap">
        <label><?php _e( 'Post Content', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <label><input type="radio" value="full-text" name="wpbm_option[post_content]" <?php
                if ( isset( $wpbm_option[ 'post_content' ] ) ) {
                    checked( $wpbm_option[ 'post_content' ], 'full-text' );
                }
                ?> class="wpbm-post-content"/><?php _e( "Full Text", WPBM_TD ); ?></label>
            <label><input type="radio" value="excerpt" name="wpbm_option[post_content]" <?php
                if ( isset( $wpbm_option[ 'post_content' ] ) ) {
                    checked( $wpbm_option[ 'post_content' ], 'excerpt' );
                }
                ?>  class="wpbm-post-content"/><?php _e( 'Excerpt Text', WPBM_TD ); ?></label>
            <div class="wpbm-excerpt-wrap" <?php if ( isset( $wpbm_option[ 'post_content' ] ) && $wpbm_option[ 'post_content' ] == 'excerpt' ) { ?> style="display:block;" <?php } else {
                    ?>
                     style = "display:none;"
                     <?php
                 }
                 ?> >
                <input type="number" class="wpbm-post-excerpt" min="10" name="wpbm_option[wpbm_post_excerpt]"  value="<?php
                if ( isset( $wpbm_option[ 'wpbm_post_excerpt' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_post_excerpt' ] );
                } else {
                    echo '15';
                }
                ?>"/>
                <p class="description"><?php _e( 'Enter the length of post content', WPBM_TD ) ?></p>
            </div>
        </div>
    </div>
    <div class="wpbm-post-option-wrap">
        <label><?php _e( 'Number of Post', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <input type="number" class="wpbm-post-number" min="1" name="wpbm_option[wpbm_post_number]"  value="<?php
            if ( isset( $wpbm_option[ 'wpbm_post_number' ] ) ) {
                echo esc_attr( $wpbm_option[ 'wpbm_post_number' ] );
            } else {
                echo '5';
            }
            ?>"/>
            <p class="description"><?php _e( 'Enter the excerpt length for post content', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-category-view-check" class="wpbm-category-view">
            <?php _e( 'Display Post Category', WPBM_TD ); ?>
        </label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-show-category wpbm-checkbox" value="<?php
                if ( isset( $wpbm_option[ 'wpbm_show_category' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_show_category' ] );
                } else {
                    echo '0';
                }
                ?>" name="wpbm_option[wpbm_show_category]" <?php if ( isset( $wpbm_option[ 'wpbm_show_category' ] ) && $wpbm_option[ 'wpbm_show_category' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"><?php _e( 'Enable to show category', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-tag-view-check" class="wpbm-tag-view"><?php _e( 'Display Post Tag', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-show-tag wpbm-checkbox" value="<?php
                if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_show_tag' ] );
                } else {
                    echo '0';
                }
                ?>" name="wpbm_option[wpbm_show_tag]" <?php if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) && $wpbm_option[ 'wpbm_show_tag' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post tag', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-author-view-check" class="wpbm-author-view"><?php _e( 'Display Post Author', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-show-author wpbm-checkbox"  value="<?php
                if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_show_author' ] );
                } else {
                    echo '0';
                }
                ?>" name="wpbm_option[wpbm_show_author]" <?php if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post author', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-comment-view-check" class="wpbm-comment-view"><?php _e( 'Display Post Comment Count', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-show-comment wpbm-checkbox"  value="<?php
                if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_show_comment' ] );
                } else {
                    echo '0';
                }
                ?>" name="wpbm_option[wpbm_show_comment]" <?php if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) && $wpbm_option[ 'wpbm_show_comment' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post comment count', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-date-view-check" class="wpbm-date-view"><?php _e( 'Display Post Date', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-show-date wpbm-checkbox"  value="<?php
                if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_show_date' ] );
                } else {
                    echo '0';
                }
                ?>" name="wpbm_option[wpbm_show_date]" <?php if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post date', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-read-more-check" class="wpbm-read-more-view"><?php _e( 'Display Read More Link', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-show-read-more wpbm-checkbox" name="wpbm_option[wpbm_show_read_more]"  value="<?php
                if ( isset( $wpbm_option[ 'wpbm_show_read_more' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_show_read_more' ] );
                } else {
                    echo '0';
                }
                ?>" <?php if ( isset( $wpbm_option[ 'wpbm_show_read_more' ] ) && $wpbm_option[ 'wpbm_show_read_more' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show read more post link', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class="wpbm-read-more-wrap" <?php if ( isset( $wpbm_option[ 'wpbm_show_read_more' ] ) && $wpbm_option[ 'wpbm_show_read_more' ] == '1' ) {
                    ?> style="display:block;" <?php } else { ?> style="display:none;" <?php }
                ?>>
        <div class ="wpbm-post-option-wrap">
            <label for="read-more-text" class="wpbm-read-more-text"><?php _e( 'Read More Text', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <input type="text" class="wpbm-post-link-text" placeholder="Read More" name="wpbm_option[wpbm_post_link_text]" value="<?php
                if ( isset( $wpbm_option[ 'wpbm_post_link_text' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] );
                }
                ?>">
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label for="wpbm-post-link" class="wpbm-post-label"><?php _e( 'Post Link', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <label><input type="radio" value="post_link" name="wpbm_option[post_url]" <?php
                    if ( isset( $wpbm_option[ 'post_url' ] ) ) {
                        checked( $wpbm_option[ 'post_url' ], 'post_link' );
                    }
                    ?> class="wpbm-post-link"/><?php _e( "Post Link", WPBM_TD ); ?></label>
                <label><input type="radio" value="custom_link" name="wpbm_option[post_url]" <?php
                    if ( isset( $wpbm_option[ 'post_url' ] ) ) {
                        checked( $wpbm_option[ 'post_url' ], 'custom_link' );
                    }
                    ?>  class="wpbm-post-link"/><?php _e( 'Custom Link', WPBM_TD ); ?></label>
            </div>
        </div>
        <div class="wpbm-custom-link-wrap"  <?php if ( isset( $wpbm_option[ 'post_url' ] ) && $wpbm_option[ 'post_url' ] == 'post_link' ) {
                        ?> style="display:none;" <?php }
                    ?>>
            <div class ="wpbm-post-option-wrap">
                <label for="custom-link-url" class="wpbm-custom-url"><?php _e( 'Custom Link URL', WPBM_TD ); ?></label>
                <div class="wpbm-post-field-wrap">
                    <input type="text" class="wpbm-custom-link" placeholder="www.example.com" name="wpbm_option[wpbm_custom_url]" value="<?php
                    if ( isset( $wpbm_option[ 'wpbm_custom_url' ] ) ) {
                        echo esc_url( $wpbm_option[ 'wpbm_custom_url' ] );
                    }
                    ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="wpbm-post-option-wrap">
        <label><?php _e( 'Image Size', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <select name="wpbm_option[wpbm_image_size]" class="wpbm-select-image-size">
                <option value="full"  <?php if ( isset( $wpbm_option[ 'wpbm_image_size' ] ) && $wpbm_option[ 'wpbm_image_size' ] == 'full' ) echo 'selected=="selected"'; ?>><?php _e( 'Original', WPBM_TD ) ?></option>
                <option value="large"  <?php if ( isset( $wpbm_option[ 'wpbm_image_size' ] ) && $wpbm_option[ 'wpbm_image_size' ] == 'large' ) echo 'selected=="selected"'; ?>><?php _e( 'Large', WPBM_TD ) ?></option>
                <option value="medium"  <?php if ( isset( $wpbm_option[ 'wpbm_image_size' ] ) && $wpbm_option[ 'wpbm_image_size' ] == 'medium' ) echo 'selected=="selected"'; ?>><?php _e( 'Medium', WPBM_TD ) ?></option>
                <option value="thumbnail"  <?php if ( isset( $wpbm_option[ 'wpbm_image_size' ] ) && $wpbm_option[ 'wpbm_image_size' ] == 'thumbnail' ) echo 'selected=="selected"'; ?>><?php _e( 'Thumbnail', WPBM_TD ) ?></option>
            </select>
        </div>
    </div>
</div>
<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="wpbm-social-outer-wrap">
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-social-share-check" class="wpbm-social-share">
            <?php _e( 'Social Share', WPBM_TD ); ?>
        </label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-show-social-share wpbm-checkbox" value="<?php
                if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_show_social_share' ] );
                } else {
                    echo '0';
                }
                ?>" name="wpbm_option[wpbm_show_social_share]" <?php if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"><?php _e( 'Enable to show social share link', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class="wpbm-social-container"
    <?php if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
        ?> style="display: block;"
             <?php
         } else {
             ?>
             style="display: none;"
             <?php
         }
         ?>>
        <div class ="wpbm-post-option-wrap">
            <label for="wpbm-facebook-share-check" class="wpbm-facebook-share">
                <?php _e( 'Facebook Share Link', WPBM_TD ); ?>
            </label>
            <div class="wpbm-post-field-wrap">
                <label class="wpbm-switch">
                    <input type="checkbox" class="wpbm-show-facebook-share wpbm-checkbox" value="<?php
                    if ( isset( $wpbm_option[ 'wpbm_show_facebook_share' ] ) ) {
                        echo esc_attr( $wpbm_option[ 'wpbm_show_facebook_share' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="wpbm_option[wpbm_show_facebook_share]" <?php if ( isset( $wpbm_option[ 'wpbm_show_facebook_share' ] ) && $wpbm_option[ 'wpbm_show_facebook_share' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                    <div class="wpbm-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show facebook share link', WPBM_TD ) ?></p>
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label for="wpbm-twitter-share-check" class="wpbm-twitter-share">
                <?php _e( 'Twitter Share Link', WPBM_TD ); ?>
            </label>
            <div class="wpbm-post-field-wrap">
                <label class="wpbm-switch">
                    <input type="checkbox" class="wpbm-show-twitter-share wpbm-checkbox" value="<?php
                    if ( isset( $wpbm_option[ 'wpbm_show_twitter_share' ] ) ) {
                        echo esc_attr( $wpbm_option[ 'wpbm_show_twitter_share' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="wpbm_option[wpbm_show_twitter_share]" <?php if ( isset( $wpbm_option[ 'wpbm_show_twitter_share' ] ) && $wpbm_option[ 'wpbm_show_twitter_share' ] == '1' ) { ?>checked="checked"<?php } ?> />
                    <div class="wpbm-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show twitter share link', WPBM_TD ) ?></p>
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label for="wpbm-google-share-check" class="wpbm-google-share"><?php _e( 'Google Plus Share Link', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <label class="wpbm-switch">
                    <input type="checkbox" class="wpbm-show-google-share wpbm-checkbox" value="<?php
                    if ( isset( $wpbm_option[ 'wpbm_show_google_share' ] ) ) {
                        echo esc_attr( $wpbm_option[ 'wpbm_show_google_share' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="wpbm_option[wpbm_show_google_share]" <?php if ( isset( $wpbm_option[ 'wpbm_show_google_share' ] ) && $wpbm_option[ 'wpbm_show_google_share' ] == '1' ) { ?>checked="checked"<?php } ?> />
                    <div class="wpbm-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show google plus share link', WPBM_TD ) ?></p>
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label for="wpbm-linkedin-share-check" class="wpbm-linkedin-share"><?php _e( 'Linkedin Share Link', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <label class="wpbm-switch">
                    <input type="checkbox" class="wpbm-show-linkedin-share wpbm-checkbox" value="<?php
                    if ( isset( $wpbm_option[ 'wpbm_show_linkedin_share' ] ) ) {
                        echo esc_attr( $wpbm_option[ 'wpbm_show_linkedin_share' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="wpbm_option[wpbm_show_linkedin_share]" <?php if ( isset( $wpbm_option[ 'wpbm_show_linkedin_share' ] ) && $wpbm_option[ 'wpbm_show_linkedin_share' ] == '1' ) { ?>checked="checked"<?php } ?> />
                    <div class="wpbm-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show linkedin share link', WPBM_TD ) ?></p>
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label for="wpbm-mail-share-check" class="wpbm-mail-share"><?php _e( 'Share Via Email', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <label class="wpbm-switch">
                    <input type="checkbox" class="wpbm-show-mail-share wpbm-checkbox" value="<?php
                    if ( isset( $wpbm_option[ 'wpbm_show_mail_share' ] ) ) {
                        echo esc_attr( $wpbm_option[ 'wpbm_show_mail_share' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="wpbm_option[wpbm_show_mail_share]" <?php if ( isset( $wpbm_option[ 'wpbm_show_mail_share' ] ) && $wpbm_option[ 'wpbm_show_mail_share' ] == '1' ) { ?>checked="checked"<?php } ?> />
                    <div class="wpbm-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show share via email', WPBM_TD ) ?></p>
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label for="wpbm-pinterest-share-check" class="wpbm-pinterest-share"><?php _e( 'Pinterest Share Link', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <label class="wpbm-switch">
                    <input type="checkbox" class="wpbm-show-pinterest-share wpbm-checkbox" value="<?php
                    if ( isset( $wpbm_option[ 'wpbm_show_pinterest_share' ] ) ) {
                        echo esc_attr( $wpbm_option[ 'wpbm_show_pinterest_share' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="wpbm_option[wpbm_show_pinterest_share]" <?php if ( isset( $wpbm_option[ 'wpbm_show_pinterest_share' ] ) && $wpbm_option[ 'wpbm_show_pinterest_share' ] == '1' ) { ?>checked="checked"<?php } ?> />
                    <div class="wpbm-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show pinterest share link', WPBM_TD ) ?></p>
            </div>
        </div>
    </div>
</div>
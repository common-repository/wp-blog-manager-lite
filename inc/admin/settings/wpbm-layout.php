<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="wpbm-layout-outer-wrap">
    <div class ="wpbm-post-option-wrap">
        <label><?php _e( 'Layout', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <select name="wpbm_option[wpbm_select_layout]" class="wpbm-select-layout">
                <option value="grid"  <?php if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'grid' ) echo 'selected=="selected"'; ?>><?php _e( 'Grid', WPBM_TD ) ?></option>
                <option value="list"  <?php if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'list' ) echo 'selected=="selected"'; ?>><?php _e( 'List', WPBM_TD ) ?></option>
                <option value="slider"  <?php if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'slider' ) echo 'selected=="selected"'; ?>><?php _e( 'Slider', WPBM_TD ) ?></option>
            </select>
        </div>
    </div>
    <div class="wpbm-grid-setting-wrap">
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Grid Template', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_grid_template]" class="wpbm-grid-template">
                    <?php for ( $k = 1; $k <= 3; $k ++ ) { ?>
                        <option value="template-<?php echo esc_attr($k); ?>" <?php if ( ! empty( $wpbm_option[ 'wpbm_grid_template' ] ) ) selected( $wpbm_option[ 'wpbm_grid_template' ], 'template-' . $k ); ?>><?php _e( 'Template ', WPBM_TD ) ?><?php echo esc_attr($k); ?></option>
                    <?php } ?>    </select>
                <p class="description">
                <div class="wpbm-grid-demo wpbm-preview-image">
                    <?php
                    for ( $cnt = 1; $cnt <= 3; $cnt ++ ) {
                        if ( isset( $wpbm_option[ 'wpbm_grid_template' ] ) ) {
                            $option_value = $wpbm_option[ 'wpbm_grid_template' ];
                            $exploed_array = explode( '-', $option_value );
                            $cnt_num = $exploed_array[ 1 ];
                            if ( $cnt != $cnt_num ) {
                                $style = "style='display:none;'";
                            } else {
                                $style = '';
                            }
                        }
                        ?>
                        <div class="wpbm-grid-common" id="wpbm-grid-demo-<?php echo esc_attr($cnt); ?>" <?php if ( isset( $style ) ) echo esc_attr($style); ?>>
                            <h4><?php _e( 'Template', WPBM_TD ); ?> <?php echo esc_attr($cnt); ?> <?php _e( 'Preview', WPBM_TD ); ?></h4>
                            <img src="<?php echo WPBM_IMG_DIR . '/demo/grid/' . $cnt . '.jpg' ?>"/>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="wpbm-post-option-wrap">
            <label><?php _e( 'Desktop Column', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <?php
                $desktop_column = isset( $wpbm_option[ 'desktop_column' ] ) ? esc_attr( $wpbm_option[ 'desktop_column' ] ) : '2';
                ?>
                <div class="wpbm-grid-column" data-max="4" data-min="1" data-value="<?php echo esc_attr( $desktop_column ); ?>"></div>
                <input type="number" min="1" name="wpbm_option[desktop_column]" max="4" class="wpbm-desktop-column" value="<?php echo esc_attr( $desktop_column ); ?>" readonly="readonly"/>
            </div>
        </div>
        <div class="wpbm-post-option-wrap">
            <label><?php _e( 'Tablet/IPad Column', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <?php
                $tablet_column = isset( $wpbm_option[ 'tablet_column' ] ) ? esc_attr( $wpbm_option[ 'tablet_column' ] ) : '2';
                ?>
                <div class="wpbm-grid-column" data-max="3" data-min="1" data-value="<?php echo esc_attr( $tablet_column ); ?>"></div>
                <input type="number" min="1" name="wpbm_option[tablet_column]" max="3" class="wpbm-tablet-column" value="<?php echo esc_attr( $tablet_column ); ?>" readonly="readonly"/>
            </div>
        </div>
        <div class="wpbm-post-option-wrap">
            <label><?php _e( 'Mobile Column', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <?php
                $mobile_column = isset( $wpbm_option[ 'mobile_column' ] ) ? esc_attr( $wpbm_option[ 'mobile_column' ] ) : '1';
                ?>
                <div class="wpbm-grid-column" data-max="2" data-min="1" data-value="<?php echo esc_attr( $mobile_column ); ?>"></div>
                <input type="number" min="1" name="wpbm_option[mobile_column]" max="3" class="wpbm-mobile-column" value="<?php echo esc_attr( $mobile_column ); ?>" readonly="readonly"/>
            </div>
        </div>
    </div>

    <div class="wpbm-list-setting-wrap" style="display:none;">
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'List Template', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_list_template]" class="wpbm-list-template">
                    <?php for ( $k = 1; $k <= 2; $k ++ ) { ?>
                        <option value="template-<?php echo esc_attr($k); ?>" <?php if ( ! empty( $wpbm_option[ 'wpbm_list_template' ] ) ) selected( $wpbm_option[ 'wpbm_list_template' ], 'template-' . $k ); ?>><?php _e( 'Template ', WPBM_TD ) ?><?php echo esc_attr($k); ?></option>
                    <?php } ?>    </select>
                <div class="wpbm-list-demo wpbm-preview-image">
                    <?php
                    for ( $cnt = 1; $cnt <= 2; $cnt ++ ) {
                        if ( isset( $wpbm_option[ 'wpbm_list_template' ] ) ) {
                            $option_value = $wpbm_option[ 'wpbm_list_template' ];
                            $exploed_array = explode( '-', $option_value );
                            $cnt_num = $exploed_array[ 1 ];
                            if ( $cnt != $cnt_num ) {
                                $style = "style='display:none;'";
                            } else {
                                $style = '';
                            }
                        }
                        ?>
                        <div class="wpbm-list-common" id="wpbm-list-demo-<?php echo esc_attr($cnt); ?>" <?php if ( isset( $style ) ) echo esc_attr($style); ?>>
                            <h4><?php _e( 'Template', WPBM_TD ); ?> <?php echo esc_attr($cnt); ?> <?php _e( 'Preview', WPBM_TD ); ?></h4>
                            <img src="<?php echo WPBM_IMG_DIR . '/demo/list/' . $cnt . '.jpg' ?>"/>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="wpbm-slider-setting-wrap" style="display:none;">
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Slider Template', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_slider_template]" class="wpbm-slider-template">
                    <?php for ( $k = 1; $k <= 2; $k ++ ) { ?>
                        <option value="template-<?php echo esc_attr($k); ?>" <?php if ( ! empty( $wpbm_option[ 'wpbm_slider_template' ] ) ) selected( $wpbm_option[ 'wpbm_slider_template' ], 'template-' . $k ); ?>><?php _e( 'Template ', WPBM_TD ) ?><?php echo esc_attr($k); ?></option>
                    <?php } ?>    </select>
                <div class="wpbm-slider-demo wpbm-preview-image">
                    <?php
                    for ( $cnt = 1; $cnt <= 2; $cnt ++ ) {
                        if ( isset( $wpbm_option[ 'wpbm_slider_template' ] ) ) {
                            $option_value = $wpbm_option[ 'wpbm_slider_template' ];
                            $exploed_array = explode( '-', $option_value );
                            $cnt_num = $exploed_array[ 1 ];
                            if ( $cnt != $cnt_num ) {
                                $style = "style='display:none;'";
                            } else {
                                $style = '';
                            }
                        }
                        ?>
                        <div class="wpbm-slider-common" id="wpbm-slider-demo-<?php echo esc_attr($cnt); ?>" <?php if ( isset( $style ) ) echo esc_attr($style); ?>>
                            <h4><?php _e( 'Template', WPBM_TD ); ?> <?php echo esc_attr($cnt); ?> <?php _e( 'Preview', WPBM_TD ); ?></h4>
                            <img src="<?php echo WPBM_IMG_DIR . '/demo/slider/' . $cnt . '.jpg' ?>"/>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="wpbm-slider-option-block" style="display: none;">
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Controls', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_nav_controls]" class="wpbm-nav-controls">
                    <option value="true"  <?php if ( isset( $wpbm_option[ 'wpbm_nav_controls' ] ) && $wpbm_option[ 'wpbm_nav_controls' ] == 'true' ) echo 'selected=="selected"'; ?>><?php _e( 'True', WPBM_TD ) ?></option>
                    <option value="false"  <?php if ( isset( $wpbm_option[ 'wpbm_nav_controls' ] ) && $wpbm_option[ 'wpbm_nav_controls' ] == 'false' ) echo 'selected=="selected"'; ?>><?php _e( 'False', WPBM_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class="wpbm-post-option-wrap">
            <label><?php _e( 'Auto', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_slide_auto]" class="wpbm-slide-auto">
                    <option value="true"  <?php if ( isset( $wpbm_option[ 'wpbm_slide_auto' ] ) && $wpbm_option[ 'wpbm_slide_auto' ] == 'true' ) echo 'selected=="selected"'; ?>><?php _e( 'True', WPBM_TD ) ?></option>
                    <option value="false"  <?php if ( isset( $wpbm_option[ 'wpbm_slide_auto' ] ) && $wpbm_option[ 'wpbm_slide_auto' ] == 'false' ) echo 'selected=="selected"'; ?>><?php _e( 'False', WPBM_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Auto Play Timeout', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <input type="number" name="wpbm_option[wpbm_slide_speed]" class="wpbm-slide-speed" value="<?php
                if ( isset( $wpbm_option[ 'wpbm_slide_speed' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_slide_speed' ] );
                } else {
                    echo '1000';
                }
                ?>">
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Pager', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_slide_pager]" class="wpbm-slide-pager">
                    <option value="true"  <?php if ( isset( $wpbm_option[ 'wpbm_slide_pager' ] ) && $wpbm_option[ 'wpbm_slide_pager' ] == 'true' ) echo 'selected=="selected"'; ?>><?php _e( 'True', WPBM_TD ) ?></option>
                    <option value="false"  <?php if ( isset( $wpbm_option[ 'wpbm_slide_pager' ] ) && $wpbm_option[ 'wpbm_slide_pager' ] == 'false' ) echo 'selected=="selected"'; ?>><?php _e( 'False', WPBM_TD ) ?></option>
                </select>
            </div>
        </div>
         <div class ="wpbm-post-option-wrap">
            <label><?php _e('Height', WPBM_TD); ?></label>
            <div class="wpbm-post-field-wrap">
                <input type="number" name="wpbm_option[wpbm_slide_height]" value="<?php echo (isset($wpbm_option['wpbm_slide_height']) && !empty($wpbm_option['wpbm_slide_height'])) ?  esc_attr($wpbm_option['wpbm_slide_height']) : ""; ?>" placeholder="500">
            </div>
        </div>
    </div>
</div>


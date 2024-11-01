<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div  class="wpbm-shortcode-usage-wrapper">
    <ul class="wpbm-usage-tab-wrap">
        <li data-usage="tab-1" class="wpbm-usage-trigger wpbm-usage-active">
            <?php _e( 'Shortcode', WPBM_TD ); ?>
        </li>
        <li data-usage="tab-2" class="wpbm-usage-trigger">
            <?php _e( 'Template Include', WPBM_TD ); ?>
        </li>
    </ul>
    <div class="wpbm-usage-post" data-usage-ref="tab-1">
        <p class="description"><?php _e( 'Copy and paste the shortcode directly into any WordPress post or page.', WPBM_TD ) ?></p>
        <div class="wpbm-shortcode-page-wrap">
            <input type='text' value='[wpbm id="<?php echo esc_attr($post -> ID); ?>"]' readonly="readonly">
        </div>
    </div>
    <div class="wpbm-usage-post" data-usage-ref="tab-2" style="display: none;">
        <p class="description"><?php
            _e( 'Copy and paste this code into a template file to include the WP Blog Manager within your theme.', WPBM_TD );
            ?></p>
        <div class = "wpbm-shortcode-theme-wrap">
            &lt;?php echo do_shortcode("[wpbm id='<?php echo esc_attr($post -> ID); ?>']");
            ?&gt;
        </div>
    </div>
</div>

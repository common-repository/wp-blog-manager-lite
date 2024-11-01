<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="wpbm-header">
    <div>
        <div id="wpbm-fb-root"></div>
        <script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
        <script>!function(d, s, id){var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location)?'http':'https'; if (!d.getElementById(id)){js = d.createElement(s); js.id = id; js.src = p + '://platform.twitter.com/widgets.js'; fjs.parentNode.insertBefore(js, fjs); }}(document, 'script', 'twitter-wjs');</script>
    </div>
    <div class="wpbm-header-section">
        <div class="wpbm-header-left">
            <div class="wpbm-title"><?php _e( 'WP Blog Manager Lite', WPBM_TD ); ?></div>
            <div class="wpbm-version-wrap">
                <span>Version <?php echo WPBM_VERSION; ?></span>
            </div>
        </div>

        <div class="wpbm-header-social-link">
            <p class="wpbm-follow-us"><?php _e( 'Follow us for new updates', WPBM_TD ); ?></p>
            <div class="fb-like" data-href="https://www.facebook.com/accesspressthemes" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
            <a href="https://twitter.com/accesspressthemes" class="twitter-follow-button" data-show-count="false">Follow @accesspressthemes</a>
        </div>
    </div>
</div>
<div class="wpbm-about-main-wrapper">
    <div class="wpbm-intro-wrap">
        <div class="wpbm-how-to-use-container">
            <div class="wpbm-column-one-wrap">
                <div class="wpbm-panel-body">
                    <div class="wpbm-row">
                        <div class="wpbm-col-three-third">
                            <h3><?php _e( 'About Us', WPBM_TD ); ?></h3>
                            <div class="wpbm-tab-wrapper">
                                <p><strong><?php _e( 'WP Blog Manager Lite - Plugin to Manage / Design WordPress Blog', WPBM_TD ) ?></strong> <?php _e( '- is a Free WordPress Plugin by AccessPress Themes.', WPBM_TD ); ?> </p>

                                <p><?php _e( 'AccessPress Themes is a venture of Access Keys - who has developed hundreds of Custom WordPress themes and plugins for its clients over the years. ', WPBM_TD ); ?></p>

                                <p><strong><?php _e( 'WP Blog Manager Lite - Plugin to Manage / Design WordPress Blog', WPBM_TD ) ?></strong><?php _e( ' - is a WordPress blog post showcase plugin packaged with 7 beautiful pre-designed templates. Stop hiring a WordPress / web designer! Design your WordPress website (archive page, blog detail page) with our stunning, responsive, creative and powerful design.

WP blog manager lite will save your time (hours and days to design a WordPress website), and money ($$$ to hire a designer) and get your WordPress website ready in just few minutes.

Create your categories, posts and select from the design layout library from WP Blog Manager Lite Plugin - your archive page and blog detail page will be all ready with beautiful designs to go live! No coding skill needed at all.', WPBM_TD ); ?></p>

                                <p><?php _e( 'Give a new look to your blog every other day!', WPBM_TD ); ?> </p>

                                <p>&nbsp;</p>



                                <hr />
                                <h3><?php _e( 'Get in touch', WPBM_TD ); ?></h3>
                                <p><?php _e( 'If you have any question/feedback, please get in touch:', WPBM_TD ); ?></p>
                                <p>
                                    <strong>General enquiries:</strong> <a href="mailto:info@accesspressthemes.com">info@accesspressthemes.com</a><br />
                                    <strong>Support:</strong> <a href="mailto:support@accesspressthemes.com">support@accesspressthemes.com</a><br />
                                    <strong>Sales:</strong> <a href="mailto:sales@accesspressthemes.com">sales@accesspressthemes.com</a>
                                </p>
                                <div class="wpbm-seperator"></div>
                                <div class="wpbm-dottedline"></div>
                                <div class="wpbm-seperator"></div>
                            </div>
                        </div>
                        <div class="wpbm-col-three-third">
                            <h3><?php _e( 'Get social', WPBM_TD ); ?></h3>
                            <p><?php _e( 'Get connected with us on social media. Facebook is the best place to find updates on our themes/plugins: ', WPBM_TD ); ?></p>

                            <p><strong>Like us on facebook:</strong>
                                <br />
                                <iframe style="border: none; overflow: hidden; width: 700px; height: 250px;" src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FAccessPress-Themes%2F1396595907277967&amp;width=842&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=true&amp;appId=1411139805828592" width="240" height="150" frameborder="0" scrolling="no"></iframe>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wpbm-right-sidebar">
        <img style="width:100%;" src="<?php echo WPBM_IMG_DIR . '/demo/upgrade-to-pro.png' ?>"/>
        <div class="wpbm-upgrad-wrap">
            <a class="wpbm-pro-demo" href="http://demo.accesspressthemes.com/wordpress-plugins/wp-blog-manager" target="_blank"><?php _e( 'Demo', WPBM_TD ); ?></a>
            <a class="wpbm-pro-demo" href="https://accesspressthemes.com/wordpress-plugins/wp-blog-manager/" target="_blank"><?php _e( 'Upgrade', WPBM_TD ); ?></a>
            <a class="wpbm-pro-demo" href="https://accesspressthemes.com/wordpress-plugins/wp-blog-manager/" target="_blank"><?php _e( 'Plugin Information', WPBM_TD ); ?></a>
        </div>
        <img style="width:100%;" src="<?php echo WPBM_IMG_DIR . '/demo/upgrade-to-pro-feature.png' ?>"/>
    </div>
</div>
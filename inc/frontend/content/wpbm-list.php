<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="wpbm-list-inner-wrap">
    <?php
    if ( isset( $wpbm_option[ 'wpbm_list_template' ] ) && $wpbm_option[ 'wpbm_list_template' ] == 'template-1' ) {
        ?>
        <div class="wpbm-clearfix">
            <div class="wpbm-first-inner-wrap">
                <?php
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');

                /*
                 * Show Category
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_category' ] ) && $wpbm_option[ 'wpbm_show_category' ] == '1' ) {
                    ?>
                    <div class="wpbm-category-wrap">
                        <?php
                        $categories = get_the_category();
                        $separator = ' ';
                        $output = '';
                        if ( ! empty( $categories ) ) {
                            foreach ( $categories as $category ) {
                                $output .= '<a href="' . esc_url( get_category_link( $category -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . esc_html( $category -> name ) . '</a>' . $separator;
                            }
                            ?>
                            <div class="wpbm-category-list">

                                <?php
                                echo trim( $output, $separator );
                                ?>
                            </div>
                        <?php }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="wpbm-second-inner-wrap">
                <div class="wpbm-meta-wrap">
                    <?php
                    /*
                     * Show Author
                     */
                    if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                        ?>
                        <div class="wpbm-author-name">
                            <?php
                            _e( 'By: ', WPBM_TD );
                            the_author_posts_link();
                            ?>
                        </div>
                        <?php
                    }
                    /*
                     * Date
                     */

                    if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                        ?>
                        <div class="wpbm-date"><?php echo get_the_date( $date_format ); ?></div>
                        <?php
                    }
                    /*
                     * Display comment count
                     */
                    if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) && $wpbm_option[ 'wpbm_show_comment' ] == '1' ) {
                        ?>
                        <div class="wpbm-comment-wrap">
                            <?php
                            echo comments_number();
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="wpbm-content-outer-wrap">
                    <div class="wpbm-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?></a></div>
                    <div class="wpbm-content"><?php
                        if ( isset( $wpbm_option[ 'post_content' ] ) && $wpbm_option[ 'post_content' ] == 'full-text' ) {
                            the_content();
                        } else {
                            echo wp_trim_words(strip_tags( strip_shortcodes( get_the_content() ) ), $excerpt, '...' );
                        }
                        ?></div>
                    <?php
                    /*
                     * Read More
                     */
                    if ( isset( $wpbm_option[ 'wpbm_show_read_more' ] ) && $wpbm_option[ 'wpbm_show_read_more' ] == '1' ) {
                        if ( isset( $wpbm_option[ 'post_url' ] ) && $wpbm_option[ 'post_url' ] == 'post_link' ) {
                            ?>
                            <div class="wpbm-link-button">
                                <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?></a>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="wpbm-link-button">
                                <a href="<?php echo esc_url( $wpbm_option[ 'wpbm_custom_url' ] ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?></a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <?php if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) && $wpbm_option[ 'wpbm_show_tag' ] == '1' || isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) { ?>
                    <div class="wpbm-meta-two-wrap">
                        <?php
                        /*
                         * Show Tag
                         */
                        if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) && $wpbm_option[ 'wpbm_show_tag' ] == '1' ) {
                            global $post;
                            $tags = get_the_tags();
                            $separator = ' ';
                            $output = '';
                            if ( ! empty( $tags ) ) {
                                foreach ( $tags as $tag ) {
                                    $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . "#" . esc_html( $tag -> name ) . '</a>' . $separator;
                                }
                                ?>
                                <div class="wpbm-tag-list">

                                    <?php
                                    echo trim( $output, $separator );
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                            ?>
                            <div class="wpbm-share-wrap <?php
                            if ( empty( $tags ) ) {
                                echo 'wpbm-only-share';
                            }
                            ?>">
                                     <?php if ( isset( $wpbm_option[ 'wpbm_show_facebook_share' ] ) && $wpbm_option[ 'wpbm_show_facebook_share' ] == '1' ) { ?>
                                    <a href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                    </a>
                                    <?php
                                }
                                if ( isset( $wpbm_option[ 'wpbm_show_twitter_share' ] ) && $wpbm_option[ 'wpbm_show_twitter_share' ] == '1' ) {
                                    ?>
                                    <a href="http://twitter.com/share?text=<?php echo the_title(); ?>&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    <?php
                                }
                                if ( isset( $wpbm_option[ 'wpbm_show_google_share' ] ) && $wpbm_option[ 'wpbm_show_google_share' ] == '1' ) {
                                    ?>

                                    <a href="https://plus.google.com/share?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fab fa-google" aria-hidden="true"></i>
                                    </a>
                                    <?php
                                }
                                if ( isset( $wpbm_option[ 'wpbm_show_linkedin_share' ] ) && $wpbm_option[ 'wpbm_show_linkedin_share' ] == '1' ) {
                                    ?>
                                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fab fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                    <?php
                                }
                                if ( isset( $wpbm_option[ 'wpbm_show_mail_share' ] ) && $wpbm_option[ 'wpbm_show_mail_share' ] == '1' ) {
                                    ?>
                                    <a href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </a>
                                    <?php
                                }
                                if ( isset( $wpbm_option[ 'wpbm_show_pinterest_share' ] ) && $wpbm_option[ 'wpbm_show_pinterest_share' ] == '1' ) {
                                    ?>
                                    <a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fab fa-pinterest" aria-hidden="true"></i>
                                    </a>
                                <?php } ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="wpbm-clearfix">
            <div class="wpbm-first-inner-wrap">
                <?php
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                ?>
            </div>
            <div class="wpbm-second-inner-wrap">
                <?php
                /*
                 * Show Category
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_category' ] ) && $wpbm_option[ 'wpbm_show_category' ] == '1' ) {
                    ?>
                    <div class="wpbm-category-wrap">
                        <?php
                        $categories = get_the_category();
                        $separator = ' ';
                        $output = '';
                        if ( ! empty( $categories ) ) {
                            foreach ( $categories as $category ) {
                                $output .= '<a href="' . esc_url( get_category_link( $category -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . esc_html( $category -> name ) . '</a>' . $separator;
                            }
                            ?>
                            <div class="wpbm-category-list">

                                <?php
                                echo trim( $output, $separator );
                                ?>
                            </div>
                        <?php }
                        ?>
                    </div>
                    <?php
                }
                ?>
                <div class="wpbm-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?></a></div>
                <div class="wpbm-meta-wrap">
                    <?php
                    /*
                     * Show Author
                     */
                    if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                        ?>
                        <div class="wpbm-author-name">
                            <?php
                            the_author_posts_link();
                            ?>
                        </div>
                        <?php
                    }
                    /*
                     * Date
                     */

                    if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                        ?>
                        <div class="wpbm-date"><?php echo get_the_date( $date_format ); ?></div>
                        <?php
                    }
                    /*
                     * Display comment count
                     */
                    if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) && $wpbm_option[ 'wpbm_show_comment' ] == '1' ) {
                        ?>
                        <div class="wpbm-comment-wrap">
                            <?php
                            echo comments_number();
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="wpbm-content">
                    <?php
                    if ( isset( $wpbm_option[ 'post_content' ] ) && $wpbm_option[ 'post_content' ] == 'full-text' ) {
                        the_content();
                    } else {
                        echo wp_trim_words(strip_tags( strip_shortcodes( get_the_content() ) ), $excerpt, '[...]' );
                    }
                    ?>
                </div>
                <?php
                /*
                 * Read More
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_read_more' ] ) && $wpbm_option[ 'wpbm_show_read_more' ] == '1' ) {
                    if ( isset( $wpbm_option[ 'post_url' ] ) && $wpbm_option[ 'post_url' ] == 'post_link' ) {
                        ?>
                        <div class="wpbm-link-button">
                            <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?></a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="wpbm-link-button">
                            <a href="<?php echo esc_url( $wpbm_option[ 'wpbm_custom_url' ] ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?></a>
                        </div>
                        <?php
                    }
                }
                if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) && $wpbm_option[ 'wpbm_show_tag' ] == '1' || isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                    ?>
                    <div class="wpbm-meta-two-wrap">
                        <?php
                        /*
                         * Show Tag
                         */
                        if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) && $wpbm_option[ 'wpbm_show_tag' ] == '1' ) {
                            global $post;
                            $tags = get_the_tags();
                            $separator = ' ';
                            $output = '';
                            if ( ! empty( $tags ) ) {
                                foreach ( $tags as $tag ) {
                                    $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . esc_html( $tag -> name ) . '</a>' . $separator;
                                }
                                ?>
                                <div class="wpbm-tag-list">

                                    <?php
                                    echo trim( $output, $separator );
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                            ?>
                            <div class="wpbm-share-wrap <?php
                            if ( empty( $tags ) ) {
                                echo 'wpbm-only-share';
                            }
                            ?>">
                                     <?php if ( isset( $wpbm_option[ 'wpbm_show_facebook_share' ] ) && $wpbm_option[ 'wpbm_show_facebook_share' ] == '1' ) { ?>
                                    <a href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                    </a>
                                    <?php
                                }
                                if ( isset( $wpbm_option[ 'wpbm_show_twitter_share' ] ) && $wpbm_option[ 'wpbm_show_twitter_share' ] == '1' ) {
                                    ?>
                                    <a href="http://twitter.com/share?text=<?php echo the_title(); ?>&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    <?php
                                }
                                if ( isset( $wpbm_option[ 'wpbm_show_google_share' ] ) && $wpbm_option[ 'wpbm_show_google_share' ] == '1' ) {
                                    ?>

                                    <a href="https://plus.google.com/share?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fab fa-google" aria-hidden="true"></i>
                                    </a>
                                    <?php
                                }
                                if ( isset( $wpbm_option[ 'wpbm_show_linkedin_share' ] ) && $wpbm_option[ 'wpbm_show_linkedin_share' ] == '1' ) {
                                    ?>
                                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fab fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                    <?php
                                }
                                if ( isset( $wpbm_option[ 'wpbm_show_mail_share' ] ) && $wpbm_option[ 'wpbm_show_mail_share' ] == '1' ) {
                                    ?>
                                    <a href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </a>
                                    <?php
                                }
                                if ( isset( $wpbm_option[ 'wpbm_show_pinterest_share' ] ) && $wpbm_option[ 'wpbm_show_pinterest_share' ] == '1' ) {
                                    ?>
                                    <a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fab fa-pinterest" aria-hidden="true"></i>
                                    </a>
                                <?php } ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>

    <?php }
    ?>
</div>


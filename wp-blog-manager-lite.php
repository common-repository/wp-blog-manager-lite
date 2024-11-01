<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
/**
 * Plugin Name: WP Blog Manager Lite
 * Plugin URI:  https://accesspressthemes.com/wordpress-plugins/wp-blog-manager-lite/
 * Description:  Plugin to Manage / Design WordPress Blog | Stunning, responsive, creative and powerful design.
 * Version:     1.1.4
 * Author:      AccessPress Themes
 * Author URI:  http://accesspressthemes.com/
 * Domain Path: /languages/
 * Text Domain: wp-blog-manager-lite
 * */
/**
 * Declartion of necessary constants for plugin
 * */
defined( 'WPBM_VERSION' ) or define( 'WPBM_VERSION', '1.1.4' ); //plugin version
defined( 'WPBM_TD' ) or define( 'WPBM_TD', 'wp-blog-manager-lite' ); //plugin's text domain
defined( 'WPBM_IMG_DIR' ) or define( 'WPBM_IMG_DIR', plugin_dir_url( __FILE__ ) . 'images' ); //plugin image directory
defined( 'WPBM_JS_DIR' ) or define( 'WPBM_JS_DIR', plugin_dir_url( __FILE__ ) . 'js' );  //plugin js directory
defined( 'WPBM_CSS_DIR' ) or define( 'WPBM_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css' ); // plugin css dir
defined( 'WPBM_PATH' ) or define( 'WPBM_PATH', plugin_dir_path( __FILE__ ) );
defined( 'WPBM_URL' ) or define( 'WPBM_URL', plugin_dir_url( __FILE__ ) );
include(WPBM_PATH . '/inc/frontend/wpbm-mobile-detect.php');
include(WPBM_PATH . '/inc/wpbm-block/wpbm-block-init.php');
if ( ! class_exists( 'WPBM_Class' ) ) {

    class WPBM_Class{

        /**
         * Initializes the plugin functions
         */
        function __construct(){

            add_action( 'init', array( $this, 'wpbm_plugin_text_domain' ) ); //loads text domain for translation ready
            add_action( 'wp_enqueue_scripts', array( $this, 'wpbm_register_assets' ) ); //registers scripts and styles for front end
            add_action( 'init', array( $this, 'wpbm_register_post_type' ) ); //register custom post type
            add_action( 'admin_enqueue_scripts', array( $this, 'wpbm_register_admin_assets' ) ); //register plugin scripts and css in wp-admin
            add_action( 'add_meta_boxes', array( $this, 'wpbm_add_blog_metabox' ) ); //added blog showcase metabox
            add_action( 'add_meta_boxes', array( $this, 'wpbm_shortcode_usage_metabox' ) ); //added shortcode usages metabox
            add_action( 'save_post', array( $this, 'wpbm_meta_save' ) );
            add_action( 'wp_ajax_wpbm_selected_post_taxonomy', array( $this, 'wpbm_selected_post_taxonomy' ) );
            add_action( 'wp_ajax_wpbm_selected_taxonomy_terms', array( $this, 'wpbm_selected_taxonomy_terms' ) );
            add_shortcode( 'wpbm', array( $this, 'wpbm_generate_shortcode' ) ); // generating shortcode
            add_filter( 'preview_post_link', array( $this, 'wpbm_preview_page' ), 10, 2 );
            add_action( 'template_redirect', array( $this, 'preview_blog' ) );
            add_action( 'admin_menu', array( $this, 'wpbm_register_about_us_page' ) ); //add submenu page
            add_action( 'admin_menu', array( $this, 'wpbm_register_stuff_page' ) ); //add submenu page
            add_filter( 'post_row_actions', array( $this, 'wpbm_remove_row_actions' ), 10, 1 );
            add_filter( 'manage_wpblogmanager_posts_columns', array( $this, 'wpbm_columns_head' ) );
            add_action( 'manage_wpblogmanager_posts_custom_column', array( $this, 'wpbm_columns_content' ), 10, 2 );
            add_action( 'admin_head-post-new.php', array( $this, 'wpbm_posttype_admin_css' ) );
            add_action( 'admin_head-post.php', array( $this, 'wpbm_posttype_admin_css' ) );
            add_filter( 'admin_footer_text', array( $this, 'wpbm_admin_footer_text' ) );
            add_filter( 'plugin_row_meta', array( $this, 'wpbm_plugin_row_meta' ), 10, 2 );
            add_action( 'admin_init', array( $this, 'wpbm_redirect_to_site' ), 1 );
        }

//load the text domain for language translation
        function wpbm_plugin_text_domain(){
            load_plugin_textdomain( 'wp-blog-manager-lite', false, basename( dirname( __FILE__ ) ) . '/languages/' );
        }

//register admin assets
        function wpbm_register_admin_assets( $hook ){
            global $post;
            wp_enqueue_media();
            wp_enqueue_style( 'thickbox' );
            wp_enqueue_script( 'thickbox' );
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_script( 'wp-color-picker' );
            wp_enqueue_script( 'jquery-ui-core' );
            wp_enqueue_style( 'dashicons' );
            wp_enqueue_script( 'wpbm-admin-script', WPBM_JS_DIR . '/wpbm-admin-script.js', array( 'jquery', 'wp-color-picker', 'jquery-ui-sortable', 'jquery-ui-core' ), WPBM_VERSION );
            $admin_ajax_nonce = wp_create_nonce( 'wpbm-admin-ajax-nonce' );
            $admin_ajax_object = array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'ajax_nonce' => $admin_ajax_nonce );
            wp_localize_script( 'wpbm-admin-script', 'wpbm_backend_js_params', $admin_ajax_object );
            wp_enqueue_style( 'wpbm-backend-style', WPBM_CSS_DIR . '/wpbm-backend-style.css', false, WPBM_VERSION );
            wp_enqueue_style( 'wpbm-jquery-ui-style', WPBM_CSS_DIR . '/jquery-ui-css-1.12.1.css', false, WPBM_VERSION );
        }

//register frontend assests
        function wpbm_register_assets(){
            wp_enqueue_style( 'wpbm-owl-style', WPBM_CSS_DIR . '/owl.carousel.css', false, WPBM_VERSION );
            wp_enqueue_style( 'wpbm-fontawesome', WPBM_CSS_DIR . '/font-awesome-all.css', false, WPBM_VERSION );
            wp_enqueue_style( 'wpbm-font', '//fonts.googleapis.com/css?family=Bitter|Hind|Playfair+Display:400,400i,700,700i,900,900i|Open+Sans:400,500,600,700,900|Lato:300,400,700,900|Montserrat|Droid+Sans|Roboto|Lora:400,400i,700,700i|Roboto+Slab|Rubik|Merriweather:300,400,700,900|Poppins|Ropa+Sans|Playfair+Display|Rubik|Source+Sans+Pro|Roboto+Condensed|Roboto+Slab:300,400,700|Amatic+SC:400,700|Quicksand|Oswald|Quicksand:400,500,700', false );
            wp_enqueue_style( 'wpbm-frontend-style', WPBM_CSS_DIR . '/wpbm-frontend.css', array( 'wpbm-owl-style', 'wpbm-font' ), WPBM_VERSION );
            wp_enqueue_style( 'wpbm-responsive-style', WPBM_CSS_DIR . '/wpbm-responsive.css', false, WPBM_VERSION );
            wp_enqueue_script( 'wpbm-owl-script', WPBM_JS_DIR . '/owl.carousel.js', array( 'jquery' ), WPBM_VERSION );
            wp_enqueue_script( 'wpbm-owl-script-1', WPBM_JS_DIR . '/owl.carousel.1.js', array( 'jquery' ), WPBM_VERSION );
            wp_enqueue_script( 'wpbm-frontend-script', WPBM_JS_DIR . '/wpbm-frontend.js', array( 'jquery', 'wpbm-owl-script' ), WPBM_VERSION );
            $frontend_ajax_nonce = wp_create_nonce( 'wpbm-frontend-ajax-nonce' );
            $frontend_ajax_object = array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'ajax_nonce' => $frontend_ajax_nonce );
            wp_localize_script( 'wpbm-frontend-script', 'wpbm_frontend_js_params', $frontend_ajax_object );
        }

//register blog manager custom post type
        function wpbm_register_post_type(){
            include('inc/admin/register/wpbm-register-post.php');
            register_post_type( 'WP Blog Manager', $args );
        }

//adding Blog metabox
        function wpbm_add_blog_metabox(){
            add_meta_box( 'wpbm_add_blog', __( 'WP Blog Manager', WPBM_TD ), array( $this, 'wpbm_add_blog_callback' ), 'wpblogmanager', 'normal', 'high' );
        }

        /*
         * callback function for Blog manager metabox
         */

        function wpbm_add_blog_callback( $post ){
            wp_nonce_field( basename( __FILE__ ), 'wpbm_blog_nonce' );
            include('inc/admin/wpbm-blog-meta.php');
        }

//save the metabox
        function wpbm_meta_save( $post_id ){
// Checks save status
            $is_autosave = wp_is_post_autosave( $post_id );
            $is_revision = wp_is_post_revision( $post_id );
            $is_valid_nonce = ( isset( $_POST[ 'wpbm_blog_nonce' ] ) && wp_verify_nonce( $_POST[ 'wpbm_blog_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
// Exits script depending on save status
            if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
                return;
            }

            if ( isset( $_POST[ 'wpbm_option' ] ) ) {
                $wpbm_array = ( array ) $_POST[ 'wpbm_option' ];
                $val = $this -> sanitize_array( $wpbm_array );
                update_post_meta( $post_id, 'wpbm_option', $val );
            }
            return;
        }

        function print_array( $array ){
            echo '<pre>';
            print_r( $array );
            echo '</pre>';
        }

        function wpbm_selected_post_taxonomy(){
            if ( isset( $_POST[ '_wpnonce' ] ) && wp_verify_nonce( $_POST[ '_wpnonce' ], 'wpbm-admin-ajax-nonce' ) ) {
                global $wpdb;
                $select_post = sanitize_text_field( $_POST[ 'select_post' ] );
                $taxonomies = get_object_taxonomies( $select_post, 'objects' );
                include( 'inc/ajax/fetch-taxonomy.php' );
                die();
            } else {
                die( 'No script kiddies please!!' );
            }
        }

        function wpbm_selected_taxonomy_terms(){
            if ( isset( $_POST[ '_wpnonce' ] ) && wp_verify_nonce( $_POST[ '_wpnonce' ], 'wpbm-admin-ajax-nonce' ) ) {
                global $wpdb;
                $select_tax = sanitize_text_field( $_POST[ 'select_tax' ] );
                include( 'inc/ajax/fetch-terms.php' );
                die();
            } else {
                die( 'No script kiddies please!!' );
            }
        }

        /*
         * Generate random key string
         */

        function wpbm_generate_random_string( $length ){
            $string = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $random_string = '';
            for ( $i = 1; $i <= $length; $i ++ ) {
                $random_string .= $string[ rand( 0, 61 ) ];
            }
            return $random_string;
        }

        function wpbm_generate_shortcode( $atts, $content = null ){

            ob_start();
            include('inc/frontend/wpbm-frontend.php');
            $blog = ob_get_contents();
            ob_end_clean();
            return $blog;
        }

        /*
         * Shortcode Usage Metabox
         */

        function wpbm_shortcode_usage_metabox(){
            add_meta_box( 'wpbm_shortcode_usage_option', __( 'WP Blog Manager Usage', WPBM_TD ), array( $this, 'wpbm_shortcode_usage' ), 'wpblogmanager', 'side', 'default' );
            add_meta_box( 'wpbm_upgrade_pro_option', __( 'Upgrade to PRO', WPBM_TD ), array( $this, 'wpbm_upgrade_banner' ), 'wpblogmanager', 'side', 'default' );
        }

        function wpbm_shortcode_usage( $post ){

            wp_nonce_field( basename( __FILE__ ), 'wpbm_shortcode_usage_option_nonce' );
            include('inc/admin/settings/wpbm-usages.php');
        }

        function wpbm_upgrade_banner( $post ){

            wp_nonce_field( basename( __FILE__ ), 'wpbm_upgrade_pro_option_nonce' );
            include('inc/admin/settings/wpbm-upgrade-pro.php');
        }

//returns all the terms for category dropdown as options
        function wpbm_fetch_category_list( $taxonomy, $term_id ){
            $option_html = "";
            $taxonomies_array[] = $taxonomy;
            $terms = get_terms( $taxonomy, array( 'hide_empty' => false ) );
            $categoryHierarchy = array();
            $this -> wpbm_sort_terms_hierarchicaly( $terms, $categoryHierarchy );
            if ( count( $categoryHierarchy ) > 0 ) { //condition check if the taxonomy has atleast single term
                $terms_exclude = array();
                $option_html .= $this -> wpbm_print_option( $categoryHierarchy, 1, '', '', $term_id );
            }

            return $option_html;
        }

        function wpbm_sort_terms_hierarchicaly( Array &$cats, Array &$into, $parentId = 0 ){
            foreach ( $cats as $i => $cat ) {
                if ( $cat -> parent == $parentId ) {
                    $into[ $cat -> term_id ] = $cat;
                    unset( $cats[ $i ] );
                }
            }

            foreach ( $into as $topCat ) {
                $topCat -> children = array();
                $this -> wpbm_sort_terms_hierarchicaly( $cats, $topCat -> children, $topCat -> term_id );
            }
        }

        function wpbm_print_option( $terms, $hierarchical = 1, $form = '', $field_title = '', $selected_term = array() ){

            foreach ( $terms as $term ) {
                $space = $this -> wpbm_check_parent( $term );
                $option_value = $term -> term_id;
                if ( is_array( $selected_term ) ) {
                    $selected = (in_array( $option_value, $selected_term )) ? 'selected="selected"' : '';
                } else {
                    $selected = ($selected_term == $option_value) ? 'selected="selected"' : '';
                }

                $form .= '<option value="' . $option_value . '" ' . $selected . '>' . $space . $term -> name . '</option>';


                if ( ! empty( $term -> children ) ) {

                    $form .= $this -> wpbm_print_option( $term -> children, $hierarchical, '', $field_title, $selected_term );
                }
            }
            return $form;
        }

        function wpbm_check_parent( $term, $space = '' ){
            if ( is_object( $term ) ) {
                if ( $term -> parent != 0 ) {
                    $space .= str_repeat( '&nbsp;', 2 );
                    $parent_term = get_term_by( 'id', $term -> parent, $term -> taxonomy );
                    $space .= $this -> wpbm_check_parent( $parent_term, $space );
                }
            }

            return $space;
        }

        function wpbm_print_checkbox( $terms, $form = '', $field_title = '', $selected_term = array() ){
            foreach ( $terms as $term ) {
                $space = $this -> wpbm_check_parent( $term );
                $option_value = $term -> slug;
                if ( is_array( $selected_term ) ) {
                    $checked = (in_array( $option_value, $selected_term )) ? 'checked="checked"' : '';
                } else {
                    $checked = ($selected_term == $option_value) ? 'checked="checked"' : '';
                }
                $form .= '<label class="wpbm-checkbox-label">' . $space . '<input type="checkbox" name="' . $field_title . '[]"  value="' . $option_value . '" ' . $checked . '/>' . $term -> name . '</label>';

                if ( ! empty( $term -> children ) ) {

                    $form .= $this -> wpbm_print_checkbox( $term -> children, '', $field_title, $selected_term );
                }
            }

            return $form;
        }

        /*
         * Preview page
         */

        function wpbm_preview_page( $link, \WP_Post $post ){

            if ( $post->post_type === 'wpblogmanager' ) {
               $post_status = get_post_status();
                if ( $post_status != 'auto-draft' ) {
                   $post_id = get_the_ID();
                   $nonce = wp_create_nonce( 'wpbm-preview-nonce' );
                   $link = site_url( '?wpblogmanager_preview=true&_wpbmnonce=' . $nonce . '&blog_id=' . $post_id );
                   return $link;
                }
            }
            return $link;
            // exit();
        }

        /**
         * Sanitizes Multi Dimensional Array
         * @param array $array
         * @param array $sanitize_rule
         * @return array
         *
         * @since 1.0.0
         */
        function sanitize_array( $array = array(), $sanitize_rule = array() ){
            if ( ! is_array( $array ) || count( $array ) == 0 ) {
                return array();
            }

            foreach ( $array as $k => $v ) {
                if ( ! is_array( $v ) ) {

                    $default_sanitize_rule = (is_numeric( $k )) ? 'html' : 'text';
                    $sanitize_type = isset( $sanitize_rule[ $k ] ) ? $sanitize_rule[ $k ] : $default_sanitize_rule;
                    $array[ $k ] = $this -> sanitize_value( $v, $sanitize_type );
                }
                if ( is_array( $v ) ) {
                    $array[ $k ] = $this -> sanitize_array( $v, $sanitize_rule );
                }
            }

            return $array;
        }

        /**
         * Sanitizes Value
         *
         * @param type $value
         * @param type $sanitize_type
         * @return string
         *
         * @since 1.0.0
         */
        function sanitize_value( $value = '', $sanitize_type = 'text' ){
            switch ( $sanitize_type ) {
                case 'html':
                    $allowed_html = wp_kses_allowed_html( 'post' );
                    return wp_kses( $value, $allowed_html );
                    break;
                default:
                    return sanitize_text_field( $value );
                    break;
            }
        }

       function preview_blog(){
           if ( isset( $_GET[ '_wpbmnonce' ] ) && wp_verify_nonce( $_GET[ '_wpbmnonce' ], 'wpbm-preview-nonce' ) ) {
               if ( isset( $_GET[ 'wpblogmanager_preview' ], $_GET[ 'blog_id' ] ) && $_GET[ 'wpblogmanager_preview' ] && is_user_logged_in() ) {
                   include(WPBM_PATH . 'inc/frontend/wpbm-preview.php');
                   die();
               }
           }
       }

        /*
         * Adding Submenu page
         */

        function wpbm_register_about_us_page(){
            add_submenu_page(
                    'edit.php?post_type=wpblogmanager', __( 'About Us', WPBM_TD ), __( 'About Us', WPBM_TD ), 'manage_options', 'wpbm-about-us', array( $this, 'wpbm_about_callback' ) );
        }

        function wpbm_about_callback(){

            include('inc/admin/wpbm-about-page.php');
        }

        function wpbm_register_stuff_page(){
            add_submenu_page( 'edit.php?post_type=wpblogmanager', __( 'Documentation', WPBM_TD ), __( 'Documentation', WPBM_TD ), 'manage_options', 'wcmc-documentation-wp', '__return_false', null, 9 );
            add_submenu_page( 'edit.php?post_type=wpblogmanager', __( 'Check Premium Version', WPBM_TD ), __( 'Check Premium Version', WPBM_TD ), 'manage_options', 'wcmc-premium-wp', '__return_false', null, 9 );
        }

        function wpbm_stuff_callback(){

            include('inc/admin/wpbm-stuff-page.php');
        }

        function wpbm_remove_row_actions( $actions ){
            if ( get_post_type() == 'wpblogmanager' ) { // choose the post type where you want to hide the button
                unset( $actions[ 'view' ] ); // this hides the VIEW button on your edit post screen
                unset( $actions[ 'inline hide-if-no-js' ] );
            }
            return $actions;
        }

        /* Add custom column to post list */

        function wpbm_columns_head( $columns ){
            $columns[ 'shortcodes' ] = __( 'Shortcodes', WPBM_TD );
            $columns[ 'template' ] = __( 'Template Include', WPBM_TD );
            return $columns;
        }

        function wpbm_columns_content( $column, $post_id ){

            if ( $column == 'shortcodes' ) {
                $id = $post_id;
                ?>
                <textarea style="resize: none;" rows="2" cols="20" readonly="readonly">[wpbm id="<?php echo esc_attr($post_id); ?>"]</textarea><?php
            }
            if ( $column == 'template' ) {
                $id = $post_id;
                ?>
                <textarea style="resize: none;" rows="2" cols="41" readonly="readonly">&lt;?php echo do_shortcode("[wpbm id='<?php echo esc_attr($post_id); ?>']"); ?&gt;</textarea><?php
            }
        }

        /*
         * Remove view and preview from wp blog post
         */

        function wpbm_posttype_admin_css(){
            global $post_type;
            $post_types = array(
                /* set post types */
                'wpblogmanager'
            );
            if ( in_array( $post_type, $post_types ) )
                echo '<style type="text/css">#view-post-btn, .updated a,#screen-meta-links .screen-meta-toggle
                {display: none;}</style>';
        }

        function wpbm_admin_footer_text( $text ){
            global $post;
            if ( (isset( $_GET[ 'post_type' ] ) && $_GET[ 'post_type' ] == 'wpblogmanager' ) ) {
                $link = 'https://wordpress.org/support/plugin/wp-blog-manager-lite/reviews/#new-post';
                $pro_link = 'https://accesspressthemes.com/wordpress-plugins/wp-blog-manager/';
                $text = 'Enjoyed WP Blog Manager Lite? <a href="' . $link . '" target="_blank">Please leave us a ★★★★★ rating</a> We really appreciate your support! | Try premium version of <a href="' . $pro_link . '" target="_blank">WP Blog Manager</a> - more features, more power!';
                return $text;
            } else {
                return $text;
            }
        }

        function wpbm_plugin_row_meta( $links, $file ){

            if ( strpos( $file, 'wp-blog-manager-lite.php' ) !== false ) {
                $new_links = array(
                    'demo' => '<a href="https://demo.accesspressthemes.com/wordpress-plugins/wp-blog-manager-lite/" target="_blank"><span class="dashicons dashicons-welcome-view-site"></span>Live Demo</a>',
                    'doc' => '<a href="https://accesspressthemes.com/documentation/wp-blog-manager-lite/" target="_blank"><span class="dashicons dashicons-media-document"></span>Documentation</a>',
                    'support' => '<a href="http://accesspressthemes.com/support" target="_blank"><span class="dashicons dashicons-admin-users"></span>Support</a>',
                    'pro' => '<a href="https://accesspressthemes.com/wordpress-plugins/wp-blog-manager/" target="_blank"><span class="dashicons dashicons-cart"></span>Premium version</a>'
                );

                $links = array_merge( $links, $new_links );
            }

            return $links;
        }

        function wpbm_redirect_to_site(){
            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'wcmc-documentation-wp' ) {
                wp_redirect( 'https://accesspressthemes.com/documentation/wp-blog-manager-lite/' );
                exit();
            }
            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'wcmc-premium-wp' ) {
                wp_redirect( 'https://accesspressthemes.com/wordpress-plugins/wp-blog-manager/' );
                exit();
            }
        }

    }

//class terminations

    $wpbm_obj = new WPBM_Class();
}//class exist check close



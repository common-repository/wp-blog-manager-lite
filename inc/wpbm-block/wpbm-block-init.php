<?php
/**
* Handler for [wpbm_guten_block] shortcode
*
* @param $atts
*
* @return string
*/
function wpbm_block_handler($atts)
{
	$atts = shortcode_atts([
		'heading' => __('WP Blog Manager Lite Title'),
		'heading_tag' => 'h2',
		'wpbm_id' => '',
	], $atts, 'wpbm_guten_block');

	return wpbm_block_renderer($atts[ 'heading' ],$atts[ 'heading_tag' ],$atts[ 'wpbm_id' ]);
}

add_shortcode('wpbm_guten_block', 'wpbm_block_handler');

/**
* Handler for post title block
* @param $atts
*
* @return string
*/
function wpbm_block_render_handler($atts)
{
	return wpbm_block_renderer($atts[ 'heading' ],$atts[ 'heading_tag' ],$atts[ 'wpbm_id' ]);
}

/**
* Output the post title wrapped in a heading
*
* @param int $wpbm_id The post ID
* @param string $heading Allows : h2,h3,h4 only
*
* @return string
*/
function wpbm_block_renderer($heading,$heading_tag,$wpbm_id)
{
	$ret = '';
	if(!empty($heading)){
		$ret .= "<$heading_tag>$heading</$heading_tag>";
	}

	if($wpbm_id!=null){
		$sht = "[wpbm id='$wpbm_id']";
		$title = do_shortcode($sht);
		$ret .= "$title";
	}
	return $ret;
}

/**
* Register block
*/
add_action('init', function() {
//Skip block registration if gutenberg is not enable/merged.
	if (!function_exists('register_block_type')){
		return;
	}
	$dir = dirname(__FILE__);

	wp_enqueue_style( 'wpbm-owl-style', WPBM_CSS_DIR . '/owl.carousel.css', false, WPBM_VERSION );
	wp_enqueue_style( 'wpbm-fontawesome', WPBM_CSS_DIR . '/fontawesome-all.css', false, WPBM_VERSION );
	wp_enqueue_style( 'wpbm-font', '//fonts.googleapis.com/css?family=Bitter|Hind|Playfair+Display:400,400i,700,700i,900,900i|Open+Sans:400,500,600,700,900|Lato:300,400,700,900|Montserrat|Droid+Sans|Roboto|Lora:400,400i,700,700i|Roboto+Slab|Rubik|Merriweather:300,400,700,900|Poppins|Ropa+Sans|Playfair+Display|Rubik|Source+Sans+Pro|Roboto+Condensed|Roboto+Slab:300,400,700|Amatic+SC:400,700|Quicksand|Oswald|Quicksand:400,500,700', false );
	wp_enqueue_style( 'wpbm-frontend-style', WPBM_CSS_DIR . '/wpbm-frontend.css', array( 'wpbm-owl-style', 'wpbm-font' ), WPBM_VERSION );
	wp_enqueue_style( 'wpbm-responsive-style', WPBM_CSS_DIR . '/wpbm-responsive.css', false, WPBM_VERSION );
	wp_enqueue_script( 'wpbm-owl-script', WPBM_JS_DIR . '/owl.carousel.js', array( 'jquery' ), WPBM_VERSION );
	wp_enqueue_script( 'wpbm-owl-script-1', WPBM_JS_DIR . '/owl.carousel.1.js', array( 'jquery' ), WPBM_VERSION );
	wp_enqueue_script( 'wpbm-frontend-script', WPBM_JS_DIR . '/wpbm-frontend.js', array( 'jquery', 'wpbm-owl-script' ), WPBM_VERSION );
	$frontend_ajax_nonce = wp_create_nonce( 'wpbm-frontend-ajax-nonce' );
	$frontend_ajax_object = array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'ajax_nonce' => $frontend_ajax_nonce );
	wp_localize_script( 'wpbm-frontend-script', 'wpbm_frontend_js_params', $frontend_ajax_object );
	wp_enqueue_style( 'wpbm-frontend-style', WPBM_CSS_DIR . 'wpbm-frontend.css', array( 'wpbm-owl-style', 'wpbm-font' ), WPBM_VERSION );
	wp_enqueue_script( 'wpbm-frontend-script', WPBM_JS_DIR . 'wpbm-frontend.js', array( 'jquery', 'wpbm-owl-script' ), WPBM_VERSION );

	$index_js = 'wpbm-block.js';
	wp_register_script(
		'wpbm-block-script',
		plugins_url($index_js, __FILE__),
		array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
			'wp-components',
			'wp-editor'
		),
		filemtime("$dir/$index_js")
	);

	$wpbm_logos_array = get_wpbm_logos();
	wp_localize_script( 'wpbm-block-script', 'WPBM_logos_array', $wpbm_logos_array);

	register_block_type('wpbm-display-block/wpbm-widget', array(
		'editor_script' => 'wpbm-block-script',
		'render_callback' => 'wpbm_block_render_handler',
		'attributes' => [
			'heading' => [
				'type' => 'string',
				'default' => __('WP Blog Manager Lite Titile')
			],
			'heading_tag' => [
				'type' => 'string',
				'default' => 'h2'
			],
			'wpbm_id' => [
				'type' => 'string',
				'default' => ''
			],
		]
	));
});

function get_wpbm_logos(){
	$args = array('post_type'=>'wpblogmanager',
		'post_status'=>'publish',
		'post_per_page'=>'25'
);
	//The Query
	$the_query = new WP_Query( $args );

	$wpblogmanager = array(array('value'=>'0','label'=>__('Select Blog Manager')));

	//The Loop
	if ( $the_query->have_posts() ) {
		while($the_query->have_posts()){
			$the_query->the_post();
			global $post;
			$wpblogmanager[] = array('value'=>get_the_ID(), 'label'=>get_the_title());
		}
	}
	return $wpblogmanager;
}

<?php
	// REMOVE WP JUNK FROM HEAD ////////////////////////////////////////////////////////////
	remove_action( 'wp_head', 'print_emoji_detection_script', 7);
	remove_action( 'wp_print_styles', 'print_emoji_styles');
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
	remove_action('wp_head', 'wp_generator'); // remove wordpress version
	remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
	remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
	remove_action('wp_head', 'index_rel_link'); // remove link to index page
	remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
	remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
	remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );

	// DEBUGGER ////////////////////////////////////////////////////////////////////////
	function debug($var){
		echo '<pre style="color:red;">';
			print_r($var);
		echo '</pre>';
	}

	// DISABLE GUTENBERG EDITOR /////////////////////////////////////////////////////////
	//add_filter('use_block_editor_for_post', '__return_false', 10);

	// DEFINIR LOS PATHS A LOS DIRECTORIOS DE JAVASCRIPT Y CSS ///////////////////////////
	define( 'JSPATH', get_template_directory_uri() . '/js/' );
	define( 'CSSPATH', get_template_directory_uri() . '/css/' );
	define( 'FONTSPATH', get_template_directory_uri() . '/fonts/' );
	define( 'THEMEPATH', get_template_directory_uri() . '/' );
	define( 'SITEURL', site_url('/') );

	//POST TYPES
	if(!validate_file('customtheme/inc/post-types.php')){
		require_once('inc/post-types.php');
	}
	//METABOXES
	if(!validate_file('customtheme/inc/metaboxes.php')){
		require_once('inc/metaboxes.php');
	}
	//TAXONOMIES
	if(!validate_file('customtheme/inc/taxonomies.php')){
		require_once('inc/taxonomies.php');
	}

	function ct_custom_menu() {
		register_nav_menu('sigma-custom-menu', 'Sigma Menu');
	}
	add_action( 'init', 'ct_custom_menu' );

	/**
	 * This function register stylesheets needed for this theme
	*/
	function ct_register_styles(){
		wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '1.0.0', 'all' );
		//Pannellum css
		wp_register_style('sig-pannellum-css', 'https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css', array(), '2.5.6', 'all');
		wp_enqueue_style('sig-pannellum-css');
		//BxSlider css
		wp_register_style('sig-bx-css', CSSPATH.'jquery.bxslider.min.css', array(), '4.2.12', 'all');
		wp_enqueue_style('sig-bx-css');

		wp_dequeue_style( 'wp-block-library');
		wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' );
	}
	add_action('wp_enqueue_scripts', 'ct_register_styles');

	/**
	 * This function register scripts needed for this theme
	*/
	function ct_register_scripts(){
		//Jquery 3.5.1
		wp_deregister_script('jquery');
		wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-3.5.1.min.js", array(), '3.5.1', false);
		wp_enqueue_script('jquery');
		//Custom functions
		wp_enqueue_script('functions', JSPATH.'functions.js', array('jquery'), '1.0.0', false);
		//Bx Slider 4.2.12
		wp_register_script('bx-slider', JSPATH.'jquery.bxslider.js', array('jquery'), '4.2.12', true);
		wp_enqueue_script('bx-slider');
		// Fitvids 1.0.0
		wp_register_script('fitvids', JSPATH . 'jquery.fitvids.js', array('jquery'), '1.0.0', true);
		wp_enqueue_script('fitvids');
		//Pannellum 2.5.6
		wp_register_script('sig-pannellum', 'https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js', array('functions'), '2.5.6', false);
		wp_enqueue_script('sig-pannellum');
	}
	add_action('wp_enqueue_scripts', 'ct_register_scripts');

	/**
	 * Print the <title> tag based on what is being viewed.
	 * @return string
	 */
	function ct_print_title(){
		global $page, $paged, $post;
		wp_title( '|', true, 'right' );
		// Add a page number if necessary
		if(is_page()):
			if ( $paged >= 2 || $page >= 2 ){
				echo ' | ' . sprintf( __( 'Página %s' ), max( $paged, $page ) );
			}
		endif;
	}

	// Let Photon to know the viewport width
	if ( ! isset( $content_width ) ) {
	  $content_width = 1280;
	}

	/**
	 * [jetpackme_news_photon_compression define la calidad de las imágenes a 80% via Photon]
	 * @param [Object] $args
	 * @return [Object] $args
	*/
	function jetpackme_news_photon_compression( $args ) {
	    $args['quality'] = 80;
	    return $args;
	}
	add_filter('jetpack_photon_pre_args', 'jetpackme_news_photon_compression' );

	/**
	 * [ct_add_async_attribute] Add the attribute async to loaded scripts
	 * @param $tag
	 * @param $handle
	 * @return $tag with async attribute
	*/
	function ct_add_async_attribute($tag, $handle) {
   		$scripts_to_async = array('functions', 'bx-slider');
	   	foreach($scripts_to_async as $async_script) {
	      	if ($async_script === $handle) {
	         	return str_replace(' src', ' async="true" src', $tag);
	      	}
	   	}
	   	return $tag;
	}
	add_filter('script_loader_tag', 'ct_add_async_attribute', 10, 2);

	// CAMBIAR EL CONTENIDO DEL FOOTER EN EL DASHBOARD ///////////////////////////////////
	add_filter( 'admin_footer_text', function() {
		echo 'Creado por <a href="https://cubeinthebox.com">cubeinthebox</a>. ';
		echo 'Powered by <a href="http://www.wordpress.org">WordPress</a>';
	});

	// POST THUMBNAILS SUPPORT ///////////////////////////////////////////////////////////
	if ( function_exists('add_theme_support') ){
		add_theme_support('post-thumbnails');
		add_theme_support('auto-load-next-post');
		//Theme suport for gutenberg editor
		add_theme_support('align-wide');
		add_theme_support('editor-styles');
		add_theme_support('wp-block-styles');
	}

	if ( function_exists('add_image_size') ){
		// Custom Theme : Center|Top
		add_image_size('sig-xxl-1280', 1280, 720, array('center', 'top'));
		add_image_size('sig-xl-960', 960, 540, array('center', 'top'));
		add_image_size('sig-l-640', 640, 360, array('center', 'top'));
		add_image_size('sig-m-480', 480, 270, array('center', 'top'));
		add_image_size('sig-s-320', 320, 180, array('center', 'top'));
		add_image_size('sig-xs-240', 240, 135, array('center', 'top'));
		add_image_size('sig-ver-l-768', 768, 1024, array('center', 'center'));
		add_image_size('sig-ver-m-420', 420, 747, array('center', 'center'));
	}

	function ct_pre_get_posts($query){
		if(!is_admin() && $query->is_main_query()){
			if(is_archive()){
				$query->set('posts_per_page', 9);
			}
		}
	}
	add_action('pre_get_posts', 'ct_pre_get_posts');

	// THE EXECRPT FORMAT AND LENGTH /////////////////////////////////////////////////////
	/*LIMIT FOR EXCERPT 18 WORDS*/
	function custom_excerpt_length( $length ) {
		return 18;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', '999' );

	function isa_cpt_excerpt_more( $more ) {
    	global $post;
    	$anchor_text = 'Read more';
    	$more = ' &hellip; <a href="'. esc_url( get_permalink() ) . '">' . $anchor_text . '</a>';
    	return '';
	}
	add_filter('excerpt_more', 'isa_cpt_excerpt_more');

	// REMOVE ACCENTS AND THE LETTER Ñ FROM FILE NAMES ///////////////////////////////////
	add_filter( 'sanitize_file_name', function ($filename) {
		$filename = str_replace('ñ', 'n', $filename);
		return remove_accents($filename);
	});

	/**
	 * Produces cleaner filenames for uploads
	 *
	 * @param  string $filename
	 * @return string
	 */
	function wpartisan_sanitize_file_name( $filename ) {
		$sanitized_filename = remove_accents( $filename ); // Convert to ASCII
		// Standard replacements
		$invalid = array(' '=>'-','%20'=>'-','_'=>'-',);
		$sanitized_filename = str_replace( array_keys( $invalid ), array_values( $invalid ), $sanitized_filename );
		$sanitized_filename = preg_replace('/[^A-Za-z0-9-\. ]/', '', $sanitized_filename); // Remove all non-alphanumeric except .
		$sanitized_filename = preg_replace('/\.(?=.*\.)/', '', $sanitized_filename); // Remove all but last .
		$sanitized_filename = preg_replace('/-+/', '-', $sanitized_filename); // Replace any more than one - in a row
		$sanitized_filename = str_replace('-.', '.', $sanitized_filename); // Remove last - if at the end
		$sanitized_filename = strtolower( $sanitized_filename ); // Lowercase
		return $sanitized_filename;
	}
	add_filter( 'sanitize_file_name', 'wpartisan_sanitize_file_name', 10, 1 );

	/**
	 * ct_move_element
	 * Mueve un elemento de un array a otro
	*/
	function ct_move_element($array, $a, $b) {
		$p1 = array_splice($array, $a, 1);
    $p2 = array_splice($array, 0, $b);
    $array = array_merge($p2,$p1,$array);
	}

	/**
	 * @author Holkan Luna
	 * [ct_get_alt_text]
	 * @param [Integer] $post_id
	 * @return [String] $alt_text
	*/
	function ct_get_alt_text($post_id){
		$att_id = get_post_thumbnail_id($post_id);
		return get_post_meta($att_id, '_wp_attachment_image_alt', true);
	}

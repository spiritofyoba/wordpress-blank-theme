<?php

/**
 *External Modules/Files
 */

include 'includes/includes.php';

/**
 *Theme Support
 */

if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

if ( function_exists( 'add_theme_support' ) ) {

	add_theme_support( 'menus' );

	add_theme_support( 'post-thumbnails' );
	add_image_size( 'large', 700, '', true );
	add_image_size( 'medium', 250, '', true );
	add_image_size( 'small', 120, '', true );
	add_image_size( 'custom-size', 700, 200, true );
	add_theme_support( 'automatic-feed-links' );
	load_theme_textdomain( 'blank_theme', get_template_directory() . '/languages' );
}

/**
 *Functions
 */

function blank_theme_nav() {
	wp_nav_menu(
		array(
			'theme_location'  => 'header-menu',
			'menu'            => '',
			'container'       => 'div',
			'container_class' => 'menu-{menu slug}-container',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul>%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		)
	);
}

function blank_theme_header_scripts() {
	if ( $GLOBALS['pagenow'] != 'wp-login.php' && ! is_admin() ) {

		wp_register_script( 'conditionizr', get_template_directory_uri() . '/assets/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0' );
		wp_enqueue_script( 'conditionizr' );

		wp_register_script( 'modernizr', get_template_directory_uri() . '/assets/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1' );
		wp_enqueue_script( 'modernizr' );

		wp_register_script( 'bootstrap-scripts', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ), '4.1.3' );
		wp_enqueue_script( 'bootstrap-scripts' );

		wp_register_script( 'blank-theme-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '1.0.0' );
		wp_enqueue_script( 'blank-theme-scripts' );
	}
}

function blank_theme_conditional_scripts() {
	if ( is_page( 'pagenamehere' ) ) {
		wp_register_script( 'scriptname', get_template_directory_uri() . '/assets/js/scriptname.js', array( 'jquery' ), '1.0.0' );
		wp_enqueue_script( 'scriptname' );
	}
}

function blank_theme_styles() {
	wp_register_style( 'normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'normalize' );

	wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.1.3', 'all' );
	wp_enqueue_style( 'bootstrap-css' );
	wp_register_style( 'bootstrap-grid-css', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css', array(), '4.1.3', 'all' );
	wp_enqueue_style( 'bootstrap-grid-css' );
	wp_register_style( 'bootstrap-reboot-css', get_template_directory_uri() . '/assets/css/bootstrap-reboot.min.css', array(), '4.1.3', 'all' );
	wp_enqueue_style( 'bootstrap-reboot-css' );
	wp_register_style( 'html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'html5blank' );
}

function register_blank_theme_menu() {
	register_nav_menus( array(
		'header-menu'  => __( 'Header Menu', 'blank_theme' ),
		'sidebar-menu' => __( 'Sidebar Menu', 'blank_theme' ),
		'extra-menu'   => __( 'Extra Menu', 'blank_theme' )
	) );
}

function add_slug_to_body_class( $classes ) {
	global $post;
	if ( is_home() ) {
		$key = array_search( 'blog', $classes );
		if ( $key > - 1 ) {
			unset( $classes[ $key ] );
		}
	} elseif ( is_page() ) {
		$classes[] = sanitize_html_class( $post->post_name );
	} elseif ( is_singular() ) {
		$classes[] = sanitize_html_class( $post->post_name );
	}

	return $classes;
}

if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array(
		'name'          => __( 'Widget Area 1', 'blank_theme' ),
		'description'   => __( 'Description for this widget-area...', 'blank_theme' ),
		'id'            => 'widget-area-1',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	) );

	register_sidebar( array(
		'name'          => __( 'Widget Area 2', 'blank_theme' ),
		'description'   => __( 'Description for this widget-area...', 'blank_theme' ),
		'id'            => 'widget-area-2',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	) );
}

function blank_theme_wp_pagination() {
	global $wp_query;
	$big = 999999999;
	echo paginate_links( array(
		'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'format'  => '?paged=%#%',
		'current' => max( 1, get_query_var( 'paged' ) ),
		'total'   => $wp_query->max_num_pages
	) );
}

function remove_thumbnail_dimensions( $html ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );

	return $html;
}

/**
 *  Actions + Filters + ShortCodes
 */

add_action( 'init', 'blank_theme_header_scripts' );
add_action( 'wp_print_scripts', 'blank_theme_conditional_scripts' );
add_action( 'wp_enqueue_scripts', 'blank_theme_styles' );
add_action( 'init', 'register_blank_theme_menu' );
add_action( 'init', 'blank_theme_wp_pagination' );

<?php
/**
 * Utility functions
 */
function is_element_empty($element) {
  $element = trim($element);
  return !empty($element);
}

// Tell WordPress to use searchform.php from the templates/ directory
function roots_get_search_form($form) {
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
}
add_filter('get_search_form', 'roots_get_search_form');


/**
 * Custom functions
 */

// quita admin bar
add_filter('show_admin_bar', '__return_false');

// wpautop
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

// CPT's
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'cpt',
		array(
			'labels' => array(
				'name' => __( 'Productos' ),
				'singular_name' => __( 'Producto' )
			),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'producto'),
		'taxonomies' => array('category'),
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		)
	);
}

// Quitame los metaboxes que me sobran
function quita_metaboxes_inutiles() {
	remove_meta_box('postexcerpt' , 'page' , 'normal' ); 
	remove_meta_box('authordiv', 'page', 'normal');
	remove_meta_box('commentsdiv', 'page', 'normal');
	remove_meta_box('commentstatusdiv', 'page', 'normal');
	remove_meta_box('trackbacksdiv', 'page', 'normal');
	remove_meta_box('postexcerpt', 'page', 'normal');
	remove_meta_box('revisionsdiv', 'page', 'normal');
	remove_meta_box('postcustom', 'page', 'normal');
}
add_action( 'admin_menu' , 'quita_metaboxes_inutiles' );

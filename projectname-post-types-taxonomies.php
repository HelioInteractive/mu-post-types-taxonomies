<?php

/**
 * Plugin Name: Post Types & Taxonommies
 * Plugin URI:
 * Description: Keeping custom post type registration out of the theme!
 * Version: 1.0
 * Author: Helio Interactive
 * Author URI: https://heliointeractive.com
 * License: GPL3
 */

// Register custom post types
add_action( 'init', 'helio_ptt_post_types_init' );

function helio_ptt_post_types_init() {
	
	$labels = array(
		'name'               => _x( 'Books', 'post type general name', 'helio_ptt' ),
		'singular_name'      => _x( 'Book', 'post type singular name', 'helio_ptt' ),
		'menu_name'          => _x( 'Books', 'admin menu', 'helio_ptt' ),
		'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'helio_ptt' ),
		'add_new'            => _x( 'Add New', 'Book', 'helio_ptt' ),
		'add_new_item'       => __( 'Add New Book', 'helio_ptt' ),
		'new_item'           => __( 'New Book', 'helio_ptt' ),
		'edit_item'          => __( 'Edit Book', 'helio_ptt' ),
		'view_item'          => __( 'View Book', 'helio_ptt' ),
		'all_items'          => __( 'All Books', 'helio_ptt' ),
		'search_items'       => __( 'Search Books', 'helio_ptt' ),
		'parent_item_colon'  => __( 'Parent Books:', 'helio_ptt' ),
		'not_found'          => __( 'No Books found.', 'helio_ptt' ),
		'not_found_in_trash' => __( 'No Books found in Trash.', 'helio_ptt' )
	);
	
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => '' ),
		'capability_type'    => 'post',
		'has_archive'        => true, //set to false if you don't need an archive viwe of this post type
		'hierarchical'       => false, //false is like post, true is like page
		'menu_position'      => 4,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions', 'excerpt' ),
		'menu_icon'   	     => 'dashicons-book' //substitute any dashicon from https://developer.wordpress.org/resource/dashicons/
	);
	
	register_post_type( 'book', $args );
}

// Register taxonomies
add_action( 'init', 'helio_ptt_create_taxonomies', 0 );

function helio_ptt_create_taxonomies() {

	$labels = array(
		'name'              => _x( 'Genre', 'taxonomy general name' ),
		'singular_name'     => _x( 'Genre', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Genres' ),
		'all_items'         => __( 'All Genres' ),
		'parent_item'       => __( 'Parent Genre' ),
		'parent_item_colon' => __( 'Parent Genre:' ),
		'edit_item'         => __( 'Edit Genre' ),
		'update_item'       => __( 'Update Genre' ),
		'add_new_item'      => __( 'Add New Genre' ),
		'new_item_name'     => __( 'New Genre Name' ),
		'menu_name'         => __( 'Genres' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => '' ),
	);

	register_taxonomy( 'genre', array( 'book' ), $args );

}

<?php

add_action( 'init', 'cyn_post_type_register' );
add_action( 'init', 'cyn_taxonomy_register' );
add_action( 'init', 'cyn_term_register' );
add_action( 'init', 'cyn_page_register' );


function cyn_post_type_register() {
	cyn_make_post_type( 'Land', 'land', 'dashicons-flag' );
	cyn_make_post_type( 'House', 'house', 'dashicons-admin-home' );
	cyn_make_post_type( 'House + Land', 'house-and-land', 'dashicons-admin-home' );
	cyn_make_post_type( 'Exhibition', 'exhibition', 'dashicons-tickets-alt' );
	cyn_make_post_type( 'Question', 'faq', 'dashicons-editor-quote' );
}

function cyn_taxonomy_register() {
	cyn_make_taxonomy( 'company', 'company', [ 'house', 'land', 'exhibition' ] );
	cyn_make_taxonomy( 'faq-cat', 'faq-cat', [ 'faq' ] );
}

function cyn_make_post_type( $name, $slug, $icon, $menu = true ) {

	$args = [ 
		'label' => $name,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => $menu,
		'query_var' => true,
		'rewrite' => [ 'slug' => $slug ],
		'exclude_from_search' => false,
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => $icon,
		'supports' => [ 'title', 'thumbnail', 'editor' ],

	];

	register_post_type( $slug, $args );


}

function cyn_make_taxonomy( $name, $slug, $post_types, $is_hierarchical = true ) {


	$args = [ 
		'hierarchical' => $is_hierarchical,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => [ 'slug' => $slug ],
	];

	register_taxonomy( $slug, $post_types, $args );
}

function cyn_term_register() {
	//wp_insert_term(__('اقتصادی', 'cyn-dm'), 'tour-type', ['slug' => 'economy']);

}

function cyn_page_register() {
	if ( is_null( get_page_by_path( 'home-page' ) ) ) {
		$front_page_id = wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => 'Home',
			'post_name' => 'home-page',
			'page_template' => 'templates/home-page.php'
		] );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id );
	}
}

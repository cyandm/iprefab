<?php

add_action( 'init', 'cyn_post_type_register' );
add_action( 'init', 'cyn_taxonomy_register' );
add_action( 'init', 'cyn_term_register' );
add_action( 'init', 'cyn_page_register' );


function cyn_post_type_register() {
	cyn_make_post_type( __( 'land', 'cyn-dm' ), 'land', 'dashicons-flag' );
	cyn_make_post_type( __( 'house', 'cyn-dm' ), 'house', 'dashicons-admin-home' );
	cyn_make_post_type( __( 'house + land', 'cyn-dm' ), 'house-and-land', 'dashicons-admin-home' );
	cyn_make_post_type( __( 'exhibition', 'cyn-dm' ), 'exhibition', 'dashicons-tickets-alt' );
	cyn_make_post_type( __( 'Question', 'cyn-dm' ), 'faq', 'dashicons-editor-quote' );
	cyn_make_post_type( __( 'Forms', 'cyn-dm' ), 'form', 'dashicons-email' );
}

function cyn_taxonomy_register() {
	cyn_make_taxonomy( __( 'Company', 'cyn-dm' ), 'company', [ 'house', 'land', 'exhibition' ] );
	cyn_make_taxonomy( __( 'Faq Category', 'cyn-dm' ), 'faq-cat', [ 'faq' ] );
	cyn_make_taxonomy( __( 'Form Category', 'cyn-dm' ), 'form-cat', [ 'form' ] );
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

		'labels' => [ 'name' => $name ],
		'hierarchical' => $is_hierarchical,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => [ 'slug' => $slug ],
	];

	register_taxonomy( $slug, $post_types, $args );
}

function cyn_term_register() {
	wp_insert_term( __( 'contact us page', 'cyn-dm' ), 'form-cat', [ 'slug' => 'contact-us-page' ] );
	wp_insert_term( __( 'contact popup', 'cyn-dm' ), 'form-cat', [ 'slug' => 'contact-popup' ] );

}

function cyn_page_register() {
	if ( is_null( get_page_by_path( 'home-page' ) ) ) {
		$front_page_id = wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => __( 'Home', 'cyn-dm' ),
			'post_name' => 'home-page',
			'page_template' => 'templates/home-page.php'
		] );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id );
	}

	if ( is_null( get_page_by_path( 'suppliers' ) ) ) {
		wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => __( 'suppliers', 'cyn-dm' ),
			'post_name' => 'suppliers',
			'page_template' => 'templates/suppliers.php'
		] );
	}

	if ( is_null( get_page_by_path( 'contact-us' ) ) ) {
		wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => __( 'Contact us', 'cyn-dm' ),
			'post_name' => 'contact-us',
			'page_template' => 'templates/contact-us.php'
		] );
	}

	if ( is_null( get_page_by_path( 'about-us' ) ) ) {
		wp_insert_post( [ 
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => __( 'About us', 'cyn-dm' ),
			'post_name' => 'about-us',
			'page_template' => 'templates/about-us.php'
		] );
	}
}

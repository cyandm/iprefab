<?php

add_action( 'init', 'cyn_post_type_register' );
add_action( 'init', 'cyn_taxonomy_register' );
add_action( 'init', 'cyn_term_register' );
add_action( 'init', 'cyn_page_register' );


function cyn_post_type_register() {
	cyn_make_post_type( 'Land', 'land', 'dashicons-flag' );
	cyn_make_post_type( 'House', 'house', 'dashicons-admin-home' );
	cyn_make_post_type( 'House + Land', 'house-and-land', 'dashicons-admin-home' );
}

function cyn_taxonomy_register() {
	cyn_make_taxonomy( 'company', 'company', [ 'house', 'land' ] );
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
	// if ( ! get_option( 'cyn_theme_installed' ) ) {
	//     wp_insert_post( [ 
	//         'post_type' => 'page',
	//         'post_status' => 'publish',
	//         'post_title' => __( 'درباره ما', 'cyn-dm' ),
	//         'post_name' => 'about-us',
	//         'page_template' => 'templates/about.php'
	//     ] );

	//     update_option( 'cyn_theme_installed', true );
	// }
}

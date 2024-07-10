<?php

add_action( 'rest_api_init', 'cyn_register_rest_route' );


function cyn_register_rest_route() {
	contact_us_page();
	contact_us_popup();
	callback_popup();
	cities();
}

function contact_us_page() {
	register_rest_route( 'cyn-api/v1', '/forms/contact-page', [ 
		'methods' => 'POST',
		'callback' => 'handle_contact_page',
	] );

	function handle_contact_page() {

		//@FIXME nonce must be checked
		// if ( ! wp_verify_nonce( $_POST['_nonce'], 'wp_rest' ) ) {
		// 	return wp_send_json_error( [ 'error' => 'nonce is invalid' ], 403 );
		// }

		$insert_post = wp_insert_post( [ 
			'post_type' => 'form',
			'post_author' => 1,
			'post_title' => sanitize_text_field( $_POST['name'] ),
			'post_content' => sanitize_textarea_field( $_POST['message'] ),
			'meta_input' => [ 
				'email' => sanitize_email( $_POST['email'] ),
			]
		] );

		wp_set_object_terms( $insert_post, [ get_term_by( 'slug', 'contact-us-page', 'form-cat' )->term_id ], 'form-cat' );


		if ( is_wp_error( $insert_post ) )
			return wp_send_json_error( [ 'insert_row' => false ], 500 );



		wp_send_json_success( [ 'post_id' => $insert_post ], 200 );
	}
}

function contact_us_popup() {
	register_rest_route( 'cyn-api/v1', '/forms/contact-popup', [ 
		'methods' => 'POST',
		'callback' => 'handle_contact_popup',
	] );

	function handle_contact_popup() {

		//@FIXME nonce must be checked
		// if ( ! wp_verify_nonce( $_POST['_nonce'], 'wp_rest' ) ) {
		// 	return wp_send_json_error( [ 'error' => 'nonce is invalid' ], 403 );
		// }


		$meta = [];

		foreach ( $_POST as $key => $field ) {
			if ( in_array( $key, [ 'full_name', '_nonce' ] ) )
				continue;

			$meta[ $key ] = $field;
		}

		$insert_post = wp_insert_post( [ 
			'post_type' => 'form',
			'post_author' => 1,
			'post_title' => sanitize_text_field( $_POST['full_name'] ),
			'meta_input' => $meta
		] );

		wp_set_object_terms( $insert_post, [ get_term_by( 'slug', 'contact-popup', 'form-cat' )->term_id ], 'form-cat' );


		if ( is_wp_error( $insert_post ) )
			return wp_send_json_error( [ 'insert_row' => false ], 500 );



		wp_send_json_success( [ 'post_id' => $insert_post ], 200 );
	}
}

function callback_popup() {
	register_rest_route( 'cyn-api/v1', '/forms/callback', [ 
		'methods' => 'POST',
		'callback' => 'handle_callback_popup',
	] );

	function handle_callback_popup() {

		//@FIXME nonce must be checked
		// if ( ! wp_verify_nonce( $_POST['_nonce'], 'wp_rest' ) ) {
		// 	return wp_send_json_error( [ 'error' => 'nonce is invalid' ], 403 );
		// }


		$meta = [];

		foreach ( $_POST as $key => $field ) {
			if ( in_array( $key, [ 'full_name', '_nonce' ] ) )
				continue;

			$meta[ $key ] = $field;
		}

		$insert_post = wp_insert_post( [ 
			'post_type' => 'form',
			'post_author' => 1,
			'post_title' => sanitize_text_field( $_POST['full_name'] ),
			'meta_input' => $meta
		] );

		wp_set_object_terms( $insert_post, [ get_term_by( 'slug', 'callback-popup', 'form-cat' )->term_id ], 'form-cat' );



		if ( is_wp_error( $insert_post ) )
			return wp_send_json_error( [ 'insert_row' => false ], 500 );



		wp_send_json_success( [ 'post_id' => $insert_post ], 200 );
	}
}

function cities() {
	register_rest_route( 'cyn-api/v1', '/cities', [ 
		'methods' => 'GET',
		'callback' => 'handle_cities',
	] );


	function handle_cities( WP_REST_Request $request ) {
		global $wpdb;
		$result = [];

		$term = '%' . sanitize_text_field( $request->get_param( 'q' ) ) . '%';
		$table = $wpdb->prefix . 'postmeta';
		$cities = $wpdb->get_results( "SELECT * FROM $table WHERE `meta_key` = 'city'  AND `meta_value` LIKE '$term' " );

		$cities = array_column( $cities, 'meta_value' );
		$cities = array_unique( $cities );

		foreach ( $cities as $i => $city ) {
			array_push( $result, [ 
				'id' => $city,
				'text' => $city,
			] );
		}


		wp_send_json( $result );
		wp_die();
	}
}
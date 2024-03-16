<?php

/**
 * Summary of add_to_meta_query
 * @param string|array values 
 * @param string $meta_key
 * @param string ‘NUMERIC’, ‘BINARY’, ‘CHAR’, ‘DATE’, ‘DATETIME’, ‘DECIMAL’, ‘SIGNED’, ‘TIME’, ‘UNSIGNED‘
 * @param string $meta_compare
 * @param boolean $is_array
 * @param array $meta_query
 * @param array $filters
 * @return void
 */
function add_to_meta_query( $item_name, $meta_key, $meta_type, $meta_compare, $is_array = false, &$meta_query, $filters ) {


	if ( $is_array === false ) {
		$item =
			( isset ( $filters[ $item_name ] ) && $filters[ $item_name ] !== '' ) ?
			$filters[ $item_name ] : null;
	}

	if ( $is_array === true ) {
		$item_min = ( isset ( $filters[ $item_name[0] ] ) && $filters[ $item_name[0] ] !== '' ) ?
			$filters[ $item_name[0] ] : 0;

		$item_max = ( isset ( $filters[ $item_name[1] ] ) && $filters[ $item_name[1] ] !== '' ) ?
			$filters[ $item_name[1] ] : 1000000000000;
	}


	if ( $is_array === true ) {
		array_push( $meta_query,
			[ 
				'key' => $meta_key,
				'value' => [ $item_min, $item_max ],
				'type' => $meta_type,
				'compare' => $meta_compare
			],
		);
		return;
	}

	if ( $item === null || $item === 'null' )
		return;

	array_push( $meta_query,
		[ 
			'key' => $meta_key,
			'value' => $item,
			'type' => $meta_type,
			'compare' => $meta_compare
		],
	);
}


add_filter( 'pre_get_posts', 'cyn_sort_price' );
function cyn_sort_price( $query ) {
	if (
		is_admin() ||
		! $query->is_main_query() ||
		! $query->is_archive() ||
		! $query->is_post_type_archive()
	)
		return;


	$filters = cyn_get_filters();
	if ( $filters === false )
		return;
	if ( ! isset ( $filters['price-sort'] ) )
		return;



	$query->set( 'orderby', 'meta_value_num' );
	$query->set( 'meta_key', 'price' );
	$query->set( 'order', $filters['price-sort'] === 'lowest' ? 'ASC' : 'DESC' );

}

add_filter( 'pre_get_posts', 'cyn_filter_houses' );
function cyn_filter_houses( $query ) {
	if (
		is_admin() ||
		! $query->is_main_query() ||
		! $query->is_archive() ||
		! $query->is_post_type_archive( 'house' )
	)
		return;


	$filters = cyn_get_filters();
	if ( $filters === false )
		return;

	$meta_query = [];


	add_to_meta_query( 'floors', 'number_of_floors', 'numeric', '=', false, $meta_query, $filters );
	add_to_meta_query( 'rooms', 'rooms', 'numeric', '=', false, $meta_query, $filters );
	add_to_meta_query( [ 'areaMin', 'areaMax' ], 'total_area', 'numeric', 'between', true, $meta_query, $filters );
	add_to_meta_query( [ 'priceMin', 'priceMax' ], 'price', 'numeric', 'between', true, $meta_query, $filters );


	$query->set( 'meta_query', $meta_query );


	if ( isset ( $filters['originCompany'] ) && 'null' !== $filters['originCompany'] ) {
		$companies = get_terms( [ 
			'taxonomy' => 'company',
			'meta_query' => [ 
				[ 
					'key' => 'origin_of_company',
					'value' => $filters['originCompany'],
					'compare' => '='
				]
			]
		] );

		$companies_slug = [];

		foreach ( $companies as $company ) {
			array_push( $companies_slug, $company->slug );
		}
		$query->set( 'tax_query', [ 
			[ 
				'taxonomy' => 'company',
				'field' => 'slug',
				'terms' => $companies_slug,
			]
		] );
	}


}

add_filter( 'pre_get_posts', 'cyn_filter_lands' );
function cyn_filter_lands( $query ) {


	if (
		is_admin() ||
		! $query->is_main_query() ||
		! $query->is_archive() ||
		! $query->is_post_type_archive( 'land' )
	)
		return;


	$filters = cyn_get_filters();
	if ( $filters === false )
		return;


	$meta_query = [];

	add_to_meta_query( 'city', 'city', 'char', '=', false, $meta_query, $filters );
	add_to_meta_query( 'permitType', 'permit_type', 'char', '=', false, $meta_query, $filters );
	add_to_meta_query( [ 'surfaceMin', 'surfaceMax' ], 'surface', 'numeric', 'between', true, $meta_query, $filters );
	add_to_meta_query( [ 'priceMin', 'priceMax' ], 'price', 'numeric', 'between', true, $meta_query, $filters );

	$query->set( 'meta_query', $meta_query );
	$query->set( 's', $filters['search'] );


}

add_filter( 'pre_get_posts', 'cyn_filter_house_and_lands' );

function cyn_filter_house_and_lands( $query ) {
	if (
		is_admin() ||
		! $query->is_main_query() ||
		! $query->is_archive() ||
		! $query->is_post_type_archive( 'house-and-land' )
	)
		return;

	$filters = cyn_get_filters();
	if ( $filters === false )
		return;

	$meta_query = [];



	if ( isset ( $filters['city'] ) ) {
		$land_ids = [];
		$q = new WP_Query( [ 
			'post_type' => 'land',
			'meta_query' => [ 
				[ 
					'key' => 'city',
					'value' => $filters['city']
				]
			]
		] );

		foreach ( $q->posts as $post ) {
			array_push( $land_ids, $post->ID );
		}

		array_push( $meta_query,
			[ 
				'key' => 'related_land',
				'value' => $land_ids
			]
		);
	}

	if ( isset ( $filters['houseType'] ) ) {
		$house_ids = [];
		$house_q = new WP_Query( [ 
			'post_type' => 'house',
			'meta_query' => [ 
				[ 
					'key' => 'type',
					'value' => $filters['houseType']
				]
			]
		] );

		foreach ( $house_q->posts as $post ) {
			array_push( $house_ids, $post->ID );
		}

		array_push( $meta_query,
			[ 
				'key' => 'related_house',
				'value' => $house_ids
			]
		);
	}

	// add_to_meta_query( [ 'priceMin', 'priceMax' ], 'price', 'numeric', 'between', true, $meta_query, $filters );

	$query->set( 'meta_query', $meta_query );

}

/**
 * get filters from cookie
 * @return array|bool
 * return array from filters if cookie is set
 * return bool if cookie not set
 */
function cyn_get_filters() {
	if ( ! isset ( $_COOKIE['cyn-filters'] ) ) {
		return false;
	}

	$filters = (array) json_decode( stripslashes( $_COOKIE['cyn-filters'] ) );

	return $filters;
}
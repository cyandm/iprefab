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
function add_to_meta_query( $item_name, $meta_key, $meta_type, $meta_compare, &$meta_query, $filters, $is_array = false ) {


	if ( $is_array === false ) {
		$item =
			( isset( $filters[ $item_name ] ) && $filters[ $item_name ] !== '' ) ?
			$filters[ $item_name ] : null;
	}

	if ( $is_array === true ) {
		$item_min = ( isset( $filters[ $item_name[0] ] ) && $filters[ $item_name[0] ] !== '' ) ?
			$filters[ $item_name[0] ] : 0;

		$item_max = ( isset( $filters[ $item_name[1] ] ) && $filters[ $item_name[1] ] !== '' ) ?
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


	if ( count( $_GET ) === 0 )
		return;

	if ( ! isset( $_GET['price-sort'] ) )
		return;



	$query->set( 'orderby', 'meta_value_num' );
	$query->set( 'meta_key', 'price' );
	$query->set( 'order', $_GET['price-sort'] === 'lowest' ? 'ASC' : 'DESC' );

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

	if ( count( $_GET ) === 0 )
		return;

	$meta_query = [];

	add_to_meta_query( 'floors', 'number_of_floors', 'numeric', '=', $meta_query, $_GET, false );
	add_to_meta_query( 'rooms', 'rooms', 'numeric', '=', $meta_query, $_GET, false );
	add_to_meta_query( [ 'areaMin', 'areaMax' ], 'house_area', 'numeric', 'between', $meta_query, $_GET, true );
	add_to_meta_query( [ 'priceMin', 'priceMax' ], 'price', 'numeric', 'between', $meta_query, $_GET, true );

	$query->set( 'meta_query', $meta_query );


	if ( isset( $_GET['originCompany'] ) && 'null' !== $_GET['originCompany'] ) {
		$companies = get_terms( [ 
			'taxonomy' => 'company',
			'meta_query' => [ 
				[ 
					'key' => 'country',
					'value' => strtolower( $_GET['originCompany'] ),
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


	if ( count( $_GET ) === 0 )
		return;


	$meta_query = [];

	add_to_meta_query( 'city', 'city', 'char', '=', $meta_query, $_GET, false );
	add_to_meta_query( 'permitType', 'permit_type', 'char', '=', $meta_query, $_GET, false );
	add_to_meta_query( [ 'surfaceMin', 'surfaceMax' ], 'surface', 'numeric', 'between', $meta_query, $_GET, true );
	add_to_meta_query( [ 'priceMin', 'priceMax' ], 'price', 'numeric', 'between', $meta_query, $_GET, true );

	$query->set( 'meta_query', $meta_query );


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



	if ( count( $_GET ) === 0 )
		return;

	$meta_query = [];


	if ( ! empty( $_GET['city'] ) ) {
		array_push( $meta_query, [ 
			'key' => 'city',
			'value' => $_GET['city'],
			'compare' => '='
		] );
	}



	if ( ! empty( $_GET['priceMin'] ) || ! empty( $_GET['priceMax'] ) ) {

		$priceMax = empty( $_GET['priceMax'] ) ? 20000000000 : $_GET['priceMax'];
		$priceMin = empty( $_GET['priceMin'] ) ? 0 : $_GET['priceMin'];

		array_push( $meta_query, [ 
			'key' => 'price',
			'value' => [ $priceMin, $priceMax ],
			'type' => 'NUMERIC',
			'compare' => 'BETWEEN'
		] );
	}


	if ( ! empty( $_GET['areaMin'] ) || ! empty( $_GET['areaMax'] ) ) {

		$areaMax = empty( $_GET['areaMax'] ) ? 20000000000 : $_GET['areaMax'];
		$areaMin = empty( $_GET['areaMin'] ) ? 0 : $_GET['areaMin'];

		array_push( $meta_query, [ 
			'key' => 'area',
			'value' => [ $areaMin, $areaMax ],
			'type' => 'NUMERIC',
			'compare' => 'BETWEEN'
		] );
	}




	$query->set( 'meta_query', $meta_query );




}



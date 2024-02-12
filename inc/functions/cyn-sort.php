<?php

add_filter( 'pre_get_posts', 'cyn_sort_products_price' );
function cyn_sort_products_price( $query ) {
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
	if ( ! isset( $filters['price-sort'] ) )
		return;



	$query->set( 'orderby', 'meta_value_num' );
	$query->set( 'meta_key', 'helsinki_price' );
	$query->set( 'order', $filters['price-sort'] === 'lowest' ? 'ASC' : 'DESC' );

}

add_filter( 'pre_get_posts', 'cyn_filter_products' );
function cyn_filter_products( $query ) {
	if (
		is_admin() ||
		! $query->is_main_query() ||
		! $query->is_archive() ||
		! $query->is_post_type_archive( 'product' )
	)
		return;


	$filters = cyn_get_filters();
	if ( $filters === false )
		return;

	$meta_query = [];

	function add_to_meta_query( $item_name, $meta_key, $meta_type, $meta_compare, $is_array = false, &$meta_query, $filters ) {


		if ( $is_array === false ) {
			$item =
				( isset( $filters[ $item_name ] ) && $filters[ $item_name ] !== '' ) ?
				$filters[ $item_name ] : null;
		}

		if ( $is_array === true ) {
			$item_min = ( isset( $filters[ $item_name[0] ] ) && $filters[ $item_name[0] ] !== '' ) ?
				$filters[ $item_name[0] ] : 0;

			$item_max = ( isset( $filters[ $item_name[1] ] ) && $filters[ $item_name[1] ] !== '' ) ?
				$filters[ $item_name[1] ] : 1000000;
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


	add_to_meta_query( 'floors', 'number_of_floors', 'numeric', '=', false, $meta_query, $filters );
	add_to_meta_query( 'rooms', 'rooms', 'numeric', '=', false, $meta_query, $filters );
	add_to_meta_query( [ 'areaMin', 'areaMax' ], 'total_area', 'numeric', 'between', true, $meta_query, $filters );
	add_to_meta_query( [ 'priceMin', 'priceMax' ], 'helsinki_price', 'numeric', 'between', true, $meta_query, $filters );


	$query->set( 'meta_query', $meta_query );


	if ( isset( $filters['originCompany'] ) && 'null' !== $filters['originCompany'] ) {
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


/**
 * get filters from cookie
 * @return array|bool
 * return array from filters if cookie is set
 * return bool if cookie not set
 */
function cyn_get_filters() {
	if ( ! isset( $_COOKIE['cyn-filters'] ) ) {
		return false;
	}

	$filters = (array) json_decode( stripslashes( $_COOKIE['cyn-filters'] ) );

	return $filters;
}
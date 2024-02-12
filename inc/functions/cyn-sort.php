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
<?php

add_filter( 'pre_get_posts', 'cyn_sort_products_price' );


function cyn_sort_products_price( $query ) {
	if (
		is_admin() ||
		! $query->is_main_query() ||
		! $query->is_archive() ||
		! $query->is_post_type_archive() ||
		count( $_GET ) == 0 ||
		! isset( $_GET['price-sort'] )
	)
		return;

	$query->set( 'orderby', 'meta_value_num' );
	$query->set( 'meta_key', 'helsinki_price' );
	$query->set( 'order', $_GET['price-sort'] === 'lowest' ? 'ASC' : 'DESC' );

}

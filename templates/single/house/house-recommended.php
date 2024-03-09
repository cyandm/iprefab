<?php

$related_houses = get_field( 'related_houses' );
$product_ids = [];

if ( ! $related_houses ) {
	$products = new WP_Query( [ 
		'post_type' => 'house',
		'posts_per_page' => 3
	] );


	foreach ( $products->posts as $post ) {
		array_push( $product_ids, $post->ID );
	}
} else {
	$product_ids = $related_houses;
}




cyn_render_section_card( 'you might like',
	[ 
		'link' => get_post_type_archive_link( 'house' ),
		'title' => 'view all',
		'icon' => 'eye'
	], $product_ids, 'house', 'product-recommended' );



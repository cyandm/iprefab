<?php

$related_lands = get_field( 'related_lands' );
$product_ids = [];



if ( ! $related_lands ) {
	$products = new WP_Query( [ 
		'post_type' => 'land',
		'posts_per_page' => 3
	] );


	foreach ( $products->posts as $post ) {
		array_push( $product_ids, $post->ID );
	}
} else {
	$product_ids = $related_lands;
}





cyn_render_section_card( 'Recommended lands',
	[ 
		'link' => get_post_type_archive_link( 'land' ),
		'title' => 'view all',
		'icon' => 'eye'
	], $product_ids, 'land', 'land-recommended' );



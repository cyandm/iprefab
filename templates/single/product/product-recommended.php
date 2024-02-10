<?php

$products = new WP_Query( [ 
	'post_type' => 'product',
	'posts_per_page' => 2
] );

$product_ids = [];

foreach ( $products->posts as $post ) {
	array_push( $product_ids, $post->ID );
}

array_push( $product_ids, 2779 );


cyn_render_section_card( 'you might like',
	[ 
		'link' => '#',
		'title' => 'view all',
		'icon' => 'eye'
	], $product_ids, 'product', 'product-recommended' );



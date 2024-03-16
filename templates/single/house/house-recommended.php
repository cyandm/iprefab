<?php

$related_posts = get_field( 'related_houses' );
$post_ids = [];

if ( ! $related_posts ) {
	$products = new WP_Query( [ 
		'post_type' => 'house',
		'posts_per_page' => 3
	] );


	foreach ( $products->posts as $post ) {
		array_push( $post_ids, $post->ID );
	}
} else {
	$post_ids = $related_posts;
}




cyn_render_section_card( 'you might like',
	[ 
		'link' => get_post_type_archive_link( 'house' ),
		'title' => 'view all',
		'icon' => 'eye'
	], $post_ids, 'house', 'product-recommended' );



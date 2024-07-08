<?php

$related_posts = get_field( 'related_exhibition' );
$post_ids = [];

if ( ! $related_posts ) {
	$products = new WP_Query( [ 
		'post_type' => 'exhibition',
		'posts_per_page' => 3
	] );


	foreach ( $products->posts as $post ) {
		array_push( $post_ids, $post->ID );
	}
} else {
	$post_ids = $related_posts;
}


cyn_render_section_card( 'Discover Exhibitions',
	[ 
		'link' => get_post_type_archive_link( 'exhibition' ),
		'title' => pll__( 'view all' ),
		'icon' => 'eye'
	], $post_ids, 'exhibition', 'exhibition-recommended', 2 );



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





cyn_render_section_card( __( 'houses that are suitable for the land', 'cyn-dm' ),
	[ 
		'link' => get_post_type_archive_link( 'land' ),
		'title' => __( 'view all', 'cyn-dm' ),
		'icon' => 'eye'
	], $post_ids, 'land', 'land-recommended' );



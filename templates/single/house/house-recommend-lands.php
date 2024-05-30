<?php

$related_lands = get_field( 'related_lands' );
$post_ids = [];



if ( ! $related_lands ) {
	$products = new WP_Query( [ 
		'post_type' => 'land',
		'posts_per_page' => 3
	] );


	foreach ( $products->posts as $post ) {
		array_push( $post_ids, $post->ID );
	}
} else {
	$post_ids = $related_lands;
}





cyn_render_section_card( 'Recommended lands',
	[ 
		'link' => get_post_type_archive_link( 'land' ),
		'title' => __( 'view all', 'cyn-dm' ),
		'icon' => 'eye'
	], $post_ids, 'land', 'land-recommended' );



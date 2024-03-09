<?php

$related_lands = get_field( 'related_lands' );
$lands_ids = [];


if ( ! $related_lands ) {
	$lands = new WP_Query( [ 
		'post_type' => 'land',
		'posts_per_page' => 3
	] );


	foreach ( $lands->posts as $post ) {
		array_push( $lands_ids, $post->ID );
	}
} else {
	$lands_ids = $related_lands;
}




cyn_render_section_card( 'you might like',
	[ 
		'link' => get_post_type_archive_link( 'land' ),
		'title' => 'view all',
		'icon' => 'eye'
	], $lands_ids, 'land', 'land-recommended' );



<?php
$posts_from_acf = get_field( 'house_plus_land' );
$posts_from_query = get_posts( [ 
	'post_type' => 'house-and-land',
	'posts_per_page' => 3,
	'fields' => 'ids'
] );

if ( false !== $posts_from_acf ) {
	$posts = $posts_from_acf;
} else {
	$posts = $posts_from_query;
}



cyn_render_section_card( __( 'Investment offers for House + Land', 'cyn-dm' ), [ 
	'link' => '#', //@TODO link for view button
	'title' => 'view all',
	'icon' => 'eye'
], $posts, 'house-and-land', '', '2' );


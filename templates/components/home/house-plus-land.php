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



cyn_render_section_card(
	get_field( 'house_plus_land_title' )
	, [ 
		'link' => get_post_type_archive_link( 'house-and-land' ),
		'title' => pll__( 'view all' ),
		'icon' => 'eye'
	], $posts, 'house-and-land', 'swiper', '2' );


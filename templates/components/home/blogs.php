<?php

$blogs = [];

$blogs_from_acf = get_field( 'blogs' );


if ( ! empty( $blogs_from_acf ) ) {
	$blogs = $blogs_from_acf;
} else {
	$blogs = get_posts( [ 
		'post_type' => 'post',
		'fields' => 'ids',
		'numberposts' => '3'
	] );
}


cyn_render_section_card(
	__( 'Blogs', 'cyn-dm' ),
	[ 
		'title' => 'view all',
		'link' => '#',
		'icon' => 'eye'
	],
	$blogs,
	'post' );
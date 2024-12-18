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
	get_field( 'blogs_title' ),
	[ 
		'title' => __( 'view all', 'cyn-dm' ),
		'link' => get_post_type_archive_link( 'post' ),
		'icon' => 'eye'
	],
	$blogs,
	'post', 'swiper' );
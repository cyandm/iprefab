<?php
$exhibitions = [];

$exhibitions_from_acf = get_field( 'exhibitions' );

if ( empty( $exhibitions_from_acf ) ) {
	$exhibitions = get_posts( [ 
		'post_type' => 'exhibition',
		'numberposts' => 2,
		'fields' => 'ids',
	] );
} else {
	$exhibitions = $exhibitions_from_acf;
}




cyn_render_section_card( __( 'Discover Exhibitions', 'cyn-dm' ), [ 
	'title' => 'view all',
	'link' => get_post_type_archive_link( 'exhibition' ),
	'icon' => 'eye'
], $exhibitions, 'exhibition', '', 2 );
<?php

$companies = [];

$companies_from_acf = get_field( 'companies' );

if ( empty( $companies_from_acf ) ) {
	$companies = get_terms( [ 
		'taxonomy' => 'company',
		'parent' => get_term_by( 'slug', 'house-builder', 'company' )->term_id,
		'fields' => 'ids',
		'number' => 5
	] );
} else {
	$companies = $companies_from_acf;
}


cyn_render_section_card(
	get_field( 'company_title' ),
	[ 
		'link' => get_term_link( get_term_by( 'slug', 'house-builder', 'company' ) ),
		'title' => pll__( 'view all' ),
		'icon' => 'eye'
	], $companies, 'company-mini', 'swiper', 5 );
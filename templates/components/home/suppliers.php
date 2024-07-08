<?php

$companies = [];

$companies_from_acf = get_field( 'companies' );

$companies_query = get_terms( [ 
	'taxonomy' => 'company',
	'fields' => 'ids',
	'number' => 5

] );

if ( is_null( $companies_from_acf ) || false == $companies_from_acf ) {
	$companies = $companies_query;
} else {
	$companies = $companies_from_acf;
}


cyn_render_section_card(
	get_field( 'company_title' ),
	[ 
		'link' => get_permalink( get_page_by_path( 'suppliers' ) ),
		'title' => pll__( 'view all' ),
		'icon' => 'eye'
	], $companies, 'company-mini', 'swiper', 5 );
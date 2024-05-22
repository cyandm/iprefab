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


cyn_render_section_card( __( 'Suppliers in Finland', 'cyn-dm' ), [ 
	'link' => '#', //@TODO link for view button
	'title' => 'view all',
	'icon' => 'eye'
], $companies, 'company-mini', '', 5 );
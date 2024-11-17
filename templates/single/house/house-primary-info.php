<?php
$company = get_the_terms( get_queried_object_id(), 'company' )[0];

$primary_data = [ 
	[ 
		'icon' => 'money-4',
		'text' => __( 'fee', 'cyn-dm' ),
		'value' => '€' . number_format( intval( get_field( 'price' ) ) ),
	],
	[ 
		'icon' => 'location',
		'text' => __( 'origin of company', 'cyn-dm' ),
		'value' => get_field( 'country', 'company_' . $company->term_id ),
	],
	[ 
		'icon' => 'home-2',
		'text' => __( 'house area', 'cyn-dm' ),
		'value' => '<span>' . get_field( 'house_area' ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'icon' => 'size',
		'text' => __( 'living area', 'cyn-dm' ),
		'value' => '<span>' . get_field( 'living_area' ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'icon' => 'bed',
		'text' => __( 'rooms', 'cyn-dm' ),
		'value' => get_field( 'rooms' ),
		'is_svg' => true,
	],


];




get_template_part( '/templates/single/general/primary-info', null, [ 'primary_data' => $primary_data ] );


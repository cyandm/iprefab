<?php
$company = get_the_terms( get_queried_object_id(), 'company' )[0];

$primary_data = [ 
	[ 
		'icon' => 'money-4',
		'text' => pll__( 'fee' ),
		'value' => '€' . number_format( intval( get_field( 'price' ) ) ),
	],
	[ 
		'icon' => 'location',
		'text' => pll__( 'origin of company' ),
		'value' => get_field( 'country', 'company_' . $company->term_id ),
	],
	[ 
		'icon' => 'home-2',
		'text' => pll__( 'house area' ),
		'value' => '<span>' . get_field( 'house_area' ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],

	[ 
		'icon' => 'bed',
		'text' => pll__( 'rooms' ),
		'value' => get_field( 'rooms' ),
		'is_svg' => true,
	],
	[ 
		'icon' => 'layers-1',
		'text' => pll__( 'floors' ),
		'value' => get_field( 'number_of_floors' ),
	],

];




get_template_part( '/templates/single/general/primary-info', null, [ 'primary_data' => $primary_data ] );


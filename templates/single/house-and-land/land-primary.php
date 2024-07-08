<?php
$land_id = $args['land_id'];


$primary_data = [ 
	[ 
		'icon' => 'money-4',
		'text' => pll__( 'fee' ),
		'value' => '€' . number_format( intval( get_field( 'price', $land_id ) ) ),
	],
	[ 
		'icon' => 'map-1',
		'text' => pll__( 'city' ),
		'value' => get_field( 'city', $land_id ),
	],
	[ 
		'icon' => 'location',
		'text' => pll__( 'neighborhood' ),
		'value' => str_split( strval( get_field( 'neighborhood', $land_id ) ), 10 )[0],
	],
	[ 
		'icon' => 'star',
		'text' => pll__( 'permit type' ),
		'value' => get_field( 'permit_type', $land_id ),
	],
	[ 
		'icon' => 'size',
		'text' => pll__( 'permit size' ),
		'value' => '<span>' . get_field( 'surface', $land_id ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'icon' => 'size',
		'text' => pll__( 'total area' ),
		'value' => '<span>' . get_field( 'surface', $land_id ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],

];




get_template_part(
	'/templates/single/general/primary-info',
	null,
	[ 
		'primary_data' => $primary_data,
		'title' => pll__( 'Land Info' )

	] );


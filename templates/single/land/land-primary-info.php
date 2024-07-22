<?php
$primary_data = [ 
	[ 
		'icon' => 'money-4',
		'text' => pll__( 'price' ),
		'value' => '€' . number_format( get_field( 'price' ) ),
	],
	[ 
		'icon' => 'size',
		'text' => pll__( 'building right' ),
		'value' => '<span>' . get_field( 'building_right' ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'icon' => 'size',
		'text' => pll__( 'total area' ),
		'value' => '<span>' . get_field( 'surface' ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'icon' => 'star',
		'text' => pll__( 'permit type' ),
		'value' => get_field( 'permit_type' ),
	],
	[ 
		'icon' => 'map-1',
		'text' => pll__( 'city' ),
		'value' => get_field( 'city' ),
	],
	[ 
		'icon' => 'location',
		'text' => pll__( 'neighborhood' ),
		'value' => str_split( get_field( 'neighborhood' ), 10 )[0] . '...',
	],
];




get_template_part( '/templates/single/general/primary-info', null, [ 'primary_data' => $primary_data ] );


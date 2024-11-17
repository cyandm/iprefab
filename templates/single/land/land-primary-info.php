<?php
$primary_data = [ 
	[ 
		'icon' => 'money-4',
		'text' => __( 'price', 'cyn-dm' ),
		'value' => '€' . number_format( get_field( 'price' ) ),
	],
	[ 
		'icon' => 'size',
		'text' => __( 'building right', 'cyn-dm' ),
		'value' => '<span>' . get_field( 'building_right' ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'icon' => 'size',
		'text' => __( 'total area', 'cyn-dm' ),
		'value' => '<span>' . get_field( 'surface' ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'icon' => 'star',
		'text' => __( 'permit type', 'cyn-dm' ),
		'value' => get_field( 'permit_type' ),
	],
	[ 
		'icon' => 'map-1',
		'text' => __( 'city', 'cyn-dm' ),
		'value' => get_field( 'city' ),
	],
	[ 
		'icon' => 'location',
		'text' => __( 'neighborhood', 'cyn-dm' ),
		'value' => str_split( get_field( 'neighborhood' ), 10 )[0] . '...',
	],
];




get_template_part( '/templates/single/general/primary-info', null, [ 'primary_data' => $primary_data ] );


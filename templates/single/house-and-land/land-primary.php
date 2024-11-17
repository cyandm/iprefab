<?php
$land_id = $args['land_id'];


$primary_data = [ 
	[ 
		'icon' => 'money-4',
		'text' => __( 'fee', 'cyn-dm' ),
		'value' => '€' . number_format( intval( get_field( 'price', $land_id ) ) ),
	],
	[ 
		'icon' => 'map-1',
		'text' => __( 'city', 'cyn-dm' ),
		'value' => get_field( 'city', $land_id ),
	],
	[ 
		'icon' => 'location',
		'text' => __( 'neighborhood', 'cyn-dm' ),
		'value' => str_split( strval( get_field( 'neighborhood', $land_id ) ), 10 )[0],
	],
	[ 
		'icon' => 'star',
		'text' => __( 'permit type', 'cyn-dm' ),
		'value' => get_field( 'permit_type', $land_id ),
	],
	[ 
		'icon' => 'size',
		'text' => __( 'permit size', 'cyn-dm' ),
		'value' => '<span>' . get_field( 'building_right', $land_id ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'icon' => 'size',
		'text' => __( 'total area', 'cyn-dm' ),
		'value' => '<span>' . get_field( 'surface', $land_id ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],

];




get_template_part(
	'/templates/single/general/primary-info',
	null,
	[ 
		'primary_data' => $primary_data,
		'title' => __( 'land info', 'cyn-dm' )

	] );


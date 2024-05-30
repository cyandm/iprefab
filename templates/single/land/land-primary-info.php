<?php
$primary_data = [ 
	[ 
		'icon' => 'money-4',
		'text' => __( 'fee', 'cyn-dm' ),
		'value' => '€' . number_format( get_field( 'price' ) ),
	],
	[ 
		'icon' => 'map-1',
		'text' => __( 'city', 'cyn-dm' ),
		'value' => get_field( 'city' ),
	],
	[ 
		'icon' => 'location',
		'text' => __( 'neighborhood', 'cyn-dm' ),
		'value' => str_split( get_field( 'location' ), 10 )[0] . '...',
	],
	[ 
		'icon' => 'star',
		'text' => __( 'permit type', 'cyn-dm' ),
		'value' => get_field( 'permit-type' ),
	],
	[ 
		'icon' => 'size',
		'text' => __( 'permit size', 'cyn-dm' ),
		'value' => '<span>' . get_field( 'surface' ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'icon' => 'size',
		'text' => __( 'total area', 'cyn-dm' ),
		'value' => '<span>' . get_field( 'surface' ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],

];




get_template_part( '/templates/single/general/primary-info', null, [ 'primary_data' => $primary_data ] );


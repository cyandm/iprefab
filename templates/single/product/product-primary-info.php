<?php
$primary_data = [ 
	[ 
		'icon' => 'money-4',
		'text' => 'fee',
		'value' => '€' . number_format( get_field( 'helsinki_price' ) ),
	],
	[ 
		'icon' => 'location',
		'text' => 'location',
		'value' => 'location',
	],
	[ 
		'icon' => 'home-2',
		'text' => 'house area',
		'value' => '<span>' . get_field( 'apartment_area' ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'icon' => 'size',
		'text' => 'total area',
		'value' => '<span>' . get_field( 'total_area' ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'icon' => 'lamp-1',
		'text' => 'rooms',
		'value' => get_field( 'rooms' ),
	],
	[ 
		'icon' => 'layers-1',
		'text' => 'floors',
		'value' => get_field( 'number_of_floors' ),
	],

];




get_template_part( '/templates/single/general/primary-info', null, [ 'primary_data' => $primary_data ] );


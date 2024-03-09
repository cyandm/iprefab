<?php
$house_id = $args['house_id'];

$primary_data = [ 
	[ 
		'icon' => 'money-4',
		'text' => 'fee',
		'value' => '€' . number_format( get_field( 'price', $house_id ) ),
	],
	[ 
		'icon' => 'location',
		'text' => 'location',
		'value' => 'location',
	],
	[ 
		'icon' => 'home-2',
		'text' => 'house area',
		'value' => '<span>' . get_field( 'house_area', $house_id ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'icon' => 'size',
		'text' => 'total area',
		'value' => '<span>' . get_field( 'total_area', $house_id ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'icon' => 'lamp-1',
		'text' => 'rooms',
		'value' => get_field( 'rooms', $house_id ),
	],
	[ 
		'icon' => 'layers-1',
		'text' => 'floors',
		'value' => get_field( 'number_of_floors', $house_id ),
	],

];





get_template_part(
	'/templates/single/general/primary-info',
	null,
	[ 
		'primary_data' => $primary_data,
		'title' => 'House Primary'
	] );


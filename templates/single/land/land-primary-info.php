<?php
$primary_data = [ 
	[ 
		'icon' => 'money-4',
		'text' => 'fee',
		'value' => '€' . number_format( get_field( 'price' ) ),
	],
	[ 
		'icon' => 'map-1',
		'text' => 'city',
		'value' => get_field( 'city' ),
	],
	[ 
		'icon' => 'location',
		'text' => 'neighborhood',
		'value' => str_split( get_field( 'location' ), 10 )[0] . '...',
	],
	[ 
		'icon' => 'star',
		'text' => 'permit type',
		'value' => get_field( 'permit-type' ),
	],
	[ 
		'icon' => 'size',
		'text' => 'permit size',
		'value' => '<span>' . get_field( 'surface' ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'icon' => 'size',
		'text' => 'total area',
		'value' => '<span>' . get_field( 'surface' ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],

];




get_template_part( '/templates/single/general/primary-info', null, [ 'primary_data' => $primary_data ] );


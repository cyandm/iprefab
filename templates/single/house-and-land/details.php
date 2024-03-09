<?php
$house_id = $args['house_id'] ?? null;
$land_id = $args['land_id'] ?? null;


$details = [ 
	[ 
		'name' => 'publisher',
		'value' => ''
	],
	[ 
		'name' => 'Neighborhood',
		'value' => get_field( 'neighborhood', $land_id )
	],
	[ 
		'name' => 'Material',
		'value' => get_field( 'material', $house_id )
	],
	[ 
		'name' => 'Total Area',
		'value' => get_field( 'total_area', $house_id ) . '<span class="unit">m<sup>2</sup></span>'
	],
	[ 
		'name' => 'House Area',
		'value' => get_field( 'house_area', $house_id ) . '<span class="unit">m<sup>2</sup></span>'
	],
	[ 
		'name' => 'balcony',
		'value' => get_field( 'balcony', $house_id ) ? 'yes' : 'no'
	],
	[ 
		'name' => 'Garage',
		'value' => get_field( 'garage', $house_id ) ? 'yes' : 'no'
	],
	[ 
		'name' => 'Kitchen Appliances',
		'value' => get_field( 'kitchen_appliances', $house_id ) ? 'yes' : 'no'
	],
	[ 
		'name' => 'Bathroom Appliances',
		'value' => get_field( 'bathroom_appliances', $house_id ) ? 'yes' : 'no'
	],
	[ 
		'name' => 'Ceiling Style',
		'value' => get_field( 'celling_style', $house_id ),
	],
	[ 
		'name' => 'Façade / Material',
		'value' => get_field( 'facade_material', $house_id )
	],
	[ 
		'name' => 'Garge (open or close)',
		'value' => get_field( 'garage_mode', $house_id )
	],
	[ 
		'name' => 'land details',
		'value' => "<a class=\" btn-accent btn-small \" href=\" " . get_permalink( $land_id ) . " \" > more info </a>"
	],
];



get_template_part( '/templates/single/general/details', null, [ 
	'product_details' => $details
] );
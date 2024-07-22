<?php
$house_id = $args['house_id'] ?? null;
$land_id = $args['land_id'] ?? null;


$details = [ 

	[ 
		'name' => pll__( 'neighborhood' ),
		'value' => get_field( 'neighborhood', $land_id )
	],
	[ 
		'name' => pll__( 'material' ),
		'value' => get_field( 'material', $house_id )
	],
	[ 
		'name' => pll__( 'total area' ),
		'value' => get_field( 'total_area', $house_id ) . '<span class="unit">m<sup>2</sup></span>'
	],
	[ 
		'name' => pll__( 'house area' ),
		'value' => get_field( 'house_area', $house_id ) . '<span class="unit">m<sup>2</sup></span>'
	],
	[ 
		'name' => pll__( 'balcony' ),
		'value' => get_field( 'balcony', $house_id ) ? 'yes' : 'no'
	],
	[ 
		'name' => pll__( 'garage' ),
		'value' => get_field( 'garage', $house_id ) ? 'yes' : 'no'
	],
	[ 
		'name' => pll__( 'kitchen appliances' ),
		'value' => get_field( 'kitchen_appliances', $house_id ) ? 'yes' : 'no'
	],
	[ 
		'name' => pll__( 'bathroom appliances' ),
		'value' => get_field( 'bathroom_appliances', $house_id ) ? 'yes' : 'no'
	],
	[ 
		'name' => pll__( 'celling style' ),
		'value' => get_field( 'celling_style', $house_id ),
	],
	[ 
		'name' => pll__( 'facade / material' ),
		'value' => get_field( 'facade_material', $house_id )
	],
	[ 
		'name' => pll__( 'garage (open or close)' ),
		'value' => get_field( 'garage_mode', $house_id )
	],
	[ 
		'name' => pll__( 'land details' ),
		'value' => "<a class=\" btn-accent btn-small \" href=\" " . get_permalink( $land_id ) . " \" > more info </a>"
	],
];



get_template_part( '/templates/single/general/details', null, [ 
	'product_details' => $details
] );
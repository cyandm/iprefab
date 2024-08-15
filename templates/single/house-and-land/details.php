<?php
$house_id = $args['house_id'] ?? null;
$land_id = $args['land_id'] ?? null;


$details = [ 

	[ 
		'name' => __( 'neighborhood', 'cyn-dm' ),
		'value' => get_field( 'neighborhood', $land_id )
	],
	[ 
		'name' => __( 'material', 'cyn-dm' ),
		'value' => get_field( 'material', $house_id )
	],
	[ 
		'name' => __( 'total area', 'cyn-dm' ),
		'value' => get_field( 'total_area', $house_id ) . '<span class="unit">m<sup>2</sup></span>'
	],
	[ 
		'name' => __( 'house area', 'cyn-dm' ),
		'value' => get_field( 'house_area', $house_id ) . '<span class="unit">m<sup>2</sup></span>'
	],
	[ 
		'name' => __( 'balcony', 'cyn-dm' ),
		'value' => get_field( 'balcony', $house_id ) ? 'yes' : 'no'
	],
	[ 
		'name' => __( 'garage', 'cyn-dm' ),
		'value' => get_field( 'garage', $house_id ) ? 'yes' : 'no'
	],
	[ 
		'name' => __( 'kitchen appliances', 'cyn-dm' ),
		'value' => get_field( 'kitchen_appliances', $house_id ) ? 'yes' : 'no'
	],
	[ 
		'name' => __( 'bathroom appliances', 'cyn-dm' ),
		'value' => get_field( 'bathroom_appliances', $house_id ) ? 'yes' : 'no'
	],
	[ 
		'name' => __( 'celling style', 'cyn-dm' ),
		'value' => get_field( 'celling_style', $house_id ),
	],
	[ 
		'name' => __( 'facade / material', 'cyn-dm' ),
		'value' => get_field( 'facade_material', $house_id )
	],
	[ 
		'name' => __( 'garage (open or close)', 'cyn-dm' ),
		'value' => get_field( 'garage_mode', $house_id )
	],
	[ 
		'name' => __( 'land details', 'cyn-dm' ),
		'value' => "<a class=\" btn-accent btn-small \" href=\" " . get_permalink( $land_id ) . " \" > more info </a>"
	],
];



get_template_part( '/templates/single/general/details', null, [ 
	'product_details' => $details
] );
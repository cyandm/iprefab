<?php
$company = get_the_terms( get_queried_object_id(), 'company' )[0];
$company_logo = wp_get_attachment_image(
	get_field( 'logo', 'company_' . $company->term_id ),
	[ 300, 300 ], false,
	[ 'style' => '--logo-color:' . get_field( 'color', 'company_' . $company->term_id ) ] );


$age = intval( date( 'Y' ) ) - intval( get_field( 'established_year', 'company_' . $company->term_id ) );




$product_details = [ 
	[ 
		'name' => pll__( 'type' ),
		'value' => get_field( 'type' )
	],
	[ 
		'name' => pll__( 'age of company' ),
		'value' => $age . '<span class="unit">years</span>'
	],

	[ 
		'name' => pll__( 'material' ),
		'value' => get_field( 'material' ) ?? ''
	],
	[ 
		'name' => pll__( 'total area' ),
		'value' => get_field( 'total_area' ) . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'name' => pll__( 'house area' ),
		'value' => get_field( 'house_area' ) . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'name' => pll__( 'storage' ),
		'value' => get_field( 'storage' ) ? 'yes' : 'no'
	],
	[ 
		'name' => pll__( 'balcony' ),
		'value' => get_field( 'balcony' ) ? 'yes' : 'no'
	],
	[ 
		'name' => pll__( 'garage' ),
		'value' => get_field( 'garage' ) ? 'yes' : 'no'
	],
	[ 
		'name' => pll__( 'sauna' ),
		'value' => get_field( 'sauna' ) ? 'yes' : 'no'
	],
	[ 
		'name' => pll__( 'kitchen appliances' ),
		'value' => get_field( 'kitchen_appliances' ) ? 'yes' : 'no'
	],
	[ 
		'name' => pll__( 'bathroom appliances' ),
		'value' => get_field( 'bathroom_appliances' ) ? 'yes' : 'no'
	],
	[ 
		'name' => pll__( 'celling style' ),
		'value' => get_field( 'celling_style' )
	],
	[ 
		'name' => pll__( 'facade / material' ),
		'value' => get_field( 'facade_material' )
	],
	[ 
		'name' => pll__( 'garage (open or close)' ),
		'value' => get_field( 'garage_mode' )
	],
];

get_template_part(
	'/templates/single/general/details',
	null,
	[ 'product_details' => $product_details ] );



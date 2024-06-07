<?php
$company = get_the_terms( get_queried_object_id(), 'company' )[0];
$company_logo = wp_get_attachment_image(
	get_field( 'logo', 'company_' . $company->term_id ),
	[ 300, 300 ], false,
	[ 'style' => '--logo-color:' . get_field( 'color', 'company_' . $company->term_id ) ] );


$age = intval( date( 'Y' ) ) - intval( get_field( 'established_year', 'company_' . $company->term_id ) );




$product_details = [ 
	[ 
		'name' => __( 'company verification type', 'cyn-dm' ),
		'value' => get_field( 'type' )
	],
	[ 
		'name' => __( 'age of company', 'cyn-dm' ),
		'value' => $age . '<span class="unit">years</span>'
	],
	// [ 
	// 	'name' => __( 'logo', 'cyn-dm' ),
	// 	'value' => $company_logo
	// ],
	[ 
		'name' => __( 'material', 'cyn-dm' ),
		'value' => get_field( 'material' ) ?? ''
	],
	[ 
		'name' => __( 'total area', 'cyn-dm' ),
		'value' => get_field( 'total_area' ) . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'name' => __( 'house area', 'cyn-dm' ),
		'value' => get_field( 'house_area' ) . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'name' => __( 'storage', 'cyn-dm' ),
		'value' => get_field( 'storage' ) ? 'yes' : 'no'
	],
	[ 
		'name' => __( 'balcony', 'cyn-dm' ),
		'value' => get_field( 'balcony' ) ? 'yes' : 'no'
	],
	[ 
		'name' => __( 'garage', 'cyn-dm' ),
		'value' => get_field( 'garage' ) ? 'yes' : 'no'
	],
	[ 
		'name' => __( 'sauna', 'cyn-dm' ),
		'value' => get_field( 'sauna' ) ? 'yes' : 'no'
	],
	[ 
		'name' => __( 'kitchen appliances', 'cyn-dm' ),
		'value' => get_field( 'kitchen_appliances' ) ? 'yes' : 'no'
	],
	[ 
		'name' => __( 'bathroom appliances', 'cyn-dm' ),
		'value' => get_field( 'bathroom_appliances' ) ? 'yes' : 'no'
	],
	[ 
		'name' => __( 'celling style', 'cyn-dm' ),
		'value' => get_field( 'celling_style' )
	],
	[ 
		'name' => __( 'facade / material', 'cyn-dm' ),
		'value' => get_field( 'facade_material' )
	],
	[ 
		'name' => __( 'garage (open or close)', 'cyn-dm' ),
		'value' => get_field( 'garage_mode' )
	],
];

get_template_part(
	'/templates/single/general/details',
	null,
	[ 'product_details' => $product_details ] );



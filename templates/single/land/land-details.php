<?php
$company = get_the_terms( get_queried_object_id(), 'company' )[0];
$company_logo = wp_get_attachment_image(
	get_field( 'logo', 'company_' . $company->term_id ),
	[ 300, 300 ], false,
	[ 'style' => '--logo-color:' . get_field( 'color', 'company_' . $company->term_id ) ] );

$product_details = [ 
	[ 
		'name' => __( 'publisher', 'cyn-dm' ),
		'value' => $company->name,
	],
	[ 
		'name' => __( 'publisher logo', 'cyn-dm' ),
		'value' => $company_logo
	],
	[ 
		'name' => __( 'neighborhood', 'cyn-dm' ),
		'value' => get_field( 'neighborhood' )
	],
	[ 
		'name' => __( 'building right', 'cyn-dm' ),
		'value' => get_field( 'building_right' ),
	],
	[ 
		'name' => __( 'extra building right', 'cyn-dm' ),
		'value' => get_field( 'extra_building_right' ),

	],
	[ 
		'name' => __( 'mortgage', 'cyn-dm' ),
		'value' => get_field( 'mortgage' ),

	],
	[ 
		'name' => __( 'contact name', 'cyn-dm' ),
		'value' => get_field( 'contact_name' ),

	],
	[ 
		'name' => __( 'contact number', 'cyn-dm' ),
		'value' => get_field( 'contact_number' ),
	],
	[ 
		'name' => __( 'contact email', 'cyn-dm' ),
		'value' => get_field( 'contact_email' ),
	],
	[ 
		'name' => __( 'to demolish', 'cyn-dm' ),
		'value' => get_field( 'dilapidated' ) ? 'Yes' : 'No',
	],
];

get_template_part(
	'/templates/single/general/details',
	null,
	[ 'product_details' => $product_details ] );



<?php
$company = get_the_terms( get_queried_object_id(), 'company' )[0];
$company_logo = wp_get_attachment_image(
	get_field( 'logo', 'company_' . $company->term_id ),
	[ 300, 300 ], false,
	[ 'style' => '--logo-color:' . get_field( 'color', 'company_' . $company->term_id ) ] );

$product_details = [ 
	[ 
		'name' => 'publisher',
		'value' => ''
	],
	[ 
		'name' => 'publisher logo',
		'value' => $company_logo
	],
	[ 
		'name' => 'neighborhood',
		'value' => get_field( 'location' )
	],
	[ 
		'name' => 'building right',
		'value' => ''
	],
	[ 
		'name' => 'extra building right',
		'value' => ''
	],
	[ 
		'name' => 'mortgage',
		'value' => ''
	],
	[ 
		'name' => 'contact name',
		'value' => ''
	],
	[ 
		'name' => 'contact number',
		'value' => ''
	],
	[ 
		'name' => 'contact email',
		'value' => ''
	],
	[ 
		'name' => 'to demolish',
		'value' => ''
	],
];

get_template_part(
	'/templates/single/general/details',
	null,
	[ 'product_details' => $product_details ] );



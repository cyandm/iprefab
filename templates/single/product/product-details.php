<?php
$company = get_the_terms( get_queried_object_id(), 'company' )[0];
$company_logo = wp_get_attachment_image(
	get_field( 'logo', 'company_' . $company->term_id ),
	[ 300, 300 ] );

$product_details = [ 
	[ 
		'name' => 'company verification type',
		'value' => ''
	],
	[ 
		'name' => 'age of compony',
		'value' => ''
	],
	[ 
		'name' => 'logo',
		'value' => $company_logo
	],
	[ 
		'name' => 'material',
		'value' => get_field( 'material' )
	],
	[ 
		'name' => 'total area',
		'value' => ''
	],
	[ 
		'name' => 'house area',
		'value' => ''
	],
	[ 
		'name' => 'storage',
		'value' => ''
	],
	[ 
		'name' => 'balcony',
		'value' => ''
	],
	[ 
		'name' => 'garage',
		'value' => ''
	],
	[ 
		'name' => 'kitchen appliances',
		'value' => ''
	],
	[ 
		'name' => 'bathroom appliances',
		'value' => ''
	],
	[ 
		'name' => 'celling style',
		'value' => ''
	],
	[ 
		'name' => 'façade / material',
		'value' => ''
	],
	[ 
		'name' => 'garage (open or close)',
		'value' => ''
	],
];

get_template_part(
	'/templates/single/general/details',
	null,
	[ 'product_details' => $product_details ] );



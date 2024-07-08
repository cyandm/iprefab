<?php
$product_details = [ 

	[ 
		'name' => pll__( 'neighborhood' ),
		'value' => get_field( 'neighborhood' )
	],
	[ 
		'name' => pll__( 'building right' ),
		'value' => get_field( 'building_right' ),
	],


	[ 
		'name' => pll__( 'contact name' ),
		'value' => get_field( 'contact_name' ),

	],
	[ 
		'name' => pll__( 'contact number' ),
		'value' => get_field( 'contact_number' ),
	],


];

get_template_part(
	'/templates/single/general/details',
	null,
	[ 'product_details' => $product_details ] );



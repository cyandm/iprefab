<?php
$product_details = [ 

	[ 
		'name' => __( 'neighborhood', 'cyn-dm' ),
		'value' => get_field( 'neighborhood' )
	],
	[ 
		'name' => __( 'building right', 'cyn-dm' ),
		'value' => get_field( 'building_right' ) . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'name' => __( 'total area', 'cyn-dm' ),
		'value' => get_field( 'surface' ) . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'name' => __( 'contact name', 'cyn-dm' ),
		'value' => get_field( 'contact_name' ),

	],
	[ 
		'name' => __( 'contact number', 'cyn-dm' ),
		'value' => get_field( 'contact_number' ),
	],


];

get_template_part(
	'/templates/single/general/details',
	null,
	[ 'product_details' => $product_details ] );



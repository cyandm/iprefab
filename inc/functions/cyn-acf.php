<?php

define( 'CYN_ACF_PATH', get_stylesheet_directory() . '/inc/acf/' );
define( 'CYN_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/' );
include_once( CYN_ACF_PATH . 'acf.php' );

add_filter( 'acf/settings/url', function ($url) {
	return CYN_ACF_URL;
} );
add_filter( 'acf/settings/show_updates', '__return_false', 100 );
// add_filter( 'acf/settings/show_admin', '__return_false', 100 );

add_action( 'acf/include_fields', 'cyn_register_acf' );

$i = 0;
function cyn_acf_unique_id() {
	global $i;
	$i++;
	return "field_$i";
}


function cyn_register_acf() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}
	cyn_register_acf_company_settings();
	cyn_register_acf_related();
	cyn_register_acf_lands_settings();
	cyn_register_acf_house_settings();
	cyn_register_acf_house_plus_land();
	cyn_acf_register_exhibition();
	cyn_acf_register_gallery();
}

function cyn_register_acf_company_settings() {
	$fields = [ 
		cyn_acf_add_number( 'established_year', 'Established Year' ),
		cyn_acf_add_text( 'country', 'country' ),
		cyn_acf_add_text( 'location', 'location' ),
		cyn_acf_add_text( 'phone', 'phone' ),
		cyn_acf_add_image( 'flag', 'Flag' ),
		cyn_acf_add_image( 'logo', 'Logo' ),
		cyn_acf_add_options( 'verified_type', 'Verified Type', [ 'star-supplier', 'supplier' ] ),
		cyn_acf_add_url( 'website', 'website' ),
		cyn_acf_add_color( 'color', 'Color' ),

	];
	$location = [ 
		[ 
			[ 
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'company',
			],
		],
	];

	cyn_register_acf_group( 'Company Settings', $fields, $location );
}

function cyn_register_acf_related() {
	$fields = [ 
		cyn_acf_add_post_object( 'related_houses', 'Related Houses', 'house', multiple: 1 ),
		cyn_acf_add_post_object( 'related_lands', 'Related Lands', 'land', multiple: 1 ),
	];

	$location = [ 
		[ 
			[ 
				[ 
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'house',
				],
			],
		],
	];

	cyn_register_acf_group( 'Related', $fields, $location );
}

function cyn_register_acf_lands_settings() {

	$city_options = [ 
		'vantaa' => 'Vantaa',
		'jarvenpaa' => 'Järvenpää',
		'helsinki' => 'Helsinki',
		'espoo' => 'Espoo',
		'tampere' => 'Tampere',
		'oulu' => 'Oulu',
		'turku' => 'Turku',
		'kirkonoumi' => 'Kirkonoumi',
	];

	$permit_options = [ 
		'Omakotitalo' => 'Omakotitalo',
		'Mokki' => 'Mokki',
	];

	$fields = [ 
		cyn_acf_add_options( 'city', 'City', $city_options, width: 50 ),
		cyn_acf_add_options( 'permit_type', 'Permit type', $permit_options, width: 50 ),
		cyn_acf_add_number( 'surface', 'Surface', 0, 33, 'm2' ),
		cyn_acf_add_number( 'building_right', 'Building Right', 0, 33, 'm2' ),
		cyn_acf_add_number( 'extra_building_right', 'Extra Building Right', 0, 33, 'm2' ),
		cyn_acf_add_number( 'price', 'Price', 0, 50, '€' ),
		cyn_acf_add_number( 'mortgage', 'Mortgage', 0, 50, '€' ),
		cyn_acf_add_text( 'contact_name', 'Contact Name', 0, 33 ),
		cyn_acf_add_text( 'contact_number', 'Contact number', 0, 33 ),
		cyn_acf_add_text( 'contact_email', 'Contact email', 0, 33 ),
		cyn_acf_add_boolean( 'dilapidated', 'Dilapidated', 20 ),
		cyn_acf_add_text( 'neighborhood', 'Neighborhood', 0, 80 ),
		cyn_acf_add_google_map( 'address', 'Address', 50 ),
		cyn_acf_add_wysiwyg( 'description', 'Description', 50 ),
	];

	$location = [ 
		[ 
			[ 
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'land',
			],
		],
	];

	cyn_register_acf_group( 'Lands Settings', $fields, $location );
}

function cyn_register_acf_house_settings() {

	$fields = [ 
		cyn_acf_add_tab( 'General' ),
		cyn_acf_add_options( 'type', 'Type', [ 'house' => 'house', 'villa' => 'villa' ], width: 50 ),
		cyn_acf_add_options( 'material', 'Material',
			[ 'Wooden', 'Light Steel', 'Cement', 'Other' ], width: 50 ),
		cyn_acf_add_number( 'total_area', 'Total Area', 0, 25, 'm2' ),
		cyn_acf_add_number( 'house_area', 'House Area', 0, 25, 'm2' ),
		cyn_acf_add_options( 'number_of_floors', 'Number of floors', [ 1 => 1, 2 => 2 ], width: 50 ),
		cyn_acf_add_number( 'price', 'Price', 0, '', '€' ),

		cyn_acf_add_tab( 'House features' ),
		cyn_acf_add_options( 'rooms', 'Rooms', [ 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7 ], width: 33 ),
		cyn_acf_add_options( 'restrooms', 'Restrooms', [ 1 => 1, 2 => 2, 3 => 3 ], width: 33 ),
		cyn_acf_add_options( 'bathrooms', 'Bathrooms', [ 1 => 1, 2 => 2, 3 => 3,], width: 33 ),
		cyn_acf_add_boolean( 'storage', 'Storage', 25 ),
		cyn_acf_add_boolean( 'sauna', 'Sauna', 25 ),
		cyn_acf_add_boolean( 'balcony', 'Balcony', 25 ),
		cyn_acf_add_boolean( 'garage', 'Garage', 25 ),

		cyn_acf_add_tab( 'Interior architecture ' ),
		cyn_acf_add_boolean( 'kitchen_appliances', 'Kitchen Appliances', 50 ),
		cyn_acf_add_boolean( 'bathroom_appliances', 'Bathroom Appliances', 50 ),

		cyn_acf_add_tab( 'Exterior architecture ' ),
		cyn_acf_add_options( 'celling_style', 'Celling Style',
			[ 
				'flat' => 'flat',
				'Single-slope' => 'Single-slope',
				'Double-slope' => 'Double-slope'
			],
			width: 33 ),
		cyn_acf_add_options( 'facade_material', 'Façade / Material ',
			[ 
				'wooden' => 'Wooden',
				'cement' => 'Cement'
			],
			width: 33 ),
		cyn_acf_add_options( 'garage_mode', 'Garage Mode',
			[ 
				'Open Door' => 'Open Door',
				'Door included' => 'Door included'
			],
			width: 33 ),

		cyn_acf_add_tab( 'Brochure' ),
		cyn_acf_add_file( 'brochure', 'Brochure' )





	];

	$location = [ 
		[ 
			[ 
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'house',
			]
			,
		]
		,
	];

	cyn_register_acf_group( 'House Settings', $fields, $location );
}

function cyn_register_acf_house_plus_land() {

	$fields = [ 
		cyn_acf_add_post_object( 'related_house', 'Related House', 'house', 50 ),
		cyn_acf_add_post_object( 'related_land', 'Related Land', 'land', 50 ),
		cyn_acf_add_post_object( 'related_house_and_lands', 'Related Houses and lands', 'house-and-land', 100, 1 ),
	];

	$location = [ 
		[ 
			[ 
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'house-and-land',
			],
		],
	];

	cyn_register_acf_group( 'House and lands Settings', $fields, $location );
}

function cyn_acf_register_gallery() {

	$fields = [];

	for ( $i = 1; $i <= 12; $i++ ) {
		array_push( $fields, cyn_acf_add_image( 'img_' . $i, 'Image ' . $i ) );
	}
	;

	$location = [ 
		[ 
			[ 
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'house-and-land',
			],
		],
		[ 
			[ 
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'house',
			],
		],
		[ 
			[ 
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'land',
			],
		],
		[ 
			[ 
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'exhibition',
			],
		]
	];

	cyn_register_acf_group( 'Gallery',
		[ 
			cyn_acf_add_group( 'images', 'images', $fields )
		]
		, $location );
}

function cyn_acf_register_exhibition() {
	$location = [ 
		[ 
			[ 
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'exhibition',
			],
		],
	];

	cyn_register_acf_group( 'Exhibition Settings',
		[ 
			cyn_acf_add_time_picker( 'begin_time', 'Begin Time', 50 ),
			cyn_acf_add_time_picker( 'end_time', 'End Time', 50 ),
			cyn_acf_add_date_picker( 'date', 'Date' ),
			cyn_acf_add_text( 'address', 'Address' ),
			cyn_acf_add_text( 'guidance_text', 'Guidance Text', 0, 33 ),
			cyn_acf_add_text( 'guidance_link', 'Guidance Link', 0, 33 ),
			cyn_acf_add_text( 'collection', 'Collection', 0, 33 ),
			cyn_acf_add_google_map( 'location', 'Location' )


		]
		, $location );
}


#region  general acf
function cyn_register_acf_group( $label, $fields = [], $location = [] ) {
	acf_add_local_field_group(
		[ 
			'key' => cyn_acf_unique_id(),
			'title' => $label,
			'fields' => $fields,
			'location' => $location,
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => [ '' ],
			'active' => true,
			'description' => '',
			'show_in_rest' => 0,
		]
	);
}

function cyn_acf_add_post_object( $name, $label, $post_type, $width = '', $multiple = 0 ) {
	return [ 
		'key' => cyn_acf_unique_id(),
		'label' => $label,
		'name' => $name,
		'type' => 'post_object',
		'post_type' => $post_type,
		'taxonomy' => '',
		'allow_null' => 0,
		'multiple' => $multiple,
		'return_format' => 'id',
		'wrapper' => [ 
			'width' => $width
		]
	];
}

function cyn_acf_add_image( $name, $label ) {
	return [ 
		'key' => 'filed_' . cyn_acf_unique_id(),
		'label' => $label,
		'name' => $name,
		'type' => 'image',
		'return_format' => 'id',
		'wrapper' => [ 
			'width' => '25'
		]
	];
}

function cyn_acf_add_color( $name, $label ) {
	return [ 
		'key' => 'filed_' . cyn_acf_unique_id(),
		'label' => $label,
		'name' => $name,
		'type' => 'color_picker',
		'return_format' => 'string',
		'wrapper' => [ 
			'width' => '100'
		]
	];
}

function cyn_acf_add_options(
	$name, $label, $choices, $multiple = 0, $return_format = 'value', $allow_null = 1, $width = '' ) {
	return [ 
		'key' => cyn_acf_unique_id(),
		'label' => $label,
		'name' => $name,
		'aria-label' => '',
		'type' => 'select',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [ 
			'width' => $width,
			'class' => '',
			'id' => '',
		],
		'choices' => $choices,
		'default_value' => false,
		'return_format' => $return_format,
		'multiple' => $multiple,
		'allow_null' => $allow_null,
		'ui' => 1,
		'ajax' => 1,
		'placeholder' => "Select $label",
	];
}

function cyn_acf_add_text( $name, $label, $required = 0, $width = '' ) {
	return [ 
		'key' => cyn_acf_unique_id(),
		'label' => $label,
		'name' => $name,
		'aria-label' => '',
		'type' => 'text',
		'instructions' => '',
		'required' => $required,
		'conditional_logic' => 0,
		'wrapper' => [ 
			'width' => $width,
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'maxlength' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
	];
}

function cyn_acf_add_url( $name, $label, $required = 0, $width = '' ) {
	return [ 
		'key' => 'filed_' . cyn_acf_unique_id(),
		'label' => $label,
		'name' => $name,
		'aria-label' => '',
		'type' => 'url',
		'instructions' => '',
		'required' => $required,
		'conditional_logic' => 0,
		'wrapper' => [ 
			'width' => $width,
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'maxlength' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
	];
}

function cyn_acf_add_number( $name, $label, $required = 0, $width = '', $append = '' ) {
	return [ 
		'key' => 'filed_' . cyn_acf_unique_id(),
		'label' => $label,
		'name' => $name,
		'aria-label' => '',
		'type' => 'number',
		'instructions' => '',
		'required' => $required,
		'conditional_logic' => 0,
		'wrapper' => [ 
			'width' => $width,
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'min' => '',
		'max' => '',
		'placeholder' => '',
		'step' => '',
		'prepend' => '',
		'append' => $append,
	];
}

function cyn_acf_add_tab( $label ) {
	return [ 
		'key' => 'filed_' . cyn_acf_unique_id(),
		'label' => $label,
		'name' => '',
		'aria-label' => '',
		'type' => 'tab',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'placement' => 'top',
		'endpoint' => 0,
	];
}

function cyn_acf_add_google_map( $name, $label, $width = '' ) {
	return [ 
		'key' => cyn_acf_unique_id(),
		'label' => $label,
		'name' => $name,
		'aria-label' => '',
		'type' => 'google_map',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [ 
			'width' => $width,
			'class' => '',
			'id' => '',
		],
		'center_lat' => '',
		'center_lng' => '',
		'zoom' => '',
		'height' => '',
	];
}

function cyn_acf_add_boolean( $name, $label, $width = '' ) {
	return [ 
		'key' => 'filed_' . cyn_acf_unique_id(),
		'label' => $label,
		'name' => $name,
		'aria-label' => '',
		'type' => 'true_false',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [ 
			'width' => $width,
			'class' => '',
			'id' => '',
		],
		'message' => '',
		'default_value' => 0,
		'ui' => 1,
		'ui_on_text' => 'Yes',
		'ui_off_text' => 'No',
	];
}

function cyn_acf_add_wysiwyg( $name, $label, $width = '' ) {
	return [ 
		'key' => 'filed_' . cyn_acf_unique_id(),
		'label' => $label,
		'name' => $name,
		'aria-label' => '',
		'type' => 'wysiwyg',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [ 
			'width' => $width,
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'tabs' => 'visual',
		'toolbar' => 'basic',
		'media_upload' => 0,
		'delay' => 0,
	];
}

function cyn_acf_add_file( $name, $label, $width = '' ) {
	return [ 
		'key' => 'filed_' . cyn_acf_unique_id(),
		'label' => $label,
		'name' => $name,
		'aria-label' => '',
		'type' => 'file',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [ 
			'width' => $width,
			'class' => '',
			'id' => '',
		],
		'return_format' => 'array',
		'library' => 'all',
		'min_size' => '',
		'max_size' => '',
		'mime_types' => '',
	];
}

function cyn_acf_add_time_picker( $name, $label, $width = '' ) {
	return [ 
		'key' => 'filed_' . cyn_acf_unique_id(),
		'label' => $label,
		'name' => $name,
		'aria-label' => '',
		'type' => 'time_picker',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [ 
			'width' => $width,
			'class' => '',
			'id' => '',
		],
		'display_format' => 'H:i',
		'return_format' => 'H:i',
	];
}

function cyn_acf_add_date_picker( $name, $label, $width = '' ) {
	return [ 
		'key' => 'filed_' . cyn_acf_unique_id() . '_' . current_time( 'timestamp' ),
		'label' => $label,
		'name' => $name,
		'aria-label' => '',
		'type' => 'date_picker',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [ 
			'width' => $width,
			'class' => '',
			'id' => '',
		],
		'display_format' => 'd/m/Y',
		'return_format' => 'd/m/Y',
		'first_day' => 1,
	];
}

function cyn_acf_add_group( $name, $label, $sub_fields ) {
	return [ 
		'key' => 'filed_' . cyn_acf_unique_id(),
		'label' => $label,
		'name' => $name,
		'aria-label' => $name,
		'type' => 'group',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [ 
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'layout' => 'block',
		'sub_fields' => $sub_fields
	];
}
#endregion
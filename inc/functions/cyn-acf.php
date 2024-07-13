<?php

define( 'CYN_ACF_PATH', get_stylesheet_directory() . '/inc/acf/' );
define( 'CYN_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/' );
include_once ( CYN_ACF_PATH . 'acf.php' );

add_filter( 'acf/settings/url', function ($url) {
	return CYN_ACF_URL;
} );
add_filter( 'acf/settings/show_updates', '__return_false', 100 );
// add_filter( 'acf/settings/show_admin', '__return_false', 100 );

add_action( 'acf/include_fields', 'cyn_register_acf' );




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
	cyn_acf_register_homepage();
	cyn_acf_register_about();
	cyn_acf_register_contact();
}

function cyn_register_acf_company_settings() {
	$fields = [ 
		cyn_acf_add_number( 'established_year', 'Established Year' ),
		cyn_acf_add_text( 'country', 'country' ),
		cyn_acf_add_text( 'location', 'location' ),
		cyn_acf_add_text( 'phone', 'phone' ),
		cyn_acf_add_text( 'material', 'material' ),
		cyn_acf_add_image( 'flag', 'Flag' ),
		cyn_acf_add_image( 'logo', 'Logo' ),
		cyn_acf_add_options( 'verified_type', 'Verified Type', [ 'star supplier' => 'Star Supplier',
			'supplier' => 'Supplier'
		] ),
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

	cyn_register_acf_group( 'company_settings', 'Company Settings', $fields, $location );
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

	cyn_register_acf_group( 'global_related', 'Related', $fields, $location );
}

function cyn_register_acf_lands_settings() {


	$fields = [ 
		cyn_acf_add_text( 'city', 'City' ),
		cyn_acf_add_text( 'permit_type', 'Permit type' ),
		cyn_acf_add_number( 'surface', 'Surface', 0, 33, 'm2' ),
		cyn_acf_add_number( 'building_right', 'Building Right', 0, 33, 'm2' ),
		cyn_acf_add_number( 'price', 'Price', 0, 33, '€' ),
		cyn_acf_add_text( 'contact_name', 'Contact Name', 0, 33 ),
		cyn_acf_add_text( 'contact_number', 'Contact number', 0, 33 ),
		cyn_acf_add_text( 'advertise_link', 'advertise Link', 0, 33 ),

		cyn_acf_add_text( 'neighborhood', 'Neighborhood', 0, 100 ),
		cyn_acf_add_textarea( 'address_location', 'Address Location' ),
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

	cyn_register_acf_group( 'lands_settings', 'Lands Settings', $fields, $location );
}

function cyn_register_acf_house_settings() {

	$fields = [ 
		cyn_acf_add_tab( 'General' ),
		cyn_acf_add_options( 'type', 'Type', [ 'house' => 'house', 'villa' => 'villa' ], width: 50 ),
		cyn_acf_add_options( 'material', 'Material',
			[ 'Wooden' => 'Wooden', 'Light Steel' => 'Light Steel', 'Cement' => 'Cement', 'Other' => 'Other' ], width: 50 ),
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
				'single slope' => 'Single-slope',
				'double slope' => 'Double-slope'
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
				'open door' => 'Open Door',
				'door included' => 'Door included'
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

	cyn_register_acf_group( 'house_settings', 'House Settings', $fields, $location );
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

	cyn_register_acf_group( 'house_plus_land_settings', 'House and lands Settings', $fields, $location );
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

	cyn_register_acf_group( 'gallery', 'Gallery',
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

	cyn_register_acf_group( 'exhibition_settings', 'Exhibition Settings',
		[ 
			cyn_acf_add_time_picker( 'begin_time', 'Begin Time', 50 ),
			cyn_acf_add_time_picker( 'end_time', 'End Time', 50 ),
			cyn_acf_add_date_picker( 'date', 'Date' ),
			cyn_acf_add_text( 'address', 'Address' ),
			cyn_acf_add_text( 'guidance_text', 'Guidance Text', 0, 33 ),
			cyn_acf_add_text( 'guidance_link', 'Guidance Link', 0, 33 ),
			cyn_acf_add_text( 'collection', 'Collection', 0, 33 ),
			cyn_acf_add_textarea( 'location', 'Location' )


		]
		, $location );
}

function cyn_acf_register_homepage() {

	//Brands Logo Group
	$brands_logo_group_fields = [];
	for ( $i = 1; $i <= 12; $i++ ) {
		array_push( $brands_logo_group_fields, cyn_acf_add_image( "brand_logo_$i", "Brand Logo $i" ) );
	}

	$fields = [ 
		cyn_acf_add_tab( 'Hero' ),
		cyn_acf_add_text( 'hero_title', 'title', 0, 50 ),
		cyn_acf_add_text( 'hero_description', 'description', 0, 50 ),
		cyn_acf_add_image( 'hero_image', 'Hero Image' ),
		cyn_acf_add_tab( 'Brands' ),
		cyn_acf_add_text( 'brands_title', 'title' ),
		cyn_acf_add_group( 'brands_logo_group', 'Brands Logo', $brands_logo_group_fields ),
		cyn_acf_add_tab( 'Middle Banner' ),
		cyn_acf_add_image( 'middle_banner', 'Middle Banner' ),
		cyn_acf_add_tab( 'House + Land' ),
		cyn_acf_add_text( 'house_plus_land_title', 'title' ),
		cyn_acf_add_post_object( 'house_plus_land', 'House + Land', 'house-and-land', 100, 1 ),
		cyn_acf_add_tab( 'Companies' ),
		cyn_acf_add_text( 'company_title', 'title' ),
		cyn_acf_add_taxonomy( 'companies', 'Companies', 'company' ),
		cyn_acf_add_tab( 'Exhibitions' ),
		cyn_acf_add_text( 'exhibitions_title', 'title' ),
		cyn_acf_add_post_object( 'exhibitions', 'Exhibitions', 'exhibition', 100, 1 ),
		cyn_acf_add_tab( 'Blogs' ),
		cyn_acf_add_text( 'blogs_title', 'title' ),
		cyn_acf_add_post_object( 'blogs', 'Blogs', 'post', 100, 1 ),
	];

	$location = [ 
		[ 
			[ 
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'templates/home-page.php',
			],
		],
	];

	cyn_register_acf_group( 'home_page_settings', 'Home Page Settings', $fields, $location );
}

function cyn_acf_register_about() {

	$our_team = [];
	for ( $i = 0; $i < 10; $i++ ) {
		array_push( $our_team,
			cyn_acf_add_group( "team_member_$i", "Team Member $i", [ 
				cyn_acf_add_image( "image", 'Image' ),
				cyn_acf_add_text( 'name', 'Name' ),
				cyn_acf_add_text( 'position', 'Position' ),
			] ) );
	}

	$fields = [ 
		cyn_acf_add_tab( 'main' ),
		cyn_acf_add_text( 'title', 'Title', 1 ),
		cyn_acf_add_image( 'hero_image', 'Hero Image' ),
		cyn_acf_add_wysiwyg( 'hero_text', 'Hero Text' ),
		cyn_acf_add_tab( 'Team' ),
		cyn_acf_add_text( 'our_team_title', 'Our Team Title' ),
		cyn_acf_add_group( 'our_team', 'Our Team', $our_team ),
		cyn_acf_add_tab( 'Perspective' ),
		cyn_acf_add_text( 'perspective_title', 'Our Perspective Title' ),
		cyn_acf_add_image( 'perspective_image', 'Perspective Image' ),
		cyn_acf_add_wysiwyg( 'perspective_text', 'Perspective Text' ),

	];

	$location = [ 
		[ 
			[ 
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'templates/about-us.php',
			],
		],
	];
	cyn_register_acf_group( 'about_us_setting', 'About Us', $fields, $location );

}
;

function cyn_acf_register_contact() {


	$fields = [ 
		cyn_acf_add_textarea( 'location', 'location' )
	];


	$location = [ 
		[ 
			[ 
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'templates/contact-us.php',
			],
		],
	];
	cyn_register_acf_group( 'contact_us_setting', 'Contact Us', $fields, $location );

}



#region  general acf
function cyn_register_acf_group( $name, $label, $fields = [], $location = [] ) {
	acf_add_local_field_group(
		[ 
			'key' => $name . '_key',
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

function cyn_acf_add_post_object( $name, $label, $post_type, $width = '', $multiple = 0, $return_format = 'id' ) {
	return [ 
		'key' => $name . '_key',
		'label' => $label,
		'name' => $name,
		'type' => 'post_object',
		'post_type' => $post_type,
		'taxonomy' => '',
		'allow_null' => 0,
		'multiple' => $multiple,
		'return_format' => $return_format,
		'wrapper' => [ 
			'width' => $width
		]
	];
}

function cyn_acf_add_image( $name, $label ) {
	return [ 
		'key' => 'filed_' . $name . '_key',
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
		'key' => 'filed_' . $name . '_key',
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
	$name, $label, $choices, $multiple = 0, $return_format = 'value', $allow_null = 1, $width = '', $key = '' ) {
	if ( $key === '' ) {
		$key = $name . '_key';
	}
	return [ 
		'key' => $key,
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
		'key' => $name . '_key',
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
		'key' => 'filed_' . $name . '_key',
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
		'key' => 'filed_' . $name . '_key',
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
		'key' => 'filed_' . $label . '_key',
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
		'key' => $name . '_key',
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
		'key' => 'filed_' . $name . '_key',
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
		'key' => 'filed_' . $name . '_key',
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
		'key' => 'filed_' . $name . '_key',
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
		'key' => 'filed_' . $name . '_key',
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
		'key' => 'filed_' . $name . '_key' . '_' . current_time( 'timestamp' ),
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
		'key' => 'filed_' . $name . '_key',
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

function cyn_acf_add_taxonomy( $name, $label, $taxonomy, $field_type = 'multi_select' ) {
	return [ 
		'key' => 'filed_' . $name . '_key',
		'label' => $label,
		'name' => $name,
		'aria-label' => '',
		'type' => 'taxonomy',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => array(
			'width' => '',
			'class' => '',
			'id' => '',
		),
		'taxonomy' => $taxonomy,
		'add_term' => 1,
		'save_terms' => 0,
		'load_terms' => 0,
		'return_format' => 'id',
		'field_type' => $field_type,
		'allow_null' => 1,
		'bidirectional' => 0,
		'multiple' => $field_type === 'multi_select' ? 1 : 0,
		'bidirectional_target' => [],
	];
}


function cyn_acf_add_textarea( $name, $label ) {
	return [ 
		'key' => 'filed_' . $name . '_key',
		'label' => $label,
		'name' => $name,
		'aria-label' => '',
		'type' => 'textarea',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => array(
			'width' => '',
			'class' => '',
			'id' => '',
		),

		'placeholder' => '',
		'maxlength' => '',
		'rows' => '',
		'new_lines' => '',
		'readonly' => 0,
		'disabled' => 0,
	];
}
#endregion
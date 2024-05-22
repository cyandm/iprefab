<?php
add_action( 'customize_register', 'cyn_picture_settings' );
add_action( 'customize_register', 'cyn_footer_settings' );

function make_customize_option( $name, $label, $type, $section, $place_holder = '' ) {
	global $wp_customize;

	$options = [ 
		'label' => $label,
		'section' => $section,
		'type' => $type,
		'settings' => $name,
	];

	if ( $place_holder !== '' ) {
		$options['description'] = 'for Example: ' . $place_holder;
	}

	$wp_customize->add_setting(
		"$name",
		[ 
			'type' => 'option'
		]
	);

	$wp_customize->add_control( new WP_Customize_Upload_Control(
		$wp_customize,
		$name,
		$options,
	) );

}
function cyn_picture_settings( $wp_customize ) {


	$wp_customize->add_panel( 'pictures', [ 
		'title' => 'CyanTheme - Pictures',
		'priority' => 1
	] );


	$wp_customize->add_section( 'house_archive', [ 
		'title' => 'House Archive',
		'priority' => 1,
		'panel' => 'pictures'
	] );
	make_customize_option( 'cyn_house_archive_image', 'Top', 'image', 'house_archive' );


	$wp_customize->add_section( 'land_archive', [ 
		'title' => 'Land Archive',
		'priority' => 1,
		'panel' => 'pictures'
	] );
	make_customize_option( 'cyn_land_top_archive_image', 'Top', 'image', 'land_archive' );
	make_customize_option( 'cyn_land_bottom_archive_image', 'Bottom', 'image', 'land_archive' );

	$wp_customize->add_section( 'house_plus_land_archive', [ 
		'title' => 'House + Land Archive',
		'priority' => 1,
		'panel' => 'pictures'
	] );
	make_customize_option( 'cyn_house_and_land_top_archive_image', 'Top', 'image', 'house_plus_land_archive' );
	make_customize_option( 'cyn_house_and_land_bottom_archive_image', 'Bottom', 'image', 'house_plus_land_archive' );

	$wp_customize->add_section( 'company_archive', [ 
		'title' => 'Company Archive',
		'priority' => 1,
		'panel' => 'pictures'
	] );
	make_customize_option( 'cyn_company_top_archive_image', 'Top', 'image', 'company_archive' );
	make_customize_option( 'cyn_company_bottom_archive_image', 'Bottom', 'image', 'company_archive' );

	$wp_customize->add_section( 'exhibition_archive', [ 
		'title' => 'Exhibition Archive',
		'priority' => 1,
		'panel' => 'pictures'
	] );
	make_customize_option( 'cyn_exhibition_archive_top', 'Top', 'image', 'exhibition_archive' );
	make_customize_option( 'cyn_exhibition_archive_bottom', 'Bottom', 'image', 'exhibition_archive' );

}

function cyn_footer_settings( $wp_customize ) {
	$wp_customize->add_panel( 'footer', [ 
		'title' => 'CyanTheme - Footer',
		'priority' => 1
	] );


	$wp_customize->add_section( 'Images', [ 
		'title' => 'Images',
		'priority' => 1,
		'panel' => 'footer'
	] );

	make_customize_option( 'footer_logo', 'Footer Logo', 'image', 'Images' );
	make_customize_option( 'footer_image_1', 'Footer Image 1', 'image', 'Images' );
	make_customize_option( 'footer_image_2', 'Footer Image 2', 'image', 'Images' );


	$wp_customize->add_section( 'Socials', [ 
		'title' => 'Socials',
		'priority' => 1,
		'panel' => 'footer'
	] );


	for ( $i = 1; $i <= 5; $i++ ) {
		make_customize_option( "footer_social_logo_$i", "Footer Social Logo $i", 'image', 'Socials' );
		make_customize_option( "footer_social_url_$i", "Footer Social URL $i", 'text', 'Socials' );
	}


}
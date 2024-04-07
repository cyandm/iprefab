<?php

use Shuchkin\SimpleXLSX;

if ( ! class_exists( 'cyn_upload_excel' ) ) {
	class cyn_upload_excel {
		function __construct() {
			add_action( 'admin_menu', [ $this, 'cyn_register_nav_menu' ] );

			add_action( 'admin_post_cyn_import', [ $this, 'cyn_form_post' ] );
			add_action( 'admin_post_nopriv_cyn_import', [ $this, 'cyn_form_post' ] );
			add_action( 'admin_action_cyn_import', [ $this, 'cyn_form_post' ] );

		}

		public function cyn_register_nav_menu() {

			add_menu_page(
				'Import by Excel',
				'CYN Import',
				'manage_options',
				'cyn-import',
				[ $this, 'cyn_import_template' ],
				'dashicons-admin-generic',
				100 );

			add_submenu_page(
				'cyn-import',
				'Your Plugin',
				'Dashboard',
				'manage_options',
				'cyn-import',
				[ $this, 'cyn_import_template' ],
			);
		}

		public function cyn_import_template() {
			get_template_part( '/templates/admin/import' );
		}

		public function cyn_form_post() {

			$land_file = SimpleXLSX::parse( $_FILES['lands']['tmp_name'] );
			$house_file = SimpleXLSX::parse( $_FILES['house']['tmp_name'] );
			$company_file = SimpleXLSX::parse( $_FILES['company']['tmp_name'] );



			if ( $land_file ) {
				foreach ( $land_file->rows() as $index => $row ) {
					if ( $index === 0 )
						continue;

					$name = $row[0];
					$city = $row[1];
					$permit_type = $row[2];
					$surface = $row[3];
					$building_right = $row[4];
					$extra_building_right = $row[5];
					$price = $row[6];
					$mortgage = $row[7];
					$contact_name = $row[8];
					$contact_number = $row[9];
					$contact_email = $row[10];
					$dilapidated = $row[11];
					$neighborhood = $row[12];
					$description = $row[13];


					$new_land = wp_insert_post( [ 
						'post_title' => $name,
						'post_type' => 'land',
						'post_status' => 'publish'
					] );

					update_post_meta( $new_land, 'city', $city );
					update_post_meta( $new_land, 'permit_type', $permit_type );
					update_post_meta( $new_land, 'surface', $surface );
					update_post_meta( $new_land, 'building_right', $building_right );
					update_post_meta( $new_land, 'extra_building_right', $extra_building_right );
					update_post_meta( $new_land, 'price', $price );
					update_post_meta( $new_land, 'mortgage', $mortgage );
					update_post_meta( $new_land, 'contact_name', $contact_name );
					update_post_meta( $new_land, 'contact_number', $contact_number );
					update_post_meta( $new_land, 'contact_email', $contact_email );
					update_post_meta( $new_land, 'dilapidated', $dilapidated );
					update_post_meta( $new_land, 'neighborhood', $neighborhood );
					update_post_meta( $new_land, 'description', $description );

				}
			}

			if ( $house_file ) {
				foreach ( $house_file->rows() as $index => $row ) {
					if ( $index === 0 )
						continue;

					$name = $row[0];
					$type = $row[1];
					$material = $row[2];
					$total_area = $row[3];
					$house_area = $row[4];
					$price = $row[5];
					$number_of_floors = $row[6];
					$rooms = $row[7];
					$restrooms = $row[8];
					$bathrooms = $row[9];
					$storage = $row[10];
					$sauna = $row[11];
					$balcony = $row[12];
					$garage = $row[13];
					$kitchen_appliances = $row[14];
					$bathroom_appliances = $row[15];
					$ceiling_style = $row[16];
					$facade_material = $row[17];
					$garage_mode = $row[18];


					$new_product = wp_insert_post( [ 
						'post_title' => $name,
						'post_type' => 'house',
						'post_status' => 'publish'
					] );


					update_post_meta( $new_product, 'type', $type );
					update_post_meta( $new_product, 'material', $material );
					update_post_meta( $new_product, 'total_area', $total_area );
					update_post_meta( $new_product, 'house_area', $house_area );
					update_post_meta( $new_product, 'price', $price );
					update_post_meta( $new_product, 'number_of_floors', $number_of_floors );
					update_post_meta( $new_product, 'rooms', $rooms );
					update_post_meta( $new_product, 'restrooms', $restrooms );
					update_post_meta( $new_product, 'bathrooms', $bathrooms );
					update_post_meta( $new_product, 'storage', $storage );
					update_post_meta( $new_product, 'sauna', $sauna );
					update_post_meta( $new_product, 'balcony', $balcony );
					update_post_meta( $new_product, 'garage', $garage );

					update_post_meta( $new_product, 'kitchen_appliances', $kitchen_appliances );
					update_post_meta( $new_product, 'bathroom_appliances', $bathroom_appliances );

					update_field( 'celling_style', $ceiling_style, $new_product );
					update_field( 'facade_material', $facade_material, $new_product );
					update_field( 'garage_mode', $garage_mode, $new_product );



				}
			}

			if ( $company_file ) {
				foreach ( $company_file->rows() as $index => $row ) {
					if ( $index === 0 )
						continue;

					$name = $row[0];
					$established_year = $row[1];
					$country = $row[2];
					$location = $row[3];
					$phone = $row[4];
					$verified_type = $row[5];
					$website = $row[6];
					$color = $row[7];
					$description = $row[8];

					$new_company = wp_insert_term( $name, 'company', [ 
						'description' => $description
					] );
					$new_company_ID = $new_company['term_id'];


					update_term_meta( $new_company_ID, 'established_year', $established_year );
					update_term_meta( $new_company_ID, 'country', $country );
					update_term_meta( $new_company_ID, 'location', $location );
					update_term_meta( $new_company_ID, 'phone', $phone );
					update_term_meta( $new_company_ID, 'verified_type', $verified_type );
					update_term_meta( $new_company_ID, 'website', $website );
					update_term_meta( $new_company_ID, 'color', $color );
				}
			}

			wp_redirect( esc_url_raw(
				add_query_arg(
					array(
						'land_file' => ! ! $land_file,
						'house_file' => ! ! $house_file,
						'company_file' => ! ! $company_file
					),
					$_SERVER['HTTP_REFERER']
				)
			) );

			exit();
		}


	}
}
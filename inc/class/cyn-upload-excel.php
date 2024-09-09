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

			require_once( ABSPATH . 'wp-admin/includes/media.php' );
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			require_once( ABSPATH . 'wp-admin/includes/image.php' );

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
					$price = $row[5];
					$contact_name = $row[6];
					$contact_number = $row[7];
					$advertiser = $row[8];
					$neighborhood = $row[9];
					$description = $row[10];
					$location = $row[11];
					$feature_image_url = $row[12];
					$gallery_1 = $row[13];
					$gallery_2 = $row[14];
					$gallery_4 = $row[15];
					$gallery_5 = $row[16];
					$gallery_6 = $row[17];
					$gallery_7 = $row[18];
					$gallery_8 = $row[19];
					$gallery_9 = $row[20];
					$gallery_10 = $row[21];
					$gallery_11 = $row[22];
					$gallery_12 = $row[23];



					$new_house = wp_insert_post( [ 
						'post_title' => $name,
						'post_type' => 'land',
						'post_status' => 'publish',
						'meta_input' => [ 
							'city' => $city,
							'permit_type' => $permit_type,
							'surface' => $surface,
							'building_right' => $building_right,
							'price' => $price,
							'contact_name' => $contact_name,
							'contact_number' => $contact_number,
							'neighborhood' => $neighborhood,
							'description' => $description,
							'advertise_link' => $advertiser,
							'address_location' => $location,
						]
					] );


					//upload feature image
					$feature_image_id = media_sideload_image( $feature_image_url, $new_house, null, 'id' );
					set_post_thumbnail( $new_house, $feature_image_id );


					//gallery
					$gallery_1_id = media_sideload_image( $gallery_1, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_1", $gallery_1_id );

					$gallery_2_id = media_sideload_image( $gallery_2, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_2", $gallery_2_id );

					$gallery_3_id = media_sideload_image( $gallery_3, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_3", $gallery_3_id );

					$gallery_4_id = media_sideload_image( $gallery_4, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_4", $gallery_4_id );

					$gallery_5_id = media_sideload_image( $gallery_5, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_5", $gallery_5_id );

					$gallery_6_id = media_sideload_image( $gallery_6, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_6", $gallery_6_id );

					$gallery_7_id = media_sideload_image( $gallery_7, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_7", $gallery_7_id );

					$gallery_8_id = media_sideload_image( $gallery_8, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_8", $gallery_8_id );

					$gallery_9_id = media_sideload_image( $gallery_9, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_9", $gallery_9_id );

					$gallery_10_id = media_sideload_image( $gallery_10, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_10", $gallery_10_id );

					$gallery_11_id = media_sideload_image( $gallery_11, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_11", $gallery_11_id );

					$gallery_12_id = media_sideload_image( $gallery_12, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_12", $gallery_12_id );



				}
			}

			if ( $house_file ) {
				foreach ( $house_file->rows() as $index => $row ) {
					if ( $index === 0 )
						continue;

					$name = $row[0];
					$type = $row[1];
					$material = $row[2];
					$living_area = $row[3];
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
					$feature_image_url = $row[19];
					$gallery_1 = $row[20];
					$gallery_2 = $row[21];
					$gallery_4 = $row[22];
					$gallery_5 = $row[23];
					$gallery_6 = $row[24];
					$gallery_7 = $row[25];
					$gallery_8 = $row[26];
					$gallery_9 = $row[27];
					$gallery_10 = $row[28];
					$gallery_11 = $row[29];
					$gallery_12 = $row[30];


					$new_house = wp_insert_post( [ 
						'post_title' => $name,
						'post_type' => 'house',
						'post_status' => 'publish',
						'meta_input' => [ 
							'type' => $type,
							'material' => $material,
							'living_area' => $living_area,
							'house_area' => $house_area,
							'price' => $price,
							'number_of_floors' => $number_of_floors,
							'rooms' => $rooms,
							'restrooms' => $restrooms,
							'bathrooms' => $bathrooms,
							'storage' => $storage,
							'sauna' => $sauna,
							'balcony' => $balcony,
							'garage' => $garage,
							'kitchen_appliances' => $kitchen_appliances,
							'bathroom_appliances' => $bathroom_appliances,
							'celling_style' => $ceiling_style,
							'facade_material' => $facade_material,
							'garage_mode' => $garage_mode
						]
					] );


					//upload feature image
					$feature_image_id = media_sideload_image( $feature_image_url, $new_house, null, 'id' );
					set_post_thumbnail( $new_house, $feature_image_id );


					//gallery
					$gallery_1_id = media_sideload_image( $gallery_1, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_1", $gallery_1_id );

					$gallery_2_id = media_sideload_image( $gallery_2, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_2", $gallery_2_id );

					$gallery_3_id = media_sideload_image( $gallery_3, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_3", $gallery_3_id );

					$gallery_4_id = media_sideload_image( $gallery_4, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_4", $gallery_4_id );

					$gallery_5_id = media_sideload_image( $gallery_5, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_5", $gallery_5_id );

					$gallery_6_id = media_sideload_image( $gallery_6, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_6", $gallery_6_id );

					$gallery_7_id = media_sideload_image( $gallery_7, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_7", $gallery_7_id );

					$gallery_8_id = media_sideload_image( $gallery_8, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_8", $gallery_8_id );

					$gallery_9_id = media_sideload_image( $gallery_9, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_9", $gallery_9_id );

					$gallery_10_id = media_sideload_image( $gallery_10, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_10", $gallery_10_id );

					$gallery_11_id = media_sideload_image( $gallery_11, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_11", $gallery_11_id );

					$gallery_12_id = media_sideload_image( $gallery_12, $new_house, null, 'id' );
					update_post_meta( $new_house, "images_img_12", $gallery_12_id );




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
					$feature_image_url = $row[9];
					$flag_image_url = $row[10];

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

					//upload feature image
					$feature_image_id = media_sideload_image( $feature_image_url, $new_house, null, 'id' );
					set_post_thumbnail( $new_house, $feature_image_id );

					//upload flag image
					$flag_image_id = media_sideload_image( $flag_image_url, $new_house, null, 'id' );
					set_post_thumbnail( $new_house, $flag_image_id );



				}
			}

			wp_redirect( esc_url_raw(
				add_query_arg(
					[ 
						'land_file' => ! ! $land_file,
						'house_file' => ! ! $house_file,
						'company_file' => ! ! $company_file
					],
					$_SERVER['HTTP_REFERER']
				)
			) );

			exit();
		}


	}
}
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
			$product_file = SimpleXLSX::parse( $_FILES['products']['tmp_name'] );



			if ( $land_file ) {
				foreach ( $land_file->rows() as $index => $row ) {
					if ( $index === 0 )
						continue;

					$name = $row[0];
					$city = $row[1];
					$market_type = cyn_convert_to_snake( $row[2] );
					$plot_state = $row[3];
					$location = $row[4];
					$surface = $row[5];
					$building_right = $row[6];
					$extra_building_right = $row[7];
					$price = $row[8];
					$average_price = $row[9];
					$morgage = $row[10];
					$contact_name = $row[11];
					$contact_number = $row[12];
					$contact_email = $row[13];
					$direct_link = $row[14];
					$property_id = $row[15];
					$dilapidated = $row[16];

					$new_land = wp_insert_post( [ 
						'post_title' => $name,
						'post_type' => 'land',
						'post_status' => 'publish'
					] );

					update_post_meta( $new_land, 'city', $city );
					update_post_meta( $new_land, 'market_type', $market_type );
					update_post_meta( $new_land, 'plot_state', $plot_state );
					update_post_meta( $new_land, 'location', $location );
					update_post_meta( $new_land, 'surface', $surface );
					update_post_meta( $new_land, 'building_right', $building_right );
					update_post_meta( $new_land, 'extra_building_right', $extra_building_right );
					update_post_meta( $new_land, 'price', $price );
					update_post_meta( $new_land, 'average_price', $average_price );
					update_post_meta( $new_land, 'morgage', $morgage );
					update_post_meta( $new_land, 'contact_name', $contact_name );
					update_post_meta( $new_land, 'contact_number', $contact_number );
					update_post_meta( $new_land, 'contact_email', $contact_email );
					update_post_meta( $new_land, 'direct_link', $direct_link );
					update_post_meta( $new_land, 'property_id', $property_id );
					update_post_meta( $new_land, 'dilapidated', $dilapidated );

				}
			}

			if ( $product_file ) {
				foreach ( $product_file->rows() as $index => $row ) {
					if ( $index === 0 )
						continue;

					$name = $row[0];
					$material = $row[1];
					$total_area = $row[2];
					$apartment_area = $row[3];
					$number_of_floors = $row[4];
					$helsinki_price = $row[5];
					$rooms = $row[6];
					$living_room = $row[7];
					$dining_room = $row[8];
					$restrooms = $row[9];
					$bathrooms = $row[10];
					$kitchen_room__expose = $row[11];
					$storage = $row[12];
					$sauna = $row[13];
					$balcony = $row[14];
					$garage = $row[15];
					$electrical = $row[16];
					$mechanical = $row[17];
					$energy_supply = $row[18];
					$ceiling_style = cyn_convert_to_snake( $row[19] );
					$material__facade = cyn_convert_to_snake( $row[20] );
					$balcony_material = cyn_convert_to_snake( $row[21] );
					$walls = cyn_convert_to_snake( $row[22] );
					$doors = $row[23];
					$windows = $row[24];
					$company = $row[25];

					$new_product = wp_insert_post( [ 
						'post_title' => $name,
						'post_type' => 'product',
						'post_status' => 'publish'
					] );


					update_post_meta( $new_product, 'material', $material );
					update_post_meta( $new_product, 'total_area', $total_area );
					update_post_meta( $new_product, 'apartment_area', $apartment_area );
					update_post_meta( $new_product, 'number_of_floors', $number_of_floors );
					update_post_meta( $new_product, 'helsinki_price', $helsinki_price );
					update_post_meta( $new_product, 'rooms', $rooms );
					update_post_meta( $new_product, 'living_room', $living_room );
					update_post_meta( $new_product, 'dining_room', $dining_room );
					update_post_meta( $new_product, 'restrooms', $restrooms );
					update_post_meta( $new_product, 'bathrooms', $bathrooms );
					update_post_meta( $new_product, 'kitchen_room__expose', $kitchen_room__expose );
					update_post_meta( $new_product, 'storage', $storage );
					update_post_meta( $new_product, 'sauna', $sauna );
					update_post_meta( $new_product, 'balcony', $balcony );
					update_post_meta( $new_product, 'garage', $garage );
					update_post_meta( $new_product, 'electrical', $electrical );
					update_post_meta( $new_product, 'mechanical', $mechanical );
					update_post_meta( $new_product, 'energy_supply', $energy_supply );
					update_post_meta( $new_product, 'ceiling_style', $ceiling_style );
					update_post_meta( $new_product, 'material__facade', $material__facade );
					update_post_meta( $new_product, 'balcony_material', $balcony_material );
					update_post_meta( $new_product, 'walls', $walls );
					update_post_meta( $new_product, 'doors', $doors );
					update_post_meta( $new_product, 'windows', $windows );

					wp_set_object_terms( $new_product, $company, 'company', true );

				}
			}

			wp_redirect( esc_url_raw(
				add_query_arg(
					array(
						'land_file' => ! ! $land_file,
						'product_file' => ! ! $product_file,

					),
					$_SERVER['HTTP_REFERER']
				)
			) );

			exit();
		}


	}
}
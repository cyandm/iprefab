<?php

add_action( 'post_updated', 'cyn_house_plus_land_update_price' );
add_action( 'save_post', 'cyn_house_plus_land_update_price' );
add_action( 'new_to_publish', 'cyn_house_plus_land_update_price' );
add_action( 'draft_to_publish', 'cyn_house_plus_land_update_price' );
add_action( 'pending_to_publish', 'cyn_house_plus_land_update_price' );

function cyn_house_plus_land_update_price( $post_id ) {
	$post = get_post( $post_id );

	if ( $post->post_type !== 'house-and-land' )
		return;


	$house_price = get_field( 'price', get_field( 'related_house', $post_id ) );
	$land_price = get_field( 'price', get_field( 'related_land', $post_id ) );

	$house_plus_land_price = intval( $house_price ) + intval( $land_price );

	update_post_meta( $post_id, 'price', $house_plus_land_price );
	update_post_meta( $post_id, 'area', get_field( 'total_area', get_field( 'related_house', $post_id ) ) );
	update_post_meta( $post_id, 'city', get_field( 'city', get_field( 'related_land', $post_id ) ) );

}

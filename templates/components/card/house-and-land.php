<?php
$post_id = $args['post_id'] ?? get_the_ID();
$class = $args['class'] ?? '';
$thumb_id = get_post_thumbnail_id( $post_id );

$house_ID = $args['house_ID'] ?? get_field( 'related_house', $post_id );
$land_ID = $args['land_ID'] ?? get_field( 'related_land', $post_id );


if ( $house_ID !== null ) {
	$company_1 = get_the_terms( $house_ID, 'company' );
	$company_1 = $company_1 === false ? false : $company_1[0];
}


if ( $land_ID !== null ) {
	$company_2 = get_the_terms( $land_ID, 'company' );
	$company_2 = $company_2 === false ? false : $company_2[0];
}


if ( $company_1 !== false ) {
	$company_logo_1 = wp_get_attachment_image(
		get_field( 'logo', 'company_' . $company_1->term_id ),
		[ 300, 300 ], false, [ 'style' => '--logo-color: ' . get_field( 'color', 'company_' . $company_1->term_id ) ] );
}

if ( $company_2 !== false ) {
	$company_logo_2 = wp_get_attachment_image(
		get_field( 'logo', 'company_' . $company_2->term_id ),
		[ 300, 300 ], false, [ 'style' => '--logo-color: ' . get_field( 'color', 'company_' . $company_2->term_id ) ] );
}



?>

<a href="<?= get_permalink( $post_id ) ?>"
   class="<?= "general-card " . $class ?>"
   data-id="<?= $post_id ?>">

	<div class="general-card-image">
		<?php cyn_render_image( $thumb_id, [ 400, 400 ] ) ?>

		<div class="company-logo">
			<?= $company_logo_1 ?>
			<?= $company_logo_2 ?>
		</div>
	</div>

	<div class="general-card-content">
		<div class="general-card-title">
			<span>
				<?= get_the_title( $post_id ); ?>
			</span>

			<span class="general-card-price">
				€
				<span><?= number_format( intval( get_field( 'price', $post_id ) ) ) ?></span>
			</span>
		</div>

		<div class="land-card-items jc-between">

			<div class="d-flex gap-12">
				<?php
				cyn_render_icon_box( 'tree', get_field( 'surface', $land_ID ), '<span>m2</span>' );

				cyn_render_icon_box( 'home-2', get_field( 'total_area', $house_ID ), '<span>m2</span>' );

				cyn_render_icon_box( 'bed', get_field( 'rooms', $house_ID ), '', true );
				?>
			</div>

			<div>
				<?php cyn_render_icon_box( 'location', get_field( 'city', $land_ID ) ); ?>
			</div>

		</div>
	</div>

</a>
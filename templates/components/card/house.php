<?php
$post_id = isset( $args['post_id'] ) ? $args['post_id'] : get_the_ID();
$thumb_id = get_post_thumbnail_id( $post_id );

$company = get_the_terms( $post_id, 'company' )[0];
$company_logo = wp_get_attachment_image(
	get_field( 'logo', 'company_' . $company->term_id ),
	[ 300, 300 ] );



?>

<a href="<?= get_permalink( $post_id ) ?>"
   class="general-card"
   data-id="<?= $post_id ?>">

	<div class="general-card-image">
		<?php cyn_render_image( $thumb_id, [ 400, 400 ] ) ?>

		<div class="company-logo">
			<?= $company_logo ?>
		</div>
	</div>

	<div class="general-card-content">
		<div class="general-card-title">
			<span>
				<?= get_the_title( $post_id ); ?>
			</span>

			<span class="general-card-price">
				€ <span><?= number_format( get_field( 'helsinki_price', $post_id ) ) ?></span>
			</span>
		</div>

		<div class="product-card-items">
			<?php
			cyn_render_icon_box( 'home-2', get_field( 'apartment_area', $post_id ), '<span>m2</span>' );
			cyn_render_icon_box( 'lamp-1', get_field( 'rooms', $post_id ) );
			cyn_render_icon_box( 'layers-1', get_field( 'number_of_floors', $post_id ) );
			?>
		</div>
	</div>

</a>
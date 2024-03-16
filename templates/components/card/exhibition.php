<?php
$post_id = $args['post_id'] ?? get_the_ID();
$thumb_id = get_post_thumbnail_id( $post_id );

$company = get_the_terms( $post_id, 'company' );
$company = $company ? $company[0] : null;

$company_logo = isset( $company ) ? wp_get_attachment_image(
	get_field( 'logo', 'company_' . $company->term_id ),
	[ 300, 300 ], false,
	[ 'style' => '--logo-color:' . get_field( 'color', 'company_' . $company->term_id ) ] ) : '';

?>

<a href="<?= get_permalink( $post_id ) ?>"
   class="general-card exhibition-card"
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
		</div>

		<div class="land-card-items">
			<div>
				<?php
				cyn_render_icon_box( 'calendar-2', date_format( date_create( get_field( 'date', $post_id ) ), 'm/d' )
				);

				cyn_render_icon_box(
					'clock',
					get_field( 'begin_time', $post_id ) . '-' . get_field( 'end_time', $post_id ) );
				?>
			</div>

			<div>
				<?php cyn_render_icon_box( 'location', get_field( 'address', $post_id ) ) ?>
			</div>

		</div>
	</div>

</a>
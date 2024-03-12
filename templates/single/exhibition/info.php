<?php
$post_ID = $args['post_id'] ?? get_queried_object_id();

$company_1 = get_the_terms( $post_ID, 'company' );
$company_1 = $company_1 === false ? false : $company_1[0];

if ( $company_1 !== false ) {
	$company_logo_1 = wp_get_attachment_image(
		get_field( 'logo', 'company_' . $company_1->term_id ),
		[ 300, 300 ] );
	$company_color_1 = get_field( 'color', 'company_' . $company_1->term_id );
}
?>

<div class="general-info">
	<div class="general-info-wrapper | h2">
		<span class="general-meterage">
			<span>
				<?= get_the_title() ?>
			</span>
		</span>

		<i class="iconsax"
		   icon-name="clock">

		</i>
		<span class="general-price-wrapper">

			<span class="general-price">
				<?= get_field( 'begin_time' ) . '-' . get_field( 'end_time' ) ?>
			</span>
		</span>
	</div>
	<div class="general-company-logo">
		<div <?= "style=\"--logo-color:{$company_color_1}\" "; ?>>
			<?= $company_logo_1 ?>
		</div>
	</div>
</div>

<div class="clear-fix-12"> </div>


<div class="general-info-short">
	<?= get_field( 'address' ) ?>
</div>
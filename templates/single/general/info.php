<?php
$area = $args['area'] ?? 0;
$price = $args['price'] ?? 0;
$address = $args['address'] ?? '';

$house_ID = $args['post_1'] ?? get_queried_object_id();
$land_ID = $args['post_2'] ?? null;


$company_1 = get_the_terms( $house_ID, 'company' );
$company_1 = $company_1 === false ? false : $company_1[0];


if ( $land_ID !== null ) {
	$company_2 = get_the_terms( $land_ID, 'company' );
	$company_2 = $company_2 === false ? false : $company_2[0];
}


if ( $company_1 !== false ) {
	$company_logo_1 = wp_get_attachment_image(
		get_field( 'logo', 'company_' . $company_1->term_id ),
		[ 300, 300 ] );
	$company_color_1 = get_field( 'color', 'company_' . $company_1->term_id );
}

if ( isset( $company_2 ) && $company_2 !== false ) {
	$company_logo_2 = wp_get_attachment_image(
		get_field( 'logo', 'company_' . $company_2->term_id ),
		[ 300, 300 ] );
	$company_color_2 = get_field( 'color', 'company_' . $company_2->term_id );
}


?>

<div class="general-info">
	<div class="general-info-wrapper | h2">
		<span class="general-meterage">
			<span>
				<?= $area ?>
			</span>
			<span class="unit">
				m<sup>2</sup>
			</span>
		</span>
		•
		<span class="general-price-wrapper">
			<span class="general-price-symbol">
				€
			</span>
			<span class="general-price">
				<?= number_format( intval( $price ) ) ?>
			</span>
		</span>
	</div>
	<div class="general-company-logo">
		<div <?= "style=\"--logo-color:{$company_color_1}\" "; ?>>
			<?= $company_logo_1 ?>
		</div>
		<?php if ( isset( $land_ID ) ) : ?>
			<div <?= "style=\"--logo-color:{$company_color_2}\" "; ?>>
				<?= $company_logo_2 ?>
			</div>
		<?php endif; ?>
	</div>
</div>

<div class="clear-fix-12"> </div>


<div class="general-info-short">
	<?= $address ?>
</div>
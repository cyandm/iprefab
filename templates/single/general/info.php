<?php
$area = isset( $args['area'] ) ? $args['area'] : 0;
$price = isset( $args['price'] ) ? $args['price'] : 0;

$company = get_the_terms( get_queried_object_id(), 'company' )[0];
$company_logo = wp_get_attachment_image(
	get_field( 'logo', 'company_' . $company->term_id ),
	[ 300, 300 ] );

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
				<?= number_format( $price ) ?>
			</span>
		</span>
	</div>
	<div class="general-company-logo">
		<?= $company_logo ?>
	</div>
</div>

<div class="clear-fix-12"> </div>


<div class="general-info-short">
	Lorem ipsum dolor sit, amet consectetur • adipisicing elit. Atque enim laudantium fugit!
</div>
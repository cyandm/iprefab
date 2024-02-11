<?php
$total_area = get_field( 'total_area' );
$helsinki_price = get_field( 'helsinki_price' );

$company = get_the_terms( get_queried_object_id(), 'company' )[0];
$company_logo = wp_get_attachment_image(
	get_field( 'logo', 'company_' . $company->term_id ),
	[ 300, 300 ] );

?>

<div class="product-info">
	<div class="product-info-wrapper | h2">
		<span class="product-meterage">
			<span>
				<?= $total_area ?>
			</span>
			<span class="unit">
				m<sup>2</sup>
			</span>
		</span>
		•
		<span class="product-price-wrapper">
			<span class="product-price-symbol">
				€
			</span>
			<span class="product-price">
				<?= number_format( $helsinki_price ) ?>
			</span>
		</span>
	</div>
	<div class="product-company-logo">
		<?= $company_logo ?>
	</div>
</div>

<div class="clear-fix-12"> </div>


<div class="product-info-short">
	Lorem ipsum dolor sit, amet consectetur • adipisicing elit. Atque enim laudantium fugit!
</div>
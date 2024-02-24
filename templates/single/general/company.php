<?php
$company = get_the_terms( get_queried_object_id(), 'company' )[0];
$company_logo = wp_get_attachment_image(
	get_field( 'logo', 'company_' . $company->term_id ),
	[ 300, 300 ] );

?>

<div class="product-company">
	<p class="h1">about company</p>
	<hr />
	<div class="product-company-wrapper">
		<div class="product-company-logo">
			<?= $company_logo ?>
		</div>

		<div class="product-company-description">
			<p>
				<?= term_description( $company ) ?>
			</p>
			<div class="clear-fix-16"></div>
			<a href="<?= get_term_link( $company ) ?>"
			   class="btn-secondary">
				visit supplier
			</a>
		</div>
	</div>
</div>
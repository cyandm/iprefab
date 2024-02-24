<?php
$company = get_the_terms( get_queried_object_id(), 'company' )[0];
$company_logo = wp_get_attachment_image(
	get_field( 'logo', 'company_' . $company->term_id ),
	[ 300, 300 ] );
?>

<div class="general-bottom-cta"
	 id="bottomCta">

	<div class="general-bottom-cta-company">
		<div class="img-wrapper">
			<?= $company_logo ?>
		</div>

		<div>
			<div class="general-bottom-cta-company-name">
				<?= $company->name ?>
			</div>
			<div class="general-bottom-cta-company-origin">
				<?= get_field( 'origin_of_company', 'company_' . $company->term_id ) ?>
			</div>
		</div>
	</div>

	<div class="general-actions-primary">
		<button class="btn-secondary-icon-start">
			<i class="iconsax"
			   icon-name="book-with-bookmark"></i>
			brochure
		</button>
		<button class="btn-primary">
			call back request
		</button>
	</div>
</div>
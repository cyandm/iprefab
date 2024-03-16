<?php
$company = get_the_terms( get_queried_object_id(), 'company' )[0];
$company_logo = wp_get_attachment_image(
	get_field( 'logo', 'company_' . $company->term_id ),
	[ 300, 300 ], false,
	[ 'style' => '--logo-color:' . get_field( 'color', 'company_' . $company->term_id ) ] );

$brochure_link = get_field( 'brochure', get_queried_object_id() );

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
		<a href="<?= $brochure_link['url'] ?>"
		   class="btn-secondary btn-icon-start">
			<i class="iconsax"
			   icon-name="book-with-bookmark"></i>
			brochure
		</a>
		<button class="btn-primary">
			call back request
		</button>
	</div>
</div>
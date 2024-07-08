<?php
$company = $args['company'] ?? get_the_terms( get_queried_object_id(), 'company' );
$title = $args['title'] ?? 'about company';

if ( $company === false )
	return;

$company = $company[0];
$company_logo = wp_get_attachment_image(
	get_field( 'logo', 'company_' . $company->term_id ),
	[ 300, 300 ] );

$company_color = get_field( 'color', 'company_' . $company->term_id );
?>

<div class="house-company"
	 style="--company-color: <?= $company_color ?>">
	<p class="h1">
		<?= $title ?>
	</p>
	<hr />
	<div class="house-company-wrapper">
		<div class="house-company-logo">
			<?= $company_logo ?>
		</div>

		<div class="house-company-description">
			<p>
				<?= term_description( $company ) ?>
			</p>
			<div class="clear-fix-16"></div>
			<a href="<?= get_term_link( $company ) ?>"
			   class="btn-secondary">
				<?php pll_e( 'visit builder' ) ?>
			</a>
		</div>
	</div>
</div>
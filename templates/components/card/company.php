<?php
$post_id = $args['post_id'] ?? 0;
$term = $args['term'] ?? get_term( $post_id ) ?? null;
$company_acf_address = 'company_' . $term->term_id;
$company_logo = isset( $term ) ? wp_get_attachment_image(
	get_field( 'logo', $company_acf_address ),
	[ 300, 300 ], false,
	[ 'style' => '--logo-color:' . get_field( 'color', $company_acf_address ) ] ) : '';

?>

<?php if ( $term !== null ) : ?>
	<div class="company-card">
		<div class="company-card-image">
			<?= $company_logo ?>
		</div>

		<div class="company-card-content">
			<h4>
				<?= get_term( $term )->name ?>
			</h4>

			<div class="company-card-content-inner">
				<?= cyn_render_icon_box( 'house-1', get_term( $term )->count . ' houses' ) ?>

				<div class="d-flex ai-center gap-4">
					<span class="single-company-flag">
						<?= wp_get_attachment_image( get_field( 'flag', $company_acf_address ), 'full' ) ?>
					</span>

					<div class="single-company-country d-flex gap-4">
						<span><?= get_field( 'country', $company_acf_address ) ?></span>
						•
						<span>
							<?= get_field( 'established_year', $company_acf_address ) ?>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>
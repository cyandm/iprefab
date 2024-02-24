<?php
$product_details = isset( $args['product_details'] ) ? $args['product_details'] : [];

?>

<?php if ( count( $product_details ) > 0 ) : ?>
	<div class="general-details">
		<h4>Details</h4>

		<div class="general-details-wrapper">
			<div class="general-table-secondary">
				<?php foreach ( $product_details as $row ) : ?>
					<div class="general-table-secondary-row">
						<div class="general-table-secondary-name">
							<?= $row['name'] ?>
						</div>
						<div class="general-table-secondary-value">
							<?= $row['value'] ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="general-cta">
				<h4>forward to bank</h4>
				<div class="img-wrapper">
					<img src="<?= get_stylesheet_directory_uri() . '/assets/imgs/bank.png' ?>"
						 alt="bank">
				</div>
				<p class="general-cta-description | body-s">
					Designed to be open and spacious, the impressive hillside house sits diagonally to the slope, which
					creates an architecturally individual and fascinating look for the home. The entrance to the home is on
					the side of the upper slope.
				</p>

				<div class="input-wrapper-checkbox">
					<input type="checkbox"
						   class="input-medium">
					<p>
						I accept have a land for this house
					</p>
				</div>

				<button class="btn-primary btn-full"
						disabled>
					Order a bank request
				</button>
			</div>
		</div>
	</div>

<?php endif; ?>
<?php
global $post;
$product_details = isset( $args['product_details'] ) ? $args['product_details'] : [];



?>

<?php if ( count( $product_details ) > 0 ) : ?>
	<div class="general-details">
		<h4><?php pll_e( 'details' ) ?></h4>

		<div class="general-details-wrapper">
			<div class="flex-3 d-flex flex-col gap-16 h-full">
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

				<?php if ( $post->post_type === 'land' ) : ?>
					<div class="h-full">
						<?php echo get_field( 'address_location' ) ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="flex-1 h-full">
				<?php if ( $post->post_type === 'house-and-land' ) :
					$land_ID = get_field( 'related_land' );
					?>
					<div class="h-full">
						<?php echo get_field( 'address_location', $land_ID ) ?>
					</div>
				<?php endif; ?>

				<?php if ( $post->post_type !== 'house-and-land' ) : ?>

					<div class="general-cta">

						<h4>forward to bank</h4>
						<div class="img-wrapper">
							<img src="<?= get_stylesheet_directory_uri() . '/assets/imgs/bank.png' ?>"
								 alt="bank">
						</div>
						<p class="general-cta-description | body-s">
							<?php pll_e( 'Designed to be open and spacious, the impressive hillside house sits diagonally to the slope, which
					creates an architecturally individual and fascinating look for the home. The entrance to the home is on
					the side of the upper slope.' ) ?>
						</p>

						<div class="input-wrapper-checkbox">
							<input type="checkbox"
								   class="input-medium">
							<p>
								<?php pll_e( 'I accept have a land for this house' ) ?>
							</p>
						</div>

						<button class="btn-primary btn-full"
								disabled>
							<?php pll_e( 'order a bank request' ) ?>
						</button>
					</div>

				<?php endif; ?>

			</div>

		</div>
	</div>

<?php endif; ?>
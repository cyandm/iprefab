<section class="single-exhibition-details | d-flex gap-12 box">
	<div class="d-grid gap-12">
		<div>
			<div class="h5">
				<i class="iconsax"
				   icon-name="location"></i>
				<?php pll_e( 'The address' ) ?>
			</div>

			<?= get_field( 'address' ) ?>
		</div>

		<hr />

		<div>
			<div class="h5">
				<i class="iconsax"
				   icon-name="question-message"></i>
				<?php pll_e( 'guidance' ) ?>
			</div>

			<p>
				<?= get_field( 'guidance_text' ) ?>
			</p>


			<a href="<?= get_field( 'guidance_link' ) ?>"
			   class="btn-small btn-link">
				<?php pll_e( 'visit the original invitation' ) ?>
				<i class="iconsax"
				   icon-name="arrow-right">
				</i>
			</a>
		</div>

		<hr />

		<div>
			<div class="h5">
				<i class="iconsax"
				   icon-name="house-1"></i>
				<?php pll_e( 'collection' ) ?>
			</div>

			<?= get_field( 'collection' ) ?>
		</div>
	</div>

	<div class="single-exhibition-location">
		<?= get_field( 'location' ) ?>
	</div>

</section>
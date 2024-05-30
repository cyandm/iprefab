<section class="single-exhibition-details | d-flex gap-12 box">
	<div class="d-grid gap-12">
		<div>
			<div class="h5">
				<i class="iconsax"
				   icon-name="location"></i>
				<?php _e( 'The address of the house presentation', 'cyn-dm' ) ?>
			</div>

			<?= get_field( 'address' ) ?>
		</div>

		<hr />

		<div>
			<div class="h5">
				<i class="iconsax"
				   icon-name="question-message"></i>
				<?php _e( 'Guidance', 'cyn-dm' ) ?>
			</div>

			<p>
				<?= get_field( 'guidance_text' ) ?>
			</p>


			<a href="<?= get_field( 'guidance_link' ) ?>"
			   class="btn-small btn-link">
				<?php _e( 'show driving directions', 'cyn-dm' ) ?>
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
				<?php _e( 'collection', 'cyn-dm' ) ?>
			</div>

			<?= get_field( 'collection' ) ?>
		</div>
	</div>

	<div class="single-exhibition-location">

	</div>

</section>
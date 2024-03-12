<section class="single-exhibition-details | d-flex gap-12 box">
	<div class="d-grid gap-12">
		<div>
			<div class="h5">
				<i class="iconsax"
				   icon-name="location"></i>
				The address of the house presentation
			</div>

			<?= get_field( 'address' ) ?>
		</div>

		<hr />

		<div>
			<div class="h5">
				<i class="iconsax"
				   icon-name="question-message"></i>
				Guidance
			</div>

			<p>
				<?= get_field( 'guidance_text' ) ?>
			</p>


			<a href="<?= get_field( 'guidance_link' ) ?>"
			   class="btn-small btn-link">
				show driving directions
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
				collection
			</div>

			<?= get_field( 'collection' ) ?>
		</div>
	</div>

	<div class="single-exhibition-location">

	</div>

</section>
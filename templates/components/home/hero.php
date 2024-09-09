<section class="hero">
	<h1 class="title">
		<?php echo get_field( 'hero_title' ) ?>
	</h1>
	<p class="h2">
		<?php echo get_field( 'hero_description' ) ?>
	</p>

	<div class="clear-fix-12"></div>

	<hr>

	<div class="hero_box">
		<div class="hero_box_image">
			<?php echo wp_get_attachment_image( get_field( 'hero_image' ), 'full' ) ?>
		</div>

		<div class="hero_box_icon">
			<i class="iconsax"
			   icon-name="location"></i>
			<?php _e( 'finland', 'cyn-dm' ) ?>
		</div>



		<form class="hero_box_form only-desktop"
			  method="get"
			  id="filtersForm"
			  action="<?php echo get_post_type_archive_link( 'house-and-land' ) ?>">
			<div>

				<label for="city"
					   class="input-wrapper citySearch">

					<span class="input-label">
						<?php _e( 'location', 'cyn-dm' ) ?>
					</span>

					<input type="text"
						   name="city"
						   placeholder="city">


					<span class="input-action">
						<i class="iconsax"
						   icon-name="search-normal-2"></i>
					</span>

				</label>



				<label for="areaMin"
					   class="input-wrapper">
					<span class="input-label">
						<?php _e( 'living area', 'cyn-dm' ) ?>
					</span>
					<input type="number"
						   name="areaMin"
						   id="areaMin"
						   placeholder="min">

					<span class="input-action">
						m <sup>2</sup>
					</span>
				</label>




				<button type="submit"
						class="btn-primary ">
					<?php _e( 'search', 'cyn-dm' ) ?>
				</button>

			</div>
		</form>
	</div>

	<form class="hero_box_form only-mobile"
		  method="get"
		  id="filtersForm"
		  action="<?php echo get_post_type_archive_link( 'house-and-land' ) ?>">
		<div>

			<label for="city"
				   class="input-wrapper citySearch">

				<span class="input-label">
					<?php _e( 'location', 'cyn-dm' ) ?>
				</span>

				<input type="text"
					   name="city"
					   placeholder="city">


				<span class="input-action">
					<i class="iconsax"
					   icon-name="search-normal-2"></i>
				</span>

			</label>



			<label for="areaMin"
				   class="input-wrapper">
				<span class="input-label">
					<?php _e( 'living area', 'cyn-dm' ) ?>
				</span>
				<input type="number"
					   name="areaMin"
					   placeholder="min"
					   id="areaMin">


			</label>



			<button type="submit"
					class="btn-primary ">
				<?php _e( 'search', 'cyn-dm' ) ?>
			</button>

		</div>
	</form>

</section>
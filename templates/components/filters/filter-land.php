<?php

$cities = get_field_object( 'single_land_city' )['choices'] ?? [];


?>


<form action="<?= get_post_type_archive_link( 'land' ) ?>"
	  method="get"
	  id="filtersForm">


	<label for="city"
		   class="input-wrapper citySearch">

		<span class="input-label">
			<?php _e( 'city', 'cyn-dm' ) ?>
		</span>

		<input type="text"
			   name="city">


		<span class="input-action">
			<i class="iconsax"
			   icon-name="search-normal-2"></i>
		</span>

	</label>

	<div class="input-group">
		<span class="input-group-label">
			<?php _e( 'permit type', 'cyn-dm' ) ?>
		</span>
		<div class="input-group-wrapper">
			<label for="permitTypeHouse">
				<input type="radio"
					   name="permitType"
					   id="permitTypeHouse"
					   value="house"
					   <?=
					   	isset( $_GET['permitType'] ) &&
					   	$_GET['permitType'] == 'house' ?
					   	'checked' : '' ?>>

				<span>
					<?php _e( 'house', 'cyn-dm' ) ?>
				</span>

			</label>

			<label for="permitTypeVilla">
				<input type="radio"
					   name="permitType"
					   id="permitTypeVilla"
					   value="villa"
					   <?=
					   	isset( $_GET['permitType'] ) &&
					   	$_GET['permitType'] == 'villa' ?
					   	'checked' : '' ?>>
				<span>
					<?php _e( 'villa', 'cyn-dm' ) ?>
				</span>

			</label>
		</div>
	</div>

	<label for="priceMin"
		   class="input-wrapper">
		<span class="input-label">
			<?php _e( 'price min', 'cyn-dm' ) ?>
		</span>
		<input type="number"
			   name="priceMin"
			   id="priceMin"
			   value="<?=
			   	isset( $_GET['priceMin'] ) ? $_GET['priceMin'] : ''
			   	?>">

		<span class="input-action">
			€
		</span>
	</label>

	<label for="priceMax"
		   class="input-wrapper">
		<span class="input-label">
			<?php _e( 'price max', 'cyn-dm' ) ?>
		</span>
		<input type="number"
			   name="priceMax"
			   id="priceMax"
			   value="<?=
			   	isset( $_GET['priceMax'] ) ? $_GET['priceMax'] : ''
			   	?>">

		<span class="input-action">
			€
		</span>
	</label>

	<label for="surfaceMin"
		   class="input-wrapper">
		<span class="input-label">
			<?php _e( 'surface min', 'cyn-dm' ) ?>
		</span>
		<input type="number"
			   name="surfaceMin"
			   id="surfaceMin"
			   value="<?=
			   	isset( $_GET['surfaceMin'] ) ? $_GET['surfaceMin'] : ''
			   	?>">

		<span class="input-action">
			m<sup>2</sup>
		</span>
	</label>

	<label for="surfaceMax"
		   class="input-wrapper">
		<span class="input-label">
			<?php _e( 'surface max', 'cyn-dm' ) ?>
		</span>
		<input type="number"
			   name="surfaceMax"
			   id="surfaceMax"
			   value="<?=
			   	isset( $_GET['surfaceMax'] ) ? $_GET['surfaceMax'] : ''
			   	?>">

		<span class="input-action">
			m<sup>2</sup>
		</span>
	</label>



	<button class="btn-primary btn-full"
			type="submit">
		<?php _e( 'search', 'cyn-dm' ) ?>
	</button>
</form>
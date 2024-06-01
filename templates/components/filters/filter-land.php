<?php
$filters = cyn_get_filters();

$cities = get_field_object( 'single_land_city' )['choices'] ?? [];


?>


<form action="<?= get_post_type_archive_link( 'land' ) ?>"
	  method="post"
	  id="filtersForm">

	<label for="search"
		   class="input-wrapper">
		<span class="input-label">
			<?php _e( 'Search', 'cyn-dm' ) ?>
		</span>
		<input type="text"
			   name="search"
			   id="search"
			   value="<?=
			   	isset( $filters['search'] ) ? $filters['search'] : ''
			   	?>">

		<span class="input-action">
			<i class="iconsax"
			   icon-name="search-normal-2"></i>
		</span>
	</label>

	<label for="city"
		   class="city-select-2"
		   class="input-wrapper">
		<span class="input-label">
			<?php _e( 'City', 'cyn-dm' ) ?>
		</span>
		<select name="city"
				id="city">

			<option value="null">
				<?php _e( 'doesn\'t matter', 'cyn-dm' ) ?>
			</option>

			<?php foreach ( $cities as $city ) : ?>

				<option value="<?= $city ?>"
						<?php
						if (
							isset( $filters['city'] ) &&
							$filters['city'] === $city
						) {
							echo 'selected';
						}
						?>>
					<?= $city ?>
				</option>

			<?php endforeach; ?>
		</select>

		<span class="input-action">
			<i class="iconsax"
			   icon-name="chevron-down"></i>
		</span>
	</label>

	<div class="input-group">
		<span class="input-group-label">
			<?php _e( 'Permit type', 'cyn-dm' ) ?>
		</span>
		<div class="input-group-wrapper">
			<label for="permitTypeHouse">
				<input type="radio"
					   name="permitType"
					   id="permitTypeHouse"
					   value="house"
					   <?=
					   	isset( $filters['permitType'] ) &&
					   	$filters['permitType'] == 'house' ?
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
					   	isset( $filters['permitType'] ) &&
					   	$filters['permitType'] == 'villa' ?
					   	'checked' : '' ?>>
				<span>
					<?php _e( 'Villa', 'cyn-dm' ) ?>
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
			   	isset( $filters['priceMin'] ) ? $filters['priceMin'] : ''
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
			   	isset( $filters['priceMax'] ) ? $filters['priceMax'] : ''
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
			   	isset( $filters['surfaceMin'] ) ? $filters['surfaceMin'] : ''
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
			   	isset( $filters['surfaceMax'] ) ? $filters['surfaceMax'] : ''
			   	?>">

		<span class="input-action">
			m<sup>2</sup>
		</span>
	</label>



	<button class="btn-primary btn-full"
			type="submit">
		<?php _e( 'apply filter', 'cyn-dm' ) ?>
	</button>
</form>
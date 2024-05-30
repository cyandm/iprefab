<?php
global $wp_query;

$filters = cyn_get_filters();
$cities = get_field_object( 'single_land_city' )['choices'] ?? [];




?>


<form action="<?= get_post_type_archive_link( 'house-and-land' ) ?>"
	  method="post"
	  class="row-form"
	  id="filtersForm">

	<label for="city"
		   class="input-wrapper">
		<span class="input-label">
			<?php _e( 'city', 'cyn-dm' ) ?>
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

	<div class="input-group">
		<span class="input-group-label">
			<?php _e( 'Permit type', 'cyn-dm' ) ?>
		</span>
		<div class="input-group-wrapper">
			<label for="permitTypeHouse">
				<input type="radio"
					   name="houseType"
					   id="houseTypeHouse"
					   value="house"
					   <?=
					   	isset( $filters['houseType'] ) &&
					   	$filters['houseType'] == 'house' ?
					   	'checked' : '' ?>>

				<span>
					<?php _e( 'house', 'cyn-dm' ) ?>
				</span>

			</label>

			<label for="houseTypeVilla">
				<input type="radio"
					   name="houseType"
					   id="houseTypeVilla"
					   value="villa"
					   <?=
					   	isset( $filters['houseType'] ) &&
					   	$filters['houseType'] == 'villa' ?
					   	'checked' : '' ?>>
				<span>
					<?php _e( 'Villa', 'cyn-dm' ) ?>
				</span>

			</label>
		</div>
	</div>

	<button class="btn-primary btn-full"
			type="submit">
		<?php _e( 'apply filter', 'cyn-dm' ) ?>
	</button>

</form>
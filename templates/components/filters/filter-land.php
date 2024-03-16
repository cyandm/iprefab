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
			Search
		</span>
		<input type="text"
			   name="search"
			   id="search"
			   value="<?=
			   	isset ( $filters['search'] ) ? $filters['search'] : ''
			   	?>">

		<span class="input-action">
			<i class="iconsax"
			   icon-name="search-normal-2"></i>
		</span>
	</label>

	<label for="city"
		   class="input-wrapper">
		<span class="input-label">
			City
		</span>
		<select name="city"
				id="city">

			<option value="null">
				doesn't matter
			</option>

			<?php foreach ( $cities as $city ) : ?>

				<option value="<?= $city ?>"
						<?php
						if (
							isset ( $filters['city'] ) &&
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
		<span class="input-group-label">Permit type</span>
		<div class="input-group-wrapper">
			<label for="permitTypeHouse">
				<input type="radio"
					   name="permitType"
					   id="permitTypeHouse"
					   value="house"
   <?=
   	isset ( $filters['permitType'] ) &&
   	$filters['permitType'] == 'house' ?
   	'checked' : '' ?>>

				<span>house</span>

			</label>

			<label for="permitTypeVilla">
				<input type="radio"
					   name="permitType"
					   id="permitTypeVilla"
					   value="villa"
					   <?=
					   	isset ( $filters['permitType'] ) &&
					   	$filters['permitType'] == 'villa' ?
					   	'checked' : '' ?>>
				<span>Villa</span>

			</label>
		</div>
	</div>

	<label for="priceMin"
		   class="input-wrapper">
		<span class="input-label">
			price min
		</span>
		<input type="number"
			   name="priceMin"
			   id="priceMin"
			   value="<?=
			   	isset ( $filters['priceMin'] ) ? $filters['priceMin'] : ''
			   	?>">

		<span class="input-action">
			€
		</span>
	</label>

	<label for="priceMax"
		   class="input-wrapper">
		<span class="input-label">
			price max
		</span>
		<input type="number"
			   name="priceMax"
			   id="priceMax"
			   value="<?=
			   	isset ( $filters['priceMax'] ) ? $filters['priceMax'] : ''
			   	?>">

		<span class="input-action">
			€
		</span>
	</label>

	<label for="surfaceMin"
		   class="input-wrapper">
		<span class="input-label">
			surface min
		</span>
		<input type="number"
			   name="surfaceMin"
			   id="surfaceMin"
			   value="<?=
			   	isset ( $filters['surfaceMin'] ) ? $filters['surfaceMin'] : ''
			   	?>">

		<span class="input-action">
			m<sup>2</sup>
		</span>
	</label>

	<label for="surfaceMax"
		   class="input-wrapper">
		<span class="input-label">
			surface max
		</span>
		<input type="number"
			   name="surfaceMax"
			   id="surfaceMax"
			   value="<?=
			   	isset ( $filters['surfaceMax'] ) ? $filters['surfaceMax'] : ''
			   	?>">

		<span class="input-action">
			m<sup>2</sup>
		</span>
	</label>



	<button class="btn-primary btn-full"
			type="submit">
		apply filter
	</button>
</form>
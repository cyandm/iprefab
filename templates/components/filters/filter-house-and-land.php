<?php
global $wp_query;


$cities = get_field_object( 'single_land_city' )['choices'] ?? [];

?>


<form action="<?= get_post_type_archive_link( 'house-and-land' ) ?>"
	  method="get"
	  class="row-form"
	  id="filtersForm">

	<label for="city"
		   class="input-wrapper citySearch">

		<span class="input-label">
			<?php pll_e( 'city' ) ?>
		</span>

		<input type="text"
			   value="<?php echo $_GET['city'] ?>"
			   name="city">


		<span class="input-action">
			<i class="iconsax"
			   icon-name="search-normal-2"></i>
		</span>

	</label>

	<label for="priceMin"
		   class="input-wrapper">
		<span class="input-label">
			<?php pll_e( 'price min' ) ?>
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
			<?php pll_e( 'price max' ) ?>
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

	<label for="areaMin"
		   class="input-wrapper">
		<span class="input-label">
			<?php pll_e( 'area min' ) ?>
		</span>
		<input type="number"
			   name="areaMin"
			   id="areaMin"
			   value="<?=
			   	isset( $_GET['areaMin'] ) ? $_GET['areaMin'] : ''
			   	?>">

		<span class="input-action">
			m<sup>2</sup>
		</span>
	</label>

	<label for="areaMax"
		   class="input-wrapper">
		<span class="input-label">
			<?php pll_e( 'area max' ) ?>
		</span>
		<input type="number"
			   name="areaMax"
			   id="areaMax"
			   value="<?=
			   	isset( $_GET['areaMax'] ) ? $_GET['areaMax'] : ''
			   	?>">

		<span class="input-action">
			m<sup>2</sup>
		</span>
	</label>

	<!-- <div class="input-group">
		<span class="input-group-label">
			<?php pll_e( 'Permit type', 'cyn-dm' ) ?>
		</span>
		<div class="input-group-wrapper">
			<label for="permitTypeHouse">
				<input type="radio"
					   name="houseType"
					   id="houseTypeHouse"
					   value="house"
					   <?=
					   	isset( $_GET['houseType'] ) &&
					   	$_GET['houseType'] == 'house' ?
					   	'checked' : '' ?>>

				<span>
					<?php pll_e( 'house', 'cyn-dm' ) ?>
				</span>

			</label>

			<label for="houseTypeVilla">
				<input type="radio"
					   name="houseType"
					   id="houseTypeVilla"
					   value="villa"
					   <?=
					   	isset( $_GET['houseType'] ) &&
					   	$_GET['houseType'] == 'villa' ?
					   	'checked' : '' ?>>
				<span>
					<?php pll_e( 'Villa', 'cyn-dm' ) ?>
				</span>

			</label>
		</div>
	</div> -->

	<div class="d-flex gap-16 w-full actions">

		<button class="btn-primary btn-full"
				type="submit">
			<?php pll_e( 'Search' ) ?>
		</button>

		<!-- 
		<button class="btn-secondary btn-full"
				type="submit"
				disabled>
			<?php pll_e( 'other filters' ) ?>
		</button> -->

	</div>



</form>
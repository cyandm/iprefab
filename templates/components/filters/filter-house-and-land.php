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
			<?php _e( 'city', 'cyn-dm' ) ?>
		</span>

		<input type="text"
			   value="<?php echo $_GET['city'] ?? '' ?>"
			   name="city">


		<span class="input-action">
			<i class="iconsax"
			   icon-name="search-normal-2"></i>
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

	<label for="areaMin"
		   class="input-wrapper">
		<span class="input-label">
			<?php _e( 'area min', 'cyn-dm' ) ?>
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
			<?php _e( 'area max', 'cyn-dm' ) ?>
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



	<div class="d-flex gap-16 w-full actions">

		<button class="btn-primary btn-full"
				type="submit">
			<?php _e( 'search', 'cyn-dm' ) ?>
		</button>

		<!-- 
		<button class="btn-secondary btn-full"
				type="submit"
				disabled>
			<?php _e( 'other filters', 'cyn-dm' ) ?>
		</button> -->

	</div>



</form>
<?php
$filters = cyn_get_filters();

$companies = get_terms( [ 
	'taxonomy' => 'company'
] );
$countries = [];

foreach ( $companies as $company ) {
	$origin = get_field( 'country', 'company_' . $company->term_id );

	array_push( $countries, $origin );
}

$countries = array_filter( $countries );


?>

<form action="<?= get_post_type_archive_link( 'house' ) ?>"
	  method="post"
	  id="filtersForm">

	<!-- <label for="search"
		   class="input-wrapper">
		<span class="input-label">
			<?php pll_e( 'Search', 'cyn-dm' ) ?>
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
	</label> -->

	<label for="originCompany"
		   class="input-wrapper">
		<span class="input-label">
			<?php pll_e( 'origin of company' ) ?>
		</span>
		<select name="originCompany"
				id="originCompany">

			<option value="null">
				<?php pll_e( 'doesn\'t matter' ) ?>
			</option>

			<?php foreach ( $countries as $material ) : ?>

				<option value="<?= $material ?>"
						<?php
						if (
							isset( $filters['originCompany'] ) &&
							$filters['originCompany'] === $material
						) {
							echo 'selected';
						}
						?>>
					<?= $material ?>
				</option>

			<?php endforeach; ?>
		</select>

		<span class="input-action">
			<i class="iconsax"
			   icon-name="chevron-down"></i>
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
			   	isset( $filters['areaMin'] ) ? $filters['areaMin'] : ''
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
			   	isset( $filters['areaMax'] ) ? $filters['areaMax'] : ''
			   	?>">

		<span class="input-action">
			m<sup>2</sup>
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
			   	isset( $filters['priceMin'] ) ? $filters['priceMin'] : ''
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
			   	isset( $filters['priceMax'] ) ? $filters['priceMax'] : ''
			   	?>">

		<span class="input-action">
			€
		</span>
	</label>

	<label for="rooms"
		   class="input-wrapper">
		<span class="input-label">
			<?php pll_e( 'rooms' ) ?>
		</span>
		<select name="rooms"
				id="rooms">
			<option value="null">
				<?php pll_e( 'doesn\'t matter' ) ?>
			</option>
			<?php for ( $i = 1; $i <= 8; $i++ ) : ?>
				<option value="<?= $i ?>"
						<?php
						if ( isset( $filters['rooms'] ) && (int) $filters['rooms'] === $i ) {
							echo 'selected';
						}
						?>>
					<?= $i ?>
				</option>
			<?php endfor; ?>
		</select>

		<span class="input-action">
			<i class="iconsax"
			   icon-name="chevron-down"></i>
		</span>
	</label>

	<label for="floors"
		   class="input-wrapper">
		<span class="input-label">
			<?php pll_e( 'floors' ) ?>
		</span>
		<select name="floors"
				id="floors">
			<option value="null">
				<?php pll_e( 'doesn\'t matter' ) ?>
			</option>
			<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
				<option value="<?= $i ?>"
						<?php
						if ( isset( $filters['floors'] ) && (int) $filters['floors'] === $i ) {
							echo 'selected';
						}
						?>>
					<?= $i ?>
				</option>
			<?php endfor; ?>
		</select>

		<span class="input-action">
			<i class="iconsax"
			   icon-name="chevron-down"></i>
		</span>
	</label>

	<div class="input-group">
		<span class="input-group-label">
			<?php pll_e( 'Sauna' ) ?>
		</span>
		<div class="input-group-wrapper">
			<label for="saunaNo">
				<input type="radio"
					   name="sauna"
					   id="saunaNo"
					   value="no"
					   <?=
					   	isset( $filters['sauna'] ) &&
					   	$filters['sauna'] == 'no' ?
					   	'checked' : '' ?>>

				<span>no</span>

			</label>

			<label for="saunaYes">
				<input type="radio"
					   name="sauna"
					   id="saunaYes"
					   value="yes"
					   <?=
					   	isset( $filters['sauna'] ) &&
					   	$filters['sauna'] == 'yes' ?
					   	'checked' : '' ?>>
				<span>
					<?php pll_e( 'yes' ) ?>
				</span>

			</label>
		</div>
	</div>

	<button class="btn-primary btn-full"
			type="submit">
		<?php pll_e( 'Search' ) ?>
	</button>
</form>
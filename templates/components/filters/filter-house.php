<?php

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
	  method="GET"
	  id="filtersForm">

	<label for="originCompany"
		   class="input-wrapper">
		<span class="input-label">
			<?php _e( 'origin of company', 'cyn-dm' ) ?>
		</span>
		<select name="originCompany"
				id="originCompany">

			<option value="null">
				<?php _e( 'doesn\'t matter', 'cyn-dm' ) ?>
			</option>

			<?php foreach ( $countries as $material ) : ?>

				<option value="<?= $material ?>"
						<?php
						if (
							isset( $_GET['originCompany'] ) &&
							$_GET['originCompany'] === $material
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
			<?php _e( 'area min', 'cyn-dm' ) ?>
		</span>
		<input type="number"
			   name="areaMin"
			   id="areaMin"
			   value="<?php echo $_GET['areaMin'] ?? '' ?>">

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

	<label for="rooms"
		   class="input-wrapper">
		<span class="input-label">
			<?php _e( 'rooms', 'cyn-dm' ) ?>
		</span>
		<select name="rooms"
				id="rooms">
			<option value="null">
				<?php _e( 'doesn\'t matter', 'cyn-dm' ) ?>
			</option>
			<?php for ( $i = 1; $i <= 8; $i++ ) : ?>
				<option value="<?= $i ?>"
						<?php
						if ( isset( $_GET['rooms'] ) && (int) $_GET['rooms'] === $i ) {
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
			<?php _e( 'floors', 'cyn-dm' ) ?>
		</span>
		<select name="floors"
				id="floors">
			<option value="null">
				<?php _e( 'doesn\'t matter', 'cyn-dm' ) ?>
			</option>
			<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
				<option value="<?= $i ?>"
						<?php
						if ( isset( $_GET['floors'] ) && (int) $_GET['floors'] === $i ) {
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
			<?php _e( 'sauna', 'cyn-dm' ) ?>
		</span>
		<div class="input-group-wrapper">
			<label for="saunaNo">
				<input type="radio"
					   name="sauna"
					   id="saunaNo"
					   value="no"
					   <?=
					   	isset( $_GET['sauna'] ) &&
					   	$_GET['sauna'] == 'no' ?
					   	'checked' : '' ?>>

				<span> <?php _e( 'no', 'cyn-dm' ) ?></span>

			</label>

			<label for="saunaYes">
				<input type="radio"
					   name="sauna"
					   id="saunaYes"
					   value="yes"
					   <?=
					   	isset( $_GET['sauna'] ) &&
					   	$_GET['sauna'] == 'yes' ?
					   	'checked' : '' ?>>
				<span>
					<?php _e( 'yes', 'cyn-dm' ) ?>
				</span>

			</label>
		</div>
	</div>

	<button class="btn-primary btn-full"
			type="submit">
		<?php _e( 'search', 'cyn-dm' ) ?>
	</button>
</form>
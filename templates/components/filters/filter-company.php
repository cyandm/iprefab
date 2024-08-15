<?php

$companies = get_terms( [ 
	'taxonomy' => 'company',
	'parent' => get_queried_object_id()
] );


$countries = [];
$materials = [];

foreach ( $companies as $company ) {
	$origin = get_field( 'country', 'company_' . $company->term_id );
	array_push( $countries, $origin );

	$material = get_field( 'material', 'company_' . $company->term_id );
	array_push( $materials, $material );
}

$countries = array_filter( $countries );
$countries = array_unique( $countries );

$materials = array_filter( $materials );
$materials = array_unique( $materials );
?>


<form action="<?php echo $_SERVER['REQUEST_URI'] ?>"
	  class="form-row"
	  method="get">

	<label for="originCompany"
		   class="input-wrapper">
		<span class="input-label">
			<?php _e( 'origin of company', 'cyn-dm' ) ?>
		</span>
		<select name="originCompany"
				id="originCompany">

			<option value>
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

	<label for="material"
		   class="input-wrapper">
		<span class="input-label">
			<?php _e( 'material', 'cyn-dm' ) ?>
		</span>
		<select name="material"
				id="material">

			<option value>
				<?php _e( 'doesn\'t matter', 'cyn-dm' ) ?>
			</option>

			<?php foreach ( $materials as $material ) : ?>

				<option value="<?= $material ?>"
						<?php
						if (
							isset( $_GET['material'] ) &&
							$_GET['material'] === $material
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

	<div class="input-wrapper-checkbox">
		<input type="checkbox"
			   class="input-medium"
			   <?php echo isset( $_GET['houseShow'] ) && $_GET['houseShow'] === 'on' ? 'checked' : '' ?>
			   name="houseShow">
		<p>
			<?php _e( 'featured exhibitions priority', 'cyn-dm' ) ?>
		</p>
	</div>

	<button class="btn-primary"
			type="submit">
		<?php _e( 'search', 'cyn-dm' ) ?>
	</button>
</form>
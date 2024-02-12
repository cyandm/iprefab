<?php
$filters = cyn_get_filters();

?>

<form action="<?= get_post_type_archive_link( 'product' ) ?>"
	  method="post"
	  id="filtersForm">

	<label for="originCompany"
		   class="input-wrapper">
		<span class="input-label">
			origin of company
		</span>
		<select name="originCompany"
				id="originCompany">
			<option value="iran">
				iran
			</option>
			<option value="finland">
				finland
			</option>
		</select>

		<span class="input-action">
			<i class="iconsax"
			   icon-name="chevron-down"></i>
		</span>
	</label>

	<label for="areaMin"
		   class="input-wrapper">
		<span class="input-label">
			area min
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
			area max
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
			price min
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
			price max
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
		<span class="input-group-label">Sauna</span>
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
				<span>yes</span>

			</label>
		</div>
	</div>

	<button class="btn-primary"
			type="submit">
		submit
	</button>
</form>
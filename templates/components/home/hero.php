<?php


$chips = [ 
	[ 
		'title' => __( 'finland', 'cyn-dm' ),
		'link' => '/'
	],
	[ 
		'title' => wp_count_posts( 'house' )->publish . ' Houses',
		'link' => get_post_type_archive_link( 'house' ),
	],
	[ 
		'title' => wp_count_terms( 'company', [ 
			'hide_empty' => false,
			'parent' => 0
		] ) . ' Suppliers',
		'link' => get_page_url_by_template( 'templates/suppliers.php' ),
	],
	[ 
		'title' => wp_count_posts( 'land' )->publish . ' Lands',
		'link' => get_post_type_archive_link( 'land' ),
	],
];

$city_options = [ 
	'value' => 'text'
];
?>


<section class="hero">
	<h1 class="title">
		<?php the_field( 'hero_title' ) ?>
	</h1>
	<p class="h2">
		<?php the_field( 'hero_description' ) ?>
	</p>

	<div class="clear-fix-12"></div>

	<div class="d-flex gap-12">
		<?php foreach ( $chips as $i => $chip ) : ?>
			<a class="btn-secondary btn-small"
			   href="<?= $chip['link'] ?>">
				<?= $chip['title'] ?>
			</a>
		<?php endforeach; ?>
	</div>
	<div class="clear-fix-24"></div>

	<hr>

	<div class="hero_box">
		<div class="hero_box_image">
			<?php echo wp_get_attachment_image( get_field( 'hero_image' ), 'full' ) ?>
		</div>

		<div class="hero_box_icon">
			<i class="iconsax"
			   icon-name="location"></i>
			finland
		</div>



		<form class="hero_box_form only-desktop"
			  action="">
			<div>

				<label for="city"
					   class="input-wrapper">

					<span class="input-label">
						<?php _e( 'city', 'cyn-dm' ) ?>
					</span>

					<select name=""
							id="city">
						<?php foreach ( $city_options as $value => $text ) : ?>
							<option value="<?= $value ?>"><?= $text ?></option>
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
					<input type="text"
						   id="areaMin">
				</label>



				<button type="submit"
						class="btn-primary ">
					<?php _e( 'les’t find a house', 'cyn-theme' ) ?>
				</button>

			</div>
		</form>
	</div>

	<form class="hero_box_form only-mobile"
		  action="">
		<div>

			<label for="city"
				   class="input-wrapper">

				<span class="input-label">
					<?php _e( 'city', 'cyn-dm' ) ?>
				</span>

				<select name=""
						id="city">
					<?php foreach ( $city_options as $value => $text ) : ?>
						<option value="<?= $value ?>"><?= $text ?></option>
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
				<input type="text"
					   id="areaMin">
			</label>



			<button type="submit"
					class="btn-primary ">
				<?php _e( 'les’t find a house', 'cyn-theme' ) ?>
			</button>

		</div>
	</form>

</section>
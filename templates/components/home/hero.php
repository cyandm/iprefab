<?php


$chips = [ 
	[ 
		'title' => __( 'finland', 'cyn-dm' ),
		'link' => '/'
	],
	[ 
		'title' => wp_count_posts( 'house' )->publish . ' ' . __( 'houses', 'cyn-dm' ),
		'link' => get_post_type_archive_link( 'house' ),
	],
	[ 
		'title' => wp_count_terms( 'company', [ 
			'hide_empty' => false,
			'parent' => 0
		] ) . ' ' . __( 'suppliers', 'cyn-dm' ),
		'link' => get_page_url_by_template( 'templates/suppliers.php' ),
	],
	[ 
		'title' => wp_count_posts( 'land' )->publish . ' ' . __( 'lands', 'cyn-dm' ),
		'link' => get_post_type_archive_link( 'land' ),
	],
];

?>


<section class="hero">
	<h1 class="title">
		<?php echo get_field( 'hero_title' ) ?>
	</h1>
	<p class="h2">
		<?php echo get_field( 'hero_description' ) ?>
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
			<?php _e( 'finland', 'cyn-dm' ) ?>
		</div>



		<form class="hero_box_form only-desktop"
			  method="get"
			  id="filtersForm"
			  action="<?php echo get_post_type_archive_link( 'house-and-land' ) ?>">
			<div>

				<label for="city"
					   class="input-wrapper citySearch">

					<span class="input-label">
						<?php _e( 'city', 'cyn-dm' ) ?>
					</span>

					<input type="text"
						   name="city">


					<span class="input-action">
						<i class="iconsax"
						   icon-name="search-normal-2"></i>
					</span>

				</label>



				<label for="areaMin"
					   class="input-wrapper">
					<span class="input-label">
						<?php _e( 'area min', 'cyn-dm' ) ?>
					</span>
					<input type="number"
						   name="areaMin"
						   id="areaMin">

					<span class="input-action">
						m <sup>2</sup>
					</span>
				</label>




				<button type="submit"
						class="btn-primary ">
					<?php _e( 'search', 'cyn-dm' ) ?>
				</button>

			</div>
		</form>
	</div>

	<form class="hero_box_form only-mobile"
		  method="get"
		  id="filtersForm"
		  action="<?php echo get_post_type_archive_link( 'house-and-land' ) ?>">
		<div>

			<label for="city"
				   class="input-wrapper citySearch">

				<span class="input-label">
					<?php _e( 'city', 'cyn-dm' ) ?>
				</span>

				<input type="text"
					   name="city">


				<span class="input-action">
					<i class="iconsax"
					   icon-name="search-normal-2"></i>
				</span>

			</label>



			<label for="areaMin"
				   class="input-wrapper">
				<span class="input-label">
					<?php _e( 'area min', 'cyn-dm' ) ?>
				</span>
				<input type="number"
					   name="areaMin"
					   id="areaMin">


			</label>



			<button type="submit"
					class="btn-primary ">
				<?php _e( 'search', 'cyn-dm' ) ?>
			</button>

		</div>
	</form>

</section>
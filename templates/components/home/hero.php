<?php


$chips = [ 
	[ 
		'title' => pll__( 'finland' ),
		'link' => '/'
	],
	[ 
		'title' => wp_count_posts( 'house' )->publish . ' ' . pll__( 'houses' ),
		'link' => get_post_type_archive_link( 'house' ),
	],
	[ 
		'title' => wp_count_terms( 'company', [ 
			'hide_empty' => false,
			'parent' => 0
		] ) . ' ' . pll__( 'suppliers' ),
		'link' => get_page_url_by_template( 'templates/suppliers.php' ),
	],
	[ 
		'title' => wp_count_posts( 'land' )->publish . ' ' . pll__( 'lands' ),
		'link' => get_post_type_archive_link( 'land' ),
	],
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
			<?php pll_e( 'finland' ) ?>
		</div>



		<form class="hero_box_form only-desktop"
			  method="get"
			  id="filtersForm"
			  action="<?php echo get_post_type_archive_link( 'house-and-land' ) ?>">
			<div>

				<label for="city"
					   class="input-wrapper citySearch">

					<span class="input-label">
						<?php pll_e( 'city' ) ?>
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
						<?php pll_e( 'area min' ) ?>
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
					<?php pll_e( 'search' ) ?>
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
					<?php pll_e( 'city' ) ?>
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
					<?php pll_e( 'area min' ) ?>
				</span>
				<input type="number"
					   name="areaMin"
					   id="areaMin">


			</label>



			<button type="submit"
					class="btn-primary ">
				<?php pll_e( 'search' ) ?>
			</button>

		</div>
	</form>

</section>
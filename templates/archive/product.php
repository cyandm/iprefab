<?php

global $wp_query;
$img_url = get_option( 'cyn_product_archive_image' );


?>

<?php get_header() ?>

<main class="container product-archive">
	<?php get_template_part( '/templates/components/breadcrumb' ) ?>

	<section class="img-wrapper product-archive-hero">
		<img src="<?= $img_url !== '' ? $img_url : get_stylesheet_directory_uri() . '/assets/imgs/placeholder.webp' ?>"
			 alt="house archive image">
	</section>

	<section class="product-archive-content">
		<aside class="product-archive-filter">

		</aside>
		<div class="product-archive-posts-wrapper">
			<div class="product-archive-sort">
				<a href="#"
				   class="btn-secondary ">
					<i class="iconsax"
					   icon-name="sort"></i>
					sort by

					<div class="product-archive-sort-panel">
						<form action="<?= get_post_type_archive_link( 'product' ) ?>"
							  method="get">
							<label for="priceLowest">
								<input type="radio"
									   name="price-sort"
									   id="priceLowest"
									   value="lowest"
									   <?= $_GET['price-sort'] == 'lowest' ? 'checked' : '' ?>>
								price - lowest

							</label>

							<label for="priceHighest">
								<input type="radio"
									   id="priceHighest"
									   name="price-sort"
									   value="highest"
									   <?= $_GET['price-sort'] == 'highest' ? 'checked' : '' ?>>
								price - highest

							</label>

							<button class="btn-primary"
									type="submit">
								sort
							</button>
						</form>
					</div>
				</a>

				<span class="product-archive-found-posts">
					finland:
					<span id="foundPosts">
						<?= $wp_query->found_posts ?>
					</span>
					items
				</span>
			</div>
			<div class="product-archive-posts">
				<?php if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						get_template_part( '/templates/components/card/product' );
					endwhile;
				endif; ?>
			</div>
			<div class="product-archive-pagination">
				<?= paginate_links( [ 
					'mid_size' => 1,
					'prev_text' => '<i class="iconsax" icon-name="arrow-left"></i>',
					'next_text' => '<i class="iconsax" icon-name="arrow-right"></i>',
				] ); ?>
			</div>
		</div>
	</section>

</main>

<?php get_footer() ?>
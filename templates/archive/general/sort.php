<?php
global $wp_query;
$post_type = $args['post_type'] ?? 'post';

?>


<div class="general-archive-sort">

	<a href="#"
	   class="btn-secondary filter-btn">
		<i class="iconsax"
		   icon-name="filter"></i>
		<?php pll_e( 'filters' ) ?>
	</a>

	<a class="btn-secondary sort-btn">
		<i class="iconsax"
		   icon-name="arrow-up-down"></i>
		<?php pll_e( 'sort by' ) ?>

		<div class="general-archive-sort-panel">
			<form action="<?= get_post_type_archive_link( $post_type ) ?>"
				  method="GET"
				  id="sortForm">
				<div class="input-group">
					<span class="input-group-label">
						<?php pll_e( 'price sort' ) ?>
					</span>
					<div class="input-group-wrapper">
						<label for="priceLowest">
							<input type="radio"
								   name="price-sort"
								   id="priceLowest"
								   value="lowest"
								   <?=
								   	isset( $_GET['price-sort'] ) &&
								   	$_GET['price-sort'] == 'lowest' ?
								   	'checked' : '' ?>>
							<span>
								<?php pll_e( 'lowest' ) ?>
							</span>

						</label>

						<label for="priceHighest">
							<input type="radio"
								   id="priceHighest"
								   name="price-sort"
								   value="highest"
								   <?=
								   	isset( $_GET['price-sort'] ) &&
								   	$_GET['price-sort'] == 'highest' ?
								   	'checked' : '' ?>>
							<span>
								<?php pll_e( 'highest' ) ?>
							</span>

						</label>
					</div>
				</div>

				<button class="btn-primary"
						type="submit">
					<?php pll_e( 'sort' ) ?>
				</button>
			</form>
		</div>
	</a>

	<span class="general-archive-found-posts">
		<?php echo pll__( 'finland' ) . ':' ?>
		<span id="foundPosts">
			<?= $wp_query->found_posts ?>
		</span>
		<?php pll_e( 'items' ) ?>
	</span>
</div>
<?php
global $wp_query;
$post_type = $args['post_type'] ?? 'post';
?>


<div class="general-archive-sort">

	<a href="#"
	   class="btn-secondary filter-btn">
		<i class="iconsax"
		   icon-name="filter"></i>
		filters
	</a>

	<a href="#"
	   class="btn-secondary sort-btn">
		<i class="iconsax"
		   icon-name="arrow-up-down"></i>
		sort by

		<div class="general-archive-sort-panel">
			<form action="<?= get_post_type_archive_link( $post_type ) ?>"
				  method="post"
				  id="sortForm">
				<div class="input-group">
					<span class="input-group-label">Price Sort</span>
					<div class="input-group-wrapper">
						<label for="priceLowest">
							<input type="radio"
								   name="price-sort"
								   id="priceLowest"
								   value="lowest"
   <?=
   	isset( $filters['price-sort'] ) &&
   	$filters['price-sort'] == 'lowest' ?
   	'checked' : '' ?>>
							<span>
								lowest
							</span>

						</label>

						<label for="priceHighest">
							<input type="radio"
								   id="priceHighest"
								   name="price-sort"
								   value="highest"
								   <?=
								   	isset( $filters['price-sort'] ) &&
								   	$filters['price-sort'] == 'highest' ?
								   	'checked' : '' ?>>
							<span>
								highest
							</span>

						</label>
					</div>
				</div>

				<button class="btn-primary"
						type="submit">
					sort
				</button>
			</form>
		</div>
	</a>

	<span class="general-archive-found-posts">
		finland:
		<span id="foundPosts">
			<?= $wp_query->found_posts ?>
		</span>
		items
	</span>
</div>
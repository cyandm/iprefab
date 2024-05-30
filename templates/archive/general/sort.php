<?php
global $wp_query;
$post_type = $args['post_type'] ?? 'post';


$filters = cyn_get_filters();
?>


<div class="general-archive-sort">

	<a href="#"
	   class="btn-secondary filter-btn">
		<i class="iconsax"
		   icon-name="filter"></i>
		<?php _e( 'filters', 'cyn-dm' ) ?>
	</a>

	<a class="btn-secondary sort-btn">
		<i class="iconsax"
		   icon-name="arrow-up-down"></i>
		<?php _e( 'sort by', 'cyn-dm' ) ?>

		<div class="general-archive-sort-panel">
			<form action="<?= get_post_type_archive_link( $post_type ) ?>"
				  method="post"
				  id="sortForm">
				<div class="input-group">
					<span class="input-group-label">
						<?php _e( 'Price Sort', 'cyn-dm' ) ?>
					</span>
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
								<?php _e( 'lowest', 'cyn-dm' ) ?>
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
								<?php _e( 'highest', 'cyn-dm' ) ?>
							</span>

						</label>
					</div>
				</div>

				<button class="btn-primary"
						type="submit">
					<?php _e( 'sort', 'cyn-dm' ) ?>
				</button>
			</form>
		</div>
	</a>

	<span class="general-archive-found-posts">
		<?php _e( 'finland:', 'cyn-dm' ) ?>
		<span id="foundPosts">
			<?= $wp_query->found_posts ?>
		</span>
		<?php _e( 'items', 'cyn-dm' ) ?>
	</span>
</div>
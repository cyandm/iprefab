<?php get_header() ?>

<main class="search | container">

	<div>
		<form action="<?php the_search_query() ?>">

			<div class="input-wrapper">
				<Label class="input-label"
					   for="s">
					<?php _e( 'search', 'cyn-dm' ) ?>
				</Label>

				<button type="submit"
						class="input-action">
					<i class="iconsax"
					   icon-name="search-normal-2">
					</i>
				</button>

				<input type="text"
					   class=""
					   name="s"
					   value="<?php the_search_query() ?>"
					   id="s">
			</div>

		</form>
	</div>

	<?php
	if ( have_posts() ) : ?>

		<div class="d-grid gap-16">
			<?php while ( have_posts() ) {
				the_post();

				get_template_part( '/templates/components/card/search-card' );
			} ?>


			<?php get_template_part( '/templates/archive/general/pagination', null, [] ) ?>

			<div class="clear-fix-24">

			</div>

		</div>

	<?php else :
		_e( 'sorry , no posts found', 'cyn-dm' );
	endif;
	?>

</main>

<?php get_footer() ?>
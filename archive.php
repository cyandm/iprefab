<?php get_header() ?>

<main class="container">
	<?php get_template_part( '/templates/components/breadcrumb' ); ?>

	<div class="clear-fix-60"></div>

	<div class="d-grid grid-col-3 gap-16">
		<?php

		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( '/templates/components/card/post' );
			}
		}

		?>
	</div>

	<div class="clear-fix-16"></div>

	<?php get_template_part( '/templates/archive/general/pagination' ) ?>

	<div class="clear-fix-20"></div>

</main>

<?php get_footer() ?>
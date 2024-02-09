<?php get_header() ?>

<main class="single-product container">
	<?php get_template_part( '/templates/components/breadcrumb' ); ?>

	<div class="clear-fix-24"> </div>

	<?php get_template_part( '/templates/single/product/product', 'info' ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/product/product', 'images' ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/product/product', 'main-info' ) ?>

	<div class="clear-fix-24">
		<hr />
	</div>

	<?php get_template_part( '/templates/single/product/product', 'primary-info' ) ?>




</main>

<?php get_footer() ?>
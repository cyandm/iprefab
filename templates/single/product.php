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

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/product/product', 'details' ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/product/product', 'description' ) ?>

	<div class="clear-fix-64"></div>

	<?php get_template_part( '/templates/single/product/product', 'company' ) ?>

	<div class="clear-fix-64"></div>

	<?php get_template_part( '/templates/single/product/product', 'recommend-lands' ) ?>

	<div class="clear-fix-64"></div>

	<?php get_template_part( '/templates/single/product/product', 'recommended' ) ?>




</main>

<?php get_footer() ?>
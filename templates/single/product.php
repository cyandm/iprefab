<?php get_header() ?>

<main class="single-product container">
	<?php get_template_part( '/templates/components/breadcrumb' ); ?>

	<div class="clear-fix-24"> </div>

	<?php get_template_part(
		'/templates/single/general/info'
		, null,
		[ 
			'area' => get_field( 'total_area' ),
			'price' => get_field( 'helsinki_price' ),
		] ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/general/images' ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part(
		'/templates/single/general/main-info'
		, null,
		[ 
			'has_brochure' => true,
		] ) ?>

	<div class="clear-fix-24">
		<hr />
	</div>

	<?php get_template_part( '/templates/single/product/product', 'primary-info' ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/product/product', 'details' ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/general/description' ) ?>

	<div class="clear-fix-64"></div>

	<?php get_template_part( '/templates/single/general/company' ) ?>


	<div class="clear-fix-64"></div>

	<?php get_template_part( '/templates/single/product/product', 'recommend-lands' ) ?>

	<div class="clear-fix-64"></div>

	<?php get_template_part( '/templates/single/product/product', 'recommended' ) ?>

	<div class="clear-fix-64"></div>

	<?php get_template_part(
		'/templates/single/general/recommend-by-company', null,
		[ 'post_type' => 'product' ] ) ?>

</main>

<?php get_template_part( '/templates/single/general/bottom-cta' ) ?>
<?php get_footer() ?>
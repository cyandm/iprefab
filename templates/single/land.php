<?php get_header() ?>

<main class="single-product container">
	<?php get_template_part( '/templates/components/breadcrumb' ); ?>

	<div class="clear-fix-24"> </div>

	<?php get_template_part(
		'/templates/single/general/info'
		, null,
		[ 
			'area' => get_field( 'surface' ),
			'price' => get_field( 'price' ),
		] ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/general/images' ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part(
		'/templates/single/general/main-info'
		, null,
		[ 
			'has_brochure' => false,
		] ) ?>

	<div class="clear-fix-24">
		<hr />
	</div>

	<?php get_template_part( '/templates/single/land/land', 'primary-info' ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/land/land', 'details' ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/general/description' ) ?>


	<div class="clear-fix-64"></div>

	<?php get_template_part( '/templates/single/general/company' ) ?>

	<div class="clear-fix-64"></div>

	<?php get_template_part( '/templates/single/land/land', 'recommend-house' ) ?>

	<div class="clear-fix-64"></div>

	<?php get_template_part( '/templates/single/land/land', 'recommend-lands' ) ?>

	<div class="clear-fix-64"></div>

	<?php get_template_part(
		'/templates/single/general/recommend-by-company', null,
		[ 'post_type' => 'land' ] ) ?>

</main>

<?php get_template_part( '/templates/single/general/bottom-cta' ) ?>
<?php get_footer() ?>
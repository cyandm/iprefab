<?php
$company = get_the_terms( get_queried_object_id(), 'company' )[0];


get_header() ?>


<main class="single-house container">
	<?php get_template_part( '/templates/components/breadcrumb' ); ?>

	<div class="clear-fix-24"> </div>



	<?php get_template_part(
		'/templates/single/general/info'
		, null,
		[ 
			'area' => get_field( 'total_area' ),
			'price' => get_field( 'price' ),
			'address' => get_field( 'rooms', get_queried_object_id() ) . __( ' Room', 'cyn-dm' ) . ' • ' . get_field( 'balcony', get_the_ID() ) . __( ' Balcony', 'cyn-dm' ) . ' • ' . get_field( 'garage', get_the_ID() ) . __( ' Garage', 'cyn-dm' )
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

	<?php get_template_part( '/templates/single/house/house', 'primary-info' ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/house/house', 'details' ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/general/description' ) ?>

	<div class="clear-fix-64"></div>

	<?php get_template_part( '/templates/single/general/company' ) ?>


	<div class="clear-fix-64"></div>

	<?php get_template_part( '/templates/single/house/house', 'recommend-lands' ) ?>

	<div class="clear-fix-64"></div>

	<?php get_template_part( '/templates/single/house/house', 'recommended' ) ?>

	<div class="clear-fix-64"></div>

	<?php get_template_part(
		'/templates/single/general/recommend-by-company', null,
		[ 'post_type' => 'house' ] ) ?>

</main>

<?php get_template_part( '/templates/single/general/bottom-cta' ) ?>
<?php get_footer() ?>
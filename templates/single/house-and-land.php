<?php
$post_id = get_the_ID();
$house_id = get_field( 'related_house', $post_id );
$land_id = get_field( 'related_land', $post_id );
?>

<?php get_header() ?>

<main class="single-hal container">
	<?php get_template_part( '/templates/components/breadcrumb' ) ?>

	<div class="clear-fix-24"> </div>

	<?php get_template_part(
		'/templates/single/general/info'
		, null,
		[ 
			'area' => get_field( 'total_area', $house_id ),
			'price' => intval( get_field( 'price', $house_id ) ) + intval( get_field( 'price', $land_id ) ),
			'post_1' => $house_id,
			'post_2' => $land_id,
			'address' => get_field( 'neighborhood', $land_id )
		] ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/general/images' ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part(
		'/templates/single/general/main-info'
		, null,
		[ 
			'has_brochure' => true,
			'cta_text' => pll__( 'Ask Iprefab' )
		] ) ?>

	<div class="clear-fix-24">
		<hr />
	</div>

	<?php get_template_part( '/templates/single/house-and-land/house-primary', null,
		[ 
			'house_id' => $house_id
		] )
		?>

	<div class="clear-fix-24"> </div>

	<?php get_template_part( '/templates/single/house-and-land/land-primary', null,
		[ 
			'land_id' => $land_id
		] )
		?>

	<div class="clear-fix-24"> </div>

	<?php get_template_part( '/templates/single/house-and-land/details', null,
		[ 
			'house_id' => $house_id,
			'land_id' => $land_id,
		]
	) ?>

	<div class="clear-fix-24"> </div>

	<?php get_template_part( '/templates/single/general/description' ) ?>

	<div class="clear-fix-64"> </div>

	<?php
	get_template_part( '/templates/single/general/company',
		null,
		[ 
			'company' => get_the_terms( $land_id, 'company' ),
			'title' => 'about builder'
		] )
		?>

	<div class="clear-fix-64"> </div>

	<?php get_template_part( '/templates/single/house-and-land/recommended' ) ?>

	<!-- <div class="clear-fix-80"> </div>

	<?php get_template_part(
		'/templates/single/general/recommend-by-company', null,
		[ 
			'post_type' => 'house-and-land',
			'company' => get_the_terms( $house_id, 'company' )[0]
		]
	) ?> -->

	<div class="clear-fix-80"> </div>



</main>

<?php get_footer() ?>
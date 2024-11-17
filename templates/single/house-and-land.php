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
			'area' => get_field( 'house_area', $house_id ),
			'price' => get_field( 'price', $post_id ),
			'post_1' => $house_id,
			'post_2' => $land_id,
			'address' => get_field( 'rooms', $house_id ) . 'H • ' . get_the_terms( $land_id, 'company' )[0]->name . ' • ' . get_field( 'city', $land_id ) . ' • ' . get_field( 'neighborhood', $land_id )
		] ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/general/images' ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part(
		'/templates/single/general/main-info'
		, null,
		[ 
			'has_brochure' => true,
			'cta_text' => 'message',
			'cta_2_text' => 'call',
			'cta_2_link' => 'tel:00358452307290',
		] ) ?>

	<div class="clear-fix-24">
		<hr />
	</div>

	<h4>
		house offer
	</h4>

	<?php get_template_part( '/templates/single/house-and-land/house-primary', null,
		[ 
			'house_id' => $house_id
		] )
		?>

	<div class="clear-fix-24"> </div>

	<h4>
		land offer
	</h4>

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
			'company' => get_the_terms( $house_id, 'company' ),
			'title' => __( 'about builder', 'cyn-dm' )
		] )
		?>

	<div class="clear-fix-64"> </div>

	<?php get_template_part( '/templates/single/house-and-land/recommended' ) ?>


	<div class="clear-fix-80"> </div>



</main>

<?php get_template_part( '/templates/single/general/bottom-cta', null, [ 
	'buttons' => [ 
		[ 
			'text' => __( 'brochure', 'cyn-dm' ),
			'link' => get_field( 'brochure', $house_id ) ? get_field( 'brochure', $house_id )['url'] : '#',
			'class' => 'btn-medium',
			'type' => 'link',
			'icon' => 'book-with-bookmark'
		],
		[ 
			'text' => __( 'message', 'cyn-dm' ),
			'class' => 'btn-black min-120',
			'type' => 'button',
		],
		[ 
			'text' => __( 'call', 'cyn-dm' ),
			'link' => 'tel:00358452307290',
			'class' => 'btn-cta btn-green min-120',
			'type' => 'link',
		],
	]
] ) ?>


<?php get_footer() ?>
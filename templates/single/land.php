<?php get_header() ?>



<main class="single-land container">
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
			'cta_text' => 'Call Broker',
			'cta_link' => 'tel:' . get_field( 'contact_number', get_the_ID() ),
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

<?php get_template_part( '/templates/single/general/bottom-cta', null, [ 
	'buttons' => [ 
		[ 
			'text' => pll__( 'call' ),
			'link' => 'tel:' . get_field( 'contact_number' ),
			'class' => '',
			'type' => 'link',
			'icon' => 'phone'
		],
		[ 
			'text' => pll__( 'visit advertise' ),
			'link' => get_field( 'advertise_link' ),
			'class' => '',
			'type' => 'link',
			'icon' => 'link-2'
		],
	],

	'title' => get_field( 'contact_name' ),
	'subtitle' => get_the_terms( get_queried_object_id(), 'company' )[0]->name,

] ) ?>
<?php get_footer() ?>
<?php
//Template name: archive suppliers  

$img_top_url = get_option( 'cyn_company_top_archive_image' );
$img_bottom_url = get_option( 'cyn_company_bottom_archive_image' );

$children = $args['children'] ?? false;

if ( $children ) {

	$terms = get_terms( [ 
		'taxonomy' => 'company',
		'hide_empty' => false,
		'parent' => get_queried_object_id(),
	] );

} else {
	$terms = get_terms(
		[ 
			'taxonomy' => 'company',
			'hide_empty' => false
		]
	);
}



?>

<?php get_header() ?>


<main class="container general-archive">
	<?php get_template_part( '/templates/components/breadcrumb', null, [ 'items' =>
		[ 
			[ 
				'label' => get_queried_object()->name,
				'link' => '#'
			],
		]
	] ); ?>

	<div class="clear-fix-16"></div>

	<?php get_template_part( '/templates/archive/general/image-section',
		null,
		[ 'url' => $img_top_url ]
	) ?>

	<div class="clear-fix-24"></div>



	<?php get_template_part( '/templates/components/filters/filter', 'company', [] ) ?>

	<div class="clear-fix-64"></div>

	<!-- filters -->
	<h2>
		<?php echo pll__( 'All' ) . ' ' . get_queried_object()->name ?>
	</h2>
	<hr>

	<div class="clear-fix-16"></div>


	<div class="grid-col-2 gap-16">
		<?php
		foreach ( $terms as $term ) {

			get_template_part( '/templates/components/card/company', null,
				[ 
					'term' => $term
				]
			);

		} ?>
	</div>

	<div class="clear-fix-64"></div>

	<?php get_template_part( '/templates/single/exhibition/recommended', null, [] ) ?>

	<div class="clear-fix-80"></div>

	<?php get_template_part( '/templates/archive/general/image-section',
		null,
		[ 'url' => $img_bottom_url ]
	) ?>

	<div class="clear-fix-120"></div>


</main>


<?php get_footer() ?>
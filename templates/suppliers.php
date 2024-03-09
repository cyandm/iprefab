<?php
//Template name: archive suppliers  
?>



<?php
$img_top_url = get_option( 'cyn_company_top_archive_image' );
$img_bottom_url = get_option( 'cyn_company_bottom_archive_image' );


$terms = get_terms(
	[ 
		'taxonomy' => 'company',
		'hide_empty' => false
	]
);

?>

<?php get_header() ?>


<main class="container">
	<?php get_template_part( '/templates/components/breadcrumb', null, [ 'items' =>
		[ 
			[ 
				'label' => 'suppliers',
				'link' => '#'
			],
			[ 
				'label' => 'suppliers',
				'link' => '#'
			]
		]
	] ); ?>

	<div class="clear-fix-16"></div>

	<?php get_template_part( '/templates/archive/general/image-section',
		null,
		[ 'url' => $img_top_url ]
	) ?>

	<div class="clear-fix-24"></div>

	<!-- exhibitions -->
	<!-- filters -->

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

	<div class="clear-fix-80"></div>

	<?php get_template_part( '/templates/archive/general/image-section',
		null,
		[ 'url' => $img_bottom_url ]
	) ?>

	<div class="clear-fix-120"></div>


</main>


<?php get_footer() ?>
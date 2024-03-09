<?php
global $wp_query;

$current_term = get_term( get_queried_object_id() );
$supplier_page_q = new WP_Query( [ 
	'post_type' => 'page',
	'meta_query' => [ 
		[ 
			'key' => '_wp_page_template',
			'value' => 'templates/suppliers.php',
			'compare' => '='
		]
	]
] );

$houses = [];

foreach ( $wp_query->posts as $post ) {
	if ( count( $houses ) < 3 ) {
		array_push( $houses, $post->ID );
	}
}

$supplier_page_link =
	count( $supplier_page_q->posts ) === 0 ?
	'#' :
	get_permalink( $supplier_page_q->posts[0]->ID );

$company_acf_address = 'company_' . $current_term->term_id;

?>

<?php get_header() ?>



<main class="container single-company">

	<?php get_template_part(
		'/templates/components/breadcrumb', null,
		[ 'items' => [ 
			[ 
				'label' => 'suppliers',
				'link' => $supplier_page_link
			],
			[ 
				'label' => $current_term->name,
				'link' => '#'
			]
		] ]
	); ?>

	<div class="clear-fix-24"></div>

	<section class="single-company-details | d-flex jc-between">
		<div class="single-company-info | d-flex gap-12">
			<div class="single-company-logo"
				 style="--logo-color:<?= get_field( 'color', $company_acf_address ) ?>">
				<?= wp_get_attachment_image( get_field( 'logo', $company_acf_address ), 'full' ) ?>
			</div>
			<div class="d-grid gap-20">

				<div class="d-grid gap-12">
					<h1>
						<?= $current_term->name ?>
					</h1>

					<div class="d-flex gap-12">
						<a href="#"
						   class="btn-icon">
							<i class="iconsax"
							   icon-name="printer"></i>
						</a>

						<a href="#"
						   class="btn-icon">
							<i class="iconsax"
							   icon-name="share"></i>
						</a>
					</div>

					<div class="d-grid gap-4">
						<div class="d-flex ai-center gap-4">
							<span class="single-company-flag">
								<?= wp_get_attachment_image( get_field( 'flag', $company_acf_address ), 'full' ) ?>
							</span>

							<div class="single-company-country d-flex gap-4">
								<span><?= get_field( 'country', $company_acf_address ) ?></span>
								•
								<span>
									<?= get_field( 'established_year', $company_acf_address ) ?>
								</span>
							</div>
						</div>

						<div class="single-company-detail | d-flex gap-4">
							<i class="iconsax"
							   icon-name="house-1"></i>
							<span><?= $wp_query->found_posts ?></span>
							<span>houses</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="single-company-cta | d-flex ai-center gap-12">
			<a href="#"
			   class="btn-horizontal btn-secondary">
				<i class="iconsax"
				   icon-name="eye"></i>
				visit website
			</a>

			<a href="#"
			   class="btn-horizontal btn-secondary">
				<i class="iconsax"
				   icon-name="mobile"></i>
				contact info
			</a>
		</div>
	</section>

	<div class="clear-fix-24"></div>

	<section class="">

		<div class="d-flex jc-between">
			<h2 class="h1">about company</h2>
			<a href="#"
			   class="btn-primary">call back request</a>

		</div>

		<div class="clear-fix-12"></div>
		<hr />
		<div class="clear-fix-24"></div>

		<p class="body-s">
			<?= $current_term->description ?>
		</p>

		<div class="clear-fix-16"></div>

		<div class="body-s d-flex flex-col ai-start gap-12">
			<?php cyn_render_icon_box( 'location', get_field( 'location', $company_acf_address ) ) ?>
			<?php cyn_render_icon_box( 'phone', get_field( 'phone', $company_acf_address ) ) ?>
		</div>


	</section>

	<div class="clear-fix-24"></div>

	<?php
	cyn_render_section_card(
		'houses in IPREFAB',
		[ 'link' => '#', 'title' => 'view all', 'icon' => 'eye' ],
		$houses,
		'house'
	);
	?>

	<div class="clear-fix-120"></div>

</main>

<?php get_footer() ?>
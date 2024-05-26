<?php

$faq_cats = get_terms( [ 
	'taxonomy' => 'faq-cat',
	'hide_empty' => true
] ); ?>

<div class="section-card-title-wrapper">
	<span class="h1">
		<?php _e( 'Frequently Asked Questions', 'cyn-dm' ) ?>
	</span>
</div>
<div class="clear-fix-16"></div>

<hr />

<div class="clear-fix-24"></div>

<section class="faq-section">

	<?php foreach ( $faq_cats as $cat ) :

		$faq_list = get_posts( [ 
			'post_type' => 'faq',
			'tax_query' => [ 
				[ 
					'taxonomy' => 'faq-cat',
					'field' => 'id',
					'terms' => $cat->term_id
				]
			]
		] ); ?>
		<div class="faq-section-item"
			 data-term-id="<?= $cat->term_id ?>">
			<div class="faq-section-title"
				 data-term-id="<?= $cat->term_id ?>">
				<h4><?= $cat->name ?></h4>
				<i class="iconsax"
				   icon-name="chevron-down"></i>
			</div>

			<div class="faq-list"
				 data-term-id="<?= $cat->term_id ?>">
				<div>
					<?php foreach ( $faq_list as $faq ) : ?>
						<div class="faq-list-item">
							<div class="faq-icon"
								 data-faq-id="<?= $faq->ID ?>">

								<i class="iconsax"
								   icon-name="add-square"></i>

							</div>
							<div data-faq-id="<?= $faq->ID ?>">
								<h5>
									<?php echo get_the_title( $faq ); ?>
								</h5>
								<div class="faq-content">
									<div>
										<?php echo get_the_content( null, true, $faq ) ?>
									</div>
								</div>
							</div>

						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>

</section>
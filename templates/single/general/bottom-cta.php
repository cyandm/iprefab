<?php
$company = get_the_terms( get_queried_object_id(), 'company' )[0];
$company_logo = wp_get_attachment_image(
	get_field( 'logo', 'company_' . $company->term_id ),
	[ 300, 300 ], false,
	[ 'style' => '--logo-color:' . get_field( 'color', 'company_' . $company->term_id ) ] );

$brochure_link = get_field( 'brochure', get_queried_object_id() );


$button_default = [ 
	[ 
		'text' => pll__( 'brochure' ),
		'link' => $brochure_link,
		'class' => '',
		'type' => 'link',
		'icon' => 'book-with-bookmark'
	],
	[ 
		'text' => pll__( 'Ask Builder' ),
		'class' => '',
		'type' => 'button',
	],
];

$buttons = $args['buttons'] ?? $button_default;

?>


<div class="general-bottom-cta"
	 id="bottomCta">

	<div class="general-bottom-cta-company">
		<div class="img-wrapper">
			<?= $company_logo ?>
		</div>

		<div>
			<div class="general-bottom-cta-company-name">
				<?= $company->name ?>
			</div>
			<div class="general-bottom-cta-company-origin">

				<?= get_field( 'origin_of_company', 'company_' . $company->term_id ) ?>
			</div>
		</div>
	</div>

	<div class="general-actions-primary">
		<?php foreach ( $buttons as $index => $button ) : ?>

			<?php if ( $button['type'] === 'link' ) : ?>

				<a href="<?= $button['link'] ?>"
				   class="btn-secondary btn-icon-start <?= $button['class'] ?>">
					<i class="iconsax"
					   icon-name="<?= $button['icon'] ?>"></i>
					<?= $button['text'] ?>
				</a>
			<?php elseif ( $button['type'] === 'button' ) : ?>
				<button class="btn-cta <?= $button['class'] ?>">
					<?= $button['text'] ?>
				</button>
			<?php endif; ?>

		<?php endforeach; ?>


	</div>
</div>
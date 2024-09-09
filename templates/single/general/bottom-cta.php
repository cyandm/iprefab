<?php
$company = get_the_terms( get_queried_object_id(), 'company' )[0];
$company_logo = wp_get_attachment_image(
	get_field( 'logo', 'company_' . $company->term_id ),
	[ 300, 300 ], false,
	[ 'style' => '--logo-color:' . get_field( 'color', 'company_' . $company->term_id ) ] );

$brochure_link = get_field( 'brochure', get_queried_object_id() ) ? get_field( 'brochure', get_queried_object_id() )['url'] : '#';


$button_default = [ 
	[ 
		'text' => __( 'brochure', 'cyn-dm' ),
		'link' => $brochure_link,
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
		'link' => 'tel:' . get_field( 'phone', 'company_' . $company->term_id ),
		'class' => 'btn-cta btn-green min-120',
		'type' => 'link',
	],
];

$title_default = $company->name;
$subtitle = get_field( 'country', 'company_' . $company->term_id );
$subtitle_default = '';

$buttons = $args['buttons'] ?? $button_default;
$title = $args['title'] ?? $title_default;
$subtitle = $args['subtitle'] ?? $subtitle_default;
?>


<div class="general-bottom-cta"
	 id="bottomCta">

	<div class="general-bottom-cta-company">
		<div class="img-wrapper">
			<?= $company_logo ?>
		</div>

		<div>
			<div class="general-bottom-cta-company-name">
				<?= $title ?>
			</div>
			<div class="general-bottom-cta-company-origin">

				<?= $subtitle ?>
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
				<a class="btn-cta callback-opener <?= $button['class'] ?>">
					<?= $button['text'] ?>
				</a>
			<?php endif; ?>

		<?php endforeach; ?>


	</div>
</div>
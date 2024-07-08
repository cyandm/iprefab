<?php

$cta_text = $args['cta_text'] ?? pll__( 'Ask Builder' );
$cta_link = $args['cta_link'] ?? '#';
$has_brochure = $args['has_brochure'] ?? false;
$title = get_the_title();

$is_calender = $args['is_calender'] ?? false;


?>


<div class="general-main-info">

	<div>
		<div class="general-title-wrapper">
			<h1 class="general-title"
				id="title">
				<?= $title ?>
			</h1>
			<div class="general-actions-secondary">
				<button class="action-share | btn-icon"
						id="btnShare">
					<?php get_template_part( '/assets/icons/share' ) ?>
				</button>

				<button class="action-share | btn-icon"
						id="btnPrint">
					<i class="iconsax"
					   icon-name="printer"></i>
				</button>
			</div>
		</div>
		<div class="general-info-short">
			<?= get_field( 'address' ) ?>
		</div>
	</div>

	<div class="general-actions-primary">
		<?php if ( $has_brochure ) : ?>
			<button class="btn-secondary-icon-start">
				<i class="iconsax"
				   icon-name="book-with-bookmark"></i>
				brochure
			</button>
		<?php endif; ?>

		<?php if ( $is_calender ) : ?>

			<a href="<?=
				"https://calendar.google.com/calendar/render?action=TEMPLATE&text=" .
				get_the_title() .
				"&details=Address: " . get_field( 'address' ) .
				"&dates=" .
				get_field( 'date' ) . "T" . str_ireplace( ':', '', get_field( 'begin_time' ) ) . "00/"
				. get_field( 'date' ) . "T" . str_ireplace( ':', '', get_field( 'end_time' ) ) .
				"00" ?>"
			   target="_blank"
			   class="btn-secondary btn-icon-start">
				<i class="iconsax"
				   icon-name="calendar-2"></i>
				<?php pll_e( 'add to calender' ) ?>
			</a>

		<?php else : ?>
			<a href="<?php echo $cta_link ?>"
			   class="btn-cta">
				<?php echo $cta_text ?>
			</a>

		<?php endif; ?>
	</div>

</div>
<?php

$cta_text = $args['cta_text'] ?? __( 'Ask Builder', 'cyn-dm' );
$cta_link = $args['cta_link'] ?? '#';
$cta_icon = $args['cta_icon'] ?? '';
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
			<a href="<?php echo get_field( 'brochure' ) ? get_field( 'brochure' )['url'] : '#' ?>"
			   class="btn-cta icon-start"
			   style="background-color:transparent; border-color:#000; color:#000; border:1px solid;">

				<i class="iconsax"
				   icon-name="book-with-bookmark"></i>
				brochure
			</a>
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
				<?php _e( 'add to calender', 'cyn-dm' ) ?>
			</a>

		<?php else : ?>
			<a href="<?php echo $cta_link ?>"
			   class="btn-cta btn-black callback-opener">
				<i class="iconsax"
				   icon-name="<?php echo $cta_icon ?>"></i>
				<?php echo $cta_text ?>
			</a>
		<?php endif; ?>

		<?php if ( isset( $args['cta_2_text'] ) ) : ?>
			<a href="<?php echo $args['cta_2_link'] ?>"
			   style="min-width:120px;text-align:center"
			   class="btn-cta btn-green">
				<?php echo $args['cta_2_text'] ?>
			</a>
		<?php endif; ?>
	</div>

</div>
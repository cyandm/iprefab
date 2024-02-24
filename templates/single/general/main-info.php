<?php
$has_brochure = isset( $args['has_brochure'] ) ? $args['has_brochure'] : false;
$title = get_the_title();

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
					<i class="iconsax"
					   icon-name="share"></i>
				</button>
			</div>
		</div>
		<div class="general-info-short">
			4h, avok, kph/khh/wc, upper hall, kph/wc, s
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
		<button class="btn-primary">
			call back request
		</button>
	</div>

</div>
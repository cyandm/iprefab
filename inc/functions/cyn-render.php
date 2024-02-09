<?php


/**
 * render a section with items and post types
 * @param string $title
 * @param array $btn 
 * btn is an array with 3 keys ['link' , 'title' , 'icon']
 * @param array $items array from post ids
 * @param string $post_type is a wp post type
 * @return void 
 */
function cyn_render_section_card( $title, $btn, $items, $post_type ) {

	function render_btn( $btn, $is_desktop ) { ?>
		<a href="<?= $btn['link'] ?>"
		   class="btn-secondary <?= $is_desktop ? 'only-desktop' : 'only-mobile btn-full' ?> <?= $btn['icon'] ? 'btn-icon-start' : '' ?>">
			<?php if ( $btn['icon'] !== false ) : ?>
				<i class="iconsax"
				   icon-name="<?= $btn['icon'] ?>"></i>
			<?php endif; ?>
			<?= $btn['title'] ?>
		</a>
	<?php } ?>

	<section class="section-card">
		<div class="section-card-title-wrapper">
			<span class="h1">
				<?= $title ?>
			</span>

			<?php render_btn( $btn, true ) ?>

		</div>
		<hr>

		<div class="section-card-items">
			<?php foreach ( $items as $item_id ) {
				get_template_part( '/templates/components/card', $post_type, [ 'post_id' => $item_id ] );
			} ?>
		</div>

		<?php render_btn( $btn, false ) ?>
	</section>
	<?php
}


<?php

/**
 * Summary of cyn_render_btn
 * @param array $btn btn is an array with 3 keys ['link' , 'title' , 'icon']
 * @param boolean $is_desktop
 * @return void
 */
function cyn_render_btn( $btn, $is_desktop ) { ?>
	<a href="<?= $btn['link'] ?? '#' ?>"
	   class="btn-secondary <?= $is_desktop ? 'only-desktop' : 'only-mobile btn-full' ?> <?= $btn['icon'] ? 'btn-icon-start' : '' ?>">
		<?php if ( $btn['icon'] !== false ) : ?>
			<i class="iconsax"
			   icon-name="<?= $btn['icon'] ?>"></i>
		<?php endif; ?>
		<?= $btn['title'] ?? '' ?>
	</a>
<?php }

/**
 * render a section with items and post types
 * @param string $title
 * @param array $btn 
 * btn is an array with 3 keys ['link' , 'title' , 'icon']
 * @param array $items array from post ids
 * @param string $post_type is a wp post type
 * @return void 
 */
function cyn_render_section_card( $title, $btn, $items, $post_type, $additional_class = '', $col = '3', $has_swiper = false ) {

	if ( empty( $items ) )
		return;
	?>


	<section class="section-card <?= $additional_class ?>">
		<div class="section-card-title-wrapper">

			<span class="h1">
				<?= $title ?>
			</span>

			<?php cyn_render_btn( $btn, true ) ?>

		</div>
		<hr>


		<?php if ( $has_swiper ) : ?>
			<div class="section-card-items | swiper">
				<div class="swiper-wrapper grid-col-<?= $col ?>">
					<?php
					foreach ( $items as $item_id ) {
						get_template_part( '/templates/components/card/' . $post_type, null, [ 'post_id' => $item_id, 'class' => 'swiper-slide' ] );
					}
					?>
				</div>
			</div>

		<?php else : ?>
			<div class="section-card-items grid-col-<?= $col ?>">
				<?php
				foreach ( $items as $item_id ) {
					get_template_part( '/templates/components/card/' . $post_type, null, [ 'post_id' => $item_id ] );
				}
				?>
			</div>
		<?php endif; ?>



		<?php cyn_render_btn( $btn, false ) ?>
	</section>
	<?php
}

/**
 * @param int $img_id 
 * @param string|array $size 'full' or 'medium' or 'thumbnail' or [width , height]
 * @return void
 */
function cyn_render_image( $img_id, $size = 'full' ) {
	?>
	<div class="img-wrapper">
		<?php
		if ( $img = wp_get_attachment_image( $img_id, $size ) ) {
			echo $img;
		} else {
			echo "<img 
			src=\"" . get_stylesheet_directory_uri() . '/assets/imgs/placeholder.webp' . "\" />";
		}
		?>
	</div>
	<?php
}

function cyn_render_icon_box( $icon, $data, $unit = '', $is_svg = false ) {
	?>

	<?php if ( $is_svg ) : ?>
		<span class="icon-box">
			<?php get_template_part( "./assets/icons/$icon" ) ?>
			<span>
				<?= $data . ' ' . $unit ?>
			</span>
		</span>

	<?php else : ?>
		<span class="icon-box">
			<i class="iconsax"
			   icon-name="<?= $icon ?>"></i>
			<span>
				<?= $data . ' ' . $unit ?>
			</span>
		</span>
		<?php
	endif;
}
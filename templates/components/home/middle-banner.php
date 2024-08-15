<?php
$middle_id = get_field( 'middle_banner' ) ?? 0;



?>


<section class="banner_middle">
	<div>
		<?php if ( 0 !== $middle_id ) : ?>
			<?php echo wp_get_attachment_image( $middle_id, 'full' ) ?>
		<?php else : ?>

			<img src="<?php echo get_stylesheet_directory_uri() . '/assets/imgs/placeholder.webp' ?>"
				 alt="placeholder">

			<span><?php _e( 'please select an image', 'cyn-dm' ) ?></span>

		<?php endif; ?>
	</div>
</section>
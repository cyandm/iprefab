<?php
$images = get_field( 'images' );

function cyn_render_images( $images ) {
	foreach ( $images as $image_id ) {
		if ( $image_id === false )
			return;

		echo '<div class="swiper-slide">';
		echo wp_get_attachment_image( $image_id, 'full' );
		echo '</div>';

	}
}

?>

<div class="general-images">

	<div class="swiper swiper-general-main"
		 id="generalMainSwiper">
		<div class="swiper-wrapper">
			<?php cyn_render_images( $images ) ?>

		</div>

		<div class="swiper-pagination">

		</div>

	</div>

	<div thumbsSlider
		 class="swiper swiper-general-thumbnails"
		 id="generalThumbnailSwiper">
		<div class="swiper-wrapper">
			<?php cyn_render_images( $images ) ?>
		</div>
	</div>

</div>
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

<div class="product-images">

	<div class="swiper swiper-product-main"
		 id="productMainSwiper">
		<div class="swiper-wrapper">
			<?php cyn_render_images( $images ) ?>

		</div>

		<div class="swiper-pagination">

		</div>

	</div>

	<div thumbsSlider
		 class="swiper swiper-product-thumbnails"
		 id="productThumbnailSwiper">
		<div class="swiper-wrapper">
			<?php cyn_render_images( $images ) ?>
		</div>
	</div>

</div>
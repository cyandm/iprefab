<?php
$images = is_array( get_field( 'images' ) ) ? get_field( 'images' ) : [];
array_unshift( $images, get_post_thumbnail_id() );


function cyn_render_images( $images ) {
	$images = $images !== false ? $images : [];

	foreach ( $images as $image_id ) {
		if ( $image_id === false )
			continue;

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
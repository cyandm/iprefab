<?php
$brands_logo_group = is_array( get_field( 'brands_logo_group' ) ) ? get_field( 'brands_logo_group' ) : [];
$brands_logo_group = array_filter( $brands_logo_group );



?>
<section class="brands_box">
	<div class="swiper"
		 id="homePageBrands">

		<div class="brands_box_header">
			<div class="h1">
				<?php the_field( 'brands_title' ) ?>
			</div>

			<div class="swiper-navigation">
				<i class="iconsax swiper-button-prev"
				   icon-name="arrow-left-circle"></i>

				<i class="iconsax swiper-button-next"
				   icon-name="arrow-right-circle"></i>
			</div>
		</div>

		<div class="clear-fix-24"></div>

		<div class="swiper-wrapper brands_box_wrapper">
			<?php foreach ( $brands_logo_group as $index => $logo_id ) : ?>
				<div class="swiper-slide">
					<?php echo wp_get_attachment_image( $logo_id ) ?>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>
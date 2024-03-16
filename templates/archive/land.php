<?php

global $wp_query;
$img_top_url = get_option( 'cyn_land_top_archive_image' );
$img_bottom_url = get_option( 'cyn_land_bottom_archive_image' );
$filters = cyn_get_filters();


?>

<?php get_header() ?>

<main class="container general-archive">
	<?php get_template_part( '/templates/components/breadcrumb' ) ?>
	<div class="clear-fix-16"></div>
	<?php get_template_part( '/templates/archive/general/image-section', null, [ 'url' => $img_top_url ] ) ?>
	<div class="clear-fix-16"></div>

	<section class="d-flex gap-16 ai-start">
		<?php get_template_part( '/templates/archive/general/filters', null, [ 'post_type' => 'land' ] ) ?>

		<div class="flex-3">
			<?php get_template_part( '/templates/archive/general/sort', null, [ 'post_type' => 'land' ] ) ?>
			<div class="clear-fix-16"></div>
			<?php get_template_part( '/templates/archive/general/posts', null, [ 'post_type' => 'land' ] ) ?>
			<div class="clear-fix-24"></div>
			<?php get_template_part( '/templates/archive/general/pagination' ) ?>
		</div>

	</section>

	<div class="clear-fix-64"></div>
	<?php get_template_part( '/templates/archive/general/image-section', null, [ 'url' => $img_bottom_url ] ) ?>
	<div class="clear-fix-64"></div>
</main>

<div class="product-archive-filters"
	 id="filtersPopUp"
	 data-active="false">
	<div class="product-archive-filters-title">
		<i class="iconsax"
		   id="filtersPopUpCloser"
		   icon-name="x-circle"></i>
		<h3>filters</h3>
	</div>

	<?= get_template_part( '/templates/components/filters/filter', 'land' ) ?>
</div>

<?php get_footer() ?>
<?php
$img_url_top = get_option( 'cyn_exhibition_archive_top' );
$img_url_bottom = get_option( 'cyn_exhibition_archive_bottom' );


?>

<?php get_header() ?>

<main class="archive-exhibition container general-archive">
	<?php get_template_part( '/templates/components/breadcrumb' ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/archive/general/image-section', null,
		[ 'url' => $img_url_top ] ) ?>
	<div class="clear-fix-24"></div>

	<?php
	get_template_part( '/templates/archive/general/posts',
		null,
		[ 'post_type' => 'exhibition' ] ) ?>
	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/archive/general/pagination', null, [] ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/archive/general/image-section', null,
		[ 'url' => $img_url_bottom ] ) ?>

	<div class="clear-fix-24"></div>

</main>

<?php get_footer() ?>
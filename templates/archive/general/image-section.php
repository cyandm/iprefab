<?php
$img_url = $args['url'] !== '' ? $args['url'] : get_stylesheet_directory_uri() . '/assets/imgs/placeholder.webp';

?>

<section class="img-wrapper general-archive-hero">
	<img src="<?= $img_url ?>">
</section>
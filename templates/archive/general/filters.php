<?php
$post_type = $args['post_type'] ?? 'post';

?>

<aside class="general-archive-filter | flex-1">
	<h3><?php pll_e( 'Filters' ) ?></h3>
	<?php get_template_part( '/templates/components/filters/filter', $post_type ) ?>
</aside>
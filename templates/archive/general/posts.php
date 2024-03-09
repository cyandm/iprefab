<?php
$post_type = $args['post_type'] ?? 'post';
?>

<div class="general-archive-posts grid-col-2 gap-16">
	<?php if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			get_template_part( "/templates/components/card/$post_type" );
		endwhile;
	endif; ?>
</div>
<?php if ( get_the_content() ) : ?>

	<h4><?php _e( 'description', 'cyn-dm' ) ?></h4>

	<p class="general-description">
		<?php the_content() ?>
	</p>

<?php endif; ?>
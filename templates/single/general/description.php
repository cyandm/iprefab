<?php if ( get_the_content() ) : ?>

	<h4><?php pll_e( 'Description' ) ?></h4>

	<p class="general-description">
		<?php the_content() ?>
	</p>

<?php endif; ?>
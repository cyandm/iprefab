<?php get_header() ?>

<div class="container d-flex jc-center ai-center flex-col gap-12">

	<div class="clear-fix-40"></div>

	<div class="img-wrapper"
		 style="max-width:840px">
		<img src="<?= get_stylesheet_directory_uri() . '/assets/imgs/404.png' ?>"
			 alt="404">
	</div>

	<h1>
		<?php _e( 'oops something went wrong', 'cyn-dm' ) ?>
	</h1>

	<a href="/"
	   class="btn-secondary">
		<?php _e( 'back to homepage', 'cyn-dm' ) ?>
	</a>

	<div class="clear-fix-40"></div>

</div>

<?php get_footer() ?>
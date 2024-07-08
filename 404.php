<?php get_header() ?>

<div class="container d-flex jc-center ai-center flex-col gap-12">

	<div class="clear-fix-40"></div>

	<div class="img-wrapper"
		 style="max-width:840px">
		<img src="<?= get_stylesheet_directory_uri() . '/assets/imgs/404.png' ?>"
			 alt="404">
	</div>

	<h1>
		<?php pll_e( 'oops something went wrong' ) ?>
	</h1>

	<a href="/"
	   class="btn-secondary">
		<?php pll_e( 'back to homepage' ) ?>
	</a>

	<div class="clear-fix-40"></div>

</div>

<?php get_footer() ?>
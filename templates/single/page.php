<?php get_header() ?>

<main class="container">
	<h1>
		<?php the_title() ?>
	</h1>

	<div class="clear-fix-16">
		<hr>
	</div>

	<div class="content">
		<?php the_content() ?>
	</div>
</main>

<?php get_footer() ?>
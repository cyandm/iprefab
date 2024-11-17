<?php get_header() ?>

<main class="single-exhibition container">

	<?php get_template_part( '/templates/components/breadcrumb' ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/exhibition/info' ) ?>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/general/images' ) ?>

	<div class="clear-fix-32"></div>

	<?php
	get_template_part( '/templates/single/general/main-info',
		null,
		[ 'is_calender' => true ]
	) ?>

	<div class="clear-fix-16">
		<hr>
	</div>

	<div class="clear-fix-24"></div>


	<?php get_template_part( '/templates/single/exhibition/details' ) ?>

	<div class="clear-fix-24"></div>

	<div>
		<?php the_content() ?>
	</div>

	<div class="clear-fix-24"></div>

	<?php get_template_part( '/templates/single/exhibition/time' ) ?>

	<div class="clear-fix-64"></div>

	<?php get_template_part( '/templates/single/general/company' ) ?>

	<div class="clear-fix-64"></div>

	<?php get_template_part( '/templates/single/exhibition/recommended' ) ?>

	<div class="clear-fix-64"></div>

	<?php get_template_part( '/templates/single/general/recommend-by-company', null,
		[ 
			'post_type' => 'house',
			'col' => 3
		]
	) ?>

	<div class="clear-fix-120"></div>

</main>

<?php get_footer() ?>
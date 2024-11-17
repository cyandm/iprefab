<?php
//Template Name: Home Page

?>

<?php get_header() ?>



<main class="container">

	<?php get_template_part( '/templates/components/home/hero' ) ?>
	<div class="clear-fix-64"></div>
	<?php get_template_part( '/templates/components/home/brands' ) ?>
	<div class="clear-fix-64"></div>
	<?php get_template_part( '/templates/components/home/middle-banner' ) ?>
	<div class="clear-fix-64"></div>
	<?php get_template_part( '/templates/components/home/house-plus-land' ) ?>
	<div class="clear-fix-72"></div>
	<?php get_template_part( '/templates/components/home/suppliers' ) ?>
	<div class="clear-fix-64"></div>
	<?php get_template_part( '/templates/components/home/exhibitions' ) ?>
	<div class="clear-fix-64"></div>
	<?php get_template_part( '/templates/components/home/faq' ) ?>
	<div class="clear-fix-64"></div>
	<?php get_template_part( '/templates/components/home/blogs' ) ?>
	<div class="clear-fix-120"></div>

</main>


<?php get_footer() ?>
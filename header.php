<!DOCTYPE html>
<html <?php language_attributes() ?>>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
			  content="width=device-width, initial-scale=1.0 ,maximum-scale=1.0, user-scalable=0">
		<?php wp_head() ?>
	</head>

	<body <?php body_class() ?>>
		<?php wp_body_open() ?>

		<header class="header-site container">

			<?php get_template_part( '/templates/components/mobile-menu' ) ?>

			<div class="header-logo">
				<?php the_custom_logo() ?>
			</div>

			<div class="header-desktop-menu">
				<?php
				wp_nav_menu( [ 
					'theme_location' => 'header'
				] );
				?>
			</div>

			<div class="header-cta">


				<a href="#"
				   class="btn-secondary btn-icon-start">
					<i class="iconsax"
					   icon-name="user-1"></i>
					<span>
						<?php _e( 'contact Iprefab', 'cyn-dm' ) ?>
					</span>
				</a>




			</div>
		</header>
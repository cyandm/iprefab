<?php
//Template name: contact us
?>


<?php get_header() ?>

<?php get_template_part( '/templates/components/breadcrumb', null, [ 'items' => [ 
	[ 
		'label' => __( 'contact us', 'cyn-dm' ),
		'link' => '#'
	]
] ] ) ?>

<div class="clear-fix-24"></div>

<main class="container | contact-us">
	<div class="d-flex gap-16">
		<div>
			<h1>
				<?php the_title() ?>
			</h1>
			<div class="clear-fix-16"></div>

			<div>
				<form action="/">
					<input type="text"
						   class="input-wrapper"
						   name="name"
						   placeholder="<?php _e( 'your name', 'cyn-dm' ) ?>" />
					<input type="email"
						   class="input-wrapper"
						   name="email"
						   placeholder="<?php _e( 'your email', 'cyn-dm' ) ?>" />
					<textarea name="message"
							  class="input-wrapper"
							  placeholder="<?php _e( 'Your Message', 'cyn-dm' ) ?>"></textarea>

					<div class="button">

						<input class="btn-secondary"
							   type="submit"
							   value="<?php _e( 'send', 'cyn-dm' ) ?>">
					</div>
				</form>
			</div>
		</div>

		<div>
			<?php the_field( 'location' ) ?>
		</div>
	</div>
</main>

<div class="clear-fix-120"></div>


<?php get_footer() ?>
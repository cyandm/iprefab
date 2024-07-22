<?php
//Template name: contact us
?>


<?php get_header() ?>

<?php get_template_part( '/templates/components/breadcrumb', null, [ 'items' => [ 
	[ 
		'label' => pll__( 'contact us' ),
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
				<form id="contactUsPage">
					<input type="text"
						   required
						   class="input-wrapper"
						   name="name"
						   placeholder="<?php echo pll__( 'your name' ) . ' *' ?>" />
					<input type="email"
						   pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$"
						   required
						   class="input-wrapper"
						   name="email"
						   placeholder="<?php echo pll__( 'your email' ) . ' *' ?>" />
					<textarea name="message"
							  required
							  class="input-wrapper"
							  placeholder="<?php pll_e( 'your message' ) ?>"></textarea>

					<div class="button">

						<input class="btn-secondary"
							   type="submit"
							   value="<?php pll_e( 'send' ) ?>">
					</div>
				</form>
			</div>
		</div>

		<div class="map">
			<?php the_field( 'location' ) ?>
		</div>
	</div>
</main>

<div class="clear-fix-120"></div>


<?php get_footer() ?>
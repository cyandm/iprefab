<div class="clear-fix-64"></div>

<footer class="site-footer">
	<div class="site-footer-top | container">
		<div class="footer-logo">
			<a href="/">
				<img src="<?php echo get_option( 'footer_logo' ) ?>"
					 alt="footer logo">
			</a>
		</div>

		<div class="site-footer-menu">
			<?php wp_nav_menu( [ 'theme_location' => 'footer' ] ) ?>
		</div>
	</div>

	<div class="site-footer-bottom">
		<div class="container">
			<div class="site-footer-images">
				<img src="<?php echo get_option( 'footer_image_1' ) ?>"
					 alt="footer image 1">

				<img src="<?php echo get_option( 'footer_image_2' ) ?>"
					 alt="footer image 2">
			</div>

			<div class="site-footer-buttons">
				<a href="#"
				   id="contactFormOpener"
				   class="btn-cta btn-square">
					<?php pll_e( 'Ask Iprefab' ) ?>
				</a>

				<div class="site-footer-follow">
					<span>
						<?php pll_e( 'Follow Us' ) ?>
					</span>

					<div class="site-footer-social">
						<?php for ( $i = 1; $i <= 5; $i++ ) :
							$url = get_option( "footer_social_url_$i" );
							$logo = get_option( "footer_social_logo_$i" );

							if (
								empty( $url ) ||
								empty( $logo ) )
								continue;

							?>
							<a class="site-footer-social-item"
							   href="<?php echo $url ?>">
								<img src="<?php echo $logo ?>">
							</a>
						<?php endfor; ?>
					</div>

				</div>
			</div>
		</div>
	</div>

</footer>
<?php get_template_part( '/templates/components/contact-form' ) ?>



<div class="wp-scripts">

	<?php wp_footer() ?>
</div>

</body>

</html>
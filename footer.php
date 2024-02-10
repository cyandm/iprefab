<div class="container">
	<footer class="site-footer">
		<div class="site-footer-content">
			<?php
			wp_nav_menu( [ 
				'theme_location' => 'footer'
			] )
				?>
		</div>

		<div class="site-footer-social-media">
			<span>
				follow us
			</span>

			<a href="#">
				<i class="iconsax"
				   icon-name="linkedin"></i>
			</a>

			<a href="#">
				<i class="iconsax"
				   icon-name="instagram"></i>
			</a>
		</div>
	</footer>

</div>

<div class="wp-scripts">
	<?php wp_footer() ?>
</div>

</body>

</html>
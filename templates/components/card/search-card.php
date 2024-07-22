<div class="search-card">
	<a href="<?php echo esc_url( get_permalink() ) ?>">
		<div class="d-flex gap-12">
			<?php cyn_render_image( get_post_thumbnail_id() ) ?>

			<div class="d-flex flex-col jc-around">
				<div>
					<?php the_title() ?>
				</div>

				<div class="d-flex gap-8 ai-center">

					<div class="caption">


						<span>
							<?php echo get_post_type( get_the_ID() ) ?>
						</span>
					</div>

					•

					<div class="date caption">
						<span>
							<?php pll_e( 'publish date' ) ?> :
						</span>
						<?php echo get_the_date( 'Y/M/d' ) ?>
					</div>

				</div>
			</div>
		</div>
	</a>
</div>
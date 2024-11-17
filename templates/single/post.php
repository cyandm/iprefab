<?php

$q = new WP_Query( [ 
	'post_type' => 'post',
	'posts_per_page' => 3,
] );

?>

<?php get_header() ?>

<main class="single-post container">

	<?php get_template_part( '/templates/components/breadcrumb', null, [] ) ?>

	<div class="clear-fix-16"></div>

	<div class="single-post-container | d-flex gap-16">

		<div class="single-post-content">
			<div class="single-post-feature-img">
				<?php echo get_the_post_thumbnail() ?>
			</div>

			<div class="clear-fix-16"></div>

			<h1>
				<?php the_title() ?>
			</h1>

			<div class="clear-fix-8"></div>

			<div>
				<div>
					<span><?php _e( 'author', 'cyn-dm' ) ?> : </span>
					<span><?= get_the_author_meta( 'display_name', get_post_field( 'post_author', get_the_ID() ) ); ?></span>
				</div>

				<div>
					<span><?php _e( 'date', 'cyn-dm' ) ?> : </span>
					<span><?= date_format( get_post_datetime(), 'Y/m/d' ) ?></span>
				</div>
			</div>

			<div class="clear-fix-16"></div>

			<div>
				<?php the_content() ?>
			</div>

			<div class="clear-fix-36"></div>
			<!-- @need comments -->

		</div>

		<aside class="single-post-sidebar">
			<h4>
				<?php _e( 'You might also like', 'cyn-dm' ) ?>
			</h4>


			<div class="clear-fix-12"></div>

			<div class="d-grid gap-16">
				<?php
				if ( $q->have_posts() ) :
					while ( $q->have_posts() ) :
						$q->the_post();
						get_template_part( '/templates/components/card/post',
							args:
							[ 'rel' => 'nofollow' ]
						);
					endwhile;
				endif;
				?>
			</div>
		</aside>
	</div>


</main>

<div class="clear-fix-120"></div>


<?php get_footer() ?>
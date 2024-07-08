<?php
//Template name: about us

$team_members = get_field( 'our_team' ) ?? [];


?>


<?php get_header() ?>

<?php get_template_part( '/templates/components/breadcrumb', null, [ 'items' => [ 
	[ 
		'label' => pll__( 'about us' ),
		'link' => '#'
	]
] ] ) ?>

<main class="container">

	<div class="clear-fix-24"></div>

	<h1>
		<?php the_field( 'title' ) ?>
	</h1>
	<div class="clear-fix-16"></div>

	<div class="img-wrapper aspect-video">
		<?php echo wp_get_attachment_image( get_field( 'hero_image' ), 'full' ) ?>
	</div>

	<div class="clear-fix-24"></div>

	<div>
		<?php the_field( 'hero_text' ) ?>
	</div>

	<div class="clear-fix-64"></div>


	<?php if ( get_field( 'our_team_title' ) ) : ?>
		<div>
			<div>
				<h2><?php the_field( 'our_team_title' ) ?></h2>
				<hr />
			</div>

			<div class="d-flex gap-16 overflow-y-scroll custom-scrollbar">
				<?php foreach ( $team_members as $member ) :

					if ( ! $member['image'] )
						continue;

					?>

					<div class="team-card">
						<div class="img-wrapper aspect-square">
							<?php echo wp_get_attachment_image( $member['image'], 'medium' ) ?>
						</div>

						<div class="d-grid gap-4">
							<h4><?php echo $member['name'] ?></h4>
							<span class="fs-caption"><?php echo $member['position'] ?></span>
						</div>

					</div>

				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>

	<div class="clear-fix-64"></div>


	<?php if ( get_field( 'perspective_title' ) ) : ?>
		<div class="perspective-section">
			<div>
				<h2><?php the_field( 'perspective_title' ) ?></h2>
				<hr />
				<div class="clear-fix-24"></div>
			</div>

			<div class="perspective | d-flex gap-24">
				<div>
					<?php the_field( 'perspective_text' ) ?>
				</div>

				<div>
					<div class="img-wrapper">
						<?php echo wp_get_attachment_image( get_field( 'perspective_image' ), 'full' ) ?>
					</div>
				</div>
			</div>


		</div>
	<?php endif; ?>


</main>

<?php get_footer() ?>
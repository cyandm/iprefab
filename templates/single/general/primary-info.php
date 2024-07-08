<?php
$primary_data = isset( $args['primary_data'] ) ? $args['primary_data'] : [];
$title = $args['title'] ?? pll__( 'Primary' );
?>

<?php if ( count( $primary_data ) > 0 ) : ?>
	<div class="general-primary-info">

		<p class="h4">
			<?= $title ?>
		</p>

		<div class="general-table-primary">
			<?php foreach ( $primary_data as $key => $data ) : ?>
				<div class="general-feature-box">
					<div class="general-feature-top">
						<?php cyn_render_icon_box( $data['icon'], $data['text'], '', $data['is_svg'] ?? false ) ?>
					</div>
					<div class="general-feature-value">
						<span class="caption"><?= $data['value'] ?></span>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
<?php endif; ?>
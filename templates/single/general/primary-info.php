<?php
$primary_data = isset( $args['primary_data'] ) ? $args['primary_data'] : [];
$title = $args['title'] ?? 'Primary';
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
						<i class="iconsax"
						   icon-name="<?= $data['icon'] ?>"></i>
						<span class="caption"><?= $data['text'] ?></span>
					</div>
					<div class="general-feature-value">
						<span class="caption"><?= $data['value'] ?></span>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
<?php endif; ?>
<?php
global $post_type;

$items = $args['items'] ?? null;

?>

<div class="breadcrumb">

	<ul class="breadcrumb-container">

		<li class="breadcrumb-item">
			<a href="<?= site_url() ?>">
				<?php pll_e( 'Homepage' ) ?>
			</a>
		</li>

		<!-- #region main -->
		<?php if ( $items !== null ) : ?>
			<?php foreach ( $items as $index => $item ) :
				$is_last_item = $index === count( $items ) - 1
					?>

				<li class="breadcrumb-item"
					data-active='<?= $is_last_item ? 'true' : 'false' ?>'>
					<?php if ( $is_last_item ) : ?>
						<?= $item['label'] ?>
					<?php else : ?>
						<a href="<?= $item['link'] ?>">
							<?= $item['label'] ?>
						</a>
					<?php endif; ?>
				</li>

			<?php endforeach; ?>

		<?php endif; ?>
		<!-- #endregion -->

		<?php if ( $items === null ) : ?>
			<li class="breadcrumb-item"
				data-active="<?= is_archive() ? 'true' : 'false' ?>">
				<a href="<?= get_post_type_archive_link( $post_type ) ?>">
					<?= get_post_type_object( $post_type )->label ?>
				</a>
			</li>

			<?php if ( ! is_archive() ) : ?>
				<li class="breadcrumb-item"
					data-active="true">
					<?= get_the_title() ?>
				</li>
			<?php endif; ?>

		<?php endif; ?>
	</ul>


</div>
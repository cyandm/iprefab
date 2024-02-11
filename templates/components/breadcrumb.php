<?php
global $post_type;



?>


<div class="breadcrumb">

	<ul class="breadcrumb-container">
		<li class="breadcrumb-item">
			<a href="<?= site_url() ?>">
				Homepage
			</a>
		</li>
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
	</ul>


</div>
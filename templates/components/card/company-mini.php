<?php
$term_id = $args['post_id'] ?? 0;
$term_object = $args['term'] ?? get_term( $term_id ) ?? null;
$company_acf_address = 'company_' . $term_object->term_id;
$company_logo = isset( $term_object ) ? wp_get_attachment_image(
	get_field( 'logo', $company_acf_address ),
	[ 300, 300 ], false,
	[ 'style' => '--logo-color:' . get_field( 'color', $company_acf_address ) ] ) : '';

?>
<div class="company-card-mini | d-flex flex-col jc-center ai-center">
	<div class="img-wrapper">
		<?= $company_logo ?>
	</div>
	<div>
		<?php echo $term_object->name ?>
	</div>
</div>
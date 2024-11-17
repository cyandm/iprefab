<?php
$term_id = $args['post_id'] ?? 0;
$class = $args['class'] ?? '';
$term_object = $args['term'] ?? get_term( $term_id ) ?? null;
$company_acf_address = 'company_' . $term_object->term_id;
$company_logo = isset( $term_object ) ? wp_get_attachment_image(
	get_field( 'logo', $company_acf_address ),
	[ 300, 300 ], false,
	[ 'style' => '--logo-color:' . get_field( 'color', $company_acf_address ) ] ) : '';

?>
<a href="<?php echo get_term_link( $term_id, 'company' ) ?>"
   class="company-card-mini <?= $class ?> | d-flex flex-col jc-center ai-center">
	<div class="img-wrapper">
		<?= $company_logo ?>
	</div>
	<div>
		<?php echo $term_object->name ?>
	</div>
</a>
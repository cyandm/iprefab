<?php

global $wp_query;

$taxonomy = $wp_query->query_vars['taxonomy'] ?? null;
$parent = get_queried_object()->parent;

if ( $taxonomy === null ) {
	echo 'taxonomy not found';
	exit();
}

if ( $parent == 0 ) {
	get_template_part( '/templates/suppliers', null, [ 'children' => true ] );
} else {
	get_template_part( '/templates/taxonomy/company' );
}

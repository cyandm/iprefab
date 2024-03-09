<?php

global $wp_query;

$taxonomy = $wp_query->query_vars['taxonomy'] ?? null;

if ( $taxonomy === null ) {
	echo 'taxonomy not found';
	exit();
}

get_template_part( '/templates/taxonomy/company' );
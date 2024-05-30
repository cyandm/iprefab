<?php
$post_type = $args['post_type'] ?? 'product';
$company = $args['company'] ?? get_the_terms( get_queried_object_id(), 'company' )[0];
$col = $args['col'] ?? 3;

$products = new WP_Query( [ 
	'post_type' => $post_type,
	'tax_query' => [ 
		[ 
			'taxonomy' => 'company',
			'field' => 'term_id',
			'terms' => $company->term_id,
		]
	],
	'posts_per_page' => 3,
] );

$post_ids = [];

foreach ( $products->posts as $post ) {
	array_push( $post_ids, $post->ID );
}




cyn_render_section_card( 'from this supplier',
	[ 
		'link' => get_term_link( $company ),
		'title' => __( 'view all', 'cyn-dm' ),
		'icon' => 'eye'
	], $post_ids, $post_type, $post_type . '-recommended', $col );



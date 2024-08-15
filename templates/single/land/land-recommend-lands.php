<?php
$related_lands = get_field( 'related_lands' );
$lands_ids = [];


if ( ! $related_lands ) {
	$lands = new WP_Query( [ 
		'post_type' => 'land',
		'posts_per_page' => 3,
		'meta_query' => [ 
			[ 
				'key' => 'city',
				'value' => get_field( 'city' ),
				'compare' => '='
			]
		]
	] );

	if ( $lands->found_posts < 1 ) {
		$lands = new WP_Query( [ 
			'post_type' => 'land',
			'posts_per_page' => 3,
		] );
	}


	foreach ( $lands->posts as $post ) {
		array_push( $lands_ids, $post->ID );
	}
} else {
	$lands_ids = $related_lands;
}




cyn_render_section_card( __( 'You may like these lands', 'cyn-dm' ),
	[ 
		'link' => get_post_type_archive_link( 'land' ),
		'title' => __( 'view all', 'cyn-dm' ),
		'icon' => 'eye'
	], $lands_ids, 'land', 'land-recommended' );



<?php
//Template name: dev

$house_ids = [];
$q = new WP_Query( [ 
	'post_type' => 'house',
	'meta_query' => [ 
		[ 
			'key' => 'type',
			'value' => 'house'
		]
	]
] );

foreach ( $q->posts as $post ) {
	array_push( $house_ids, $post->ID );
}

$w = new WP_Query( [ 
	'post_type' => 'house-and-land',
	'meta_query' => [ 
		[ 
			'key' => 'related_house',
			'value' => $house_ids,
		]
	]
] );


echo '<pre dir="ltr">';
var_dump( $w->posts );
echo '</pre>';
wp_die();

